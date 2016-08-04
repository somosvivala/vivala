/* Função só pra dar un tchans e pintar o menuzinho do topo */
$(function(){
  var qualPilar = $('#tour-pilares');
  if(qualPilar.hasClass('pilar-viajar')){
    //$("#menu-viajar").css('border-left', '2px solid black');
    //$("#menu-viajar").css('border-right', '2px solid black');
    //$("#menu-viajar a").css('color', '#F16F2B', 'important');
  }
  if(qualPilar.hasClass('pilar-conectar')){
    //$("#menu-conectar").css('border-left', '1px solid black');
    //$("#menu-conectar").css('border-right', '1px solid black');
    //$("#menu-conectar a").css('color', '#F16F2B', 'important');
  }
  if(qualPilar.hasClass('pilar-cuidar')){
    //$("#menu-cuidar").css('border-left', '2px solid black');
    //$("#menu-cuidar").css('border-right', '2px solid black');
    //$("#menu-cuidar a").css('color', '#F16F2B', 'important');
  }
});

// Instagram
function igScript(options){
  var userFeed = new Instafeed({
    get:'user',
    userId: options.igUserID,
    accessToken: options.igATkn,
    target:'instafeed',
    sortBy:'most-recent',
    limit:'6',
    resolution: 'standard_resolution',
    template:
    '<a class="col-sm-6 margin-b-1" href="{{link}}" target="_blank"><img class="img-responsive" src="{{image}}" width="{{width}}" height="100%" image-orientation="{{orientation}}" /></a>',
  });
  userFeed.run();
}
