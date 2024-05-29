@extends('layouts.guest')
@section('content')
<!-- Header-->
<header>
    <div class="headerCard">
        <div class="banner">
            <div>
                <span id="bannerImg" style="background-image: url('{{ asset('uploads/images/banner_p1.jpg') }}') ;"
                    class="bgImg">&nbsp</span>
            </div>
        </div>
        <div class="slogan">
            <h1 id="topic" class="fw-bolder text-white mb-2">海外留學，</h1>
            <h1 class="fw-bolder text-white mb-5">先找學長姐罩</h1>
        </div>
        <svg viewBox="0 0 1920 1080">
            <polygon points="298.8 1079.5 0 1080 0 .5 750 0 298.8 1079.5" />
        </svg>
    </div>

</header>
<!-- Student Card Section -->
<section class="bg-light py-5 border-bottom" id="features">
    <div class="studentSection">
        <!-- title -->
        <a class="title" href="{{route('senior')}}">學長姐 | 快找</a>
        <!-- items -->
        <div class="owl-carousel owl-theme">
            @foreach ($Data['Users'] as $key => $user)
            <div class="item studentC" onclick="cardClickable({{ $user->id }})">
                <!-- img div -->
                <div class="studentImg">
                    @if(is_null($user->avatar))
                    <span style="background-image: url('{{asset('uploads/images/default_avatar.png')}}') ;">&nbsp</span>
                    @else
                    <span style="background-image: url('/uploads/{{ $user->avatar }}');">&nbsp</span>
                    @endif
                </div>
                <!-- background -->
                <svg viewBox="0 0 330 480">
                    <path
                        d="M301.9,2c14.5,0,26.4,11.8,26.4,26.4v306.7c0,14.5-11.8,26.4-26.4,26.4H28.1c-14.5,0-26.4-11.8-26.4-26.4V28.4C1.8,13.8,13.6,2,28.1,2h273.7M301.9,0H28.1C12.5,0-.2,12.7-.2,28.4v306.7c0,15.7,12.7,28.4,28.4,28.4h273.7c15.7,0,28.4-12.7,28.4-28.4V28.4c0-15.7-12.7-28.4-28.4-28.4h0Z" />
                    <polygon points="330 480 0 480 0 305 330 337.1 330 480" />
                </svg>
                <!-- school img -->
                <div class="schoolImg">
                    <span style="background-image: url('{{asset('university/USA/US1.png')}}') ;">&nbsp</span>
                </div>
                <!-- name card -->
                <h4>{{ $user->name }}</h4>
                <!-- school english -->
                <h5>{{ !is_null($user->universityItem) ? $user->universityItem->english_name : '' }}</h5>
                <!-- school chinese -->
                <h6>{{ !is_null($user->universityItem) ? $user->universityItem->chinese_name : '' }}</h6>
                <!-- react icons -->
                <div class="react d-flex flex-row justify-content-evenly align-items-center"
                    onclick="event.stopPropagation(); return false; ">
                    @if(auth()->check())
                    <i class="fa fa-heart" style="
                                color:@if($user->likedUser->where('uid', auth()->user()->id)->where('user_id', $user->id)->count() == 1) red @else black @endif
                                " data-id="{{$user->id}}">
                        <span class="text-black">{{$user->likedUser->count()}}</span>
                    </i>
                    <i class="fa fa-bookmark" data-id="{{$user->id}}" style="
                                color:  @if($user->collectedUser->where('uid', auth()->user()->id)->where('user_id', $user->id)->count() == 1) red @else black @endif
                                ">
                        <span class="text-black">{{$user->collectedUser->count()}}</span>
                    </i>
                    @else
                    <i class="fa fa-heart" style="color: black;" data-id="{{$user->id}}">
                        <span class="text-black">{{$user->likedUser->count()}}</span>
                    </i>
                    <i class="fa fa-bookmark" data-id="{{$user->id}}">
                        <span class="text-black">{{$user->collectedUser->count()}}</span>
                    </i>
                    @endif
                </div>
                <!-- post tag -->
                <div class="postTags">
                    @forelse ($user->postCategory as $count => $cate)
                    @if ($count < 3) <a href="{{route('senior', ['category' => $cate->postCategory->id])}}"
                        class="text-white">
                        {{ $cate->postCategory->name }}
                        </a>
                        @endif
                        @empty
                        @endforelse
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- University section-->
<section class="py-5 border-bottom" id="features">
    <div class="uCardSection">
        <!-- title -->
        <a class="title" href="{{route('university-list')}}">關注 | 學校</a>
        <!-- information -->
        <div class="sliderUni center">
            @php
            $count = 0;
            @endphp

            @foreach ($Data['University'] as $key => $university)
            @if ($count >= 6)
            @break
            @endif
            <div class="uniCard d-flex flex-column justify-space-between align-items-center"
                onclick="uniCardClick('{{ $university->slug }}')">
                <div class="uniLogo d-flex justify-content-center">
                    <span style="background-image: url('{{asset($university->image_path)}}') ;">&nbsp</span>
                </div>
                <h6>{{ \Illuminate\Support\Str::limit($university->chinese_name, 15) }}</h6>
                <h4>{{ \Illuminate\Support\Str::limit($university->english_name, 25) }}</h4>
                <h5>目前有<a
                        href="{{route('senior', ['university' => $university->slug])}}">{{$university->vip->count()}}</a>位在校
                </h5>
            </div>
            @php
            $count++;
            @endphp
            @endforeach
        </div>
    </div>
