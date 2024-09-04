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
        if(backendImages.length!==0){
            totalPics = backendImages.length;
        }
    },
    error: function(error){
        // console.log(error);
    }
})



setInterval(headerSlide, 2000); // 每隔1秒呼叫一次headerSlide


let currentPic = 1;
let totalPics; // 定義總共的圖片數量
let timeout1; // 定義 timeout1
totalPics = (backendImages.length === 0 ) ? images.length : backendImages.length
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
    changePic(currentPic);
}

function changePic(index)
{
    let image_path = backendImages[index-1] !== undefined ? backendImages[index-1] : images[index-1];
    if(backendImages.length !== 0) {
        $('.description1').text(description1[index-1]);
        $('.description2').text(description2[index-1]);
    } else {
        $('#topic').text(text[index-1]+"，");
    }
    $("#bannerImg").css("background-image", "url('" + image_path + "')");
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

// header background function

$(window).scroll(function(){
    if ($(window).width() > 768) {  // Apply only on desktop
        let screenRoll = $(window).scrollTop();
        const bannerHeight = $(".l-innerHeader").height();
        if (screenRoll >= bannerHeight){
            $(".l-header__li a").css("color", "#000000");
            $("#logoImg").attr("src","uploads/images/color_ezl.png");
            $(".l-header").css("background-color", "white");
        }
        else{
            $(".l-header__li a").css("color", "#FFFFFF");
            $("#logoImg").attr("src","uploads/images/logo.png");
            $(".l-header").css("background-color", "rgba(255, 255, 255, 0)");
        }
    }else{
        let screenRoll = $(window).scrollTop();
        const bannerHeight = $(".l-student").offset().top;
        if (screenRoll >= bannerHeight){
            $(".l-header__li a").css("color", "#000000");
            $("#logoImgPhone").attr("src","uploads/images/color_ezl.png");
            $(".l-header").css("background-color", "white");
        }
        else{
            $(".l-header__li a").css("color", "#FFFFFF");
            $("#logoImgPhone").attr("src","uploads/images/logo.png");
            $(".l-header").css("background-color", "rgba(255, 255, 255, 0)");
        }
    }
});

function bg_change(){
    var navbar_state = $(".l-header__hamburger").attr('aria-expanded');
    if(navbar_state === "true"){
        $("#logoImgPhone").attr("src","uploads/images/color_ezl.png");
        $(".l-header").css("background-color", "white");
    }else{
        $("#logoImgPhone").attr("src","uploads/images/logo.png");
        $(".l-header").css("background-color", "rgba(255, 255, 255, 0)");
    }
}




setInterval(newsSlide, 2000); // 每隔2秒呼叫一次headerSlide


let currentNews = 1;
const totalNews = 3; // 定義總共的圖片數量
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
    }
}

function encodeHTML(dirtyString) {
    var container = document.createElement('div');
    var text = document.createTextNode(dirtyString);
    container.appendChild(text);
    return container.innerHTML; // innerHTML will be a xss safe string
}


// test
$(document).on('click', '.bookmark-icon', function(event) {
    event.preventDefault();
    event.stopPropagation();

    var icon = $(this);
    var userId = icon.data('id');
    var currentCount = parseInt(icon.data('collected-count'));

    // 发送 AJAX 请求更新收藏总数
    $.ajax({
        url: '/', // 替换成实际的路由
        method: 'POST',
        data: {
            user_id: userId
        },
        success: function(response) {
            // 更新收藏总数的显示元素
            var newCount = response.count;
            $('#collected-count-' + userId).text(newCount);

            // 更新图标颜色
            icon.css('color', response.colored ? 'red' : 'black');

            // 更新图标的 data-collected-count 属性
            icon.data('collected-count', newCount);
        },
        error: function(xhr, status, error) {
            console.error('Error occurred:', error);
        }
    });
});
