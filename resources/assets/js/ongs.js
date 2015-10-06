$(function() {

  $('.cat-ong ul input:radio').addClass('esconde-input');

  $('.cat-ong ul label').click(function(){
       $(this).toggleClass('selecionado');
  });
});
