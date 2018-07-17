$(document).ready(function() {

	// --------------------------------------------------
	// If JS is enabled - run page transitions
	// --------------------------------------------------
	$(".js #container").animsition({
		inClass: 'fade-in-up-sm',
		outClass: 'fade-out-up-sm',
		inDuration: 400,
		outDuration: 400,
		linkElement: '.al',
		loading: true,
		loadingParentElement: 'body',
		loadingClass: 'animsition-loading',
		timeout: false,
		timeoutCountdown: 5000,
		onLoadEvent: true,
		browser: [ 'animation-duration', '-webkit-animation-duration'],
		overlay : false,
		transition: function(url){ 
			window.location.href = url; 
		}
	});



	$(document).on('click', '.hamburger-container',function(e) {
		if( $('.menu').hasClass('animate') ) {
			$('.menu, .bar').removeClass('animate');
		} else {
			$('.menu, .bar').addClass('animate');
		}
	});

	$(document).on('click','.hamburger-menu', function(e){
		e.preventDefault();
		//$('html, body').animate({ scrollTop: 0 }, 'fast');
		$('html').toggleClass('nav-open');
	});


	// --------------------------------------------------
	// LIGHTBOX
	// --------------------------------------------------
	$(document).on('click', '[data-toggle="lightbox"]', function(event) {
		event.preventDefault();
		$(this).ekkoLightbox();
		console.log('******activate lightbox');
	});








}); // document.ready

// ----------------------------------------
console.log('---> Main is loaded.');




