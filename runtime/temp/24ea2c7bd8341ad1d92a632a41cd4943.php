<?php /*a:1:{s:69:"D:\wamp64\www\NewxAdmin\application\admin\view\apply\emailstatus.html";i:1566480700;}*/ ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>邮件发送状态</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="http://localhost/newxadmin/public/static/layuiadmin/layui/css/layui.css" media="all">
  <link rel="stylesheet" href="http://localhost/newxadmin/public/static/layuiadmin/style/admin.css" media="all">
</head>
<body>

  <div class="layui-fluid">
    <div class="layui-card">
      <div class="layui-card-body" style="padding: 15px;">
        <form class="layui-form" action="" lay-filter="component-form-group">

          <div class="layui-form-item">
            <div class="layui-input-block">
<!--              <textarea name="text" placeholder="请输入内容" class="layui-textarea"></textarea>-->
              <table id="LAY-apply-mail-status" lay-filter="LAY-apply-mail-status"></table>
                <script type="text/html" id="statusTpl">
                    {{#  if(d.status == 1){ }}发送成功
                    {{#  } else { }}发送失败
                    {{#  } }}
                </script>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

    
  <script src="http://localhost/newxadmin/public/static/layuiadmin/layui/layui.js"></script>
  <script>
  layui.config({
    base: 'http://localhost/newxadmin/public/static/layuiadmin/' //静态资源所在路径
  }).extend({
    index: 'lib/index' //主入口模块
  }).use(['index', 'form','table','laydate'], function(){
    var $ = layui.$
    ,admin = layui.admin
    ,element = layui.element
    ,layer = layui.layer
    ,laydate = layui.laydate
    ,form = layui.form,table = layui.table,router = layui.router();
    console.log(router.search.id)
    form.render(null, 'component-form-group');
    //邮件发送状态
    table.render({
      elem: '#LAY-apply-mail-status'
      ,url: 'http://localhost/newxadmin/public/index.php/admin/apply/emailstatusdata?id=' + router.search.id
      ,cols: [[
        {field: 'email', title: '邮件',width:200}
        ,{field: 'status', title: '发送状态', templet: '#statusTpl',width:100}
      ]]
      ,text: {
        none: '暂无相关数据' //默认：无数据。注：该属性为 layui 2.2.5 开始新增
      }
    });

  });
  </script>
</body>
</html>
