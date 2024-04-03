@extends('layouts.guest2')

@section('content')
<!-- breadcrumb -->
    <div class="row text-gray-600">
        <h4 class="mt-3">
            <a href="{{url('/')}}" class="text-black text-decoration-none">首頁</a> > 學長姐</h4>
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
                        <h4>{{$user->universityItem->chinese_name}}</h4>
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
                    目前尚無學生資料
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