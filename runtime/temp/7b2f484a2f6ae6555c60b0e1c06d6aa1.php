<?php /*a:1:{s:67:"D:\wamp64\www\NewxAdmin\application\admin\view\apply\applylist.html";i:1566365096;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>layuiAdmin 网站用户</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="http://localhost/newxadmin/public/static/layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="http://localhost/newxadmin/public/static/layuiadmin/style/admin.css" media="all">
</head>
<body>

<div class="layui-fluid">
    <div class="layui-card">
        <div class="layui-form layui-card-header layuiadmin-card-header-auto">
            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">姓名</label>
                    <div class="layui-input-block">
                        <input type="text" name="name" placeholder="请输入" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">一志愿</label>
                    <div class="layui-input-block">
                        <select name="option1">
                            <option value="">不限</option>
                            <option value="1">图文部</option>
                            <option value="2">采风部</option>
                            <option value="3">视频部</option>
                            <option value="4">网站部</option>
                            <option value="5">采编部</option>
                            <option value="6">办公室</option>
                        </select>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">二志愿</label>
                    <div class="layui-input-block">
                        <select name="option2">
                            <option value="">不限</option>
                            <option value="1">图文部</option>
                            <option value="2">采风部</option>
                            <option value="3">视频部</option>
                            <option value="4">网站部</option>
                            <option value="5">采编部</option>
                            <option value="6">办公室</option>
                        </select>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">性别</label>
                    <div class="layui-input-block">
                        <select name="sex">
                            <option value="">不限</option>
                            <option value="0">男</option>
                            <option value="1">女</option>
                        </select>
                    </div>
                </div>
                <div class="layui-inline">
                    <label class="layui-form-label">状态</label>
                    <div class="layui-input-block">
                        <select name="status">
                            <option value="">不限</option>
                            <option value="1">进入一面</option>
                            <option value="-1">一面失败</option>
                            <option value="2">进入二面</option>
                            <option value="-2">二面失败</option>
                            <option value="3">进入工作室</option>
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


            <table id="LAY-apply-list" lay-filter="LAY-apply-list"></table>

            <script type="text/html" id="table-useradmin-webuser">
                <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="edit"><i
                        class="layui-icon layui-icon-edit"></i>查看</a>
                <a class="layui-btn layui-btn-danger layui-btn-xs layui-btn-disabled" lay-event="del"><i
                        class="layui-icon layui-icon-delete "></i>删除</a>
            </script>
            <script type="text/html" id="option1Tpl">
                {{#  if(d.option1 == 1){ }}图文部
                {{#  } else if(d.option1 == 2){ }}采风部
                {{#  } else if(d.option1 == 3){ }}视频部
                {{#  } else if(d.option1 == 4){ }}网站部
                {{#  } else if(d.option1 == 5){ }}采编部
                {{#  } else if(d.option1 == 6){ }}办公室
                {{#  } }}
            </script>
            <script type="text/html" id="option2Tpl">
                {{#  if(d.option2 == 1){ }}图文部
                {{#  } else if(d.option2 == 2){ }}采风部
                {{#  } else if(d.option2 == 3){ }}视频部
                {{#  } else if(d.option2 == 4){ }}网站部
                {{#  } else if(d.option2 == 5){ }}采编部
                {{#  } else if(d.option2 == 6){ }}办公室
                {{#  } }}
            </script>
            <script type="text/html" id="allowTpl">
                {{#  if(d.allow_adjust == 1){ }}是
                {{#  } else { }}否
                {{#  } }}
            </script>
            <script type="text/html" id="sexTpl">
                {{#  if(d.sex== 0){ }}男
                {{#  } else { }}女
                {{#  } }}
            </script>
            <script type="text/html" id="addmitTpl">
                {{#  if(d.addmit_department == 0){ }}暂未处理
                {{#  } else if(d.addmit_department == 1){ }}图文部
                {{#  } else if(d.addmit_department == 2){ }}采风部
                {{#  } else if(d.addmit_department == 3){ }}视频部
                {{#  } else if(d.addmit_department == 4){ }}网站部
                {{#  } else if(d.addmit_department == 5){ }}采编部
                {{#  } else if(d.addmit_department == 6){ }}办公室
                {{#  } }}
            </script>
            <script type="text/html" id="statusTpl">
                {{#  if(d.status == 1){ }}进入一面
                {{#  } else if(d.status == -1){ }}一面失败
                {{#  } else if(d.status == 2){ }}进入二面
                {{#  } else if(d.status == -2){ }}二面失败
                {{#  } else if(d.status == 3){ }}进入工作室
                {{#  } }}
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
    }).use(['index', 'apply', 'table'], function () {
        var $ = layui.$
            , form = layui.form
            , table = layui.table;

        //监听搜索
        form.on('submit(LAY-user-front-search)', function (data) {
            var field = data.field;

            //执行重载
            table.reload('LAY-apply-list', {
                where: field
            });
        });

    });
</script>
</body>
</html>
