$('.fa-heart').click(function () {
    let that = $(this);
    $.ajax({
        url: "{{url('like-user')}}" + "/" + $(this).data('id'),
        method: 'GET',
        success: function (res) {
            if (res.operator === 'no') {
                alert(res.message);
            } else if (res.operator === 'add') {
                that.css('color', 'red');
                that.children('span').text(res.total);
            } else if (res.operator === 'reduce') {
                that.css('color', 'black');
                that.children('span').text(res.total);
            }
        },
        error: function (error) {
            console.log(error)
        }
    });
});

$('.fa-bookmark').click(function () {
    let that = $(this);
    $.ajax({
        url: "{{url('collect-user')}}" + "/" + $(this).data('id'),
        method: 'GET',
        success: function (res) {
            if (res.operator === 'no') {
                alert(res.message);
            } else if (res.operator === 'add') {
                that.css('color', 'red');
                that.children('span').text(res.total);
            } else if (res.operator === 'reduce') {
                that.css('color', 'black');
                that.children('span').text(res.total);
            }
        },
        error: function (error) {
            console.log(error)
        }
    });
});