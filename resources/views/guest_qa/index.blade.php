@extends('layouts.guest2')

@section('content')
    <div class="row text-gray-600">
        <h4 class="mt-3">首頁 > 問與答</h4>
    </div>

    <div class="row">
        @if(!is_null($qas))
            @foreach($qas as $num => $qa)
              <div class="row m-4">
                  <div class="col-11 text-lg p-3" style="border-left-style: solid; border-top-style: solid; border-bottom-style: solid; border-color: #6D757D;">
                      <h2 class="d-flex">
                          <i class="fa fa-circle px-3" style="color:gray"></i>
                          <a href="{{route('qna.show', $qa->id)}}" class="text-decoration-none"></a>{{$qa->title}}
                          <span class="w-100 text-right">
                              @if($qa->categoryRelation)
                                  @foreach($qa->categoryRelation as $relation)
                                      <span class="btn px-4 text-center text-white" style="background-color: #4C2A70">
                                          {{$relation->category->name}}
                                      </span>
                                  @endforeach
                              @endif
                          </span>
                      </h2>
                      <div class="row text-center">
                        {!! $qa->body !!}
                      </div>
                  </div>
                  <div class="col-1" style="background-color: #4C2A70"></div>
              </div>

              @if($num==1)
                <div class="row my-4">
                    <div class="row">
                        <h2>最新文章</h2>
                    </div>
                    @if(!is_null($posts))
                        @foreach($posts as $post)
                            <div class="col-5 mx-2 row mx-auto" style="border: 2px solid black; border-radius: 10px;">
                                <div class="col-6">
                                    <img src="{{asset('uploads/'.$post->author->avatar)}}" alt="">
                                </div>
                                <div class="col-6 text-break">
                                    <h2 class="w-100">{{$post->title}} </h2>
                                    <p>{!! \Illuminate\Support\Str::limit($post->body) !!}</p>
                                    <p class=" text-right w-100">發布日期：{{$post->created_at->format('Y/m/d')}}</p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
              @endif
            @endforeach
            <div class="row">
                <nav>
                    {{$qas->links('vendor.pagination.bootstrap-4')}}
                </nav>
            </div>
        @endif
    </div>
@endsection