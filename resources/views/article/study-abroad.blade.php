@extends('layouts.guest2')

@section('content')
<!-- Breadcrumb and search bar -->
<div class="container">
    <div class="row">
        <!-- breadcrumb -->
        <div class="col-md-7">
            <div class="c-breadcrumbs">
                <div>
                    <h4 class="c-breadcrumbs__prePage"><a href="{{url('/')}}"
                            class="text-decoration-none text-black">首頁</a>
                        >
                        留學誌推薦
                    </h4>
                </div>
            </div>
        </div>
        <!-- search bar -->
        <div class="col-md-5 align-self-end">
            <div class="o-searchBar container">
                <form class="row" method="get" action="{{route('study-abroad')}}">
                    <svg class="col-1 col-md-1" x="0px" y="0px" viewBox="0 0 335.8 335.8">
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
                    <div class="col-11 col-md-11">
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
        <div class="col-md-3 pr-lg-5">
            <div class="row">
                <!-- topic -->
                <div class="col-md-12">
                    <div class="c-sideNav__topics row justify-content-start">
                        <button class="col-3 col-md-12 text-center"><a href="{{route('study-abroad')}}">全部文章</a>
                            <hr class="c-sideNav__hr">
                        </button>
                        @forelse($Data['category'] as $category)
                        @if($loop->last)
                        <button class="col-3 col-md-12 text-center"><a
                                href="{{route('study-abroad', ['category_id' => $category->id])}}">{{ !is_null($category->name) ? \Illuminate\Support\Str::limit($category->name , 10) : '' }}</a>
                            <!-- <hr class="c-sideNav__hr"> -->
                        </button>

                        @else
                        <button class="col-3 col-md-12 text-center"><a
                                href="{{route('study-abroad', ['category_id' => $category->id])}}">{{ !is_null($category->name) ? \Illuminate\Support\Str::limit($category->name , 10) : '' }}</a>
                            <hr class="c-sideNav__hr">
                        </button>

                        @endif
                        @empty
                        @endforelse
                    </div>
                </div>
                <!-- types (hot and new) -->
                <div class="col-6 col-md-12">
                    <a class="o-whiteBtn" href="{{route('study-abroad', ['filter' => 'popular'])}}">最熱門</a>
                </div>
                <div class="col-6 col-md-12">
                    <a class="o-whiteBtn" href="{{route('study-abroad',['filter'=>'latest'])}}">最新</a>
                </div>
                <!-- call to action -->
                <div class="col-md-12">
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
        </div>
        <!-- main article card -->
        <div class="col-md-9">
            <!-- cards -->
            <div>
                @forelse($Data['posts']->sortByDesc(function($post){ return $post->like_post_count + $post->collect_post_count; }) as $post)
                <div class="c-articleCard">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-4 col-md-3">
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
                                        <a class="align-content-center"
                                            href="{{route('get-introduction', $post->author->id)}}">
                                            {{ !is_null($post->author->nickname) ? \Illuminate\Support\Str::limit($post->author->nickname, 10) : '' }}
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <div class="col-8 col-md-9">
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
                                    <a class="c-articleCard__title" href="{{route('article', $post->id)}}">
                                        {{ !is_null($post->title) ? \Illuminate\Support\Str::limit($post->title , 35) : '' }}
                                    </a>
                                    <!-- content -->
                                    <p class="c-articleCard__content">{!!
                                        \Illuminate\Support\Str::limit(strip_tags($post->body)) !!}</p>
                                    <a class="o-readMore" href="{{route('article', $post->id)}}">...閱讀更多</a>
                                    <hr>
                                    <!-- reacts -->
                                    <div class="o-react w-100 p-3">
                                        @if(auth()->check())
                                        <i class="bi @if(auth()->user()->likePost->where('post_id', $post->id)->count()==1) bi-heart-fill @else bi-heart @endif u-cursor-pointer like-post"
                                            style="
                                    color: @if(auth()->user()->likePost->where('post_id', $post->id)->count()==1) red @else black @endif ;
                                    " data-id="{{$post->id}}">
                                            <span>
                                                {{$post->likePost->count()}}
                                            </span>
                                        </i>
                                        <i class="bi @if(auth()->user()->collectPost->where('post_id', $post->id)->count()==1) bi-bookmark-fill @else bi-bookmark @endif u-cursor-pointer collect-post"
                                            style="
                                    color: @if(auth()->user()->collectPost->where('post_id', $post->id)->count()==1) red @else black @endif ;
                                    " data-id="{{$post->id}}">
                                            <span>
                                                {{$post->collectPost->count()}}
                                            </span>
                                        </i>
                                        @else
                                        <i class="bi bi-heart like-post u-cursor-pointer" style="color: black;"
                                            data-id="{{$post->id}}">
                                            <span>
                                                {{$post->likePost->count()}}
                                            </span>
                                        </i>
                                        <i class="bi bi-bookmark collect-post u-cursor-pointer" style="color: black;"
                                            data-id="{{$post->id}}">
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
@endsection

@section('page_js')
<script>
    $('.like-post').click(function () {
        let that = $(this);
        $.ajax({
            url: "{{url('like-post')}}" + "/" + $(this).data('id'),
            method: 'GET',
            success: function (res) {
                if (res.operator === 'no') {
                    alert(res.message);
                } else if (res.operator === 'add') {
                    that.removeClass('bi-heart').removeClass('bi-heart-fill').addClass(
                        'bi-heart-fill').css('color', 'red').children('span').text(res.total);

                } else if (res.operator === 'reduce') {
                    that.removeClass('bi-heart').removeClass('bi-heart-fill').addClass('bi-heart')
                        .css('color', 'black').children('span').text(res.total);
                }
            },
            error: function (error) {
                console.log(error)
            }
        });
    });

    $('.collect-post').click(function () {
        let that = $(this);
        $.ajax({
            url: "{{url('collect-post')}}" + "/" + $(this).data('id'),
            method: 'GET',
            success: function (res) {
                if (res.operator === 'no') {
                    alert(res.message);
                } else if (res.operator === 'add') {
                    that.removeClass('bi-bookmark').removeClass('bi-bookmark-fill').addClass(
                        'bi-bookmark-fill').css('color', 'red').children('span').text(res.total);
                } else if (res.operator === 'reduce') {
                    that.removeClass('bi-bookmark').removeClass('bi-bookmark-fill').addClass(
                        'bi-bookmark').css('color', 'black').children('span').text(res.total);
                }
            },
            error: function (error) {
                console.log(error)
            }
        });
    });
</script>
@endsection