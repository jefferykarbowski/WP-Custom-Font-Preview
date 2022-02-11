(function( $ ) {

	$("#wp_custom_font_preview_input").on('keyup', function() {

		let text = $(this).val();

		$(".wp_custom_font_preview_output").text(text);

	});

})( jQuery );
