
$(document).ready(function() {
    $(document).click(function(event) {
        if (!$(event.target).closest('button').length) {
            $(".subLoca1").css('display', 'none');
            $(".subLoca2").css('display', 'none');
            $(".subLoca3").css('display', 'none');
        }
    });
});

function SideBarSelect(number){
    if(number == 1){
        $(".subLoca1").css('display', 'block');
        $(".subLoca2").css('display', 'none');
        $(".subLoca3").css('display', 'none');
    }else if(number ==2){
        $(".subLoca1").css('display', 'none');
        $(".subLoca2").css('display', 'block');
        $(".subLoca3").css('display', 'none');
    }else if(number ==3){
        $(".subLoca1").css('display', 'none');
        $(".subLoca2").css('display', 'none');
        $(".subLoca3").css('display', 'block');
    }
}

