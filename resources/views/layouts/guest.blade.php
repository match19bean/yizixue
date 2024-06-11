<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8" />
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" /> -->
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>易子學</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Custom styles for this template-->
    <link href="{{ asset('sb-admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/sbf-style.css') }}" rel="stylesheet" />

    <!-- Broccoli DIY css -->
    <link rel="stylesheet" href="{{ asset('css/broccoli-color.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcomeP.css')}}">
    <!-- End of Broccoli code -->

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- slick slider cdn -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <!-- end of slick slider cdn -->
    <!-- Custom fonts for this template-->
    <link href="{{ asset('sb-admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
</head>

<body>
<!-- Responsive navbar-->
<nav id="mainNav" class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="{{url('/')}}">
        <img id="logoImg" src="{{asset('uploads/images/logo.png')}}" alt="logo">
    </a>
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link scrollFunction" href="{{route('senior')}}">學長姐｜快找</a></li>
                <li class="nav-item"><a class="nav-link scrollFunction" href="{{route('study-abroad')}}">留學誌｜推薦</a></li>
                @if(auth()->check())
                    <li class="nav-item"><a class="nav-link scrollFunction" href="{{route('home')}}">易子學系統</a></li>
                    <li class="nav-item">
                        <a href="{{route('home')}}">
                            <svg viewbox="0 0 80 80" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <pattern id="image" patternUnits="userSpaceOnUse" height="80" width="80">
                                        @if(!is_null(auth()->user()->avatar))
                                            <image x="0" y="0" xlink:href="{{asset('uploads/'.auth()->user()->avatar)}}" width="80" height="80"></image>
                                        @else
                                            <image x="0" y="0" xlink:href="{{asset('uploads/images/default_avatar.png')}}" width="80" height="80"></image>
                                        @endif
                                    </pattern>
                                </defs>
                                <circle cx="40" cy="40" r="30" fill="url(#image)"/>
                            </svg>
                        </a>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link scrollFunction" href="{{route('login')}}">註冊｜登入</a></li>
                    <li class="nav-item">
                        <svg viewbox="0 0 80 80" xmlns="http://www.w3.org/2000/svg">
                            <circle r="30" cx="40" cy="40" fill="#C1C1C1" />
                        </svg>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>


@yield('content')


<!-- Footer-->
<footer class="py-5 bg-dark footer">
    <!-- <div class="row text-center text-white"> -->
        <div class="left">
            <img src="{{asset('uploads/images/yzl-footer-logo.png')}}" alt="footer logo">
            <p class="copyright">@2022行家在線有限公司. All Right Reservec. | Powered by Match 19</p>
            <p>統一編號：83453577</p>
        </div>
        <div class="right">
            <!-- <div class="row"> -->
                <div class="topic">
                    <h6>加入 | 易子學</h6>
                    <div>
                        <a href="{{route('login')}}">登入｜註冊</a>
                        <a href="">聯絡我們</a>
                    </div>
                </div>
                <div class="topic">
                    <h6>關於 | 會員</h6>
                    <div>
                        <a href="{{route('senior')}}">找學長姐</a>
                        <a href="{{route('university-list')}}">找學校</a>
                        <a href="{{route('qna')}}">問與答</a>
                    </div>
                </div>
                <div class="topic">
                    <h6>關於 | 學長姐</h6>
                    <div>
                        <a href="{{route('pay-product-list')}}">成為學長姐</a>
                        <a href="">教戰手則</a>
                    </div>
                </div>
                <div class="topic">
                    <h6>關於 | 易子學</h6>
                    <div>
                        <a href="">關於我們</a>
                        <a href="">前輩網</a>
                    </div>
                </div>
            <!-- </div> -->
        </div>
    <!-- </div> -->
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- owl function -->
<script>
    $(".owl-carousel").owlCarousel({
        loop: true, // 循環播放
        margin: 0, // 外距 10px
        nav: false, // 顯示點點
        responsive: {
            0: {
                items: 1 // 螢幕大小為 0~600 顯示 1 個項目
            },
            600: {
                items: 2 // 螢幕大小為 600~1000 顯示 3 個項目
            },
            1000: {
                items: 4 // 螢幕大小為 1000 以上 顯示 5 個項目
            },
            1500: {
                items: 4 // 螢幕大小為 1000 以上 顯示 5 個項目
            }
        }
    });
</script>

<!-- slick slider function -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<!-- slider slider custom-setting -->
<script>
    $('.sliderUni.center').slick({
  centerMode: true,
  centerPadding: '0rem',
  slidesToShow: 5,
  dots: true,
  arrows: false
});
</script>

<!-- cards click function -->
<script>
    function cardClickable(id) {
        // console.log(id);
        location.href = document.location.origin + "/introduction/" + id;
    }

    function uniCardClick(uni){
        location.href = document.location.origin + "/senior?university=" + encodeURIComponent(uni);
    }
</script>
<!-- end of cards click function -->
<script src="{{ asset('js/broccoli-header.js')}}"></script>
</body>

</html>
