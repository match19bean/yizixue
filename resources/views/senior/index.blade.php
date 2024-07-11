@extends('layouts.guest2')

@section('content')
<!-- breadcrumb -->
<div class="c-breadcrumbs">
    <div>
        <h4 class="c-breadcrumbs_prePage"><a href="{{url('/')}}" class="text-decoration-none text-black">首頁</a> > 學長姊
        </h4>
        <h3 class="c-breadcrumbs_currentPage">學長姊快找</h3>
    </div>
</div>

<!-- senior cards broccoli ver -->
<div class="l-seniorPage row">
    <div class="l-seniorPage_sideNav">
        <div class="c-sideNav row">
            <!-- options -->
            <div class="c-sideNav_selections col">
                <div class="c-sideNav_selections_locations">
                    <button class="locEnglish" onclick="SideBarSelect(1)">英語系國家</button>
                    <hr>
                    <button class="locEurop" onclick="SideBarSelect(2)">歐語系國家</button>
                    <hr>
                    <button class="locAsia" onclick="SideBarSelect(3)">亞洲國家</button>
                </div>
                <div class="c-sideNav_selections_topics">
                    @forelse($post_categories as $category)
                        @if($loop->last)
                            <boutton><a href="{{route('senior', ['category' => $category->id])}}">{{$category->name}}</a></boutton>
                        @else
                            <boutton><a href="{{route('senior', ['category' => $category->id])}}">{{$category->name}}</a></boutton>
                            <hr>
                        @endif
                    @empty
                    @endforelse
                </div>
            </div>
            <!-- popup selections -->
            <div class="c-sideNav_area col">
                <svg class="c-sideNav_area_english" viewBox="0 0 250 350">
                    <path
                        d="M227,0H67.4c-9.9,0-18,8-18,18h0c0,9-4.8,17.3-12.6,21.7L0,61l36.8,21.3c7.8,4.5,12.6,12.8,12.6,21.7v220.4c0,9.9,8,18,18,18h159.7c9.9,0,18-8,18-18V18c0-9.9-8-18-18-18Z"
                        style="fill: #fff; stroke: #4c2a70; stroke-miterlimit: 10;" />
                    <text transform="translate(75 35.5)"
                        style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;"><a href="{{route('senior', ['area'=>'NORTHEAST'])}}" class="text-none">美國東北部</a></text>
                    <text transform="translate(75 75.1)"
                          style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">
                        <a href="{{route('senior', ['area'=>'WEST'])}}" class="text-none">美國西部</a>
                    </text>
                    <text transform="translate(75 114.7)"
                          style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">
                        <a href="{{route('senior', ['area'=>'MIDWEST'])}}" class="text-none">美國中西部</a>
                    </text>
                    <text transform="translate(75 154.2)"
                          style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">
                        <a href="{{route('senior', ['area'=>'SOUTH'])}}" class="text-none">美國南部</a>
                    </text>
                    <text transform="translate(75 193.8)"
                          style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">
                        <a href="{{route('senior', ['country'=>'CANADA'])}}" class="text-none">加拿大</a>
                    </text>
                    <text transform="translate(75 233.4)"
                          style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">
                        <a href="{{route('senior', ['country'=>'UK'])}}" class="text-none">英國</a>
                    </text>
                    <text transform="translate(75 272.9)"
                        style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">
                        <a href="{{route('senior', ['country'=>'AUSTRALIA'])}}" class="text-none">澳洲</a>
                    </text>
                    <text transform="translate(75 312.5)"
                        style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">
                        <a href="{{route('senior', ['country'=>'NEW ZEALAND'])}}" class="text-none">紐西蘭</a>
                    </text>
                    <line x1="70.7" y1="49.4" x2="220.7" y2="49.4"
                        style="fill: none; stroke: #000; stroke-miterlimit: 10;" />
                    <line x1="70.7" y1="89" x2="220.7" y2="89"
                        style="fill: none; stroke: #000; stroke-miterlimit: 10;" />
                    <line x1="70.7" y1="128.6" x2="220.7" y2="128.6"
                        style="fill: none; stroke: #000; stroke-miterlimit: 10;" />
                    <line x1="70.7" y1="168.1" x2="220.7" y2="168.1"
                        style="fill: none; stroke: #000; stroke-miterlimit: 10;" />
                    <line x1="70.7" y1="207.7" x2="220.7" y2="207.7"
                        style="fill: none; stroke: #000; stroke-miterlimit: 10;" />
                    <line x1="70.7" y1="247.3" x2="220.7" y2="247.3"
                        style="fill: none; stroke: #000; stroke-miterlimit: 10;" />
                    <line x1="70.7" y1="286.9" x2="220.7" y2="286.9"
                        style="fill: none; stroke: #000; stroke-miterlimit: 10;" />
                </svg>
                <svg class="c-sideNav_area_eurp" viewBox="0 0 250 250">
                    <path
                        d="M226.9,0H67.4c-9.9,0-18,8.1-18,18.3h0c0,9.1-4.8,17.6-12.6,22L0,61.9l36.8,21.6c7.8,4.6,12.6,13,12.6,22v16.2c0,10,8,18.3,18,18.3h159.6c9.9,0,18-8.1,18-18.3V18.3c0-10-8-18.3-18-18.3h0Z"
                        style="fill: #fff; stroke: #4c2a70; stroke-miterlimit: 10;" />
                    <text transform="translate(75 35.5)"
                        style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">
                        <a href="{{route('senior', ['country'=>'FRANCE'])}}" class="text-none">法國</a>
                    </text>
                    <text transform="translate(75 75.1)"
                        style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">
                        <a href="{{route('senior', ['country'=>'GERMANY'])}}" class="text-none">德國</a>
                    </text>
                    <text transform="translate(75 114.7)"
                        style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">其他歐洲</text>
                    <line x1="70.7" y1="49.4" x2="220.7" y2="49.4"
                        style="fill: none; stroke: #000; stroke-miterlimit: 10;" />
                    <line x1="70.7" y1="89" x2="220.7" y2="89"
                        style="fill: none; stroke: #000; stroke-miterlimit: 10;" />
                </svg>
                <svg class="c-sideNav_area_asia" viewBox="0 0 250 420">
                    <path
                        d="M226.9,0H67.4c-9.9,0-18,8-18,18h0c0,9-4.8,17.3-12.6,21.6L0,60.9l36.8,21.2c7.8,4.5,12.6,12.8,12.6,21.6v293.3c0,9.9,8,18,18,18h159.6c9.9,0,18-8,18-18V18c0-9.9-8-18-18-18h0Z"
                        style="fill: #fff; stroke: #4c2a70; stroke-miterlimit: 10;" />
                    <text transform="translate(75 35.5)"
                        style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">
                        <a href="{{route('senior', ['area'=>'INTERNATIONAL'])}}" class="text-none">台灣｜國際學校</a>
                    </text>
                    <text transform="translate(75 75)"
                        style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">
                        <a href="{{route('senior', ['area'=>'HIGHSCHOOL'])}}" class="text-none">台灣｜高中</a>
                    </text>
                    <text transform="translate(75 114.6)"
                        style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">
                        <a href="{{route('senior', ['area'=>'COLLEGE'])}}" class="text-none">台灣｜大學</a>
                    </text>
                    <text transform="translate(75 154.1)"
                        style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">
                        <a href="{{route('senior', ['country'=>'SINGAPORE'])}}" class="text-none">新加坡</a>
                    </text>
                    <text transform="translate(75 193.7)"
                        style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">
                        <a href="{{route('senior', ['country'=>'JAPAN'])}}" class="text-none">日本</a>
                    </text>
                    <text transform="translate(75 233.2)"
                        style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">
                        <a href="{{route('senior', ['country'=>'KOREA'])}}" class="text-none">韓國</a>
                    </text>
                    <text transform="translate(75 272.8)"
                        style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">中國</text>
                    <text transform="translate(75 312.3)"
                        style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">
                        <a href="{{route('senior', ['country'=>'HONG KONG'])}}" class="text-none">香港</a>
                    </text>
                    <text transform="translate(75 351.9)"
                        style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">
                        <a href="{{route('senior', ['country'=>'MACAU'])}}" class="text-none">澳門</a>
                    </text>
                    <text transform="translate(75 391.4)"
                        style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">其他亞洲</text>
                    <line x1="70.7" y1="49.4" x2="220.7" y2="49.4"
                        style="fill: none; stroke: #000; stroke-miterlimit: 10;" />
                    <line x1="70.7" y1="88.9" x2="220.7" y2="88.9"
                        style="fill: none; stroke: #000; stroke-miterlimit: 10;" />
                    <line x1="70.7" y1="128.5" x2="220.7" y2="128.5"
                        style="fill: none; stroke: #000; stroke-miterlimit: 10;" />
                    <line x1="70.7" y1="168" x2="220.7" y2="168"
                        style="fill: none; stroke: #000; stroke-miterlimit: 10;" />
                    <line x1="70.7" y1="207.6" x2="220.7" y2="207.6"
                        style="fill: none; stroke: #000; stroke-miterlimit: 10;" />
                    <line x1="70.7" y1="247.1" x2="220.7" y2="247.1"
                        style="fill: none; stroke: #000; stroke-miterlimit: 10;" />
                    <line x1="70.7" y1="286.7" x2="220.7" y2="286.7"
                        style="fill: none; stroke: #000; stroke-miterlimit: 10;" />
                    <line x1="70.7" y1="326.2" x2="220.7" y2="326.2"
                        style="fill: none; stroke: #000; stroke-miterlimit: 10;" />
                    <line x1="70.7" y1="365.8" x2="220.7" y2="365.8"
                        style="fill: none; stroke: #000; stroke-miterlimit: 10;" />
                </svg>
            </div>
        </div>
    </div>
    <div class="l-seniorPage_content container row">
        @forelse($users as $user)
        <div class="c-studentCard col-4" onclick="cardClickable({{ $user->id }})">
            <!-- img div -->
            @if(is_null($user->avatar))
            <span class="c-studentCard_studentImg"
                style="background-image: url('{{asset('uploads/images/default_avatar.png')}}') ;">&nbsp;</span>
            @else
            <span class="c-studentCard_studentImg"
                style="background-image: url('/uploads/{{ $user->avatar }}');">&nbsp;</span>
            @endif
            <!-- background -->
            <svg class="c-studentCard_bg" viewBox="0 0 330 170">
                <polygon class="cls-1" points="329.5 170 0 170 0 0 330 45.1 329.5 170" />
            </svg>
            <!-- school img -->
            <span class="c-studentCard_schoolImg"
                style="background-image: url('{{asset($user->universityItem->image_path)}}') ;">&nbsp;</span>
            <!-- name card -->
            <h4 class="c-studentCard_userName">{{ ($user->name) ? \Illuminate\Support\Str::limit($user->name,10): "" }}
            </h4>
            <!-- school english -->
            <h5 class="c-studentCard_schoolEnglish">
                {{ !is_null($user->universityItem) ? $user->universityItem->english_name : '' }}</h5>
            <!-- school chinese -->
            <h6 class="c-studentCard_schoolChinese">
                {{ !is_null($user->universityItem) ? \Illuminate\Support\Str::limit($user->universityItem->chinese_name, 10) : '' }}
            </h6>
            <!-- react icons -->
            <div class="c-studentCard_react" onclick="event.stopPropagation(); return false; ">
                @if(auth()->check())
                <i class="bi bi-heart" style="
                                    color:@if($user->likedUser->where('uid', auth()->user()->id)->where('user_id', $user->id)->count() == 1) red @else black @endif
                                    " data-id="{{$user->id}}">
                    <span class="text-black">{{$user->likedUser->count()}}</span>
                </i>
                <i class="bi bi-bookmark" data-id="{{$user->id}}" style="
                                    color:  @if($user->collectedUser->where('uid', auth()->user()->id)->where('user_id', $user->id)->count() == 1) red @else black @endif
                                    ">
                    <span class="text-black">{{$user->collectedUser->count()}}</span>
                </i>
                @else
                <i class="bi bi-heart" style="color: black;" data-id="{{$user->id}}">
                    <span class="text-black">{{$user->likedUser->count()}}</span>
                </i>
                <i class="bi bi-bookmark" data-id="{{$user->id}}">
                    <span class="text-black">{{$user->collectedUser->count()}}</span>
                </i>
                @endif
            </div>
            <!-- post tag -->
            <div class="c-studentCard_postTag">
                @forelse ($user->postCategory as $count => $cate)
                @if ($count < 3) <a href="{{route('senior', ['category' => $cate->postCategory->id])}}"
                    class="text-white">
                    {{ $cate->postCategory->name }}
                    </a>
                    @endif
                    @empty
                    @endforelse
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
</div>
<div class="c-pagination">
    {!! $users->links('vendor.pagination.bootstrap-4') !!}
</div>
@endsection

@section('page_js')
    <script>
        $('.bi-heart').click(function () {
            let that = $(this);
            $.ajax({
                url: "{{url('like-user')}}" + "/" + $(this).data('id'),
                method: 'GET',
                success: function (res) {
                    if (res.operator === 'no') {
                        alert(res.message);
                    } else if (res.operator === 'add') {
                        that.css('color', 'red');
                        that.children('span').text(res.total);
                    } else if (res.operator === 'reduce') {
                        that.css('color', 'black');
                        that.children('span').text(res.total);
                    }
                },
                error: function (error) {
                    console.log(error)
                }
            });
        });

        $('.bi-bookmark').click(function () {
            let that = $(this);
            $.ajax({
                url: "{{url('collect-user')}}" + "/" + $(this).data('id'),
                method: 'GET',
                success: function (res) {
                    if (res.operator === 'no') {
                        alert(res.message);
                    } else if (res.operator === 'add') {
                        that.css('color', 'red');
                        that.children('span').text(res.total);
                    } else if (res.operator === 'reduce') {
                        that.css('color', 'black');
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