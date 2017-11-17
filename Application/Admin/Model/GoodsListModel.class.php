<?php
/**
 * Created by PhpStorm.
 * User: RaoHonghua
 * Date: 2017/6/12
 * Time: 14:00
 * e-mail: 706805346@qq.com
 * QQ/Wechat: 706805346/hua706805346
 */

namespace Admin\Model;




use Common\Model\BaseModel;

class GoodsListModel extends BaseModel
{
    protected $pk = 'gl_id';
    protected $tableName = 'goods_list';
    protected $_validate = [
        ['goods_number','require','货号不能为空'],
        ['inventory','require','点击次数不能为空'],

    ];

    /**
     * 添加方法
     */
    public function store ($data) {
        if (!$this->create()) {
            return ['valid' => 'error', 'msg' => $this->getError()];
        }

        $combine = '';
        foreach ($data['combine'] as $k=>$v) {
            $combine .= '_' . $v;
            $combine = ltrim($combine,'_');
        }
        // 验证是否会有相同的combine
        $existData = $this->where("jn_goods_g_id={$data['g_id']}")->select();
        foreach ($existData as $k=>$v) {
            if ($combine == $v['combine']) {
                return ['valid'=>'error','msg'=>'该规格已存在,请勿重复添加'];
            }
        }
        $newData['combine'] = $combine;
        $newData['inventory'] = $data['inventory'];
        $newData['goods_number'] = $data['goods_number'];
        $newData['jn_goods_g_id'] = $data['g_id'];
        $res = $this->add($newData);
        if (!$res) {
            return ['valid' => 'error', 'msg' => $this->getError()];
        }

        return ['valid' => 'success', 'msg' => '添加成功'];
        
    }

    /**
     * 编辑方法
     */
    public function edit ($data) {
        $combine = '';
        foreach ($data['combine'] as $k=>$v) {
            $combine .= '_' . $v;
            $combine = ltrim($combine,'_');
        }
        // 验证是否会有相同的combine,如果有,就删除旧的,存入新的
        $existData = $this->where("jn_goods_g_id={$data['g_id']}")->select();
        foreach ($existData as $k=>$v) {
            if ($combine == $v['combine'] && $data['gl_id'] != $v['gl_id']) {
                return ['valid'=>'error','msg'=>'您想编辑的规格已存在,请在对应的规格下编辑'];
            }
        }
        $newData['combine'] = $combine;
        $newData['inventory'] = $data['inventory'];
        $newData['goods_number'] = $data['goods_number'];

        $res = $this->where("gl_id={$data['gl_id']}")->save($newData);
        if (!$res) {
            return ['valid' => 'error', 'msg' => $this->getError()];
        }

        return ['valid' => 'success', 'msg' => '编辑成功'];
    }

}