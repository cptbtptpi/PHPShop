<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/wancezy/JDshop/Public/Home/css/base.css">
    <link rel="stylesheet" href="/wancezy/JDshop/Public/Home/css/myCart.css">
    <script src="/wancezy/JDshop/Public/Home/js/jquery-1.11.1.min.js"></script>
</head>
<body class="myCart">
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
                    <a href="<?php echo u('OrderList/index',['u_id'=>$_SESSION['user']['u_id']]);?>">我的订单</a>
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
<div class="header">
    <div class="w clearfix">
        <div id="logo-2">
            <a href="" class="logo"></a>
            <a href="#none" class="link2"><b></b>购物车</a>
        </div>
        <div class="cart-search">
            <div class="form">
                <input id="key" type="text" class="itxt" style="color: rgb(153, 153, 153);" placeholder="自营">
                <input type="button" class="button" value="搜索" onclick="javascript:void(0);">
            </div>
        </div>
    </div>
</div>
<!--header结束-->

<script>
    $(function () {
        var nums = $(".quantity-form .itxt").val();

        $(".single-choose").prop("checked",true);
        $(".all-choose").prop("checked",true);

    //        $(".all-choose").click(function () {
    //            $(".single-choose").prop("checked",true);
    //        });
        $(".single-choose").click(function(){
            if($(this).attr("chec",true)){
                $(this).attr("chec",false);
            }else{

            }$(this).attr("chec",true);

        });


        // 商品数量的加
        $(".quantity-form .increment").click(function () {
            var kk = $(this).parents(".item-form").attr("kk");  // 获取操作的的键名
            var _this = $(this);
            var num = $(this).parents(".item-form").find(".itxt").val();

            $.ajax({
                type : 'post',
                url : "<?php echo u('home/cart/addNum');?>",
                data : {kk:kk},
                dataType : 'json',
                success : function (data) {
                    _this.parents(".item-form").find(".single-price").text(data.total);
                    _this.parents(".item-form").find(".itxt").val(data.num);
                    $(".sumPrice #total").text(data.total_price);
                    $(".amount-sum em").text(data.total_rows);
                    if (data.num == 1) {
                        _this.parents(".item-form").find(".decrement").addClass("disabled");
                    } else {
                        _this.parents(".item-form").find(".decrement").removeClass("disabled");
                    }
                }
            })
        });

        // 商品数量的减
        $(".quantity-form .decrement").click(function () {
            var kk = $(this).parents(".item-form").attr("kk");  // 获取操作的的键名
            var _this = $(this);
            var num = $(this).parents(".item-form").find(".itxt").val();
            if (num == 1) {
                num = 1;
                $(this).parents(".item-form").find(".itxt").val(num);
                $this.addClass("disabled");
            } else {
                $.ajax({
                    type : 'post',
                    url : "<?php echo u('home/cart/subNum');?>",
                    data : {kk:kk},
                    dataType : 'json',
                    success : function (data) {
                        _this.parents(".item-form").find(".single-price").text(data.total);
                        _this.parents(".item-form").find(".itxt").val(data.num);
                        $(".sumPrice #total").text(data.total_price);
                        $(".amount-sum em").text(data.total_rows);
                        if (data.num == 1) {
                            _this.addClass("disabled");
                        } else {
                            _this.removeClass("disabled");
                        }
                    }
                });
            }
        });

        // 商品的删除
        $(".cart-remove").click(function () {
            var kk = $(this).parents("item-form").attr("kk");
            var _this = $(this);
            $.ajax({
                type:'post',
                url:"<?php echo u('delGoods');?>",
                data:{kk:kk},
                dataType:'json',
                success:function (data) {
                    _this.parents(".item-item").remove();
                    $(".amount-sum").text(data.total_rows);
                }
            })
        });


        //地址栏参数
        var ss='';
        var tsid='';

        //点击提交
//        $('.submit-btn').click(function() {
////            var url = "<?php echo u('Payment/index');?>";
////            location.href = "";
//            for (var i = 0; i < $(".suibian").length; i++) {
//                var cc=$(".suibian").eq(i).attr('chec');
//                if(cc == 'true') {
//                    tsid = $(".suibian").eq(i).data('suibian');
//                    ss += tsid + ',';
//                }
//
//            }
//
//            var url="<?php echo u('home/pay/index',['sids'=>ss]);?>";
//            url=url.replace('ss',ss);
//            alert(url);
//            location.href=url;
//        })
    })
</script>

