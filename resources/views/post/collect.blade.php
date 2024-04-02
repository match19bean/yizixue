@extends('layouts.sbadmin')

@section('content')
<!-- broccoli content -->
<div class="collectPost">
    <h2>收藏的文章</h2>
    <!-- broccoli post -->
    <div class="postsSection">
            @foreach ($Data['posts'] as $key => $post)
                <div class="cardborder">
                    <!-- Post images -->
                    <div class="postImg">
                        <!-- img -->
                        <img class="postPhoto" src="{{ isset($post->post) ? asset('uploads/'.$post->post->image_path) : asset('uploads/'.$post->image_path) }}" alt="">
                        <img class="userimg" src="{{ asset('uploads/images/user2-160x160.jpg') }}" alt="">
                        <!-- namecard -->
                        <p class="text-white namecard">Name</p>
                    </div>
                    <!-- Post Contents -->
                    <div class="">
                        <div class="postTitle" style="font-size:2rem;">
                            <h5 class="text-break">
                            {{$post->title}}
                            </h5>
                            <p class="text-break">#Category</p>
                        </div>

                        <div class="text-break content">
                            {!!substr($post->body, 0, 300)!!}...
                            <p class="readMore">...閱讀更多</p>
                        </div>
                        <div class="socialIcons">
                                <i class="fa fa-heart" style="font-size:30px; color:red;">
                                </i>
                                <i class="fa fa-bookmark" style="font-size:30px;">
                                    <span style="color:black"></span>
                                </i>
                                <i>
                                    <svg viewBox="0 0 512 512" >
                                        <path d="M295.4,235.2c32.9,0,59.5-26.7,59.5-59.5s-26.7-59.5-59.5-59.5s-59.5,26.7-59.5,59.5c0,2.5,0.1,5,0.4,7.4l-58.4,29.1
                                            c-10.7-10.4-25.2-16.7-41.3-16.7c-32.9,0-59.5,26.7-59.5,59.5s26.7,59.5,59.5,59.5c16.1,0,30.6-6.3,41.3-16.7l58.4,29.1
                                            c-0.3,2.4-0.4,4.8-0.4,7.4c0,32.9,26.7,59.5,59.5,59.5s59.5-26.7,59.5-59.5s-26.7-59.5-59.5-59.5c-16.1,0-30.6,6.3-41.3,16.7
                                            l-58.4-29.1c0.3-2.4,0.4-4.8,0.4-7.4c0-2.5-0.1-5-0.4-7.4l58.4-29.1C264.7,228.8,279.3,235.2,295.4,235.2z"/>
                                        <circle class="st0" cx="224" cy="256" r="216.3"/>
                                    </svg>
                                </i>

                                <p>發表日期：{{$post->created_at}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
    <!-- end -->
</div>

@endsection
