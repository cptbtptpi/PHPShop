<?php
/**
 * Created by PhpStorm.
 * User: RaoHonghua
 * Date: 2017/6/19
 * Time: 9:35
 * e-mail: 706805346@qq.com
 * QQ/Wechat: 706805346/hua706805346
 */

namespace Home\Controller;


use Think\Controller;

/**
 * Class ListController
 * @package Home\Controller
 * 列表页控制器
 */
class ListController extends Controller
{
    public function index () {
        $c_id = I('get.c_id');
        $data = m('category')->select();
        // 获得自己和自己的父级
        $fatherId = $this->getFather($data,$c_id);
        $fatherId = array_reverse($fatherId);
        foreach ($fatherId as $k=>$v) {
            $fatherData[$k]['id'] = $v;
            $fatherData[$k]['name'] = m('category')->where("c_id={$v}")->getField('c_name');
        }
        $this->assign('fatherData',$fatherData);

        // 获得自己和自己的子集
        $c_ids = $this->getSon($data,$c_id);
        $c_ids[] = $c_id;

        // 通过c_id获取g_id
        $g_ids = m('goods')->where(['jn_category_c_id'=>['in',$c_ids]])->getField('g_id',true);

        // 处理g_id对应的商品属性
        if (isset($g_ids)) {
            // 操作商品属性表,找见商品选中的属性
            $goodsAttr = m('goods_attr')
                ->where(['jn_goods_g_id'=>['in',$g_ids]])
                ->group('goods_attr_name')
                ->select();

            // 重组数组,将ta_id值一样的数据放在一起
            $arr = [];
            foreach ($goodsAttr as $k=>$v) {
                $arr[$v['jn_type_attr_ta_id']][] = $v;
            }

            // 重组数组,将ta_id转化为对应的类型属性名称
            $newArr = [];
            foreach ($arr as $k=>$v) {
                $newArr[] = [
                    'name'=>m('type_attr')->where("ta_id={$k}")->getField('attr_name'),
                    'value'=>$v
                ];
            }
            $this->assign('newArr',$newArr);

            // 进行筛选
            $param = isset($_GET['param']) ? explode('_',$_GET['param']) : array_fill(0,count($newArr),0);
            $this->assign('param',$param);

            $filter_g_ids = [];
            foreach ($param as $k=>$v) {
                if ($v) {
                    // 找见ga_id对应的商品的属性值
                    $goods_attr_name = m('goods_attr')->where("ga_id={$v}")->getField('goods_attr_name');
                    $filter_g_ids[] = m('goods_attr')->where("goods_attr_name='{$goods_attr_name}'")->getField('jn_goods_g_id',true);
                }
            }

            // 如果存在$filter_g_ids,说明有筛选动作
            if ($filter_g_ids) {
                foreach ($filter_g_ids as $k=>$v) {
                    // 首先拿数组的第0号元素
                    $filter_g_ids_first = $filter_g_ids[0];
                    // 取$filter_g_ids中的交集
                    $final_g_ids = array_intersect($filter_g_ids_first,$v);
                }
                // 再拿在$filter_g_ids中获得的交集与总的$g_ids取交集
                $final_g_ids = array_intersect($final_g_ids,$g_ids);
            } else {
                // 没有点击筛选 默认是不限
                $final_g_ids = $g_ids;
            }
        } else {
            // 该分类没有对应的商品
            $final_g_ids = [];
        }

        // 获取对应商品的数据
        if ($final_g_ids) {
            $goodsData = m('goods')->where(['g_id'=>['in',$final_g_ids]])->select();
        } else {
            $goodsData = [];
        }
        foreach ($goodsData as $k=>$v) {
            $goodsData[$k]['brand_name'] = m('brand')->where("b_id={$v['jn_brand_b_id']}")->getField('b_name');
        }
        $this->assign('goodsData',$goodsData);



        $this->display();
    }

    // 得到父级的方法
    public function getFather ($data,$c_id) {
        static $father = [];
        foreach ($data as $v) {
            if ($v['c_id'] == $c_id) {
                $father[] = $v['c_id'];
                $this->getFather($data,$v['p_id']);
            }
        }
        return $father;
    }

    // 得到子集的方法
    public function getSon ($data,$c_id) {
        static $son = [];
        foreach ($data as $k=>$v) {
            if ($v['p_id'] == $c_id) {
                $son[] = $v['c_id'];
                $this->getSon($data,$v['c_id']);
            }
        }
        return $son;
    }



}