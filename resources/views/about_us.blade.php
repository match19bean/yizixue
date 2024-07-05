@extends('layouts.guest2')
@section('content')


<div class="l-aboutUs">
    <!-- swiper carousel -->
    <div class="l-aboutUs__aboutSwiper s-bannerSwiperCustom">
        <div class="c-bannerCarousel swiper aboutUsSwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <!-- put the picture resource here -->
                    <span class="c-bannerCarousel__slide"
                        style="background-image: url('{{asset('uploads/images/aboutUsBanner-1.jpg')}}') ;">&nbsp;</span>
                </div>
                <!-- these slides are just DEMOs, you can delete them after back-end setting -->
                <div class="swiper-slide">
                    <span class="c-bannerCarousel__slide"
                        style="background-image: url('{{asset('uploads/images/aboutUsBanner-2.jpg')}}') ;">&nbsp;</span>
                </div>
                <div class="swiper-slide">
                    <span class="c-bannerCarousel__slide"
                        style="background-image: url('{{asset('uploads/images/aboutUsBanner-3.jpg')}}') ;">&nbsp;</span>
                </div>
                <div class="swiper-slide">
                    <span class="c-bannerCarousel__slide"
                        style="background-image: url('{{asset('uploads/images/aboutUsBanner-4.jpg')}}') ;">&nbsp;</span>
                </div>
                <!-- end of the DEMOs -->
            </div>
            <div class="aboutUsPagi paginationCustom"></div>
        </div>
    </div>

    <!-- sponsor section -->
    <div class="l-aboutUs__sponsor">
        <div class="container">
            <div class="row">
                <div class="col-md-3 p-5">
                    <img src="{{asset('uploads/images/about_sponsor_1.png')}}" alt="">
                </div>
                <div class="col-md-6 p-5">
                    <div class="row l-aboutUs__centerBorder p-5">
                        <!-- put the picture resource here -->
                        <img class="col-md-4" src="{{asset('uploads/images/about_sponsor_2.png')}}" alt="">
                        <!-- these slides are just DEMOs, you can delete them after back-end setting -->
                        <img class="col-md-4" src="{{asset('uploads/images/about_sponsor_2.png')}}" alt="">
                        <img class="col-md-4" src="{{asset('uploads/images/about_sponsor_2.png')}}" alt="">
                        <!-- end of the DEMOs -->
                    </div>
                </div>
                <div class="col-md-3 p-5">
                    <img src="{{asset('uploads/images/about_sponsor_3.png')}}" alt="">
                </div>
            </div>
            <div class="row p-5">
                <p>
                    我們誠摯邀請超過 600 位學長姐加入易子學的行列，目標是讓易子學的服務涵蓋全球百大大學。這些學長姐不論是就讀於國內外大
                    學、高中國際學校，或是在實習或正式職場中，憑藉自身的經驗，提供第一手的校園資訊，協助以知識交流來實現知識平權。這一
                    使命與聯合國永續發展目標中的「減少不平等」、「提供優質教育和終身學習機會」以及「促進充分就業和適當工作」完全一致。
                    在平台運營上，我們秉持企業社會責任（CSR）原則，深信對社會和環境承擔責任遠比單純追求利潤更加重要。基於這一信念，我們致力於建立可持續的業務模式，透過創新和合作，推動知識平權。 「20% for
                    the young lion」計畫是我們回饋給知識平權的主 要方式之一，易子學承諾捐出每年銷售額的 20％，將資金用於支持世代交流，
                    以及跨越地域、文化、語言的遠距學習。
                </p>
            </div>
        </div>
    </div>

    <!-- student swiper carousel -->
    <div class="l-aboutUs__team mt-5">
        <h2 class="o-subTitle w-25">經營團隊</h2>
        <div class="l-aboutUs__teamSwiper">
            <div class="s-swiperCustom">
                <div class="swiper teamSwiper">
                    <div class="swiper-wrapper">
                        <!-- the following card are just a demo, please replace it with the new back-end ver you made, thx ;) -->
                        <div class="swiper-slide">
                            <div class="c-studentCardSwiper">
                                <!-- img div -->
                                <span class="c-studentCardSwiper_studentImg"
                                    style="background-image: url('{{asset('uploads/images/default_avatar.png')}}') ;">&nbsp;</span>
                                <!-- background -->
                                <svg class="c-studentCardSwiper_bg" viewBox="0 0 330 170">
                                    <polygon class="cls-1" points="329.5 170 0 170 0 0 330 45.1 329.5 170" />
                                </svg>
                                <!-- school img -->
                                <span class="c-studentCardSwiper_schoolImg"
                                    style="background-image: url('{{asset('university/USA/US1.png')}}') ;">&nbsp;</span>
                                <!-- name card -->
                                <h4 class="c-studentCardSwiper_userName">The Name</h4>
                                <!-- school english -->
                                <h5 class="c-studentCardSwiper_schoolEnglish">The English School</h5>
                                <!-- school chinese -->
                                <h6 class="c-studentCardSwiper_schoolChinese">The Chinese School</h6>
                                <!-- react icons -->
                                <div class="c-studentCardSwiper_react">
                                    <i class="bi bi-heart"><span>T</span></i>
                                    <i class="bi bi-bookmark"><span>T</span></i>
                                </div>
                                <!-- post tag -->
                                <div class="c-studentCardSwiper_postTag">
                                    <a href="#" class="text-white">Post Tag</a>
                                    <a href="#" class="text-white">Post Tag</a>
                                    <a href="#" class="text-white">Post Tag</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="c-studentCardSwiper">
                                <!-- img div -->
                                <span class="c-studentCardSwiper_studentImg"
                                    style="background-image: url('{{asset('uploads/images/default_avatar.png')}}') ;">&nbsp;</span>
                                <!-- background -->
                                <svg class="c-studentCardSwiper_bg" viewBox="0 0 330 170">
                                    <polygon class="cls-1" points="329.5 170 0 170 0 0 330 45.1 329.5 170" />
                                </svg>
                                <!-- school img -->
                                <span class="c-studentCardSwiper_schoolImg"
                                    style="background-image: url('{{asset('university/USA/US1.png')}}') ;">&nbsp;</span>
                                <!-- name card -->
                                <h4 class="c-studentCardSwiper_userName">The Name</h4>
                                <!-- school english -->
                                <h5 class="c-studentCardSwiper_schoolEnglish">The English School</h5>
                                <!-- school chinese -->
                                <h6 class="c-studentCardSwiper_schoolChinese">The Chinese School</h6>
                                <!-- react icons -->
                                <div class="c-studentCardSwiper_react">
                                    <i class="bi bi-heart"><span>T</span></i>
                                    <i class="bi bi-bookmark"><span>T</span></i>
                                </div>
                                <!-- post tag -->
                                <div class="c-studentCardSwiper_postTag">
                                    <a href="#" class="text-white">Post Tag</a>
                                    <a href="#" class="text-white">Post Tag</a>
                                    <a href="#" class="text-white">Post Tag</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="c-studentCardSwiper">
                                <!-- img div -->
                                <span class="c-studentCardSwiper_studentImg"
                                    style="background-image: url('{{asset('uploads/images/default_avatar.png')}}') ;">&nbsp;</span>
                                <!-- background -->
                                <svg class="c-studentCardSwiper_bg" viewBox="0 0 330 170">
                                    <polygon class="cls-1" points="329.5 170 0 170 0 0 330 45.1 329.5 170" />
                                </svg>
                                <!-- school img -->
                                <span class="c-studentCardSwiper_schoolImg"
                                    style="background-image: url('{{asset('university/USA/US1.png')}}') ;">&nbsp;</span>
                                <!-- name card -->
                                <h4 class="c-studentCardSwiper_userName">The Name</h4>
                                <!-- school english -->
                                <h5 class="c-studentCardSwiper_schoolEnglish">The English School</h5>
                                <!-- school chinese -->
                                <h6 class="c-studentCardSwiper_schoolChinese">The Chinese School</h6>
                                <!-- react icons -->
                                <div class="c-studentCardSwiper_react">
                                    <i class="bi bi-heart"><span>T</span></i>
                                    <i class="bi bi-bookmark"><span>T</span></i>
                                </div>
                                <!-- post tag -->
                                <div class="c-studentCardSwiper_postTag">
                                    <a href="#" class="text-white">Post Tag</a>
                                    <a href="#" class="text-white">Post Tag</a>
                                    <a href="#" class="text-white">Post Tag</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="c-studentCardSwiper">
                                <!-- img div -->
                                <span class="c-studentCardSwiper_studentImg"
                                    style="background-image: url('{{asset('uploads/images/default_avatar.png')}}') ;">&nbsp;</span>
                                <!-- background -->
                                <svg class="c-studentCardSwiper_bg" viewBox="0 0 330 170">
                                    <polygon class="cls-1" points="329.5 170 0 170 0 0 330 45.1 329.5 170" />
                                </svg>
                                <!-- school img -->
                                <span class="c-studentCardSwiper_schoolImg"
                                    style="background-image: url('{{asset('university/USA/US1.png')}}') ;">&nbsp;</span>
                                <!-- name card -->
                                <h4 class="c-studentCardSwiper_userName">The Name</h4>
                                <!-- school english -->
                                <h5 class="c-studentCardSwiper_schoolEnglish">The English School</h5>
                                <!-- school chinese -->
                                <h6 class="c-studentCardSwiper_schoolChinese">The Chinese School</h6>
                                <!-- react icons -->
                                <div class="c-studentCardSwiper_react">
                                    <i class="bi bi-heart"><span>T</span></i>
                                    <i class="bi bi-bookmark"><span>T</span></i>
                                </div>
                                <!-- post tag -->
                                <div class="c-studentCardSwiper_postTag">
                                    <a href="#" class="text-white">Post Tag</a>
                                    <a href="#" class="text-white">Post Tag</a>
                                    <a href="#" class="text-white">Post Tag</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="c-studentCardSwiper">
                                <!-- img div -->
                                <span class="c-studentCardSwiper_studentImg"
                                    style="background-image: url('{{asset('uploads/images/default_avatar.png')}}') ;">&nbsp;</span>
                                <!-- background -->
                                <svg class="c-studentCardSwiper_bg" viewBox="0 0 330 170">
                                    <polygon class="cls-1" points="329.5 170 0 170 0 0 330 45.1 329.5 170" />
                                </svg>
                                <!-- school img -->
                                <span class="c-studentCardSwiper_schoolImg"
                                    style="background-image: url('{{asset('university/USA/US1.png')}}') ;">&nbsp;</span>
                                <!-- name card -->
                                <h4 class="c-studentCardSwiper_userName">The Name</h4>
                                <!-- school english -->
                                <h5 class="c-studentCardSwiper_schoolEnglish">The English School</h5>
                                <!-- school chinese -->
                                <h6 class="c-studentCardSwiper_schoolChinese">The Chinese School</h6>
                                <!-- react icons -->
                                <div class="c-studentCardSwiper_react">
                                    <i class="bi bi-heart"><span>T</span></i>
                                    <i class="bi bi-bookmark"><span>T</span></i>
                                </div>
                                <!-- post tag -->
                                <div class="c-studentCardSwiper_postTag">
                                    <a href="#" class="text-white">Post Tag</a>
                                    <a href="#" class="text-white">Post Tag</a>
                                    <a href="#" class="text-white">Post Tag</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="c-studentCardSwiper">
                                <!-- img div -->
                                <span class="c-studentCardSwiper_studentImg"
                                    style="background-image: url('{{asset('uploads/images/default_avatar.png')}}') ;">&nbsp;</span>
                                <!-- background -->
                                <svg class="c-studentCardSwiper_bg" viewBox="0 0 330 170">
                                    <polygon class="cls-1" points="329.5 170 0 170 0 0 330 45.1 329.5 170" />
                                </svg>
                                <!-- school img -->
                                <span class="c-studentCardSwiper_schoolImg"
                                    style="background-image: url('{{asset('university/USA/US1.png')}}') ;">&nbsp;</span>
                                <!-- name card -->
                                <h4 class="c-studentCardSwiper_userName">The Name</h4>
                                <!-- school english -->
                                <h5 class="c-studentCardSwiper_schoolEnglish">The English School</h5>
                                <!-- school chinese -->
                                <h6 class="c-studentCardSwiper_schoolChinese">The Chinese School</h6>
                                <!-- react icons -->
                                <div class="c-studentCardSwiper_react">
                                    <i class="bi bi-heart"><span>T</span></i>
                                    <i class="bi bi-bookmark"><span>T</span></i>
                                </div>
                                <!-- post tag -->
                                <div class="c-studentCardSwiper_postTag">
                                    <a href="#" class="text-white">Post Tag</a>
                                    <a href="#" class="text-white">Post Tag</a>
                                    <a href="#" class="text-white">Post Tag</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="c-studentCardSwiper">
                                <!-- img div -->
                                <span class="c-studentCardSwiper_studentImg"
                                    style="background-image: url('{{asset('uploads/images/default_avatar.png')}}') ;">&nbsp;</span>
                                <!-- background -->
                                <svg class="c-studentCardSwiper_bg" viewBox="0 0 330 170">
                                    <polygon class="cls-1" points="329.5 170 0 170 0 0 330 45.1 329.5 170" />
                                </svg>
                                <!-- school img -->
                                <span class="c-studentCardSwiper_schoolImg"
                                    style="background-image: url('{{asset('university/USA/US1.png')}}') ;">&nbsp;</span>
                                <!-- name card -->
                                <h4 class="c-studentCardSwiper_userName">The Name</h4>
                                <!-- school english -->
                                <h5 class="c-studentCardSwiper_schoolEnglish">The English School</h5>
                                <!-- school chinese -->
                                <h6 class="c-studentCardSwiper_schoolChinese">The Chinese School</h6>
                                <!-- react icons -->
                                <div class="c-studentCardSwiper_react">
                                    <i class="bi bi-heart"><span>T</span></i>
                                    <i class="bi bi-bookmark"><span>T</span></i>
                                </div>
                                <!-- post tag -->
                                <div class="c-studentCardSwiper_postTag">
                                    <a href="#" class="text-white">Post Tag</a>
                                    <a href="#" class="text-white">Post Tag</a>
                                    <a href="#" class="text-white">Post Tag</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="c-studentCardSwiper">
                                <!-- img div -->
                                <span class="c-studentCardSwiper_studentImg"
                                    style="background-image: url('{{asset('uploads/images/default_avatar.png')}}') ;">&nbsp;</span>
                                <!-- background -->
                                <svg class="c-studentCardSwiper_bg" viewBox="0 0 330 170">
                                    <polygon class="cls-1" points="329.5 170 0 170 0 0 330 45.1 329.5 170" />
                                </svg>
                                <!-- school img -->
                                <span class="c-studentCardSwiper_schoolImg"
                                    style="background-image: url('{{asset('university/USA/US1.png')}}') ;">&nbsp;</span>
                                <!-- name card -->
                                <h4 class="c-studentCardSwiper_userName">The Name</h4>
                                <!-- school english -->
                                <h5 class="c-studentCardSwiper_schoolEnglish">The English School</h5>
                                <!-- school chinese -->
                                <h6 class="c-studentCardSwiper_schoolChinese">The Chinese School</h6>
                                <!-- react icons -->
                                <div class="c-studentCardSwiper_react">
                                    <i class="bi bi-heart"><span>T</span></i>
                                    <i class="bi bi-bookmark"><span>T</span></i>
                                </div>
                                <!-- post tag -->
                                <div class="c-studentCardSwiper_postTag">
                                    <a href="#" class="text-white">Post Tag</a>
                                    <a href="#" class="text-white">Post Tag</a>
                                    <a href="#" class="text-white">Post Tag</a>
                                </div>
                            </div>
                        </div>
                        <!-- end of the demo -->
                    </div>
                    <div class="teamPagi paginationCustom"></div>
                    <a class="o-readMore" href="/senior">查看更多 &gt;</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- this is the back-end version of the team swiper card, please replace the code with the demo version upon after you finbished the back-end setting, thx ;) -->

