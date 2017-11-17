<?php
/**
 * Created by PhpStorm.
 * User: RaoHonghua
 * Date: 2017/6/19
 * Time: 22:12
 * e-mail: 706805346@qq.com
 * QQ/Wechat: 706805346/hua706805346
 */

namespace Home\Controller;


use Common\Controller\ForeBaseController;
use hdphp\weixin\build\pay;


/**
 * Class OrderListController
 * @package Home\Controller
 * 订单列表控制器
 */
class OrderListController extends ForeBaseController
{
    public function index () {
        $u_id = $_SESSION['user']['u_id'];
        $indetData = m('indent')->where("jn_user_u_id={$u_id}")->select();
        foreach ($indetData as $k=>$v) {
            $orderListData = m('order_list')->where("jn_indent_i_id={$v['i_id']}")->select();
            $indetData[$k]['order_list'] = $orderListData;
        }

        $this->assign('indentData',$indetData);

        $this->display();
    }

    // 取消订单
    public function cancelOrder () {
        $i_id = I('post.i_id');
        $indentRes = m('indent')->where("i_id={$i_id}")->delete();
        $orderListRes = m('order_list')->where("jn_indent_i_id={$i_id}")->delete();
        foreach ($_SESSION['order']['goods'] as $k=>$v) {
            $newGoodsData['total_inventory'] = m('goods')->where("g_id={$v['id']}")->getField('total_inventory') + $v['num'];
            m('goods')->where("g_id={$v['id']}")->save($newGoodsData);
        }
        if ($indentRes != 0 && $orderListRes != 0) {
            $data = 1;
        } else {
            $data = 0;
        }
        $this->ajaxReturn($data);
    }

    // 确认收货
    public function confirmOrder () {
        $i_id = I('post.i_id');
        $newData['order_status'] = 2;
        $res = m('indent')->where("i_id={$i_id}")->save($newData);
        if ($res != 0) {
            $data = 1;
        } else {
            $data = 0;
        }
        $this->ajaxReturn($data);
    }

}