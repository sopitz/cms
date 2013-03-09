	



	$(":button").mouseenter(function() {
		$(":button").unbind('mouseenter');
		$.getScript('lib/cookie.js');
		
		$('#buttonde').bind('click', function() {
			$.cookie('language', 'de');
			window.location.reload();
		});
		
		$('#buttonen').bind('click', function() {
			$.cookie('language', 'en');
			window.location.reload();
		});
		
	});
	
	
	var status = 0;
	if (status == 0) {
		$('#header #menu ul').mousemove(function(e) {
			$('#header #menu ul').unbind('mousemove');
			$.getScript('lib/follower.js', function() {
				status = 1;
				$("#header #menu").bind('mousemove', function(e) {getMouse(e)});
				$('#header #menu ul').bind('mouseenter', function(e) {following(e)});
				$('#header #menu ul').trigger('mouseenter');
				//$("#header #menu ul").bind('mouseout', function (e) {
				//	insideHeader = false;
				//});
				

			});
			
		});
	}