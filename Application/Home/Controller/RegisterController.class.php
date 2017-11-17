<?php
/**
 * Created by PhpStorm.
 * User: RaoHonghua
 * Date: 2017/6/13
 * Time: 10:28
 * e-mail: 706805346@qq.com
 * QQ/Wechat: 706805346/hua706805346
 */

namespace Home\Controller;


use Home\Model\RegisterModel;
use Think\Controller;

/**
 * Class RegisterController
 * @package Home\Controller
 * 用户注册控制器
 */
class RegisterController extends Controller
{
    public function index () {
        if (IS_POST) {
            $res = (new RegisterModel())->register();
            if ($res['valid'] == 'error') {
                $this->error($res['msg']);die();
            } else {
                $this->success($res['msg'],u('index/index'));die();
            }
        }

        $this->display();
    }

    /**
     * 验证码
     */
    public function code () {
        $config =    array(
            'fontSize'    =>    30,    // 验证码字体大小
            'length'      =>    4,     // 验证码位数
            'useNoise'    =>    false, // 关闭验证码杂点
        );
        $Verify =     new \Think\Verify($config);
        $Verify->entry();
    }
}