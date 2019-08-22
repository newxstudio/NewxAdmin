<?php /*a:1:{s:67:"D:\wamp64\www\NewxAdmin\application\admin\view\apply\showapply.html";i:1566364732;}*/ ?>
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
		<style type="text/css">
		table { 
				table-layout:fixed; 
				word-break: break-all;
				word-wrap: break-word;
		}  
		td{
				text-align:center;
				valign:center;
		}
		</style>
	</head>
	<body>
		<volist name='list' id='vo'>
      	<div class="table-responsive">
      	
		
		<div align="center">
		<table border="1px" cellspacing="0px" style="border-collapse:collapse;" width="700"height="700">

				<h3><center>NEWX大学生网络文化工作室成员报名表</center></h3>
			<tr height="45">
				<td width="75">序号</td>
				<td width="75"><?php echo htmlentities($apply['id']); ?></td>
				<td width="100">姓名</td>
				<td width="100"><?php echo htmlentities($apply['name']); ?></td>
				<td width="100">性别</td>
				<td width="100">
					<?php switch($apply['sex']): case "0": ?>男<?php break; case "1": ?>女<?php break; ?>
					<?php endswitch; ?>
				</td>
				<td rowspan="4" width="150"> 照片</td>
			</tr>
			<tr height="45">
				<td>联系方式</td>
				<td colspan="2"><?php echo htmlentities($apply['phone']); ?></td>
				<td>所在学院</td>
				<td colspan="2">计算机与信息学院</td>
			</tr>
			<tr height="45">
				<td>所在院系</td>
				<td colspan="2">计算机与信息系</td>
				<td>班级</td>
				<td colspan="2">计科17-4班</td>
			</tr>
			<tr height="45">
				<td>个人学号</td>
				<td colspan="2"><?php echo htmlentities($apply['student_id']); ?></td>
				<td>所在寝室</td>
				<td colspan="2"><?php echo htmlentities($apply['apartment']); ?></td>
			</tr>
			<tr height="45">
				<td>电子邮箱</td>
				<td colspan="4"><?php echo htmlentities($apply['email']); ?></td>
				<td>是否服从调剂</td>
				<td>
					<?php switch($apply['allow_adjust']): case "0": ?>否<?php break; case "1": ?>是<?php break; ?>
					<?php endswitch; ?>
				</td>
			</tr>
			<tr height="45">
				<td>第一志愿</td>
				<td colspan="3">
					<?php switch($apply['option1']): case "1": ?>图文部<?php break; case "2": ?>采风部<?php break; case "3": ?>视频部<?php break; case "4": ?>网站部<?php break; case "5": ?>采编部<?php break; case "6": ?>办公室<?php break; ?>
					<?php endswitch; ?>
				</td>
					
				<td>第二志愿</td>
				<td colspan="2">
					<?php switch($apply['option2']): case "1": ?>图文部<?php break; case "2": ?>采风部<?php break; case "3": ?>视频部<?php break; case "4": ?>网站部<?php break; case "5": ?>采编部<?php break; case "6": ?>办公室<?php break; ?>
					<?php endswitch; ?>
				</td>
				
		
			</tr>
			<tr>
				<td height="160px">个人简介</td>
				<td colspan="6"><?php echo htmlentities($apply['profile']); ?></td>
			</tr>
			<tr>
				<td height="160px">特长及经历</td>
				<td colspan="6"><?php echo htmlentities($apply['specialty']); ?></td>
			</tr>
			<tr>
				<td height="160px">对意向岗位的认识和看法</td>
				<td colspan="6"><?php echo htmlentities($apply['recognize']); ?></td>
			</tr>
<!--			<tr>-->
<!--				<td height="150px">面试考核意见</td>-->
<!--				<td colspan="6"></td>-->
<!--			</tr>-->
<!--			<tr>-->
<!--				<td height="85px">备注</td>-->
<!--				<td colspan="6"></td>-->
<!--			</tr>-->
		
			</volist>
		</table>
	
		
		</div> 

	</body>
</html>