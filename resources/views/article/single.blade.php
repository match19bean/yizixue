@extends('layouts.guest2')

@section('content')
<div class="singleArticle">
    <div class="titleDiv">
        <div class="singleArticle-breadcrumbs">
            <div class="d-flex flex-column align-tiems-start">
                <h4 class="mt-3 text-black">
                    <a href="{{url('/')}}" class="text-decoration-none text-black">首頁</a>
                    >
                    <a
                        class="text-decoration-none text-black"
                        href="{{route('study-abroad', ['category_id' => $Data['article']->category->first()->postCategory->id])}}">
                        {{$Data['article']->category->first()->postCategory->name}}
                    </a>
                    >
                    <a
                        class="text-decoration-none text-black"
                        href="{{route('study-abroad', ['category_id' => $Data['article']->category->first()->postCategory->id])}}">
                        {{$Data['article']->title}}
                    </a>
                </h4>
                <h3>{{$Data['article']->title}}</h3>
            </div>
        </div>
    </div>
    <div class="innerDiv">
        <!-- p date -->
        <p class="text-right">發布日期{{$Data['article']->created_at->format('Y/m/d')}}</p>
        <!-- main pic -->
        <img src="{{asset('uploads/'.$Data['article']->image_path)}}" alt="">
        <!-- content -->
        <div class="row text-center content" style="word-wrap:break-word; font-size: 1rem;">
            {!! $Data['article']->body !!}
        </div>
        <div class="row tagSocial">
            <!-- categorys -->
            <div class="col-8 postCategory">
                @if(!is_null($Data['article']->category))
                @foreach($Data['article']->category as $category)
                <a
                    href="{{route('study-abroad', ['category_id' => $category->postCategory->id])}}">{{$category->postCategory->name}}</a>
                @endforeach
                @endif
            </div>
            <!-- social icons -->
            <div class="col-4 socialIcons">
                <div style="text-align: right" ;>
                    @if(auth()->check())
                    <i class="fa fa-heart" style="font-size:20px;
                    color:@if(auth()->user()->likePost->where('post_id', $Data['article']->id)->count() == 1) red @else black @endif ;
                    margin:5px" data-id="{{$Data['article']->id}}">
                        <span style="color:black">{{$Data['article']->likePost->count()}}</span>
                    </i>
                    <i class="fa fa-bookmark" style="font-size:20px;
                     color: @if(auth()->user()->collectPost->where('post_id', $Data['article']->id)->count() == 1) red @else black @endif ;
                     margin:5px" data-id="{{$Data['article']->id}}">
                        <span style="color:black">{{$Data['article']->collectPost->count()}}</span>
                    </i>
                    @else
                    <i class="fa fa-heart" style="font-size:20px; color:black; margin:5px"
                        data-id="{{$Data['article']->id}}">
                        <span style="color:black">{{$Data['article']->likePost->count()}}</span>
                    </i>
                    <i class="fa fa-bookmark" style="font-size:20px; color:black; margin:5px"
                        data-id="{{$Data['article']->id}}">
                        <span style="color:black">{{$Data['article']->collectPost->count()}}</span>
                    </i>
                    @endif
                    <i class="fa fa-share" style="font-size:20px; color:black; margin:5px"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="rightDiv">
        <h2>文章作者</h2>
        <div class="studentC">
            <!-- img div -->
            <div class="studentImg">
                <span
                    style="background-image: url('{{asset('uploads/'.$Data['article']->author->avatar)}}');">&nbsp</span>
            </div>
            <!-- background -->
            <svg viewBox="0 0 330 475">
                <path
                    d="M301.9,2c14.5,0,26.4,11.8,26.4,26.4v306.7c0,14.5-11.8,26.4-26.4,26.4H28.1c-14.5,0-26.4-11.8-26.4-26.4V28.4C1.8,13.8,13.6,2,28.1,2h273.7M301.9,0H28.1C12.5,0-.2,12.7-.2,28.4v306.7c0,15.7,12.7,28.4,28.4,28.4h273.7c15.7,0,28.4-12.7,28.4-28.4V28.4c0-15.7-12.7-28.4-28.4-28.4h0Z" />
                <polygon points="330 475 0 475 0 305 330 337.1 330 475" />
            </svg>
            <!-- school img -->
            <div class="schoolImg">
                <span style="background-image: url('{{asset('university/USA/US1.png')}}') ;">&nbsp</span>
            </div>
            <!-- name card -->
            <h4>{{ $Data['article']->author->name }}</h4>
            <!-- school english -->
            <h5>{{ !is_null($Data['article']->author->universityItem) ? $Data['article']->author->universityItem->english_name: '' }}
            </h5>
            <!-- school chinese -->
            <h6>{{ !is_null($Data['article']->author->universityItem) ? $Data['article']->author->universityItem->chinese_name: '' }}
            </h6>
            <!-- react icons -->
            <div class="react d-flex flex-row justify-content-evenly align-items-center"
                onclick="event.stopPropagation(); return false; ">
                <i class="fa fa-heart">
                    <span class="text-black">T</span>
                </i>
                <i class="fa fa-bookmark">
                    <span class="text-black">T</span>
                </i>
            </div>
            <!-- post tag -->
            <div class="postTags">
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
        <h5>作者的熱門文章</h5>
        <!-- author article -->
        <div>
            @if(!is_null($Data['article']->author->post))
            @foreach($Data['article']->author->post as $post)

            <a class="moreArticles" href="{{ route('article', $post->id) }}">
                <div style="background-image: url('{{ asset('uploads'.$post->image_path)  }}') ;" class="bgImg">
                    &nbsp;
                </div>
                <div class="meta">
                    <h3 class="text-break"> {{ \Illuminate\Support\Str::limit($post->title, 15, '...') }} </h3>
                    <p>
                        {{ \Illuminate\Support\Str::limit(strip_tags($post->body), 40) }}
                    </p>
                </div>
            </a>

            @endforeach
            @endif
        </div>
    </div>
    <div class="relateArticle">

        <h2>您可能感興趣的文章</h2>
        <div class="cards">
            @if(!is_null($Data['interested']))
            @foreach($Data['interested'] as $post)

            <div class="row moreArticles">
                <a href="{{ route('article', $post->id) }}">
                    <!-- img -->
                    <div class="imgs">
                        <div class="bgImg" style="background-image: url('{{ asset('uploads'.$post->image_path)  }}') ;">
                            &nbsp;
                        </div>
                        <div class="info">
                            <div class="authorImg"
                                style="background-image: url('{{ is_null($post->author->avatar) ? asset('uploads/images/default_avatar.png') : asset('uploads/'.$post->author->avatar) }}') ;">
                            </div>
                            <h6>{{ !is_null($post->author) ? $post->author->name : ""}}</h6>
                        </div>
                    </div>

                    <div class="w-100">
                        <!-- categs -->
                        <div class="postCategory">
                            @if(!is_null($Data['article']->category))
                            @foreach($Data['article']->category as $category)
                            <p>{{$category->postCategory->name}}</p>
                            @endforeach
                            @endif
                        </div>
                        <!-- title -->
                        <h3> {{$post->title}} </h3>
                        <p class="body">
                            {!! \Illuminate\Support\Str::limit(strip_tags($post->body), 30) !!}
                        </p>

                        <p class="readMore">...閱讀更多</p>
                        <!-- react icons -->
                        <div class="react" onclick="event.stopPropagation(); return false; ">
                            <i class="fa fa-heart">
                                <span class="text-black">T</span>
                            </i>
                            <i class="fa fa-bookmark">
                                <span class="text-black">T</span>
                            </i>
                            <p class="date">
                                發布日期：{{$post->created_at->format('Y/m/d')}}
                            </p>
                        </div>

                    </div>
                </a>
            </div>

            @endforeach
            @endif
            <a class="toStudyAbroad">查看更多文章</a>

        </div>



    </div>

    <script>
        // fix container-fluid px-5 padding
        $(document).ready(function () {
            $(".adjOnSingleArticle").removeClass("px-5");
            $(".adjOnSingleArticle").css("padding", "0");
        });
        $('.fa-heart').click(function () {
            let that = $(this);
            $.ajax({
                url: "{{url('like-post/')}}" + "/" + $(this).data('id'),
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
                url: "{{url('collect-post/')}}" + "/" + $(this).data('id'),
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