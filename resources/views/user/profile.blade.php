@extends('layouts.sbadmin')
<style>
    #checkbox input[type="checkbox"] {
        display: none;
    }

    #checkbox input:checked+.button {
        background: #5e7380;
        color: #fff;
    }

    #checkbox .button {
        display: inline-block;
        margin: 0 5px 10px 0;
        padding: 5px 10px;
        background: #f7f7f7;
        color: #333;
        cursor: pointer;
    }

    #checkbox .button:hover {
        background: #bbb;
        color: #fff;
    }

    #checkbox .round {
        border-radius: 5px;
    }
</style>
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <section style="background-color: #eee;">
            <div class="container py-5">
                <div class="row">
                    <div class="col">
                        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">User</a></li>
                                <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">您的頭像</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                        aria-labelledby="dropdownMenuLink" style="">
                                        <a class="dropdown-item" data-toggle="modal" data-target="#edit-avatar"
                                            href="#">編輯</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <a href="#" data-toggle="modal" data-target="#edit-avatar">
                                    @if(!is_null(Auth::user()->avatar))
                                    <img
                                        src="{{ url('/') . '/uploads/' . Auth::user()->avatar }}" alt="avatar"
                                        style="width: 150px;">
                                    @else
                                    <img
                                            src="{{ url('/') . '/uploads/images/default_avatar.png'}}" alt="avatar"
                                            style="width: 150px;">
                                    @endif
                                </a>
                                <h5 class="my-3">{{ Auth::user()->name }}</h5>
                                <p class="text-muted mb-1">{{ Auth::user()->role == 'normal' ? '一般用戶' : 'VIP用戶' }}</p>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body p-0">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">您的專長</h6>
                                    @if($errors->has('skills'))
                                        <div class="alert alert-danger alert-dismissible text-center">
                                            <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                            {{$errors->first('skills')}}
                                        </div>
                                    @endif
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink" style="">
                                            <a class="dropdown-item" data-toggle="modal" data-target="#edit-post-tag"
                                                href="#">編輯</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="checkbox">
                                        @foreach ($Data['user_skills'] as $key => $value)
                                            <label>
                                                <input type="checkbox" value="{{ $value }}" checked="checked" /><span
                                                    class="round button">{{ $Data['skills']->where('id', $value)->first()->name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body p-0">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">您的主題</h6>
                                    @if($errors->has('post_categories'))
                                        <div class="alert alert-danger alert-dismissible text-center">
                                            <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                            {{$errors->first('post_categories')}}
                                        </div>
                                    @endif
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                             aria-labelledby="dropdownMenuLink" style="">
                                            <a class="dropdown-item" data-toggle="modal" data-target="#edit-post-category"
                                               href="#">編輯</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
{{--                                    @if($errors->any())--}}
{{--                                        <div class="alert alert-danger alert-dismissible text-center">--}}
{{--                                            <button class="close" data-dismiss="alert" aria-hidden="true">x</button>--}}
{{--                                            {{$errors->first('message')}}--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
{{--                                    {{$errors->first('message')}}--}}
                                    <div id="checkbox">
                                        @foreach ($Data['user_categories'] as $key => $value)
                                            <label>
                                                <input type="checkbox" value="{{ $value }}" checked="checked" /><span
                                                        class="round button" style="background-color: #4C2A70;">{{ $Data['categories']->where('id', $value)->first()->name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body p-0">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">您的學經歷</h6>
                                    @if($errors->has('learn_experience'))
                                        <div class="alert alert-danger alert-dismissible text-center">
                                            <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                            {{$errors->first('learn_experience')}}
                                        </div>
                                    @endif
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                             aria-labelledby="dropdownMenuLink" style="">
                                            <a class="dropdown-item" data-toggle="modal" data-target="#edit-learning-experience"
                                               href="#">編輯</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @if($Data['user']->experiences)
                                        @foreach ($Data['user']->experiences as $key => $experience)
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    經歷{{$key+1}}
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="mb-0">{{$experience->learning_experience}}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4 mb-lg-0">
                            <div class="card-body p-0">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">參考文件</h6>
                                    @if($errors->has('references'))
                                        <div class="alert alert-danger alert-dismissible text-center">
                                            <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                            {{$errors->first('references')}}
                                        </div>
                                    @endif
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                             aria-labelledby="dropdownMenuLink" style="">
                                            <a class="dropdown-item" data-toggle="modal" data-target="#edit-references"
                                               href="#">編輯</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <table class=" table">
                                            <tr>
                                                <th>檔案</th>
                                                <th>操作</th>
                                            </tr>
                                        @forelse ($Data['user']->references as $key => $value)
                                            <tr>
                                                <td>
                                                    <a href="{{route('reference-download', $value->id)}}">{{$value->file_name}}</a>
                                                </td>
                                                <td>
                                                    <form action="{{route('reference-delete', $value->id)}}" method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit" class="btn btn-danger">刪除</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">基本資料</h6>
                                @if($errors->has('email'))
                                    <div class="alert alert-danger alert-dismissible text-center">
                                        <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                        {{$errors->first('email')}}
                                    </div>
                                @endif
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                        aria-labelledby="dropdownMenuLink" style="">
                                        <a class="dropdown-item" data-toggle="modal" data-target="#edit-profile"
                                            href="#" href="#">編輯</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">姓名</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ Auth::user()->name }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">暱稱</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ Auth::user()->nickname }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">大學</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ is_null(Auth::user()->universityItem)? '' : Auth::user()->universityItem->english_name }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">在學中</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ Auth::user()->is_study ? '是' : '否' }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">電話</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ Auth::user()->phone }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Line</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ Auth::user()->line }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Facebook</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ Auth::user()->fb }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Instagram</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ Auth::user()->ig }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">地址</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ Auth::user()->address }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">學生證上傳</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <img style="max-width: 150px"
                                            src="{{ url('/') . '/uploads/' . Auth::user()->student_proof }}"
                                            alt="your image" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">簡介</h6>
                                        @if($errors->has('description'))
                                            <div class="alert alert-danger alert-dismissible text-center">
                                                <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                                {{$errors->first('description')}}
                                            </div>
                                        @endif
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" href="#" role="button"
                                                id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                aria-labelledby="dropdownMenuLink" style="">
                                                <a class="dropdown-item" data-toggle="modal"
                                                    data-target="#edit-description" href="#">編輯</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-body">
                                            {!! Auth::user()->description !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">履歷</h6>
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" href="#" role="button"
                                                id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                aria-labelledby="dropdownMenuLink" style="">
                                                <a class="dropdown-item" data-toggle="modal"
                                                    data-target="#edit-profile-addition" href="#">編輯</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label for="uname" class="form-label">履歷影片</label>
                                                <input type="text" value="{{ $Data['profile_video'] }}"
                                                    name="profile_video" class="form-control" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="uname" class="form-label">履歷聲音</label>
                                                <input type="text" value="{{ $Data['profile_voice'] }}"
                                                    name="profile_voice" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal 用戶簡介-->
        <div class="modal fade" id="edit-description" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <form method="POST" action="{{ route('update-profile') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-header">
                            <h5 class="modal-title">編輯您的簡介</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3" style="display:none">
                                <input type="text" value={{ Auth::user()->id }} name="uid" class="form-control"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <textarea id="article-ckeditor" name="description">{{ Auth::user()->description }}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                            <button type="submit" class="btn btn-primary">更新</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal 用戶簡介-->

        <!-- Modal 用戶基本資料-->
        <div class="modal fade" id="edit-profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <form method="POST" action="{{ route('update-profile') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-header">
                            <h5 class="modal-title">編輯您的資料</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3" style="display:none">
                                <input type="text" value="{{ Auth::user()->id }}" name="uid"
                                    class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="uname" class="form-label">姓名</label>
                                <input type="text" value="{{ Auth::user()->name }}" name="uname"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="nickname" class="form-label">暱稱</label>
                                <input type="text" value="{{ Auth::user()->nickname }}" name="nickname"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="university" class="form-label">大學</label>
                                <select name="university" id="university" class="form-control">
                                    @if(!is_null($Data['universities']))
                                        @foreach($Data['universities'] as $university)
                                            <option class="form-control" value="{{$university->id}}" @if(Auth::user()->university == $university->id) selected @endif>{{$university->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
{{--                                <input type="text" value="{{ Auth::user()->university }}" name="university"--}}
{{--                                    class="form-control">--}}
                            </div>
                            <div class="mb-3">
                                <label for="is_study" class="form-label">在學中</label>
                                <div class="form-control border-0">
                                    <input id="is_study" type="checkbox" {{Auth::user()->is_study ? 'checked' : ''}} data-toggle="toggle" data-on="是" data-off="否" data-onstyle="success" data-offstyle="danger" name="is_study" value="1">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" value="{{ Auth::user()->email }}" name="email"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">電話</label>
                                <input type="text" value="{{ Auth::user()->phone }}" name="phone"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="line" class="form-label">Line Id</label>
                                <input type="text" value="{{ Auth::user()->line }}" name="line"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="line" class="form-label">Facebook</label>
                                <input type="text" value="{{ Auth::user()->fb }}" name="fb"
                                       class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="line" class="form-label">Instagram</label>
                                <input type="text" value="{{ Auth::user()->ig }}" name="ig"
                                       class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">地址</label>
                                <input type="text" value="{{ Auth::user()->address }}" name="address"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="student_proof" class="form-label">學生證上傳</label>
                                <input type="file" id="imgInp_studentProof" name="student_proof"
                                    class="form-control">
                                <div class="card-body text-center">
                                    <img style="max-width: 250px" id="blahStudentProof"
                                        src="{{ url('/') . '/uploads/' . Auth::user()->student_proof }}"
                                        alt="your image" />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                            <button type="submit" class="btn btn-primary">更新</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal 用戶基本資料-->

        <!-- Modal 用戶基本資料額外-->
        <div class="modal fade" id="edit-profile-addition" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <form method="POST" action="{{ route('update-profile') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-header">
                            <h5 class="modal-title">編輯您的履歷</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3" style="display:none">
                                <input type="text" value="{{ Auth::user()->id }}" name="uid"
                                    class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="uname" class="form-label">履歷影片</label>
                                <input type="text" value="{{ $Data['profile_video'] }}" name="profile_video"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="uname" class="form-label">履歷聲音</label>
                                <input type="text" value="{{ $Data['profile_voice'] }}" name="profile_voice"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                            <button type="submit" class="btn btn-primary">更新</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal 用戶基本資料額外-->

        <!-- Modal 用戶Tags-->
        <div class="modal fade" id="edit-post-tag" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <form method="POST" action="{{ route('update-profile') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-header">
                            <h5 class="modal-title">編輯您的專長</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3" style="display:none">
                                <input type="text" value={{ Auth::user()->id }} name="uid" class="form-control"
                                    readonly>
                            </div>
                            <div id="checkbox">
                                @foreach ($Data['skills'] as $key => $value)
                                    <label>
                                        @if (in_array($value->id, $Data['user_skills']))
                                            <input type="checkbox" name="skills[]" value="{{ $value->id }}"
                                                checked="checked" />
                                            <span class="round button">{{ $value->name }}</span>
                                        @else
                                            <input type="checkbox" name="skills[]" value="{{ $value->id }}" />
                                            <span class="round button">{{ $value->name }}</span>
                                        @endif
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                            <button type="submit" class="btn btn-primary">更新</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal 用戶Tags-->

        <!-- Modal 用戶主題-->
        <div class="modal fade" id="edit-post-category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <form method="POST" action="{{ route('update-profile') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-header">
                            <h5 class="modal-title">編輯您的主題</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3" style="display:none">
                                <input type="text" value={{ Auth::user()->id }} name="uid" class="form-control"
                                       readonly>
                            </div>
                            <div id="checkbox">
                                @foreach ($Data['categories'] as $key => $value)
                                    <label>
                                        @if (in_array($value->id, $Data['user_categories']))
                                            <input type="checkbox" name="post_categories[]" value="{{ $value->id }}"
                                                   checked="checked" />
                                            <span class="round button">{{ $value->name }}</span>
                                        @else
                                            <input type="checkbox" name="post_categories[]" value="{{ $value->id }}" />
                                            <span class="round button">{{ $value->name }}</span>
                                        @endif
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                            <button type="submit" class="btn btn-primary">更新</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal 用戶主題-->

        <!-- Modal 用戶頭像-->
        <div class="modal fade" id="edit-avatar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form method="POST" action="{{ route('update-profile') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-header">
                            <h5 class="modal-title">編輯您的頭像</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3" style="display:none">
                                <input type="text" value={{ Auth::user()->id }} name="uid" class="form-control"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <label for="avatar" class="form-label">大圖</label>
                                <input type="file" id="imgInp" name="avatar" class="form-control">
                                <div class="card-body text-center">
                                    <img style="max-width: 250px" id="blah"
                                        src="{{ url('/') . '/uploads/' . Auth::user()->avatar }}" alt="your image" />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                            <button type="submit" class="btn btn-primary">更新</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal 用戶頭像-->

        <!-- Modal 參考文件-->
        <div class="modal fade" id="edit-references" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <form method="POST" action="{{ route('update-profile') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-header">
                            <h5 class="modal-title">編輯您的參考文件</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3" style="display:none">
                                <input type="text" value={{ Auth::user()->id }} name="uid" class="form-control"
                                       readonly>
                            </div>
                            <div class="mb-3">
                                <label for="uname" class="form-label">參考文件</label>
                                <input type="file" name="references"
                                       class="form-control">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                            <button type="submit" class="btn btn-primary">更新</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal 參考文件-->

        <!-- Modal 學經歷-->
        <div class="modal fade" id="edit-learning-experience" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <form method="POST" action="{{ route('update-profile') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-header">
                            <h5 class="modal-title">編輯您的學經歷</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3" style="display:none">
                                <input type="text" value="{{ Auth::user()->id }}" name="uid"
                                       class="form-control" readonly>
                            </div>


                            @if($Data['user']->experiences)
                                @foreach($Data['user']->experiences as $experience)
                                <div class="mb-3">
                                    <label for="uname" class="form-label">學經歷</label>
                                    <input type="text" value="{{ $experience->learning_experience }}" name="learning_experience[]"
                                           class="form-control">
                                </div>
                                @endforeach
                                @php
                                    $count = 5 - $Data['user']->experiences->count();
                                @endphp
                                @for($i=0; $i < $count; $i++)
                                    <div class="mb-3">
                                        <label for="uname" class="form-label">學經歷</label>
                                        <input type="text" value="" name="learning_experience[]"
                                               class="form-control">
                                    </div>
                                @endfor
                            @else
                                @for($i=0; $i < 5; $i++)
                                <div class="mb-3">
                                    <label for="uname" class="form-label">學經歷</label>
                                    <input type="text" value="" name="learning_experience[]"
                                           class="form-control">
                                </div>
                                @endfor
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                            <button type="submit" class="btn btn-primary">更新</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal 學經歷-->

    </div>
    <!-- /.container-fluid -->
@endsection
