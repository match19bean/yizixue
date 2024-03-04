{{--<!doctype html>--}}
{{--<html lang="{{ app()->getLocale() }}">--}}

{{--<head>--}}
{{--    <meta charset="utf-8" />--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />--}}
{{--    <meta name="description" content="" />--}}
{{--    <meta name="author" content="" />--}}
{{--    <title>易子學</title>--}}
{{--    <!-- Favicon-->--}}
{{--    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />--}}
{{--    <!-- Bootstrap icons-->--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />--}}
{{--    <!-- Core theme CSS (includes Bootstrap)-->--}}
{{--    <link href="{{ asset('css/sbf-style.css') }}" rel="stylesheet" />--}}

{{--    <link rel="stylesheet"--}}
{{--        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />--}}
{{--    <link rel="stylesheet"--}}
{{--        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />--}}
{{--    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>--}}
{{--    <!-- Custom fonts for this template-->--}}
{{--    <link href="{{ asset('sb-admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">--}}
{{--    <style>--}}
{{--        .middle {--}}
{{--            width: 50px;--}}
{{--            position: absolute;--}}
{{--            top: 10%;--}}
{{--            left: 10%;--}}
{{--            transform: translate(-50%, -50%);--}}
{{--            -ms-transform: translate(-50%, -50%);--}}
{{--            text-align: center;--}}
{{--        }--}}

