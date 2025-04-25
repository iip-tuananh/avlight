<aside class="sidebar-area">
   <div class="widget widget_categories">
      <h3 class="widget_title">Dịch vụ khác<span class="shape"></span></h3>
      <ul>
         @foreach ($servicehome as $item)
         <li><a href="{{route('serviceDetail',['slug'=>$item->slug])}}">{{$item->name}}</a></li>
         @endforeach
      </ul>
   </div>
   <form id="submitformhome" class="service-form style2">
      <h3 class="fs-24 mb-20 mt-n1 text-white">Nhận báo giá</h3>
         <div class="row">
            <div class="form-group col-12"><input type="text" name="name" placeholder="Họ Tên"> <i class="fal fa-user"></i></div>
            <div class="form-group col-12"><input type="text" name="phone" placeholder="Số điện thoại"> <i class="fa-regular fa-weight-scale"></i></div>
            <div class="form-group col-12"><input type="text" placeholder="Email"> <i class="fa-regular fa-location-dot"></i></div>
            <div class="form-group col-12"><input type="text" name="address" placeholder="Địa chỉ"> <i class="fa-regular fa-location-dot"></i></div>
            
            <div class="btn-group justify-content-center">
               <button type="submit" class="themeholy-btn blue-btn2 btn-fw justify-content-center">Gửi<span class="icon">
                  <i class="fa-sharp fa-regular fa-paper-plane"></i></span></button></div>
         </div>
      <script>
         $('#submitformhome').validate({
            rules: {
               "name": {
                  required: true,
               },
               "phone": {
                  required: true,
                  minlength: 8
               },
               "address":{
                  required: true,
               }
            },
            messages: {
               "name": {
                  required: "Tên bạn là gì?",
               },
               "phone": {
                  required: "Nhập sdt liên hệ",
               },
               "address":{
                  required: "Vui lòng nhập địa chỉ"
               }
            },
      
         submitHandler: function(form) {
            $.ajax({
               url: "https://script.google.com/macros/s/AKfycbxc7jzLVZ038tInAeS1YjdEteWIUI0FvhbDfMRAmyvFRsKj9s-HI_irmSAKE-t1R2vM0Q/exec",
               type: "post",
               data: $("#submitformhome").serializeArray(),
               success: function () {
               jQuery.notify("Thành công! Chúng tôi sẽ sớm liên hệ", "success");
               },
               error: function () {
               jQuery.notify("Gửi thông tin thất bại", "error");
               }
            });
         }
         });
      </script>
   </form>
</aside>