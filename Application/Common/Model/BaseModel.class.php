<?php
/**
 * Created by PhpStorm.
 * User: RaoHonghua
 * Date: 2017/6/6
 * Time: 11:00
 * e-mail: 706805346@qq.com
 * QQ/Wechat: 706805346/hua706805346
 */

namespace Common\Model;


use Think\Model;

/**
 * Class BaseModel
 * @package Common\Model
 * 公共模型类
 */

class BaseModel extends Model
{
    // 操作(编辑或添加)
    public function store ($data) {
        $action = isset($data[$this->pk]) ? 'save' : 'add';
        //如果是添加 返回新增的主键id;如果是编辑 返回1或0
        $res = $this->$action($data);
        if (!$res) {
            return ['valid'=>'error','msg'=>$this->getError()];
        } else {
            return ['valid'=>'success','msg'=>'操作成功','res'=>$res];
        }
    }
}