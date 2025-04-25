@extends('layouts.main.master')
@section('title')
{{$detail_service->name}}
@endsection
@section('description')
{{languageName($detail_service->description)}}
@endsection
@section('image')
{{url(''.$detail_service->image)}}
@endsection
@section('css')
<style>
   .service-sidebar {
    position: sticky;
    top: 80px;
}
</style>
@endsection
@section('js')


@endsection
@section('content')
<main class="main">

   <!-- breadcrumb -->
   <div class="site-breadcrumb" style="background: url({{url('frontend/img/breadcrumb.jpg')}})">
       <div class="container">
           <h2 class="breadcrumb-title">{{$detail_service->name}}</h2>
           <ul class="breadcrumb-menu">
               <li><a href="{{route('home')}}">Trang chủ</a></li>
               <li class="active">{{$detail_service->name}}</li>
           </ul>
       </div>
   </div>
   <!-- breadcrumb end -->


   <!-- service single -->
   <div class="service-single py-120">
       <div class="container">
           <div class="service-single-wrap">
               <div class="row">
                  <div class="col-xl-8 col-lg-8">
                     <div class="service-details">
                         <div class="content">
                             <h1 class="mb-20 title-content">{{$detail_service->name}}</h1>
                             {!!languageName($detail_service->content)!!}
                         </div>
                     </div>
                 </div>
                   <div class="col-xl-4 col-lg-4">
                       <div class="service-sidebar">
                           <div class="widget">
                               <h4 class="title">Dịch vụ khác</h4>
                               <div class="category">
                                 @foreach ($servicehome as $item)
                                 <a href="{{route('serviceCateList',['slug'=>$item->slug])}}"><i class="far fa-angle-double-right"></i>{{$item->name}}</a>
                                 @endforeach
                               </div>
                           </div>
                           <div class="widget">
                              <h4 class="title">Yêu cầu tư vấn</h4>
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
                   </div>
                   
               </div>
           </div>
       </div>
   </div>
   <!-- service single end -->

</main>
@endsection