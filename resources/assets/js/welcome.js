$(function() {
  console.log($('.mask-data'));
  $('.mask-data').mask("00/00/0000");
});
// Pinta o menu somente
$(function(){
  var qualPilar = $('#tour-pilares');
  if(qualPilar.hasClass('pilar-viajar')){
    $("#menu-viajar a").css('color', '#F16F2B', 'important');
  }
  if(qualPilar.hasClass('pilar-conectar')){
    $("#menu-conectar a").css('color', '#F16F2B', 'important');
  }
  if(qualPilar.hasClass('pilar-cuidar')){
    $("#menu-cuidar a").css('color', '#F16F2B', 'important');
  }
});
