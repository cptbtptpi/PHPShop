/**
 * Created by Administrator on 2017/5/25.
 */
// 倒计时开始
var timer;
function djs() {
    var nowTime = new Date();
    var fulTime = new Date(2017,11,31,23,0,0);

    var res = fulTime - nowTime;

    var day = parseInt(res / (24 * 60 * 60 * 1000)) ;
    res = res % (24 * 60 * 60 * 1000);

    var hou = parseInt(res / (60 * 60 * 1000));
    res = res % (60 * 60 * 1000);
    if (hou < 10) {
        hou = "0" + hou;
    }

    var min = parseInt(res / (60 * 1000));
    res = res % (60 * 1000);
    if (min < 10) {
        min = "0" + min;
    }


    var sec = parseInt(res / (1000));
    if (sec < 10) {
        sec = "0" + sec;
    }


    $(".cd-hour").html(hou);
    $(".cd-minute").html(min);
    $(".cd-second").html(sec);
}

djs();
timer = setInterval(djs,1000);
// 倒计时结束


