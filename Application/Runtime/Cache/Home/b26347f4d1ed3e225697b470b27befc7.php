<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/wancezy/JDshop/Public/Home/css/base.css">
    <link rel="stylesheet" href="/wancezy/JDshop/Public/Home/css/payment.css">
    <script src="/wancezy/JDshop/Public/Home/js/jquery-1.11.1.min.js"></script>
    <script>
        $(function () {
            $(".pv-button .ui-button").click(function () {
                var password = $(".ui-shortPwd").val();
                var i_id = $("input[name='i_id']").val();
                if (password == "") {
                    alert("您还未输入密码");
                } else {
                    $.ajax({
                        type : "post",
                        url : "<?php echo u('payment/checkPassword');?>",
                        data : {password : password, i_id : i_id},
                        dataType : "json",
                        success : function (data) {
                            if (data == 0) {
                                alert("密码错误,请重新输入");
                            } else if (data == 2) {
                                alert("账户余额不足");
                            } else if (data == 1) {
                                alert("付款成功");
                                location.href = "<?php echo u('OrderList/index');?>"
                            }
                        }
                    });
                }

            });
        })
    </script>
</head>
<body>
<!--头部-->
<div class="shortcut">
    <div class="w">
        <div class="s-logo">
            <img width="170" height="28" alt="" src="/wancezy/JDshop/Public/Home/images/payment/logo.png">
        </div>
        <ul class="s-right">
            <li id="loginbar" class="s-item fore1">
                <a href="" target="_blank" class="link-user"><?php echo ($_SESSION['user']['username']); ?></a>
                <a href="" class="link-logout">退出</a>
            </li>
            <li class="s-div">|</li>
            <li class="s-item fore2">
                <a class="op-i-ext" href="<?php echo u('OrderList/index',['i_id'=>I('get.i_id')]);?>">我的订单</a>
            </li>
            <li class="s-div">|</li>
            <li class="s-item fore3">
                <a class="op-i-ext" target="_blank" href="">支付帮助</a>
            </li>
        </ul>
    </div>
