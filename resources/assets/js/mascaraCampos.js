function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function id(el){
	return document.getElementById(el);
}
function mtel(v){
    v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}
function mcep(v){
  v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
  v=v.replace(/^(\d{5})(\d)/g,"$1-$2");
  return v;
}
/*
  Máscara Telefone com DDD + 9º dígito  no formato (00) 00000-000
*/
window.onload = function(){
	id('mascara-telefone').onkeypress = function(){
		mascara(this, mtel);
	}
}
/*
  Máscara CEP no formato  00000-000
*/
window.onload = function(){
  id('mascara-cep').onkeypress = function(){
    mascara(this, mcep);
  }
}
