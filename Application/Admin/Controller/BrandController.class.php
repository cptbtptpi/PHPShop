<?php
/**
 * Created by PhpStorm.
 * User: RaoHonghua
 * Date: 2017/6/7
 * Time: 16:43
 * e-mail: 706805346@qq.com
 * QQ/Wechat: 706805346/hua706805346
 */

namespace Admin\Controller;



use Admin\Model\BrandModel;
use Common\Controller\BaseController;

/**
 * Class BrandController
 * @package Admin\Controller
 * 品牌控制器
 */
class BrandController extends BaseController
{
    public function index () {

        $bData = M('brand'); // 实例化User对象
        $count = $bData->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,8);// 实例化分页类 传入总记录数和每页显示的记录数(8)
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $bData->order('b_id')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集

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
        $this->display(); // 输出模板
    }

    /**
     * 添加与编辑
     */
    public function save () {
    //获得要编辑的b_id
        $b_id=I('get.b_id');

        if(IS_POST){
            $data=I('post.');
            //如果是编辑,给数据加上bid
            if($b_id){
                $data['b_id'] = $b_id;
            }
            $res=(new BrandModel())->store($data);
            if($res['valid']=='error'){
                $this->error($res['msg']);die;
            }else{
                $this->success($res['msg'],u('index'));die;
            }


        }

        //如果是编辑的话,获取旧数据
        if($b_id){
            $oldData=m('brand')->where("b_id={$b_id}")->find();
            //分配变量
            $this->assign('oldData',$oldData);
        }
        $this->display();
    }

    /**
     * 删除
     */
    public function del () {
        //获取要删的b_id
        $b_id = I('get.b_id');

        $brand = m('brand');
        $brand->where("b_id={$b_id}")->delete();

        $this->success('删除成功!',u('index'));die;
    }

}