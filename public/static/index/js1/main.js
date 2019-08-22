/**
 * 跨屏滚动js代码
 */
var curIndex = 0;
var container = $("#container");
var canvas   = $("#bg canvas");
var $li = $("#nav_collapse li");
var sumCount = $(".section").length;
var $window = $(window);
var duration = 500;
//时间控制
var aniTime = 0;

var scrollFunc = function(e) {
	//如果动画还没执行完，则return
	if(new Date().getTime() < aniTime + duration) {
		return;
	}
	e = e || window.event;
	var t = 0;
	if(e.wheelDelta) { //IE/Opera/Chrome
		t = e.wheelDelta;
		if(t > 0 && curIndex > 0) {
			//上滚动
			movePrev();
		} else if(t < 0 && curIndex < sumCount - 1) {
			//下滚动
			moveNext();
		}
	} else if(e.detail) { //Firefox
		t = e.detail;
		if(t < 0 && curIndex > 0) {
			//上滚动
			movePrev();
		} else if(t > 0 && curIndex < sumCount - 1) {
			//下滚动
			moveNext();
		}
	}
};

function moveNext() {
	//获取动画开始时的时间
	aniTime = new Date().getTime();
	container.css("transform", "translate3D(0, -" + (++curIndex) * $window.height() + "px, 0)");
	$li.removeClass('active');
	$($li[curIndex]).addClass('active');
	switch(curIndex) {
		case 0:
			
		case 1:

			
			break;
		case 3:
			$("#section4").children("img.pen").addClass("pen_z");
			$("#section4").children("img.cutter").addClass("cutter_z");
			$("#section4").children("img.coffee").addClass("coffee_z");
			$("#section4").children("img.earphone").addClass("earphone_z");
			$("#section4").children("img.marker").addClass("marker_z");
			$("#section4").children("img.notebook").addClass("notebook_z");
			$("#section4").children("img.wallet").addClass("wallet_z");
			$("#section4").children("img.ipad").addClass("ipad_z");
			var timer = setTimeout(function() {
				var ipad = document.getElementById("ipad");
				ipad.style.backgroundColor = "white";
			}, 3200);
			break;

		default:

	}
	if(curIndex == 0) {
		$("#section" + curIndex + "p").css("transition", "all 1s ");
	}

	$("#section" + curIndex + "p").css("transform", "translateY(-30px)");
}

function movePrev() {
	//获取动画开始时的时间
	aniTime = new Date().getTime();
	container.css("transform", "translate3D(0, -" + (--curIndex) * $window.height() + "px, 0)");
	$li.removeClass('active');
	$($li[curIndex]).addClass('active');

}

function init() {
	/*注册事件*/
	if(document.addEventListener) {
		document.addEventListener('DOMMouseScroll', scrollFunc, false);
	} //W3C
	window.onmousewheel = document.onmousewheel = scrollFunc; //IE/Opera/Chrome

	container.css({
		"transition": "all 0.5s",
		"-moz-transition": "all 0.5s",
		"-webkit-transition": "all 0.5s"
	});
	canvas.css({
		"top": $window.height() + "px"
	});
	$(".black_overlay_x").css({
		"top": $window.height() + "px"
	});
}

init();