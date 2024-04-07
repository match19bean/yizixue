@extends('layouts.guest2')

@section('content')
<!-- breadcrumb -->
    <div class="row text-gray-600 seniorListPage">
            <!-- taggle menu section -->
        <div class="row text-gray-600">
            <h4 class="mt-3 col-6"><a href="{{url('/')}}" class="text-decoration-none text-black">首頁</a> > 學長姊</h4>
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
                <h6>英語系國家</h6>
                <a href="{{route('senior', ['area' => 'northeast'])}}" class="text-decoration-none">美國東北部</a>
                <a href="{{route('senior', ['area' => 'west'])}}" class="text-decoration-none">美國西北部</a>
                <a href="{{route('senior', ['area' => 'midwest'])}}" class="text-decoration-none">美國中西部</a>
                <a href="{{route('senior', ['area' => 'south'])}}" class="text-decoration-none">美國南部</a>
                <a href="{{route('senior', ['country' => 'canada'])}}" class="text-decoration-none">加拿大</a>
                <a href="{{route('senior', ['country' => 'uk'])}}" class="text-decoration-none">英國</a>
                <a href="{{route('senior', ['country' => 'australia'])}}" class="text-decoration-none">澳洲</a>
                <a href="{{route('senior', ['country' => 'new zealand'])}}" class="text-decoration-none">其他</a>
            </div>
            <div class="col d-flex flex-column">
                <h6>歐語系國家</h6>
                <a href="{{route('senior', ['country' => 'france'])}}" class="text-decoration-none">法國</a>
                <a href="{{route('senior', ['country' => 'germany'])}}" class="text-decoration-none">德國</a>
                <a>義大利</a>
                <a>其他</a>
            </div>
            <div class="col d-flex flex-column">
                <h6>亞洲國家</h6>
                <a href="{{route('senior', ['country' => 'taiwan'])}}" class="text-decoration-none">台灣</a>
                <a href="{{route('senior', ['country' => 'japan'])}}" class="text-decoration-none">日本</a>
                <a href="{{route('senior', ['country' => 'korea'])}}" class="text-decoration-none">韓國</a>
                <a>其他</a>
            </div>
            <div class="col d-flex flex-column">
                <h6>中國相關</h6>
                <a>中國</a>
                <a href="{{route('senior', ['country' => 'singapore'])}}" class="text-decoration-none">新加坡</a>
                <a href="{{route('senior', ['country' => 'hong kong'])}}" class="text-decoration-none">香港</a>
                <a href="{{route('senior', ['country' => 'macau'])}}" class="text-decoration-none">澳門</a>
                <a>其他</a>
            </div>
        </div>
        <!-- end of toggle menu section -->
    </div>

    <!-- senior cards broccoli ver -->
    <div class="seniorPage">
        @forelse($users as $user)
            <div class="col-4 item studentC">
                <div class="col cards">
                    <div class="studentProfile">
                        <!-- avatar -->
                        <div class="studentImg">
                            @if(is_null($user->avatar))
                                <img src="{{asset('uploads/images/default_avatar.png')}}" alt="user avatar" width="300" height="300">
                            @else
                                <img src="{{asset('uploads/'.$user->avatar)}}" alt="user avatar" width="300" height="300">
                            @endif
                        </div>
                        <!-- video btn -->
                        <div class="videoBtn">
                            @if(is_null($user->profile_video))
                                <a class="text" onClick="alert('學長姐尚未上傳影音');">
                                    <img class="card-img-top" src="https://cdn.pixabay.com/photo/2016/02/01/12/33/play-1173551_640.png" alt="Card image cap">
                                </a>
                            @else
                            <a href="{{ $user->profile_video }}" class="text">
                                <img class="card-img-top" src="https://cdn.pixabay.com/photo/2016/02/01/12/33/play-1173551_640.png" alt="Card image cap">
                            </a>
                            @endif
                        </div>
                        <!-- react icons -->
                        <div class="react">
                            @if(auth()->check())
                                <i class="fa fa-heart"
                                   style="color:@if($user->likedUser->where('uid', auth()->user()->id)->where('user_id', $user->id)->count()==1) red @else black @endif;"
                                   data-id="{{$user->id}}">
                                    <span style="color: black;">{{$user->likedUser->count()}}</span>
                                </i>
                                <i class="fa fa-bookmark"
                                   style="color:@if($user->likedUser->where('uid', auth()->user()->id)->where('user_id', $user->id)->count()==1) red @else black @endif;"
                                   data-id="{{$user->id}}">
                                    <span style="color: black;">{{$user->collectedUser->count()}}</span>
                                </i>
                            @else
                                <i class="fa fa-heart" style="color:black;" data-id="{{$user->id}}">
                                    <span style="color: black;">{{$user->likedUser->count()}}</span>
                                </i>
                                <i class="fa fa-bookmark" style="color:black;" data-id="{{$user->id}}">
                                    <span style="color: black;">{{$user->collectedUser->count()}}</span>
                                </i>
                            @endif
                        </div>
                    </div>
                    <!-- name card -->
                    <div class="name-card">
                        <h4>{{$user->name}}</h4>
                        <h4>{{!is_null($user->universityItem) ? $user->universityItem->english_name:''}}</h4>
                    </div>
                    <!-- post tags -->
                    <div class="postTags">
                        @if(!is_null($user->postCategory))
                            @foreach($user->postCategory as $key=>$category)
                                @if($key <3)
                                <span>
                                    {{$category->postCategory->name}}
                                </span>
                                @endif
                            @endforeach
                        @endif
                    </div>
                    <!-- skill tags -->
                    <div class="skillTags">
                        @if(!is_null($user->skills))
                            @foreach($user->skills as $key => $skill)
                                @if($key < 6)
                                <span>
                                    {{$skill->skill->name}}
                                </span>
                                    @if($key==2)
                                        <br>
                                    @endif
                                @endif
                            @endforeach
                        @endif
                    </div>
                    <a href="{{route('get-introduction', $user->id)}}" class="text-center text-black-50">點擊查看更多</a>
                </div>
            </div>
        @empty
            <div class="row">
                <p class="vh-100">
                    目前尚無學長姐資料
                </p>
            </div>
        @endforelse
    </div>
    <div class="pageNav">
        {!! $users->links('vendor.pagination.bootstrap-4') !!}
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
    });

    $('.fa-bookmark').click(function(){
        let that = $(this);
        $.ajax({
            url: "{{url('collect-user')}}"+"/"+$(this).data('id'),
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
    });
</script>
@endsection