
$(function(){ 
  $('#foto-perfil').Jcrop({
    aspectRatio: 1,
    minSize: [ 200, 200 ],
    onSelect: updateCoords
  }); 

  function updateCoords(c)
  {
    jQuery('input[name=x]').val(c.x);
    jQuery('input[name=y]').val(c.y);
    jQuery('input[name=w]').val(c.w);
    jQuery('input[name=h]').val(c.h);
  };

});