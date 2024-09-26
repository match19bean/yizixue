let text = ["海外留學", "升學考試", "國際學校", "選課輔導", "校園導覽", "社團生活", "工作實習", "職涯創業"];
let images = [
    "uploads/images/banner_p1.jpg",
    "uploads/images/banner_p2.jpg",
    "uploads/images/banner_p3.jpg",
    "uploads/images/banner_p4.jpg",
    "uploads/images/banner_p5.jpg",
    "uploads/images/banner_p6.jpg",
    "uploads/images/banner_p7.jpg",
    "uploads/images/banner_p8.jpg",
];
let backendImages = [];
let description1 = [];
let description2 = [];

$.ajax({
    url: 'carousel-list',
    method: 'get',
    success: function(res){
        $.each(res, function(key, item){
            backendImages.push(item.image_path);
            description1.push(item.description1);
            description2.push(item.description2);
        });
        totalPics = backendImages.length || images.length; // 若無後端圖片，則使用預設圖片數量
    },
    error: function(error){
        console.log(error); // 提供錯誤信息
    }
});

let currentPic = 1;
let totalPics = images.length; // 預設圖片數量
let intervalId = setInterval(headerSlide, 2000); // 每隔2秒呼叫一次headerSlide

function headerSlide(){
    currentPic = (currentPic < totalPics) ? currentPic + 1 : 1; // 切換到下一張圖片
    changePic(currentPic); // 根據 currentPic 切換圖片
}

function changePic(index){
    let image_path = backendImages[index - 1] || images[index - 1]; // 使用後端或預設圖片
    if (backendImages.length !== 0) {
        $('.description1').text(description1[index - 1]);
        $('.description2').text(description2[index - 1]);
    } else {
        $('#topic').text(text[index - 1] + "，");
    }
    $("#bannerImg").css("background-image", "url('" + image_path + "')");
}

// 單擊切換圖片功能
function setPic(index) {
    currentPic = index;
    changePic(currentPic);
}

// 綁定圖片單擊事件（假設你有一個按鈕或觸發器）
$('.pic-trigger').on('click', function() {
    let index = $(this).data('index'); // 假設每個按鈕都有 data-index
    setPic(index);
});


// header background function
function throttle(func, limit) {
    let lastFunc;
    let lastRan;
    return function() {
        const context = this;
        const args = arguments;
        if (!lastRan) {
            func.apply(context, args);
            lastRan = Date.now();
        } else {
            clearTimeout(lastFunc);
            lastFunc = setTimeout(function() {
                if ((Date.now() - lastRan) >= limit) {
                    func.apply(context, args);
                    lastRan = Date.now();
                }
            }, limit - (Date.now() - lastRan));
        }
    };
}

$(document).ready(function() {
    const $window = $(window);
    const $lHeaderLiA = $(".l-header__li a");
    const $lHeader = $(".l-header");
    const $logoImg = $("#logoImg");
    const $logoImgPhone = $("#logoImgPhone");
    const $innerHeader = $(".l-innerHeader");
    const $studentHeader = $(".l-student");

    let currentTextColor = "";
    let currentLogoSrc = "";
    let currentBgColor = "";

    function handleScroll() {
        let screenRoll = $window.scrollTop();
        let isDesktop = $window.width() > 768;
        const bannerHeight = isDesktop ? $innerHeader.height() : $studentHeader.offset().top;

        let logoImg = isDesktop ? $logoImg : $logoImgPhone;
        let textColor = screenRoll >= bannerHeight ? "#000000" : "#FFFFFF";
        let logoSrc = screenRoll >= bannerHeight ? "uploads/images/color_ezl.png" : "uploads/images/logo.png";
        let bgColor = screenRoll >= bannerHeight ? "white" : "transparent";

        // 只在需要變更時執行 DOM 操作
        if (currentTextColor !== textColor) {
            $lHeaderLiA.css("color", textColor);
            currentTextColor = textColor;
        }
        if (currentLogoSrc !== logoSrc) {
            logoImg.attr("src", logoSrc);
            currentLogoSrc = logoSrc;
        }
        if (currentBgColor !== bgColor) {
            $lHeader.css("background-color", bgColor);
            currentBgColor = bgColor;
        }
    }

    // 使用 throttle 函數來限制 scroll 事件觸發頻率
    $window.scroll(throttle(handleScroll, 100));
});

function bg_change() {
    let navbarState = $(".l-header__hamburger").attr('aria-expanded') === "true";
    let logoSrc = navbarState ? "uploads/images/color_ezl.png" : "uploads/images/logo.png";
    let bgColor = navbarState ? "white" : "transparent";

    $("#logoImgPhone").attr("src", logoSrc);
    $(".l-header").css("background-color", bgColor);
}





setInterval(newsSlide, 2000); // 每隔2秒呼叫一次newsSlide


let currentNews = 1;
const totalNews = 5; // 定義總共的圖片數量
let timeout2; // 定義 timeout2

let posts;
$.ajax({
    url: 'api/post-random',
    method: 'get',
    success: function(res){
        posts=res;
    },
    error: function(err){

    }
});
function newsSlide(){
    // 清除之前的 setTimeout
    clearTimeout(timeout2);

    // 切換到下一張圖片
    if (currentNews < totalNews) {
        currentNews++;
    } else {
        currentNews = 1;
    }
    if(posts[currentNews-1] !== undefined){
        // 根據 currentPic 切換標題
        $("#newsTopic").text(posts[currentNews-1].topic);
        $("#newsTopic").attr('href', posts[currentNews-1].url);
        // 根據 currentPic 切換圖片
        $(".c-newsCard__bgImg").css("background-image", "url(" + posts[currentNews - 1].image_path + ")");
        let string = posts[currentNews-1].category.map(function(item){return `<p class="o-tag">`+item+`</p>`});
        $(".c-newsCard__tags").html(string);
        $(".c-newsCard__meta").text(posts[currentNews-1].title);
        $(".c-newsCard__brief").text(encodeHTML(posts[currentNews-1].body));
        $(".c-newsCard__readMore").attr('href', posts[currentNews-1].url);
        $(".c-newsCard__meta").attr('href', posts[currentNews-1].url);
        $(".c-newsCard__brief").attr('href', posts[currentNews-1].url);
    }
}

function encodeHTML(dirtyString) {
    var container = document.createElement('div');
    var text = document.createTextNode(dirtyString);
    container.appendChild(text);
    return container.innerHTML; // innerHTML will be a xss safe string
}
