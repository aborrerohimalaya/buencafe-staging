/*---------- VARIABLES GLOBALES ----------*/
var pagina = 2;
// var postByPage = 2;
var infinite = false;
var infinitescrollv = false;
var noMasResultados = false;
var masResultados = false;

// if($('.infinite').length>0){
//   var infinitescrollallow = true;
// }else{
//   var infinitescrollallow = false;
// }
// if(infinitescrollallow == true){
//     infinitescroll();
// }

function infinitescroll(){
 if(infinitescrollallow == true){
  $(window).scroll(function(){    
    if($(window).scrollTop() + ($(window).height()) == $(document).height() && infinitescrollv == false){
      $.ajax({
        url:$('.anterior').attr('href'),
      } ).done(function(html) {
        var $response=$(html);
        elements =$response.find('.box');
        posteos = $(elements).length;

        if( posteos == 0){
          noMasResultados = true;
          infinitescrollv = false;
          // postByPage++;
        }
        else{
          pagina++;
          var url = $('.anterior').attr('href');
          var urlAux = url.split(pagina-1);
          $('.anterior').attr('href',urlAux[0]+pagina).html(pagina)
        }
        alert("asd");
        if(noMasResultados != true){
          infinite = true;
          console.log(elements);
          $(".box").append(elements); 
        }
      });
   }
 }); 
}
}

// function loadArticle(pageNumber){   
//     $.ajax({
//           url: $('.anterior').attr('href'),
//           type:'POST',
//     }).done(function(html) {
//             var $response=$(html);
//             elements =$response.find('.content');
//               $(".content").append(elements);    // This will be the div where our content will be loaded
//           });
//   return false;
// }

// function infinitescrollload(){ 
//   if(noMasResultados != true){
//     infinitescrollv = true;
//   //$('.loading').show();

//   $.ajax({
//     url:$('.anterior').attr('href'),

//   } ).done(function(html) { 
//     var $response=$(html);
//     elements =$response.find('.box');
//     posteos = $(elements).length;

//     elements.appendTo('.posts');
//     conteo = $('section:not(#relacionadas,#perfil,#cumpleaneros-del-mes,#descargables,#descargablesv2) > .posts .post:not(.destacado)').length + ($('section:not(#relacionadas,#perfil,#cumpleaneros-del-mes,#descargables,#descargablesv2) > .posts .post.destacado').length*4);
//     console.log(conteo);
//     if(conteo < (36*postByPage-1)){
//       masResultados = true;
//       pagina++;
//       var url = $('.anterior').attr('href');
//       var urlAux = url.split(pagina-1);
//       $('.anterior').attr('href',urlAux[0]+pagina).html(pagina) 
//     }else{
//       postByPage++;
//       conteo = 0;
//       masResultados = false;
//       infinitescrollv = false;
//     }
// // $container = $('section');
// //   $container.imagesLoaded( function() {
// // //     iterate through array or object 
// //     $('img').addClass('load');
// //   });
//     if( posteos == 0){ 
//       noMasResultados = true;
//       infinitescrollv = false;
//     }else{
//     }
//     console.log(infinitescrollv);
//     // gridSize();
//     if(masResultados){ 
//       infinitescrollload()
//       // infinitescroll();
//     }else{
//     }
//     $('.loading').hide();

//   });
// }
// }