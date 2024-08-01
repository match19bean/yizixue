

var btnContainer = $(".c-sideNav__selections");
var englishBtn = $("#englishBtn");
var europBtn = $("#europBtn");
var asiaBtn = $("#asiaBtn");

var btnContainer_P = btnContainer.offset().top;
var englishBtn_P = englishBtn.offset().top - btnContainer_P - 30;
var europBtn_P = europBtn.offset().top - btnContainer_P - 30;
var asiaBtn_P = asiaBtn.offset().top - btnContainer_P - 30;

$(document).ready(function() {
    $(document).click(function(event) {
        if (!$(event.target).closest('button').length) {
            $(".c-sideNav__area").css('display', 'none');
        }
    });
});

function SideBarSelect(number){
    $(".c-sideNav__area").css('display', 'block');
    if(number == 1){
        $(".c-sideNav__english").css('display', 'block');
        $(".c-sideNav__english").css('top', englishBtn_P);
        $(".c-sideNav__eurp").css('display', 'none');
        $(".c-sideNav__asia").css('display', 'none');
    }else if(number ==2){
        $(".c-sideNav__english").css('display', 'none');
        $(".c-sideNav__eurp").css('display', 'block');
        $(".c-sideNav__eurp").css('top', europBtn_P);
        $(".c-sideNav__asia").css('display', 'none');
    }else if(number ==3){
        $(".c-sideNav__english").css('display', 'none');
        $(".c-sideNav__eurp").css('display', 'none');
        $(".c-sideNav__asia").css('display', 'block');
        $(".c-sideNav__asia").css('top', asiaBtn_P);
    }
}

