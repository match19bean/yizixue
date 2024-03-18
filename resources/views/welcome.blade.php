@extends('layouts.guest')
@section('content')
        <!-- Header-->
        <header>
            <div class="headerCard">
                <div class="banner">
                    <img id="bannerImg" src="{{asset('uploads/images/banner_p1.jpg')}}">
                </div>
                <div class="slogan">
                    <h1 id="topic" class="display-5 fw-bolder text-white mb-2">海外留學，</h1>
                    <h1 class="display-5 fw-bolder text-white mb-5">先找學長姐罩</h1>
                    <a style="background:#45ecd9; border: none" class="btn btn-primary btn-lg px-5 me-sm-3"
                        href="#features">學長姐 | 快找</a>
                </div>
            </div>

        </header>
        <!-- Features section-->
        <!-- Ucard Section -->
        <section class="py-5 border-bottom" id="features">
            <div class="uCardSection">
                <div class="row gx-5">
                    <div style="text-align:center; margin-bottom:100px">
                        <a style="background:#45ecd9; border: none" class="btn btn-primary btn-lg px-5" href="#features">關注
                            | 學校</a>
                    </div>
                    <div class="owl-carousel owl-theme cards">
                        @foreach ($Data['University'] as $key => $university)
                            <div class="item">
                                <div>
                                    <div class="card">
                                        <div>
                                            <img src="/uploads/{{ $university->image_path }}" alt="Card image cap">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="name-card">
                                            <h5>{{ $university->name }}</h5>
                                        </div>
                                        <div class="info">
                                            <h5>目前有<a href="#">{{rand(20,200)}}</a>位在校學生</h5>
                                        </div>

                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>

            </div>
            </div>
        </section>

        <!-- Features section-->
        <!-- Student Card Section -->
        <section class="bg-light py-5 border-bottom" id="features">
            <div class="studentSection">
                <div class="row gx-5">
                    <div style="text-align:center; margin-bottom:100px">
                        <a style="background:#45ecd9; border: none" class="btn btn-primary btn-lg px-5" href="#features">關注
                            | 學長姐</a>
                    </div>

                    <div class="owl-carousel owl-theme studentNav">
                        @foreach ($Data['Users'] as $key => $user)
                            <!-- student card -->
                            <div class="item studentC">
                                <div>
                                    <div class="cards">
                                        <!-- <a href="{{ url('introduction/'.$user->id) }}"> -->
                                        <!-- student profile pic -->
                                        <div class="studentProfile">
                                            <div class="studentImg">
                                                <img src="/uploads/{{ $user->avatar }}" alt="Card image cap">
                                            </div>
                                            <!-- video Btn -->
                                            <div class="videoBtn">
                                                <a href="{{ $user->profile_video }}" class="text">
                                                    <img class="card-img-top" src="https://cdn.pixabay.com/photo/2016/02/01/12/33/play-1173551_640.png" alt="Card image cap">
                                                </a>
                                            </div>
                                            <!-- react icons -->
                                            <div class="react">
                                                <i class="fa fa-heart">
                                                    <span>{{rand(5,30)}}</span>
                                                </i>
                                                <i class="fa fa-bookmark">
                                                    <span>{{rand(5,30)}}</span>
                                                </i>
                                            </div>
                                        </div>
                                        <!-- name card -->
                                        <div class="name-card">
                                            <h4>{{ $user->name }}</h4>
                                            <h4>{{ $user->university }}</h4>
                                        </div>
                                        <!-- post tag -->
                                        <div class="postTags">
                                            <?php
                                            $PostCategory = $Data['PostCategory']->all();
                                            ?>
                                            @foreach ($PostCategory as $cate)
                                                <span href="#">#{{ $cate->name }}</span>
                                            @endforeach
                                        </div>
                                        <?php
                                        $UserSkillRelation = $Data['UserSkillRelation']->where('user_id', $user->id)->get();
                                        ?>
                                        <!-- skill tag -->
                                        <div class="skillTags">
                                            @foreach ($UserSkillRelation as $cateId)
                                                <?php
                                                $cate = $Data['Skills']->where('id', $cateId->skill_id)->first();
                                                ?>
                                                <span href="#">#{{ $cate->name }}</span>
                                            @endforeach
                                        </div>
                                        <!-- </a> -->
                                    </div>
                                    <p>點擊查看更多</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </section>


        <!-- QA section -->
        <section class="py-5" id="Qa">
            <div class="row p-5">
                <!-- @if(!is_null($Data['Qas']))
                    @foreach($Data['Qas'] as $qa)
                        <div class="col-3 text-center">
                            <div class="row">
                                <div class="fa-2x">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-lightbulb fa-stack-2x text-left mt-4" style="margin-left: -10px;"></i>
                                        <i class="fa fa-calendar-alt fa-stack-2x text-right"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="row">

                                <h3 class="w-75 mt-4 mx-auto text-white" style="background-color: #73E9DD;">
                                    {{$qa->first()->category->name}}
                                </h3>
                                @for($i=0; $i<3; $i++)
                                    <h5 class="text-center mx-auto" style="color:#B9CBF8;">
                                        @if(isset($qa[$i]))
                                            {{$qa[$i]->qa->title}}
                                        @endif
                                    </h5>
                                @endfor
                            </div>
                        </div>
                    @endforeach

                @endif -->

                <!-- QA section 1 -->
                <div class="qaSection">
                    <div class="card">
                        <svg width="70" height="70">
                        <rect width="70" height="70" x="0" y="0" fill="gray"/>
                        </svg>
                        <h5>海外留學</h5>
                        <p>到美國念高中是不是比較容易申請</p>
                        <p>歐洲留學是不是比較便宜</p>
                        <p>30歲才準備出國來得及嗎</p>
                    </div>
                    <div class="card">
                        <svg width="70" height="70">
                        <rect width="70" height="70" x="0" y="0" fill="gray"/>
                        </svg>
                        <h5>海外留學</h5>
                        <p>到美國念高中是不是比較容易申請</p>
                        <p>歐洲留學是不是比較便宜</p>
                        <p>30歲才準備出國來得及嗎</p>
                    </div>
                    <div class="card">
                        <svg width="80" height="80">
                        <rect width="80" height="80" x="0" y="0" fill="gray"/>
                        </svg>
                        <h5>海外留學</h5>
                        <p>到美國念高中是不是比較容易申請</p>
                        <p>歐洲留學是不是比較便宜</p>
                        <p>30歲才準備出國來得及嗎</p>
                    </div>
                </div>
                <!-- QA section 2 -->
                <div class="qaSection">
                    <div class="card">
                        <svg width="80" height="80">
                        <rect width="80" height="80" x="0" y="0" fill="gray"/>
                        </svg>
                        <h5>海外留學</h5>
                        <p>到美國念高中是不是比較容易申請</p>
                        <p>歐洲留學是不是比較便宜</p>
                        <p>30歲才準備出國來得及嗎</p>
                    </div>
                    <div class="card">
                        <svg width="80" height="80">
                        <rect width="80" height="80" x="0" y="0" fill="gray"/>
                        </svg>
                        <h5>海外留學</h5>
                        <p>到美國念高中是不是比較容易申請</p>
                        <p>歐洲留學是不是比較便宜</p>
                        <p>30歲才準備出國來得及嗎</p>
                    </div>
                    <div class="card">
                        <svg width="80" height="80">
                        <rect width="80" height="80" x="0" y="0" fill="gray"/>
                        </svg>
                        <h5>海外留學</h5>
                        <p>到美國念高中是不是比較容易申請</p>
                        <p>歐洲留學是不是比較便宜</p>
                        <p>30歲才準備出國來得及嗎</p>
                    </div>
                </div>
                    <a href="" class="text-center text-decoration-none text-black">查看更多問答</a>
            </div>
        </section>

        <!-- join -->
        <section class="joinSection">
            <div>
                <p>親身經驗</p>
                <a style="background:#45ecd9; border: none" class="btn btn-primary btn-lg px-5" href="#features">加入 ｜ 易子學</a>
                <p>專業變現</p>
            </div>
        </section>


        <!-- news -->
        <section class="newsSection">
            <div style="text-align:center;">
                <a style="background:#45ecd9; border: none" class="btn btn-primary btn-lg px-5" href="#features">最新 ｜ 消息</a>
            </div>
            <div class="bg-light">
                <div class="newsCard">
                    <img src="{{asset('uploads/images/news-pic.jpg')}}" alt="news-pic">
                    <div class="info">
                        <h5 id="newsTopic">留學誌1</h5>
                        <p class="tag">#清潔收納</p>
                        <p class="meta">準備換季，床墊也該大掃除！這樣清潔保養才睡得好！！</p>
                        <p class="brief">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <a href="#">閱讀完整文章</a>
                    </div>
                </div>
            </div>
        </section>


@endsection