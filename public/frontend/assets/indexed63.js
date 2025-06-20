F1GENZ.superFS = {
	current: -1,
	init: function(){
		var self = this;
		self.fs_all_day();
		self.fs_click();
		self.fs_tab();
		self.fs_head();
		setTimeout(function(){ self.fs_tab_current() }, 1000);
	},
	fs_all_day: function(){
		if(window.F1GENZ_vars.shop.featured.super_fs.all_day){
			var now_date = moment(new Date()).format("DD/MM/YYYY");
			$('.home-fsale [data-start][data-end]').each(function(){
				// Start
				var init_timeS = moment(F1GENZ.Helper.formatTime($(this).attr('data-start'))).format("HH:mm:ss");
				var finish_dateS = `${now_date} ${init_timeS}`;
				$(this).attr('data-start', finish_dateS);

				// End
				var init_timeE = moment(F1GENZ.Helper.formatTime($(this).attr('data-end'))).format("HH:mm:ss");
				var finish_dateE = `${now_date} ${init_timeE}`;
				$(this).attr('data-end', finish_dateE);
			})
		}
	},
	fs_click: function(){
		$('body').on('click', '.home-fsale-tab .home-fsale-tab-item', function(){
			var index = $(this).index();
			$(this).addClass('active').siblings().removeClass('active');
			$('.home-fsale-head-item').eq(index).addClass('active').siblings().removeClass('active');
			$('.home-fsale-banner-item').eq(index).addClass('active').siblings().removeClass('active');
			$('.home-fsale-body-item').eq(index).addClass('active').siblings().removeClass('active');
			// Slick for loop
			if(window.F1GENZ_vars.shop.featured.super_fs.slider)
				if(!$(`.home-fsale-body-item:nth-child(${index + 1}) .home-fsale-body-item-data`).hasClass('slick-slider'))
					F1GENZ.Helper.productSlider(`.home-fsale-body-item:nth-child(${index + 1}) .home-fsale-body-item-data`, 4, 4, 2, 2, { arrows: true });
		})
	},
	fs_tab: function(){
		$('.home-fsale-tab-item').each(function(i, v){
			var $that = $(this);
			var timeS_Attr = $(this).attr('data-start');
			var timeE_Attr = $(this).attr('data-end');
			if(timeS_Attr && timeE_Attr){
				var timeS = F1GENZ.Helper.formatTime(timeS_Attr);
				var timeE = F1GENZ.Helper.formatTime(timeE_Attr);

				// Append Time Text
				var timeText = moment(timeS).format('H:mm');
				$that.find('strong').text(timeText);
				// End Append Time Text

				var now = new Date().getTime();

				// Check DistanceS
				var distanceS = timeS - now;
				if(distanceS < 0){
					// Tab
					$that.addClass('started');
					$that.find('span').text('Đang diễn ra');
					// Head
					$('.home-fsale-head-item').eq(i).addClass('started');
					$('.home-fsale-head-item').eq(i).find('label').text("Kết thúc sau");
					// Body
					$('.home-fsale-body-item').eq(i).addClass('started');
				}
				// End Check DistanceS

				// Check DistanceE
				var distanceE = timeE - now;
				if(distanceE < 0){
					// Tab
					$that.addClass('ended');
					$that.find('span').text('Đã kết thúc');
					// head
					$('.home-fsale-head-item').eq(i).addClass('ended');
					$('.home-fsale-head-item').eq(i).find('label').text("Đã kết thúc");
					// Body
					$('.home-fsale-body-item').eq(i).addClass('ended');
				}
				// End Check DistanceE
			}
		})
	},
	fs_head: function(){
		var doneTime = (days, hours, minutes, seconds) => {
			var html = `<span class="days"><b>${days}</b><strong>Ngày</strong></span><span class="hours"><b>${hours}</b><strong>Giờ</strong></span><span class="minutes"><b>${minutes}</b><strong>Phút</strong></span><span class="seconds"><b>${seconds}</b><strong>Giây</strong></span>`;
			return html;
		}
		try{
			$('.home-fsale-head-item').each(function(i, v){
				var $that = $(this);
				if($that.hasClass('ended')){
					$that.find('[data-start][data-end]').html(doneTime("00", "00", "00", "00"));
				}else{
					var countdown = setInterval(function() {
						if(!$that.hasClass('started')){
							var timeAttr = $that.find('[data-start][data-end]').attr('data-start');
						}else{
							F1GENZ.superFS.current = i;
							var timeAttr = $that.find('[data-start][data-end]').attr('data-end');
						}
						if(timeAttr){
							var now = new Date().getTime();
							var time = F1GENZ.Helper.formatTime(timeAttr);
							var distance = time - now;
							var days = Math.floor(distance / (1000 * 60 * 60 * 24));
							var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
							var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
							var seconds = Math.floor((distance % (1000 * 60)) / 1000);
							$that.find('[data-start][data-end]').html(doneTime((days < 10 ? '0' + days : days), (hours < 10 ? '0' + hours : hours), (minutes < 10 ? '0' + minutes : minutes), (seconds < 10 ? '0' + seconds : seconds)))
							if (distance < 0) {
								clearInterval(countdown);
								$that.find('[data-start][data-end]').html(doneTime("00", "00", "00", "00"));
							}
						}
					}, 1000);
				}
			});
		}catch(e){
			console.log(e);
		}
	},
	fs_tab_current: function(){
		var current = F1GENZ.superFS.current;
		if(current == -1){
			// Active First Tab
			if($('.home-fsale-tab-item').not('.ended').length > 0) $('.home-fsale-tab-item').not('.ended').first().trigger('click');
			else $('.home-fsale-tab-item').first().trigger('click');
		}else{
			var newTime = $('.home-fsale-tab-item').eq(current).next().attr('data-time');
			$('.home-fsale-tab-item').eq(current).trigger('click');
			$('.home-fsale-tab-item').eq(current).find('span').text('Đang diễn ra');
			$('.home-fsale-head-item').eq(current).find('[data-start][data-end]').attr('data-countdown', newTime);
			$('.home-fsale-head-item').eq(current).find('label').text("Kết thúc sau");
			F1GENZ.superFS.fs_head();
		}
	},
}

