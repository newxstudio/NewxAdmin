<?php /*a:3:{s:58:"D:\wamp64\www\NEWX\application\admin\view\user\signin.html";i:1551275854;s:57:"D:\wamp64\www\NEWX\application\admin\view\common\top.html";i:1551069475;s:58:"D:\wamp64\www\NEWX\application\admin\view\common\left.html";i:1551274307;}*/ ?>
<!DOCTYPE html>
<html><head>
	    <meta charset="utf-8">
    <title>NEWX·后台管理 - 注册</title>

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
                                    <a href="<?php echo url('admin/logout'); ?>">
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
		<div class="page-container">·
			            <!-- Page Sidebar -->
            <div class="page-sidebar" id="sidebar">
                <!-- Page Sidebar Header-->
                <div class="sidebar-header-wrapper">
                    <input class="searchinput" type="text">
                    <i class="searchicon fa fa-search"></i>
                    <div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>
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
                                <a href="<?php echo url('article/lst'); ?>">
                                    <span class="menu-text">
                                        报名列表                                    </span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo url('article/lst'); ?>">
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
                                        <li>
                        <a href="<?php echo url('admin/lst'); ?>">管理员管理</a>
                    </li>
                                        <li class="active">添加管理员</li>
                                        </ul>
                </div>
                <!-- /Page Breadcrumb -->

                <!-- Page Body -->
                <div class="page-body">
                    
<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-blue">
                <span class="widget-caption">新增管理员</span>
            </div>
            <div class="widget-body">
                <div id="horizontal-form">
                    <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">登录名</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="username" placeholder="登录名" name="username"  type="text">
                            
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label no-padding-right">登录密码</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="password" placeholder="登录名" name="password"  type="text">
                            
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label no-padding-right">姓名</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="name" placeholder="登录名" name="name"  type="text">
                            
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>
                        <div class="form-group">
                            <label for="sex" class="col-sm-2 control-label no-padding-right">性别</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="sex" placeholder="登录名" name="sex"  type="text">
                            
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>
                        <div class="form-group">
                            <label for="date" class="col-sm-2 control-label no-padding-right">出生日期</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="date" placeholder="登录名" name="date"  type="text">
                            
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-sm-2 control-label no-padding-right">电话</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="phone" placeholder="登录名" name="phone"  type="text">
                            
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>
                        <div class="form-group">
                            <label for="department" class="col-sm-2 control-label no-padding-right">院系</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="department" placeholder="登录名" name="department"  type="text">
                            
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>
                        <div class="form-group">
                            <label for="class" class="col-sm-2 control-label no-padding-right">班级</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="class" placeholder="登录名" name="class"  type="text">
                            
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>
                        <div class="form-group">
                            <label for="bedroom" class="col-sm-2 control-label no-padding-right">寝室</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="bedroom" placeholder="登录名" name="bedroom"  type="text">
                            
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>
                        <div class="form-group">
                            <label for="id_number" class="col-sm-2 control-label no-padding-right">学号</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="id_number" placeholder="登录名" name="id_number"  type="text">
                            
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label no-padding-right">邮箱</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="email" placeholder="登录名" name="email"  type="text">
                            
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>

                        
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">保存信息</button>
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