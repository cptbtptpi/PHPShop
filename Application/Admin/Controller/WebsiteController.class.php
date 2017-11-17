<?php
/**
 * Created by PhpStorm.
 * User: RaoHonghua
 * Date: 2017/6/5
 * Time: 19:59
 * e-mail: 706805346@qq.com
 * QQ/Wechat: 706805346/hua706805346
 */

namespace Admin\Controller;


use Common\Controller\BaseController;

/**
 * Class WebsiteController
 * @package Admin\Controller
 * 网站配置控制器
 */
class WebsiteController extends BaseController
{
    public function index () {
        $data = m('website')->select();
        // 分配变量
        $this->assign('data',$data);
        if (IS_POST) {
            $webData = I('post.');
            $website = m('website');
            foreach ($webData as $k=>$v) {
                $data['w_id'] = $k;
                $data['w_value'] = $v;
                $website->save($data);
            }
            $this->success('修改成功',u('website/index'));die();
        }
        $this->display();
    }
}