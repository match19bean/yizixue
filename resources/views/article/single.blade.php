@extends('layouts.guest2')

@section('content')
<div class="m-0 l-singleArticle">
    <div class="container l-singleArticle__main p-5">
        <div class="row">
            <!-- breadcrumb -->
            <div class="c-breadcrumbs">
                <h4>
                    <a class="c-breadcrumbs__prePage" href="{{url('/')}}">首頁</a>
                    >
                    <a class="c-breadcrumbs__prePage"
                        href="{{route('study-abroad', ['category_id' => $Data['article']->category->first()->postCategory->id])}}">
                        {{$Data['article']->category->first()->postCategory->name}}
                    </a>
                    >
                    <a class="c-breadcrumbs__prePage"
                        href="{{route('study-abroad', ['category_id' => $Data['article']->category->first()->postCategory->id])}}">
                        {{ !is_null($Data['article']->title) ? \Illuminate\Support\Str::limit($Data['article']->title, 15) : '' }}
                    </a>
                </h4>
                <h3 class="c-breadcrumbs__currentPage">{{$Data['article']->title}}</h3>
            </div>
            <!-- post content -->
            <div class="container">
                <div class="row">
                    <!-- main article -->
                    <div class="col-md-9">
                        <!-- article -->
                        <div class="l-singleArticle__contentDiv">
                            <!-- p date -->
                            <p class="text-right">發布日期{{$Data['article']->created_at->format('Y/m/d')}}</p>
                            <!-- main pic -->
                            <div class="l-singleArticle__postPic"
                                style="background-image: url('{{asset('uploads/'.$Data['article']->image_path)}}');">
                            </div>
                            <!-- content -->
                            <p>
                                {!! $Data['article']->body !!}
                            </p>
                            <div class="row">
                                <!-- categorys -->
                                <div class="col-md-9">
                                    @if(!is_null($Data['article']->category))
                                    @foreach($Data['article']->category as $category)
                                    <a class="o-tag"
                                        href="{{route('study-abroad', ['category_id' => $category->postCategory->id])}}">
                                        {{$category->postCategory->name}}
                                    </a>
                                    @endforeach
                                    @endif
                                </div>
                                <!-- social icons -->
                                <div class="col-md-3">
                                    <div class="o-react">
                                        @if(auth()->check())
                                        <i class="bi @if(auth()->user()->likePost->where('post_id', $Data['article']->id)->count() == 1) bi-heart-fill @else bi-heart @endif u-cursor-pointer like-post"
                                            style="color:@if(auth()->user()->likePost->where('post_id', $Data['article']->id)->count() == 1) red @else black @endif ;margin:5px"
                                            data-id="{{$Data['article']->id}}">
                                            <span>{{$Data['article']->likePost->count()}}</span>
                                        </i>
                                        <i class="bi @if(auth()->user()->collectPost->where('post_id', $Data['article']->id)->count() == 1) bi-bookmark-fill @else bi-bookmark @endif u-cursor-pointer collect-post"
                                            style="color: @if(auth()->user()->collectPost->where('post_id', $Data['article']->id)->count() == 1) red @else black @endif ;margin:5px"
                                            data-id="{{$Data['article']->id}}">
                                            <span>{{$Data['article']->collectPost->count()}}</span>
                                        </i>
                                        @else
                                        <i class="bi bi-heart like-post u-cursor-pointer" style=" color:black; margin:5px"
                                            data-id="{{$Data['article']->id}}">
                                            <span>{{$Data['article']->likePost->count()}}</span>
                                        </i>
                                        <i class="bi bi-bookmark collect-post u-cursor-pointer" style=" color:black; margin:5px"
                                            data-id="{{$Data['article']->id}}">
                                            <span>{{$Data['article']->collectPost->count()}}</span>
                                        </i>
                                        @endif
                                            <a href="https://social-plugins.line.me/lineit/share?url={{route('article', ['id' => $Data['article']->id])}}" class="text-none" target="_blank">
                                                <i class="bi bi-share u-cursor-pointer" style=" color:black; margin:5px"></i>
                                            </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- right section about aurthor -->
                    <div class="col-md-3">
                        <div class="l-singleArticle__rightDiv">
                            <h2>文章作者</h2>
                            <!-- new student card -->
                            <div class="c-studentCard" onclick="cardClickable({{ $Data['article']->author->id }})">
                                <!-- img div -->
                                <span class="c-studentCard_studentImg"
                                    style="background-image: url('{{asset('uploads/'.$Data['article']->author->avatar)}}');">&nbsp;</span>
                                <!-- background -->
                                <svg class="c-studentCard_bg" viewBox="0 0 330 170">
                                    <polygon class="cls-1" points="329.5 170 0 170 0 0 330 45.1 329.5 170" />
                                </svg>
                                <!-- school img -->
                                <span class="c-studentCard_schoolImg"
                                    style="background-image: url('{{asset('university/USA/US1.png')}}') ;">&nbsp;</span>
                                <!-- name card -->
                                <h4 class="c-studentCard_userName">
                                    {{ ($Data['article']->author->nickname) ? \Illuminate\Support\Str::limit($Data['article']->author->nickname,8): "" }}
                                </h4>
                                <!-- school english -->
                                <h5 class="c-studentCard_schoolEnglish">
                                    {{ !is_null($Data['article']->author->universityItem) ? $Data['article']->author->universityItem->english_name: '' }}
                                </h5>
                                <!-- school chinese -->
                                <h6 class="c-studentCard_schoolChinese">
                                    {{ !is_null($Data['article']->author->universityItem) ? $Data['article']->author->universityItem->chinese_name: '' }}
                                </h6>
                                <!-- react icons -->
                                <div class="c-studentCard_react" onclick="event.stopPropagation(); return false; ">
                                    @if(auth()->check())
                                        <i class="bi @if($Data['article']->author->likedUser->where('uid', auth()->user()->id)->where('user_id', $Data['article']->author->id)->count() == 1) bi-heart-fill @else bi-heart @endif u-cursor-pointer like-user" style="
                                    color: @if($Data['article']->author->likedUser->where('uid', auth()->user()->id)->where('user_id', $Data['article']->author->id)->count() == 1) red @else black @endif ;
                                    " data-id="{{$Data['article']->author->id}}">
                                            <span>{{$Data['article']->author->likedUser->count()}}</span>
                                        </i>
                                        <i class="bi @if($Data['article']->author->collectedUser->where('uid', auth()->user()->id)->where('user_id', $Data['article']->author->id)->count() == 1) bi-bookmark-fill @else bi-bookmark @endif u-cursor-pointer collect-user" style="
                                    color: @if($Data['article']->author->collectedUser->where('uid', auth()->user()->id)->where('user_id', $Data['article']->author->id)->count() == 1) red @else black @endif ;
                                    " data-id="{{$Data['article']->author->id}}">
                                            <span>{{$Data['article']->author->collectedUser->count()}}</span>
                                        </i>
                                    @else
                                        <i class="bi bi-heart like-user u-cursor-pointer" style="color:black;">
                                            <span>{{$Data['article']->author->likedUser->count()}}</span>
                                        </i>
                                        <i class="bi bi-bookmark collect-user u-cursor-pointer" style="color: black;">
                                            <span>{{$Data['article']->author->collectedUser->count()}}</span>
                                        </i>
                                    @endif
                                </div>
                                <!-- post tag -->
                                <div class="c-studentCard_postTag">
                                    @if(!is_null($Data['article']->author->postCategory))
                                    @foreach($Data['article']->author->postCategory as $count => $postCategory)
                                    @if($count < 3) <a>
                                        {{$postCategory->postCategory->name}}
                                        </a>
                                        @endif
                                        @endforeach
                                        @endif
                                </div>
                            </div>
                            <hr>
                            <h2 class="mt-5">作者的熱門文章</h2>
                            <!-- author article -->
                            <div>
                                @if(!is_null($Data['article']->author->post))
                                @foreach($Data['article']->author->post as $post)
                                <a class="l-singleArticle__authorMore" href="{{ route('article', $post->id) }}">
                                    <div class="row mt-5">
                                        <div class="col-md-3 p-2">
                                            <div class="l-singleArticle__morePic"
                                                style="background-image: url('{{ asset('uploads'.$post->image_path)  }}') ;">
                                                &nbsp;
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="l-singleArticle__moreMeta">
                                                <h3>
                                                    {{ \Illuminate\Support\Str::limit($post->title, 15, '...') }}
                                                </h3>
                                                <p>
                                                    {{ \Illuminate\Support\Str::limit(strip_tags($post->body), 40) }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <hr>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- more articles -->
        <div class="row">
            <h2 class="l-singleArticle__title">您可能感興趣的文章</h2>
            <div class="container">
                <div class="row">
                    @if(!is_null($Data['article']->author->post))
                    @foreach($Data['article']->author->post as $post)
                    <div class="col-md-6">
                        <div class="c-articleCard">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
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
                                            <div class="c-articleCard__postThumbnail__userInfo">
                                                <!-- user img -->
                                                @if(is_null($post->image_path))
                                                <span
                                                    style="background-image: url('{{asset('uploads/images/default_avatar.png')}}') ;">&nbsp;</span>
                                                @else
                                                <span
                                                    style="background-image: url('/uploads/{{$post->author->avatar}}');">&nbsp;</span>
                                                @endif
                                                <!-- namecard -->
                                                <a href="{{route('get-introduction', $post->author->id)}}">
                                                    {{ !is_null($post->author->nickname) ? \Illuminate\Support\Str::limit($post->author->nickname, 8) : '' }}
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-8">
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
                                                href="{{route('article', $post->id)}}">
                                                {{ !is_null($post->title) ? \Illuminate\Support\Str::limit($post->title , 15) : '' }}
                                            </a>
                                            <!-- content -->
                                            <p class="c-articleCard__content">
                                                {{ !is_null($post->body) ? \Illuminate\Support\Str::limit($post->body , 40) : '' }}
                                            </p>
                                            <a class="o-readMore" href="{{route('article', $post->id)}}">...閱讀更多</a>
                                            <hr>
                                            <!-- reacts -->
                                            <div class="o-react w-100 p-3">
                                                @if(auth()->check())
                                                <i class="bi @if(auth()->user()->likePost->where('post_id', $post->id)->count()==1) bi-heart-fill @else bi-heart @endif u-cursor-pointer like-post" style="
                                    color: @if(auth()->user()->likePost->where('post_id', $post->id)->count()==1) red @else black @endif ;
                                    " data-id="{{$post->id}}">
                                                    <span>
                                                        {{$post->likePost->count()}}
                                                    </span>
                                                </i>
                                                <i class="bi @if(auth()->user()->collectPost->where('post_id', $post->id)->count()==1) bi-bookmark-fill @else bi-bookmark @endif u-cursor-pointer collect-post" style="
                                    color: @if(auth()->user()->collectPost->where('post_id', $post->id)->count()==1) red @else black @endif ;
                                    " data-id="{{$post->id}}">
                                                    <span>
                                                        {{$post->collectPost->count()}}
                                                    </span>
                                                </i>
                                                @else
                                                <i class="bi bi-heart like-post u-cursor-pointer" style="color: black;" data-id="{{$post->id}}">
                                                    <span>
                                                        {{$post->likePost->count()}}
                                                    </span>
                                                </i>
                                                <i class="bi bi-bookmark collect-post u-cursor-pointer" style="color: black;" data-id="{{$post->id}}">
                                                    <span>
                                                        {{$post->collectPost->count()}}
                                                    </span>
                                                </i>
                                                @endif
                                                <!-- date -->
                                                <p class="c-articleCard__date">
                                                    發表日期：{{ $post->created_at->format('Y/m/d') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_js')
        <script>
            // fix container-fluid px-5 padding
            $(document).ready(function () {
                $(".adjOnSingleArticle").removeClass("px-5");
                $(".adjOnSingleArticle").css("padding", "0");
            });
            $('.like-post').click(function () {
                let that = $(this);
                $.ajax({
                    url: "{{url('like-post/')}}" + "/" + $(this).data('id'),
                    method: 'GET',
                    success: function (res) {
                        if (res.operator === 'no') {
                            alert(res.message);
                        } else if (res.operator === 'add') {
                            that.removeClass('bi-heart').removeClass('bi-heart-fill').addClass('bi-heart-fill').css('color', 'red');
                            that.children('span').text(res.total);
                        } else if (res.operator === 'reduce') {
                            that.removeClass('bi-heart').removeClass('bi-heart-fill').addClass('bi-heart').css('color', 'black');
                            that.children('span').text(res.total);
                        }
                    },
                    error: function (error) {
                        console.log(error)
                    }
                });
            })

            $('.collect-post').click(function () {
                let that = $(this);
                $.ajax({
                    url: "{{url('collect-post/')}}" + "/" + $(this).data('id'),
                    method: 'GET',
                    success: function (res) {
                        if (res.operator === 'no') {
                            alert(res.message);
                        } else if (res.operator === 'add') {
                            that.removeClass('bi-bookmark').removeClass('bi-bookmark-fill').addClass('bi-bookmark-fill').css('color', 'red');
                            that.children('span').text(res.total);
                        } else if (res.operator === 'reduce') {
                            that.removeClass('bi-bookmark').removeClass('bi-bookmark-fill').addClass('bi-bookmark').css('color', 'black');
                            that.children('span').text(res.total);
                        }
                    },
                    error: function (error) {
                        console.log(error)
                    }
                });

            })

            $('.like-user').click(function () {
                let that = $(this);
                $.ajax({
                    url: "{{url('like-user')}}" + "/" + $(this).data('id'),
                    method: 'GET',
                    success: function (res) {
                        if (res.operator === 'no') {
                            alert(res.message);
                        } else if (res.operator === 'add') {
                            that.removeClass('bi-heart').removeClass('bi-heart-fill').addClass('bi-heart-fill').css('color', 'red');
                            that.children('span').text(res.total);
                        } else if (res.operator === 'reduce') {
                            that.removeClass('bi-heart').removeClass('bi-heart-fill').addClass('bi-heart').css('color', 'black');
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
                    url: "{{url('collect-user')}}" + "/" + $(this).data('id'),
                    method: 'GET',
                    success: function (res) {
                        if (res.operator === 'no') {
                            alert(res.message);
                        } else if (res.operator === 'add') {
                            that.removeClass('bi-bookmark').removeClass('bi-bookmark-fill').addClass('bi-bookmark-fill').css('color', 'red');
                            that.children('span').text(res.total);
                        } else if (res.operator === 'reduce') {
                            that.removeClass('bi-bookmark').removeClass('bi-bookmark-fill').addClass('bi-bookmark').css('color', 'black');
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