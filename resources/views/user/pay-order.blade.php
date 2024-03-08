@extends('layouts.sbadmin')

@section('content')
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content" style="margin:15px">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">加值紀錄</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div>
                                <div class="col-sm-12">
                                    <table class="table table-bordered dataTable" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                        <thead>
                                        <tr>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                            >用戶</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Age: activate to sort column ascending"
                                            >產品名稱</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Age: activate to sort column ascending"
                                            >日期</th>
{{--                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"--}}
{{--                                                colspan="1" aria-label="Age: activate to sort column ascending"--}}
{{--                                            >延長日期</th>--}}
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(!is_null($orders))
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td>{{$order->user->name}}</td>
                                                    <td>{{$order->product->name}}</td>
                                                    <td>{{$order->created_at->format('Y/m/d H:i:s')}}</td>
{{--                                                    <td>{{$order->remark}}</td>--}}
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="3">
                                                    <nav>
                                                        {{$orders->links('vendor.pagination.bootstrap-4')}}
                                                    </nav>
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td colspan="3" class="text-center">尚未有加值紀錄</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
