$(function() {

  $('.cat-ong li input:radio').addClass('esconde-input');

  $('.cat-ong li label').click(function(){
       $(this).toggleClass('selecionado');
  });
});
