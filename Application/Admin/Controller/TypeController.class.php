<?php
/**
 * Created by PhpStorm.
 * User: RaoHonghua
 * Date: 2017/6/6
 * Time: 10:21
 * e-mail: 706805346@qq.com
 * QQ/Wechat: 706805346/hua706805346
 */

namespace Admin\Controller;


use Admin\Model\TypeModel;
use Common\Controller\BaseController;

/**
 * Class TypeController
 * @package Admin\Controller
 * 类型管理控制器
 */
class TypeController extends BaseController
{
    public function index () {
        $type = M("type");  // 实例化type对象
        $count = $type->count();  // 查询满足要求的记录数
        $page = new \Think\Page($count,5);  // 实例化分页类,两个参数分别是总记录数和每页显示分记录数
        $show = $page->show();  // 分页输出显示
        // 进行分页数据查询,注意limit方法的参数要使用Page类的属性
        $list = $type->order('t_id desc')->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign('list',$list);  // 赋值数据集
        // 追加样式
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
        $this->assign('page',$show);

        $this->display();
    }

    // 添加和编辑
    public function save() {
        // 获取要编辑的数据的t_id
        $t_id = I('get.t_id');

        if (IS_POST) {
            $data = I('post.');
            if ($t_id) {
                $data['t_id'] = $t_id;
            }
            $res = (new TypeModel())->store($data);
            if($res['valid']=='error'){
                $this->error($res['msg']);die;
            }else{
                $this->success($res['msg'],u('index'));die;
            }
        }

        // 获取要编辑的数据,再分配到save页面
        $oldData = m('type')->where("t_id='{$t_id}'")->find();
        $this->assign('oldData',$oldData);
        $this->display();
    }

    // 删除
    public function del () {
        // 获取要删除的数据的t_id
        $t_id = I('get.t_id');
        m('type')->where("t_id = {$t_id}")->delete();
        $this->success('删除成功',u('index'));
    }
}