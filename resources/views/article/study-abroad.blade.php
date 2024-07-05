@extends('layouts.guest2')

@section('content')
<!-- Breadcrumb and search bar -->
<div class="container">
    <div class="row">
        <!-- breadcrumb -->
        <div class="col-md-7">
            <div class="c-breadcrumbs">
                <div>
                    <h4 class="c-breadcrumbs_prePage"><a href="{{url('/')}}"
                            class="text-decoration-none text-black">首頁</a>
                        >
                        留學誌
                    </h4>
                    <h3 class="c-breadcrumbs_currentPage">留學誌</h3>
                </div>
            </div>
        </div>
        <!-- search bar -->
        <div class="col-md-5 align-self-end">
            <div class="o-searchBar container">
                <form class="row" method="get" action="{{route('study-abroad')}}">
                    <svg class="col-md-1" x="0px" y="0px" viewBox="0 0 335.8 335.8">
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
                    <div class="col-md-11">
                        <input class="o-searchBar__input" type="search" name="title">
                        <button type="submit" style="display: none;"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- main content -->
<div class="container">
    <div class="row">
        <!-- side bar -->
        <div class="col-md-3">
            <!-- sideBar -->
            <div class="sideBar">
                <!-- categories -->
                <div class="c-sideNav_selections_topics">
                    <button><a style="text-decoration: none;" class="text-white text-center"
                            href="{{route('study-abroad')}}">
                            全部文章
                        </a></button>
                    <hr class="c-sideNav__hr">
                    @forelse($Data['category'] as $category)
                    <button><a style="text-decoration: none;" class="text-white text-center"
                            href="{{route('study-abroad', ['category_id' => $category->id])}}">
                            {{$category->name}}
                        </a></button>
                    <hr class="c-sideNav__hr">
                    @empty
                    @endforelse
                </div>

                <!-- types (hot and new) -->
                <a class="o-whiteBtn" href="{{route('study-abroad', ['filter' => 'popular'])}}">最熱門</a>
                <a class="o-whiteBtn" href="{{route('study-abroad',['filter'=>'latest'])}}">最新</a>
                <!-- call to action -->
                @if(auth()->guest() || !auth()->user()->isVip())
                <div class="c-callAction">
                    <h5 class="c-callAction__title">
                        讓專業持續變現
                    </h5>
                        <p class="c-callAction__content">
                            我們一起幫助學弟妹
                            <br>
                            更為自己創造收入
                            <br>
                            建立留學諮詢事業
                            <br>
                        </p>
                        <a class="o-lightBtn m-3" href="{{route('pay-product-list')}}">立即成為學長姐</a>
                </div>
                @endif
            </div>
        </div>
        <!-- main article card -->
        <div class="col-md-9">
            <!-- cards -->
            <div>
                @forelse($Data['posts'] as $post)
                <div class="c-articleCard">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <!-- Post images -->
                                <div class="c-articleCard__postThumbnail">
                                    <!-- post img -->
                                    @if(is_null($post->image_path))
                                    <span class="c-articleCard__postThumbnail__postPhoto"
                                        style="background-image: url('{{asset('uploads/images/default_avatar.png')}}') ;">&nbsp;</span>
                                    @else
                                    <span class="c-articleCard__postThumbnail__postPhoto"
                                        style="background-image: url('/uploads/{{$post->image_path}}');">&nbsp;</span>
                                    @endif
                                    <div class="c-articleCard__postThumbnail__userInfo">
                                        <!-- user img -->
                                            @if(is_null($post->image_path))
                                            <span
                                                style="background-image: url('{{asset('uploads/images/default_avatar.png')}}') ;">&nbsp;</span>
                                            @else
                                            <span
                                                style="background-image: url('/uploads/{{$post->author->avatar}}');">&nbsp;</span>
                                            @endif
                                        <!-- namecard -->
                                            <a href="{{route('get-introduction', $post->author->id)}}">
                                                {{ $post->author->name  }}
                                            </a>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-9">
                                <!-- Post Contents -->
                                <div class="c-articleCard__postInfo">
                                    <!-- tags -->
                                    <div>
                                        @forelse($post->category as $count => $cate)
                                        @if($count < 3) <a
                                            href="{{route('study-abroad', ['category_id' => $cate->postCategory->id])}}"
                                            class="o-tag">
                                            {{$cate->postCategory->name}}
                                            </a>
                                            @endif
                                            @empty
                                            @endforelse
                                    </div>
                                    <!-- title -->
                                    <a class="c-articleCard__title"
                                        href="{{route('article', $post->id)}}">{{ $post->title }}</a>
                                    <!-- content -->
                                    <p class="c-articleCard__content">{!!
                                        \Illuminate\Support\Str::limit(strip_tags($post->body)) !!}</p>
                                    <a class="o-readMore" href="{{route('article', $post->id)}}">...閱讀更多</a>
                                    <hr>
                                    <!-- reacts -->
                                    <div class="o-react w-100 p-3">
                                        @if(auth()->check())
                                        <i class="bi bi-heart" style="
                                    color: @if(auth()->user()->likePost->where('post_id', $post->id)->count()==1) red @else black @endif ;
                                    " data-id="{{$post->id}}">
                                            <span>
                                                {{$post->likePost->count()}}
                                            </span>
                                        </i>
                                        <i class="bi bi-bookmark" style="
                                    color: @if(auth()->user()->collectPost->where('post_id', $post->id)->count()==1) red @else black @endif ;
                                    " data-id="{{$post->id}}">
                                            <span>
                                                {{$post->collectPost->count()}}
                                            </span>
                                        </i>
                                        @else
                                        <i class="bi bi-heart" style="color: black;" data-id="{{$post->id}}">
                                            <span>
                                                {{$post->likePost->count()}}
                                            </span>
                                        </i>
                                        <i class="bi bi-bookmark" style="color: black;" data-id="{{$post->id}}">
                                            <span>
                                                {{$post->collectPost->count()}}
                                            </span>
                                        </i>
                                        @endif
                                        <!-- date -->
                                        <p class="c-articleCard__date">發表日期：{{ $post->created_at->format('Y/m/d') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                @empty
                @endforelse

            </div>
            <!-- navigation -->
            <div class="c-pagination">
                    {{$Data['posts']->appends($_GET)->links('vendor.pagination.bootstrap-4')}}
            </div>
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