<?php
/**
 * Created by PhpStorm.
 * User: RaoHonghua
 * Date: 2017/6/19
 * Time: 19:39
 * e-mail: 706805346@qq.com
 * QQ/Wechat: 706805346/hua706805346
 */

namespace Admin\Controller;


use Common\Controller\BaseController;

/**
 * Class ForeUserController
 * @package Admin\Controller
 * 前台用户控制器
 */
class ForeUserController extends BaseController
{
    public function index () {
        $data = m('user')->select();
        $this->assign('data',$data);

        $count = m('user')->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,8);// 实例化分页类 传入总记录数和每页显示的记录数(8)
        $show = $Page->show();// 分页显示输出
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

    // 编辑方法
    public function edit () {
        $u_id = I('get.u_id');
        $oldData = m('user')->where("u_id={$u_id}")->find();
        $this->assign('oldData',$oldData);
        if (IS_POST) {
            $newData['account_balance'] = I('post.account_balance');
            $res = m('user')->where("u_id={$u_id}")->save($newData);
            if (isset($res)) {
                $this->success('编辑成功',u('ForeUser/index'));die();
            } else {
                $this->error('编辑失败');die();
            }
        }
        $this->display();
    }

    // 删除方法
    public function del () {
        $u_id = I('get.u_id');
        $res = m('user')->where("u_id={$u_id}")->delete();
        if (isset($res)) {
            $this->success('删除成功',u('ForeUser/index'));die();
        } else {
            $this->error('删除失败');die();
        }
    }
}