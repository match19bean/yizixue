@extends('layouts.guest2')

@section('content')
<!-- breadcrumb -->
<div class="c-breadcrumbs">
    <h4>
        <a class="c-breadcrumbs_prePage" href="{{url('/')}}">首頁</a>
        >
        <a class="c-breadcrumbs_prePage" href="{{route('article-list', $Data['user']->id)}}">
            {{$Data['user']->name}}
        </a>
    </h4>
</div>
<div class="l-introduction">
    <!-- user basic info -->
    <div class="l-introduction__briefInfo">
        <div class="row">
            <!-- portriat -->
            <div class="col-md-4">
                <div class="l-introduction__portriat"
                    style="background-image: url('{{asset('uploads/'.$Data['user']->avatar)}}') ;">
                    &nbsp;
                </div>
            </div>
            <div class="col-md-8">
                <div class="l-introduction__infoCard">
                    <!-- user name -->
                    <h2 class="l-introduction__userName">{{$Data['user']->name}}</h2>
                    <!-- tags -->
                    <div class="l-introduction__tags">
                        <div class="row">
                            <div class="col-md-7">
                                <!-- school status -->
                                <div class="l-introduction__schoolRelate">
                                    <div class="l-introduction__schoolStatus row">
                                        <!-- school img -->
                                        <div class="col-md-2">
                                            <span class="l-introduction__schoolImg"
                                                style="background-image: url('{{asset('university/USA/US1.png')}}') ;">&nbsp;</span>
                                        </div>
                                        <!-- school name -->
                                        <div class="col-md-6">
                                            <h6 class="text-white">
                                                {{!is_null($Data['user']->universityItem) ?$Data['user']->universityItem->chinese_name:''}}
                                            </h6>
                                            <h6 class="text-white">
                                                {{!is_null($Data['user']->universityItem) ?$Data['user']->universityItem->english_name:''}}
                                            </h6>
                                        </div>
                                        <h3 class="col-md-4 o-whiteBtn">在學</h3>
                                    </div>
                                    <!-- post categ -->
                                    <div class="postCateg">
                                        <div class="l-introduction__postTag">
                                            @if(!is_null($Data['user']->postCategory))
                                            @foreach($Data['user']->postCategory as $relation)
                                            <h4 class="o-tag">{{$relation->postCategory->name}}</h4>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- user skill -->
                            <div class="col-md-3 align-self-center">
                                <div class="row g-5">
                                    @if(!is_null($Data['user']->skills))
                                    @foreach($Data['user']->skills as $skill)
                                    <span class="col-md-6">
                                        <a class="o-skillBtn">
                                            {{ $skill->skill->name }}
                                        </a>
                                    </span>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- social btn -->
                    <div class="l-introduction__socialBtn">
                        <div class="row">
                            <!-- react -->
                            <div class="col-md-6">
                                <div class="o-react">
                                    @if(auth()->check())
                                    <i class="bi bi-heart"
                                        style="color:  @if($Data['user']->likedUser->where('uid', auth()->user()->id)->where('user_id', $Data['user']->id)->count() == 1) red @else black @endif"
                                        data-id="{{$Data['user']->id}}">
                                        <span>{{$Data['user']->likedUser->count()}}</span>
                                    </i>
                                    <i class="bi bi-bookmark"
                                        style="color:  @if($Data['user']->collectedUser->where('uid', auth()->user()->id)->where('user_id', $Data['user']->id)->count() == 1) red @else black @endif"
                                        data-id="{{$Data['user']->id}}">
                                        <span>{{$Data['user']->collectedUser->count()}}</span>
                                    </i>

                                    @else
                                    <i class="bi bi-heart text-black" style="margin:5px">
                                        <span>{{$Data['user']->likedUser->count()}}</span>
                                    </i>
                                    <i class="bi bi-bookmark" style="margin:5px">
                                        <span>{{$Data['user']->collectedUser->count()}}</span>
                                    </i>
                                    @endif
                                </div>
                            </div>
                            <!-- social -->
                            <div class="col-md-6">
                                <div class="o-react">
                                    @if(is_null($Data['user']->profile_video))
                                    <a class="o-tag" onClick="alert('學長姐尚未上傳影音');">
                                        <i class="bi bi-play-fill"></i>
                                    </a>
                                    @else
                                    <a href="{{$Data['user']->profile_video}}" class="o-tag" target="_blank">
                                        <i class="bi bi-play-fill"></i>
                                    </a>
                                    @endif
                                    @if(is_null($Data['user']->profile_voice))
                                    <a class="o-tag" onClick="alert('學長姐尚未上傳影音');">
                                        <i class="bi bi-mic-fill"></i>
                                    </a>
                                    @else
                                    <a class="o-tag" href="{{$Data['user']->profile_voice}}" target="_blank">
                                        <i class="bi bi-mic-fill"></i>
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- details -->
    <div class="m-0">
        <h2 class="l-introduction__title">自我介紹</h2>
        <div class="l-introduction__detailSection">
            <div class="row g-5">
                <div class="l-introduction__detailContent col-md-12">
                    @if(is_null($Data['user']->description))
                    尚未填寫自我介紹
                    @else
                    {!! $Data['user']->description !!}
                    @endif
                </div>
                <div class="l-introduction__detailContent col-md-12">
                    <h3 class="o-subTitle">學歷經歷</h3>
                    <p>
                        {{ !is_null($Data['user']->universityItem) ? $Data['user']->universityItem->english_name : '' }}
                    </p>
                    <hr>
                    <p>
                        {{ !is_null($Data['user']->universityItem) ? $Data['user']->universityItem->english_name : '' }}
                    </p>
                    <hr>
                </div>
                <div class="l-introduction__detailContent col-md-12">
                    <h3 class="o-subTitle">社交網路</h3>
                    <div class="row">
                        <div class="col-md-3">
                            <svg class="o-socialIcon" viewBox="0 0 200 200">
                                <path
                                    d="M100,0c55.2,0,100,44.7,100,99.9,0,55.2-44.9,100.2-100.1,100.1C44.7,199.9,0,155.1,0,100,0,44.8,44.8,0,100,0ZM161.5,91.4c-.3-14.6-6.5-25.7-17.2-34.5-11.2-9.3-24.3-13.8-38.6-14.8-18.8-1.3-36,3.1-50.7,15.4-21.3,17.8-22,46.1-1.7,65,10.5,9.8,23.3,14.7,37.4,16.6,3.4.4,4.5,1.7,4,5.1-.4,3.1-.9,6.1-1,9.2,0,1.4.4,3.3,1.4,4,.8.7,2.9.5,4,0,6.5-3.3,12.9-6.7,19.1-10.5,14.3-8.7,26.9-19.3,36.1-33.5,4.4-6.8,6.8-14.2,7.1-21.8Z"
                                    style="stroke-width: 0px;" />
                                <path
                                    d="M161.5,91.4c-.2,7.7-2.6,15-7.1,21.8-9.2,14.2-21.9,24.8-36.1,33.5-6.2,3.8-12.7,7.1-19.1,10.5-1.1.6-3.2.7-4,0-1-.8-1.4-2.6-1.4-4,0-3.1.6-6.2,1-9.2.4-3.4-.6-4.6-4-5.1-14.1-1.8-26.8-6.8-37.4-16.6-20.3-18.9-19.7-47.1,1.7-65,14.7-12.3,31.9-16.7,50.7-15.4,14.3,1,27.4,5.5,38.6,14.8,10.7,8.8,16.9,20,17.2,34.5ZM110.6,92.2c-.8-.9-1.2-1.4-1.6-1.9-3.5-4.6-7.1-9.2-10.6-13.8-1.1-1.4-2.3-2.1-4-1.5-1.6.6-2,1.9-2,3.6,0,7.5,0,15,0,22.6,0,2.3,1.2,3.6,3.1,3.6,1.9,0,3.1-1.3,3.1-3.5,0-1.9,0-3.9,0-5.8,0-2.5,0-5,0-7.5,4.4,4.9,8.3,9.9,12.1,15,1,1.3,2.2,2.3,3.9,1.6,1.7-.6,2.1-2,2.1-3.7,0-7.4,0-14.7,0-22.1,0-2.6-1-3.8-3-3.9-2.1,0-3.2,1.3-3.2,3.9,0,4.3,0,8.5,0,13.4ZM128,92.9c2.8,0,5.5,0,8.2,0,2.7,0,4.3-1.2,4.2-3.3,0-1.9-1.6-3-4.2-3-2.8,0-5.5,0-8.2,0v-5.6c3,0,5.8,0,8.7,0,2.4,0,3.8-1.3,3.7-3.2,0-1.8-1.4-3-3.7-3-3.8,0-7.6,0-11.4,0-2.6,0-3.7,1.1-3.8,3.7,0,7.5,0,15,0,22.6,0,2.7,1.1,3.7,3.9,3.7,3.6,0,7.1,0,10.7,0,2.8,0,4.3-1.1,4.2-3.2,0-2-1.4-3-4.1-3.1-2.8,0-5.5,0-8.3,0v-5.6ZM65.8,98.5c0-1.1,0-1.9,0-2.7,0-5.7,0-11.4,0-17.2,0-2.5-1.2-3.8-3.1-3.8-2,0-3.1,1.3-3.1,3.8,0,7.4,0,14.9,0,22.3,0,2.8,1.1,3.9,4,3.9,3.6,0,7.3,0,10.9,0,2.5,0,3.8-1.1,3.9-3,0-2-1.3-3.2-3.9-3.2-2.8,0-5.5,0-8.6,0ZM87.7,89.8c0-4,0-7.9,0-11.9,0-2.5-.9-3.2-3.2-3.2-2.2,0-3,1.1-3,3.2,0,7.8,0,15.7,0,23.5,0,2.5.8,3.3,3.1,3.3,2.3,0,3.1-.7,3.1-3.3,0-3.9,0-7.7,0-11.6Z"
                                    style="fill: #fff; stroke-width: 0px;" />
                                <path
                                    d="M110.6,92.2c0-4.9,0-9.2,0-13.4,0-2.6,1.1-4,3.2-3.9,2,0,3,1.3,3,3.9,0,7.4,0,14.7,0,22.1,0,1.7-.4,3.1-2.1,3.7-1.8.6-2.9-.3-3.9-1.6-3.9-5-7.8-10-12.1-15,0,2.5,0,5,0,7.5,0,1.9,0,3.9,0,5.8,0,2.2-1.2,3.5-3.1,3.5-1.9,0-3.1-1.3-3.1-3.6,0-7.5,0-15,0-22.6,0-1.6.4-3,2-3.6,1.7-.6,3,.1,4,1.5,3.5,4.6,7.1,9.2,10.6,13.8.4.5.8.9,1.6,1.9Z"
                                    style="stroke-width: 0px;" />
                                <path
                                    d="M128,92.9v5.6c2.8,0,5.5,0,8.3,0,2.7,0,4.1,1.1,4.1,3.1,0,2-1.4,3.2-4.2,3.2-3.6,0-7.1,0-10.7,0-2.8,0-3.9-1-3.9-3.7,0-7.5,0-15,0-22.6,0-2.6,1.1-3.6,3.8-3.7,3.8,0,7.6,0,11.4,0,2.3,0,3.6,1.2,3.7,3,0,1.9-1.4,3.2-3.7,3.2-2.8,0-5.7,0-8.7,0v5.6c2.7,0,5.5,0,8.2,0,2.6,0,4.1,1.1,4.2,3,0,2-1.5,3.2-4.2,3.3-2.7,0-5.4,0-8.2,0Z"
                                    style="stroke-width: 0px;" />
                                <path
                                    d="M65.8,98.5c3.1,0,5.8,0,8.6,0,2.6,0,4,1.2,3.9,3.2,0,1.9-1.5,3-3.9,3-3.6,0-7.3,0-10.9,0-2.9,0-4-1.1-4-3.9,0-7.4,0-14.9,0-22.3,0-2.4,1.2-3.8,3.1-3.8,2,0,3.1,1.3,3.1,3.8,0,5.7,0,11.4,0,17.2,0,.8,0,1.6,0,2.7Z"
                                    style="stroke-width: 0px;" />
                                <path
                                    d="M87.7,89.8c0,3.9,0,7.7,0,11.6,0,2.6-.8,3.3-3.1,3.3-2.3,0-3.1-.8-3.1-3.3,0-7.8,0-15.7,0-23.5,0-2.1.9-3.2,3-3.2,2.4,0,3.2.7,3.2,3.2,0,4,0,7.9,0,11.9Z"
                                    style="stroke-width: 0px;" />
                            </svg>
                            LINE:{{$Data['user']->line}}
                        </div>
                        <div class="col-md-3">
                            <i class="bi bi-facebook o-socialIcon"></i>
                            FB: @if(!is_null($Data['user']->fb)) <a href="{{$Data['user']->fb}}"
                                class="text-black text-decoration-none" target="_blank">
                                {{ parse_url($Data['user']->fb, PHP_URL_PATH)}} </a> @else @endif</div>
                        <div class="col-md-3">
                            <i class="bi bi-instagram o-socialIcon"></i>
                            IG: @if(!is_null($Data['user']->ig)) <a href="{{$Data['user']->ig}}"
                                class="text-black text-decoration-none" target="_blank">
                                {{ parse_url($Data['user']->ig, PHP_URL_PATH)}} </a> @else @endif</div>

                        <div class="col-md-3">
                            <i class="bi bi-linkedin o-socialIcon"></i>
                        </div>
                    </div>
                </div>
                <div class="l-introduction__detailContent col-md-12">
                    <h3 class="o-subTitle">與我聯繫</h3>
                    <div>
                        <p>
                            <i class="bi bi-envelope-fill"></i>
                            電子郵件：{{$Data['user']->email}}</p>
                        <p>
                            <i class="bi bi-telephone-fill"></i>
                            手機號碼：{{$Data['user']->phone}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- my article -->
    <div class="mt-5">
        <!-- detail section -->
        <!-- posts cards -->
        <h2 class="l-introduction__title">我的文章</h2>
        <div class="container">
            <div class="l-introduction__myArticle row">
                @if(!is_null($Data['user']->post))
                @foreach($Data['user']->post as $count => $post)
                @if($count < 4)
                <div class="col-md-6">
                    <div class="c-articleCard l-introduction__moreArticle">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-md-3">
                                    <!-- Post images -->
                                    <div class="c-articleCard__postThumbnail">
                                        <!-- post img -->
                                        @if(is_null($post->image_path))
                                        <span class="c-articleCard__postThumbnail__postPhoto"
                                            style="background-image: url('{{asset('uploads/images/default_avatar.png')}}') ;">&nbsp;</span>
                                        @else
                                        <span class="c-articleCard__postThumbnail__postPhoto"
                                            style="background-image: url('/uploads/{{$post->image_path}}');">&nbsp;</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <!-- Post Contents -->
                                    <div class="c-articleCard__postInfo">
                                        <!-- tags -->
                                        <div>
                                            @forelse($post->category as $count => $cate)
                                            @if($count < 3) <a
                                                href="{{route('study-abroad', ['category_id' => $cate->postCategory->id])}}"
                                                class="o-tag">
                                                {{$cate->postCategory->name}}
                                                </a>
                                                @endif
                                                @empty
                                                @endforelse
                                        </div>
                                        <!-- title -->
                                        <a class="c-articleCard__title"
                                            href="{{route('article', $post->id)}}">{{ $post->title }}</a>
                                        <!-- content -->
                                        <p class="c-articleCard__content">{!!
                                            \Illuminate\Support\Str::limit(strip_tags($post->body)) !!}</p>
                                        <a class="o-readMore" href="{{route('article', $post->id)}}">...閱讀更多</a>
                                        <hr>
                                        <!-- reacts -->
                                        <div class="o-react w-100 p-3">
                                            @if(auth()->check())
                                            <i class="bi bi-heart" style="
                                        color: @if(auth()->user()->likePost->where('post_id', $post->id)->count()==1) red @else black @endif ;
                                        " data-id="{{$post->id}}">
                                                <span>
                                                    {{$post->likePost->count()}}
                                                </span>
                                            </i>
                                            <i class="bi bi-bookmark" style="
                                        color: @if(auth()->user()->collectPost->where('post_id', $post->id)->count()==1) red @else black @endif ;
                                        " data-id="{{$post->id}}">
                                                <span>
                                                    {{$post->collectPost->count()}}
                                                </span>
                                            </i>
                                            @else
                                            <i class="bi bi-heart" style="color: black;" data-id="{{$post->id}}">
                                                <span>
                                                    {{$post->likePost->count()}}
                                                </span>
                                            </i>
                                            <i class="bi bi-bookmark" style="color: black;" data-id="{{$post->id}}">
                                                <span>
                                                    {{$post->collectPost->count()}}
                                                </span>
                                            </i>
                                            @endif
                                            <!-- date -->
                                            <p class="c-articleCard__date">發表日期：{{ $post->created_at->format('Y/m/d') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            @endif
            @endforeach
            @endif
            <a class="o-readMore" href="{{route('article-list', $Data['user']->id)}}">查看更多文章</a>
        </div>
    </div>
    <h2 class="l-introduction__title">參考文件</h2>
    <!-- attachments -->
     <div class="l-introduction__reference">
     <div class="row">
        <!-- files -->
        @forelse($Data['user']->references as $reference)
        <div class="col-md-1 p-1">
            <a class="o-reference" href="{{route('reference-download', $reference->id)}}">
                <svg viewBox="0 0 300 300">
                    <path fill="#C39FC0" d="M265.4,300H34.6C15.5,300,0,284.5,0,265.4V34.6C0,15.5,15.5,0,34.6,0h230.8C284.5,0,300,15.5,300,34.6v230.8
                                            C300,284.5,284.5,300,265.4,300z" />
                    <path fill="#FFFFFF" d="M262.1,284H37.9C25.2,284,15,273.8,15,261.1V82.9C15,70.2,25.2,60,37.9,60h224.3c12.6,0,22.9,10.2,22.9,22.9
                                            v178.3C285,273.8,274.8,284,262.1,284z" />
                    <g>
                        <path fill="#5E4A81"
                            d="M127.9,249.5c-1.7,0-3.3,0-5,0c0-1.2-0.9-2.1-1.4-3c-9-16.8-20.7-32.2-27.1-50.4c0-1.2,0-2.5,0-3.7
                                                c1.5-4.5,2.7-9.1,5.2-13.3c7.6-13,15-26,22.6-39.1c0.7-1.4,1.7-2.3,3.3-2.4c0.6,0.9,1.7,1.2,2.5,1.7c5.4,3,10.9,6,16.2,9.1
                                                c4.5,2.7,4.4,3.2,1.7,7.8c-1.7,2.8-4.3,5.2-4.4,8.7c-2.9,4.2-5.7,8.3-7.5,13.1c-0.7,0.1-1.2,0.5-1,1.2c0.4,1.1,1.4,1.2,2.3,1.2
                                                c7.2,0,14.5,0.6,21.6-0.4c4.7-0.6,9.1-0.6,13.7-0.8c2.8-0.1,3.9,1.2,3.9,3.9c-0.1,6.2,0,12.4,0,18.6c0,1.2-0.2,2.5,0.6,3.6
                                                c-0.4,2.3-2.1,2.8-4.2,2.8c-6.1-0.1-12.2-0.1-18.3,0c-5.2,0.1-10.3,0.1-15.5,0.2c-2.5,0-3,1.3-2.1,3.4c0.4,1.1,1,2.1,1.6,3
                                                c3.5,6.1,7,12.2,10.5,18.2c1.4,2.4,1.1,4.2-1.4,5.7c-4.7,2.5-9.2,5.5-14,7.9C130.3,247.3,128.6,247.8,127.9,249.5z" />
                        <path fill="#FEFEFE" d="M127.9,249.5c0.7-1.7,2.4-2.2,3.8-2.9c4.8-2.4,9.3-5.3,14-7.9c2.5-1.4,2.8-3.3,1.4-5.7
                                                c-3.5-6.1-7-12.2-10.5-18.2c-0.6-1-1.1-2-1.6-3c-0.9-2.1-0.4-3.4,2.1-3.4c5.2-0.1,10.3-0.2,15.5-0.2c6.1-0.1,12.2-0.1,18.3,0
                                                c2.1,0,3.7-0.5,4.2-2.8c2.7-0.7,3.9-3,5.1-5.1c7-11.9,13.4-24.2,20.3-36.1c5-8.7,4.9-18-0.1-26.9c-3.9-6.9-8-13.7-12-20.6
                                                c-4.4-7.3-8.2-15-13.3-21.9c9.3,0,18.6,0.1,28-0.1c1.6,0,1.9,0.4,1.9,1.9c-0.1,50.3-0.1,100.6,0.1,150.9c0,2.1-0.9,1.9-2.2,1.9
                                                C177.8,249.5,152.8,249.5,127.9,249.5z" />
                        <path fill="#C39FC0" d="M175,94.9c5.1,6.9,8.9,14.5,13.3,21.9c4,6.8,8.1,13.6,12,20.6c5,8.9,5.2,18.2,0.1,26.9
                                                c-7,11.9-13.4,24.2-20.3,36.1c-1.2,2.1-2.4,4.4-5.1,5.1c-0.8-1.1-0.6-2.4-0.6-3.6c0-6.2-0.1-12.4,0-18.6c0-2.7-1.1-4-3.9-3.9
                                                c-4.6,0.2-9.1,0.1-13.7,0.8c-7.1,1-14.4,0.4-21.6,0.4c-0.9,0-1.9-0.2-2.3-1.2c-0.2-0.7,0.2-1.1,1-1.2c0.9,0.6,1.9,0.9,2.9,0.9
                                                c6.9-0.1,13.9-0.1,20.8-0.1c1.6,0,2.4-0.7,3-2.1c1.1-2.4,2.3-4.7,3.5-6.9c2.2-3.9,1.7-4.7-2.6-4.7c-6.7-0.1-13.4-0.1-20.1-0.2
                                                c0.1-3.6,2.7-6,4.4-8.7c2.7-4.6,2.9-5-1.7-7.8c-5.3-3.2-10.8-6.1-16.2-9.1c-0.9-0.5-1.9-0.8-2.5-1.7c1.1-1.1,2.4-1,3.8-1
                                                c10.3-0.1,20.7,0,31-0.1c4.5-0.1,4.8-0.9,2.7-4.9c-3.5-6.8-7.5-13.4-11.4-19.9c-1.2-2.1-0.9-3.7,1.2-4.9c2.5-1.4,5-2.9,7.5-4.4
                                                c3.9-2.4,8.3-4.2,11.7-7.4C173,94.9,174.1,94.9,175,94.9z" />
                        <path fill="#FEFEFE" d="M171.9,94.9c-3.4,3.2-7.8,5-11.7,7.4c-2.5,1.5-5,3-7.5,4.4c-2.1,1.2-2.5,2.9-1.2,4.9
                                                c3.9,6.5,7.8,13.1,11.4,19.9c2.1,3.9,1.8,4.8-2.7,4.9c-10.3,0.1-20.7,0.1-31,0.1c-1.4,0-2.7-0.1-3.8,1c-1.6,0.1-2.5,1.1-3.3,2.4
                                                c-7.5,13.1-14.9,26.1-22.6,39.1c-2.5,4.2-3.7,8.8-5.2,13.3c0-31.7,0-63.5-0.1-95.1c0-1.9,0.4-2.4,2.4-2.4
                                                C121.8,94.9,146.9,94.9,171.9,94.9z" />
                        <path fill="#FEFEFE" d="M94.4,196.1c6.5,18.2,18.1,33.6,27.1,50.4c0.5,1,1.4,1.8,1.4,3c-8.9,0-17.8-0.1-26.7,0.1
                                                c-1.6,0-1.9-0.4-1.9-1.9C94.4,230.5,94.4,213.3,94.4,196.1z" />
                        <path fill="#FEFEFE"
                            d="M141.4,165c6.7,0.1,13.4,0.1,20.1,0.2c4.4,0.1,4.8,0.9,2.6,4.7c-1.2,2.2-2.5,4.5-3.5,6.9
                                                c-0.6,1.4-1.4,2.1-3,2.1c-6.9,0-13.9,0.1-20.8,0.1c-1.1,0-2.1-0.2-2.9-0.9C135.7,173.3,138.6,169.1,141.4,165z" />
                    </g>
                    <text transform="matrix(1 0 0 1 54.6553 41.3376)" fill="white"
                        font-size="25px">{{pathinfo($reference->file_name)['basename']}}</text>
                    <rect x="21" y="21" fill="#FFFFFF" width="26" height="26" />
                    <circle fill="#FFFFFF" cx="266" cy="15" r="6" />
                    <circle fill="#FFFFFF" cx="266" cy="30.5" r="6" />
                    <circle fill="#FFFFFF" cx="266" cy="46" r="6" />
                </svg>
            </a>
        </div>
        @empty
        <div>
            尚無參考文件下載
        </div>
        @endforelse
    </div>
     </div>
    <hr>
    <!-- real carsuel -->
    <div class="carouselSection">
        <div class="o-swiperCustom">
            <div class="swiper studentSwiper">
                <div class="swiper-wrapper">
                    @foreach ($Data['vip'] as $key => $user)
                    <div class="c-studentCardSwiper swiper-slide" onclick="cardClickable({{ $user->id }})">
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
                            <polygon class="cls-1" points="329.5 170 0 170 0 0 330 45.1 329.5 170" />
                        </svg>
                        <!-- school img -->
                        <span class="c-studentCardSwiper_schoolImg"
                            style="background-image: url('{{asset('university/USA/US1.png')}}') ;">&nbsp;</span>
                        <!-- name card -->
                        <h4 class="c-studentCardSwiper_userName">
                            {{ ($user->name) ? \Illuminate\Support\Str::limit($user->name,10): "" }}
                        </h4>
                        <!-- school english -->
                        <h5 class="c-studentCardSwiper_schoolEnglish">
                            {{ !is_null($user->universityItem) ? \Illuminate\Support\Str::limit($user->universityItem->english_name, 15) : '' }}
                        </h5>
                        <!-- school chinese -->
                        <h6 class="c-studentCardSwiper_schoolChinese">
                            {{ !is_null($user->universityItem) ? \Illuminate\Support\Str::limit($user->universityItem->chinese_name, 10) : '' }}
                        </h6>
                        <!-- react icons -->
                        <div class="c-studentCardSwiper_react" onclick="event.stopPropagation(); return false; ">
                            @if(auth()->check())
                            <i class="bi bi-heart" style="
                                    color:@if($user->likedUser->where('uid', auth()->user()->id)->where('user_id', $user->id)->count() == 1) red @else black @endif
                                    " data-id="{{$user->id}}">
                                <span class="text-black">{{$user->likedUser->count()}}</span>
                            </i>
                            <i class="bi bi-bookmark" data-id="{{$user->id}}" style="
                                    color:  @if($user->collectedUser->where('uid', auth()->user()->id)->where('user_id', $user->id)->count() == 1) red @else black @endif
                                    ">
                                <span class="text-black">{{$user->collectedUser->count()}}</span>
                            </i>
                            @else
                            <i class="bi bi-heart" style="color: black;" data-id="{{$user->id}}">
                                <span class="text-black">{{$user->likedUser->count()}}</span>
                            </i>
                            <i class="bi bi-bookmark" data-id="{{$user->id}}">
                                <span class="text-black">{{$user->collectedUser->count()}}</span>
                            </i>
                            @endif
                        </div>
                        <!-- post tag -->
                        <div class="c-studentCardSwiper_postTag">
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
                <div class="studentPagi paginationCustom"></div>
                <a class="o-readMore" href="/senior">查看更多 &gt;</a>
            </div>
        </div>
    </div>
</div>




<script>
    $(document).ready(function () {
        $(".adjOnIntroduction").removeClass("px-5");
        $(".adjOnIntroduction").css("padding", "0");
    });
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
    })

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

    })
</script>
@endsection