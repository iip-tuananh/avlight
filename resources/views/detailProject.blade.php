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
                    <li class="active">{{ $detail->name }} </li>
                </ul>
            </div>
        </div>
        <div class="blog-single py-80">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="blog-single-wrap">
                            <div class="blog-single-content">
                                
                                <div class="blog-info">
                                    <div class="blog-meta">
                                        <div class="blog-meta-left">
                                            <ul>
                                                <li><i class="far fa-user"></i><a href="#">Admin</a></li>
                                                <li><i
                                                        class="far fa-calendar"></i>{{ date_format($detail->created_at, 'd/m/Y') }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="blog-details service-details">
                                        <h1 class="blog-details-title mb-20 title-content">
                                            {{ $detail->name }}</h1>
                                        <div class="content">
                                            {!! languageName($detail->content) !!}
                                        </div>
                                        <div class="blog-thumb-img">
                                          @php
                                              $img =json_decode($detail->images)
                                          @endphp
                                          <div class="row">

                                      
                                          @foreach ($img as $im)
                                              <div class="col-md-6">
                                                 <img class="w-100 albumduan" src="{{$im}}" alt="thumb" >
                                              </div>
                                          @endforeach
                                       </div>
                                      </div>
                                    </div>
                                    <div class="blog-area pt-60">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-6 mx-auto">
                                                    <div class="site-heading text-center wow fadeInDown"
                                                        data-wow-delay=".25s">
                                                        <h2 class="site-title">Bài viết liên quan</h2>
                                                        <div class="heading-divider"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="blog-lq-slider owl-carousel">
                                                    @foreach ($prolq as $item)
                                                    @php
                                                        $imgs = json_decode($item->images);
                                                    @endphp
                                                        <div class="blog-item wow fadeInUp" data-wow-delay=".25s">
                                                            <div class="blog-item-img">
                                                                <a href="{{ route('duanTieuBieuDetail', $item->slug) }}">
                                                                    <img src="{{ $imgs[0] }}" alt="Thumb">
                                                                </a>
                                                            </div>
                                                            <div class="blog-item-info">
                                                                <div class="blog-item-meta">
                                                                    <ul>
                                                                        <li><a
                                                                                href="{{ route('duanTieuBieuDetail', $item->slug) }}"><i
                                                                                    class="far fa-user-circle"></i> By
                                                                                Admin</a></li>
                                                                        <li><a
                                                                                href="{{ route('duanTieuBieuDetail', $item->slug) }}"><i
                                                                                    class="far fa-calendar"></i>
                                                                                {{ date_format($item->created_at, 'd/m/Y') }}</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <h4 class="blog-title">
                                                                    <a
                                                                        href="{{ route('duanTieuBieuDetail', $item->slug) }}">{!!$item->name!!}</a>
                                                                </h4>
                                                                <p class="line_2">
                                                                  <div class="line-camp-2">


                                                                     {!! languageName($item->description) !!}
                                                                  </div>
                                                                </p>
                                                                <a class="theme-btn"
                                                                    href="{{ route('duanTieuBieuDetail', $item->slug) }}">Đọc
                                                                    tiếp<i class="fas fa-arrow-right"></i></a>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
             
                </div>
            </div>
        </div>
    </main>
@endsection
