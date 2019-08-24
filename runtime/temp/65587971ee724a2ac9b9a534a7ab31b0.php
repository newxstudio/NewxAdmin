<?php /*a:1:{s:65:"D:\wamp64\www\NewxAdmin\application\admin\view\news\newslist.html";i:1566650554;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>新闻列表</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="http://localhost/newxadmin/public/static/layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="http://localhost/newxadmin/public/static/layuiadmin/style/admin.css" media="all">
    <style>
        .layui-table-cell{
            height: auto!important;
        }
        .layui-table img {
            width: 60px;
            height: 60px;
        }
    </style>
</head>
<body>

<div class="layui-fluid">
    <div class="layui-card">
        <div class="layui-form layui-card-header layuiadmin-card-header-auto">
            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">标题</label>
                    <div class="layui-input-block">
                        <input type="text" name="title" placeholder="请输入" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">发送时间</label>
                    <div class="layui-input-block">
                        <select name="time">
                            <option value="">不限</option>
                            <option value="1">一天之内</option>
                            <option value="3">三天之内</option>
                            <option value="7">一周之内</option>
                            <option value="30">一月之内</option>
                        </select>
                    </div>
                </div>
                <div class="layui-inline">
                    <button class="layui-btn layuiadmin-btn-useradmin" lay-submit lay-filter="LAY-user-front-search">
                        <i class="layui-icon layui-icon-search layuiadmin-button-btn"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="layui-card-body">

            <div style="padding-bottom: 10px;">
                <a class="layui-btn layuiadmin-btn-admin" lay-href="<?php echo url('news/addnews'); ?>" lay-text="添加新闻" >添加</a>
            </div>
            <table id="LAY-news-list" lay-filter="LAY-news-list"></table>

            <script type="text/html" id="table-useradmin-webuser">
                <a class="layui-btn layui-btn-normal layui-btn-xs" lay-href="http://localhost/newxadmin/public/index.php/admin/news/editnews?id={{d.id}}" target="_blank"><i
                        class="layui-icon layui-icon-edit"></i>编辑</a>
                <a class="layui-btn layui-btn-danger layui-btn-xs " lay-event="del"><i
                        class="layui-icon layui-icon-delete "></i>删除</a>
            </script>
            <script type="text/html" id="imgTpl">
                <img src="{{d.img}}" alt="">
            </script>


        </div>
    </div>
</div>


<script src="http://localhost/newxadmin/public/static/layuiadmin/layui/layui.js"></script>
<script>
    layui.config({
        base: 'http://localhost/newxadmin/public/static/layuiadmin/' //静态资源所在路径
    }).extend({
        index: 'lib/index' //主入口模块
    }).use(['index', 'news', 'table'], function () {
        var $ = layui.$
            , form = layui.form
            , table = layui.table;

        //监听搜索
        form.on('submit(LAY-user-front-search)', function (data) {
            var field = data.field;
            //执行重载
            table.reload('LAY-news-list', {
                where: field
            });
        });

    });
</script>
</body>
</html>
