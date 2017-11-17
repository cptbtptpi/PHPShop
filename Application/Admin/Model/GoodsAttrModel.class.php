<?php
/**'-------------------------------------------------------------------
 * Author: 熊伟洋<chelious@foxmail.com>
 * WeChat: hello_McGrady
 *     QQ:434493420
 *  Motto: Hungry & Humble
 *   Date: 2017/6/8
 *   Time: 11:04
 *'-------------------------------------------------------------------*/

namespace Admin\Model;

use Common\Model\BaseModel;

/**
 * Class GoodsModel
 * @package Admin\Model
 * 商品属性模型
 */
class GoodsAttrModel extends BaseModel
{
	// 主键名称
	protected $pk = 'ga_id';
	// 数据表名（不包含表前缀）
	protected $tableName = 'goods_attr';
	// 自动验证定义
	protected $_validate = [
	];

}