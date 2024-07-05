
$(document).ready(function() {
    $(document).click(function(event) {
        if (!$(event.target).closest('button').length) {
            $(".c-sideNav_area_english").css('display', 'none');
            $(".c-sideNav_area_eurp").css('display', 'none');
            $(".c-sideNav_area_asia").css('display', 'none');
        }
    });
});

function SideBarSelect(number){
    if(number == 1){
        $(".c-sideNav_area_english").css('display', 'block');
        $(".c-sideNav_area_eurp").css('display', 'none');
        $(".c-sideNav_area_asia").css('display', 'none');
    }else if(number ==2){
        $(".c-sideNav_area_english").css('display', 'none');
        $(".c-sideNav_area_eurp").css('display', 'block');
        $(".c-sideNav_area_asia").css('display', 'none');
    }else if(number ==3){
        $(".c-sideNav_area_english").css('display', 'none');
        $(".c-sideNav_area_eurp").css('display', 'none');
        $(".c-sideNav_area_asia").css('display', 'block');
    }
}

