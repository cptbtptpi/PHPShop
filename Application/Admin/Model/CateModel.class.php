<?php
/**
 * Created by PhpStorm.
 * User: RaoHonghua
 * Date: 2017/6/7
 * Time: 9:07
 * e-mail: 706805346@qq.com
 * QQ/Wechat: 706805346/hua706805346
 */

namespace Admin\Model;


use Common\Model\BaseModel;

/**
 * Class CateModel
 * @package Admin\Model
 * 分类管理模型
 */

class CateModel extends BaseModel
{
    protected $pk = 'c_id';  // 主键名
    protected $tableName = 'category';  // 表名
    // 自动验证
    protected $_validate = [
        ['c_name','require','分类名称不能为空'],
        ['c_sort','require','分类排序不能为空']
    ];


    /**
     * @return array
     * 添加子类
     */
    public function addSon () {
        $postData = I('post.');
        $cate = M('category');
        $data['c_name'] = $postData['c_name'];
        $data['p_id'] = $postData['p_id'];
        $data['c_sort'] = $postData['c_sort'];
        $cate->data($data)->add();
        return ['valid'=>'success','msg'=>'添加成功'];
    }

    /**
     * 编辑
     */
    public function edit () {
        $postData = I('post.');
        $cate = M('category');
        $data['c_name'] = $postData['c_name'];
        $data['p_id'] = $postData['p_id'];
        $data['c_sort'] = $postData['c_sort'];
        $cate->where("c_id={$postData['c_id']}")->save($data);
        return ['valid'=>'success','msg'=>'编辑成功'];
    }

    /**
     * 添加顶级分类
     */
    public function add () {
        $postData = I('post.');
        $cate = M('category');
        $data['c_name'] = $postData['c_name'];
        $data['p_id'] = $postData['p_id'];
        $data['c_ceng'] = $postData['c_ceng'];
        $cate->data($data)->add();
        return ['valid'=>'success','msg'=>'添加成功'];
    }

    /**
     * 删除
     */
    public function del () {
        $c_id = I('get.c_id');
        // 获得要删除的数据
        $oldData = m('category')->where("c_id={$c_id}")->find();
        // 获得其所有的子分类
        $sonData = m('category')->where("p_id={$c_id}")->select();
        // 将其子分类的p_id变成自己的p_id
        foreach ($sonData as $k=>$v) {
            $cate = M('category');
            $data['p_id'] = $oldData['p_id'];
            if ($oldData['c_ceng'] != 0) {
                $data['c_ceng'] = $oldData['c_ceng'];
            }
            $cate->where("c_id={$v['c_id']}")->save($data);
        }
        // 进行删除操作
        $cate->where("c_id={$c_id}")->delete();

        return ['valid'=>'success','msg'=>'删除成功'];

    }
}