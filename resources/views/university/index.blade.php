@extends('layouts.guest2')

@section('content')
<div class="c-breadcrumbs">
    <div>
        <h4 class="c-breadcrumbs_prePage"><a href="{{url('/')}}" class="text-decoration-none text-black">首頁</a> > 學校
        </h4>
        <h3 class="c-breadcrumbs_currentPage">好學校關注</h3>
    </div>
</div>

<!-- layout from public/scss/layout/university_layout.scss -->
<div class="l-uniList">
    <!-- side nav from public/scss/component/sideNav.scss -->
    <div class="l-seniorPage_sideNav">
        <div class="c-sideNav row">
            <div class="c-sideNav_selections col">
                <div class="c-sideNav_selections_locations">
                    <button class="locEnglish" onclick="SideBarSelect(1)">英語系國家</button>
                    <hr>
                    <button class="locEurop" onclick="SideBarSelect(2)">歐語系國家</button>
                    <hr>
                    <button class="locAsia" onclick="SideBarSelect(3)">亞洲國家</button>
                </div>
            </div>
            <div class="c-sideNav_area col">
                <svg class="c-sideNav_area_english" viewBox="0 0 250 350">
                    <path
                        d="M227,0H67.4c-9.9,0-18,8-18,18h0c0,9-4.8,17.3-12.6,21.7L0,61l36.8,21.3c7.8,4.5,12.6,12.8,12.6,21.7v220.4c0,9.9,8,18,18,18h159.7c9.9,0,18-8,18-18V18c0-9.9-8-18-18-18Z"
                        style="fill: #fff; stroke: #4c2a70; stroke-miterlimit: 10;" />
                    <text transform="translate(75 35.5)"
                        style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">美國東北部</text>
                    <text transform="translate(75 75.1)"
                        style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">美國西部</text>
                    <text transform="translate(75 114.7)"
                        style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">美國中西部</text>
                    <text transform="translate(75 154.2)"
                        style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">美國南部</text>
                    <text transform="translate(75 193.8)"
                        style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">加拿大</text>
                    <text transform="translate(75 233.4)"
                        style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">英國</text>
                    <text transform="translate(75 272.9)"
                        style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">澳洲</text>
                    <text transform="translate(75 312.5)"
                        style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">紐西蘭</text>
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
                        style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">法國</text>
                    <text transform="translate(75 75.1)"
                        style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">德國</text>
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
                        style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">台灣｜國際學校</text>
                    <text transform="translate(75 75)"
                        style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">台灣｜高中</text>
                    <text transform="translate(75 114.6)"
                        style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">台灣｜大學</text>
                    <text transform="translate(75 154.1)"
                        style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">新加坡</text>
                    <text transform="translate(75 193.7)"
                        style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">日本</text>
                    <text transform="translate(75 233.2)"
                        style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">韓國</text>
                    <text transform="translate(75 272.8)"
                        style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">中國</text>
                    <text transform="translate(75 312.3)"
                        style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">香港</text>
                    <text transform="translate(75 351.9)"
                        style="fill: #4c2a70; font-family: MyriadPro-Regular; font-size: 20px;">澳門</text>
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
    <!-- university cards section -->
    <div class="l-seniorPage_content row">
        @forelse($universities as $university)
        <!-- university component from public/scss/component/uniCard.scss -->
        <div class="c-uniCard" onclick="uniCardClick('{{ $university->slug }}')">
            <span class="c-uniCard_img" style="background-image: url('{{asset($university->image_path)}}') ;">&nbsp;</span>
            <h6>{{ \Illuminate\Support\Str::limit($university->chinese_name, 15) }}</h6>
            <h4>{{ \Illuminate\Support\Str::limit($university->english_name, 25) }}</h4>
            <h5>目前有<a
                    href="{{route('senior', ['university' => $university->slug])}}">{{$university->vip->count()}}</a>位學長姊
            </h5>
        </div>
        @empty
        <div class="row text-center">
            <p class="vh-100">
                目前尚無資料
            </p>
        </div>
        @endforelse
    </div>
</div>
<div class="c-pagination">
        {{$universities->appends($_GET)->links('vendor.pagination.bootstrap-4')}}
</div>

@endsection