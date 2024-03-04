@extends('layouts.guest2')

@section('content')
    <style>
        body {
            color: dimgrey;
        }
        body h2 {
            color: black;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div>
                    <img src="{{asset('uploads/'.$Data['user']->avatar)}}" alt="" class="img-response img-rounded w-100">
                    <div class="row justify-content-center text-white h-auto" style="color: #4C2A70; background-color: #BD9EBE;">
                        <h2 class='text-center text-white w-100'>{{$Data['user']->name}}</h2>
                        <h6 class="text-center w-100">{{$Data['user']->university}}</h6>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="d-flex flex-column">
                    <div class="p-2">
                        <div class="row row-cols-3 mt-3">
                            @if(!is_null($Data['user']->postCategory))
                                @foreach($Data['user']->postCategory as $relation)
                                    <div class="col px-2 text-center">
                                        <span class="btn mx-auto text-white w-100" style="background-color: #4C2A70; border-radius: 0;">{{$relation->postCategory->name}}</span>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="row row-cols-3 mt-3">
                            @if(!is_null($Data['user']->skills))
                                @foreach($Data['user']->skills as $skill)
                                    <div class="col px-2 text-center">
                                        <span class="btn w-100 mx-auto m-1" style="color: #4C2A70; border-color: #4C2A70;">
                                            <b>{{ $skill->skill->name }}</b>
                                        </span>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="p-2">
                        <div
                                style="text-align: right";>
                            <i class="fa fa-heart" style="font-size:20px; color:red; margin:5px">
                                <span style="color:black">{{$Data['user']->likeUser->count()}}</span>
                            </i>
                            <i class="fa fa-bookmark" style="font-size:20px; margin:5px">
                                <span style="color:black">{{$Data['user']->collectUser->count()}}</span>
                            </i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <h2>自我介紹</h2>
            </div>
            <div class="col-12 text-truncate ">
                @if(is_null($Data['user']->description))
                    尚未填寫自我介紹
                @else
                    {!!  $Data['user']->description   !!}
                @endif
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <h2>學歷經歷</h2>
            </div>
            <div class="col-12">
                {{ $Data['user']->university }}
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <h2>社交網路</h2>
            </div>
            <div class="col-12">
                <p>LINE:{{$Data['user']->line}}</p>
                <p>FB:{{$Data['user']->fb}}</p>
                <p>IG:{{$Data['user']->ig}}</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <a class=" text-black" href="{{route('article', $Data['user']->id)}}" style="text-decoration: none;"><h2>我的文章</h2></a>
            </div>
            <div class="row row-cols-2">
                @if(!is_null($Data['user']->post))
                    @foreach($Data['user']->post as $post)
                        <div class="card border-dark">
                            <div class="card-body">
                                <div class="row row-cols-2">
                                    <div class="col">
                                        <img src="{{ asset('uploads'.$post->image_path)  }}" alt="" class="card-image img-responsive w-100">
                                    </div>
                                    <div class="col">
                                        <div class="px-3">
                                            <p>
                                                <a href="{{ route('article-list', $Data['user']->id) }}" style="color: #4C2A70; text-decoration: none;"><h3> {{$post->title}} </h3></a>
                                            </p>
                                            <p>
                                                {!! \Illuminate\Support\Str::limit($post->body) !!}
                                            </p>
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
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <h2>與我聯繫</h2>
            </div>
            <div class="col-12">
                <p>電子郵件：{{$Data['user']->email}}</p>
                <p>手機號碼：{{$Data['user']->phone}}</p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <h2>參考文件</h2>
            </div>
            <div class="col-12">

            </div>
        </div>
        <hr>
        <div class="row">
            <div class="owl-carousel owl-theme">
                @foreach ($Data['vip'] as $key => $user)
                    <div class="item">
                        <div class="card p-3">
                            <div>
                                <img style="height: 200px;"
                                     src="/uploads/{{ $user->avatar }}"
                                     alt="Card image cap">
                            </div>
                            <div class="name-card">
                                <h5 style="color:white">{{ $user->name }}</h5>
                            </div>
                            <div class="row row-cols-3 mt-2">
                                @foreach($user->postCategory as $postCategoryRelation)
                                    <div class="col">
                                        <span class="btn w-100 text-white" style="background-color: #4C2A70; border-radius: 0;">
                                            {{$postCategoryRelation->postCategory->name}}
                                        </span>
                                    </div>
                                @endforeach
                            </div>

                            <div class="row row-cols-3 mt-2">
                                @foreach($user->skills as $skillRelation)
                                    <div class="col text-center">
                                        <span class="btn w-100 my-1" style="border-color: #4C2A70; color: #4C2A70;">{{$skillRelation->skill->name}}</span>
                                    </div>
                                @endforeach
                            </div>

                            <div style="text-align:center; margin:20px">
                                <a href="{{url('introduction/'.$user->id)}}" style="text-decoration: none; color: dimgrey">點擊查看更多</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection