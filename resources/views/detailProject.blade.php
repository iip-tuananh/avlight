@extends('layouts.main.master')
@section('title')
    {{ $detail->name }}
@endsection
@section('description')
    {{ $detail->description }}
@endsection
@section('image')
    @php
        $img = json_decode($detail->images);
    @endphp
    {{ $img[0] }}
@endsection
@section('css')
    <link rel="preload stylesheet" as="style" fetchpriority="low" href="/frontend/assets/blog-1.css?1745557375056">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <style>
        /* ========== Wrap chung ========== */
        .project-detail {
            margin: 40px 0;
            font-family: Arial, sans-serif;
        }

        /* ========== Tiêu đề & meta ========== */
        .project-title {
            font-size: 2rem;
            margin-bottom: 8px;
        }
        .project-meta {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 24px;
        }
        .project-meta .author,
        .project-meta .date {
            margin-right: 16px;
        }

        /* ========== Gallery ========== */
        .project-gallery {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 24px;
            position: relative; /* cho z-index nếu cần */
        }

        /* ----- Main slider ----- */
        .swiper-main {
            width: 100%;
            max-width: 1000px;    /* chỉnh max-width tùy ý */
            height: 600px;       /* chỉnh chiều cao tùy ý */
            margin: 0;
            position: relative;
            z-index: 1;
        }

        /* ----- Thumbnail slider ----- */
        .swiper-thumbs {
            width: 100%;
            max-width: 1000px;
            margin-top: 12px;    /* khoảng cách so với main-slider */
            box-sizing: border-box;
            z-index: 2;
        }
        .swiper-thumbs .swiper-wrapper {
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }
        .swiper-thumbs .swiper-slide {
            width: 80px;         /* bạn có thể tăng/giảm */
            height: 100px;
            margin-right: 8px;   /* khoảng cách giữa các thumb */
            opacity: 0.4;
            cursor: pointer;
        }
        .swiper-thumbs .swiper-slide-thumb-active {
            opacity: 1;
            border: 2px solid #607D8B;
        }
        .swiper-thumbs img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* ========== Description ========== */
        .project-description {
            clear: both;         /* đảm bảo không bị float hoặc z-index chèn lên */
            margin-top: 24px;    /* khoảng cách so với gallery */
            font-size: 1rem;
            line-height: 1.6;
            color: #333;
        }
        .project-description ul {
            list-style: disc inside;
            margin-left: 16px;
        }




        .project-detail .swiper-main {
            width: 100%;
            max-width: 1000px;    /* hoặc 90% container */
            height: 600px;
            margin: 0 auto;      /* căn giữa */
            overflow: hidden;    /* ẩn mọi thứ ngoài 1 slide */
        }

        .project-detail .swiper-main .swiper-wrapper {
            /* mặc định Swiper có overflow: hidden; rồi, nhưng thêm cho chắc */
        }

        .project-detail .swiper-main .swiper-slide {
            width: 100% !important;  /* mỗi slide lấp đầy container */
        }

        .project-detail .swiper-main img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }


        .swiper-button-prev,
        .swiper-button-next {
            background-image: none;   /* tắt icon background mặc định */
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px); /* cho Safari */
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: #fff;
            z-index: 10;
            transition: background 0.2s, transform 0.2s;
        }

        /* 2. Vị trí 2 nút */
        .swiper-button-prev {
            left: 10px;
        }
        .swiper-button-next {
            right: 10px;
        }

        /* 3. Thêm icon mũi tên bằng pseudo-element */
        .swiper-button-prev::after,
        .swiper-button-next::after {
            font-family: inherit;
            font-size: 22px;
            font-weight: bold;
            line-height: 1;
        }
        .swiper-button-prev::after { content: '‹'; }  /* hoặc '\2039' */
        .swiper-button-next::after { content: '›'; }  /* hoặc '\203A' */

        /* 4. Hiệu ứng hover/focus */
        .swiper-button-prev:hover,
        .swiper-button-next:hover,
        .swiper-button-prev:focus,
        .swiper-button-next:focus {
            background: rgba(255, 255, 255, 0.5);
            transform: translateY(-50%) scale(1.1);
        }
    </style>


