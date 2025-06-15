@extends('layouts.main.master')
@section('title')
    {{ languageName($product->name) }}
@endsection
@section('description')
    {{ languageName($product->description) }}
@endsection
@section('image')
    @php
        $img = json_decode($product->images);

        $thongso = json_decode($product->size);
    @endphp
    {{ url('' . $img[0]) }}
@endsection
@section('css')

@endsection
@section('js')

@endsection
@section('content')
    <div class="main-product style5">
        <div class="main-product-breadcrumb" title="Ghế trơn đen cao cấp">
            <div class="container">
                <div hidden class="section-title-all">
                    <h1>{!! languageName($product->name) !!}</h1>
                </div>
                <div class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" aria-label="Trang chủ" title="Trang chủ">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="tat-ca-san-pham.html" aria-label="Tất cả sản phẩm" title="Tất cả sản phẩm">Tất cả sản phẩm</a></li>
                        <li class="breadcrumb-item active"><span> {!! languageName($product->name) !!} </span></li>
                    </ol>
                </div>		</div>
        </div>
        <div class="main-product-feature-outside">
            <!-- Style 5 -->
            <div class="main-product-feature-thumbs" style="--item_in_row: 3">
                @foreach ($img as $index => $i)
                    <a data-fancybox="gallery"
                       href="{{ $i }}" aria-label="{!! languageName($product->name) !!}"
                       title="{!! languageName($product->name) !!}" data-index="{{ $index + 1 }}">
                        <picture>
                            <source width="480" height="480" media="(max-width: 480px)" srcset="{{ $i }}">
                            <source width="2048" height="2048" media="(min-width: 481px)" srcset="{{ $i }}">
                            <img class="w-auto" width="2048" height="2048" src="{{ $i }}" title="{!! languageName($product->name) !!}"
                                 alt="{!! languageName($product->name) !!}"
                                 loading="eager" decoding="sync" fetchpriority="high">
                        </picture>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="container">
            <!-- Flash Sale -->
            <!-- End Flash Sale -->
            <div class="main-product-wrap">
                <div class="main-product-left main-product-feature" data-style="style5">
                </div>
                <div class="main-product-right">
                    <h1 class="main-product-title ">{!! languageName($product->name) !!}p</h1>
                    <div class="main-product-info">
                        {!! languageName($product->description) !!}

                    </div>
                    @if ($product->price > 0)
                        @if($product->discount > 0)
                            <div class="main-product-price">
                                <div class="main-product-price-wrap">
                                    <del  class="main-product-price-compare">{{ number_format($product->price, 0, ',', '.') }}₫</del>

                                    <span class="main-product-price-this">{{ number_format($product->discount, 0, ',', '.') }}₫</span>

                                    @php
                                        $percent = ($product->price - $product->discount) / $product->price * 100;
                                    @endphp

                                    <span  class="main-product-price-discount">Tiết kiệm {{ round($percent, 2) }}%</span>
                                </div>
                                <div class="sapo-product-reviews-badge" data-id="36799044"></div>
                            </div>
                        @else
                            <div class="main-product-price">
                                <div class="main-product-price-wrap">
                                    <span class="main-product-price-this">{{ number_format($product->price, 0, ',', '.') }}₫</span>
                                </div>
                                <div class="sapo-product-reviews-badge" data-id="36799044"></div>
                            </div>
                        @endif

                    @else
                        <div class="main-product-price">
                            <div class="main-product-price-wrap">
                                <span class="main-product-price-this">Đang cập nhật giá</span>
                            </div>
                            <div class="sapo-product-reviews-badge" data-id="36799044"></div>
                        </div>
                    @endif

                    @if ($product->price > 0)
                        <div class="main-product-quantity shop-quantity-wrap">
                            <label>Số lượng</label>
                            <div class="shop-quantity">
                                <button type="button" data-type="shop-quantity-minus" title="Giảm">-</button>
                                <input type="number" name="quantity" value="1" min="1" readonly>
                                <button type="button" data-type="shop-quantity-plus" title="Tăng">+</button>
                            </div>
                        </div>
                    @endif


                    <div class="main-product-cta">
                        @if ($product->price > 0)
                        <button type="button" data-type="main-product-add" onclick='addToCart({{ $product->id }})' title="Thêm vào giỏ">
                            <strong>Thêm vào giỏ</strong>
                            <span>Chọn ngay sản phẩm bạn yêu thích</span>
                        </button>
                        @endif
                        <button type="button" data-type="main-product-send-help" title="Tư vấn">
                            <strong>Tư vấn</strong>
                            <span>Kết nối với chúng tôi để được tư vấn</span>
                        </button>
                        <button type="button" data-type="main-product-send-info" onclick="window.open('/lien-he.html')" title="Liên hệ">
                            <strong>Liên hệ</strong>
                            <span>Chúng tôi luôn bên bạn 24/7</span>
                        </button>
                    </div>


                    <div class="main-product-banner">

                    </div>

                    <div class="main-product-description inSidebar">
                        <div class="main-product-description-items">
                            <div class="main-product-description-item active" data-type="des">
                                <span class="main-product-description-item-head">Mô tả sản phẩm</span>
                                <div class="main-product-description-item-data-wrap">
                                    <div class="main-product-description-item-data">
                                        {!!languageName($product->content)!!}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="sapo-buyxgety-module-detail-v2"></div>
            <div id="sapo-product-reviews" class="sapo-product-reviews" data-id="36799044">
                <div id="sapo-product-reviews-noitem" style="display: none;">
                    <div class="content">
                        <p data-content-text="language.suggest_noitem"></p>
                        <div class="product-reviews-summary-actions">
                            <button type="button" class="btn-new-review" onclick="BPR.newReview(this); return false;" data-content-str="language.newreview"></button>
                        </div>
                        <div id="noitem-bpr-form_" data-id="formId" class="noitem-bpr-form" style="display:none;"><div class="sapo-product-reviews-form"></div></div>
                    </div>
                </div>

            </div>

            <div class="main-product-relate">
                <div class="section-title-all"><h2>Sản phẩm liên quan</h2></div>
                <div class="main-product-relate-data">
                    @foreach ($productlq as $item)
                        @include('layouts.product.item', ['product' => $item])
                    @endforeach


                </div>
            </div>



        </div>
    </div>
@endsection
