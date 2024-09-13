@extends('layouts.sbadmin')

@section('content')
    <style>
        #checkbox input[type="checkbox"] {
            display: none;
        }

        #checkbox input:checked+.button {
            background: #4C2A70;
            color: #fff;
        }

        #checkbox .button {
            display: inline-block;
            margin: 0 5px 10px 0;
            padding: 5px 10px;
            background: #BD9EBE;
            color: #ffffff;
            cursor: pointer;
        }

        #checkbox .button:hover {
            background: #bbb;
            color: #fff;
        }

        #checkbox .round {
            padding-left: 50px;
            padding-right: 50px;
            border-radius: 5px;
        }
    </style>
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content" style="margin:15px">

            <div class="row justify-content-md-center">
                <div style="margin-bottom: 10px;" class="col-xl-10 col-lg-7">
                    <div style="background: #4C2A70; padding:5px" class="card text-white shadow">
                        <h2 style="margin: 0;" class="text-center">添加文章</h2>
                    </div>
                </div>

                <div class="col-xl-10 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Body -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('update-post') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input style="display:none" type="text" name="uuid" class="form-control o-input" value="{{ $Data['post']->uuid }}">
                                <div class="mb-3">
                                    <label for="title" class="form-label">文章抬頭</label>
                                    @if($errors->has('title'))
                                        <div class="alert alert-danger alert-dismissible text-center">
                                            <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                            {{$errors->first('title')}}
                                        </div>
                                    @endif
                                    <input type="text" name="title" class="form-control o-input"
                                        value="{{ $Data['post']->title }}">
                                </div>
                                <div class="mb-3" style="display:none">
                                    <label for="author" class="form-label">作者</label>
                                    <input type="text" value="{{ $Data['authId'] }}" name="author" class="form-control o-input"
                                        readonly>
                                </div>
                                <div id='upload-img-div' class="mb-3"
                                    style="
                                    background: url('{{ '/uploads' . $Data['post']->image_path }}');
                                    background-size: cover;
                                    background-position: center;
                                    border: 2px solid #4C2A70; 
                                    padding: 10px; 
                                    border-radius: 5px; 
                                    width:100%;">
                                    @if($errors->has('image_path'))
                                        <div class="alert alert-danger alert-dismissible text-center">
                                            <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                            {{$errors->first('image_path')}}
                                        </div>
                                    @endif
                                    <input type="file" id="imgInp" name="image_path" class="form-control o-input"
                                        style="display:none">
                                    <a type="button" id="OpenImgUpload"
                                        style="
                                        display: flex;
                                        justify-content: center;
                                        align-content: center;
                                        flex-wrap: wrap;
                                        padding: 200px;">點擊添加圖片</a>
                                </div>
                                <div class="mb-3">
                                    <label for="category" class="form-label" style="color:#4C2A70;">選擇主題</label>
                                    @if($errors->has('category'))
                                        <div class="alert alert-danger alert-dismissible text-center">
                                            <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                            {{$errors->first('category')}}
                                        </div>
                                    @endif
                                    <div id="checkbox" style="border: 2px solid #4C2A70; padding: 10px; border-radius: 5px;">
                                        @foreach ($Data['categories'] as $category)
                                            <label>
                                                @if (in_array($category->id, $Data['selectCategories']))
                                                    <input type="checkbox" name="category[]" value="{{ $category->id }}"
                                                        checked="checked" class="o-input" />
                                                    <span class="round button">{{ $category->name }}</span>
                                                @else
                                                    <input type="checkbox" name="category[]" value="{{ $category->id }}" class="o-input" />
                                                    <span class="round button">{{ $category->name }}</span>
                                                @endif
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <textarea id="article-ckeditor" class="form-control" rows="30" style="border: 2px solid #4C2A70;
                                padding: 10px; border-radius: 5px; width:100%;" name="postbody">{{ $Data['post']->body }}</textarea>
                                </div>
                                @if($errors->has('postbody'))
                                    <div class="alert alert-danger alert-dismissible text-center">
                                        <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                        {{$errors->first('postbody')}}
                                    </div>
                                @endif
                                <div class="mb-3" style="display:none">
                                    <label for="state" class="form-label">狀態</label>
                                    <select class="form-control" name="state" aria-label="Default select example">
                                        <option value="pending">審核中</option>
                                        <option value="approve">已審核</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">更新</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
