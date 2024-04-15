@extends('layouts.guest')
@section('content')
<!-- Header-->
<header>
    <div class="headerCard">
        <div class="banner">
            <!-- <img id="bannerImg" src="{{ asset('uploads/images/banner_p1.jpg') }}"> -->
            <div>
                <span id="bannerImg" style="background-image: url('{{ asset('uploads/images/banner_p1.jpg') }}') ;"
                    class="bgImg">&nbsp</span>
            </div>
        </div>
        <div class="slogan">
            <h1 id="topic" class="display-5 fw-bolder text-white mb-2">海外留學，</h1>
            <h1 class="display-5 fw-bolder text-white mb-5">先找學長姐罩</h1>
            <a style="background:#45ecd9; border: none" class="btn btn-primary btn-lg px-5 me-sm-3"
                href="{{route('senior')}}">學長姐 | 快找</a>
        </div>
    </div>

</header>
<!-- Features section-->
<!-- Student Card Section -->
<section class="bg-light py-5 border-bottom" id="features">
    <div class="studentSection">
        <div class="row gx-5">
            <div style="text-align:center; margin-bottom:100px">
                <a style="background:#45ecd9; border: none" class="btn btn-primary btn-lg px-5"
                    href="{{route('senior')}}">關注
                    | 學長姐</a>
            </div>

            <div class="owl-carousel owl-theme studentNav">
                @foreach ($Data['Users'] as $key => $user)
                <!-- student card -->
                <div class="item studentC" onclick="cardClickable({{ $user->id }})">
                    <div>
                        <div class="cards">
                            <!-- student profile pic -->
                            <div class="studentProfile">
                                <div class="studentImg">
                                    @if(is_null($user->avatar))
                                    <!-- <img src="{{asset('uploads/images/default_avatar.png')}}" alt="Card image cap" width="200" height="200"> -->
                                    <div class=" d-flex justify-content-center">
                                        <span
                                            style="background-image: url('{{asset('uploads/images/default_avatar.png')}}') ;"
                                            class="bgImg">&nbsp</span>
                                    </div>
                                    @else
                                    <!-- <img src="/uploads/{{ $user->avatar }}" alt="Card image cap" width="200" height="200"> -->
                                    <div class=" d-flex justify-content-center">
                                        <span style="background-image: url('/uploads/{{ $user->avatar }}');"
                                            class="bgImg">&nbsp</span>
                                    </div>
                                    @endif

                                </div>
                                <!-- video Btn -->
                                <div class="videoBtn">
                                    @if(is_null($user->profile_video))
                                    <a class="text"
                                        onClick="alert('學長姐尚未上傳影音'); event.stopPropagation(); event.preventDefault();">
                                        <img class="card-img-top"
                                            src="https://cdn.pixabay.com/photo/2016/02/01/12/33/play-1173551_640.png"
                                            alt="Card image cap">
                                    </a>
                                    @else
                                    <a href="{{ $user->profile_video }}" class="text" target="_blank">
                                        <img class="card-img-top"
                                            src="https://cdn.pixabay.com/photo/2016/02/01/12/33/play-1173551_640.png"
                                            alt="Card image cap">
                                    </a>
                                    @endif
                                </div>
                                <!-- react icons -->
                                <div class="react d-flex flex-row justify-content-evenly align-items-center"
                                onclick="event.stopPropagation(); return false; " >
                                    @if(auth()->check())
                                    <i class="fa fa-heart" style="
                                                       color:@if($user->likedUser->where('uid', auth()->user()->id)->where('user_id', $user->id)->count() == 1) red @else black @endif
                                                       " data-id="{{$user->id}}" >
                                        <span class="text-black">{{$user->likedUser->count()}}</span>
                                    </i>
                                    <i class="fa fa-bookmark" data-id="{{$user->id}}" style="
                                                        color:  @if($user->collectedUser->where('uid', auth()->user()->id)->where('user_id', $user->id)->count() == 1) red @else black @endif
                                                    " >
                                        <span class="text-black">{{$user->collectedUser->count()}}</span>
                                    </i>
                                    @else
                                    <i class="fa fa-heart" style="color: black;" data-id="{{$user->id}}" >
                                        <span class="text-black">{{$user->likedUser->count()}}</span>
                                    </i>
                                    <i class="fa fa-bookmark" data-id="{{$user->id}}" >
                                        <span class="text-black">{{$user->collectedUser->count()}}</span>
                                    </i>
                                    @endif
                                </div>
                            </div>
                            <!-- name card -->
                            <div class="name-card d-flex flex-column justify-content-center">
                                <h4>{{ $user->name }}</h4>
                                <h6>{{ !is_null($user->universityItem) ? $user->universityItem->english_name : '' }}
                                </h6>
                            </div>
                            <!-- post tag -->
                            <div class="postTags row row-cols-3 mt-2 justify-content-center">
                                @forelse ($user->postCategory as $count => $cate)
                                @if ($count < 3) <span href="#" class="col-3 btn btn-outline-secondary m-1"
                                    style="font-size: 0.6rem;">
                                        <a href="{{route('senior', ['category' => $cate->postCategory->id])}}" class="text-decoration-none w-100 text-white">
                                            #{{ $cate->postCategory->name }}
                                        </a>
                                    </span>
                                    @endif
                                    @empty
                                    @endforelse
                            </div>
                            <?php
                                        $UserSkillRelation = $Data['UserSkillRelation']->where('user_id', $user->id)->get();
                                        ?>
                            <!-- skill tag -->
                            <div class="skillTags row row-cols-3 mt-2 justify-content-between">
                                @foreach ($UserSkillRelation as $key => $cateId)
                                <?php
                                                $cate = $Data['Skills']->where('id', $cateId->skill_id)->first();
                                                ?>
                                @if($key < 6) <span href="#" class="col-4 btn btn-outline-secondary"
                                    style="font-size: 0.6rem;"><a href="{{route('senior',['skill' => $cateId->skill_id])}}" class="text-decoration-none w-100" style="color:#4C2A70;">#{{ $cate->name }}</a></span>
                                    @if($key==2)
                                    <br>
                                    @endif
                                    @endif
                                    @endforeach
                            </div>
                            <!-- </a> -->
                        </div>
                        <p><a href="{{route('get-introduction',$user->id)}}"
                                class="text-decoration-none text-black">點擊查看更多</a></p>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</section>

