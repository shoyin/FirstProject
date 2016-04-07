<?php

//sql查询
$sql = "select id,bname from bbs_bclass order by orderno asc";
$result= mysql_query($sql);

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="../../static/css/ft.css" />
	<link rel="stylesheet" type="text/css" href="../../static/css/top.css" />
.
	<script type="text/javascript">
		window.UEDITOR_HOME_URL = "/bbs/static/js/ueditor/";
	</script>
	<script type="text/javascript" src="./static/js/ueditor/ueditor.config.js"></script>
	<script type="text/javascript" src="./static/js/ueditor/ueditor.all.js"></script>
</head>
<body>
<?php
include '../../header.php';
?>
	<div id=ft><a href="">发帖</a></div>
	<div id=ftr>
			<a href="">戳我到发帖专区</a>
	</div>
	<div id=ksft>
	<form action="admin/article/insert.php" method='post' enctype='multipart/form-data' style="text-align:left">
		<fieldset>
			<legend>快速发帖</legend>
			<table>
				<tr>
					<td>所属版块</td>
					<td><select name="pid" >
						<?php
						//遍历分区
						if($result && mysql_num_rows($result)>0){
							while($row=mysql_fetch_assoc($result)){
								$pid=$row['id'];

						?>
						<optgroup label="<?php echo $row['bname'];?>">

						<?php

						//查询 版块信息
						$sqls="select * from bbs_sclass where pid='$pid' order by orderno asc";
						$results=mysql_query($sqls);
						if($results && mysql_num_rows($results)>0){
								while($rows=mysql_fetch_assoc($results)){
						?>
						<option value="<?php echo $rows['id'];?>"><?php echo $rows['sname'];?></option>
						<?php
							}
						}
						?>
						</optgroup>
						<?php
							}
						}	
						?>
						</select>
					</td>
				</tr>
				<tr><td style="text-align:center" >标题：</td><td><input type="text" name="title" id="" size=30></td></tr>
				<tr><td></td><td><textarea name="content" id="content" cols="30" rows="5" ></textarea></td></tr>
				<tr><td></td><td><input type="image" src="./static/images/fbtz.jpg"></td></tr>
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

