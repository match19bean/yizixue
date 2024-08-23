@extends('layouts.sbadmin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="o-sbadminTitle">佈告欄</h1>
        </div>

        <div class="card mb-4">

            @foreach ($Data['bulletin_board'] as $key => $value)
                <div class="card o-bulletBoard text-white shadow">
                    <div class="card-body">
                        <h3 class="o-smallWhiteTitle">公告</h3>
                        <div class="text-white-50 small">{{$value->message}}</div>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="d-flex justify-content-around text-center mt-4">
            {{$Data['bulletin_board']->links("pagination::bootstrap-4")}}
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
