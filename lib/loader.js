var cookieStatus = 0;

//	$(":button").one('mouseenter', function() {
//		if (cookieStatus == 0) {
//			cookieStatus = 1;
//			$.getScript('lib/cookie.js');
//		}
//			
//		$('#buttonde').one('click', function() {
//			$.cookie('language', 'de');
//			window.location.reload();
//		});
//		
//		$('#buttonen').one('click', function() {
//			$.cookie('language', 'en');
//			window.location.reload();
//		});
//	});

	$(document).one('mousemove', function() {
		$.getScript('lib/follower.js', function() {
			$('body').bind('mousemove', function(e) {getMouse(e);});
			$('#header #menu ul').bind('mouseenter', function(e) {following(e);});
			
			$('body').one('mousemove', function() {
				follower.fadeIn(0);
				follower.css({left: 483 });
			});
		});
		
	});

	
	
	
	
	