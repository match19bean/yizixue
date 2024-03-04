@extends('layouts.guest2')

@section('content')
    <div class="row text-gray-600">
        <h4 class="mt-3">首頁 > 問與答</h4>
    </div>

    <div class="row mt-4">
        <div class="col-8">
            <div class="row">
                <div class="col-2">
                    <span class="w-100"><i class="fa fa-circle" style="font-size: 5rem; color: #6D757D;"></i></span>
                </div>
                <div class="col-10">
                    <p>{{$qna->created_at->format('Y/m/d')}}</p>
                    <h2>{{$qna->title}}</h2>
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
            <div class="row mt-3 border-bottom-secondary d-flex">
                <span for="" class="btn text-white w-25 mb-1" style="background-color: #4C2A70">金額</span>
                <p class="w-75 align-bottom pt-2 text-center">{{$qna->amount_down}}-{{$qna->amount_up}}</p>
            </div>
            <div class="row mt-3 border-bottom-secondary d-flex">
                <span for="" class="btn text-white w-25 mb-1" style="background-color: #4C2A70">時間</span>
                <p class="w-75 align-bottom pt-2 text-center">{{$qna->contact_time}}-{{$qna->contact_time_end}}</p>
            </div>
            <div class="row mt-3 border-bottom-secondary d-flex">
                <span for="" class="btn text-white w-25 mb-1" style="background-color: #4C2A70">地點</span>
                <p class="w-75 align-bottom pt-2 text-center">{{$qna->place}}</p>
            </div>
            <div class="row mt-3 border-bottom-secondary d-flex">
                <span for="" class="btn text-white w-25 mb-1" style="background-color: #4C2A70">說明</span>
                <p class="w-75 align-bottom pt-2 text-center text-break">
                    {!! $qna->body !!}
                </p>
            </div>
        </div>
        <div class="col-4">

            <div class="card">
                <div class="card-header text-white text-center" style="background-color: #4C2A70">
                    <h3>聯絡資訊</h3>
                </div>
                @if(auth()->check() && (auth()->user()->role === 'vip') && auth()->user()->expired >= now() ))
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <img class="w-100" src="{{asset('uploads/'.$qna->author->avatar)}}" alt="user avatar">
                        </div>
                        <div class="col-9 text-white text-center" style="background-color: #BD9EBE">
                            <span style="font-size: 1.5rem;">{{$qna->nickname}}</span>
                        </div>
                    </div>
                    <div class="row my-3">
                        <p class="px-5">
                            聯絡電話
                        </p>
                        <p class="px-5 py-2 btn mx-5 w-75 text-center text-white" style="background-color: #BD9EBE">
                            {{$qna->phone}}
                        </p>
                    </div>
                    <div class="row my-3">
                        <p class="px-5">
                            Email
                        </p>
                        <p class="px-5 py-2 btn mx-5 w-75 text-center text-white" style="background-color: #BD9EBE">
                            {{$qna->email}}
                        </p>
                    </div>
                    <div class="row my-3">
                        <p class="px-5">
                            Line
                        </p>
                        <p class="px-5 py-2 btn mx-5 w-75 text-center text-white" style="background-color: #BD9EBE">
                            {{$qna->line}}
                        </p>
                    </div>
                </div>
                @endif
                <div class="card-footer text-white text-center" style="background-color: #4C2A70">
                    <h4>點擊查看</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="row">
            <h2 style="color: #4C2A70;">相似問題</h2>
        </div>
        <div class="row">
            @if(!is_null($sameqna))
                @foreach($sameqna as $qa)
                    <div class="col-6 row py-1">
                        <div class="col-11 text-lg p-3" style="border-left-style: solid; border-top-style: solid; border-bottom-style: solid; border-color: #6D757D;">
                            <h2 class="d-flex">
                                <i class="fa fa-circle px-3" style="color:gray"></i>
                                <a href="{{route('qna.show', $qa->id)}}" class="text-decoration-none"></a>{{$qa->qa->title}}
                                <span class="w-100 text-right">
                                    @if($qa->category)
                                        <span class="btn px-4 text-center text-white" style="background-color: #4C2A70">
                                            {{$qa->category->name}}
                                        </span>
                                    @endif
                                </span>
                            </h2>
                            <div class="row text-center text-break">
                                {!! \Illuminate\Support\Str::limit($qa->qa->body) !!}
                            </div>
                        </div>
                        <div class="col-1" style="background-color: #4C2A70"></div>
                    </div>

                @endforeach
            @endif
        </div>
    </div>
@endsection