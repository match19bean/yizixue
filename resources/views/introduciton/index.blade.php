@extends('layouts.guest2')

@section('content')
    <div class="container introduction">
        <div class="introCard">
            <!-- portriat -->
            <!-- <img class="portriat img-response w-100" src="{{asset('uploads/'.$Data['user']->avatar)}}" alt=""> -->
            <div class="portriat d-flex justify-content-center">
                <span style="background-image: url('{{asset('uploads/'.$Data['user']->avatar)}}') ;" class="bgImg">&nbsp</span>
            </div>
            <!-- name card -->
            <div class="nameCard row justify-content-center text-white" style="color: #4C2A70; background-color: #BD9EBE;">
                <h2 class='text-center text-white w-100'>{{$Data['user']->name}}</h2>
                <h6 class="text-center w-100">
                    {{!is_null($Data['user']->universityItem) ?$Data['user']->universityItem->english_name:''}}
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
                    {{ !is_null($Data['user']->universityItem) ? $Data['user']->universityItem->english_name : '' }}
                </p>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <h2>社交網路</h2>
                </div>
                <div class="col-12">
                    <p>LINE:{{$Data['user']->line}}</p>
                    <p>FB: @if(!is_null($Data['user']->fb)) <a href="{{$Data['user']->fb}}" class="text-black text-decoration-none"> {{ parse_url($Data['user']->fb, PHP_URL_PATH)}} </a> @else @endif</p>
                    <p>IG: @if(!is_null($Data['user']->ig)) <a href="{{$Data['user']->ig}}" class="text-black text-decoration-none"> {{ parse_url($Data['user']->ig, PHP_URL_PATH)}} </a> @else @endif</p>
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
                        @foreach($Data['user']->post as $count => $post)
                            @if($count < 4)
                                <div class="card border-dark p-1">
                                    <!-- img part -->
                                    <!-- <img class="imgPart" src="{{ asset('uploads'.$post->image_path)  }}" alt=""> -->
                                    <div class="imgPart d-flex justify-content-center">
                                        <span style="background-image: url('{{ asset('uploads'.$post->image_path)  }}') ;">&nbsp</span>
                                    </div>
                                    <!-- info part -->
                                    <div class="infoPart">
                                        <div class="px-3">
                                            <h3><a href="{{ route('article', $post->id) }}" style="color: #4C2A70; text-decoration: none;">{{$post->title}}</a></h3>
                                            <p>
                                                {!! \Illuminate\Support\Str::limit(strip_tags($post->body)) !!}
                                            </p>
                                            <a class="readMore" href="{{ route('article', $post->id) }}">...閱讀更多</a>
                                            <p class="text-right mb-0">
                                                發布日期：{{$post->created_at->format('Y/m/d')}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif
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
                    <div class="attachment d-flex flex-row justify-content-start">
                        <!-- files -->
                        @forelse($Data['user']->references as $reference)
                            <a href="{{route('reference-download', $reference->id)}}" class="text-decoration-none text-black">
                                <div class="file d-flex mr-1">
                                    <svg viewBox="0 0 300 300">
                                        <path fill="#C39FC0" d="M265.4,300H34.6C15.5,300,0,284.5,0,265.4V34.6C0,15.5,15.5,0,34.6,0h230.8C284.5,0,300,15.5,300,34.6v230.8
                                            C300,284.5,284.5,300,265.4,300z"/>
                                        <path fill="#FFFFFF" d="M262.1,284H37.9C25.2,284,15,273.8,15,261.1V82.9C15,70.2,25.2,60,37.9,60h224.3c12.6,0,22.9,10.2,22.9,22.9
                                            v178.3C285,273.8,274.8,284,262.1,284z"/>
                                        <g>
                                            <path fill="#5E4A81" d="M127.9,249.5c-1.7,0-3.3,0-5,0c0-1.2-0.9-2.1-1.4-3c-9-16.8-20.7-32.2-27.1-50.4c0-1.2,0-2.5,0-3.7
                                                c1.5-4.5,2.7-9.1,5.2-13.3c7.6-13,15-26,22.6-39.1c0.7-1.4,1.7-2.3,3.3-2.4c0.6,0.9,1.7,1.2,2.5,1.7c5.4,3,10.9,6,16.2,9.1
                                                c4.5,2.7,4.4,3.2,1.7,7.8c-1.7,2.8-4.3,5.2-4.4,8.7c-2.9,4.2-5.7,8.3-7.5,13.1c-0.7,0.1-1.2,0.5-1,1.2c0.4,1.1,1.4,1.2,2.3,1.2
                                                c7.2,0,14.5,0.6,21.6-0.4c4.7-0.6,9.1-0.6,13.7-0.8c2.8-0.1,3.9,1.2,3.9,3.9c-0.1,6.2,0,12.4,0,18.6c0,1.2-0.2,2.5,0.6,3.6
                                                c-0.4,2.3-2.1,2.8-4.2,2.8c-6.1-0.1-12.2-0.1-18.3,0c-5.2,0.1-10.3,0.1-15.5,0.2c-2.5,0-3,1.3-2.1,3.4c0.4,1.1,1,2.1,1.6,3
                                                c3.5,6.1,7,12.2,10.5,18.2c1.4,2.4,1.1,4.2-1.4,5.7c-4.7,2.5-9.2,5.5-14,7.9C130.3,247.3,128.6,247.8,127.9,249.5z"/>
                                            <path fill="#FEFEFE" d="M127.9,249.5c0.7-1.7,2.4-2.2,3.8-2.9c4.8-2.4,9.3-5.3,14-7.9c2.5-1.4,2.8-3.3,1.4-5.7
                                                c-3.5-6.1-7-12.2-10.5-18.2c-0.6-1-1.1-2-1.6-3c-0.9-2.1-0.4-3.4,2.1-3.4c5.2-0.1,10.3-0.2,15.5-0.2c6.1-0.1,12.2-0.1,18.3,0
                                                c2.1,0,3.7-0.5,4.2-2.8c2.7-0.7,3.9-3,5.1-5.1c7-11.9,13.4-24.2,20.3-36.1c5-8.7,4.9-18-0.1-26.9c-3.9-6.9-8-13.7-12-20.6
                                                c-4.4-7.3-8.2-15-13.3-21.9c9.3,0,18.6,0.1,28-0.1c1.6,0,1.9,0.4,1.9,1.9c-0.1,50.3-0.1,100.6,0.1,150.9c0,2.1-0.9,1.9-2.2,1.9
                                                C177.8,249.5,152.8,249.5,127.9,249.5z"/>
                                            <path fill="#C39FC0" d="M175,94.9c5.1,6.9,8.9,14.5,13.3,21.9c4,6.8,8.1,13.6,12,20.6c5,8.9,5.2,18.2,0.1,26.9
                                                c-7,11.9-13.4,24.2-20.3,36.1c-1.2,2.1-2.4,4.4-5.1,5.1c-0.8-1.1-0.6-2.4-0.6-3.6c0-6.2-0.1-12.4,0-18.6c0-2.7-1.1-4-3.9-3.9
                                                c-4.6,0.2-9.1,0.1-13.7,0.8c-7.1,1-14.4,0.4-21.6,0.4c-0.9,0-1.9-0.2-2.3-1.2c-0.2-0.7,0.2-1.1,1-1.2c0.9,0.6,1.9,0.9,2.9,0.9
                                                c6.9-0.1,13.9-0.1,20.8-0.1c1.6,0,2.4-0.7,3-2.1c1.1-2.4,2.3-4.7,3.5-6.9c2.2-3.9,1.7-4.7-2.6-4.7c-6.7-0.1-13.4-0.1-20.1-0.2
                                                c0.1-3.6,2.7-6,4.4-8.7c2.7-4.6,2.9-5-1.7-7.8c-5.3-3.2-10.8-6.1-16.2-9.1c-0.9-0.5-1.9-0.8-2.5-1.7c1.1-1.1,2.4-1,3.8-1
                                                c10.3-0.1,20.7,0,31-0.1c4.5-0.1,4.8-0.9,2.7-4.9c-3.5-6.8-7.5-13.4-11.4-19.9c-1.2-2.1-0.9-3.7,1.2-4.9c2.5-1.4,5-2.9,7.5-4.4
                                                c3.9-2.4,8.3-4.2,11.7-7.4C173,94.9,174.1,94.9,175,94.9z"/>
                                            <path fill="#FEFEFE" d="M171.9,94.9c-3.4,3.2-7.8,5-11.7,7.4c-2.5,1.5-5,3-7.5,4.4c-2.1,1.2-2.5,2.9-1.2,4.9
                                                c3.9,6.5,7.8,13.1,11.4,19.9c2.1,3.9,1.8,4.8-2.7,4.9c-10.3,0.1-20.7,0.1-31,0.1c-1.4,0-2.7-0.1-3.8,1c-1.6,0.1-2.5,1.1-3.3,2.4
                                                c-7.5,13.1-14.9,26.1-22.6,39.1c-2.5,4.2-3.7,8.8-5.2,13.3c0-31.7,0-63.5-0.1-95.1c0-1.9,0.4-2.4,2.4-2.4
                                                C121.8,94.9,146.9,94.9,171.9,94.9z"/>
                                            <path fill="#FEFEFE" d="M94.4,196.1c6.5,18.2,18.1,33.6,27.1,50.4c0.5,1,1.4,1.8,1.4,3c-8.9,0-17.8-0.1-26.7,0.1
                                                c-1.6,0-1.9-0.4-1.9-1.9C94.4,230.5,94.4,213.3,94.4,196.1z"/>
                                            <path fill="#FEFEFE" d="M141.4,165c6.7,0.1,13.4,0.1,20.1,0.2c4.4,0.1,4.8,0.9,2.6,4.7c-1.2,2.2-2.5,4.5-3.5,6.9
                                                c-0.6,1.4-1.4,2.1-3,2.1c-6.9,0-13.9,0.1-20.8,0.1c-1.1,0-2.1-0.2-2.9-0.9C135.7,173.3,138.6,169.1,141.4,165z"/>
                                        </g>
                                            <text transform="matrix(1 0 0 1 54.6553 41.3376)" fill="#FFFFFF" font-size="25px">{{pathinfo($reference->file_name)['basename']}}</text>
                                        <rect x="21" y="21" fill="#FFFFFF" width="26" height="26"/>
                                        <circle fill="#FFFFFF" cx="266" cy="15" r="6"/>
                                        <circle fill="#FFFFFF" cx="266" cy="30.5" r="6"/>
                                        <circle fill="#FFFFFF" cx="266" cy="46" r="6"/>
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
                        <div class="item studentC"  onclick="cardClickable({{ $user->id }})">
                            <div>
                                <div class="cards">
                                    <!-- student profile pic -->
                                    <div class="studentProfile">
                                        <div class="studentImg">
                                            @if(is_null($user->avatar))
                                                    <!-- <img src="{{asset('uploads/images/default_avatar.png')}}" alt="Card image cap" width="200" height="200"> -->
                                                    <div class=" d-flex justify-content-center">
                                                        <span style="background-image: url('{{asset('uploads/images/default_avatar.png')}}') ;" class="bgImg">&nbsp</span>
                                                    </div>
                                                @else
                                                    <!-- <img src="/uploads/{{ $user->avatar }}" alt="Card image cap" width="200" height="200"> -->
                                                    <div class=" d-flex justify-content-center">
                                                        <span style="background-image: url('/uploads/{{ $user->avatar }}');" class="bgImg">&nbsp</span>
                                                    </div>
                                                @endif
                                        </div>
                                        <!-- video Btn -->
                                        <div class="videoBtn" onclick="event.stopPropagation(); event.preventDefault();">
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
                                        <div class="react" onclick="event.stopPropagation(); event.preventDefault();">
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
{{--                                    <a href="{{route('get-introduction', $user->id)}}" class="text-decoration-none">--}}
                                    <div class="name-card">
                                        <h4>{{ $user->name }}</h4>
                                        <h6>{{ !is_null($user->universityItem) ? $user->universityItem->english_name:'' }}</h6>
                                    </div>
{{--                                    </a>--}}
                                    <!-- post tag -->
                                    <div class="postTags  row row-cols-3 mt-2 justify-content-center">
                                        @foreach($user->postCategory as $key => $postCategoryRelation)
                                            @if($key< 3)
                                            <span href="#" class="col-3 btn btn-outline-secondary m-1" style="font-size: 0.6rem;">{{$postCategoryRelation->postCategory->name}}</span>
                                            @endif
                                        @endforeach
                                    </div>
                                    <!-- skill tag -->
                                    <div class="skillTags  row row-cols-3 mt-2 justify-content-center">
                                        @foreach($user->skills as $key => $skillRelation)
                                            @if($key< 6)
                                            <span href="#" class="col-3 btn btn-outline-secondary m-1" style="font-size: 0.6rem;">{{$skillRelation->skill->name}}</span>
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