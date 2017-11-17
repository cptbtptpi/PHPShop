<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/wancezy/JDshop/Public/Home/css/base.css">
    <link rel="stylesheet" href="/wancezy/JDshop/Public/Home/css/orderSettle.css">
    <script src="/wancezy/JDshop/Public/Home/js/area.js"></script>
    <script src="/wancezy/JDshop/Public/Home/js/jquery-1.11.1.min.js"></script>
    <script src="/wancezy/JDshop/Public/Home/js/orderSettle/orderSettle.js"></script>
    <script>
        $(function () {
            var cm_id = "";
            var addr_info = "";
            var addr_name = "";
            var addr_tel = "";
            // 地址的hover效果
            $(".consignee-cont .consignee-list").delegate("li","mouseover",function () {
                $(this).children(".op-btns").css("visibility","visible");
            });
            $(".consignee-cont .consignee-list").delegate("li","mouseleave",function () {
                $(this).children(".op-btns").css("visibility","hidden");
            });
            // 地址的click效果
            $(".consignee-cont .consignee-list").delegate("li .consignee-item","click",function () {
                $(this).parents("li").addClass("ui-switchable-panel-selected").siblings("li").removeClass("ui-switchable-panel-selected");
                $(this).addClass("item-selected");
                $(this).parents("li").find(".del-consignee").addClass("hide");
                $(this).parents("li").siblings("li").children(".consignee-item").removeClass("item-selected");
                $(this).parents("li").siblings("li").find(".del-consignee").removeClass("hide");
                addr_info = $(this).parents("li").find(".addr-detail .addr-info").text();
                addr_name = $(this).parents("li").find(".addr-detail .addr-name").text();
                addr_tel = $(this).parents("li").find(".addr-detail .addr-tel").text();
                $("#sendAddr").html(addr_info);
                $("#sendMen").html(addr_name);
                $("#sendMobile").html(addr_tel);
            });
            // 打开添加地址会话框
            $(".consignee-global").click(function () {
                $(".ui-mask").css({
                    "width" : $(document).width(),
                    "height" : $(document).height()
                }).fadeIn();
                $(".ui-dialog").fadeIn();
            });
            // 关闭添加地址填写会话框
            $(".ui-dialog-close").click(function () {
                $(".ui-dialog").fadeOut();
                $(".ui-mask").fadeOut();

            });
            // 点击标签将其填入地址别名中
            $(".consignee-tag span").click(function () {
                $("#consignee_addressname").val($(this).text());
            });
            //初始化方法
            area.init('area');
            //修改的时候默认被选中效果
//            area.selected('北京', '北京', '东城');
            // 添加和编辑地址
            $("#saveConsigneeTitleDiv").click(function () {
//                var cm_id = $(".consignee-list .ui-switchable-panel").find("input:hidden").val();
                var consignee_area = $("#area1").find("option:selected").attr("value")
                    + " " + $("#area2").find("option:selected").attr("value")
                    + " " + $("#area3").find("option:selected").attr("value");
                var consignee_name = $("#consignee_name").val();
                var consignee_address = $("#consignee_address").val();
                var consignee_mobile = $("#consignee_mobile").val();
                var consignee_phone = $("#consignee_phone").val();
                var consignee_email = $("#consignee_email").val();
                var consignee_addressname = $("#consignee_addressname").val();
                $.ajax({
                    type : "post",
                    url : "<?php echo u('OrderSettle/addAddress');?>",
                    data : { cm_id : cm_id,
                        consignee_area : consignee_area,
                        consignee_name : consignee_name,
                        consignee_address : consignee_address,
                        consignee_mobile : consignee_mobile,
                        consignee_phone : consignee_phone,
                        consignee_email : consignee_email,
                        consignee_addressname : consignee_addressname
                    },
                    dataType : "json",
                    success : function (data) {
                        $(".consignee-list li input[value="+data.consignee_id+"]").parents(".ui-switchable-panel").remove();
                        var str = '';
                        str += '<li class="ui-switchable-panel ui-switchable-panel-selected" style="display:list-item">';
                            str += '<input type="hidden" value="'+data.consignee_id+'">';
                            str += '<div class="consignee-item">';
                                str += '<span>'+data.consignee_addressname+'</span>';
                                str += '<b></b>';
                            str += '</div>';
                            str += '<div class="addr-detail">';
                                str += '<span class="addr-name">'+data.consignee_name+'</span>';
                                str += '<span class="addr-info">'+data.consignee_area+data.consignee_address+'</span>';
                                str += '<span class="addr_tel">'+data.consignee_mobile+'</span>';
                            str += '</div>';
                            str += '<div class="op-btns">';
                                str += '<a href="#none" class="ftx-05 edit-consignee">编辑</a>';
                                str += '<a href="#none" class="ftx-05 del-consignee">删除</a>';
                            str += '</div>';
                        str += '</li>';
                        $(".consignee-list").append(str);
                    }
                });
                cm_id = "";
                $(".ui-dialog").fadeOut();
                $(".ui-mask").fadeOut();
                // 添加或编辑完后清空表单
                area.init('area');
                $(".dialog-frame input[name='consignee_name']").val("");
                $(".dialog-frame input[name='consignee_address']").val("");
                $(".dialog-frame input[name='consignee_mobile']").val("");
                $(".dialog-frame input[name='consignee_phone']").val("");
                $(".dialog-frame input[name='consignee_email']").val("");
                $(".dialog-frame input[name='consignee_addressname']").val("");
            });

            // 删除地址
            $(".consignee-cont .consignee-list").delegate(".op-btns .del-consignee","click",function () {
                var cm_id = $(this).parents(".ui-switchable-panel").find("input:hidden").val();
                var _this = $(this);
                $.ajax({
                    type : "post",
                    url : "<?php echo u('OrderSettle/delAddress');?>",
                    data : {cm_id : cm_id},
                    dataType : "json",
                    success : function (data) {
                        _this.parents(".ui-switchable-panel").remove();
                    }
                });
            });
            
            // 编辑地址
            $(".consignee-cont .consignee-list").delegate(".op-btns .edit-consignee","click",function () {
                cm_id = $(this).parents(".ui-switchable-panel").find("input:hidden").val();
                var _this = $(this);
                $.ajax({
                    type : "post",
                    url : "<?php echo u('OrderSettle/editAddress');?>",
                    data : {cm_id : cm_id},
                    dataType : "json",
                    success : function (data) {
                        $(".dialog-frame input[name='cm_id']").val(data.cm_id);
                        area.selected(data.cm_area0, data.cm_area1, data.cm_area2);
                        $(".dialog-frame input[name='consignee_name']").val(data.cm_name);
                        $(".dialog-frame input[name='consignee_address']").val(data.cm_address);
                        $(".dialog-frame input[name='consignee_mobile']").val(data.cm_mobile);
                        $(".dialog-frame input[name='consignee_phone']").val(data.cm_phone);
                        $(".dialog-frame input[name='consignee_email']").val(data.cm_email);
                        $(".dialog-frame input[name='consignee_addressname']").val(data.cm_addressname);
                    }
                });
                $(".ui-mask").css({
                    "width" : $(document).width(),
                    "height" : $(document).height()
                }).fadeIn();
                $(".ui-dialog").fadeIn();
            });

            // 设置为默认地址
            $(".consignee-cont .consignee-list").delegate(".op-btns .setdefault-consignee","click",function () {
                var cm_id = $(this).parents(".ui-switchable-panel").find("input:hidden").val();
                var _this = $(this);
                $.ajax({
                    type : "post",
                    url : "<?php echo u('OrderSettle/setdefaultAddress');?>",
                    data : {cm_id : cm_id},
                    dataType : "json",
                    success : function (data) {
                        var str = '<span class="addr-default">默认地址</span>';
                        _this.parents(".ui-switchable-panel").find(".addr-detail").append(str);
                        _this.parents(".ui-switchable-panel").siblings("li").find(".addr-default").remove();
                        _this.parents(".ui-switchable-panel").siblings("li").find(".setdefault-consignee").removeClass("hide");
                        _this.addClass("hide");
                    }
                });
            });

            // 提交订单配送的地址
            addr_info = $(".ui-switched-panel-selected .addr-detail .addr-info").text();
            addr_name = $(".ui-switched-panel-selected .addr-detail .addr-name").text();
            addr_tel = $(".ui-switched-panel-selected .addr-detail .addr-tel").text();
            $("#sendAddr").html(addr_info);
            $("#sendMen").html(addr_name);
            $("#sendMobile").html(addr_tel);

            // 支付方式的click效果
            $(".payment-list #item-list li").click(function () {
                $(this).children("div").addClass("item-selected");
                $(this).siblings("li").children("div").removeClass("item-selected");
            });

            // 点击提交订单
            $(".checkout-buttons .checkout-submit").click(function () {
                $.ajax({
                    type : "post",
                    url : "<?php echo u('OrderSettle/storeOrder');?>",
                    data : {addr_info : addr_info, addr_name : addr_name, addr_tel : addr_tel},
                    dataType : "json",
                    success : function (data) {
                        location.href = "<?php echo u('payment/index');?>" + "?i_id=" + data;
                    }
                });
            });
        });
    </script>
