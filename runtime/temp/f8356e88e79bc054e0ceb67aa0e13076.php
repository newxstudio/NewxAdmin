<?php /*a:1:{s:64:"D:\wamp64\www\NewxAdmin\application\admin\view\news\addnews.html";i:1566576196;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>添加新闻</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="http://localhost/newxadmin/public/static/layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="http://localhost/newxadmin/public/static/layuiadmin/style/admin.css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://localhost/newxadmin/public/static/froala_editor/css/froala_editor.css">
    <link rel="stylesheet" href="http://localhost/newxadmin/public/static/froala_editor/css/froala_style.css">
    <link rel="stylesheet" href="http://localhost/newxadmin/public/static/froala_editor/css/plugins/code_view.css">
    <link rel="stylesheet" href="http://localhost/newxadmin/public/static/froala_editor/css/plugins/colors.css">
    <link rel="stylesheet" href="http://localhost/newxadmin/public/static/froala_editor/css/plugins/emoticons.css">
    <link rel="stylesheet" href="http://localhost/newxadmin/public/static/froala_editor/css/plugins/image_manager.css">
    <link rel="stylesheet" href="http://localhost/newxadmin/public/static/froala_editor/css/plugins/image.css">
    <link rel="stylesheet" href="http://localhost/newxadmin/public/static/froala_editor/css/plugins/line_breaker.css">
    <link rel="stylesheet" href="http://localhost/newxadmin/public/static/froala_editor/css/plugins/table.css">
    <link rel="stylesheet" href="http://localhost/newxadmin/public/static/froala_editor/css/plugins/char_counter.css">
    <link rel="stylesheet" href="http://localhost/newxadmin/public/static/froala_editor/css/plugins/video.css">
    <link rel="stylesheet" href="http://localhost/newxadmin/public/static/froala_editor/css/plugins/fullscreen.css">
    <link rel="stylesheet" href="http://localhost/newxadmin/public/static/froala_editor/css/plugins/file.css">
    <link rel="stylesheet" href="http://localhost/newxadmin/public/static/froala_editor/css/plugins/quick_insert.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
</head>
<body>

<div class="layui-fluid">
    <div class="layui-card">
        <div class="layui-card-header">添加新闻</div>
        <div class="layui-card-body" style="padding: 15px;">
            <form class="layui-form" action="" lay-filter="component-form-group">

                <div class="layui-form-item">
                    <label class="layui-form-label">标题</label>
                    <div class="layui-input-block">
                        <input type="text" name="title" lay-verify="required" placeholder="请输入标题" autocomplete="off"
                               class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">简介</label>
                    <div class="layui-input-block">
                        <textarea name="desca" placeholder="请输入简介" lay-verify="required"class="layui-textarea"></textarea>
                    </div>
                </div>

                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">缩略图</label>
                    <div class="layui-input-block">
                        <button type="button" class="layui-btn layui-btn-normal layui-input-inline " id="pic">添加图片</button>
                        <div class="layui-form-mid layui-word-aux  " style="float: right;">头像的尺寸限定150x150px,大小在50kb以内</div>
                        <div >
                            <img src="" id="img_show">
                        </div>
                    </div>
                </div>

                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">编辑文章</label>
                    <div class="layui-input-block">
                        <div id="test-editormd">
                            <textarea id="editor"></textarea>
                            <input type="hidden" id="editorText" value=""  name="text"/>
                        </div>
                    </div>
                </div>
                <div class="layui-form-item layui-layout-admin">
                    <div class="layui-input-block">
                        <div class="layui-footer" style="left: 0;">
                            <button class="layui-btn" lay-submit="" lay-filter="component-form-demo1">提交</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>

<!-- Include Editor JS files. -->
<script type="text/javascript" src="http://localhost/newxadmin/public/static/froala_editor/js/froala_editor.min.js"></script>
<script type="text/javascript" src="http://localhost/newxadmin/public/static/froala_editor/js/plugins/align.min.js"></script>
<script type="text/javascript" src="http://localhost/newxadmin/public/static/froala_editor/js/plugins/char_counter.min.js"></script>
<script type="text/javascript" src="http://localhost/newxadmin/public/static/froala_editor/js/plugins/code_beautifier.min.js"></script>
<script type="text/javascript" src="http://localhost/newxadmin/public/static/froala_editor/js/plugins/code_view.min.js"></script>
<script type="text/javascript" src="http://localhost/newxadmin/public/static/froala_editor/js/plugins/colors.min.js"></script>
<script type="text/javascript" src="http://localhost/newxadmin/public/static/froala_editor/js/plugins/draggable.min.js"></script>
<script type="text/javascript" src="http://localhost/newxadmin/public/static/froala_editor/js/plugins/emoticons.min.js"></script>
<script type="text/javascript" src="http://localhost/newxadmin/public/static/froala_editor/js/plugins/entities.min.js"></script>
<script type="text/javascript" src="http://localhost/newxadmin/public/static/froala_editor/js/plugins/file.min.js"></script>
<script type="text/javascript" src="http://localhost/newxadmin/public/static/froala_editor/js/plugins/font_size.min.js"></script>
<script type="text/javascript" src="http://localhost/newxadmin/public/static/froala_editor/js/plugins/font_family.min.js"></script>
<script type="text/javascript" src="http://localhost/newxadmin/public/static/froala_editor/js/plugins/fullscreen.min.js"></script>
<script type="text/javascript" src="http://localhost/newxadmin/public/static/froala_editor/js/plugins/image.min.js"></script>
<script type="text/javascript" src="http://localhost/newxadmin/public/static/froala_editor/js/plugins/image_manager.min.js"></script>
<script type="text/javascript" src="http://localhost/newxadmin/public/static/froala_editor/js/plugins/line_breaker.min.js"></script>
<script type="text/javascript" src="http://localhost/newxadmin/public/static/froala_editor/js/plugins/inline_style.min.js"></script>
<script type="text/javascript" src="http://localhost/newxadmin/public/static/froala_editor/js/plugins/link.min.js"></script>
<script type="text/javascript" src="http://localhost/newxadmin/public/static/froala_editor/js/plugins/lists.min.js"></script>
<script type="text/javascript" src="http://localhost/newxadmin/public/static/froala_editor/js/plugins/paragraph_format.min.js"></script>
<script type="text/javascript" src="http://localhost/newxadmin/public/static/froala_editor/js/plugins/paragraph_style.min.js"></script>
<script type="text/javascript" src="http://localhost/newxadmin/public/static/froala_editor/js/plugins/quick_insert.min.js"></script>
<script type="text/javascript" src="http://localhost/newxadmin/public/static/froala_editor/js/plugins/quote.min.js"></script>
<script type="text/javascript" src="http://localhost/newxadmin/public/static/froala_editor/js/plugins/table.min.js"></script>
<script type="text/javascript" src="http://localhost/newxadmin/public/static/froala_editor/js/plugins/save.min.js"></script>
<script type="text/javascript" src="http://localhost/newxadmin/public/static/froala_editor/js/plugins/url.min.js"></script>
<script type="text/javascript" src="http://localhost/newxadmin/public/static/froala_editor/js/plugins/video.min.js"></script>

<script src='http://localhost/newxadmin/public/static/froala_editor/js/languages/zh_cn.js'></script>
<script src="http://localhost/newxadmin/public/static/layuiadmin/layui/layui.js"></script>
<script>
    layui.config({
        base: 'http://localhost/newxadmin/public/static/layuiadmin/' //静态资源所在路径
    }).extend({
        index: 'lib/index' //主入口模块
    }).use(['index', 'form', 'table', 'laydate', 'croppers'], function () {
        var $ = layui.$
            , admin = layui.admin
            , element = layui.element
            , layer = layui.layer
            , croppers = layui.croppers
            , laydate = layui.laydate
            , form = layui.form, table = layui.table;

        form.render(null, 'component-form-group');

        //初始化编辑器
        $('textarea#editor').froalaEditor({
            language: 'zh_cn',
            heightMin: 200,
            heightMax: 300,
            placeholderText: '不要忘了写日志哦~~',
            pastePlain: true,
            theme: 'dark',
            toolbarSticky: false,
        });


        croppers.render({
            elem: '#pic',
            saveW: 150 //保存宽度
            ,
            saveH: 150,
            mark: 200/ 150
            ,
            area: '900px' //弹窗宽度
            ,
            url: "<?php echo url('carousel/upload'); ?>" //图片上传接口返回和（layui 的upload 模块）返回的JOSN一样
            ,
            done: function(res) { //上传完毕回调
                table.reload('LAY-carousel-list'); //数据刷新
            }
        });


        /* 监听提交 */
        form.on('submit(component-form-demo1)', function (data) {
            // parent.layer.alert(JSON.stringify(data.field), {
            //   title: '最终的提交信息'
            // })

            var index1 = layer.load(1);
            $.ajax({
                url: 'http://localhost/newxadmin/public/index.php/admin/apply/sendmail',
                method: "POST",
                data: {
                    'subject': data.field.subject,
                    'status': data.field.status,
                    'text': data.field.text,
                    'option_num': 4
                },
                success: function (res) {
                    layer.close(index1)
                    console.log(res)
                    layer.open({
                        type: 2
                        ,
                        title: '邮件发送状态'
                        ,
                        content: 'http://localhost/newxadmin/public/index.php/admin/apply/emailstatus/#/id=' + res.data
                        ,
                        area: ['600px', '400px']
                        ,
                        yes: function (index, layero) {
                            var iframeWindow = window['layui-layer-iframe' + index]
                                , submitID = 'LAY-user-back-submit'
                                , submit = layero.find('iframe').contents().find('#' + submitID);
                        }
                        ,
                        success: function (layero, index) {
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