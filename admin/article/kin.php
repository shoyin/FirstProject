<?php
include '../../config.php';
include '../../common/upload.php';

$keyword=$_POST['keyword'];
// 获取上传的文件名称
//$pic= upfile($_FILES['pic'],$path='../../static/uploads/')['filename'];


// 准备SQL语句
$sql = "insert into keyword (keyword)values('$keyword')";

$result = mysql_query($sql);

if($result && $num=mysql_insert_id()>0){

	echo '<script type="text/javascript">alert("添加成功");window.location="klist.php";</script>';
}else{
	echo '<script type="text/javascript">alert("失败!");window.history.back();</script>';
}
mysql_close();