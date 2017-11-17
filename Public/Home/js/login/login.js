/**
 * Created by Administrator on 2017/5/31.
 */
/**
 * 点击分类登录
 */
$(".login-tab-l a").click(function () {
   $(this).css({
       "font-weight" : "700",
       "color" : "#e43937"
   });
   $(".login-tab-r a").css({
       "font-weight" : "400",
       "color" : "#666"
   });
   $(".login-box").css({
       "display" : "none"
   });
   $(".qrcode-login").css({
       "display" : "block"
   })
});
$(".login-tab-r a").click(function () {
    $(this).css({
        "font-weight" : "700",
        "color" : "#e43937"
    });
    $(".login-tab-l a").css({
        "font-weight" : "400",
        "color" : "#666"
    });
    $(".login-box").css({
        "display" : "block"
    });
    $(".qrcode-login").css({
        "display" : "none"
    })
});


/**
 * 二维码滑动
 */
$(".qrcode-img").mouseenter(function () {
   $(this).stop().animate({
       left : "0"
   },400);
   $(".qrcode-help").stop().fadeIn();
}).mouseleave(function () {
    $(this).stop().animate({
        left : "64px"
    },400);
    $(".qrcode-help").stop().fadeOut();
});