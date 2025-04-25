@extends('layouts.main.master')
@section('title')
{{$setting->company}}
@endsection
@section('description')
{{$setting->webname}}
@endsection
@section('image')
{{url(''.$banner[0]->image)}}
@endsection
@section('css')
@endsection
@section('js')
@endsection
@section('content')
<main class="main">
   <!-- hero area -->
   <div class="hero-section">
      <div class="hero-slider owl-carousel">
         @foreach ($banner as $item)
         <div class="hero-single" style="background-image: url({{$item->image}});">
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-md-12 col-lg-6">
                     <div class="hero-content">
                        <h6 class="hero-sub-title" data-animation="fadeInUp" data-delay=".25s">
                           <i class="fal fa-truck-container"></i> Fast Speed - Safe Journey
                        </h6>
                        <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                          {!!$item->title!!}
                        </h1>
                        <p data-animation="fadeInLeft" data-delay=".75s">
                           {!!$item->description!!}
                        </p>
                        <div class="hero-btn" data-animation="fadeInUp" data-delay="1s">
                           <a href="{{route('aboutUs')}}" class="theme-btn">Về chúng tôi<i
                              class="fas fa-arrow-right"></i></a>
                           <a href="{{$item->link}}" class="theme-btn2">Chi tiết<i
                              class="fas fa-arrow-right"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
   <!-- hero area end -->
   <!-- feature area -->
   <div class="feature-area fa-negative">
      <div class="container">
         <div class="feature-wrap">
            <div class="col-lg-12">
               <div class="row g-4">
                  @foreach ($bannerads as $key => $item)
                  <div class="col-md-6 col-lg-4">
                     <div class="feature-item wow fadeInUp" data-wow-delay=".25s">
                        <span class="count">0{{$key+1}}</span>
                        <div class="feature-icon">
                           <img class="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{$item->image}}" alt="">
                        </div>
                        <div class="feature-content">
                           <h4>{{$item->name}}</h4>
                           <p>{{$item->description}}
                           </p>
                        </div>
                     </div>
                  </div>
                  @endforeach
                  
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- feature area end -->
  
   <!-- about area -->
   <div class="about-area py-80">
      <div class="container">
         <div class="row">
            <div class="col-lg-6">
               <div class="about-left wow fadeInLeft" data-wow-delay=".25s">
                  <div class="about-img">
                     <div class="row g-0">
                        @php
                            $imggt = json_decode($gioithieu->image);
                        @endphp
                        @foreach ($imggt as $key => $item)
                        <div class="col-4">
                           <img class="img-{{$key+1}} lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{$item}}" alt="image">
                        </div> 
                        @endforeach
                     </div>
                  </div>
                  <div class="about-experience">
                     <h5>10<span>+</span></h5>
                     <p>Năm kinh nghiệm</p>
                  </div>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="about-right wow fadeInUp" data-wow-delay=".25s">
                  <div class="site-heading mb-3">
                     <span class="site-title-tagline"><i class="far fa-truck-container"></i> Về chúng tôi</span>
                     <h2 class="site-title">{{$setting->company}}</h2>
                  </div>
                  <div class="about-text line_6">{!!$gioithieu->content!!}
                  </div>
                  <div class="about-content">
                     <div class="row g-3">
                        <div class="col-md-6">
                           <div class="about-item">
                              <div class="icon">
                                 <img class="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{url('frontend/img/team.svg')}}" alt="team.svg'">
                              </div>
                              <div class="content">
                                 <h6>Đội ngũ chuyên nghiệp</h6>
                                 <p>Đội ngũ với trên 10 năm kinh nghiệm</p>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="about-item">
                              <div class="icon">
                                 <img class="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{url('frontend/img/support.svg')}}" alt="support.svg">
                              </div>
                              <div class="content">
                                 <h6>24/7 hỗ trợ</h6>
                                 <p>Hỗ trợ khách hàng qua hotline</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <a href="{{route('aboutUs')}}" class="theme-btn">Xem Thêm Về Chúng Tôi<i class="fas fa-arrow-right"></i></a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- about area end -->
   <!-- service area -->
   <div class="service-area sa-2 sa-bg pt-80 pb-80">
      <div class="container">
          <div class="row g-4 align-items-center wow fadeInDown" data-wow-delay=".25s">
              <div class="col-lg-6">
                  <div class="site-heading mb-0">
                      <span class="site-title-tagline"><i class="far fa-truck-container"></i> Services</span>
                      <h2 class="site-title text-white">Chúng tôi cung cấp các <span>dịch vụ</span> sau:</h2>
                  </div>
              </div>
              <div class="col-lg-4">
                  <p class="text-white">
                     Nhanh chóng & Đúng hẹn: Mạng lưới vận chuyển rộng khắp, đảm bảo giao hàng đúng thời gian cam kết.Dịch vụ tối ưu, giá cả cạnh tranh giúp doanh nghiệp tiết kiệm chi phí logistics.
                  </p>
              </div>
              <div class="col-lg-2">
                  <a href="" class="theme-btn">Tất Cả<i class="fas fa-arrow-right"></i></a>
              </div>
          </div>
          <div class="service-slider mt-4 owl-carousel">
            @foreach ($servicehome as $key => $item)
            <div class="service-item">
               <span class="count">0{{$key+1}}</span>
               <div class="service-img">
                  <a href="{{route('serviceCateList',['slug'=>$item->slug])}}">
                     <img class="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{$item->image}}" alt="image">
                  </a>
                  
               </div>
               <div class="service-content">
                   <div class="service-icon">
                       <img class="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{url('frontend/img/package.svg')}}" alt="image">
                   </div>
                   <div class="service-info">
                       <h4 class="service-title">
                           <a href="{{route('serviceCateList',['slug'=>$item->slug])}}">{{$item->name}}</a>
                       </h4>
                       <p class="service-text line_3">
                           {{languageName($item->description)}}
                       </p>
                       <a href="{{route('serviceCateList',['slug'=>$item->slug])}}" class="theme-btn">Chi tiết<i
                               class="fas fa-arrow-right"></i></a>
                   </div>
               </div>
           </div>
            @endforeach
          </div>
      </div>
  </div>
   <!-- service area end -->
   <!-- process area -->
   <div class="process-area py-80">
      <div class="container">
         <div class="row">
            <div class="col-lg-6 mx-auto">
               <div class="site-heading text-center wow fadeInDown" data-wow-delay=".25s">
                  <span class="site-title-tagline"><i class="far fa-truck-container"></i> Working
                  Process</span>
                  <h2 class="site-title">Quy trình làm việc đơn giản</h2>
                  <div class="heading-divider"></div>
               </div>
            </div>
         </div>
         <div class="process-wrap wow fadeInUp" data-wow-delay=".25s">
            <div class="row g-4 justify-content-center">
               <div class="col-md-6 col-lg-4 col-xl-4">
                  <div class="process-item">
                     <span class="count">01</span>
                     <div class="icon">
                        <img class="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{url('frontend/img/staff.svg')}}" alt="image">
                     </div>
                     <div class="content">
                        <h4>Tiếp nhận yêu cầu</h4>
                        <p>Cung cấp thông tin về trọng lượng, kích thước. Báo giá cước vận chuyển
                        </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 col-lg-4 col-xl-4 ">
                  <div class="process-item">
                     <span class="count">02</span>
                     <div class="icon">
                        <img class="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{url('frontend/img/pickup.svg')}}" alt="image">
                     </div>
                     <div class="content">
                        <h4>Nhận hàng</h4>
                        <p>Chúng tôi kiểm kê nhận đủ số lượng hàng hóa dưới sự giám sát củ khách hàng
                        </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 col-lg-4 col-xl-4 ">
                  <div class="process-item">
                     <span class="count">03</span>
                     <div class="icon">
                        <img class="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{url('frontend/img/warehouse-2.svg')}}" alt="image">
                     </div>
                     <div class="content">
                        <h4>Vận chuyển về kho</h4>
                        <p>Vận chuyển hàng hóa về kho để lưu kho và đợi ngày xuất hàng
                        </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 col-lg-4 col-xl-4 ">
                  <div class="process-item">
                     <span class="count">04</span>
                     <div class="icon">
                        <img class="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{url('frontend/img/delivery.svg')}}" alt="image">
                     </div>
                     <div class="content">
                        <h4>Giao hàng</h4>
                        <p>Chúng tôi vận chuyển hàng hóa đến địa điểm theo yêu cầu và hỗ trợ khách hàng trong việc xuống hàng
                        </p>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 col-lg-4 col-xl-4">
                  <div class="process-item">
                     <span class="count">05</span>
                     <div class="icon">
                        <img class="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{url('frontend/img/money.svg')}}" alt="image">
                     </div>
                     <div class="content">
                        <h4>Thanh toán</h4>
                        <p>Khách hàng có thể thanh toán theo hình thức thanh toán luôn hoặc công nợ cuối tháng
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- process area end -->
   
   <!-- portfolio area -->
   <div class="portfolio-area py-80">
      <div class="pa-bg" style="background-image: url({{ env('AWS_R2_URL') }}/frontend/img/bg.jpg);"></div>
      <div class="container">
         <div class="row">
            <div class="col-lg-6 mx-auto">
               <div class="site-heading text-center">
                  <span class="site-title-tagline"><i class="far fa-truck-container"></i> Our Policy</span>
                  <h2 class="site-title text-white">Hỗ trợ khách hàng</h2>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="portfolio-slider owl-carousel">
               @foreach ($pageContent as $item)
               @if ($item->type === 'ho-tro-khanh-hang')
               @php
                   $img = json_decode($item->image);
               @endphp
                  <div class="portfolio-item">
                     <div class="portfolio-img">
                        <a href="{{route('pagecontent',['slug'=>$item->slug])}}">
                           <img class="img-fluid lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{$img[0]}}" alt="image">
                        </a>
                     </div>
                     <div class="portfolio-content">
                        <div class="portfolio-info">
                           <h4 class="text-center"><a href="{{route('pagecontent',['slug'=>$item->slug])}}">{{$item->title}}</a></h4>
                        </div>
                     </div>
                  </div>
               @endif
               @endforeach
            </div>
         </div>
      </div>
   </div>
   <!-- portfolio area end -->
   
   
   <!-- team-area -->
   <div class="team-area pb-90">
      <div class="container">
         <div class="row">
            <div class="col-lg-6 mx-auto">
               <div class="site-heading text-center wow fadeInDown" data-wow-delay=".25s">
                  <span class="site-title-tagline"><i class="fas fa-truck-container"></i> Our Team</span>
                  <h2 class="site-title">Đội Ngũ <span>Nhân Sự</span></h2>
                  <div class="heading-divider"></div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="portfolio-slider owl-carousel">
               @foreach ($founder as $item)
               <div class="team-item wow fadeInUp" data-wow-delay=".25s">
                  <div class="team-img">
                     <img class="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{$item->image}}" alt="thumb">
                     <div class="team-social-wrap">
                        <div class="team-social-btn">
                           <button type="button"><i class="far fa-share-alt"></i></button>
                        </div>
                     </div>
                  </div>
                  <div class="team-content">
                     <h4><a href="javascript:;">{{$item->name}}</a></h4>
                     <span>{{$item->position}}</span>
                  </div>
               </div>
               @endforeach
               
            </div>
         </div>
      </div>
   </div>
   <!-- team-area end -->
   <!-- counter area -->
   <div class="counter-area pt-40 pb-40">
      <div class="container">
         <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-4 col-xl-3 col-6">
               <div class="counter-box wow fadeInUp" data-wow-delay=".25s">
                  <div class="icon">
                     <img class="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{url('frontend/img/transportation.svg')}}" alt="image">
                  </div>
                  <div class="content">
                     <div class="info">
                        <span class="counter" data-count="+" data-to="1.5" data-speed="3000">1.5</span>
                        <span class="unit">Triệu</span>
                     </div>
                     <h6 class="title">Đơn hàng</h6>
                  </div>
               </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3 col-6">
               <div class="counter-box wow fadeInDown" data-wow-delay=".25s">
                  <div class="icon">
                     <img class="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{url('frontend/img/rating.svg')}}" alt="image">
                  </div>
                  <div class="content">
                     <div class="info">
                        <span class="counter" data-count="+" data-to="500" data-speed="3000">500</span>
                        <span class="unit">+</span>
                     </div>
                     <h6 class="title">Đối tác DN</h6>
                  </div>
               </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3 col-6">
               <div class="counter-box wow fadeInUp" data-wow-delay=".25s">
                  <div class="icon">
                     <img class="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{url('frontend/img/staff.svg')}}" alt="image">
                  </div>
                  <div class="content">
                     <div class="info">
                        <span class="counter" data-count="+" data-to="50" data-speed="3000">50</span>
                        <span class="unit">+</span>
                     </div>
                     <h6 class="title">Nhân viên</h6>
                  </div>
               </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3 col-6">
               <div class="counter-box wow fadeInDown" data-wow-delay=".25s">
                  <div class="icon">
                     <img class="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{url('frontend/img/award.svg')}}" alt="image">
                  </div>
                  <div class="content">
                     <div class="info">
                        <span class="counter" data-count="+" data-to="2000" data-speed="3000">2000</span>
                        <span class="unit">m²</span>
                     </div>
                     <h6 class="title">Kho bãi</h6>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- counter area end -->
   <!-- choose area -->
   <div class="choose-area py-80">
      <div class="container">
         <div class="row">
            <div class="col-lg-6">
               <div class="choose-content wow fadeInUp" data-wow-delay=".25s">
                  <div class="site-heading mb-0">
                     <span class="site-title-tagline"><i class="fas fa-truck-container"></i> Why Choose Us</span>
                     <h2 class="site-title">Tại sao nên chọn <span>TNH Logistics</span></h2>
                     <p>
                        Duy trì tính chuyên nghiệp, trung thực và minh bạch trong mọi hoạt động, tạo dựng niềm tin vững chắc và sự tin cậy từ khách hàng.
                     </p>
                  </div>
                  <div class="choose-content-wrap">
                     <div class="choose-item">
                        <div class="choose-item-icon">
                           <img class="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{url('frontend/img/money.svg')}}" alt="image">
                        </div>
                        <div class="choose-item-info">
                           <h4>EFFECTIVE COMMUNICATION</h4>
                           <p>Chúng tôi luôn duy trì giao tiếp rõ ràng và liên tục giữa các thành viên trong đội và khách hàng, đảm bảo mọi thông tin và yêu cầu đều được truyền đạt một cách chính xác và kịp thời.</p>
                        </div>
                     </div>
                     <div class="choose-item">
                        <div class="choose-item-icon">
                           <img class="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{url('frontend/img/team.svg')}}" alt="image">
                        </div>
                        <div class="choose-item-info">
                           <h4>COLLABORATION AND PARTNERSHIP</h4>
                           <p>TNH Logistics xây dựng mối quan hệ hợp tác bền vững với khách hàng, coi họ là đối tác chiến lược và đồng hành cùng họ trong suốt quá trình phát triển.</p>
                        </div>
                     </div>
                     <div class="choose-item">
                        <div class="choose-item-icon">
                           <img class="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{url('frontend/img/certified.svg')}}" alt="image">
                        </div>
                        <div class="choose-item-info">
                           <h4>CUSTOMER-CENTRIC APPROACH</h4>
                           <p>Luôn đặt khách hàng làm trọng tâm, hiểu rõ nhu cầu của họ và cung cấp các dịch vụ vượt xa mong đợi, đảm bảo sự hài lòng tuyệt đối.</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="choose-img wow fadeInRight" data-wow-delay=".25s">
                  <img class="img-1 lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{ env('AWS_R2_URL') }}/frontend/img/choose1.jpg" alt="image">
                  <img class="img-2 lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{ env('AWS_R2_URL') }}/frontend/img/choose2.jpg" alt="image">
                  <img class="img-shape lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{ env('AWS_R2_URL') }}/frontend/img/04.png" alt="image">
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- choose area end -->
   <!-- testimonial-area -->
   <div class="testimonial-area ts-bg pt-80 pb-60">
      <div class="container">
         <div class="row">
            <div class="col-lg-4">
               <div class="site-heading wow fadeInDown" data-wow-delay=".25s">
                  <span class="site-title-tagline"><i class="fas fa-truck-container"></i> Testimonials</span>
                  <h2 class="site-title text-white">Khách hàng nói gì về <span>TNH Logistics</span> </h2>
                  <p class="text-white">
                     Luôn đặt khách hàng làm trọng tâm, hiểu rõ nhu cầu của họ và cung cấp các dịch vụ vượt xa mong đợi, đảm bảo sự hài lòng tuyệt đối.
                  </p>
               </div>
            </div>
            <div class="col-lg-8">
               <div class="testimonial-slider owl-carousel owl-theme wow fadeInUp" data-wow-delay=".25s">
                  @foreach ($reviewcus as $item)
                  <div class="testimonial-item">
                     <div class="testimonial-quote">
                        <span class="testimonial-quote-icon"><i class="fal fa-quote-right"></i></span>
                        <div class="testimonial-shadow-icon">
                           <img class="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{url('frontend/img/quote.svg')}}" alt="image">
                        </div>
                        <p>
                           {!!languageName($item->content)!!}
                        </p>
                        <div class="testimonial-rate">
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                           <i class="fas fa-star"></i>
                        </div>
                     </div>
                     <div class="testimonial-content">
                        <div class="testimonial-author-img">
                           <img class="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{$item->avatar}}" alt="image">
                        </div>
                        <div class="testimonial-author-info">
                           <h4>{{languageName($item->name)}}</h4>
                           <p>{{languageName($item->position)}}</p>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- testimonial-area end -->
   <!-- faq area -->
   <div class="faq-area pt-80">
      <div class="container">
         <div class="row">
            <div class="col-lg-4" style="margin: auto;">
               <div class="faq-content wow fadeInUp" data-wow-delay=".25s">
                  <div class="site-heading mb-3">
                     <span class="site-title-tagline"><i class="fas fa-truck-container"></i> Faq's</span>
                     <h2 class="site-title my-3">Câu hỏi thường gặp</h2>
                  </div>
                  <a href="{{route('faq')}}" class="theme-btn mt-2">Xen thêm câu hỏi</a>
               </div>
            </div>
            @php
                $faq = json_decode($setting->footer_content);
                $ques = 0;
                $faqarr = [];
                foreach ($faq as $key => $value) {
                  foreach ($value->fag_detail as $k => $v) {
                     $ques++;
                     $faqarr[] = $v;
                  }
                }
            @endphp
            <div class="col-lg-8">
               <div class="accordion wow fadeInRight" data-wow-delay=".25s" id="accordionExample">
                  @foreach ($faqarr as $key => $item)
                  @if ($key < 4)
                  <div class="accordion-item">
                     <h2 class="accordion-header" id="headingOne-{{$key}}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                           data-bs-target="#collapseOne-{{$key}}" aria-expanded="{{$key == 0 ? 'true' : 'false'}}" aria-controls="collapseOne-{{$key}}">
                        <span><i class="far fa-question"></i></span> {{$item->name}}
                        </button>
                     </h2>
                     <div id="collapseOne-{{$key}}" class="accordion-collapse collapse"
                        aria-labelledby="headingOne-{{$key}}" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                           {!!$item->content!!}
                        </div>
                     </div>
                  </div>
                  @endif
                  @endforeach
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- faq area end -->
   <!-- quote area -->
   <div class="quote-area qa-negative py-80">
      <div class="container">
         <div class="quote-content">
            <div class="row g-4">
               <div class="col-lg-8">
                  <div class="quote-form">
                     <div class="quote-header">
                        <h4>Yêu cầu tư vấn dịch vụ</h4>
                     </div>
                     <form id="commentform">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="form-icon">
                                    <i class="far fa-user-tie"></i>
                                    <input type="text" class="form-control" name="name" placeholder="Họ Tên">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="form-icon">
                                    <i class="far fa-phone"></i>
                                    <input type="text" class="form-control" name="phone" placeholder="Số điện thoại">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="form-icon">
                                    <i class="far fa-envelope"></i>
                                    <input type="email" class="form-control" name="email" placeholder="Email">
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
                                    <option value="{{$item->name}}">{{$item->name}}</option>
                                    @endforeach
                                 </select>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12 mt-2">
                              <button type="submit" class="theme-btn"><span class="loader ml-15 spin-icon"></span> Gửi yêu cầu</button>
                           </div>
                        </div>
                     </form>
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
                                       digits:"Nhập đúng định dạng số điện thoại",
                                       minlength:"Nhập tối thiểu 10 số"
                                    }
                                 },
                              submitHandler: function(form) {
                                 $(".spin-icon").css("display", "block");
                                 $.ajax({
                                  url: "https://script.google.com/macros/s/AKfycbyzVnC9pnnBRgBxGkLCpFVIT4bf73Gp__7kNONNhXGFOJidpO0MlkhmZPtTLcPpd8OJMA/exec",
                                  type: "post",
                                  data: $("#commentform").serializeArray(),
                                  success: function () {
                                     $(".spin-icon").css("display", "none");
                                    jQuery.notify("Thành công! Chúng tôi sẽ sớm liên hệ", "success");
                                  },
                                  error: function () {
                                    jQuery.notify("Gửi thông tin thất bại", "error");
                                  }
                               });
                              }
                              });
                     </script>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="quote-img">
                     <img class="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{ env('AWS_R2_URL') }}/frontend/img/quote.jpg" alt="image">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- quote area end -->
   
  
   
   
   
   
   <!-- blog-area -->
   <div class="blog-area pb-80">
      <div class="container">
         <div class="row">
            <div class="col-lg-6 mx-auto">
               <div class="site-heading text-center wow fadeInDown" data-wow-delay=".25s">
                  <span class="site-title-tagline"><i class="fas fa-truck-container"></i> Our Blog</span>
                  <h2 class="site-title">Tin tức hoạt động</h2>
                  <div class="heading-divider"></div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="service-slider owl-carousel">
               @foreach ($hotnews as $item)
               <div class="blog-item wow fadeInUp" data-wow-delay=".25s">
                  <div class="blog-item-img">
                     <a href="{{route('detailBlog',['slug'=>$item->slug])}}">
                        <img class="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{$item->image}}" alt="Thumb">
                     </a>
                     
                     <div class="blog-date">
                        <strong>{{date_format($item->created_at,'d')}}</strong>
                        <span>{{date_format($item->created_at,'M')}}</span>
                     </div>
                  </div>
                  <div class="blog-item-info">
                     <div class="blog-item-meta">
                        <ul>
                           <li><a href="{{route('detailBlog',['slug'=>$item->slug])}}"><i class="far fa-user-circle"></i> By Admin</a></li>
                        </ul>
                     </div>
                     <h4 class="blog-title">
                        <a href="{{route('detailBlog',['slug'=>$item->slug])}}">{{languageName($item->title)}}</a>
                     </h4>
                     <p class="line_2">
                        {{languageName($item->description)}}
                     </p>
                     <a class="theme-btn" href="{{route('detailBlog',['slug'=>$item->slug])}}">Đọc tiếp<i class="fas fa-arrow-right"></i></a>
                  </div>
               </div>
               @endforeach
               
            </div>


         </div>
      </div>
   </div>
   <!-- blog-area end -->
   <!-- partner area -->
   <div class="partner-area bg pt-60 pb-60">
      <div class="container pb-60">
         <div class="row">
            <div class="col-lg-6 mx-auto">
               <div class="site-heading text-center wow fadeInDown" data-wow-delay=".25s">
                  <h2 class="site-title">Đối tác</h2>
                  <div class="heading-divider"></div>
               </div>
            </div>
         </div>
         <div class="partner-wrapper partner-slider owl-carousel owl-theme">
            @foreach ($partner as $item)
            <img class="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{$item->image}}" alt="thumb">
            @endforeach
         </div>
      </div>
      <div class="container">
         <div class="row">
            <div class="col-lg-6 mx-auto">
               <div class="site-heading text-center wow fadeInDown" data-wow-delay=".25s">
                  <h2 class="site-title">Khách hàng</h2>
                  <div class="heading-divider"></div>
               </div>
            </div>
         </div>
         <div class="partner-wrapper partner-slider owl-carousel owl-theme">
            @foreach ($logokhachhang as $item)
            <img class="lazy" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC" data-src="{{$item->image}}" alt="thumb">
            @endforeach
         </div>
      </div>
   </div>
   <!-- partner area end -->
</main>
@endsection