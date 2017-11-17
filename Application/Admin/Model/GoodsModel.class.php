<?php
/**
 * Created by PhpStorm.
 * User: RaoHonghua
 * Date: 2017/6/8
 * Time: 13:44
 * e-mail: 706805346@qq.com
 * QQ/Wechat: 706805346/hua706805346
 */

namespace Admin\Model;


use Common\Model\BaseModel;

class GoodsModel extends BaseModel
{
    protected $pk = 'g_id';
    protected $tableName = 'goods';
    protected $_validate = [
        ['goods_name','require','商品名不能为空'],
        ['goods_number','require','货号不能为空'],
        ['total_inventory','require','库存不能为空'],
        ['click_rate','require','点击次数不能为空'],
        ['mall_price','require','市场价不能为空'],
        ['market_price','require','商场价不能为空'],
    ];

    public function store($data) {
        // 商品添加
        if (!$this->create()) {
            return ['valid' => 'error', 'msg' => $this->getError()];
        }
        $jn_type_t_id = m('category')->where("c_id={$data['jn_category_c_id']}")->getField('jn_type_t_id');
        $data['jn_type_t_id'] = $jn_type_t_id;
        $data['launch_time'] = time();
        $data['jn_admin_a_id'] = $_SESSION['admin']['uid'];
        $g_id = $this->add($data);
        if (!$g_id) {
            return ['valid' => 'error', 'msg' => $this->getError()];
        }

        // 商品详情表添加
        $newSmallPath = ''; $newMiddlePath = ''; $newBigPath = '';
        foreach ($data['img'] as $v) {
            $image = new \Think\Image();
            //处理open所需路径
            $v = substr($v, 16);
            $image->open($v);
            //处理小的新路径
            $smallPath = dirname($v) . '/small_' . basename($v);
            $image->thumb(50, 65)->save($smallPath);
            //处理小图的保存路径
            $newSmallPath .= __ROOT__ . '/' . $smallPath . '|';
        }
        foreach ($data['img'] as $v) {
            $image = new \Think\Image();
            $v = substr($v,16);
            $image->open($v);
            //处理中图的新路径
            $middlePath = dirname($v) . '/middle_' . basename($v);
            $image->thumb(350, 450)->save($middlePath);
            //处理中图的保存路径
            $newMiddlePath .= __ROOT__ . '/' . $middlePath . '|';
        }
        foreach ($data['img'] as $v) {
            $image = new \Think\Image();
            $v = substr($v,16);
            $image->open($v);
            // 处理大图的新路径
            $bigPath = dirname($v) . '/big_' . basename($v);
            $image->thumb(800, 800)->save($bigPath);
            $newBigPath .= __ROOT__ . '/' . $bigPath . '|';
        }

        $goodsDetailData = [
            'small_pic' => rtrim($newSmallPath,'|'),
            'middle_pic' => rtrim($newMiddlePath,'|'),
            'big_pic' => rtrim($newBigPath,'|'),
            'goods_detail' => $data['goods_detail'],
            'service' => $data['service'],
            'jn_goods_g_id' => $g_id
        ];
        $goodsDetailModel = new GoodsDetailModel();
        $goodsDetailModel->add($goodsDetailData);


        // 商品属性表添加(注意加上验证)
        // 添加商品属性
        $goodsAttrModel = new GoodsAttrModel();
        foreach ($data['attr'] as $k=>$v){
            if ($v){
                $attrData = [
                    'goods_attr_name'=>$v,
                    'added'=>0,
                    'jn_type_attr_ta_id'=>$k,
                    'jn_goods_g_id'=>$g_id,
                ];
                $goodsAttrModel->add($attrData);
            }
        }
        // 添加商品规格
        foreach ($data['spec'] as $k=>$v){
            foreach ($v['color'] as $kk=>$vv){
                $specData = [
                    'goods_attr_name'=>$vv,
                    'added'=>$v['added'][$kk],
                    'jn_type_attr_ta_id'=>$k,
                    'jn_goods_g_id'=>$g_id,
                ];
                $goodsAttrModel->add($specData);
            }
        }
        return ['valid' => 'success', 'msg' => '添加成功'];
    }

