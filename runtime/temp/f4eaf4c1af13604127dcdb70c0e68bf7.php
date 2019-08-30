<?php /*a:1:{s:62:"D:\wamp64\www\NewxAdmin\application\admin\view\index\show.html";i:1566736377;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>layuiAdmin 后台管理员</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="http://localhost/newxadmin/public/static/layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="http://localhost/newxadmin/public/static/layuiadmin/style/admin.css" media="all">
</head>
<body>

<div class="layui-fluid">

    <div style="text-align:center; line-height:750%; font-size:24px;">
        NEWX · 大学生网络文化工作室<br>
        <p style="color:#aaa;">后台管理系统</p>
    </div>
</div>

<script src="http://localhost/newxadmin/public/static/layuiadmin/layui/layui.js"></script>
<script>
    layui.config({
        base: 'http://localhost/newxadmin/public/static/layuiadmin/' //静态资源所在路径
    }).extend({
        index: 'lib/index' //主入口模块
    }).use(['index', 'useradmin', 'table'], function () {
        var $ = layui.$
            , form = layui.form
            , table = layui.table;

    });
</script>
</body>
</html>

