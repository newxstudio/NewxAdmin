/**

 @Name：layuiAdmin 用户管理 管理员管理 角色管理
 @Author：star1029
 @Site：http://www.layui.com/admin/
 @License：LPPL
    
 */


layui.define(['table', 'form'], function(exports){
  var $ = layui.$
  ,table = layui.table
  ,form = layui.form;

  //用户管理
  table.render({
    elem: '#LAY-user-manage'
    ,url: layui.setter.base + 'json/useradmin/webuser.js' //模拟接口
    ,cols: [[
      {type: 'checkbox', fixed: 'left'}
      ,{field: 'id', width: 100, title: 'ID', sort: true}
      ,{field: 'username', title: '用户名', minWidth: 100}
      ,{field: 'avatar', title: '头像', width: 100, templet: '#imgTpl'}
      ,{field: 'phone', title: '手机'}
      ,{field: 'email', title: '邮箱'}
      ,{field: 'sex', width: 80, title: '性别'}
      ,{field: 'ip', title: 'IP'}
      ,{field: 'jointime', title: '加入时间', sort: true}
      ,{title: '操作', width: 150, align:'center', fixed: 'right', toolbar: '#table-useradmin-webuser'}
    ]]
    ,page: true
    ,limit: 30
    ,height: 'full-220'
    ,text: '对不起，加载出现异常！'
  });
  
  //监听工具条
  table.on('tool(LAY-user-manage)', function(obj){
    var data = obj.data;
    if(obj.event === 'del'){
      layer.prompt({
        formType: 1
        ,title: '敏感操作，请验证口令'
      }, function(value, index){
        layer.close(index);
        
        layer.confirm('真的删除行么', function(index){
          obj.del();
          layer.close(index);
        });
      });
    } else if(obj.event === 'edit'){
      var tr = $(obj.tr);

      layer.open({
        type: 2
        ,title: '编辑用户'
        ,content: '../../../views/user/user/userform.html'
        ,maxmin: true
        ,area: ['500px', '450px']
        ,btn: ['确定', '取消']
        ,yes: function(index, layero){
          var iframeWindow = window['layui-layer-iframe'+ index]
          ,submitID = 'LAY-user-front-submit'
          ,submit = layero.find('iframe').contents().find('#'+ submitID);

          //监听提交
          iframeWindow.layui.form.on('submit('+ submitID +')', function(data){
            var field = data.field; //获取提交的字段
            
            //提交 Ajax 成功后，静态更新表格中的数据
            //$.ajax({});
            table.reload('LAY-user-front-submit'); //数据刷新
            layer.close(index); //关闭弹层
          });  
          
          submit.trigger('click');
        }
        ,success: function(layero, index){
          
        }
      });
    }
  });

  //管理员管理
  table.render({
    elem: '#LAY-user-back-manage'
    ,url: 'http://localhost/newxadmin/public/index.php/admin/admin/getadmindata'
    ,cols: [[
      {field: 'id', width: 80, title: 'ID', sort: true}
      ,{field: 'username', title: '登录名'}
      ,{field: 'name', title: '昵称'}
      ,{field: 'email', title: '邮箱'}
      ,{field: 'groupTitle', title: '所属用户组'}
      ,{field: 'department', title: '所属部门', templet: '#departmentTpl'}
      ,{field: 'create_time', title: '创建时间', sort: true,templet : "<div>{{layui.util.toDateString(d.create_time, 'yyyy-MM-dd HH:mm')}}</div>"}
      ,{field: 'status', title:'状态', templet: '#buttonTpl', minWidth: 80, align: 'center'}
      ,{title: '操作', width: 150, align: 'center', fixed: 'right', toolbar: '#table-useradmin-admin'}
    ]]
    ,text: '对不起，加载出现异常！'
  });
  
  //监听工具条
  table.on('tool(LAY-user-back-manage)', function(obj){
    var data = obj.data;
    if(obj.event === 'del'){

      layer.confirm('确定删除此管理员？', function(index){
        $.ajax({
          url:'http://localhost/newxadmin/public/index.php/admin/admin/del?id=' + data.id,
          method:"GET",
          success:function (res) {
            console.log(res);
            table.reload('LAY-user-back-manage'); //数据刷新
            layer.close(index); //关闭弹层
          }
        });
      });
    }else if(obj.event === 'edit'){
      var tr = $(obj.tr);

      layer.open({
        type: 2
        ,title: '编辑管理员'
        ,content: 'http://localhost/newxadmin/public/index.php/admin/admin/editadminform?id=' + data.id
        ,area: ['420px', '550px']
        ,btn: ['确定', '取消']
        ,yes: function(index, layero){
          var iframeWindow = window['layui-layer-iframe'+ index]
          ,submitID = 'LAY-user-back-submit'
          ,submit = layero.find('iframe').contents().find('#'+ submitID);

          //监听提交
          iframeWindow.layui.form.on('submit('+ submitID +')', function(data1){
            var field = data1.field; //获取提交的字段
            
            //提交 Ajax 成功后，静态更新表格中的数据
            $.ajax({
              url:'http://localhost/newxadmin/public/index.php/admin/admin/editadmindata?id=' + data.id,
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
        ,success: function(layero, index){           
          
        }
      })
    }
  });

  //权限管理
  table.render({
    elem: '#LAY-user-back-role'
    ,url: 'http://localhost/newxadmin/public/index.php/admin/auth_rule/getRuleData'
    ,cols: [[
      {field: 'id', width: 80, title: 'ID'}
      ,{field: 'title', title: '权限描述',templet : function (d) {
          var str = '';for(var i = 0; i < d.level; i++){str += '----';}
          return   str + d.title
        }}
      ,{field: 'name', title: '控制器/方法'}
      ,{field: 'level', title: '级别'}
      ,{field: 'visibility', title: '可见性', templet: '#visibilityTpl',width: 150}
      ,{title: '操作', width: 150, align: 'center', fixed: 'right', toolbar: '#table-useradmin-admin'}
    ]]
    ,text: '对不起，加载出现异常！'
  });

  //监听工具条
  table.on('tool(LAY-user-back-role)', function(obj){
    var data = obj.data;
    if(obj.event === 'del'){
      layer.confirm('确定删除此权限？', function(index){
        $.ajax({
          url:'http://localhost/newxadmin/public/index.php/admin/auth_rule/del?id=' + data.id,
          method:"GET",
          success:function (res) {
            table.reload('LAY-user-back-role'); //数据刷新
            layer.close(index); //关闭弹层
          }
        });
        layer.close(index);
      });
    }else if(obj.event === 'edit'){
      var tr = $(obj.tr);

      layer.open({
        type: 2
        ,title: '编辑权限'
        ,content: 'http://localhost/newxadmin/public/index.php/admin/auth_rule/editroleform?id=' + data.id
        ,area: ['500px', '480px']
        ,btn: ['确定', '取消']
        ,yes: function(index, layero){
          var iframeWindow = window['layui-layer-iframe'+ index]
              ,submit = layero.find('iframe').contents().find("#LAY-user-role-submit");

          //监听提交
          iframeWindow.layui.form.on('submit(LAY-user-role-submit)', function(data1){
            var field = data1.field; //获取提交的字段

            //提交 Ajax 成功后，静态更新表格中的数据
            $.ajax({
              url:'http://localhost/newxadmin/public/index.php/admin/auth_rule/editroleformdata?id=' + data.id,
              method:"POST",
              data: field,
              success:function (res) {
                table.reload('LAY-user-back-role'); //数据刷新
                layer.close(index); //关闭弹层
              }
            });

          });

          submit.trigger('click');
        }
        ,success: function(layero, index){

        }
      })
    }
  });


  //用户组管理
  table.render({
    elem: '#LAY-user-back-group'
    ,url: 'http://localhost/newxadmin/public/index.php/admin/auth_group/rulegroupdata'
    ,cols: [[
      {field: 'id', width: 80, title: 'ID'}
      ,{field: 'title', title: '用户组名称', align: 'center'}
      ,{field: 'status', title: '状态', templet: '#statusTpl',width: 150}
      ,{title: '操作', width: 150, align: 'center', fixed: 'right', toolbar: '#table-useradmin-admin'}
    ]]
    ,text: '对不起，加载出现异常！'
  });

  //监听工具条
  table.on('tool(LAY-user-back-group)', function(obj){
    var data = obj.data;
    if(obj.event === 'del'){
      layer.confirm('确定删除此权限？', function(index){
        $.ajax({
          url:'http://localhost/newxadmin/public/index.php/admin/auth_group/del?id=' + data.id,
          method:"GET",
          success:function (res) {
            table.reload('LAY-user-back-group'); //数据刷新
            layer.close(index); //关闭弹层
          }
        });
        layer.close(index);
      });
    }else if(obj.event === 'edit'){
      var tr = $(obj.tr);

      layer.open({
        type: 2
        ,title: '编辑权限'
        ,content: 'http://localhost/newxadmin/public/index.php/admin/auth_group/editrulegroup?id=' + data.id
        ,area: ['600px', '550px']
        ,btn: ['确定', '取消']
        ,yes: function(index, layero){
          var iframeWindow = window['layui-layer-iframe'+ index]
              ,submit = layero.find('iframe').contents().find("#LAY-user-role-submit");
          //监听提交
          iframeWindow.layui.form.on('submit(LAY-user-role-submit)', function(data1){
            var field = data1.field; //获取提交的字段

            //提交 Ajax 成功后，静态更新表格中的数据
            $.ajax({
              url:'http://localhost/newxadmin/public/index.php/admin/auth_group/editrulegroupdata?id=' + data.id,
              method:"POST",
              data: field,
              success:function (res) {
                table.reload('LAY-user-back-group'); //数据刷新
                layer.close(index); //关闭弹层
              }
            });

          });

          submit.trigger('click');
        }
        ,success: function(layero, index){

        }
      })
    }
  });

  exports('useradmin', {})
});