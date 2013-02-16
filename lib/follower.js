var mouseX = 0;
var insideHeader = false;
var follower = $(".follow");
var loop = 0;
xp = $("#header").position().left + 10;
var flag = false;
var height = $('#header').height();

function getMouse(e) {
	insideHeader = true;
	mouseX = e.pageX;
}

function following(e) {
	$('#header #menu ul').unbind('mouseenter');
	
	insideHeader = true;
	loop = setInterval(function () {
		follower.fadeIn(0);
		xp += (mouseX - xp - 6) / 15;
		follower.css({left: xp });
	}, 20);
}


