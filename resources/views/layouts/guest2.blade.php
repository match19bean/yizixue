<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
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
    <!-- swiper cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- Custom fonts for this template-->
    <!-- broccoli style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('scss_convert/broccoli_style.css') }}">
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="l-header-2 navbar navbar-expand-lg navbar-dark">
        <a class="col-2" href="{{url('/')}}">
            <img src="{{asset('uploads/images/logo.png')}}" alt="logo" id="logoImg">
        </a>
        <div class="l-header-2_navBar container col-10">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="l-header-2_navItems collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="l-header-2_ul navbar-nav">
                    <li class="l-header-2_li nav-item"><a class="nav-link text-white"
                            href="{{route('senior')}}">學長姐｜快找</a></li>
                    <li class="l-header-2_li nav-item"><a class="nav-link text-white"
                            href="{{route('study-abroad')}}">留學誌｜推薦</a></li>
                    @if(auth()->check())
                    <li class="l-header-2_li nav-item"><a class="nav-link scrollFunction"
                            href="{{route('home')}}">易子學系統</a></li>
                    <li class="l-header-2_li nav-item">
                        <a href="{{route('home')}}">
                            <svg class="l-header-2_thumbNail" viewbox="0 0 80 80" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <pattern id="image" patternUnits="userSpaceOnUse" height="80" width="80">
                                        @if(!is_null(auth()->user()->avatar))
                                        <image x="0" y="0" xlink:href="{{asset('uploads/'.auth()->user()->avatar)}}"
                                            width="80" height="80"></image>
                                        @else
                                        <image x="0" y="0" xlink:href="{{asset('uploads/images/default_avatar.png')}}"
                                            width="80" height="80"></image>
                                        @endif
                                    </pattern>
                                </defs>
                                <circle cx="40" cy="40" r="30" fill="url(#image)" />
                            </svg>
                        </a>
                    </li>
                    @else
                    <li class="l-header-2_li nav-item"><a class="nav-link scrollFunction"
                            href="{{route('login')}}">註冊｜登入</a></li>
                    <li class="l-header-2_li nav-item">
                        <svg class="l-header-2_thumbNail" viewbox="0 0 80 80" xmlns="http://www.w3.org/2000/svg">
                            <circle r="30" cx="40" cy="40" fill="#C1C1C1" />
                        </svg>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid p-0">
        @yield('content')
    </div>

    <!-- Footer-->
    <footer>
        <div class="l-footer">
            <div class="row p-5">
                <div class="l-footer_brand col-4">
                    <img src="{{asset('uploads/images/yzl-footer-logo.png')}}" alt="footer logo">
                    <p class="copyright">@2022行家在線有限公司. All Right Reservec. | Powered by Match 19</p>
                    <p>統一編號：83453577</p>
                </div>
                <div class="l-footer_siteMap col-8">
                    <div class="l-footer_siteMap_topic">
                        <h6>加入｜易子學</h6>
                        <div>
                            <a href="{{route('login')}}">登入｜註冊</a>
                            <a href="">聯絡我們</a>
                        </div>
                    </div>
                    <div class="l-footer_siteMap_topic">
                        <h6>關於｜會員</h6>
                        <div>
                            <a href="{{route('senior')}}">找學長姐</a>
                            <a href="{{route('university-list')}}">找學校</a>
                            <a href="{{route('qna')}}">問與答</a>
                            <a href="{{route('study-abroad')}}">留學誌</a>
                        </div>
                    </div>
                    <div class="l-footer_siteMap_topic">
                        <h6>關於｜學長姐</h6>
                        <div>
                            <a href="{{route('pay-product-list')}}">成為學長姐</a>
                            <!-- please replace with the real back-end code -->
                            <a href="/yizixue-faq">教戰手則</a>
                            <a>學長姐服務條款</a>
                            <!-- unsure page, please clearify -->
                            <a href="/subscription-agreement">註冊條款？</a>
                        </div>
                    </div>
                    <div class="l-footer_siteMap_topic">
                        <h6>關於｜易子學</h6>
                        <div>
                            <!-- please replace with the real back-end code -->
                            <a href="/about-us">關於我們</a>
                            <a href="">前輩網</a>
                            <!-- please replace with the real back-end code -->
                            <a href="/service-agreement">服務條款</a>
                            <!-- 為何figma隱私權聲明頁面是連到會員規約？？ -->
                            <a href="/membership-agreement">隱私權聲明</a>
                            <!-- please replace with the real back-end code -->
                            <a href="/disclaimer">免責聲明</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- cards click function -->
<script>
    function cardClickable(id) {
        // console.log(id);
        location.href = document.location.origin + "/introduction/" + id;
    }

    function uniCardClick(uni) {
        location.href = document.location.origin + "/senior?university=" + encodeURIComponent(uni);
    }
</script>
<!-- swiper custom -->
<script>
    var swiper = new Swiper(".studentSwiper", {
        slidesPerView: 4,
        spaceBetween: 30,
        loop: true,
        autoplay: {
            delay: 2000,
        },
        pagination: {
            el: ".studentPagi",
            clickable: true,
        },
    });

    var swiper = new Swiper(".aboutUsSwiper", {
        loop: true,
        autoplay: {
            delay: 2000,
        },
        pagination: {
            el: ".aboutUsPagi",
            clickable: true,
        },
    });

    var swiper = new Swiper(".teamSwiper", {
        slidesPerView: 4,
        spaceBetween: 30,
        loop: true,
        autoplay: {
            delay: 2000,
        },
        pagination: {
            el: ".teamPagi",
            clickable: true,
        },
    });
</script>
<!-- end of cards click function -->
<script src="{{ asset('js/broccoli-sideBar.js')}}"></script>
<script src="{{ asset('js/react-icon.js')}}"></script>

</html>