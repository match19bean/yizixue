@extends('layouts.guest2')
@section('content')
<div class="l-yizixueFAQ">
    <div class="c-bannerCarousel__slide"
        style="background-image: url('{{asset('/uploads/'.$image->image_path)}}') ;">&nbsp;</div>
    <div class="l-yizixueFAQ__content container w-75">
        <!-- you can see the reference of the code "https://codepen.io/Gaurav-Rana-the-reactor/pen/YzdWLPy" -->
        <!-- container 1 -->
        <div class="row pt-5">
            <div class="col-md-3">
                <!-- Topic buttons -->
                <div class="container">
                    <div style="display: none;" class="delet-this-tag-after-you-done-yor-edting">
                        <!-- *** button code templeate, put backend codes here -->
                        <ul class="nav nav-pills flex-column" id="pills-tab" role="tablist">
                            <li class="mt-5" role="presentation">
                                <button id="this-should-be-tab-id" class="nav-link active o-faqTopic" data-bs-toggle="pill"
                                    data-bs-target="#this-should-be-content-id" type="button" role="tab"
                                    aria-controls="this-should-be-content-id" aria-selected="true">
                                    <!-- change this into backend qa topic -->
                                    Topic Name Here
                                </button>
                            </li>
                        </ul>
                        <!-- *** end of the template -->
                    </div class="delet-this-tag-after-you-done-yor-edting">
                    <!-- ////// -->
                    <!-- ★★★★ following are just demos, you can delete them in final version★★★★★ -->
                    <ul class="nav nav-pills flex-column" id="pills-tab" role="tablist">
                        @forelse($categories as $category)
                            @if($loop->first)
                                <li class="mt-5" role="presentation">
                                    <button class="nav-link active o-faqTopic" id="pills-{{$category->id}}-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-{{$category->id}}" type="button" role="tab" aria-controls="pills-{{$category->id}}"
                                            aria-selected="true">{{$category->name}}</button>
                                </li>
                            @else
                                <li class="mt-5" role="presentation">
                                    <button class="nav-link o-faqTopic" id="pills-{{$category->id}}-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-{{$category->id}}" type="button" role="tab" aria-controls="pills-{{$category->id}}"
                                            aria-selected="false">{{$category->name}}</button>
                                </li>
                            @endif
                        @empty
                        @endforelse
                    </ul>
                    <!-- ★★★★end of demo★★★★ -->
                </div>
            </div>
            <div class="col-md-9">
                <!-- contents -->
                <div id="pills-tabContent" class="tab-content">
                    @forelse($categories as $category)
                        @if($loop->first)
                            <div class="tab-pane fade show active" id="pills-{{$category->id}}" role="tabpanel" aria-labelledby="pills-{{$category->id}}-tab">
                        @else
                            <div class="tab-pane fade" id="pills-{{$category->id}}" role="tabpanel" aria-labelledby="pills-{{$category->id}}-tab">
                        @endif
                            @forelse($contents->where('yizixue_faq_category_id', $category->id) as $content)
                                <div class="row m-3">
                                    <div class="col-md-12">
                                        <button class="o-faqBtn" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#content{{$content->id}}" aria-expanded="false" aria-controls="content{{$content->id}}">
                                    <span class="container">
                                        <span class="row p-3">
                                            <svg class="col-md-1" viewBox="0 0 500 500">
                                                <circle cx="250" cy="250" r="250" />
                                                <path
                                                        d="M294.2,107.8c45.8,0,75,37.1,66.1,82.9l-23.1,119c-2.6,13.4-8.4,26.1-15.9,37.1l27.3,45.5h-48.8l-9.6-15.7c-15.3,9.7-33.1,15.7-51.2,15.7h-32.8c-45.5,0-75.3-37.1-66.5-82.6l23.1-119c8.9-45.8,53.2-82.9,98.7-82.9h32.8ZM289.2,293.3l19.4-99.9c3.8-19.7-5.4-36.1-24.4-36.1h-32.1c-19.4,0-34.9,16.4-38.8,36.1l-22,113.3c-3.8,19.7,5.4,36.1,24.7,36.1h32.1c6.7,0,12.8-2,18.1-5.3l-42.8-70.5h50.1l15.6,26.4Z" />
                                            </svg>
                                            <p class="col-md-11">{{$content->title}}</p>
                                        </span>
                                    </span>
                                        </button>
                                        <div class="collapse multi-collapse" id="content{{$content->id}}">
                                            <div class="card card-body">
                                                {!! $content->content !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    @empty
                    @endforelse
                    @forelse($contents as $content)
                    @empty
                    @endforelse



                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <!-- card3 -->
                        <div class="row m-3">
                            <div class="col-md-12">
                                <button class="o-faqBtn" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#example3" aria-expanded="false" aria-controls="example3">
                                    <span class="container">
                                        <span class="row p-3">
                                            <svg class="col-md-1" viewBox="0 0 500 500">
                                                <circle cx="250" cy="250" r="250" />
                                                <path
                                                    d="M294.2,107.8c45.8,0,75,37.1,66.1,82.9l-23.1,119c-2.6,13.4-8.4,26.1-15.9,37.1l27.3,45.5h-48.8l-9.6-15.7c-15.3,9.7-33.1,15.7-51.2,15.7h-32.8c-45.5,0-75.3-37.1-66.5-82.6l23.1-119c8.9-45.8,53.2-82.9,98.7-82.9h32.8ZM289.2,293.3l19.4-99.9c3.8-19.7-5.4-36.1-24.4-36.1h-32.1c-19.4,0-34.9,16.4-38.8,36.1l-22,113.3c-3.8,19.7,5.4,36.1,24.7,36.1h32.1c6.7,0,12.8-2,18.1-5.3l-42.8-70.5h50.1l15.6,26.4Z" />
                                            </svg>
                                            <p class="col-md-11">this is the content3</p>
                                        </span>
                                    </span>
                                </button>
                                <div class="collapse multi-collapse" id="example3">
                                    <div class="card card-body">
                                        Some placeholder content for the first collapse component of this multi-collapse
                                        example.
                                        This panel is hidden by default but revealed when the user activates the
                                        relevant
                                        trigger.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <!-- card4 -->
                        <div class="row m-3">
                            <div class="col-md-12">
                                <button class="o-faqBtn" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#example4" aria-expanded="false" aria-controls="example4">
                                    <span class="container">
                                        <span class="row p-3">
                                            <svg class="col-md-1" viewBox="0 0 500 500">
                                                <circle cx="250" cy="250" r="250" />
                                                <path
                                                    d="M294.2,107.8c45.8,0,75,37.1,66.1,82.9l-23.1,119c-2.6,13.4-8.4,26.1-15.9,37.1l27.3,45.5h-48.8l-9.6-15.7c-15.3,9.7-33.1,15.7-51.2,15.7h-32.8c-45.5,0-75.3-37.1-66.5-82.6l23.1-119c8.9-45.8,53.2-82.9,98.7-82.9h32.8ZM289.2,293.3l19.4-99.9c3.8-19.7-5.4-36.1-24.4-36.1h-32.1c-19.4,0-34.9,16.4-38.8,36.1l-22,113.3c-3.8,19.7,5.4,36.1,24.7,36.1h32.1c6.7,0,12.8-2,18.1-5.3l-42.8-70.5h50.1l15.6,26.4Z" />
                                            </svg>
                                            <p class="col-md-11">this is the content4</p>
                                        </span>
                                    </span>
                                </button>
                                <div class="collapse multi-collapse" id="example4">
                                    <div class="card card-body">
                                        Some placeholder content for the first collapse component of this multi-collapse
                                        example.
                                        This panel is hidden by default but revealed when the user activates the
                                        relevant
                                        trigger.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ★★★★end of demo★★★★ -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection