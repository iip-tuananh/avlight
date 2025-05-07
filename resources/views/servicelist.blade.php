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
    <style>
        .service-sidebar {
            position: sticky;
            top: 80px;
        }
    </style>
@endsection
@section('js')
@endsection
@section('content')
    <main class="main">

        <!-- breadcrumb -->
        <div class="site-breadcrumb" style="background: url({{ url('frontend/img/breadcrumb.jpg') }})">
            <div class="container">
                <ul class="breadcrumb-menu">
                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="active">{{ $cate->name }} </li>
                </ul>
            </div>
        </div>
        <div class="blog-area py-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <div class="site-heading text-center wow fadeInDown" data-wow-delay=".25s">
                            <span class="site-title-tagline"><i class="fas fa-truck-container"></i> Our Services</span>
                            <h2 class="site-title">{{ $cate->name }}</h2>
                            <div class="heading-divider"></div>
                        </div>
                    </div>
                </div>
                @if (count($listService) > 0)
                    <div class="row g-4">
                        @foreach ($listService as $item)
                            <div class="col-md-6 col-lg-4">
                                <div class="blog-item wow fadeInUp" data-wow-delay=".25s">
                                    <div class="blog-item-img">
                                        <a href="{{ route('serviceDetail', ['slug' => $item->slug]) }}">
                                            <img src="{{ $item->image }}" alt="Thumb">
                                        </a>
                                    </div>
                                    <div class="blog-item-info">
                                        <div class="blog-item-meta">
                                            <ul>
                                                <li><a href="{{ route('serviceDetail', ['slug' => $item->slug]) }}"><i
                                                            class="far fa-user-circle"></i> By Admin</a></li>
                                                <li><a href="{{ route('serviceDetail', ['slug' => $item->slug]) }}"><i
                                                            class="far fa-calendar"></i>
                                                        {{ date_format($item->created_at, 'd/m/Y') }}</a></li>
                                            </ul>
                                        </div>
                                        <h4 class="blog-title">
                                            <a
                                                href="{{ route('serviceDetail', ['slug' => $item->slug]) }}">{{ $item->name }}</a>
                                        </h4>
                                        <p class="line_2">
                                            {{ languageName($item->description) }}
                                        </p>
                                        <a class="theme-btn" href="{{ route('serviceDetail', ['slug' => $item->slug]) }}">Đọc
                                            tiếp<i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- pagination -->
                    <div class="pagination-area">
                        {{ $listService->links() }}
                    </div>
                @else
                    <h3>Nội dung đang cập nhật...</h3>
                @endif
                <!-- pagination end -->
            </div>
        </div>
    </main>
@endsection
