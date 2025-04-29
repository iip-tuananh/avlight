<!-- header area -->
<header class="header">
    <!-- header top -->
    <div class="header-top">
       <div class="container">
          <div class="header-top-wrap">
             <div class="header-top-left">
                <div class="header-top-list">
                   <ul>
                      {{-- 
                      <li><a href="">TẬN TÂM - NHANH CHÓNG - HIỆU QUẢ</a>
                      </li>
                      --}}
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
                <div class="offcanvas-body gap-xl-4">
                   <ul class="navbar-nav justify-content-end flex-grow-1">
                      <li class="nav-item ">
                         <a class="nav-link active" href="{{ route('home') }}">Home</a>
                      </li>
                      {{-- <li class="nav-item"><a class="nav-link" href="{{ route('aboutUs') }}">About us</a></li> --}}
                      {{-- <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Dịch vụ</a>
                         <ul class="dropdown-menu fade-down">
                            @foreach ($servicehome as $item)
                            <li><a class="dropdown-item"
                               href="{{ route('serviceCateList', ['slug' => $item->slug]) }}">{{ $item->name }}</a>
                            </li>
                            @endforeach
                         </ul>
                      </li> --}}
                      <li class="nav-item ">
                        <a class="nav-link" href="{{route('duanTieuBieu')}}" >Dự Án</a>
                     </li>
                      <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Sản phẩm</a>
                         <ul class="dropdown-menu fade-down">
                            @foreach ($categoryhome as $item)
                            {{-- @php
                            dd($item->typeCate)
                            @endphp --}}
                            <li class="tuanmenu3">
                               <a class="dropdown-item "
                                  href="{{ route('allListProCate', $item->slug) }}">{!! languageName($item->name) !!}</a>
                               @if (count($item->typeCate) > 0)
                               <ul class="dropdown-menu-tuan">
                                  @foreach ($item->typeCate as $type)
                                  <li><a class="dropdown-item"
                                     href="{{ route('allListType', ['danhmuc' => $type->cate_slug, 'loaidanhmuc' => $type->slug]) }}">
                                     {!! languageName($type->name) !!}
                                     </a>
                                  </li>
                                  @endforeach
                               </ul>
                               @else
                               @endif
                            </li>
                            @endforeach
                         </ul>
                      </li>
                      <style>
                         .tuanmenu3:hover > .dropdown-item {
                         color: #ffffff !important;
                         background-color: var(--theme-color);
                         font-weight: bold;
                         }
                      </style>
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
                      {{-- <li class="nav-item"><a class="nav-link" href="{{ route('lienHe') }}">Liên <br> Hệ</a></li> --}}
                   </ul>
                   <!-- nav-right -->
                   <div class="nav-right">
                      <div class="header-top-right">
                         <div class="flexsearchuis d-lg-block d-none">
                            <div class="searchmobileui">
                               <form action="{{route('search_result')}}" method="post">
                                 @csrf
                                  <div class="form-group d-flex" style="margin-bottom:0;">
                                     <input type="text" name="keyword" class="form-control"
                                        placeholder="Nhập tên sản phẩm" required=""
                                        style="border-radius: 0px;">
                                     <button type="submit" class="buttonsearch"><i
                                        class="far fa-search"></i></button>
                                  </div>
                               </form>
                            </div>
                         </div>
                      </div>
                   </div>
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