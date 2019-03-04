<?php /*a:1:{s:59:"D:\wamp64\www\NEWX\application\admin\view\apply\search.html";i:1551424698;}*/ ?>
<!doctype html>
<html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
		<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<title>NEWX大学生网络文化工作室成员报名表</title>
		<link rel="shortcut icon" href="http://localhost/newx/public/static/admin/images/newx.ico" /> 
		<style type="text/css">
			table {
				table-layout: fixed;
				word-break: break-all;
				word-wrap: break-word;
			}
			
			td {
				text-align: center;
				valign: center;
			}
		</style>
	</head>

	<body>
		

		<div align="center">	
			<?php if(is_array($apply) || $apply instanceof \think\Collection || $apply instanceof \think\Paginator): $i = 0; $__LIST__ = $apply;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			<table border="1px" cellspacing="0px" style="border-collapse:collapse;" width="700" height="700">
				
				<h3><center>NEWX大学生网络文化工作室成员报名表</center></h3>
				<tr height="45">
					<td width="75">序号</td>
					<td width="75"><?php echo htmlentities($vo['id']); ?></td>
					<td width="100">姓名</td>
					<td width="100"><?php echo htmlentities($vo['user']['name']); ?></td>
					<td width="100">性别</td>
					<td width="100"><?php echo htmlentities($vo['user']['sex']); ?></td>
					<td rowspan="4" width="150"> 照片</td>
				</tr>
				<tr height="45">
					<td>出生年月</td>
					<td colspan="2"><?php echo htmlentities($vo['user']['date']); ?></td>
					<td>联系方式</td>
					<td colspan="2"><?php echo htmlentities($vo['user']['phone']); ?></td>
				</tr>
				<tr height="45">
					<td>所在院系</td>
					<td colspan="2"><?php echo htmlentities($vo['user']['department']); ?></td>
					<td>班级</td>
					<td colspan="2"><?php echo htmlentities($vo['user']['class']); ?></td>
				</tr>
				<tr height="45">
					<td>个人学号</td>
					<td colspan="2"><?php echo htmlentities($vo['user']['id_number']); ?></td>
					<td>所在寝室</td>
					<td colspan="2"><?php echo htmlentities($vo['user']['bedroom']); ?></td>
				</tr>
				<tr height="45">
					<td>电子邮箱</td>
					<td colspan="4"><?php echo htmlentities($vo['user']['email']); ?></td>
					<td>是否服从调剂</td>
					<td><?php echo htmlentities($vo['adjust']); ?></td>
				</tr>
				<tr height="45">
					<td>第一志愿</td>
					<td colspan="3"><?php echo htmlentities($vo['volunteer1']); ?></td>

					<td>第二志愿</td>
					<td colspan="2"><?php echo htmlentities($vo['volunteer2']); ?></td>

				</tr>
				<tr>
					<td height="160px">个人简介</td>
					<td colspan="6"><?php echo htmlentities($vo['profile']); ?></td>
				</tr>
				<tr>
					<td height="160px">特长及经历</td>
					<td colspan="6"><?php echo htmlentities($vo['specialty']); ?></td>
				</tr>
				<tr>
					<td height="100px">对第一志愿的认识和看法</td>
					<td colspan="6"><?php echo htmlentities($vo['views1']); ?></td>
				</tr>
				<tr>
					<td height="100px">对第二志愿的认识和看法</td>
					<td colspan="6"><?php echo htmlentities($vo['views2']); ?></td>
				</tr>
				<tr>
					<td height="110px">面试考核意见</td>
					<td colspan="6"></td>
				</tr>
				<tr>
					<td height="85px">备注</td>
					<td colspan="6"></td>
				</tr>

			</table>
		<?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
		
	</body>

</html>