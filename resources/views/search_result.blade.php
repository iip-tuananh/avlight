{{-- filepath: resources/views/search_result.blade.php --}}
@extends('layouts.main.master')

@section('title')
    Kết quả tìm kiếm
@endsection

@section('css')
    <link rel="preload stylesheet" as="style" fetchpriority="low" href="/frontend/assets/search.scss.css">

@endsection

@section('content')
    <div class="main-search">
        <div class="main-search-breadcrumb">
            <div class="container">
                <div hidden="" class="section-title-all">
                    <h1>Tìm kiếm</h1>
                </div>
                <div class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" aria-label="Trang chủ" title="Trang chủ">Trang chủ</a></li>

                        <li class="breadcrumb-item"><span>Tìm kiếm</span></li>
                    </ol>
                </div>		</div>
        </div>
        <div class="main-search-wrap">
            <div class="container">
                <div class="main-search-data">
                    <div class="section-title-all">
                        <span>Có {{ $products->total() }} kết quả tìm kiếm với từ khóa  <strong>"{{ $keyword }}"</strong>.</span>
                    </div>
                    <div class="main-search-data-full">
                        @foreach($products as $item)
                                @include('layouts.product.item', ['product' => $item])
                        @endforeach

                        {{ $products->links('layouts.pagination.paginate') }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
