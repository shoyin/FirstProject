<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="../../static/css/ft.css" />
	<link rel="stylesheet" type="text/css" href="../../static/css/top.css" />

	<script type="text/javascript">
		window.UEDITOR_HOME_URL = "/bbs/static/js/ueditor/";
	</script>
	<script type="text/javascript" src="../../static/js/ueditor/ueditor.config.js"></script>
	<script type="text/javascript" src="../../static/js/ueditor/ueditor.all.js"></script>
</head>
<body>
<?php

include '../../header.php';

//判断用户是否有有权限
if(empty($_SESSION['user']['username'])){

	echo '<script type="text/javascript">alert("你要干嘛！");window.history.back();</script>';exit;
}

//格式化
$userid=$_GET['userid'];
$id=intval($_GET['id']);
$sqla="select * from content where id='$id'";
$resulta=mysql_query($sqla);
$rowa=mysql_fetch_assoc($resulta);

//sql查询
$sql = "select id,bname from bbs_bclass order by orderno asc";
$result= mysql_query($sql);

?>
<main>
	<div id=ksft>
	<form action="update.php?id=<?php echo $rowa['id'];?>&posttime=<?php echo $rowa['postime'];?>&userid=<?php echo $userid;?>" method='post' enctype='multipart/form-data' style="text-align:left">
		<fieldset>
			<legend>修改帖子</legend>
			<table width="100%">
				<tr>
					<td >所属版块</td>
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
						<option value="<?php echo $rows['id'];?>"<?php if($rows['id']==$rowa['pid']){echo 'selected';}?>><?php echo $rows['sname'];?></option>
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
				<tr><td style="text-align:center" width=80>标题：</td><td><input type="text" name="title" id="" size=30 value="<?php echo $rowa['title'];?>"></td></tr>
				<tr><td colspan=2 ><textarea name="content" id="content" cols="60" rows="7" style="width:100%;height:300px;" ><?php echo $rowa['content'];?></textarea></td></tr>

				<tr><td style="text-align:center" >公开：</td><td>
					<input type="radio" name="isopen" value="0" <?php if($rowa['isopen']==0){echo "checked";}?>>否
					<input type="radio" name="isopen" value="1" <?php if($rowa['isopen']==1){echo "checked";}?>>是</td></tr>
				<?php

				//权限等级判断
				if($_SESSION['user']['level']<=1){
				?>
					
				<tr><td style="text-align:center" >热贴：</td><td>
					<input type="radio" name="ishot" value="0" <?php if($rowa['ishot']==0){echo "checked";}?>>否
					<input type="radio" name="ishot" value="1" <?php if($rowa['ishot']==1){echo "checked";}?>>是</td></tr>
				<tr><td style="text-align:center" >精华：</td><td>
					<input type="radio" name="isjinghua" value="0" <?php if($rowa['isjinghua']==0){echo "checked";}?>>否
					<input type="radio" name="isjinghua" value="1" <?php if($rowa['isjinghua']==1){echo "checked";}?>>是</td></tr>
				<tr><td style="text-align:center" >置顶：</td><td>
					<input type="radio" name="istop" value="0" <?php if($rowa['istop']==0){echo "checked";}?>>否
					<input type="radio" name="istop" value="1" <?php if($rowa['istop']==1){echo "checked";}?>>是</td></tr>
				<tr><td style="text-align:center" >回复阅读：</td><td>
					<input type="radio" name="needreply" value="0" <?php if($rowa['needreply']==0){echo "checked";}?>>否
					<input type="radio" name="needreply" value="1" <?php if($rowa['needreply']==1){echo "checked";}?>>是</td></tr>
				<tr><td style="text-align:center" >回收站：</td><td>
					<input type="radio" name="inbox" value="0" <?php if($rowa['inbox']==0){echo "checked";}?>>否
					<input type="radio" name="inbox" value="1" <?php if($rowa['inbox']==1){echo "checked";}?>>是</td></tr>
				<tr><td style="text-align:center" >权限阅读：</td><td>
				<select name="allowlevel">
					<option value="0" >超级管理</option>
					<option value="1">版主</option>
					<option value="2">会员</option>
					<option value="3" >新人</option>
					<option value="4" selected>路人</option>

				</select>
				</td></tr><?php }?>
								

			<tr><td></td><td><input type="submit" value="修改"></td></tr>
			</table>

		</fieldset>
	</form>
</div>
</main>
</body>
</html>
<script type="text/javascript">
//初始化编辑器，设定显示的按钮
	UE.getEditor('content',{initialFrameHeight:400,initialFrameWidth:800,toolbars:[
            ['bold',  'insertimage', 'emotion',]
        ] });
</script>

