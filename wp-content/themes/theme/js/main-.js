var swiper, swiper2, swiper4, swiper6, swiper7;

function initMySwipers(){
	swiper2 = new Swiper('#slider2 .swiper-container', { 
		keyboardControl: true,
		slidesPerView: 'auto',      
		nextButton: '.swiper-button-next',
		prevButton: '.swiper-button-prev',
		grabCursor: true,
		paginationClickable: true,
		spaceBetween: 20,
		autoplayDisableOnInteraction: false
	});

	$('#slider2 .swiper-button-prev').on('click', function(e){
		e.preventDefault();
		swiper2.swipePrev();
	});

	$('#slider2 .swiper-button-next').on('click', function(e){
		e.preventDefault();
		swiper2.swipeNext();
	});

	swiper4 = new Swiper('#sliderproducto .swiper-container',{
		loop : true,
		loopAdditionalSlides: 0,
		loopedSlides: null,
		autoplay: 10000,
		nextButton: '.swiper-button-next',
		prevButton: '.swiper-button-prev',
		autoplayDisableOnInteraction: false
	});
	$('#sliderproducto .swiper-container .swiper-button-prev').on('click',function(){
		swiper4.swipePrev();
	});
	$('#sliderproducto .swiper-container .swiper-button-next').on('click',function(){
		swiper4.swipeNext();
	});

	swiper6 = new Swiper('#cafe-de-colobia .wrapper:nth-child(4) article:nth-child(1) .swiper-container',{
		loop : true,
		paginationClickable: true,
		nextButton: '.swiper-button-next',
		prevButton: '.swiper-button-prev',
		spaceBetween: 30
	});
	$('#cafe-de-colobia .wrapper:nth-child(4) article:nth-child(1) .swiper-container .swiper-button-prev').on('click',function(){
		swiper6.swipePrev();
	});
	$('#cafe-de-colobia .wrapper:nth-child(4) article:nth-child(1) .swiper-container .swiper-button-next').on('click',function(){
		swiper6.swipeNext();
	});

	swiper7 = new Swiper('#cafe-de-colobia .wrapper:nth-child(4) article:nth-child(2) .swiper-container',{
		loop : true,
		paginationClickable: true,
		nextButton: '.swiper-button-next',
		prevButton: '.swiper-button-prev',
		spaceBetween: 30
	});
	$('#cafe-de-colobia .wrapper:nth-child(4) article:nth-child(2) .swiper-container .swiper-button-prev').on('click',function(){
		swiper7.swipePrev();
	});
	$('#cafe-de-colobia .wrapper:nth-child(4) article:nth-child(2) .swiper-container .swiper-button-next').on('click',function(){
		swiper7.swipeNext();
	});
}

