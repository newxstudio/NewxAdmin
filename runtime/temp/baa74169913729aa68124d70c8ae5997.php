<?php /*a:1:{s:74:"D:\wamp64\www\NewxAdmin\application\admin\view\auth_rule\editroleform.html";i:1564981900;}*/ ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>layuiAdmin 角色管理 iframe 框</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="http://localhost/newxadmin/public/static/layuiadmin/layui/css/layui.css" media="all">
</head>
<body>

  <div class="layui-form" lay-filter="layuiadmin-form-role" id="layuiadmin-form-role" style="padding: 20px 30px 0 0;">

    <div class="layui-form-item">
      <label class="layui-form-label">所属权限</label>
      <div class="layui-input-block">
        <select name="pid"  disabled >
          <option value="0">顶级权限(不可更改)</option>
          <?php if(is_array($authRuleRes) || $authRuleRes instanceof \think\Collection || $authRuleRes instanceof \think\Paginator): $i = 0; $__LIST__ = $authRuleRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$authRule): $mod = ($i % 2 );++$i;?>
          <option <?php if($authRules['pid'] == $authRule['id']): ?> selected="selected" <?php endif; ?>  value="<?php echo htmlentities($authRule['id']); ?>">
          <?php if($authRule['level']!=0){echo '|';} echo str_repeat('—', $authRule['level']*3)?><?php echo htmlentities($authRule['title']); ?>(不可更改)</option>
          <?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">权限名称</label>
      <div class="layui-input-inline">
        <input type="text" name="title" lay-verify="required" placeholder="请输入权限名称" value="<?php echo htmlentities($authRules['title']); ?>" autocomplete="off" class="layui-input">
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">控制器/方法</label>
      <div class="layui-input-inline">
        <input type="text" name="name" lay-verify="required" placeholder="请输入控制器/方法" value="<?php echo htmlentities($authRules['name']); ?>" autocomplete="off" class="layui-input">
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">是否可见</label>
      <div class="layui-input-inline">
        <input type="checkbox" lay-filter="switch" name="visibility" value="1"  <?php if($authRules['visibility'] == 1): ?>checked<?php endif; ?>  lay-skin="switch" lay-text="可见|不可见">
      </div>
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
  })
  </script>
</body>
</html>