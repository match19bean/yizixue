@extends('layouts.sbadmin')

@section('content')
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content" style="margin:15px">
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
                        <p class="w-75 align-bottom pt-2 text-center">{{ Carbon\Carbon::parse($qna->contact_time)->format('Y-m-d H:i:s')}}  至 {{ \Carbon\Carbon::parse($qna->contact_time_end)->format('Y-m-d H:i:s')}}</p>
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
                        @if(auth()->check() &&  auth()->user()->expired >= now() )
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        @if(!is_null($qna->author->avatar))
                                            <img class="w-100" src="{{asset('uploads/'.$qna->author->avatar)}}" alt="user avatar">
                                        @else
                                            <img class="w-100" src="{{asset('uploads/images/default_avatar.png')}}" alt="user avatar">
                                        @endif
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
                        @if(auth()->guest() || auth()->user()->expired < now())
                            <div class="card-footer text-white text-center" style="background-color: #4C2A70">
                                <a href="{{route('pay-product-list')}}" class="text-decoration-none text-white"><h4>點擊查看</h4></a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
