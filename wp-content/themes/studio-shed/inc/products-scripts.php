var parent = window.location.pathname.replace(/(^\/|\/$)/g,'').split('/');
$('#menu-product-menu a').each(function() {
	var href = $(this).attr('href').replace(/\/$/g,'').split('/');

	if (href[href.length - 1] == parent[1]) {
		$(this).parent('li').addClass('current-menu-item');
		return false;
	}
});