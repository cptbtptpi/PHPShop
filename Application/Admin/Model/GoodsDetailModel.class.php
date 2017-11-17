<?php
/**
 * Created by PhpStorm.
 * User: RaoHonghua
 * Date: 2017/6/8
 * Time: 21:42
 * e-mail: 706805346@qq.com
 * QQ/Wechat: 706805346/hua706805346
 */

namespace Admin\Model;


use Common\Model\BaseModel;

class GoodsDetailModel extends BaseModel
{
    // 主键名称
    protected $pk = 'gd_id';
    // 数据表名（不包含表前缀）
    protected $tableName = 'goods_detail';
    // 自动验证定义
    protected $_validate = [
        ['service', 'require', '售后服务不能为空'],
    ];

}