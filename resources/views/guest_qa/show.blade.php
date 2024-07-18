@extends('layouts.guest2')

@section('content')
<!-- breadcrumb -->
<div class="container">
    <div class="c-breadcrumbs">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="c-breadcrumbs__prePage">
                    <a href="{{url('/')}}" class="text-decoration-none text-black">首頁</a>
                    > 問與答
                    <a> > {{$qna->title}}</a>
                </h4>
            </div>
        </div>
    </div>
</div>

<!-- main content section -->
<div class="container p-5">
    <div class="row gx-5 m-5">
        <!-- main -->
        <div class="col-md-8">
            <!-- Basic informations -->
            <div class="row">
                <!-- date section -->
                <p class="col-md-12">{{$qna->created_at->format('Y/m/d')}}</p>
                <!-- The question title -->
                <h2 class="col-md-10 l-qnaGuest__title">{{$qna->title}}</h2>
                <div class="col-md-2 align-content-end">
                    @if(auth()->check())
                        <i class="bi bi-bookmark-fill collect-qa d-flex" data-id="{{$qna->id}}" style="
                                    color: @if(auth()->user()->collectQa->where('qa_id', $qna->id)->count()==1) red @else black @endif ;
                                            ">
                            <span>{{$qna->collectQa->count()}}</span>
                        </i>
                    @else
                        <i class="bi bi-bookmark-fill collect-qa d-flex" data-id="{{$qna->id}}">
                            <span>{{$qna->collectQa->count()}}</span>
                        </i>
                    @endif
                </div>
            </div>
            <!-- QA tags -->
            <div class="row">
                @if(!is_null($qna->categoryRelation))
                @foreach($qna->categoryRelation as $relation)
                <div class="col-md-2">
                    <div class="o-smallBtn">
                        {{$relation->category->name}}
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <!-- details -->
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="row">
                        <span for="" class="o-qnaBtn col-md-2">金額</span>
                        <p class="align-content-end pt-2 col-md-10 l-qnaGuest__statusContent">
                            {{$qna->amount_down}}-{{$qna->amount_up}}</p>
                        <hr class="mt-3">
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="row">
                        <span for="" class="o-qnaBtn col-md-2">時間</span>
                        <p class="align-content-end pt-2 col-md-10 l-qnaGuest__statusContent">
                            {{ Carbon\Carbon::parse($qna->contact_time)->format('Y-m-d H:i:s')}} 至
                            {{ \Carbon\Carbon::parse($qna->contact_time_end)->format('Y-m-d H:i:s')}}</p>
                        <hr class="mt-3">
                    </div>

                </div>
                <div class="col-md-12 mt-3">
                    <div class="row">
                        <span for="" class="o-qnaBtn col-md-2">地點</span>
                        <p class="align-content-end pt-2 col-md-10 l-qnaGuest__statusContent">{{$qna->place}}</p>
                        <hr class="mt-3">
                    </div>

                </div>
                <div class="col-md-12 mt-3">
                    <div class="row">
                        <span for="" class="o-qnaBtn col-md-2">說明</span>
                        <p class="align-content-end pt-5 col-md-10 text-break">
                            {!! $qna->body !!}
                        </p>
                        <hr class="mt-3">
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="row">
                        <span class="o-qnaBtn col-md-2">參考</span>
                        <!-- attachments -->
                        <div class="attachment">
                            <!-- files -->
                            @forelse($qna->attachments as $attachment)
                            <a href="{{route('download-attachment', $attachment->id)}}">
                                <div class="file d-flex mr-1">
                                    <svg viewBox="0 0 300 300">
                                        <path fill="#C39FC0" d="M265.4,300H34.6C15.5,300,0,284.5,0,265.4V34.6C0,15.5,15.5,0,34.6,0h230.8C284.5,0,300,15.5,300,34.6v230.8
                                            C300,284.5,284.5,300,265.4,300z" />
                                        <path fill="#FFFFFF" d="M262.1,284H37.9C25.2,284,15,273.8,15,261.1V82.9C15,70.2,25.2,60,37.9,60h224.3c12.6,0,22.9,10.2,22.9,22.9
                                            v178.3C285,273.8,274.8,284,262.1,284z" />
                                        <g>
                                            <path fill="#5E4A81"
                                                d="M127.9,249.5c-1.7,0-3.3,0-5,0c0-1.2-0.9-2.1-1.4-3c-9-16.8-20.7-32.2-27.1-50.4c0-1.2,0-2.5,0-3.7
                                                c1.5-4.5,2.7-9.1,5.2-13.3c7.6-13,15-26,22.6-39.1c0.7-1.4,1.7-2.3,3.3-2.4c0.6,0.9,1.7,1.2,2.5,1.7c5.4,3,10.9,6,16.2,9.1
                                                c4.5,2.7,4.4,3.2,1.7,7.8c-1.7,2.8-4.3,5.2-4.4,8.7c-2.9,4.2-5.7,8.3-7.5,13.1c-0.7,0.1-1.2,0.5-1,1.2c0.4,1.1,1.4,1.2,2.3,1.2
                                                c7.2,0,14.5,0.6,21.6-0.4c4.7-0.6,9.1-0.6,13.7-0.8c2.8-0.1,3.9,1.2,3.9,3.9c-0.1,6.2,0,12.4,0,18.6c0,1.2-0.2,2.5,0.6,3.6
                                                c-0.4,2.3-2.1,2.8-4.2,2.8c-6.1-0.1-12.2-0.1-18.3,0c-5.2,0.1-10.3,0.1-15.5,0.2c-2.5,0-3,1.3-2.1,3.4c0.4,1.1,1,2.1,1.6,3
                                                c3.5,6.1,7,12.2,10.5,18.2c1.4,2.4,1.1,4.2-1.4,5.7c-4.7,2.5-9.2,5.5-14,7.9C130.3,247.3,128.6,247.8,127.9,249.5z" />
                                            <path fill="#FEFEFE" d="M127.9,249.5c0.7-1.7,2.4-2.2,3.8-2.9c4.8-2.4,9.3-5.3,14-7.9c2.5-1.4,2.8-3.3,1.4-5.7
                                                c-3.5-6.1-7-12.2-10.5-18.2c-0.6-1-1.1-2-1.6-3c-0.9-2.1-0.4-3.4,2.1-3.4c5.2-0.1,10.3-0.2,15.5-0.2c6.1-0.1,12.2-0.1,18.3,0
                                                c2.1,0,3.7-0.5,4.2-2.8c2.7-0.7,3.9-3,5.1-5.1c7-11.9,13.4-24.2,20.3-36.1c5-8.7,4.9-18-0.1-26.9c-3.9-6.9-8-13.7-12-20.6
                                                c-4.4-7.3-8.2-15-13.3-21.9c9.3,0,18.6,0.1,28-0.1c1.6,0,1.9,0.4,1.9,1.9c-0.1,50.3-0.1,100.6,0.1,150.9c0,2.1-0.9,1.9-2.2,1.9
                                                C177.8,249.5,152.8,249.5,127.9,249.5z" />
                                            <path fill="#C39FC0" d="M175,94.9c5.1,6.9,8.9,14.5,13.3,21.9c4,6.8,8.1,13.6,12,20.6c5,8.9,5.2,18.2,0.1,26.9
                                                c-7,11.9-13.4,24.2-20.3,36.1c-1.2,2.1-2.4,4.4-5.1,5.1c-0.8-1.1-0.6-2.4-0.6-3.6c0-6.2-0.1-12.4,0-18.6c0-2.7-1.1-4-3.9-3.9
                                                c-4.6,0.2-9.1,0.1-13.7,0.8c-7.1,1-14.4,0.4-21.6,0.4c-0.9,0-1.9-0.2-2.3-1.2c-0.2-0.7,0.2-1.1,1-1.2c0.9,0.6,1.9,0.9,2.9,0.9
                                                c6.9-0.1,13.9-0.1,20.8-0.1c1.6,0,2.4-0.7,3-2.1c1.1-2.4,2.3-4.7,3.5-6.9c2.2-3.9,1.7-4.7-2.6-4.7c-6.7-0.1-13.4-0.1-20.1-0.2
                                                c0.1-3.6,2.7-6,4.4-8.7c2.7-4.6,2.9-5-1.7-7.8c-5.3-3.2-10.8-6.1-16.2-9.1c-0.9-0.5-1.9-0.8-2.5-1.7c1.1-1.1,2.4-1,3.8-1
                                                c10.3-0.1,20.7,0,31-0.1c4.5-0.1,4.8-0.9,2.7-4.9c-3.5-6.8-7.5-13.4-11.4-19.9c-1.2-2.1-0.9-3.7,1.2-4.9c2.5-1.4,5-2.9,7.5-4.4
                                                c3.9-2.4,8.3-4.2,11.7-7.4C173,94.9,174.1,94.9,175,94.9z" />
                                            <path fill="#FEFEFE" d="M171.9,94.9c-3.4,3.2-7.8,5-11.7,7.4c-2.5,1.5-5,3-7.5,4.4c-2.1,1.2-2.5,2.9-1.2,4.9
                                                c3.9,6.5,7.8,13.1,11.4,19.9c2.1,3.9,1.8,4.8-2.7,4.9c-10.3,0.1-20.7,0.1-31,0.1c-1.4,0-2.7-0.1-3.8,1c-1.6,0.1-2.5,1.1-3.3,2.4
                                                c-7.5,13.1-14.9,26.1-22.6,39.1c-2.5,4.2-3.7,8.8-5.2,13.3c0-31.7,0-63.5-0.1-95.1c0-1.9,0.4-2.4,2.4-2.4
                                                C121.8,94.9,146.9,94.9,171.9,94.9z" />
                                            <path fill="#FEFEFE" d="M94.4,196.1c6.5,18.2,18.1,33.6,27.1,50.4c0.5,1,1.4,1.8,1.4,3c-8.9,0-17.8-0.1-26.7,0.1
                                                c-1.6,0-1.9-0.4-1.9-1.9C94.4,230.5,94.4,213.3,94.4,196.1z" />
                                            <path fill="#FEFEFE"
                                                d="M141.4,165c6.7,0.1,13.4,0.1,20.1,0.2c4.4,0.1,4.8,0.9,2.6,4.7c-1.2,2.2-2.5,4.5-3.5,6.9
                                                c-0.6,1.4-1.4,2.1-3,2.1c-6.9,0-13.9,0.1-20.8,0.1c-1.1,0-2.1-0.2-2.9-0.9C135.7,173.3,138.6,169.1,141.4,165z" />
                                        </g>
                                        <text transform="matrix(1 0 0 1 54.6553 41.3376)" fill="#FFFFFF"
                                            font-size="25px">{{pathinfo($attachment->file_name)['basename']}}</text>
                                        <rect x="21" y="21" fill="#FFFFFF" width="26" height="26" />
                                        <circle fill="#FFFFFF" cx="266" cy="15" r="6" />
                                        <circle fill="#FFFFFF" cx="266" cy="30.5" r="6" />
                                        <circle fill="#FFFFFF" cx="266" cy="46" r="6" />
                                    </svg>
                                </div>
                            </a>
                            @empty
                            @endforelse

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- side info -->
        <div class="col-md-4 p-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="l-qnaGuest__infoHeader">聯絡資訊</h3>
                    </div>
                </div>

                <div class="l-qnaGuest__border pb-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- name card -->
                                <div class="row p-3">
                                    <div class="col-md-2 p-0">
                                        <svg class="l-qnaGuest__thumbNail" viewbox="0 0 100 100">
                                            <circle cx="50" cy="50" r="50" />
                                        </svg>
                                    </div>
                                    <div class="col-md-10 p-0">
                                        <span class="l-qnaGuest__name">{{$qna->nickname}}</span>
                                    </div>
                                </div>
                                <!-- contact -->
                                <div class="container pl-5 pr-5 pb-3">
                                    <div class="row">
                                        <p class="pl-5">
                                            聯絡電話
                                        </p>
                                        <svg class="l-qnaGuest__infoContact" viewBox="0 0 675 126">
                                            <rect x="45" width="630" height="126" rx="20" ry="20" fill="#BD9EBE" />
                                            <path d="M60.5,18.5c0,0-41,8-60-19c0,0,11,47.2,60,47.2" fill="#BD9EBE" />
                                            @if(auth()->guest() || !auth()->user()->isVip())
                                            <text x="30%" y="60%"
                                                fill="#ffffff">{{mb_substr($qna->phone, 0,1)}}*************</text>
                                            @else
                                            <text x="30%" y="60%" fill="#ffffff">{{$qna->phone}}</text>
                                            @endif
                                        </svg>
                                    </div>
                                    <div class="row">
                                        <p class="pl-5">
                                            Email
                                        </p>
                                        <svg class="l-qnaGuest__infoContact" viewBox="0 0 675 126">
                                            <rect x="45" width="630" height="126" rx="20" ry="20" fill="#BD9EBE" />
                                            <path d="M60.5,18.5c0,0-41,8-60-19c0,0,11,47.2,60,47.2" fill="#BD9EBE" />
                                            @if(auth()->guest() || !auth()->user()->isVip())
                                            @if(filter_var($qna->email, FILTER_VALIDATE_EMAIL))
                                            <text x="30%" y="60%" fill="#ffffff">{{mb_substr($qna->email,0,1)}} ******@
                                                {{ explode('@',$qna->email)[1] }}</text>
                                            @else
                                            <text x="30%" y="60%" fill="#ffffff">{{mb_substr($qna->email,0,1)}}
                                                *******************</text>
                                            @endif
                                            @else
                                            <text x="30%" y="60%" fill="#ffffff">{{$qna->email}}</text>
                                            @endif
                                        </svg>
                                    </div>
                                    <div class="row">
                                        <p class="pl-5">
                                            Line
                                        </p>
                                        <svg class="l-qnaGuest__infoContact" viewBox="0 0 675 126">
                                            <rect x="45" width="630" height="126" rx="20" ry="20" fill="#BD9EBE" />
                                            <path d="M60.5,18.5c0,0-41,8-60-19c0,0,11,47.2,60,47.2" fill="#BD9EBE" />
                                            @if(auth()->guest() || !auth()->user()->isVip())
                                            <text x="30%" y="60%"
                                                fill="#ffffff">{{mb_substr($qna->line, 0, 1)}}*************</text>
                                            @else
                                            <text x="30%" y="60%" fill="#ffffff">{{$qna->line}}</text>
                                            @endif
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(auth()->guest() || !auth()->user()->isVip())

                <div class="l-qnaGuest__callAction">
                    <div class="container-fluid p-0 m-0">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="l-qnaGuest__seeMore" onclick="joinYZL('joinYZL')">點擊查看</h4>
                            </div>
                        </div>
                        <div id="joinYZL" class="row p-5">
                            <div class="col-md-12">
                            <h6 class="l-qnaGuest__quest">我們一起幫助學弟妹</h6>
                            </div>
                            <div class="col-md-12 text-center">
                            <a class="l-qnaGuest__join" href="{{route('pay-product-list')}}">點擊成為學長姐</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="container p-5">
    <div class="row m-5">
        <div class="col-md-12">
            <h2 class="o-normalTitle">相似問題</h2>
        </div>
    </div>
    <div class="row m-5">
        @if(!is_null($sameqna))
        @foreach($sameqna as $qa)
        <div class="col-md-9">
            <div class="container-fluid">
                <!-- qna card -->
                <div class="c-qnaCard">
                    <div class="row">
                        <div class="col-md-11 p-5">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="c-qnaCard__info">
                                        <svg class="c-qnaCard__thumbNail" viewbox="0 0 100 100">
                                            <circle cx="50" cy="50" r="50" />
                                        </svg>
                                        <p class="align-content-center">匿名</p>
                                    </div>
                                </div>
                                <div class="col-md-10 align-content-center">
                                    @if($qa->category)
                                    <span class="o-smallBtn">
                                        {{$qa->category->name}}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <a class="o-articleTitle" href="{{route('qna.show', $qa->qa_id)}}">{{$qa->qa->title}}</a>
                            <div class="row">
                                <div class="col-md-10">
                                    <p class="c-qnaCard__content">
                                        {!!\Illuminate\Support\Str::limit(strip_tags($qa->qa->body))!!}</p>
                                </div>
                                <div class="col-md-2">
                                    <div class="lign-content-end">
                                        @if(auth()->check())
                                            <i class="bi bi-bookmark-fill collect-qa d-flex" data-id="{{$qa->qa_id}}" style="
                                            color: @if(auth()->user()->collectQa->where('qa_id', $qa->qa_id)->count()==1) red @else black @endif ;
                                            ">
                                                <span>{{$qa->qa->collectQa->count()}}</span>
                                            </i>
                                        @else
                                            <i class="bi bi-bookmark-fill collect-qa d-flex" data-id="{{$qa->qa_id}}">
                                                <span>{{$qa->qa->collectQa->count()}}</span>
                                            </i>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <svg viewBox="0 0 45 150">
                                <polygon fill="#4C2A70" points="50,150 0,150 35,75 0,0 50,0 " />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>
@endsection
@section('page_js')
    <script>
        $('.collect-qa').click(function () {
            let that = $(this);
            $.ajax({
                url: "{{url('collect-qa')}}" + "/" + $(this).data('id'),
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