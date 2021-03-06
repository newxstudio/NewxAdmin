<?php /*a:1:{s:63:"D:\wamp64\www\NewxAdmin\application\index\view\index\index.html";i:1566959302;}*/ ?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>NEWX·大学生网络文化工作室</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<!-- 引入swiper样式 -->
		<link rel="stylesheet" type="text/css" href="http://localhost/newxadmin/public/static/index/dist/css/swiper.min.css"/>
		
		<link href="http://localhost/newxadmin/public/static/index/css/main.css" rel="stylesheet">
		<link href="http://localhost/newxadmin/public/static/index/css/initial.css" rel="stylesheet">
		<link rel="shortcut icon" href="http://localhost/newxadmin/public/static/admin/images/newx.ico" />
		<link rel="stylesheet" href="http://localhost/newxadmin/public/static/layui/css/layui.css">
		<!-- 新 Bootstrap 核心 CSS 文件 -->
		<link href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.css">
		<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
		<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>

		<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
		<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="http://localhost/newxadmin/public/static/index/js/jquery.min_x.js"></script>
		<script type="text/javascript" src="http://localhost/newxadmin/public/static/index/js/book_x.js"></script>
		
		<!-- 引入swiper JavaScript文件 -->
		<script src="http://localhost/newxadmin/public/static/index/dist/js/swiper.min.js" type="text/javascript" charset="utf-8"></script>
		
		<!-- 引入layer JavaScript文件 -->
		<script src="http://localhost/newxadmin/public/static/layer/layer.js" type="text/javascript" charset="utf-8"></script>
		
		
		
		
		<style type="text/css">
			.swiper-container {
				width: 100% !important;
				height: 100% !important;
			} 
			.swiper-container img{
				width: 100%;
				height: 100%;
			}
		</style>


	</head>

	<body>

		<nav class="nav navbar-default navbar-fixed-top navbar-inverse  text-center" role='navigation'>
			<div class="container">
				<div class="row">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav_collapse">
		            <span class="sr-only">切换导航</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
	        	</button>
						<a class="navbar-brand" href="#">
							NEWX
						</a>
					</div>

					<div class="collapse navbar-collapse " id="nav_collapse">
						<ul class="nav navbar-nav " id="navWidth">
							<li class="active">
								<a href="#" id="0">首页</a>
							</li>

							<li>
								<a href="#" id="1">团队介绍</a>
							</li>
							<li>
								<a href="#" id="2">近期动态</a>
							</li>
							<li>
								<a href="#" id="3">加入我们</a>
							</li>
							<li>
								<a href="#" id="4">联系我们</a>
							</li>
							<li>
								<a href="#">图站</a>
							</li>
							<li>
								<a href="#">空教室查询</a>
							</li>
							<li>
								<a href="#">红色文化</a>
							</li>
