<?php
/**
 * Created by PhpStorm.
 * User: RaoHonghua
 * Date: 2017/6/5
 * Time: 17:06
 * e-mail: 706805346@qq.com
 * QQ/Wechat: 706805346/hua706805346
 */
/**
 * 拓展函数库
 */

/**
 * @param $data
 * 打印函数
 */
function p($data)
{
    echo "<pre style='padding: 15px;background: #ccc;border-radius: 6px'>";
    if (is_null($data)) {
        var_dump($data);
    } elseif (is_bool($data)) {
        var_dump($data);
    } else {
        print_r($data);
    }
    echo '</pre>';
}