<?php
/**
 * Created by PhpStorm.
 * User: RaoHonghua
 * Date: 2017/6/12
 * Time: 10:22
 * e-mail: 706805346@qq.com
 * QQ/Wechat: 706805346/hua706805346
 */

namespace Admin\Controller;


use Admin\Model\GoodsListModel;
use Common\Controller\BaseController;
use hdphp\weixin\build\pay;

/**
 * Class GoodsListController
 * @package Admin\Controller
 * 货品列表控制器
 */
class GoodsListController extends BaseController
{
    public function index () {
        // 分页
        $goods_list = M('goods_list'); // 实例化User对象
        $count = $goods_list->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count, 8);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $goods_list->limit($Page->firstRow . ',' . $Page->listRows)->select();
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

        $g_id = I('get.g_id');
        $oldData = m('goods_list')->where("jn_goods_g_id={$g_id}")->select();
        // 分割combine
        foreach ($oldData as $k=>$v) {
            $attr = explode('_',$v['combine']);
            $ga_id[] = explode('_',$v['combine']);
            $oldData[$k]['g_id'] = $g_id;  // 将g_id存到oldData中,因为后面很多地方要用到g_id
        }
        // 分割combine后，根据分割得到的ga_id获得所对应的规格的值
        foreach ($ga_id as $k=>$v) {
            foreach ($v as $kk=>$vv) {
                $oldData[$k]['goods_attr_name'][] = m('goods_attr')->where("ga_id={$vv}")->getField('goods_attr_name');
            }
        }
        // 获得ta_id，然后就得到attr_name
        for ($i=0; $i<count($attr); $i++) {
            $ta_id[$i] = m('goods_attr')->where("ga_id={$attr[$i]}")->getField('jn_type_attr_ta_id');
        }
        foreach ($ta_id as $k=>$v) {
            $attr_name[] = m('type_attr')->where("ta_id={$v}")->getField('attr_name');
        }

        $this->assign('attr_name',$attr_name);
        $this->assign('oldData',$oldData);

        $this->display();
    }

    /**
     * 货品添加方法
     */
    public function add () {
        $g_id = I('get.g_id');
        if (IS_POST) {
            $data = I('post.');
            $data['g_id'] = $g_id;
            $res = (new GoodsListModel())->store($data);
            if($res['valid']=='error'){
                $this->error($res['msg']);die;
            }else{
                $this->success($res['msg'],u('index',['g_id'=>$g_id]));die;
            }
        }

        // 通过属性列表获得ta_name和ta_id
        $oldData = m('type_attr')
                ->alias('ta')
                ->join("__GOODS__ g on ta.jn_type_t_id=g.jn_type_t_id")
                ->where("attr_type=1 and g_id={$g_id}")
                ->field(['ta.ta_id,ta.attr_name'])
                ->select();
        // 给上面的数据追加选中的商品属性
        foreach ($oldData as $k=>$v) {
            $oldData[$k]['select'] = m('goods_attr')->where("jn_type_attr_ta_id={$v['ta_id']} and jn_goods_g_id={$g_id}")->select();
        }
        $this->assign('oldData',$oldData);

        $this->display();
    }

    /**
     * 货品编辑方法
     */
    public function edit () {
        $gl_id = I('get.gl_id');
        $g_id = I('get.g_id');

        if (IS_POST) {
            $data = I('post.');
            $data['gl_id'] = $gl_id;
            $data['g_id'] = $g_id;
            $res = (new GoodsListModel())->edit($data);
            if($res['valid']=='error'){
                $this->error($res['msg']);die;
            }
            else{
                $this->success($res['msg'],u('index',['g_id'=>$g_id]));die;
            }
        }

        // 通过属性列表获得ta_name和ta_id
        $attrData = m('type_attr')
            ->alias('ta')
            ->join("__GOODS__ g on ta.jn_type_t_id=g.jn_type_t_id")
            ->where("attr_type=1 and g_id={$g_id}")
            ->field(['ta.ta_id,ta.attr_name'])
            ->select();
        // 给上面的数据追加选中的商品属性
        foreach ($attrData as $k=>$v) {
            $attrData[$k]['select'] = m('goods_attr')->where("jn_type_attr_ta_id={$v['ta_id']} and jn_goods_g_id={$g_id}")->select();
        }
        $this->assign('attrData',$attrData);

        // 获取旧数据
        $oldData = m('goods_list')->where("gl_id={$gl_id}")->find();
        $ga_id = explode('_',$oldData['combine']);
        $oldData['ga_id'] = $ga_id;
        $oldData['g_id'] = $g_id;

        $this->assign('oldData',$oldData);

        $this->display();
    }

    /**
     * 货品删除方法
     */
    public function del () {
        $gl_id = I('get.gl_id');
        $g_id = I('get.g_id');
        $res = m('goods_list')->where("gl_id={$gl_id}")->delete();
        if($res == 0){
            $this->error('删除失败');die;
        }else{
            $this->success('删除成功',u('index',['g_id'=>$g_id]));die;
        }
    }
}