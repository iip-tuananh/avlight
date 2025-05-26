F1GENZ.page_contact = {
	init: function(){
		$('body').on('submit', '.page-about-new form', function(e){
			e.preventDefault();
			const form = $(this).parents('.page-about-new').find('form')[0];
			if(form.checkValidity()){
				F1GENZ.Helper.postForm('.page-about-new', window.F1GENZ_vars.shop.url + '/postcontact');
				swal({
					title: "Cảm ơn bạn!",
					text: "Chúng tôi sẽ liên hệ lại trong thời gian sớm nhất",
					type: "success"
				});
			}
		})

	}
}
window.noPS && F1GENZ.page_contact.init();