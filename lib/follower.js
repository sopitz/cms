var mouseX = 0;
var insideHeader = false;
var follower = $(".follow");
var loop = 0;
xp = 483;
var flag = false;
var height = $('#header').height();
var init = 1;
function getMouse(e) {
	insideHeader = true;
	mouseX = e.pageX;
}

function following(e) {
	$('#header #menu ul').unbind('mouseenter');
	
	insideHeader = true;
	loop = setInterval(function () {
		xp += (mouseX - xp - 6) / 15;
		if (xp <= $("#header").position().left) {
			xp = $("#header").position().left;
		}
		if (xp >= $("#menu ul li:last").offset().left+50) {
			xp = $("#menu ul li:last").offset().left+50;
		}
		follower.css({left: xp });
	}, 20);
}


