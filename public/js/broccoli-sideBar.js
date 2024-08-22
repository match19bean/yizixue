

var btnContainer = $(".c-sideNav__selections");
var englishBtn = $("#englishBtn");
var europBtn = $("#europBtn");
var asiaBtn = $("#asiaBtn");

var btnContainer_P = btnContainer.offset().top * 1.1;
var btnContainer_W = btnContainer.width() * 0.9;
var englishBtn_P = englishBtn.offset().top - btnContainer_P;
var europBtn_P = europBtn.offset().top - btnContainer_P;
var asiaBtn_P = asiaBtn.offset().top - btnContainer_P;


$(document).click(function (event) {
    // Close the side navigation if the click is outside of a button
    if (!$(event.target).closest('button').length) {
        $(".c-sideNav__area").css('display', 'none');
    }
});

function SideBarSelect(number) {
    $(".c-sideNav__area").css('display', 'block'); // Show the side navigation area

    // Depending on the number selected, show the appropriate section
    if (number == 1) {
        $(".c-sideNav__area").css({
            'display': 'block',
            'left': btnContainer_W,
            'top': englishBtn_P,
        });
        $(".c-sideNav__english").css({
            'display': 'block',
        });
        $(".c-sideNav__europ, .c-sideNav__asia").css('display', 'none');
    } else if (number == 2) {
        $(".c-sideNav__area").css({
            'display': 'block',
            'left': btnContainer_W,
            'top': europBtn_P,
        });
        $(".c-sideNav__europ").css({
            'display': 'block',
        });
        $(".c-sideNav__english, .c-sideNav__asia").css('display', 'none');
    } else if (number == 3) {
        $(".c-sideNav__area").css({
            'display': 'block',
            'left': btnContainer_W,
            'top': asiaBtn_P,
        });
        $(".c-sideNav__asia").css({
            'display': 'block',
        });
        $(".c-sideNav__english, .c-sideNav__europ").css('display', 'none');
    }
}
