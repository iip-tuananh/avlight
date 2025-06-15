{{-- https://live.themewild.com/logisto/service.html --}}
<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.main.head')
    @yield('css')
</head>
<body>
    @include('layouts.header.index')
    <main class="main-layout">
        @yield('content')
    </main>

    @include('layouts.footer.index')

{{--    <div class="shop-mobar">--}}
{{--        <div class="shop-mobar-wrap">--}}
{{--            <ul>--}}
{{--                <li>--}}
{{--                    <a class="" aria-label="Trang chủ"--}}
{{--                       href="index.html" title="Trang chủ">--}}
{{--                        <img loading="lazy" decoding="async" width="64" height="64"--}}
{{--                             src="/frontend/assets/shop_mobar_item_image_1ed63.png?1745557375056" alt="Trang chủ" title="Trang chủ">--}}
{{--                        <span>Trang chủ</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a class="" aria-label="Trang sản phẩm"--}}
{{--                       href="collections/all.html" title="Trang sản phẩm">--}}
{{--                        <img loading="lazy" decoding="async" width="64" height="64"--}}
{{--                             src="/frontend/assets/shop_mobar_item_image_2ed63.png?1745557375056" alt="Trang sản phẩm" title="Trang sản phẩm">--}}
{{--                        <span>Trang sản phẩm</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a class="" aria-label="Trang tin tức"--}}
{{--                       href="blogs/all.html" title="Trang tin tức">--}}
{{--                        <img loading="lazy" decoding="async" width="64" height="64"--}}
{{--                             src="/frontend/assets/shop_mobar_item_image_3ed63.png?1745557375056" alt="Trang tin tức" title="Trang tin tức">--}}
{{--                        <span>Trang tin tức</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a class="tool-contact-popup" aria-label="Đăng ký"--}}
{{--                       href="account/logina3b1.html" title="Đăng ký">--}}
{{--                        <img loading="lazy" decoding="async" width="64" height="64"--}}
{{--                             src="/frontend/assets/shop_mobar_item_image_4ed63.png?1745557375056" alt="Đăng ký" title="Đăng ký">--}}
{{--                        <span>Đăng ký</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="modal-phone" id="shop-modal-phone">
        <div class="modal-phone-wrap">
            <div class="section-title-all">
                <span>Liên hệ ngay với chúng tôi:</span>
                <p>Nhận ngay deal hời <b style="font-weight:bold;color:#f30;font-size:25px;">9%</b> cho tất cả dự án:
                    <b>HOTLINE: </b> <b style="font-weight:bold;color:#f30;">1900.63.60.99</b></p>
            </div>

            <form method="post" action="https://f1genz-smart-furniture.mysapo.net/postcontact" id="contact" accept-charset="UTF-8"><input name="FormType" type="hidden" value="contact"/><input name="utf8" type="hidden" value="true"/><input type="hidden" id="Token-a1c89c2ee64b43ea9fa9aca637cdb093" name="Token" /><noscript data-src="../www.google.com/recaptcha/apif78f.js?render=6Ldtu4IUAAAAAMQzG1gCw3wFlx_GytlZyLrXcsuK"></noscript><noscript>grecaptcha.ready(function() {grecaptcha.execute("6Ldtu4IUAAAAAMQzG1gCw3wFlx_GytlZyLrXcsuK", {action: "contact"}).then(function(token) {document.getElementById("Token-a1c89c2ee64b43ea9fa9aca637cdb093").value = token});});</noscript>
                <input type="hidden" name="contact[name]" id="shop-modal-phone-name" value="">
                <input type="hidden" name="contact[email]" id="shop-modal-phone-email" value="">
                <input type="number" placeholder="Nhập số điện thoại của bạn..." name="contact[phone]" id="shop-modal-phone-number" value="">
                <input type="hidden" name="contact[body]" id="shop-modal-phone-body" value="Nhận ngay deal hời 9% cho tất cả dự án:
HOTLINE:  1900.63.60.99">
                <button type="submit" title="Đăng ký"><span>Đăng ký</span></button>
            </form>
        </div>
    </div>
    <div class="shop-cart-sidebar">
        <div class="shop-cart-sidebar-head">
            <label>Giỏ hàng</label>
            <button type="button" data-type="shop-cart-sidebar-close" title="Đóng">
                <svg class="Icon Icon--close" role="presentation" viewBox="0 0 16 14" width="15" height="15"><path d="M15 0L1 14m14 0L1 0" stroke="currentColor" fill="none" fill-rule="evenodd"></path></svg>
            </button>
            <div class="shop-cart-sidebar-top-freeship">
                <div class="shop-freeship" data-freeship-price="50000000">
                    <div class="shop-freeship-bar">
                        <div class="shop-freeship-bar-main"><span></span></div>
                    </div>
                    <div class="shop-freeship-note">
                        Mua thêm <span>50.000.000₫</span> để được miễn phí giao hàng trên toàn quốc
                    </div>
                </div>
                <div class="shop-cart-sidebar-top-freeship-label">
                    <img class="lazyload" width="75" height="62" title="Free Ship"
                         src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                         data-src="https://file.hstatic.net/200000306687/file/giphy__1__c91b6f02cea04a969d655681bb73caf8_small.gif" alt=" - Free Ship">
                </div>
            </div>
        </div>
        <div class="shop-cart-sidebar-body">
            <div class="shop-cart-sidebar-yes"></div>
            <div class="shop-cart-sidebar-no">Giỏ hàng của bạn còn trống</div>
        </div>
        <div class="shop-cart-sidebar-foot">
            <button type="button" data-type="shop-cart-sidebar-note-action" title="Thêm ghi chú">Thêm ghi chú</button>
            <a href="cart.html" title="Xem chi tiết giỏ hàng" aria-label="Xem chi tiết giỏ hàng">Xem chi tiết giỏ hàng</a>
            <p>Phí ship & thuế được tính ở Trang Thanh Toán</p>
            <a class="toCheckout" href="cart.html" title="Thanh toán" aria-label="Thanh toán">
                <span>Thanh toán</span>
                <span></span>
                <span>0₫</span>
            </a>
            <div class="shop-cart-sidebar-note">
                <label>Thêm ghi chú</label>
                <textarea placeholder="Chúng tôi có thể giúp gì cho bạn?"></textarea>
                <button type="button" data-type="shop-cart-sidebar-note-save" title="Lưu">Lưu</button>
            </div>
        </div>
    </div>
    <div class="shop-social-sidebar">
        <a class="hiddenMob" style="background-color: #ffffff;" href="https://zalo.me/{{ $setting->phone1 }}" title="Zalo" aria-label="Zalo" target="_blank">
            <img width="32" height="32" loading="lazy" decoding="async"
                 src="/frontend/assets/shop_social_sidebar_item_image_1ed63.png?1745557375056" alt="Social Zalo" title="Social Zalo">
            Zalo
        </a>
        <a class="hiddenMob" style="background-color: #ffffff;" href="https://www.snapchat.com/add/{{ $setting->phone1 }}" title="Snapchat" aria-label="Snapchat" target="_blank">
            <img width="32" height="32" loading="lazy" decoding="async"
                 src="/frontend/assets/shop_social_sidebar_item_image_2ed63.png?1745557375056" alt="Social Snapchat" title="Social Snapchat">
            Snapchat
        </a>
        <a class="hiddenMob" style="background-color: #ffffff;" href="{{ $setting->tiktok }}" title="Tiktok" aria-label="Tiktok" target="_blank">
            <img width="32" height="32" loading="lazy" decoding="async"
                 src="/frontend/assets/shop_social_sidebar_item_image_3ed63.png?1745557375056" alt="Social Tiktok" title="Social Tiktok">
            Tiktok
        </a>
        <a class="hiddenMob" style="background-color: #ffffff;" href="{{ $setting->instagram }}" title="Instagram" aria-label="Instagram" target="_blank">
            <img width="32" height="32" loading="lazy" decoding="async"
                 src="/frontend/assets/shop_social_sidebar_item_image_4ed63.png?1745557375056" alt="Social Instagram" title="Social Instagram">
            Instagram
        </a>
        <a class="hiddenMob" style="background-color: #ffffff;" href="{{ $setting->youtube }}" title="Youtube" aria-label="Youtube" target="_blank">
            <img width="32" height="32" loading="lazy" decoding="async"
                 src="/frontend/assets/shop_social_sidebar_item_image_5ed63.png?1745557375056" alt="Social Youtube" title="Social Youtube">
            Youtube
        </a>
        <a class="hiddenMob" style="background-color: #ffffff;" href="{{ $setting->facebook }}" title="Messenger" aria-label="Messenger" target="_blank">
            <img width="32" height="32" loading="lazy" decoding="async"
                 src="/frontend/assets/shop_social_sidebar_item_image_6ed63.png?1745557375056" alt="Social Messenger" title="Social Messenger">
            Messenger
        </a>

        <button class="back-to-top" title="Back to top">
            <img width="32" height="32" loading="lazy" decoding="async"
                 src="/frontend/assets/arrow-up_eb1426bb7fc647eab89f9279695752cd.png" alt="Back to top" title="Back to top">
            Lên đầu trang
        </button>
    </div>

    <script >
        $("body").removeClass("preload");
        document.addEventListener('lazybeforeunveil', function(e){
            var bg = e.target.getAttribute('data-bg');
            if(bg) e.target.style.backgroundImage = 'url(' + bg + ')';
        });
        if(window.noPS){
            window.addEventListener("load", (event) => {
                $('img[loading="lazy"]').each(function(){
                    $(this).removeAttr('loading');
                })
            });
        }else{
            // Jquery touch
            jQuery.event.special.touchstart={setup:function(e,t,n){this.addEventListener("touchstart",n,{passive:!t.includes("noPreventDefault")})}},jQuery.event.special.touchmove={setup:function(e,t,n){this.addEventListener("touchmove",n,{passive:!t.includes("noPreventDefault")})}};
        }
    </script>
    <button class="overplay-all" title="Đóng"></button>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    {{-- <script src='/frontend/assets/cart.js'></script> --}}

    <script>
        function nextUrl(el) {
            const url = el.dataset.href;
            if (url) {
                window.location.href = url;
            }
        }

        $('#searchForm').on('submit', function(e) {
            e.preventDefault();
            var keyword = document.getElementById('search-input').value.trim();

            if (!keyword) {
                return;
            }

            window.location.href = '/tim-kiem?keyword=' + encodeURIComponent(keyword);
        });
    </script>
    @stack('script')
</body>

</html>
