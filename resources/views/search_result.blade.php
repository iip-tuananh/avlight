@extends('layouts.main.master')
@section('title')
    Kết quả tìm kiếm
@endsection
@section('description')
    @php

    @endphp
    Đã tìm thấy {{ $countproduct }} kết quả phù hợp cho từ khóa "{!! $keyword !!}"
@endsection
@section('image')
    {{ url('' . $setting->logo) }}
@endsection
@section('css')
    <style>
        .search_0 {
            color: var(--mainColor);
            font-size: 1.2rem
        }

        .b_search svg {
            max-height: 120px
        }

        .b_search svg .m_color {
            fill: var(--mainColor)
        }

        .t-search {
            font-size: 1rem
        }
    </style>
@endsection
@section('content')
    <div class="contentWarp ">

        <section class="search-layout">
            <div class="container rounded m_white_bg_module" style="min-height: 350px">
                <div class="category-products position-relative mt-4 mb-4 pt-3 pb-2 b_search">
                    <br>

                    <h2 class="h3 mb-3 t-search">Có {{ $countproduct }} kết quả tìm kiếm với từ khóa "<b
                            class="keyy">{{ $keyword }}</b>"</h2>
                    <br>
					<div class="row">
						<div class="product-tuan-slider owl-carousel">
						   @foreach ($resultPro as $item)
				  
						   @php
						   $img = json_decode($item['images']);
						   @endphp
						   <form action="{{ route('add.to.cart') }}" method="post" class="variants product-action" data-cart-form
							  data-id="{{ $item['id'] }}" enctype="multipart/form-data">
							  @csrf
							  <div class="blog-item wow fadeInUp tuanproduct" data-wow-delay=".25s">
								 <div class="blog-item-img">
									<a href="{{route('detailProduct',['cate'=>$item['cate_slug'],'type'=>$item['type_slug'] ? $item['type_slug'] : 'loai','id'=>$item['id']])}}">
									<img class="lazy" data-src="{{ $img[0] ?? 'default-image.jpg' }}" alt="Thumb">
									</a>
								 </div>
				  
								 {{-- ==================== --}}
								 <div class="blog-item-info" style="text-align: center">
								  
									<h4 class="blog-title">
									   <a class="line-camp-2 text-t" href="{{route('detailProduct',['cate'=>$item['cate_slug'],'type'=>$item['type_slug'] ? $item['type_slug'] : 'loai','id'=>$item['id']])}}">{!!languageName( $item['name'] )!!}</a>
									</h4>
									@if($item['price']>0)
										@if($item['discount'] > 0)
											<span
											class="special-price font-weight-bold" style="color: red; font-weight:700">{{ number_format($item['discount']) }}₫</span>
											&nbsp; &nbsp;
											<del class="old-price"> {{ number_format($item['price']) }}₫</del>
											<div class="theme-btn " style="background-color: rgb(197, 0, 0)">
											<button class="but1 themgio" data-id="{{ $item['id'] }}">Thêm vào giỏ hàng</i></button>
											</div>
										@else
											<span
											class="special-price font-weight-bold" style="color: red; font-weight:700">{{ number_format($item['price']) }}₫</span>
											<div class="theme-btn " style="background-color: rgb(197, 0, 0)">
												<button class="but1 themgio" data-id="{{ $item['id'] }}">Thêm vào giỏ hàng</i></button>
												</div>
										@endif
									@else
									<span
											class="special-price font-weight-bold" style="color: red; font-weight:700">Đang cập nhật</span>
											<div class="theme-btn " style="background-color:#025aa1">
												<button class="but2 ">Xem thêm </i></button>
												</div>
									@endif           
								 </div>
								 {{-- ================================== --}}
							  </div>
						   </form>
						   @endforeach
						</div>
					 </div>
					 {{-- <div class="row">
						<div class="col-lg-12 text-center">
						   <div class="pagination-area">
							  <ul class="pagination">
								{{ $phantrang->links() }}
							  </ul>
						   </div>
					 </div> --}}
        </section>
    </div>
    <style>
        .keyy {
            color: red;
            font-weight: bold;
            font-size: 1.5rem;
            margin-right: 5px;
            margin-left: 5px;
            cursor: pointer;
            transition: color 0.3s ease;
        }
		.pagi-tuan{
			width: 100%;
		}
    </style>
@endsection