{{--        .name-card {--}}
{{--            padding-top: 10px;--}}
{{--            padding-bottom: 10px;--}}
{{--            padding-left: 50px;--}}
{{--            padding-right: 50px;--}}
{{--            background: #BD9EBE;--}}
{{--            text-align: center;--}}
{{--        }--}}
{{--    </style>--}}

{{--</head>--}}

{{--<body>--}}
{{--    <!-- Responsive navbar-->--}}
{{--    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">--}}
{{--        <div class="container px-5">--}}
{{--            <a class="navbar-brand" href="#!">易子學</a>--}}
{{--            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"--}}
{{--                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"--}}
{{--                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>--}}
{{--            <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">--}}
{{--                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>--}}
{{--                    <li class="nav-item"><a class="nav-link" href="#!">About</a></li>--}}
{{--                    <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>--}}
{{--                    <li class="nav-item"><a class="nav-link" href="#!">Services</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </nav>--}}
{{--    <!-- Header-->--}}
{{--    <header class="bg-dark py-5">--}}
{{--        <div class="container px-5">--}}
{{--            <div class="row gx-5 justify-content-center">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="my-5">--}}
{{--                        <div style="text-align:left">--}}
{{--                            <h1 class="display-5 fw-bolder text-white mb-2">海外學</h1>--}}
{{--                            <h1 class="display-5 fw-bolder text-white mb-5">先找學長姐</h1>--}}
{{--                            <a style="background:#45ecd9; border: none" class="btn btn-primary btn-lg px-5 me-sm-3"--}}
{{--                                href="#features">學長姐 | 快找</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </header>--}}
{{--    <!-- Features section-->--}}
{{--    <section class="py-5 border-bottom" id="features">--}}
{{--        <div style="margin:80px">--}}
{{--            <div class="row gx-5">--}}
{{--                <div style="text-align:center; margin-bottom:100px">--}}
{{--                    <a style="background:#45ecd9; border: none" class="btn btn-primary btn-lg px-5" href="#features">關注--}}
{{--                        | 學校</a>--}}
{{--                </div>--}}

{{--                <div class="owl-carousel owl-theme">--}}
{{--                    @foreach ($Data['University'] as $key => $university)--}}
{{--                        <div class="item">--}}
{{--                            <div style="margin:20px; border: 1px solid black; border-radius:10px">--}}
{{--                                <div class="card">--}}
{{--                                    <div>--}}
{{--                                        <img style="height: 200px;"--}}
{{--                                            src="/uploads/{{ $university->image_path }}"--}}
{{--                                            alt="Card image cap">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <div class="name-card">--}}
{{--                                        <h5 style="color:white">{{ $university->name }}</h5>--}}
{{--                                    </div>--}}
{{--                                    <div style="text-align:center; margin:20px">--}}
{{--                                        <h5>目前有<a href="#">{{rand(20,200)}}</a>位在校學生</h5>--}}
{{--                                    </div>--}}
{{--                                    --}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}

{{--        </div>--}}
{{--        </div>--}}
{{--    </section>--}}

{{--    <!-- Features section-->--}}
{{--    <section class="bg-light py-5 border-bottom" id="features">--}}
{{--        <div style="margin:80px">--}}
{{--            <div class="row gx-5">--}}
{{--                <div style="text-align:center; margin-bottom:100px">--}}
{{--                    <a style="background:#45ecd9; border: none" class="btn btn-primary btn-lg px-5" href="#features">關注--}}
{{--                        | 學長姐</a>--}}
{{--                </div>--}}

{{--                <div class="owl-carousel owl-theme">--}}
{{--                    @foreach ($Data['Users'] as $key => $user)--}}
{{--                        <div class="item">--}}
{{--                            <div style="margin:20px">--}}
{{--                                <div class="card" style="border: 3px solid;">--}}
{{--                                    <a href="{{ url('introduction/'.$user->id) }}">--}}
{{--                                    <div>--}}
{{--                                        <img style="height: 200px;" class="card-img-top"--}}
{{--                                            src="/uploads/{{ $user->avatar }}" alt="Card image cap">--}}
{{--                                        <div class="middle">--}}
{{--                                            <a href="{{ $user->profile_video }}" class="text"><img--}}
{{--                                                    class="card-img-top"--}}
{{--                                                    src="https://cdn.pixabay.com/photo/2016/02/01/12/33/play-1173551_640.png"--}}
{{--                                                    alt="Card image cap"></a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <div class="name-card">--}}
{{--                                            <h4 style="color:white">{{ $user->name }}</h4>--}}
{{--                                            <h4 style="color:white">{{ $user->university }}</h4>--}}
{{--                                        </div>--}}
{{--                                        <div--}}
{{--                                            style="--}}
{{--                                            text-align: center; --}}
{{--                                            margin-bottom:20px;--}}
{{--                                            margin-top:20px">--}}
{{--                                            <i class="fa fa-heart" style="font-size:15px; color:red; margin:5px">--}}
{{--                                                <span style="color:black">{{rand(5,30)}}</span>--}}
{{--                                            </i>--}}
{{--                                            <i class="fa fa-bookmark" style="font-size:15px; margin:5px">--}}
{{--                                                <span style="color:black">{{rand(5,30)}}</span>--}}
{{--                                            </i>--}}
{{--                                        </div>--}}
{{--                                        <div--}}
{{--                                            style="--}}
{{--                                            text-align: center; --}}
{{--                                            margin-bottom:20px;--}}
{{--                                            margin-top:20px">--}}
{{--                                            <?php--}}
{{--                                            $PostCategory = $Data['PostCategory']->all();--}}
{{--                                            ?>--}}
{{--                                            @foreach ($PostCategory as $cate)--}}
{{--                                                <span--}}
{{--                                                    style="--}}
{{--                                                    font-size:12px;--}}
{{--                                                    padding-top:5px;--}}
{{--                                                    padding-bottom:5px;--}}
{{--                                                    padding-left:10px; --}}
{{--                                                    padding-right:10px; --}}
{{--                                                    margin:5px; --}}
{{--                                                    background: #4C2A70; --}}
{{--                                                    color:#FFFFFF;--}}
{{--                                                    border-radius:10px"--}}
{{--                                                    href="#">--}}
{{--                                                    #{{ $cate->name }}--}}
{{--                                                </span>--}}
{{--                                            @endforeach--}}
{{--                                        </div>--}}
{{--                                        <?php--}}
{{--                                        $UserSkillRelation = $Data['UserSkillRelation']->where('user_id', $user->id)->get();--}}
{{--                                        ?>--}}
{{--                                        <div--}}
{{--                                            style="--}}
{{--                                            text-align: center; --}}
{{--                                            margin-bottom:20px;--}}
{{--                                            margin-top:20px">--}}
{{--                                            @foreach ($UserSkillRelation as $cateId)--}}
{{--                                                <?php--}}
{{--                                                $cate = $Data['Skills']->where('id', $cateId->skill_id)->first();--}}
{{--                                                ?>--}}
{{--                                                <span--}}
{{--                                                    style="--}}
{{--                                                    font-size:12px;--}}
{{--                                                    padding-top:5px;--}}
{{--                                                    padding-bottom:5px;--}}
{{--                                                    padding-left:10px; --}}
{{--                                                    padding-right:10px; --}}
{{--                                                    margin:5px; --}}
{{--                                                    color:#BD9EBE; --}}
{{--                                                    border: 1px solid #BD9EBE; --}}
{{--                                                    border-radius:10px"--}}
{{--                                                    href="#">--}}
{{--                                                    #{{ $cate->name }}--}}
{{--                                                </span>--}}
{{--                                            @endforeach--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

{{--    <section>--}}
{{--        <div--}}
{{--            style="--}}
{{--        height:500px;--}}
{{--        margin:100px;--}}
{{--        background: url('https://marvel-b1-cdn.bc0a.com/f00000000290162/images.ctfassets.net/2htm8llflwdx/Y0mAruESDwFn4MO5GbYyr/f898df53e63d503d63321d8aea34fdf8/GettyImages-947895170.jpg?fit=thumb') no-repeat center;--}}
{{--        background-size: cover;">--}}
{{--            <div class="row gx-5 justify-content-center">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="my-5">--}}
{{--                        <div style="text-align:center">--}}
{{--                            <h1 class="display-5 fw-bolder text-white mb-2">親身體驗</h1>--}}
{{--                            <h1 class="display-5 fw-bolder text-white mb-5">專業變現</h1>--}}
{{--                            <a style="background:#45ecd9; border: none" class="btn btn-primary btn-lg px-5 me-sm-3"--}}
{{--                                href="#features">學長姐 | 快找</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

{{--    <!-- Footer-->--}}
{{--    <footer class="py-5 bg-dark">--}}
{{--        <div class="container px-5">--}}
{{--            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>--}}
{{--        </div>--}}
{{--    </footer>--}}
{{--    <!-- Bootstrap core JS-->--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>--}}
{{--    <script>--}}
{{--        $(".owl-carousel").owlCarousel({--}}
{{--            loop: true, // 循環播放--}}
{{--            margin: 10, // 外距 10px--}}
{{--            nav: true, // 顯示點點--}}
{{--            responsive: {--}}
{{--                0: {--}}
{{--                    items: 1 // 螢幕大小為 0~600 顯示 1 個項目--}}
{{--                },--}}
{{--                600: {--}}
{{--                    items: 3 // 螢幕大小為 600~1000 顯示 3 個項目--}}
{{--                },--}}
{{--                800: {--}}
{{--                    items: 4 // 螢幕大小為 1000 以上 顯示 5 個項目--}}
{{--                },--}}
{{--                1500: {--}}
{{--                    items: 6 // 螢幕大小為 1000 以上 顯示 5 個項目--}}
{{--                }--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
{{--</body>--}}

{{--</html>--}}


@extends('layouts.guest')

@section('content')
        <!-- Header-->
        <header class="bg-dark">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-12">
                        <div class="my-5">
                            <div style="text-align:left">
                                <h1 class="display-5 fw-bolder text-white mb-2">海外學</h1>
                                <h1 class="display-5 fw-bolder text-white mb-5">先找學長姐</h1>
                                <a style="background:#45ecd9; border: none" class="btn btn-primary btn-lg px-5 me-sm-3"
                                    href="#features">學長姐 | 快找</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Features section-->
        <section class="py-5 border-bottom" id="features">
            <div style="margin:80px">
                <div class="row gx-5">
                    <div style="text-align:center; margin-bottom:100px">
                        <a style="background:#45ecd9; border: none" class="btn btn-primary btn-lg px-5" href="#features">關注
                            | 學校</a>
                    </div>

                    <div class="owl-carousel owl-theme">
                        @foreach ($Data['University'] as $key => $university)
                            <div class="item">
                                <div style="margin:20px; border: 1px solid black; border-radius:10px">
                                    <div class="card">
                                        <div>
                                            <img style="height: 200px;"
                                                src="/uploads/{{ $university->image_path }}"
                                                alt="Card image cap">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="name-card">
                                            <h5 style="color:white">{{ $university->name }}</h5>
                                        </div>
                                        <div style="text-align:center; margin:20px">
                                            <h5>目前有<a href="#">{{rand(20,200)}}</a>位在校學生</h5>
                                        </div>

                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>

            </div>
            </div>
        </section>

        <!-- Features section-->
        <section class="bg-light py-5 border-bottom" id="features">
            <div style="margin:80px">
                <div class="row gx-5">
                    <div style="text-align:center; margin-bottom:100px">
                        <a style="background:#45ecd9; border: none" class="btn btn-primary btn-lg px-5" href="#features">關注
                            | 學長姐</a>
                    </div>

                    <div class="owl-carousel owl-theme">
                        @foreach ($Data['Users'] as $key => $user)
                            <div class="item">
                                <div style="margin:20px">
                                    <div class="card" style="border: 3px solid;">
                                        <a href="{{ url('introduction/'.$user->id) }}">
                                        <div>
                                            <img style="height: 200px;" class="card-img-top"
                                                src="/uploads/{{ $user->avatar }}" alt="Card image cap">
                                            <div class="middle">
                                                <a href="{{ $user->profile_video }}" class="text"><img
                                                        class="card-img-top"
                                                        src="https://cdn.pixabay.com/photo/2016/02/01/12/33/play-1173551_640.png"
                                                        alt="Card image cap"></a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="name-card">
                                                <h4 style="color:white">{{ $user->name }}</h4>
                                                <h4 style="color:white">{{ $user->university }}</h4>
                                            </div>
                                            <div
                                                style="
                                                text-align: center;
                                                margin-bottom:20px;
                                                margin-top:20px">
                                                <i class="fa fa-heart" style="font-size:15px; color:red; margin:5px">
                                                    <span style="color:black">{{rand(5,30)}}</span>
                                                </i>
                                                <i class="fa fa-bookmark" style="font-size:15px; margin:5px">
                                                    <span style="color:black">{{rand(5,30)}}</span>
                                                </i>
                                            </div>
                                            <div
                                                style="
                                                text-align: center;
                                                margin-bottom:20px;
                                                margin-top:20px">
                                                <?php
                                                $PostCategory = $Data['PostCategory']->all();
                                                ?>
                                                @foreach ($PostCategory as $cate)
                                                    <span
                                                        style="
                                                        font-size:12px;
                                                        padding-top:5px;
                                                        padding-bottom:5px;
                                                        padding-left:10px;
                                                        padding-right:10px;
                                                        margin:5px;
                                                        background: #4C2A70;
                                                        color:#FFFFFF;
                                                        border-radius:10px"
                                                        href="#">
                                                        #{{ $cate->name }}
                                                    </span>
                                                @endforeach
                                            </div>
                                            <?php
                                            $UserSkillRelation = $Data['UserSkillRelation']->where('user_id', $user->id)->get();
                                            ?>
                                            <div
                                                style="
                                                text-align: center;
                                                margin-bottom:20px;
                                                margin-top:20px">
                                                @foreach ($UserSkillRelation as $cateId)
                                                    <?php
                                                    $cate = $Data['Skills']->where('id', $cateId->skill_id)->first();
                                                    ?>
                                                    <span
                                                        style="
                                                        font-size:12px;
                                                        padding-top:5px;
                                                        padding-bottom:5px;
                                                        padding-left:10px;
                                                        padding-right:10px;
                                                        margin:5px;
                                                        color:#BD9EBE;
                                                        border: 1px solid #BD9EBE;
                                                        border-radius:10px"
                                                        href="#">
                                                        #{{ $cate->name }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </section>

        <section class="bg-light py-5" id="Qa">
            <div class="row">
                @if(!is_null($Data['Qas']))
                    @foreach($Data['Qas'] as $qa)
                        <div class="col-3 text-center">
                            <div class="row">
                                <div class="fa-2x">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-lightbulb fa-stack-2x text-left mt-4" style="margin-left: -10px;"></i>
                                        <i class="fa fa-calendar-alt fa-stack-2x text-right"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="row">

                                <h3 class="w-75 mt-4 mx-auto text-white" style="background-color: #73E9DD;">
                                    {{$qa->first()->category->name}}
                                </h3>
                                @for($i=0; $i<3; $i++)
                                    <h5 class="text-center mx-auto" style="color:#B9CBF8;">
                                        @if(isset($qa[$i]))
                                            {{$qa[$i]->qa->title}}
                                        @endif
                                    </h5>
                                @endfor


                            </div>
                        </div>
                    @endforeach

                @endif
                    <a href="" class="text-center text-decoration-none text-black">查看更多問答</a>
            </div>
        </section>

@endsection