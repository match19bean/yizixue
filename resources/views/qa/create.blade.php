@extends('layouts.sbadmin')

@section('content')
    <div id="content-wrapper" class="d-flex flex-column createQ">
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
                        <div style="#background: #BD9EBE; #color:#FFFFFF" class="card-body">
                        <!-- <svg class="progress">
                            <rect class="pBar" x="0" y="0" rx="15" ry="15"/>
                        </svg>
                        <p>完成度 50%</p> -->
                            <form method="POST" action="{{ route('save-qa') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="mb-3">
                                    <label for="title" class="form-label">QA問題</label>
                                    @if($errors->has('title'))
                                        <div class="alert alert-danger alert-dismissible text-center">
                                            <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                            {{$errors->first('title')}}
                                        </div>
                                    @endif
                                    <input type="text" name="title" class="form-control" value="{{old('title')}}">
                                </div>
                                <div class="mb-3" style="display:none">
                                    <label for="author" class="form-label">作者</label>
                                    <input type="text" value="{{ $Data['authId'] }}" name="author" class="form-control"
                                        readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="nickname" class="form-label">使用別稱</label>
                                    @if($errors->has('nickname'))
                                        <div class="alert alert-danger alert-dismissible text-center">
                                            <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                            {{$errors->first('nickname')}}
                                        </div>
                                    @endif
                                    <input type="text" name="nickname" class="form-control" value="{{old('nickname')}}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    @if($errors->has('email'))
                                        <div class="alert alert-danger alert-dismissible text-center">
                                            <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                            {{$errors->first('email')}}
                                        </div>
                                    @endif
                                    <input type="text" name="email" class="form-control" value="{{old('email')}}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">聯絡電話</label>
                                    @if($errors->has('phone'))
                                        <div class="alert alert-danger alert-dismissible text-center">
                                            <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                            {{$errors->first('phone')}}
                                        </div>
                                    @endif
                                    <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
                                </div>
                                <div class="mb-3">
                                    <label for="line" class="form-label">Line</label>
                                    @if($errors->has('line'))
                                        <div class="alert alert-danger alert-dismissible text-center">
                                            <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                            {{$errors->first('line')}}
                                        </div>
                                    @endif
                                    <input type="text" name="line" class="form-control" value="{{old('line')}}">
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
                                            <input type="time" class="form-control" name="contact_time" value="{{old('contact_time')}}">
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
                                            <input type="time" class="form-control" name="contact_time_end" value="{{old('contact_time_end')}}">
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
                                            <input type="number" class="form-control" name="amount_down" value="{{old('amount_down')}}">
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
                                            <input type="number" class="form-control" name="amount_up" value="{{old('amount_up')}}">
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
                                    <input type="text" name="place" class="form-control" value="{{old('place')}}">
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
                                                <input type="checkbox" name="category[]" value="{{ $category->id }}"
                                                    {{ is_array(old('category')) &&  in_array($category->id,old('category'))   ? 'checked' : '' }}
                                                /><span
                                                    class="round button">{{ $category->name }}</span>
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
                                    <label for="avatar" class="form-label">說明</label>
                                    @if($errors->has('qabody'))
                                        <div class="alert alert-danger alert-dismissible text-center">
                                            <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                            {{$errors->first('qabody')}}
                                        </div>
                                    @endif
                                    <textarea id="article-ckeditor" class="form-control" rows="30" name="qabody">{{old('qabody')}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="avatar" class="form-label">參考文件</label>
                                    @if($errors->has('attachments'))
                                        <div class="alert alert-danger alert-dismissible text-center">
                                            <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                            {{$errors->all()}}
                                        </div>
                                    @endif
                                    <input type="file" id="imgInp" name="attachments[]" class="form-control">
                                    <input type="file" id="imgInp" name="attachments[]" class="form-control">
                                    <input type="file" id="imgInp" name="attachments[]" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">送出</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
