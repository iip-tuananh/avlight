@extends('layouts.main.master')
@section('title')
Dự án của chúng tôi
@endsection
@section('description')
Dự án của chúng tôi
@endsection
@section('image')
{{url(''.$setting->logo)}}
@endsection
@section('js')
@endsection
@section('css')
@endsection
@section('content')
<main class="main">

   <!-- breadcrumb -->
   <div class="site-breadcrumb" style="background: url({{url('frontend/img/breadcrumb.jpg')}})">
       <div class="container">
           <ul class="breadcrumb-menu">
               <li><a href="{{route('home')}}">Trang chủ</a></li>
               <li class="active">Dự án  </li>
           </ul>
       </div>
   </div>
   <div class="blog-area py-80">
      <div class="container">
          <div class="row">
              <div class="col-lg-6 mx-auto">
                  <div class="site-heading text-center wow fadeInDown" data-wow-delay=".25s">
                      <span class="site-title-tagline"><i class="fas fa-truck-container"></i> Our Project</span>
                      <h2 class="site-title">Dự án <span>của chúng tôi</span></h2>
                      <div class="heading-divider"></div>
                  </div>
              </div>
          </div>
      
          @if (count($duan) > 0)

             
          <div class="row g-4">
            @foreach ($duan as $item)
            @php
                
                $img = json_decode($item->images);
               
            @endphp
              <div class="col-md-6 col-lg-4">
                  <div class="blog-item wow fadeInUp" data-wow-delay=".25s">
                     <div class="blog-item-img">
                        <a href="{{ route('duanTieuBieuDetail', $item->slug) }}">
                           <img src="{{ isset($img[0]) ? $img[0] : url('frontend/img/default.jpg') }}" alt="Thumb" class="img-pro">
                        </a>
                     </div>
                     <div class="blog-item-info">
                        <div class="blog-item-meta">
                           <ul>
                              <li><a href="{{ route('duanTieuBieuDetail', $item->slug) }}"><i class="far fa-calendar"></i> {{date_format($item->created_at,'d/m/Y')}}</a></li>
                           </ul>
                        </div>
                        <h4 class="blog-title">
                           <a href="{{ route('duanTieuBieuDetail', $item->slug) }}">{{ $item->name }}</a>
                        </h4>
                        <p class="line_2">
                           <div class="line-camp-2">

                              {!!languageName($item->description)!!}
                           </div>
                        </p>
                        <a class="theme-btn" href="{{ route('duanTieuBieuDetail', $item->slug) }}">Chi Tiết<i
                           class="fas fa-arrow-right"></i></a>
                     </div>
                  </div>
              </div>
              @endforeach
          </div>
          <!-- pagination -->
          <div class="pagination-area">
              {{$duan->links()}}
          </div>
          @else 
          <h3>Nội dung đang cập nhật...</h3>
          @endif
          <!-- pagination end -->
      </div>
  </div>
</main>

@endsection
