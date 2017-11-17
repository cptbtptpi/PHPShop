<?php
/**
 * Created by PhpStorm.
 * User: RaoHonghua
 * Date: 2017/6/5
 * Time: 17:35
 * e-mail: 706805346@qq.com
 * QQ/Wechat: 706805346/hua706805346
 */

namespace Admin\Model;


use Think\Model;

/**
 * Class UserModel
 * @package Admin\Model
 * 用户模型管理
 */

class UserModel extends Model
{
    protected $pk = 'a_id';
    protected $tableName = 'admin';
    // 自动验证定义
    protected $_validate = [
        ['username','require','用户名不能为空'],
    ];

    // 验证登录
    public function login () {
        // 进行自动验证
        if ($this->create()) {
            return ['valid' => 'error', 'msg' => $this->getError()];
        } else {
            $data = I('post.');
            // 对比验证码
            $res = $this->check_verify($data['code']);
            if (!$res) {
                return ['valid'=>'error','msg'=>'验证码错误'];
            }
            // 对比用户名和密码
            $userData = m('admin')->where("a_name = '{$data['username']}' and a_password = '{$data['password']}'")->find();
            if (!$userData) {
                return ['valid'=>'error','msg'=>'用户名或密码错误'];
            } else {
                $_SESSION['admin'] = ['uid'=>$userData['a_id'],'username'=>$userData['a_name']];
                return ['valid'=>'success','msg'=>"登录成功"];
            }
        }
    }

    // 检测用户输入的验证码是否正确,$code为用户输入的验证码
    public function check_verify($code,$id='') {
        $verify = new \Think\Verify();
        return $verify->check($code,$id);
    }

}