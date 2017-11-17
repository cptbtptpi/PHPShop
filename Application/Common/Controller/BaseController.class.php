<?php
/**
 * Created by PhpStorm.
 * User: RaoHonghua
 * Date: 2017/6/5
 * Time: 17:25
 * e-mail: 706805346@qq.com
 * QQ/Wechat: 706805346/hua706805346
 */

namespace Common\Controller;

use Think\Controller;

/**
 * Class BaseController
 * @package Common\Controller
 * 后台公共控制器
 */

class BaseController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$_SESSION['admin']) {
            $this->success('请登录!',u('user/login'));die();
        }
    }
}