</head>
<body class="orderSettle">
<!--shortcut开始-->
<div id="shortcut-2">
    <div class="w">
        <ul class="fl">
            <li class="dorpdown" id="ttbar-mycity">
                <div class="dt cw-icon ui-areamini-text-wrap">
                    <i class="ci-right">
                        <s>◇</s>
                    </i>
                    送至:
                    <span class="ui-areamini-text">北京</span>
                </div>
                <div class="dd dorpdown-layer">
                    <div class="dd-spacer"></div>
                    <div class="ui-areamini-content-wrap" style="left: auto;">
                        <div class="ui-areamini-content">
                            <div class="ui-areamini-content-list">
                                <div class="item">
                                    <a href="javascript:void(0)" class="selected">北京</a>
                                </div>
                                <div class="item">
                                    <a href="javascript:void(0)" class="">上海</a>
                                </div>
                                <div class="item">
                                    <a href="javascript:void(0)" class="">天津</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <ul class="fr">
            <li class="fore1 dorpdown" id="ttbar-login">
                <div class="dt cw-icon">
                    <i class="icon-plus-nickname"></i>
                    <i class="ci-right">
                        <s>◇</s>
                    </i>
                    <a href="" class="nickname"><?php echo ($_SESSION['user']['username']); ?></a>
                </div>
                <div class="dd dorpdown-layer">
                    <div class="dd-spacer"></div>
                    <div class="userinfo">
                        <div class="u-pic">
                            <a href="">
                                <img src="/wancezy/JDshop/Public/Home/images/myOrder/no-img_mid_.jpg" alt="">
                            </a>
                        </div>
                        <div class="u-plus">
                            <a href="" class="link-logout">退出</a>
                            <a href="" class="icon-plus-dropdown"></a>
                        </div>
                        <div class="u-msg">
                            <a href="">试用PLUS会员领免运费券&gt;</a>
                        </div>
                    </div>
                    <div class="badge-list">
                        <a href="javascript:void(0);" class="badge-list-prev">&lt;</a>
                        <div class="u-badges">
                            <div class="badge-panel-main">
                                <div class="badge-panel fore1">
                                    <a href="">
                                        <i></i>
                                        <p class="u-name">免费试用</p>
                                    </a>
                                </div>
                                <div class="badge-panel fore2">
                                    <a href="">
                                        <i></i>
                                        <p class="u-name">自营运费补贴</p>
                                    </a>
                                </div>
                                <div class="badge-panel fore3">
                                    <a href="">
                                        <i></i>
                                        <p class="u-name">售后服务</p>
                                    </a>
                                </div>
                                <div class="badge-panel fore4">
                                    <a href="">
                                        <i></i>
                                        <p class="u-name">评价奖励</p>
                                    </a>
                                </div>
                                <div class="badge-panel fore5">
                                    <a href="">
                                        <i></i>
                                        <p class="u-name">会员特价</p>
                                    </a>
                                </div>
                                <div class="badge-panel fore8">
                                    <a href="">
                                        <i></i>
                                        <p class="u-name">装机服务</p>
                                    </a>
                                </div>
                                <div class="badge-panel fore6">
                                    <a href="">
                                        <i></i>
                                        <p class="u-name">生日礼包</p>
                                    </a>
                                </div>
                                <div class="badge-panel fore7">
                                    <a href="">
                                        <i></i>
                                        <p class="u-name">专享礼包</p>
                                    </a>
                                </div>
                                <div class="badge-panel fore9">
                                    <a href="">
                                        <i></i>
                                        <p class="u-name">贵宾专线</p>
                                    </a>
                                </div>
                                <div class="badge-panel fore10">
                                    <a href="">
                                        <i></i>
                                        <p class="u-name">运费券</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:void(0);" class="badge-list-next">&gt;</a>
                    </div>
                </div>
            </li>
            <li class="spacer"></li>
            <li class="fore2">
                <div class="dt">
                    <a href="{}">我的订单</a>
                </div>
            </li>
            <li class="spacer"></li>
            <li class="fore3 dorpdown" id="ttbar-myjd">
                <div class="dt cw-icon">
                    <i class="ci-right">
                        <s>◇</s>
                    </i>
                    <a href="">我的京东</a>
                </div>
                <div class="dd dorpdown-layer">
                    <div class="dd-spacer"></div>
                    <div class="myjdlist1">
                        <div class="fore1">
                            <div class="item">
                                <a href="">待处理订单
                                    <span id="num-unfinishedorder"></span>
                                </a>
                            </div>
                            <div class="item">
                                <a href="">返修退换货</a>
                            </div>
                            <div class="item">
                                <a href="">降价商品
                                    <span id="num-reduction"></span>
                                </a>
                            </div>
                        </div>
                        <div class="fore2">
                            <div class="item">
                                <a href="">消息
                                    <span id="num-tip"></span>
                                </a>
                            </div>
                            <div class="item">
                                <a href="">我的问答
                                    <span id="num-consultation"></span>
                                </a>
                            </div>
                            <div class="item">
                                <a href="">我的关注</a>
                            </div>
                        </div>
                    </div>
                    <div class="myjdlist2">
                        <div class="fore1">
                            <div class="item">
                                <a href="">我的京豆</a>
                            </div>
                            <div class="item baitiao">
                                <a href="">我的白条</a>
                            </div>
                        </div>
                        <div class="fore2">
                            <div class="item">
                                <a href="">我的优惠券
                                    <span id="num-ticket"></span>
                                </a>
                            </div>
                            <div class="item">
                                <a href="">我的理财</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="spacer"></li>
            <li class="fore4">
                <div class="dt">
                    <a href="">京东会员</a>
                </div>
            </li>
            <li class="spacer"></li>
            <li class="fore5">
                <div class="dt">
                    <a href="">企业采购</a>
                </div>
            </li>
            <li class="spacer"></li>
            <li class="fore6 dorpdown" id="ttbar-apps">
                <div class="dt cw-icon">
                    <i class="ci-left"></i>
                    <i class="ci-right">
                        <s>◇</s>
                    </i>
                    <a href="">手机京东</a>
                </div>
                <div class="dd dorpdown-layer">
                    <div class="dd-spacer"></div>
                    <div class="dd-inner" id="ttbar-apps-main">
                        <a href="" class="link link1">手机京东</a>
                        <a href="" class="link link3">京东金融客户端</a>
                        <a href="" class="link link4">新人专享大礼包</a>
                        <a href="" class="link link5">新人专享128元大礼包</a>
                    </div>
                </div>
            </li>
            <li class="spacer"></li>
            <li class="fore7 dorpdown" id="ttbar-atte">
                <div class="dt cw-icon">
                    <i class="ci-right">
                        <s>◇</s>
                    </i>
                    关注京东
                </div>
                <div class="dd dorpdown-layer">
                    <div class="dd-spacer"></div>
                    <div class="dd-inner" id="ttbar-atte-main">
                        <img src="/wancezy/JDshop/Public/Home/images/myOrder/ttbar-atte.jpg" alt="">
                    </div>
                </div>
            </li>
            <li class="spacer"></li>
            <li class="fore8 dorpdown" id="ttbar-serv">
                <div class="dt cw-icon">
                    <i class="ci-right">
                        <s>◇</s>
                    </i>
                    客户服务
                </div>
                <div class="dd dorpdown-layer">
                    <div class="dd-spacer"></div>
                    <div class="item-client">客户</div>
                    <div class="item">
                        <a href="">帮助中心</a>
                    </div>
                    <div class="item">
                        <a href="">售后服务</a>
                    </div>
                    <div class="item">
                        <a href="">在线客服</a>
                    </div>
                    <div class="item">
                        <a href="">意见建议</a>
                    </div>
                    <div class="item">
                        <a href="">电话客服</a>
                    </div>
                    <div class="item">
                        <a href="">客服邮箱</a>
                    </div>
                    <div class="item">
                        <a href="">金融咨询</a>
                    </div>
                    <div class="item">
                        <a href="">售全球客服</a>
                    </div>
                    <div class="item-business">商户</div>
                    <div class="item">
                        <a href="">合作招商</a>
                    </div>
                    <div class="item">
                        <a href="">京东商学院</a>
                    </div>
                    <div class="item">
                        <a href="">商家后台</a>
                    </div>
                    <div class="item">
                        <a href="">京麦工作台</a>
                    </div>
                    <div class="item">
                        <a href="">商家帮助</a>
                    </div>
                    <div class="item">
                        <a href="">规则平台</a>
                    </div>
                </div>
            </li>
            <li class="spacer"></li>
            <li class="fore9 dorpdown" id="ttbar-navs" style="padding: 0;">
                <div class="dt cw-icon">
                    <i class="ci-right">
                        <s>◇</s>
                    </i>
                    网站导航
                </div>
                <div class="dd dorpdown-layer">
                    <div class="dd-spacer"></div>
                    <dl class="fore1">
                        <dt>特色主题</dt>
                        <dd>
                            <div class="item">
                                <a href="">品牌头条</a>
                            </div>
                            <div class="item">
                                <a href="">发现好货</a>
                            </div>
                            <div class="item">
                                <a href="">京东预售</a>
                            </div>
                            <div class="item">
                                <a href="">京东金融</a>
                            </div>
                            <div class="item">
                                <a href="">京东试用</a>
                            </div>
                            <div class="item">
                                <a href="">港澳售</a>
                            </div>
                            <div class="item">
                                <a href="">优惠券</a>
                            </div>
                            <div class="item">
                                <a href="">闪购</a>
                            </div>
                            <div class="item">
                                <a href="">京东会员</a>
                            </div>
                            <div class="item">
                                <a href="">秒杀</a>
                            </div>
                            <div class="item">
                                <a href="">定期送</a>
                            </div>
                            <div class="item">
                                <a href="">装机大师</a>
                            </div>
                            <div class="item">
                                <a href="">新奇特</a>
                            </div>
                            <div class="item">
                                <a href="">企业金融服务</a>
                            </div>
                            <div class="item">
                                <a href="">礼品购</a>
                            </div>
                            <div class="item">
                                <a href="">智能馆</a>
                            </div>
                            <div class="item">
                                <a href="">0元评测</a>
                            </div>
                            <div class="item">
                                <a href="">In货推荐</a>
                            </div>
                            <div class="item">
                                <a href="">北京老字号</a>
                            </div>
                            <div class="item">
                                <a href="">买什么</a>
                            </div>
                        </dd>
                    </dl>
                    <dl class="fore2">
                        <dt>行业频道</dt>
                        <dd>
                            <div class="item">
                                <a href="">服装城</a>
                            </div>
                            <div class="item">
                                <a href="">家用电器</a>
                            </div>
                            <div class="item">
                                <a href="">电脑办公</a>
                            </div>
                            <div class="item">
                                <a href="">手机</a>
                            </div>
                            <div class="item">
                                <a href="">美妆馆</a>
                            </div>
                            <div class="item">
                                <a href="">食品</a>
                            </div>
                            <div class="item">
                                <a href="">智能数码</a>
                            </div>
                            <div class="item">
                                <a href="">母婴</a>
                            </div>
                            <div class="item">
                                <a href="">家装城</a>
                            </div>
                            <div class="item">
                                <a href="">运动户外</a>
                            </div>
                            <div class="item">
                                <a href="">整车</a>
                            </div>
                            <div class="item">
                                <a href="">图书</a>
                            </div>
                            <div class="item">
                                <a href="">农资频道</a>
                            </div>
                            <div class="item">
                                <a href="">京东智能</a>
                            </div>
                            <div class="item">
                                <a href="">玩3C</a>
                            </div>
                        </dd>
                    </dl>
                    <dl class="fore3">
                        <dt>生活服务</dt>
                        <dd>
                            <div class="item">
                                <a href="" >京东众筹</a>
                            </div>
                            <div class="item">
                                <a href="">白条</a>
                            </div>
                            <div class="item">
                                <a href="">京东金融App</a>
                            </div>
                            <div class="item">
                                <a href="">京东小金库</a>
                            </div>
                            <div class="item">
                                <a href="">理财</a>
                            </div>
                            <div class="item">
                                <a href="">话费</a>
                            </div>
                            <div class="item">
                                <a href="">旅行</a>
                            </div>
                            <div class="item">
                                <a href="">彩票</a>
                            </div>
                            <div class="item">
                                <a href="">游戏</a>
                            </div>
                            <div class="item">
                                <a href="">机票酒店</a>
                            </div>
                            <div class="item">
                                <a href="">电影票</a>
                            </div>
                            <div class="item">
                                <a href="">水电煤</a>
                            </div>
                            <div class="item">
                                <a href="">京东到家</a>
                            </div>
                            <div class="item">
                                <a href="">京东微联</a>
                            </div>
                            <div class="item">
                                <a href="">京东众测</a>
                            </div>
                        </dd>
                    </dl>
                    <dl class="fore4">
                        <dt>更多精选</dt>
                        <dd>
                            <div class="item">
                                <a href="">京东社区</a>
                            </div>
                            <div class="item">
                                <a href="">京东通信</a>
                            </div>
                            <div class="item">
                                <a href="">在线读书</a>
                            </div>
                            <div class="item">
                                <a href="">京东E卡</a>
                            </div>
                            <div class="item">
                                <a href="">智能社区</a>
                            </div>
                            <div class="item">
                                <a href="">游戏社区</a>
                            </div>
                            <div class="item">
                                <a href="">京友邦</a>
                            </div>
                            <div class="item">
                                <a href="">合作招商</a>
                            </div>
                            <div class="item">
                                <a href="">企业采购</a>
                            </div>
                            <div class="item">
                                <a href="">服务市场</a>
                            </div>
                            <div class="item">
                                <a href="">乡村招募</a>
                            </div>
                            <div class="item">
                                <a href="">校园加盟</a>
                            </div>
                            <div class="item">
                                <a href="">办公生活馆</a>
                            </div>
                            <div class="item">
                                <a href="">知识产权维权</a>
                            </div>
                            <div class="item">
                                <a href="">English Site</a>
                            </div>
                        </dd>
                    </dl>
                </div>
            </li>
        </ul>
    </div>
