<?php /*a:1:{s:67:"D:\wamp64\www\NewxAdmin\application\index\view\index\introduce.html";i:1566383044;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="http://localhost/newxadmin/public/static/index/css/introduce.css"/>
		<script src="http://localhost/newxadmin/public/static/index/js/vue-2_6_10.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<div id="departmentBox">
			<div  v-show="flag">
				<div id="department">
					<div id="dePicBox" ref="dePicBox">
						<div id="dePicBor">
							<div id="dePic" ref="dePic"></div>
						</div>
					</div>
					<div id="simple" ref="simple">
						<div>{{ simple[deI][0] }}</div>
						<div>{{ simple[deI][1] }}</div>
					</div>
					<div id="deContent" ref="deContent">
						<div id="deName" ref="deName">{{ name[deI] }}</div>
						{{ content[deI] }}
					</div>
					<div id="botMore" ref="botMore">
						<a href="#" v-if="deI==0" class="BMCon">bilibili</a>
						<a href="#" v-else-if="deI==1" class="BMCon">教室查询</a>
						<a href="#" v-else-if="deI==2" class="BMCon">办公室</a>
						<a href="#" v-else-if="deI==3" class="BMCon">图文连接</a>
						<a href="#" v-else-if="deI==4" class="BMCon">NEWX图站</a>
						<a href="#" v-else-if="deI==5" class="BMCon">采编链接</a>
						<a href="index.html#details" class="BMCon">返回主站</a>
					</div>
				</div>
			</div>
		</div>
		<script src="http://localhost/newxadmin/public/static/index/js/introduce.js" type="text/javascript" charset="utf-8"></script>
	</body>
</html>
