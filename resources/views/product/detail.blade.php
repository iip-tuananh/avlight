@extends('layouts.main.master')
@section('title')
    {{ languageName($product->name) }}
@endsection
@section('description')
    {{ languageName($product->description) }}
@endsection
@section('image')
    @php
        $img = json_decode($product->images);

        $thongso = json_decode($product->size);
    @endphp
    {{ url('' . $img[0]) }}
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/vc_carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.tosrus.min.all.css') }}">
@endsection
@section('js')
    <script src="{{ asset('frontend/js/vc_carousel.min.js') }}"></script>
@endsection
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <div class="container mt-5">
        <div class="row">
       
            <!-- Product Images -->
            <div class="col-md-7 mb-4">

                <img src="{{ $img[0] }}" alt="Product" class="img-fluid rounded mb-3 product-image" id="mainImage">
                <div class="d-flex justify-content-between">
                    <!-- filepath: c:\laragon\www\avlight\resources\views\product\detail.blade.php -->
                    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="product-detail-slider owl-carousel">
                            @foreach ($img as $index => $i)
                                <img src="{{ $i }}" class="d-block w-100 rounded thumb-tuan" alt="Product Image"
                                    onclick="changeImage(event, this.src)">
                            @endforeach
                        </div>
                     
                    </div>

                </div>
            </div>

            <!-- Product Details -->
            <div class="col-md-5">
                <form enctype="multipart/form-data" action="{{ route('add.to.cart') }}" method="post"
                class="form-inline">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <h2 class="mb-3">{!! languageName($product->name) !!}</h2>
                {{-- <p class="text-muted mb-4">SKU: WH1000XM4</p> --}}
                @if ($product->price > 0)
                    @if($product->discount > 0)
                    <div class="mb-3">
                        <span class="h4 me-2" style="color: red">{{ number_format($product->discount, 0, ',', '.') }} VND</span>
                        <span class="text-muted"><s>{{ number_format($product->price, 0, ',', '.') }} VND</s></span>
                    </div>
    
                    <p class="mb-4 "  > <div style="text-align: justify">{!! languageName($product->description) !!}</div></p>
    
                    <div class="mb-4">
                        <div class="custom custom-btn-number show">
                            <label class="sl section">Số lượng:</label>
                            <div
                                class="input_number_product form-control d-flex align-items-center">
                                <button type="button" class="btn btn-decrement"
                                    onclick="decrementQuantity()">-</button>
                                <input type="number" id="quantity" name="quantity"
                                    value="1" min="1" class="text-center"
                                    style="width: 50px;" />
                                <button type="button" class="btn btn-increment"
                                    onclick="incrementQuantity()">+</button>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-lg mb-3 me-2 detail-add-to-card" style="width: 100%;">Mua ngay</button>
                    @else
                    <div class="mb-3">
                        <span class="h4 me-2" style="color: red">{{ number_format($product->price, 0, ',', '.') }} VND</span>
                        
                    </div>
    
                    <p class="mb-4 "  > <div style="text-align: justify">{!! languageName($product->description) !!}</div></p>
    
                    <div class="mb-4">
                        <div class="custom custom-btn-number show">
                            <label class="sl section">Số lượng:</label>
                            <div
                                class="input_number_product form-control d-flex align-items-center">
                                <button type="button" class="btn btn-decrement"
                                    onclick="decrementQuantity()">-</button>
                                <input type="number" id="quantity" name="quantity"
                                    value="1" min="1" class="text-center"
                                    style="width: 50px;" />
                                <button type="button" class="btn btn-increment"
                                    onclick="incrementQuantity()">+</button>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-lg mb-3 me-2 detail-add-to-card" style="width: 100%;">Mua ngay</button>
                    @endif
                @else
                    <div class="mb-3">
                        <span class="h4 me-2" style="color: red">Đang cập nhật</span>
                    </div>
    
                    <p class="mb-4 "  > <div style="text-align: justify">{!! languageName($product->description) !!}</div></p>
    
                    <div class="mb-4">
                       <a style="width:100%" class="btn btn-danger btn-lg mb-3 me-2" href="tel:+{{$setting->phone1}}">Liên Hệ Để Nhận Báo Giá</a>
                    </div>
                @endif
              
       

                </form>
            </div>
        
        </div>
        <div class="row ">
            <div class="col-md-9 tuan-cus">
                <h2>Thông tin chi tiết</h2>
                {!! languageName($product->content) !!}
            </div>
            <div class="col-md-3 tuan-cus">
                <h2>Sản phẩm liên quan</h2>
                <ul>
                    @foreach ($productlq as $item)
                        @php
                            $ite = json_decode($item->images);
                        @endphp
                        <li class="d-flex align-items-center mb-2 p-2">
                            <img src="{{ $ite[0] }}" alt="" srcset="" width="50px" height="50px"
                                style="padding: 5px"><a href="" class="p-2">{!! languageName($item->name) !!}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function changeImage(event, src) {
            document.getElementById('mainImage').src = src;
            document.querySelectorAll('.thumbnail').forEach(thumb => thumb.classList.remove('active'));
            event.target.classList.add('active');
        }
    </script>
     <script>
        function incrementQuantity() {
            const quantityInput = document.getElementById('quantity');
            quantityInput.value = parseInt(quantityInput.value) + 1;
        }

        function decrementQuantity() {
            const quantityInput = document.getElementById('quantity');
            if (parseInt(quantityInput.value) > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
            }
        }
    </script>
    
@endsection
