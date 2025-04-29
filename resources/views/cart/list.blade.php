@extends('layouts.main.master')
@section('title')
    Giỏ hàng của bạn
@endsection
@section('description')
@endsection
@section('image')
    {{ url('' . $banner[0]->image) }}
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('frontend/css/cartpage.scss.css?1737361902764') }}" rel="stylesheet" type="text/css" media="all">
@endsection
@section('content')
    @php
        $total = 0;
        $qty = 0;
    @endphp

    <section class="bread-crumb">
        <div class="container">
            <ul class="breadcrumb">
                <li class="home">
                    <a href="{{ route('home') }}"><span>Trang chủ</span></a>
                    <span class="mr_lr">
                        &nbsp;
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                            class="svg-inline--fa fa-chevron-right fa-w-10">
                            <path fill="currentColor"
                                d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"
                                class=""></path>
                        </svg>
                        &nbsp;
                    </span>
                </li>
                <li><strong><span>Giỏ hàng</span></strong></li>
            </ul>
        </div>
    </section>
    <section class="main-cart-page main-container col1-layout">
        <div class="main container cartpcstyle">
            <div class="wrap_background_aside margin-bottom-40" style="display: inline-block;   width: 100%;">
                <div class="header-cart d-none">
                    <div class="title-block-page">
                        <h1 class="title_cart">
                            <span>Giỏ hàng của bạn</span>
                        </h1>
                    </div>
                </div>
                <div class="row">

                    <div class="col-xl-12 col-lg-12 col-12 col-cart-left">
                        <div class="cart-page d-xl-block">
                            <div class="drawer__inner">
                                <div class="CartPageContainer tuan=cart">

                                    <form action="{{ route('checkout') }}" method="get" novalidate=""
                                        class="cart ajaxcart cartpage">
                                        @csrf
                                        <div class="cart-header-info">
                                            <div>Thông tin sản phẩm</div>
                                            <div>Đơn giá</div>
                                            <div>Giá Giảm</div>
                                            <div>Số lượng</div>
                                            <div>Thành tiền</div>
                                        </div>
                                        @if (count($cart) == 0)
                                            <div class="text-center">
                                                Giỏ hàng đang trống <a style="color: red; font-"
                                                    href="{{ route('home') }}">tiếp tục mua hàng</a>
                                            </div>
                                        @else
                                            <div class="ajaxcart__inner ajaxcart__inner--has-fixed-footer cart_body items">
                                                @foreach ($cart as $item)
                                                    <div class="ajaxcart__row cart_aj " data-id="{{ $item['id'] }}">
                                                        <div class="ajaxcart__product cart_product" data-line="1">
                                                            <a href="#" class="ajaxcart__product-image cart_image"
                                                                title="{!!languageName( $item['name'] )!!}"><img
                                                                    src="{{ $item['image'] }}"></a>
                                                            <div class="grid__item cart_info">
                                                                {{-- phần xóa --}}
                                                                <div class="ajaxcart__product-name-wrapper cart_name">
                                                                    <a href="#" class="ajaxcart__product-name h4"
                                                                        title="{!!languageName( $item['name'] )!!}">{!!languageName( $item['name'] )!!}</a>

                                                                    <a class="cart__btn-remove remove-item-cart ajaxifyCart--remove"
                                                                        href="javascript:;" title="xóa"
                                                                        onclick="removeItem({{ $item['id'] }})">Xóa</a>
                                                                </div>
                                                                {{-- end xóa --}}
                                                                @if ($item['discount'] > 0)
                                                                    <div class="grid">
                                                                        <div
                                                                            class="grid__item one-half text-right cart_prices">
                                                                            <span
                                                                                class="cart-price old-price">{{ isset($item['price']) ? number_format($item['price']) . '₫' : '0₫' }}</span>

                                                                        </div>



                                                                    </div>
                                                                    <div class="grid">
                                                                        <div
                                                                            class="grid__item one-half text-right cart_prices">
                                                                            <span class="cart-price">
                                                                                {{ isset($item['discount']) ? number_format($item['discount']) . '₫' : '0₫' }}
                                                                            </span>

                                                                        </div>
                                                                    </div>
                                                                @else
                                                                    <div class="grid">
                                                                        <div
                                                                            class="grid__item one-half text-right cart_prices">
                                                                            <span
                                                                                class="cart-price ">{{ isset($item['price']) ? number_format($item['price']) . '₫' : '0₫' }}</span>

                                                                        </div>



                                                                    </div>
                                                                    <div class="grid">
                                                                        <div
                                                                            class="grid__item one-half text-right cart_prices">
                                                                            <span class="cart-price old-price">
                                                                                {{ isset($item['discount']) ? number_format($item['discount']) . '₫' : '0₫' }}
                                                                            </span>

                                                                        </div>
                                                                    </div>
                                                                @endif
                                                                <div class="grid">
                                                                    <div
                                                                        class="input_number_product form-control d-flex align-items-center">
                                                                        <button type="button"
                                                                            onclick="qtyminus({{ $item['id'] }})"
                                                                            data-id="{{ $item['id'] }}"
                                                                            data-price="{{ $item['price'] }}"
                                                                            data-discount="{{ $item['discount'] }}">-</button>
                                                                        <input type="number"
                                                                            id="quantity-{{ $item['id'] }}"
                                                                            name="quantity" value="{{ $item['quantity'] }}"
                                                                            min="1"
                                                                            class="text-center quantity-input"
                                                                            data-id="{{ $item['id'] }}"
                                                                            data-price="{{ $item['price'] }}"
                                                                            data-discount="{{ $item['discount'] }}"
                                                                            style="width: 50px;" />
                                                                        <button type="button"
                                                                            onclick="qtyplus({{ $item['id'] }})"
                                                                            data-id="{{ $item['id'] }}"
                                                                            data-price="{{ $item['price'] }}"
                                                                            data-discount="{{ $item['discount'] }}">+</button>
                                                                    </div>




                                                                </div>
                                                                @php
                                                                    // Kiểm tra nếu có giảm giá thì sử dụng giá giảm, nếu không thì sử dụng giá gốc
                                                                    $price =
                                                                        isset($item['discount']) &&
                                                                        $item['discount'] > 0
                                                                            ? $item['discount']
                                                                            : $item['price'];
                                                                    $tongtien = $price * $item['quantity'];
                                                                @endphp

                                                                <div class="grid">
                                                                    <div class="grid__item one-half text-right cart_prices">
                                                                        <span class="cart-price"
                                                                            id="total-price-{{ $item['id'] }}">
                                                                            {{ number_format($tongtien, 0, ',', '.') }}₫
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach


                                            </div>
                                        @endif
                                        <div class="ajaxcart__footer ajaxcart__footer--fixed cart-footer">
                                            <div class="row">
                                                <div class="col-lg-4 col-12 offset-md-8 offset-lg-8 offset-xl-8">
                                                    <div class="ajaxcart__subtotal">
                                                        <div class="cart__subtotal">
                                                            @if (count($cart) == 0)
                                                            @else
                                                                <div class="cart__col-6">Tổng tiền:</div>
                                                                <div class="text-right cart__totle">
                                                                    <span class="total-price"
                                                                        id="total-price">{{ number_format($totalPrice, 0, ',', '.') }}₫</span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            @if (count($cart) == 0)
                                            @else
                                                <div class="text-end">
                                                    <button class="btn btn-danger">Thanh toán</button>
                                                </div>
                                            @endif
                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                        {{-- <div class="cart-mobile-page d-block d-xl-none">
                            <div class="CartMobileContainer">
                            </div>
                        </div> --}}
                    </div>

                </div>
            </div>
        </div>
        <style>
            .old-price {
                text-decoration: line-through;
                color: #999;
                /* Màu xám nhạt để phân biệt giá cũ */
                font-size: 14px;
                /* Kích thước nhỏ hơn giá hiện tại */
                margin-right: 5px;
                /* Khoảng cách với giá mới */
            }
        </style>

        <script>
            // Hàm giảm số lượng
            function qtyminus(productId) {
                const quantityInput = $(`#quantity-${productId}`);
                const price = parseFloat(quantityInput.data('price'));
                const discount = parseFloat(quantityInput.data('discount'));
                let quantity = parseInt(quantityInput.val());

                // Giảm số lượng nếu lớn hơn 1
                if (quantity > 1) {
                    quantity--;
                    quantityInput.val(quantity);

                    // Cập nhật tổng tiền
                    updateTotalPrice(productId, quantity, price, discount);

                    // Gửi AJAX để cập nhật số lượng trong session
                    updateCartQuantity(productId, quantity);
                }
            }

            // Hàm tăng số lượng
            function qtyplus(productId) {
                // Lấy input số lượng của sản phẩm dựa trên ID
                const quantityInput = $(`#quantity-${productId}`);
                // Lấy giá gốc của sản phẩm
                const price = parseFloat(quantityInput.data('price'));
                // Lấy giá giảm (nếu có) của sản phẩm
                const discount = parseFloat(quantityInput.data('discount'));
                // Lấy số lượng hiện tại của sản phẩm
                let quantity = parseInt(quantityInput.val());

                // Tăng số lượng sản phẩm
                quantity++;
                // Cập nhật giá trị mới vào input số lượng
                quantityInput.val(quantity);

                // Cập nhật tổng tiền hiển thị cho sản phẩm
                updateTotalPrice(productId, quantity, price, discount);

                // Gửi yêu cầu AJAX để cập nhật số lượng sản phẩm trong session
                updateCartQuantity(productId, quantity);
            }


            // Hàm cập nhật tổng tiền
            function updateTotalPrice(productId, quantity, price, discount) {
                const totalPriceElement = $(`#total-price-${productId}`);
                const finalPrice = (discount > 0 ? discount : price) * quantity;
                totalPriceElement.text(new Intl.NumberFormat('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                }).format(finalPrice));
            }

            // Hàm gửi AJAX để cập nhật số lượng trong session
            function updateCartQuantity(productId, quantity) {
                $.ajax({
                    url: '{{ route('update.cart') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        product_id: productId,
                        quantity: quantity
                    },
                    success: function(response) {
                        if (response.success) {
                            console.log('Cập nhật giỏ hàng thành công:', response.cart);
                            $('.count_item_pr').text(response.cartCount);
                            // Cập nhật tổng tiền hiển thị
                            $('#total-price').text(response.totalPrice);
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(xhr) {
                        console.error('Lỗi:', xhr);
                    }
                });
            }
        </script>
        <script>
            // truyền id vào hàm
            function removeItem(productId) {
                if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?')) {
                    $.ajax({
                        url: '{{ route('remove.from.cart') }}',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            product_id: productId
                        },
                        success: function(response) {
                            if (response.success) {
                                // Hiển thị thông báo thành công bằng Toastr
                                toastr.success(response.message);

                                // Cập nhật danh sách giỏ hàng
                                $('.ajaxcart__inner').html(response.cartHtml);

                                // Cập nhật tổng tiền
                                $('#total-price').text(response.totalPrice);

                                // Cập nhật số lượng sản phẩm trong giỏ hàng
                                $('.count_item_pr').text(response.cartCount);

                                // Kiểm tra nếu giỏ hàng trống
                                if (!response.cartHtml.trim()) {
                                    $('.ajaxcart__inner').html('<p>Giỏ hàng của bạn đang trống.</p>');
                                }
                            } else {
                                // Hiển thị thông báo lỗi bằng Toastr
                                toastr.error('Không thể xóa sản phẩm. Vui lòng thử lại.');
                            }
                        },
                        error: function(xhr) {
                            console.error('Lỗi:', xhr);
                            // Hiển thị thông báo lỗi bằng Toastr
                            toastr.error('Đã xảy ra lỗi. Vui lòng thử lại.');
                        }
                    });
                }
            }
        </script>
    </section>
    <style>
        .ajaxcart__product-image img {
            max-width: 60px;
            /* Giảm kích thước hình ảnh */
            height: auto;
            margin: 0 auto;
            /* Căn giữa hình ảnh */
            display: block;
        }

        .cart-header-info {
            font-size: 12px;
            /* Giảm kích thước chữ tiêu đề */
        }

        .ajaxcart__row {
            font-size: 12px;
            /* Giảm kích thước chữ trong các hàng */
            padding: 5px 0;
            /* Giảm khoảng cách giữa các hàng */
        }

        .input_number_product input {
            font-size: 10px;
            /* Giảm kích thước chữ trong ô nhập */
            width: 30px;
            /* Giảm chiều rộng ô nhập */
        }

        .input_number_product button {
            font-size: 10px;
            /* Giảm kích thước chữ trên nút */
            padding: 2px 4px;
            /* Giảm kích thước nút */
        }

        .ajaxcart__footer {
            font-size: 12px;
            /* Giảm kích thước chữ trong phần tổng tiền */
        }

        .btn-danger {
            font-size: 12px;
            /* Giảm kích thước chữ trên nút thanh toán */
            padding: 8px;
            /* Giảm padding của nút */
        }

        /* Responsive cho thiết bị di động */
        @media (max-width: 768px) {
            .ajaxcart__product-image img {
                max-width: 50px !important;
                /* Giảm kích thước hình ảnh hơn nữa trên màn hình nhỏ */
            }

            .cart-page .cart_body .cart_image {
                max-width: 50px !important;
                width: 50px !important;
                height: 50px !important;
                display: flex;

                align-items: center;
                justify-content: center;
                margin-left: 10px;
            }

            .cart-page .cart_body .grid {
                width: 35% !important;
                display: flex align-items: center;
                justify-content: center;
            }

            .cart-header-info {
                display: none;
                /* Ẩn tiêu đề cột trên màn hình nhỏ */
            }

            .ajaxcart__row {
                grid-template-columns: 1fr 2fr;
                /* Chỉ hiển thị 2 cột: Hình ảnh và thông tin */
                text-align: left;
            }

            .cart_info {
                grid-column: 2 / 3;
                /* Thông tin sản phẩm chiếm cột thứ hai */
            }

            .btn-danger {
                font-size: 10px;
                /* Giảm kích thước chữ trên nút thanh toán */
                padding: 6px;
                /* Giảm padding của nút */
            }

            .input_number_product {
                display: flex;

                flex-direction: column;
                align-items: center;
                justify-content: center;
                gap: 0px;
                width: 7px;
            }

            .cart-page .cart_body .ajaxcart__row .cart_product {
                width: 113%;
                height: 120px;
                display: flex;

                align-items: center;

            }
        }

        .input_number_product button {
            font-size: 12px;
            /* Kích thước chữ trên nút */
            padding: 5px;
            /* Khoảng cách bên trong nút */
            width: 100%;
            /* Nút chiếm toàn bộ chiều rộng */
            text-align: center;
            /* Căn giữa chữ trong nút */
        }

        .input_number_product input {
            font-size: 12px;
            /* Kích thước chữ trong ô nhập */
            text-align: center;
            /* Căn giữa chữ trong ô nhập */
            width: 100%;
            /* Ô nhập chiếm toàn bộ chiều rộng */
            padding: 5px;
            /* Khoảng cách bên trong ô nhập */
            box-sizing: border-box;
            /* Bao gồm padding trong kích thước */
        }
    </style>
@endsection
