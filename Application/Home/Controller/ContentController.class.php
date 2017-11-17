<?php
/**
 * Created by PhpStorm.
 * User: RaoHonghua
 * Date: 2017/6/15
 * Time: 10:15
 * e-mail: 706805346@qq.com
 * QQ/Wechat: 706805346/hua706805346
 */

namespace Home\Controller;


use hdphp\weixin\build\pay;
use Org\Util\Cart;
use Think\Controller;

/**
 * Class ContentController
 * @package Home\Controller
 * 商品详情控制器
 */
class ContentController extends Controller
{
    public function index () {
        $g_id = I('get.g_id');
        // 获取商品数据
        $goodsData = m('goods')->where("g_id={$g_id}")->find();
        $this->assign('goodsData', $goodsData);
        $brandData = m('brand')->where("b_id={$goodsData['jn_brand_b_id']}")->find();
        $this->assign('brandData',$brandData);
        $cateData = m('category')->where("c_id={$goodsData['jn_category_c_id']}")->find();
        $this->assign('cateData',$cateData);
        $fatherCateData = m('category')->where("c_id={$cateData['p_id']}")->find();
        $this->assign('fatherCateData',$fatherCateData);

        // 获取类型属性表的ta_id和attr_name以及选中的商品属性
        $specData = m('type_attr')->where("attr_type=1 and jn_type_t_id={$goodsData['jn_type_t_id']}")->field(['ta_id,attr_name'])->select();
        foreach ($specData as $k => $v) {
            $specData[$k]['select'] = m('goods_attr')
                ->where("jn_type_attr_ta_id={$v['ta_id']} and jn_goods_g_id={$g_id}")
                ->select();
        }
        $this->assign('specData', $specData);

        // 获取商品的图片
        $picData = m('goods_detail')->where("jn_goods_g_id={$g_id}")->find();
        $smallPic = explode('|',$picData['small_pic']);
        $this->assign('smallPic',$smallPic);
        $middlePic = explode('|',$picData['middle_pic']);
        $this->assign('middlePic',$middlePic);
        $bigPic = explode('|',$picData['big_pic']);
        $this->assign('bigPic',$bigPic);
        // 获取商品介绍
        $goodsDetail = $picData['goods_detail'];
        $this->assign('goodsDetail',$goodsDetail);
        $goodsAttrData = m('goods_attr')
            ->alias('ga')
            ->join("__TYPE_ATTR__ ta on ga.jn_type_attr_ta_id=ta.ta_id")
            ->where("attr_type=2 and jn_goods_g_id={$g_id}")
            ->select();
        $this->assign('goodsAttrData',$goodsAttrData);

        // 看了又看
        $seeMore = m('goods')->where("jn_brand_b_id={$goodsData['jn_brand_b_id']}")->order('rand()')->limit(3)->select();
        $this->assign('seeMore',$seeMore);

        // 店长推荐
        $tuijian = m('goods')->where("jn_brand_b_id={$goodsData['jn_brand_b_id']}")->order('rand()')->limit(6)->select();
        $this->assign('tuijian',$tuijian);


        $this->display();
    }

    // 加入购物车
    public function addCart() {
        if(IS_AJAX){
            $g_id = I('post.g_id');
            $goodsData = m('goods')->where("g_id={$g_id}")->find();
            $data = [
                'id' 		=> $g_id, // 商品 ID
                'name'		=>$goodsData['goods_name'],// 商品名称
                'num' 		=> I('post.num'), // 商品数量
                'price' 	=>$goodsData['market_price'], // 商品价格
                'options'   => I('post.options'),// 其他参数如价格、颜色、可以为数组或字符串
                'pic'		=>$goodsData['pic'],//商品logo
            ];
            (new Cart())->add($data);  // 加入购物车
            $this->ajaxReturn($_SESSION);
        }
    }





}