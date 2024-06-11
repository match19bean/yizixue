@extends('layouts.guest2')

@section('content')
<div class="studyAbroad">
    <div class="breadAndSearch">
        <!-- tag & tag -->
        <div class="row studyAbroad-breadcrumbs">
            <div class="d-flex flex-column align-tiems-start">
                <h4 class="mt-3 text-black"><a href="{{url('/')}}" class="text-decoration-none text-black">首頁</a> > 留學誌
                </h4>
                <h3 class="text-center">留學誌</h3>
            </div>
        </div>
        <!-- search bar -->
        <div class="searchBar">
            <form method="get" action="{{route('study-abroad')}}">
                <svg x="0px" y="0px" viewBox="0 0 335.8 335.8">
                    <g>
                        <circle fill="#FFFFFF" cx="224.7" cy="111.1" r="77.6" />
                        <circle fill="none" stroke="#FFFFFF" stroke-width="12" stroke-miterlimit="10" cx="224.7"
                            cy="111.1" r="105.1" />
                        <rect x="121.4" y="178.9" transform="matrix(0.7071 0.7071 -0.7071 0.7071 181.9803 -35.5915)"
                            fill="#FFFFFF" width="25.1" height="45.9" />
                        <rect x="45.3" y="183.6" transform="matrix(0.7071 0.7071 -0.7071 0.7071 206.129 22.7085)"
                            fill="#FFFFFF" width="60.7" height="153.2" />
                    </g>
                </svg>
                <div class="inputDiv">
                    <input type="search" name="title">
                    <button type="submit" style="display: none;"></button>
                </div>
            </form>
        </div>
    </div>
    <!-- main content -->
    <div class="row mt-4">
        <!-- sideBar -->
        <div class="sideBar">
            <!-- categories -->
            <div class="row">
                <ul class="list-group">
                    <li class="list-group-item" style="background-color: #4C2A70">
                        <a style="text-decoration: none;" class="text-white text-center"
                            href="{{route('study-abroad')}}">
                            全部文章
                        </a>
                    </li>
                    @forelse($Data['category'] as $category)
                    <li class="list-group-item" style="background-color: #4C2A70">
                        <a style="text-decoration: none;" class="text-white text-center"
                            href="{{route('study-abroad', ['category_id' => $category->id])}}">
                            {{$category->name}}
                        </a>
                    </li>
                    @empty
                    @endforelse

                </ul>
            </div>

            <!-- types (hot and new) -->
            <div class="row mt-5 d-flex flex-column types">
                <div style="border: 2px solid #4C2A70; border-radius: 30px;">
                    <a href="{{route('study-abroad', ['filter' => 'popular'])}}">最熱門</a>
                </div>
                <div class="mt-3" style="border: 2px solid #4C2A70; border-radius: 30px;">
                    <a href="{{route('study-abroad',['filter'=>'latest'])}}">最新</a>
                </div>
            </div>
            <!-- call to action -->
            @if(auth()->guest() || !auth()->user()->isVip())
            <div class="py-4 callToAction">
                <h5 class="card-body text-white py-2 part1" style="background-color: #4C2A70;">
                    讓專業持續變現
                </h5>
                <div class="card-body part2">
                    <p>
                        我們一起幫助學弟妹
                        <br>
                        更為自己創造收入
                        <br>
                        建立留學諮詢事業
                        <br>
                    </p>
                    <button class="text-white" style="background-color: #BD9EBE;">
                        <a href="{{route('pay-product-list')}}" class="text-decoration-none text-white">立即成為學長姐</a>
                    </button>
                </div>
            </div>
            @endif
        </div>
        <!-- posts -->
        <div class="col-9 postsSection">
            @forelse($Data['posts'] as $post)
            <div class="cardborder">
                <!-- Post images -->
                <div class="postImg">
                    <!-- post img -->
                    <div class="postPhoto">
                        @if(is_null($post->image_path))
                        <span
                            style="background-image: url('{{asset('uploads/images/default_avatar.png')}}') ;">&nbsp</span>
                        @else
                        <span style="background-image: url('/uploads/{{$post->image_path}}');">&nbsp</span>
                        @endif
                    </div>
                    <!-- user img -->
                    <div class="userimg">
                        @if(is_null($post->image_path))
                        <span
                            style="background-image: url('{{asset('uploads/images/default_avatar.png')}}') ;">&nbsp</span>
                        @else
                        <span style="background-image: url('/uploads/{{$post->author->avatar}}');">&nbsp</span>
                        @endif
                    </div>
                    <!-- namecard -->
                    <p class="text-white namecard"><a href="{{route('get-introduction', $post->author->id)}}"
                            class="text-decoration-none text-white">{{ $post->author->name  }}</a></p>
                </div>
                <!-- Post Contents -->
                <div class="postContents">
                    <div class="postTitle row" style="font-size:2rem;">
                        <p class="text-break col-12">
                            @forelse($post->category as $count => $cate)
                            @if($count < 3) <a
                                href="{{route('study-abroad', ['category_id' => $cate->postCategory->id])}}"
                                class="text-decoration-none m-1 p-1">
                                <span>{{$cate->postCategory->name}}</span>
                                </a>
                                @endif
                                @empty
                                @endforelse
                        </p>
                        <h5 class="col-12">
                            <a href="{{route('article', $post->id)}}" class="text-decoration-none"
                                style="color:#4C2A70">{{ $post->title }}</a>
                        </h5>
                    </div>
                    <div class="text-break content">
                        {!! \Illuminate\Support\Str::limit(strip_tags($post->body)) !!}
                        <p class="readMore"><a href="{{route('article', $post->id)}}"
                                class="text-decoration-none readMore">...閱讀更多</a></p>
                    </div>
                    <div class="socialIcons container-fluid row">
                        @if(auth()->check())
                        <i class="fa fa-heart col-2" style="
                                    color: @if(auth()->user()->likePost->where('post_id', $post->id)->count()==1) red @else black @endif ;
                                    " data-id="{{$post->id}}">
                            <span style="color:black;">
                                {{$post->likePost->count()}}
                            </span>
                        </i>
                        <i class="fa fa-bookmark col-2" style="
                                    color: @if(auth()->user()->collectPost->where('post_id', $post->id)->count()==1) red @else black @endif ;
                                    " data-id="{{$post->id}}">
                            <span style="color:black;">
                                {{$post->collectPost->count()}}
                            </span>
                        </i>
                        @else
                        <i class="fa fa-heart col-2" style="color: black;" data-id="{{$post->id}}">
                            <span style="color:black;">
                                {{$post->likePost->count()}}
                            </span>
                        </i>
                        <i class="fa fa-bookmark col-2" style="color: black;" data-id="{{$post->id}}">
                            <span style="color:black;">
                                {{$post->collectPost->count()}}
                            </span>
                        </i>
                        @endif

                        <p class="col-8">發表日期：{{ $post->created_at->format('Y/m/d') }}</p>
                    </div>
                </div>
            </div>
            @empty
            @endforelse

        </div>
    </div>

    <!-- navigation -->
    <div class="pagNav">
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