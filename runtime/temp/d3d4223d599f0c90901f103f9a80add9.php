<?php /*a:1:{s:71:"D:\wamp64\www\NewxAdmin\application\admin\view\admin\editadminform.html";i:1566044461;}*/ ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>layuiAdmin 管理员 iframe 框</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <link rel="stylesheet" href="http://localhost/newxadmin/public/static/layuiadmin/layui/css/layui.css" media="all">
</head>
<body>

  <div class="layui-form" lay-filter="layuiadmin-form-admin" id="layuiadmin-form-admin" style="padding: 20px 30px 0 0;">
    <div class="layui-form-item">
      <label class="layui-form-label">登录名</label>
      <div class="layui-input-inline">
        <input type="text" name="username" value="<?php echo htmlentities($admins['username']); ?>" disabled lay-verify="required" placeholder="请输入用户名" autocomplete="off" class="layui-input">
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">用户组</label>
      <div class="layui-input-inline">
        <select name="group_id">
          <?php if(is_array($authGroupRes) || $authGroupRes instanceof \think\Collection || $authGroupRes instanceof \think\Paginator): $i = 0; $__LIST__ = $authGroupRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$authGroupRes): $mod = ($i % 2 );++$i;?>
          <option <?php if($authGroupRes['id'] == $groupId): ?>selected="selected" <?php endif; ?> value="<?php echo htmlentities($authGroupRes['id']); ?>"><?php echo htmlentities($authGroupRes['title']); ?></option>
          <?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">所属部门</label>
      <div class="layui-input-inline">
        <select name="department">
          <option value="0" <?php if($admins['department'] == 0): ?>selected="selected" <?php endif; ?>>全部</option>
          <option value="1" <?php if($admins['department'] == 1): ?>selected="selected" <?php endif; ?>>图文部</option>
          <option value="2" <?php if($admins['department'] == 2): ?>selected="selected" <?php endif; ?>>采风部</option>
          <option value="3" <?php if($admins['department'] == 3): ?>selected="selected" <?php endif; ?>>视频部</option>
          <option value="4" <?php if($admins['department'] == 4): ?>selected="selected" <?php endif; ?>>网站部</option>
          <option value="5" <?php if($admins['department'] == 5): ?>selected="selected" <?php endif; ?>>采编部</option>
          <option value="6" <?php if($admins['department'] == 6): ?>selected="selected" <?php endif; ?>>办公室</option>
        </select>
      </div>
    </div>


    <div class="layui-form-item">
      <label class="layui-form-label">昵称</label>
      <div class="layui-input-inline">
        <input type="text" name="name" value="<?php echo htmlentities($admins['name']); ?>" lay-verify="required" placeholder="请输入昵称" autocomplete="off" class="layui-input">
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">邮箱</label>
      <div class="layui-input-inline">
        <input type="text" name="email"value="<?php echo htmlentities($admins['email']); ?>"  lay-verify="email" placeholder="请输入邮箱" autocomplete="off" class="layui-input">
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">描述</label>
      <div class="layui-input-inline">
        <input type="text" name="desca" value="<?php echo htmlentities($admins['desca']); ?>"  lay-verify="required" placeholder="请输入描述信息" autocomplete="off" class="layui-input">
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">状态</label>
      <div class="layui-input-inline">
        <input type="checkbox" lay-filter="switch" <?php if($admins['status'] == 1): ?>checked="checked"<?php endif; ?> name="status" value="1" lay-skin="switch" lay-text="启用|禁用">
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">密码</label>
      <div class="layui-input-inline">
        <input type="text" name="password"  placeholder="留空表示不修改当前密码" autocomplete="off" class="layui-input">
      </div>
    </div>
    <div class="layui-form-item layui-hide">
      <input type="button" lay-submit lay-filter="LAY-user-back-submit" id="LAY-user-back-submit" value="确认">
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