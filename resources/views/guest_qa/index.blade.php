@extends('layouts.guest2')

@section('content')
<div class="qa-index-page">
    <!-- breadcrumb -->
    <div class="row text-gray-600 qaIndexToggle">
        <!-- taggle menu section -->
        <div class="row text-gray-600 ">
            <h4 class="mt-3 col-6"><a href="{{url('/')}}" class="text-decoration-none text-black">首頁</a> > 問與答</h4>
            <div class="col-6 d-flex justify-content-end">
                <svg id="burger" width="50px" height="50px" viewbox="0 0 50 50" onclick="toggle()">
                    <g>
                        <rect width="30" height="5" x="10" y="10" fill="gray" />
                        <rect width="30" height="5" x="10" y="20" fill="gray" />
                        <rect width="30" height="5" x="10" y="30" fill="gray" />
                    </g>
                </svg>
            </div>
        </div>
        <div id="toggleBar">
            <div class="col d-flex flex-column">
                <a href="{{route('qna')}}" class="text-decoration-none text-white"><h6>全部分類</h6></a>
            </div>
            @forelse($categories as $category)
                <div class="col d-flex flex-column">
                    <a href="{{route('qna', ['category_id' =>$category->id ])}}" class="text-decoration-none text-white"><h6>{{$category->name}}</h6></a>
                </div>
            @empty
            @endforelse
        </div>
        <!-- end of toggle menu section -->
    </div>

    <div class="row">
        <!-- qa cards -->
        @if(!is_null($qas))
        @forelse($qas as $num => $qa)
        <div class="row m-4">
            <div class="col-11 text-lg p-3 d-flex flex-column justify-content-between"
                style="border-left-style: solid; border-top-style: solid; border-bottom-style: solid; border-color: #6D757D;">
                <h2 class="d-flex">
                    <a href="{{route('qna.show', $qa->id)}}"
                        class="text-decoration-none text-gray-600 w-100">{{$qa->title}}</a>
                    <span class="w-100 text-right">
                        @if($qa->categoryRelation)
                        @foreach($qa->categoryRelation as $relation)
                        <span class="btn px-4 text-center text-white" style="background-color: #4C2A70">
                            {{$relation->category->name}}
                        </span>
                        @endforeach
                        @endif
                    </span>
                </h2>
                <div class="row">
                    {!! $qa->body !!}
                </div>
                <a class="readMore" href="{{ route('qna.show', $qa->id) }}">...閱讀更多</a>
            </div>
            <div class="qStyle col">
                <svg viewBox="0 0 45 150">
                    <polygon fill="#4C2A70" points="50,150 0,150 35,75 0,0 50,0 "/>
                </svg>
            </div>
        </div>

        <!-- new posts -->
        @if($num==1)
        <div class="row my-4 nowPosts">
            <div class="row">
                <h2>最新文章</h2>
            </div>
            @if(!is_null($posts))
            @foreach($posts as $post)
            <div class="col-5 mx-2 row mx-auto" style="border: 2px solid black; border-radius: 10px;">
                <div class="col-4">
                    <div class="d-flex justify-content-center">
                        <span style="background-image: url('{{ asset('uploads/'.$post->image_path)  }}') ;" class="bgImg">&nbsp</span>
                    </div>
                </div>
                <div class="col-8 text-break">
                    <h2 class="w-100"><a href="{{route('article', $post->id)}}" class="text-decoration-none"
                            style="color: #4C2A70">{{$post->title}} </a></h2>
                    <p>{!! \Illuminate\Support\Str::limit(strip_tags($post->body)) !!}</p>
                    <a class="readMore" href="{{ route('qna', $qa->id) }}">...閱讀更多</a>
                    <p class=" text-right w-100">發布日期：{{$post->created_at->format('Y/m/d')}}</p>
                </div>
            </div>
            @endforeach
            @else
            <p class="vh-100">
                目前尚無文章
            </p>
            @endif
        </div>
        @endif
        @empty
        <div class="row text-center">
            <p class="vh-100">
                目前尚無資料
            </p>
        </div>
        @endforelse
            <div class="pageNav">
                <div class="d-flex" style="flex-direction: row; justify-content: space-evenly; ">
                {{$qas->appends($_GET)->links('vendor.pagination.bootstrap-4')}}
                </div>
            </div>
        @endif
    </div>
</div>

@endsection