@extends('layouts.main.master')
@section('title')
{{languageName($blog_detail->title)}}
@endsection
@section('description')
{{languageName($blog_detail->description)}}
@endsection
@section('image')
{{url(''.$blog_detail->image)}}
@endsection
@section('css')
    <link rel="preload stylesheet" as="style" fetchpriority="low" href="/frontend/assets/article.scssed63.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

@endsection
@section('js')
@endsection
@section('content')
    <div class="main-article">
        <div class="main-article-breadcrumb" title="">
            <div class="container">
                <div class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" aria-label="Trang chủ" title="Trang chủ">Trang chủ</a></li>

                        <li class="breadcrumb-item active"><span>{{languageName($blog_detail->title)}}</span></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="main-article-menu sidebar">
                <label>Mục lục bài viết</label>
                <div class="main-article-menu-data"></div>
            </div>
            <div class="main-article-wrap">
                <div class="main-article-wrap-avatar">
                    <img loading="eager" decoding="sync" fetchpriority="high" width="600" height="400" class="w-auto"
                         src="{{$blog_detail->image}}"
                         alt="{{languageName($blog_detail->title)}}">
                </div>
                <h3>{{languageName($blog_detail->title)}}</h3>


                <div class="main-article-content" data-size="16" style="--share_font: 16px">
                    {!!languageName($blog_detail->content)!!}
                </div>


                <div class="related-posts container">
                    <h3 class="related-title">Bài viết Liên Quan</h3>
                    <div class="related-underline"></div>

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
                                @foreach ($bloglq as $item)
                                    <div class="swiper-slide">
                                        <div class="related-card">
                                            <img src="{{$item->image}}" alt="{{languageName($item->title)}}">
                                            <div class="related-card-body">
                                                <div class="related-meta">
                                                    <span><i class="fa fa-user"></i> admin </span>
                                                    <span><i class="fa fa-calendar"></i> {{ date_format($item->created_at, 'd/m/Y') }}</span>
                                                </div>
                                                <h4 class="related-card-title">{{languageName($item->title)}}</h4>
                                                <div class='related-excerpt'>
                                                    {{languageName($item->description)}}
                                                </div>

                                                <a href="{{route('detailBlog',['slug'=>$item->slug])}}" class="related-btn">Đọc Tiếp</a>
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
            <div class="main-article-right">

                <div class="main-article-right-newest">
                    <div class="section-title-all">
                        <span>Bài viết mới</span>
                    </div>

                    @foreach ($bloglq as $k => $item)
                        <div class="article-item layout-small" data-index="{{ $k + 1 }}">
                            <div class="article-item-wrap">
                                <a href="{{route('detailBlog',['slug'=>$item->slug])}}" class="article-item-image"
                                   title="{{languageName($item->title)}}">
                                    <img loading="lazy" decoding="async" width="600" height="400"
                                         src="{{ $item->image }}" alt="{{languageName($item->title)}}">
                                </a>
                                <div class="article-item-detail">
                                    <h3 class="article-item-detail-title"><a
                                            title="{{ $item->name }}"
                                            href="{{route('detailBlog',['slug'=>$item->slug])}}">{{languageName($item->title)}}</a></h3>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>


                <style>
                    /* Wrapper danh mục */
                    .category-list {
                        display: grid;
                        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                        gap: 12px 24px;        /* 12px dọc, 24px ngang */
                        margin: 24px 0;
                        padding: 0;
                        list-style: none;
                    }

                    /* Các link bên trong */
                    .category-list a {
                        display: flex;
                        align-items: center;
                        text-decoration: none;
                        background: #ffffff;
                        border: 1px solid #e0e0e0;
                        padding: 10px 12px;
                        border-radius: 4px;
                        color: #333333;
                        font-size: 0.95rem;
                        transition: background-color .2s, border-color .2s, transform .1s;
                    }

                    /* Icon mũi tên */
                    .category-list a i {
                        margin-right: 8px;
                        color: #007bff;
                        font-size: 1rem;
                    }

                    /* Hover hiệu ứng */
                    .category-list a:hover {
                        background-color: #f0f8ff;
                        border-color: #007bff;
                        transform: translateY(-2px);
                    }

                    /* Responsive nhỏ hơn 576px: 1 cột */
                    @media (max-width: 575px) {
                        .category-list {
                            grid-template-columns: 1fr;
                        }
                    }

                </style>

                <div class="main-article-right-newest">
                    <div class="section-title-all">
                        <span>Dịch vụ của chúng tôi</span>
                    </div>

                    <div class="category-list">
                        @foreach ($servicehome as $item)
                            <a href="{{ route('serviceDetail', ['slug' => $item->slug]) }}"><i class="far fa-arrow-right"></i>{{$item->name}}</a>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>

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
