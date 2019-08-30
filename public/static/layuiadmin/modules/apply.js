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
  var option_num = "";
  //读取cookie,获取部门编号

  $(function(){
    function getCookie(name) {
      var cookies = document.cookie;
      var list = cookies.split("; ");          // 解析出名/值对列表

      for(var i = 0; i < list.length; i++) {
        var arr = list[i].split("=");          // 解析出名和值
        if(arr[0] == name)
          return decodeURIComponent(arr[1]);   // 对cookie值解码
      }
      return "";
    }

    option_num = getCookie('department');
  });


  //报名列表
  table.render({
    elem: '#LAY-apply-list'
    ,url: 'http://localhost/newxadmin/public/index.php/admin/apply/applylistalldata'
    ,cols: [[
      {field: 'student_id', width: 110, title: '学号', sort: true}
      ,{field: 'name', title: '姓名'}
      ,{field: 'sex', title: '性别', templet: '#sexTpl'}
      ,{field: 'class', title: '班级'}
      ,{field: 'option1', title: '一志愿', templet: '#option1Tpl'}
      ,{field: 'option2', title: '二志愿', templet: '#option2Tpl'}
      ,{field: 'allow_adjust', title: '是否服从调剂', templet: '#allowTpl', align: 'center'}
      ,{field: 'addmit_department', title: '操作部门', templet: '#addmitTpl'}
      ,{field: 'status', title:'状态', templet: '#statusTpl', minWidth: 80, align: 'center'}
      ,{title: '操作', width: 150, align: 'center', fixed: 'right', toolbar: '#table-useradmin-webuser'}
    ]]
    ,page: true
    ,limit: 10
    ,limits: [10,15,20,30,50]
    ,text: {
      none: '暂无相关数据' //默认：无数据。注：该属性为 layui 2.2.5 开始新增
    }
  });
  
  //监听工具条
  table.on('tool(LAY-apply-list)', function(obj){
    var data = obj.data;
   if(obj.event === 'edit'){
      var tr = $(obj.tr);

      layer.open({
        type: 2
        ,title: '查看报名表'
        ,content: 'http://localhost/newxadmin/public/index.php/admin/apply/showapply?id=' + data.id
        ,area: ['720px', '650px']
        ,yes: function(index, layero){
          var iframeWindow = window['layui-layer-iframe'+ index]
          ,submitID = 'LAY-user-back-submit'
          ,submit = layero.find('iframe').contents().find('#'+ submitID);

          //监听提交
          iframeWindow.layui.form.on('submit('+ submitID +')', function(data1){
            var field = data1.field; //获取提交的字段

          });  
          
          submit.trigger('click');
        }
        ,success: function(layero, index){           
          
        }
      })
    }
  });

  //各部门单独报名列表 - 志愿一
  table.render({
    elem: '#LAY-apply-part-list'
    ,url: 'http://localhost/newxadmin/public/index.php/admin/apply/showoptiondata?option_type=1&option_num=' + option_num
    ,cols: [[
      {field: 'student_id', width: 110, title: '学号', sort: true}
      ,{field: 'name', title: '姓名'}
      ,{field: 'sex', title: '性别', templet: '#sexTpl'}
      ,{field: 'class', title: '班级'}
      ,{field: 'option1', title: '一志愿', templet: '#option1Tpl'}
      ,{field: 'option2', title: '二志愿', templet: '#option2Tpl'}
      ,{field: 'allow_adjust', title: '服从调剂', templet: '#allowTpl', align: 'center'}
      ,{field: 'addmit_department', title: '操作部门', templet: '#addmitTpl'}
      ,{field: 'status', title:'状态', templet: '#statusTpl', minWidth: 80, align: 'center'}
      ,{title: '操作', width: 300, align: 'center', fixed: 'right', toolbar: '#table-useradmin-webuser'}
    ]]
    ,toolbar: 'defaultToolbar' //开启工具栏，此处显示默认图标，可以自定义模板，详见文档
    ,defaultToolbar: ['filter']
    ,page: true
    ,limit: 10
    ,limits: [10,15,20,30,50]
    ,text: {
      none: '暂无相关数据' //默认：无数据。注：该属性为 layui 2.2.5 开始新增
    }
  });

  //监听工具条
  table.on('tool(LAY-apply-part-list)', function(obj){
    var data = obj.data;
    if(obj.event === 'statusTo2'){
      $.ajax({
        url:'http://localhost/newxadmin/public/index.php/admin/apply/changeStatus?statusTo=2&id=' + data.id  + '&department=' + option_num,
        method:"GET",
        success:function (res) {
          table.reload('LAY-apply-part-list'); //数据刷新
          layer.close(index); //关闭弹层
        }
      });
    }else if(obj.event === 'statusTo-1'){
      $.ajax({
        url:'http://localhost/newxadmin/public/index.php/admin/apply/changeStatus?statusTo=-1&id=' + data.id  + '&department=' + option_num,
        method:"GET",
        success:function (res) {
          table.reload('LAY-apply-part-list'); //数据刷新
          layer.close(index); //关闭弹层
        }
      });
    }else if(obj.event === 'statusTo-2'){
      $.ajax({
        url:'http://localhost/newxadmin/public/index.php/admin/apply/changeStatus?statusTo=-2&id=' + data.id + '&department=' + option_num,
        method:"GET",
        success:function (res) {
          table.reload('LAY-apply-part-list'); //数据刷新
          layer.close(index); //关闭弹层
        }
      });
    }else if(obj.event === 'statusTo3'){
      $.ajax({
        url:'http://localhost/newxadmin/public/index.php/admin/apply/changeStatus?statusTo=3&id=' + data.id  + '&department=' + option_num,
        method:"GET",
        success:function (res) {
          table.reload('LAY-apply-part-list'); //数据刷新
          layer.close(index); //关闭弹层
        }
      });
    }else if(obj.event === 'statusTo1'){
      $.ajax({
        url:'http://localhost/newxadmin/public/index.php/admin/apply/changeStatus?statusTo=1&id=' + data.id  + '&department=' + option_num,
        method:"GET",
        success:function (res) {
          table.reload('LAY-apply-part-list'); //数据刷新
          layer.close(index); //关闭弹层
        }
      });
    }
  });

  //各部门单独报名列表 - 志愿二
  table.render({
    elem: '#LAY-apply-part-list1'
    ,url: 'http://localhost/newxadmin/public/index.php/admin/apply/showoptiondata?option_type=2&option_num=' + option_num
    ,cols: [[
      {field: 'student_id', width: 110, title: '学号', sort: true}
      ,{field: 'name', title: '姓名'}
      ,{field: 'sex', title: '性别', templet: '#sexTpl'}
      ,{field: 'class', title: '班级'}
      ,{field: 'option1', title: '一志愿', templet: '#option1Tpl'}
      ,{field: 'option2', title: '二志愿', templet: '#option2Tpl'}
      ,{field: 'allow_adjust', title: '服从调剂', templet: '#allowTpl', align: 'center'}
      ,{field: 'addmit_department', title: '操作部门', templet: '#addmitTpl'}
      ,{field: 'status', title:'状态', templet: '#statusTpl', minWidth: 80, align: 'center'}
      ,{title: '操作', width: 300, align: 'center', fixed: 'right', toolbar: '#table-useradmin-webuser1'}
    ]]
    ,toolbar: 'defaultToolbar' //开启工具栏，此处显示默认图标，可以自定义模板，详见文档
    ,defaultToolbar: ['filter']
    ,page: true
    ,limit: 10
    ,limits: [10,15,20,30,50]
    ,text: {
      none: '暂无相关数据' //默认：无数据。注：该属性为 layui 2.2.5 开始新增
    }
  });

  //监听工具条
  table.on('tool(LAY-apply-part-list1)', function(obj){
    var data = obj.data;
    if(obj.event === 'statusTo2'){
      $.ajax({
        url:'http://localhost/newxadmin/public/index.php/admin/apply/changeStatus?statusTo=2&id=' + data.id  + '&department=' + option_num,
        method:"GET",
        success:function (res) {
          table.reload('LAY-apply-part-list1'); //数据刷新
          layer.close(index); //关闭弹层
        }
      });
    }else if(obj.event === 'statusTo-1'){
      $.ajax({
        url:'http://localhost/newxadmin/public/index.php/admin/apply/changeStatus?statusTo=-1&id=' + data.id  + '&department=' + option_num,
        method:"GET",
        success:function (res) {
          table.reload('LAY-apply-part-list1'); //数据刷新
          layer.close(index); //关闭弹层
        }
      });
    }else if(obj.event === 'statusTo-2'){
      $.ajax({
        url:'http://localhost/newxadmin/public/index.php/admin/apply/changeStatus?statusTo=-2&id=' + data.id + '&department=' + option_num,
        method:"GET",
        success:function (res) {
          table.reload('LAY-apply-part-list1'); //数据刷新
          layer.close(index); //关闭弹层
        }
      });
    }else if(obj.event === 'statusTo3'){
      $.ajax({
        url:'http://localhost/newxadmin/public/index.php/admin/apply/changeStatus?statusTo=3&id=' + data.id  + '&department=' + option_num,
        method:"GET",
        success:function (res) {
          table.reload('LAY-apply-part-list1'); //数据刷新
          layer.close(index); //关闭弹层
        }
      });
    }else if(obj.event === 'statusTo1'){
      $.ajax({
        url:'http://localhost/newxadmin/public/index.php/admin/apply/changeStatus?statusTo=1&id=' + data.id  + '&department=' + option_num,
        method:"GET",
        success:function (res) {
          table.reload('LAY-apply-part-list1'); //数据刷新
          layer.close(index); //关闭弹层
        }
      });
    }
  });



  exports('apply', {})
});