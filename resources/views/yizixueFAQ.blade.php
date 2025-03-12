@extends('layouts.guest2')
@section('content')
    <div class="l-yizixueFAQ">
        <div class="c-bannerCarousel__slide" style="background-image: url('{{ asset('/uploads/' . $image->image_path) }}') ;">
            &nbsp;</div>
        <div class="l-yizixueFAQ__content container w-100 w-md-75">
            <!-- you can see the reference of the code "https://codepen.io/Gaurav-Rana-the-reactor/pen/YzdWLPy" -->
            <!-- container 1 -->
            <div class="row pt-2 pt-md-5">
                <!-- sidebar -->
                <div class="col-3 col-md-3">
                    <!-- Topic buttons -->
                    <div class="container">
                        <div style="display: none;" class="delet-this-tag-after-you-done-yor-edting">
                        </div class="delet-this-tag-after-you-done-yor-edting">
                        <!-- ////// -->
                        <ul class="nav nav-pills flex-column" id="pills-tab" role="tablist">
                            @forelse($categories as $category)
                                @if ($loop->first)
                                    <li class="mt-5" role="presentation">
                                        <button class="nav-link active o-faqTopic" id="pills-{{ $category->id }}-tab"
                                            data-bs-toggle="pill" data-bs-target="#pills-{{ $category->id }}" type="button"
                                            role="tab" aria-controls="pills-{{ $category->id }}"
                                            aria-selected="true">{{ $category->name }}</button>
                                    </li>
                                @else
                                    <li class="mt-5" role="presentation">
                                        <button class="nav-link o-faqTopic" id="pills-{{ $category->id }}-tab"
                                            data-bs-toggle="pill" data-bs-target="#pills-{{ $category->id }}" type="button"
                                            role="tab" aria-controls="pills-{{ $category->id }}"
                                            aria-selected="false">{{ $category->name }}</button>
                                    </li>
                                @endif
                            @empty
                            @endforelse
                        </ul>
                        <!-- ★★★★end of demo★★★★ -->
                    </div>
                </div>
                <!-- content -->
                <div class="col-9 col-md-9">
                    <!-- contents -->
                    <div id="pills-tabContent" class="tab-content">
    @forelse($categories as $category)
        <div
            class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
            id="pills-{{ $category->id }}"
            role="tabpanel"
            aria-labelledby="pills-{{ $category->id }}-tab"
        >
            @forelse($contents->where('yizixue_faq_category_id', $category->id) as $content)
                <div class="mb-3"> 
                    <!-- 每一條 FAQ 外層可加 .mb-3 讓間距更乾淨 -->
                    <button
                        class="o-faqBtn w-100 text-start"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#content{{ $content->id }}"
                        aria-expanded="false"
                        aria-controls="content{{ $content->id }}"
                    >
                        <!-- 用 d-flex 來排 SVG 和文字 -->
                        <div class="d-flex align-items-center p-3">
                            <!-- SVG 區塊 -->
                            <div class="me-3">
                                <svg width="40" height="40" viewBox="0 0 500 500">
                                    <circle cx="250" cy="250" r="250" />
                                    <path
                                        d="M294.2,107.8c45.8,0,75,37.1,66.1,82.9l-23.1,119c-2.6,13.4-8.4,26.1-15.9,37.1l27.3,45.5h-48.8l-9.6-15.7
                                           c-15.3,9.7-33.1,15.7-51.2,15.7h-32.8c-45.5,0-75.3-37.1-66.5-82.6l23.1-119c8.9-45.8,53.2-82.9,98.7-82.9h32.8Z
                                           M289.2,293.3l19.4-99.9c3.8-19.7-5.4-36.1-24.4-36.1h-32.1c-19.4,0-34.9,16.4-38.8,36.1l-22,113.3
                                           c-3.8,19.7,5.4,36.1,24.7,36.1h32.1c6.7,0,12.8-2,18.1-5.3l-42.8-70.5h50.1l15.6,26.4Z"
                                    />
                                </svg>
                            </div>
                            <!-- 文字標題 -->
                            <div class="flex-grow-1">
                                {{ $content->title }}
                            </div>
                        </div>
                    </button>
                    <div class="collapse multi-collapse" id="content{{ $content->id }}">
                        <div class="card card-body">
                            {!! $content->content !!}
                            <!-- ↑ 請確定這裡的 content HTML 沒有錯誤的標籤 -->
                        </div>
                    </div>
                </div>
            @empty
                <p>此分類下暫無內容</p>
            @endforelse
        </div>
    @empty
        <p>暫無分類</p>
    @endforelse
</div>


                </div>
            </div>
        </div>
    </div>
@endsection