$(document).ready(function(){
	$('#language').ddslick({
		onSelected: function (selectedData) {
			if(selectedData.selectedData.value != ''){
				if(('/'+$('html').attr('lang')) != selectedData.selectedData.value){
					if(selectedData.selectedData.value == '/es')
						location.href = 'http://www.buencafe.com/cafe-colombia/';
					else
						
						location.href = 'http://www.buencafe.com/cafe-colombia/'+selectedData.selectedData.value;
				}
			}
		}
	});
	$('#category').ddslick({
		onSelected: function (selectedData) {
			if(selectedData.selectedData.value != ''){
				location.href = selectedData.selectedData.value;
			}
		}
	});
	$('#country_contact').ddslick({
		onSelected: function (selectedData) {
			if(selectedData.selectedData.value != ''){
				console.log(data);
				// location.href = selectedData.selectedData.value;
			}
		}
	});

	$('#country').ddslick({
		onSelected: function (selectedData) {
			if(selectedData.selectedData.value != ''){
			}
		}
	});
	$('#month').ddslick({
		onSelected: function (data) {
			console.log(data);
		}
	});
	$('#year').ddslick({
		onSelected: function (data) {
			console.log(data);
		}
	});
	swiper = new Swiper('#slider .swiper-container', {
		pagination: '.swiper-pagination',
		paginationClickable: true,
		loop : true,
		autoplay: 4000,
		autoplayDisableOnInteraction: false,
		centeredSlides: true,
	});

	// Inicializacion de los Swipers
	initMySwipers();

	var swiper3 = new Swiper('#slider3 .swiper-container', {
		slidesPerView: 'auto',
		slidesPerColumn: 2,
		spaceBetween: 0
	});

	$('.c-hamburger').on('click',function(){
		$('header nav').slideToggle();
	});
	$('#product .wrapper section:nth-child(1) iframe').height(($('#product .wrapper section:nth-child(2) .swiper-container').height()));
	$('#cafe-de-colobia article:nth-child(2) iframe').height(($('#cafe-de-colobia article:nth-child(1) img').height()));

	if ($('.cd-horizontal-timeline .events-content').length > 0) {$('.cd-horizontal-timeline .events-content li').height(($('.cd-horizontal-timeline .events-content').width()*418/582))};
	if ($('.cd-horizontal-timeline .events-content').length > 0) {$('.cd-horizontal-timeline .events-content').height(($('.cd-horizontal-timeline .events-content').width()*418/582))};

	if ($('#empresas').length > 0) {
		if($(window).width() > 600){
			$('#empresas').height($('#empresas').width()*540/1136);
		}else{
			$('#empresas').height($('#empresas').width()*875/600);
		}
	}
	$(window).resize(function(){
		if ($('#empresas').length > 0) {
			if($(window).width() > 600){
				$('#empresas').height($('#empresas').width()*540/1136);
			}else{
				$('#empresas').height($('#empresas').width()*875/600);
			}
		}  

	$('#product .wrapper section:nth-child(1) iframe').height(($('#product .wrapper section:nth-child(2) .swiper-container').height()));
	$('#cafe-de-colobia article:nth-child(2) iframe').height(($('#cafe-de-colobia article:nth-child(1) img').height()));

		if ($('.cd-horizontal-timeline .events-content').length > 0) {$('.cd-horizontal-timeline .events-content li').height(($('.cd-horizontal-timeline .events-content').width()*418/582))};
		if ($('.cd-horizontal-timeline .events-content').length > 0) {$('.cd-horizontal-timeline .events-content').height(($('.cd-horizontal-timeline .events-content').width()*418/582))};

	});

	var swiper5 = new Swiper('#experiencia .swiper-container', {
		pagination: '.swiper-pagination',
		paginationClickable: true,
		loop : true,
		autoplay: 4000,
		autoplayDisableOnInteraction: false
	});

/* Envio formulario de busqueda (BLOG) */
$('#buscar .submit').on('click', function (e) {
	e.preventDefault();

	/* 
	Obtengo el dato. esto retorna: 			
	selectedIndex (0 based),
	selectedItem (HTML 'li' element),
	selectedData (nested object with text, value, description, imageSrc)
	*/
	var ddData = $('#month').data('ddslick'),
	ddData2 = $('#year').data('ddslick'),
	dato_mes = ddData.selectedData.value,
	dato_anio = ddData2.selectedData.value,
	action = $("#url").val();

	/* Formulario de busqueda */

	var formulario = $('<form action="'+action+'" method="GET">'+
		'<input type="hidden" name="month" value="'+dato_mes+'" />'+
		'<input type="hidden" name="anio" value="'+dato_anio+'" />'+
		'</form>').appendTo('body'); /* agrego el formualrio al body */

	formulario.submit()
	formulario.remove(); /* una vez enviado lo borro */
});

/* Envio formulario de contacto */
$('#contact-form .submit').on('click', function (e) {
	e.preventDefault();
	/* 
	Obtengo el dato. esto retorna: 			
	selectedIndex (0 based),
	selectedItem (HTML 'li' element),
	selectedData (nested object with text, value, description, imageSrc)
	*/
	var ddData = $('#country_contact').data('ddslick');

	/* Datos */
	var dato_pais = ddData.selectedData.value;
	var nombre = $('#nombre').val();
	var mail = $('#mail').val();
	var telefono = $('#telefono').val();
	var empresa = $('#empresa').val();
	var mensaje = $('#mensaje').val();


	/* Formulario de busqueda */
	/* url */
	var action = $("#url").val();

	var formulario = $('<form action="'+action+'" method="POST">'+
		'<input type="hidden" name="pais" value="'+dato_pais+'" />'+
		'<input type="hidden" name="nombre" value="'+nombre+'" />'+
		'<input type="hidden" name="mail" value="'+mail+'" />'+
		'<input type="hidden" name="telefono" value="'+telefono+'" />'+
		'<input type="hidden" name="empresa" value="'+empresa+'" />'+
		'<input type="hidden" name="mensaje" value="'+mensaje+'" />'+
		'</form>').appendTo('body'); /* agrego el formualrio al body */

	formulario.submit()
	formulario.remove(); /* una vez enviado lo borro */
});

/* Envio formulario de Comentarios */
$('#commentform span').on('click',function(){
	$(this).closest('form').find('input[type="submit"]').click();
});

/* Envio formulario de busqueda (HEADER) */
$("header form a.submit").on("click", function(){
	$(this).closest('form').find('input[type="submit"]').click();
});

/* Envio formulario de registro */
$('#formRegistro .submit').on('click',function(){
	$(this).closest('form').find('input[type="submit"]').click();
});

/* Envio formulario de Login */
$('#formLogin .submit').on('click',function(){
	$(this).closest('form').find('input[type="submit"]').click();
});
/* Envio formulario de Login */
$('#contact .submit').on('click',function(){
	$(this).closest('form').find('input[type="submit"]').click();
});

/* Envio formulario de recupero */
$('#formrecuperar .submit').on('click',function(){
 	$(this).closest('form').find('input[type="submit"]').click();
});

/* Envio formulario de descarga */
$('#descarga_portfolio .submit').on('click',function(){
 	$('#descarga_portfolio').submit();
});


/* CLICK EN UN PRODUCTO */
if($('#product').length > 0){

	if($(window).width() > 1000){
	if(window.location.hash){

		var a = window.location.hash.split("#");
		$('section#product > article > div > div').removeClass('active');

		openproduct($('section#product > article > div > div[data-producto="'+a[1]+'"]').attr('class'),$('section#product > article > div > div[data-producto="'+a[1]+'"]'));
		$('section#product > article > div > div[data-producto="'+a[1]+'"]').addClass('active');
		$("html, body").animate({ scrollTop: $('section#product > article > div').offset().top-100 }, 1000);
	}
	}
}
$(".producto").click(function(e){
	var data_descarga = $(this).attr("data-descarga");
	if( data_descarga == 1 ){
		e.preventDefault();
		$('.overlay').fadeIn();
		$('.popup').fadeIn();
	}
});

$("#slider article a").click(function(e){
	var data_descarga = $(this).attr("data-descarga");
	if( data_descarga == 1 ){
		e.preventDefault();
		$('.overlay').fadeIn();
		$('.popup').fadeIn();
	}
});

$('.Empaques .abrirPopUp').click(function(){
	$('.overlay').fadeIn();
	$('.popup2').fadeIn();
});

$(".popup .cerrar").click(function(e){
	e.preventDefault();
	$('.overlay').fadeOut();
	$('.popup').fadeOut();
});
$(".popup2 .cerrar").click(function(e){
	e.preventDefault();
	$('.overlay').fadeOut();
	$('.popup2').fadeOut();
});

if ($('.masonry').length > 0) {

	var $grid = $('.masonry');
	$grid.masonry({
  // options
  itemSelector: 'article',
  fitWidth: true
});

// layout Masonry after each image loads
$grid.imagesLoaded().progress( function() {
	$grid.masonry('layout');
});
}


function openproduct(_data,el){
	data = _data.split(" ");
	if($(el).index() == 0){
		// Estilos
		$('section#product > article > div > div.active').removeClass('active');
		//$('section#product > article > div > div:first-child').attr('class','active '+idioma);
		$('section#product > article > div > div:first-child').attr('class','TipoDeCafe '+idioma);
		$('.TipoDeCafe').css("left","0px");
		$('.Sensorial, .Tostacion, .Certificacion, .Empaques').css("left","auto");
	}

	if(data[0] == 'Sensorial'){
		// Estilos
		$('section#product > article > div > div.active').removeClass('active');
		//$('section#product > article > div > div:first-child').attr('class',idioma);
		$('.Sensorial').css("left","115px");
		$('.Tostacion, .Certificacion, .Empaques').css("left","auto");
	}

	if(data[0] == 'Tostacion'){
		// Estilos
		$('section#product > article > div > div.active').removeClass('active');
		//$('section#product > article > div > div:first-child').attr('class',idioma);
		$('.Sensorial').css("left","115px");
		$('.Tostacion').css("left","240px");
		$('.Certificacion, .Empaques').css("left","auto");
	}
	
	if(data[0] == 'Certificacion'){
		// Estilos
		$('section#product > article > div > div.active').removeClass('active');
		//$('section#product > article > div > div:first-child').attr('class',idioma);
		$('.Sensorial').css("left","115px");
		$('.Tostacion').css("left","240px");
		$('.Certificacion').css("left","365px");
		$('.Empaques').css("left","auto");
	}
	
	if(data[0] == 'Empaques'){
		// Estilos
		$('section#product > article > div > div.active').removeClass('active');
		//$('section#product > article > div > div:first-child').attr('class',idioma);
		$('.Sensorial').css("left","115px");
		$('.Tostacion').css("left","240px");
		$('.Certificacion').css("left","365px");
		$('.Empaques').css("left","505px");
	}
}

var idioma = $('section#product > article > div > div:first-child').attr('data-idioma');
// $(function(){
// 	$('section#product > article > div > div:first-child').attr('class','active '+idioma);
// });
$(function(){
	if ( idioma == "english" ) {
		/* Productos */
		$('section#product > article > div > div:nth-child(2)').addClass('perfil-en');
		$('section#product > article > div > div:nth-child(3)').addClass('tostacion-en');
		$('section#product > article > div > div:nth-child(4)').addClass('certificaciones-en');
		$('section#product > article > div > div:nth-child(5)').addClass('empaques-en');
	}else{
		/* Productos */
		$('section#product > article > div > div:nth-child(2)').addClass('perfil-es');
		$('section#product > article > div > div:nth-child(3)').addClass('tostacion-es');
		$('section#product > article > div > div:nth-child(4)').addClass('certificaciones-es');
		$('section#product > article > div > div:nth-child(5)').addClass('empaques-es');
	}
});
/* ----- AGLOMERADO ----- */

$('section#product > article > div h3 a').on('click',function(e){
	e.preventDefault();
	$('section#product > article > div > div').removeClass('active');
	openproduct($(this).closest('div').attr('class'),$(this).closest('div'));
	$(this).closest('div').addClass('active');
});
$('section#product > article > div div > a').on('click',function(e){
	e.preventDefault();
	$('section#product > article > div > div.active').attr('class','active '+idioma);
	$(this).closest('div.active').attr('class',idioma+' active '+$(this).attr('data-product'));
	if ($(window).width() <= 630) {
		$('section#product > article > div > div:nth-child(1) .info').eq(($(this).index()-1)).addClass('active');
	}
});
$('section#product > article > div > div:nth-child(1) .info .close').on('click',function(e){
	e.preventDefault();
	$('section#product > article > div > div:nth-child(1) .info').removeClass('active');
});

});

// ------------------------- SECCION GREMIO ------------------------- //
$("#empresas a").on("click", function(e){
	e.preventDefault();
	var data = $(this).attr("data-empresa");
	showImage(data);
});

function showImage(data){
	var dataImg, mascara;
	$("#empresas div .grande").each(function(){
		dataImg = $(this).attr("data-empresa");
		mascara = $(this).attr("data-mascara");
		if( data == dataImg ){
			$("#empresas div a").hide();
			$(".gremio div a").hide();
			$(this).show(); /* muestra etiqueta a */
			$(this).find("img").show(); /* muestra etiqueta img */
			$("#empresas").css({'background':'url('+mascara+')'});
		}
	});
}

/* Img de fondo de quienes somos */
function bgImgGremioQS(){
	var loc = window.location.href;
	var arr = loc.split('/');
	/* Si esta en ingles */
	if(arr.indexOf('en') > -1){
		$("#empresas").attr('class','emp-en');
		return;
	}
	else if(arr.indexOf('en') == -1)
		$("#empresas").attr('class','emp-es');
}

$(function(){bgImgGremioQS();});

$("#empresas div .grande .btn_cerrar").on( "click", function(){
				$("#empresas").css({'background':''});
$(this).closest('div').hide();
	$(".gremio div a").show();
	bgImgGremioQS();
});

// ------------------------- Encontrar seccion del menu actual ------------------------- //

$(function(){
	var loc = window.location.href;
	var arr = loc.split('/'),
	i;



	/* Si el usuario esta en una receta */
	for(i in arr){
		if(arr[i].indexOf('receta') > -1)
			$('nav ul li:nth-child(3)').addClass('active'); /* A experiencia de marca */
	}
	$('nav ul').find('li').each(function() {
		var href = $(this).find('a').attr('href')+"/";
		if (href == loc){
			$(this).addClass('active');
		}
	});

	$(function(){
		$('#link_federacion').on('click', function(){
			var url = $('#link_federacion').attr('href');
			 // window.location.assign(url);
			 window.open(url, '_blank');
			});
	});
});

//Inicilizacion del Swiper de productos (RESIZE)
$(window).on('resize', function(){
	
	if( $("#slider2").length > 0 ){
		if( swiper2 == undefined ) {
			initMySwiper();       
		} else if ( swiper2 != undefined ) {
			swiper2.destroy();
			swiper2 = undefined;
			jQuery('.swiper-wrapper').removeAttr('style');
			jQuery('.swiper-slide').removeAttr('style');

			initMySwipers();
		}		
	}

	if( $("#sliderproducto").length > 0 ){
		if( swiper4 == undefined ) {
			initMySwipers();       
		} else if ( swiper4 != undefined ) {
			swiper4.destroy();
			swiper4 = undefined;
			jQuery('.swiper-wrapper').removeAttr('style');
			jQuery('.swiper-slide').removeAttr('style');

			initMySwipers();
		}
	}

	if( $("#cafe-de-colobia").length > 0 ){
		if( (swiper6 == undefined) && (swiper7 == undefined) ) {
			initMySwipers();       
		} else if ( (swiper6 != undefined) && (swiper7 != undefined) ) {
			swiper6.destroy();
			swiper6 = undefined;
			swiper7.destroy();
			swiper7 = undefined;
			jQuery('.swiper-wrapper').removeAttr('style');
			jQuery('.swiper-slide').removeAttr('style');

			initMySwipers();
		} 
	}
});