<!--分类购物车枚举开始-->
<div id="container" class="cart">
    <div class="w">
        <div class="cart-filter-bar">
            <ul class="switch-cart">
                <li class="switch-cart-item curr">
                    <a href="">
                        <em style="font-size: 16px;">全部商品</em>
                        <!--<span class="number">1</span>-->
                    </a>
                </li>
                <li class="switch-cart-item ui-switchable-selected">
                    <a href="">
                        <em style="font-size: 16px;">京东大药房</em>
                    </a>
                </li>
            </ul>
            <div class="cart-store">
                <span class="label">配送至：</span>
                <div id="jdarea" class="ui-area-wrap">
                    <div class="ui-area-text-wrap">
                        <div class="ui-area-text">北京朝阳区三环以内</div>
                        <b></b>
                    </div>
                    <div class="ui-area-content-wrap ui-area-common-area-mode ui-area-w-max" style="left: -348px;">

                    </div>
                </div>

            </div>
            <div class="clr"></div>
            <div class="w-line">
                <div class="floater" style="width: 79px; left: 0px;"></div>
            </div>
        </div>
    </div>

    <!--购物车主要内容-->
    <div class="cart-warp">
        <div class="w">
            <div id="jd-cart">
                <div class="cart-main cart-main-new">
                    <div class="cart-thead">
                        <div class="column t-checkbox">
                            <div class="cart-checkbox">
                                <input type="checkbox" class="jdcheckbox all-choose" id="toggle-checkboxes-up">
                                <label for="toggle-checkboxes-up" style="font-size: 12px;">全选</label>
                            </div>

                        </div>
                        <div class="column t-goods">商品</div>
                        <div class="column t-props"></div>
                        <div class="column t-price">单价</div>
                        <div class="column t-quantity">数量</div>
                        <div class="column t-sum">小计</div>
                        <div class="column t-action">操作</div>
                    </div>
                    <div id="cart-list">

                        <div class="cart-item-list">
                            <div class="cart-tbody">
                                <div class="shop">
                                    <!--<div class="cart-checkbox">-->
                                        <!--<input type="checkbox" class="jdcheckbox shop-choose">-->
                                    <!--</div>-->
                                    <!--<span class="shop-txt">-->
                                        <!--服装跨店2件8折 3件7折-->
                                    <!--</span>-->
                                </div>
                                <div class="item-list">
                                    <div class="item-full minus-item">
                                        <div class="item-header">
                                            <div class="f-txt">
                                                <a href="">
                                                    <span class="full-icon full-gray-icon">
                                                        跨店铺满折
                                                        <b></b>
                                                    </span>
                                                    活动商品购满2件，
                                                    即可享受满减&gt;
                                                </a>
                                                <a href="javascript:void(0);">&nbsp;去凑单&nbsp;&gt;</a>
                                            </div>
                                            <div class="f-price">
                                                <strong></strong>
                                            </div>
                                        </div>
                                        <?php if(is_array($cartData[cart][goods])): foreach($cartData[cart][goods] as $k=>$v): ?><div class="item-last item-item">
                                            <div class="item-form" kk="<?php echo ($k); ?>">
                                                <div class="cell p-checkbox">
                                                    <div class="cart-checkbox">
                                                        <input class="single-choose suibian" type="checkbox" data-suibian="<?php echo ($k); ?>" name="">
                                                        <!--<span class="line-circle"></span>-->
                                                    </div>
                                                </div>
                                                <div class="cell p-goods">
                                                    <div class="goods-item">
                                                        <div class="p-img">
                                                            <a href="<?php echo u('home/content/index',['g_id'=>$v['id']]);?>">
                                                                <img width="80" height="80" src="<?php echo ($v['pic']); ?>" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="item-msg">
                                                            <div class="p-name">
                                                                <a href="<?php echo u('home/content/index',['g_id'=>$v['id']]);?>"><?php echo ($v['name']); ?></a>
                                                            </div>
                                                            <div class="p-extend p-extend-new">
                                                                <span class="promise return-y">
                                                                    <i class="return-y-icon"></i>
                                                                    <a href="#none" class="ftx-08">支持7天无理由退货</a>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="cell p-props p-props-new">
                                                    <?php if(is_array($attrs)): foreach($attrs as $k=>$vv): ?><div class="props-txt"><?php echo ($vv['attr_name']); ?>：<?php echo ($v['options'][$k+1]); ?></div><?php endforeach; endif; ?>
                                                </div>
                                                <div class="cell p-price">
                                                    <strong>¥<span class="per-total"><?php echo ($v['price']); ?></span></strong>
                                                    <a class="sales-promotion" href="#none">
                                                        更多促销
                                                        <b></b>
                                                    </a>
                                                    <div class="promotion-tips"></div>
                                                </div>
                                                <div class="cell p-quantity">
                                                    <div class="quantity-form">
                                                        <a href="javascript:void(0);" class="decrement <?php if($v['num'] == 1): ?>disabled<?php endif; ?>">-</a>
                                                        <input type="text" class="itxt" value="<?php echo ($v['num']); ?>" minnum="1">
                                                        <a href="javascript:void(0);" class="increment">+</a>
                                                    </div>
                                                    <div class="ac ftx-03 quantity-txt">有货</div>
                                                </div>
                                                <div class="cell p-sum">
                                                    <strong>¥<span class="single-price"><?php echo ($v['total']); ?></span></strong>
                                                </div>
                                                <div class="cell p-ops">
                                                    <a class="cart-remove" href="javascript:void(0);">删除</a>
                                                    <a href="javascript:void(0);" class="cart-follow">移到我的关注</a>
                                                    <a href="javascript:void(0);" class="add-follow">加到我的关注</a>
                                                </div>
                                            </div>
                                        </div><?php endforeach; endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div id="cart-floatbar">
                <div class="ui-ceilinglamp-1" style="width: 990px;height: 52px;">
                    <div class="cart-toolbar" style="width: 988px;height: 50px;">
                        <div class="toolbar-wrap">
                            <div class="options-box">
                                <div class="select-all">
                                    <div class="cart-checkbox">
                                        <input type="checkbox" class="jdcheckbox all-choose" id="toggle-checkboxes-down">
                                        <label for="toggle-checkboxes-down" style="font-size: 12px;">全选</label>
                                    </div>
                                    <div class="operation">
                                        <a href="#none" class="remove-batch">删除选中的商品</a>
                                        <a href="#none" class="follow-batch">移到我的关注</a>
                                        <a class="J_clr_nosale" href="#none">清除下柜商品</a>
                                    </div>
                                    <div class="clr"></div>
                                    <div class="toolbar-right">
                                        <div class="normal">
                                            <div class="comm-right">
                                                <div class="btn-area">
                                                    <a href="<?php echo u('OrderSettle/index');?>" class="submit-btn">
                                                        去结算<b></b>
                                                    20</a>
                                                </div>
                                                <div class="price-sum">
                                                    <div>
                                                        <span class="txt txt-new">总价：</span>
                                                        <span class="price sumPrice">
                                                            <em data-bind="0.00">¥<span id="total"><?php echo ($cartData['cart']['total']); ?></span></em>
                                                        </span>
                                                        <b class="ml5 price-tips"></b>
                                                        <div class="price-tipsbox" style="left: 55.2813px; display: none;">
                                                            <div class="ui-tips-main">不含运费及送装服务费</div>
                                                            <span class="price-tipsbox-arrow"></span>
                                                        </div>
                                                        <br>
                                                        <span class="txt">已节省：</span>
                                                        <span class="price totalRePrice">- ¥0.00</span>
                                                    </div>
                                                </div>
                                                <div class="amount-sum">
                                                    已选择<em><?php echo ($cartData['cart']['total_rows']); ?></em>件商品<b class="up"></b>
                                                </div>
                                                <div class="clr"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--猜你喜欢-->
    <div class="w">
        <div class="m m1" id="c-tabs-new">
            <div class="mt">
                <div class="extra-l">
                    <a href="#none" class="c-item curr">猜你喜欢</a>
                    <!--<a href="#none" class="c-item">随手购</a>-->
                    <!--<a href="#none" class="c-item">我的关注</a>-->
                    <!--<a href="#none" class="c-item">最近浏览</a>-->
                </div>
            </div>
            <div class="mc c-panel-main" style="position: relative;">
                <div class="c-panel ui-switchable-panel-selected" id="guess-product" style="position: absolute;z-index: 1;opacity: 1;">
                    <!--<div class="goods-list-tab">-->
                        <!--<a href="#none" class="s-item curr">&nbsp;</a>-->
                        <!--<a href="#none" class="s-item">&nbsp;</a>-->
                        <!--<a href="#none" class="s-item">&nbsp;</a>-->
                    <!--</div>-->
                    <div class="mc c-panel-main" style="position: relative;">
                        <div class="goods-list c-panel ui-switched-panel-selected" style="position: absolute;z-index: 1;opacity: 1;">
                            <ul>
                                <?php if(is_array($caiLike)): foreach($caiLike as $key=>$v): ?><li>
                                    <div class="item">
                                        <div class="p-img">
                                            <a href="<?php echo u('content/index',['g_id'=>$v['g_id']]);?>">
                                                <img width="160" height="160" src="<?php echo ($v['pic']); ?>" alt="">
                                            </a>
                                        </div>
                                        <div class="p-name">
                                            <a href="<?php echo u('content/index',['g_id'=>$v['g_id']]);?>"><?php echo ($v['goods_name']); ?></a>
                                        </div>
                                        <div class="p-price">
                                            <strong>
                                                <em>￥</em>
                                                <i><?php echo ($v['mall_price']); ?></i>
                                            </strong>
                                        </div>
                                        <div class="p-btn">
                                            <a href="" class="btn-append">
                                                <b></b>加入购物车
                                            </a>
                                        </div>
                                    </div>
                                </li><?php endforeach; endif; ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--分类购物车枚举结束-->

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


<script src="/wancezy/JDshop/Public/Home/js/cart/cart.js"></script>
</body>
</html>