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
@endsection
@section('js')
@endsection
@section('content')
    <main class="main">
        <!-- hero area -->
        <div class="hero-section">
            <div class="hero-slider owl-carousel">
                @foreach ($banner as $item)
                    <div class="hero-single" style="background-image: url({{ $item->image }});">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-md-12 col-lg-6">
                                    <div class="hero-content">
                                        <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                                            {!! $item->title !!}
                                        </h1>
                                        <p data-animation="fadeInLeft" data-delay=".75s">
                                            {!! $item->description !!}
                                        </p>
                                        <div class="hero-btn" data-animation="fadeInUp" data-delay="1s">
                                            <a href="{{ route('aboutUs') }}" class="theme-btn">Về chúng tôi<i
                                                    class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- hero area end -->
        <!-- about area -->
        <div class="about-area py-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about-left wow fadeInLeft" data-wow-delay=".25s">
                            <div class="about-img">
                                <div class="row g-0">
                                    @php
                                        $imggt = json_decode($gioithieu->image);
                                    @endphp
                                    @foreach ($imggt as $key => $item)
                                        <div class="col-4">
                                            <img class="img-{{ $key + 1 }} lazy"
                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                                data-src="{{ $item }}" alt="image">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="about-experience">
                                <h5>10<span>+</span></h5>
                                <p>Năm kinh nghiệm</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-right wow fadeInUp" data-wow-delay=".25s">
                            <div class="site-heading mb-3">
                                <span class="site-title-tagline"><i class="far fa-truck-container"></i> About Us</span>
                                <h2 class="site-title">{{ $setting->company }}</h2>
                            </div>
                            <div class="about-text line_6">{!! $gioithieu->content !!}
                            </div>
                            <a href="{{ route('aboutUs') }}" class="theme-btn">Xem Thêm Về Chúng Tôi<i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- about area end -->
        <!-- service area -->
        <div class="blog-area pb-80 pt-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <div class="site-heading text-center wow fadeInDown" data-wow-delay=".25s">
                            <span class="site-title-tagline"><i class="fas fa-truck-container"></i>Product</span>
                            <h2 class="site-title">Sản phẩm nổi bật</h2>
                            <div class="heading-divider"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product-tuan-slider owl-carousel">
                        @foreach ($sanphamnoibat as $item)
                            @php
                                $img = json_decode($item->images);
                            @endphp
                            <form action="{{ route('add.to.cart') }}" method="post" class="variants product-action"
                                data-cart-form data-id="{{ $item->id }}" enctype="multipart/form-data">
                                @csrf
                                <div class="blog-item wow fadeInUp tuanproduct" data-wow-delay=".25s">
                                    <div class="blog-item-img">
                                        <a
                                            href="{{ route('detailProduct', ['cate' => $item->cate->slug, 'type' => $item->typecate->slug ? $item->typecate->slug : 'loai', 'id' => $item->id]) }}">
                                            <img class="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                                data-src="{{ $img[0] ?? 'default-image.jpg' }}" alt="Thumb">
                                        </a>
                                    </div>
                                    <div class="blog-item-info" style="text-align: center">

                                        <h4 class="blog-title">
                                            <a class="line-camp-2 text-t"
                                                href="{{ route('detailProduct', ['cate' => $item->cate->slug, 'type' => $item->typecate->slug ? $item->typecate->slug : 'loai', 'id' => $item->id]) }}">{!! languageName($item->name) !!}</a>
                                        </h4>
                                        @if ($item->price > 0)
                                            @if ($item->discount > 0)
                                                <span class="special-price font-weight-bold"
                                                    style="color: red; font-weight:700">{{ number_format($item->discount) }}₫</span>
                                                &nbsp; &nbsp;
                                                <del class="old-price"> {{ number_format($item->price) }}₫</del>
                                                <div class="theme-btn " style="background-color: rgb(197, 0, 0)">
                                                    <button class="but1 themgio" data-id="{{ $item->id }}">Thêm vào giỏ
                                                        hàng</i></button>
                                                </div>
                                            @else
                                                <span class="special-price font-weight-bold"
                                                    style="color: red; font-weight:700">{{ number_format($item->price) }}₫</span>
                                                <div class="theme-btn " style="background-color: rgb(197, 0, 0)">
                                                    <button class="but1 themgio" data-id="{{ $item->id }}">Thêm vào giỏ
                                                        hàng</i></button>
                                                </div>
                                            @endif
                                        @else
                                            <span class="special-price font-weight-bold"
                                                style="color: red; font-weight:700">Đang cập nhật</span>
                                            <div class="theme-btn " style="background-color:#025aa1">
                                                <a href="{{ route('detailProduct', ['cate' => $item->cate->slug, 'type' => $item->typecate->slug ? $item->typecate->slug : 'loai', 'id' => $item->id]) }}"
                                                    class="but2 ">Xem thêm </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <style>

        </style>
        {{-- sản phẩm --}}
        <div class="service-area sa-2 sa-bg pt-80 pb-80">
            <div class="container">
                <div class="row g-4 align-items-center wow fadeInDown" data-wow-delay=".25s">
                    <div class="col-lg-6">
                        <div class="site-heading mb-0">
                            <span class="site-title-tagline"><i class="far fa-truck-container"></i> Our Services</span>
                            <h2 class="site-title text-white">Chúng tôi cung cấp các <span>dịch vụ</span></h2>
                        </div>
                    </div>
                </div>
                <div class="service-slider mt-4 owl-carousel">
                    @foreach ($servicecate as $key => $item)
                        <div class="service-item">
                            <span class="count">0{{ $key + 1 }}</span>
                            <div class="service-img">
                                <a href="{{ route('serviceCateList', ['slug' => $item->slug]) }}">
                                    <img class="lazy"
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                        data-src="{{ $item->image }}" alt="image">
                                </a>
                            </div>
                            <div class="service-content">
                                <div class="service-icon">
                                    <img class="lazy"
                                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                        data-src="{{ url('frontend/img/package.svg') }}" alt="image">
                                </div>
                                <div class="service-info">
                                    <h4 class="service-title">
                                        <a
                                            href="{{ route('serviceCateList', ['slug' => $item->slug]) }}">{{ $item->name }}</a>
                                    </h4>
                                    <p class="service-text line_3">
                                        {{ ($item->description) }}
                                    </p>
                                    <a href="{{ route('serviceCateList', ['slug' => $item->slug]) }}"
                                        class="theme-btn">Chi
                                        tiết<i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{-- dự án --}}
        <div class="blog-area pb-80 pt-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <div class="site-heading text-center wow fadeInDown" data-wow-delay=".25s">
                            <span class="site-title-tagline"><i class="fas fa-truck-container"></i>Our Projects</span>
                            <h2 class="site-title">Các dự án của chúng tôi</h2>
                            <div class="heading-divider"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="service-slider owl-carousel">
                        @foreach ($project as $item)
                            @php
                                $img = json_decode($item->images);
                            @endphp
                            <div class="blog-item wow fadeInUp" data-wow-delay=".25s">
                                <div class="blog-item-img">
                                    <a href="{{ route('duanTieuBieuDetail', $item->slug) }}">
                                        <img class="lazy tuan-cus duantuan"
                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                            data-src="{{ $img[0] }}" alt="Thumb">
                                    </a>
                                </div>
                                <div class="blog-item-info">
                                    <div class="blog-item-meta">
                                    </div>
                                    <h4 class="blog-title">
                                        <a href="{{ route('duanTieuBieuDetail', $item->slug) }}">{{ $item->name }}</a>
                                    </h4>
                                    <p class="line_2 ">
                                    <div class="line-camp-2">
                                        {!! languageName($item->description) !!}
                                    </div>
                                    </p>
                                    <a class="theme-btn" href="{{ route('duanTieuBieuDetail', $item->slug) }}">Chi Tiết<i
                                            class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        {{-- end dự án --}}
        <div class="portfolio-area py-80">
            <div class="pa-bg" style="background-image: url({{ env('AWS_R2_URL') }}/frontend/img/home-background.jpg);"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <div class="site-heading text-center">
                            <span class="site-title-tagline"><i class="far fa-truck-container"></i> Our Solutions</span>
                            <h2 class="site-title text-white">Giải Pháp Của Chúng Tôi</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="portfolio-slider owl-carousel">
                        @foreach ($giaiphap as $item)
                            <div class="portfolio-item">
                                <div class="portfolio-img">
                                    <a href="{{ route('detailBlog', $item->slug) }}">
                                        <img class="img-fluid lazy"
                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                            data-src="{{ $item->image }}" alt="image">
                                    </a>
                                </div>
                                <div class="portfolio-content">
                                    <div class="portfolio-info">
                                        <h4 class="text-center"><a href="{{ route('detailBlog', $item->slug) }}"
                                                class="line-camp-2">{!! languageName($item->title) !!}</a></h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- portfolio area end -->
        <div class="quote-area qa-negative py-80">
            <div class="container">
                <div class="quote-content">
                    <div class="row g-4">
                        <div class="col-lg-8">
                            <div class="quote-form">
                                <div class="quote-header">
                                    <h4>Yêu cầu tư vấn dịch vụ</h4>
                                </div>
                                <form id="commentform" action="{{ route('postcontact') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-icon">
                                                    <i class="far fa-user-tie"></i>
                                                    <input type="text" class="form-control" name="name"
                                                        placeholder="Họ Tên">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-icon">
                                                    <i class="far fa-phone"></i>
                                                    <input type="text" class="form-control" name="phone"
                                                        placeholder="Số điện thoại">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-icon">
                                                    <i class="far fa-envelope"></i>
                                                    <input type="email" class="form-control" name="email"
                                                        placeholder="Email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-icon">
                                                    <textarea class="form-control" name="mess" id="" rows="10" placeholder="Nhập nội dung"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <button type="submit" class="theme-btn"><span
                                                    class="loader ml-15 spin-icon"></span> Gửi yêu cầu</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="quote-img">
                                <img class="lazy lienheban"
                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                    data-src="{{ asset('frontend/img/amthanh.jpg') }}" alt="image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- testimonial-area -->
        <div class="testimonial-area ts-bg pt-80 pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="site-heading wow fadeInDown" data-wow-delay=".25s">
                            <span class="site-title-tagline"><i class="fas fa-truck-container"></i> Testimonials</span>
                            <h2 class="site-title text-white">Khách hàng nói gì về <span>{{ $setting->webname }}</span>
                            </h2>
                            <p class="text-white">
                                Luôn đặt khách hàng làm trọng tâm, hiểu rõ nhu cầu của họ và cung cấp các dịch vụ vượt xa
                                mong đợi, đảm bảo sự hài lòng tuyệt đối.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="testimonial-slider owl-carousel owl-theme wow fadeInUp" data-wow-delay=".25s">
                            @foreach ($reviewcus as $item)
                                <div class="testimonial-item">
                                    <div class="testimonial-quote">
                                        <span class="testimonial-quote-icon"><i class="fal fa-quote-right"></i></span>
                                        <div class="testimonial-shadow-icon">
                                            <img class="lazy"
                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                                data-src="{{ url('frontend/img/quote.svg') }}" alt="image">
                                        </div>
                                        <p>
                                            {!! languageName($item->content) !!}
                                        </p>
                                        <div class="testimonial-rate">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="testimonial-content">
                                        <div class="testimonial-author-img">
                                            <img class="lazy"
                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                                data-src="{{ $item->avatar }}" alt="image">
                                        </div>
                                        <div class="testimonial-author-info">
                                            <h4>{{ languageName($item->name) }}</h4>
                                            <p>{{ languageName($item->position) }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- blog-area -->
        <div class="blog-area pb-80 pt-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <div class="site-heading text-center wow fadeInDown" data-wow-delay=".25s">
                            <span class="site-title-tagline"><i class="fas fa-truck-container"></i> Our Blog</span>
                            <h2 class="site-title">Tin tức hoạt động</h2>
                            <div class="heading-divider"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="service-slider owl-carousel">
                        @foreach ($hotnews as $item)
                            <div class="blog-item wow fadeInUp" data-wow-delay=".25s">
                                <div class="blog-item-img">
                                    <a href="{{ route('detailBlog', ['slug' => $item->slug]) }}">
                                        <img class="lazy"
                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                            data-src="{{ $item->image }}" alt="Thumb">
                                    </a>
                                    <div class="blog-date">
                                        <strong>{{ date_format($item->created_at, 'd') }}</strong>
                                        <span>{{ date_format($item->created_at, 'M') }}</span>
                                    </div>
                                </div>
                                <div class="blog-item-info">
                                    <div class="blog-item-meta">
                                        <ul>
                                            <li><a href="{{ route('detailBlog', ['slug' => $item->slug]) }}"><i
                                                        class="far fa-user-circle"></i> By Admin</a></li>
                                        </ul>
                                    </div>
                                    <h4 class="blog-title">
                                        <a
                                            href="{{ route('detailBlog', ['slug' => $item->slug]) }}">{{ languageName($item->title) }}</a>
                                    </h4>
                                    <p class="line_2">
                                        {{ languageName($item->description) }}
                                    </p>
                                    <a class="theme-btn" href="{{ route('detailBlog', ['slug' => $item->slug]) }}">Đọc
                                        tiếp<i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- blog-area end -->
        <!-- partner area -->
        <div class="partner-area bg pt-60 pb-60">
            <div class="container pb-60">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <div class="site-heading text-center wow fadeInDown" data-wow-delay=".25s">
                            <h2 class="site-title">Đối tác</h2>
                            <div class="heading-divider"></div>
                        </div>
                    </div>
                </div>
                <div class="partner-wrapper partner-slider owl-carousel owl-theme">
                    @foreach ($partner as $item)
                        <img class="lazy"
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                            data-src="{{ $item->image }}" alt="thumb">
                    @endforeach
                </div>
            </div>
        </div>
        <!-- partner area end -->
    </main>
@endsection
