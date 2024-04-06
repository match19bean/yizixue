@extends('layouts.guest2')

@section('content')
    <div class="container introduction">
        <div class="introCard">
            <!-- portriat -->
            <img class="portriat img-response w-100" src="{{asset('uploads/'.$Data['user']->avatar)}}" alt="">
            <!-- name card -->
            <div class="nameCard row justify-content-center text-white" style="color: #4C2A70; background-color: #BD9EBE;">
                <h2 class='text-center text-white w-100'>{{$Data['user']->name}}</h2>
                <h6 class="text-center w-100">
                    {{!is_null($Data['user']->universityItem) ?$Data['user']->universityItem->name:''}}
                </h6>
            </div>
            <!-- post categ -->
            <div class="postCateg row row-cols-3 mt-3">
                @if(!is_null($Data['user']->postCategory))
                    @foreach($Data['user']->postCategory as $relation)
                        <div class="col px-2 text-center">
                            <span class="btn mx-auto text-white w-100" style="background-color: #4C2A70; border-radius: 0;">{{$relation->postCategory->name}}</span>
                        </div>
                    @endforeach
                @endif
            </div>
            <!-- user skill -->
            <div class="skill row row-cols-3 mt-3">
                @if(!is_null($Data['user']->skills))
                    @foreach($Data['user']->skills as $skill)
                        <div class="col px-2 text-center">
                            <span class="btn w-100 mx-auto m-1" style="color: #4C2A70; border-color: #4C2A70;">
                                <b>{{ $skill->skill->name }}</b>
                            </span>
                        </div>
                    @endforeach
                @endif
            </div>
            <!-- react -->
            <div class="react">
                @if(auth()->check())
                    <i class="fa fa-heart" style="
                    margin:5px;
                    color:  @if($Data['user']->likedUser->where('uid', auth()->user()->id)->where('user_id', $Data['user']->id)->count() == 1) red @else black @endif
                    " data-id="{{$Data['user']->id}}">
                        <span style="color:black">{{$Data['user']->likedUser->count()}}</span>
                    </i>
                    <i class="fa fa-bookmark" style="
                    margin:5px;
                    color:  @if($Data['user']->collectedUser->where('uid', auth()->user()->id)->where('user_id', $Data['user']->id)->count() == 1) red @else black @endif
                    "  data-id="{{$Data['user']->id}}">
                        <span style="color:black">{{$Data['user']->collectedUser->count()}}</span>
                    </i>

                @else
                    <i class="fa fa-heart text-black" style="margin:5px">
                        <span style="color:black">{{$Data['user']->likedUser->count()}}</span>
                    </i>
                    <i class="fa fa-bookmark" style="margin:5px">
                        <span style="color:black">{{$Data['user']->collectedUser->count()}}</span>
                    </i>
                @endif
                <svg viewBox="0 0 512 512" >
                    <path d="M295.4,235.2c32.9,0,59.5-26.7,59.5-59.5s-26.7-59.5-59.5-59.5s-59.5,26.7-59.5,59.5c0,2.5,0.1,5,0.4,7.4l-58.4,29.1
                        c-10.7-10.4-25.2-16.7-41.3-16.7c-32.9,0-59.5,26.7-59.5,59.5s26.7,59.5,59.5,59.5c16.1,0,30.6-6.3,41.3-16.7l58.4,29.1
                        c-0.3,2.4-0.4,4.8-0.4,7.4c0,32.9,26.7,59.5,59.5,59.5s59.5-26.7,59.5-59.5s-26.7-59.5-59.5-59.5c-16.1,0-30.6,6.3-41.3,16.7
                        l-58.4-29.1c0.3-2.4,0.4-4.8,0.4-7.4c0-2.5-0.1-5-0.4-7.4l58.4-29.1C264.7,228.8,279.3,235.2,295.4,235.2z"/>
                    <circle class="st0" cx="224" cy="256" r="216.3"/>
                </svg>
            </div>
            <p class="state">在學中</P>
            <div class="socialBtn">
                <!-- commited the social btns -->
                <!-- <i class="bi bi-facebook"></i>
                <i class="bi bi-instagram"></i>
                <svg viewBox="0 0 100 100">
                    <path fill="#ffffff" d="M48.8,0.2c0.9,0,1.8,0,2.7,0c0.5,0.3,1.1,0.2,1.7,0.2c2,0.1,4,0.3,5.9,0.7c13.6,2.7,24.3,9.6,32.2,21
                            c4.8,6.8,7.5,14.5,8.4,22.8c0.1,1.3-0.1,2.7,0.4,4c0,0.9,0,1.8,0,2.7c-0.2,0.4-0.2,0.7-0.2,1.1c0,2.5-0.4,5-0.9,7.4
                            c-2.8,13.1-9.7,23.5-20.6,31.1c-6.9,4.8-14.6,7.6-22.9,8.5c-1.3,0.1-2.7-0.1-3.9,0.4c-0.9,0-1.8,0-2.7,0c-0.4-0.3-0.9-0.2-1.3-0.2
                            c-3.4-0.1-6.7-0.6-9.9-1.5c-13-3.5-23-11-30-22.4c-3.9-6.3-6.2-13.2-7-20.6c-0.1-1.3,0.1-2.7-0.4-4c0-0.9,0-1.8,0-2.7
                            c0.2-0.4,0.2-0.9,0.2-1.4c0.1-2.8,0.5-5.6,1.1-8.3C4.8,25.5,12.4,15,24.2,7.6c6.3-3.9,13.2-6.2,20.6-7C46.2,0.5,47.5,0.7,48.8,0.2z
                            M50.9,22.8c-3.3,0-5.9,0.3-8.4,0.8c-7.1,1.5-13.4,4.6-18.2,10.2c-4.5,5.3-6.4,11.3-5,18.2c1.1,5.5,4.3,9.8,8.6,13.3
                            c5.2,4.2,11.3,6.4,17.9,7.2c1.2,0.1,1.7,0.7,1.6,1.9c-0.1,1.7-0.3,3.4-0.5,5c-0.1,0.9-0.1,1.8,0.7,2.4c0.8,0.5,1.5,0.3,2.3-0.1
                            c3.5-1.7,6.9-3.6,10.2-5.7c7.2-4.6,13.6-10,18.2-17.3c2.9-4.6,3.9-9.5,2.9-14.8c-1.1-5.6-4.1-10-8.4-13.5
                            C66.2,25.1,58.5,22.9,50.9,22.8z"/>
                    <path fill="#ffffff" d="M52.3,47.2c0,0.7,0,1.4,0,2.1c0,1.6,0,3.2,0,4.8c0,1.1-0.6,1.7-1.5,1.7c-0.9,0-1.5-0.6-1.5-1.7
                            c0-3.9,0-7.7,0-11.6c0-0.8,0.3-1.4,1-1.6c0.8-0.3,1.4,0,1.9,0.7c1.7,2.3,3.5,4.6,5.3,6.9c0.3,0.4,0.6,0.7,0.8,1.1
                            c0.4-0.3,0.3-0.6,0.3-0.9c0-1.8,0-3.6,0-5.5c0-0.4,0-0.8,0.1-1.2c0.2-0.8,0.7-1.2,1.6-1.2c0.8,0.1,1.3,0.6,1.3,1.4
                            c0,1.9,0,3.8,0,5.7c0,2.1,0,4.2,0,6.2c0,0.8-0.3,1.4-1,1.6c-0.7,0.2-1.3,0-1.8-0.6c-1.8-2.4-3.7-4.7-5.5-7.1
                            c-0.2-0.3-0.4-0.6-0.7-0.8C52.5,47.2,52.4,47.2,52.3,47.2z"/>
                    <path fill="#ffffff" d="M64.1,48.4c0-1.9,0-3.8,0-5.7c0-1.3,0.5-1.8,1.8-1.9c2,0,4,0,5.9,0c1.1,0,1.7,0.5,1.7,1.4
                            c0,0.9-0.6,1.6-1.7,1.6c-1.3,0-2.7,0-4,0c-0.5,0-0.8,0.2-0.8,0.7c0,2.7-0.3,2.2,2.1,2.3c0.9,0,1.8,0,2.7,0c0.9,0,1.5,0.6,1.6,1.4
                            c0,0.8-0.6,1.5-1.5,1.5c-1.3,0.1-2.7,0-4,0c-0.7,0-1,0.2-0.9,1c0.1,2.4-0.4,2.1,2,2.1c1,0,2,0,2.9,0c1,0,1.5,0.6,1.5,1.5
                            c0,0.9-0.6,1.4-1.5,1.4c-2.1,0-4.2,0-6.3,0c-1.1,0-1.6-0.6-1.6-1.6C64.1,52.3,64.1,50.3,64.1,48.4z"/>
                    <path fill="#ffffff" d="M32.6,48.2c0-2,0-3.9,0-5.9c0-1.2,1-1.9,2.1-1.5c0.7,0.3,0.9,0.9,0.9,1.7c0,3,0,6,0,9.1
                            c0,0.9,0.2,1.3,1.2,1.2c1.2-0.1,2.4,0,3.6,0c1,0,1.6,0.6,1.6,1.4c0,0.9-0.6,1.5-1.6,1.5c-2,0-4,0-5.9,0c-1.3,0-1.8-0.5-1.8-1.8
                            C32.5,52.2,32.6,50.2,32.6,48.2C32.6,48.2,32.6,48.2,32.6,48.2z"/>
                    <path fill="#ffffff" d="M46.7,48.4c0,2,0,4,0,6c0,1.1-0.3,1.5-1.5,1.5c-1.1,0-1.6-0.4-1.6-1.5c0-4,0-8.1,0-12.1
                            c0-1.1,0.4-1.5,1.6-1.5c1.1,0,1.4,0.3,1.4,1.5C46.7,44.3,46.7,46.3,46.7,48.4z"/>
                </svg> -->
                @if(is_null($Data['user']->profile_video))
                <a class="text" onClick="alert('學長姐尚未上傳影音');">
                    <img class="card-img-top" src="https://cdn.pixabay.com/photo/2016/02/01/12/33/play-1173551_640.png" alt="Card image cap">
                </a>
                @else
                <a href="{{$Data['user']->profile_video}}" class="text" target="_blank">
                    <img class="card-img-top" src="https://cdn.pixabay.com/photo/2016/02/01/12/33/play-1173551_640.png" alt="Card image cap">
                </a>
                @endif
                @if(is_null($Data['user']->profile_voice))
                    <a class="text" onClick="alert('學長姐尚未上傳影音');">
                        <i class="bi bi-mic-fill"></i>
                    </a>
                @else
                    <a href="{{$Data['user']->profile_voice}}" target="_blank">
                        <i class="bi bi-mic-fill"></i>
                    </a>
                @endif
            </div>
        </div>
        <!-- detail section -->
        <div class="detail">
            <hr>
            <div class="row">
                <div class="col-12">
                    <h2>自我介紹</h2>
                </div>
                <p class="col-12 text-truncate ">
                    @if(is_null($Data['user']->description))
                        尚未填寫自我介紹
                    @else
                        {!!  $Data['user']->description   !!}
                    @endif
                </p>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <h2>學歷經歷</h2>
                </div>
                <p class="col-12">
                    {{ !is_null($Data['user']->universityItem) ? $Data['user']->universityItem->name : '' }}
                </p>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <h2>社交網路</h2>
                </div>
                <div class="col-12">
                    <p>LINE:{{$Data['user']->line}}</p>
                    <p>FB:{{$Data['user']->fb}}</p>
                    <p>IG:{{$Data['user']->ig}}</p>
                </div>
            </div>
            <hr>
            <!-- posts cards -->
            <div class="row postCard">
                <div class="col-12">
                    <a class=" text-black" href="{{route('article-list', $Data['user']->id)}}" style="text-decoration: none;"><h2>我的文章</h2></a>
                </div>
                <div class="row row-cols-2">
                    @if(!is_null($Data['user']->post))
                        @foreach($Data['user']->post as $post)
                            <div class="card border-dark">
                                <!-- img part -->
                                <img class="imgPart" src="{{ asset('uploads'.$post->image_path)  }}" alt="">
                                <!-- info part -->
                                <div class="infoPart">
                                    <div class="px-3">
                                        <h3><a href="{{ route('article-list', $Data['user']->id) }}" style="color: #4C2A70; text-decoration: none;">{{$post->title}}</a></h3>
                                        <p>
                                            {!! \Illuminate\Support\Str::limit($post->body) !!}
                                        </p>
                                        <p class="text-right mb-0">
                                            發布日期：{{$post->created_at->format('Y/m/d')}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <h2>與我聯繫</h2>
                </div>
                <div class="col-12">
                    <p>電子郵件：{{$Data['user']->email}}</p>
                    <p>手機號碼：{{$Data['user']->phone}}</p>
                </div>
            </div>
            <hr>
            <!-- carousel section -->
            <div class="row">
                <div>
                    <h2>參考文件</h2>
                    <!-- attachments -->
                    <div class="attachment d-flex flex-row">
                        <!-- files -->
                        @forelse($Data['user']->references as $reference)
                            <a href="{{route('reference-download', $reference->id)}}" class="text-decoration-none text-black">
                                <div class="file d-flex">
                                    <svg>
                                        <rect width="100%" height="80%" x="0" y="0" fill="white" />
                                        <foreignObject width="120" height="100">
                                            <body xmlns="http://www.w3.org/1999/xhtml">
                                            <p style="font-size: 0.8rem;">{{pathinfo($reference->file_name)['filename']}}</p>
                                            </body>
                                        </foreignObject>
                                    </svg>
                                </div>
                            </a>
                        @empty
                            <div>
                                尚無參考文件下載
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <hr>
            <!-- real carsuel -->
            <div class="carouselSection">
                <!-- from welcome -->
                <div class="owl-carousel owl-theme studentNav">
                    @foreach ($Data['vip'] as $key => $user)
                        <!-- student card -->
                        <div class="item studentC">
                            <div>
                                <div class="cards">
                                    <!-- student profile pic -->
                                    <div class="studentProfile">
                                        <div class="studentImg">
                                            @if(is_null($user->avatar))
                                                <img src="{{asset('uploads/images/default_avatar.png')}}" alt="Card image cap">
                                            @else
                                                <img src="{{ asset('uploads/'.$user->avatar) }}" alt="Card image cap">
                                            @endif
                                        </div>
                                        <!-- video Btn -->
                                        <div class="videoBtn">
                                            @if(is_null($user->profile_video))
                                                <a class="text" onClick="alert('學長姐尚未上傳影音');">
                                                    <img class="card-img-top" src="https://cdn.pixabay.com/photo/2016/02/01/12/33/play-1173551_640.png" alt="Card image cap">
                                                </a>
                                            @else
                                                <a href="{{ $user->profile_video }}" class="text" target="_blank">
                                                    <img class="card-img-top" src="https://cdn.pixabay.com/photo/2016/02/01/12/33/play-1173551_640.png" alt="Card image cap">
                                                </a>
                                            @endif
                                        </div>
                                        <!-- react icons -->
                                        <div class="react">
                                            @if(auth()->check())
                                                <i class="fa fa-heart"
                                                style="
                                                color:@if($user->likedUser->where('uid', auth()->user()->id)->where('user_id', $user->id)->count() == 1) red @else black @endif
                                                "
                                                data-id="{{$user->id}}"
                                                >
                                                    <span class="text-black">{{$user->likedUser->count()}}</span>
                                                </i>
                                                <i class="fa fa-bookmark" data-id="{{$user->id}}"
                                                   style="
                                                   color:@if($user->collectedUser->where('uid', auth()->user()->id)->where('user_id', $user->id)->count() == 1) red @else black @endif
                                                   "
                                                >
                                                    <span class="text-black">{{$user->collectedUser->count()}}</span>
                                                </i>
                                            @else
                                                <i class="fa fa-heart text-black" data-id="{{$user->id}}">
                                                    <span class="text-black">{{$user->likedUser->count()}}</span>
                                                </i>
                                                <i class="fa fa-bookmark" data-id="{{$user->id}}">
                                                    <span class="text-black">{{$user->collectedUser->count()}}</span>
                                                </i>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- name card -->
                                    <div class="name-card">
                                        <h4>{{ $user->name }}</h4>
                                        <h4>{{ !is_null($user->universityItem) ? $user->universityItem->name:'' }}</h4>
                                    </div>
                                    <!-- post tag -->
                                    <div class="postTags">
                                        @foreach($user->postCategory as $key => $postCategoryRelation)
                                            @if($key<3)
                                            <span href="#">{{$postCategoryRelation->postCategory->name}}</span>
                                            @endif
                                        @endforeach
                                    </div>
                                    <!-- skill tag -->
                                    <div class="skillTags">
                                        @foreach($user->skills as $key => $skillRelation)
                                            @if($key<6)
                                            <span href="#">{{$skillRelation->skill->name}}</span>
                                                @if($key==2)
                                                    <br>
                                                @endif
                                            @endif
                                        @endforeach
                                    </div>
                                    <!-- more info -->
                                    <a href="{{url('introduction/'.$user->id)}}" style="text-decoration: none; color: dimgrey; text-align:center;">點擊查看更多</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.fa-heart').click(function(){
            let that = $(this);
            $.ajax({
                url: "{{url('like-user')}}"+"/"+$(this).data('id'),
                method: 'GET',
                success: function (res) {
                    if(res.operator === 'no') {
                        alert(res.message);
                    } else if(res.operator === 'add') {
                        that.css('color', 'red');
                        that.children('span').text(res.total);
                    } else if(res.operator === 'reduce') {
                        that.css('color', 'black');
                        that.children('span').text(res.total);
                    }
                },
                error: function(error) {
                    console.log(error)
                }
            });
        })

        $('.fa-bookmark').click(function(){
            let that = $(this);
            $.ajax({
                url: "{{url('collect-user')}}" +"/"+ $(this).data('id'),
                method: 'GET',
                success: function (res) {
                    if(res.operator === 'no') {
                        alert(res.message);
                    } else if(res.operator === 'add') {
                        that.css('color', 'red');
                        that.children('span').text(res.total);
                    } else if(res.operator === 'reduce') {
                        that.css('color','black');
                        that.children('span').text(res.total);
                    }
                },
                error: function(error) {
                    console.log(error)
                }
            });

        })
    </script>
@endsection