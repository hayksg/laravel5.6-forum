$(function(){

	// Highlighting menu
	var pathname = window.location.pathname;
	var search = window.location.search;
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

	if (pathname + search == '/forum?filter=me') {
        $('#my-discussions-ul > li > a[href="/forum?filter=me"]').addClass('highlight');
    }

    if (pathname + search == '/forum?filter=solved') {
        $('#my-discussions-ul > li > a[href="/forum?filter=solved"]').addClass('highlight');
    }

    if (pathname + search == '/forum?filter=unsolved') {
        $('#my-discussions-ul > li > a[href="/forum?filter=unsolved"]').addClass('highlight');
    }
	// End block

	// For markdown highlight
	hljs.initHighlightingOnLoad();

});