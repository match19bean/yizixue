@extends('layouts.sbadmin')

@section('content')
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content" style="margin:15px">

            <div class="row justify-content-md-center">
                <div style="margin-bottom: 10px;" class="col-xl-10 col-lg-7">
                    <div style="background: #4C2A70; padding:5px" class="card text-white shadow">
                        <h2 style="margin: 0;" class="text-center">新增問題</h2>
                    </div>
                </div>

                <div class="col-xl-10 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Body -->
                        <div style="background: #BD9EBE; color:#FFFFFF" class="card-body">

                            <form method="POST" action="{{ route('update-qa') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="text" name="uuid" class="form-control" value="{{ $Data['qa']->uuid }}" readonly style="display: none;">
                                <div class="mb-3">
                                    <label for="title" class="form-label">QA問題</label>
                                    @if($errors->has('title'))
                                        <div class="alert alert-danger alert-dismissible text-center">
                                            <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                            {{$errors->first('title')}}
                                        </div>
                                    @endif
                                    <input type="text" name="title" class="form-control" value="{{ $Data['qa']->title }}">
                                </div>
                                <div class="mb-3">
                                    <label for="nickname" class="form-label">暱稱</label>
                                    @if($errors->has('nickname'))
                                        <div class="alert alert-danger alert-dismissible text-center">
                                            <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                            {{$errors->first('nickname')}}
                                        </div>
                                    @endif
                                    <input type="text" name="nickname" class="form-control" value="{{ $Data['qa']->nickname }}">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    @if($errors->has('email'))
                                        <div class="alert alert-danger alert-dismissible text-center">
                                            <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                            {{$errors->first('email')}}
                                        </div>
                                    @endif
                                    <input type="text" name="email" class="form-control" value="{{ $Data['qa']->email }}">
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">聯絡電話</label>
                                    @if($errors->has('phone'))
                                        <div class="alert alert-danger alert-dismissible text-center">
                                            <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                            {{$errors->first('phone')}}
                                        </div>
                                    @endif
                                    <input type="text" name="phone" class="form-control" value="{{ $Data['qa']->phone }}">
                                </div>
                                <div class="mb-3">
                                    <label for="contact_time" class="form-label">聯絡時間</label>
                                    <div class="row">
                                        <div class="col-5">
                                            @if($errors->has('contact_time'))
                                                <div class="alert alert-danger alert-dismissible text-center">
                                                    <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                                    {{$errors->first('contact_time')}}
                                                </div>
                                            @endif
                                            {{--                                            <select class="form-control" name="contact_time" aria-label="Default select example">--}}
                                            {{--                                                <option value="morning">上午</option>--}}
                                            {{--                                                <option value="afternoon">下午</option>--}}
                                            {{--                                                <option value="night">晚上</option>--}}
                                            {{--                                            </select>--}}
                                            <input type="time" class="form-control" name="contact_time" value="{{ $Data['qa']->contact_time }}">
                                        </div>
                                        <div class="col-2 text-center">
                                            -
                                        </div>
                                        <div class="col-5">
                                            @if($errors->has('contact_time_end'))
                                                <div class="alert alert-danger alert-dismissible text-center">
                                                    <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                                    {{$errors->first('contact_time_end')}}
                                                </div>
                                            @endif
                                            {{--                                            <select class="form-control" name="contact_time_end" aria-label="Default select example">--}}
                                            {{--                                                <option value="morning">上午</option>--}}
                                            {{--                                                <option value="afternoon">下午</option>--}}
                                            {{--                                                <option value="night">晚上</option>--}}
                                            {{--                                            </select>--}}
                                            <input type="time" class="form-control" name="contact_time_end" value="{{ $Data['qa']->contact_time_end }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="contact_time" class="form-label">金額</label>
                                    <div class="row">
                                        <div class="col-5">
                                            @if($errors->has('amount_down'))
                                                <div class="alert alert-danger alert-dismissible text-center">
                                                    <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                                    {{$errors->first('amount_down')}}
                                                </div>
                                            @endif
                                            <input type="number" class="form-control" name="amount_down" value="{{ $Data['qa']->amount_down }}">
                                        </div>
                                        <div class="col-2 text-center">
                                            -
                                        </div>
                                        <div class="col-5">
                                            @if($errors->has('amount_up'))
                                                <div class="alert alert-danger alert-dismissible text-center">
                                                    <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                                    {{$errors->first('amount_up')}}
                                                </div>
                                            @endif
                                            <input type="number" class="form-control" name="amount_up" value="{{ $Data['qa']->amount_up }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="place" class="form-label">地點</label>
                                    @if($errors->has('place'))
                                        <div class="alert alert-danger alert-dismissible text-center">
                                            <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                            {{$errors->first('place')}}
                                        </div>
                                    @endif
                                    <input type="text" name="place" class="form-control" value="{{ $Data['qa']->place }}">
                                </div>
                                <div class="mb-3" style="display:none">
                                    <label for="author" class="form-label">作者</label>
                                    <input type="text" value="{{ $Data['authId'] }}" name="author" class="form-control" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="category" class="form-label">問題類別</label>
                                    @if($errors->has('category'))
                                        <div class="alert alert-danger alert-dismissible text-center">
                                            <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                            {{$errors->first('category')}}
                                        </div>
                                    @endif
                                    <div id="checkbox">
                                        @foreach ($Data['categories'] as $category)
                                            <label>
                                                @if (in_array($category->id, $Data['selectCategories']))
                                                    <input type="checkbox" name="category[]" value="{{ $category->id }}"
                                                        checked="checked" />
                                                    <span class="round button">{{ $category->name }}</span>
                                                @else
                                                    <input type="checkbox" name="category[]" value="{{ $category->id }}" />
                                                    <span class="round button">{{ $category->name }}</span>
                                                @endif
                                            </label>
                                        @endforeach
                                    </div>
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
                                </div>
                                <div class="mb-3">
                                    <label for="state" class="form-label">說明</label>
                                    @if($errors->has('qabody'))
                                        <div class="alert alert-danger alert-dismissible text-center">
                                            <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                            {{$errors->first('qabody')}}
                                        </div>
                                    @endif
                                    <textarea id="article-ckeditor" name="qabody">{{ $Data['qa']->body }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="avatar" class="form-label">參考文件</label>
                                    @if($errors->has('attachments'))
                                        <div class="alert alert-danger alert-dismissible text-center">
                                            <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                            {{$errors->first('attachments')}}
                                        </div>
                                    @endif
                                    @if($Data['qa']->attachments->count() < 3)
                                        @for($i=$Data['qa']->attachments->count();$i<3;$i++)
                                        <input type="file" id="imgInp" name="attachments[]" class="form-control">
                                        @endfor
                                    @endif
                                    @forelse($Data['qa']->attachments as $attachment)
                                        <button class="btn btn-outline-primary">{{$attachment->file_name}}
                                            <a href="{{route('delete-attachment', $attachment->id)}}" class="btn btn-danger">刪除附檔</a>
                                        </button>
                                    @empty
                                    @endforelse
                                </div>
                {{--                <div class="mb-3">--}}
                {{--                    <label for="state" class="form-label">狀態</label>--}}
                {{--                    <select class="form-control" name="state" aria-label="Default select example">--}}
                {{--                        <option value="pending" {{ $Data['qa']->state == 'pending' ? 'selected' : '' }}>審核中</option>--}}
                {{--                        <option value="approve" {{ $Data['qa']->state == 'approve' ? 'selected' : '' }}>已審核</option>--}}
                {{--                    </select>--}}
                {{--                </div>--}}
                {{--                <div class="mb-3">--}}
                {{--                    <label for="contact_time" class="form-label">聯絡時間</label>--}}
                {{--                    <select class="form-control" name="contact_time" aria-label="Default select example">--}}
                {{--                        <option value="morning">上午</option>--}}
                {{--                        <option value="afternoon">下午</option>--}}
                {{--                        <option value="night">晚上</option>--}}
                {{--                    </select>--}}
                {{--                </div>--}}
                                <button type="submit" class="btn btn-primary">更新</button>
                            </form>
                        </div>
                    </div>
                </div>

        </div>
    </div>
@endsection
