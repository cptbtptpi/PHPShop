<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/wancezy/JDshop/Public/Home/css/base.css">
    <link rel="stylesheet" href="/wancezy/JDshop/Public/Home/css/content.css">
    <script src="/wancezy/JDshop/Public/Home/js/jquery-1.11.1.min.js"></script>
</head>
<body class="productDetails">
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
                    <a href="" class="nickname">Vic</a>
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

<!--header开始-->
<div id="header">
    <div class="w clearfix">
        <div id="logo-2">
            <a href="" class="logo"></a>
            <div class="extra">
                <div id="channel"></div>
                <div id="categorys-mini">
                    <div class="cw-icon">
                        <h2>
                            <a href="">全部分类
                                <i class="ci-right">
                                    <s>◇</s>
                                </i>
                            </a>
                        </h2>
                    </div>
                    <div id="categorys-mini-main" class="hover">
                        <div class="dd-inner">
                            <div class="item fore1">
                                <h3>
                                    <a href="">家用电器</a>
                                </h3>
                            </div>
                            <div class="item fore2">
                                <h3>
                                    <a href="">手机</a>、
                                    <a href="">运营商</a>、
                                    <a href="">数码</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="search-2">
            <div class="form">
                <input type="text" class="text" name="" id="">
                <button class="button cw-icon">搜全站</button>
                <button class="button button01">搜本店</button>
            </div>
        </div>
        <div id="settleup-2" class="dorpdown">
            <div class="cw-icon">
                <i class="ci-left"></i>
                <i class="ci-right">&gt;</i>
                <i class="ci-count" id="shopping-amount">0</i>
                <a href="">我的购物车</a>
            </div>
            <div class="dorpdown-layer">
                <div class="spacer"></div>
                <div class="prompt">
                    <div class="nogoods">
                        <b></b>购物车中还没有商品，赶紧选购吧！
                    </div>
                </div>
            </div>
        </div>
        <div id="hotwords">
            <a href="">618年中大促销</a>
            <a href="">连衣裙</a>
            <a href="">单鞋</a>
            <a href="">潮流男装</a>
            <a href="">六一儿童节</a>
            <a href="">内衣</a>
        </div>
        <span class="clr"></span>
    </div>
</div>
<!--header结束-->

<!--shop-head开始-->
<div id="shop-head">
    <div class="layout-area">
        <div class="layout layout-auto" style="overflow: visible;">
            <div class="layout-one" style="overflow: visible;">
                <div>
                    <div class="mc" style="width: 100%;background:#ffffff no-repeat center center;">
                        <img src="/wancezy/JDshop/Public/Home/images/productDetails/product/logo.jpg" alt="" style="width: 100%;" >
                    </div>
                </div>
                <div style="width: 100%;background-color: #a30606;">
                    <div class="mc" style="overflow: visible;">
                        <div class="sh-head-menu" style="background: #a30606;">
                            <ul class="menu-list">
                                <li class="menu-item">
                                    <a href="" class="menu-item-lk">首页</a>
                                </li>
                                <li class="menu-item">
                                    <a href="" class="menu-item-lk">
                                        全部分类
                                        <span class="menu-item-arrow"></span>
                                    </a>
                                    <div class="sub-menu-wrap"></div>
                                </li>
                                <li class="menu-item">
                                    <a href="" class="menu-item-lk">夏季新品</a>
                                </li>
                                <li class="menu-item">
                                    <a href="" class="menu-item-lk">短袖T恤</a>
                                </li>
                                <li class="menu-item">
                                    <a href="" class="menu-item-lk">衬衫</a>
                                </li>
                                <li class="menu-item">
                                    <a href="" class="menu-item-lk">牛仔裤</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!--shop-head结束-->

