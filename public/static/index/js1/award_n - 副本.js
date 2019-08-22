var windowWidth_n=window.innerWidth;//获得浏览器窗口大小
var windowHeight_n=window.innerHeight;//获得浏览器窗口大小
var ul_n=document.getElementById("orderShowImgul_n");
var divAll_n=document.getElementsByClassName("orderShowImgBigDiv_n");
divAll_n[0].style.width=windowWidth_n+"px";
divAll_n[0].style.height=windowHeight_n+"px";

ul_n.style.left="0px";
// console.log(windowWidth_n);
// console.log(divAll_n[0].style.width);
window.onresize = function(){//功能：当浏览器窗口大小改变时重新设置所有元素大小
	divAll_n[0].style.width=windowWidth_n+"px";
	divAll_n[0].style.height=windowHeight_n+"px";
}

var li_n=ul_n.children;
var div_n=document.getElementById("nvaDiv_n");
var arrows_n=document.getElementsByClassName("arrowsDiv_n");
	div_n.style.width=li_n.length*30+20+"px";//动态设置放引导圈的div_n的宽度
	div_n.style.left=(windowWidth_n-parseInt(div_n.style.width))/2+"px";
	// console.log((parseInt(arrows_n[0].style.height))/2);
	arrows_n[0].style.top=(windowHeight_n-parseInt(arrows_n[0].style.height))/2+"px";
	arrows_n[1].style.top=(windowHeight_n-parseInt(arrows_n[1].style.height))/2+"px";
var divCircleIndex_n=0;
	ul_n.appendChild(ul_n.children[0].cloneNode(true));//在最后一张图后面克隆第一张图
	// ul_n.style.width=(li_n.length+1)*510+"px";//动态设置放轮播图的ul的宽度
	//动态添加引导圈的功能
	for(i=0;i<li_n.length-1;i++){
		var divSNewDiv_n=document.createElement("div");
		div_n.appendChild(divSNewDiv_n);
	}
// var img_n=document.getElementsByClassName("moveimg_n");
// 	for (i=0;i<img_n.length;i++) {
// 		img_n[i].style.height="76px";
// 		img_n[i].style.top="102px";
// 		console.log(img_n[i].offsetTop);
// 	}
// 	img_n[0].style.height="280px";
// 	img_n[0].style.top="0px";
var divCircle_n=div_n.children;
	divCircle_n[divCircleIndex_n].className="nvaDivSonNow_n";//设置第一张图的样式
//修改引导圈的class样式的函数
var changeClass_n=function(){
	for(i=0;i<divCircle_n.length;i++) {
		divCircle_n[i].className="";
	}
	divCircle_n[divCircleIndex_n].className="nvaDivSonNow_n";
}
//立刻改变图片的功能
var changeImg_n=function(){
	ul_n.style.left=divCircleIndex_n*(-windowWidth_n)+"px";
	changeClass_n();
}
//动画改变图片功能
var b_n;
var changeImgAuto2_n=function(speed_n){
	ul_n.style.left=ul_n.offsetLeft-speed_n+"px";
	// console.log(parseInt(ul_n.style.left)+"&"+divCircleIndex_n*(-windowWidth_n));
	if(parseInt(ul_n.style.left)>=divCircleIndex_n*(-windowWidth_n)){
		clearInterval(b_n);
		if (divCircleIndex_n==divCircle_n.length) {
			divCircleIndex_n=0;
			ul_n.style.left=0+"px";
		}
	}
	if(parseInt(ul_n.style.left)>divCircleIndex_n*(-windowWidth_n))
	{
		ul_n.style.left=divCircleIndex_n*(-windowWidth_n)+"px";
	}
}
//为每个引导圈绑定点击或悬停功能，立刻改变图片
for(i=0;i<divCircle_n.length;i++){
	divCircle_n[i].orderIndex=i;
	divCircle_n[i].onclick=function(){
		divCircleIndex_n=this.orderIndex;
		changeImg_n();
		// reset();
	}
	var CIsTO_n;
	divCircle_n[i].onmouseover=function(){
		divCircleIndex_n=this.orderIndex;
		CIsTO_n=setTimeout(function(){
			changeImg_n();
			// reset();
		},500);
	}
	divCircle_n[i].onmouseout=function(){
		clearTimeout(CIsTO_n);
	}
}
//对图片进行重置的功能，防止意外BUG
// var reset=function(){
	// for (i=0;i<img_n.length;i++) {
		// img_n[i].style.height="76px";
		// img_n[i].style.top="102px";
		// console.log(img_n[i].offsetTop);
	// }
	// img_n[divCircleIndex_n].style.height="280px";
	// img_n[divCircleIndex_n].style.top="0px";
