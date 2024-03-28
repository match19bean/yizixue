@extends('layouts.guest2')

@section('content')
    <div class="row text-gray-600">
        <h4 class="mt-3">首頁 > 學長姐</h4>
    </div>

    <!-- senior cards broccoli ver -->
    <div class="seniorPage">
        @if(!is_null($users))
            @foreach($users as $user)
                <div class="col-4 item studentC">
                    <div class="col cards">
                        <div class="studentProfile">
                            <!-- avatar -->
                            <div class="studentImg">
                                <img src="{{asset('uploads/'.$user->avatar)}}" alt="user avatar">
                            </div>
                            <!-- video btn -->
                            <div class="videoBtn">
                                <a href="{{ $user->profile_video }}" class="text">
                                    <img class="card-img-top" src="https://cdn.pixabay.com/photo/2016/02/01/12/33/play-1173551_640.png" alt="Card image cap">
                                </a>
                            </div>
                            <!-- react icons -->
                            <div class="react">
                                <i class="fa fa-heart">
                                    <span>{{rand(5,30)}}</span>
                                </i>
                                <i class="fa fa-bookmark">
                                    <span>{{rand(5,30)}}</span>
                                </i>
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
                                @foreach($user->postCategory as $category)
                                    <span>
                                        {{$category->postCategory->name}}
                                    </span>
                                @endforeach
                            @endif
                        </div>
                        <!-- skill tags -->
                        <div class="skillTags">
                            @if(!is_null($user->skills))
                                @foreach($user->skills as $skill)
                                    <span>
                                    {{$skill->skill->name}}
                                </span>
                                @endforeach
                            @endif
                        </div>
                        <a href="{{route('article-list', $user->id)}}" class="text-center text-black-50">點擊查看更多</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="pageNav">
        {!! $users->links('vendor.pagination.bootstrap-4') !!}
    </div>

@endsection