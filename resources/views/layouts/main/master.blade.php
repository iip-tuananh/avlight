{{-- https://live.themewild.com/logisto/service.html --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="theme-color" content="#d70018">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
    <meta name='revisit-after' content='2 days' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
    <meta http-equiv="Content-Language" content="vi" />
    <link rel="alternate" href="{{ url()->current() }}" hreflang="vi-vn" />
    <meta name="description" content="@yield('description')">
    <meta name="robots" content="index, follow" />
    <meta name="googlebot" content="index, follow">
    <meta name="revisit-after" content="1 days" />
    <meta name="generator" content="@yield('title')" />
    <meta name="rating" content="General">
    <meta name="application-name" content="@yield('title')" />
    <meta name="theme-color" content="#ed3235" />
    <meta name="msapplication-TileColor" content="#ed3235" />
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-title" content="{{ url()->current() }}" />
    <link rel="touch-icon-precomposed" href="@yield('image')" sizes="700x700">
    <meta property="og:url" content="">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:image" content="@yield('image')">
    <meta property="og:site_name" content="{{ url()->current() }}">
    <meta property="og:image:alt" content="@yield('title')">
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="vi_VN" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@{{ url() - > current() }}" />
    <meta name="twitter:title" content="@yield('title')" />
    <meta name="twitter:description" content="@yield('description')" />
    <meta name="twitter:image" content="@yield('image')" />
    <meta name="twitter:url" content="" />
    <meta itemprop="name" content="@yield('title')">
    <meta itemprop="description" content="@yield('description')">
    <meta itemprop="image" content="@yield('image')">
    <meta itemprop="url" content="">
    <link rel="canonical" href="{{ \Request::url() }}">
    <!-- <link rel="amphtml" href="amp/" /> -->
    <link rel="image_src" href="@yield('image')" />
    <link rel="image_src" href="@yield('image')" />
    <link rel="shortcut icon" href="{{ url('' . $setting->favicon) }}" type="image/x-icon">
    <link rel="icon" href="{{ url('' . $setting->favicon) }}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- css -->
    <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/all-fontawesome.min.css">
    <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/animate.min.css">
    <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/magnific-popup.min.css">
    <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/nice-select.min.css">
    <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/style.css">
    <link rel="stylesheet" href="{{ env('AWS_R2_URL') }}/frontend/css/callbutton.css">
    <link rel="stylesheet" href="{{ asset('frontend/css/tuan.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet"> --}}
    <link rel="preconnect"
        href="//fonts.googleapis.com/css?family=Quicksand:400,500,700&display=swap&subset=vietnamese">
    <link rel="preload" href="//fonts.googleapis.com/css?family=Quicksand:400,500,700&display=swap&subset=vietnamese"
        as="style">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,700&display=swap&subset=vietnamese"
        rel="stylesheet">
    <script src="{{ env('AWS_R2_URL') }}/frontend/js/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="{{ asset('frontend/css/toastr.scss.css') }}">
    @yield('css')
</head>

