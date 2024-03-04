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

    <div class="row mt-3" style="background-color: #CCAACE; border-radius: 10px;">
        <div class="col-3">
            <div class="ml-5 my-3 mr-3">
                <img src="{{ asset('uploads/'.$Data['user']->avatar) }}" alt="" class="w-100">
            </div>
        </div>
        <div class="col-4 text-center text-white">
            <div class="d-flex flex-column">
                <h2 class="mt-5" style="font-size: 3rem;">{{$Data['user']->name}}</h2>
                <h5 class="mt-2">{{$Data['user']->university}}</h5>
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
                    <div class="btn-outline btn col mt-3" style="color: #4C2A70;border-color: #4C2A70">
                        {{$skill->skill->name}}
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="row my-4">
        <h2>{{$Data['user']->name}}的文章</h2>
    </div>
    <div class="row row-cols-2">
        @if(!is_null($Data['posts']))
            @foreach($Data['posts'] as $post)
                <div class="col my-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="row row-cols-2">
                                <div class="col">
                                    <a href="{{ route('article', $post->id) }}" style="color: #4C2A70; text-decoration: none;"><img src="{{ asset('uploads'.$post->image_path)  }}" alt="" class="w-100" height="300"></a>
                                </div>
                                <div class="col">
                                    <p>
                                        <a href="{{ route('article', $post->id) }}" style="color: #4C2A70; text-decoration: none;"><h3> {{$post->title}} </h3></a>
                                    </p>
                                    <p>
                                        <a href="{{ route('article', $post->id) }}" style="color: #4C2A70; text-decoration: none;">
                                            {!! \Illuminate\Support\Str::limit($post->body) !!}
                                        </a>
                                    </p>
                                    <hr>
                                    <div class="mt-5">
                                        <div
                                                style="text-align: right";>
                                            <i class="fa fa-heart-o" style="font-size:20px; color:red; margin:5px">
                                                <span style="color:black">{{rand(5,30)}}</span>
                                            </i>
                                            <i class="fa fa-bookmark-o" style="font-size:20px; margin:5px">
                                                <span style="color:black">{{rand(5,30)}}</span>
                                            </i>
                                            <i class="fa fa-share-alt" style="font-size:20px; margin:5px;">
                                            </i>
                                        </div>
                                    </div>
                                    <p class="text-right">
                                        發布日期：{{$Data['user']->created_at->format('Y/m/d')}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="row mt-5">
        {!! $Data['posts']->links('vendor.pagination.bootstrap-4') !!}
    </div>
</div>

@endsection
