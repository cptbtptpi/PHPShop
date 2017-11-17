<?php
/**
 * Created by PhpStorm.
 * User: RaoHonghua
 * Date: 2017/6/13
 * Time: 9:57
 * e-mail: 706805346@qq.com
 * QQ/Wechat: 706805346/hua706805346
 */

namespace Common\Controller;


use Think\Controller;

/**
 * Class ForeBaseController
 * @package Common\Controller
 * 前台公共控制器
 */
class ForeBaseController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $_SESSION['pageUrl'] = $_SERVER['PHP_SELF'];
        if (!$_SESSION['user']) {
            $this->success('请登录',u('home/login/index'));
        }
    }
}