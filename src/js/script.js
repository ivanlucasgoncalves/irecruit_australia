/**
*	jQuery Document Ready
*/

jQuery( document ).ready( function($) {

	/** AddClass for every single img for avoiding mistakes **/
	$("img").addClass("img-fluid");

	/** For now add display none into hide customers container - I will change to make it better later. **/
	jQuery('.lineCustomers:contains("hide")').remove();

	/** Transformicons **/
	transformicons.add('.tcon');

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

	/** Modal **/
  $('.starttrial-link').on('click', function() {
    $('#myModal').fadeIn();
  });
  $('.close').on('click', function() {
    $('#myModal').fadeOut();
		window.localStorage.clear();
  });

	$(window).on('scroll', function () {
    var pixs = $(document).scrollTop()
    pixs = pixs / 50;
    $(".blur").css({"transform": "translate(0px,"+pixs+"px)","filter": "blur("+pixs+"px)" })
	});

	/** Modal Video **/
	$('.play_btn').on('click', function() {
    $('#myModal_Video').fadeIn(function(){
			$("#video")[0].src += "&autoplay=1";
		});
  });
  $('.x_modal_video').on('click', function() {
    $('#myModal_Video').fadeOut(function(){
			$('#video')[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');
		});
  });

	/** Smooth Scroll Anchors **/
	$('a[href*="#"]:not([href="#"])').on('click', function() {
		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			if (target.length) {
				$('html,body').animate({
					scrollTop: target.offset().top-20
				}, 1000);
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

	$('section#slider .wrapper .item').each(function(index, el) { //Height
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
	}, 5000);

	/** Wrap Line into Textarea **/
	var textAreas = document.getElementsByTagName('textarea');
	Array.prototype.forEach.call(textAreas, function(elem) {
	    elem.placeholder = elem.placeholder.replace(/\\n/g, '\n');
	});

	/** Modal Form **/
	setTimeout(function(){
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
  }, 1100);

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
				$('.personality_profile').fadeOut();
				$('.strenghts').fadeIn();
			}
			else if ( position == "-830px" ) {
				$('.strenghts').fadeOut();
			}
			else if ( position == "-1245px" ) {
				$('.strenghts').fadeOut();
			}
			else {
				$('.personality_profile').fadeIn();
				$('.strenghts').fadeOut();
			}
	  });

		$('.phonelinks li a.actived').removeClass('actived');
		$(this).addClass('actived');

  });

}); /* Close Document Ready */
