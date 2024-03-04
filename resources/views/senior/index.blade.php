@extends('layouts.guest2')

@section('content')
    <div class="row text-gray-600">
        <h4 class="mt-3">首頁 > 學長姐</h4>
    </div>

    <div class="row row-cols-3">

        @if(!is_null($users))
            @foreach($users as $user)
                <div class="col" style="border: 2px solid black; border-radius: 20px;">
                    <div class="row">
                        <div class="col-6">
                            <img src="{{asset('uploads/'.$user->avatar)}}" alt="user avatar" class="w-100">
                            <div class="row text-center text-white" style="background-color: #BD9EBE;">
                                <h3>{{$user->name}}</h3>
                                <h6>{{$user->university}}</h6>
                            </div>
                        </div>
                        <div class="col-6 text-center">
                            <div class="mt-5">
                                <img class="w-25" src="https://cdn.pixabay.com/photo/2016/02/01/12/33/play-1173551_640.png" alt="Card image cap">
                            </div>

                            <div class="">

                            </div>
                        </div>
                    </div>
                    <div class="row text-center py-1">
                        @if(!is_null($user->postCategory))
                            @foreach($user->postCategory as $category)
                                <div class="col-4 text-white px-3 py-1">
                                    <span class="w-75 px-5 py-2" style="background-color: #4C2A70;">
                                        {{$category->postCategory->name}}
                                    </span>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="row text-center py-1">
                        @if(!is_null($user->skills))
                            @foreach($user->skills as $skill)
                                <div class="col-4 px-3 py-1">
                                    <span class="w-75 px-5 py-1 m-2" style="border-radius: 10px; border: 1px solid #4C2A70; color: #4C2A70;">
                                        {{$skill->skill->name}}
                                    </span>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="row text-center">
                        <a href="" class="text-decoration-none text-black-50" style="font-size:1.5rem;">點擊查看更多</a>
                    </div>
                </div>
            @endforeach
            <div class="col-12 mt-3 text-center">
                {!! $users->links('vendor.pagination.bootstrap-4') !!}
            </div>
        @endif
    </div>
@endsection