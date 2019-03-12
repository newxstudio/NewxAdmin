<?php /*a:3:{s:58:"D:\wamp64\www\NEWX\application\admin\view\admin\edit1.html";i:1552392954;s:57:"D:\wamp64\www\NEWX\application\admin\view\common\top.html";i:1552389751;s:58:"D:\wamp64\www\NEWX\application\admin\view\common\left.html";i:1552270767;}*/ ?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>NEWX·后台管理 - 资料修改</title>

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
		<link href="http://localhost/newx/public/static/layui/css/layui.css" rel="stylesheet">
		<link rel="shortcut icon" href="http://localhost/newx/public/static/admin/images/newx.ico" />
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
                                <div class="avatar" title="View your public profile" style="border: none;">
                                    <img src="http://localhost/newx/public/static/<?php echo htmlentities($adminsPic['pic']); ?>">
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
                                    <a href="<?php echo url('admin/edit1',array('id'=>app('request')->session('id'))); ?>">
                                            修改资料
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

	<?php if(is_array($itemRes) || $itemRes instanceof \think\Collection || $itemRes instanceof \think\Paginator): $i = 0; $__LIST__ = $itemRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
	<li>

		<?php if(($vo['level'] == 0 ) and ($vo['visibility'] == 1)): ?>
		<a href="#" class="menu-dropdown">
			<i class="menu-icon <?php switch($vo['id']): case "8": ?>fa fa-user<?php break; case "13": ?>fa fa-vcard<?php break; ?><?php endswitch; ?>"></i>
			<span class="menu-text"><?php echo htmlentities($vo['title']); ?></span>
			<i class="menu-expand"></i>
		</a>

		<ul class="submenu">
			<?php foreach($itemRes as $k=>$vo1): if(($vo1['pid'] == $vo['id'])   and ($vo['visibility'] == 1)): ?>
			<li>
				<a href="<?php echo url($vo1['name']); ?>">
					<span class="menu-text"><?php echo htmlentities($vo1['title']); ?></span>
					<i class="menu-expand"></i>
				</a>
			</li>
			<?php endif; ?> <?php endforeach; ?>
		</ul>

	</li>
	<?php endif; ?> <?php endforeach; endif; else: echo "" ;endif; ?>

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
								<li>
									<a href="#">管理员管理</a>
								</li>
								<li class="active">资料修改</li>
							</ul>
						</div>
						<!-- /Page Breadcrumb -->

						<!-- Page Body -->
						<div class="page-body">

							<div class="row">
								<div class="col-lg-12 col-sm-12 col-xs-12">
									<div class="widget">
										<div class="widget-header bordered-bottom bordered-blue">
											<span class="widget-caption">资料修改</span>
										</div>
										<div class="widget-body">
											<div id="horizontal-form">
												<form class="form-horizontal" role="form" action="" enctype="multipart/form-data" method="post">
													<input type="hidden" name="id" value="<?php echo htmlentities($admins['id']); ?>" />

													<div class="form-group">
														<label for="name" class="col-sm-2 control-label no-padding-right">管理员昵称</label>
														<div class="col-sm-6">
															<input class="form-control" id="name" placeholder="昵称" name="name" value="<?php echo htmlentities($admins['name']); ?>" type="text">
														</div>
													</div>
													<div class="form-group">
														<label for="email" class="col-sm-2 control-label no-padding-right">管理员邮箱</label>
														<div class="col-sm-6">
															<input class="form-control" id="email" placeholder="邮箱" name="email" value="<?php echo htmlentities($admins['email']); ?>" type="text">
														</div>
													</div>
													<div class="form-group">
														<label for="desca" class="col-sm-2 control-label no-padding-right">管理员描述</label>
														<div class="col-sm-6">
															<input class="form-control" id="desca" placeholder="描述" name="desca" value="<?php echo htmlentities($admins['desca']); ?>" type="text">
														</div>
													</div>
													<div class="form-group">
														<label for="group_id" class="col-sm-2 control-label no-padding-right">管理员密码</label>
														<div class="col-sm-6">
															<input class="form-control" id="password" placeholder="" name="password" type="text">
														</div>
													</div>
													<div class="form-group">

														<div class="layui-upload">
															<label for="pic" class="col-sm-2 control-label no-padding-right">管理员头像</label>
															<div class="col-sm-6">

																<button type="button" class="layui-btn layui-btn-normal" id="pic">添加图片</button>
																<img src="http://localhost/newx/public/static/<?php echo htmlentities($admins['pic']); ?>" width="100" height="100" style="float: right;">

																<p class="help-block col-sm-4 red" style="float: right;">点击图片放大预览</p>
																<div id="img_sel">

																</div>
																<button type="button" class="layui-btn" id="test8" style="margin-top: 10px;">上传</button>
																<p class="help-block col-sm-4 red" style="float: right;">* 请点击上传</p>
															</div>

														</div>

													</div>
													<div class="form-group">
														<div class="col-sm-offset-2 col-sm-10">
															<button type="submit" class="btn btn-default" id="toSave">更新信息</button>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>

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
			<script src="http://localhost/newx/public/static/layui/layui.js"></script>
			<script>
				layui.use('upload', function() {
					var upload = layui.upload;
					var layer = layui.layer;
					var count = 0;
					//执行实例
					var uploadInst = upload.render({
						elem: '#pic' //绑定元素
							,
						url: "<?php echo url('admin/upload'); ?>" //上传接口
							,
						auto: false //选择文件后不自动上传

							,
						bindAction: '#test8',
						choose: function(obj) {
							//预读本地文件示例，不支持ie8
							obj.preview(function(index, file, result) { //在当前ID为“demo2”的区域显示图片
								count++;
								console.log(count);
								if(count > 1 )
								{
									layer.msg("只允许上传一张图片");
									error();
								}
								var files = obj.pushFile();
								layui.use(['jquery', 'layer'], function() {
									var $ = layui.$ //重点处
										,
										layer = layui.layer;
									$('#img_sel').append('<div class="image-container" id="container' + index + '"><div class="delete-css"><button id="upload_img_' + index + '" class="layui-btn layui-btn-danger layui-btn-xs">删除</button></div>' +
										'<img id="showImg' + index + '" style="width: 150px; margin:10px;cursor:pointer;"src="' + result + '" alt="' + file.name + '"></div>');

									$("#upload_img_" + index).bind('click', function() {
										delete files[index];
										count--;
										$("#container" + index).remove();
									});
									//某图片放大预览
									$("#showImg" + index).bind('click', function() {
										var width = $("#showImg" + index).width();
										var height = $("#showImg" + index).height();
										var scaleWH = width / height;
										var bigH = 600;
										var bigW = scaleWH * bigH;
										if(bigW > 900) {
											bigW = 900;
											bigH = bigW / scaleWH;
										}

										// 放大预览图片
										layer.open({
											type: 1,
											title: false,
											closeBtn: 1,
											shadeClose: true,
											area: [bigW + 'px', bigH + 'px'], //宽高
											content: "<img width='" + bigW + "' height='" + bigH + "' src=" + result + " />"
										});
									});

								});

							});
						},

						done: function(res) {
							//上传完毕回调
							layer.msg('上传成功');

						},
						error: function() {
							//请求异常回调
							layer.msg('上传失败，请重试');
						}
					});
				});
			</script>
			<script type="text/javascript">
				$(function() {
					$('#toSave').click(function() {
						$.ajax({
							url: "<?php echo url('admin/edit1'); ?>",
							type: 'post',
							data: $('form').serialize(),
							dataType: 'json',
							success: function(data) {
								console.log(data);
								if(data.code == 1) {
									layer.msg(data.msg, {
										icon: 6,
										time: 2000
									}, function() {
										location.href = data.url;
									});
								} else {
									layer.open({
										title: '修改信息失败',
										content: data.msg,
										icon: 5,
										anim: 6
									});
								}
							},
							error: function(data) {
								console.log(data);

							}
						});
						return false;
					});
				});
			</script>

	</body>

</html>