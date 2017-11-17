/**
 * Created by Administrator on 2017/6/1.
 */



/**
 * 放大镜下面的列表图与放大镜
 */
$("#left img:first").css("display","block");
$("#right img:first").attr("id","pic").css("display","block");
$(".spec-items ul li:first").addClass("spec-items-selected");
$(".spec-items ul li").mouseover(function () {
    $(this).addClass("spec-items-selected").siblings().removeClass("spec-items-selected");

    var key = $(this).children().data("key");
    $("#left img:eq("+key+")").css("display","block").siblings("img").css("display","none");
    $("#right img:eq("+key+")").attr("id","pic").css("display","block").siblings().removeAttr("id").css("display","none");
    var pic = document.getElementById("pic");  // 因为pic是根据li中鼠标的移动动态的变化的,所以将pic放到这里来获取
});
// 放大镜
var left = document.getElementById("left");
var right = document.getElementById("right");
var box = document.getElementById("box");
// var pic = document.getElementById("pic");
var cover = document.getElementById("cover");

// 鼠标移入,box和right的隐显
cover.onmouseover = function () {
    right.style.display = "block";
    box.style.display = "block";
};
cover.onmouseout = function () {
    right.style.display = "none";
    box.style.display = "none";
};

// 鼠标移入left并移动
cover.onmousemove = function (event) {
    var event = event || window.event;

    // 获得鼠标的位置,offsetX是鼠标到事件源的水平距离,offsetY同理
    var boxLeft = event.offsetX || event.layerX;
    var boxTop = event.offsetY || event.layerY;

    // 减去mask原有的宽高/2
    var x = boxLeft - box.offsetWidth / 2;
    var y = boxTop - box.offsetHeight / 2;

    // 判断mask溢出问题
    if (x < 0) {
        x = 0;
    } else if (x > left.offsetWidth - box.offsetWidth) {
        x = left.offsetWidth - box.offsetWidth;
    }

    if (y < 0) {
        y = 0;
    } else if (y > left.offsetHeight - box.offsetHeight) {
        y = left.offsetHeight - box.offsetHeight;
    }

    // 让box跟着走
    box.style.left = x + "px";
    box.style.top = y + "px";

    // right盒子中图片的移动
    pic.style.left = (-x * (right.offsetWidth / box.offsetWidth)) + "px";
    pic.style.top = (-y * (right.offsetHeight / box.offsetHeight)) + "px";
};



/**
 * 选择属性
 */
$(".choose-attrs .li .item").click(function () {
    $(this).addClass("selected").siblings().removeClass("selected");

});

/**
 * 购物车中数量的加减
 */
$(".wrap-amount .btn-add").click(function () {
    var buyNum = parseInt($(".wrap-amount .buy-num").val());
    buyNum += 1;
    $(".wrap-amount .buy-num").val(buyNum);
    if (buyNum == 1) {
        $(".wrap-amount .btn-reduce").addClass("disabled");
    } else {
        $(".wrap-amount .btn-reduce").removeClass("disabled");
    }
});
$(".wrap-amount .btn-reduce").click(function () {
    var buyNum = parseInt($(".wrap-amount .buy-num").val());
    if (buyNum == 1) {
        buyNum = 1;
        $(".wrap-amount .buy-num").val(buyNum);
    } else {
        buyNum -= 1;
        $(".wrap-amount .buy-num").val(buyNum);
        if (buyNum == 1) {
            $(".wrap-amount .btn-reduce").addClass("disabled");
        } else {
            $(".wrap-amount .btn-reduce").removeClass("disabled");
        }
    }

});

/**
 * 下方tab栏切换
 */
$(".ETab .tab-main li").click(function () {
    $(this).addClass("current").siblings().removeClass("current");
});
$(".ETab .tab-main .spjs").click(function () {
    $(".ETab .tab-con .product-introduce").removeClass("hide");
    $(".ETab .tab-con .size-pack").removeClass("hide");
    $(".detail .guarantee").removeClass("hide");
    $(".detail .comment").removeClass("hide");
});
$(".ETab .tab-main .ggybz").click(function () {
    $(".ETab .tab-con .product-introduce").addClass("hide");
    $(".ETab .tab-con .size-pack").removeClass("hide");
    $(".detail .guarantee").removeClass("hide");
    $(".detail .comment").removeClass("hide");
});
$(".ETab .tab-main .shbz").click(function () {
    $(".ETab .tab-con .product-introduce").addClass("hide");
    $(".ETab .tab-con .size-pack").addClass("hide");
    $(".detail .guarantee").removeClass("hide");
    $(".detail .comment").removeClass("hide");
});
$(".ETab .tab-main .sppj").click(function () {
    $(".ETab .tab-con .product-introduce").addClass("hide");
    $(".ETab .tab-con .size-pack").addClass("hide");
    $(".detail .guarantee").addClass("hide");
    $(".detail .comment").removeClass("hide");
});
$(".ETab .tab-main .bdhpsp").click(function () {
    $(".ETab .tab-con .product-introduce").addClass("hide");
    $(".ETab .tab-con .size-pack").addClass("hide");
    $(".detail .guarantee").addClass("hide");
    $(".detail .comment").addClass("hide");
});
