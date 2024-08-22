@extends('layouts.sbadmin')

@section('content')
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="o-sbadminTitle">付費加值</h6>
            </div>
            @if(session('message'))
            <div class="alert alert-danger text-center">
                {!! session('message') !!}
            </div>
            @endif
            <div class="card-body">
                <div class="text-center mx-auto container">
                    <div class="row p-3">
                        <div class="l-payList__img col-md-12"
                            style="background-image: url('{{asset('uploads/images/join-banner-cut.jpg')}}');">
                            &nbsp;
                        </div>
                    </div>
                    <div class="row">
                        @if(!is_null($products))
                        @foreach($products as $product)
                        <div class="col-md-4 p-3">
                            <div class="card l-payList__card">
                                <div class="l-payList__header o-normalTitle card-header">
                                    {{$product->name}}
                                </div>
                                <div class="card-body">
                                    <h2>{{$product->description}}</h2>
                                    <p>加值{{$product->pay_time}}個月</p>
                                    <p>加值金額：{{$product->price}}</p>
                                </div>
                                <div class="l-payList__btns card-footer d-flex justify-content-around">
                                    <form action="{{ route('pay-product' , $product->id) }}" method="post">
                                        {{csrf_field()}}
                                        <button class="o-btn">Line Pay</button>
                                    </form>
                                    <form action="{{ route('pay-product-ecpay' , $product->id) }}" method="post">
                                        {{csrf_field()}}
                                        <button class="o-btn">綠界</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
                <div class="row p-4">
                    <div class="col-md-12 l-payList__slogan">
                        <p class="text-center p-3 p-md-5">我們深信你的留學經歷正是人生第一個資產，除了珍惜更要善用變現的機會。<br>每個月省下一杯拿鐵的錢錢，在易子學發展自己的留學諮詢事業。</p>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection