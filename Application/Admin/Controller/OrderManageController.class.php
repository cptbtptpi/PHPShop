<?php
/**
 * Created by PhpStorm.
 * User: RaoHonghua
 * Date: 2017/6/20
 * Time: 16:56
 * e-mail: 706805346@qq.com
 * QQ/Wechat: 706805346/hua706805346
 */

namespace Admin\Controller;


use Common\Controller\BaseController;

/**
 * Class OrderManageController
 * @package Admin\Controller
 * 订单管理控制器
 */
class OrderManageController extends BaseController
{
    public function index () {
        $indent = M('indent');
        $count = $indent->count();
        $page = new \Think\Page($count,8);
        $show = $page->show();
        // 获取订单数据
        $indentData = $indent->select();
        $this->assign('indentData',$indentData);
        $show .= <<<str
        <style>
            /*其他页、上一页、下一页样式*/
            .pagination .num,.prev,.next{
                position: relative;
                float: left;
                padding: 6px 12px;
                margin-left: -1px;
                line-height: 1.42857143;
                color: #337ab7;
                text-decoration: none;
                background-color: #fff;
                border: 1px solid #ddd
            }
            /*当前分页样式*/
            .pagination .current{
                position: relative;
                float: left;
                padding: 6px 12px;
                margin-left: -1px;
                line-height: 1.42857143;
                color: red;
                text-decoration: none;
                background-color: #fff;
                border: 1px solid #ddd
            }
            .pagination .headerPage{
                position: relative;
                float: left;
                padding: 6px 12px;
                text-decoration: none;
                background-color: #fff;

            }
        </style>

str;
        $this->assign('page',$show);// 赋值分页输出

        $this->display();
    }

    // 显示订单详情
    public function show () {
        $i_id = I('get.i_id');
        $orderListData = m('order_list')->where("jn_indent_i_id={$i_id}")->select();
        $this->assign('orderListData',$orderListData);
        $count = m('order_list')->where("jn_indent_i_id={$i_id}")->count();
        $page = new \Think\Page($count,8);
        $show = $page->show();
        $show .= <<<str
        <style>
            /*其他页、上一页、下一页样式*/
            .pagination .num,.prev,.next{
                position: relative;
                float: left;
                padding: 6px 12px;
                margin-left: -1px;
                line-height: 1.42857143;
                color: #337ab7;
                text-decoration: none;
                background-color: #fff;
                border: 1px solid #ddd
            }
            /*当前分页样式*/
            .pagination .current{
                position: relative;
                float: left;
                padding: 6px 12px;
                margin-left: -1px;
                line-height: 1.42857143;
                color: red;
                text-decoration: none;
                background-color: #fff;
                border: 1px solid #ddd
            }
            .pagination .headerPage{
                position: relative;
                float: left;
                padding: 6px 12px;
                text-decoration: none;
                background-color: #fff;

            }
        </style>

str;
        $this->assign('page',$show);// 赋值分页输出

        $this->display();
    }

    // 发货
    public function sendGoods () {
        $i_id = I('get.i_id');
        $newData['order_status'] = 1;
        $res = m('indent')->where("i_id={$i_id}")->save($newData);
        if ($res != 0) {
            $this->success('发货成功',u('OrderManage/index'));
        } else {
            $this->error('发货失败');
        }
    }

    // 删除订单
    public function del () {
        $i_id = I('get.i_id');
        $orderRes = m('indent')->where("i_id={$i_id}")->delete();
        $orderListRes = m('order_list')->where("jn_indent_i_id={$i_id}")->delete();
        if ($orderRes != 0 && $orderListRes != 0) {
            $this->success('删除成功',u('OrderManage/index'));
        } else {
            $this->error('删除失败');
        }
    }
}