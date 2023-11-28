@extends('layouts.sbadmin')

@section('content')
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content" style="margin:15px">
            <form method="POST" action="{{ route('create-post') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="title" class="form-label">文章抬頭</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="mb-3" style="display:none">
                    <label for="author" class="form-label">作者</label>
                    <input type="text" value="{{$Data['_authId']}}" name="author" class="form-control" readonly>
                </div>
                <div class="mb-3">
                    <label for="image_path" class="form-label">大圖</label>
                    <input type="file" id="imgInp" name="image_path" class="form-control">
                    <img id="blah" src="https://static.thenounproject.com/png/710742-200.png" alt="your image" />
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">文章類別</label>
                    <select class="form-control" name="category" aria-label="Default select example">
                        @foreach($Data['_categories'] as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <textarea id="article-ckeditor" name="postbody"></textarea>
                </div>
                <div class="mb-3">
                    <label for="state" class="form-label">狀態</label>
                    <select class="form-control" name="state" aria-label="Default select example">
                        <option value="pending">審核中</option>
                        <option value="approve">已審核</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tag" class="form-label">Tag</label>
                    <input type="text" name="tag" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            
        </div>
    </div>
@endsection
