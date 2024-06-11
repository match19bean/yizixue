@extends('layouts.guest2')

@section('content')

<div class="articleList-breadcrumbs">
    <h4 class="mt-3 text-black">
        <a href="{{url('/')}}" class="text-decoration-none text-black">首頁</a>
        >
        <a class="text-decoration-none text-black" href="{{route('get-introduction', $Data['user']->id)}}">
            {{$Data['user']->name}}的文章
        </a>
    </h4>
</div>

<div class="articleList">
    <!-- user info section -->
    <div class="authorInfo">
        <div class="text-center text-white leftSide">
            <div class="authorImg">
                @if(is_null($Data['user']->avatar))
                <span style="background-image: url('{{asset('uploads/images/default_avatar.png')}}') ;">&nbsp;</span>
                @else
                <span style="background-image: url('{{asset('uploads/'.$Data['user']->avatar)}}') ;">&nbsp;</span>
                @endif
            </div>
            <div class="d-flex flex-column justify-content-between h-100">
                <h2 class="text-start">{{$Data['user']->name}}</h2>
                <div class="schoolInfo d-flex flex-row">
                    <span style="background-image: url('{{asset('university/USA/US1.png')}}') ;">&nbsp;</span>
                    <div class="d-flex flex-column align-items-start justify-content-center">
                        <h5>{{!is_null($Data['user']->universityItem) ? $Data['user']->universityItem->english_name:''}}
                        </h5>
                        <h5>{{!is_null($Data['user']->universityItem) ? $Data['user']->universityItem->chinese_name:''}}
                        </h5>
                    </div>
                </div>
                <!-- tags -->
                @if(!is_null($Data['user']->postCategory))
                <div class="tags">
                    @foreach($Data['user']->postCategory as $theme)
                    <a href="{{route('study-abroad', ['category_id' => $theme->postCategory->id])}}">
                        {{$theme->postCategory->name}}
                    </a>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
        <div class="skillTag">
            @if(!is_null($Data['user']->skills))
            @foreach($Data['user']->skills as $skill)
            <p class="tags" style="color: #4C2A70; background-color: #ffffff">
                {{$skill->skill->name}}
            </p>
            @endforeach
            @endif
        </div>
    </div>
    <!-- posts section -->
    <div class="title">
        <h2>{{$Data['user']->name}}的文章</h2>
    </div>
    <!-- post cards -->
    <!-- from study-abroad -->
    <div class="article-list-moreArticle">
        @if($Data['posts']->total())
        @foreach($Data['posts'] as $post)
        <div class="moreArticles">
            <a href="{{route('article', $post->id)}}">
                <!-- img -->
                <div class="postPhoto" style="background-image: url('{{asset('uploads/'.$post->image_path)}}') ;">
                    &nbsp;
                </div>

                <div class="content">
                    <!-- title -->
                    <h3 class="w-100"> {{$post->title}} </h3>
                    <p class="body w-100">
                        {!! \Illuminate\Support\Str::limit(strip_tags($post->body), 30) !!}
                    </p>

                    <p class="readMore w-100">...閱讀更多</p>
                    <!-- react icons -->
                    <div class="react w-100" onclick="event.stopPropagation(); return false; ">
                        @if(auth()->check())
                        <i class="fa fa-heart" style="
                    color: @if(auth()->user()->likePost->where('post_id', $post->id)->count() == 1) red @else black @endif
                    " data-id="{{$post->id}}">
                            <span style="color:black">
                                {{$post->likePost->count()}}
                            </span>
                        </i>
                        <i class="fa fa-bookmark" style="
                    color: @if(auth()->user()->collectPost->where('post_id', $post->id)->count() == 1) red @else black @endif ;
                    " data-id="{{$post->id}}">
                            <span style="color:black">
                                {{$post->collectPost->count()}}
                            </span>
                        </i>
                        @else
                        <i class="fa fa-heart" style="color:black;" data-id="{{$post->id}}">
                            <span style="color:black">{{$post->likePost->count()}}</span>
                        </i>
                        <i class="fa fa-bookmark" style="color:black;" data-id="{{$post->id}}">
                            <span style="color:black">{{$post->collectPost->count()}}</span>
                        </i>
                        @endif
                        <p class="date">發表日期：{{  $post->created_at->format('Y/m/d')  }}</p>
                    </div>

                </div>
            </a>
        </div>
        @endforeach
        @else
        <div class="m-2 row text-center">
            <p>
                目前尚未發表文章
            </p>
        </div>
        @endif
    </div>
    <div class="pageNav">
        <div class="d-flex" style="flex-direction: row; justify-content: space-evenly; ">
            {{$Data['posts']->appends($_GET)->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
</div>
<script>
    $('.socialIcons .fa-heart').click(function () {
        let that = $(this);
        $.ajax({
            url: "{{url('like-post')}}" + "/" + $(this).data('id'),
            method: 'GET',
            success: function (res) {
                if (res.operator === 'no') {
                    alert(res.message);
                } else if (res.operator === 'add') {
                    that.css('color', 'red').children('span').text(res.total);
                } else if (res.operator === 'reduce') {
                    that.css('color', 'black').children('span').text(res.total);
                }
            },
            error: function (error) {
                console.log(error)
            }
        });
    });

    $('.socialIcons .fa-bookmark').click(function () {
        let that = $(this);
        $.ajax({
            url: "{{url('collect-post')}}" + "/" + $(this).data('id'),
            method: 'GET',
            success: function (res) {
                if (res.operator === 'no') {
                    alert(res.message);
                } else if (res.operator === 'add') {
                    that.css('color', 'red').children('span').text(res.total);
                } else if (res.operator === 'reduce') {
                    that.css('color', 'black').children('span').text(res.total);
                }
            },
            error: function (error) {
                console.log(error)
            }
        });
    });
</script>
@endsection