// }

var autoST_n;
var changeImgAuto_n=function(maxspeed_n){
	// var maxspeed_n=5;
	// console.log(((divCircleIndex_n*windowWidth_n)+parseInt(ul_n.style.left))+"$"+windowWidth_n);
	// console.log(speed_n);
	var change=0.8;
	if(((divCircleIndex_n*windowWidth_n)+parseInt(ul_n.style.left))>((3/4)*windowWidth_n))
	{
		speed_n=speed_n+change;
		if(speed_n>=maxspeed_n)
		{
			speed_n=maxspeed_n;
		}
	}
	else if(((divCircleIndex_n*windowWidth_n)+parseInt(ul_n.style.left))>((1/4)*windowWidth_n))
	{
	}
	else
	{
		speed_n=speed_n-change;
		if(speed_n<0.1)
		{
			speed_n=0.1;
		}
	}
	ul_n.style.left=ul_n.offsetLeft-speed_n+"px";
	// console.log(parseInt(ul_n.style.left)+"&"+divCircleIndex_n*(-windowWidth_n));
	if(parseInt(ul_n.style.left)<=divCircleIndex_n*(-windowWidth_n)){
		clearInterval(b_n);
		if (divCircleIndex_n==divCircle_n.length) {
			divCircleIndex_n=0;
			ul_n.style.left=0+"px";
		}
	}
	if(parseInt(ul_n.style.left)<divCircleIndex_n*(-windowWidth_n))
	{
		ul_n.style.left=divCircleIndex_n*(-windowWidth_n)+"px";
	}
}
var changeImgAuto1_n=function(speed_n){
	ul_n.style.left=ul_n.offsetLeft-speed_n+"px";
	// console.log(parseInt(ul_n.style.left)+"&"+divCircleIndex_n*(-windowWidth_n));
	if(parseInt(ul_n.style.left)<=divCircleIndex_n*(-windowWidth_n)){
		clearInterval(b_n);
		if (divCircleIndex_n==divCircle_n.length) {
			divCircleIndex_n=0;
			ul_n.style.left=0+"px";
		}
	}
	if(parseInt(ul_n.style.left)<divCircleIndex_n*(-windowWidth_n))
	{
		ul_n.style.left=divCircleIndex_n*(-windowWidth_n)+"px";
	}
}
var speed_n=0.1;
function auto_n(){
	autoST_n=setInterval(function(){
		clearInterval(b_n);
		divCircleIndex_n++;
		if (divCircleIndex_n>=divCircle_n.length) {
			divCircleIndex_n=0;
			changeClass_n();
			divCircleIndex_n=divCircle_n.length;
		}else{
			changeClass_n();
		}
		b_n=setInterval(function(){
			changeImgAuto_n(40);
		},10)
	},5000)
}
auto_n();

div_n.onmouseover=function(){
	clearInterval(autoST_n);
}
div_n.onmouseout=function(){
	auto_n();
}
arrows_n[0].onmouseover=function(){
	clearInterval(autoST_n);
}
arrows_n[0].onmouseout=function(){
	auto_n();
}
arrows_n[1].onmouseover=function(){
	clearInterval(autoST_n);
}
arrows_n[1].onmouseout=function(){
	auto_n();
}

