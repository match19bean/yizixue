@extends('layouts.sbadmin')

@section('content')
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content" style="margin:15px">

            <div class="row justify-content-md-center">
                <div style="margin-bottom: 10px;" class="col-xl-10 col-lg-7">
                    <div style="background: #4C2A70; padding:5px" class="card text-white shadow">
                        <h2 style="margin: 0;" class="text-center">發布的問題</h2>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-7">
                    <div class="card shadow mb-4">
                        @foreach ($Data['QandA'] as $key => $qa)
                        <!-- Card Body -->
                        <div style="background: #FFFFFF;"
                            class="card-body d-flex justify-content-center">
                            <div class="col-xl-10 col-lg-7">
                                <div class="card d-flex justify-content-center shadow" style="border-right: 50px solid #4C2A70">
                                    <!-- Card Header - Dropdown -->
                                    <div class="d-flex flex-row align-items-center justify-content-between">
                                        <p class="m-0 font-weight-bold text-primary"></p>
                                        <div class="dropdown no-arrow">
                                            <a style="margin:5px" class="dropdown-toggle" href="#" role="button"
                                                id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                aria-labelledby="dropdownMenuLink">
                                                <div class="dropdown-header">動作:</div>
                                                <a class="dropdown-item" href="{{ route('qna/'.$qa->id) }}">查看</a>
                                                <a class="dropdown-item" href="/edit-qa/{{ $qa->uuid }}">編輯</a>
                                                <a class="dropdown-item" href="/delete-qa/{{ $qa->uuid }}">刪除</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <?php
                                            $QAcategories = $Data['QACategoryRelation']->where('qa_id', $qa->id)->get();
                                        ?>
                                        <h4 style="align-items: center;">
                                        {{ substr($qa->title, 0, 25) }}...
                                        @foreach ($QAcategories as $cateId)
                                            <?php
                                                $cate = $Data['QACategory']->where('id', $cateId->category_id)->first();
                                            ?>
                                            <span style="background: #4C2A70; color:#FFFFFF" href="#" class="d-none d-sm-inline-block btn btn-sm shadow-sm">
                                                #{{$cate->name}}
                                            </span>
                                        @endforeach
                                        </h4>
                                        <p>{!! substr($qa->body, 0, 300) !!}...</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