@endsection
@section('js')
@endsection
@section('content')
    <div class="main-blog" data-blog-id="671407">
        <div class="main-blog-breadcrumb" title="Tin tức">
            <div class="container">
                <div hidden class="section-title-all">
                    <h1>Dự án</h1>
                </div>
                <div class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" aria-label="Trang chủ" title="Trang chủ">Trang chủ</a></li>


                        <li class="breadcrumb-item active"><span>Dự án của chúng tôi</span></li>
                    </ol>
                </div>		</div>
        </div>
        <div class="container">
            <!-- HTML -->
            <div class="project-detail">
                <!-- Tiêu đề và thông tin meta -->
                <h2 class="project-title">{{ $detail->name }}</h2>
                <div class="project-meta">
                    <span class="author"><i class="far fa-user"></i> admin</span>
                    <span class="date"><i class="far fa-calendar"></i> {{ date_format($detail->created_at, 'd/m/Y') }}</span>
                </div>

                <div class="project-gallery">
                    <!-- Main slider -->
                    @php
                        $img =json_decode($detail->images)
                    @endphp

                    <div class="swiper-container swiper-main">
                        <div class="swiper-wrapper">
                            @foreach ($img as $k => $im)
                                <div class="swiper-slide"><img src="{{ $im }}" alt="Ảnh {{ $k + 1 }}"></div>
                            @endforeach
                        </div>
                        <!-- Nếu muốn nút điều hướng -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>

                    <!-- Thumbnail slider -->
                    <div class="swiper-container swiper-thumbs">
                        <div class="swiper-wrapper">
                            @foreach ($img as $k => $im)
                                <div class="swiper-slide"><img src="{{ $im }}" alt="Thumb {{ $k + 1 }}"></div>
                            @endforeach
                        </div>
                    </div>
                </div>



                <!-- Mô tả dự án -->
                <div class="project-description">
                    {!! languageName($detail->content) !!}

                </div>
            </div>

            <style>
                /* === Wrapper & Tiêu đề === */
                .related-posts {
                    padding: 40px 0;
                }
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

                /* === Carousel wrapper === */
                .swiper-related-wrapper {
                    position: relative;
                }

                /* === Các slide cards === */
                .swiper-related {
                    overflow: hidden;
                }
                .swiper-related .swiper-slide {
                    width: 300px; /* chỉnh tuỳ ý */
                }
                .related-card {
                    background: #fff;
                    border-radius: 8px;
                    overflow: hidden;
                    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
                    display: flex;
                    flex-direction: column;
                }
                .related-card img {
                    width: 100%;
                    height: 180px;
                    object-fit: cover;
                }
                .related-card-body {
                    padding: 26px;
                    flex: 1;
                    display: flex;
                    flex-direction: column;
                }
                .related-meta {
                    font-size: 0.85rem;
                    color: #666;
                    margin-bottom: 8px;
                }
                .related-meta span {
                    margin-right: 16px;
                }
                .related-card-title {
                    font-size: 1.1rem;
                    margin-bottom: 12px;
                    color: #222;
                }

                .related-btn {
                    align-self: flex-start;
                    background: #ce0808;
                    color: #fff;
                    padding: 8px 16px;
                    border-radius: 4px;
                    text-decoration: none;
                    font-size: 0.9rem;
                }

                /* === Nút điều hướng === */
                .related-prev,
                .related-next {
                    position: absolute;
                    top: 50%;
                    transform: translateY(-50%);
                    background: #ce0808;
                    color: white;
                    width: 40px;
                    height: 40px;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    cursor: pointer;
                    z-index: 10;
                }
                .related-prev { left: -20px; }
                .related-next { right: -20px; }
                .related-prev i,
                .related-next i {
                    font-size: 1.2rem;
                }
                /*a:hover {*/
                /*    color: #fff !important;*/
                /*    text-decoration: underline;*/
                /*}*/
            </style>
            <div class="related-posts container">
                <h3 class="related-title">Dự án Liên Quan</h3>
                <div class="related-underline"></div>

                <style>
                    .related-excerpt {
                        font-size: 0.95rem;
                        color: #555;
                        margin-bottom: 15px;


                        display: -webkit-box;
                        -webkit-box-orient: vertical;
                        -webkit-line-clamp: 2 !important;
                        overflow: hidden;
                    }
                </style>
                <div class="swiper-related-wrapper">
                    <!-- Carousel chính -->
                    <div class="swiper-container swiper-related">
                        <div class="swiper-wrapper">
                            @foreach($prolq as $item)
                                @php
                                    $imgs = json_decode($item->images);
                                @endphp
                                <div class="swiper-slide">
                                    <div class="related-card">
                                        <img src="{{ $imgs[0] }}" alt="{!!$item->name!!}">
                                        <div class="related-card-body">
                                            <div class="related-meta">
                                                <span><i class="fa fa-user"></i> admin </span>
                                                <span><i class="fa fa-calendar"></i> {{ date_format($item->created_at, 'd/m/Y') }}</span>
                                            </div>
                                            <h4 class="related-card-title">{!!$item->name!!}</h4>
                                            <div class='related-excerpt'>
                                                {!! languageName($item->description) !!}
                                            </div>

                                            <a href="{{ route('duanTieuBieuDetail', $item->slug) }}" class="related-btn">Đọc Tiếp</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Nút điều hướng -->
                    <div class="related-prev"><i class="fa fa-chevron-left"></i></div>
                    <div class="related-next"><i class="fa fa-chevron-right"></i></div>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('script')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 1) Slider thumbnails
            var swiperThumbs = new Swiper('.swiper-thumbs', {
                spaceBetween: 8,
                slidesPerView: 4,
                watchSlidesProgress: true,
                watchSlidesVisibility: true,
                slideToClickedSlide: true,      // ← cực kỳ quan trọng
            });

            // 2) Slider chính
            var swiperMain = new Swiper('.swiper-main', {
                slidesPerView: 1,               // chỉ hiển thị 1 slide chính
                spaceBetween: 10,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                thumbs: {
                    swiper: swiperThumbs          // ← bind với thumbnail
                }
            });
        });



        document.addEventListener('DOMContentLoaded', function() {
            new Swiper('.swiper-related', {
                slidesPerView: 2,
                spaceBetween: 30,
                navigation: {
                    nextEl: '.related-next',
                    prevEl: '.related-prev',
                },
                breakpoints: {
                    // mobile
                    0: {
                        slidesPerView: 1,
                    },
                    // tablet trở lên
                    768: {
                        slidesPerView: 2,
                    }
                }
            });
        });



    </script>

    <script>
        // Debounce helper để tránh gọi quá nhiều lần khi resize
        function debounce(fn, delay) {
            let t;
            return function(...args) {
                clearTimeout(t);
                t = setTimeout(() => fn.apply(this, args), delay);
            };
        }

        function equalizeRelatedCardHeights() {
            // Lấy tất cả .related-card bên trong swiper-related
            const cards = document.querySelectorAll('.swiper-related .related-card');
            if (!cards.length) return;

            // Reset height trước
            cards.forEach(card => card.style.height = 'auto');

            // Tìm chiều cao lớn nhất
            let maxH = Array.from(cards).reduce((max, card) => {
                return Math.max(max, card.offsetHeight);
            }, 0);

            // Gán chiều cao bằng maxH cho tất cả
            cards.forEach(card => {
                card.style.height = maxH + 'px';
            });
        }

        // Chạy khi window load (sau khi ảnh + CSS + Swiper đã render xong)
        window.addEventListener('load', equalizeRelatedCardHeights);

        // Chạy lại khi resize với debounce
        window.addEventListener('resize', debounce(equalizeRelatedCardHeights, 200));
    </script>

@endpush
