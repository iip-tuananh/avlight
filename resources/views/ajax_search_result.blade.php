
@forelse($products as $item)
@php
// dd($products);
      $img = json_decode($item->images, true);
@endphp
    <div class="search-result-item">
    <img src="{{ $img[0] ?? 'default-image.jpg' }}" alt="{{ $item->name }}">
    <div class="search-result-info">
        <div class="search-result-title">{!!languageName( $item->name) !!}</div>
        <div class="search-result-price"><a href="{{ route('detailProduct',
									 ['cate' => $item->cate_slug ?? $item->cate->slug, 'type' => $item->typecate ?? $item->typecate->slug ?? 'loai', 'id' => $item->id]) }}">Xem Thêm</a></div>
    </div>
</div>
@empty
    <div class="search-result-item">Không tìm thấy sản phẩm phù hợp.</div>
@endforelse