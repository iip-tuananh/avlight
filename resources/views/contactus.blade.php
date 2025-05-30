@extends('layouts.main.master')
@section('title')
Liên hệ với chúng tôi
@endsection
@section('description')
Liên hệ với chúng tôi
@endsection
@section('image')
{{url(''.$setting->logo)}}
@endsection
@section('css')
@endsection
@section('js')
@endsection
@section('content')
    <style>
        .page-about-new-main {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;            /* khoảng cách giữa các item */
            margin-bottom: 40px;  /* nếu cần cách dưới */
        }

        .page-about-new-main-item {
            flex: 1 1 calc(25% - 20px); /* 4 cột, trừ gap */
            background: #f8f8f8;
            text-align: center;
            padding: 30px 20px;
            box-sizing: border-box;
            border-radius: 4px;
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .page-about-new-main-item:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        .page-about-new-main-item .icon-circle {
            width: 60px;
            height: 60px;
            margin: 0 auto 15px;
            border-radius: 50%;
            background-color: #f28c4b;  /* cam như mẫu */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .page-about-new-main-item .icon-circle i {
            color: #fff;
            font-size: 24px;
        }

        .page-about-new-main-item h3 {
            margin: 0 0 10px;
            font-size: 18px;
            font-weight: 600;
            color: #0048b3; /* xanh đậm */
            line-height: 1.2;
        }

        .page-about-new-main-item p {
            margin: 0;
            font-size: 14px;
            color: #0048b3;
            line-height: 1.5;
        }

        /* Responsive: khi màn hình nhỏ hơn 768px, 2 cột */
        @media (max-width: 768px) {
            .page-about-new-main-item {
                flex: 1 1 calc(50% - 20px);
            }
        }

        /* Mobile: 1 cột */
        @media (max-width: 480px) {
            .page-about-new-main-item {
                flex: 1 1 100%;
            }
        }

        .page-about-new-main-item {
            /* nếu bạn đang dùng flex row cũ, override lại */
            display: flex !important;
            flex-direction: column !important;
            align-items: center;
            text-align: center;
        }

        /* cho icon tách ra khỏi tiêu đề */
        .page-about-new-main-item .icon-circle {
            margin-bottom: 12px;
        }

        /* tiêu đề cách icon */
        .page-about-new-main-item h3 {
            margin: 0 0 8px;
            /* nếu bạn muốn font-size hay màu khác, chỉnh ở đây */
        }

        /* phần nội dung (p) để ngay dưới tiêu đề */
        .page-about-new-main-item p {
            margin: 0;
        }

    </style>
    <div class="page-about-new" data-page-id="2537055">
        <div class="main-blog-breadcrumb" title="Về chúng tôi" style='margin-top: 10px'>
            <div class="container">
                <div hidden class="section-title-all">
                    <h1>Thông tin liên hệ</h1>
                </div>
                <div class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" aria-label="Trang chủ" title="Trang chủ">Trang chủ</a></li>


                        <li class="breadcrumb-item active"><span>Thông tin liên hệ</span></li>
                    </ol>
                </div>		</div>
        </div>
        <div class="container">

            <div class="page-about-new-main">
                <div class="page-about-new-main-item">
                    <div class="icon-circle">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                    <h3>Địa chỉ</h3>
                    <p>{{$setting->address1}}</p>
                </div>

                <div class="page-about-new-main-item">
                    <div class="icon-circle">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h3>Hotline</h3>
                    <p>{{$setting->phone1}}</p>
                </div>

                <div class="page-about-new-main-item">
                    <div class="icon-circle">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3>Email</h3>
                    <p>{{$setting->email}}</p>
                </div>

                <div class="page-about-new-main-item">
                    <div class="icon-circle">
                        <i class="far fa-clock"></i>
                    </div>
                    <h3>Open Time</h3>
                    <p>T2 - T7<br>(8.30AM – 05.30PM)</p>
                </div>

                <div class="page-about-new-contact">
                    <form method="post"  action="{{route('postcontact')}}" id="contact" accept-charset="UTF-8">
                        @csrf
                        <input name="FormType" type="hidden" value="contact"/>
                        <input name="utf8" type="hidden" value="true"/>
                        <div class="section-title-all">
                            <span>Kết nối ngay với chúng tôi</span>
                            <h1 hidden>Liên hệ</h1>
                        </div>
                        <input required type="text" id="contactFormName" class="form-control input-lg" name="name"
                               placeholder="Tên của bạn"  value="">

                        <input required type="text" id="contactFormPhone" class="form-control input-lg"
                               name="phone" placeholder="Số điện thoại của bạn" value="">

                        <input  type="email" name="email" placeholder="Email của bạn"
                               id="contactFormEmail" class="form-control input-lg" value="">

                        <textarea required rows="6" name="message" class="form-control" placeholder="Lời nhắn cho chúng tôi" id="contactFormMessage"></textarea>
                        <button type="submit" class="btn btn-outline insButton" title="Gửi thông tin">Gửi thông tin</button>

                        <ul class="shop-social">
                            <li>
                                <a href="../collections/all.html" target="_blank" aria-label="F1GENZ Smart Furniture - Facebook" title="F1GENZ Smart Furniture - Facebook">
                                    <img width="30" height="30" loading="lazy" title="F1GENZ Smart Furniture - Facebook"
                                         src="/frontend/assets/facebook__6__53aaa8d352524d3eb025af5203eaa437_icon.png" alt="F1GENZ Smart Furniture - Facebook">
                                </a>
                            </li>

                            <li>
                                <a href="../collections/all.html" target="_blank" aria-label="F1GENZ Smart Furniture - Youtube" title="F1GENZ Smart Furniture - Youtube">
                                    <img width="30" height="30" loading="lazy" title="F1GENZ Smart Furniture - Youtube"
                                         src="/frontend/assets/youtube__5__4f04522e10494557a651f53a33ad4d76_icon.png" alt="F1GENZ Smart Furniture - Youtube">
                                </a>
                            </li>

                            <li>
                                <a href="../collections/all.html" target="_blank" aria-label="F1GENZ Smart Furniture - Pinterest" title="F1GENZ Smart Furniture - Pinterest">
                                    <img width="30" height="30" loading="lazy" title="F1GENZ Smart Furniture - Pinterest"
                                         src="/frontend/assets/pinterest_a1a15995132a4275845412deba5f1193_icon.png" alt="F1GENZ Smart Furniture - Youtube">
                                </a>
                            </li>

                            <li>
                                <a href="../collections/all.html" target="_blank" aria-label="F1GENZ Smart Furniture - TikTok" title="F1GENZ Smart Furniture - TikTok">
                                    <img width="30" height="30" loading="lazy" title="F1GENZ Smart Furniture - TikTok"
                                         src="/frontend/assets/tik-tok_d85bb4e7468c43ac9ed5437649b7405c_icon.png" alt="F1GENZ Smart Furniture - TikTok">
                                </a>
                            </li>

                            <li>
                                <a href="../collections/all.html" target="_blank" aria-label="F1GENZ Smart Furniture - Instagram" title="F1GENZ Smart Furniture - Instagram">
                                    <img width="30" height="30" loading="lazy" title="F1GENZ Smart Furniture - Instagram"
                                         src="/frontend/assets/instagram__3__7de3ebbce1f24003b516ca6c1d7c24d5_icon.png" alt="F1GENZ Smart Furniture - Instagram">
                                </a>
                            </li>
                        </ul></form>
                    <div class="page-about-new-contact-map">
                        {!!$setting->iframe_map!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $('#contact').on('submit', function(e) {
            e.preventDefault();
            var $form = $(this);
            var url   = $form.attr('action');
            var data  = $form.serialize();

            // disable button để tránh bấm nhiều lần
            var $btn = $form.find('button[type="submit"]');
            $btn.prop('disabled', true).text('Đang gửi...');

            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                dataType: 'json'
            })
                .done(function(res) {
                    // nếu status success
                    if (res.status === 'success') {
                        toastr.success(res.message);
                        $form[0].reset();
                    } else {
                        toastr.error(res.message || 'Có lỗi, thử lại sau.');
                    }
                })
                .fail(function(xhr) {
                    // lỗi server hoặc validation
                    var msg = 'Gửi thất bại';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        msg = xhr.responseJSON.message;
                    }
                    toastr.error(msg);
                })
                .always(function() {
                    // restore button
                    $btn.prop('disabled', false).text('Gửi thông tin');
                });
        });
    </script>

@endpush
