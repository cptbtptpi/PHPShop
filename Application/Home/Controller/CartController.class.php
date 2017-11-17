<?php
/**
 * Created by PhpStorm.
 * User: RaoHonghua
 * Date: 2017/6/15
 * Time: 18:28
 * e-mail: 706805346@qq.com
 * QQ/Wechat: 706805346/hua706805346
 */

namespace Home\Controller;


use Org\Util\Cart;
use Think\Controller;

/**
 * Class CartController
 * @package Home\Controller
 * 购物车控制器
 */
class CartController extends Controller
{
    public function index () {
        $cartData = $_SESSION;
        // 购物车数据
        foreach ($cartData['cart']['goods'] as $k=>$v) {
            $cartData['cart']['goods'][$k]['options'] = explode(',',rtrim($v['options'],','));
            $t_id = m('goods')->where("g_id={$v['id']}")->getField('jn_type_t_id');
            $attrs = m('type_attr')->where("jn_type_t_id={$t_id} and attr_type=1")->select();
        }

        $this->assign('cartData',$cartData);
        $this->assign('attrs',$attrs);

        // 订单
        $_SESSION['order'] = $_SESSION['cart'];

        // 猜你喜欢
        $caiLike = m('goods')->order('rand()')->limit(4)->select();
        $this->assign('caiLike',$caiLike);

        $this->display();
    }

    // 商品数量的增加
    public function addNum () {
        if (IS_AJAX) {
            $kk = I('post.kk');
            $num = $_SESSION['cart']['goods'][$kk]['num'];
            $num = $num + 1;
            $data = [
                'sid' => $kk,// 唯一 sid，添加购物车时自动生成
                'num' => $num
            ];
            (new Cart())->update($data);
            // 组一个返回的数据
            $returnData = [
                'total' => $_SESSION['cart']['goods'][$kk]['total'],//小计
                'total_price' => (new Cart())->getTotalPrice(),
                'num' => $num,
                'total_rows' => (new Cart())->getTotalNums()
            ];
            $this->ajaxReturn($returnData);
        }
    }

    // 商品数量的减
    public function subNum () {
        if (IS_AJAX) {
            $kk = I('post.kk');
            $num = $_SESSION['cart']['goods'][$kk]['num'];
            if ($num == 1) {
                $num = 1;
            } else {
                $num = $num - 1;
            }
            $data = [
                'sid' => $kk,
                'num' => $num
            ];
            (new Cart())->update($data);
            $returnData = [
                'total' => $_SESSION['cart']['goods'][$kk]['total'],
                'total_price' => (new Cart())->getTotalPrice(),
                'num' => $num,
                'total_rows' => (new Cart())->getTotalNums()
            ];
            $this->ajaxReturn($returnData);
        }
    }

    // 商品删除
    public function delGoods () {
        if (IS_AJAX) {
            $kk = I('post.kk');
            // 最后的数量
            $finalNum = (new Cart())->getTotalNums() - $_SESSION['cart']['goods'][$kk]['num'];
            // 最后的金额
            $finalPrice = (new Cart())->getTotalPrice() - $_SESSION['cart']['goods'][$kk]['total'];
            // 删除
            unset($_SESSION['cart']['goods'][$kk]);
            // 赋值回去总数量和总金额
            $_SESSION['cart']['total_rows'] = $finalNum;
            $_SESSION['cart']['total'] = $finalPrice;
            // 组一个返回的数据
            $returnData = [
                'total_price' => $finalPrice,
            ];
            $this->ajaxReturn($returnData);
        }
    }

}