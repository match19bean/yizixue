@extends('layouts.guest2')

@section('content')
    <style>
        .card-relate{
            position: relative;
            width: 100%;
            padding-top: 100%;
        }
        .card-relate img{
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

    </style>
    <div class="row text-gray-600">
        <h4 class="mt-3">首頁 > 學校 <span class="searchbar text-right">
                <form action="{{route('university-list')}}" method="get">
                    <input type="text" name="filter">
                </form>
            </span>
        </h4>

    </div>

    <section class=" border-bottom">
        <div class="uCardSection">
            <div class="row gx-5">
                @forelse($universities as $university)
                <div class="col-3 mb-5">
                    <div class="cards">
                        <div class="item">
                            <div>
                                <div class="card">
                                    <div class="card-relate">
                                        <img src="{{asset($university->image_path)}}" alt="Card image cap">
                                    </div>
                                </div>
                                <div>
                                    <div class="name-card">
                                        <h5><a class="text-decoration-none text-white" href="{{route('senior', ['university' => $university->slug])}}">{{ $university->name }}</a></h5>
                                    </div>
                                    <div class="text-center">
                                        <h5>目前有<a href="#" class="text-decoration-none text-black">{{$university->users->count()}}</a>位在校學生</h5>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="row text-center">
                        <p class="vh-100">
                            目前尚無資料
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <div class="pagNav">
        <div class="d-flex" style="flex-direction: row; justify-content: space-evenly; ">
            {{$universities->appends($_GET)->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
@endsection