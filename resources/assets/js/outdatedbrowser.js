/*
* Mais da documentação em: https://github.com/burocratik/outdated-browser
*/

//event listener: DOM ready
function addLoadEvent(func) {
    var oldonload = window.onload;
    if (typeof window.onload != 'function') {
        window.onload = func;
    } else {
        window.onload = function() {
            if (oldonload) {
                oldonload();
            }
            func();
        }
    }
}

//call plugin function after DOM ready
addLoadEvent(function(){
    var linguaAtiva = $("meta[name=language]").attr("content");
    switch(linguaAtiva){
      case 'en':
        caminho = '../resources/assets/outdated-browser/outdatedbrowser/lang/en.html';
      break;
      case 'pt':
        caminho = '../resources/assets/outdated-browser/outdatedbrowser/lang/pt-br.html';
      break;
      default:
        caminho = '../resources/assets/outdated-browser/outdatedbrowser/lang/pt-br.html';
    }

    outdatedBrowser({
        bgColor: '#F16F2B',
        color: '#ffffff',
        lowerThan: 'transform',
        languagePath: caminho,
    });
});
