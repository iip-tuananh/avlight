F1GENZ.Blog = {
	init: function(){
		this.sidebar();
	},
	sidebar: function(){
		$('body').on('click', '.main-blog .main-blog-right .main-blog-right-menu .main-blog-right-menu-data .hasChild > a span', function(e){
			e.preventDefault();
			$(this).parent().toggleClass('active');
			$(this).parent().next().slideToggle();
		})
	},
}
window.noPS && F1GENZ.Blog.init();