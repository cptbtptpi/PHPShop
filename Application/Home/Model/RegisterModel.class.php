<?php
/**
 * Created by PhpStorm.
 * User: RaoHonghua
 * Date: 2017/6/13
 * Time: 13:53
 * e-mail: 706805346@qq.com
 * QQ/Wechat: 706805346/hua706805346
 */

namespace Home\Model;


use Think\Model;

class RegisterModel extends Model
{
    protected $pk = 'u_id';
    protected $tableName = 'user';
//    protected $_validate = [
//        ['username','required','用户名不能为空'],
//        ['password','required','密码不能为空'],
//        ['confirmPassword','required','验证密码不能为空'],
//        ['phone','required','手机号码不能为空']
//    ];

    public function register () {
        if (!$this->create()) {
            return ['valid' => 'error', 'msg' => $this->getError()];
        } else {
            $data = I('post.');
            // 对比验证码
            $res = $this->check_verify($data['code']);
            if (!$res) {
                return ['valid'=>'error','msg'=>'验证码错误'];
            }

            $newData['username'] = $data['username'];
            $newData['password'] = $data['password'];
            $newData['mobilephone'] = $data['phone'];
            $newData['login_time'] = time();
            $newData['account_balance'] = 10000;
            $userData = $this->add($newData);
            if (!$userData) {
                return ['valid'=>'error','msg'=>'注册失败'];
            } else {
                $_SESSION['user'] = ['username'=>$data['username']];
                return ['valid'=>'success','msg'=>"注册成功"];
            }
        }
    }

    // 检测输入的验证码是否正确
    public function check_verify ($code,$id='') {
        $verify = new \Think\Verify();
        return $verify->check($code,$id);
    }
}