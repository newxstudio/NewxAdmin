<?php /*a:3:{s:58:"D:\wamp64\www\NEWX\application\admin\view\apply\chart.html";i:1551498513;s:57:"D:\wamp64\www\NEWX\application\admin\view\common\top.html";i:1551428493;s:58:"D:\wamp64\www\NEWX\application\admin\view\common\left.html";i:1551451623;}*/ ?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>NEWX·后台管理 -报名统计 </title>

		<meta name="description" content="Dashboard">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!--Basic http://localhost/newx/public/static/admin/styles-->
		<link href="http://localhost/newx/public/static/admin/style/bootstrap.css" rel="stylesheet">
		<link href="http://localhost/newx/public/static/admin/style/font-awesome.css" rel="stylesheet">
		<link href="http://localhost/newx/public/static/admin/style/weather-icons.css" rel="stylesheet">

		<!--Beyond http://localhost/newx/public/static/admin/styles-->
		<link id="beyond-link" href="http://localhost/newx/public/static/admin/style/beyond.css" rel="stylesheet" type="text/css">
		<link href="http://localhost/newx/public/static/admin/style/demo.css" rel="stylesheet">
		<link href="http://localhost/newx/public/static/admin/style/typicons.css" rel="stylesheet">
		<link href="http://localhost/newx/public/static/admin/style/animate.css" rel="stylesheet">
		<link rel="shortcut icon" href="http://localhost/newx/public/static/admin/images/newx.ico" />
		<link rel="stylesheet" href="http://localhost/newx/public/static/layui/css/layui.css">
		<style type="text/css">
			#main1,
			#main2,
			#main3,
			#main4 {
				float: left;
			}
		</style>
	</head>

	<body>
		<!-- 头部 -->
	<div class="navbar">
    <div class="navbar-inner">
        <div class="navbar-container">
            <!-- Navbar Barnd -->
            <div class="navbar-header pull-left">
                <a href="#" class="navbar-brand">
                    <small>
                            <img src="http://localhost/newx/public/static/admin/images/logo.png" alt="">
                        </small>
                </a>
            </div>
            <!-- /Navbar Barnd -->
            <!-- Sidebar Collapse -->
            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="collapse-icon fa fa-bars"></i>
            </div> 
            <!-- /Sidebar Collapse -->
            <!-- Account Area and Settings -->
            <div class="navbar-header pull-right">
                <div class="navbar-account">
                    <ul class="account-area">
                        <li>
                            <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                <div class="avatar" title="View your public profile">
                                    <img src="http://localhost/newx/public/static/admin/images/newx.jpg">
                                </div>
                                <section>
                                    <h2><span class="profile"><span><?php echo htmlentities(app('request')->session('username')); ?></span></span></h2>
                                </section>
                            </a>
                            <!--Login Area Dropdown-->
                            <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                <li class="username"><a>David Stevenson</a></li>
                                <li class="dropdown-footer">
                                    <a href="<?php echo url('admin/logout'); ?>" id="logout">
                                            退出登录
                                        </a>
                                </li>
                                <li class="dropdown-footer">
                                    <a href="<?php echo url('admin/edit',array('id'=>app('request')->session('uid'))); ?>">
                                            修改密码
                                        </a>
                                </li>
                            </ul>
                            <!--/Login Area Dropdown-->
                        </li>
                        <!-- /Account Area -->
                        <!--Note: notice that setting div must start right after account area list.
                            no space must be between these elements-->
                        <!-- Settings -->
                    </ul>
                </div>
            </div>
            <!-- /Account Area and Settings -->
        </div>
    </div>
