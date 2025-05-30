F1GENZ.Product = {
	init: function(){
		let self = this;
		self.gallery();
		self.zoom();
		if(window.F1GENZ_vars.shop.featured.shopping){
			self.changeOption();
			self.checkOptionFirst();
			self.addCart();
			self.fsale();
		}
		self.shortDes();
		self.content();
		self.sharing();
		self.relate();
		self.preOrder();
		if($('.main-product-seen').length > 0){
			F1GENZ.Helper.updateWCS(
				'list_viewed', // Name in local
				window.F1GENZ_vars.product.data.alias, // Handle
				'.main-product-seen .main-product-seen-data', // Dom append Data
				'viewed', // View ajax
				'set' // Type only set
			);
		};
	},
	shortDes: function(){
		$("body").on("click", ".main-product-short a", function(e){
			e.preventDefault();
			$("body, html").animate({
				scrollTop: $(".main-product-description").offset().top
			})
		})
	},
	fsale: function(){
		var doneTime = (hours, minutes, seconds) => {
			var html = `<span class="hours"><b>${hours}</b><strong>Giờ</strong></span><span class="minutes"><b>${minutes}</b><strong>Phút</strong></span><span class="seconds"><b>${seconds}</b><strong>Giây</strong></span>`;
			return html;
		}
		try{
			if(window.F1GENZ_vars.shop.featured.super_fs.all_day){
				var now_date = moment(new Date()).format("DD/MM/YYYY");
				$('.main-product-fsale [data-start][data-end]').each(function(){
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

			$('.main-product-fsale-countdown').each(function(i, v){
				var $that = $(this);
				var timeS_Attr = $(this).attr('data-start');
				var timeE_Attr = $(this).attr('data-end');
				if(timeS_Attr && timeE_Attr){
					var timeS = F1GENZ.Helper.formatTime(timeS_Attr);
					var timeE = F1GENZ.Helper.formatTime(timeE_Attr);
					var now = new Date().getTime();

					var distanceS = timeS - now;
					distanceS < 0 && $that.parent().addClass('started').find('label').text('Kết thúc sau');

					var distanceE = timeE - now;
					distanceE > 0 && $that.parents('.main-product-fsale').show();
				}
			})
			$('.main-product-fsale').each(function(i, v){
				var $that = $(this);
				var countdown = setInterval(function() {
					if(!$that.hasClass('started')){
						var timeAttr = $that.find('[data-start][data-end]').attr('data-start');
					}else{
						var timeAttr = $that.find('[data-start][data-end]').attr('data-end');
					}
					if(timeAttr){
						var now = new Date().getTime();
						var time = F1GENZ.Helper.formatTime(timeAttr);
						var distance = time - now;
						var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
						var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
						var seconds = Math.floor((distance % (1000 * 60)) / 1000);
						$that.find('[data-start][data-end]').html(doneTime((hours < 10 ? '0' + hours : hours), (minutes < 10 ? '0' + minutes : minutes), (seconds < 10 ? '0' + seconds : seconds)))
						if (distance < 0) {
							clearInterval(countdown);
							$that.find('[data-start][data-end]').html(doneTime("00", "00", "00"));
						}
					}
				}, 1000);
			});
		}catch(e){
			console.log(e);
		}
	},
	addCart: function(){
		$('body').on('click', 'button[data-type="main-product-add"]', function(){
			F1GENZ.Helper.updateCart("add", $('.main-product #main-product-select').val(), +$('.main-product [name="quantity"]').val());
		})
	},
	statusVariants: {},
	statusOption1: {},
	setStatusVariants: function(){
		var self = this;
		var opsAll = [];
		var ops1 = [];
		$.each(window.F1GENZ_vars.product.data.variants, function(i, v){
			var flagOpsAll = { val:'', status:''};
			if($.inArray(v['options'], opsAll) === -1){
				flagOpsAll.val = v['options'].toString();
				flagOpsAll.status = v.available;
				opsAll.push(flagOpsAll);
			}
			if($.inArray(v['option1'], ops1) === -1){
				ops1.push(v['option1']);
			}
		});
		self.statusVariants = opsAll;
		self.statusOption1 = ops1;
	},
	checkOptionFirst: function(){
		var self = this;
		var flagClick0 = false;
		$('.main-product .product-sw-line').eq(0).find('.product-sw-select-item input').addClass('soldOut').prop('checked',false);
		$.each(self.statusOption1, function(keyC1, valC1){
			$.each(self.statusVariants, function(keyC2, valC2){
				if(String(valC2.val).indexOf(valC1) !== -1){
					if(valC2.status === true){
						$('.main-product .product-sw-select-item input[value="'+ valC1 +'"]').removeClass('soldOut');
						if(flagClick0 == false){
							$('.main-product .product-sw-select-item input[value="'+ valC1 +'"]').next().trigger('click');
							flagClick0 = true;
						}
					}
				}
			})
		});
		if(!flagClick0){
			$('.main-product .product-sw-line').eq(1).find('.product-sw-select-item input').addClass('soldOut').prop('checked',false);
			$('.main-product .product-sw-line').eq(2).find('.product-sw-select-item input').addClass('soldOut').prop('checked',false);
		}else{
			$('.main-product .product-sw-line').eq(1).find('.product-sw-select-item').first().find("label").trigger("click");
			$('.main-product .product-sw-line').eq(2).find('.product-sw-select-item').first().find("label").trigger("click");
		}
	},
	checkAvailable: function(type, name, value){
		var self = this;
		if(name.indexOf(1) !== -1){
			$('.main-product .product-sw-line').eq(1).find('.product-sw-select-item input').addClass('soldOut');//.prop('checked',false);
			$('.main-product .product-sw-line').eq(2).find('.product-sw-select-item input').addClass('soldOut');//.prop('checked',false);
			var flagClick1 = true;
			$('.main-product .product-sw-line').eq(1).find('input').each(function(key1, val1){
				var flagOption1 = $(this).val();
				if(window.F1GENZ_vars.product.data.options.length === 3){
					$('.main-product .product-sw-line').eq(2).find('input').each(function(key1, val1){
						var flagOption2 = $(this).val();
						var flagCheck = `${value},${flagOption1},${flagOption2}`;
						$.each(self.statusVariants, function(keyC, valC){
							if(String(valC.val) === String(flagCheck) && valC.status){
								$('.main-product .product-sw-select-item input[value="'+ flagOption1 +'"]').removeClass('soldOut');
								$('.main-product .product-sw-select-item input[value="'+ flagOption2 +'"]').removeClass('soldOut');
								if(flagClick1 == false){
									$('.main-product .product-sw-select-item input[value="'+ flagOption1 +'"]').trigger('click');
									flagClick1 = true;
								}
								return false;
							}
						})
					});
				}else{
					var flagCheck = `${value},${flagOption1}`
					$.each(self.statusVariants, function(keyC, valC){
						if(String(valC.val) === String(flagCheck) && valC.status){
							$('.main-product .product-sw-select-item input[value="'+ flagOption1 +'"]').removeClass('soldOut');
							if(flagClick1 == false){
								$('.main-product .product-sw-select-item input[value="'+ flagOption1 +'"]').trigger('click');
								flagClick1 = true;
							}
							return false;
						}
					})
				}
			})
		}else if(name.indexOf(2) !== -1){
			if(window.F1GENZ_vars.product.data.options.length == 3){
				var flagClick2 = true;
				$('.main-product .product-sw-line').eq(2).find('input').each(function(key23, val3){
					var flagOption2 = $(this).val();
					var flagCheck = `${$('.main-product .product-sw-line').eq(0).find('input:checked').val()},${value},${flagOption2}`;
					$.each(self.statusVariants, function(keyC, valC){
						if(String(valC.val) === String(flagCheck) && valC.status){
							$('.main-product .product-sw-select-item input[value="'+ value +'"]').removeClass('soldOut');
							$('.main-product .product-sw-select-item input[value="'+ flagOption2 +'"]').removeClass('soldOut');
							if(flagClick2 == ''){
								$('.main-product .product-sw-select-item input[value="'+ flagOption2 +'"]').trigger('click');
								flagClick2 = true;
							}
							return false;
						}
					})
				})
			}
		}
	},
	changeOption: function(){
		var self = this;
		$('body').on('change', '.main-product .trigger-option-sw', function(e){
			e.preventDefault();
			var name = $(this).attr('data-name');
			var value = $(this).val();
			$('.main-product select[data-option='+name+'][id^="main-product-select"]').val(value).trigger('change');
			self.checkAvailable(true, name, value);
		})
	},
	render: function(){
		if(f1genzPS)
			new Bizweb.OptionSelectors("main-product-select", { product: window.F1GENZ_vars.product.data, onVariantSelected: this.variants });
	},
	variants: function(variant, selector){
		if(variant){
			// Change Image
			if(variant.image){
				var items = $('.main-product .main-product-feature .main-product-feature-thumbs img[src="' + variant.image.src + '"]').first().parents('a');
				if(window.F1GENZ_vars.product.featured.style_gallery == "style3"){
					$('body, html').animate({ scrollTop: items.offset().top - 10 }, 500, 'swing');
				}else{
					if($('.main-product .main-product-feature .main-product-feature-thumbs.slick-slider').length > 0){
						$('.main-product .main-product-feature .main-product-feature-thumbs .slick-slide[data-slick-index="' + (parseInt(items.attr('data-index')) - 1) + '"]').trigger('click');
						if($('.main-product .main-product-feature .main-product-feature-thumbs .slick-slide').length > 4) $('.main-product .main-product-feature .main-product-feature-thumbs').slick('slickGoTo', parseInt(items.attr('data-index')) - 1);
					}
				}
			}
			// End Change Image

			window.F1GENZ_vars.product.availableOption = variant.available;
			var saleChange = Math.round(100 - (variant.price / (variant.compare_at_price / 100)));
			var salePercent = 100 - (variant.price / (variant.compare_at_price / 100));
			if(salePercent < 1) saleChange = 1;
			if(salePercent > 99) saleChange = 99;
			if(variant.price == 0){
				$('.main-product-quantity').hide();
				$('.main-product .main-product-price .main-product-price-compare').prop('hidden', true);
				$('.main-product .main-product-price .main-product-price-discount').prop('hidden', true);
				$('.main-product .main-product-price .main-product-price-this').addClass('contact').html(`<strong>${window.F1GENZ_vars.product.featured.contact_0.text}</strong>`);
			}else{
				$('.main-product-quantity').show();
				$('.main-product .main-product-price .main-product-price-this').removeClass('contact').text(Bizweb.formatMoney(variant.price, window.F1GENZ_vars.formatMoney));
				if(variant.compare_at_price > variant.price){
					$('.main-product .main-product-price .main-product-price-compare').text(Bizweb.formatMoney(variant.compare_at_price, window.F1GENZ_vars.formatMoney)).prop('hidden', false);
					$('.main-product .main-product-price .main-product-price-discount').html('Tiết kiệm ' + saleChange + '%').prop('hidden', false);
				}else{
					$('.main-product .main-product-price .main-product-price-compare').prop('hidden', true);
					$('.main-product .main-product-price .main-product-price-discount').prop('hidden', true);
				}
			}
			if(variant.sku != null && variant.sku != ""){
				$('.main-product .main-product-info .main-product-info-sku span').html(variant.sku);
			}else{
				$('.main-product .main-product-info .main-product-info-sku span').html('Đang cập nhật');
			}

			if(variant.barcode != null && variant.barcode != ""){
				$('.main-product .main-product-info .main-product-info-barcode span').html(variant.barcode);
			}else{
				$('.main-product .main-product-info .main-product-info-barcode span').html('Đang cập nhật');
			}

			if(variant.available){
				if(variant.price !== 0){
					$('.main-product-quantity').show();
					$('.main-product-cta button[data-type="main-product-add"]').attr('disabled', false);
					$('.main-product-cta button[data-type="main-product-add"] span').html("Chọn ngay sản phẩm bạn yêu thích")
					$('.main-product-cta button[data-type="main-product-add"] strong').html("Thêm vào giỏ");
					//$('.main-product-cta button[data-type="main-product-add"]').show();
				}else{
					$('.main-product-quantity').hide();
					$('.main-product-cta button[data-type="main-product-add"]').attr('disabled', true);
					$('.main-product-cta button[data-type="main-product-add"] span').html("Liên hệ để được tư vấn thêm")
					$('.main-product-cta button[data-type="main-product-add"] strong').html("Liên hệ ngay");
					//$('.main-product-cta button[data-type="main-product-add"]').hide();
				}
			}else{
				if(variant.price !== 0){
					$('.main-product-quantity').hide();
					$('.main-product-cta button[data-type="main-product-add"]').attr('disabled', true);
					$('.main-product-cta button[data-type="main-product-add"] span').html("Liên hệ để được tư vấn thêm")
					$('.main-product-cta button[data-type="main-product-add"] strong').html("Tạm hết hàng");
					//$('.main-product-cta button[data-type="main-product-add"]').show();
				}else{
					$('.main-product-quantity').hide();
					$('.main-product-cta button[data-type="main-product-add"]').attr('disabled', true);
					$('.main-product-cta button[data-type="main-product-add"] span').html("Liên hệ để được tư vấn thêm")
					$('.main-product-cta button[data-type="main-product-add"] strong').html("Liên hệ ngay");
					//$('.main-product-cta button[data-type="main-product-add"]').hide();
				}
			}

		}else{
			// For Price
			$('.main-product .main-product-price .main-product-price-compare').prop('hidden', true);
			$('.main-product .main-product-price .main-product-price-discount').prop('hidden', true);
			$('.main-product .main-product-price .main-product-price-this').addClass('contact').html(`<strong>${window.F1GENZ_vars.product.featured.contact_0.text}</strong>`);
			// For Quantity
			$('.main-product-quantity').hide();
			// For CTA
			$('.main-product-cta button[data-type="main-product-add"]').attr('disabled', true);
			$('.main-product-cta button[data-type="main-product-add"] span').html("Liên hệ để được tư vấn thêm")
			$('.main-product-cta button[data-type="main-product-add"] strong').html("Liên hệ ngay");
			//$('.main-product-cta button[data-type="main-product-add"]').hide();
			window.F1GENZ_vars.product.availableOption = false;
		}
	},
	activeAvailable: function(){
		if(window.F1GENZ_vars.product.data.available){
			$.each(window.F1GENZ_vars.product.data.variants, function(i, v){
				if(v.available){
					if(v.option1 && v.option1.length > 0){
						if($('.main-product .trigger-option-sw[data-name="option1"]').is('input')){
							$('.main-product .trigger-option-sw[data-name="option1"][value="'+v.option1+'"]').trigger('click');
						}else{
							$('.main-product .trigger-option-sw[data-name="option1"]').val(v.option1).trigger('change');
						}
					}
					if(v.option2 && v.option2.length > 0){
						if($('.main-product .trigger-option-sw[data-name="option2"]').is('input')){
							$('.main-product .trigger-option-sw[data-name="option2"][value="'+v.option2+'"]').trigger('click');
						}else{
							$('.main-product .trigger-option-sw[data-name="option2"]').val(v.option2).trigger('change');
						}
					}
					if(v.option3 && v.option3.length > 0){
						if($('.main-product .trigger-option-sw[data-name="option3"]').is('input')){
							$('.main-product .trigger-option-sw[data-name="option3"][value="'+v.option3+'"]').trigger('click');
						}else{
							$('.main-product .trigger-option-sw[data-name="option3"]').val(v.option3).trigger('change');
						}
					}
					return false;
				}
			})
		}
	},
	zoom: function(){
		if($(window).width() > 991){
			if(window.F1GENZ_vars.product.featured.style_gallery == "style3" || window.F1GENZ_vars.product.featured.style_gallery == "style4"){
				$(".main-product-feature-thumbs img").each(function(){
					$(this).elevateZoom({
						zoomType: "inner",
						cursor: "crosshair"
					});
				})
			}else{
				var img = $("#product-image-feature");
				$('.zoomContainer').remove();
				img.removeData('elevateZoom');
				img.removeData('zoomImage');
				jQuery(".main-product-feature-featured img").elevateZoom({
					scrollZoom : true,
					zoomWindowWidth: 300,
					zoomWindowHeight: 300
				});
			}
		}
	},
	gallery: function(){
		var self = this;
		if(window.F1GENZ_vars.product.featured.style_gallery == "style1"){
			$('.main-product .main-product-feature .main-product-feature-thumbs').slick({
				slidesToShow: 4,
				slidesToScroll: 1,
				arrows: true,
				prevArrow:"<button type='button' class='slick-prev'>‹</button>",
				nextArrow:"<button type='button' class='slick-next'>›</button>",
				touchThreshold: 100,
				infinite: true,
				focusOnSelect: true,
				responsive: [
					{
						breakpoint: 991,
						settings: {
							slidesToShow: 5,
						}
					},
					{
						breakpoint: 480,
						settings: {
							slidesToShow: 4,
						}
					}
				]
			})
			$('.main-product .main-product-feature .main-product-feature-thumbs').on('afterChange', () => self.zoom());
			$('body').on('click', '.main-product .main-product-feature .main-product-feature-thumbs .slick-slide', function(){
				var src = $(this).attr('data-src');
				$(".main-product-feature-featured img").attr("src", src);
				$(".main-product-feature-featured source").attr("srcset", src);
			})
		}else if(window.F1GENZ_vars.product.featured.style_gallery == "style2"){
			self.zoom();
			$('.main-product .main-product-feature .main-product-feature-thumbs').slick({
				slidesToShow: 4,
				slidesToScroll: 1,
				arrows: true,
				prevArrow:"<button type='button' class='slick-prev'>‹</button>",
				nextArrow:"<button type='button' class='slick-next'>›</button>",
				vertical: true,
				verticalSwiping: true,
				touchThreshold: 100,
				infinite: true,
				focusOnSelect: true,
			})
			$('.main-product .main-product-feature .main-product-feature-thumbs').on('afterChange', () => self.zoom());
			$('body').on('click', '.main-product .main-product-feature .main-product-feature-thumbs .slick-slide', function(){
				var src = $(this).attr('data-src');
				$(".main-product-feature-featured img").attr("src", src);
				$(".main-product-feature-featured source").attr("srcset", src);
			})
		}else if(window.F1GENZ_vars.product.featured.style_gallery == "style5"){
			$('.main-product .main-product-feature-outside .main-product-feature-thumbs').slick({
				slidesToShow: window.F1GENZ_vars.product.featured.item_in_style5,
				speed: 10000,
				cssEase: 'linear',
				autoplay: true,
				autoplaySpeed: 0,
				slidesToScroll: 1,
				arrows: true,
				prevArrow:"<button type='button' class='slick-prev'>‹</button>",
				nextArrow:"<button type='button' class='slick-next'>›</button>",
				touchThreshold: 100,
				infinite: true,
				focusOnSelect: false,
				pauseOnHover: false,
				arrows: false,
				dots: false,
				responsive: [
					{
						breakpoint: 767,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 2,
						}
					},
				]
			})
		}
	},
	content: function(){
		$('.main-product-description td, .main-product-description tr, .main-product-description th, .main-product-description thead, .main-product-description tbody').removeAttr('style class');
		$('.main-product-description table').addClass('table table-striped table-bordered').wrap('<div class="table-responsive"></div>');
		$('body').on('click', '.main-product-description .main-product-description-item-head', function(){
			$(this).parent().toggleClass('active');
			$(this).next().toggle();
		})
	},
	sharing: function(){
		$('body').on('click', '.main-product .main-product-share .main-product-share-cta', function(e){
			e.preventDefault();
			$('body, html').addClass('open-noscroll open-share');
		})
		$('body').on('click', '.main-product .main-product-share .main-product-share-overplay', function(e){
			e.preventDefault();
			$('body, html').removeClass('open-noscroll open-share');
		})
		$('body').on('click', '[data-type="main-product-share-copy"]', function(){
			var textBox = document.getElementById("main-product-share-copy");
			textBox.select();
			document.execCommand("copy");
			$(this).text('Đã sao chép');
			setTimeout(function(){
				$(this).text('Sao chép');
			}, 3000);
			$('body, html').addClass('open-noscroll open-share');
		})
	},
	relate: function(){
        console.log($('.main-product-relate').length)
		if($('.main-product-relate').length > 0 && $('.main-product-relate .product-item').length > 0){
			F1GENZ.Helper.productSlider('.main-product .main-product-relate .main-product-relate-data', 5, 3, 3, 1, { arrows: true });
		}
	},
	preOrder: function(){
		$('body').on('click', 'button[data-type="main-product-send-help"]', function(e){
			$('#preOrder-modal').modal();
			$('#preOrder-hard').val(window.F1GENZ_vars.product.data.name);
		});
		$('body').on('submit', '#preOrder-modal form', function(e){
			e.preventDefault();
			var text = $('#preOrder-hard').val();
			$('#preOrder-hard').next().val($('#preOrder-hard').next().val() + ' -- Tư vấn sản phẩm ' + window.F1GENZ_vars.product.data.name + ': ' + text);
			F1GENZ.Helper.postForm("#preOrder-modal", "/postcontact")
		})
	}
};
window.noPS && F1GENZ.Product.init();