<!--							<li class="navbar-right">-->
<!--								<a href="#">-->
<!--									<span class="glyphicon glyphicon-user"></span> 注册-->
<!--								</a>-->
<!--							</li>-->
<!--							<li class="navbar-right">-->
<!--								<a href="#">-->
<!--									<span class="glyphicon glyphicon-log-in"></span> 登录-->
<!--								</a>-->
<!--							</li>-->
						</ul>
					</div>
				</div>

			</div>

		</nav>
		<!--主体内容-->
		<div id="container">
			<!--第一屏 简介-->
			<div class="section" id="section1">
				<!-- <div class="orderShowImgBigDiv_n">
					<ul id="orderShowImgul_n">
						<li><img class="moveimg_n" src="http://localhost/newxadmin/public/static/index/images/1.jpg" /></li>
						<li><img class="moveimg_n" src="http://localhost/newxadmin/public/static/index/images/2.jpg" /></li>
						<li><img class="moveimg_n" src="http://localhost/newxadmin/public/static/index/images/3.jpg" /></li>
						<li><img class="moveimg_n" src="http://localhost/newxadmin/public/static/index/images/4.jpg" /></li>
					</ul>
					<div id="nvaDiv_n">
					</div>
					<div class="arrowsDiv_n" style="left: 2%;height: 20%;"><img src="http://localhost/newxadmin/public/static/index/images/last.png" style="width: 100%;" /></div>
					<div class="arrowsDiv_n" style="right:2%;height: 20%;"><img src="http://localhost/newxadmin/public/static/index/images/last.png" style="width: 100%;transform: rotate(180deg)" /></div>
				</div> -->
				<div class="swiper-container">
					<div class="swiper-wrapper">
						<div class="swiper-slide"><img src="http://localhost/newxadmin/public/static/index/images/1.jpg" ></div>
						<div class="swiper-slide"><img src="http://localhost/newxadmin/public/static/index/images/2.jpg" ></div>
						<div class="swiper-slide"><img src="http://localhost/newxadmin/public/static/index/images/3.jpg" ></div>
						<div class="swiper-slide"><img src="http://localhost/newxadmin/public/static/index/images/4.jpg" ></div>
					</div>
					<!-- 如果需要分页器 -->
					<div class="swiper-pagination"></div>
					
					<!-- 如果需要导航按钮 -->
					<div class="swiper-button-prev"></div>
					<div class="swiper-button-next"></div>
					
					<!-- 如果需要滚动条 -->
					<div class="swiper-scrollbar"></div>
				</div>
				<script type="text/javascript">
					var swiper;
					var mySwiper = new Swiper ('.swiper-container', {
						direction: 'horizontal', // 垂直切换选项
						mousewheelControl: true,
						loop: true,
						loopAdditionalSlides : 3,
						autoplay:true,
						slidesPerView: 1,
						centeredSlides: true,
						coverflowEffect: {
							rotate: 30,
							stretch: 10,
							depth: 60,
							modifier: 2,
							slideShadows : true
						},
										
						// 如果需要分页器
						pagination: {
							el: '.swiper-pagination',
							clickable :true,
						},
								
						// 如果需要前进后退按钮
						navigation: {
							nextEl: '.swiper-button-next',
							prevEl: '.swiper-button-prev',
						},
										
						// 如果需要滚动条
						scrollbar: {
							el: '.swiper-scrollbar',
						},
					})   
				</script>
			</div>
			<!--第一屏结束-->
			<!--第二屏 团队介绍-->
			<div class="section" id="section2" style="position: relative;">
				<div id="departmentBox">
					<div id="bg">
						<canvas></canvas>
						<canvas></canvas>
						<canvas></canvas>
					</div>
	<!-- 
					<section id="knowledge_x" class="viewBlock_x" style="text-align: center;margin:0 ;">
						<div class="bookBox_x">
							<a class="lastBtn_x">
								<</a>
									<a class="nextBtn_x">></a>
									<div class="bookPage_x first_x">
										<img src="http://localhost/newx/public/static/index/images/work2.jpg" style="width: 400px; height:400px;" />
									</div>
									<div class="bookPage_x runPage_x">
										<div class="bookWord_x">
											<span class="pageNumber_x">1</span>
										</div>
										<img src="http://localhost/newx/public/static/index/images/work2.2.jpg" style="width: 400px; height:400px;" />
									</div>
									<div class="bookPage_x runPage_x">
										<div class="bookWord_x">
											<span class="pageNumber_x">2</span></div>
										<img src="http://localhost/newx/public/static/index/images/work3.jpg" style="width: 400px; height:400px;" />
									</div>
									<div class="bookPage_x runPage_x">
										<div class="bookWord_x">
											<span class="pageNumber_x">3</span>
										</div>
										<img src="http://localhost/newx/public/static/index/images/work4.jpg" style="width: 400px; height:400px;" />
									</div>
									<div class="bookPage_x last_x">
										<div class="bookWord_x">
											<span>太宰治：</span> 总之，直到现在，我对人类的行径依然迷惑不解。我经常为自己的幸福观与他人的迥然不同而深感不安，这种不安令我辗转难眠，痛苦呻吟，甚至内心发狂。我到底幸福吗？从小很多人都说我很幸福，可我总觉得自己生活在地狱里，反倒是那些觉得我幸福的人好像没什么痛苦，生活得很安乐。我有时甚至认为，从压死自己头上的十座大山中随便拿出一座给别人，都会将那人压死。 我心竟判若两人！
											<span class="pageNumber_x">4</span>
										</div>
									</div>
						</div>
						<a id="closeviewBlock_x" href="javascript:void(0)" onclick="document.getElementById('knowledge_x').style.display='none';document.getElementById('fade_x').style.display='none'">
							<i class="fa fa-close"></i>
						</a>
					</section>
					<div id="fade_x" class="black_overlay_x"></div> -->
					
					
					
					<div class="title_x">
						<h3><span>运 营 团 队</span></h3>
						</div>
						<div class="under_x"></div>
					<ul class="f-main-list_x">
						<li class="f-main-item_x f-main-itemHover_x">
							<div class="fk-infoBlockWrap_x">
								<div class="f-wrapBg_x"></div>
								<div class="fk-infoBlock_x f-infoBlock-fasico_x">
									<div class="f-bg_x"></div>
									<div class="f-infoIcon_x f-infoIcon-bangongshi_x"></div>
									<div class="f-infoWrap_x">
										<div class="f-info-title_x">办公室</div>
										<div class="f-info-desc_x">安排 / 监督 / 交接</div>
										<a class="set_4_button2_x raised_x hoverable_x f-button_x" id="myBtn">
											<i class="anim_x"></i>
											<span onclick="openwindowoffice()">了解更多</span>
										</a>
									</div>
								</div>
								<div class="fk-infoBlock_x f-infoBlock-normal_x">
									<div class="f-bg_x"></div>
									<div class="f-infoWrap_x">
										<div class="f-info-desc_x">
											<p style="padding-top: 7px;">
												处理工作室日常运营部分的相关工作<br>
												主要负责安排、监督、交接等<br>
												安排值班表并监督偷懒的一律扣鸡腿!<br>
												做好各部门同一任务的交接工作及进度监督<br>
												催作品什么的最有爱了~
												</p>
										</div>
									</div>
								</div>
							</div>
							<div class="f-infoBlock-name_x">
								办公室
							</div>
						</li>
	
	<!--					<li class="f-main-item_x f-main-itemHover_x">-->
	<!--						<div class="fk-infoBlockWrap_x">-->
	<!--							<div class="f-wrapBg_x"></div>-->
	<!--							<div class="fk-infoBlock_x f-infoBlock-fasico_x">-->
	<!--								<div class="f-bg_x"></div>-->
	<!--								<div class="f-infoIcon_x f-infoIcon-yunyingbu_x"></div>-->
	<!--								<div class="f-infoWrap_x">-->
	<!--									<div class="f-info-title_x">太宰治</div>-->
	<!--									<div class="f-info-desc_x">日本小说家，日本战后</div>-->
	<!--									<a class="set_4_button2_x raised_x hoverable_x f-button_x" href="javascript:void(0)" onclick="document.getElementById('knowledge_x').style.display='block';document.getElementById('fade_x').style.display='block'">-->
	<!--										<i class="anim_x"></i>-->
	<!--										<span>了解更多</span>-->
	<!--									</a>-->
	<!--								</div>-->
	<!--							</div>-->
	<!--							<div class="fk-infoBlock_x f-infoBlock-normal_x">-->
	<!--								<div class="f-bg_x"></div>-->
	<!--								<div class="f-infoWrap_x">-->
	<!--									<div class="f-info-title_x">选自《人间失格》</div>-->
	<!--									<div class="f-info-desc_x">-->
	<!--										<p>胆小鬼连幸福都会害怕，碰到棉花都会受伤</p>-->
	<!--										-->
	<!--									</div>-->
	<!--								</div>-->
	<!--							</div>-->
	<!--						</div>-->
	<!--						<div class="f-infoBlock-name_x">-->
	<!--							运营部-->
	<!--						</div>-->
	<!--					</li>-->
	
						<li class="f-main-item_x f-main-itemHover_x">
							<div class="fk-infoBlockWrap_x">
								<div class="f-wrapBg_x"></div>
								<div class="fk-infoBlock_x f-infoBlock-fasico_x">
									<div class="f-bg_x"></div>
									<div class="f-infoIcon_x f-infoIcon-caibianbu_x"></div>
									<div class="f-infoWrap_x">
										<div class="f-info-title_x">采编部</div>
										<div class="f-info-desc_x">微信 / 推文 / 公众号</div>
										<a class="set_4_button2_x raised_x hoverable_x f-button_x" href="javascript:void(0)" onclick="document.getElementById('knowledge_x').style.display='block';document.getElementById('fade_x').style.display='block'">
											<i class="anim_x"></i>
											<span onclick="openwindowedit()">了解更多</span>
										</a>
									</div>
								</div>
								<div class="fk-infoBlock_x f-infoBlock-normal_x">
									<div class="f-bg_x"></div>
									<div class="f-infoWrap_x">
										<div class="f-info-desc_x">
											<p style="padding-top: 7px;">
												采编部主要负责微信运营编写推文<br>
												组织新媒体方面的各种活动，运营“合工大宣城校区学生工作”公众号<br>
												接触校区各种事件，搜集素材关注热点，编写文章<br>
												加入采编部，成为微信后台运营者吧!
											</p>
											
										</div>
									</div>
								</div>
							</div>
							<div class="f-infoBlock-name_x">
								采编部
							</div>
						</li>
					</ul>
	
					<div class="title_x">
						<h3><span>技 术 团 队</span></h3>
						<div class="under_x"></div>
					</div>
					<ul class="f-main-list_x">
	
						<li class="f-main-item_x f-main-itemHover_x">
							<div class="fk-infoBlockWrap_x">
								<div class="f-wrapBg_x"></div>
								<div class="fk-infoBlock_x f-infoBlock-fasico_x">
									<div class="f-bg_x"></div>
									<div class="f-infoIcon_x f-infoIcon-shipinbu_x"></div>
									<div class="f-infoWrap_x">
										<div class="f-info-title_x">视频项目部</div>
										<div class="f-info-desc_x">剪辑 / 后期 / vlog</div>
										<a class="set_4_button2_x raised_x hoverable_x f-button_x" href="javascript:void(0)" onclick="document.getElementById('knowledge_x').style.display='block';document.getElementById('fade_x').style.display='block'">
											<i class="anim_x"></i>
											<span onclick="openwindowviedo()" >了解更多</span>
										</a>
									</div>
								</div>
								<div class="fk-infoBlock_x f-infoBlock-normal_x">
									<div class="f-bg_x"></div>
									<div class="f-infoWrap_x">
										<div class="f-info-desc_x">
											<p style="padding-top: 7px;">
												我们的工作包含但不限于<br>
												视频创意的构思、视频拍摄的指导、视频片段的后期剪辑<br>
												加入视频项目部，你不仅可以学习到视频剪辑技巧以及后期特效，你还將学会制作片子的一整套流程
												</p>
											
										</div>
									</div>
								</div>
							</div>
							<div class="f-infoBlock-name_x">
								视频部
							</div>
						</li>
	
						<li class="f-main-item_x f-main-itemHover_x">
							<div class="fk-infoBlockWrap_x">
								<div class="f-wrapBg_x"></div>
								<div class="fk-infoBlock_x f-infoBlock-fasico_x">
									<div class="f-bg_x"></div>
									<div class="f-infoIcon_x f-infoIcon-caifengbu_x"></div>
									<div class="f-infoWrap_x">
										<div class="f-info-title_x">采风项目部</div>
										<div class="f-info-desc_x">拍照 / 摄影 / 无人机</div>
										<a class="set_4_button2_x raised_x hoverable_x f-button_x" href="javascript:void(0)" onclick="document.getElementById('knowledge_x').style.display='block';document.getElementById('fade_x').style.display='block'">
											<i class="anim_x"></i>
											<span onclick="openwindowcollect()">了解更多</span>
										</a>
									</div>
								</div>
								<div class="fk-infoBlock_x f-infoBlock-normal_x">
									<div class="f-bg_x"></div>
									<div class="f-infoWrap_x">
										<div class="f-info-desc_x">
											<p style="padding-top: 7px;">
												想学最炫酷最有趣的摄影技术么?<br>
												想玩又贵又拉风的无人机么?<br>
												想拍最时尚的视频大片么?<br>
												想让自己拍摄的照片登上官网官微嘛?<br>
												想认识校园里的技术大咖嘛?<br>
												加入采风部，这些都能实现!<br>
											</p>
											
										</div>
									</div>
								</div>
							</div>
							<div class="f-infoBlock-name_x">
								采风部
							</div>
						</li>
	
						<li class="f-main-item_x f-main-itemHover_x">
							<div class="fk-infoBlockWrap_x">
								<div class="f-wrapBg_x"></div>
								<div class="fk-infoBlock_x f-infoBlock-fasico_x">
									<div class="f-bg_x"></div>
									<div class="f-infoIcon_x f-infoIcon-tuwenbu_x"></div>
									<div class="f-infoWrap_x">
										<div class="f-info-title_x">图文项目部</div>
										<div class="f-info-desc_x">PS / AI / 你的创意</div>
										<a class="set_4_button2_x raised_x hoverable_x f-button_x" href="javascript:void(0)" onclick="document.getElementById('knowledge_x').style.display='block';document.getElementById('fade_x').style.display='block'">
											<i class="anim_x"></i>
											<span onclick="openwindowgraphics()">了解更多</span>
										</a>
									</div>
								</div>
								<div class="fk-infoBlock_x f-infoBlock-normal_x">
									<div class="f-bg_x"></div>
									<div class="f-infoWrap_x">
										<div class="f-info-desc_x">
											<p style="padding-top: 7px;">
												在NEWX的江湖，有一门派独树一帜<br>
												其门下弟子都有一手十步叠图层，千里挖素材的好本事<br>
												他们技艺精湛，各有所长，不管是PS.Al，还是一支画笔，都能为之所用<br>
												他们来自何方?他们来自一图文部!
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="f-infoBlock-name_x">
								图文部
							</div>
						</li>
	
						<li class="f-main-item_x f-main-itemHover_x">
							<div class="fk-infoBlockWrap_x">
								<div class="f-wrapBg_x"></div>
								<div class="fk-infoBlock_x f-infoBlock-fasico_x">
									<div class="f-bg_x"></div>
									<div class="f-infoIcon_x f-infoIcon-wangzhanbu_x"></div>
									<div class="f-infoWrap_x">
										<div class="f-info-title_x">网站项目部</div>
										<div class="f-info-desc_x">前端 / 后端 / 全栈设计</div>
										<a class="set_4_button2_x raised_x hoverable_x f-button_x" href="javascript:void(0)" onclick="document.getElementById('knowledge_x').style.display='block';document.getElementById('fade_x').style.display='block'">
											<i class="anim_x"></i>
											<span onclick="openwindowweb()">了解更多</span>
										</a>
									</div>
								</div>
								<div class="fk-infoBlock_x f-infoBlock-normal_x">
									<div class="f-bg_x"></div>
									<div class="f-infoWrap_x">
										<div class="f-info-desc_x">
											<p style="padding-top: 7px;">
												成为技术宅拯救世界吧<br>
												想看透五彩斑斓的互联网如何编织而成?<br>
												只要你有心有力，通过我们的测试，便能加入我们共同探索!<br>
												听说会码代码的技术佬更受欢迎哦
												</p>
											
										</div>
									</div>
								</div>
							</div>
							<div class="f-infoBlock-name_x">
								网站部
							</div>
						</li>
					</ul>
				</div>

			</div>
			<script type="text/javascript">
				function openwindowweb(){
					var offsetWid = document.documentElement.clientWidth;
					var url='Add.aspx';
				    var name='add';
				    var iWidth= offsetWid * 0.4;        
				    var iHeight= iWidth *1.2;
				    var iTop = (window.screen.availHeight - 30 - iHeight) / 2;
				    var iLeft = (window.screen.availWidth - 10 - iWidth) / 2;
				    window.open(url, name, 'height=' + iHeight + ',,innerHeight=' + iHeight + ',width=' + iWidth + ',innerWidth=' + iWidth + ',top=' + iTop + ',left=' + iLeft + ',status=no,toolbar=no,menubar=no,location=no,resizable=no,scrollbars=0,titlebar=no');
					}
				function openwindowoffice(){
					var offsetWid = document.documentElement.clientWidth;
					var url='Add.aspx';
					var name='add';
					var iWidth= offsetWid * 0.4;        
					var iHeight= iWidth *1.2;
					var iTop = (window.screen.availHeight - 30 - iHeight) / 2;
					var iLeft = (window.screen.availWidth - 10 - iWidth) / 2;
					window.open(url, name, 'height=' + iHeight + ',,innerHeight=' + iHeight + ',width=' + iWidth + ',innerWidth=' + iWidth + ',top=' + iTop + ',left=' + iLeft + ',status=no,toolbar=no,menubar=no,location=no,resizable=no,scrollbars=0,titlebar=no');
					}
				function openwindowgraphics(){
					var offsetWid = document.documentElement.clientWidth;
					var url='Add.aspx';
					var name='add';
					var iWidth= offsetWid * 0.4;        
					var iHeight= iWidth *1.2;
					var iTop = (window.screen.availHeight - 30 - iHeight) / 2;
					var iLeft = (window.screen.availWidth - 10 - iWidth) / 2;
					window.open(url, name, 'height=' + iHeight + ',,innerHeight=' + iHeight + ',width=' + iWidth + ',innerWidth=' + iWidth + ',top=' + iTop + ',left=' + iLeft + ',status=no,toolbar=no,menubar=no,location=no,resizable=no,scrollbars=0,titlebar=no');
					}
				function openwindowcollect(){
					var offsetWid = document.documentElement.clientWidth;
					var url='Add.aspx';
					var name='add';
					var iWidth= offsetWid * 0.4;        
					var iHeight= iWidth *1.2;
					var iTop = (window.screen.availHeight - 30 - iHeight) / 2;
					var iLeft = (window.screen.availWidth - 10 - iWidth) / 2;
					window.open(url, name, 'height=' + iHeight + ',,innerHeight=' + iHeight + ',width=' + iWidth + ',innerWidth=' + iWidth + ',top=' + iTop + ',left=' + iLeft + ',status=no,toolbar=no,menubar=no,location=no,resizable=no,scrollbars=0,titlebar=no');
					}
				function openwindowedit(){
					var offsetWid = document.documentElement.clientWidth;
					var url='Add.aspx';
					var name='add';
					var iWidth= offsetWid * 0.4;        
					var iHeight= iWidth *1.2;
					var iTop = (window.screen.availHeight - 30 - iHeight) / 2;
					var iLeft = (window.screen.availWidth - 10 - iWidth) / 2;
					window.open(url, name, 'height=' + iHeight + ',,innerHeight=' + iHeight + ',width=' + iWidth + ',innerWidth=' + iWidth + ',top=' + iTop + ',left=' + iLeft + ',status=no,toolbar=no,menubar=no,location=no,resizable=no,scrollbars=0,titlebar=no');
					}
				function openwindowviedo(){
					var offsetWid = document.documentElement.clientWidth;
					var url='Add.aspx';
					var name='add';
					var iWidth= offsetWid * 0.4;        
					var iHeight= iWidth *1.2;
					var iTop = (window.screen.availHeight - 30 - iHeight) / 2;
					var iLeft = (window.screen.availWidth - 10 - iWidth) / 2;
					window.open(url, name, 'height=' + iHeight + ',,innerHeight=' + iHeight + ',width=' + iWidth + ',innerWidth=' + iWidth + ',top=' + iTop + ',left=' + iLeft + ',status=no,toolbar=no,menubar=no,location=no,resizable=no,scrollbars=0,titlebar=no');
					}
				
			</script>
				
			<!--第三屏 新闻动态-->
			<!--参考选项卡以及轮播图原理，需要用到js-->
			<div class="section" id="section3">
				<div id="newsDivBig_n">
					<div id="newsImg_n">
						<ul id="nwesUl_n">
							<li class="newsLi_n newsLi0_n">
								<div class="newsLiShdowLeft_n"></div><img style="width:100%;height:100%" src="http://localhost/newxadmin/public/static/index/images/1.jpg" />
								<div class="newsLiShdowRight_n"></div>
							</li>
							<li class="newsLi_n newsLi3_n">
								<div class="newsLiShdowLeft_n"></div><img style="width:100%;height:100%" src="http://localhost/newxadmin/public/static/index/images/2.jpg" />
								<div class="newsLiShdowRight_n"></div>
							</li>
							<li class="newsLi_n newsLi3_n">
								<div class="newsLiShdowLeft_n"></div><img style="width:100%;height:100%" src="http://localhost/newxadmin/public/static/index/images/3.jpg" />
								<div class="newsLiShdowRight_n"></div>
							</li>
							<li class="newsLi_n newsLi3_n">
								<div class="newsLiShdowLeft_n"></div><img style="width:100%;height:100%" src="http://localhost/newxadmin/public/static/index/images/4.jpg" />
								<div class="newsLiShdowRight_n"></div>
							</li>
						</ul>
						<div id="newsPlug_n">
							<div id="newsDate_n">
								<p class="newsDateWord_n newsDateWord0_n">23/Apr.</p>
								<p class="newsDateWord_n">25/Jan.</p>
								<p class="newsDateWord_n">26/Jul.</p>
								<p class="newsDateWord_n">01/May.</p>
							</div>
							<ul id="newsIndexUl_n">
								<li class="newsIndexLi_n newsIndexLiOver_n"><img style="width:100%;height:100%;border-radius:15px;" src="http://localhost/newxadmin/public/static/index/images/1.jpg" /></li>
								<li class="newsIndexLi_n"><img style="width:100%;height:100%;border-radius:15px;" src="http://localhost/newxadmin/public/static/index/images/2.jpg" /></li>
								<li class="newsIndexLi_n"><img style="width:100%;height:100%;border-radius:15px;" src="http://localhost/newxadmin/public/static/index/images/3.jpg" /></li>
								<li class="newsIndexLi_n"><img style="width:100%;height:100%;border-radius:15px;" src="http://localhost/newxadmin/public/static/index/images/4.jpg" /></li>
								<li class="newsIndexLi_n newsIndexLiMore_n" style="height: 12%;margin-top: 10%;"><img src="http://localhost/newxadmin/public/static/index/images/more.png" style="height: 100%;display: block;margin: 0 auto;" /></li>
							</ul>
							<div class="newsIntWordDiv_n newsIntWordDiv0_n">
								<p class="newsIntWord_n newsIntWord1_n">新闻标题1</p>
								<p class="newsIntWord_n newsIntWord2_n">新闻介绍1</p>
							</div>
							<div class="newsIntWordDiv_n">
								<p class="newsIntWord_n newsIntWord1_n">新闻标题2</p>
								<p class="newsIntWord_n newsIntWord2_n">新闻介绍2</p>
							</div>
							<div class="newsIntWordDiv_n">
								<p class="newsIntWord_n newsIntWord1_n">新闻标题3</p>
								<p class="newsIntWord_n newsIntWord2_n">新闻介绍3</p>
							</div>
							<div class="newsIntWordDiv_n">
								<p class="newsIntWord_n newsIntWord1_n">新闻标题4</p>
								<p class="newsIntWord_n newsIntWord2_n">新闻介绍4</p>
							</div>
						</div>
					</div>
				</div>
			</div>
