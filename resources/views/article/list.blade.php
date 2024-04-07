@extends('layouts.guest2')

@section('content')
    <style>
        body {
            color: dimgrey;
        }
    </style>
<div class="container-fluid py-5">
    <div class="row">
        <h4 class="mt-3">
            <a href="{{url('/')}}" class="text-decoration-none text-black">首頁</a> >
            <a href="{{route('get-introduction', $Data['user']->id)}}" class="text-decoration-none text-black">{{$Data['user']->name}} </a>>
            {{$Data['user']->name}}的文章</h4>
    </div>

    <!-- user info section -->
    <div class="row mt-3" style="background-color: #CCAACE; border-radius: 5rem;">
        <div class="col-3">
            <div class="ml-5 my-3 mr-3">
                @if(is_null($Data['user']->avatar))
                    <img src="{{ asset('uploads/images/default_avatar.png') }}" alt="" class="w-100">
                @else
                    <img src="{{ asset('uploads/'.$Data['user']->avatar) }}" alt="" class="w-100">
                @endif
            </div>
        </div>
        <div class="col-4 text-center text-white">
            <div class="d-flex flex-column">
                <h2 class="mt-5" style="font-size: 3rem;">{{$Data['user']->name}}</h2>
                <h5 class="mt-2">{{!is_null($Data['user']->universityItem) ? $Data['user']->universityItem->name:''}}</h5>
                @if(!is_null($Data['user']->postCategory))
                    <div class="row w-100 row-cols-3 text-center mt-5">
                        @foreach($Data['user']->postCategory as $theme)
                            <div class="col">
                                <a href="{{route('study-abroad', ['category_id' => $theme->postCategory->id])}}" class="text-decoration-none">
                                    <span class="w-75 btn text-white p-2" style="background-color: #4C2A70">
                                        {{$theme->postCategory->name}}
                                    </span>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        <div class="col row-cols-4">
            @if(!is_null($Data['user']->skills))
                @foreach($Data['user']->skills as $skill)
                    <div class="btn-outline btn col mt-3" style="color: #4C2A70; background-color: #ffffff">
                        {{$skill->skill->name}}
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <!-- posts section -->
    <div class="row my-4">
        <h2>{{$Data['user']->name}}的文章</h2>
    </div>
    <!-- post cards -->
    <!-- from study-abroad -->
    <div class="postsSection-artical-list">
        @if($Data['posts']->total())
            @foreach($Data['posts'] as $post)
                <div class="m-2 cardborder">
                    <!-- Post images -->
                    <div class="postImg">
                        <!-- img -->
                        <img class="postPhoto" src="{{ asset('uploads/'.$post->image_path) }}" alt="">
                    </div>
                    <!-- Post Contents -->
                    <div class="col-9">
                        <div class="postTitle" style="font-size:2rem;">
                            <h5 class="text-break">
                                <a href="{{route('article', $post->id)}}" class="text-decoration-none" style="color: #4C2A70;">{{ $post->title }}</a>
                            </h5>
                            <p class="text-break">
                                @forelse($post->category as $count => $cate)
                                    @if($count < 3)
                                        <a href="{{route('study-abroad', ['category_id' => $cate->postCategory->id])}}" class="text-decoration-none text-black">#{{$cate->postCategory->name}}</a>
                                    @endif
                                @empty
                                @endforelse
                            </p>
                        </div>

                        <div class="text-break content">
                            {!!  \Illuminate\Support\Str::limit(strip_tags($post->body)) !!}
                            <p class="readMore"><a href="{{route('article', $post->id)}}" class="text-decoration-none readMore">...閱讀更多</a></p>
                        </div>
                        <div class="socialIcons">
                            @if(auth()->check())
                            <i class="fa fa-heart" style="font-size:30px;
                            color: @if(auth()->user()->likePost->where('post_id', $post->id)->count() == 1) red @else black @endif
                            " data-id="{{$post->id}}">
                                <span style="font-size: 1rem; color:black">
                                    {{$post->likePost->count()}}
                                </span>
                            </i>
                            <i class="fa fa-bookmark" style="
                            font-size:30px;
                            color: @if(auth()->user()->collectPost->where('post_id', $post->id)->count() == 1) red @else black @endif ;
                            " data-id="{{$post->id}}">
                                <span style="font-size: 1rem; color:black">
                                    {{$post->collectPost->count()}}
                                </span>
                            </i>
                            @else
                                <i class="fa fa-heart" style="font-size:30px; color:black;" data-id="{{$post->id}}">
                                    <span style="color:black">{{$post->likePost->count()}}</span>
                                </i>
                                <i class="fa fa-bookmark" style="font-size:30px; color:black;" data-id="{{$post->id}}">
                                    <span style="color:black">{{$post->collectPost->count()}}</span>
                                </i>
                            @endif
                            <i>
                                <svg viewBox="0 0 512 512" >
                                    <path d="M295.4,235.2c32.9,0,59.5-26.7,59.5-59.5s-26.7-59.5-59.5-59.5s-59.5,26.7-59.5,59.5c0,2.5,0.1,5,0.4,7.4l-58.4,29.1
                                                    c-10.7-10.4-25.2-16.7-41.3-16.7c-32.9,0-59.5,26.7-59.5,59.5s26.7,59.5,59.5,59.5c16.1,0,30.6-6.3,41.3-16.7l58.4,29.1
                                                    c-0.3,2.4-0.4,4.8-0.4,7.4c0,32.9,26.7,59.5,59.5,59.5s59.5-26.7,59.5-59.5s-26.7-59.5-59.5-59.5c-16.1,0-30.6,6.3-41.3,16.7
                                                    l-58.4-29.1c0.3-2.4,0.4-4.8,0.4-7.4c0-2.5-0.1-5-0.4-7.4l58.4-29.1C264.7,228.8,279.3,235.2,295.4,235.2z"/>
                                    <circle class="st0" cx="224" cy="256" r="216.3"/>
                                </svg>
                            </i>

                            <p>發表日期：{{  $post->created_at->format('Y/m/d')  }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="pageNav">
                <div class="d-flex" style="flex-direction: row; justify-content: space-evenly; ">
                    {{$Data['posts']->appends($_GET)->links('vendor.pagination.bootstrap-4')}}
                </div>
            </div>
        @else
            <div class="m-2 row text-center">
                <p>
                    目前尚未發表文章
                </p>
            </div>
        @endif
    </div>


</div>
<script>
$('.socialIcons .fa-heart').click(function(){
    let that = $(this);
    $.ajax({
        url: "{{url('like-post')}}"+"/"+$(this).data('id'),
        method: 'GET',
        success: function (res) {
            if(res.operator === 'no') {
                alert(res.message);
            } else if(res.operator === 'add') {
                that.css('color', 'red').children('span').text(res.total);
            } else if(res.operator === 'reduce') {
                that.css('color', 'black').children('span').text(res.total);
            }
        },
        error: function(error) {
            console.log(error)
        }
    });
});

$('.socialIcons .fa-bookmark').click(function(){
    let that = $(this);
    $.ajax({
        url: "{{url('collect-post')}}"+"/"+$(this).data('id'),
        method: 'GET',
        success: function (res) {
            if(res.operator === 'no') {
                alert(res.message);
            } else if(res.operator === 'add') {
                that.css('color', 'red').children('span').text(res.total);
            } else if(res.operator === 'reduce') {
                that.css('color', 'black').children('span').text(res.total);
            }
        },
        error: function(error) {
            console.log(error)
        }
    });
});
</script>
@endsection
