@extends('layouts.main.master')
@section('title')
    Giới thiệu về {{ $setting->company }}
@endsection
@section('description')
    {{ $setting->webname }}
@endsection
@section('css')
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    />
    <link
        rel="stylesheet"
        href="https://unpkg.com/swiper@8/swiper-bundle.min.css"
    />

    <style>
        .main-blog .main-blog-breadcrumb {
            padding: 10px 0;
            margin-bottom: 15px;
            background: #F9F9F9;
        }

        .site-title {
            text-align: center;
            font-weight: 700;
            text-transform: capitalize;
            font-size: 27px;
            color: #ce0808;
            margin-bottom: 0;
        }
    </style>
@endsection
@section('js')
@endsection
@section('content')
    <div class="main-blog" data-blog-id="671407">
        <div class="main-blog-breadcrumb" title="Tin tức">
            <div class="container">
                <div class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" aria-label="Trang chủ" title="Trang chủ">Trang chủ</a></li>

                        <li class="breadcrumb-item active"><span>Về chúng tôi</span></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="main-blog-wrap">
                <style>
                    .related-title {
                        text-align: center;
                        font-size: 1.75rem;
                        margin-bottom: 8px;
                    }
                    .related-underline {
                        width: 60px;
                        height: 4px;
                        background: #ce0808;
                        margin: 0 auto 24px;
                        position: relative;
                    }
                    .related-underline::after {
                        content: '';
                        width: 20px;
                        height: 4px;
                        background: #ce0808;
                        position: absolute;
                        top: 0;
                        right: -30px;
                    }
                </style>
                <div class="main-blog-left" >
                    <h3 class="related-title">Về chúng tôi</h3>
                    <h4 class="site-title">{{ $setting->company }}</h4>
                    <div class="main-blog-left-data" style='margin-top: 20px'>
                        {!! $gioithieu->content !!}

                    </div>
                </div>
            </div>
        </div>

        <section class="feedback-section" style='margin-top: 50px'>
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




        <section class="team-section">
            <h2 class="team-section__title">
                Đội Ngũ <span>Nhân Sự</span>
            </h2>

            <div class="swiper team-swiper">
                <div class="swiper-wrapper">
                    @foreach ($founder as $item)
                        <div class="swiper-slide">
                        <div class="team-card">
                            <img src="{{ $item->image }}" alt="{{ $item->name }}">
                            <div class="team-card__body">
                                <h3 class="team-card__name">{{ $item->name }}</h3>
                                <p class="team-card__role">{{ $item->position }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Navigation -->
{{--                <div class="swiper-button-prev"></div>--}}
{{--                <div class="swiper-button-next"></div>--}}
                <!-- (tuỳ chọn) Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </section>

        <style>
            /* ===== Team Section ===== */
            .team-section {
                padding: 60px 20px;
                text-align: center;
                background: #fff;
            }
            .team-section__title {
                font-size: 2rem;
                margin-bottom: 16px;
                color: #005bbf;
            }
            .team-section__title span {
                color: #ce0808;
            }
            .team-section__title + .team-section__title-underline {
                height: 4px;
                width: 60px;
                background: #f7941e;
                margin: 0 auto 40px;
            }

            /* ===== Swiper Overrides ===== */
            .team-swiper {
                position: relative;
                padding-bottom: 40px; /* cho pagination/arrow */
            }
            .team-swiper .swiper-button-prev,
            .team-swiper .swiper-button-next {
                color: #f7941e;
            }
            .team-swiper .swiper-pagination-bullet {
                background: #ccc;
                opacity: 1;
            }
            .team-swiper .swiper-pagination-bullet-active {
                background: #f7941e;
            }

            /* ===== Team Card ===== */
            .team-card {
                background: #fff;
                border: 1px solid #eee;
                border-radius: 8px;
                overflow: hidden;
                text-align: center;
                box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            }
            .team-card img {
                display: block;
                width: 100%;
                height: auto;
                object-fit: cover;
            }
            .team-card__body {
                padding: 16px 12px;
            }
            .team-card__name {
                font-size: 1.1rem;
                margin: 8px 0 4px;
                color: #005bbf;
            }
            .team-card__role {
                font-size: 0.9rem;
                color: #f7941e;
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


    </div>
@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

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

    <script>
        const teamSwiper = new Swiper('.team-swiper', {
            loop: true,
            slidesPerView: 4,
            spaceBetween: 24,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                // khi width < 576px
                0: {
                    slidesPerView: 1,
                },
                // ≥ 576px
                576: {
                    slidesPerView: 2,
                },
                // ≥ 768px
                768: {
                    slidesPerView: 3,
                },
                // ≥ 992px
                992: {
                    slidesPerView: 4,
                }
            }
        });
    </script>

@endpush
