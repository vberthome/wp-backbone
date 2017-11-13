(function($){
	$(function(){
		// Menu Burger
		$('.js-burger').click(function(e){
			e.preventDefault();

			var target = $($(this).attr('href'));

			target.slideToggle();
		});

		$('body').on('click', '.js-display-sub-menu', function(e){
			e.preventDefault();

			$(this).siblings('.sub-menu').slideToggle();
		});
	});
})(jQuery);