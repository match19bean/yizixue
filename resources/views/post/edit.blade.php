@extends('layouts.sbadmin')

@section('content')
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content" style="margin:15px">
            <form method="POST" action="{{ route('update-post') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="text" name="uuid" class="form-control" value="{{ $Data['post']->uuid }}">
                <div class="mb-3">
                    <label for="title" class="form-label">文章抬頭</label>
                    <input type="text" name="title" class="form-control" value="{{ $Data['post']->title }}">
                </div>
                <div class="mb-3" style="display:none">
                    <label for="author" class="form-label">作者</label>
                    <input type="text" value="{{ $Data['authId'] }}" name="author" class="form-control" readonly>
                </div>
                <div class="mb-3">
                    <label for="image_path" class="form-label">大圖</label>
                    <input type="file" id="imgInp" name="image_path" class="form-control">
                    <img width=150 id="blah" src="{{ env('APP_URL') . '/uploads/' . $Data['post']->image_path }}"
                        alt="your image" />
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">文章類別</label>
                    <div id="checkbox">
                        @foreach ($Data['categories'] as $category)
                            <label>
                                @if (in_array($category->id, $Data['selectCategories']))
                                    <input type="checkbox" name="category[]" value="{{ $category->id }}" checked="checked" />
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
                    <textarea id="article-ckeditor" name="qabody">{{ $Data['post']->body }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="state" class="form-label">狀態</label>
                    <select class="form-control" name="state" aria-label="Default select example">
                        <option value="pending" {{ $Data['post']->state == 'pending' ? 'selected' : '' }}>審核中</option>
                        <option value="approve" {{ $Data['post']->state == 'approve' ? 'selected' : '' }}>已審核</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tag" class="form-label">Tag</label>
                    <input type="text" name="tag" class="form-control" value="{{ $Data['post']->tag }}">
                </div>
                <button type="submit" class="btn btn-primary">更新</button>
            </form>

        </div>
    </div>
@endsection
