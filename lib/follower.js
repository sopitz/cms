var mouseX = 0;
var insideHeader = false;
var follower = $(".follow");
var loop = 0;
var xp = follower.position().left;
var flag = false;

function getMouse(e) {
	mouseX = e.pageX;
}

function following(e) {
	xp = $("#header").position().left + 10;
	insideHeader = true;
	loop = setInterval(function () {
		//console.log(insideHeader);
		if (insideHeader) {
			follower.fadeIn(0);
			xp += (mouseX - xp - 6) / 15;
			follower.css({left: xp });
			//console.log("calculating new position");
		} else {
			xp += ($("#header").position().left + 10 - xp - 6) / 15;
			follower.css({left: xp});
			if (xp - $("#header").position().left < 20) {
				follower.fadeOut("fast");
				//clearInterval(loop);
			}
		}
	}, 20);
}


