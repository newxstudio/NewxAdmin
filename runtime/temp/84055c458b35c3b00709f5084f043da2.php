<?php /*a:3:{s:56:"D:\wamp64\www\NEWX\application\admin\view\admin\lst.html";i:1552271982;s:57:"D:\wamp64\www\NEWX\application\admin\view\common\top.html";i:1551705548;s:58:"D:\wamp64\www\NEWX\application\admin\view\common\left.html";i:1552270767;}*/ ?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>NEWX·后台管理 - 管理员列表</title>

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
		<link rel="stylesheet" href="http://localhost/newx/public/static/layui/css/layui.css">
		<!--Basic Scripts-->
		<script src="http://localhost/newx/public/static/admin/style/jquery_002.js"></script>

		<script src="http://localhost/newx/public/static/layer/layer.js"></script>
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
                                    <a href="<?php echo url('admin/edit1',array('id'=>app('request')->session('uid'))); ?>">
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
								<li class="active">管理员管理</li>
							</ul>
						</div>
						<!-- /Page Breadcrumb -->

						<!-- Page Body -->
						<div class="page-body">

							<button type="button" tooltip="添加管理员" class="btn btn-sm btn-azure btn-addon" onClick="javascript:window.location.href = '<?php echo url('admin/add'); ?>'"> <i class="fa fa-plus"></i> Add
</button>
							<div class="row">
								<div class="col-lg-12 col-sm-12 col-xs-12">
									<div class="widget">
										<div class="widget-body">
											<div class="flip-scroll">
												<table class="table table-bordered table-hover">
													<thead class="">
														<tr>
															<th class="text-center">ID</th>
															<th class="text-center">管理员名称</th>
															<th class="text-center">所属用户组</th>
															<th class="text-center">操作</th>
														</tr>
													</thead>
													<tbody>
														<?php if(is_array($adminres) || $adminres instanceof \think\Collection || $adminres instanceof \think\Paginator): $i = 0; $__LIST__ = $adminres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
														<tr>
															<td align="center"><?php echo htmlentities($vo['id']); ?></td>
															<td align="center"><?php echo htmlentities($vo['username']); ?></td>
															<td align="center"><?php echo htmlentities($vo['groupTitle']); ?></td>
															<td align="center">
																<a href="<?php echo url('admin/edit',array('id'=>$vo['id'])); ?>" class="btn btn-primary btn-sm shiny">
																	<i class="fa fa-edit"></i> 编辑
																</a>
																<?php if($vo['id'] != 1): ?>

																<a href="#" id="del" <?php if($auth == 0): ?> onClick="layer.open({title: '<?php echo htmlentities($groupTitle); ?>',content:'没有权限',icon: 5,anim: 6});" <?php else: ?> onClick="warning('确实要删除吗', '<?php echo url(" admin/del ",array('id'=>$vo['id'])); ?>')" <?php endif; ?> class="btn btn-danger btn-sm shiny">
																	<i class="fa fa-trash-o"></i> 删除
																</a>

																<?php endif; ?>
															</td>
														</tr>

														<?php endforeach; endif; else: echo "" ;endif; ?>
													</tbody>

												</table>

											</div>

											<div style="text-align: right;margin-top: 10px;">
												<?php echo $adminres; ?>
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

	</body>

</html>