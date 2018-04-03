$(document).ready(function() {
  $(".accordion .accord-header").click(function() {
    if($(this).next("div").is(":visible")){
      $(this).next("div").slideUp("slow");
    } else {
      $(".accordion .accord-content").slideUp("slow");
      $(this).next("div").slideToggle("slow");
    }
  });
});
		  
$(document).ready(function() {
  $(".accordion2 .accord-content2").hide();
  $(".accordion2 .accord-header2").click(function() {
    if($(this).next("div").is(":visible")){
      $(this).next("div").slideUp("slow");
    } else {
      $(".accordion2 .accord-content2").slideUp("slow");
      $(this).next("div").slideToggle("slow");
    }
  });
});