<!--crumb-wrap开始-->
<div id="crumb-wrap" class="crumb-wrap">
    <div class="w">
        <div class="crumb fl clearfix">
            <div class="item"><a href=""><?php echo ($fatherCateData['c_name']); ?></a></div>
            <div class="item sep">&gt;</div>
            <div class="item"><a href=""><?php echo ($cateData['c_name']); ?></a></div>
            <div class="item sep">&gt;</div>
            <div class="item"><a href=""><?php echo ($brandData['b_name']); ?></a></div>
            <div class="item sep">&gt;</div>
            <div class="item ellipsis"><?php echo ($goodsData['goods_name']); ?></div>
        </div>
        <div class="contact fr clearfix">
            <div class="contact-list">
                <div class="item">
                    <div class="name">
                        <a href=""><?php echo ($brandData['b_name']); ?>官方旗舰店</a>
                    </div>
                </div>
                <div class="item pop-score">
                    <div class="pop-head">
                        <div class="star">
                            <span class="heart-white">
                                <span class="heart-up h9">&nbsp;</span>
                            </span>
                            <em class="evaluate-grade">
                                <span title="9.58">
                                    <a class="number up" href="">9.58</a>
                                </span>
                                <i class="sprite-up"></i>
                            </em>
                        </div>
                    </div>
                </div>
                <div class="item hide" style="display: block; margin-top: 5px;">
                    <div class="J-im-btn">
                        <div class="im pop-im">
                            <i class="sprite-im"></i>联系卖家
                        </div>
                    </div>
                </div>
                <div class="item hide" style="display: block;">
                    <div class="J-jimi-btn">
                        <div class="jimi">
                            <a href="">
                                <i class="sprite-jimi"></i>JIMI
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="follow">
                        <i class="sprite-follow"></i>
                        <span>关注店铺</span>
                    </div>
                </div>
                <div class="contact-layer"></div>
            </div>
        </div>
        <div class="clr"></div>
    </div>
</div>
<!--crumb-wrap结束-->

