<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/wancezy/JDshop/Public/Home/css/base.css">
    <link rel="stylesheet" href="/wancezy/JDshop/Public/Home/css/login.css">
</head>
<body>
<!--头部logo开始-->
<div class="w">
    <div id="logo" class="logo">
        <a href="">
            <img src="/wancezy/JDshop/Public/Home/images/login/logo.png" alt="" width="170" height="60">
        </a>
        <b></b>
    </div>
    <a href="" class="q-link">
        <b></b>登录界面,调查问卷
    </a>
</div>
<!--头部logo结束-->

<!--内容开始-->
<div id="content">
    <div class="login-wrap">
        <div class="w">
            <div class="login-form">
                <div class="login-tab login-tab-l">
                    <a href="javascript:;">扫码登录</a>
                </div>
                <div class="login-tab login-tab-r">
                    <a href="javascript:;" style="font-weight: 700;color: #e43937;">账户登录</a>
                </div>
                <div class="login-box" style="display: block;visibility: visible;">
                    <div class="mt tab-h"></div>
                    <div class="msg-wrap">
                        <!--<div class="msg-error"><b></b>请输入密码</div>-->
                    </div>
                    <div class="mc">
                        <div class="form">
                            <form action="" method="post">
                                <div class="item item-fore1">
                                    <label for="loginname" class="login-label name-label"></label>
                                    <input type="text" id="loginname" class="itxt" name="username" placeholder="邮箱/用户名/已验证手机">
                                    <!--<span class="clear-btn"></span>-->
                                </div>
                                <div id="entry" class="item item-fore2" style="visibility: visible;">
                                    <label for="nloginpwd" class="login-label pwd-label"></label>
                                    <input type="password" id="nloginpwd" class="itxt txt-error" name="password" placeholder="密码" >
                                    <!--<span class="clear-btn"></span>-->
                                    <!--<span class="capslock">-->
                                        <!--<b></b>-->
                                        <!--大写已锁定-->
                                    <!--</span>-->
                                </div>
                                <div class="item item-fore4">
                                    <div class="safe">
                                        <span></span>
                                        <span class="forget-pw-safe">
                                            <a href="">忘记密码</a>
                                        </span>
                                    </div>
                                </div>
                                <div class="item item-fore5">
                                    <div class="login-btn">
                                        <button type="submit" class="btn-img btn-entry" id="loginsubmit" style="outline: rgb(109, 109, 109) none 0px;">登&nbsp;&nbsp;&nbsp;&nbsp;录</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="qrcode-login" style="display: none; visibility: visible;">
                    <div class="mc">
                        <div class="qrcode-main">
                            <div class="qrcode-img" style="left: 64px;">
                                <img src="/wancezy/JDshop/Public/Home/images/login/show.png" alt="">
                                <div class="qrcode-error02 hide" id="J-qrcoderror" style="display: none;">
                                    <a href="">
                                        <span class="error-icon"></span>
                                        <div class="txt">网络开小差咯
                                            <span class="ml10">刷新二维码</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="qrcode-help" style="display: none;"></div>
                        </div>
                        <div class="qrcode-panel">
                            <ul>
                                <li class="fore1">
                                    <span>打开</span>
                                    <a href="">
                                        <span class="red">手机京东</span>
                                    </a>
                                </li>
                                <li>扫描二维码</li>
                            </ul>
                        </div>
                        <div class="coagent qr-coagent" id="qrCoagent">
                            <ul>
                                <li>
                                    <b class="noinput"></b>
                                    <em>免输入</em>
                                </li>
                                <li>
                                    <b class="faster"></b>
                                    <em>更快&nbsp;</em>
                                </li>
                                <li>
                                    <b class="safer"></b>
                                    <em>更安全</em>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="coagent" id="kbCoagent">
                    <ul>
                        <li>
                            <b></b>
                            <a href="" class="pdl">
                                <b class="QQ-icon"></b>
                                <span>QQ</span>
                            </a>
                            <span class="line">|</span>
                        </li>
                        <li>
                            <a href="" class="pdl">
                                <b class="weixin-icon"></b>
                                <span>微信</span>
                            </a>
                        </li>
                        <li class="extra-r">
                            <div class="regist-link">
                                <a href="<?php echo u('home/register/index');?>">
                                    <b></b>
                                    立即注册
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="login-banner" style="background: #8726b3;">
            <div class="w">
                <div id="banner-bg" class="i-inner" style="background: url(/wancezy/JDshop/Public/Home/images/login/login-banner-bg.jpg) 0 0 no-repeat;background-color: #8726b3;"></div>
            </div>
        </div>
    </div>
</div>
<!--内容结束-->

<!--底部开始-->
<div class="w">
    <div id="footer-2013">
        <div class="links">
            <a href="">关于我们</a>|
            <a href="">联系我们</a>|
            <a href="">人才招聘</a>|
            <a href="">商家入驻</a>|
            <a href="">广告服务</a>|
            <a href="">手机京东</a>|
            <a href="">友情链接</a>|
            <a href="">销售联盟</a>|
            <a href="">京东社区</a>|
            <a href="">京东公益</a>|
            <a href="">English Site</a>
        </div>
        <div class="copyright">
            Copyright&nbsp;©&nbsp;2004-2017&nbsp;&nbsp;京东JD.com&nbsp;版权所有
        </div>
    </div>
</div>
<!--底部结束-->

<script src="/wancezy/JDshop/Public/Home/js/jquery-1.11.1.min.js"></script>
<script src="/wancezy/JDshop/Public/Home/js/login/login.js"></script>
</body>
</html>