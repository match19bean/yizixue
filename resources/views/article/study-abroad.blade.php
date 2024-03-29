@extends('layouts.guest2')

@section('content')
    <div class="px-5">
        <!-- tag -->
        <div class="row">
            <h4 class="mt-3">首頁 > 留學誌 </h4>
        </div>
        <!-- search bar -->
        <div class="searchBar">
            <form method="get" action="{{route('study-abroad')}}">
                <svg x="0px" y="0px" viewBox="0 0 335.8 335.8">
                    <g>
                        <circle fill="#FFFFFF" cx="224.7" cy="111.1" r="77.6"/>
                        <circle fill="none" stroke="#FFFFFF" stroke-width="12" stroke-miterlimit="10" cx="224.7" cy="111.1" r="105.1"/>
                        <rect x="121.4" y="178.9" transform="matrix(0.7071 0.7071 -0.7071 0.7071 181.9803 -35.5915)" fill="#FFFFFF" width="25.1" height="45.9"/>
                        <rect x="45.3" y="183.6" transform="matrix(0.7071 0.7071 -0.7071 0.7071 206.129 22.7085)" fill="#FFFFFF" width="60.7" height="153.2"/>
                    </g>
                </svg>
                <input type="search" name="title">
                <button type="submit" style="display: none;"></button>
            </form>
        </div>
        <!-- title -->
        <div class="row">
            <h2 style="font-size: 3rem;color: #4C2A70">留學誌</h2>
        </div>
        <!-- main content -->
        <div class="row mt-4">
            <div class="col-3 text-center">
                <!-- categories -->
                <div class="row">
                    <ul class="list-group">

                        @forelse($Data['category'] as $category)
                            <li class="list-group-item" style="background-color: #4C2A70">
                                <a style="text-decoration: none;" class="text-white text-center" href="{{route('study-abroad', ['category_id' => $category->id])}}">
                                    <div class="border-bottom-light">{{$category->name}}</div>
                                </a>
                            </li>
                        @empty
                        @endforelse

                    </ul>
                </div>

                <!-- types (hot and new) -->
                <div class="row mt-5 d-flex flex-column">
                    <div style="border: 2px solid #4C2A70; border-radius: 30px;">
                        <a href="{{route('study-abroad', ['filter' => 'popular'])}}" style="text-decoration: none; color: #4C2A70">最熱門</a>
                    </div>
                    <div class="mt-3" style="border: 2px solid #4C2A70; border-radius: 30px;">
                        <a href="{{route('study-abroad',['filter'=>'latest'])}}" style="text-decoration: none; color: #4C2A70">最新</a>
                    </div>
                </div>
                <!-- call to action -->
                <div class="py-4 callToAction">
                    <div class="card-body text-white py-2 part1" style="background-color: #4C2A70;">
                        讓專業持續變現
                    </div>
                    <div class="card-body part2">
                        我們一起幫助學弟妹
                        <br>
                        更為自己創造收入
                        <br>
                        建立留學諮詢事業
                        <br>
                        <div class="text-white" style="background-color: #BD9EBE;">
                            立即成為學長姐
                        </div>
                    </div>
                </div>
            </div>
            <!-- posts -->
            <div class="col-9 postsSection">

                @forelse($Data['posts'] as $post)

                    <div class="row m-2 cardborder">
                        <!-- Post images -->
                        <div class="postImg">
                            <!-- img -->
                            <img class="postPhoto" src="{{ isset($post->post) ? asset('uploads/'.$post->post->image_path) : asset('uploads/'.$post->image_path) }}" alt="">
                            <img class="userimg" src="{{ asset('uploads/images/user2-160x160.jpg') }}" alt="">
                            <!-- namecard -->
                            <p class="text-white namecard">{{ isset($post->post) ? $post->post->author->name : $post->author->name  }}</p>
                        </div>
                        <!-- Post Contents -->
                        <div class="col-9">
                            <div class="postTitle" style="font-size:2rem;">
                                <h5 class="text-break">
                                    {{isset($post->post) ? $post->post->title : $post->title}}
                                </h5>
                                <p class="text-break">
                                    @forelse($post->category as $cate)
                                        <span class="mx-4" style="color: #4C2A70;">#{{$cate->postCategory->name}} </span>
                                    @empty
                                    @endforelse
                                </p>
                            </div>
                            <div class="text-break content">
                                {!! isset($post->post) ? \Illuminate\Support\Str::limit($post->post->body) : \Illuminate\Support\Str::limit($post->body) !!}
                                <p class="readMore"><a href="{{route('article', $post->id)}}" class="text-decoration-none readMore">...閱讀更多</a></p>
                            </div>
                            <div class="socialIcons">
                                <i class="fa fa-heart" style="font-size:30px;" data-id="{{$post->id}}">
                                </i>
                                <i class="fa fa-bookmark" style="font-size:30px;" data-id="{{$post->id}}">
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

                                <p>發表日期：{{ isset($post->post) ? $post->post->created_at->format('Y/m/d') : $post->created_at->format('Y/m/d')  }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse

            </div>
        </div>
    </div>

    <!-- navigation -->
    <div class="pagNav">
        <div class="d-flex" style="flex-direction: row; justify-content: space-evenly; ">
                <p class="text-primary">留學誌</p>
            {{$Data['posts']->appends($_GET)->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>

    <script>
        $('.socialIcons .fa-heart').click(function(){
            let that = $(this);
            $.ajax({
                url: "{{route('like-post')}}",
                method: 'GET',
                data: {id: $(this).data('id')},
                success: function (res) {
                    if(res.operator === 'no') {
                        alert(res.message);
                    } else if(res.operator === 'add') {
                        that.removeClass('text-black').addClass('text-danger');
                    } else if(res.operator === 'reduce') {
                        that.removeClass('text-danger').addClass('text-black');
                    }
                },
                error: function(error) {
                    console.log(error)
                }
            });
        });

        $('.socialIcons .fa-bookmark').click(function(){
            let that = $(this);
            $.ajax({
                url: "{{route('collect-post')}}",
                method: 'GET',
                data: {id: $(this).data('id')},
                success: function (res) {
                    if(res.operator === 'no') {
                        alert(res.message);
                    } else if(res.operator === 'add') {
                        that.removeClass('text-black').addClass('text-danger');
                    } else if(res.operator === 'reduce') {
                        that.removeClass('text-danger').addClass('text-black');
                    }
                },
                error: function(error) {
                    console.log(error)
                }
            });
        });
    </script>
@endsection