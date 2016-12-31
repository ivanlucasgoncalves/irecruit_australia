/**
*	jQuery Document Ready
*/

jQuery( document ).ready( function($) {

	$('#AddCityA').click(function () {
    $('#AddCity').slideToggle("slow");
  });

	/** AddClass for every single img for avoiding mistakes **/
	$("img").addClass("img-fluid");

	/** Transformicons **/
	transformicons.add('.tcon');

  /** Slide Menu **/
	var menuRight = document.getElementById( 'cbp-spmenu-s2' ),
	showRight = document.getElementById( 'showRight' ),
	showRightPush = document.getElementById( 'showRightPush' ),
	body = document.body;

	showRightPush.onclick = function() {
		classie.toggle( this, 'active' );
		classie.toggle( body, 'cbp-spmenu-push-toleft' );
		classie.toggle( menuRight, 'cbp-spmenu-open' );
	};

	/** Main Menu **/
	$( "#showRightPush" ).click(function() {
	  $( '.overlay-contentscale' ).toggleClass( "open" );
		$( 'body' ).toggleClass( "pos-fixed" );
		$("#masthead").toggleClass("whiteBg");
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

	var textAreas = document.getElementsByTagName('textarea');

	Array.prototype.forEach.call(textAreas, function(elem) {
	    elem.placeholder = elem.placeholder.replace(/\\n/g, '\n');
	});

}); /* Close Document Ready */
