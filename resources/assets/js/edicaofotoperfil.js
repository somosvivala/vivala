
$(function(){ 
  $('#foto-perfil').Jcrop({
    aspectRatio: 1,
    minSize: [ 80, 80 ],
    maxSize: [ 350, 350 ],
    onSelect: updateCoords
  }); 

  function updateCoords(c)
  {
    jQuery('#x').val(c.x);
    jQuery('#y').val(c.y);
    jQuery('#w').val(c.w);
    jQuery('#h').val(c.h);
  };

});

function checkCoords()
{
  if (parseInt($('#w').val())>0) return true;
  alert('Selecione uma região válida!');
  return false;
};