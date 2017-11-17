<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../../../Public/Home/css/base.css">
    <link rel="stylesheet" href="../../../Public/Home/css/regist.css">
</head>
<body class="regist">
<!--头部开始-->
<div id="header" class="header">
    <div class="logo-con w">
        <a href="" class="logo"></a>
        <div class="logo-title">欢迎注册</div>
        <div class="have-account">
            <span>已有账号?</span>
            <a href="">请登录</a>
        </div>
    </div>
</div>
<!--头部结束-->

<!--中间内容开始-->
<div class="container w">
    <div class="main clearfix">
        <div class="reg-form fl">
            <form class="form" action="" method="post">
                <div class="form-item">
                    <label class="form-label" for="form-account">用户名</label>
                    <!--<span class="form-txt">您的账户名和登录名</span>-->
                    <input class="form-input" type="text" name="username" id="form-account" placeholder="您的账户名和登录名">
                    <!--<i class="i-status"></i>-->
                </div>
                <div class="input-tip">
                    <!--<span id="form-account-error" class="error">-->
                        <!--<i class="i-error" style="display: none;"></i>-->
                        <!--<i class="i-def"></i>-->
                        <!--<span class="error-txt">支持中文、字母、数字、“-”“_”的组合，4-20个字符</span>-->
                    <!--</span>-->
                </div>
                <div class="form-item">
                    <label class="form-label" for="form-password">设置密码</label>
                    <!--<span class="form-txt">建议至少使用两种字符组合</span>-->
                    <input class="form-input" type="password" name="password" id="form-password" placeholder="建议至少使用两种字符组合">
                    <i class="i-status"></i>
                </div>
                <div class="input-tip">
                    <!--<span id="form-password-error" class="error">-->
                        <!--<i class="i-error" style="display: none;"></i>-->
                        <!--<i class="i-def"></i>-->
                        <!--<span class="error-txt">建议使用字母、数字和符号两种及以上的组合，6-20个字符</span>-->
                    <!--</span>-->
                </div>
                <div class="form-item">
                    <label class="form-label" for="form-confirmPassword">确认密码</label>
                    <!--<span class="form-txt">请再次输入密码</span>-->
                    <input class="form-input" type="password" name="confirmPassword" id="form-confirmPassword" placeholder="请再次输入密码">
                    <i class="i-status"></i>
                </div>
                <div class="input-tip">
                    <!--<span id="form-confirmPassword-error" class="error">-->
                        <!--<i class="i-error" style="display: none;"></i>-->
                        <!--<i class="i-def"></i>-->
                        <!--<span class="error-txt">请再次输入密码</span>-->
                    <!--</span>-->
                </div>
                <div class="form-item form-item-phone">
                    <label for="phone" class="select-country">
                        中国 0086
                        <a href="" class="arrow"></a>
                    </label>
                    <input type="text" name="phone" id="phone" class="field" placeholder="建议使用常用手机" maxlength="11">
                    <i class="i-status"></i>
                </div>
                <div class="input-tip"></div>
                <div class="form-item form-item-authcode">
                    <label for="authcode">验证码</label>
                    <input type="text" name="code" id="authcode" class="field form-authcode" placeholder="请输入验证码">
                    <img src="<?php echo u('register/code');?>" class="img-code" alt="" onclick="this.src=this.src+'?c='+Math.random()">
                </div>
                <div class="input-tip"></div>
                <div class="form-item form-item-phonecode">
                    <label for="phonecode">手机验证码</label>
                    <input type="text" name="" id="phonecode" class="field phonecode" maxlength="6" placeholder="请输入手机验证码">
                    <button id="getPhoneCode" class="btn-phonecode" type="button">获取验证码</button>
                </div>
                <div class="input-tip"></div>
                <div class="form-agreen">
                    <div>
                        <input type="checkbox" name="agreen" checked="">阅读并同意
                        <a href="javascript:;" id="protocol">《京东用户注册协议》</a>
                        <a href="javascript:;" class="blue" id="privacyProtocolTrigger">《隐私政策》</a>
                    </div>
                </div>
                <div class="input-tip">
                    <span></span>
                </div>
                <div>
                    <button type="submit" class="btn-register">立即注册</button>
                </div>
            </form>
        </div>

        <div class="reg-other">
            <div class="company-reg">
                <a href="" class="company-reg-lk">
                    <i class="i-company"></i>
                    <span>企业用户注册</span>
                </a>
            </div>
            <div class="inter-cust">
                <a href="" class="inter-cust-lk">
                    <i class="i-global"></i>
                    <span class="inter-cust-name">
                    INTERNATIONAL
                    <br>
                    CUSTOMERS
                </span>
                </a>
            </div>
        </div>

    </div>
</div>
<!--中间内容结束-->

<!--右边悬浮调查问卷开始-->
<a href="" class="feedback" style="margin-top: -85px; position: fixed; right: 0px; bottom: 50%;"></a>
<!--右边悬浮调查问卷结束-->

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


</body>
</html>