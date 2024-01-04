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
                            <form method="POST" action="{{ route('save-post') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="mb-3">
                                    <input type="text" name="title" class="form-control" placeholder="輸入文章標題">
                                </div>
                                <div class="mb-3" style="display:none">
                                    <label for="author" class="form-label">作者</label>
                                    <input type="text" value="{{ $Data['authId'] }}" name="author" class="form-control"
                                        readonly>
                                </div>
                                <div class="mb-3" style="border: 2px solid #4C2A70; padding: 10px; border-radius: 5px;">
                                    <label for="image_path" class="form-label">點擊添加圖片</label>
                                    <input type="file" id="imgInp" name="image_path" class="form-control">
                                    <img width=100 id="blah"
                                        src="https://cdn-icons-png.flaticon.com/512/5123/5123571.png" alt="your image" />
                                </div>
                                <div class="mb-3">
                                    <label for="category" class="form-label" style="color:#4C2A70;">選擇主題</label>
                                    <div id="checkbox" style="border: 2px solid #4C2A70; padding: 10px; border-radius: 5px;">
                                        @foreach ($Data['categories'] as $category)
                                            <label>
                                                <input type="checkbox" name="category[]" value="{{ $category->id }}" /><span
                                                    class="round button">#{{ $category->name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="category" class="form-label" style="color:#4C2A70;">輸入內文</label>
                                    <textarea id="article-ckeditor" name="postbody"></textarea>
                                </div>
                                <div class="mb-3" style="display:none">
                                    <label for="state" class="form-label">狀態</label>
                                    <select class="form-control" name="state" aria-label="Default select example">
                                        <option value="pending">審核中</option>
                                        <option value="approve">已審核</option>
                                    </select>
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
