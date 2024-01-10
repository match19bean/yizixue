@extends('layouts.sbadmin')

@section('content')
    <style>
        .middle {
            width: 50px;
            position: absolute;
            top: 10%;
            left: 10%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
        }

        .name-card {
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 50px;
            padding-right: 50px;
            background: #BD9EBE;
            text-align: center;
        }
    </style>

    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content" style="margin:15px">

            <div class="row justify-content-md-center">
                <div style="margin-bottom: 10px;" class="col-xl-10 col-lg-7">
                    <div style="background: #4C2A70; padding:5px" class="card text-white shadow">
                        <h2 style="margin: 0;" class="text-center">追蹤的學長姐</h2>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-7 justify-content-md-center">
                    <div class="card shadow mb-4" style="padding:30px">
                        <div class="row">

                            @foreach ($Data['Users'] as $key => $user)
                                <div class="col-sm-3" style="margin:20px">
                                    <div class="card" style="border: 3px solid;">
                                        <div>
                                            <img style="height: 350px;" class="card-img-top"
                                                src="/uploads/{{ $user->avatar }}" alt="Card image cap">
                                            <div class="middle">
                                                <a href="{{ $user->profile_video }}" class="text"><img class="card-img-top"
                                                        src="https://cdn.pixabay.com/photo/2016/02/01/12/33/play-1173551_640.png"
                                                        alt="Card image cap"></a>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="name-card">
                                                <h3 style="color:white">{{ $user->name }}</h3>
                                                <h3 style="color:white">{{ $user->university }}</h3>
                                            </div>
                                            <div
                                                style="
                                            text-align: center; 
                                            margin-bottom:20px;
                                            margin-top:20px">
                                            <i class="fa fa-heart" style="font-size:30px; color:red; margin:5px">
                                                <span style="color:black">{{rand(5,30)}}</span>
                                            </i>
                                            <i class="fa fa-bookmark" style="font-size:30px; margin:5px">
                                                <span style="color:black">{{rand(5,30)}}</span>
                                            </i>
                                            </div>
                                            <div
                                                style="
                                            text-align: center; 
                                            margin-bottom:20px;
                                            margin-top:20px">
                                                <?php
                                                $PostCategory = $Data['PostCategory']->all();
                                                ?>
                                                @foreach ($PostCategory as $cate)
                                                    <span
                                                        style="
                                                    font-size:20px;
                                                    padding-top:5px;
                                                    padding-bottom:5px;
                                                    padding-left:30px; 
                                                    padding-right:30px; 
                                                    margin:5px; 
                                                    background: #4C2A70; 
                                                    color:#FFFFFF;
                                                    border-radius:10px"
                                                        href="#">
                                                        #{{ $cate->name }}
                                                    </span>
                                                @endforeach
                                            </div>
                                            <?php
                                            $UserSkillRelation = $Data['UserSkillRelation']->where('user_id', $user->id)->get();
                                            ?>
                                            <div
                                                style="
                                            text-align: center; 
                                            margin-bottom:20px;
                                            margin-top:20px">
                                                @foreach ($UserSkillRelation as $cateId)
                                                    <?php
                                                    $cate = $Data['Skills']->where('id', $cateId->skill_id)->first();
                                                    ?>
                                                    <span
                                                        style="
                                                    font-size:20px;
                                                    padding-top:5px;
                                                    padding-bottom:5px;
                                                    padding-left:30px; 
                                                    padding-right:30px; 
                                                    margin:5px; 
                                                    color:#BD9EBE; 
                                                    border: 1px solid #BD9EBE; 
                                                    border-radius:10px"
                                                        href="#">
                                                        #{{ $cate->name }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
