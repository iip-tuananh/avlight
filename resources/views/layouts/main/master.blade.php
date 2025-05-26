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



    <div class="shop-mobar">
        <div class="shop-mobar-wrap">
            <ul>
                <li>
                    <a class="" aria-label="F1GENZ Smart Furniture - Trang chủ"
                       href="index.html" title="Trang chủ">
                        <img loading="lazy" decoding="async" width="64" height="64"
                             src="/frontend/assets/shop_mobar_item_image_1ed63.png?1745557375056" alt="F1GENZ Smart Furniture - Trang chủ" title="Trang chủ">
                        <span>Trang chủ</span>
                    </a>
                </li>
                <li>
                    <a class="" aria-label="F1GENZ Smart Furniture - Trang sản phẩm"
                       href="collections/all.html" title="Trang sản phẩm">
                        <img loading="lazy" decoding="async" width="64" height="64"
                             src="/frontend/assets/shop_mobar_item_image_2ed63.png?1745557375056" alt="F1GENZ Smart Furniture - Trang sản phẩm" title="Trang sản phẩm">
                        <span>Trang sản phẩm</span>
                    </a>
                </li>
                <li>
                    <a class="" aria-label="F1GENZ Smart Furniture - Trang tin tức"
                       href="blogs/all.html" title="Trang tin tức">
                        <img loading="lazy" decoding="async" width="64" height="64"
                             src="/frontend/assets/shop_mobar_item_image_3ed63.png?1745557375056" alt="F1GENZ Smart Furniture - Trang tin tức" title="Trang tin tức">
                        <span>Trang tin tức</span>
                    </a>
                </li>
                <li>
                    <a class="tool-contact-popup" aria-label="F1GENZ Smart Furniture - Đăng ký"
                       href="account/logina3b1.html" title="Đăng ký">
                        <img loading="lazy" decoding="async" width="64" height="64"
                             src="/frontend/assets/shop_mobar_item_image_4ed63.png?1745557375056" alt="F1GENZ Smart Furniture - Đăng ký" title="Đăng ký">
                        <span>Đăng ký</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

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







        <a class="hiddenMob" style="background-color: #ffffff;" href="collections/all.html" title="Zalo" aria-label="F1GENZ Smart Furniture - Zalo" target="_blank">
            <img width="32" height="32" loading="lazy" decoding="async"
                 src="/frontend/assets/shop_social_sidebar_item_image_1ed63.png?1745557375056" alt="Social Zalo" title="Social Zalo">
            Zalo
        </a>








        <a class="hiddenMob" style="background-color: #ffffff;" href="collections/all.html" title="Snapchat" aria-label="F1GENZ Smart Furniture - Snapchat" target="_blank">
            <img width="32" height="32" loading="lazy" decoding="async"
                 src="/frontend/assets/shop_social_sidebar_item_image_2ed63.png?1745557375056" alt="Social Snapchat" title="Social Snapchat">
            Snapchat
        </a>








        <a class="hiddenMob" style="background-color: #ffffff;" href="collections/all.html" title="Tiktok" aria-label="F1GENZ Smart Furniture - Tiktok" target="_blank">
            <img width="32" height="32" loading="lazy" decoding="async"
                 src="/frontend/assets/shop_social_sidebar_item_image_3ed63.png?1745557375056" alt="Social Tiktok" title="Social Tiktok">
            Tiktok
        </a>








        <a class="hiddenMob" style="background-color: #ffffff;" href="collections/all.html" title="Instagram" aria-label="F1GENZ Smart Furniture - Instagram" target="_blank">
            <img width="32" height="32" loading="lazy" decoding="async"
                 src="/frontend/assets/shop_social_sidebar_item_image_4ed63.png?1745557375056" alt="Social Instagram" title="Social Instagram">
            Instagram
        </a>








        <a class="hiddenMob" style="background-color: #ffffff;" href="collections/all.html" title="Youtube" aria-label="F1GENZ Smart Furniture - Youtube" target="_blank">
            <img width="32" height="32" loading="lazy" decoding="async"
                 src="/frontend/assets/shop_social_sidebar_item_image_5ed63.png?1745557375056" alt="Social Youtube" title="Social Youtube">
            Youtube
        </a>








        <a class="hiddenMob" style="background-color: #ffffff;" href="collections/all.html" title="Messenger" aria-label="F1GENZ Smart Furniture - Messenger" target="_blank">
            <img width="32" height="32" loading="lazy" decoding="async"
                 src="/frontend/assets/shop_social_sidebar_item_image_6ed63.png?1745557375056" alt="Social Messenger" title="Social Messenger">
            Messenger
        </a>


        <button class="hiddenMob" data-fancybox data-src="#shop-modal-phone" style="background-color: #ffffff;" title="F1GENZ Smart Furniture - Support">
            <img width="32" height="32" loading="lazy" decoding="async"
                 src="/frontend/assets/shop_social_sidebar_item_image_7ed63.png?1745557375056" alt="F1GENZ Smart Furniture - Hổ trợ 24/7" title="Hổ trợ 24/7">
            Hổ trợ 24/7
        </button>
        <button class="back-to-top" title="Back to top">
            <img width="32" height="32" loading="lazy" decoding="async"
                 src="/frontend/assets/arrow-up_eb1426bb7fc647eab89f9279695752cd.png" alt="Back to top" title="Back to top">
            Lên đầu trang
        </button>
    </div>
    <div class="shop-wishlist-modal" data-name="Yêu thích">
        <div class="shop-wishlist-modal-head">
            <div class="container">
                <label>Danh mục sản phẩm yêu thích</label>
                <button type="button" data-type="shop-wishlist-modal-close" title="Đóng"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" x="0" y="0" viewBox="0 0 64 64" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><script></script><path xmlns="http://www.w3.org/2000/svg" d="m4.59 59.41a2 2 0 0 0 2.83 0l24.58-24.58 24.59 24.58a2 2 0 0 0 2.83-2.83l-24.59-24.58 24.58-24.59a2 2 0 0 0 -2.83-2.83l-24.58 24.59-24.59-24.58a2 2 0 0 0 -2.82 2.82l24.58 24.59-24.58 24.59a2 2 0 0 0 0 2.82z" fill="#000000" data-original="#000000" class=""></path></g></svg></button>
            </div>
        </div>
        <div class="container">
            <div class="shop-wishlist-modal-body">
                <p class="shop-wishlist-modal-null wcs-null w-100 text-center">Chưa có sản phẩm trong danh sách yêu thích</p>
            </div>
        </div>
    </div>


    <div class="shop-compare-modal" data-name="So sánh">
        <div class="shop-compare-modal-head">
            <div class="container">
                <label>Danh mục sản phẩm so sánh</label>
                <button type="button" data-type="shop-compare-modal-close" title="Đóng"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" x="0" y="0" viewBox="0 0 64 64" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><script></script><path xmlns="http://www.w3.org/2000/svg" d="m4.59 59.41a2 2 0 0 0 2.83 0l24.58-24.58 24.59 24.58a2 2 0 0 0 2.83-2.83l-24.59-24.58 24.58-24.59a2 2 0 0 0 -2.83-2.83l-24.58 24.59-24.59-24.58a2 2 0 0 0 -2.82 2.82l24.58 24.59-24.58 24.59a2 2 0 0 0 0 2.82z" fill="#000000" data-original="#000000" class=""></path></g></svg></button>
            </div>
        </div>
        <div class="container">
            <div class="shop-compare-modal-body">
                <p class="shop-compare-modal-null wcs-null w-100 text-center">Chưa có sản phẩm trong danh sách so sánh</p>
            </div>
        </div>
    </div>

    <div class="modal fade" id="accountModal" tabindex="-1" role="dialog" aria-labelledby="accountModal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <div class="modalLogo">
                                <a href="index.html" title="F1GENZ Smart Furniture" aria-label="F1GENZ Smart Furniture">
                                    <img src="/frontend/assets/shop_logo_imageed63.png?1745557375056" alt="F1GENZ Smart Furniture">
                                </a>
                            </div>
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" id="modalLoginTab" data-toggle="pill" href="#modalLogin" role="tab" aria-controls="modalLogin" aria-selected="true" title="Đăng nhập" aria-label="Đăng nhập">Đăng nhập</a>
                                <a class="nav-link" id="modalForgetTab" data-toggle="pill" href="#modalForget" role="tab" aria-controls="modalForget" aria-selected="false" title="Quên mật khẩu" aria-label="Quên mật khẩu">Quên mật khẩu</a>
                                <a class="nav-link" id="modalRegisterTab" data-toggle="pill" href="#modalRegister" role="tab" aria-controls="modalRegister" aria-selected="false" title="Đăng ký" aria-label="Đăng ký">Đăng ký</a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="modalLogin" role="tabpanel" aria-labelledby="modalLoginTab">
                                    <label class="text-center">ĐĂNG NHẬP</label>
                                    <div class="login-form-body">
                                        <form method="post" action="https://f1genz-smart-furniture.mysapo.net/account/login" id="customer_login" accept-charset="UTF-8"><input name="FormType" type="hidden" value="customer_login"/><input name="utf8" type="hidden" value="true"/>
                                            <div class="form-group">
                                                <label for="login-email">Email*</label>
                                                <input type="email" id="login-email" class="form-control" name="email" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="login-password">Mật khẩu*</label>
                                                <input type="password" id="login-password" class="form-control" name="password" required>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary hoverOpacity">
                                                    ĐĂNG NHẬP
                                                </button>
                                            </div>
                                        </form>

                                        <div class="socialLogin">
                                            Hoặc đăng nhập bằng:
                                            <a title="Đăng nhập Facebook" aria-label="Đăng nhập Facebook" href="#" class="social-login--facebook" onclick="loginFacebook()"><img width="129" height="37" alt="facebook-login-button" src="http://bizweb.dktcdn.net/assets/admin/images/login/fb-btn.svg"></a>
                                            <a title="Đăng nhập Google" aria-label="Đăng nhập Google" href="#" class="social-login--google" onclick="loginGoogle()"><img width="129" height="37" alt="google-login-button" src="http://bizweb.dktcdn.net/assets/admin/images/login/gp-btn.svg"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="modalForget" role="tabpanel" aria-labelledby="modalForgetTab">
                                    <label class="text-center">QUÊN MẬT KHẨU</label>
                                    <div class="recover-form-body">


                                        <form method="post" action="https://f1genz-smart-furniture.mysapo.net/account/recover" id="recover_customer_password" accept-charset="UTF-8"><input name="FormType" type="hidden" value="recover_customer_password"/><input name="utf8" type="hidden" value="true"/>

                                            <div class="form-group">
                                                <label for="recover-email">Email*</label>
                                                <input type="email" id="recover-email" class="form-control" name="Email" required>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary hoverOpacity">
                                                    Gửi
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="modalRegister" role="tabpanel" aria-labelledby="modalRegisterTab">
                                    <label class="text-center">ĐĂNG KÝ</label>
                                    <div class="register-form-body">
                                        <form method="post" action="https://f1genz-smart-furniture.mysapo.net/account/register" id="customer_register" accept-charset="UTF-8"><input name="FormType" type="hidden" value="customer_register"/><input name="utf8" type="hidden" value="true"/><input type="hidden" id="Token-23fa686583f44c6c807d3e6ad0839549" name="Token" /><noscript data-src="../www.google.com/recaptcha/apif78f.js?render=6Ldtu4IUAAAAAMQzG1gCw3wFlx_GytlZyLrXcsuK"></noscript><noscript>grecaptcha.ready(function() {grecaptcha.execute("6Ldtu4IUAAAAAMQzG1gCw3wFlx_GytlZyLrXcsuK", {action: "customer_register"}).then(function(token) {document.getElementById("Token-23fa686583f44c6c807d3e6ad0839549").value = token});});</noscript>
                                            <div class="form-group">
                                                <label for="register-last-name">Họ của bạn*</label>
                                                <input type="text" id="register-last-name" class="form-control" name="lastName" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="register-first-name">Tên của bạn*</label>
                                                <input type="text" id="register-first-name" class="form-control" name="firstName" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="register-phone">Số điện thoại</label>
                                                <input type="number" id="register-phone" class="form-control" name="phone">
                                            </div>
                                            <div class="form-group">
                                                <label for="register-email">Email*</label>
                                                <input type="email" id="register-email" class="form-control" name="email" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="register-password">Mật khẩu*</label>
                                                <input type="password"  id="register-password" class="form-control" name="password" required>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary hoverOpacity">
                                                    ĐĂNG KÝ
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="closeModal"><i class="lni lni-close"></i></button>
            </div>
        </div>
    </div>



    <div class="pop-sale">
        <div class="pop-sale-img">
            <img width="110" height="110" loading="lazy" decoding="async"
                 src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" alt="sale popup">
        </div>
        <div class="pop-sale-content">
            <a href="#" class="pop-sale-title" aria-label="F1GENZ Smart Furniture"></a>
            <p><span class="pop-sale-name"></span> vừa mua cách đây <span class="pop-sale-minutes"></span> phút</p>
            <a href="#" class="pop-sale-title-buynow">Mua ngay</a>
        </div>
    </div>

    <script>
        if(f1genzPS){
            var scriptTiktok = document.createElement("script");
            scriptTiktok.src = "../sf16-website-login.neutral.ttwstatic.com/obj/tiktok_web_login_static/tiktok/falcon/embed/embed_v1.0.13.js";
            $("head").append(scriptTiktok);
        }
    </script>

    <script >
        $("body").removeClass("preload");
        document.addEventListener('lazybeforeunveil', function(e){
            var bg = e.target.getAttribute('data-bg');
            if(bg) e.target.style.backgroundImage = 'url(' + bg + ')';
        });
        if(window.noPS){
            window.addEventListener("load", (event) => {
                if($('input[name="Token"]').length > 0){
                    $.getScript('../www.google.com/recaptcha/apif78f.js?render=6Ldtu4IUAAAAAMQzG1gCw3wFlx_GytlZyLrXcsuK').done(function(s,r){
                        $('head').append(s);
                        $('input[name="Token"]').each(function(){
                            var flagId = $(this).attr('id');
                            grecaptcha.ready(function() {
                                grecaptcha.execute('6Ldtu4IUAAAAAMQzG1gCw3wFlx_GytlZyLrXcsuK', {action: 'submit'})
                                    .then(function(token) {
                                        document.getElementById(flagId).value = token;
                                    });
                            });
                        })
                    });
                }

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

    @stack('script')
</body>

</html>
