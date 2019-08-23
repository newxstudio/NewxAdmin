<?php /*a:1:{s:62:"D:\wamp64\www\NewxAdmin\application\admin\view\apply\mail.html";i:1566485550;}*/ ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>发送邮箱</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="http://localhost/newxadmin/public/static/layuiadmin/layui/css/layui.css" media="all">
  <link rel="stylesheet" href="http://localhost/newxadmin/public/static/layuiadmin/style/admin.css" media="all">
</head>
<body>

  <div class="layui-fluid">
    <div class="layui-card">
      <div class="layui-card-header">发送邮件</div>
      <div class="layui-card-body" style="padding: 15px;">
        <form class="layui-form" action="" lay-filter="component-form-group">
          <div class="layui-form-item" >
            <label class="layui-form-label">状态筛选</label>
            <div class="layui-input-block">
              <select name="status"  lay-verify="required" lay-filter="component-form-select">
                <option value=""></option>
                <option value="1">进入一面</option>
                <option value="-1">一面失败</option>
                <option value="2">进入二面</option>
                <option value="-2">二面失败</option>
                <option value="3">进入工作室</option>
              </select>
            </div>
          </div>

          <div class="layui-form-item">
            <label class="layui-form-label">所选人员</label>
            <div class="layui-input-block">
<!--              <textarea name="text" placeholder="请输入内容" class="layui-textarea"></textarea>-->
              <table id="LAY-apply-mail-list" lay-filter="LAY-apply-mail-list"></table>
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
              <script type="text/html" id="sexTpl">
                {{#  if(d.sex == 0){ }}男
                {{#  } else { }}女
                {{#  } }}
              </script>
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">邮件主题</label>
            <div class="layui-input-block">
              <input type="text" name="subject" lay-verify="required" placeholder="请输入邮件主题(格式如:NEWX[网站部]一面通知)" autocomplete="off" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">邮件内容</label>
            <div class="layui-input-block">
              <textarea name="text" placeholder="请输入邮件内容" lay-verify="required"class="layui-textarea"></textarea>
            </div>
          </div>
          <div class="layui-form-item layui-layout-admin">
            <div class="layui-input-block">
              <div class="layui-footer" style="left: 0;">
                <button class="layui-btn" lay-submit="" lay-filter="component-form-demo1">立即发送</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
              </div>
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
  }).use(['index', 'form','table', 'laydate'], function(){
    var $ = layui.$
    ,admin = layui.admin
    ,element = layui.element
    ,layer = layui.layer
    ,laydate = layui.laydate
    ,form = layui.form,table = layui.table;
    
    form.render(null, 'component-form-group');
    
    /* 自定义验证规则 */
    form.verify({
      title: function(value){
        if(value.length < 5){
          return '标题至少得5个字符啊';
        }
      }
      ,pass: [/(.+){6,12}$/, '密码必须6到12位']
      ,content: function(value){
        layedit.sync(editIndex);
      }
    });

    var status = "";
    //监听下拉框
    form.on('select(component-form-select)', function(data){
      status = data.value
      table.reload('LAY-apply-mail-list',{
        url: 'http://localhost/newxadmin/public/index.php/admin/apply/showmail?option_num=' + 4 + '&status=' + status
      }); //数据刷新
    });
    //邮件发送
    table.render({
      elem: '#LAY-apply-mail-list'
      ,url: 'http://localhost/newxadmin/public/index.php/admin/apply/showmail?option_num=' + 4 + '&status=' + status
      ,cols: [[
        {field: 'name', title: '姓名',width:100}
        ,{field: 'student_id', width: 130, title: '学号', sort: true}
        ,{field: 'sex', title: '性别', templet: '#sexTpl',width:100}
        ,{field: 'option1', title: '一志愿', templet: '#option1Tpl',width:100}
        ,{field: 'option2', title: '二志愿', templet: '#option2Tpl',width:100}
        ,{field: 'email', title: '邮箱',align:'center'}
      ]]
      ,text: {
        none: '尚未选择或暂无相关数据' //默认：无数据。注：该属性为 layui 2.2.5 开始新增
      }
    });


    /* 监听提交 */
    form.on('submit(component-form-demo1)', function(data){
      // parent.layer.alert(JSON.stringify(data.field), {
      //   title: '最终的提交信息'
      // })

      var index1 = layer.load(1);
      $.ajax({
        url:'http://localhost/newxadmin/public/index.php/admin/apply/sendmail',
        method:"POST",
        data: {
          'subject':data.field.subject,
          'status':data.field.status,
          'text':data.field.text,
          'option_num':4
        },
        success:function (res) {
          layer.close(index1)
            console.log(res)
          layer.open({
            type: 2
            ,title: '邮件发送状态'
            ,content: 'http://localhost/newxadmin/public/index.php/admin/apply/emailstatus/#/id=' + res.data
            ,area: ['600px', '400px']
            ,yes: function(index, layero){
              var iframeWindow = window['layui-layer-iframe'+ index]
                      ,submitID = 'LAY-user-back-submit'
                      ,submit = layero.find('iframe').contents().find('#'+ submitID);

            }
            ,success: function(layero, index){
            }
          })
        }
      });
      return false;
    });
  });
  </script>
</body>
</html>
