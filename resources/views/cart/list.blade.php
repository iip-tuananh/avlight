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
    <link rel="preload stylesheet" as="style" fetchpriority="low" href="/frontend/assets/cart.scss.css">

@endsection
@section('content')
    @php
        $total = 0;
        $qty = 0;
    @endphp

    <div class="main-cart">
        <div class="main-cart-breadcrumb" title="Giỏ hàng">
            <div class="container">
                <div hidden="" class="section-title-all">
                    <h1>Giỏ hàng</h1>
                </div>
                <div class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" aria-label="Trang chủ" title="Trang chủ">Trang chủ</a></li>

                        <li class="breadcrumb-item active"><span>Giỏ hàng</span></li>
                    </ol>
                </div>		</div>
        </div>

        @if (count($cart))
            <div class="main-cart-wrap">
                <div class="container">
                    <div class="main-cart-data">
                        <div class="main-cart-data-head section-title-all">
                            <span>Giỏ hàng của bạn</span>
                            <p>Bạn đang có <strong class='count-item-head'>{{ count($cart) }} </strong> sản phẩm trong giỏ hàng</p>
                        </div>
                        <div class="main-cart-data-full">
                            <div class="main-cart-data-full-list ajaxcart__inner">
                                @foreach ($cart as $item)
                                    <div class="main-cart-data-full-item" data-id="{{ $item['id'] }}">
                                        <div class="main-cart-data-full-item-image">
                                            <a href="#">
                                                <img title="{!!languageName( $item['name'] )!!}"
                                                     src="{{ $item['image'] }}"
                                                     alt="{!!languageName( $item['name'] )!!}">
                                            </a>
                                        </div>
                                        <div class="main-cart-data-full-item-info">
                                            <h3 class="main-cart-data-full-item-info-title">
                                                <a title="{!!languageName( $item['name'] )!!}">{!!languageName( $item['name'] )!!}
                                                </a>
                                            </h3>
                                            @if ($item['discount'] > 0)
                                                <div class="main-cart-data-full-item-info-price">
                                                    <label>Giá: </label>
                                                    {{ isset($item['discount']) ? number_format($item['discount']) . '₫' : '0₫' }}

                                                    <del>({{ isset($item['price']) ? number_format($item['price']) . '₫' : '0₫' }})</del>
                                                </div>
                                            @else
                                                <div class="main-cart-data-full-item-info-price">
                                                    <label>Giá: </label>
                                                    {{ isset($item['price']) ? number_format($item['price']) . '₫' : '0₫' }}
                                                </div>
                                            @endif


                                            <div class="main-cart-data-full-item-info-quantity shop-quantity-wrap">
                                                <label>Số lượng</label>
                                                <div class="shop-quantity">
                                                    <button type="button"
                                                            onclick="qtyminus({{ $item['id'] }})"
                                                            data-id="{{ $item['id'] }}"
                                                            data-price="{{ $item['price'] }}"
                                                            data-discount="{{ $item['discount'] }}"
                                                            title="Giảm">-</button>

                                                    <input type="number" id="quantity-{{ $item['id'] }}"
                                                           name="quantity" value="{{ $item['quantity'] }}"
                                                           min="1" readonly=""
                                                           data-id="{{ $item['id'] }}"
                                                           data-price="{{ $item['price'] }}"
                                                           data-discount="{{ $item['discount'] }}"
                                                    >

                                                    <button type="button"
                                                            onclick="qtyplus({{ $item['id'] }})"
                                                            data-id="{{ $item['id'] }}"
                                                            data-price="{{ $item['price'] }}"
                                                            data-discount="{{ $item['discount'] }}"
                                                            title="Tăng">+</button>
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

                                            <div class="main-cart-data-full-item-info-total hidden d-none" hidden="">

                                                <label>Thành tiền: </label>
                                                <span> {{ number_format($tongtien, 0, ',', '.') }}₫</span>

                                            </div>
                                            <div class="main-cart-data-full-item-info-remove">
                                                <a  href="javascript:;" onclick="removeItem({{ $item['id'] }})"
                                                    title="Xóa sản phẩm">Xoá sản phẩm</a>
                                            </div>
                                        </div>
                                        <div class="main-cart-data-full-item-action">
                                            <a href="javascript:;" title="Xóa sản phẩm" onclick="removeItem({{ $item['id'] }})" ><svg version="1.1" x="0px" y="0px" viewBox="0 0 325.284 325.284" style="enable-background:new 0 0 325.284 325.284;" xml:space="preserve"><g><path d="M289.782,63.456H35.502c-7.04,0-12.768,5.732-12.768,12.768s5.732,12.768,12.768,12.768h2.828l25.856,206.644 c0,16.348,13.3,29.648,29.648,29.648h137.62c16.348,0,29.648-13.3,29.616-29.192l25.888-207.1h2.824 c7.04,0,12.768-5.732,12.768-12.768S296.822,63.456,289.782,63.456z M253.738,295.64c0,12.288-9.996,22.284-22.284,22.284H93.834 c-12.288,0-22.284-9.996-22.316-22.74L45.742,88.996h233.796L253.738,295.64z M289.782,81.632H35.502 c-2.98,0-5.404-2.424-5.404-5.404c0-2.98,2.424-5.404,5.404-5.404h254.28c2.98,0,5.404,2.424,5.404,5.404 C295.186,79.208,292.762,81.632,289.782,81.632z"></path><path d="M91.67,110.828c5.976,0,10.836,4.512,10.848,10.312l15.568,162.288c0,5.556-4.864,10.068-10.836,10.068 c-2.4,0-4.716-0.772-6.688-2.232c-1.148-0.86-2.76-0.616-3.6,0.536c-0.848,1.14-0.608,2.756,0.536,3.6 c2.864,2.128,6.236,3.244,9.752,3.244c8.82,0,15.992-6.824,15.98-15.46l-15.568-162.288c0-8.392-7.172-15.22-15.992-15.22 c-1.424,0-2.576,1.152-2.576,2.58C89.094,109.676,90.246,110.828,91.67,110.828z"></path><path d="M95.254,259.668c0.072,0,0.14-0.004,0.216-0.012c1.42-0.112,2.476-1.352,2.356-2.776l-7.976-98.652 c-0.112-1.42-1.4-2.448-2.776-2.356c-1.42,0.112-2.476,1.352-2.36,2.772l7.98,98.652 C92.798,258.648,93.926,259.668,95.254,259.668z"></path><path d="M176.058,177.516c-1.424,0-2.576,1.152-2.576,2.576v103.336c0,5.556-4.864,10.068-10.84,10.068 c-2.4,0-4.72-0.772-6.692-2.232c-1.14-0.856-2.76-0.612-3.6,0.54c-0.848,1.14-0.608,2.752,0.54,3.6 c2.864,2.124,6.24,3.24,9.752,3.24c8.82,0,15.992-6.824,15.992-15.22V180.088C178.634,178.664,177.482,177.516,176.058,177.516z"></path><path d="M154.418,254.94c1.424,0,2.576-1.152,2.576-2.576V112.368c1.724-1.008,3.656-1.54,5.652-1.54 c5.976,0,10.836,4.512,10.836,10.064v25.44c0,1.428,1.152,2.576,2.58,2.576c1.424,0,2.576-1.148,2.576-2.576v-25.44 c0-8.392-7.172-15.22-15.992-15.22c-3.516,0-6.892,1.12-9.76,3.248c-0.656,0.48-1.044,1.252-1.044,2.068v141.376 C151.842,253.788,152.994,254.94,154.418,254.94z"></path><path d="M219.05,132.444c1.432,0.156,2.636-1.012,2.708-2.436l0.948-17.592c1.744-1.044,3.704-1.588,5.72-1.588 c5.972,0,10.836,4.512,10.844,9.908l-10.392,162.692c0,5.552-4.864,10.064-10.836,10.064c-1.428,0-2.58,1.152-2.58,2.58 c0,1.424,1.152,2.576,2.58,2.576c8.82,0,15.988-6.828,15.984-15.06l10.392-162.692c0-8.392-7.172-15.22-15.992-15.22 c-3.516,0-6.892,1.12-9.76,3.248c-0.616,0.456-1,1.168-1.04,1.932l-1.016,18.88C216.538,131.156,217.63,132.368,219.05,132.444z"></path><path d="M210.754,275.728c0.052,0.004,0.1,0.004,0.152,0.004c1.356,0,2.488-1.056,2.572-2.424l6.436-109.056 c0.084-1.42-0.996-2.64-2.42-2.724c-1.36-0.092-2.636,1-2.72,2.42l-6.44,109.056 C208.246,274.428,209.334,275.648,210.754,275.728z"></path><path d="M43.614,56.54c2.032,0,3.684-1.648,3.684-3.684c0-12.288,9.996-22.288,22.284-22.288H255.71 c12.288,0,22.284,9.996,22.284,22.288c0,2.032,1.648,3.684,3.684,3.684c2.036,0,3.684-1.648,3.684-3.684 c0-16.348-13.3-29.648-29.648-29.648h-61.692C194.018,10.408,183.61,0,170.81,0h-16.336c-12.796,0-23.208,10.408-23.212,23.208 H69.578c-16.348,0-29.648,13.3-29.648,29.648C39.93,54.892,41.578,56.54,43.614,56.54z M154.474,7.364h16.336 c8.736,0,15.844,7.108,15.848,15.844h-48.032C138.63,14.472,145.738,7.364,154.474,7.364z"></path><path d="M258.734,41.384c-1.284-0.608-2.824-0.064-3.432,1.224c-0.608,1.284-0.06,2.82,1.224,3.432 c3.032,1.44,5.016,3.536,6.068,6.4c0.384,1.044,1.372,1.688,2.42,1.688c0.296,0,0.596-0.052,0.888-0.156 c1.34-0.492,2.024-1.972,1.532-3.308C265.91,46.528,262.982,43.404,258.734,41.384z"></path><path d="M220.206,38.056c-3.748,0.056-7.324,0.112-10.616,0.112c-1.424,0-2.576,1.152-2.576,2.58 c0,1.424,1.152,2.576,2.576,2.576c3.312,0,6.92-0.056,10.692-0.112c8.472-0.124,18.056-0.264,27.016,0.18 c0.044,0.004,0.092,0.004,0.132,0.004c1.364,0,2.504-1.072,2.572-2.444c0.08-1.42-1.02-2.632-2.44-2.704 C238.422,37.784,228.746,37.932,220.206,38.056z"></path></g></svg></a>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <div class="main-cart-data-full-total">
                                <h2>Thông tin đơn hàng</h2>
                                <div class="main-cart-data-full-total-sub">
                                    <div class="main-cart-data-full-total-sub-price">

                                        <label>Tổng tiền:</label>
                                        <span class="total-price"
                                              id="total-price">{{ number_format($totalPrice, 0, ',', '.') }}₫</span>

                                    </div>
                                    <div class="main-cart-data-full-total-text">Phí vận chuyển sẽ được tính ở trang thanh toán.
                                        <br>
                                        Bạn cũng có thể nhập mã giảm giá ở trang thanh toán.</div>						</div>
                                <div class="main-cart-data-full-invoice">
                                    <div class="main-cart-data-full-invoice-data">
                                        <input type="text" name="Công ty" id="main-cart-data-full-invoice-data-company" value="" placeholder="Tên công ty">
                                        <input type="text" name="Mã số thuế" id="main-cart-data-full-invoice-data-tax" value="" placeholder="Mã số thuế">
                                        <input type="text" name="Người đại diện" id="main-cart-data-full-invoice-data-address" value="" placeholder="Địa chỉ công ty">
                                        <input type="text" name="Địa chỉ" id="main-cart-data-full-invoice-data-name" value="" placeholder="Người nhận hóa đơn">
                                    </div>
                                </div>
                                <div class="main-cart-data-full-total-action">
                                    <a href="{{ route('home') }}" title="Tiếp tục mua hàng">Tiếp tục mua hàng</a>

                                    <a href="/thanh-toan.html" title="Thanh toán">Thanh toán</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="main-cart-wrap">
                <div class="container">
                    <div class="main-cart-data">
                        <div class="main-cart-data-none">
                            <div class="section-title-all">
                                <h2>Bạn chưa lựa chọn được sản phẩm nào.?</h2>
                                <p>Tìm kiếm ngay sản phẩm mà bạn mong muốn với bộ sưu tập rộng lớn của chúng tôi!</p>
                                <form id='searchForm'>
                                    <input type="text" id="src-input" placeholder="Bạn cần tìm" required>
                                    <button type="button" onclick='search()' title="Tìm kiếm">
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                             width="512" height="512" x="0" y="0" viewBox="0 0 612.01 612.01"
                                             style="enable-background: new 0 0 512 512" xml:space="preserve" class="">
                                            <path d="M606.209,578.714L448.198,423.228C489.576,378.272,515,318.817,515,253.393C514.98,113.439,399.704,0,257.493,0 C115.282,0,0.006,113.439,0.006,253.393s115.276,253.393,257.487,253.393c61.445,0,117.801-21.253,162.068-56.586 l158.624,156.099c7.729,7.614,20.277,7.614,28.006,0C613.938,598.686,613.938,586.328,606.209,578.714z M257.493,467.8 c-120.326,0-217.869-95.993-217.869-214.407S137.167,38.986,257.493,38.986c120.327,0,217.869,95.993,217.869,214.407 S377.82,467.8,257.493,467.8z" fill="#000000" data-original="#000000" class=""></path></svg></button>
                                </form>
                            </div>
                            <span>
						<img width="1666" height="1000" title="Tìm kiếm" class="w-100 lazyloaded" src="https://file.hstatic.net/200000584705/file/37578_dae02aa6e03e4230b958e97100__1___1__db746ec851754034b04b27f8690072c7.jpg" data-src="https://file.hstatic.net/200000584705/file/37578_dae02aa6e03e4230b958e97100__1___1__db746ec851754034b04b27f8690072c7.jpg" alt="Cart none">
					</span>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
@endsection
@push('script')

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
                        $('#cart-count').text(response.cartCount);
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
                            $('#cart-count').text(response.cartCount);
                            $('.count-item-head').text(response.cartCount);

                            // Kiểm tra nếu giỏ hàng trống
                            if (!response.cartHtml.trim()) {
                                $('.ajaxcart__inner').html('<p>Giỏ hàng của bạn đang trống.</p>');
                                $('.main-cart-data-full-total').empty();
                                $('.main-cart-data-head').empty();
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

        function search() {
            var keyword = document.getElementById('src-input').value.trim();
            if (!keyword) {
                return;
            }

            window.location.href = '/tim-kiem?keyword=' + encodeURIComponent(keyword);
        }

    </script>
@endpush
