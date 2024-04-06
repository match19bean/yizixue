@extends('layouts.guest2')

@section('content')
<div class="question-and-answer-page">
<div class="row text-gray-600">
        <h4 class="mt-3">首頁 > 問與答</h4>
    </div>
    <div class="row mt-4 qaSection">
        <!-- main -->
        <div class="col-8">
            <!-- Basic informations -->
            <div class="row">
                <div class="col-10">
                    <!-- date section -->
                    <p>{{$qna->created_at->format('Y/m/d')}}</p>
                    <!-- The question title -->
                    <h2>{{$qna->title}}</h2>
                    <!-- QA tags -->
                    <div class="row row-cols-4">
                        @if(!is_null($qna->categoryRelation))
                            @foreach($qna->categoryRelation as $relation)
                                <div class="col">
                                    <div class="w-75 text-center btn text-white" style="background-color: #4C2A70">
                                        {{$relation->category->name}}
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <!-- details -->
            <div class="row mt-3 border-b-line d-flex">
                <span for="" class="btn text-white w-25 mb-1" style="background-color: #4C2A70">金額</span>
                <p class="w-75 align-bottom pt-2">{{$qna->amount_down}}-{{$qna->amount_up}}</p>
            </div>
            <div class="row mt-3 border-b-line d-flex">
                <span for="" class="btn text-white w-25 mb-1" style="background-color: #4C2A70">時間</span>
                <p class="w-75 align-bottom pt-2">{{ Carbon\Carbon::parse($qna->contact_time)->format('Y-m-d H:i:s')}}  至 {{ \Carbon\Carbon::parse($qna->contact_time_end)->format('Y-m-d H:i:s')}}</p>
            </div>
            <div class="row mt-3 border-b-line d-flex">
                <span for="" class="btn text-white w-25 mb-1" style="background-color: #4C2A70">地點</span>
                <p class="w-75 align-bottom pt-2">{{$qna->place}}</p>
            </div>
            <div class="row mt-3 border-b-line d-flex">
                <span for="" class="btn text-white w-25 mb-1" style="background-color: #4C2A70">說明</span>
                <p class="w-75 align-bottom pt-2 text-break">
                    {!! $qna->body !!}
                </p>
            </div>
            <div class="row mt-3 border-b-line d-flex">
                <span class="btn text-white w-25 mb-1" style="background-color: #4C2A70">參考附件</span>
                <!-- attachments -->
                <div class="attachment d-flex flex-row">
                    <!-- files -->
                    @forelse($qna->attachments as $attachment)
                        <a  class="text-decoration-none text-black">
                            <div class="file d-flex">
                                <svg>
                                    <rect width="100%" height="80%" x="0" y="0" fill="white" />
                                    <foreignObject width="120" height="100">
                                        <body xmlns="http://www.w3.org/1999/xhtml">
                                        <p style="font-size: 0.8rem;">{{pathinfo($attachment->file_name)['filename']}}</p>
                                        </body>
                                    </foreignObject>
                                </svg>
                            </div>
                        </a>
                    @empty
                    @endforelse
{{--                    <div class="file d-flex">--}}
{{--                        <svg>--}}
{{--                            <rect width="100%" height="100%" x="0" y="0" fill="white" />--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                    <div class="file d-flex">--}}
{{--                        <svg>--}}
{{--                            <rect width="100%" height="100%" x="0" y="0" fill="white" />--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                    <div class="file d-flex">--}}
{{--                        <svg>--}}
{{--                            <rect width="100%" height="100%" x="0" y="0" fill="white" />--}}
{{--                        </svg>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
        <!-- side info -->
        <div class="col-4">
            <div class="card">
                <div class="card-header text-white text-center" style="background-color: #4C2A70">
                    <h3>聯絡資訊</h3>
                </div>

                <div class="card-body">
                    <!-- name card -->
                    <div class="avatarName mb-3">
                        <div class="avatar">
                            @if(!is_null($qna->author->avatar))
                                <img class="w-100 d-none" src="{{asset('uploads/'.$qna->author->avatar)}}" alt="user avatar">
                            @else
                                <img class="w-100 d-none" src="{{asset('uploads/images/default_avatar.png')}}" alt="user avatar">
                            @endif
                        </div>
                        <div class="nameCard text-white" style="background-color: #BD9EBE">
                            <span style="font-size: 1.5rem;">{{$qna->nickname}}</span>
                        </div>
                    </div>
                    <!-- contact -->
                    <div class="row contact mb-3">
                        <p class="px-5">
                            聯絡電話
                        </p>
                        <svg class="px-3 mx-3" viewBox="0 0 675 126">
                            <rect x="45" width="630" height="126" rx="20" ry="20" fill="#BD9EBE"/>
                            <path d="M60.5,18.5c0,0-41,8-60-19c0,0,11,47.2,60,47.2" fill="#BD9EBE"/>
                            @if(auth()->guest() || !auth()->user()->isVip())
                                <text x="30%" y="60%" fill="#ffffff">{{mb_substr($qna->phone, 0,1)}}*************</text>
                            @else
                                <text x="30%" y="60%" fill="#ffffff">{{$qna->phone}}</text>
                            @endif
                        </svg>
                    </div>
                    <div class="row contact mb-3">
                        <p class="px-5">
                            Email
                        </p>
                        <svg class="px-3 mx-3" viewBox="0 0 675 126">
                            <rect x="45" width="630" height="126" rx="20" ry="20" fill="#BD9EBE"/>
                            <path d="M60.5,18.5c0,0-41,8-60-19c0,0,11,47.2,60,47.2" fill="#BD9EBE"/>
                            @if(auth()->guest() || !auth()->user()->isVip())
                                <text x="30%" y="60%" fill="#ffffff">{{mb_substr($qna->email,0,1)}} ******@ {{ explode('@',$qna->email)[1] }}</text>
                            @else
                                <text x="30%" y="60%" fill="#ffffff">{{$qna->email}}</text>
                            @endif
                        </svg>
                    </div>
                    <div class="row contact mb-3">
                        <p class="px-5">
                            Line
                        </p>
                        <svg class="px-3 mx-3" viewBox="0 0 675 126">
                            <rect x="45" width="630" height="126" rx="20" ry="20" fill="#BD9EBE"/>
                            <path d="M60.5,18.5c0,0-41,8-60-19c0,0,11,47.2,60,47.2" fill="#BD9EBE"/>
                            @if(auth()->guest() || !auth()->user()->isVip())
                                <text x="30%" y="60%" fill="#ffffff">{{mb_substr($qna->line, 0, 1)}}</text>
                            @else
                                <text x="30%" y="60%" fill="#ffffff">{{$qna->line}}</text>
                            @endif
                        </svg>
                    </div>
                </div>
                @if(auth()->guest() || !auth()->user()->isVip())
                    <div class="card-footer text-white text-center" style="background-color: #4C2A70">
{{--                        <a href="{{route('pay-product-list')}}" class="text-decoration-none text-white"><h4>點擊查看</h4></a>--}}
                        <h4>點擊查看</h4>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="row similarQ">
        <div class="row m-3">
            <h2 style="color: #4C2A70;">相似問題</h2>
        </div>
        <div class="row">
            @if(!is_null($sameqna))
                @foreach($sameqna as $qa)
                    <div class="col-5 row py-1 m-3">
                        <div class="col-11 text-lg p-3" style="border-left-style: solid; border-top-style: solid; border-bottom-style: solid; border-color: #6D757D;">
                            <div class="titleInfo">
                                <i class="fa fa-circle" style="color:gray"></i>
                                <a href="{{route('qna.show', $qa->qa_id)}}" class="text-decoration-none text-black-50">{{$qa->qa->title}}</a>
                                <span class="w-100">
                                    @if($qa->category)
                                        <span class="btn text-center text-white" style="background-color: #4C2A70">
                                            {{$qa->category->name}}
                                        </span>
                                    @endif
                                </span>
                            </div>
                            <div class="row text-break">
                                {!! \Illuminate\Support\Str::limit($qa->qa->body) !!}
                            </div>
                        </div>
                        <div class="qStyle col">
                            <svg viewBox="0 0 45 150">
                                <polygon fill="#4C2A70" points="50,150 0,150 35,75 0,0 50,0 "/>
                            </svg>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection