// ------------------------- SECCION VIDEOS ------------------------- //

	/* ----- Cambiar de video ----- */
function changeVideo(_this){
	var video = _this.attr('data-video');
	var titulo = _this.attr('data-titulo')+": ";
	var descripcion = _this.attr('data-descripcion');

	$('section#experiencia > article > div div p strong').text(titulo);
	$('section#experiencia > article > div div p span').text(descripcion);
	document.getElementById("videoActual").src = video;
}

/* ----- Al seleccionar ----- */
$('section#experiencia > article > div ul li a').on('click',function(e){
	/* ----- Asignar clase activa ----- */
	$('section#experiencia > article > div > ul > li').removeClass('active');
	$(this).closest('li').addClass('active');
	changeVideo( $(this) );

});

/* ----- Primer video ----- */
$(function (){
	// Selecciono el primer elemento <li> de la lista
	var _this = $('section#experiencia > article > div ul li:first-child a');
	//Le agrego la clase activa a ese elemento
	$('section#experiencia > article > div > ul > li:first-child').addClass('active');
	changeVideo(_this);
});