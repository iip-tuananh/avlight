<header class="header">
    <div class="container">
        <div class="header-top">
            <div class="header-left">
                <a title="F1GENZ Smart Furniture" aria-label="F1GENZ Smart Furniture" href="{{ route('home') }}">
                    <img title="F1GENZ Smart Furniture"
                         src="{{ $setting->logo }}" alt="F1GENZ Smart Furniture">
                </a>
            </div>
            <div class="header-center">
                <form class="tool-search" action="#" id='searchForm'>
                    <input type="hidden" name="type" value="product">
                    <input required name="keywords" id="search-input" autocomplete="off" type="text" placeholder="Tìm kiếm sản phẩm...">
                    <button type="submit" title="Tìm kiếm"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 612.01 612.01" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M606.209,578.714L448.198,423.228C489.576,378.272,515,318.817,515,253.393C514.98,113.439,399.704,0,257.493,0 C115.282,0,0.006,113.439,0.006,253.393s115.276,253.393,257.487,253.393c61.445,0,117.801-21.253,162.068-56.586 l158.624,156.099c7.729,7.614,20.277,7.614,28.006,0C613.938,598.686,613.938,586.328,606.209,578.714z M257.493,467.8 c-120.326,0-217.869-95.993-217.869-214.407S137.167,38.986,257.493,38.986c120.327,0,217.869,95.993,217.869,214.407 S377.82,467.8,257.493,467.8z" fill="#" data-original="#" class=""></path></svg></button>
                    <button class="tool-search-overplay" title="Đóng"></button>
                    <div class="tool-search-smart"></div>
                </form>
            </div>
            <div class="header-right">
                <div class="header-right-phone">
                    <a href="tel:{{ str_replace(' ', '', $setting->phone1) }}" title="Gọi ngay {{ str_replace(' ', '', $setting->phone1) }}" aria-label="Gọi ngay 1800.67.50">
                        <svg style="fill:#4c4c4c" version="1.1" width="30" height="30" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 473.806 473.806" xml:space="preserve"><path d="M374.456,293.506c-9.7-10.1-21.4-15.5-33.8-15.5c-12.3,0-24.1,5.3-34.2,15.4l-31.6,31.5c-2.6-1.4-5.2-2.7-7.7-4
	c-3.6-1.8-7-3.5-9.9-5.3c-29.6-18.8-56.5-43.3-82.3-75c-12.5-15.8-20.9-29.1-27-42.6c8.2-7.5,15.8-15.3,23.2-22.8
	c2.8-2.8,5.6-5.7,8.4-8.5c21-21,21-48.2,0-69.2l-27.3-27.3c-3.1-3.1-6.3-6.3-9.3-9.5c-6-6.2-12.3-12.6-18.8-18.6
	c-9.7-9.6-21.3-14.7-33.5-14.7s-24,5.1-34,14.7c-0.1,0.1-0.1,0.1-0.2,0.2l-34,34.3c-12.8,12.8-20.1,28.4-21.7,46.5
	c-2.4,29.2,6.2,56.4,12.8,74.2c16.2,43.7,40.4,84.2,76.5,127.6c43.8,52.3,96.5,93.6,156.7,122.7c23,10.9,53.7,23.8,88,26
	c2.1,0.1,4.3,0.2,6.3,0.2c23.1,0,42.5-8.3,57.7-24.8c0.1-0.2,0.3-0.3,0.4-0.5c5.2-6.3,11.2-12,17.5-18.1c4.3-4.1,8.7-8.4,13-12.9
	c9.9-10.3,15.1-22.3,15.1-34.6c0-12.4-5.3-24.3-15.4-34.3L374.456,293.506z M410.256,398.806
	C410.156,398.806,410.156,398.906,410.256,398.806c-3.9,4.2-7.9,8-12.2,12.2c-6.5,6.2-13.1,12.7-19.3,20
	c-10.1,10.8-22,15.9-37.6,15.9c-1.5,0-3.1,0-4.6-0.1c-29.7-1.9-57.3-13.5-78-23.4c-56.6-27.4-106.3-66.3-147.6-115.6
	c-34.1-41.1-56.9-79.1-72-119.9c-9.3-24.9-12.7-44.3-11.2-62.6c1-11.7,5.5-21.4,13.8-29.7l34.1-34.1c4.9-4.6,10.1-7.1,15.2-7.1
	c6.3,0,11.4,3.8,14.6,7c0.1,0.1,0.2,0.2,0.3,0.3c6.1,5.7,11.9,11.6,18,17.9c3.1,3.2,6.3,6.4,9.5,9.7l27.3,27.3
	c10.6,10.6,10.6,20.4,0,31c-2.9,2.9-5.7,5.8-8.6,8.6c-8.4,8.6-16.4,16.6-25.1,24.4c-0.2,0.2-0.4,0.3-0.5,0.5
	c-8.6,8.6-7,17-5.2,22.7c0.1,0.3,0.2,0.6,0.3,0.9c7.1,17.2,17.1,33.4,32.3,52.7l0.1,0.1c27.6,34,56.7,60.5,88.8,80.8
	c4.1,2.6,8.3,4.7,12.3,6.7c3.6,1.8,7,3.5,9.9,5.3c0.4,0.2,0.8,0.5,1.2,0.7c3.4,1.7,6.6,2.5,9.9,2.5c8.3,0,13.5-5.2,15.2-6.9
	l34.2-34.2c3.4-3.4,8.8-7.5,15.1-7.5c6.2,0,11.3,3.9,14.4,7.3c0.1,0.1,0.1,0.1,0.2,0.2l55.1,55.1
	C420.456,377.706,420.456,388.206,410.256,398.806z"/><path d="M256.056,112.706c26.2,4.4,50,16.8,69,35.8s31.3,42.8,35.8,69c1.1,6.6,6.8,11.2,13.3,11.2c0.8,0,1.5-0.1,2.3-0.2
	c7.4-1.2,12.3-8.2,11.1-15.6c-5.4-31.7-20.4-60.6-43.3-83.5s-51.8-37.9-83.5-43.3c-7.4-1.2-14.3,3.7-15.6,11
	S248.656,111.506,256.056,112.706z"/><path d="M473.256,209.006c-8.9-52.2-33.5-99.7-71.3-137.5s-85.3-62.4-137.5-71.3c-7.3-1.3-14.2,3.7-15.5,11
	c-1.2,7.4,3.7,14.3,11.1,15.6c46.6,7.9,89.1,30,122.9,63.7c33.8,33.8,55.8,76.3,63.7,122.9c1.1,6.6,6.8,11.2,13.3,11.2
	c0.8,0,1.5-0.1,2.3-0.2C469.556,223.306,474.556,216.306,473.256,209.006z"/></svg>					</a>
                    <div class="header-right-phone-detail">
                        <span>Hotline 1</span>
                        <a href="tel:{{ str_replace(' ', '', $setting->phone1) }}"  title="Gọi ngay {{ str_replace(' ', '', $setting->phone1) }}" aria-label="Gọi ngay 1800.67.50">
                            {{ str_replace(' ', '', $setting->phone1) }}
                        </a>
                    </div>
                </div>
                <div class="header-right-phone">
                    <a href="tel:{{ str_replace(' ', '', $setting->phone2) }}" title="Gọi ngay {{ str_replace(' ', '', $setting->phone2) }}" aria-label="Gọi ngay {{ str_replace(' ', '', $setting->phone2) }}">
                        <svg style="fill:#4c4c4c" version="1.1" width="30" height="30" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 473.806 473.806" xml:space="preserve"><path d="M374.456,293.506c-9.7-10.1-21.4-15.5-33.8-15.5c-12.3,0-24.1,5.3-34.2,15.4l-31.6,31.5c-2.6-1.4-5.2-2.7-7.7-4
	c-3.6-1.8-7-3.5-9.9-5.3c-29.6-18.8-56.5-43.3-82.3-75c-12.5-15.8-20.9-29.1-27-42.6c8.2-7.5,15.8-15.3,23.2-22.8
	c2.8-2.8,5.6-5.7,8.4-8.5c21-21,21-48.2,0-69.2l-27.3-27.3c-3.1-3.1-6.3-6.3-9.3-9.5c-6-6.2-12.3-12.6-18.8-18.6
	c-9.7-9.6-21.3-14.7-33.5-14.7s-24,5.1-34,14.7c-0.1,0.1-0.1,0.1-0.2,0.2l-34,34.3c-12.8,12.8-20.1,28.4-21.7,46.5
	c-2.4,29.2,6.2,56.4,12.8,74.2c16.2,43.7,40.4,84.2,76.5,127.6c43.8,52.3,96.5,93.6,156.7,122.7c23,10.9,53.7,23.8,88,26
	c2.1,0.1,4.3,0.2,6.3,0.2c23.1,0,42.5-8.3,57.7-24.8c0.1-0.2,0.3-0.3,0.4-0.5c5.2-6.3,11.2-12,17.5-18.1c4.3-4.1,8.7-8.4,13-12.9
	c9.9-10.3,15.1-22.3,15.1-34.6c0-12.4-5.3-24.3-15.4-34.3L374.456,293.506z M410.256,398.806
	C410.156,398.806,410.156,398.906,410.256,398.806c-3.9,4.2-7.9,8-12.2,12.2c-6.5,6.2-13.1,12.7-19.3,20
	c-10.1,10.8-22,15.9-37.6,15.9c-1.5,0-3.1,0-4.6-0.1c-29.7-1.9-57.3-13.5-78-23.4c-56.6-27.4-106.3-66.3-147.6-115.6
	c-34.1-41.1-56.9-79.1-72-119.9c-9.3-24.9-12.7-44.3-11.2-62.6c1-11.7,5.5-21.4,13.8-29.7l34.1-34.1c4.9-4.6,10.1-7.1,15.2-7.1
	c6.3,0,11.4,3.8,14.6,7c0.1,0.1,0.2,0.2,0.3,0.3c6.1,5.7,11.9,11.6,18,17.9c3.1,3.2,6.3,6.4,9.5,9.7l27.3,27.3
	c10.6,10.6,10.6,20.4,0,31c-2.9,2.9-5.7,5.8-8.6,8.6c-8.4,8.6-16.4,16.6-25.1,24.4c-0.2,0.2-0.4,0.3-0.5,0.5
	c-8.6,8.6-7,17-5.2,22.7c0.1,0.3,0.2,0.6,0.3,0.9c7.1,17.2,17.1,33.4,32.3,52.7l0.1,0.1c27.6,34,56.7,60.5,88.8,80.8
	c4.1,2.6,8.3,4.7,12.3,6.7c3.6,1.8,7,3.5,9.9,5.3c0.4,0.2,0.8,0.5,1.2,0.7c3.4,1.7,6.6,2.5,9.9,2.5c8.3,0,13.5-5.2,15.2-6.9
	l34.2-34.2c3.4-3.4,8.8-7.5,15.1-7.5c6.2,0,11.3,3.9,14.4,7.3c0.1,0.1,0.1,0.1,0.2,0.2l55.1,55.1
	C420.456,377.706,420.456,388.206,410.256,398.806z"/><path d="M256.056,112.706c26.2,4.4,50,16.8,69,35.8s31.3,42.8,35.8,69c1.1,6.6,6.8,11.2,13.3,11.2c0.8,0,1.5-0.1,2.3-0.2
	c7.4-1.2,12.3-8.2,11.1-15.6c-5.4-31.7-20.4-60.6-43.3-83.5s-51.8-37.9-83.5-43.3c-7.4-1.2-14.3,3.7-15.6,11
	S248.656,111.506,256.056,112.706z"/><path d="M473.256,209.006c-8.9-52.2-33.5-99.7-71.3-137.5s-85.3-62.4-137.5-71.3c-7.3-1.3-14.2,3.7-15.5,11
	c-1.2,7.4,3.7,14.3,11.1,15.6c46.6,7.9,89.1,30,122.9,63.7c33.8,33.8,55.8,76.3,63.7,122.9c1.1,6.6,6.8,11.2,13.3,11.2
	c0.8,0,1.5-0.1,2.3-0.2C469.556,223.306,474.556,216.306,473.256,209.006z"/></svg>					</a>
                    <div class="header-right-phone-detail">
                        <span>Hotline 2</span>
                        <a href="tel:{{ str_replace(' ', '', $setting->phone2) }}"  title="Gọi ngay {{ str_replace(' ', '', $setting->phone2) }}" aria-label="Gọi ngay 1800.67.50">
                            {{ str_replace(' ', '', $setting->phone2) }}
                        </a>
                    </div>
                </div>

                @php $qty = 0 ; @endphp
                @foreach((array) session('cart') as $id => $details)
                    @php
                        $qty += $details['quantity'] ;
                    @endphp
                @endforeach

                <a href='{{ route('listCart') }}'>
                    <button class="shop-tool has-count" type="button" title="Giỏ hàng">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128" x="0" y="0" viewBox="0 0 459.361 459.361" style="enable-background: new 0 0 512 512" xml:space="preserve" class=""> <path d="M371.2,325.731c19.1-0.2,35.8-13.1,40.7-31.6l47.1-175.4c1.5-5.7-1.8-11.5-7.5-13.1c-0.9-0.2-1.8-0.4-2.7-0.4H94.5 l-24.1-89c-1.2-4.6-5.4-7.9-10.2-7.9H0v21.3h51.8l23.3,87c-0.1,0.7-0.1,1.4,0,2.1l48,176c0.3,1.4,0.8,2.9,1.3,4.3l16.2,59 c-15.6,8.3-26.2,24.7-26.2,43.6c0,27.3,22.1,49.4,49.4,49.4c27.3,0,49.4-22.1,49.4-49.4c0-8.5-2.2-16.6-6-23.6 c-0.9-1.6-1.8-3.2-2.9-4.8H330c-5.6,8-9,17.8-9,28.4c0,27.3,22.1,49.4,49.4,49.4s49.4-22.1,49.4-49.4c0-12.9-4.9-24.6-13-33.4 c-8.7-9.9-21.5-16.2-35.8-16.3H161.9l-7.5-27.5c3.2,0.8,6.5,1.3,9.8,1.3H371.2z M370.5,373.231c15.7,0,28.4,12.7,28.4,28.4 s-12.7,28.4-28.4,28.4c-15.7,0-28.4-12.7-28.4-28.4S354.8,373.231,370.5,373.231z M163.8,373.231c15.7,0,28.3,12.8,28.3,28.4 c0,15.7-12.7,28.4-28.4,28.4c-15.7,0-28.3-12.7-28.3-28.4S148.1,373.231,163.8,373.231z M144.8,290.931l-23.9-87.4l-21.3-76.8 h334.9l-43.3,162.6c-2.4,9.3-10.7,15.8-20.3,16H164C155.3,304.831,147.7,299.231,144.8,290.931z" fill="" data-original=""></path></svg>
                        <span class="shop-cart-count" id='cart-count'>{{ $qty }}</span>
                    </button>
                </a>


                <button class="shop-tool" type="button" data-type="shop-menu-mobile-header" title="Menu">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 384.97 384.97" style="enable-background:new 0 0 384.97 384.97;" xml:space="preserve"><g><path d="M12.03,84.212h360.909c6.641,0,12.03-5.39,12.03-12.03c0-6.641-5.39-12.03-12.03-12.03H12.03 C5.39,60.152,0,65.541,0,72.182C0,78.823,5.39,84.212,12.03,84.212z"></path><path d="M372.939,180.455H12.03c-6.641,0-12.03,5.39-12.03,12.03s5.39,12.03,12.03,12.03h360.909c6.641,0,12.03-5.39,12.03-12.03 S379.58,180.455,372.939,180.455z"></path><path d="M372.939,300.758H12.03c-6.641,0-12.03,5.39-12.03,12.03c0,6.641,5.39,12.03,12.03,12.03h360.909 c6.641,0,12.03-5.39,12.03-12.03C384.97,306.147,379.58,300.758,372.939,300.758z"></path></g></svg>
                </button>
            </div>
        </div>
    </div>
    <div class="header-menu" style='background-color: #f58321'>
        <div class="container">
            <style>
                .header-menu-sidebar > ul {
                    max-height: 300px;       /* hoặc height: 300px; tuỳ bạn */
                    overflow-y: auto;        /* bật scroll dọc khi quá cao */
                }

                /* 2. Tuỳ chỉnh thanh cuộn cho đẹp */
                .header-menu-sidebar > ul::-webkit-scrollbar {
                    width: 6px;
                }
                .header-menu-sidebar > ul::-webkit-scrollbar-thumb {
                    background: rgba(0,0,0,0.2);
                    border-radius: 3px;
                }
                .header-menu-sidebar > ul::-webkit-scrollbar-track {
                    background: rgba(0,0,0,0.05);
                }
            </style>
            <div class="header-menu-wrap">
                <div class="header-menu-left" style='color: #fff'>
                    <svg  version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 384.97 384.97" style="enable-background:new 0 0 384.97 384.97;" xml:space="preserve"><g><path d="M12.03,84.212h360.909c6.641,0,12.03-5.39,12.03-12.03c0-6.641-5.39-12.03-12.03-12.03H12.03 C5.39,60.152,0,65.541,0,72.182C0,78.823,5.39,84.212,12.03,84.212z"></path><path d="M372.939,180.455H12.03c-6.641,0-12.03,5.39-12.03,12.03s5.39,12.03,12.03,12.03h360.909c6.641,0,12.03-5.39,12.03-12.03 S379.58,180.455,372.939,180.455z"></path><path d="M372.939,300.758H12.03c-6.641,0-12.03,5.39-12.03,12.03c0,6.641,5.39,12.03,12.03,12.03h360.909 c6.641,0,12.03-5.39,12.03-12.03C384.97,306.147,379.58,300.758,372.939,300.758z"></path></g></svg>
                    <span>Danh mục sản phẩm</span>
                    <nav class="header-menu-sidebar">
                        <ul >
                            @foreach ($categoryhome as $item)
                                <li class="hasChild">
                                    <a data-href="{{ route('allListProCate', $item->slug) }}"
                                       onclick='event.preventDefault(); nextUrl(this);'
                                       title="{!! languageName($item->name) !!}"
                                       aria-label="{!! languageName($item->name) !!}">{!! languageName($item->name) !!}<span><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="14" height="14" x="0" y="0" viewBox="0 0 128 128" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M44 108a3.988 3.988 0 0 1-2.828-1.172 3.997 3.997 0 0 1 0-5.656L78.344 64 41.172 26.828c-1.563-1.563-1.563-4.094 0-5.656s4.094-1.563 5.656 0l40 40a3.997 3.997 0 0 1 0 5.656l-40 40A3.988 3.988 0 0 1 44 108z" fill="#fff" opacity="1" data-original="#fff" class=""></path></g></svg></span>
                                    </a>

                                    <ul class="menu1">
                                        @foreach ($item->typeCate as $type)
                                            <li class="{{ (isset($type->typetwo) && count($type->typetwo) > 0) ? 'hasChild' : '' }}">
                                                <a data-href="{{ route('allListType', ['danhmuc' => $type->cate_slug, 'loaidanhmuc' => $type->slug]) }}"
                                                   onclick='event.preventDefault(); nextUrl(this);'
                                                   title="{!! languageName($type->name) !!}" aria-label="{!! languageName($type->name) !!}">{!! languageName($type->name) !!}
                                                </a>
                                                @if (isset($type->typetwo) && count($type->typetwo) > 0)
                                                    <ul class="menu2">
                                                        @foreach ($type->typetwo as $child)
                                                            <li class="">
                                                                <a href="{{route('allListTypeTwo',['danhmuc'=>$item->slug,'loaidanhmuc'=>$type->slug,'thuonghieu'=>$child->slug])}}"
                                                                   title="{!! languageName($child->name) !!}" aria-label="{!! languageName($child->name) !!}">{!! languageName($child->name) !!}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach

