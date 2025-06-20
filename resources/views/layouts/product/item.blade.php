@php
    $img = json_decode($product->images);
@endphp

<div class="product-item" data-id="122987584{{ $product->id }}" data-handle="{{ languageName($product->name) }}">
    <div class="product-item-wrap">
        <div class="product-item-top">
            <div class="product-item-top-image">
                <a href="{{ route('detailProduct', ['cate' => $product->cate_slug ?? $product->cate->slug, 'type' => $product->type_slug ?? $product->typecate->slug, 'id' => $product->id]) }}"
                    class="product-item-top-image-showcase">
                    <img src="{{ is_array($img) ? $img[0] : '' }}" alt='{{ languageName($product->name) }}'
                        title='{{ languageName($product->name) }}' width="480" height="480" loading="lazy"
                        decoding="async">
                </a>
                <div style="height: 80px;">
                    <h3 class="text-center" style="line-height: 0.8;">
                        <a href="{{ route('detailProduct', ['cate' => $product->cate_slug ?? $product->cate->slug, 'type' => $product->type_slug ?? $product->typecate->slug, 'id' => $product->id]) }}"
                            title="{{ languageName($product->name) }}" aria-label="{{ languageName($product->name) }}" style="color: #000; font-size: 16px; font-weight: 600; line-height: 0.8;">
                            {{ languageName($product->name) }}</a>
                    </h3>
                    <div class="product-item-detail-price text-center" style="margin-bottom: 15px;">
                        @if ($product->price > 0)
                            <span>Giá bán: </span>
                            @if ($product->discount > 0)
                                <strong style="color: #FF0000;">{{ number_format($product->discount) }}₫</strong>
                                <del>{{ number_format($product->price) }}₫</del>
                            @else
                                <strong style="color: #FF0000;">{{ number_format($product->price) }}₫</strong>
                            @endif
                        @else
                            <a href="tel:{{str_replace(' ', '', $setting->phone1)}}" style="color: #FF0000;">Vui lòng liên hệ</a>
                        @endif
                    </div>
                </div>
            </div>
            @if ($product->price > 0 && $product->discount > 0)
                @php
                    $percent = (($product->price - $product->discount) / $product->price) * 100;
                @endphp
                <div class="product-item-label-sale"><span>-{{ round($percent, 2) }}%</span></div>
            @endif
        </div>
        <div class="product-item-detail">
            <div class="product-item-detail-flex">
                <a class="product-item-detail-vendor"
                    href="{{ route('detailProduct', ['cate' => $product->cate_slug ?? $product->cate->slug, 'type' => $product->type_slug ?? $product->typecate->slug, 'id' => $product->id]) }}"
                    title="{{ languageName($product->name) }}" aria-label="F1GENZ">
                    <span>{!! languageName($product->description) !!}</span>
                </a>
                <div class="sapo-product-reviews-badge" data-id="36799063"></div>
            </div>
            <h3 class="product-item-detail-title">
                <a href="{{ route('detailProduct', ['cate' => $product->cate_slug ?? $product->cate->slug, 'type' => $product->type_slug ?? $product->typecate->slug, 'id' => $product->id]) }}"
                    title="{{ languageName($product->name) }}" aria-label="{{ languageName($product->name) }}">
                    {{ languageName($product->name) }}</a>
            </h3>
            <div class="product-item-detail-price">
                @if ($product->price > 0)
                    @if ($product->discount > 0)
                        <strong>{{ number_format($product->discount) }}₫</strong>
                        <del>{{ number_format($product->price) }}₫</del>
                    @else
                        <strong>{{ number_format($product->price) }}₫</strong>
                    @endif
                @else
                    <strong>Đang cập nhật giá</strong>
                @endif
            </div>

            <div class="product-item-detail-gallery-items">

            </div>


            <div class="product-item-actions">
                @if ($product->price > 0)
                    <button type="button" title="Thêm vào giỏ" class="button-fstyle1"
                        onclick='addToCart({{ $product->id }})'><span>Thêm vào giỏ</span></button>
                @else
                    <a
                        href='{{ route('detailProduct', ['cate' => $product->cate_slug ?? $product->cate->slug, 'type' => $product->type_slug ?? $product->typecate->slug, 'id' => $product->id]) }}'>
                        <button type="button" title="Xem thêm" class="button-fstyle1"><span>Xem thêm</span></button>
                    </a>
                @endif
            </div>
        </div>



    </div>
</div>
