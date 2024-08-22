@extends('layouts.guest2')

@section('content')

<!-- breadcrumb -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="c-breadcrumbs">
                <h4>
                    <a class="c-breadcrumbs__prePage" href="{{url('/')}}">首頁</a>
                    >
                    <a class="c-breadcrumbs__prePage" href="{{route('get-introduction', $Data['user']->id)}}">
                        {{$Data['user']->nickname}}
                    </a>
                    >
                    <a class="c-breadcrumbs__prePage" href="{{route('get-introduction', $Data['user']->id)}}">
                        {{$Data['user']->nickname}}的文章
                    </a>
                </h4>
                <h3 class="c-breadcrumbs__currentPage">{{$Data['user']->nickname}}的文章</h3>
            </div>
        </div>
    </div>
</div>

<!-- user info section -->
<div class="container p-2 p-md-5">
    <div class="l-articleList__authorCard">
        <div class="row">
            <!-- author info -->
            <div class="col-12 col-md-8">
                <div class="l-articleList__authorInfo">
                    <div class="row">
                        <!-- author img -->
                        <div class="col-4 col-md-3 p-0 p-md-5">
                            @if(is_null($Data['user']->avatar))
                            <span class="l-articleList__authorImg"
                                style="background-image: url('{{asset('uploads/images/default_avatar.png')}}') ;">&nbsp;</span>
                            @else
                            <span class="l-articleList__authorImg"
                                style="background-image: url('{{asset('uploads/'.$Data['user']->avatar)}}') ;">&nbsp;</span>
                            @endif
                        </div>
                        <!-- author details -->
                        <div class="col-8 col-md-6 align-content-center">
                            <div class="container">
                                <div class="row">
                                    <!-- author name -->
                                    <div class="col-12 col-md-12">
                                        <h2 class="o-whiteTitle">{{$Data['user']->nickname}}</h2>
                                    </div>
                                    <!-- school img -->
                                    <div class="col-5 col-md-2 p-2">
                                        <span class="l-articleList__schoolImg"
                                            style="background-image: url('{{asset('university/USA/US1.png')}}') ;">&nbsp;</span>
                                    </div>
                                    <!-- school name -->
                                    <div class="col-7 col-md-10">
                                        <div class="l-articleList__schoolNames">
                                            <h5 class="o-smallWhiteTitle">
                                                {{!is_null($Data['user']->universityItem) ? $Data['user']->universityItem->english_name:''}}
                                            </h5>
                                            <h5 class="o-smallWhiteTitle">
                                                {{!is_null($Data['user']->universityItem) ? $Data['user']->universityItem->chinese_name:''}}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <!-- tags -->
                                <div class="row">
                                    @if(!is_null($Data['user']->postCategory))
                                    @foreach($Data['user']->postCategory as $theme)
                                    <div class="col-md-4">
                                        <a class="o-tag"
                                            href="{{route('study-abroad', ['category_id' => $theme->postCategory->id])}}">
                                            {{$theme->postCategory->name}}
                                        </a>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- author skill -->
            <div class="col-3 col-md-4 l-articleList__tag">
                <!-- skill tags -->
                <div class="container h-100 w-75">
                    <div class="row h-100 align-items-center">
                        @if(!is_null($Data['user']->skills))
                        @foreach($Data['user']->skills->slice(0, 6) as $skill)
                        <div class="col-md-6">
                            <span class="o-whiteBtn">
                                {{$skill->skill->name}}
                            </span>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- posts section -->

