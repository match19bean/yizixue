@extends('layouts.guest2')

@section('content')
<!-- breadcrumb -->
<div class="container">
    <div class="c-breadcrumbs">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="c-breadcrumbs__prePage">
                    <a href="{{url('/')}}" class="text-decoration-none text-black">首頁</a>> 問與答諮詢
                </h4>
            </div>
        </div>
    </div>
</div>

<div class="container l-qnaIndex">
    <div class="row">
        <!-- side bar -->
        <div class="col-md-3 pr-lg-5">
            <div class="row">
                <!-- categories -->
                <div class="col-md-12">
                    <div class="c-sideNav__topics row justify-content-start">
                        <button class="col-3 col-md-12 text-center"><a href="{{route('qna')}}">全部問答</a>
                            <hr class="c-sideNav__hr">
                        </button>
                        @forelse($categories as $category)
                        @if($loop->last)
                        <button class="col-3 col-md-12 text-center"><a
                                href="{{route('qna', ['category_id'=>$category->id])}}">{{ !is_null($category->name) ? \Illuminate\Support\Str::limit($category->name , 10) : '' }}</a>
                            <!-- <hr class="c-sideNav__hr"> -->
                        </button>

                        @else
                        <button class="col-3 col-md-12 text-center"><a
                                href="{{route('qna', ['category_id'=>$category->id])}}">{{ !is_null($category->name) ? \Illuminate\Support\Str::limit($category->name , 10) : '' }}</a>
                            <hr class="c-sideNav__hr">
                        </button>

                        @endif
                        @empty
                        @endforelse
                    </div>
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
        <!-- content -->
        <div class="col-md-9">
            <!-- qa cards -->
            @if(!is_null($qas))
            @forelse($qas as $num => $qa)
            <div class="row m-3 m-md-5">
                <div class="c-qnaCard">
                    <div class="row">
                        <!-- content -->
                        <div class="col-10 col-md-11 p-2 p-md-5">
                            <div class="row">
                                <!-- author -->
                                <div class="col-md-2 d-flex p-3">
                                    <svg class="c-qnaCard__thumbNail" viewbox="0 0 100 100">
                                        <circle cx="50" cy="50" r="50" />
                                    </svg>
                                    <p class="align-content-center">{{ (auth()->check() && auth()->user()->isVip() ) ? $qa->author->nickname : mb_substr($qa->author->nickname, 0, 1).'*****'}}</p>

                                </div>
                                <div class="col-md-10 align-content-center">
                                    @if($qa->category)
                                    <span class="o-tag">
                                        {{$qa->category->name}}
                                    </span>
                                    @endif
                                </div>
                                <hr>
                                <!-- title -->
                                <a class="col-md-12 o-articleTitle" href="{{route('qna.show', $qa->id)}}">
                                    {{ !is_null($qa->title) ? \Illuminate\Support\Str::limit( $qa->title , 20) : '' }}
                                </a>
                                <!-- content -->
                                <div class="col-md-10">
                                    <p class="c-qnaCard__content">
                                        {!! !is_null($qa->body) ? \Illuminate\Support\Str::limit( $qa->body , 50) : '' !!}
                                    </p>
                                </div>
                                <!-- bookmark -->
                                <div class="col-md-2 c-qnaCard__bookmark">
                                    <div class="lign-content-end">
                                        @if(auth()->check())
                                        <i class="bi @if(auth()->user()->collectQa->where('qa_id', $qa->id)->count()==1) bi-bookmark-fill @else bi-bookmark @endif  collect-qa d-flex"
                                            data-id="{{$qa->id}}" style="
                                    color: @if(auth()->user()->collectQa->where('qa_id', $qa->id)->count()==1) red @else black @endif ;
                                            ">
                                            <span>{{$qa->collectQa->count()}}</span>
                                        </i>
                                        @else
                                        <i class="bi bi-bookmark collect-qa d-flex" data-id="{{$qa->id}}">
                                            <span>{{$qa->collectQa->count()}}</span>
                                        </i>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- svg -->
                        <div class="col-2 col-md-1 p-0">
                            <svg viewBox="0 0 45 150">
                                <polygon fill="#4C2A70" points="50,150 0,150 35,75 0,0 50,0 " />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- new posts -->
            @if($num==1)
            <div class="container">
                <div class="row">
                    <div class="col-md-12 p-0">
                        <h2 class="o-normalTitle ml-5">最新文章</h2>
                    </div>
                    @if(!is_null($posts))
                    @foreach($posts as $post)
                    <!-- new posts -->
                    <div class="col-md-6 p-2 p-md-4">
                        <div class="c-articleCard">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-4 col-md-3 p-0">
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
                                        </div>
                                    </div>
                                    <div class="col-8 col-md-9">
                                        <!-- Post Contents -->
                                        <div class="c-articleCard__postInfo">
                                            <!-- title -->
                                            <a class="c-articleCard__title" href="{{route('article', $post->id)}}">
                                                {{!is_null($post->title) ? \Illuminate\Support\Str::limit(strip_tags($post->title), 13): ''}}
                                            </a>
                                            <!-- content -->
                                            <p class="c-articleCard__content">
                                                {{!is_null(strip_tags($post->body)) ? \Illuminate\Support\Str::limit(strip_tags($post->body), 35): ''}}
                                            </p>
                                            <a class="o-readMore" href="{{route('article', $post->id)}}">...閱讀更多</a>
                                            <hr>
                                            <!-- reacts -->
                                            <div class="o-react w-100 pb-2 pr-2">
                                                @if(auth()->check())
                                                <i class="bi @if(auth()->user()->likePost->where('post_id', $post->id)->count()==1) bi-heart-fill @else bi-heart @endif  like-post"
                                                    style="
                                    color: @if(auth()->user()->likePost->where('post_id', $post->id)->count()==1) red @else black @endif ;
                                    " data-id="{{$post->id}}">
                                                    <span>
                                                        {{$post->likePost->count()}}
                                                    </span>
                                                </i>
                                                <i class="bi @if(auth()->user()->collectPost->where('post_id', $post->id)->count()==1) bi-bookmark-fill @else bi-bookmark @endif collect-post"
                                                    style="
                                    color: @if(auth()->user()->collectPost->where('post_id', $post->id)->count()==1) red @else black @endif ;
                                    " data-id="{{$post->id}}">
                                                    <span>
                                                        {{$post->collectPost->count()}}
                                                    </span>
                                                </i>
                                                @else
                                                <i class="bi bi-heart like-post" data-id="{{$post->id}}">
                                                    <span>
                                                        {{$post->likePost->count()}}
                                                    </span>
                                                </i>
                                                <i class="bi bi-bookmark like-collect-post" data-id="{{$post->id}}">
                                                    <span>
                                                        {{$post->collectPost->count()}}
                                                    </span>
                                                </i>
                                                @endif
                                                <!-- date -->
                                                <p class="c-articleCard__date">
                                                    發表日期：{{ $post->created_at->format('Y/m/d') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <p class="col-md-12">
                        目前尚無文章
                    </p>
                    @endif
                </div>
            </div>
            @endif
            @empty
            <div class="col-md-12">
                <p class="vh-100">
                    目前尚無資料
                </p>
            </div>
            @endforelse
            <!-- pagination -->
            <div class="col-md-12">
                <div class="c-pagination">
                    {!! $qas->appends($_GET)->links('vendor.pagination.bootstrap-4') !!}
                </div>
            </div>
            @endif
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
                        'bi-heart-fill').css('color', 'red');
                    that.children('span').text(res.total);
                } else if (res.operator === 'reduce') {
                    that.removeClass('bi-heart').removeClass('bi-heart-fill').addClass('bi-heart')
                        .css('color', 'black');
                    that.children('span').text(res.total);
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
                        'bi-bookmark-fill').css('color', 'red');
                    that.children('span').text(res.total);
                } else if (res.operator === 'reduce') {
                    that.removeClass('bi-bookmark').removeClass('bi-bookmark-fill').addClass(
                        'bi-bookmark').css('color', 'black');
                    that.children('span').text(res.total);
                }
            },
            error: function (error) {
                console.log(error)
            }
        });
    });

    $('.collect-qa').click(function () {
        let that = $(this);
        $.ajax({
            url: "{{url('collect-qa')}}" + "/" + $(this).data('id'),
            method: 'GET',
            success: function (res) {
                if (res.operator === 'no') {
                    alert(res.message);
                } else if (res.operator === 'add') {
                    that.removeClass('bi-bookmark').removeClass('bi-bookmark-fill').addClass(
                        'bi-bookmark-fill').css('color', 'red');
                    that.children('span').text(res.total);
                } else if (res.operator === 'reduce') {
                    that.removeClass('bi-bookmark').removeClass('bi-bookmark-fill').addClass(
                        'bi-bookmark').css('color', 'black');
                    that.children('span').text(res.total);
                }
            },
            error: function (error) {
                console.log(error)
            }
        });
    });
</script>
@endsection