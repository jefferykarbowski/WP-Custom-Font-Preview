(function( $ ) {

	$("#wp_custom_font_preview_input").on("change paste keyup cut select input", function() {
		let text = $(this).val()

		if (text) {
			$(".wp-custom-font-preview").text(text)
		} else {
			$(".wp-custom-font-preview").each(function() {
				let text = $(this).data("default-text")
				$(this).text(text)
			})
		}

	});

})( jQuery )
