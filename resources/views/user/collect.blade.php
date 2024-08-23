@extends('layouts.sbadmin')

@section('content')
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content" style="margin:15px">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="o-sbadminTitle">學長姐收藏名單</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered dataTable" id="dataTable" width="100%"
                                        cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                        style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    >用戶</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Age: activate to sort column ascending"
                                                    >頭像</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Age: activate to sort column ascending"
                                                >學校</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Age: activate to sort column ascending"
                                                    >動作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($Data['Users'] as $key => $user)
                                        <tr>
                                            <td><a href="{{route('get-introduction', $user->id)}}">{{$user->name}}</a></td>
                                            <td>
                                                @if(is_null($user->avatar))
                                                    <img src="{{asset('uploads/images/default_avatar.png')}}" alt="" width="200" height="200">
                                                @else
                                                    <img src="{{asset('uploads/'.$user->avatar)}}" alt="" width="200" height="200">
                                                @endif
                                            </td>
                                            <td>{{!is_null($user->universityItem) ? $user->universityItem->english_name : ''}}</td>
                                            <td>
                                                <form action="{{route('delete-collect', $user->id)}}" method="post">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                    <button type="submit" class="btn btn-primary" data-dismiss="modal">刪除</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                            
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
