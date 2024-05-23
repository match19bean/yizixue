@extends('layouts.sbadmin')

@section('content')
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content" style="margin:15px">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">所有加值服務</h6>
                </div>
                <div class="card-body">
                    <div class="text-center w-75 mx-auto">
                            @if(!is_null($products))
                                @foreach($products as $product)
                                    <div class="card">
                                        <div class="card-header">
                                            {{$product->name}}
                                        </div>
                                        <div class="card-body">
                                            <h2>{{$product->description}}</h2>
                                            <p>加值{{$product->pay_time}}個月</p>
                                            <p>加值金額：{{$product->price}}</p>
                                        </div>
                                        <div class="card-footer d-flex justify-content-around">
                                            <form action="{{ route('pay-product' , $product->id) }}" method="post">
                                                {{csrf_field()}}
                                                <button class="btn btn-primary">Line Pay</button>
                                            </form>
                                            <form action="{{ route('pay-product-ecpay' , $product->id) }}" method="post">
                                                {{csrf_field()}}
                                                <button class="btn btn-primary">綠界</button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