<!-- Features section-->
<!-- Ucard Section -->
<section class="py-5 border-bottom" id="features">
    <div class="uCardSection">
        <div class="row gx-5">
            <div style="text-align:center; margin-bottom:100px">
                <a style="background:#45ecd9; border: none" class="btn btn-primary btn-lg px-5"
                   href="{{route('university-list')}}">關注
                    | 學校</a>
            </div>
            <div class="owl-carousel owl-theme cards">

                @foreach ($Data['University'] as $key => $university)
                    <div class="item" onclick="uniCardClick('{{ $university->slug }}')">
                        <div>
                            <div class="card">
                                <div class=" d-flex justify-content-center">
                                <span style="background-image: url('{{asset($university->image_path)}}') ;"
                                      class="bgImg">&nbsp</span>
                                </div>
                            </div>
                            <div>
                                <div class="name-card">
                                    <h6 class="ellipsis text-white">
                                        {{ \Illuminate\Support\Str::limit($university->chinese_name, 10) }}</h6>
                                    <small class="ellipsis"><a class="text-decoration-none text-white"
                                                               href="{{route('senior', ['university' => $university->slug])}}">{{ \Illuminate\Support\Str::limit($university->english_name, 20) }}</a></small>
                                </div>
                                <div class="info">
                                    <h5>目前有<a
                                                href="{{route('senior', ['university' => $university->slug])}}">{{$university->vip->count()}}</a>位在校
                                    </h5>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</section>


