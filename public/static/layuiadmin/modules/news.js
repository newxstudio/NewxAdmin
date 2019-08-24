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

  //报名列表
  table.render({
    elem: '#LAY-news-list'
    ,url: 'http://localhost/newxadmin/public/index.php/admin/news/newslistdata'
    ,cols: [[
      {field: 'id', width: 110, title: 'id', sort: true}
      ,{field: 'title', title: '标题'}
      ,{field: 'desca', title: '简介'}
      ,{field: 'img', title: '缩略图', templet: '#imgTpl', align: 'center'}
      ,{field: 'create_time', title: '发送时间',align: 'center', templet : "<div>{{layui.util.toDateString(d.create_time, 'yyyy-MM-dd HH:mm')}}</div>"}
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
  table.on('tool(LAY-news-list)', function(obj){
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
    }else if(obj.event === 'del'){
     layer.confirm('确定删除吗？', function(index) {
       $.ajax({
         url:'http://localhost/newxadmin/public/index.php/admin/news/delnewsdata?id=' + data.id  ,
         method:"GET",
         success:function (res) {
           table.reload('LAY-news-list'); //数据刷新
           layer.msg('已删除');
         }
       });
     });
   }
  });


  exports('news', {})
});