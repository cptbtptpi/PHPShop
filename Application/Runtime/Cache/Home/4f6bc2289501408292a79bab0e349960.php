<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/wancezy/JDshop/Public/Home/css/base.css">
    <link rel="stylesheet" href="/wancezy/JDshop/Public/Home/css/myOrder.css">
    <script src="/wancezy/JDshop/Public/Home/js/jquery-1.11.1.min.js"></script>
    <script>
        $(function () {
            // 取消订单
            $(".order-cancel").click(function () {
                var i_id = $("input[name='i_id']").val();
                var _this = $(this);
                $.ajax({
                    type : "post",
                    url : "<?php echo u('OrderList/cancelOrder');?>",
                    data : {i_id : i_id},
                    dataType : "json",
                    success : function (data) {
                        if (data == 0) {
                            alert("取消失败");
                        } else {
                            _this.parents("tbody").remove();
                        }
                    }
                });
            });

            // 提醒发货
            $(".remind-send").click(function () {
                alert("已提醒卖家发货");
            });

            // 确认收货
            $(".confirm-order").click(function () {
                var i_id = $("input[name='i_id']").val();
                var _this = $(this);
                $.ajax({
                    type : "post",
                    url : "<?php echo u('OrderList/confirmOrder');?>",
                    data : {i_id : i_id},
                    dataType : "json",
                    success : function (data) {
                        if (data == 0) {
                            alert("收货失败");
                        } else {
                            alert("收货成功");
                            _this.html("已收货");
                        }
                    }
                });
            });
        })
    </script>

</head>
<body class="my-order">
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
                    <a href="">我的订单</a>
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

<!--nav开始-->
<div id="nav">
    <div class="w">
        <div class="logo">
            <a href="" class="fore1"></a>
            <a href="" class="fore2">我的京东</a>
            <a href="" class="fore3">返回京东首页</a>
        </div>
        <div class="navitems">
            <ul>
                <li class="fore-1">
                    <a>首页</a>
                </li>
                <li class="fore-3">
                    <div class="dl myjd-set">
                        <div class="dt">
                            <span>账户设置</span>
                            <b></b>
                        </div>
                        <div class="dd"></div>
                    </div>
                </li>
                <li class="fore-4">
                    <div class="dl myjd-info">
                        <div class="dt">
                            <span>社区</span>
                            <b></b>
                        </div>
                        <div class="dd"></div>
                    </div>
                </li>
                <li class="fore-5">
                    <a>消息</a>
                </li>
            </ul>
        </div>
        <div class="nav-r">
            <div id="search">
                <div class="form">
                    <input type="text" id="key" class="text" placeholder="油烟机">
                    <button class="button cw-icon" type="button">
                        <i></i>
                        搜索
                    </button>
                </div>
            </div>
            <div id="settleup" class="dorpdown">
                <div class="cw-icon">
                    <i class="ci-left"></i>
                    <i class="ci-right">&gt;</i>
                    <i class="ci-count" id="shopping-amount">0</i>
                    <a>我的购物车</a>
                </div>
                <div class="dorpdown-layer"></div>
            </div>
        </div>
    </div>
</div>
<!--nav结束-->

