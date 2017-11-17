<?php
/**
 * Created by PhpStorm.
 * User: RaoHonghua
 * Date: 2017/6/13
 * Time: 13:54
 * e-mail: 706805346@qq.com
 * QQ/Wechat: 706805346/hua706805346
 */

namespace Home\Model;


use Think\Model;

class LoginModel extends Model
{
    protected $pk = 'u_id';
    protected $tableName = 'user';
    protected $_validate = [
        ['username','required','用户名不能为空'],
        ['password','required','密码不能为空']
    ];

    public function login ($data) {
        // 进行自动验证
        if ($this->create()) {
            return ['valid'=>'error','msg'=>$this->getError()];
        } else {
//            $data = I('post.');
            // 对比用户名或密码
            $userData = $this->where("username='{$data['username']}' and password='{$data['password']}'")->find();
            if (!$userData) {
                return ['valid'=>'error','msg'=>'用户名或密码错误'];
            } else {
                $_SESSION['user'] = ['u_id'=>$userData['u_id'],'username'=>$userData['username']];
                $newData['login_time'] = time();
                $this->where("u_id={$userData['u_id']}")->save($newData);
                return ['valid'=>'success','msg'=>"登录成功"];
            }
        }

    }
}