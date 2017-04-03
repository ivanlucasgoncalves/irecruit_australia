/**
*	jQuery Document Ready
*/

jQuery( document ).ready( function($) {

	/** Modal Start Free Trial**/
	$('.starttrial-link').on('click', function(event) { //open popup
		event.preventDefault();
		$('.cd-popup').addClass('is-visible');
	});

	$('.cd-popup').on('click', function(event){ //close popup
		if( $(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup') ) {
				event.preventDefault();
				$(this).removeClass('is-visible');
		}
		window.localStorage.clear();
	});

	$(document).keyup(function(event){ //close popup when clicking the esc keyboard button
		if(event.which=='27'){
			$('.cd-popup').removeClass('is-visible');
			window.localStorage.clear();
		}
	});

	/** Modal Video**/
	$('.play_btn').on('click', function(event) { //open popup
		event.preventDefault();
		$('.cd-popup-video').addClass('is-visible');
		$("#video")[0].src += "&autoplay=1";
	});

	$('.cd-popup-video').on('click', function(event){ //close popup
		if( $(event.target).is('.cd-popup-video-close') || $(event.target).is('.cd-popup-video') ) {
				event.preventDefault();
				$('#video')[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');
				$(this).removeClass('is-visible');
		}
		window.localStorage.clear();
	});

	$(document).keyup(function(event){ //close popup when clicking the esc keyboard button
		if(event.which=='27'){
			$('#video')[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');
			$('.cd-popup-video').removeClass('is-visible');
			window.localStorage.clear();
		}
	});

	/** AddClass for every single img for avoiding mistakes **/
	$("img").addClass("img-fluid");

	/** For now add display none into hide customers container - I will change to make it better later. **/
	jQuery('.lineCustomers:contains("hide"), .line-customers:contains("hide")').remove();

	$(".center").slick({
		dots: false,
		centerMode: true,
		centerPadding: '40px',
		slidesToShow: 1,
		swipeToSlide: true,
		draggable: false,
		arrows: false,
		infinite: false,
	});

	/** Transformicons **/
	transformicons.add('.tcon');

	/** Scroll Animations **/
	jQuery('.content-artworks').addClass("invisible").viewportChecker({
		classToAdd: 'visible animated fadeInUp',
		classToRemove : 'invisible',
		removeClassAfterAnimation: true,
		offset: 100
	});
	jQuery('.content-standards').addClass("invisible").viewportChecker({
		classToAdd: 'visible animated fadeInUp',
		classToRemove : 'invisible',
		removeClassAfterAnimation: true,
		offset: 100
	});

	/** Create onclick event after loading script from Hubspot **/
	var ctaonclick = "var params=this.href.split('&').reduce(function(result, item) {result[item.split('=')[0]] = decodeURIComponent(item.split('=')[1]);return result;},{}); var qp='?hsCtaTracking='+params.placement_guid+'&__hstc='+params.__hstc+'&__hssc='+params.__hssc+'&__hsfp='+params.__hsfp; (window.history && window.history.pushState) ? window.history.pushState('ab-test','call-to-action',qp) : window.location.hash=qp; return false;";
	var checkExist = setInterval(function() {
		 if ($('.starttrial-link .cta_button, .blk-button .cta_button').length) {
				$('.starttrial-link .cta_button, .blk-button .cta_button').attr( "onClick" , ctaonclick );
				//console.log("Exists!");
				clearInterval(checkExist);
		 }
	}, 100); // check every 100ms

  /** Slide Menu **/
	var menuRight = document.getElementById( 'cbp-spmenu-s2' ),
	showRight = document.getElementById( 'showRight' ),
	showRightPush = document.getElementById( 'showRightPush' ),
	//body = document.body,
	mainsite = document.getElementById( 'mainsite' );
	masthead = document.getElementById( 'masthead' );

	showRightPush.onclick = function() {
		classie.toggle( this, 'active' );
		classie.toggle( masthead, 'cbp-spmenu-push-toleft' );
		classie.toggle( mainsite, 'cbp-spmenu-push-toleft' );
		classie.toggle( menuRight, 'cbp-spmenu-open' );
	};

	/** Main Menu **/
	$( "#showRightPush" ).click(function() {
	  $( '.overlay-contentscale' ).toggleClass( "open" );
		$( 'body' ).toggleClass( "pos-over" );
		$(".overlay-menu").toggleClass("appear-overlay");
	});

	/** Blur Slide Image on Scroll **/
	$(window).on('scroll', function () {
		var scroll = $(this).scrollTop(); /** Shadow Header on Scroll **/
    var pixs = $(document).scrollTop(); /** Blur Slide Image on Scroll **/
		var pos = $(document).scrollTop(); /** Blur Slide Image on Scroll **/
    pixs = pixs / 60;
		pos = pos / 120;
    $(".blur").css({"transform": "translate(0px,"+pixs+"px)","filter": "blur("+pixs+"px)", "background-position": "center "+pos+"px" });

		if (scroll >= 5) { /** Shadow Header on Scroll **/
      $(".addshadow").addClass("shadow");
    } else {
      $(".addshadow").removeClass("shadow");
    }

	});

	/** Smooth Scroll Anchors **/
	$('a[href*="#"]:not([href="#"])').on('click', function() {
		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			if (target.length) {
				$('html,body').animate({
					scrollTop: target.offset().top-30
				}, 500);
				return false;
			}
		}
	});

	/**Slideshow **/
	var qtdSlides = $('#slider .wrapper .item').length; // Building slide bullets
	for(var i = 0; i < qtdSlides; i++){
		if ( i == 0 ){
			$('#slider ul.bullets').append('<li class="ativo"><span></span></li>');
		} else{
			$('#slider ul.bullets').append('<li><span></span></li>');
		}
	}
	$('#slider .wrapper .item').first().addClass('ativo');

	var maior = 0;
	var limite = $('#slider .wrapper .item').length;
	window.botaoSlider = true

	$('section#slider .wrapper .item, section#slider .wrapper .item .blur').each(function(index, el) { //Height
		var tamanho = $(this).outerHeight();
		if ( tamanho > maior ){ maior = tamanho }
	}).css('height', maior);

	function animaSlider(qual){
		window.botaoSlider = false;
		$('section#slider .wrapper .item.ativo').animate({opacity: 0}, 600, function(){
			$(this).removeClass('ativo');
		});
		$('section#slider .wrapper .item:eq('+qual+')').show().animate({opacity: 1}, 600, function(){
			$(this).addClass('ativo');
			window.botaoSlider = true;
		});
	}

	$('section#slider ul.bullets li').click(function(event) {
		if( botaoSlider ){
			var qual = $(this).index();
			clearInterval(slideshow);

			$('section#slider ul.bullets li.ativo').removeClass('ativo');
			$(this).addClass('ativo');

			animaSlider(qual);
		}
	});

	var slideshow = setInterval(function(){
		var qual = $('#slider ul.bullets li, #slider .wrapper .item.ativo').index();
		if ( qual < limite - 1 ){
			qual = qual + 1;
		} else{
			qual = 0;
		}
		$('section#slider ul.bullets li.ativo').removeClass('ativo');
		$('section#slider ul.bullets li:eq('+ qual + ')').addClass('ativo');

		animaSlider(qual);
	}, 8000);

	/** Wrap Line into Textarea **/
	var textAreas = document.getElementsByTagName('textarea');
	Array.prototype.forEach.call(textAreas, function(elem) {
	    elem.placeholder = elem.placeholder.replace(/\\n/g, '\n');
	});

	/** Modal Form **/
	var checkExistForm = setInterval(function() {
		 if ($('.hs-form').length) {

				//console.log("Exists Form!");
				clearInterval(checkExistForm);

				var data = {};
		  	//if submit button is clicked
		  	$('.form_step01 input[type="email"]').on('change', function() {
		  		//Get the data from all the fields
		  		data[ $(this).attr('id') ] = $(this).val();
		  		// Var JSON Data
		  		var jsonData = localStorage.setItem('formData', JSON.stringify(data));
		  		//return false;
		  	});
		    var plan = {};
		    $('.inside-div a').on('click', function () { // something with the class store clicked
		      plan[ $(this).attr('id') ] = $(this).data('value');
		      var json = localStorage.setItem('planData', JSON.stringify(plan));
		      if(localStorage.getItem('planData')) {
		        json = localStorage.getItem('planData');
		        var result = JSON.parse(json);
		        for (var key in result) {
		          $('.hs_plans .hs-input').val(result[key]);
		        }
		      }
		    });
		    // Trap for forms - I know it is not pretty but I should make it quickly
		    $('.modal-form .form_step01 input[type="submit"]').click(function() {

		      if(localStorage.getItem('formData')) {
		        jsonData = localStorage.getItem('formData');
		        var result = JSON.parse(jsonData);
		        for (var key in result) {
		          //Modal
		          $('.emailtest input').val(result[key]);
		          $('.hs_email .hs-input').val(result[key]);
		          $(".form_step02").fadeIn();
		        }
		      }
		    });
		    $('.modal-form .form_step02 input[type="submit"]').click(function() {
		      window.localStorage.clear();
		      $('.modal-form .thanks-message').css('display','block');
		      $('.modal-form .emailtest, .modal-form h4, .modal-form .first-p').hide();
		    });
		 }
	}, 100); // check every 100ms

	/** Phone front page area **/
	$('.phonelinks li a').first().addClass('actived'); // Add highlight to the first menu link

	$('.phonelinks li a').click(function(event) {
		event.preventDefault();

		var item = $(this).parent().attr('data-target');
		var ordemItem = $('.item#'+item).index();

		var posicaoAtual =  parseFloat($('.wrapper_phone').css('top'),10);
		var quantoMover = $('#phonessel').outerHeight() * ordemItem;

		$('.wrapper_phone').animate({top: -quantoMover}, function(){
			// Reaching position to appear the description for each element
			var position = $(this).css('top');
			if ( position == "-415px" ) {
				$('.strenghts, .workplaceinsights, .personalityprofile').fadeOut();
				$('.personalitysummary').fadeIn();
			}
			else if ( position == "-830px" ) {
				$('.strenghts, .personalitysummary, .personalityprofile').fadeOut();
				$('.workplaceinsights').fadeIn();
			}
			else if ( position == "-1245px" ) {
				$('.personalitysummary, .personalityprofile, .workplaceinsights').fadeOut();
				$('.strenghts').fadeIn();
			}
			else {
				$('.personalityprofile').fadeIn();
				$('.strenghts, .personalitysummary, .workplaceinsights').fadeOut();
			}
	  });

		$('.phonelinks li a.actived').removeClass('actived');
		$(this).addClass('actived');

  });


}); /* Close Document Ready */