<!--中间主要内容开始-->
<div id="center">
    <div class="w">
        <div class="product-intro clearfix">
            <div class="preview-wrap">
                <div class="preview">
                    <div id="left" class="jqzoom main-img">
                        <?php if(is_array($middlePic)): foreach($middlePic as $key=>$v): ?><img src="<?php echo ($v); ?>" alt="" class="spec-img" style="display:none;"><?php endforeach; endif; ?>
                        <i></i>
                        <div id="box" class="box"></div>
                        <div id="cover"></div>
                    </div>
                    <div id="right" class="zoomdiv">
                        <?php if(is_array($bigPic)): foreach($bigPic as $key=>$v): ?><img src="<?php echo ($v); ?>" alt="" style="display:none;"><?php endforeach; endif; ?>
                    </div>
                    <div class="spec-list">
                        <a id="spec-forward" href="javascript:;" class="arrow-prev disabled"><i class="sprite-arrow-prev"></i></a>
                        <a id="spec-backward" href="javascript:;" class="arrow-next"><i class="sprite-arrow-next"></i></a>
                        <div class="spec-items">
                            <ul class="lh">
                                <?php if(is_array($smallPic)): foreach($smallPic as $k=>$v): ?><li>
                                    <img data-key="<?php echo ($k); ?>" src="<?php echo ($v); ?>" alt="">
                                </li><?php endforeach; endif; ?>
                            </ul>
                        </div>
                    </div>
                    <script>

                    </script>
                    <script>

                    </script>
                    <div class="preview-info">
                        <div class="left-btns">
                            <a class="follow J-follow" href="">
                                <i class="sprite-follow-sku"></i><em>关注</em>
                            </a>
                            <a class="share J-share" href="">
                                <i class="sprite-share"></i><em>分享</em>
                            </a>
                        </div>
                        <div class="right-btns">
                            <a class="report-btn" href="">举报</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="itemInfo-wrap">
                <div class="sku-name">
                    <?php echo ($goodsData['goods_name']); echo ($goodsData['goods_number']); ?>
                </div>
                <div class="news">
                    <div class="item hide" id="p-ad" style="display: block;">【618抢先购】全场限时不限量3免1，限5月27号-5月31号；店铺首页更多惊喜！</div>
                    <div class="item hide" id="p-ad-phone"></div>
                </div>
                <div class="summary summary-first">
                    <div class="summary-price-wrap">
                        <div class="summary-price">
                            <div class="dt fz14">京 东 价</div>
                            <div class="dd">
                                <div class="p-price fl">
                                    <span>￥</span>
                                    <span class="price"><?php echo ($goodsData['mall_price']); ?></span>
                                </div>
                                <div class="pricing" style="font-size: 12px;">
                                    [吊牌价：￥
                                    <del id="page-dpprice"><?php echo ($goodsData['market_price']); ?></del>
                                    ]
                                </div>
                                <a href="" class="notice">降价通知</a>
                            </div>
                        </div>
                        <div class="summary-info clearfix">
                            <div class="comment-count item fl">
                                <p class="comment fz12">累计评价</p>
                                <a href="" class="count">9400+</a>
                            </div>
                        </div>
                        <div class="summary-top z-has-more-promotion">
                            <div class="summary-promotion">
                                <div class="dt fz14">促　销</div>
                                <div class="dd p-promotions-wrap">
                                    <div class="p-promotions fz12">
                                        <div class="prom">
                                            <div class="prom-item">
                                                <em class="hl-red-bg">限制</em>
                                                <em class="hl-red">此价格不与套装优惠同时享受</em>
                                            </div>
                                            <div class="more-prom-ins">
                                                <em class="hl-red-bg">满减</em>
                                                <em class="hl-red-bg">活动预告</em>
                                            </div>
                                        </div>
                                        <div class="prom">
                                            <div class="prom-item">
                                                <em class="hl-red-bg">满减</em>
                                                <em class="hl-red">满179.00减20.00，满279.00减40.00</em>
                                                <a href="">
                                                    详情
                                                    <s class="s-arrow">&gt;&gt;</s>
                                                </a>
                                            </div>
                                            <div class="prom-item">
                                                <em class="hl-red-bg">活动预告</em>
                                                <em class="hl-red">06月02日 00:00 该商品参加跨店铺满折活动  ，满2件，总价打8.00折；满3件，总价打7.00折</em>
                                                <a href="">
                                                    详情
                                                    <s class="s-arrow">&gt;&gt;</s>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="view-all-promotions" style="visibility: visible;">
                                            <span class="prom-sum">展开促销</span>
                                            <a href="" class="view-link">
                                                <i class="sprite-arr-close"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="summary p-choose-wrap">
                    <div class="summary-stock">
                        <div class="dt">配 送 至</div>
                        <div class="dd">
                            <div class="store clearfix">
                                <div class="stock-address">
                                    <div class="stock-address-inner">
                                        <div class="head">
                                            <span class="text">北京朝阳区三环以内</span>
                                            <span class="arrow arr-close"></span>
                                        </div>
                                        <div class="content"></div>
                                    </div>
                                </div>
                                <div class="store-prompt">
                                    <strong>有货</strong>
                                </div>
                                <div class="promise-icon fl">
                                    <div class="title fl">支持</div>
                                    <div class="icon-first fl">
                                        <ul>
                                            <div class="line1 clearfix">
                                                <a href="" class="noborder">货到付款</a>
                                            </div>
                                            <div class="line2 clearfix"></div>
                                        </ul>
                                        <span class="clr"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="summary-supply li">
                        <div class="dt">　　</div>
                        <div class="dd">
                            <div id="summary-service" class="summary-service" >由
                                <a href="" class="hl-red"><?php echo ($brandData['b_name']); ?>官方旗舰店</a>
                                从 广东东莞市 发货，并提供售后服务。现在至明天15:00前下单,预计<b><?php echo date('m月d日',time()+2*24*60*60); ?>24:00</b>前送达
                            </div>
                        </div>
                    </div>
                    <div class="summary-line"></div>
                    <div class="choose-attrs">
                        <?php if(is_array($specData)): foreach($specData as $key=>$v): ?><div class="li p-choose choose-attr-1">
                            <div class="dt">选择<?php echo ($v['attr_name']); ?></div>
                            <div class="dd">
                                <?php if(is_array($v['select'])): foreach($v['select'] as $key=>$vv): ?><div class="item">
                                    <a href="javascript:;"><?php echo ($vv['goods_attr_name']); ?></a>
                                </div><?php endforeach; endif; ?>
                            </div>
                        </div><?php endforeach; endif; ?>
                    </div>
                    <!--<div class="choose-suits li">-->
                        <!--<div class="dt">套　　装</div>-->
                        <!--<div class="dd clearfix">-->
                            <!--<div class="item">-->
                                <!--<a href="javascript:;" class="title">优惠套装1</a>-->
                                <!--<div class="suits-panel"></div>-->
                            <!--</div>-->
                        <!--</div>-->
                    <!--</div>-->
                    <!--<div class="choose-baitiao li">-->
                        <!--<div class="dt">白条分期</div>-->
                        <!--<div class="dd">-->
                            <!--<div class="baitiao-list fl">-->
                                <!--<div class="item">-->
                                    <!--<a href="javascript:;">-->
                                        <!--<strong>不分期 </strong>-->
                                        <!--<span style="display:none;">0手续费</span>-->
                                    <!--</a>-->
                                <!--</div>-->
                                <!--<div class="item">-->
                                    <!--<a href="javascript:;">-->
                                        <!--<strong>￥21.99×3期</strong>-->
                                        <!--<span style="display:none;">含手续费</span>-->
                                    <!--</a>-->
                                <!--</div>-->
                                <!--<div class="item">-->
                                    <!--<a href="javascript:;">-->
                                        <!--<strong>￥11.16×6期 </strong>-->
                                        <!--<span style="display:none;">含手续费</span>-->
                                    <!--</a>-->
                                <!--</div>-->
                                <!--<div class="bt-info-tips">-->
                                    <!--<a class="question icon fl" href="">　</a>-->
                                <!--</div>-->
                            <!--</div>-->
                            <!--<div class="baitiao-text"></div>-->
                        <!--</div>-->
                    <!--</div>-->
                    <div class="summary-line"></div>
                    <div class="choose-btns clearfix">
                        <div class="choose-amount">
                            <div class="wrap-amount">
                                <input type="text" class="text buy-num" value="1">
                                <a href="javascript:;" class="btn-reduce disabled">-</a>
                                <a href="javascript:;" class="btn-add">+</a>
                            </div>
                        </div>
                        <a href="javascript:;" class="btn-lg btn-special1 cart-shop">加入购物车</a>
                    </div>
                    <div class="summary-tips">
                        <div class="dt" style="font-size: 12px;">温馨提示</div>
                        <div class="dd">
                            <ol class="tips-list clearfix">
                                <li>·支持7天无理由退货</li>
                            </ol>
                        </div>
                    </div>
                    <!--********加入购物车********-->
                    <script>
                        $(function () {
                            $('.cart-shop').click(function () {
                                if($('.selected').length>=2){
                                    //1.抓到gid
                                    var g_id = <?php echo $_GET['g_id']?>;
                                    //2.抓到选中的商品属性
                                    var options = '';
                                    $.each($('.selected'),function (k,v) {
                                        options += $(this).text() + ',';
                                    })
                                    var num = $('.buy-num').val();
                                    $.ajax({
                                        type:'post',
                                        url:"<?php echo u('home/content/addCart');?>",
                                        data:{g_id:g_id,options:options,num:num},
                                        dataType:'json',
                                        success:function (res) {

                                            location.href="<?php echo u('home/cart/index');?>";
                                        }
                                    })
                                }else{
                                    alert('请选择您所需要的规格!');
                                }
                            })
                        })
                    </script>
                    <!--********加入购物车结束********-->
                </div>
            </div>
            <div class="track">
                <div class="extra">
                    <div class="track-tit">
                        <h3>
                            看了又看
                        </h3>
                        <span></span>
                    </div>
                    <div class="track-con" style="position: relative;width: 150px;height: 510px;overflow: hidden;">
                        <ul style="position: absolute; width: 150px; height: 2550px; top: 0px; left: 0px;">
                            <?php if(is_array($seeMore)): foreach($seeMore as $key=>$v): ?><li class="fl">
                                <a href="<?php echo u('content/index',['g_id'=>$v['g_id']]);?>">
                                    <img src="<?php echo ($v['pic']); ?>" alt="">
                                    <p>￥<?php echo ($v['mall_price']); ?></p>
                                </a>
                            </li><?php endforeach; endif; ?>
                        </ul>
                    </div>
                    <div class="track-more">
                        <a href="#none" class="sprite-up">上翻</a>
                        <a href="#none" class="sprite-down">下翻</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--中间主要内容结束-->