</div>
<!--shortcut结束-->

<!--header开始-->
<div class="w w1 header clearfix">
    <div id="logo">
        <a href="" class="link1">
            <img src="/wancezy/JDshop/Public/Home/images/orderSettle/logo-201305.png">
        </a>
        <a href="#none" class="link2">
            <b></b>"结算页"
        </a>
    </div>
    <div class="stepflex">
        <dl class="first done">
            <dt class="s-num">1</dt>
            <dd class="s-text">
                1.我的购物车
                <s></s>
                <b></b>
            </dd>
        </dl>
        <dl class="normal doing">
            <dt class="s-num">2</dt>
            <dd class="s-text">
                2.填写核对订单信息
                <s></s>
                <b></b>
            </dd>
        </dl>
        <dl class="normal last">
            <dt class="s-num">3</dt>
            <dd class="s-text">
                3.成功提交订单
                <s></s>
                <b></b>
            </dd>
        </dl>
    </div>
</div>
<!--header结束-->

<!--container开始-->
<div id="container">
    <div class="w">
        <div class="checkout-tit">
            <span class="tit-txt">填写并核对订单信息</span>
        </div>
        <div class="checkout-steps">
            <div class="step-tit">
                <h3>收货人信息</h3>
                <div class="extra-r">
                    <a href="#none" class="ftx-05 consignee-global">新增收货地址</a>
                </div>
            </div>
            <div class="step-cont">
                <div class="consignee-content">
                    <div class="consignee-scrollbar">
                        <div class="consignee-scroll">
                            <div class="consignee-cont">
                                <ul class="consignee-list">
                                    <?php if(is_array($consigneeMessage)): foreach($consigneeMessage as $key=>$v): if ($v['default_address'] == 1) { ?>
                                            <li class="ui-switchable-panel ui-switched-panel-selected" style="display:list-item">
                                                <input type="hidden" value="<?php echo ($v['cm_id']); ?>">
                                                <div class="consignee-item item-selected">
                                                    <span><?php echo ($v['cm_addressname']); ?></span>
                                                    <b></b>
                                                </div>
                                                <div class="addr-detail">
                                                    <span class="addr-name"><?php echo ($v['cm_name']); ?></span>
                                                    <span class="addr-info"><?php echo ($v['cm_area']); ?> <?php echo ($v['cm_address']); ?></span>
                                                    <span class="addr-tel"><?php echo ($v['cm_mobile']); ?></span>
                                                    <span class="addr-default">默认地址</span>
                                                </div>
                                                <div class="op-btns">
                                                    <a href="#none" class="ftx-05 setdefault-consignee hide">设为默认地址</a>
                                                    <a href="#none" class="ftx-05 edit-consignee">编辑</a><a href="#none" class="ftx-05 del-consignee hide">删除</a>
                                                </div>
                                            </li>
                                        <?php } else { ?>
                                            <li class="ui-switchable-panel" style="display:list-item">
                                                <input type="hidden" value="<?php echo ($v['cm_id']); ?>">
                                                <div class="consignee-item">
                                                    <span><?php echo ($v['cm_addressname']); ?></span>
                                                    <b></b>
                                                </div>
                                                <div class="addr-detail">
                                                    <span class="addr-name"><?php echo ($v['cm_name']); ?></span>
                                                    <span class="addr-info"><?php echo ($v['cm_area']); ?> <?php echo ($v['cm_address']); ?></span>
                                                    <span class="addr-tel"><?php echo ($v['cm_mobile']); ?></span>
                                                </div>
                                                <div class="op-btns">
                                                    <a href="#none" class="ftx-05 setdefault-consignee">设为默认地址</a>
                                                    <a href="#none" class="ftx-05 edit-consignee">编辑</a><a href="#none" class="ftx-05 del-consignee">删除</a>
                                                </div>
                                            </li>
                                        <?php } endforeach; endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="addr-switch switch-on">-->
                    <!--<span>更多地址</span>-->
                    <!--<b></b>-->
                <!--</div>-->
            </div>
            <div class="hr"></div>
            <div id="shipAndSkuInfo">
                <div class="step-tit">
                    <h3>支付方式</h3>
                </div>
                <div class="step-cont">
                    <div class="payment-list">
                        <div class="list-cont">
                            <ul id="item-list">
                                <li>
                                    <div class="payment-item">
                                        <b></b>
                                        货到付款
                                        <span class="qmark-icon qmark-tip"></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="payment-item item-selected">
                                        <b></b>
                                        <em class="payment-promo">惠</em>
                                        在线支付
                                        <span class="qmark-icon qmark-tip"></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="hide payment-item">
                                        <b></b>
                                        公司转账
                                        <span class="qmark-icon qmark-tip"></span>
                                    </div>
                                </li>
                                <li>
                                    <div class="hide payment-item">
                                        <b></b>
                                        邮局汇款
                                        <span class="qmark-icon qmark-tip"></span>
                                    </div>
                                </li>
                                <li id="payment-less" class="hide">
                                    <div class="payment-item-on">
                                        <span>收起</span><b></b>
                                    </div>
                                </li>
                                <li id="payment-more" style="display: list-item;">
                                    <div class="payment-item-off">
                                        <span>更多</span><b></b>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="hr"></div>
                <div class="step-tit">
                    <h3>送货清单</h3>
                    <div class="extra-r">
                        <a class="price-desc" id="price-desc" href="#none">
                            <i></i>&nbsp;价格说明
                        </a>
                        <a href="<?php echo u('home/Cart/index');?>" id="cartRetureUrl" class="return-edit ftx-05">返回修改购物车</a>
                    </div>
                </div>
                <div class="step-cont">
                    <div class="shopping-lists">
                        <div class="shopping-list ABTest">
                            <div class="goods-list">
                                <div class="goods-items">
                                    <?php if(is_array($orderData['cart']['goods'])): foreach($orderData['cart']['goods'] as $key=>$v): ?><div class="goods-item">
                                        <div class="p-img">
                                            <a href="">
                                                <img src="<?php echo ($v['pic']); ?>" alt="">
                                            </a>
                                        </div>
                                        <div class="goods-msg">
                                            <div class="goods-msg-gel">
                                                <div class="p-name">
                                                    <a href=""><?php echo ($v['name']); echo ($v['options'][1]); echo ($v['options'][2]); ?></a>
                                                </div>
                                                <div class="p-price">
                                                    <strong class="jd-price">￥<?php echo ($v['price']); ?></strong>
                                                    <span class="p-num">x<?php echo ($v['num']); ?></span>
                                                    <span class="p-state">有货</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <i class="p-icon p-icon-w sevenicon"></i>
                                            <span class="ftx-07 withouthk seven">支持7天无理由退货</span>
                                        </div>
                                        <div class="clr"></div>
                                    </div><?php endforeach; endif; ?>
                                </div>
                                <!--<div class="service-items ml20 mr20" style="display: block;">-->
                                    <!--<div class="hide service-item" id="vender_freight_insurance_40716" style="display: block;">-->
                                        <!--<div class="hr"></div>-->
                                        <!--<span class="service-desc">退换无忧</span>-->
                                        <!--<strong class="service-price">￥0.00</strong>-->
                                    <!--</div>-->
                                <!--</div>-->
                            </div>
                            <div class="dis-modes">
                                <div class="mode-item mode-tab">
                                    <h4>配送方式</h4>
                                    <div class="mode-tab-nav">
                                        <ul>
                                            <li class="mode-tab-item curr">
                                                <span class="m-txt">
                                                    快递运输
                                                    <i class="qmark-icon qmark-tip"></i>
                                                </span>
                                                <b></b>
                                            </li>
                                            <li class="mode-tab-item hide">
                                                <span class="m-txt">
                                                    上门自提
                                                    <i class="qmark-icon qmark-tip"></i>
                                                </span>
                                                <b></b>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="mode-item-con">
                                        <ul class="mode-list">
                                            <li>
                                               <div class="fore1">
                                                   <span class="mode-label ftx-03">配送时间：</span>
                                                   <div class="mode-infor">
                                                       工作日、双休日与节假日均可送货
                                                   </div>
                                               </div>
                                               <div class="fore2 hide">
                                                   <a href="#none" class="ftx-05">修改</a>
                                               </div>
                                           </li>
                                            <!--<li class="buyer_insurance" style="display: block;">-->
                                                <!--<div class="foreAll">-->
                                                    <!--<span class="mode-label ftx-03">退换无忧：</span>-->
                                                    <!--<div class="mode-infor">-->
                                                        <!--<label>-->
                                                            <!--<input class="fl buyer_freight_insurance" type="checkbox">-->
                                                            <!--<span class="fl mode-infor-con buyer_insurance">自签收后7天内退货，15天内换货,可享1次运费赔付至京东小金库-->
                                                                <!--<i class="arrow-down"></i>-->
                                                            <!--</span>-->
                                                            <!--<em class="fr">￥1.00</em>-->
                                                            <!--<span class="mode-infor-tips mode-infor-tips-sec">-->
                                                                <!--<i class="d-arr d-arr-pop"></i>-->
                                                                <!--自签收后7天内退货，15天内换货，按照赔付标准赔付一次退换货时产生的运费，赔付至京东小金库，最高可赔付25元/单。<a href="">查看详情</a>-->
                                                            <!--</span>-->
                                                        <!--</label>-->
                                                    <!--</div>-->
                                                <!--</div>-->
                                            <!--</li>-->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="clr"></div>
                        </div>
                        <div class="clr"></div>
                    </div>
                </div>
            </div>
            <div class="hr"></div>
            <!--发票信息-->
            <div class="step-tit" id="invoice-step">
                <h3>发票信息</h3>
            </div>
            <div class="step-content">
                <div id="part-inv" class="invoice-cont">
                    不开发票
                    <a href="#none" id="invoiceEdit" class="ftx-05">修改</a>
                </div>
            </div>
            <div class="clr"></div>
            <div class="hr"></div>
            <div class="step-tit step-toggle-off">
                <h3>使用优惠/京东卡/抵用</h3>
                <i></i>
            </div>
        </div>
        <!--总数-->
        <div class="order-summary">
            <div class="statistic fr">
                <div class="list">
                    <span>
                        <em class="ftx-01"><?php echo ($orderData['cart']['total_rows']); ?></em> 件商品，总商品金额：
                    </span>
                    <em class="price" id="warePriceId">￥<?php echo ($orderData['cart']['total']); ?></em>
                </div>
                <div class="list">
                    <span>返现：</span>
                    <em class="price" id="cachBackId" v="0.00"> -￥0.00</em>
                </div>
                <div class="list">
                    <span>运费：</span>
                    <em class="price" id="freightPriceId"> ￥0.00</em>
                </div>
                <div class="list" style="display:block;">
                    <span>服务费：</span>
                    <em class="price" id="serviceFeeId">￥0.00</em>
                </div>
                <!--<div class="list" style="display:block;">-->
                    <!--<span>退换无忧：</span>-->
                    <!--<em class="price" id="buyerFreightInsuranceId">￥0.00</em>-->
                <!--</div>-->
            </div>
            <div class="clr"></div>
        </div>
        <!--提交订单-->
        <div class="trade-foot">
            <div class="trade-foot-detail-com">
                <div class="fc-price-info">
                    <span class="price-tit">应付总额：</span>
                    <span class="price-num" id="sumPayPriceId">￥<?php echo ($orderData['cart']['total']); ?></span>
                </div>
                <div class="fc-consignee-info">
                    寄送至:<span class="mr20" id="sendAddr"></span>
                    收货人:<span id="sendMen"></span>
                    <span id="sendMobile"></span>
                </div>
            </div>
            <div id="checkout-floatbar" class="group">
                <div class="ui-ceilinglamp checkout-buttons">
                    <div class="stick-wrap">
                        <div class="inner">
                            <a href="javascript:;" class="checkout-submit">
                                提交订单
                                <b></b>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--container结束-->