<!-- QA section -->
<section class="py-5" id="Qa">
    <div>
        <div style="text-align:center; margin-bottom:100px;">
            <a style="background:#45ecd9; border: none" class="btn btn-primary btn-lg px-5 text-white"
                href="{{route('qna')}}">
                諮詢｜問與答
            </a>
        </div>
    </div>
    <div class="row">
        <!-- QA section 1 -->
        <div class="qaSection">
            @foreach($Data['QaCategory']->take(4) as $category)
            <div class="card">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor"
                    class="bi bi-airplane-engines" viewBox="0 0 16 16">
                    <path
                        d="M8 0c-.787 0-1.292.592-1.572 1.151A4.35 4.35 0 0 0 6 3v3.691l-2 1V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.191l-1.17.585A1.5 1.5 0 0 0 0 10.618V12a.5.5 0 0 0 .582.493l1.631-.272.313.937a.5.5 0 0 0 .948 0l.405-1.214 2.21-.369.375 2.253-1.318 1.318A.5.5 0 0 0 5.5 16h5a.5.5 0 0 0 .354-.854l-1.318-1.318.375-2.253 2.21.369.405 1.214a.5.5 0 0 0 .948 0l.313-.937 1.63.272A.5.5 0 0 0 16 12v-1.382a1.5 1.5 0 0 0-.83-1.342L14 8.691V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v.191l-2-1V3c0-.568-.14-1.271-.428-1.849C9.292.591 8.787 0 8 0M7 3c0-.432.11-.979.322-1.401C7.542 1.159 7.787 1 8 1s.458.158.678.599C8.889 2.02 9 2.569 9 3v4a.5.5 0 0 0 .276.447l5.448 2.724a.5.5 0 0 1 .276.447v.792l-5.418-.903a.5.5 0 0 0-.575.41l-.5 3a.5.5 0 0 0 .14.437l.646.646H6.707l.647-.646a.5.5 0 0 0 .14-.436l-.5-3a.5.5 0 0 0-.576-.411L1 11.41v-.792a.5.5 0 0 1 .276-.447l5.448-2.724A.5.5 0 0 0 7 7z" />
                </svg>
                <div>
                    <h5>
                        <a href="{{route('qna', ['category_id'=> $category->id])}}"
                            class="text-decoration-none text-white" style="font-size: 1rem;">
                            {{$category->name}}
                        </a>
                    </h5>
                </div>
                @for($int=0;$int<3; $int++) @if(!is_null($category->QACategoryRelation->get($int)))
                    <p>
                        <a href="{{route('qna.show', $category->QACategoryRelation->get($int)->qa->id)}}"
                            class="text-decoration-none text-primary"
                            style="font-size: 0.8rem; letter-spacing: normal">{{$category->QACategoryRelation->get($int)->qa->title}}</a>
                    </p>
                    @else
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </p>
                    @endif
                    @endfor
            </div>
            @endforeach
        </div>
        <!-- QA section 2 -->
        <div class="qaSection">
            @foreach($Data['QaCategory']->take(-4) as $category)
            <div class="card">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor"
                    class="bi bi-marker-tip" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5 6.064-1.281-4.696A.5.5 0 0 0 9.736 9H6.264a.5.5 0 0 0-.483.368l-1.28 4.696A6.97 6.97 0 0 0 8 15c1.275 0 2.47-.34 3.5-.936m.873-.598a7 7 0 1 0-8.746 0l1.19-4.36a1.5 1.5 0 0 1 1.31-1.1l1.155-3.851c.213-.713 1.223-.713 1.436 0l1.156 3.851a1.5 1.5 0 0 1 1.31 1.1z" />
                </svg>
                <div>
                    <h5>
                        <a href="{{route('qna', ['category_id'=> $category->id])}}"
                            class="text-decoration-none text-white" style="font-size: 1rem;">{{$category->name}}</a>
                    </h5>
                </div>
                @for($int=0;$int<3; $int++) @if(!is_null($category->QACategoryRelation->get($int)))
                    <p>
                        <a href="{{route('qna.show', $category->QACategoryRelation->get($int)->qa->id)}}"
                            class="text-decoration-none text-primary"
                            style="font-size: 0.8rem; letter-spacing: normal">{{$category->QACategoryRelation->get($int)->qa->title}}</a>
                    </p>
                    @else
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </p>
                    @endif
                    @endfor
            </div>
            @endforeach
        </div>
        {{--                <a href="{{route('qna')}}" class="text-center text-decoration-none
        text-black">查看更多問答</a>--}}
    </div>
</section>

<!-- join -->
<section class="joinSection"
    style="background-image: url('{{asset('uploads/images/join-banner-cut.jpg')}}');background-position: center; background-size: cover;">
    <div>
        <p>親身經驗</p>
        <a style="background:#45ecd9; border: none" class="btn btn-primary btn-lg px-5" href="{{route('login')}}">加入 ｜
            易子學</a>
        <p>專業變現</p>
    </div>
</section>


<!-- news -->
<section class="newsSection">
    <div style="text-align:center;">
        <a style="background:#45ecd9; border: none" class="btn btn-primary btn-lg px-5"
            href="{{route('study-abroad')}}">最新 ｜ 消息</a>
    </div>
    <div class="bg-light">
        <div class="newsCard">
            @if(!is_null($Data['Post']))
            <div class=" d-flex justify-content-center">
                <span style="background-image: url('{{asset('uploads'.$Data['Post']->image_path)}}') ;"
                    class="bgImg">&nbsp</span>
            </div>
            <div class="info">
                <h5 id="newsTopic">{{$Data['Post']->title}}</h5>
                <p class="tag">
                    @forelse($Data['Post']->category as $relation)
                    #{{$relation->postCategory->name}}
                    @empty

                    @endforelse
                </p>
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
                class="text-decoration-none text-black">紐⻄蘭</a>｜
            其他英語系國家
        </p>
        <p>
            <a href="{{route('university-list', ['country'=>'FRANCE'])}}"
                class="text-decoration-none text-black">法國</a>｜
            <a href="{{route('university-list', ['country'=>'GERMANY'])}}"
                class="text-decoration-none text-black">德國</a>｜
            義大利｜
            其他歐語系國家
        </p>
        <p>
            <a href="{{route('university-list', ['country'=>'TAIWAN'])}}"
                class="text-decoration-none text-black">台灣</a>｜
            <a href="{{route('university-list', ['country'=>'JAPAN'])}}" class="text-decoration-none text-black">⽇本</a>｜
            <a href="{{route('university-list', ['country'=>'KOREA'])}}" class="text-decoration-none text-black">韓國</a>｜
            其他亞洲
        </p>
        <p>
            中國|
            <a href="{{route('university-list', ['country'=>'SINGAPORE'])}}"
                class="text-decoration-none text-black">新加坡</a>
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