<!--店长推荐部分开始-->
<div id="recommend">
    <div class="w">
        <div id="shopRecSuit" class="ETab">
            <div class="tab-main large">
                <ul>
                    <li class="shopRec-trigger current">店长推荐</li>
                </ul>
            </div>
            <div class="tab-con clearfix">
                <div class="shopRec-content">
                    <ul class="plist plist-2" id="shop-reco">
                        <?php if(is_array($tuijian)): foreach($tuijian as $k=>$v): ?><li class="fore<?php echo ($k); ?>">
                                <div class="p-img">
                                    <a href="<?php echo u('content/index',['g_id'=>$v['g_id']]);?>">
                                        <img width="160" height="160" src="<?php echo ($v['pic']); ?>" alt="">
                                    </a>
                                </div>
                                <div class="p-name">
                                    <a href="<?php echo u('content/index',['g_id'=>$v['g_id']]);?>">
                                        <?php echo ($v['goods_name']); ?>
                                    </a>
                                </div>
                                <div class="p-price">
                                    <strong>￥<?php echo ($v['mall_price']); ?></strong>
                                </div>
                            </li><?php endforeach; endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--店长推荐部分结束-->

<!--商品介绍及评论等开始-->
<div id="introduce-comment">
    <div class="w">
        <div class="aside">

        </div>
        <div class="detail">
            <div class="ETab" id="detail">
                <div class="tab-main large">
                    <ul>
                        <li class="current spjs">商品介绍</li>
                        <li class="ggybz">规格与包装</li>
                        <li class="shbz">售后保障</li>
                        <li class="sppj">商品评价
                            <span>(9400+)</span>
                        </li>
                        <li class="bdhpsp">本店好评商品</li>
                    </ul>
                    <div class="extra">
                        <div class="item addcart-mini">
                            <div class="EDropdown">
                                <div class="inner">
                                    <div class="head">
                                        <a href="" class="btn-primary">加入购物车</a>
                                    </div>
                                    <div class="content"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-con">
                    <div class="product-introduce">
                        <div class="p-parameter">
                            <ul class="p-parameter-list">
                                <li title="A21">品牌：
                                    <a href=""><?php echo ($brandData['b_name']); ?></a>
                                    <a href="#none" class="follow-brand btn-def">
                                        <b>♥</b>关注
                                    </a>
                                </li>
                            </ul>
                            <ul class="p-parameter-list">
                                <li>商品名称：<?php echo ($goodsData['goods_name']); ?></li>
                                <li>店铺：
                                    <a href=""><?php echo ($brandData['b_name']); ?>官方旗舰店</a>
                                </li>
                                <li>货号：<?php echo ($goodsData['goods_number']); ?></li>
                                <?php if(is_array($goodsAttrData)): foreach($goodsAttrData as $key=>$v): ?><li><?php echo ($v['attr_name']); ?>：<?php echo ($v['goods_attr_name']); ?></li><?php endforeach; endif; ?>

                            </ul>
                            <p class="more-par">
                                <a href="" class="more-param">更多参数
                                    <s class="txt-arr">&gt;&gt;</s>
                                </a>
                            </p>
                            <?php echo htmlspecialchars_decode($goodsDetail); ?>
                        </div>
                    </div>

                    <div class="size-pack">
                        <div class="Ptable">
                            <div class="Ptable-item">
                                <h3>主体</h3>
                                <dl>
                                    <dt>袖长</dt><dd>短袖</dd>
                                </dl>
                            </div>
                        </div>
                        <div class="package-list">
                            <h3>包装清单</h3>
                            <p>衣物x1 包装袋x1 包装盒x1 吊牌x1  商品品牌：A21</p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="m m-content guarantee" id="guarantee">
                <div class="mt">
                    <h3>售后保障</h3>
                </div>
                <div class="mc">
                    <div class="item-detail item-detail-copyright">
                        <div class="serve-agree-bd">
                            <dl>
                                <dt>
                                    <i class="goods"></i>
                                    <strong>卖家服务</strong>
                                </dt>
                                <dd>
                                    1、产品自签收之日起计算，7日内无条件退货，15日内换货服务，请先联系页面上方客服办理。
                                    2、产品包装完好，不脏不残，吊牌完好且不影响二次销售的商品可进行更换。<br>
                                </dd>
                                <dt>
                                    <i class="goods"></i>
                                    <strong>京东承诺</strong>
                                </dt>
                                <dd>
                                    京东平台卖家销售并发货的商品，由平台卖家提供发票和相应的售后服务。请您放心购买！<br>
                                    注：因厂家会在没有任何提前通知的情况下更改产品包装、产地或者一些附件，本司不能确保客户收到的货物与商城图片、产地、附件说明完全一致。只能确保为原厂正货！并且保证与当时市场上同样主流新品一致。若本商城没有及时更新，请大家谅解！
                                </dd>
                                <dt>
                                    <i class="goods"></i><strong>正品行货</strong>
                                </dt>
                                <dd>京东商城向您保证所售商品均为正品行货，京东自营商品开具机打发票或电子发票。</dd>
                                <dt><i class="unprofor"></i><strong>全国联保</strong></dt>
                                <dd>
                                    凭质保证书及京东商城发票，可享受全国联保服务（奢侈品、钟表除外；奢侈品、钟表由京东联系保修，享受法定三包售后服务），与您亲临商场选购的商品享受相同的质量保证。京东商城还为您提供具有竞争力的商品价格和<a href="//help.jd.com/help/question-892.html" target="_blank">运费政策</a>，请您放心购买！
                                    <br><br>注：因厂家会在没有任何提前通知的情况下更改产品包装、产地或者一些附件，本司不能确保客户收到的货物与商城图片、产地、附件说明完全一致。只能确保为原厂正货！并且保证与当时市场上同样主流新品一致。若本商城没有及时更新，请大家谅解！
                                </dd>
                                <dt><i class="no-worries"></i><strong>无忧退换货</strong></dt>
                                <dd class="no-worries-text">
                                    客户购买京东自营商品7日内（含7日，自客户收到商品之日起计算），在保证商品完好的前提下，可无理由退货。（部分商品除外，详情请见各商品细则）
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m m-content comment" id="comment">
                <div class="mt">
                    <h3>商品评价</h3>
                </div>
                <div class="mc" style="width: 990px;height: 500px;">

                </div>
            </div>
            <div class="m m-content shop-similar-promotion" id="shop-similar-promotion">
                <div class="mt clearfix">
                    <h3 class="fl">本店好评商品</h3>
                </div>
                <div class="mc">
                    <ul class="item-plist-2 shop-similar-promo-list clearfix masonry" style="position: relative;">
                        <li class="item masonry-brick" style="position: absolute;top: 0;left: 0;">
                            <div class="pro-wrap">
                                <div class="p-img">
                                    <a href="">
                                        <img src="/wancezy/JDshop/Public/Home/images/productDetails/product/good-comment-1.jpg" alt="">
                                    </a>
                                </div>
                                <div class="p-name">
                                    <a href="">以纯线上品牌a21 2017夏装新款T恤男舒适简约撞色条纹短袖上衣4621330312VP 宝蓝 L</a>
                                </div>
                                <div class="p-price">
                                    <a href="#none" class="p-focus">
                                        <i class="i-focus"></i>
                                        <em class="text">关注</em>
                                    </a>
                                    <strong class="price">
                                        <span>￥69.00</span>
                                    </strong>
                                </div>
                            </div>
                        </li>
                        <li class="item masonry-brick" style="position: absolute;top: 0;left: 247px;">
                            <div class="pro-wrap">
                                <div class="p-img">
                                    <a href="">
                                        <img src="/wancezy/JDshop/Public/Home/images/productDetails/product/good-comment-2.jpg" alt="">
                                    </a>
                                </div>
                                <div class="p-name">
                                    <a href="">以纯线上品牌a21 2017夏装新款短袖T恤男航海风条纹弹力上衣男4621330310VP 深蓝 175/88A/L</a>
                                </div>
                                <div class="p-price">
                                    <a href="#none" class="p-focus">
                                        <i class="i-focus"></i>
                                        <em class="text">关注</em>
                                    </a>
                                    <strong class="price">
                                        <span>￥69.00</span>
                                    </strong>
                                </div>
                            </div>
                        </li>
                        <li class="item masonry-brick" style="position: absolute;top: 0;left: 494px;">
                            <div class="pro-wrap">
                                <div class="p-img">
                                    <a href="">
                                        <img src="/wancezy/JDshop/Public/Home/images/productDetails/product/good-comment-2.jpg" alt="">
                                    </a>
                                </div>
                                <div class="p-name">
                                    <a href="">以纯线上品牌a21 2017夏装新款短袖T恤男航海风条纹弹力上衣男4621330310VP 深蓝 175/88A/L</a>
                                </div>
                                <div class="p-price">
                                    <a href="#none" class="p-focus">
                                        <i class="i-focus"></i>
                                        <em class="text">关注</em>
                                    </a>
                                    <strong class="price">
                                        <span>￥69.00</span>
                                    </strong>
                                </div>
                            </div>
                        </li>
                        <li class="item masonry-brick" style="position: absolute;top: 0;left: 741px;">
                            <div class="pro-wrap">
                                <div class="p-img">
                                    <a href="">
                                        <img src="/wancezy/JDshop/Public/Home/images/productDetails/product/good-comment-1.jpg" alt="">
                                    </a>
                                </div>
                                <div class="p-name">
                                    <a href="">以纯线上品牌a21 2017夏装新款T恤男舒适简约撞色条纹短袖上衣4621330312VP 宝蓝 L</a>
                                </div>
                                <div class="p-price">
                                    <a href="#none" class="p-focus">
                                        <i class="i-focus"></i>
                                        <em class="text">关注</em>
                                    </a>
                                    <strong class="price">
                                        <span>￥69.00</span>
                                    </strong>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="clb"></div>
    </div>

</div>
<!--商品介绍及评论等结束-->

<script src="/wancezy/JDshop/Public/Home/js/content/content.js"></script>

</body>
</html>