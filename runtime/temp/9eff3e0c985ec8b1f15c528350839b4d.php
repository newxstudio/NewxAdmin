<?php /*a:1:{s:49:"D:\wamp64\www\NEWX\thinkphp\tpl/dispatch_jump.tpl";i:1551431783;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <title>跳转提示</title>
    <link rel="stylesheet" href="http://localhost/newx/public/static/layui/css/layui.css">
</head>
<body>
    <div class="system-message">
        <?php switch ($code) {case 1:?>
            <h1>:)</h1>
            <p class="success"><?php echo(strip_tags($msg));?></p>
            <?php break;case 0:?>
            <h1>:(</h1>
            <p class="error"><?php echo(strip_tags($msg));?></p>
            <?php break;} ?>
        <p class="detail"></p>
        <p class="jump">
            页面自动 <a id="href" href="<?php echo($url);?>">跳转</a> 等待时间： <b id="wait"><?php echo($wait);?></b>
        </p>
    </div>
    <script src="http://localhost/newx/public/static/layui/layui.js"></script>
    <script type="text/javascript">
    	
        (function(){
            var msg=$('#msg').val();
            var url1=$('#url').val();
            var wait=$('#wait').val();

            layer.open({
                content:msg,//提示信息
                anim:Math.floor(Math.random()*8),//0-7的随机动画效果
                success:function(layero,index){
                    var interval = setInterval(function(){
                        var time = --wait;
                        if(time <= 0) {
                            location.href = url1;
                            clearInterval(interval);
                        };
                    }, 1000);
                }
            })

        })();
    </script>
</body>
</html>
