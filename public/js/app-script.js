$(function(){

	// Highlighting menu
	var jshref = window.location.href;
	var href = '';
	   
	$('#channels ul li a').each(function(){
		var href = $(this).attr('href');
		
		if ( (href == jshref) ) {
			$(this).addClass('highlight');
		} else {
			$(this).removeClass('highlight');
		}
	});

	$('.top-links a').each(function(){
		var href = $(this).attr('href');
		
		if ( (href == jshref) ) {
			$(this).addClass('highlight');
		} else {
			$(this).removeClass('highlight');
		}
	});

	var discussionsLinksLength = $('#my-discussions-ul > li > a').length;

	for (var i = 0; i < discussionsLinksLength; i++) {
		var dHref = $('#my-discussions-ul > li > a').eq(i).attr('href');
		var jshrefSplited = jshref.split('&');

		if (dHref === jshrefSplited[0]) {
			$('#my-discussions-ul > li > a').eq(i).addClass('highlight');
		}
	}
	// End block

	// For markdown highlight
	hljs.initHighlightingOnLoad();

});