@extends('layouts.sbadmin')

@section('content')
<div id="content-wrapper" class="d-flex flex-column">

    <div class="row justify-content-md-center">
        <div style="margin-bottom: 10px;" class="col-xl-10 col-lg-7">
            <div style="background: #4C2A70; padding:5px" class="card text-white shadow">
                <h2 style="margin: 0;" class="text-center">{{$Data['article']->title}}</h2>
            </div>
        </div>
        <div class="col-xl-10 col-lg-7">
            <div class="card shadow mb-4">

                <div class="row">
                    <div class="col text-right h6">發布日期{{$Data['article']->created_at->format('Y/m/d')}}</div>
                </div>

                <div class="row text-center">
                    <div class="text-center">
                        <img src="{{asset('uploads/'.$Data['article']->image_path)}}" alt="" class="img-fluid w-50">
                    </div>
                </div>
                <div class="row text-center h-50 mt-3" style="word-wrap:break-word; word-break: break-all; font-size: 2rem;">
                    {!! $Data['article']->body !!}
                </div>
                <div class="row row-cols-2">
                    <!-- categorys -->
                    <div class="col postCategory">
                        @if(!is_null($Data['article']->category))
                            @foreach($Data['article']->category as $category)
                                <span class="btn btn-outline" style="border-color: #4C2A70; color: #4C2A70">#{{$category->postCategory->name}} </span>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
