@extends('layouts.sbadmin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">佈告欄</h1>
        </div>

        <div class="card mb-4">

            @foreach ($Data['bulletin_board'] as $key => $value)
                <div class="card bg-info text-white shadow">
                    <div class="card-body">
                        公告
                        <div class="text-white-50 small">{{$value->message}}</div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
