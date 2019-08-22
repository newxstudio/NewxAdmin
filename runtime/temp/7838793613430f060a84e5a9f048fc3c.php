<?php /*a:1:{s:76:"D:\wamp64\www\NewxAdmin\application\admin\view\auth_group\editrulegroup.html";i:1564998395;}*/ ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>layuiAdmin 角色管理 iframe 框</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="http://localhost/newxadmin/public/static/layuiadmin/layui/css/layui.css" media="all">
  <style>
    .layui-form-checkbox[lay-skin="primary"]{
      top: 50%;
      transform: translateY(-50%);
    }
  </style>
</head>
<body>

  <div class="layui-form" lay-filter="layuiadmin-form-role" id="layuiadmin-form-role" style="padding: 20px 30px 0 0;">
    <div class="layui-form-item">
      <label class="layui-form-label">用户组名称</label>
      <div class="layui-input-inline">
        <input type="text" name="title" value="<?php echo htmlentities($authgroups['title']); ?>" lay-verify="required" placeholder="请输入用户组名称" autocomplete="off" class="layui-input">
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">启用状态</label>
      <div class="layui-input-inline">
        <input type="checkbox" lay-filter="switch" name="status"  <?php if($authgroups['status'] == 1): ?>checked="checked"<?php endif; ?> value="1" lay-skin="switch" lay-text="启用|禁用">
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">权限配置</label>
      <table class="layui-table" style="margin-left: 30px;">
        <?php if(is_array($authRuleRes) || $authRuleRes instanceof \think\Collection || $authRuleRes instanceof \think\Paginator): $i = 0; $__LIST__ = $authRuleRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$authRule): $mod = ($i % 2 );++$i;?>
        <tr>
          <td>
              <?php echo str_repeat('&nbsp;', $authRule['level']*3);?>
              <input name="rules[]" value="<?php echo htmlentities($authRule['id']); ?>" <?php if($authRule['level'] != 0): ?>
            lay-filter="LAY-user-child" <?php else: ?> lay-filter="LAY-user-parent"  <?php endif; $arr=explode(',', $authgroups['rules']); if(in_array($authRule['id'], $arr)){echo 'checked="checked"';} ?> dataid="id-<?php echo htmlentities($authRule['dataid']); ?>" lay-skin="primary" class="checkbox-parent " type="checkbox">
              <span <?php if($authRule['level'] == 0): ?> style="font-weight:bold; font-size:14px;" <?php endif; ?> class="text"><?php echo htmlentities($authRule['title']); ?></span>
          </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
      </table>
    </div>
    <div class="layui-form-item layui-hide">
      <button class="layui-btn" lay-submit lay-filter="LAY-user-role-submit" id="LAY-user-role-submit">提交</button>
    </div>
  </div>

  <script src="http://localhost/newxadmin/public/static/layuiadmin/layui/layui.js"></script>
  <script>
  layui.config({
    base: 'http://localhost/newxadmin/public/static/layuiadmin/' //静态资源所在路径
  }).extend({
    index: 'lib/index' //主入口模块
  }).use(['index', 'form'], function(){
    var $ = layui.$
    ,form = layui.form ;

    /* 权限配置 */
    $(function() {
      //动态选择框，上下级选中状态变化
      form.on('checkbox(LAY-user-parent)', function(data){
        console.log('parent');
        var dataid = $(this).attr("dataid");
        $('input[dataid^=' + dataid + ']').prop('checked', $(this).is(':checked'));
        form.render('checkbox');
      });
      form.on('checkbox(LAY-user-child)', function(data){
        console.log('child');
        var dataid = $(this).attr("dataid");
        $('input[dataid^=' + dataid + ']').prop('checked', $(this).is(':checked'));
        form.render('checkbox');
        dataid = dataid.substring(0, dataid.lastIndexOf("-"));
        var parent = $('input[dataid=' + dataid + ']');
        if($(this).is(':checked')) {
          parent.prop('checked', true);
          form.render('checkbox');
          //循环到顶级
          while(dataid.lastIndexOf("-") != 2) {
            dataid = dataid.substring(0, dataid.lastIndexOf("-"));
            parent = $('input[dataid=' + dataid + ']');
            parent.prop('checked', true);
            form.render('checkbox');
          }
        } else {
          //父级
          if($('input[dataid^=' + dataid + '-]:checked').length == 0) {
            parent.prop('checked', false);
            form.render('checkbox');
            //循环到顶级
            while(dataid.lastIndexOf("-") != 2) {
              dataid = dataid.substring(0, dataid.lastIndexOf("-"));
              parent = $('input[dataid=' + dataid + ']');
              if($('input[dataid^=' + dataid + '-]:checked').length == 0) {
                parent.prop('checked', false);
                form.render('checkbox');
              }
            }
          }
        }
      });
    });
  })
  </script>
</body>
</html>