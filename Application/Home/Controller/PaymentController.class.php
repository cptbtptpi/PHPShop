<?php
/**
 * Created by PhpStorm.
 * User: RaoHonghua
 * Date: 2017/6/19
 * Time: 19:21
 * e-mail: 706805346@qq.com
 * QQ/Wechat: 706805346/hua706805346
 */

namespace Home\Controller;


use Think\Controller;

/**
 * Class PaymentController
 * @package Home\Controller
 * 付款页控制器
 */
class PaymentController extends Controller
{
    public function index () {
        $i_id = I('get.i_id');
        $this->assign('i_id',$i_id);
        $orderData = m('indent')->where("i_id={$i_id}")->find();
        $orderListData = m('order_list')->where("jn_indent_i_id={$i_id}")->select();
        $this->assign('orderData',$orderData);
        $this->assign('orderListData',$orderListData);
        $this->display();
    }

    // 判断支付密码是否正确
    public function checkPassword () {
        if (IS_AJAX) {
            $password = I('post.password');
            $i_id = I('post.i_id');
            $u_id = $_SESSION['user']['u_id'];
            $res = m('user')->where("u_id={$u_id} and password={$password}")->select();
            if (isset($res)) {
                $data = 1;
                // 密码正确,然后从账户中扣钱
                $user = M('user');
                $newUserData['account_balance'] = $user->where("u_id={$u_id}")->getField('account_balance') - $_SESSION['order']['total'];
                if ($newUserData['account_balance'] >= 0) {
                    $user->where("u_id={$u_id}")->save($newUserData);
                    // 密码正确,付款成功,将该订单的order_payment改为1,页就是已经付了款
                    $newOrderData['order_payment'] = 1;
                    m('indent')->where("i_id={$i_id}")->save($newOrderData);
                    unset($_SESSION['order']);
                    unset($_SESSION['cart']);
                } else {
                    $data = 2;
                }
            } else {
                $data = 0;
            }
            // $data=1,表示密码正确,付款成功; =2,表示密码正确,账户余额不足,付款失败; =0,表示密码错误
            $this->AjaxReturn($data);
        }

    }

}