<!-- post cards -->
<div class="container p-3 p-md-5">
    <div class="row">
        <div class="col-md-12">
                <h2 class="o-normalTitle pl-3 pl-md-2">{{$Data['user']->nickname}}的文章</h2>
        </div>
        @if($Data['posts']->total())
        @foreach($Data['posts'] as $post)
        <div class="l-articleList__card col-md-6 p-0">
            <div class="c-articleCard">
                <div class="container">
                    <div class="row align-items-center p-2 p-md-0">
                        <div class="col-4 col-md-3 p-0">
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
                        <div class="col-8 col-md-9">
                            <!-- Post Contents -->
                            <div class="c-articleCard__postInfo">
                                <!-- title -->
                                <a class="c-articleCard__title"
                                    href="{{route('article', $post->id)}}">{{ $post->title }}</a>
                                <!-- content -->
                                <p class="c-articleCard__content">
                                    {{!is_null(strip_tags($post->body)) ? \Illuminate\Support\Str::limit(strip_tags($post->body), 35): ''}}
                                </p>
                                <a class="o-readMore" href="{{route('article', $post->id)}}">...閱讀更多</a>
                                <hr>
                                <!-- reacts -->
                                <div class="o-react w-100 pb-2 pr-2">
                                    @if(auth()->check())
                                    <i class="bi @if(auth()->user()->likePost->where('post_id', $post->id)->count()==1) bi-heart-fill @else bi-heart @endif like-post" style="
                                    color: @if(auth()->user()->likePost->where('post_id', $post->id)->count()==1) red @else black @endif ;
                                    " data-id="{{$post->id}}">
                                        <span>
                                            {{$post->likePost->count()}}
                                        </span>
                                    </i>
                                    <i class="bi @if(auth()->user()->collectPost->where('post_id', $post->id)->count()==1) bi-bookmark-fill @else bi-bookmark @endif  collect-post" style="
                                    color: @if(auth()->user()->collectPost->where('post_id', $post->id)->count()==1) red @else black @endif ;
                                    " data-id="{{$post->id}}">
                                        <span>
                                            {{$post->collectPost->count()}}
                                        </span>
                                    </i>
                                    @else
                                    <i class="bi bi-heart like-post" data-id="{{$post->id}}">
                                        <span>
                                            {{$post->likePost->count()}}
                                        </span>
                                    </i>
                                    <i class="bi bi-bookmark collect-post" data-id="{{$post->id}}">
                                        <span>
                                            {{$post->collectPost->count()}}
                                        </span>
                                    </i>
                                    @endif
                                    <!-- date -->
                                    <p class="c-articleCard__date">發表日期：{{ $post->created_at->format('Y/m/d') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="col-md-12">
            <p>
                目前尚未發表文章
            </p>
        </div>
        @endif
    </div>
</div>
<!-- pagination -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div>
                {{$Data['posts']->appends($_GET)->links('vendor.pagination.bootstrap-4')}}
            </div>
        </div>
    </div>
</div>
@endsection

@section('page_js')
    <script>
        $('.like-post').click(function () {
            let that = $(this);
            $.ajax({
                url: "{{url('like-post')}}" + "/" + $(this).data('id'),
                method: 'GET',
                success: function (res) {
                    if (res.operator === 'no') {
                        alert(res.message);
                    } else if (res.operator === 'add') {
                        that.removeClass('bi-heart').removeClass('bi-heart-fill').addClass('bi-heart-fill').css('color', 'red').children('span').text(res.total);
                    } else if (res.operator === 'reduce') {
                        that.removeClass('bi-heart').removeClass('bi-heart-fill').addClass('bi-heart').css('color', 'black').children('span').text(res.total);
                    }
                },
                error: function (error) {
                    console.log(error)
                }
            });
        });

        $('.collect-post').click(function () {
            let that = $(this);
            $.ajax({
                url: "{{url('collect-post')}}" + "/" + $(this).data('id'),
                method: 'GET',
                success: function (res) {
                    if (res.operator === 'no') {
                        alert(res.message);
                    } else if (res.operator === 'add') {
                        that.removeClass('bi-bookmark').removeClass('bi-bookmark-fill').addClass('bi-bookmark-fill').css('color', 'red').children('span').text(res.total);
                    } else if (res.operator === 'reduce') {
                        that.removeClass('bi-bookmark').removeClass('bi-bookmark-fill').addClass('bi-bookmark').css('color', 'black').children('span').text(res.total);
                    }
                },
                error: function (error) {
                    console.log(error)
                }
            });
        });
    </script>
@endsection