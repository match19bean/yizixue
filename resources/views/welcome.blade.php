@extends('layouts.guest')
@section('content')
<!-- Header from: public/scss/layout/welcomePage_layout.scss-->
<div class="l-innerHeader">
    <div class="container-fluid p-0 m-0">
        <div class="row">
            <div class="col-md-12">
                <div class="l-innerHeader__headerCard">
                    <div class="l-innerHeader__headerCard__banner">
                        <span id="bannerImg"
                            style="background-image: url('{{ asset('uploads/images/banner_p1.jpg') }}') ;">&nbsp;</span>
                    </div>
                    <div class="l-innerHeader__headerCard__slogan">
                        <h1 id="topic" class="fw-bolder text-white mb-2">海外留學，</h1>
                        <h1 class="fw-bolder text-white mb-5">先找學長姐罩</h1>
                    </div>
                    <svg viewBox="0 0 1920 1080">
                        <polygon points="298.8 1079.5 0 1080 0 .5 750 0 298.8 1079.5" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="innerbody">
    <div class="container-fluid">
        <div class="row">
            <!-- Student Card Section -->
            <div class="col-md-12">
                <section class="l-innerbody__student">
                    <!-- title -->
                    <div class="row">
                        <div class="col-md-12 p-0">
                            <h3 class="l-innerbody__title">
                                <a href="{{route('senior')}}">學長姐 | 快找</a>
                            </h3>
                        </div>
                    </div>
                    <!-- items -->
                    <div class="row pl-5 pr-5">
                        <div class="col-md-12 p-5 s-swiperCustom">
                            <div class="swiper studentSwiper">
                                <div class="swiper-wrapper">
                                    @foreach ($Data['Users'] as $key => $user)
                                    <div class="swiper-slide">
                                        <div class="c-studentCardSwiper" onclick="cardClickable({{ $user->id }})">
                                            <!-- img div -->
                                            @if(is_null($user->avatar))
                                            <span class="c-studentCardSwiper_studentImg"
                                                style="background-image: url('{{asset('uploads/images/default_avatar.png')}}') ;">&nbsp;</span>
                                            @else
                                            <span class="c-studentCardSwiper_studentImg"
                                                style="background-image: url('/uploads/{{ $user->avatar }}');">&nbsp;</span>
                                            @endif
                                            <!-- background -->
                                            <svg class="c-studentCardSwiper_bg" viewBox="0 0 330 170">
                                                <polygon class="cls-1"
                                                    points="329.5 170 0 170 0 0 330 45.1 329.5 170" />
                                            </svg>
                                            <!-- school img -->
                                            <span class="c-studentCardSwiper_schoolImg"
                                                style="background-image: url('{{asset($user->universityItem->image_path)}}') ;">&nbsp;</span>
                                            <!-- name card -->
                                            <h4 class="c-studentCardSwiper_userName">
                                                {{ ($user->name) ? \Illuminate\Support\Str::limit($user->name,10): "" }}
                                            </h4>
                                            <!-- school english -->
                                            <h5 class="c-studentCardSwiper_schoolEnglish">
                                                {{ !is_null($user->universityItem) ? \Illuminate\Support\Str::limit($user->universityItem->english_name, 20) : '' }}
                                            </h5>
                                            <!-- school chinese -->
                                            <h6 class="c-studentCardSwiper_schoolChinese">
                                                {{ !is_null($user->universityItem) ? \Illuminate\Support\Str::limit($user->universityItem->chinese_name, 10) : '' }}
                                            </h6>
                                            <!-- react icons -->
                                            <div class="c-studentCardSwiper_react"
                                                onclick="event.stopPropagation(); return false; ">
                                                @if(auth()->check())
                                                <i class="bi bi-heart-fill like-user" style="
                                    color:@if($user->likedUser->where('uid', auth()->user()->id)->where('user_id', $user->id)->count() == 1) red @else black @endif
                                    " data-id="{{$user->id}}">
                                                    <span>{{$user->likedUser->count()}}</span>
                                                </i>
                                                <i class="bi bi-bookmark-fill collect-user" data-id="{{$user->id}}" style="
                                    color:  @if($user->collectedUser->where('uid', auth()->user()->id)->where('user_id', $user->id)->count() == 1) red @else black @endif
                                    ">
                                                    <span>{{$user->collectedUser->count()}}</span>
                                                </i>
                                                @else
                                                <i class="bi bi-heart-fill like-user" style="color: black;" data-id="{{$user->id}}">
                                                    <span>{{$user->likedUser->count()}}</span>
                                                </i>
                                                <i class="bi bi-bookmark-fill collect-user" data-id="{{$user->id}}">
                                                    <span>{{$user->collectedUser->count()}}</span>
                                                </i>
                                                @endif
                                            </div>
                                            <!-- post tag -->
                                            <div class="c-studentCardSwiper_postTag">
                                                @forelse ($user->postCategory as $count => $cate)
                                                @if ($count < 3) <a
                                                    href="{{route('senior', ['category' => $cate->postCategory->id])}}"
                                                    class="text-white">
                                                    {{ $cate->postCategory->name }}
                                                    </a>
                                                    @endif
                                                    @empty
                                                    @endforelse
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="studentPagi paginationCustom"></div>
                        </div>
                    </div>
                    <div class="row pr-5">
                        <div class="col-md-12 pr-5">
                            <div class="container-fluid">
                                <div class="row justify-content-end">
                                    <div class="col-md-2">
                                        <a class="o-readMore" href="/senior">查看更多 &gt;</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
            </div>
            <!-- University section-->
            <div class="col-md-12">
                <div class="container-fluid p-0 m-0">
                    <section class="l-innerbody__university">
                        <!-- title -->
                        <div class="row">
                            <div class="col-md-12 p-0">
                                <h3 class="l-innerbody__title">
                                    <a href="{{route('university-list')}}">關注 | 學校</a>
                                </h3>
                            </div>
                        </div>
                        <!-- information -->
                        <div class="row p-5">
                            <div class="col-md-12 p-5">
                                <div class="l-innerbody__content s-swiperCustom">
                                    <div class="swiper schoolSwiper">
                                        <div class="swiper-wrapper">
                                            @php
                                            $count = 0;
                                            @endphp

                                            @foreach ($Data['University'] as $key => $university)
                                            @if ($count >= 8)
                                            @break
                                            @endif
                                            <div class="swiper-slide">
                                                <div class="c-uniCard"
                                                    onclick="uniCardClick('{{ $university->slug }}')">
                                                    <span class="c-uniCard_img"
                                                        style="background-image: url('{{asset($university->image_path)}}') ;">&nbsp;</span>
                                                    <h6>{{ \Illuminate\Support\Str::limit($university->chinese_name, 15) }}
                                                    </h6>
                                                    <h4>{{ \Illuminate\Support\Str::limit($university->english_name, 25) }}
                                                    </h4>
                                                    <h5 class="p-2">目前有<a
                                                            href="{{route('senior', ['university' => $university->slug])}}">{{$university->vip->count()}}</a>位學長姊
                                                    </h5>
                                                </div>
                                            </div>
                                            @php
                                            $count++;
                                            @endphp
                                            @endforeach
                                        </div>
                                        <div class="schoolPagi paginationCustom"></div>
                                        <div class="container-fluid">
                                            <div class="row justify-content-end">
                                                <div class="col-md-2">
                                                    <a class="o-readMore" href="/university-list">查看更多 &gt;</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- QA section -->
            <div class="col-md-12">
                <div class="container-fluid p-0 m-0">
                    <section class="l-innerbody__qa">
                        <!-- title -->
                        <div class="row">
                            <div class="col-md-12 p-0">
                                <h3 class="l-innerbody__title">
                                    <a href="{{route('qna')}}">問與答｜諮詢</a>
                                </h3>
                            </div>
                        </div>
                        <!-- QA section -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="container">
                                    <!-- forst row -->
                                    <div class="row p-5">
                                        <!-- studyabroad -->
                                        <div class="col-md-4">
                                            <div class="container-fluid">
                                                <div class="c-qaCard">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            @php
                                                            $category = $Data['QaCategory']->get(0);
                                                            @endphp
                                                            <div class="c-qaCard__content">
                                                                <a class="c-qaCard__categName"
                                                                    href="{{route('qna', ['category_id'=> $category->id])}}">
                                                                    {{$category->name}}
                                                                </a>
                                                                @forelse($category->QACategoryRelation->take(3) as
                                                                $relation)
                                                                <a class="categQA"
                                                                    href="{{route('qna.show', $relation->qa->id)}}">
                                                                    {{ ($relation->qa->title) ? \Illuminate\Support\Str::limit($relation->qa->title, 20): "" }}
                                                                </a>
                                                                @empty
                                                                <p class="text-white">Hey, there is nothing yet.</p>
                                                                @endforelse
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <img class="c-qaCard__icon"
                                                                src="{{ asset('uploads/images/yzl-studyabroad.png') }}"
                                                                alt="icons">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- test -->
                                        <div class="col-md-4">
                                            <div class="container-fluid">
                                                <div class="c-qaCard">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            @php
                                                            $category = $Data['QaCategory']->get(1);
                                                            @endphp
                                                            <div class="c-qaCard__content">
                                                                <a class="c-qaCard__categName"
                                                                    href="{{route('qna', ['category_id'=> $category->id])}}">
                                                                    {{$category->name}}
                                                                </a>
                                                                @forelse($category->QACategoryRelation->take(3) as
                                                                $relation)
                                                                <a class="categQA"
                                                                    href="{{route('qna.show', $relation->qa->id)}}">
                                                                    {{ ($relation->qa->title) ? \Illuminate\Support\Str::limit($relation->qa->title, 20): "" }}
                                                                </a>
                                                                @empty
                                                                <p class="text-white">Hey, there is nothing yet.</p>
                                                                @endforelse
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <img class="c-qaCard__icon"
                                                                src="{{ asset('uploads/images/yzl-test.png') }}"
                                                                alt="icons">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- schools -->
                                        <div class="col-md-4">
                                            <div class="container-fluid">
                                                <div class="c-qaCard">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            @php
                                                            $category = $Data['QaCategory']->get(2);
                                                            @endphp
                                                            <div class="c-qaCard__content">
                                                                <a class="c-qaCard__categName"
                                                                    href="{{route('qna', ['category_id'=> $category->id])}}">
                                                                    {{$category->name}}
                                                                </a>
                                                                @forelse($category->QACategoryRelation->take(3) as
                                                                $relation)
                                                                <a class="categQA"
                                                                    href="{{route('qna.show', $relation->qa->id)}}">
                                                                    {{ ($relation->qa->title) ? \Illuminate\Support\Str::limit($relation->qa->title, 20): "" }}
                                                                </a>
                                                                @empty
                                                                <p class="text-white">Hey, there is nothing yet.</p>
                                                                @endforelse
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <img class="c-qaCard__icon"
                                                                src="{{ asset('uploads/images/yzl-school.png') }}"
                                                                alt="icons">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- second row -->
                                    <div class="row p-5 pt-0">
                                        <!-- campus -->
                                        <div class="col-md-4">
                                            <div class="container-fluid">
                                                <div class="c-qaCard">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            @php
                                                            $category = $Data['QaCategory']->get(4);
                                                            @endphp
                                                            <div class="c-qaCard__content">
                                                                <a class="c-qaCard__categName"
                                                                    href="{{route('qna', ['category_id'=> $category->id])}}">
                                                                    {{$category->name}}
                                                                </a>
                                                                @forelse($category->QACategoryRelation->take(3) as
                                                                $relation)
                                                                <a class="categQA"
                                                                    href="{{route('qna.show', $relation->qa->id)}}">
                                                                    {{ ($relation->qa->title) ? \Illuminate\Support\Str::limit($relation->qa->title, 20): "" }}
                                                                </a>
                                                                @empty
                                                                <p class="text-white">Hey, there is nothing yet.</p>
                                                                @endforelse
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <img class="c-qaCard__icon"
                                                                src="{{ asset('uploads/images/yzl-campus.png') }}"
                                                                alt="icons">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- clubs -->
                                        <div class="col-md-4">
                                            <div class="container-fluid">
                                                <div class="c-qaCard">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            @php
                                                            $category = $Data['QaCategory']->get(5);
                                                            @endphp
                                                            <div class="c-qaCard__content">
                                                                <a class="c-qaCard__categName"
                                                                    href="{{route('qna', ['category_id'=> $category->id])}}">
                                                                    {{$category->name}}
                                                                </a>
                                                                @forelse($category->QACategoryRelation->take(3) as
                                                                $relation)
                                                                <a class="categQA"
                                                                    href="{{route('qna.show', $relation->qa->id)}}">
                                                                    {{ ($relation->qa->title) ? \Illuminate\Support\Str::limit($relation->qa->title, 20): "" }}
                                                                </a>
                                                                @empty
                                                                <p class="text-white">Hey, there is nothing yet.</p>
                                                                @endforelse
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <img class="c-qaCard__icon"
                                                                src="{{ asset('uploads/images/yzl-club.png') }}"
                                                                alt="icons">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- coop -->
                                        <div class="col-md-4">
                                            <div class="container-fluid">
                                                <div class="c-qaCard">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            @php
                                                            $category = $Data['QaCategory']->get(6);
                                                            @endphp
                                                            <div class="c-qaCard__content">
                                                                <a class="c-qaCard__categName"
                                                                    href="{{route('qna', ['category_id'=> $category->id])}}">
                                                                    {{$category->name}}
                                                                </a>
                                                                @forelse($category->QACategoryRelation->take(3) as
                                                                $relation)
                                                                <a class="categQA"
                                                                    href="{{route('qna.show', $relation->qa->id)}}">
                                                                    {{ ($relation->qa->title) ? \Illuminate\Support\Str::limit($relation->qa->title, 20): "" }}
                                                                </a>
                                                                @empty
                                                                <p class="text-white">Hey, there is nothing yet.</p>
                                                                @endforelse
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <img class="c-qaCard__icon"
                                                                src="{{ asset('uploads/images/yzl-coop.png') }}"
                                                                alt="icons">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="row pr-5">
                    <div class="col-md-12 pr-5">

                        <div class="container-fluid">
                            <div class="row justify-content-end">
                                <div class="col-md-2">
                                    <a class="o-readMore" href="#">查看更多 &gt;</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </section>
            </div>
            <!-- join -->
            <div class="col-md-12 p-0">
                <div class="container-fluid p-0 m-0">
                    <div class="row">
                        <div class="col-md-12">
                            <section class="l-innerbody__join"
                                style="background-image: url('{{asset('uploads/images/join-banner-cut.jpg')}}');">
                                <div class="l-innerbody__joinSection">
                                    <a class="o-btn" href="{{route('login')}}">加入 ｜ 易子學</a>
                                    <p>讓專業，持續變現</p>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            <!-- news -->
            <div class="col-md-12 p-0">
                <div class="container-fluid p-0 m-0">
                    <section class="l-innerbody__news">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- card -->
                                <div class="c-newsCard">
                                    @if(!is_null($Data['Post']))
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div style="background-image: url('{{asset('uploads'.$Data['Post']->image_path)}}') ;"
                                                    class="c-newsCard__bgImg">&nbsp;
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="c-newsCard__info">
                                                    <h5 id="newsTopic">{{$Data['Post']->title}}</h5>
                                                    <div class="c-newsCard__tags">
                                                        @foreach($Data['Post']->category as $relation)
                                                        @if($relation->postCategory && $relation->postCategory->name)
                                                        <p class="o-tag">{{ $relation->postCategory->name }}</p>
                                                        @else
                                                        <p class="o-tag">Category name not found</p>
                                                        @endif
                                                        @endforeach
                                                    </div>
                                                    <p class="c-newsCard__meta">{{$Data['Post']->title}}</p>
                                                    <p class="c-newsCard__brief">
                                                        {{ (strip_tags($Data['Post']->body)) ? \Illuminate\Support\Str::limit(strip_tags($Data['Post']->body), 80): "" }}
                                                    </p>
                                                    <a class="o-readMore c-newsCard__readMore"
                                                        href="{{route('article', $Data['Post']->id)}}">閱讀完整文章</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- local -->
            <div class="col-md-12">
                <div class="container-fluid p-0 m-0">
                    <div class="row">
                        <div class="col-md-12">
                            <section class="l-innerbody__local">
                                <h6>地區找學長姐</h6>
                                <div>
                                    <p>
                                        <a href="{{route('university-list', ['country'=>'USA'])}}"
                                            class="text-decoration-none text-black">美國</a>｜
                                        <a href="{{route('university-list', ['country'=>'CANADA'])}}"
                                            class="text-decoration-none text-black">加拿⼤</a>｜
                                        <a href="{{route('university-list', ['country'=>'UK'])}}"
                                            class="text-decoration-none text-black">英國</a>｜
                                        <a href="{{route('university-list', ['country'=>'AUSTRALIA'])}}"
                                            class="text-decoration-none text-black">澳洲</a>｜
                                        <a href="{{route('university-list', ['country'=>'NEW ZEALAND'])}}"
                                            class="text-decoration-none text-black">紐⻄蘭</a>
                                    </p>
                                    <p>
                                        <a href="{{route('university-list', ['country'=>'FRANCE'])}}"
                                            class="text-decoration-none text-black">法國</a>｜
                                        <a href="{{route('university-list', ['country'=>'GERMANY'])}}"
                                            class="text-decoration-none text-black">德國</a>｜其他歐洲
                                    </p>
                                    <p>
                                        <a href="{{route('university-list', ['country'=>'TAIWAN'])}}"
                                            class="text-decoration-none text-black">台灣</a>｜
                                        <a href="{{route('university-list', ['country'=>'SINGAPORE'])}}"
                                            class="text-decoration-none text-black">新加坡</a>｜
                                        <a href="{{route('university-list', ['country'=>'JAPAN'])}}"
                                            class="text-decoration-none text-black">⽇本</a>｜
                                        <a href="{{route('university-list', ['country'=>'KOREA'])}}"
                                            class="text-decoration-none text-black">韓國</a>｜
                                        其他亞洲
                                    </p>
                                    <p>
                                        中國|
                                        <a href="{{route('university-list', ['country'=>'HONG KONG'])}}"
                                            class="text-decoration-none text-black">香港</a>｜
                                        <a href="{{route('university-list', ['country'=>'MACAU'])}}"
                                            class="text-decoration-none text-black">澳⾨</a>
                                    </p>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('page_js')
    <script>
        $('.like-user').click(function () {
            let that = $(this);
            $.ajax({
                url: 'like-user/' + $(this).data('id'),
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
        })

        $('.collect-user').click(function () {
            let that = $(this);
            $.ajax({
                url: 'collect-user/' + $(this).data('id'),
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

        })
    </script>
@endsection