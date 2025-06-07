@extends('layouts.main.master')
@section('title')
    {{ $title }}
@endsection
@section('description')
    Danh sách {{ $title }}
@endsection
@section('image')
    {{ url('' . $setting->logo) }}
@endsection
@section('js')
@endsection
@section('css')
@endsection
@section('content')
    <div class="main-collection" data-id="">
        <div title="Tất cả sản phẩm" class="main-collection-breadcrumb">
            <div class="container">
                <div class="section-title-all" hidden>
                    <!--<h1>Tất cả sản phẩm</h1>-->
                </div>
                <div class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" aria-label="Trang chủ" title="Trang chủ">Trang chủ</a></li>
                        <li class="breadcrumb-item active"><span>{{ $title }}</span></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container">
            {{--            <div class="main-collection-banner">--}}
            {{--                <img loading="eager" decoding="sync" fetchpriority="high" width="1920" height="640"--}}
            {{--                     src="/frontend/assets/main_collection_bannered63.jpg?1745557375056" alt="{{ $title }}"/>--}}
            {{--            </div>--}}
            <style>
                h2.m-reset.f-size-5.f-superbold {
                    position: relative;
                    display: inline-block;
                    padding-bottom: 0.5em;  /* khoảng cách giữa text và gạch */
                    margin-bottom: 0.5em;     /* khoảng cách với nội dung dưới */
                }

                /* 2. Vẽ gạch bằng pseudo-element */
                h2.m-reset.f-size-5.f-superbold::after {
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
            @if($productCategories->count())
                @foreach($productCategories as $productType)
                    <section class="home-product-new section-distance container">
                        <div class="d-flex-vertical d-flex-center layout-gap-0.5unit home-product-header home-custom-header">
                            <h2 class="m-reset f-size-5 f-superbold limit-line threeline f-center text-primary-color">{{languageName($productType->name)}}</h2>
                            <div class="home-custom-header-flex d-flex-vertical d-flex-center">
                                @if(@$hasTypeTwo && $hasTypeTwo)
                                    <a class="m-reset f-size-3 limit-line fiveline f-center home-custom-extra-header" style='color: #333333'
                                       href="{{route('allListTypeTwo',['danhmuc'=>$productType->cate_slug,'loaidanhmuc'=>$productType->type_slug,'thuonghieu'=>$productType->slug])}}"
                                       title="Xem tất cả">Xem tất cả</a>

                                @else
                                    <a style='color: #333333' class="m-reset f-size-3 limit-line fiveline f-center home-custom-extra-header" href="{{ route('allListType', ['danhmuc' => $productType->cate_slug, 'loaidanhmuc' => $productType->slug]) }}" title="Xem tất cả">Xem tất cả</a>

                                @endif
                            </div>
                        </div>
                        <div class="home-product-new-slider">
                            @foreach($productType->products as $product)
                                @php
                                    $img = json_decode($product->images);
                                @endphp

                                @include('layouts.product.item', ['product' => $product])

                            @endforeach
                        </div>
                    </section>
                @endforeach

            @endif
        </div>
    </div>
@endsection
