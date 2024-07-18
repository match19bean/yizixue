
$(document).ready(function() {
    $(document).click(function(event) {
        if (!$(event.target).closest('button').length) {
            // $(".c-sideNav__english").css('display', 'none');
            // $(".c-sideNav__eurp").css('display', 'none');
            // $(".c-sideNav__asia").css('display', 'none');
            $(".c-sideNav__area").css('display', 'none');
        }
    });
});

function SideBarSelect(number){
    $(".c-sideNav__area").css('display', 'block');
    if(number == 1){
        $(".c-sideNav__english").css('display', 'block');
        $(".c-sideNav__eurp").css('display', 'none');
        $(".c-sideNav__asia").css('display', 'none');
    }else if(number ==2){
        $(".c-sideNav__english").css('display', 'none');
        $(".c-sideNav__eurp").css('display', 'block');
        $(".c-sideNav__asia").css('display', 'none');
    }else if(number ==3){
        $(".c-sideNav__english").css('display', 'none');
        $(".c-sideNav__eurp").css('display', 'none');
        $(".c-sideNav__asia").css('display', 'block');
    }
}

