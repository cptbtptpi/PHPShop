<?php
/**
 * Created by PhpStorm.
 * User: RaoHonghua
 * Date: 2017/6/7
 * Time: 9:05
 * e-mail: 706805346@qq.com
 * QQ/Wechat: 706805346/hua706805346
 */

namespace Admin\Controller;

use Admin\Model\CateModel;
use Common\Controller\BaseController;
use Org\Util\ArrTree;

/**
 * Class CateController
 * @package Admin\Controller
 * 分类管理控制器
 */

class CateController extends BaseController
{
    /**
     * 列表页
     */
    public function index () {
        $data = m('category')->select();
        // 树状,调用的是外部导入的函数
        $treeData = (new ArrTree())->tree($data,'c_name','c_id','p_id');
        $this->assign('treeData',$treeData);
        $this->display();
    }

    /**
     * 添加顶级分类
     */
    public function add () {
        if (IS_POST) {
            $res = (new CateModel())->add();
            if($res['valid']=='error'){
                $this->error($res['msg']);die;
            }else{
                $this->success($res['msg'],u('index'));die;
            }
        }
        $this->display();
    }

    /**
     * 添加子分类
     */
    public function addSon () {
        $c_id = I('get.c_id');
        // 获得要添加的子分类的数据
        $data = m('category')->where("c_id={$c_id}")->find();
        $c_name = $data['c_name'];
        $this->assign('c_name',$c_name)->assign('c_id',$c_id);
        if (IS_POST) {
            $res = (new CateModel())->addSon();
            if($res['valid']=='error'){
                $this->error($res['msg']);die;
            }else{
                $this->success($res['msg'],u('index'));die;
            }
        }

        $this->display();
    }

    /**
     * 编辑
     */
    public function edit () {
        $c_id = I('get.c_id');
        // 获得旧数据
        $oldData = m('category')->where("c_id={$c_id}")->find();
        // 获得父级的c_id,也就是自己的p_id,用于后面选中父分类
        $father_c_id = $oldData['p_id'];
        // 获得除了要编辑的分类和其子分类的数据
        $data = m('category')->where("c_id!={$c_id}")->select();
        // 树状,在下拉框的时候更好看
        $treeData = (new ArrTree())->tree($data,'c_name','c_id','p_id');
        $this->assign('treeData',$treeData)->assign('oldData',$oldData)->assign('father_c_id',$father_c_id);
        if (IS_POST) {
            $res = (new CateModel())->edit();
            if($res['valid']=='error'){
                $this->error($res['msg']);die;
            }else{
                $this->success($res['msg'],u('index'));die;
            }
        }
        $this->display();
    }

    /**
     * 删除
     */
    public function del () {
        $res = (new CateModel())->del();
        if($res['valid']=='error'){
            $this->error($res['msg']);die;
        }else{
            $this->success($res['msg'],u('index'));die;
        }
    }
}