</div>
<!--头部 end-->
<!--主体部分-->
<div class="main">
    <div class="w">
        <div class="order clearfix">
            <div class="o-qrcode">
                <a class="oq-img" href="javascript:;">
                    <img src="/wancezy/JDshop/Public/Home/images/payment/getQrCodeImage.jpg" alt="">
                </a>
            </div>
            <div class="o-left">
                <h3 class="o-title">订单提交成功，请尽快付款！订单号：<?php echo ($orderData['order_number']); ?></h3>
                <p class="o-tips" id="deleteOrderTip">
                    请您在<span class="font-red">2小时</span>内完成支付，否则订单会被自动取消(库存紧俏商品支付时限以订单详情页为准)。
                </p>
            </div>
            <div class="o-right">
                <div class="o-price">
                    <em>应付金额</em>
                    <strong><?php echo ($orderData['total_pri']); ?></strong>
                    <em>元</em>
                </div>
                <div class="o-detail">
                    <a onclick="payOrder.toggleDetail(this);" href="javascript:;">订单详情
                        <i></i>
                    </a>
                </div>
            </div>
            <div class="o-list j_orderList" id="listPayOrderInfo" style="display: block;">
                <div class="o-list-info">
                    <span class="mr10">收货地址：<?php echo ($orderData['consignee_addr']); ?></span>
                    <span class="mr10">收货人：<?php echo ($orderData['consignee']); ?></span>
                    <span><?php echo ($orderData['consignee_tel']); ?></span>
                </div>
                <div class="o-list-info">
                    <?php if(is_array($orderListData)): foreach($orderListData as $key=>$v): ?><span>商品名称：<?php echo ($v['name']); ?></span><br><?php endforeach; endif; ?>
                </div>
            </div>
        </div>
        <div class="payment pay-load">
            <div class="jp-logo-wrap">
                <span class="jp-logo"></span>
            </div>
            <div class="jp-notice" style="background:none;">
                <div class="jp-tips">
                    <img src="/wancezy/JDshop/Public/Home/images/payment/593fae14N1ae6f365.png">
                </div>
            </div>
            <div id="payChanel" class="pay-channel animate-enter animate-enter-active">
                <div class="paybox paybox-baitiao">
                    <div class="p-wrap">
                        <i class="p-border"></i>
                        <div class="p-key">
                            <span class="p-k-check ui-checkbox-wrap ui-check-disable">
                                <i class="ui-checkbox-L"><em></em></i>
                                <i class="p-k-icon"><img src="/wancezy/JDshop/Public/Home/images/payment/PAY-BAITIAO.png"></i>
                                <strong>打白条</strong>
                            </span>
                            <i class="ui-icon ui-icon-info ml5 j_uiTips" data-tips="<strong>京东白条：</strong>是京东推出的一种“先消费，后付款”的全新<br />支付方式。使用白条进行付款，可以享受账期内延后<br />付款或者最长36期的分期付款方式。"></i>
                        </div>
                        <div class="p-value">
                            <div class="p-v-line baitiao-balance">
                                <span class="font-gray">未开通白条</span>
                            </div>
                        </div>
                        <div class="p-amount">
                            <em>支付</em>
                            <strong>0</strong>
                            <em>元</em>
                        </div>
                    </div>
                </div>
                <div class="paybox paybox-bankCard paybox-selected paybox-couponselect">
                    <div class="p-wrap">
                        <i class="p-border"></i>
                        <div class="p-key">
                            <span class="p-k-check ui-checkbox-wrap">
                                <i class="ui-checkbox-L">
                                    <em class="selected"></em>
                                </i>
                                <i class="p-k-icon">
                                    <img src="/wancezy/JDshop/Public/Home/images/payment/CCB.png">
                                </i>
                                <strong>建设银行</strong>
                            </span>
                        </div>
                        <div class="p-value">
                            <div class="p-v-line xjk-balance">
                                <span>储蓄卡（3914）</span>
                                <span class="p-div">​</span>
                                <!--<span class="bb-coupo">-->
                                    <!--<i class="bb-coupo-icon">优惠</i>-->
                                    <!--<em class="bb-coupo-text">-->
                                        <!--<b>京东支付新用户立减6.18元</b>-->
                                        <!--<i>&gt;</i>-->
                                    <!--</em>-->
                                <!--</span>-->
                            </div>
                        </div>
                        <div class="p-amount">
                            <em>支付</em>
                            <strong><?php echo ($orderData['total_pri']); ?></strong>
                            <em>元</em>
                            <!--<div class="pre-val">已减6.18元</div>-->
                        </div>
                    </div>
                </div>
                <div class="paybox paybox-jingbean">
                    <div class="p-wrap">
                        <i class="p-border"></i>
                        <div class="p-key">
                            <span class="p-k-check ui-checkbox-wrap ui-check-disable">
                                <i class="ui-checkbox-L"><em></em></i>
                                <i class="p-k-icon"></i>
                                <strong>京豆</strong>
                            </span>
                            <i class="ui-icon ui-icon-info ml5 j_uiTips" data-tips="1.京豆支付不超过每笔订单应付金额的50%<br/>2.可使用的京豆数量为1000的整数倍<br/>3.1000京豆抵10元"></i>
                        </div>
                        <div class="p-value">
                            <div class="p-v-line">
                                <span class="font-gray">可用&nbsp;0个</span>
                                <span class="p-div">|</span>
                                <span class="font-gray">总数&nbsp;9个</span>
                                <span class="p-div">|</span>
                                <span class="font-gray">当前余额0.09元不满足支付条件</span>
                            </div>
                        </div>
                        <div class="p-amount">
                            <em>支付</em>
                            <strong>0</strong>
                            <em>元</em>
                        </div>
                    </div>
                </div>
            </div>
            <div class="paybox-newcard animate-enter animate-enter-active">
                <a class="pn-new">添加新卡&nbsp;/&nbsp;网银支付<i></i></a>
            </div>
            <div class="pay-verify animate-enter animate-enter-active">
                <div class="pv-line pv-line-shortPwd">
                    <div class="pl-s-title">请输入6位数字支付密码</div>
                    <input type="password" class="ui-shortPwd">
                    <input type="hidden" name="i_id" value="<?php echo ($i_id); ?>">
                    <a href="" class="ml10">忘记支付密码？</a>
                </div>
                <div class="pv-button">
                    <a class="ui-button ui-button-XL">立即支付</a>
                    <span class="font-red ml10"></span>
                </div>
            </div>
        </div>
        <div class="payment pay-load pay-load-change mt25">
            <div class="payment-change">
                <div class="o-icon-wrap">
                    <span class="o-icon"></span>
                    <span id="agencyTip" class="o-p-tips"></span>
                </div>
                <div class="pc-wrap clearfix animate-enter animate-enter-active">
                    <div class="pc-w-left">
                        <a style="cursor: pointer;">微信支付</a>
                    </div>
                    <div class="pc-w-left">
                        <span>|</span>
                        <a href="" class="pc-item-pop">中国银联</a>
                    </div>
                    <div class="pc-w-left">
                        <span>|</span>
                        <a href="" class="pc-item-pop">预付卡支付</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--主体部分 end-->
<!--底部-->
<div class="p-footer">
    <div class="pf-wrap w">
        <div class="pf-line">
            <span class="pf-l-copyright">Copyright © 2004-2017  京东JD.com 版权所有</span>
            <img width="185" height="20" src="/wancezy/JDshop/Public/Home/images/payment/footer-auth.png">
        </div>
    </div>
</div>
<!--底部 end-->
</body>
</html>