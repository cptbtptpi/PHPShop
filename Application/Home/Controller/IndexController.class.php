<?php
namespace Home\Controller;
use Org\Util\ArrTree;
use Think\Controller;

/**
 * Class IndexController
 * @package Home\Controller
 * 首页控制器
 */
class IndexController extends Controller {
    public function index(){
        // 取出分类数据,左边二级菜单
        $cateData = m('category')->select();
        $levelData = (new ArrTree())->channelLevel($cateData,0,'','c_id','p_id');
        $this->assign('levelData',$levelData);

        // 获取分类菜单品牌图片
        $brandData = m('brand')->field('b_logo')->limit(8)->select();
//        p($brandData);die;
        $this->assign('brandData',$brandData);

        // 获取还没逛够商品信息
        $goodsData = m('goods')->order('click_rate desc')->limit(10)->select();
//        p($goodsData);die;
        $this->assign('goodsData',$goodsData);

        // 京东秒杀商品信息
        $seckillData = m('goods')->where("g_area='京东秒杀'")->limit(5)->select();
        $this->assign('seckillData',$seckillData);

        // fbt商品信息
        // 手机信息
        $fbtPhoneData = m('goods')->where("jn_type_t_id=11")->limit(3)->select();
        $this->assign('fbtPhoneData',$fbtPhoneData);
        // 女装信息
        $femaleData = m('goods')->where("jn_category_c_id=95")->limit(3)->select();
        $this->assign('femaleData',$femaleData);
        // T恤和POLO衫
        $tpData = m('goods')->order('click_rate desc')->limit(6)->select();
        $this->assign('tpData',$tpData);

        // T恤排行榜
        $txuData = m('goods')->where("jn_category_c_id=89 or jn_category_c_id=192")->order('click_rate desc')->limit(6)->select();
        $this->assign('txuData',$txuData);

        // 爱生活
        // 服装
        $femaleClotheData = m('goods')->where("jn_category_c_id=192")->order('g_id desc')->limit(4)->select();
        $this->assign('femaleClotheData',$femaleClotheData);
        $maleClotheData = m('goods')->where("jn_category_c_id=89 or jn_category_c_id=191")->order('rand()')->limit(4)->select();
        $this->assign('maleClotheData',$maleClotheData);

        // 电脑
        $computerData = m('goods')->where("jn_type_t_id=10")->limit(4)->select();
        $this->assign('computerData',$computerData);
        // 手机
        $phoneData = m('goods')->where("jn_type_t_id=11")->limit(4)->select();
        $this->assign('phoneData',$phoneData);

        // 品牌
        $clotheBrand = m('brand')->where("b_ceng=9")->limit(12)->select();
        $this->assign('clotheBrand',$clotheBrand);
        $computerBrand = m('brand')->where("b_ceng=2")->limit(6)->select();
        $this->assign('computerBrand',$computerBrand);
        $phoneBrand = m('brand')->where("b_ceng=1")->limit(6)->select();
        $this->assign('phoneBrand',$phoneBrand);


        $this->display();
    }
}