</section>


<!-- QA section -->
<section class="qaSection">
    <a class="title" href="{{route('qna')}}">問與答｜諮詢</a>
    <!-- QA section -->
    <div class="row justify-content-center">
        <!-- studyabroad -->
        <div class="col-3 qaCard row justify-content-between align-items-center">
            @php
            $category = $Data['QaCategory']->get(0);
            @endphp
            <div class="col-8 d-flex flex-column h-100">
                <a class="categName" href="{{route('qna', ['category_id'=> $category->id])}}">
                    {{$category->name}}
                </a>
                @forelse($category->QACategoryRelation->take(3) as $relation)
                <a class="categQA" href="{{route('qna.show', $relation->qa->id)}}">
                    {{$relation->qa->title}}
                </a>
                @empty
                <p class="text-white">Hey, there is nothing yet.</p>
                @endforelse
            </div>
            <img class="col-4" src="{{ asset('uploads/images/yzl-studyabroad.png') }}" alt="icons">
        </div>
        <!-- test -->
        <div class="col-3 qaCard row justify-content-between align-items-center">
            @php
            $category = $Data['QaCategory']->get(1);
            @endphp
            <div class="col-8 d-flex flex-column h-100">
                <a class="categName" href="{{route('qna', ['category_id'=> $category->id])}}">
                    {{$category->name}}
                </a>
                @forelse($category->QACategoryRelation->take(3) as $relation)
                <a class="categQA" href="{{route('qna.show', $relation->qa->id)}}">
                    {{$relation->qa->title}}
                </a>
                @empty
                <p class="text-white">Hey, there is nothing yet.</p>
                @endforelse
            </div>
            <img class="col-4" src="{{ asset('uploads/images/yzl-test.png') }}" alt="icons">
        </div>
        <!-- schools -->
        <div class="col-3 qaCard row justify-content-between align-items-center">
            @php
            $category = $Data['QaCategory']->get(2);
            @endphp
            <div class="col-8 d-flex flex-column h-100">
                <a class="categName" href="{{route('qna', ['category_id'=> $category->id])}}">
                    {{$category->name}}
                </a>
                @forelse($category->QACategoryRelation->take(3) as $relation)
                <a class="categQA" href="{{route('qna.show', $relation->qa->id)}}">
                    {{$relation->qa->title}}
                </a>
                @empty
                <p class="text-white">Hey, there is nothing yet.</p>
                @endforelse
            </div>
            <img class="col-4" src="{{ asset('uploads/images/yzl-school.png') }}" alt="icons">
        </div>
        <!-- campus -->
        <div class="col-3 qaCard row justify-content-between align-items-center">
            @php
            $category = $Data['QaCategory']->get(4);
            @endphp
            <div class="col-8 d-flex flex-column h-100">
                <a class="categName" href="{{route('qna', ['category_id'=> $category->id])}}">
                    {{$category->name}}
                </a>
                @forelse($category->QACategoryRelation->take(3) as $relation)
                <a class="categQA" href="{{route('qna.show', $relation->qa->id)}}">
                    {{$relation->qa->title}}
                </a>
                @empty
                <p class="text-white">Hey, there is nothing yet.</p>
                @endforelse
            </div>
            <img class="col-4" src="{{ asset('uploads/images/yzl-campus.png') }}" alt="icons">
        </div>
        <!-- clubs -->
        <div class="col-3 qaCard row justify-content-between align-items-center">
            @php
            $category = $Data['QaCategory']->get(5);
            @endphp
            <div class="col-8 d-flex flex-column h-100">
                <a class="categName" href="{{route('qna', ['category_id'=> $category->id])}}">
                    {{$category->name}}
                </a>
                @forelse($category->QACategoryRelation->take(3) as $relation)
                <a class="categQA" href="{{route('qna.show', $relation->qa->id)}}">
                    {{$relation->qa->title}}
                </a>
                @empty
                <p class="text-white">Hey, there is nothing yet.</p>
                @endforelse
            </div>
            <img class="col-4" src="{{ asset('uploads/images/yzl-club.png') }}" alt="icons">
        </div>
        <!-- coop -->
        <div class="col-3 qaCard row justify-content-between align-items-center">
            @php
            $category = $Data['QaCategory']->get(6);
            @endphp
            <div class="col-8 d-flex flex-column h-100">
                <a class="categName" href="{{route('qna', ['category_id'=> $category->id])}}">
                    {{$category->name}}
                </a>
                @forelse($category->QACategoryRelation->take(3) as $relation)
                <a class="categQA" href="{{route('qna.show', $relation->qa->id)}}">
                    {{$relation->qa->title}}
                </a>
                @empty
                <p class="text-white">Hey, there is nothing yet.</p>
                @endforelse
            </div>
            <img class="col-4" src="{{ asset('uploads/images/yzl-coop.png') }}" alt="icons">
        </div>
    </div>
