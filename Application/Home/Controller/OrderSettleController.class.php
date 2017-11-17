<?php
/**
 * Created by PhpStorm.
 * User: RaoHonghua
 * Date: 2017/6/16
 * Time: 15:27
 * e-mail: 706805346@qq.com
 * QQ/Wechat: 706805346/hua706805346
 */

namespace Home\Controller;


use Common\Controller\ForeBaseController;
use hdphp\weixin\build\pay;

//use Home\Model\OrderSettleModel;

/**
 * Class OrderSettleController
 * @package Home\Controller
 * 订单处理页控制器
 */
class OrderSettleController extends ForeBaseController
{
    public function index () {
        if (!isset($_SESSION['user']['username'])) { die(); }

        // 地址信息
        $u_id = $_SESSION['user']['u_id'];
        $this->assign('u_id',$u_id);
        $consigneeMessage = m('consignee_message')->where("jn_user_u_id={$u_id}")->select();
        $this->assign('consigneeMessage',$consigneeMessage);
        // 商品信息
        $orderData = $_SESSION;
        foreach ($orderData['cart']['goods'] as $k=>$v) {
            $orderData['cart']['goods'][$k]['options'] = explode(',',rtrim($v['options'],','));
        }
        $this->assign('orderData',$orderData);

        $this->display();
    }

    // 异步添加编辑地址
    public function addAddress () {
        if (IS_AJAX) {
            $data = I('post.');
            $cm_id = $data['cm_id'];
            $u_id = $_SESSION['user']['u_id'];
            $consigneeMessage = M('consignee_message');
            $newData['cm_area'] = $data['consignee_area'];
            $newData['cm_name'] = $data['consignee_name'];
            $newData['cm_address'] = $data['consignee_address'];
            $newData['cm_mobile'] = $data['consignee_mobile'];
            $newData['cm_phone'] = $data['consignee_phone'];
            $newData['cm_email'] = $data['consignee_email'];
            $newData['cm_addressname'] = $data['consignee_addressname'];
            $newData['jn_user_u_id'] = $u_id;
            $res = $consigneeMessage->where("jn_user_u_id={$u_id}")->select();
            // 如果$res==0,说明该用户还没有地址,则设置为默认地址
            if ($res == 0) {
                $newData['default_address'] = 1;
            }
            if ($cm_id != '') {
                $consigneeMessage->where("cm_id={$cm_id}")->save($newData);
                $data['consignee_id'] = $cm_id;
            } else {
                $consigneeMessage->add($newData);
                $data['consignee_id'] = $consigneeMessage->order('cm_id desc')->limit(1)->getField('cm_id');
            }
            $this->ajaxReturn($data);
        }
    }

    // 异步删除地址
    public function delAddress () {
        if (IS_AJAX) {
            $cm_id = I('post.cm_id');
            $res = m('consignee_message')->where("cm_id={$cm_id}")->delete();
            $this->ajaxReturn($res);
        }
    }

    // 异步编辑地址
    public function editAddress () {
        if (IS_AJAX) {
            $cm_id = I('post.cm_id');
            $oldData = m('consignee_message')->where("cm_id={$cm_id}")->find();
            $oldData['cm_area'] = explode(' ',$oldData['cm_area']);
            foreach ($oldData['cm_area'] as $k=>$v) {
                $oldData["cm_area{$k}"] = $v;
            }
            $this->ajaxReturn($oldData);
        }
    }

    // 异步设置默认地址
    public function setdefaultAddress () {
        if (IS_AJAX) {
            $cm_id = I('post.cm_id');
            // 先把原来的默认地址设为不是默认地址
            $consigneeMessage = M('consignee_message');
            $newData['default_address'] = 0;
            $consigneeMessage->where("default_address=1")->save($newData);
            // 然后再将点击的地址设为默认地址
            $newData['default_address'] = 1;
            $consigneeMessage->where("cm_id={$cm_id}")->save($newData);
            $this->ajaxReturn($newData);
        }
    }

    // 将订单及订单的一些信息存入SESSION中
    public function storeOrder () {
        if (IS_AJAX) {
            // 点击了提交订单,然后将订单的信息,及收货人的信息存入indent表中
            $indent = M('indent');
            $newData['order_number'] = (new \Org\Util\Cart())->getOrderId();
            $newData['consignee'] = I('post.addr_name');
            $newData['consignee_addr'] = I('post.addr_info');
            $newData['consignee_tel'] = I('post.addr_tel');
            $newData['total_pri'] = $_SESSION['order']['total'];
            $newData['gener_time'] = time();
            $newData['order_status'] = '未发货';
            $newData['order_payment'] = 0;
            $newData['jn_user_u_id'] = $_SESSION['user']['u_id'];
            $i_id = $indent->add($newData);
            // 将商品的信息存入order_list表中
            $orderList = M('order_list');
            foreach ($_SESSION['order']['goods'] as $k=>$v) {
                $newListData['name'] = $v['name'];
                $newListData['amount'] = $v['num'];
                $newListData['price'] = $v['total'];
                $newListData['pic'] = $v['pic'];
                $newListData['jn_goods_g_id'] = $v['id'];
                $newListData['jn_indent_i_id'] = $i_id;
                $orderList->add($newListData);
                $newGoodsData['total_inventory'] = m('goods')->where("g_id={$v['id']}")->getField('total_inventory') - $v['num'];
                m('goods')->where("g_id={$v['id']}")->save($newGoodsData);
            }
            $this->ajaxReturn($i_id);
        }
    }

}