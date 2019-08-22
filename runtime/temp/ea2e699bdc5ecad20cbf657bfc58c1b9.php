<?php /*a:1:{s:67:"D:\wamp64\www\NewxAdmin\application\admin\view\admin\adminlist.html";i:1566043182;}*/ ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>layuiAdmin 后台管理员</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="http://localhost/newxadmin/public/static/layuiadmin/layui/css/layui.css" media="all">
  <link rel="stylesheet" href="http://localhost/newxadmin/public/static/layuiadmin/style/admin.css" media="all">
</head>
<body>

  <div class="layui-fluid">   
    <div class="layui-card">
      <div class="layui-card-body">
        <div style="padding-bottom: 10px;">
          <button class="layui-btn layuiadmin-btn-admin" data-type="add">添加</button>
        </div>
        
        <table id="LAY-user-back-manage" lay-filter="LAY-user-back-manage"></table>
        <script type="text/html" id="departmentTpl">
          {{#  if(d.department == 0){ }}
          全部
          {{#  } else if(d.department == 1){ }}
          图文部
          {{#  } else if(d.department == 2){ }}
          采风部
          {{#  } else if(d.department == 3){ }}
          视频部
          {{#  } else if(d.department == 4){ }}
          网站部
          {{#  } else if(d.department == 5){ }}
          采编部
          {{#  } else if(d.department == 6){ }}
          办公室
          {{#  } }}
        </script>
        <script type="text/html" id="buttonTpl">
          {{#  if(d.status == 1){ }}
            <button class="layui-btn layui-btn-xs">启用</button>
          {{#  } else { }}
            <button class="layui-btn layui-btn-primary layui-btn-xs">禁用</button>
          {{#  } }}
        </script>
        <script type="text/html" id="table-useradmin-admin">
          <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="edit"><i class="layui-icon layui-icon-edit"></i>编辑</a>
          {{#  if(d.role == '超级管理员'){ }}
            <a class="layui-btn layui-btn-disabled layui-btn-xs"><i class="layui-icon layui-icon-delete"></i>删除</a>
          {{#  } else { }}
            <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del"><i class="layui-icon layui-icon-delete"></i>删除</a>
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
  }).use(['index', 'useradmin', 'table'], function(){
    var $ = layui.$
    ,form = layui.form
    ,table = layui.table;
    
    //监听搜索
    form.on('submit(LAY-user-back-search)', function(data){
      var field = data.field;
      
      //执行重载
      table.reload('LAY-user-back-manage', {
        where: field
      });
    });
  
    //事件
    var active = {

      add: function(){
        layer.open({
          type: 2
          ,title: '添加管理员'
          ,content: '<?php echo url("admin/adminform"); ?>'
          ,area: ['420px', '550px']
          ,btn: ['确定', '取消']
          ,yes: function(index, layero){
            var iframeWindow = window['layui-layer-iframe'+ index]
            ,submitID = 'LAY-user-back-submit'
            ,submit = layero.find('iframe').contents().find('#'+ submitID);

            //监听提交
            iframeWindow.layui.form.on('submit('+ submitID +')', function(data){
              var field = data.field; //获取提交的字段
              console.log(field)
              //提交 Ajax 成功后，静态更新表格中的数据
              $.ajax({
                url:'http://localhost/newxadmin/public/index.php/admin/admin/addadmin',
                method:"POST",
                data: field,
                success:function (res) {
                  table.reload('LAY-user-back-manage'); //数据刷新
                  layer.close(index); //关闭弹层
                }
              });

            });  
            
            submit.trigger('click');
          }
        }); 
      }
    }  
    $('.layui-btn.layuiadmin-btn-admin').on('click', function(){
      var type = $(this).data('type');
      active[type] ? active[type].call(this) : '';
    });
  });
  </script>
</body>
</html>