<!--页脚开始-->
<div id="footer" class="mod_footer">
    <div class="mod_service">
        <div class="mod_service_inner w">
            <div class="mod_service_list">
                <li class="mod_service_item">
                    <div class="mod_service_unit">
                        <h5 class="mod_service_tit mod_service_duo">多</h5>
                        <p class="mod_service_txt">品类齐全，轻松购物</p>
                    </div>
                </li>
                <li class="mod_service_item">
                    <div class="mod_service_unit">
                        <h5 class="mod_service_tit mod_service_kuai">快</h5>
                        <p class="mod_service_txt">多仓直发，急速配送</p>
                    </div>
                </li>
                <li class="mod_service_item">
                    <div class="mod_service_unit">
                        <h5 class="mod_service_tit mod_service_hao">好</h5>
                        <p class="mod_service_txt">正品行货，精致服务</p>
                    </div>
                </li>
                <li class="mod_service_item">
                    <div class="mod_service_unit">
                        <h5 class="mod_service_tit mod_service_sheng">省</h5>
                        <p class="mod_service_txt">天天低价，畅选无忧</p>
                    </div>
                </li>
            </div>
        </div>
    </div>
    <div class="mod_help">
        <div class="mod_help_inner w">
            <div class="mod_help_list">
                <div class="mod_help_nav">
                    <h5 class="mod_help_nav_tit">购物指南</h5>
                    <ul class="mod_help_nav_con">
                        <li>
                            <a href="">购物流程</a>
                        </li>
                        <li>
                            <a href="">会员介绍</a>
                        </li>
                        <li>
                            <a href="">生活旅行</a>
                        </li>
                        <li>
                            <a href="">常见问题</a>
                        </li>
                        <li>
                            <a href="">大家电</a>
                        </li>
                        <li>
                            <a href="">联系客服</a>
                        </li>
                    </ul>
                </div>
                <div class="mod_help_nav">
                    <h5 class="mod_help_nav_tit">配送方式</h5>
                    <ul class="mod_help_nav_con">
                        <li>
                            <a href="">上门自提</a>
                        </li>
                        <li>
                            <a href="">211限时达</a>
                        </li>
                        <li>
                            <a href="">配送服务查询</a>
                        </li>
                        <li>
                            <a href="">配送费收取标准</a>
                        </li>
                        <li>
                            <a href="">海外配送</a>
                        </li>
                    </ul>
                </div>
                <div class="mod_help_nav">
                    <h5 class="mod_help_nav_tit">支付方式</h5>
                    <ul class="mod_help_nav_con">
                        <li>
                            <a href="">货到付款</a>
                        </li>
                        <li>
                            <a href="">在线支付</a>
                        </li>
                        <li>
                            <a href="">分期付款</a>
                        </li>
                        <li>
                            <a href="">邮局汇款</a>
                        </li>
                        <li>
                            <a href="">公司转账</a>
                        </li>
                    </ul>
                </div>
                <div class="mod_help_nav">
                    <h5 class="mod_help_nav_tit">售后服务</h5>
                    <ul class="mod_help_nav_con">
                        <li>
                            <a href="">售后政策</a>
                        </li>
                        <li>
                            <a href="">价格保护</a>
                        </li>
                        <li>
                            <a href="">退款说明</a>
                        </li>
                        <li>
                            <a href="">返修/退换货</a>
                        </li>
                        <li>
                            <a href="">取消订单</a>
                        </li>
                    </ul>
                </div>
                <div class="mod_help_nav">
                    <h5 class="mod_help_nav_tit">特色服务</h5>
                    <ul class="mod_help_nav_con">
                        <li>
                            <a href="">夺宝岛</a>
                        </li>
                        <li>
                            <a href="">DIY装机</a>
                        </li>
                        <li>
                            <a href="">延保服务</a>
                        </li>
                        <li>
                            <a href="">京西E卡</a>
                        </li>
                        <li>
                            <a href="">京西通信</a>
                        </li>
                        <li>
                            <a href="">京西J+</a>
                        </li>
                    </ul>
                </div>
                <div class="mod_help_cover">
                    <h5 class="mod_help_cover_tit">京西自营覆盖区县</h5>
                    <div class="mod_help_cover_con">
                        <p class="mod_help_cover_info">
                            京西已向全国2661个区县提供自营配送服务，支持货到付款、POS机刷卡和售后上门服务。
                        </p>
                        <p class="mod_help_cover_more">
                            <a href="">查看详情></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mod_copyright">
        <div class="mod_copyright_inner w">
            <p class="mod_copyright_links">
                <a href="">关于我们</a>
                <span class="mod_copyright_split">|</span>
                <a href="">联系我们</a>
                <span class="mod_copyright_split">|</span>
                <a href="">联系客服</a>
                <span class="mod_copyright_split">|</span>
                <a href="">合作招商</a>
                <span class="mod_copyright_split">|</span>
                <a href="">营销中心</a>
                <span class="mod_copyright_split">|</span>
                <a href="">手机京西</a>
                <span class="mod_copyright_split">|</span>
                <a href="">友情链接</a>
                <span class="mod_copyright_split">|</span>
                <a href="">销售联盟</a>
                <span class="mod_copyright_split">|</span>
                <a href="">京西社区</a>
                <span class="mod_copyright_split">|</span>
                <a href="">风险监测</a>
                <span class="mod_copyright_split">|</span>
                <a href="">隐私政策</a>
                <span class="mod_copyright_split">|</span>
                <a href="">京西公益</a>
                <span class="mod_copyright_split">|</span>
                <a href="">English Site</a>
                <span class="mod_copyright_split">|</span>
                <a href="">Contact Us</a>
            </p>
            <div class="mod_copyright_info">
                <p>
                    <a href="">京公网安备 11000002000088号</a>
                    <span class="mod_copyright_split">|</span>
                    <a href="">京ICP证070359号</a>
                    <span class="mod_copyright_split">|</span>
                    <a href="">互联网药品信息服务资格证编号(京)-经营性-2014-0008</a>
                    <span class="mod_copyright_split">|</span>
                    <a href="">新出发京零 字第大120007号</a>
                </p>
                <p>
                    <a href="">互联网出版许可证编号新出网证(京)字150号</a>
                    <span class="mod_copyright_split">|</span>
                    <a href="">出版物经营许可证</a>
                    <span class="mod_copyright_split">|</span>
                    <a href="">网络文化经营许可证京网文[2014]2148-348号</a>
                    <span class="mod_copyright_split">|</span>
                    <a href="">违法和不良信息举报电话：4006561155</a>
                </p>
                <p>
                    <a href="">Copyright&nbsp;&nbsp;©&nbsp;&nbsp;2004&nbsp;-&nbsp;2017&nbsp;&nbsp;京西JX.com&nbsp;版权所有</a>
                    <span class="mod_copyright_split">|</span>
                    <a href="">消费者维权热线：4006067733&nbsp;&nbsp;经营证照</a>
                </p>
                <p>
                    <span style="font-size: 12px;">京西旗下网站：</span>
                    <a href="">京西钱包</a>
                    <span class="mod_copyright_split">|</span>
                    <a href="">京西云</a>
                </p>
            </div>
            <p class="mod_copyright_auth">
                <a href="" class="mod_copyright_auth_ico_1 mod_copyright_auth_ico"></a>
                <a href="" class="mod_copyright_auth_ico_2 mod_copyright_auth_ico"></a>
                <a href="" class="mod_copyright_auth_ico_3 mod_copyright_auth_ico"></a>
                <a href="" class="mod_copyright_auth_ico_4 mod_copyright_auth_ico"></a>
                <a href="" class="mod_copyright_auth_ico_5 mod_copyright_auth_ico"></a>
                <a href="" class="mod_copyright_auth_ico_6 mod_copyright_auth_ico"></a>
            </p>
        </div>
    </div>