</section>

<!-- join -->
<section class="joinSection" style="background-image: url('{{asset('uploads/images/join-banner-cut.jpg')}}');">
    <div>
        <a href="{{route('login')}}">加入 ｜ 易子學</a>
        <p>讓專業，持續變現</p>
    </div>
</section>


<!-- news -->
<section class="newsSection">
    <div class="newsbg">
        <div class="newsCard">
            @if(!is_null($Data['Post']))
            <div class=" d-flex justify-content-center">
                <span style="background-image: url('{{asset('uploads'.$Data['Post']->image_path)}}') ;"
                    class="bgImg">&nbsp
                </span>
            </div>
            <div class="info">
                <h5 id="newsTopic">{{$Data['Post']->title}}</h5>
                <div class="tags">
                    @foreach($Data['Post']->category as $relation)
                    @if($relation->postCategory && $relation->postCategory->name)
                    <p>{{ $relation->postCategory->name }}</p>
                    @else
                    <p>Category name not found</p>
                    @endif
                    @endforeach
                </div>
                <p class="meta">{{$Data['Post']->title}}</p>
                <p class="brief">{!! \Illuminate\Support\Str::limit(strip_tags($Data['Post']->body)) !!}</p>
                <a href="{{route('article', $Data['Post']->id)}}">閱讀完整文章</a>
            </div>
            @endif
        </div>
    </div>
</section>

<section class="localOlder">
    <h6>地區找學長姐</h6>
    <div>
        <p>
            <a href="{{route('university-list', ['country'=>'USA'])}}" class="text-decoration-none text-black">美國</a>｜
            <a href="{{route('university-list', ['country'=>'CANADA'])}}"
                class="text-decoration-none text-black">加拿⼤</a>｜
            <a href="{{route('university-list', ['country'=>'UK'])}}" class="text-decoration-none text-black">英國</a>｜
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
            <a href="{{route('university-list', ['country'=>'JAPAN'])}}" class="text-decoration-none text-black">⽇本</a>｜
            <a href="{{route('university-list', ['country'=>'KOREA'])}}" class="text-decoration-none text-black">韓國</a>｜
            其他亞洲
        </p>
        <p>
            中國|
            <a href="{{route('university-list', ['country'=>'HONG KONG'])}}"
                class="text-decoration-none text-black">香港</a>｜
            <a href="{{route('university-list', ['country'=>'MACAU'])}}" class="text-decoration-none text-black">澳⾨</a>
        </p>
    </div>
</section>


<script>
    $('.fa-heart').click(function () {
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

    $('.fa-bookmark').click(function () {
        let that = $(this);
        $.ajax({
            url: 'collect-user/' + $(this).data('id'),
            method: 'GET',
            success: function (res) {
                if (res.operator === 'no') {
                    alert(res.message);
                } else if (res.operator === 'add') {
                    that.removeClass('text-gray').addClass('text-danger');
                } else if (res.operator === 'reduce') {
                    that.removeClass('text-danger').addClass('text-black');
                }
            },
            error: function (error) {
                console.log(error)
            }
        });

    })
</script>

@endsection