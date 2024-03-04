@extends('layouts.guest2')

@section('content')
    <div class="px-5">
        <div class="row">
            <h4 class="mt-3">首頁 > 留學誌 </h4>
        </div>
        <div class="row">
            <div class="col offset-8">
                <form action="{{route('study-abroad')}}">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button class="input-group-text" id="basic-addon1" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                        <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1" name="title">
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <h2 style="font-size: 3rem;color: #4C2A70">留學誌</h2>
        </div>

        <div class="row mt-4">
            <div class="col-3 text-center">
                <div class="row">
                    <ul class="list-group">
                        @if($Data['category'])
                            @foreach($Data['category'] as $category)
                                <li class="list-group-item" style="background-color: #4C2A70">
                                    <a style="text-decoration: none;" class="text-white text-center" href="{{route('study-abroad', ['category_id' => $category->id])}}">
                                        <div class="border-bottom-light">{{$category->name}}</div>
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="row mt-5 d-flex flex-column">
                    <div style="border: 2px solid #4C2A70; border-radius: 30px;">
                        <a href="{{route('study-abroad', ['filter' => 'popular'])}}" style="text-decoration: none; color: #4C2A70">最熱門</a>
                    </div>
                    <div class="mt-3" style="border: 2px solid #4C2A70; border-radius: 30px;">
                        <a href="{{route('study-abroad',['filter'=>'latest'])}}" style="text-decoration: none; color: #4C2A70">最新</a>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="py-4">
                        <div class="card-body text-white py-2" style="background-color: #4C2A70; border-top-left-radius: 5px; border-top-right-radius: 5px;">
                            讓專業持續變現
                        </div>
                        <div class="card-body mt-2">
                            我們一起幫助學弟妹
                            <br>
                            更為自己創造收入
                            <br>
                            建立留學諮詢事業
                            <br>
                            <div class="mt-4 py-1 text-white w-50 mx-auto" style="background-color: #BD9EBE; border-radius: 20px;">
                                立即成為學長姐
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-9">
                @if(!is_null($Data['posts']))
                    @foreach($Data['posts'] as $post)
                        <div class="row m-2 p-4" style="border: 2px solid black; border-radius: 10px;">
                            <div class="col-3">
                                <div class="row">
                                    <img src="{{ isset($post->post) ? asset('uploads/'.$post->post->image_path) : asset('uploads/'.$post->image_path) }}" alt="">
                                </div>
                                <div class="row text-white py-2 mx-auto" style="background-color: #BD9EBE; font-size: 1.5rem;">
                                    <span class="text-center">{{ isset($post->post) ? $post->post->author->name : $post->author->name  }}</span>
                                </div>
                            </div>
                            <div class="col-9">
                                <div class="row text-break px-3" style="font-size:2rem;">
                                    {{isset($post->post) ? $post->post->title : $post->title}}
                                </div>
                                <div class="row text-break mt-5 px-3">
                                    {!! isset($post->post) ? \Illuminate\Support\Str::limit($post->post->body) : \Illuminate\Support\Str::limit($post->body) !!}
                                </div>
                                <div class="row mt-4">
                                    <span class="d-flex justify-content-around">

                                        <i class="fa fa-heart" style="font-size:30px; color:red; margin:5px">
                                        </i>
                                        <i class="fa fa-bookmark" style="font-size:30px; margin:5px">
                                            <span style="color:black"></span>
                                        </i>
                                        <button  class="btn btn-circle rounded-circle" style="border: 2px solid black;">
                                            <i class="fa fa-share-alt"></i>
                                        </button>
                                        <lead class="text-right pr-4">發表日期：{{ isset($post->post) ? $post->post->created_at->format('Y/m/d') : $post->created_at->format('Y/m/d')  }}</lead>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="row">
                        <nav>
                            {{$Data['posts']->appends($_GET)->links('vendor.pagination.bootstrap-4')}}
                        </nav>
                    </div>
                @endif
            </div>
        </div>
    </div>


@endsection