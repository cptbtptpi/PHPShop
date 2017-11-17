<?php
/**
 * Created by PhpStorm.
 * User: RaoHonghua
 * Date: 2017/6/6
 * Time: 12:09
 * e-mail: 706805346@qq.com
 * QQ/Wechat: 706805346/hua706805346
 */

namespace Admin\Controller;


use Admin\Model\TypeAttrModel;
use Common\Controller\BaseController;

/**
 * Class TypeAttrController
 * @package Admin\Controller
 * 类型属性管理控制器
 */
class TypeAttrController extends BaseController
{
    public function index () {
        $t_id = I('get.t_id');

        $typeAttr = M('type_attr');  // 实例化type-attr对象
        $count = $typeAttr->count();  // 查询数量
        $page = new \Think\Page($count,5);  // 实例化分页类
        $show = $page->show();  // 分页输出显示
        // 分页数据查询
        $list = $typeAttr->where("jn_type_t_id = '{$t_id}'")->order('ta_id desc')->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign('list',$list);  // 分配变量

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

    /**
     * 编辑
     */
    public function edit () {
        $ta_id = I('get.ta_id');
        $oldData = m('type_attr')->where("ta_id='{$ta_id}'")->find();
        if (IS_POST) {
            $data = I('post.');
            $data['ta_id'] = $ta_id;
            $res = (new TypeAttrModel())->edit($data);
            if($res['valid']=='error'){
                $this->error($res['msg']);die;
            }else{
                $this->success($res['msg'],u('typeAttr/index',['t_id'=>$oldData['jn_type_t_id']]));die;
            }

        }

        $this->assign('oldData',$oldData);

        $this->display();
    }

    /**
     * 添加
     */
    public function add () {
        $jn_type_t_id = I('get.jn_type_t_id');

        if (IS_POST) {
            $data = I('post.');
            $data['jn_type_t_id'] = $jn_type_t_id;
            $res = (new TypeAttrModel())->adds($data);
            if($res['valid']=='error'){
                $this->error($res['msg']);die;
            }else{
                $this->success($res['msg'],u('typeAttr/index',['t_id'=>$jn_type_t_id]));die;
            }
        }

        $this->display();

    }

    /**
     * 删除
     */
    public function del () {
        $ta_id = I('get.ta_id');
        m('type_attr')->where("ta_id = {$ta_id}")->delete();
        $this->success('删除成功',u('index'));
    }
}