@extends('layouts.main.master')
@section('title')
    {{ $setting->company }}
@endsection
@section('description')
    {{ $setting->webname }}
@endsection
@section('image')
    {{ url('' . $banner[0]->image) }}
@endsection
@section('css')
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    />

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-pEc+5fVF6lEa9pN5KM8Vjh9yF6Ua+XgrGJ84IqfELAuIvT9dq8IbV3LiQ1PsGg5bqf13i7V1eXj0M4dXEdC5ZA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
@endsection
@section('js')
@endsection

@section('content')
    <section class="home-slider section-distance index-scss">
        <div class="home-slider-main">
            <div class="home-slider-items">
                @foreach ($banner as $item)
                    <div class="home-slider-item">
                        <a href="" aria-label="" title="">
                            <picture>
                                <source width="1920" height="1080" media="(min-width: 800px)" srcset="{{ $item->image }}">
                                <source width="800" height="800" media="(min-width: 0)" srcset="{{ $item->image }}">
                                <img loading="eager" decoding="sync" fetchpriority="high"
                                     width="1920" height="1080" src="{{ $item->image }}" alt="" title="">
                            </picture>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>


    <style>
        /* ==== CSS ==== */
        :root {
            --brand-color: #0056b8;
            --accent: #f58321;
            --text-dark: #222;
            --text-light: #555;
            --bg-light: #fff;
            --radius: 50%;
            --transition: 0.3s ease;
            --font: 'Segoe UI', sans-serif;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: var(--font);
            color: var(--text-dark);
        }

        .about-section {
            background: var(--bg-light);
            padding: 60px 20px;
        }
        .about-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            gap: 60px;
        }

        /* -------- Left: Images -------- */
        .about-images {
            position: relative;
            width: 400px;
            height: 400px;
        }
        .img-circle {
            position: absolute;
            width: 220px;
            height: 220px;
            overflow: hidden;
            border-radius: var(--radius);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            transition: transform var(--transition);
        }
        .img-circle img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .img-circle-1 {
            top: 0;
            left: 0;
            z-index: 3;
        }
        .img-circle-2 {
            top: 60px;
            left: 140px;
            z-index: 2;
        }
        .img-circle-3 {
            top: 180px;
            left: 50px;
            z-index: 1;
        }
        /* Badge */
        .experience-badge {
            position: absolute;
            top: 200px;
            left: 200px;
            background: var(--accent);
            color: #fff;
            border-radius: 40px;
            padding: 12px 20px;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            z-index: 4;
            transition: transform var(--transition);
        }
        .experience-badge .years {
            font-size: 1.6rem;
            font-weight: bold;
            display: block;
        }
        .experience-badge .label {
            font-size: 0. nine5rem;
        }

        /* Hover effect nhẹ */
        .about-images:hover .img-circle-1 { transform: translate(-10px,-10px) scale(1.05); }
        .about-images:hover .img-circle-2 { transform: translate(10px,10px)   scale(1.05); }
        .about-images:hover .img-circle-3 { transform: translate(-10px,10px)  scale(1.05); }
        .about-images:hover .experience-badge { transform: translate(5px,-5px) scale(1.05); }

        /* -------- Right: Content -------- */
        .about-content {
            flex: 1;
        }
        .tagline {
            display: inline-block;
            background: var(--accent);
            color: #fff;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0. ninerem;
            margin-bottom: 16px;
            text-transform: uppercase;
        }
        .title {
            font-size: 2rem;
            line-height: 1.2;
            margin-bottom: 20px;
        }
        .title span {
            color: var(--accent);
        }
        .description {
            font-size: 1rem;
            line-height: 1.6;
            color: var(--text-light);
            margin-bottom: 24px;
        }
        .btn-about {
            display: inline-block;
            background: #ce0808;
            color: #fff;
            padding: 12px 24px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            transition: background var(--transition), transform var(--transition);
        }
        .btn-about:hover {
            background: #ce0808;
            transform: translateY(-2px);
        }

        a:hover {
            color: #fff !important;
            transform: translateY(-2px);
        }

        .description {
            display: -webkit-box;             /* tạo flexbox container dọc */
            -webkit-box-orient: vertical;     /* hướng dọc */
            -webkit-line-clamp: 5;            /* số dòng tối đa */
            overflow: hidden;                 /* ẩn phần vượt quá */
            text-overflow: ellipsis;          /* hiển thị dấu … */
        }

        /* ---- Responsive ---- */
        @media (max-width: 992px) {
            .about-container {
                flex-direction: column-reverse;
                text-align: center;
            }
            .about-images {
                width: 300px;
                height: 300px;
                margin-bottom: 40px;
            }
            .img-circle {
                width: 180px;
                height: 180px;
            }
            .img-circle-2 { top: 50px; left: 100px; }
            .img-circle-3 { top: 130px; left: 30px; }
            .experience-badge {
                top: 140px;
                left: 140px;
            }

        }

    </style>
    <!-- ==== HTML ==== -->
    <section class="about-section">
        <div class="about-container">
            @php
                $imggt = json_decode($gioithieu->image);
            @endphp

            <!-- Ảnh tròn chồng lấn -->
            <div class="about-images">
                @foreach ($imggt as $key => $item)
                    <div class="col-4">
                        <img class="img-{{ $key + 1 }} lazy"
                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                             data-src="{{ $item }}" alt="image">
                    </div>
                    <div class="img-circle img-circle-{{ $key + 1 }}">
                        <img src="{{ $item }}" alt="Ảnh 1">
                    </div>

                @endforeach

                <div class="experience-badge">
                    <span class="years">10+</span>
                    <span class="label">Năm kinh nghiệm</span>
                </div>
            </div>

            <!-- Phần văn bản -->
            <div class="about-content">
                <span class="tagline">About Us</span>
                <h2 class="title">
                    {{ $setting->company }}
                </h2>
                <div class="description">
                    {!! $gioithieu->content !!}
                </div>
                <a href="{{ route('aboutUs') }}" class="btn-about">Xem Thêm Về Chúng Tôi →</a>
            </div>
        </div>
    </section>


    <style>
        h2.m-reset.f-size-6.f-superbold {
            position: relative;
            display: inline-block;
            padding-bottom: 0.5em;  /* khoảng cách giữa text và gạch */
            margin-bottom: 0.5em;     /* khoảng cách với nội dung dưới */
        }

        /* 2. Vẽ gạch bằng pseudo-element */
        h2.m-reset.f-size-6.f-superbold::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 400px;            /* độ dài gạch */
            height: 1px;            /* độ dày gạch */
            background-color: currentColor; /* cùng màu text */
            border-radius: 2px;     /* bo góc nhẹ */
        }
    </style>
    @if($categoriesFeatured->count())
        @foreach($categoriesFeatured as $cateFeatured)
            <section class="home-product-new section-distance container">
                <div class="d-flex-vertical d-flex-center layout-gap-0.5unit home-product-header home-custom-header">
                    <h2 class="m-reset f-size-6 f-superbold limit-line threeline f-center text-primary-color">{{languageName($cateFeatured->name)}}</h2>
                    <div class="home-custom-header-flex d-flex-vertical d-flex-center">
                        <a class="m-reset f-size-3 limit-line fiveline f-center home-custom-extra-header" href="collections/all.html" title="Xem tất cả">Xem tất cả</a>
                    </div>
                </div>
                <div class="home-product-new-slider">
                    @foreach($cateFeatured->products as $productFeatured)
                        @php
                            $img = json_decode($productFeatured->images);
                        @endphp
                        <div class="product-item" data-id="122987584{{$productFeatured->id}}" data-handle="{{ languageName($productFeatured->name) }}">
                            <div class="product-item-wrap">
                                <div class="product-item-top">
                                    <div class="product-item-top-image">
                                        <a href="tu-quan-ao-3-cua-5-ngan-f1genz-cao-cap.html" class="product-item-top-image-showcase">
                                            <img src="{{ $img[0] }}"
                                                 alt='{{ languageName($productFeatured->name) }}'
                                                 title='{{ languageName($productFeatured->name) }}' width="480" height="480" loading="lazy" decoding="async">
                                        </a>
                                    </div>
                                    @if ($productFeatured->price > 0 && $productFeatured->discount > 0)
                                        @php
                                            $percent = ($productFeatured->price - $productFeatured->discount) / $productFeatured->price * 100;
                                        @endphp
                                    <div class="product-item-label-sale"><span>-{{ round($percent, 2) }}%</span></div>
                                    @endif
                                </div>
                                <div class="product-item-detail">
                                    <div class="product-item-detail-flex">
                                        <a class="product-item-detail-vendor" href="tu-quan-ao-3-cua-5-ngan-f1genz-cao-cap.html"
                                           title="{{ languageName($productFeatured->name) }}" aria-label="F1GENZ">
                                            <span>{{ languageName($productFeatured->name) }}</span>
                                        </a>
                                        <div class="sapo-product-reviews-badge" data-id="36799063"></div>
                                    </div>
                                    <h3 class="product-item-detail-title">
                                        <a  href="tu-quan-ao-3-cua-5-ngan-f1genz-cao-cap.html"
                                            title="{{ languageName($productFeatured->name) }}" aria-label="{{ languageName($productFeatured->name) }}">
                                            {{ languageName($productFeatured->name) }}</a></h3>
                                    <div class="product-item-detail-price">
                                        @if ($productFeatured->price > 0)
                                            @if ($productFeatured->discount > 0)
                                                <strong>{{ number_format($productFeatured->discount) }}₫</strong>
                                                <del>{{ number_format($productFeatured->price) }}₫</del>
                                            @else
                                                <strong>{{ number_format($productFeatured->price) }}₫</strong>
                                            @endif
                                        @else
                                            <strong>Đang cập nhật</strong>
                                        @endif
                                    </div>

                                    <div class="product-item-detail-gallery-items">

                                    </div>


                                    <div class="product-item-actions">
                                        <button type="button" title="Thêm vào giỏ" class="button-fstyle1 shop-addLoop-button" data-type="shop-addLoop-button"><span>Thêm vào giỏ</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endforeach

    @endif


    <style>
        /*.services-section {*/
        /*    background: #0247af;*/
        /*    background-image: url(https://avlight.azas.vn/frontend/img/03.png) center/cover no-repeat;*/
        /*    padding: 60px 0;*/
        /*}*/

        /*.services-section__title {*/
        /*    font-size: 2.5rem;*/
        /*    font-weight: 700;*/
        /*    color: #fff;              !* hoặc bất cứ màu nào nổi bật trên background *!*/
        /*    text-align: left;*/
        /*    margin-bottom: 30px;*/
        /*}*/
        .services-section {
            position: relative;
            background: rgb(0 0 0 / 63%);
            z-index: 1;
            padding: 80px 0;
        }

        .services-section::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            background-image: url(/frontend/assets/spe.png);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            opacity: .1;
            z-index: -1;
        }

        /*.services-section {*/
        /*    background: #0247af;*/

        /*    position: relative;*/
        /*    background: url(https://avlight.azas.vn/frontend/img/03.png) center/cover no-repeat;*/
        /*    padding: 80px 0;*/
        /*}*/

        .site-heading {
            text-align: left;
            margin-bottom: 40px !important;
        }

        .site-title-tagline {
            display: inline-flex;
            align-items: center;
            font-size: 0.9rem;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.8);
        }

        .site-title-tagline i {
            margin-right: 0.5em;
            font-size: 1.2rem;
        }

        .site-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #fff;
            line-height: 1.2;
            margin-top: 0.2em;
        }

        .site-title span {
            color: #ffd700; /* Ví dụ dùng màu vàng để nhấn mạnh “dịch vụ” */
        }

        /* Responsive */
        @media (max-width: 768px) {
            .site-title {
                font-size: 2rem;
            }
            .site-title-tagline {
                font-size: 0.8rem;
            }
        }

    </style>

    <style>
        /* Slider container */
        .home-banner-triple-slider .home-banner-triple-item {
            position: relative;
            overflow: hidden;
        }

        /* Ảnh full-cover item */
        .home-banner-triple-item-container img {
            display: block;
            width: 100%;
            height: auto;
        }


        /* Hiển thị overlay khi hover */
        .home-banner-triple-item-container:hover .service-overlay {
            opacity: 1;
        }

        .service-title {
            font-size: 1.5rem;
            margin-bottom: 0.5em;
            font-weight: 600;
        }

        .service-desc {
            font-size: 1rem;
            line-height: 1.4;
        }

        .home-banner-triple-item-container {
            position: relative;
            overflow: hidden;
        }

        /* 1. Hiệu ứng zoom ảnh nhẹ */
        .home-banner-triple-item-container img {
            display: block;
            width: 100%;
            height: auto;
            transition: transform 0.6s ease; /* mượt mà hơn */
        }

        .home-banner-triple-item-container:hover img {
            transform: scale(1.1);
        }

        /* 2. Overlay trắng trượt lên từ đáy */
        .hover-info {
            position: absolute;
            left: 0; right: 0; bottom: 0;
            background: #fff;
            transform: translateY(100%);
            transition: transform 0.5s ease;
            padding: 20px;
        }

        /* Khi hover, trượt overlay lên */
        .home-banner-triple-item-container:hover .hover-info {
            transform: translateY(0);
        }

        /* 3. Nội dung overlay */
        .hover-content {
            /*max-width: 80%;*/
            margin: 0 auto;
            text-align: center;
        }

        .service-title {
            font-size: 1.3rem;
            margin-bottom: 0.5em;
            color: #333;
            position: relative;
            display: inline-block;
        }

        .service-desc {
            font-size: 0.95rem;
            margin-bottom: 1em;
            color: #666;
            line-height: 1.4;
            text-align: justify;
        }

        /* 4. Nút “Xem chi tiết” */
        .btn-detail {
            position: relative;
            display: inline-block;
            padding: 0.6em 1.6em;
            background: linear-gradient(to bottom, #e23333 0%, #ce0808 100%);
            color: #fff;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-decoration: none;
            border: none;
            border-radius: 6px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            transition:
                background 0.3s ease,
                transform 0.3s ease,
                box-shadow 0.3s ease;
            cursor: pointer;
        }

        /* Shine sweep */
        .btn-detail::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 50%;
            height: 100%;
            background: rgba(255, 255, 255, 0.4);
            transform: skewX(-25deg);
            transition: left 0.6s ease;
        }

        .btn-detail:hover::after {
            left: 200%;
        }

        /* Hover nâng nhẹ + đổi gradient */
        .btn-detail:hover {
            background: linear-gradient(to bottom, #f25a5a 0%, #d12b2b 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            color: #fff !important;
        }

        /* Active nhấn xuống */
        .btn-detail:active {
            transform: translateY(0) scale(0.98);
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
        }


    </style>


    <section class="services-section">
        <div class="container">
            <div class="site-heading mb-0">
              <span class="site-title-tagline">
                <i class="far fa-truck-container"></i>
                Dịch vụ của chúng tôi
              </span>
                <h2 class="site-title">
                    Chúng tôi cung cấp các dịch vụ
                </h2>
            </div>

            <div class="home-banner-triple section-distance index-scss ">
                <div class="home-banner-triple-slider owl-carousel">
                    @foreach ($servicecate as $key => $item)
                        <div class="home-banner-triple-item">
                            <div class="home-banner-triple-item-container">
                                <img src="{{ $item->image }}"
                                     alt="Phòng khách thanh lịch" loading="lazy">
                                <div class="hover-info">
                                    <div class="hover-content">
                                        <h3 class="service-title">{{ $item->name }}</h3>
                                        <p class="service-desc">
                                            {{ ($item->description) }}
                                        </p>
                                        <a href="{{ route('serviceCateList', ['slug' => $item->slug]) }}" class="btn-detail">Chi tiết</a>
                                    </div>
                                </div>

                            </div>
                        </div>

                    @endforeach
                </div>
            </div>



            {{--            <div class="home-banner-triple section-distance index-scss ">--}}
{{--                <div class="home-banner-triple-flex">--}}
{{--                    <div class="home-banner-triple-item">--}}
{{--                        <div class="home-banner-triple-item-container">--}}
{{--                            <a href="collections/all.html" aria-label="Ph&#242;ng kh&#225;ch thanh lịch với gam m&#224;u trung t&#237;nh" title="Ph&#242;ng kh&#225;ch thanh lịch với gam m&#224;u trung t&#237;nh" class="">--}}
{{--                                <picture>--}}
{{--                                    <img class="" loading="lazy" decoding="async" fetchpriority="low"--}}
{{--                                         width="800" height="800" src="/frontend/assets/home_banner_triple_image_1ed63.jpg?1745557375056" alt="Ph&#242;ng kh&#225;ch thanh lịch với gam m&#224;u trung t&#237;nh" title="Ph&#242;ng kh&#225;ch thanh lịch với gam m&#224;u trung t&#237;nh">--}}
{{--                                </picture>--}}
{{--                            </a>--}}
{{--                            <a href="collections/all.html" title="Khám phá ngay " class="home-banner-trple-button primary-btn">--}}
{{--                                <span class="m-reset limit-line oneline">Khám phá ngay</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="home-banner-triple-item">--}}
{{--                        <div class="home-banner-triple-item-container">--}}
{{--                            <a href="collections/all.html" aria-label="Ph&#242;ng ngủ tối giản với c&#225;c đường n&#233;t hiện đại" title="Ph&#242;ng ngủ tối giản với c&#225;c đường n&#233;t hiện đại" class="">--}}
{{--                                <picture>--}}
{{--                                    <img class="" loading="lazy" decoding="async" fetchpriority="low"--}}
{{--                                         width="800" height="800" src="/frontend/assets/home_banner_triple_image_2ed63.jpg?1745557375056" alt="Ph&#242;ng ngủ tối giản với c&#225;c đường n&#233;t hiện đại" title="Ph&#242;ng ngủ tối giản với c&#225;c đường n&#233;t hiện đại">--}}
{{--                                </picture>--}}
{{--                            </a>--}}
{{--                            <a href="collections/all.html" title="Khám phá ngay " class="home-banner-trple-button primary-btn">--}}
{{--                                <span class="m-reset limit-line oneline">Khám phá ngay</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="home-banner-triple-item">--}}
{{--                        <div class="home-banner-triple-item-container">--}}
{{--                            <a href="collections/all.html" aria-label="Đồ d&#249;ng tiện lợi" title="Đồ d&#249;ng tiện lợi" class="">--}}
{{--                                <picture>--}}
{{--                                    <img class="" loading="lazy" decoding="async" fetchpriority="low"--}}
{{--                                         width="800" height="800" src="/frontend/assets/home_banner_triple_image_3ed63.jpg?1745557375056" alt="Đồ d&#249;ng tiện lợi" title="Đồ d&#249;ng tiện lợi">--}}
{{--                                </picture>--}}
{{--                            </a>--}}
{{--                            <a href="collections/all.html" title="Khám phá ngay " class="home-banner-trple-button primary-btn">--}}
{{--                                <span class="m-reset limit-line oneline">Khám phá ngay</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </section>

    <style>
        .home-banner-triple-item-container {
            position: relative;
            overflow: hidden;
        }

        /* Ép ảnh full width + full height container, cắt/scale tự động */
        .home-banner-triple-item-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .home-banner-triple-item-container:hover img {
            transform: scale(1.1);
        }

    </style>


    <div class="home-banner-double section-distance" style='margin-top: 50px'>
        <div class="d-flex-vertical d-flex-center layout-gap-0.5unit  home-custom-header  ">
            <h2 class="m-reset f-size-6 f-superbold limit-line threeline f-center text-primary-color">Dự án của chúng tôi</h2>
            <div class='home-custom-header-flex'>
            </div>
            <div class="home-custom-header-flex d-flex-vertical d-flex-center">
                <a class="m-reset f-size-3 limit-line fiveline f-center home-custom-extra-header" href="#" title="Xem tất cả ">Xem tất cả</a>

            </div>
        </div>

        <!-- Slider wrapper -->
        <div class="home-banner-double-slider owl-carousel owl-theme">
            @foreach ($project as $item)
                @php
                    $img = json_decode($item->images);
                @endphp
                <div class="home-banner-double-item-container">
                    <picture>
                        <img src="{{ $img[0] }}"
                             alt="{{ $item->name }}">
                    </picture>
                    <div class="slide-content">
                        <div class="text-wrapper">
                            <h2>{{ $item->name }}</h2>
                            <p>{!! languageName($item->description) !!}</p>
                        </div>
                        <div class="btn-wrapper">
                            <a href="{{ route('duanTieuBieuDetail', $item->slug) }}"
                               class="btn-detail">
                                Chi Tiết
                            </a>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>

        <style>
            /* Slider chính */
            .home-banner-double-slider .owl-stage { display: flex; }
            .home-banner-double-slider .owl-item { width: 100%; }

            /* Mỗi slide */
            .home-banner-double-item-container {
                position: relative;
                height: 600px;            /* điều chỉnh theo ý bạn */
                overflow: hidden;
            }

            /* Ảnh luôn cover toàn bộ container */
            .home-banner-double-item-container img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.6s ease;
            }
            .home-banner-double-item-container:hover img {
                transform: scale(1.05);
            }

            /* Lớp mờ tối phía trên ảnh */
            .fade-black-bg::before {
                /*content: '';*/
                position: absolute;
                inset: 0;
                background: rgb(0 0 0 / 63%);
                z-index: 1;
            }

            /* Nội dung chồng lên, trước layer mờ */
            .home-banner-double-item {
                position: absolute;
                top: 50%; left: 50%;
                transform: translate(-50%, -50%);
                z-index: 2;
                max-width: 70%;
                text-align: center;
                color: #fff;
            }

            /* Nút khám phá (dùng CSS bạn đã có) */
            .btn-detail {
                display: inline-block;
                padding: 0.6em 1.6em;
                background: linear-gradient(to bottom, #e23333, #ce0808);
                color: #fff;
                font-weight: 600;
                text-transform: uppercase;
                border-radius: 6px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.15);
                position: relative;
                overflow: hidden;
                transition: background 0.3s, transform 0.3s, box-shadow 0.3s;
            }
            .btn-detail::after {
                content: '';
                position: absolute;
                top:0; left:-100%;
                width:50%; height:100%;
                background:rgba(255,255,255,0.4);
                transform: skewX(-25deg);
                transition: left 0.6s ease;
            }
            .btn-detail:hover {
                background: linear-gradient(to bottom, #f25a5a, #d12b2b);
                transform: translateY(-2px);
                box-shadow: 0 6px 12px rgba(0,0,0,0.2);
            }
            .btn-detail:hover::after {
                left:200%;
            }
            .btn-detail:active {
                transform: translateY(0) scale(0.98);
                box-shadow: 0 3px 6px rgba(0,0,0,0.2);
            }

            /* Nav two side */
            .home-banner-double-slider .owl-nav button {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                background: rgba(0,0,0,0.5);
                border: none;
                padding: 1em;
                border-radius: 50%;
                color: #fff;
                z-index: 3;
            }
            .home-banner-double-slider .owl-nav .owl-prev { left: 1%; }
            .home-banner-double-slider .owl-nav .owl-next { right: 1%; }
            /* Ẩn dots nếu không cần */
            .home-banner-double-slider .owl-dots { display: none; }

        </style>

        <style>
            /* 1. Đặt slider làm relative để nav absolute bên trong */
            .home-banner-double-slider {
                position: relative;
            }

            /* 2. Đảm bảo owl-nav luôn hiển thị và chiếm full width */
            .home-banner-double-slider .owl-nav {
                position: absolute;
                top: 50%;
                left: 0; right: 0;
                display: flex !important;
                justify-content: space-between;
                transform: translateY(-50%);
                pointer-events: none; /* để chỉ nút có pointer-events */
            }

            /* 3. Style cho từng nút nav dạng chữ nhật dài */
            .home-banner-double-slider .owl-nav button {
                pointer-events: all;
                background: rgba(0,0,0,0.6);
                color: #fff;
                border: none;
                border-radius: 4px;
                width: 50px;      /* chiều rộng */
                height: 80px;     /* chiều cao */
                display: flex;
                align-items: center;
                justify-content: center;
                transition: background 0.3s;
            }
            .home-banner-double-slider .owl-nav button:hover {
                background: rgba(0,0,0,0.8);
            }

            /* 4. Cách ra biểu tượng mũi tên */
            .home-banner-double-slider .owl-nav .owl-prev i,
            .home-banner-double-slider .owl-nav .owl-next i {
                font-size: 1.5rem;
            }

            /* 5. Tùy chỉnh margin giữa slides */
            .home-banner-double-slider .owl-item {
                /* margin-right đã được set margin:30 trong JS */
            }

            /* 6. Ẩn dots (nếu cần) */
            .home-banner-double-slider .owl-dots {
                display: none;
            }

        </style>

        <style>
            /* 1) Kích hoạt lại pointer-events và show button */
            .home-banner-double-slider.owl-carousel .owl-nav button.owl-prev,
            .home-banner-double-slider.owl-carousel .owl-nav button.owl-next {
                pointer-events: all !important;
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
            }

            /* 2) Style dạng chữ nhật kéo dài */
            .home-banner-double-slider.owl-carousel .owl-nav button.owl-prev,
            .home-banner-double-slider.owl-carousel .owl-nav button.owl-next {
                background: rgba(0, 0, 0, 0.6) !important;
                color: #fff !important;
                width: 60px !important;       /* bạn chỉnh theo ý */
                height: 100px !important;     /* bạn chỉnh theo ý */
                border-radius: 4px !important;
                border: none !important;
                margin: 0 !important;
                padding: 0 !important;
                transition: background 0.3s ease, transform 0.3s ease;
            }

            /* 3) Vị trí 2 nút */
            .home-banner-double-slider.owl-carousel .owl-nav .owl-prev {
                left: 10px !important;
            }
            .home-banner-double-slider.owl-carousel .owl-nav .owl-next {
                right: 10px !important;
            }

            /* 4) Icon mũi tên bên trong */
            .home-banner-double-slider.owl-carousel .owl-nav button.owl-prev i,
            .home-banner-double-slider.owl-carousel .owl-nav button.owl-next i {
                font-size: 1.6rem !important;
            }

            /* 5) Hover hiệu ứng */
            .home-banner-double-slider.owl-carousel .owl-nav button.owl-prev:hover,
            .home-banner-double-slider.owl-carousel .owl-nav button.owl-next:hover {
                background: rgba(0, 0, 0, 0.8) !important;
                /*transform: translateY(-2px);*/
            }

            .custom-nav {
                font-size: 3rem;
                line-height: 1;
                color: #fff;
            }
        </style>

        <style>
            /* 1. Đặt owl-stage thành flex, bù nửa gap hai bên */
            .home-banner-double-slider.owl-carousel .owl-stage {
                display: flex !important;
                margin: 0 -5px !important;  /* -half-gap để bù về 2 cạnh */
            }

            /* 2. Mỗi item có padding giữa = half-gap */
            .home-banner-double-slider.owl-carousel .owl-item {
                padding: 0 5px !important;   /* tổng gap giữa items = 5px + 5px = 10px */
            }

            /* 3. Ẩn tràn ra ngoài */
            .home-banner-double-slider.owl-carousel .owl-stage-outer {
                overflow: hidden;
            }

        </style>

        <style>
            .home-banner-double-item-container {
                position: relative;
                overflow: hidden;
                height: 600px; /* hoặc chiều cao bạn đang dùng */
            }

            /* 2.1 Wrapper toàn bộ nội dung */
            .home-banner-double-item-container .slide-content {
                position: absolute;
                top: 0; left: 0;
                width: 100%; height: 100%;
            }

            /* 2.2 Center title + description */
            .home-banner-double-item-container .text-wrapper {
                position: absolute;
                top: 50%; left: 50%;
                transform: translate(-50%, -50%);
                max-width: 80%;
                text-align: center;
                color: #fff;
                font-size: 18px;
            }

            /* 2.3 Đặt nút cách đáy 30px, căn giữa */
            .home-banner-double-item-container .btn-wrapper {
                position: absolute;
                bottom: 30px;    /* khoảng cách từ đáy slide */
                left: 50%;
                transform: translateX(-50%);
                text-align: center;
            }

            /* 2.4 Style lại nút nếu cần */
            .btn-detail {
                display: inline-block;
                padding: 0.6em 1.6em;
                background: linear-gradient(to bottom, #e23333, #ce0808);
                color: #fff;
                font-weight: 600;
                text-transform: uppercase;
                border-radius: 6px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.15);
                overflow: hidden;
                transition: background .3s, transform .3s;
            }

            .btn-detail::after {
                content: '';
                position: absolute;
                top:0; left:-100%;
                width:50%; height:100%;
                background:rgba(255,255,255,0.4);
                transform: skewX(-25deg);
                transition: left .6s ease;
            }
            .btn-detail:hover {
                background: linear-gradient(to bottom, #f25a5a, #d12b2b);
                transform: translateY(-2px);
            }
            .btn-detail:hover::after {
                left:200%;
            }
            .btn-detail:active {
                transform: translateY(0) scale(.98);
            }

        </style>
    </div>

    <section class="home-blog section-distance">
        <div class="container">
            <div class="home-blog-wrap">
                <div class="d-flex-vertical d-flex-center layout-gap-0.5unit  home-custom-header">
                    <h2 class="m-reset f-size-6 f-superbold limit-line threeline f-center text-primary-color">Giải pháp của chúng tôi</h2>
                </div>
                <div class="home-blog-main">
                    <div class="home-blog-items">
                        @foreach ($giaiphap as $item)
                            <div class="home-blog-item">
                                <div class="article-item " data-index="2">
                                    <div class="article-item-wrap">
                                        <a href="{{ route('detailBlog', $item->slug) }}"
                                           class="article-item-image" title="Kinh nghiệm lựa chọn nội thất chung cư">
                                            <img loading="lazy" decoding="async" width="600" height="400"
                                                 src="{{ $item->image }}" alt="{!! languageName($item->title) !!}"
                                                 title="{!! languageName($item->title) !!}">
                                        </a>
                                        <div class="article-item-detail">
                                            <h3 class="article-item-detail-title"><a title="Kinh nghiệm lựa chọn nội thất chung cư" href="{{ route('detailBlog', $item->slug) }}">
                                                    {!! languageName($item->title) !!}</a>
                                            </h3>

                                            <a title="Xem thêm" href="{{ route('detailBlog', $item->slug) }}" class="article-item-detail-more" >Xem thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


    @foreach($bannerads as $bannerAd)
        <section class="home-banner-lg section-distance">

            <div class="home-banner-lg-wrapper">
                <div class="home-banner-lg-container animate need-cover-bg fade-black-bg">
                    <a href="{{ $bannerAd->link }}" aria-label="F1 Fashion Style" title="F1 Fashion Style" class="">
                        <picture>
                            <source width="1920" height="960" media="(min-width: 800px)" srcset="{{ $bannerAd->image }}">
                            <source width="800" height="800" media="(min-width: 0)" srcset="{{ $bannerAd->image }}">
                            <img class=""  loading="lazy" decoding="async" fetchpriority="low"
                                 width="1920" height="960" src="{{ $bannerAd->image }}" alt="F1 Fashion Style" title="F1 Fashion Style">
                        </picture>
                    </a>
                    <div class="home-banner-lg-item d-flex d-flex-center d-flex-vertical layout-gap-2unit">
                        <h2 class="w-text f-size-6 limit-line threeline f-bold m-reset">{{ $bannerAd->name }}</h2>
                        <p class="w-text f-size-3 limit-line fiveline m-reset">{{ $bannerAd->description }}</p>

                        <a href="{{ $bannerAd->link }}" title="Khám phá ngay " class="home-banner-lg-button primary-btn">
                            <span>Khám phá ngay</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @endforeach

    <style>
        :root {
            --brand: #f58321;
            --white: #fff;
            --dark: #333;
            --font: 'Segoe UI', sans-serif;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: var(--font);
            color: var(--dark);
        }

        .contact-section {
            padding: 40px 10px;
        }

        .contact-card {
            background: #ce0808;

            display: flex;
            align-items: stretch;        /* ép hai cột bằng chiều cao */
            max-width: 800px;
            margin: 0 auto;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 6px 18px rgba(0,0,0,0.2);

            height: 520px;
        }

        /* ==== Form Column ==== */
        .contact-form-wrapper {
            flex: none;
            width: 450px;
            padding: 20px;
            display: flex;
            flex-direction: column;

            height: 100%;
        }

        .contact-title {
            font-size: 1.6rem;
            color: var(--white);
            margin-bottom: 16px;
        }

        .contact-form {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .form-group {
            position: relative;
            margin-bottom: 16px;
        }

        .form-icon {
            position: absolute;
            top: 50%;
            left: 12px;
            transform: translateY(-50%);
            color: rgba(255,255,255,0.8);
            font-size: 1.1rem;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 12px 12px 12px 40px;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            background: var(--white);
            transition: box-shadow .3s;
        }

        .contact-form input:focus,
        .contact-form textarea:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(255,255,255,0.6);
        }

        .btn-submit {
            margin-top: auto;
            padding: 10px 24px;
            background: var(--white);
            font-weight: 600;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background .3s, transform .3s;
        }
        .btn-submit:hover {
            transform: translateY(-2px);
        }

        /* ==== Image Column ==== */
        .contact-image-wrapper {
            flex: none;
            width: 350px;
            overflow: hidden;
            position: relative;

            /* Chiều cao 100% theo .contact-card */
            height: 100%;
        }

        .contact-image-wrapper img {
            height: 100%;      /* luôn cao bằng form-wrapper */
            width: 100%;       /* giữ tỉ lệ */
            object-fit: cover;
            transition: transform .5s;
        }
        .contact-image-wrapper:hover img {
            transform: scale(1.05);
        }

        /* ==== Responsive ==== */
        @media (max-width: 768px) {
            .contact-card {
                flex-direction: column;
                max-width: 100%;
            }
            .contact-form-wrapper {
                width: 100%;
                padding: 20px;
            }
            .contact-image-wrapper {
                width: 100%;
                height: 300px;
            }
            .contact-image-wrapper img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
        }

    </style>



    <!-- HTML -->
    <section class="contact-section">
        <div class="contact-card">
            <!-- FORM -->
            <div class="contact-form-wrapper">
                <h2 class="contact-title">Yêu cầu tư vấn dịch vụ</h2>
                <form class="contact-form">
                    <div class="form-group">
                        <i class="fas fa-user form-icon"></i>
                        <input type="text" placeholder="Họ Tên" required>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-phone-alt form-icon"></i>
                        <input type="tel" placeholder="Số điện thoại" required>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-envelope form-icon"></i>
                        <input type="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-pencil-alt form-icon"></i>
                        <textarea placeholder="Nội dung..." rows="6" required></textarea>
                    </div>
                    <button type="submit" class="btn-submit">Gửi Yêu Cầu</button>
                </form>
            </div>
            <!-- IMAGE/INFO -->
            <div class="contact-image-wrapper">
                <img src="/frontend/assets/c2.png" alt="Sản phẩm mẫu">
            </div>
        </div>
    </section>



    <!-- ==== HTML ==== -->
    <!-- Chèn sau khi đã include jQuery + owl.carousel.min.css/js -->
    <section class="feedback-section">
        <div class="feedback-container">
            <!-- Phần tiêu đề bên trái -->
            <div class="feedback-header">
                <span class="feedback-tagline"><i class="fa fa-comments"></i> Review</span>
                <h2 class="feedback-title">
                    Khách Hàng Nói Gì Về <span>{{ $setting->company }}</span>
                </h2>
                <p class="feedback-subtitle">
                    Luôn đặt khách hàng làm trọng tâm, hiểu rõ nhu cầu của họ và cung cấp các dịch vụ vượt xa mong đợi, đảm bảo sự hài lòng tuyệt đối.
                </p>
            </div>

            <!-- Slider bên phải -->
            <div class="feedback-slider owl-carousel">
                <!-- Slide mẫu -->
                @foreach ($reviewcus as $item)
                    <div class="testimonial-item">
                        <div class="testimonial-bubble">
                            <p>
                                {!! languageName($item->content) !!}
                            </p>
                            <div class="star-rating">
                                <span class="star">★</span>
                                <span class="star">★</span>
                                <span class="star">★</span>
                                <span class="star">★</span>
                                <span class="star">★</span>
                            </div>
                            <div class="testimonial-badge">99</div>
                        </div>
                        <div class="testimonial-arrow"></div>
                        <div class="testimonial-footer">
                            <div class="testimonial-avatar">
                                <img style='max-width: 100px' src="{{ $item->avatar }}" alt="Avatar">
                            </div>
                            <div class="testimonial-info">
                                <h4>{{ languageName($item->name) }}</h4>
                                <span>{{ languageName($item->position) }}</span>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </section>


<style>
    .star-rating .star {
        color: #f4b400;
        margin-right: 4px;
        font-size: 1.3rem;
    }
    .feedback-section::before {
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        left: 0;
        top: 0;
        background-image: url(/frontend/assets/spe.png);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        opacity: .1;
        z-index: -1;
    }
    .feedback-section {
        background: rgb(0 0 0 / 63%);
        padding: 60px 20px;
    }

    .feedback-section {
        position: relative;
        overflow: hidden;
        z-index: 1;
    }
    .feedback-slider .owl-nav {
        display: none !important;
    }
    /* === Bao ngoài toàn section === */

    /*.feedback-section {*/
    /*    background: #004eb2;*/
    /*    padding: 60px 20px;*/
    /*    overflow: hidden;        !* ngăn slider tràn ra ngoài *!*/
    /*}*/

    /* === Container chia 2 cột: 35% / 65% === */
    .feedback-container {
        display: grid;
        grid-template-columns: 35% 65%;
        gap: 40px;
        max-width: 1200px;
        margin: 0 auto;
        align-items: start;
    }

    /* === Cột trái: header/text === */
    .feedback-header {
        grid-column: 1;
        color: white;
    }

    .testimonial-info {
        color: white;

    }

    /* Tagline */
    .feedback-tagline {
        display: inline-block;
        background: #ce0808;
        color: #fff;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.9rem;
        margin-bottom: 16px;
    }

    /* Title */
    .feedback-title {
        font-size: 2rem;
        line-height: 1.2;
        margin: 0 0 20px;
        white-space: normal;     /* cho phép xuống hàng tự nhiên */
    }

    /* Highlight phần <span> nếu có */
    .feedback-title span {
        color: #f58321;
    }

    /* Subtitle */
    .feedback-subtitle {
        font-size: 1rem;
        line-height: 1.6;
    }

    /* === Cột phải: slider === */
    .feedback-slider {
        grid-column: 2;
        position: relative;
        overflow: hidden;        /* ngăn slide tràn lề */
    }

    /* Giữ nav không chèn vào nội dung */
    .feedback-slider .owl-stage-outer {
        padding: 0 20px;
        overflow: hidden;
    }

    /* Flex container cho slides, gap giữa slides */
    .feedback-slider .owl-stage {
        display: flex !important;
        gap: 20px;
        margin: 0;               /* loại bỏ margin mặc định */
    }

    /* Mỗi slide full-width container phải */
    .testimonial-item {
        flex: 0 0 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        box-sizing: border-box;
    }

    /* === Bubble nội dung === */
    .testimonial-bubble {
        background: #fff;
        color: #333;
        border-radius: 12px;
        padding: 24px;
        width: 100%;
        max-width: none;         /* không giới hạn độ rộng */
        box-sizing: border-box;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        min-height: 200px;
    }

    .testimonial-bubble p {
        flex: 1;
        margin: 0 0 16px;
        font-style: italic;
        line-height: 1.6;
    }

    /* Badge và sao giữ nguyên vị trí tương đối */

    /* === Mũi tên trắng dưới bubble === */
    .testimonial-arrow {
        width: 0; height: 0;
        border-left: 16px solid transparent;
        border-right:16px solid transparent;
        border-top:16px solid #fff;
        margin-top: -1px;
    }

    /* === Footer avatar + tên === */
    .testimonial-footer {
        margin-top: 24px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    /* === Nav buttons === */
    .feedback-slider .owl-nav {
        position: absolute;
        top: 50%;
        left: 0; right: 0;
        display: none !important;
        justify-content: space-between;
        transform: translateY(-50%);
        pointer-events: none;
    }

    .feedback-slider .owl-nav button {
        pointer-events: all;
        background: rgba(0,0,0,0.5) !important;
        color: #fff !important;
        width: 48px; height: 48px;
        border-radius: 6px;
        font-size: 1.4rem;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.3s ease;
    }

    .feedback-slider .owl-nav button:hover {
        background: rgba(0,0,0,0.8) !important;
    }

    /* Ẩn dots nếu không cần */
    .feedback-slider .owl-dots {
        display: none !important;
    }

    /* === Responsive: mobile 1 cột === */
    @media (max-width: 767px) {
        .feedback-container {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        .feedback-slider,
        .feedback-header {
            grid-column: auto;
        }
    }

</style>

    <section class="home-vendor section-distance" style='margin-top: 60px'>
        <div class="d-flex-vertical d-flex-center layout-gap-0.5unit  home-custom-header">
            <h2 class="m-reset f-size-6 f-superbold limit-line threeline f-center text-primary-color">Đối tác</h2>
        </div>

        <div class="home-vendor-flex">
            <div class="home-vendor-list">
                @foreach ($partner as $item)
                    <div class="home-vendor-item">
                        <div class="home-vendor-container">
                            <a aria-label="" title="" class="">
                                <picture>
                                    <img class="" loading="lazy" decoding="async" fetchpriority="low"
                                         width="480" height="320" src="{{ $item->image }}" alt="" title="">
                                </picture>
                            </a>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </section>





@endsection
@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- Đảm bảo bạn đã import OwlCarousel JS & CSS trước -->

    <script>
        // 1) Hàm cân bằng chiều cao
        function equalizeSlideHeights() {
            var maxH = 0;
            var $items = $('.home-banner-triple-slider .owl-item .home-banner-triple-item-container');

            // Reset về auto để đo đúng
            $items.css('height', 'auto');

            // Tìm max
            $items.each(function() {
                maxH = Math.max(maxH, $(this).outerHeight());
            });

            // Gán lại height cho tất cả
            $items.height(maxH);
        }

        $(document).ready(function() {
            var $slider = $('.home-banner-triple-slider').owlCarousel({
                loop: true,
                margin: 20,
                nav: true,
                dots: true,
                smartSpeed: 500,
                responsive: {
                    0:   { items: 1 },
                    768: { items: 2 },
                    992: { items: 3 }
                },
                navText: [
                    '<span class="custom-nav prev">&lsaquo;</span>',
                    '<span class="custom-nav next">&rsaquo;</span>'
                ],
                // Sự kiện khi slider khởi tạo xong
                onInitialized: function() {
                    // Đợi 100ms để chắc đã render hoàn chỉnh
                    setTimeout(equalizeSlideHeights, 200);
                },
                // Sự kiện khi slider được refresh
                onRefreshed: equalizeSlideHeights
            });

            // Sau mỗi lần chuyển slide
            $slider.on('translated.owl.carousel', equalizeSlideHeights);

            // Và đừng quên đo lại khi window load (ảnh xong)
            $(window).on('load resize', equalizeSlideHeights);
        });
    </script>

    {{--    <script>--}}
{{--        // Hàm cân bằng chiều cao--}}
{{--        function equalizeSlideHeights() {--}}
{{--            var maxH = 0;--}}
{{--            // reset trước khi đo--}}
{{--            $('.home-banner-triple-slider .owl-item .home-banner-triple-item-container')--}}
{{--                .css('height', 'auto')--}}
{{--                .each(function() {--}}
{{--                    maxH = Math.max(maxH, $(this).outerHeight());--}}
{{--                });--}}
{{--            // gán chiều cao cao nhất cho tất cả--}}
{{--            $('.home-banner-triple-slider .owl-item .home-banner-triple-item-container')--}}
{{--                .height(maxH);--}}
{{--        }--}}

{{--        $(document).ready(function() {--}}
{{--            var $slider = $('.home-banner-triple-slider').owlCarousel({--}}
{{--                loop: true,--}}
{{--                margin: 20,--}}
{{--                nav: true,--}}
{{--                dots: true,--}}
{{--                smartSpeed: 500,--}}
{{--                responsive: {--}}
{{--                    0: { items: 1 },--}}
{{--                    768: { items: 2 },--}}
{{--                    992: { items: 3 }--}}
{{--                },--}}
{{--                navText: [--}}
{{--                    '<span class="custom-nav prev">&lsaquo;</span>',--}}
{{--                    '<span class="custom-nav next">&rsaquo;</span>'--}}
{{--                ],--}}
{{--                // gọi hàm sau khi slider khởi tạo xong và khi resize--}}
{{--                onInitialized: equalizeSlideHeights,--}}
{{--                onResized: equalizeSlideHeights--}}
{{--            });--}}

{{--            // và nếu cần, gọi thêm mỗi khi slider dịch chuyển--}}
{{--            $slider.on('translated.owl.carousel', equalizeSlideHeights);--}}
{{--        });--}}
{{--    </script>--}}

    <script>
        $(document).ready(function(){
            $('.home-banner-double-slider').owlCarousel({
                items: 3,
                loop: true,
                nav: true,
                dots: false,
                smartSpeed: 600,
                navText: [
                    '<span class="custom-nav prev">&lsaquo;</span>',
                    '<span class="custom-nav next">&rsaquo;</span>'
                ],
                responsive: {
                    0:   { items: 1 },
                    768: { items: 3 },
                    992: { items: 3 }
                }
            });
        });
    </script>

    <script>
        $(function(){
            // 1) Equalize chiều cao cho .article-item-detail
            function equalizeDetails() {
                var maxH = 0;
                $('.article-item-detail-title')
                    .css('height','auto')
                    .each(function(){
                        maxH = Math.max(maxH, $(this).outerHeight());
                    })
                    .height(maxH);
            }
            // 2) (Nếu cần) Equalize chiều cao cho toàn .home-blog-item
            function equalizeItems() {
                var maxH = 0;
                $('.home-blog-item')
                    .css('height','auto')
                    .each(function(){
                        maxH = Math.max(maxH, $(this).outerHeight());
                    })
                    .height(maxH);
            }
            // 3) Gọi cả hai
            function equalizeAll() {
                equalizeDetails();
                equalizeItems();
            }
            // 4) Thiết lập các event
            $(window).on('load resize orientationchange', equalizeAll);
            // 5) Và gọi ngay một lần cho chắc khi DOM ready
            equalizeAll();
        });
    </script>


    <script>
        // ==== JS ====
        // Khởi tạo slider sau khi DOM đã sẵn sàng
        $(document).ready(function(){
            $('.feedback-slider').owlCarousel({
                items: 1,
                loop: true,
                margin: 20,
                nav: false,
                dots: false,
                autoplay: true,
                smartSpeed: 600,

                responsive: {
                    0:   { items: 1 },
                    768: { items: 1 },
                    992: { items: 1 }
                }
            });
        });

    </script>
@endpush