<!--			&lt;!&ndash;第四屏 加入我们&ndash;&gt;-->
<!--			<div class="section " id="section4">-->
<!--				<img class="pen" src="http://localhost/newxadmin/public/static/index/images/Pen.png">-->
<!--				<img class="cutter" src="http://localhost/newxadmin/public/static/index/images/Cutter.png">-->
<!--				<img class="coffee" src="http://localhost/newxadmin/public/static/index/images/Coffee%20cup.png">-->
<!--				<img class="earphone" src="http://localhost/newxadmin/public/static/index/images/Earphones.png">-->
<!--				<img class="marker" src="http://localhost/newxadmin/public/static/index/images/Marker.png">-->
<!--				<img class="notebook" src="http://localhost/newxadmin/public/static/index/images/Notebook.png">-->
<!--				<img class="wallet" src="http://localhost/newxadmin/public/static/index/images/Wallet.png">-->
<!--				&lt;!&ndash; <a href="" class="ipad-pro"><img src="img/ipad-pro-acc-apple-pencil-witb-pdp-201810.png" ></a> &ndash;&gt;-->
<!--				<img id="ipad" class="ipad ipad-img" style="background: #242424 content-box;border-radius: 30px; border: 20px;" src="http://localhost/newxadmin/public/static/index/images/ipad.png">-->
<!--				<h3>加入我们,正在开发中......</h3>-->
<!--			</div>-->
			<!--第四屏 加入我们-->
			<div class="section " id="section4">
				<img class="pen" src="http://localhost/newxadmin/public/static/index/images/Pen.png">
				<img class="cutter" src="http://localhost/newxadmin/public/static/index/images/Cutter.png">
				<img class="coffee" src="http://localhost/newxadmin/public/static/index/images/Coffee%20cup.png">
				<img class="earphone" src="http://localhost/newxadmin/public/static/index/images/Earphones.png">
				<img class="marker" src="http://localhost/newxadmin/public/static/index/images/Marker.png">
				<img class="notebook" src="http://localhost/newxadmin/public/static/index/images/Notebook.png">
				<img class="wallet" src="http://localhost/newxadmin/public/static/index/images/Wallet.png">
				<!-- <a href="" class="ipad-pro"><img src="img/ipad-pro-acc-apple-pencil-witb-pdp-201810.png" ></a> -->
				<img id="ipad" class="ipad ipad-img" style="background: #242424 content-box;border-radius: 30px; border: 20px;margin: 0px auto;width: 800px;position: absolute;display: inline-block;" src="http://localhost/newxadmin/public/static/index/images/ipad.png">

				<script>
					var ipadM=document.getElementById("ipad");
					ipadM.Width=parseInt(window.getComputedStyle(ipadM).width)
					ipadM.style.left=(window.innerWidth-ipadM.Width)/2+'px';
					console.log(window.getComputedStyle(ipadM).width);
					ipadM.style.height=ipadM.Width*0.86702127659574468/0.91933240611961*9/16+'px';
					console.log(window.getComputedStyle(ipadM).height);
					// alert(window.getComputedStyle(ipadM).height);
					ipadM.style.top=(window.innerHeight-parseInt(window.getComputedStyle(ipadM).height))/2+'px';
				</script>
				<h3>加入我们,正在开发中......</h3>
			</div>

			<!--第五屏 联系我们-->
			<div class="section" id="section5">
				<div class="back401433">
					<div class="top331111">
						<canvas id="canvas" width="848.63" height="370"></canvas>
						<!---->
					</div>
					<div class="mid312102">
						<div id="newxqq653324"></div>
						<div id="newxwechata57446"></div>

					</div>
					<div class="copyright">
						<span>Copyright 2017-2019@ 	<a href="#">NEWX大学生网络文化工作室</a>  版权所有</span>
					</div>
				</div>
			</div>
			<script src="http://localhost/newxadmin/public/static/index/js/news_n.js" type="text/javascript"></script>
			<script type="text/javascript" src="http://localhost/newxadmin/public/static/index/js/section5.js"></script>
			<script src="http://code.jquery.com/jquery-latest.js"></script>
			<script src="http://localhost/newxadmin/public/static/index/js/main.js"></script>
			<script type="text/javascript" src="http://localhost/newxadmin/public/static/index/js/bg_x.js"></script>
			<script src="http://localhost/newxadmin/public/static/index/js/award_n2.js" type="text/javascript"></script>

	</body>

</html>