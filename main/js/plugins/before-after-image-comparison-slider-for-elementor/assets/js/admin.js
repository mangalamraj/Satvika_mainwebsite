jQuery(document).ready(function(){
	jQuery('.wb-ebaic-already-reviewed').on('click', function(e){
		e.preventDefault();
		var _this = this;
		jQuery.ajax({
			type: 'post',
			url: wb_ebaic_ajax_object.ajax_url,
			data: {
				action: 'wb_ebaic_review_transient',
			},
			success: function( result ){
				jQuery(_this).parents('.notice').slideUp();
			}
		});
	});

	jQuery('.wpbebaic-up-pro-link').parent().attr('target','_blank');
});