<?php
include '../../config.php';


if(empty($_SESSION['user']['username'])){

	echo '<script type="text/javascript">alert("你是who！");window.history.back();</script>';exit;
}

//格式化
@$sid=$_GET['sid'];
@$pt=$_GET['posttime'];
@$uid=$_GET['userid'];
$id=intval($_GET['id']);

//sql查询
$sqla="select * from reply where id='$id'";
$resulta=mysql_query($sqla);
$rowa=mysql_fetch_assoc($resulta);

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="../../static/css/ft.css" />

	<script type="text/javascript">
		window.UEDITOR_HOME_URL = "/bbs/static/js/ueditor/";
	</script>
	<script type="text/javascript" src="../../static/js/ueditor/ueditor.config.js"></script>
	<script type="text/javascript" src="../../static/js/ueditor/ueditor.all.js"></script>
</head>
<body>
	
	<div id=ksft>
	<form action="update.php?id=<?php echo $rowa['id'];?>&userid=<?php echo $uid;?>&sid=<?php echo $sid;?>&posttime=<?php echo $pt;?>" method='post' enctype='multipart/form-data' style="text-align:left">
		<fieldset>
			<legend>修改回复</legend>
			<table>
			
				<tr><td style="text-align:center" >标题：</td><td>
				<input type="text" name="title" id="" size=30 value="<?php echo $rowa['title'];?>"></td></tr>
				<tr><td></td><td>
				<textarea name="content" id="content" cols="60" rows="7" ><?php echo $rowa['content'];?></textarea>
				</td></tr>

				<tr><td>回帖隐藏</td><td>
				<input type="radio" name="isopen" value="0" <?php if($rowa['isopen']==0){echo 'checked';}?>>隐藏
				<input type="radio" name="isopen" value="1"<?php if($rowa['isopen']==1){echo 'checked';}?>>不隐藏

				 </td></tr>


				<tr><td></td><td><input type="submit" value="修改"></td></tr>
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

