<?php
/**
 * Created by PhpStorm.
 * User: RaoHonghua
 * Date: 2017/6/8
 * Time: 13:39
 * e-mail: 706805346@qq.com
 * QQ/Wechat: 706805346/hua706805346
 */

namespace Admin\Controller;

use Admin\Model\GoodsModel;
use Common\Controller\BaseController;
use Org\Util\ArrTree;

/**
 * Class GoodsController
 * @package Admin\Controller
 * 商品管理控制器
 */

class GoodsController extends BaseController
{
    private $model;
    public function __construct()
    {
        $this->model = new GoodsModel();
        parent::__construct();
    }

    public function index () {
        $Goods = M('goods'); // 实例化User对象
        $count = $Goods->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count, 8);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $Goods->order('launch_time desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign('list', $list);// 赋值数据集
        //给追加样式
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
        $this->assign('page', $show);// 赋值分页输出
        $this->display();
    }

    /**
     * 添加商品
     */
    public function add () {

        if (IS_POST) {
            $data = I('post.');
            $res = $this->model->store($data);
            if($res['valid']=='error'){
                $this->error($res['msg']);die;
            }else{
                $this->success($res['msg'],u('index'));die;
            }
        }

        // 处理所属分类
        $cateData = (new ArrTree())->tree(m('category')->select(),'c_name','c_id','p_id');
        $this->assign('cateData',$cateData);
        // 处理所属品牌
        $brandData = m('brand')->select();
        $this->assign('brandData',$brandData);

        $this->display();

    }

    /**
     * 获得选中的分类对应的类型属性
     */
    public function getAttr () {
        if (IS_AJAX) {
            $t_id = I('post.t_id');
            $typeAttrData = m('type_attr')->where("jn_type_t_id={$t_id}")->select();
            // 将获得的属性值根据','分成数组
            foreach ($typeAttrData as $k=>$v) {
                $typeAttrData[$k]['attr_value'] = explode(',',$v['attr_value']);
            }
            $this->ajaxReturn($typeAttrData);
        }
    }

    /**
     * 编辑商品
     */
    public function edit () {

        $g_id = I('get.g_id');

        if (IS_POST) {
            $data = I('post.');
            $data['g_id'] = $g_id;
            $res = $this->model->edit($data);
            if($res['valid']=='error'){
                $this->error($res['msg']);die;
            }else{
                $this->success($res['msg'],u('index'));die;
            }
        }

        // 获取旧数据
        $oldData = m('goods')->alias('g')
            ->join('__GOODS_DETAIL__ gd ON g.g_id=gd.jn_goods_g_id')
            ->where("g.g_id={$g_id}")->find();
        $this->assign('oldData',$oldData);

        // 处理所属分类
        $cateData = (new ArrTree())->tree(m('category')->select(),'c_name','c_id',"p_id");
        $this->assign('cateData',$cateData);

        // 处理品牌
        $brandData = m('brand')->select();
        $this->assign('brandData',$brandData);

        // 处理商品属性
        $typeAttr = m('type_attr')->where("jn_type_t_id={$oldData['jn_type_t_id']} and attr_type=2")->select();
        foreach ($typeAttr as $k=>$v) {
            $typeAttr[$k]['attr_value'] = explode(',',$v['attr_value']);
        }
        $this->assign('typeAttr',$typeAttr);
        // 获取商品选中的属性
        $checkAttr = m('goods_attr')->where("jn_goods_g_id=$g_id")->getField('goods_attr_name',true);
        $this->assign('checkAttr',$checkAttr);

        // 处理商品规格(类型属性表和商品属性表关联)
        $typeSpec = m('type_attr')
            ->alias('ta')
            ->join("__GOODS_ATTR__ ga on ta.ta_id=ga.jn_type_attr_ta_id")
            ->where("attr_type=1 and jn_goods_g_id={$g_id}")
            ->select();
        foreach ($typeSpec as $k=>$v){
            $typeSpec[$k]['attr_value'] = explode(',',$v['attr_value']);
        }
        $this->assign('typeSpec',$typeSpec);

        $this->display();
    }

    /**
     * 删除商品
     */
    public function del () {
        $g_id = I('get.g_id');
        m('goods')->where("g_id={$g_id}")->delete();
        m('goods_detail')->where("jn_goods_g_id={$g_id}")->delete();
        m('goods_attr')->where("jn_goods_g_id={$g_id}")->delete();
        $this->success('删除成功',u('index'));die;
    }


}