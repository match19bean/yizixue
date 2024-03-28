@extends('layouts.guest2')

@section('content')
    <style>
        body {
            color: dimgrey;
        }
    </style>
<div class="container-fluid py-5">
    <div class="row">
        <h4 class="mt-3">首頁 > {{$Data['user']->name}} > {{$Data['user']->name}}的文章</h4>
    </div>

    <!-- user info section -->
    <div class="row mt-3" style="background-color: #CCAACE; border-radius: 5rem;">
        <div class="col-3">
            <div class="ml-5 my-3 mr-3">
                <img src="{{ asset('uploads/'.$Data['user']->avatar) }}" alt="" class="w-100">
            </div>
        </div>
        <div class="col-4 text-center text-white">
            <div class="d-flex flex-column">
                <h2 class="mt-5" style="font-size: 3rem;">{{$Data['user']->name}}</h2>
                <h5 class="mt-2">{{$Data['user']->universityItem->name}}</h5>
                @if(!is_null($Data['user']->postCategory))
                    <div class="row w-100 row-cols-3 text-center mt-5">
                        @foreach($Data['user']->postCategory as $theme)
                            <div class="col">
                                <span class="w-75 btn text-white p-2" style="background-color: #4C2A70">
                                    {{$theme->postCategory->name}}
                                </span>
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
        @if(!is_null($Data['posts']))
            @foreach($Data['posts'] as $post)
                <div class="m-2 cardborder">
                    <!-- Post images -->
                    <div class="postImg">
                        <!-- img -->
                        <img class="postPhoto" src="{{ isset($post->post) ? asset('uploads/'.$post->post->image_path) : asset('uploads/'.$post->image_path) }}" alt="">
                    </div>
                    <!-- Post Contents -->
                    <div class="col-9">
                        <div class="postTitle" style="font-size:2rem;">
                            <h5 class="text-break">
                                {{isset($post->post) ? $post->post->title : $post->title}}
                            </h5>
                            <p class="text-break">
                                @forelse($post->category as $cate)
                                    #{{$cate->postCategory->name}}
                                @empty
                                @endforelse
                            </p>
                        </div>

                        <div class="text-break content">
                            {!! isset($post->post) ? \Illuminate\Support\Str::limit($post->post->body) : \Illuminate\Support\Str::limit($post->body) !!}
                            <p class="readMore"><a href="{{route('article', $post->id)}}" class="text-decoration-none readMore">...閱讀更多</a></p>
                        </div>
                        <div class="socialIcons">
                            <i class="fa fa-heart text-danger" style="font-size:30px;" data-id="{{$post->id}}">
                            </i>
                            <i class="fa fa-bookmark" style="font-size:30px;" data-id="{{$post->id}}">
                                <span style="color:black"></span>
                            </i>
                            <i>
                                <svg viewBox="0 0 512 512" >
                                    <path d="M295.4,235.2c32.9,0,59.5-26.7,59.5-59.5s-26.7-59.5-59.5-59.5s-59.5,26.7-59.5,59.5c0,2.5,0.1,5,0.4,7.4l-58.4,29.1
                                                    c-10.7-10.4-25.2-16.7-41.3-16.7c-32.9,0-59.5,26.7-59.5,59.5s26.7,59.5,59.5,59.5c16.1,0,30.6-6.3,41.3-16.7l58.4,29.1
                                                    c-0.3,2.4-0.4,4.8-0.4,7.4c0,32.9,26.7,59.5,59.5,59.5s59.5-26.7,59.5-59.5s-26.7-59.5-59.5-59.5c-16.1,0-30.6,6.3-41.3,16.7
                                                    l-58.4-29.1c0.3-2.4,0.4-4.8,0.4-7.4c0-2.5-0.1-5-0.4-7.4l58.4-29.1C264.7,228.8,279.3,235.2,295.4,235.2z"/>
                                    <circle class="st0" cx="224" cy="256" r="216.3"/>
                                </svg>
                            </i>

                            <p>發表日期：{{ isset($post->post) ? $post->post->created_at->format('Y/m/d') : $post->created_at->format('Y/m/d')  }}</p>
                        </div>
                    </div>
                </div>
{{--                <div class="col my-2">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="row row-cols-2">--}}
{{--                                <div class="col">--}}
{{--                                    <a href="{{ route('article', $post->id) }}" style="color: #4C2A70; text-decoration: none;"><img src="{{ asset('uploads'.$post->image_path)  }}" alt="" class="w-100" height="300"></a>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <p>--}}
{{--                                        <a href="{{ route('article', $post->id) }}" style="color: #4C2A70; text-decoration: none;"><h3> {{$post->title}} </h3></a>--}}
{{--                                    </p>--}}
{{--                                    <p>--}}
{{--                                        <a href="{{ route('article', $post->id) }}" style="color: #4C2A70; text-decoration: none;">--}}
{{--                                            {!! \Illuminate\Support\Str::limit($post->body) !!}--}}
{{--                                        </a>--}}
{{--                                    </p>--}}
{{--                                    <hr>--}}
{{--                                    <div class="mt-5">--}}
{{--                                        <div--}}
{{--                                                style="text-align: right";>--}}
{{--                                            <i class="fa fa-heart-o" style="font-size:20px; color:red; margin:5px">--}}
{{--                                                <span style="color:black">{{rand(5,30)}}</span>--}}
{{--                                            </i>--}}
{{--                                            <i class="fa fa-bookmark-o" style="font-size:20px; margin:5px">--}}
{{--                                                <span style="color:black">{{rand(5,30)}}</span>--}}
{{--                                            </i>--}}
{{--                                            <i class="fa fa-share-alt" style="font-size:20px; margin:5px;">--}}
{{--                                            </i>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <p class="text-right">--}}
{{--                                        發布日期：{{$Data['user']->created_at->format('Y/m/d')}}--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            @endforeach
        @else
            <div class="m-2 row text-center">
                <p class="vh-100">
                    目前尚未發表文章
                </p>
            </div>
        @endif
    </div>

    <div class="pageNav">
        <div class="d-flex" style="flex-direction: row; justify-content: space-evenly; ">
            @if($Data['posts']->hasPages())
            <p class="text-primary">留學誌</p>
            @endif
            {{$Data['posts']->appends($_GET)->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
</div>
<script>
$('.socialIcons .fa-heart').click(function(){
    let that = $(this);
    $.ajax({
        url: "{{route('like-post')}}",
        method: 'GET',
        data: {id: $(this).data('id')},
        success: function (res) {
            if(res.operator === 'no') {
                alert(res.message);
            } else if(res.operator === 'add') {
                that.removeClass('text-black').addClass('text-danger');
            } else if(res.operator === 'reduce') {
                that.removeClass('text-danger').addClass('text-black');
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
        url: "{{route('collect-post')}}",
        method: 'GET',
        data: {id: $(this).data('id')},
        success: function (res) {
            if(res.operator === 'no') {
                alert(res.message);
            } else if(res.operator === 'add') {
                that.removeClass('text-black').addClass('text-danger');
            } else if(res.operator === 'reduce') {
                that.removeClass('text-danger').addClass('text-black');
            }
        },
        error: function(error) {
            console.log(error)
        }
    });
});
</script>
@endsection
