<?php
/**
 * Created by PhpStorm.
 * User: RaoHonghua
 * Date: 2017/6/5
 * Time: 17:32
 * e-mail: 706805346@qq.com
 * QQ/Wechat: 706805346/hua706805346
 */

namespace Admin\Controller;
use Admin\Model\UserModel;
use Think\Controller;

/**
 * Class UserController
 * @package Admin\Controller
 * 用户管理控制器
 */

class UserController extends Controller
{
    // 登录
    public function login () {
        if (IS_POST) {
            $res = (new UserModel())->login();
            if ($res['valid'] == 'error') {
                $this->error($res['msg']);die();
            } else {
                $this->success($res['msg'],u('index/index'));die();
            }
        }


        $this->display();
    }

    // 验证码
    public function code()
    {
        $config = [
            'fontSize' => 30,    // 验证码字体大小
            'length' => 1,     // 验证码位数
            'useNoise' => false, // 关闭验证码杂点
            'imageW' => 150
        ];
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }

}