<!--container开始-->
<div id="container">
    <div class="w">
        <div id="content">
            <div id="sub">
                <div id="menu">
                    <dl class="fore1">
                        <dt>订单中心</dt>
                        <dd class="fore1-1 curr">
                            <a href="">我的订单</a>
                        </dd>
                        <dd class="fore1-2">
                            <a href="">我的活动</a>
                        </dd>
                        <dd class="fore1-3">
                            <a href="">评价晒单</a>
                        </dd>
                        <dd class="fore1-4">
                            <a href="">取消订单记录</a>
                        </dd>
                        <dd class="fore1-5">
                            <a href="">我的常购物品
                                <img width="24" height="11" src="/wancezy/JDshop/Public/Home/images/myOrder/myjd-new-ico.png" alt="">
                            </a>
                        </dd>
                    </dl>
                    <dl class="fore2">
                        <dt>关注中心</dt>
                        <dd class="fore2-1">
                            <a href="">关注的商品</a>
                        </dd>
                        <dd class="fore2-2">
                            <a href="">关注的店铺</a>
                        </dd>
                        <dd class="fore2-3">
                            <a href="">关注的专辑</a>
                        </dd>
                        <dd class="fore2-4">
                            <a href="">关注的内容
                                <img width="24" height="11" src="/wancezy/JDshop/Public/Home/images/myOrder/myjd-new-ico.png" alt="">
                            </a>
                        </dd>
                        <dd class="fore2-5">
                            <a href="">关注的品牌</a>
                        </dd>
                        <dd class="fore2-6">
                            <a href="">关注的活动</a>
                        </dd>
                        <dd class="fore2-7">
                            <a href="">浏览历史</a>
                        </dd>
                    </dl>
                    <dl class="fore3">
                        <dt>资产中心</dt>
                        <dd class="fore3-1">
                            <a href="">小金库</a>
                        </dd>
                        <dd class="fore3-2">
                            <a href="">京东白条</a>
                        </dd>
                        <dd class="fore3-3">
                            <a href="">小白理财</a>
                        </dd>
                        <dd class="fore3-4">
                            <a href="">京东兑换卡</a>
                        </dd>
                        <dd class="fore3-5">
                            <a href="">余额</a>
                        </dd>
                        <dd class="fore3-6">
                            <a href="">优惠券</a>
                        </dd>
                        <dd class="fore3-7">
                            <a href="">京东卡/E卡</a>
                        </dd>
                        <dd class="fore3-8">
                            <a href="">京东图书卡</a>
                        </dd>
                        <dd class="fore3-9">
                            <a href="">京豆</a>
                        </dd>
                        <dd class="fore3-10">
                            <a href="">京东钢镚
                                <img width="24" height="11" src="/wancezy/JDshop/Public/Home/images/myOrder/myjd-new-ico.png" alt="">
                            </a>
                        </dd>
                    </dl>
                    <dl class="fore4">
                        <dt>特色业务</dt>
                        <dd class="fore4-1">
                            <a href="">我的营业厅</a>
                        </dd>
                        <dd class="fore4-2">
                            <a href="">京东通信</a>
                        </dd>
                        <dd class="fore4-3">
                            <a href="">定期购</a>
                        </dd>
                        <dd class="fore4-4">
                            <a href="">我的飞单</a>
                        </dd>
                        <dd class="fore4-5">
                            <a href="">我的回收单</a>
                        </dd>
                        <dd class="fore4-6">
                            <a href="">节能补贴</a>
                        </dd>
                        <dd class="fore4-7">
                            <a href="">医药服务</a>
                        </dd>
                        <dd class="fore4-8">
                            <a href="">流量加油站</a>
                        </dd>
                        <dd class="fore4-9">
                            <a href="">黄金托管</a>
                        </dd>
                        <dd class="fore4-10">
                            <a href="">视频教育订单</a>
                        </dd>
                        <dd class="fore4-11">
                            <a href="">海外房产预约</a>
                        </dd>
                        <dd class="fore4-12">
                            <a href="">我的全球购</a>
                        </dd>
                        <dd class="fore4-13">
                            <a href="">装修服务</a>
                        </dd>
                    </dl>
                    <dl class="fore5">
                        <dt>客户服务</dt>
                        <dd class="fore5-1">
                            <a href="">返修退换货</a>
                        </dd>
                        <dd class="fore5-2">
                            <a href="">价格保护</a>
                        </dd>
                        <dd class="fore5-3">
                            <a href="">意见建议</a>
                        </dd>
                        <dd class="fore5-4">
                            <a href="">我的问答</a>
                        </dd>
                        <dd class="fore5-5">
                            <a href="">购买咨询</a>
                        </dd>
                        <dd class="fore5-6">
                            <a href="">交易纠纷</a>
                        </dd>
                        <dd class="fore5-7">
                            <a href="">京东维修</a>
                        </dd>
                        <dd class="fore5-8">
                            <a href="">上门预约服务</a>
                        </dd>
                        <dd class="fore5-9">
                            <a href="">我的发票</a>
                        </dd>
                        <dd class="fore5-10">
                            <a href="">举报中心</a>
                        </dd>
                    </dl>
                    <dl class="fore6">
                        <dt>设置</dt>
                        <dd class="fore6-1">
                            <a href="">个人信息</a>
                        </dd>
                        <dd class="fore6-2">
                            <a href="">收货地址</a>
                        </dd>
                    </dl>
                </div>
                <div id="menu-ads">
                    <div>
                        <a href="">
                            <img src="/wancezy/JDshop/Public/Home/images/myOrder/adImages/menu-ad-1.jpg" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="">
                            <img src="/wancezy/JDshop/Public/Home/images/myOrder/adImages/menu-ad-2.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div id="main">
                <!--我的订单开始-->
                <div class="mod-main mod-comm mod-order">
                    <div class="mt">
                        <h3>我的订单</h3>
                        <div class="extra-r"></div>
                    </div>
                </div>
                <!--我的订单结束-->
                <!--订单部分开始-->
                <div class="mod-main mod-comm lefta-box order-content">
                    <div class="mt">
                        <ul class="extra-l">
                            <li class="fore1">
                                <a href="" class="txt curr">全部订单</a>
                            </li>
                            <li>
                                <a href="" class="txt">待付款</a>
                            </li>
                            <li>
                                <a href="" class="txt">待收货</a>
                            </li>
                            <li>
                                <a href="" class="txt">待评价</a>
                            </li>
                            <li class="fore2">
                                <a href="">
                                    <strong>我的常购商品</strong>
                                    <span class="new"></span>
                                </a>
                            </li>
                            <li class="fore2">
                                <a href="">
                                    <strong>好货.清仓</strong>
                                    <span class="new"></span>
                                </a>
                            </li>
                            <li class="fore2">
                                <a href="" class="ftx-03">订单回收站</a>
                            </li>
                        </ul>
                        <div class="extra-r">
                            <div class="search">
                                <input type="text" class="itxt" name="" id="" placeholder="商品名称/商品编号/订单号">
                                <a href="" class="search-btn">
                                    搜索
                                    <b></b>
                                </a>
                                <a href="" class="default-btn high-search">
                                    高级
                                    <b></b>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="mc">
                        <div class="top-search hide"></div>
                        <table class="td-void order-tb">
                            <thead>
                                <tr>
                                    <th style="width: 589px;">
                                        <div class="ordertime-cont">
                                            <div class="time-txt">
                                                近三个月订单
                                                <b></b>
                                            </div>
                                            <div class="time-list"></div>
                                        </div>
                                        <div class="order-detail-txt arc">订单详情</div>
                                    </th>
                                    <th style="width: 115px;">收货人</th>
                                    <th style="width: 110px;">金额</th>
                                    <th style="width: 110px;">
                                        <div class="deal-state-cont">
                                            <div class="state-txt">
                                                全部状态
                                                <b></b>
                                            </div>
                                            <div class="state-list"></div>
                                        </div>
                                    </th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <?php if(is_array($indentData)): foreach($indentData as $key=>$v): ?><tbody>
                                <tr class="sep-row">
                                    <td colspan="5"></td>
                                </tr>
                                <tr class="tr-th">
                                    <td colspan="5">
                                        <span class="gap"></span>
                                        <span class="dealtime"><?php echo date('Y-m-d H:i:s',$v['gener_time']); ?></span>
                                        <span class="number">
                                            订单号:
                                            <a href=""><?php echo ($v['order_number']); ?></a>
                                        </span>
                                        <div class="tr-operate">
                	                        <!--<span class="order-shop">-->
                                                <!--<a href="" class="shop-txt">A21官方旗舰店</a>-->
                                                <!--<a class="btn-im"></a>-->
                                            <!--</span>-->
                                            <span class="tel">
                                                <i class="tel-icon"></i>400-610-1360转101827
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="tr-bd">

                                    <td>
                                        <?php if(is_array($v['order_list'])): foreach($v['order_list'] as $key=>$vv): ?><div>
                                                <div class="goods-item">
                                                    <div class="p-img">
                                                        <a href="<?php echo u('content/index',['g_id'=>$vv['jn_goods_g_id']]);?>">
                                                            <img class="" src="<?php echo ($vv['pic']); ?>" width="60" height="60">
                                                        </a>
                                                    </div>
                                                    <div class="p-msg">
                                                        <div class="p-name">
                                                            <a href="<?php echo u('content/index',['g_id'=>$vv['jn_goods_g_id']]);?>" class="a-link"><?php echo ($vv['name']); ?></a>
                                                        </div>
                                                        <div class="p-extra">
                                                            <ul class="o-info">
                                                                <li>
                                                            <span class="o-match J-o-match">
                                                                <i></i>
                                                                <em>找搭配</em>
                                                            </span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="goods-number">x<?php echo ($vv['amount']); ?></div>
                                                <div class="goods-repair"></div>
                                                <div class="clr"></div>
                                            </div><?php endforeach; endif; ?>
                                    </td>

                                    <td rowspan="2">
                                        <div class="consignee tooltip">
                                            <span class="txt"><?php echo ($v['consignee']); ?></span><b></b>
                                            <div class="prompt-01 prompt-02">
                                                <div class="pc">
                                                    <strong><?php echo ($v['consignee']); ?></strong>
                                                    <p><?php echo ($v['consignee_addr']); ?></p>
                                                    <p><?php echo ($v['consignee_tel']); ?></p>
                                                </div>
                                                <div class="p-arrow p-arrow-left"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td rowspan="2">
                                        <div class="amount">
                                            <span>总额 ¥<?php echo ($v['total_pri']); ?></span> <br>
                                            <strong>应付</strong> <br>
                                            <strong>¥<?php echo ($v['total_pri']); ?></strong> <br>
                                            <span class="ftx-13">在线支付</span>
                                        </div>
                                    </td>
                                    <td rowspan="2">
                                        <div class="status">
                                            <span class="order-status ftx-04"><?php if($v['order_payment'] == 0): ?>未付款<?php else: ?>已付款<?php endif; ?></span><br>
                                            <div class="tooltip">
                                                <i class="auto-icon"></i>
                                                跟踪
                                                <i class="circle-icon"></i>
                                            </div>
                                            <a href="">订单详情</a>
                                        </div>
                                    </td>
                                    <td rowspan="2">
                                        <div class="operate">
                                            <input type="hidden" name="i_id" value="<?php echo ($v['i_id']); ?>">
                                            <!--<div class="count-time" style="display: block;">-->
                                                <!--<i class="time-icon"></i>剩余23时2分-->
                                            <!--</div>-->
                                            <?php if($v['order_payment'] == 0): ?><a href="<?php echo u('payment/index',['i_id'=>$v['i_id']]);?>" class="btn-pay">去付款</a><br>
                                                <a href="javascript:void(0);" class="a-link order-cancel">取消订单</a><br>
                                                <?php else: ?>
                                                <?php if($v['order_status'] == 0): ?><a href="">未发货</a>
                                                    <a href="javascript:void(0);" class="remind-send">提醒卖家发货</a>
                                                    <?php elseif($v['order_status'] == 1): ?>
                                                    <a href="javascript:void(0);" class="confirm-order">确认收货</a>
                                                    <?php else: ?>
                                                    <a href="javascript:void(0);">已收货</a><?php endif; endif; ?>

                                        </div>
                                    </td>
                                </tr>
                            </tbody><?php endforeach; endif; ?>
                        </table>
                        <div class="mt20">
                            <div class="pagin fr">
                                <span class="prev-disabled">
                                    上一页<b></b>
                                </span>
                                <a class="current">1</a>
                                <span class="next-disabled">
                                    下一页<b></b>
                                </span>
                            </div>
                            <div class="clr"></div>
                        </div>
                        <!--<div class="empty-box">-->
                            <!--<i class="empty-icon"></i>-->
                            <!--<div class="e-cont">-->
                                <!--<h5>最近没有下过订单哦~</h5>-->
                                <!--<div class="op-btns">-->
                                    <!--<a href="" class="op-btn-allOrder mr10">查看全部订单</a>-->
                                    <!--<a href="" class="op-btn-home">去首页看看</a>-->
                                <!--</div>-->
                            <!--</div>-->
                        <!--</div>-->
                    </div>
                </div>
                <!--订单部分结束-->
                <!--买什么开始-->
                <!--<div class="mod-main">-->
                    <!--<div class="mt">-->
                        <!--<h3>买什么</h3>-->
                        <!--<div class="extra-r">-->
                            <!--<a href="">查看更多商品专辑</a>-->
                        <!--</div>-->
                    <!--</div>-->
                    <!--<div class="mc">-->
                        <!--<div class="album-slider">-->
                            <!--<a href="" class="slider-prev">-->
                                <!--<b></b>-->
                            <!--</a>-->
                            <!--<a href="" class="slider-next">-->
                                <!--<b></b>-->
                            <!--</a>-->
                            <!--<div class="album-slider-show">-->
                                <!--<div class="album-slider-cont" style="position: relative;">-->
                                    <!--<ul class="album-list">-->

                                    <!--</ul>-->
                                <!--</div>-->
                            <!--</div>-->
                        <!--</div>-->
                    <!--</div>-->
                <!--</div>-->
                <!--买什么结束-->
                <!--猜你喜欢开始-->
                <div class="mod-main mod-comm">
                    <div class="mt">
                        <h3>猜你喜欢</h3>
                        <div class="extra-r">
                            <div class="switch-items">
                                <a href="" class="curr">1</a>
                                <a href="">2</a>
                                <a href="">3</a>
                            </div>
                        </div>
                    </div>
                    <div class="mc">
                        <div class="goods-list">
                            <ul class="tabcon">
                                <li>
                                    <div class="p-item">
                                        <div class="p-img">
                                            <a href="">
                                                <img width="160" height="160" src="/wancezy/JDshop/Public/Home/images/myOrder/adImages/p-img-1.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="p-name">
                                            <a href="">【京东超市】洗颜专科 柔澈泡沫 洁面乳 120g（资生堂洗面奶）</a>
                                        </div>
                                        <div class="p-price">
                                            <strong>¥48.00</strong>
                                        </div>
                                        <div class="p-extra">
                                            <a href="">(已有632496人评价)</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="p-item">
                                        <div class="p-img">
                                            <a href="">
                                                <img width="160" height="160" src="/wancezy/JDshop/Public/Home/images/myOrder/adImages/p-img-1.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="p-name">
                                            <a href="">【京东超市】洗颜专科 柔澈泡沫 洁面乳 120g（资生堂洗面奶）</a>
                                        </div>
                                        <div class="p-price">
                                            <strong>¥48.00</strong>
                                        </div>
                                        <div class="p-extra">
                                            <a href="">(已有632496人评价)</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="p-item">
                                        <div class="p-img">
                                            <a href="">
                                                <img width="160" height="160" src="/wancezy/JDshop/Public/Home/images/myOrder/adImages/p-img-1.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="p-name">
                                            <a href="">【京东超市】洗颜专科 柔澈泡沫 洁面乳 120g（资生堂洗面奶）</a>
                                        </div>
                                        <div class="p-price">
                                            <strong>¥48.00</strong>
                                        </div>
                                        <div class="p-extra">
                                            <a href="">(已有632496人评价)</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="p-item">
                                        <div class="p-img">
                                            <a href="">
                                                <img width="160" height="160" src="/wancezy/JDshop/Public/Home/images/myOrder/adImages/p-img-1.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="p-name">
                                            <a href="">【京东超市】洗颜专科 柔澈泡沫 洁面乳 120g（资生堂洗面奶）</a>
                                        </div>
                                        <div class="p-price">
                                            <strong>¥48.00</strong>
                                        </div>
                                        <div class="p-extra">
                                            <a href="">(已有632496人评价)</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="p-item">
                                        <div class="p-img">
                                            <a href="">
                                                <img width="160" height="160" src="/wancezy/JDshop/Public/Home/images/myOrder/adImages/p-img-1.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="p-name">
                                            <a href="">【京东超市】洗颜专科 柔澈泡沫 洁面乳 120g（资生堂洗面奶）</a>
                                        </div>
                                        <div class="p-price">
                                            <strong>¥48.00</strong>
                                        </div>
                                        <div class="p-extra">
                                            <a href="">(已有632496人评价)</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--猜你喜欢结束-->
                <!--底部广告开始-->
                <div class="mod-main">
                    <div class="bottom-ad bottom-ad1">
                        <a href="">
                            <img src="/wancezy/JDshop/Public/Home/images/myOrder/adImages/bottom-ad-1.jpg" alt="">
                        </a>
                    </div>
                    <div class="bottom-ad bottom-ad2">
                        <a href="">
                            <img src="/wancezy/JDshop/Public/Home/images/myOrder/adImages/bottom-ad-2.jpg" alt="">
                        </a>
                    </div>
                </div>
                <!--底部广告结束-->
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
</body>
</html>