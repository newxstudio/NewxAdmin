<?php /*a:1:{s:61:"D:\wamp64\www\NewxAdmin\application\admin\view\admin\add.html";i:1564965169;}*/ ?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>NEWX·后台管理 - 添加管理员</title>

		<meta name="description" content="Dashboard">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!--Basic http://localhost/newxadmin/public/static/admin/styles-->
		<link href="http://localhost/newxadmin/public/static/admin/style/bootstrap.css" rel="stylesheet">
		<link href="http://localhost/newxadmin/public/static/admin/style/font-awesome.css" rel="stylesheet">
		<link href="http://localhost/newxadmin/public/static/admin/style/weather-icons.css" rel="stylesheet">

		<!--Beyond http://localhost/newxadmin/public/static/admin/styles-->
		<link id="beyond-link" href="http://localhost/newxadmin/public/static/admin/style/beyond.css" rel="stylesheet" type="text/css">
		<link href="http://localhost/newxadmin/public/static/admin/style/demo.css" rel="stylesheet">
		<link href="http://localhost/newxadmin/public/static/admin/style/typicons.css" rel="stylesheet">
		<link href="http://localhost/newxadmin/public/static/admin/style/animate.css" rel="stylesheet">
		<link href="http://localhost/newxadmin/public/static/layui/css/layui.css" rel="stylesheet">
		<link rel="shortcut icon" href="http://localhost/newxadmin/public/static/admin/images/newx.ico" />
	</head>

	<body>


		<!-- /头部 -->

		<div class="main-container container-fluid">
			<div class="page-container">·
				<!-- Page Sidebar -->
				<div class="page-sidebar" id="sidebar">
					<!-- Page Sidebar Header-->
					<div class="sidebar-header-wrapper">
						<input class="searchinput" type="text" disabled="disabled">
					</div>
					<!-- /Page Sidebar Header -->

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
									<a href="<?php echo url('lst'); ?>">权限管理</a>
								</li>
								<li class="active">添加权限</li>
							</ul>
						</div>
						<!-- /Page Breadcrumb -->

						<!-- Page Body -->
						<div class="page-body">

							<div class="row">
								<div class="col-lg-12 col-sm-12 col-xs-12">
									<div class="widget">
										<div class="widget-header bordered-bottom bordered-blue">
											<span class="widget-caption">新增权限</span>
										</div>
										<div class="widget-body">
											<div id="horizontal-form">
												<form class="form-horizontal" role="form" action="" method="post">
													<div class="form-group">
														<label for="username" class="col-sm-2 control-label no-padding-right">上级权限</label>
														<div class="col-sm-6">
															<select name="pid">
																<option value="0">顶级权限</option>
																<?php if(is_array($authRuleRes) || $authRuleRes instanceof \think\Collection || $authRuleRes instanceof \think\Paginator): $i = 0; $__LIST__ = $authRuleRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$authRule): $mod = ($i % 2 );++$i;?>
																<option value="<?php echo htmlentities($authRule['id']); ?>">
																	<?php if($authRule['level']!=0){echo '|';} echo str_repeat('—', $authRule['level']*3)?><?php echo htmlentities($authRule['title']); ?></option>
																<?php endforeach; endif; else: echo "" ;endif; ?>
															</select>
														</div>
														<p class="help-block col-sm-4 red">* 必填</p>
													</div>
													<div class="form-group">
														<label for="username" class="col-sm-2 control-label no-padding-right">权限名称</label>
														<div class="col-sm-6">
															<input class="form-control" placeholder="" name="title" required="" type="text">
														</div>
														<p class="help-block col-sm-4 red">* 必填</p>
													</div>
													<div class="form-group">
														<label for="username" class="col-sm-2 control-label no-padding-right">控/方</label>
														<div class="col-sm-6">
															<input class="form-control" placeholder="" name="name" required="" type="text">
														</div>
														<p class="help-block col-sm-4 red">* 必填</p>
													</div>
													<div class="form-group">
														<label for="state" class="col-sm-2 control-label no-padding-right">是否可见</label>
														<div class="col-sm-6">
															<label>
                                    <input class="checkbox-slider colored-darkorange" name="visibility"  type="checkbox">
                                    <span class="text"></span>
                                 </label>
														</div>
													</div>
													<div class="form-group">
														<div class="col-sm-offset-2 col-sm-10">
															<button type="submit" class="btn btn-default" id="toSave">保存信息</button>
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
			<script src="http://localhost/newxadmin/public/static/admin/style/jquery_002.js"></script>
			<script src="http://localhost/newxadmin/public/static/admin/style/bootstrap.js"></script>
			<script src="http://localhost/newxadmin/public/static/admin/style/jquery.js"></script>
			<!--Beyond Scripts-->
			<script src="http://localhost/newxadmin/public/static/admin/style/beyond.js"></script>
			<script src="http://localhost/newxadmin/public/static/layui/layui.js"></script>
			<script type="text/javascript">
				$(function() {
					layui.use('layer', function() {
						var layer = layui.layer;
						$('#toSave').click(function() {
							$.ajax({
								url: "<?php echo url('authRule/add'); ?>",
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
											title: '添加权限失败',
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

				});
			</script>

	</body>

</html>