    /**
     * 商品编辑
     */
    public function edit ($data) {
        // 商品表编辑
        if (!$this->create()) {
            return ['valid' => 'error', 'msg' => $this->getError()];
        }
        $jn_type_t_id = m('category')->where("c_id={$data['jn_category_c_id']}")->getField('jn_type_t_id');
        $newData['goods_name'] = $data['goods_name'];
        $newData['goods_number'] = $data['goods_number'];
        $newData['goods_unit'] = $data['goods_unit'];
        $newData['market_price'] = $data['market_price'];
        $newData['mall_price'] = $data['mall_price'];
        $newData['total_inventory'] = $data['total_inventory'];
        $newData['pic'] = $data['pic'];
        $newData['click_rate'] = $data['click_rate'];
        $newData['launch_time'] = time();
        $newData['jn_category_c_id'] = $data['jn_category_c_id'];
        $newData['jn_brand_b_id'] = $data['jn_brand_b_id'];
        $newData['jn_type_t_id'] = $jn_type_t_id;
        $goodsRes = $this->where("g_id={$data['g_id']}")->save($newData);
        if (!$goodsRes) {
            return ['valid' => 'error', 'msg' => $this->getError()];
        }

        // 商品详情表编辑
        $newSmallPath = ''; $newMiddlePath = ''; $newBigPath = '';
        foreach ($data['img'] as $v) {
            $image = new \Think\Image();
            //处理open所需路径
            $v = substr($v, 16);
            $image->open($v);
            //处理小的新路径
            $smallPath = dirname($v) . '/' . basename($v);

            $image->thumb(150, 150)->save($smallPath);
            //处理小图的保存路径
            $newSmallPath .= __ROOT__ . '/' . $smallPath . '|';

            //处理中图的新路径
            $middlePath = dirname($v) . '/' . basename($v);
            $image->thumb(150, 150)->save($middlePath);
            //处理中图的保存路径
            $newMiddlePath .= __ROOT__ . '/' . $middlePath . '|';

            // 处理大图的新路径
            $bigPath = dirname($v) . '/' . basename($v);
            $image->thumb(150, 150)->save($bigPath);
            $newBigPath .= __ROOT__ . '/' . $bigPath . '|';
        }

        $goodsDetailData = [
            'small_pic' => rtrim($newSmallPath,'|'),
            'middle_pic' => rtrim($newMiddlePath,'|'),
            'big_pic' => rtrim($newBigPath,'|'),
            'goods_detail' => $data['goods_detail'],
            'service' => $data['service'],
        ];
        $goodsDetailModel = new GoodsDetailModel();
        $goodsDetailModel->where("jn_goods_g_id={$data['g_id']}")->save($goodsDetailData);

        // 商品属性表编辑
        // 编辑商品属性
        $goodsAttrModel = new GoodsAttrModel();
        $goodsAttrModel->where("jn_goods_g_id={$data['g_id']}")->delete();

        foreach ($data['attr'] as $k=>$v){
            if ($v){
                $attrData = [
                    'goods_attr_name'=>$v,
                    'added'=>0,
                    'jn_type_attr_ta_id'=>$k,
                    'jn_goods_g_id'=>$data['g_id'],
                ];
                $goodsAttrModel->add($attrData);
            }
        }
        // 添加商品规格
        foreach ($data['spec'] as $k=>$v){
            foreach ($v['color'] as $kk=>$vv){
                $specData = [
                    'goods_attr_name'=>$vv,
                    'added'=>$v['added'][$kk],
                    'jn_type_attr_ta_id'=>$k,
                    'jn_goods_g_id'=>$data['g_id'],
                ];
                $goodsAttrModel->add($specData);
            }
        }


        return ['valid' => 'success', 'msg' => '编辑成功'];
    }

}