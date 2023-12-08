@extends('layouts.sbadmin')

@section('content')
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content" style="margin:15px">
            <form method="POST" action="{{ route('update-post') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="text" name="uuid" class="form-control" value="{{$Data['post']->uuid}}">
                <div class="mb-3">
                    <label for="title" class="form-label">文章抬頭</label>
                    <input type="text" name="title" class="form-control" value="{{$Data['post']->title}}">
                </div>
                <div class="mb-3" style="display:none">
                    <label for="author" class="form-label">作者</label>
                    <input type="text" value="{{$Data['authId']}}" name="author" class="form-control" readonly>
                </div>
                <div class="mb-3">
                    <label for="image_path" class="form-label">大圖</label>
                    <input type="file" id="imgInp" name="image_path" class="form-control">
                    <img id="blah" src="{{env('APP_URL').'/uploads/'.$Data['post']->image_path}}" alt="your image" />
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">文章類別</label>
                    <select class="form-control" name="category" aria-label="Default select example">
                        @foreach($Data['categories'] as $key => $value)
                        <option value="{{$key}}" {{$Data['post']->category==$key? 'selected':''}} >{{$value}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <textarea id="article-ckeditor" name="postbody">{{$Data['post']->body}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="state" class="form-label">狀態</label>
                    <select class="form-control" name="state" aria-label="Default select example">
                        <option value="pending" {{$Data['post']->state=='pending'? 'selected':''}} >審核中</option>
                        <option value="approve" {{$Data['post']->state=='approve'? 'selected':''}} >已審核</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tag" class="form-label">Tag</label>
                    <input type="text" name="tag" class="form-control" value="{{$Data['post']->tag}}">
                </div>
                <button type="submit" class="btn btn-primary">更新</button>
            </form>
            
        </div>
    </div>
@endsection
