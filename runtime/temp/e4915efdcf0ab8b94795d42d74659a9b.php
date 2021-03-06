<?php /*a:1:{s:63:"D:\wamp64\www\NewxAdmin\application\admin\view\index\index.html";i:1566788238;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>NEWX · 后台管理</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" href="http://localhost/newxadmin/public/static/admin/images/newx.ico"/>
    <link rel="stylesheet" href="http://localhost/newxadmin/public/static/layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="http://localhost/newxadmin/public/static/layuiadmin/style/admin.css" media="all">


</head>
<body class="layui-layout-body">

<div id="LAY_app">
    <div class="layui-layout layui-layout-admin">
        <div class="layui-header">
            <!-- 头部区域 -->
            <ul class="layui-nav layui-layout-left">
                <li class="layui-nav-item layadmin-flexible" lay-unselect>
                    <a href="javascript:;" layadmin-event="flexible" title="侧边伸缩">
                        <i class="layui-icon layui-icon-shrink-right" id="LAY_app_flexible"></i>
                    </a>
                </li>
                <li class="layui-nav-item layui-hide-xs" lay-unselect>
                    <a href="http://localhost/newxadmin/public/index" target="_blank" title="前台">
                        <i class="layui-icon layui-icon-website"></i>
                    </a>
                </li>
                <li class="layui-nav-item" lay-unselect>
                    <a href="javascript:;" layadmin-event="refresh" title="刷新">
                        <i class="layui-icon layui-icon-refresh-3"></i>
                    </a>
                </li>

            </ul>
            <ul class="layui-nav layui-layout-right" lay-filter="layadmin-layout-right">


                <li class="layui-nav-item layui-hide-xs" lay-unselect>
                    <a href="javascript:;" layadmin-event="theme">
                        <i class="layui-icon layui-icon-theme"></i>
                    </a>
                </li>

                <li class="layui-nav-item layui-hide-xs" lay-unselect>
                    <a href="javascript:;" layadmin-event="fullscreen">
                        <i class="layui-icon layui-icon-screen-full"></i>
                    </a>
                </li>
                <li class="layui-nav-item" lay-unselect style="margin-right: 30px;">
                    <a href="javascript:;">
                        <cite><?php echo htmlentities($admin['name']); ?></cite>
                    </a>
                    <dl class="layui-nav-child">
                        <dd><a lay-href="<?php echo url('Set/info'); ?>">基本资料</a></dd>
                        <dd><a lay-href="<?php echo url('Set/password'); ?>">修改密码</a></dd>
                        <hr>
                        <a href="<?php echo url('Login/logout'); ?>" style="text-align: center;">退出</a>
                    </dl>
                </li>



            </ul>
        </div>

        <!-- 侧边菜单 -->
        <div class="layui-side layui-side-menu">
            <div class="layui-side-scroll">
                <div class="layui-logo" style="cursor: pointer">
                    <span>NEWX · 后台管理</span>
                </div>

                <ul class="layui-nav layui-nav-tree" lay-shrink="all" id="LAY-system-side-menu"
                    lay-filter="layadmin-system-side-menu">

                    <?php if(is_array($itemRes) || $itemRes instanceof \think\Collection || $itemRes instanceof \think\Paginator): $i = 0; $__LIST__ = $itemRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <li data-name="app" class="layui-nav-item">
                        <?php if(($vo['level'] == 0 ) and ($vo['visibility'] == 1)): ?>
                        <a href="javascript:;" lay-tips="网站前台" lay-direction="2">
                            <i class="layui-icon <?php switch($vo['id']): case "3": ?>layui-icon-home<?php break; case "7": ?>layui-icon-user<?php break; case "12": ?>layui-icon-app<?php break; ?><?php endswitch; ?>"></i>
                            <cite><?php echo htmlentities($vo['title']); ?></cite>
                        </a>

                        <dl class="layui-nav-child">
                            <?php foreach($itemRes as $k=>$vo1): if(($vo1['pid'] == $vo['id']) and ($vo1['visibility'] == 1)): ?>
                            <dd data-name="list"><a lay-href="<?php echo url($vo1['name']); ?>"><?php echo htmlentities($vo1['title']); ?></a></dd>
                            <?php endif; ?> <?php endforeach; ?>
                        </dl>

                    </li>
                    <?php endif; ?> <?php endforeach; endif; else: echo "" ;endif; ?>

                </ul>
            </div>
        </div>

        <!-- 页面标签 -->
        <div class="layadmin-pagetabs" id="LAY_app_tabs">
            <div class="layui-icon layadmin-tabs-control layui-icon-prev" layadmin-event="leftPage"></div>
            <div class="layui-icon layadmin-tabs-control layui-icon-next" layadmin-event="rightPage"></div>
            <div class="layui-icon layadmin-tabs-control layui-icon-down">
                <ul class="layui-nav layadmin-tabs-select" lay-filter="layadmin-pagetabs-nav">
                    <li class="layui-nav-item" lay-unselect>
                        <a href="javascript:;"></a>
                        <dl class="layui-nav-child layui-anim-fadein">
                            <dd layadmin-event="closeThisTabs"><a href="javascript:;">关闭当前标签页</a></dd>
                            <dd layadmin-event="closeOtherTabs"><a href="javascript:;">关闭其它标签页</a></dd>
                            <dd layadmin-event="closeAllTabs"><a href="javascript:;">关闭全部标签页</a></dd>
                        </dl>
                    </li>
                </ul>
            </div>
            <div class="layui-tab" lay-unauto lay-allowClose="true" lay-filter="layadmin-layout-tabs">
                <ul class="layui-tab-title" id="LAY_app_tabsheader">
                    <li lay-id="home/console.html" lay-attr="<?php echo url('index/show'); ?>" class="layui-this"><i
                            class="layui-icon layui-icon-home"></i></li>
                </ul>
            </div>
        </div>


        <!-- 主体内容 -->
        <div class="layui-body" id="LAY_app_body">
<!--            <div class="layadmin-tabsbody-item layui-show">-->
<!--                <iframe src="<?php echo url('admin/adminlist'); ?>" frameborder="0" class="layadmin-iframe"></iframe>-->
<!--            </div>-->
            <div class="layadmin-tabsbody-item layui-show">
                <iframe src="<?php echo url('index/show'); ?>" frameborder="0" class="layadmin-iframe"></iframe>
            </div>
        </div>

        <!-- 辅助元素，一般用于移动设备下遮罩 -->
        <div class="layadmin-body-shade" layadmin-event="shade"></div>
    </div>
</div>

<script src="http://localhost/newxadmin/public/static/layuiadmin/layui/layui.js"></script>
<script>
    layui.config({
        base: 'http://localhost/newxadmin/public/static/layuiadmin/' //静态资源所在路径
    }).extend({
        index: 'lib/index' //主入口模块
    }).use('index');
</script>

</body>
</html>


