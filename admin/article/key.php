<?php
include '../../config.php';

//sql查询
$sql = "select id,bname from bbs_bclass order by orderno asc";
$result= mysql_query($sql);

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="static/css/ft.css" />

	<script type="text/javascript">
		window.UEDITOR_HOME_URL = "/bbs/static/js/ueditor/";
	</script>
	<script type="text/javascript" src="../../static/js/ueditor/ueditor.config.js"></script>
	<script type="text/javascript" src="../../static/js/ueditor/ueditor.all.js"></script>
</head>
<body>
	
	<div id=ksft>
	<form action="kin.php" method='post' enctype='multipart/form-data' style="text-align:left">
		<fieldset>
			<legend>过滤设置</legend>
				<tr><td></td><td><input type="text" name="keyword"></td></tr>
				<tr><td></td><td><input type="submit" value="添加"></td></tr>
			</table>

		</fieldset>
	</form>
</div>
</body>
</html>
<script type="text/javascript">
//初始化编辑器，设定显示的按钮
	UE.getEditor('content',{initialFrameHeight:200,initialFrameWidth:400,toolbars:[
            ['bold',  'insertimage', 'emotion',]
        ] });
</script>

