@extends('layouts.main.master')
@section('title')
    {{ $cate->name }}
@endsection
@section('description')
    {{ ($cate->description) }}
@endsection
@section('image')
    {{ url('' . $cate->image) }}
@endsection
@section('css')
    <link rel="preload stylesheet" as="style" fetchpriority="low" href="/frontend/assets/blog-1.css?1745557375056">
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

                        <li class="breadcrumb-item"><a href="#" aria-label="Dịch vụ" title="Dịch vụ">Dịch vụ</a></li>

                        <li class="breadcrumb-item active"><span>{{ $cate->name }}</span></li>
                    </ol>
                </div>		</div>
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



                    /* 1. Cho wrap toàn bộ card co dãn theo chiều dọc */
                    .article-item .article-item-wrap {
                        display: flex;
                        flex-direction: column;
                        height: 100%;           /* đã set chiều cao bằng JS rồi */
                    }

                    /* 2. Cho phần detail co dãn, xếp theo cột */
                    .article-item-detail {
                        flex: 1;                /* chiếm hết khoảng trống còn lại */
                        display: flex;
                        flex-direction: column;
                    }

                    /* 3. Phần content (tiêu đề, meta, excerpt) tự động co dãn */
                    .article-item-detail-content {
                        flex: 1;                /* chiếm hết không gian trên nút ”Xem thêm” */
                    }

                    /* 4. Đẩy nút “Xem thêm” xuống đáy */
                    .article-item-detail-more {
                        margin-top: auto;       /* nút sẽ luôn ở cuối .article-item-detail */
                        /* nếu muốn căn trái/căn giữa/căn phải thì thêm text-align hoặc align-self */
                    }

                </style>
                @if (count($listService) > 0)
                    <div class="main-blog-left">
                        <h3 class="related-title">{{ $cate->name }}</h3>
                        <div class="related-underline"></div>
                        <div class="main-blog-left-data">

                            @foreach ($listService as $item)
                                @php
                                    $img = json_decode($item->images);
                                @endphp
                                <div class="article-item " data-index="">
                                    <div class="article-item-wrap">
                                        <a href= "{{ route('serviceDetail', ['slug' => $item->slug]) }}" class="article-item-image"
                                           title="{{ $item->name }}">
                                            <img loading="lazy" decoding="async" width="600" height="400"
                                                 src="{{ $item->image }}"
                                                 alt="{{ $item->name }}" title="{{ $item->name }}">
                                        </a>
                                        <div class="article-item-detail">
                                            <h3 class="article-item-detail-title"><a title="{{ $item->name }}" href="{{ route('serviceDetail', ['slug' => $item->slug]) }}">
                                                    {{ $item->name }}</a></h3>
                                            <div class="article-item-detail-info">
                                                <span class="article-item-detail-info-date" style="color: rgb(160, 62, 44);"><i class="fal fa-calendar"></i> {{date_format($item->created_at,'d/m/Y')}}</span>
                                                <span class="article-item-detail-info-author" style="color: rgb(42, 161, 161);"><i class='fal fa-edit' ></i> admin</span>
                                            </div>
                                            <div class="article-item-detail-content">
                                                {{ languageName($item->description) }}
                                            </div>

                                            <a title="Xem thêm" href="{{ route('serviceDetail', ['slug' => $item->slug]) }}" class="article-item-detail-more" >Xem thêm</a>

                                        </div>
                                    </div>
                                </div>


                            @endforeach



                        </div>
                        {{ $listService->links('layouts.pagination.paginate') }}

                    </div>
                @else
                    <div class="main-blog-left">
                        <h3 class="related-title">{{ $cate->name }}</h3>
                        <div class="related-underline"></div>
                        <div class="main-blog-left-data">
                            <h3>Nội dung đang cập nhật...</h3>

                        </div>

                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('script')

    <script>

    </script>

@endpush