</div>
<!--页脚结束-->

<!--地址填写开始-->
<div class="ui-dialog">
    <div class="ui-dialog-title">
        <span>新增收货人信息</span>
    </div>
    <div class="ui-dialog-content">
        <div class="dialog-frame">
            <form action="" method="post">
                <input type="hidden" name="cm_id">
                <div class="item mt10" id="area_div">
                    <span class="label"><em>*</em>所在地区</span>
                    <div class="ui-area-wrap fl">
                        <select name="" id="area1"></select>
                        <select name="" id="area2"></select>
                        <select name="" id="area3"></select>
                    </div>
                </div>
                <div class="item" id="name_div">
                    <span class="label"><em>*</em>收货人</span>
                    <div class="fl">
                        <input type="text" class="itxt" id="consignee_name" name="consignee_name" maxlength="20" value="">
                        <span class="error-msg" id="name_div_error"></span>
                    </div>
                </div>
                <div class="item">
                    <span class="label"><em>*</em>详细地址</span>
                    <div class="fl">
                        <input type="text" class="itxt itxt02" id="consignee_address" name="consignee_address" maxlength="50" value="">
                        <span class="error-msg" id="address_div_error"></span>
                    </div>
                </div>
                <div class="item" id="call_div">
                    <span class="label"><em>*</em>手机号码</span>
                    <div class="fl">
                        <span class="telnum-prefix" id="span_consignee_areaCode">0086</span>
                        <span class="telnum-prefix-gap"></span>
                        <input type="text" class="itxt itxt01" id="consignee_mobile" name="consignee_mobile" maxlength="11" value="">
                    </div>
                    <span class="error-msg" id="mobile_div_error"></span>
                </div>
                <div class="item" id="phone_div">
                    <span class="label"><em>&nbsp;&nbsp;</em>固定电话</span>
                    <div class="fl">
			            <span class="telnum-prefix" id="span_consignee_areaCode_phone">0086</span>
                        <span class="telnum-prefix-gap"></span>
                        <input type="text" class="itxt itxt01" id="consignee_phone" name="consignee_phone" maxlength="20" value="">
                    </div>
                    <span class="error-msg" id="phone_div_error"></span>
                </div>
                <div class="item" id="email_div">
                    <span class="label" id="span_consignee_email"><em>&nbsp;&nbsp;</em>邮箱地址</span>
                    <div class="fl">
                        <input type="email" class="itxt" id="consignee_email" name="consignee_email" maxlength="50" value="">
                        <span class="error-msg" id="email_div_error"></span>
                        <div class="ftx-03">用来接收订单提醒邮件，便于您及时了解订单状态</div>
                    </div>
                </div>
                <div class="item" id="alias_div">
                    <span class="label"><em>&nbsp;&nbsp;</em>地址别名</span>
                    <div class="fl">
                        <input type="text" class="itxt" id="consignee_addressname" name="consignee_addressname" maxlength="20" value="">
                        <span class="error-msg" id="alias_div_error"></span>
                        <span class="consignee-tag-info">建议填写常用名称</span>
                    </div>
                    <div class="consignee-tag fl ml10">
                        <span id="home">家里</span>
                        <span id="parentHome">父母家</span>
                        <span id="company">公司</span>
                    </div>
                </div>
                <div class="item mt20">
                    <span class="label">&nbsp;</span>
                    <div class="fl">
                        <a href="#none" class="btn-1"><span id="saveConsigneeTitleDiv">保存收货人信息</span></a>
                        <div class="loading loading-1" style="display:none"><b></b>正在提交信息，请等待！</div>
                    </div>
                    <div style="display:none">
                        <input id="consignee_form_reset" name="" type="reset">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <a class="ui-dialog-close">X</a>
</div>
<div class="ui-mask"></div>
<!--地址填写结束-->
</body>
</html>