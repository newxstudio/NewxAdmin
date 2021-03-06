<?php /*a:1:{s:66:"D:\wamp64\www\NewxAdmin\application\admin\view\auth_rule\role.html";i:1564996364;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>layuiAdmin 角色管理</title>
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
        
        <div class="layui-card-body">
            <div style="padding-bottom: 10px;">

                <button class="layui-btn layuiadmin-btn-role" data-type="add">添加</button>
            </div>

            <table id="LAY-user-back-role" lay-filter="LAY-user-back-role"></table>
            <script type="text/html" id="visibilityTpl">
                {{#  if(d.visibility == 1){ }}
                <button class="layui-btn layui-btn-xs">&nbsp;可&nbsp;&nbsp;见&nbsp;</button>
                {{#  } else { }}
                <button class="layui-btn layui-btn-primary layui-btn-xs">不可见</button>
                {{#  } }}
            </script>


            <script type="text/html" id="table-useradmin-admin">
                <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="edit"><i
                        class="layui-icon layui-icon-edit"></i>编辑</a>
                <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del"><i
                        class="layui-icon layui-icon-delete"></i>删除</a>
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
    }).use(['index', 'useradmin', 'table'], function () {
        var $ = layui.$
            , form = layui.form
            , table = layui.table;


        //事件
        var active = {

            add: function () {
                layer.open({
                    type: 2
                    , title: '添加新角色'
                    , content: '<?php echo url("auth_rule/roleform"); ?>'
                    , area: ['600px', '500px']
                    , btn: ['确定', '取消']
                    , yes: function (index, layero) {
                        var iframeWindow = window['layui-layer-iframe' + index]
                            , submit = layero.find('iframe').contents().find("#LAY-user-role-submit");

                        //监听提交
                        iframeWindow.layui.form.on('submit(LAY-user-role-submit)', function (data) {
                            var field = data.field; //获取提交的字段

                            //提交 Ajax 成功后，静态更新表格中的数据
                            $.ajax({
                                url:'<?php echo url("auth_rule/addroleform"); ?>',
                                method:"POST",
                                data: field,
                                success:function (res) {

                                    table.reload('LAY-user-back-role');
                                    layer.close(index); //关闭弹层
                                }
                            });

                        });

                        submit.trigger('click');
                    }
                });
            }
        }
        $('.layui-btn.layuiadmin-btn-role').on('click', function () {
            var type = $(this).data('type');
            active[type] ? active[type].call(this) : '';
        });
    });
</script>
</body>
</html>