<body>


    <a href="{{ route('listCart') }}" id="giohang">
        <i class="fa-solid fa-cart-shopping"></i>
        <span class="soluong count_item_pr">0</span>
    </a>
    <!-- filepath: c:\laragon\www\avlight\resources\views\product\detail.blade.php -->
    <!-- filepath: c:\laragon\www\avlight\resources\views\layouts\main\master.blade.php -->


    @if (session('success'))
        <div class="overlay" id="overlay"></div>
        <div class="alert alert-success custom-alert" id="success-alert">
            {{ session('success') }}
            <button type="button" class="close-alert"
                onclick="closeAlert('success-alert', 'overlay')">&times;</button>
        </div>
    @endif

    @if (session('error'))
        <div class="overlay" id="overlay"></div>
        <div class="alert alert-danger custom-alert" id="error-alert">
            {{ session('error') }}
            <button type="button" class="close-alert"
                onclick="closeAlert('error-alert', 'overlay')">&times;</button>
        </div>
    @endif
    @include('layouts.header.index')

    @yield('content')
    <!-- footer area -->
    @include('layouts.footer.index')
    <!-- footer area end -->
    <div class="flexsearchui d-lg-block d-none">
        <div class="searchmobileui">
            <form action="https://tracking.tnhlog.vn/login" method="get">
                <div class="form-group d-flex" style="margin-bottom:0;">
                    <input type="text" name="search" class="form-control" placeholder="Nhập mã tra cứu..."
                        required="" style="border-radius: 0px;">
                    <button type="submit" class="buttonsearch"><i class="far fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div onclick="window.location.href= 'tel:{{ $setting->phone1 }}'" class="hotline-phone-ring-wrap">
        <div class="hotline-phone-ring">
            <div class="hotline-phone-ring-circle"></div>
            <div class="hotline-phone-ring-circle-fill"></div>
            <div class="hotline-phone-ring-img-circle">
                <a href="tel:{{ $setting->phone1 }}" class="pps-btn-img">
                    <img src="{{ url('frontend/img/phone.png') }}" alt="Gọi điện thoại" width="50">
                </a>
            </div>
        </div>
        <a href="tel:{{ $setting->phone1 }}">
        </a>
        <div class="hotline-bar"><a href="tel:{{ $setting->phone1 }}">
            </a><a href="tel:{{ $setting->phone1 }}">
                <span class="text-hotline">{{ $setting->phone1 }}</span>
            </a>
        </div>

    </div>
    <div class="inner-fabs">
        <a target="blank" href="https://zalo.me/0918816218" class="fabs roundCool" id="challenges-fab"
            data-tooltip="Nhắn tin Zalo">
            <img class="inner-fab-icon" src="{{ url('frontend/img/zalo.png') }}" alt="challenges-icon"
                border="0">
        </a>
        <a target="blank" href="https://zalo.me/0913912236" class="fabs roundCool" id="chat-fab"
            data-tooltip="Nhắn tin Zalo">
            <img class="inner-fab-icon" src="{{ url('frontend/img/zalo.png') }}" alt="chat-active-icon"
                border="0">
        </a>
        <a target="blank" href="{{ $setting->facebook }}" class="fabs roundCool" id="chat-fab"
            data-tooltip="Fanpage">
            <img class="inner-fab-icon" src="{{ url('frontend/img/fbicon.png') }}" alt="chat-active-icon"
                border="0">
        </a>
    </div>
    <div class="fabs roundCool call-animation" id="main-fab">
        <img class="img-circle" src="{{ url('frontend/img/lienhe.png') }}" alt="" width="135">
    </div>
    {{-- <div class="totop">
        <a href="#"><i class="bi bi-chevron-up"></i></a>
    </div> --}}

    <script src="{{ env('AWS_R2_URL') }}/frontend/js/modernizr.min.js"></script>
    <script src="{{ env('AWS_R2_URL') }}/frontend/js/bootstrap.bundle.min.js"></script>
    <script src="{{ env('AWS_R2_URL') }}/frontend/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{ env('AWS_R2_URL') }}/frontend/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ env('AWS_R2_URL') }}/frontend/js/isotope.pkgd.min.js"></script>
    <script src="{{ env('AWS_R2_URL') }}/frontend/js/jquery.appear.min.js"></script>
    <script src="{{ env('AWS_R2_URL') }}/frontend/js/jquery.easing.min.js"></script>
    <script src="{{ env('AWS_R2_URL') }}/frontend/js/owl.carousel.min.js"></script>
    <script src="{{ env('AWS_R2_URL') }}/frontend/js/counter-up.js"></script>
    <script src="{{ env('AWS_R2_URL') }}/frontend/js/jquery.nice-select.min.js"></script>
    <script src="{{ env('AWS_R2_URL') }}/frontend/js/wow.min.js"></script>
    <script src="{{ env('AWS_R2_URL') }}/frontend/js/main.js"></script>
    <script src="{{ env('AWS_R2_URL') }}/frontend/js/callbutton.js"></script>
    <script src="{{ env('AWS_R2_URL') }}/frontend/js/notify.min.js"></script>
    <script src="{{ asset('frontend/js/addcart.js') }}"></script>
    <script src="{{ asset('frontend/js/toast.js') }}"></script>
    @yield('js')
    <script>
        $('.product-tuan-slider').owlCarousel({
            loop: false,
            margin: 30,
            nav: true,
            dots: true,
            autoplay: true,
            navText: [
                "<i class='far fa-arrow-left'></i>",
                "<i class='far fa-arrow-right'></i>"
            ],
            rows: 2,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        });
    </script>
    <script>
        $('.product-detail-slider').owlCarousel({
            loop: false,
            margin: 30,
            nav: true,
            dots: true,
            autoplay: true,
            navText: [
                "<i class='far fa-arrow-left'></i>",
                "<i class='far fa-arrow-right'></i>"
            ],
            rows: 2,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Lấy tất cả các nút "Thêm vào giỏ"
            const addToCartButtons = document.querySelectorAll('.themgio');

            addToCartButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault(); // Ngăn chặn hành động mặc định

                    // Lấy ID sản phẩm từ thuộc tính data-id
                    const productId = this.getAttribute('data-id');

                    // Tạo dữ liệu gửi đi
                    const formData = new FormData();
                    formData.append('_token', '{{ csrf_token() }}'); // CSRF token
                    formData.append('product_id', productId);
                    formData.append('quantity', 1); // Số lượng mặc định là 1

                    // Gửi request AJAX
                    fetch('{{ route('add.to.cart') }}', {
                            method: 'POST',
                            body: formData,
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                toastr.success(data.message);
                                const cartCountElements = document.querySelectorAll(
                                    '.count_item_pr');
                                if (cartCountElements.length > 0) {
                                    cartCountElements.forEach(element => {
                                        element.textContent = data
                                            .cartCount; // Cập nhật số lượng từ server
                                    });
                                }
                            } else {
                                toastr.error('Có lỗi xảy ra khi thêm sản phẩm vào giỏ hàng.');
                            }
                        })
                        .catch(error => {
                            console.error('Lỗi:', error);
                            alert('Không thể thêm sản phẩm vào giỏ hàng.');
                        });
                });
            });
        });
    </script>
    <script>
        function closeAlert(alertId, overlayId) {
            const alertElement = document.getElementById(alertId);
            const overlayElement = document.getElementById(overlayId);
            if (alertElement) {
                alertElement.style.display = 'none';
            }
            if (overlayElement) {
                overlayElement.style.display = 'none';
            }
        }

        // Hiển thị overlay khi thông báo xuất hiện
        document.addEventListener('DOMContentLoaded', function() {
            const overlay = document.getElementById('overlay');
            const successAlert = document.getElementById('success-alert');
            const errorAlert = document.getElementById('error-alert');

            if (successAlert || errorAlert) {
                overlay.style.display = 'block';
            }
        });
    </script>
</body>

</html>
