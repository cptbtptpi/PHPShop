<?php
/**
 * Created by PhpStorm.
 * User: RaoHonghua
 * Date: 2017/6/5
 * Time: 17:23
 * e-mail: 706805346@qq.com
 * QQ/Wechat: 706805346/hua706805346
 */

namespace Admin\Controller;


use Common\Controller\BaseController;

/**
 * Class IndexController
 * @package Admin\Controller
 * 后台首页管理控制器
 */

class IndexController extends BaseController
{
    public function index () {
        $this->display();
    }
}