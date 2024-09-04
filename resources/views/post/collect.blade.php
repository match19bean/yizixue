@extends('layouts.sbadmin')

@section('content')
<!-- broccoli content -->
<div class="container pl-5 pr-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="o-sbadminTitle">收藏的文章</h2>
        </div>
    </div>
</div>
<div class="container p-5">
    <div class="row justify-content-center l-collectPost__cards">
    @forelse($Data['posts'] as $key => $post)
        <div class="col-md-9">
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
                                        {{ $cate->postCategory->name }}
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
        </div>
    @empty
    @endforelse
    </div>

</div>

@endsection