</div>


		<!-- /头部 -->

		<div class="main-container container-fluid">
			<div class="page-container">
				<!-- Page Sidebar -->
				<div class="page-sidebar" id="sidebar">
					<!-- Page Sidebar Header-->
					<div class="sidebar-header-wrapper">
						<input class="searchinput" type="text" disabled="disabled">
					</div>
					<!-- /Page Sidebar Header -->
					 <!-- Sidebar Menu -->
                <ul class="nav sidebar-menu">
                    <!--Dashboard-->
                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-user"></i>
                            <span class="menu-text">管理员</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo url('admin/lst'); ?>">
                                    <span class="menu-text">
                                        管理员列表                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>                            
                    </li> 
					 <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-vcard"></i>
                            <span class="menu-text">用户管理</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo url('user/lst'); ?>">
                                    <span class="menu-text">
                                        用户列表                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>                            
                    </li> 
                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-file-text"></i>
                            <span class="menu-text">报名管理</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo url('apply/lst'); ?>">
                                    <span class="menu-text">
                                        报名列表                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo url('apply/chart'); ?>">
                                    <span class="menu-text">
                                        报名统计                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>                            
                    </li> 
                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-newspaper-o"></i>
                            <span class="menu-text">新闻动态</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo url('links/lst'); ?>">
                                    <span class="menu-text">
                            新闻列表                                   </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>                            
                    </li> 
                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa fa-edit"></i>
                            <span class="menu-text">作品展示</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo url('links/lst'); ?>">
                                    <span class="menu-text">
                            作品管理                                   </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>                            
                    </li> 

                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-gear"></i>
                            <span class="menu-text">系统</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo url('tags/lst'); ?>">
                                    <span class="menu-text">
                                        个人资料修改                                   </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>                            
                    </li>                        
                    
                                           
                    
                </ul>
                <!-- /Sidebar Menu -->
            </div>
					<!-- /Page Sidebar -->
					<!-- Page Content -->
					<div class="page-content">
						<!-- Page Breadcrumb -->
						<div class="page-breadcrumbs">
							<ul class="breadcrumb">
								<li>
									<a href="#">系统</a>
								</li>
								<li class="active">报名统计</li>
							</ul>
						</div>
						<!-- /Page Breadcrumb -->

						<!-- Page Body -->
						<div class="page-body">
							<div id="main1" style="width: 600px;height:300px;"></div>
							<div id="main2" style="width: 600px;height:300px;"></div>
							<div id="main3" style="width: 600px;height:300px;"></div>
							<div id="main4" style="width: 600px;height:300px;"></div>
						</div>
						<!-- /Page Body -->
					</div>
					<!-- /Page Content -->
				</div>
			</div>

			<!--Basic Scripts-->
			<script src="http://localhost/newx/public/static/admin/style/jquery_002.js"></script>
			<script src="http://localhost/newx/public/static/admin/style/bootstrap.js"></script>
			<script src="http://localhost/newx/public/static/admin/style/jquery.js"></script>
			<!--Beyond Scripts-->
			<script src="http://localhost/newx/public/static/admin/style/beyond.js"></script>
			<script src="https://cdn.bootcss.com/echarts/4.2.1-rc1/echarts-en.common.js"></script>
			<script src="http://localhost/newx/public/static/admin/style/shine.js"></script>
			<script>
				// 第二个参数可以指定前面引入的主题
				var chart1 = echarts.init(document.getElementById('main1'));
				var chart2 = echarts.init(document.getElementById('main2'));
				var chart3 = echarts.init(document.getElementById('main3'));
				var chart4 = echarts.init(document.getElementById('main4'));

				//异步加载后台数据， 通过定时器在实现
				var i = 0;

				function run() {
					i++;
					$.ajax({
						url: "<?php echo url('apply/data'); ?>",
						type: 'POST',
						dataType: 'JSON',
						data: {},
						success: function(data) {

							chart1.setOption({
								title: {
									text: '第一志愿报名统计',
									//subtext: '纯属虚构',
									x: 'center'
								},
								tooltip: {
									trigger: 'item',
									formatter: "{a} <br/>{b} : {c} ({d}%)"
								},
								legend: {
									orient: 'vertical',
									left: 'left',
									data: ['视频部', '采风部', '图文部', '网站部', '办公室', '运营部', '采编部']
								},
								series: [{
									name: '一志愿人数',
									type: 'pie',
									radius: '55%',
									center: ['50%', '60%'],
									data: [{
											value: data[0],
											name: '视频部'
										},
										{
											value: data[1],
											name: '采风部'
										},
										{
											value: data[2],
											name: '图文部'
										},
										{
											value: data[3],
											name: '网站部'
										},
										{
											value: data[4],
											name: '办公室'
										},
										{
											value: data[5],
											name: '运营部'
										},
										{
											value: data[6],
											name: '采编部'
										}
									],
									itemStyle: {
										emphasis: {
											shadowBlur: 10,
											shadowOffsetX: 0,
											shadowColor: 'rgba(0, 0, 0, 0.5)'
										}
									}
								}]

							})
							chart2.setOption({
								title: {
									text: '第一志愿报名统计',
									//subtext: '纯属虚构',
									x: 'center'
								},
								tooltip: {
									trigger: 'item',
									formatter: "{a} <br/>{b} : {c} ({d}%)"
								},
								legend: {
									orient: 'vertical',
									left: 'left',
									data: ['视频部', '采风部', '图文部', '网站部', '办公室', '运营部', '采编部']
								},
								series: [{
									name: '一志愿人数',
									type: 'pie',
									radius: '55%',
									center: ['50%', '60%'],
									data: [{
											value: data[7],
											name: '视频部'
										},
										{
											value: data[8],
											name: '采风部'
										},
										{
											value: data[9],
											name: '图文部'
										},
										{
											value: data[10],
											name: '网站部'
										},
										{
											value: data[11],
											name: '办公室'
										},
										{
											value: data[12],
											name: '运营部'
										},
										{
											value: data[13],
											name: '采编部'
										}
									],
									itemStyle: {
										emphasis: {
											shadowBlur: 10,
											shadowOffsetX: 0,
											shadowColor: 'rgba(0, 0, 0, 0.5)'
										}
									}
								}]

							})
							
							chart3.setOption({
								title: {
									text: '第一志愿男女比',
									//subtext: '纯属虚构',
									x: 'left'
								},
								legend: {},
								tooltip: {},
								dataset: {
									source: [
										['男女比', '男', '女'],
										['视频部', data[14], data[21] ],
										['采风部', data[15], data[22] ],
										['图文部', data[16], data[23] ],
										['网站部', data[17], data[24] ],
										['办公室', data[18], data[25] ],
										['运营部', data[19], data[26] ],
										['采编部', data[20], data[27] ],
									]
								},
								xAxis: {
									type: 'category'
								},
								yAxis: {},
								// Declare several bar series, each will be mapped
								// to a column of dataset.source by default.
								series: [{
										type: 'bar',
										color: ['#334B5C']
									},
									{
										type: 'bar',
										color: ['#D53A35']
									},
								]
							})
							
							chart4.setOption({
								title: {
									text: '第二志愿男女比',
									//subtext: '纯属虚构',
									x: 'left'
								},
								legend: {},
								tooltip: {},
								dataset: {
									source: [
										['男女比', '男', '女'],
										['视频部', data[28], data[35] ],
										['采风部', data[29], data[36] ],
										['图文部', data[30], data[37] ],
										['网站部', data[31], data[38] ],
										['办公室', data[32], data[39] ],
										['运营部', data[33], data[40] ],
										['采编部', data[34], data[41] ],
									]
								},
								xAxis: {
									type: 'category'
								},
								yAxis: {},
								// Declare several bar series, each will be mapped
								// to a column of dataset.source by default.
								series: [{
										type: 'bar',
										color: ['#334B5C']
									},
									{
										type: 'bar',
										color: ['#D53A35']
									},
								]
							})
							
							
						}
					})
				};
				var time = setInterval(run, 500);
			</script>

	</body>

</html>