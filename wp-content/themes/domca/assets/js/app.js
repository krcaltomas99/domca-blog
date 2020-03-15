(function ($) {
	$(document).ready(function () {
		// MAIN APP CODE
		const $navLinks = $('.nav-links');
		// If has next, display placeholder prev
		const hasNext = $navLinks.find('.next').length;
		console.log(hasNext);

		if (hasNext) {
			$navLinks.prepend(`<div class="placeholder page-numbers prev"></div>`)
		} else {
			$navLinks.append(`<div class="placeholder page-numbers next"></div>`)
		}

	});
}(jQuery));
