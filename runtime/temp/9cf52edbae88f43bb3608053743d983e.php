<?php /*a:1:{s:58:"D:\wamp64\www\NEWX\application\admin\view\login\login.html";i:1551065318;}*/ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"><!--Head--><head>
    <meta charset="utf-8">
    <title>童老师ThinkPHP交流群：484519446</title>
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
</head>
<!--Head Ends-->
<!--Body-->

<body>
    <div class="login-container animated fadeInDown">
        <form action="" method="post">
            <div class="loginbox bg-white">
                <div class="loginbox-title">SIGN IN</div>
                <div class="loginbox-textbox">
                    <input value="admin" class="form-control" placeholder="username" name="username" type="text">
                </div>
                <div class="loginbox-textbox">
                    <input class="form-control" placeholder="password" name="password" type="password">
                </div>
                <div class="loginbox-textbox">
                    <input class="form-control" placeholder="code" name="code" type="text" style="width: 80px; float: left;">
                    <img src="<?php echo captcha_src(); ?>" alt="captcha" onclick="this.src=this.src+'?'" style="float: left;cursor: pointer;"/>
                </div>
                <div class="loginbox-submit">
                    <input class="btn btn-primary btn-block" value="Login" type="submit">
                </div>
            </div>
                <div class="logobox">
                    <p class="text-center">童老师ThinkPHP交流群：4845194464</p>
                </div>
        </form>
    </div>
    <!--Basic Scripts-->
    <script src="http://localhost/newx/public/static/admin/style/jquery.js"></script>
    <script src="http://localhost/newx/public/static/admin/style/bootstrap.js"></script>
    <script src="http://localhost/newx/public/static/admin/style/jquery_002.js"></script>
    <!--Beyond Scripts-->
    <script src="http://localhost/newx/public/static/admin/style/beyond.js"></script>




</body><!--Body Ends--></html>