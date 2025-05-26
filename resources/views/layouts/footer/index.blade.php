<footer class="footers2" style="background-image: url(/frontend/assets/footers2_backgrounded63.jpg?1745557375056)">
    <div class="container">
        <div class="footers2-wrap">
            <div class="footers2-top">
                <div class="footers2-top-item footers2-top-one">
                    <a href="#" title="F1GENZ Smart Furniture" aria-label="{{$setting->webname}}">
                        <img title="F1GENZ Smart Furniture" loading="lazy"
                             src="{{$setting->fbPixel}}" alt="{{$setting->webname}}">
                    </a>
                    <p>  {{$setting->webname}}</p>
                    <p class="footers2-top-info">
                        <a role="button">
                            <img src="/frontend/assets/location1c9c.png?1719981214925" loading="lazy" decoding="async"
                                 alt="F1GENZ Smart Furniture">
                            {{$setting->address1}}
                        </a>
                    </p>
                    <p class="footers2-top-info">
                        <a href="mailto:{{$setting->email}}n" title="Liên hệ ngay support@sapo.vn">
                            <img src="/frontend/assets/mail1c9c.png?1719981214925" loading="lazy" decoding="async" alt="F1GENZ Smart Furniture" title="Liên hệ ngay">
                            {{$setting->email}}
                        </a>
                    </p>
                    <p class="footers2-top-info">
                        <a href="tel:{{$setting->phone1}}" title="Liên hệ ngay 19006750">
                            <img src="/frontend/assets/phone1c9c.png?1719981214925" loading="lazy" decoding="async" alt="F1GENZ Smart Furniture" title="Liên hệ ngay">
                            {{$setting->phone1}}
                        </a>
                    </p>
                </div>
                <div class="footers2-top-item footers2-top-two">
                    <h4>Liên hệ <i class="fa fa-chevron-down"></i></h4>
                    <div class="footers2-top-item-content">
                        <p>Tư vấn dịch vụ: <a aria-label="Liên hệ" title="Liên hệ" href="tel:{{$setting->phone1}}">{{$setting->phone1}}</a> <br />
                            Hỗ trợ sử dụng: <a aria-label="Liên hệ" title="Liên hệ" href="tel:{{$setting->phone1}}">{{$setting->phone1}}</a> <br />
                            Hỗ trợ vận chuyển: <a aria-label="Liên hệ" title="Liên hệ" href="tel:{{$setting->phone1}}">{{$setting->phone1}}</a> <br />
                            Email: <a aria-label="Liên hệ" title="Liên hệ" href="mailto:support@sapo.vn">{{$setting->email}}</a> <br />
                            Từ 7h00 – 22h00 các ngày từ thứ 2 đến Chủ nhật</p>
                    </div>
                </div>
                <div class="footers2-top-item footers2-top-three">
                    <h4>Sản phẩm<i class="fa fa-chevron-down"></i></h4>
                    <div class="footers2-top-item-content">
                        <ul>
                            @foreach ($categoryhome as $item)
                                <li><a href="{{ route('allListProCate', $item->slug) }}"
                                       title="Trang chủ" aria-label="Trang chủ">{!! languageName($item->name) !!}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="footers2-top-item footers2-top-four">
                    <h4>Chính sách & điều khoản <i class="fa fa-chevron-down"></i></h4>
                    <div class="footers2-top-item-content">
                        <ul>
                            @foreach ($pageContent as $item)
                                @if ($item->type === 'ho-tro-khanh-hang')
                                    <li><a href="{{route('pagecontent',['slug'=>$item->slug])}}"><i class="far fa-angle-double-right"></i>{{$item->title}}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="footers2-top-item footers2-top-five">
                    <h4>Liên hệ với chúng tôi <i class="fa fa-chevron-down"></i></h4>
                    <div class="footers2-top-item-content">
                        <p>Luôn cập nhật tất cả các hành động mà chúng tôi đã lưu cho tất cả khách hàng của mình.</p>
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
                        </ul>					</div>
                </div>
            </div>

            <div class="section_index--newletter">
                <div class="section_index--newletter-wrap">
                    <div class="section_index--newletter-left">
                        <h2> Nhận ưu đãi và thông tin mới nhất!</h2>
                        <p>Chúng tôi cam kết bảo mật không lộ thông tin của bạn.</p>
                        <p>Nhận ngay deal hời<b> 5%</b> khi đăng ký tư vấn ngay</p>
                    </div>
                    <div class="section_index--newletter-right">
                        <form id="mc-form10" action="https://gmail.us21.list-manage.com/subscribe/post?u=ddd0880c66f534593afa12e75&amp;id=fe6449bc79&amp;f_id=00cd9be1f0">
                            <input aria-label="Địa chỉ Email" type="email" placeholder="Nhập email của bạn" name="EMAIL" required autocomplete="off">
                            <button type="submit" aria-label="Đăng ký nhận tin" name="subscribe">Đăng ký</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="footers2-bot">
                <p class="text-copyright">© 2025 - Copyright 2025 <strong>AVLight Solutions</strong> All Rights Reserved
                </p>
                <ul class="shop-payment">
                    <li class="shop-payment-item">
                        <a href="index.html" aria-label="/ - Payment" title="Visa - Payment">
                            <img width="76" height="48" loading="lazy" src="/frontend/assets/shop_payment_item_image_1ed63.png?1745557375056" alt="Visa - Payment">
                        </a>
                    </li>
                    <li class="shop-payment-item">
                        <a href="index.html" aria-label="/ - Payment" title="Master - Payment">
                            <img width="76" height="48" loading="lazy" src="/frontend/assets/shop_payment_item_image_2ed63.png?1745557375056" alt="Master - Payment">
                        </a>
                    </li>
                    <li class="shop-payment-item">
                        <a href="index.html" aria-label="/ - Payment" title="Paypal - Payment">
                            <img width="76" height="48" loading="lazy" src="/frontend/assets/shop_payment_item_image_3ed63.png?1745557375056" alt="Paypal - Payment">
                        </a>
                    </li>
                    <li class="shop-payment-item">
                        <a href="index.html" aria-label="/ - Payment" title="Americon - Payment">
                            <img width="76" height="48" loading="lazy" src="/frontend/assets/shop_payment_item_image_4ed63.png?1745557375056" alt="Americon - Payment">
                        </a>
                    </li>
                    <li class="shop-payment-item">
                        <a href="index.html" aria-label="/ - Payment" title="Bitcon - Payment">
                            <img width="76" height="48" loading="lazy" src="/frontend/assets/shop_payment_item_image_5ed63.png?1745557375056" alt="Bitcon - Payment">
                        </a>
                    </li>
                </ul>			</div>
        </div>
    </div>
</footer>
