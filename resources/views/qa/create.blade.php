@extends('layouts.sbadmin')

@section('content')
    <div id="content-wrapper" class="d-flex flex-column createQ">
        <div id="content" style="margin:15px">

            <div class="row justify-content-md-center">
                <div style="margin-bottom: 10px;" class="col-xl-10 col-lg-7">
                    <div style="background: #4C2A70; padding:5px" class="card text-white shadow">
                        <h2 style="margin: 0;" class="text-center">添加問題</h2>
                    </div>
                </div>

                <div class="col-xl-10 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Body -->
                        <div style="background: #BD9EBE; color:#FFFFFF" class="card-body">
                        <svg class="progress">
                            <rect class="pBar" x="0" y="0" rx="15" ry="15"/>
                        </svg>
                        <p>完成度 50%</p>
                            <form method="POST" action="{{ route('save-qa') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="mb-3">
                                    <label for="title" class="form-label">QA問題</label>
                                    <input type="text" name="title" class="form-control">
                                </div>
                                <div class="mb-3" style="display:none">
                                    <label for="author" class="form-label">作者</label>
                                    <input type="text" value="{{ $Data['authId'] }}" name="author" class="form-control"
                                        readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="nickname" class="form-label">使用別稱</label>
                                    <input type="text" name="nickname" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" name="email" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">聯絡電話</label>
                                    <input type="text" name="phone" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="line" class="form-label">Line</label>
                                    <input type="text" name="line" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="contact_time" class="form-label">聯絡時間</label>
                                    <div class="row">
                                        <div class="col-5">
                                            {{--                                            <select class="form-control" name="contact_time" aria-label="Default select example">--}}
                                            {{--                                                <option value="morning">上午</option>--}}
                                            {{--                                                <option value="afternoon">下午</option>--}}
                                            {{--                                                <option value="night">晚上</option>--}}
                                            {{--                                            </select>--}}
                                            <input type="datetime-local" class="form-control" name="contact_time">
                                        </div>
                                        <div class="col-2 text-center">
                                            -
                                        </div>
                                        <div class="col-5">
                                            {{--                                            <select class="form-control" name="contact_time_end" aria-label="Default select example">--}}
                                            {{--                                                <option value="morning">上午</option>--}}
                                            {{--                                                <option value="afternoon">下午</option>--}}
                                            {{--                                                <option value="night">晚上</option>--}}
                                            {{--                                            </select>--}}
                                            <input type="datetime-local" class="form-control" name="contact_time_end">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="contact_time" class="form-label">金額</label>
                                    <div class="row">
                                        <div class="col-5">
                                            <input type="number" class="form-control" name="amount_down">
                                        </div>
                                        <div class="col-2 text-center">
                                            -
                                        </div>
                                        <div class="col-5">
                                            <input type="number" class="form-control" name="amount_up">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="place" class="form-label">地點</label>
                                    <input type="text" name="place" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="category" class="form-label">問題類別</label>
                                    <div id="checkbox">
                                        @foreach ($Data['categories'] as $category)
                                            <label>
                                                <input type="checkbox" name="category[]" value="{{ $category->id }}" /><span
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
                                    <textarea id="article-ckeditor" name="qabody"></textarea>
                                </div>
                                <div class="mb-3">
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
