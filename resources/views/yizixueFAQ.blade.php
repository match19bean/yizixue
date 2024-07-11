@extends('layouts.guest2')
@section('content')
<div class="l-yizixueFAQ">
    <div class="c-bannerCarousel__slide"
        style="background-image: url('{{asset('/uploads/'.$image->image_path)}}') ;">&nbsp;</div>
    <div class="l-yizixueFAQ__content container w-75">
        <div class="row pt-5">
            <div class="col-md-3">
                <div class="container">
                    <!-- selected style class: o-faqTopic__selected -->
                    <!-- ★★★★this is just a demo, you can delete this in final version★★★★★ -->
                    @forelse($categories as $category)
                    <div class="row m-5">
                        <a class="o-faqTopic" onclick="chooseTopic(this)">{{$category->name}}</a>
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>
            <div class="col-md-9">
                <div class="container">
                    <!-- these cards use bootstrap5 collapse format, link: https://getbootstrap.com/docs/5.0/components/collapse/ -->
                    <!-- card1 -->
                    @forelse($contents as $content)
                    <div class="row m-3">
                        <div class="col-md-12">
                            <button class="o-faqBtn" type="button" data-bs-toggle="collapse" data-bs-target="#example{{$content->id}}"
                                aria-expanded="false" aria-controls="example1">
                                <span class="container">
                                    <span class="row p-3">
                                        <svg class="col-md-1" viewBox="0 0 500 500">
                                            <circle cx="250" cy="250" r="250" />
                                            <path
                                                d="M294.2,107.8c45.8,0,75,37.1,66.1,82.9l-23.1,119c-2.6,13.4-8.4,26.1-15.9,37.1l27.3,45.5h-48.8l-9.6-15.7c-15.3,9.7-33.1,15.7-51.2,15.7h-32.8c-45.5,0-75.3-37.1-66.5-82.6l23.1-119c8.9-45.8,53.2-82.9,98.7-82.9h32.8ZM289.2,293.3l19.4-99.9c3.8-19.7-5.4-36.1-24.4-36.1h-32.1c-19.4,0-34.9,16.4-38.8,36.1l-22,113.3c-3.8,19.7,5.4,36.1,24.7,36.1h32.1c6.7,0,12.8-2,18.1-5.3l-42.8-70.5h50.1l15.6,26.4Z" />
                                        </svg>
                                        <!-- change Q content here -->
                                        <p class="col-md-11">{{$content->title}}</p>
                                    </span>
                                </span>
                            </button>
                            <div class="collapse multi-collapse" id="example{{$content->id}}">
                                <div class="card card-body">
                                    <!-- change A content here -->
                                    <p>
                                        {{$content->content}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    @endforelse
                    <!-- These cards are just DEMOs, you can delete them after back-end setting -->
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('page_js')
<script>
    function chooseTopic(target) {
        $(target).addClass("o-faqTopic__selected");
    }
</script>
@endsection