arrows_n[0].onclick=function(){
	clearInterval(b_n);
	// reset();
	divCircleIndex_n--;
	if(divCircleIndex_n>=divCircle_n.length){
		divCircleIndex_n=0;
	}else{
		if(divCircleIndex_n<=-1){
			divCircleIndex_n=divCircle_n.length;
			ul_n.style.left=divCircleIndex_n*(-windowWidth_n)+"px";
// 			img_n[0].style.height="76px";
// 			img_n[0].style.top="102px";
// 			img_n[img_n.length-1].style.height="280px";
// 			img_n[img_n.length-1].style.top="0px";
			divCircleIndex_n=divCircle_n.length-1;
		}
	}
	changeClass_n();
	b_n=setInterval(function(){
		changeImgAuto2_n(-30);
	},1)
}
arrows_n[1].onclick=function(){
	clearInterval(b_n);
	// reset();
	divCircleIndex_n++;
	if(divCircleIndex_n>=divCircle_n.length){
		divCircleIndex_n=0;
		changeClass_n();
// 		img_n[0].style.height="280px";
// 		img_n[0].style.top="0px";
// 		img_n[img_n.length-1].style.height="76px";
// 		img_n[img_n.length-1].style.top="102px";
		divCircleIndex_n=divCircle_n.length;
	}else{
		if(divCircleIndex_n<=-1){
			divCircleIndex_n=divCircle_n.length-1;
			changeClass_n();
		}else{
			changeClass_n();
		}
	}
	b_n=setInterval(function(){
		changeImgAuto1_n(30);
	},1)
}
//设置双击相应功能，防止用户连击造成图片属性错误
// arrows_n[0].ondblclick=function(){
// 	clearInterval(b_n);
// 	// reset();
// 	ul_n.style.left=divCircleIndex_n*(-510)+"px";
// }
// arrows_n[1].ondblclick=function(){
// 	clearInterval(b_n);
// 	// reset();
// 	ul_n.style.left=divCircleIndex_n*(-510)+"px";
// }

//以下为矢量图
// !function(a){var e,d='<svg><symbol id="icon-xiayiye" viewBox="0 0 2050 1024"><path d="M2050.429831 503.322034L0 0l509.917288 503.322034h1540.512543z" fill="#5065e2" ></path><path d="M2050.429831 520.677966L0 1024 509.917288 520.677966h1540.512543z" fill="#5065e2" ></path></symbol><symbol id="icon-shangyiye" viewBox="0 0 2050 1024"><path d="M0 503.322034L2050.429831 0 1540.512542 503.322034H0z" fill="#5065e2" ></path><path d="M0 520.677966l2050.429831 503.322034L1540.512542 520.677966H0z" fill="#5065e2" ></path></symbol></svg>',t=(e=document.getElementsByTagName("script"))[e.length-1].getAttribute("data-injectcss");if(t&&!a.__iconfont__svg__cssinject__){a.__iconfont__svg__cssinject__=!0;try{document.write("<style>.svgfont {display: inline-block;width: 1em;height: 1em;fill: currentColor;vertical-align: -0.1em;font-size:16px;}</style>")}catch(e){console&&console.log(e)}}!function(e){if(document.addEventListener)if(~["complete","loaded","interactive"].indexOf(document.readyState))setTimeout(e,0);else{var t=function(){document.removeEventListener("DOMContentLoaded",t,!1),e()};document.addEventListener("DOMContentLoaded",t,!1)}else document.attachEvent&&(n=e,i=a.document,o=!1,l=function(){o||(o=!0,n())},(d=function(){try{i.documentElement.doScroll("left")}catch(e){return void setTimeout(d,50)}l()})(),i.onreadystatechange=function(){"complete"==i.readyState&&(i.onreadystatechange=null,l())});var n,i,o,l,d}(function(){var e,t,n,i,o,l;(e=document.createElement("div")).innerHTML=d,d=null,(t=e.getElementsByTagName("svg")[0])&&(t.setAttribute("aria-hidden","true"),t.style.position="absolute",t.style.width=0,t.style.height=0,t.style.overflow="hidden",n=t,(i=document.body).firstChild?(o=n,(l=i.firstChild).parentNode.insertBefore(o,l)):i.appendChild(n))})}(window);