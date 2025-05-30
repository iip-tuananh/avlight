@extends('layouts.main.master')
@section('title')
    {{ $detail_service->name }}
@endsection
@section('description')
    {{ languageName($detail_service->description) }}
@endsection
@section('image')
    {{ url('' . $detail_service->image) }}
@endsection
@section('css')
    <link rel="preload stylesheet" as="style" fetchpriority="low" href="/frontend/assets/article.scssed63.css">

@endsection
@section('js')
@endsection
@section('content')
    <div class="main-article">
        <div class="main-article-breadcrumb" title="">
            <div class="container">
                <div class="breadcrumb-wrap">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" aria-label="Trang chủ" title="Trang chủ">Trang chủ</a></li>

                        <li class="breadcrumb-item active"><span>{{ $detail_service->name }}</span></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="main-article-menu sidebar">
                <label>Mục lục bài viết</label>
                <div class="main-article-menu-data"></div>
            </div>
            <div class="main-article-wrap">
                <div class="main-article-wrap-avatar">
                    <img loading="eager" decoding="sync" fetchpriority="high" width="600" height="400" class="w-auto"
                         src="{{ $detail_service->image }}"
                         alt="{{ $detail_service->name }}">
                </div>
                <h3>{{ $detail_service->name }}</h3>


                <div class="main-article-content" data-size="16" style="--share_font: 16px">
                    {!! languageName($detail_service->content) !!}
                </div>


            </div>
            <div class="main-article-right">

                <div class="main-article-right-newest">
                    <div class="section-title-all">
                        <span>Dịch vụ khác</span>
                    </div>

                    @foreach ($servicehome as $k => $item)
                        <div class="article-item layout-small" data-index="{{ $k + 1 }}">
                            <div class="article-item-wrap">
                                <a href="{{ route('serviceDetail', ['slug' => $item->slug]) }}" class="article-item-image"
                                   title="{{ $item->name }}">
                                    <img loading="lazy" decoding="async" width="600" height="400"
                                         src="{{ $item->image }}" alt="{{ $item->name }}">
                                </a>
                                <div class="article-item-detail">
                                    <h3 class="article-item-detail-title"><a
                                            title="{{ $item->name }}"
                                            href="{{ route('serviceDetail', ['slug' => $item->slug]) }}">{{ $item->name }}</a></h3>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>



                <div class="main-article-right-menu">
                   <style>
                       /* === Container & Tiêu đề === */
                       .main-article-right-menu {
                           background: #fff;
                           padding: 24px;
                           border: 1px solid #e0e0e0;
                           border-radius: 8px;
                           box-shadow: 0 2px 8px rgba(0,0,0,0.05);
                       }
                       .main-article-right-menu .section-title-all {
                           font-size: 1.25rem;
                           font-weight: 600;
                           color: #d32f2f;
                           margin-bottom: 16px;
                           display: flex;
                           align-items: center;
                       }
                       .main-article-right-menu .section-title-all span {
                           margin-left: 8px;
                       }

                       /* === Form & Fieldset === */
                       .main-article-right-menu form {
                           width: 100%;
                       }
                       .main-article-right-menu .form-group {
                           margin-bottom: 16px;
                       }

                       /* === Icon + Input wrapper === */
                       .main-article-right-menu .form-icon {
                           position: relative;
                       }
                       .main-article-right-menu .form-icon i {
                           position: absolute;
                           top: 50%;
                           left: 12px;
                           transform: translateY(-50%);
                           color: #888;
                           font-size: 1.1rem;
                       }
                       .main-article-right-menu .form-control,
                       .main-article-right-menu .select {
                           width: 100%;
                           padding: 10px 12px 10px 40px;
                           font-size: 0.95rem;
                           color: #333;
                           border: 1px solid #ccc;
                           border-radius: 4px;
                           background: #fafafa;
                           transition: border-color .2s;
                       }
                       .main-article-right-menu .form-control:focus,
                       .main-article-right-menu .select:focus {
                           outline: none;
                           border-color: #d32f2f;
                           background: #fff;
                       }

                       /* === Select đặc biệt === */
                       .main-article-right-menu .select {
                           -webkit-appearance: none;
                           -moz-appearance: none;
                           appearance: none;
                           background-image: url("data:image/svg+xml;charset=UTF-8,<svg width='12' height='8' xmlns='http://www.w3.org/2000/svg'><path d='M1 1l5 5 5-5' stroke='%23888' stroke-width='2' fill='none' fill-rule='evenodd'/></svg>");
                           background-repeat: no-repeat;
                           background-position: right 12px center;
                           background-size: 12px 8px;
                           cursor: pointer;
                       }

                       /* === Button gửi yêu cầu === */
                       .main-article-right-menu .theme-btn {
                           display: block;
                           width: 100%;
                           padding: 12px 0;
                           font-size: 1rem;
                           font-weight: 600;
                           color: #fff;
                           background-color: #d32f2f;
                           border: none;
                           border-radius: 4px;
                           text-align: center;
                           cursor: pointer;
                           transition: background-color .2s, box-shadow .2s;
                       }
                       .main-article-right-menu .theme-btn:hover {
                           background-color: #b71c1c;
                           box-shadow: 0 4px 12px rgba(0,0,0,0.1);
                       }

                       /* === Responsive nhỏ màn hình === */
                       @media (max-width: 576px) {
                           .main-article-right-menu {
                               padding: 16px;
                           }
                           .main-article-right-menu .section-title-all {
                               font-size: 1.1rem;
                           }
                       }

                       /* Wrapper chung */
                       .form-icon {
                           position: relative;
                           display: flex;
                           flex-direction: column;
                           margin-bottom: 1.5rem;  /* Khoảng cách xuống khối kế tiếp */
                       }

                       /* Icon bên trái */
                       .form-icon i {
                           position: absolute;
                           top: 50%;
                           left: 12px;
                           transform: translateY(-50%);
                           color: #888;
                           pointer-events: none;
                       }

                       /* Input có padding đủ chừa chỗ cho icon */
                       .form-icon .form-control {
                           width: 100%;
                           padding: 10px 12px 10px 40px;
                           box-sizing: border-box;
                       }

                       /* Label lỗi nằm ngay dưới input, lệch sang phải để không đè icon */
                       .form-icon label.error {
                           position: absolute;
                           top: calc(100% + 4px);  /* 4px cách input */
                           font-size: 0.875rem;
                           color: #d32f2f;
                       }

                       /* Khi có .error trên input, viền đỏ */
                       .form-icon .form-control.error {
                           border-color: #d32f2f;
                       }

                       .spin-icon i {
                           font-size: 0.9rem;
                       }

                   </style>

                    <div class="section-title-all">
                        <span>Yêu cầu tư vấn</span>
                    </div>
                    <form id="commentform">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-icon">
                                        <i class="far fa-user-tie"></i>
                                        <input type="text" class="form-control" name="name"
                                               placeholder="Họ Tên">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-icon">
                                        <i class="far fa-phone"></i>
                                        <input type="text" class="form-control" name="phone"
                                               placeholder="Số điện thoại">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-icon">
                                        <i class="far fa-envelope"></i>
                                        <input type="email" class="form-control" name="email"
                                               placeholder="Email">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-icon">
                                        <i class="far fa-truck"></i>
                                        <select class="select" name="service">
                                            <option value="">Dịch vụ tư vấn</option>
                                            @foreach ($servicehome as $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
{{--                                <button type="submit" class="theme-btn"><span--}}
{{--                                        class="loader ml-15 spin-icon"></span> Gửi yêu cầu</button>--}}

                                <button type="submit" class="theme-btn" id="comment-submit">
                                    <span class="btn-text">Gửi yêu cầu</span>
                                    <span class="spin-icon" style="display:none; margin-left:8px;">
                                        <i class="fas fa-spinner fa-pulse"></i>
                                        </span>
                                </button>
                            </div>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>

    <script>
        $('#commentform').validate({
            rules: {
                "name": {
                    required: true,
                },
                "phone": {
                    required: true,
                    minlength: 10,
                    digits: true,
                }
            },
            messages: {
                "name": {
                    required: "Tên bạn là gì?",
                },
                "phone": {
                    required: "Nhập sdt liên hệ",
                    digits: "Nhập đúng định dạng số điện thoại",
                    minlength: "Nhập tối thiểu 10 số"
                }
            },
            submitHandler: function(form) {
                var $btn    = $('#comment-submit'),
                    $text   = $btn.find('.btn-text'),
                    $spinner= $btn.find('.spin-icon');

                $btn.prop('disabled', true);
                $spinner.show();

                $(".spin-icon").css("display", "block");
                $.ajax({
                    url: "https://script.google.com/macros/s/AKfycbyzVnC9pnnBRgBxGkLCpFVIT4bf73Gp__7kNONNhXGFOJidpO0MlkhmZPtTLcPpd8OJMA/exec",
                    type: "post",
                    data: $("#commentform").serializeArray(),
                    success: function() {
                        $(".spin-icon").css("display", "none");
                        jQuery.notify("Thành công! Chúng tôi sẽ sớm liên hệ", "success");
                    },
                    error: function() {
                        jQuery.notify("Gửi thông tin thất bại", "error");
                    },
                    complete: function() {
                        // re-enable + hide spinner
                        $spinner.hide();
                        $btn.prop('disabled', false);
                    }
                });
            }
        });
    </script>
@endpush
