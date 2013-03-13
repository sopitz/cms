var cookieStatus = 0;

	$(":button").one('mouseenter', function() {
		if (cookieStatus == 0) {
			cookieStatus = 1;
			$.getScript('lib/cookie.js');
		}
			
		$('#buttonde').one('click', function() {
			$.cookie('language', 'de');
			window.location.reload();
		});
		
		$('#buttonen').one('click', function() {
			$.cookie('language', 'en');
			window.location.reload();
		});
	});

	$('#header #menu ul').one('mouseenter', function() {
		$.getScript('lib/follower.js', function() {
			$("#header #menu").bind('mousemove', function(e) {getMouse(e);});
			$('#header #menu ul').bind('mouseenter', function(e) {following(e);});
			$('#header #menu ul').trigger('mouseenter');
		});
		
	});