{{--                                            <li class="{{ count($item->typeCate) > 0 ? 'hasChild' : '' }}">--}}
{{--                                                <a href="{{ route('allListProCate', $item->slug) }}" title="{!! languageName($item->name) !!}" aria-label="{!! languageName($item->name) !!}">{!! languageName($item->name) !!}--}}
{{--                                                </a>--}}
{{--                                                <ul class="menu2">--}}
{{--                                                    @foreach ($item->typeCate as $type)--}}
{{--                                                        <li class="{{ (isset($type->typetwo) && count($type->typetwo) > 0) ? 'hasChild' : '' }}">--}}
{{--                                                            <a href="{{ route('allListType', ['danhmuc' => $type->cate_slug, 'loaidanhmuc' => $type->slug]) }}" title="{!! languageName($type->name) !!}" aria-label="{!! languageName($type->name) !!}">{!! languageName($type->name) !!}--}}
{{--                                                            </a>--}}
{{--                                                            @if (isset($type->typetwo) && count($type->typetwo) > 0)--}}
{{--                                                                <ul class="menu3">--}}
{{--                                                                    @foreach ($type->typetwo as $child)--}}
{{--                                                                        <li class="">--}}
{{--                                                                            <a href="{{route('allListTypeTwo',['danhmuc'=>$item->slug,'loaidanhmuc'=>$type->slug,'thuonghieu'=>$child->slug])}}"--}}
{{--                                                                               title="{!! languageName($child->name) !!}" aria-label="{!! languageName($child->name) !!}">{!! languageName($child->name) !!}--}}
{{--                                                                            </a>--}}
{{--                                                                        </li>--}}
{{--                                                                    @endforeach--}}
{{--                                                                </ul>--}}
{{--                                                            @endif--}}
{{--                                                        </li>--}}
{{--                                                    @endforeach--}}
{{--                                                </ul>--}}
{{--                                            </li>--}}




                                    </ul>
                                </li>
                            @endforeach


                        </ul>
                    </nav>
                </div>

                <style>
                    .header-menu-horizontal > nav .menu0 > li > a {
                        position: relative;
                        /*color: #ffffff;*/
                        transition: color 0.3s ease;
                    }

                    .header-menu-horizontal > nav .menu0 > li > a::after {
                        content: '';
                        position: absolute;
                        left: 50%;
                        bottom: -4px;               /* cách đáy link một chút */
                        width: 0;
                        height: 2px;
                        background-color: #ffffff;
                        transition:
                            width 0.3s ease,
                            left 0.3s ease;
                    }


                    .header-menu-horizontal > nav .menu0 > li > a:hover::after {
                        width: 100%;
                        left: 0;
                    }

                    @media (min-width: 768px) {
                        .header-menu-horizontal > nav .menu0 > li > a:hover {
                            color: #ffffff;
                        }
                    }




                    /* 1. Thiết lập cơ bản cho các link trong .menu1 */
                    .header-menu-horizontal nav .menu0 > li .menu1 li a {
                        display: block;
                        padding: 0.75rem 1.25rem;
                        color: #ffffff;                            /* chữ xám khi bình thường */
                        background-color: transparent;             /* nền trong suốt */
                        border-left: 4px solid transparent;        /* chuẩn bị cho accent bar */
                        transition:
                            background-color 0.3s ease,
                            color 0.3s ease,
                            border-left-color 0.3s ease,
                            padding-left 0.3s ease;
                    }

                    /* 2. Hiệu ứng hover nhẹ nhàng */
                    .header-menu-horizontal nav .menu0 > li .menu1 li a:hover {
                        background-color: rgba(255, 152, 0, 0.1);  /* nền cam very-light */
                        color: #ffffff;                            /* chữ cam nổi bật */
                        border-left-color: #ff9800;                /* thanh accent bar bên trái */
                        padding-left: 1.5rem;                      /* đẩy text vào để có không gian accent */
                    }

                    /* 3. (Tuỳ chọn) Thêm box-shadow inset để “khoét” nhẹ */
                    .header-menu-horizontal nav .menu0 > li .menu1 li a:hover {
                        box-shadow: inset 0 0 8px rgba(0,0,0,0.05);
                    }

                </style>
                <div class="header-menu-center header-menu-horizontal">
                    <nav class="header-menu-horizontal-nav">
                        <ul class="menu0">
                            <li class="header-menu-horizontal-head">
                                <label>Danh mục</label>
                                <button type="button" data-type="close-menu-mobile" title="Đóng"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" x="0" y="0" viewBox="0 0 64 64" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><script></script><path xmlns="http://www.w3.org/2000/svg" d="m4.59 59.41a2 2 0 0 0 2.83 0l24.58-24.58 24.59 24.58a2 2 0 0 0 2.83-2.83l-24.59-24.58 24.58-24.59a2 2 0 0 0 -2.83-2.83l-24.58 24.59-24.59-24.58a2 2 0 0 0 -2.82 2.82l24.58 24.59-24.58 24.59a2 2 0 0 0 0 2.82z" fill="" data-original="" class=""></path></g></svg></button>
                            </li>
                            <li>
                                <a href="{{ route('home') }}" title="Trang chủ" aria-label="Trang chủ">Trang chủ</a>
                            </li>

                            <style>
                                .mobile-only {
                                    display: none;
                                }

                                /* Chỉ hiện trên mobile */
                                @media (max-width: 767px) {
                                    .mobile-only {
                                        display: block;   /* hoặc display: list-item tùy layout UL */
                                    }
                                }
                            </style>

                            <li class="">
                                <a href="{{ route('aboutUs') }}" title="Liên hệ" aria-label="Liên hệ">Giới thiệu</a>
                            </li>

                            <li class="hasChild mobile-only">
                                <a href="#" title="Sản phẩm" aria-label="Nhóm sản phẩm">Sản phẩm
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                             width="14" height="14" x="0" y="0" viewBox="0 0 128 128" style="enable-background:new 0 0 512 512"
                                             xml:space="preserve" class=""><g>
                                                <path d="M44 108a3.988 3.988 0 0 1-2.828-1.172 3.997 3.997 0 0 1 0-5.656L78.344 64 41.172 26.828c-1.563-1.563-1.563-4.094 0-5.656s4.094-1.563 5.656 0l40 40a3.997 3.997 0 0 1 0 5.656l-40 40A3.988 3.988 0 0 1 44 108z" fill="#" opacity="1" data-original="#fff" class=""></path>
                                            </g></svg>
                                    </span>
                                </a>
                                <ul class="menu1">
                                    @foreach ($categoryhome as $item)
                                        <li class="{{ count($item->typeCate) > 0 ? 'hasChild' : '' }}">
                                            <a href="{{ route('allListProCate', $item->slug) }}" title="{!! languageName($item->name) !!}" aria-label="{!! languageName($item->name) !!}">{!! languageName($item->name) !!}
                                            </a>
                                            <ul class="menu2">
                                                @foreach ($item->typeCate as $type)
                                                    <li class="{{ (isset($type->typetwo) && count($type->typetwo) > 0) ? 'hasChild' : '' }}">
                                                        <a href="{{ route('allListType', ['danhmuc' => $type->cate_slug, 'loaidanhmuc' => $type->slug]) }}" title="{!! languageName($type->name) !!}" aria-label="{!! languageName($type->name) !!}">{!! languageName($type->name) !!}
                                                        </a>
                                                        @if (isset($type->typetwo) && count($type->typetwo) > 0)
                                                            <ul class="menu3">
                                                                @foreach ($type->typetwo as $child)
                                                                    <li class="">
                                                                        <a href="{{route('allListTypeTwo',['danhmuc'=>$item->slug,'loaidanhmuc'=>$type->slug,'thuonghieu'=>$child->slug])}}"
                                                                           title="{!! languageName($child->name) !!}" aria-label="{!! languageName($child->name) !!}">{!! languageName($child->name) !!}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>

                            <li class="">
                                <a href="{{ route('duanTieuBieu') }}" title="" aria-label="">Dự Án</a>
                            </li>

                            <li class="hasChild">
                                <a href="#" title="" aria-label="">Hỗ trợ -
                                    Dịch vụ
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                             width="14" height="14" x="0" y="0" viewBox="0 0 128 128" style="enable-background:new 0 0 512 512"
                                             xml:space="preserve" class=""><g>
                                                <path d="M44 108a3.988 3.988 0 0 1-2.828-1.172 3.997 3.997 0 0 1 0-5.656L78.344 64 41.172 26.828c-1.563-1.563-1.563-4.094 0-5.656s4.094-1.563 5.656 0l40 40a3.997 3.997 0 0 1 0 5.656l-40 40A3.988 3.988 0 0 1 44 108z" fill="#fff" opacity="1" data-original="#fff" class=""></path>
                                            </g></svg>
                                    </span>
                                </a>
                                <ul class="menu1">

                                @foreach ($servicecate as $item)

                                        <li class="">
                                            <a href="{{ route('serviceCateList', $item->slug) }}"
                                               title="{{ ($item->name) }}" aria-label="{{ ($item->name) }}">
                                                {{ ($item->name) }}
                                            </a>
                                        </li>

                                @endforeach

                                </ul>
                            </li>

                            @foreach ($blogCate as $item)
                                <li class=" {{ count($item->typeCate) > 0 ? 'hasChild' : '' }}">
                                    <a href="{{ route('listCateBlog', ['slug' => $item->slug]) }}" title="" aria-label="">{{ languageName($item->name) }}
                                        <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                             width="14" height="14" x="0" y="0" viewBox="0 0 128 128" style="enable-background:new 0 0 512 512"
                                             xml:space="preserve" class=""><g>
                                                <path d="M44 108a3.988 3.988 0 0 1-2.828-1.172 3.997 3.997 0 0 1 0-5.656L78.344 64 41.172 26.828c-1.563-1.563-1.563-4.094 0-5.656s4.094-1.563 5.656 0l40 40a3.997 3.997 0 0 1 0 5.656l-40 40A3.988 3.988 0 0 1 44 108z" fill="#fff" opacity="1" data-original="#fff" class=""></path>
                                            </g></svg>
                                    </span>
                                    </a>
                                    @if (count($item->typeCate) > 0)
                                        <ul class="menu1">
                                            @foreach ($item->typeCate as $type)
                                                <li class="">
                                                    <a href="{{ route('listTypeBlog', ['slug' => $type->slug]) }}"
                                                       title="{!! languageName($type->name) !!}" aria-label="{!! languageName($type->name) !!}">{!! languageName($type->name) !!}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif

                                </li>
                            @endforeach
                            <li class="">
                                <a href="{{ route('contactUs') }}" title="Liên hệ" aria-label="Liên hệ">Liên hệ</a>
                            </li>

                            <li class="header-menu-horizontal-foot">
                                <div class="section-title-all">
                                    <span>Hổ trợ 24/7</span>
                                    <p>Đừng ngừng ngại liên hệ chúng tôi, hổ trợ 24/7 từ thứ 2 - thứ 7. Hotline: 1900.63.60.99</p>
                                </div>
                                <form id="mc-form3" action="https://gmail.us21.list-manage.com/subscribe/post?u=ddd0880c66f534593afa12e75&amp;id=fe6449bc79&amp;f_id=00cd9be1f0">
                                    <input aria-label="Địa chỉ Email" type="email" placeholder="Nhập email ưu đãi" name="EMAIL" required autocomplete="off">
                                    <button type="submit" title="Đăng ký nhận tin" name="subscribe">Đăng ký</button>
                                </form>
                                <ul class="shop-social">
                                    <li>
                                        <a href="collections/all.html" target="_blank" aria-label="F1GENZ Smart Furniture - Facebook" title="F1GENZ Smart Furniture - Facebook">
                                            <img width="30" height="30" loading="lazy" title="F1GENZ Smart Furniture - Facebook"
                                                 src="/frontend/assets/facebook__6__53aaa8d352524d3eb025af5203eaa437_icon.png" alt="F1GENZ Smart Furniture - Facebook">
                                        </a>
                                    </li>

                                    <li>
                                        <a href="collections/all.html" target="_blank" aria-label="F1GENZ Smart Furniture - Youtube" title="F1GENZ Smart Furniture - Youtube">
                                            <img width="30" height="30" loading="lazy" title="F1GENZ Smart Furniture - Youtube"
                                                 src="/frontend/assets/youtube__5__4f04522e10494557a651f53a33ad4d76_icon.png" alt="F1GENZ Smart Furniture - Youtube">
                                        </a>
                                    </li>

                                    <li>
                                        <a href="collections/all.html" target="_blank" aria-label="F1GENZ Smart Furniture - Pinterest" title="F1GENZ Smart Furniture - Pinterest">
                                            <img width="30" height="30" loading="lazy" title="F1GENZ Smart Furniture - Pinterest"
                                                 src="/frontend/assets/pinterest_a1a15995132a4275845412deba5f1193_icon.png" alt="F1GENZ Smart Furniture - Youtube">
                                        </a>
                                    </li>

                                    <li>
                                        <a href="collections/all.html" target="_blank" aria-label="F1GENZ Smart Furniture - TikTok" title="F1GENZ Smart Furniture - TikTok">
                                            <img width="30" height="30" loading="lazy" title="F1GENZ Smart Furniture - TikTok"
                                                 src="/frontend/assets/tik-tok_d85bb4e7468c43ac9ed5437649b7405c_icon.png" alt="F1GENZ Smart Furniture - TikTok">
                                        </a>
                                    </li>

                                    <li>
                                        <a href="collections/all.html" target="_blank" aria-label="F1GENZ Smart Furniture - Instagram" title="F1GENZ Smart Furniture - Instagram">
                                            <img width="30" height="30" loading="lazy" title="F1GENZ Smart Furniture - Instagram"
                                                 src="/frontend/assets/instagram__3__7de3ebbce1f24003b516ca6c1d7c24d5_icon.png" alt="F1GENZ Smart Furniture - Instagram">
                                        </a>
                                    </li>
                                </ul>		</li>
                        </ul>
                    </nav>
                    <div class="header-menu-arrow">
                        <button style="pointer-events: none;" type="button" class="header-menu-arrow-prev" title="Trước" data-action="prev"><i class="fa fa-chevron-left"></i></button>
                        <button type="button" class="header-menu-arrow-next" title="Sau" data-action="next"><i class="fa fa-chevron-right"></i></button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
