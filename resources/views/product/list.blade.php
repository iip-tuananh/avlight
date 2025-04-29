@extends('layouts.main.master')
@section('title')
{{$title}}
@endsection
@section('description')
Danh sách {{$title}}
@endsection
@section('image')
{{url(''.$setting->logo)}}
@endsection
@section('js')
@endsection
@section('css')
@endsection
@section('content')
<div class="blog-area pb-80 pt-80">
   <div class="container">
      <div class="row">
         <div class="col-lg-6 mx-auto">
            <div class="site-heading text-center wow fadeInDown" data-wow-delay=".25s">
               <span class="site-title-tagline"><i class="fas fa-truck-container"></i>Product</span>
               <h2 class="site-title">{{$title}}</h2>
               <div class="heading-divider"></div>
            </div>
         </div>
      </div>
      @if($list->isEmpty())
     <div class="thongba" style="width:100%; align:center">Hiện tại chưa có sản phẩm nào </div>
   @else
   <div class="row">
      <div class="product-tuan-slider owl-carousel">
         @foreach ($list as $item)

         @php
         $img = json_decode($item->images);
         // dd($item);
         @endphp
         <form action="{{ route('add.to.cart') }}" method="post" class="variants product-action" data-cart-form
            data-id="{{ $item->id }}" enctype="multipart/form-data">
            @csrf
            <div class="blog-item wow fadeInUp tuanproduct" data-wow-delay=".25s">
               <div class="blog-item-img">
                  <a href="{{route('detailProduct',['cate'=>$item->cate_slug,'type'=>$item->type_slug ? $item->type_slug : 'loai','id'=>$item->id])}}">
                  <img class="lazy" data-src="{{ $img[0] ?? 'default-image.jpg' }}" alt="Thumb">
                  </a>
               </div>

               {{-- ==================== --}}
               <div class="blog-item-info" style="text-align: center">
                
                  <h4 class="blog-title">
                     <a class="line-camp-2 text-t" href="{{route('detailProduct',['cate'=>$item->cate_slug,'type'=>$item->type_slug ? $item->type_slug : 'loai','id'=>$item->id])}}">{!!languageName( $item->name )!!}</a>
                  </h4>
                  @if($item->price>0)
                      @if($item->discount > 0)
                          <span
                          class="special-price font-weight-bold" style="color: red; font-weight:700">{{ number_format($item->discount) }}₫</span>
                          &nbsp; &nbsp;
                          <del class="old-price"> {{ number_format($item->price) }}₫</del>
                          <div class="theme-btn " style="background-color: rgb(197, 0, 0)">
                          <button class="but1 themgio" data-id="{{ $item->id }}">Thêm vào giỏ hàng</i></button>
                          </div>
                      @else
                          <span
                          class="special-price font-weight-bold" style="color: red; font-weight:700">{{ number_format($item->price) }}₫</span>
                          <div class="theme-btn " style="background-color: rgb(197, 0, 0)">
                              <button class="but1 themgio" data-id="{{ $item->id }}">Thêm vào giỏ hàng</i></button>
                              </div>
                      @endif
                  @else
                  <span
                          class="special-price font-weight-bold" style="color: red; font-weight:700">Đang cập nhật</span>
                          <div class="theme-btn " style="background-color:#025aa1">
                              <button class="but2 ">Xem thêm </i></button>
                              </div>
                  @endif           
               </div>
               {{-- ================================== --}}
            </div>
         </form>
         @endforeach
      </div>
   </div>
   <div class="row">
      <div class="col-lg-12 text-center">
         <div class="pagination-area">
            <ul class="pagination">
               {{ $list->links() }}
            </ul>
         </div>
   </div>
</div>
   @endif
</div>
@endsection

