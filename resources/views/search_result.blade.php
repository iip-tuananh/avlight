{{-- filepath: resources/views/search_result.blade.php --}}
@extends('layouts.main.master')

@section('title')
    Kết quả tìm kiếm
@endsection

@section('css')
<style>
    .keyy { color: red; font-weight: bold; font-size: 1.5rem; margin: 0 5px; }
    .search_0 { color: var(--mainColor); font-size: 1.2rem }
    .t-search { font-size: 1rem }
</style>
@endsection

@section('content')
<div class="contentWarp">
    <section class="search-layout">
        <div class="container rounded m_white_bg_module" style="min-height: 350px">
            <div class="category-products position-relative mt-4 mb-4 pt-3 pb-2 b_search">
                <h2 class="h3 mb-3 t-search">
                   Có <span class="keyy">{{ $product->total() }}</span> Kết quả tìm kiếm với từ khóa "<span class="keyy">{{ $keyword }}</span>"
                </h2>
                <div class="row">
                    @forelse ($product as $item)
                        @php
                            $img = json_decode($item->images, true);
                        @endphp
                        <div class="col-lg-2 col-md-2 col-2 mb-4">
                            <div class="blog-item tuanproduct">
                                <div class="blog-item-img">
                                    <a href="{{ route('detailProduct',
									 ['cate' => $item->cate_slug ?? $item->cate->slug, 'type' => $item->typecate ?? $item->typecate->slug ?? 'loai', 'id' => $item->id]) }}">
                                        <img class="lazy img-fluid" data-src="{{ $img[0] ?? 'default-image.jpg' }}" alt="{{ $item->name }}">
                                    </a>
                                </div>
                                <div class="blog-item-info text-center">
                                    <h4 class="blog-title">
                                        <a class="line-camp-2 text-t" href="{{ route('detailProduct',
									 ['cate' => $item->cate_slug ?? $item->cate->slug, 'type' => $item->typecate ?? $item->typecate->slug ?? 'loai', 'id' => $item->id]) }}">
                                            {!! languageName($item->name) !!}
                                        </a>
                                    </h4>
                                    @if($item->price > 0)
                                        @if($item->discount > 0)
                                            <span class="special-price font-weight-bold" style="color: red;">{{ number_format($item->discount) }}₫</span>
                                            &nbsp;<del class="old-price">{{ number_format($item->price) }}₫</del>
                                            <div class="theme-btn" style="background-color: rgb(197, 0, 0)">
                                                <button class="but1 themgio" data-id="{{ $item->id }}">Thêm vào giỏ hàng</button>
                                            </div>
                                        @else
                                            <span class="special-price font-weight-bold" style="color: red;">{{ number_format($item->price) }}₫</span>
                                            <div class="theme-btn" style="background-color: rgb(197, 0, 0)">
                                                <button class="but1 themgio" data-id="{{ $item->id }}">Thêm vào giỏ hàng</button>
                                            </div>
                                        @endif
                                    @else
                                        <span class="special-price font-weight-bold" style="color: red;">Đang cập nhật</span>
                                        <div class="theme-btn" style="background-color:#025aa1">
                                            <a class="but2" href="{{ route('detailProduct',
									 ['cate' => $item->cate_slug ?? $item->cate->slug, 'type' => $item->typecate ?? $item->typecate->slug ?? 'loai', 'id' => $item->id]) }}">Xem thêm</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="search_0">Không tìm thấy sản phẩm phù hợp.</p>
                        </div>
                    @endforelse
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        {{ $product->appends(['keywordsearch' => $keyword])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection