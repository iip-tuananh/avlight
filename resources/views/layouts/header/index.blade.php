<!-- header area -->
<header class="header">
    @php
        ini_set('memory_limit', '9999M');
    @endphp
    <!-- header top -->
    <div class="header-top">
        <div class="container">
            <div class="header-top-wrap">
                <div class="header-top-left">
                    <div class="header-top-list">
                        <ul>
                            <li></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header top end -->
    <!-- navbar -->
    <div class="main-navigation">
        <nav class="navbar navbar-expand-lg">
            <div class="container position-relative">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ $setting->logo }}" alt="logo">
                </a>
                <div class="mobile-menu-right">
                    <div class="mobile-menu-btn">
                        <button type="button" class="nav-right-link search-box-outer"><i
                                class="far fa-search"></i></button>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                        aria-label="Toggle navigation">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <a href="{{ route('home') }}" class="offcanvas-brand" id="offcanvasNavbarLabel">
                            <img src="{{ $setting->logo }}" alt="">
                        </a>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
                                class="far fa-xmark"></i></button>
                    </div>
                    <div class="offcanvas-body">
                        <!-- nav-right -->
                        <div class="nav-right">
                            <div class="header-top-right">
                                <div class="flexsearchuis d-lg-block d-none">
                                    <div class="searchmobileui">
                                        <form action="{{ route('search_result') }}" method="post">
                                            @csrf
                                            <div class="form-group d-flex" style="margin-bottom:0;">
                                                <input type="text" name="keywordsearch" class="form-control"
                                                    placeholder="Tìm kiếm sản phẩm..." required="">
                                                <button type="submit" class="buttonsearch"><i
                                                        class="far fa-search"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="ajax-search-result" style="display:none;position:absolute;z-index:999;width:100%;background:#fff;">
                                
                            </div>
                            <div class="header-action-hotline header-action-contact header-action-icon">
                                <a href="tel:{{ str_replace(' ', '', $setting->phone1) }}"
                                    class="header-action-hotline icon-state d-flex align-items-center"
                                    style="gap: 10px;">
                                    <span class="box-action-icon">
                                        <svg class="icon-svg svg-icon-hotline" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512" width="30" height="30">
                                            <g>
                                                <path
                                                    d="m123.832031 475.464844c39.558594 23.804687 84.789063 36.351562 131.261719 36.351562 140.824219 0 256.90625-114.914062 256.90625-255.910156 0-140.832031-115.917969-255.90625-256.90625-255.90625-140.558594 0-254.910156 114.800781-254.910156 255.90625 0 47.09375 12.550781 92.667969 36.351562 132.257812l-36.535156 123.835938zm-93.65625-219.558594c0-124.570312 100.898438-225.917969 224.917969-225.917969 125.121094 0 226.917969 101.347657 226.917969 225.917969 0 124.574219-101.796875 225.917969-226.917969 225.917969-43.054688 0-84.894531-12.195313-120.984375-35.273438l-5.765625-3.683593-83.988281 24.78125 24.777343-83.992188-3.683593-5.761719c-23.078125-36.097656-35.273438-78.277343-35.273438-121.988281zm0 0"
                                                    data-original="#000000" class="active-path"
                                                    data-old_color="#000000"></path>
                                                <path
                                                    d="m124.628906 208.753906c4.953125 26.011719 19.65625 76.042969 62.464844 118.851563 42.808594 42.808593 92.839844 57.515625 118.855469 62.46875 29.789062 5.671875 73.503906 6.527343 94.867187-14.835938l11.910156-11.910156c6.011719-6.011719 9.324219-14.007813 9.324219-22.511719s-3.3125-16.496094-9.324219-22.507812l-47.628906-47.628906c-6.015625-6.015626-14.007812-9.324219-22.511718-9.324219-8.503907 0-16.496094 3.308593-22.511719 9.324219l-11.90625 11.90625c-7.273438 7.273437-21.003907 7.304687-28.332031.089843l-47.507813-49.5c-.070313-.074219-.140625-.148437-.214844-.21875-7.285156-7.285156-7.285156-19.140625 0-26.425781l11.90625-11.90625c12.445313-12.445312 12.445313-32.582031 0-45.023438l-47.628906-47.628906c-12.410156-12.410156-32.605469-12.410156-45.019531 0l-11.90625 11.910156v-.003906c-17.050782 17.054688-22.734375 53.40625-14.835938 94.875zm36.042969-73.664062c12.5-12.214844 11.832031-12.449219 13.210937-12.449219.472657 0 .945313.179687 1.304688.539063 50.1875 50.457031 48.171875 47.492187 48.171875 48.9375 0 .503906-.183594.945312-.539063 1.304687l-11.910156 11.90625c-18.964844 18.964844-19.039062 49.664063-.121094 68.714844l47.535157 49.53125c.074219.070312.144531.144531.21875.21875 18.960937 18.960937 51.808593 19.023437 70.832031 0l11.90625-11.90625c.71875-.71875 1.890625-.71875 2.609375 0 50.1875 50.453125 48.171875 47.488281 48.171875 48.933593 0 .507813-.183594.945313-.539062 1.304688l-11.910157 11.90625c-8.160156 8.160156-34.152343 13.042969-68.054687 6.585938-22.625-4.3125-66.128906-17.085938-103.257813-54.214844-37.128906-37.128906-49.902343-80.632813-54.210937-103.257813-6.460938-33.902343-1.578125-59.898437 6.582031-68.054687zm0 0"
                                                    data-original="#000000" class="active-path"
                                                    data-old_color="#000000"></path>
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="box-action-text">
                                        <span class="text_name-title">Hotline:</span> <br>
                                        <span class="text_name">{{ $setting->phone1 }}</span>
                                    </span>
                                </a>
                            </div>
                            <div class="header-action-icon header-action_cart icon-state">
                                <div class="header-action_text">
                                    <a class="header-action__link header-action-toggle" href="javascript:void(0)"
                                        id="site-cart-handle" aria-label="Giỏ hàng" title="Giỏ hàng" style="display: flex; align-items: center; gap: 10px;">
                                        <span class="box-action-icon" style="position: relative;">
                                            <svg version="1.1" class="svg-ico-cart icon-svg" id="Capa_1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                width="30" height="30" viewBox="0 0 446.853 446.853"
                                                style="enable-background:new 0 0 446.853 446.853;" xml:space="preserve">
                                                <g>
                                                    <path d="M444.274,93.36c-2.558-3.666-6.674-5.932-11.145-6.123L155.942,75.289c-7.953-0.348-14.599,5.792-14.939,13.708
                                                        c-0.338,7.913,5.792,14.599,13.707,14.939l258.421,11.14L362.32,273.61H136.205L95.354,51.179
                                                        c-0.898-4.875-4.245-8.942-8.861-10.753L19.586,14.141c-7.374-2.887-15.695,0.735-18.591,8.1c-2.891,7.369,0.73,15.695,8.1,18.591
                                                        l59.491,23.371l41.572,226.335c1.253,6.804,7.183,11.746,14.104,11.746h6.896l-15.747,43.74c-1.318,3.664-0.775,7.733,1.468,10.916
                                                        c2.24,3.184,5.883,5.078,9.772,5.078h11.045c-6.844,7.617-11.045,17.646-11.045,28.675c0,23.718,19.299,43.012,43.012,43.012
                                                        s43.012-19.294,43.012-43.012c0-11.028-4.201-21.058-11.044-28.675h93.777c-6.847,7.617-11.047,17.646-11.047,28.675
                                                        c0,23.718,19.294,43.012,43.012,43.012c23.719,0,43.012-19.294,43.012-43.012c0-11.028-4.2-21.058-11.042-28.675h13.432
                                                        c6.6,0,11.948-5.349,11.948-11.947c0-6.6-5.349-11.948-11.948-11.948H143.651l12.902-35.843h216.221
                                                        c6.235,0,11.752-4.028,13.651-9.96l59.739-186.387C447.536,101.679,446.832,97.028,444.274,93.36z M169.664,409.814
                                                        c-10.543,0-19.117-8.573-19.117-19.116s8.574-19.117,19.117-19.117s19.116,8.574,19.116,19.117S180.207,409.814,169.664,409.814z
                                                        M327.373,409.814c-10.543,0-19.116-8.573-19.116-19.116s8.573-19.117,19.116-19.117s19.116,8.574,19.116,19.117
                                                        S337.916,409.814,327.373,409.814z"></path>
                                                </g>
                                            </svg>
                                            <span class="count-holder" style="position: absolute; top: -10px; right: -10px; background-color: var(--theme-color); color: #fff; border-radius: 50%; padding: 0 5px; font-size: 12px;">
                                                <span class="count">0</span>
                                            </span>
                                        </span>
                                        <span class="box-action-text">
                                            <span class="txtbl">Giỏ hàng</span><br>
                                            <span class="txtbl">của bạn</span>
                                        </span>
                                    </a>
                                </div>
                                {{-- <div class="header_dropdown_content">
                                    <span class="box-triangle">
                                        <svg viewBox="0 0 20 9" role="presentation">
                                            <path
                                                d="M.47108938 9c.2694725-.26871321.57077721-.56867841.90388257-.89986354C3.12384116 6.36134886 5.74788116 3.76338565 9.2467995.30653888c.4145057-.4095171 1.0844277-.40860098 1.4977971.00205122L19.4935156 9H.47108938z"
                                                fill="#ffffff"></path>
                                        </svg>
                                    </span>
                                    <div class="">
                                        <div class="site-cart">
                                            <div class="cart-ttbold">
                                                <p class="ttbold">Giỏ hàng</p>
                                            </div>
                                            <div class="cart-view clearfix">
                                                <div class="cart-view-scroll">
                                                    <table id="clone-item-cart" class="table-clone-cart">
                                                        <tbody>
                                                            <tr class="item_2 hidden">
                                                                <td class="img"><a href=""
                                                                        title=""><img src=""
                                                                            alt=""></a></td>
                                                                <td>
                                                                    <p class="pro-title">
                                                                        <a class="pro-title-view" href=""
                                                                            title=""></a>
                                                                        <span class="variant"></span>
                                                                    </p>
                                                                    <div class="mini-cart_quantity">
                                                                        <div class="pro-quantity-view"><span
                                                                                class="qty-value"></span></div>
                                                                        <div class="pro-price-view"></div>
                                                                    </div>
                                                                    <div class="remove_link remove-cart"></div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table id="cart-view">

                                                        <tbody>
                                                            <tr class="item-cart_empty">
                                                                <td>
                                                                    <div class="svgico-mini-cart">
                                                                        <svg width="81" height="70"
                                                                            viewBox="0 0 81 70">
                                                                            <g transform="translate(0 2)"
                                                                                stroke-width="4" stroke="#1e2d7d"
                                                                                fill="none" fill-rule="evenodd">
                                                                                <circle stroke-linecap="square"
                                                                                    cx="34" cy="60"
                                                                                    r="6"></circle>
                                                                                <circle stroke-linecap="square"
                                                                                    cx="67" cy="60"
                                                                                    r="6"></circle>
                                                                                <path
                                                                                    d="M22.9360352 15h54.8070373l-4.3391876 30H30.3387146L19.6676025 0H.99560547">
                                                                                </path>
                                                                            </g>
                                                                        </svg>
                                                                    </div>
                                                                    Hiện chưa có sản phẩm
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="line"></div>
                                                <div class="cart-view-total">
                                                    <table class="table-total">
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-left">TỔNG TIỀN:</td>
                                                                <td class="text-right" id="total-view-cart">0₫</td>
                                                            </tr>
                                                            <tr>
                                                                <td><a href="/cart"
                                                                        class="linktocart site-button black text-center">Xem
                                                                        giỏ hàng</a></td>
                                                                <td><a href="/checkout"
                                                                        class="linktocheckout site-button black text-center">Thanh
                                                                        toán</a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <ul class="navbar-nav flex-grow-1">
                            <li class="nav-item ">
                                <a class="nav-link active" href="{{ route('home') }}">Trang chủ</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Giới
                                    thiệu</a>
                                <ul class="dropdown-menu fade-down">
                                    <li><a class="dropdown-item" href="{{ route('aboutUs') }}">Về chúng tôi</a></li>
                                    {{-- <li><a class="dropdown-item" href="{{ route('aboutUs') }}">Liên hệ</a></li> --}}
                                </ul>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Sản
                                    phẩm</a>
                                <ul class="dropdown-menu fade-down">
                                    @foreach ($categoryhome as $item)
    <li class="tuanmenu3">
        <a class="dropdown-item"
            href="{{ route('allListProCate', $item->slug) }}">{!! languageName($item->name) !!}</a>
        @if (count($item->typeCate) > 0)
            <ul class="dropdown-menu-tuan">
                @foreach ($item->typeCate as $type)
                    <li class="tuanmenu4">
                        <a class="dropdown-item"
                            href="{{ route('allListType', ['danhmuc' => $type->cate_slug, 'loaidanhmuc' => $type->slug]) }}">
                            {!! languageName($type->name) !!}
                        </a>
                        @if (isset($type->typetwo) && count($type->typetwo) > 0)
                            <ul class="dropdown-menu-tuan-child">
                                @foreach ($type->typetwo as $child)
                                    <li >
                                        <a class="dropdown-item tuanmenu5"
                                            href="{{route('allListTypeTwo',['danhmuc'=>$item->slug,'loaidanhmuc'=>$type->slug,'thuonghieu'=>$child->slug])}}">
                                            {!! languageName($child->name) !!}
                                     
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif
    </li>
@endforeach
                                </ul>
                            </li>
                            <style>
                                .tuanmenu3:hover>.dropdown-item {
                                    color: #ffffff !important;
                                    background-color: var(--theme-color);
                                    font-weight: bold;
                                }
                                 .tuanmenu:hover>.dropdown-item {
                                    color: #ffffff !important;
                                    background-color: var(--theme-color);
                                    font-weight: bold;
                                }
                            </style>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('duanTieuBieu') }}">Dự Án</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Hỗ trợ -
                                    Dịch vụ</a>
                                <ul class="dropdown-menu fade-down">
                                    @foreach ($servicecate as $item)
                                        <li><a class="dropdown-item" href="{{ route('serviceCateList', $item->slug) }}">{{ ($item->name) }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            @foreach ($blogCate as $item)
                                <li class="nav-item dropdown">
                                    <a class="nav-link {{ count($item->typeCate) > 0 ? 'dropdown-toggle' : '' }} "
                                        href="{{ route('listCateBlog', ['slug' => $item->slug]) }}"
                                        @if (count($item->typeCate) > 0) data-bs-toggle="dropdown" @endif>{{ languageName($item->name) }}</a>
                                    @if (count($item->typeCate) > 0)
                                        <ul class="dropdown-menu fade-down">
                                            @foreach ($item->typeCate as $type)
                                                <li><a class="dropdown-item"
                                                        href="{{ route('listTypeBlog', ['slug' => $type->slug]) }}">{{ languageName($type->name) }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('contactUs') }}">Liên hệ</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- navbar end-->
</header>
<!-- header area end -->
<!-- popup search -->
<div class="search-popup">
    <button class="close-search"><span class="far fa-times"></span></button>
    <form action="#">
        <div class="form-group">
            <input type="search" name="search-field" class="form-control" placeholder="Search Here..." required>
            <button type="submit"><i class="far fa-search"></i></button>
        </div>
    </form>
</div>
<!-- popup search end -->