F1GENZ.Index = {
	init: function(){
		let self = this;
		F1GENZ.superFS.init();
		self.slider();
		self.vendor();
		self.home_productBig();
	},
	slider: function(){
		F1GENZ.Helper.productSlider('.home-slider .home-slider-items', 1, 1, 1, 1, { autoplay: true, infinite: true, fade: true,dots: true,autoplaySpeed: 6000,speed: 1000 });
		F1GENZ.Helper.productSlider('.home-flashsale-right', 2, 2, 2, 2, { autoplay: true, infinite: true,autoplaySpeed: 6000,speed: 1000});
		F1GENZ.Helper.productSlider('.home-product-list-slider-1', 3, 2, 2, 1, { autoplay: true,dots: false,arrows: true, infinite: true,autoplaySpeed: 6000,speed: 1000});
		F1GENZ.Helper.productSlider('.home-product-list-slider-2', 4, 3, 2, 2, { autoplay: true,dots: false,arrows: true, infinite: true,autoplaySpeed: 6000,speed: 1000});
		F1GENZ.Helper.productSlider('.home-instegram-flex', 5, 4, 3, 2, { autoplay: true,arrows: true, infinite: true,autoplaySpeed: 6000,speed: 1000});
		F1GENZ.Helper.productSlider('.home-product-new-slider', 5, 5, 3, 2, { autoplay: true,arrows: true, infinite: true,autoplaySpeed: 6000,speed: 1000});
		F1GENZ.Helper.productSlider('.home-blog .home-blog-items', 3, 2, 2, 1, { arrows: true, autoplay: true, infinite: true });
	},
	home_productBig: function(){
		$('body').on('click touch', '.home-product-big-image-pos .home-product-big-image-pos-dots', function(){
			var that = $(this);
			var elem_width = $(".home-product-big-image-pos-contents").width();
			that.parent().siblings().removeClass('left right');
			if(elem_width - that.offset().left < 400)
				that.parent().toggleClass('right');
			else
				that.parent().toggleClass('left');

			if($(window).width() < 991) $('body, html').addClass('open-noscroll open-overplay');
		})
	},
	vendor: function(){
		$(".home-vendor .home-vendor-list").slick({
			speed: 5000,
			autoplay: true,
			autoplaySpeed: 0,
			centerMode: true,
			cssEase: 'linear',
			slidesToShow: 1,
			slidesToScroll: 1,
			variableWidth: true,
			touchThreshold: 100,
			infinite: true,
			initialSlide: 1,
			arrows: false,
			buttons: false,
			draggable: false,
			touchMove: false,
		})
	}
}
f1genzPS && F1GENZ.Index.init();