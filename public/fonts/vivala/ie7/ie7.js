/* To avoid CSS expressions while still supporting IE 7 and IE 6, use this script */
/* The script tag referencing this file must be placed before the ending body tag. */

/* Use conditional comments in order to target IE 7 and older:
	<!--[if lt IE 8]><!-->
	<script src="ie7/ie7.js"></script>
	<!--<![endif]-->
*/

(function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'vivala-glyphicons\'">' + entity + '</span>' + html;
	}
	var icons = {
		'icon-vivala-logo': '&#xe900;',
		'icon-vivala-logo-letra-v-maisc': '&#xe901;',
		'icon-vivala-logo-letra-i': '&#xe902;',
		'icon-vivala-logo-letra-v-min': '&#xe903;',
		'icon-vivala-logo-letra-a': '&#xe904;',
		'icon-vivala-logo-letra-l': '&#xe905;',
		'icon-vivala-logo-letra-a-acento': '&#xe906;',
		'icon-vivala-quero-viajar': '&#xe907;',
		'icon-vivala-quero-conectar': '&#xe908;',
		'icon-vivala-quero-transformar': '&#xe909;',
		'icon-vivala-relogio': '&#xe90a;',
		'icon-vivala-usuario': '&#xe90b;',
		'icon-vivala-livro': '&#xe90c;',
		'icon-vivala-mapa': '&#xe90d;',
		'icon-vivala-foto': '&#xe90e;',
		'icon-vivala-estrela': '&#xe90f;',
		'icon-vivala-mascaras': '&#xe910;',
		'icon-vivala-mao': '&#xe911;',
		'icon-vivala-jornal': '&#xe912;',
		'icon-vivala-chat': '&#xe913;',
		'icon-vivala-check': '&#xe914;',
		'icon-vivala-check-preenchido': '&#xe915;',
		'icon-vivala-casa': '&#xe916;',
		'icon-vivala-binoculos': '&#xe917;',
		'icon-vivala-olhos': '&#xe918;',
		'icon-vivala-coracao': '&#xe919;',
		'icon-vivala-mochila': '&#xe91a;',
		'icon-vivala-lupa': '&#xe91b;',
		'icon-vivala-mapa-do-bem': '&#xe91c;',
		'icon-vivala-relatorio': '&#xe91d;',
		'icon-vivala-usuario-em-duvida': '&#xe91e;',
		'icon-vivala-bandeira': '&#xe91f;',
		'icon-vivala-coracao-caridoso': '&#xe920;',
		'icon-vivala-medalha': '&#xe921;',
		'icon-vivala-floco-de-neve': '&#xe922;',
		'icon-vivala-menu-usuario': '&#xe923;',
		'icon-vivala-menu-chat': '&#xe924;',
		'icon-vivala-menu-brasil': '&#xe925;',
		'icon-vivala-cafe-da-manha': '&#xe926;',
		'icon-vivala-almoco': '&#xe927;',
		'icon-vivala-jantar': '&#xe928;',
		'0': 0
		},
		els = document.getElementsByTagName('*'),
		i, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		c = el.className;
		c = c.match(/icon-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
}());
