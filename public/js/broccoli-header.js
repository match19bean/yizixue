
setInterval(headerSlide, 2000); // 每隔1秒呼叫一次headerSlide


let currentPic = 1;
const totalPics = 8; // 定義總共的圖片數量
let timeout1; // 定義 timeout1

function headerSlide(){
    // 清除之前的 setTimeout
    clearTimeout(timeout1);
    
    // 切換到下一張圖片
    if (currentPic < totalPics) {
        currentPic++;
    } else {
        currentPic = 1;
    }
    
    // 根據 currentPic 切換圖片
    if (currentPic === 1) {
        pic1();
    } else if (currentPic === 2) {
        pic2();
    } else if (currentPic === 3) {
        pic3();
    } else if (currentPic === 4) {
        pic4();
    } else if (currentPic === 5) {
        pic5();
    } else if (currentPic === 6) {
        pic6();
    } else if (currentPic === 7) {
        pic7();
    } else if (currentPic === 8) {
        pic8();
    }
}

function pic1(){
    $("#topic").text("海外留學，");
    $("#bannerImg").attr("src", "uploads/images/banner_p1.jpg");
}

function pic2(){
    $("#topic").text("升學考試，");
    $("#bannerImg").attr("src", "uploads/images/banner_p2.jpg");
}

function pic3(){
    $("#topic").text("國際學校，");
    $("#bannerImg").attr("src", "uploads/images/banner_p3.jpg");
}

function pic4(){
    $("#topic").text("選課輔導，");
    $("#bannerImg").attr("src", "uploads/images/banner_p4.jpg");
}

function pic5(){
    $("#topic").text("校園導覽，");
    $("#bannerImg").attr("src", "uploads/images/banner_p5.jpg");
}

function pic6(){
    $("#topic").text("社團⽣活，");
    $("#bannerImg").attr("src", "uploads/images/banner_p6.jpg");
}

function pic7(){
    $("#topic").text("⼯作實習，");
    $("#bannerImg").attr("src", "uploads/images/banner_p7.jpg");
}

function pic8(){
    $("#topic").text("職涯創業，");
    $("#bannerImg").attr("src", "uploads/images/banner_p8.jpg");
}

$(window).scroll(function(){
    let screenRoll = $(window).scrollTop();
    const bannerHeight = $("header").height();
    if (screenRoll >= bannerHeight){
        $(".scrollFunction").css("color", "#000000");
        $("#logoImg").attr("src","uploads/images/color_ezl.png");
        $("#mainNav").css("background-color", "white");
    }
    else{
        $(".scrollFunction").css("color", "#FFFFFF");
        $("#logoImg").attr("src","uploads/images/logo.png");
        $("#mainNav").css("background-color", "rgba(255, 255, 255, 0)");
    }
})



setInterval(newsSlide, 2000); // 每隔2秒呼叫一次headerSlide


let currentNews = 1;
const totalNews = 3; // 定義總共的圖片數量
let timeout2; // 定義 timeout2

function newsSlide(){
    // 清除之前的 setTimeout
    clearTimeout(timeout2);
    
    // 切換到下一張圖片
    if (currentNews < totalNews) {
        currentNews++;
    } else {
        currentNews = 1;
    }
    
    // 根據 currentPic 切換圖片
    if (currentNews === 1) {
        $("#newsTopic").text("留學誌1");
    } else if (currentNews === 2) {
        $("#newsTopic").text("留學誌2");
    }
    else if (currentNews === 3) {
        $("#newsTopic").text("留學誌3");
    }
}