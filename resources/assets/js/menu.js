/* Função só pra dar un tchans e pintar o menuzinho do topo */
$(function(){
  var qualPilar = $('#tour-pilares');
  if(qualPilar.hasClass('pilar-viajar')){
    $("#menu-viajar").css('border-left', '2px solid black');
    $("#menu-viajar").css('border-right', '2px solid black');
    $("#menu-viajar a").css('color', '#F16F2B', 'important');
  }
  if(qualPilar.hasClass('pilar-conectar')){
    $("#menu-conectar").css('border-left', '1px solid black');
    $("#menu-conectar").css('border-right', '1px solid black');
    $("#menu-conectar a").css('color', '#F16F2B', 'important');
  }
  if(qualPilar.hasClass('pilar-cuidar')){
    $("#menu-cuidar").css('border-left', '2px solid black');
    $("#menu-cuidar").css('border-right', '2px solid black');
    $("#menu-cuidar a").css('color', '#F16F2B', 'important');
  }
});
