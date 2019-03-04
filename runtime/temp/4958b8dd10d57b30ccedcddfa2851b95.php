<?php /*a:3:{s:58:"D:\wamp64\www\NEWX\application\admin\view\admin\edit1.html";i:1551705764;s:57:"D:\wamp64\www\NEWX\application\admin\view\common\top.html";i:1551705548;s:58:"D:\wamp64\www\NEWX\application\admin\view\common\left.html";i:1551698467;}*/ ?>
<!DOCTYPE html>
<html><head>
	    <meta charset="utf-8">
    <title>NEWX·后台管理 - 编辑管理员</title>

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

		<?php if($vo['level'] == 0): ?>
		<a href="#" class="menu-dropdown">
			<i class="menu-icon fa fa-user"></i>
			<span class="menu-text"><?php echo htmlentities($vo['title']); ?></span>
			<i class="menu-expand"></i>
		</a>
		

		<ul class="submenu">
			<?php foreach($itemRes as $k=>$vo1): if($vo1['pid'] == $vo['id']): ?>
			<li>
				<a href="<?php echo url($vo1['name']); ?>">
					<span class="menu-text"><?php echo htmlentities($vo1['title']); ?></span>
					<i class="menu-expand"></i>
				</a>
			</li>
			<?php endif; ?>
			<?php endforeach; ?>
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
                                <input class="form-control" id="email" placeholder="邮箱" name="email" value="<?php echo htmlentities($admins['email']); ?>"  type="text">  
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
                                <input class="form-control" id="password" placeholder="" name="password"  type="text">  
                            </div>
                        </div>  
                        <div class="form-group">
                            <label for="pic" class="col-sm-2 control-label no-padding-right">管理员头像</label>
                            
                            <div class="col-sm-6">
                             <input  id="pic" placeholder="" name="pic"  type="file" style="display: inline">
                             <img src="http://localhost/newx/public/static/<?php echo htmlentities($admins['pic']); ?>" / width="60" height="60" >
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">更新信息</button>
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
    


</body></html>