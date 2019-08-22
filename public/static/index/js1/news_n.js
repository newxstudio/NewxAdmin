var windowWidth_n=window.innerWidth;//获得浏览器窗口大小
var windowHeight_n=window.innerHeight;//获得浏览器窗口大小

var newsDivBig_n=document.getElementById("newsDivBig_n");
//0.7321*  0.3734*
newsDivBig_n.style.width=windowWidth_n+"px";
newsDivBig_n.style.height=windowHeight_n+"px";

window.onresize = function(){//功能：当浏览器窗口大小改变时重新设置所有元素大小
	windowWidth_n=window.innerWidth;
	newsDivBig_n.style.width=windowWidth_n+"px";
	newsDivBig_n.style.height=windowHeight_n+"px";
}
var newsIndex_n=0;
var newsLi_n=document.getElementsByClassName("newsLi_n");
function changeNews_n()
{
	newsLi_n[(newsIndex_n)%4].className="newsLi_n newsLi2_n";
	newsLi_n[(newsIndex_n+1)%4].className="newsLi_n newsLi1_n";
	newsLi_n[(newsIndex_n+2)%4].className="newsLi_n newsLi3_n";
	newsLi_n[(newsIndex_n+3)%4].className="newsLi_n newsLi3_n";
}
var newsIndexLi_n=document.getElementsByClassName("newsIndexLi_n");
var newsDateWord_n=document.getElementsByClassName("newsDateWord_n");
var newsIntWordDiv_n=document.getElementsByClassName("newsIntWordDiv_n");
function changeAll_n()
{
	for(i=0;i<4;i++)
	{
		newsIntWordDiv_n[i].className="newsIntWordDiv_n";
		newsDateWord_n[i].className="newsDateWord_n";
		newsDateWord_n[i].style.position="absolute";
		newsIndexLi_n[i].className="newsIndexLi_n";
	}
	newsIntWordDiv_n[(newsIndex_n)%4].className="newsIntWordDiv_n newsIntWordDiv0_n";
	newsDateWord_n[(newsIndex_n)%4].className="newsDateWord_n newsDateWord0_n";
	newsDateWord_n[(newsIndex_n+1)%4].style.left="5px";
// 	setTimeout(
// 		function()
// 		{
// 			newsDateWord_n[(newsIndex_n+1)%4].style.position="static";
// 		},1000
// 	)
	newsIndexLi_n[(newsIndex_n)%4].className="newsIndexLi_n newsIndexLiOver_n";
}

var SIAuto_n;
var STAuto1_n;
var STAuto2_n;
var STAuto3_n;
function autoNews_n()
{
	SIAuto_n=setInterval(
		function()
		{
			changeNews_n();
			newsIndex_n++;
			if(newsIndex_n==8)
			{
				newsIndex_n=0;
			}
			STAuto1_n=setTimeout(
				function()
				{
					newsLi_n[(newsIndex_n+3)%4].style.display="none";
				},1000
			)
			STAuto2_n=setTimeout(
				function()
				{
					newsLi_n[(newsIndex_n)%4].className="newsLi_n newsLi0_n";
					newsLi_n[(newsIndex_n+3)%4].className="newsLi_n newsLi3_n";
				},2000
			)
			STAuto3_n=setTimeout(
				function()
				{
					newsLi_n[(newsIndex_n+3)%4].style.display="block";
				},3000
			)
			changeAll_n();
		},5000
	)
}
autoNews_n();

var newsIndexUl_n=document.getElementById("newsIndexUl_n");
newsIndexUl_n.onmouseover=function()
{
	clearInterval(SIAuto_n);
}
newsIndexUl_n.onmouseout=function()
{
	autoNews_n();
}

var newsIndexLi_n=document.getElementsByClassName("newsIndexLi_n");
for(i=0;i<4;i++)
{
	newsIndexLi_n[i].newsIndexLiOrder_n=i;
	newsIndexLi_n[i].onclick=function()
	{
		for(j=0;j<4;j++)
		{
			newsLi_n[j].style.display="block";
		}
		newsIndex_n=(this.newsIndexLiOrder_n+3);
		changeNews_n();
		newsIndex_n++;
		changeAll_n();
		newsIndex_n--;
	}
}