<!-- {{--

    @foreach ($Data['Users'] as $key => $user)
    <div class="c-studentCardSwiper swiper-slide" onclick="cardClickable({{ $user->id }})">
@if(is_null($user->avatar))
<span class="c-studentCardSwiper_studentImg"
    style="background-image: url('{{asset('uploads/images/default_avatar.png')}}') ;">&nbsp;</span>
@else
<span class="c-studentCardSwiper_studentImg"
    style="background-image: url('/uploads/{{ $user->avatar }}');">&nbsp;</span>
@endif
<svg class="c-studentCardSwiper_bg" viewBox="0 0 330 170">
    <polygon class="cls-1" points="329.5 170 0 170 0 0 330 45.1 329.5 170" />
</svg>
<span class="c-studentCardSwiper_schoolImg"
    style="background-image: url('{{asset('university/USA/US1.png')}}') ;">&nbsp;</span>
<h4 class="c-studentCardSwiper_userName">
    {{ ($user->name) ? \Illuminate\Support\Str::limit($user->name,10): "" }}
</h4>
<h5 class="c-studentCardSwiper_schoolEnglish">
    {{ !is_null($user->universityItem) ? \Illuminate\Support\Str::limit($user->universityItem->english_name, 15) : '' }}
</h5>
<h6 class="c-studentCardSwiper_schoolChinese">
    {{ !is_null($user->universityItem) ? \Illuminate\Support\Str::limit($user->universityItem->chinese_name, 10) : '' }}
</h6>
<div class="c-studentCardSwiper_react" onclick="event.stopPropagation(); return false; ">
    @if(auth()->check())
    <i class="bi bi-heart" style="
                color:@if($user->likedUser->where('uid', auth()->user()->id)->where('user_id', $user->id)->count() == 1) red @else black @endif
                " data-id="{{$user->id}}">
        <span class="text-black">{{$user->likedUser->count()}}</span>
    </i>
    <i class="bi bi-bookmark" data-id="{{$user->id}}" style="
                color:  @if($user->collectedUser->where('uid', auth()->user()->id)->where('user_id', $user->id)->count() == 1) red @else black @endif
                ">
        <span class="text-black">{{$user->collectedUser->count()}}</span>
    </i>
    @else
    <i class="bi bi-heart" style="color: black;" data-id="{{$user->id}}">
        <span class="text-black">{{$user->likedUser->count()}}</span>
    </i>
    <i class="bi bi-bookmark" data-id="{{$user->id}}">
        <span class="text-black">{{$user->collectedUser->count()}}</span>
    </i>
    @endif
</div>
<div class="c-studentCardSwiper_postTag">
    @forelse ($user->postCategory as $count => $cate)
    @if ($count < 3) <a href="{{route('senior', ['category' => $cate->postCategory->id])}}" class="text-white">
        {{ $cate->postCategory->name }}
        </a>
        @endif
        @empty
        @endforelse
</div>
</div>
@endforeach

--}} -->

<!-- end of the back end version -->