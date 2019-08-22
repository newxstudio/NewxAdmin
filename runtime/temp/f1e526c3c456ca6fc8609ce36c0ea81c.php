<?php /*a:1:{s:69:"D:\wamp64\www\NewxAdmin\application\admin\view\apply\manageapply.html";i:1566402156;}*/ ?>
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
        <div class="layui-card-header">一志愿</div>
        <div class="layui-form layui-card-header layuiadmin-card-header-auto">
            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">姓名</label>
                    <div class="layui-input-block">
                        <input type="text" name="name" placeholder="请输入" autocomplete="off" class="layui-input">
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


            <table id="LAY-apply-part-list" lay-filter="LAY-apply-part-list"></table>

            <script type="text/html" id="table-useradmin-webuser">
                {{#  if(d.status == 1){ }}
                <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="statusTo2"><i
                        class="layui-icon layui-icon-ok"
                ></i>进入二面</a>
                <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="statusTo3" style="display: none;"><i
                        class="layui-icon layui-icon-ok"  ></i>进入部门</a>
                <a class="layui-btn layui-btn-danger layui-btn-xs " lay-event="statusTo-1"><i
                        class="layui-icon layui-icon-close "></i>一面失败</a>
                {{#  } else if(d.status == 2) { }}
                <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="statusTo3" ><i
                        class="layui-icon layui-icon-ok"  ></i>进入部门</a>
                <a class="layui-btn layui-btn-danger layui-btn-xs " lay-event="statusTo-2"><i
                        class="layui-icon layui-icon-close "></i>二面失败</a>
                {{#  } }}
                <a class="layui-btn layui-btn-warm layui-btn-xs " lay-event="statusTo1"><i
                        class="layui-icon layui-icon-refresh "></i>重置操作</a>
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

    <div class="layui-card">
        <div class="layui-card-header">二志愿</div>
        <div class="layui-form layui-card-header layuiadmin-card-header-auto">
            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label">姓名</label>
                    <div class="layui-input-block">
                        <input type="text" name="name" placeholder="请输入" autocomplete="off" class="layui-input">
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
                    <button class="layui-btn layuiadmin-btn-useradmin" lay-submit lay-filter="LAY-user-front-search1">
                        <i class="layui-icon layui-icon-search layuiadmin-button-btn"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="layui-card-body">


            <table id="LAY-apply-part-list1" lay-filter="LAY-apply-part-list1"></table>

            <script type="text/html" id="table-useradmin-webuser1">
                {{#  if(d.addmit_department != 0 && d.addmit_department != 4){ }}
                <a class="layui-btn layui-btn-warm layui-btn-xs layui-btn-disabled " ><i
                        class="layui-icon layui-icon-close-fill "></i>无法操作(一志愿已处理)</a>
                {{#  } else { }}

                {{#  if(d.status == 1){ }}
                <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="statusTo2"><i
                        class="layui-icon layui-icon-ok"
                ></i>进入二面</a>
                <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="statusTo3" style="display: none;"><i
                        class="layui-icon layui-icon-ok"  ></i>进入部门</a>
                <a class="layui-btn layui-btn-danger layui-btn-xs " lay-event="statusTo-1"><i
                        class="layui-icon layui-icon-close "></i>一面失败</a>
                {{#  } else if(d.status == 2) { }}
                <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="statusTo3" ><i
                        class="layui-icon layui-icon-ok"  ></i>进入部门</a>
                <a class="layui-btn layui-btn-danger layui-btn-xs " lay-event="statusTo-2"><i
                        class="layui-icon layui-icon-close "></i>二面失败</a>
                {{#  } }}
                <a class="layui-btn layui-btn-warm layui-btn-xs " lay-event="statusTo1"><i
                        class="layui-icon layui-icon-refresh "></i>重置操作</a>
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
            table.reload('LAY-apply-part-list', {
                where: field
            });
        });
        //监听搜索
        form.on('submit(LAY-user-front-search1)', function (data) {
            var field = data.field;

            //执行重载
            table.reload('LAY-apply-part-list1', {
                where: field
            });
        });

    });
</script>
</body>
</html>
