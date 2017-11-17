<?php
/**
 * Created by PhpStorm.
 * User: RaoHonghua
 * Date: 2017/6/13
 * Time: 9:45
 * e-mail: 706805346@qq.com
 * QQ/Wechat: 706805346/hua706805346
 */

namespace Home\Controller;

use Home\Model\LoginModel;
use Think\Controller;

/**
 * Class LoginController
 * @package Home\Controller
 * 登录控制器
 */
class LoginController extends Controller
{
    public function index () {
//        p($_SESSION['pageUrl']);
        if (IS_POST) {
            $data = I('post.');
            $res = (new LoginModel())->login($data);
            if ($res['valid'] == 'error') {
                $this->error($res['msg']);die();
            } else {
                if (isset($_SESSION['pageUrl'])) {
                    $this->success($res['msg'],$_SESSION['pageUrl']);die();
                } else {
                    $this->success($res['msg'],u('home/index/index'));die();
                }

            }
        }

        $this->display();
    }


}