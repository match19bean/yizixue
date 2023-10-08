@extends('layouts.sbadmin')

@section('content')
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content" style="margin:15px">
            <form method="POST" action="{{ route('create-qa') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="title" class="form-label">問題標題</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="mb-3" style="display:none">
                    <label for="author" class="form-label">作者</label>
                    <input type="text" value="{{Auth::user()->id}}" name="author" class="form-control" readonly>
                </div>
                <div class="mb-3">
                    <textarea id="article-ckeditor" name="postbody"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            
        </div>
    </div>
@endsection
