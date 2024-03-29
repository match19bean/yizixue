@extends('layouts.guest2')

@section('content')
<div class="container-fluid py-5">
    <div class="row">
        <h4 class="mt-3">首頁 > {{$Data['article']->category->first()->postCategory->name}} > {{$Data['article']->title}}</h4>
    </div>
    <div class="row w-100">
        <h2>{{$Data['article']->tilte}}</h2>
    </div>
    <div class="row">
        <div class="col text-right h6">發布日期{{$Data['article']->created_at->format('Y/m/d')}}</div>
    </div>
    <div class="row text-center">
        <div class="text-center">
            <img src="{{asset('uploads/'.$Data['article']->image_path)}}" alt="" class="img-fluid w-50">
        </div>
    </div>
    <div class="row text-center h-50 mt-3" style="word-wrap:break-word; font-size: 2rem;">
        {!! $Data['article']->body !!}
    </div>
    <div class="row row-cols-2">
        <div class="text-center col">
            @if(!is_null($Data['article']->category))
                @foreach($Data['article']->category as $category)
                    <span class="btn btn-outline" style="border-color: #4C2A70; color: #4C2A70">#{{$category->postCategory->name}} </span>
                @endforeach
            @endif
        </div>
        <div class="col">
            <div
                    style="text-align: right";>
                <i class="fa fa-heart" style="font-size:20px; color:red; margin:5px">
                    <span style="color:black">{{$Data['article']->likePost->count()}}</span>
                </i>
                <i class="fa fa-bookmark" style="font-size:20px; margin:5px">
                    <span style="color:black">{{$Data['article']->collectPost->count()}}</span>
                </i>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div style="border: solid black 5px; border-radius: 10px;" class="row w-100 bg-gray-100 py-5">
            <div class="w-100 pl-5 pt-3">
                <h2 class="text-black">文章作者</h2>
            </div>
            <div class="row">
                <div class="col-4 pl-5">
                    <div class="mb-3 text-center">
                        <h2>{{$Data['article']->title}}</h2>
                    </div>
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset('uploads/'.$Data['article']->author->avatar)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div style="background-color: #BD9EBE" class="text-white w-100" >
                                <h2 class="card-title text-center " >{{ $Data['article']->author->name }}</h2>
                                <h6 class="card-title text-center " style="background-color: #BD9EBE" >{{ $Data['article']->author->universityItem->chinese_name }}</h6>
                            </div>

                            @if(!is_null($Data['article']->author->postCategory))
                                <div class="row row-cols-3 mt-2">
                                    @foreach($Data['article']->author->postCategory as $postCategory)
                                        <span class="col btn text-white" style="background-color: #4C2A70">{{$postCategory->postCategory->name}}</span>
                                    @endforeach
                                </div>
                            @endif
                            @if(!is_null($Data['article']->author->skills))
                                <div class="row row-cols-3 mt-2">
                                    @foreach($Data['article']->author->skills as $skill)
                                            <span class="col btn btn-outline-secondary">{{ $skill->skill->name }}</span>
                                    @endforeach
                                </div>
                            @endif

                            <a href="{{route('article-list', $Data['article']->author->id)}}" class="btn btn-outline text-center w-100">查看更多</a>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="row">
                        @if(!is_null($Data['article']->author->post))
                            @foreach($Data['article']->author->post as $post)
                                <div class="m-2 px-4">
                                    <div class="row py-2" style="border: 2px solid black; border-radius: 10px;">
                                        <div class="col-2">
                                            <a href="{{ route('article', $post->id) }}" style="color: #4C2A70; text-decoration: none;"><img src="{{ asset('uploads'.$post->image_path)  }}" alt="" class="w-100"></a>
                                        </div>
                                        <div class="col">
                                            <p>
                                                <a href="{{ route('article', $post->id) }}" style="color: #4C2A70; text-decoration: none;"><h3 class="text-break"> {{$post->title}} </h3></a>
                                            </p>
                                            <p>
                                                <a href="{{ route('article', $post->id) }}" style="color: #4C2A70; text-decoration: none;" class="text-break w-75">
                                                    {!! \Illuminate\Support\Str::limit($post->body) !!}
                                                </a>
                                            </p>
                                            <p class="text-right" style="margin-right: 10%;">
                                                發布日期：{{$post->created_at->format('Y/m/d')}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br>

    <div class="row" style="border: 2px solid black; height: 2px;"></div>

    <div class="mt-5">
        <h2>您可能感興趣的文章</h2>

        <div class="row row-cols-2">
            @if(!is_null($Data['interested']))
                @foreach($Data['interested'] as $post)
                    <div class="row">
                        <div class="m-2 px-4">
                            <div class="row py-2" style="border: 2px solid black; border-radius: 10px;">
                                <div class="col-2">
                                    <a href="{{ route('article', $post->id) }}" style="color: #4C2A70; text-decoration: none;"><img src="{{ asset('uploads'.$post->image_path)  }}" alt="" class="w-100"></a>
                                </div>
                                <div class="col">
                                    <p>
                                        <a href="{{ route('article', $post->id) }}" style="color: #4C2A70; text-decoration: none;"><h3 class="text-break"> {{$post->title}} </h3></a>
                                    </p>
                                    <p >
                                        <a href="{{ route('article', $post->id) }}" style="color: #4C2A70; text-decoration: none;" class="text-break w-75">
                                            {!! \Illuminate\Support\Str::limit($post->body) !!}
                                        </a>
                                    </p>
                                    <p class="text-right" style="margin-right: 10%;">
                                        發布日期：{{$post->created_at->format('Y/m/d')}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

</div>
@endsection
