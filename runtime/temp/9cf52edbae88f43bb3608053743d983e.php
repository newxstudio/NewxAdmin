<?php /*a:1:{s:58:"D:\wamp64\www\NEWX\application\admin\view\login\login.html";i:1551438912;}*/ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<!--Head-->

	<head>
		<meta charset="utf-8">
		<title>NEWX·后台管理系统 --登录</title>
		<meta name="description" content="login page">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!--Basic http://localhost/newx/public/static/admin/styles-->
		<link href="http://localhost/newx/public/static/admin/style/bootstrap.css" rel="stylesheet">
		<link href="http://localhost/newx/public/static/admin/style/font-awesome.css" rel="stylesheet">
		<!--Beyond http://localhost/newx/public/static/admin/styles-->
		<link id="beyond-link" href="http://localhost/newx/public/static/admin/style/beyond.css" rel="stylesheet">
		<link href="http://localhost/newx/public/static/admin/style/demo.css" rel="stylesheet">
		<link href="http://localhost/newx/public/static/admin/style/animate.css" rel="stylesheet">
		<link rel="shortcut icon" href="http://localhost/newx/public/static/admin/images/newx.ico" />
		<link rel="stylesheet" href="http://localhost/newx/public/static/layui/css/layui.css">
	</head>
	<!--Head Ends-->
	<!--Body-->

	<body>
		<div class="login-container animated fadeInDown">
			<form action="" class="layui-form" method="post">
				<div class="loginbox bg-white">
					<div class="loginbox-title">SIGN IN</div>
					<div class="loginbox-textbox">
						<input placeholder="账号" class="form-control" name="username" type="text">
					</div>
					<div class="loginbox-textbox">
						<input class="form-control" placeholder="密码" name="password" type="password">
					</div>
					<div class="loginbox-textbox">
						<input class="form-control" name="code" type="text" style="width: 80px; float: left;">
						<img src="<?php echo captcha_src(); ?>" alt="captcha" onclick="this.src=this.src+'?'" style="float: left;cursor: pointer;width: 140px;" />
					</div>
					<div class="loginbox-submit">
						<input class="btn btn-primary btn-block" value="Login" type="submit" id="login">
					</div>
				</div>

			</form>
		</div>

		<!--Basic Scripts-->
		<script src="http://localhost/newx/public/static/admin/style/jquery.js"></script>
		<script src="http://localhost/newx/public/static/admin/style/bootstrap.js"></script>
		<script src="http://localhost/newx/public/static/admin/style/jquery_002.js"></script>
		<!--Beyond Scripts-->
		<script src="http://localhost/newx/public/static/admin/style/beyond.js"></script>
		<script src="http://localhost/newx/public/static/layer/layer.js"></script>
		<script>
			$(function() {
				$('#login').click(function() {
					$.ajax({
						url: "<?php echo url('login/index'); ?>",
						type: 'post',
						data: $('form').serialize(),
						dataType: 'json',
						success: function(data) {
							if(data.code == 1) {
								layer.msg(data.msg, {
									icon: 6,
									time: 2000
								}, function() {
									location.href = data.url;
								});
							} else {
								layer.open({
									title: '登录失败',
									content: data.msg,
									icon: 5,
									anim: 6
								});
							}
						}
					});
					return false;
				});
			});
		</script>

	</body>
	<!--Body Ends-->

</html>