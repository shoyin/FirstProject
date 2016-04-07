<?php
include '../../config.php';
include '../../common/upload.php';
$sname= trim($_POST['sname']);
$content= trim($_POST['content']);
$orderno= intval($_POST['orderno']);
$pid=$_POST['pid'];
// 获取上传的文件名称
$logo= upfile($_FILES['logo'],$path='../../static/uploads/')['filename'];
if(empty($logo)){
	$logo="sclass.jpg";
}
if(empty($sname)){
	echo '<script type="text/javascript">alert("版块名不能为空");window.location="./add.php";</script>';
	exit;
}

$sql = "select sname from bbs_sclass where sname='$sname'";

//发送SQL语句，返回结果
$result = mysql_query($sql);

//判断结果集是否有数据
if($result && mysql_num_rows($result)>0){
	echo '<script type="text/javascript">alert("该版块'.@$bname.'已经存在!");window.history.back();</script>';
	exit;
}
$sql = "select orderno from bbs_sclass where orderno='$orderno'";

//发送SQL语句，返回结果
$result = mysql_query($sql);

//判断结果集是否有数据
if($result && mysql_num_rows($result)>0){
	echo '<script type="text/javascript">alert("该序列'.$orderno.'已经存在!");window.history.back();</script>';
	exit;
}
// 准备SQL语句
$sql = "insert into bbs_sclass(pid,sname,content,orderno,logo)values('$pid','$sname','$content','$orderno','$logo')";

$result = mysql_query($sql);

if($result && mysql_insert_id()>0){
	echo '<script type="text/javascript">alert("添加版块成功");window.location="list.php";</script>';
}else{
	echo '<script type="text/javascript">alert("添加版块失败");window.history.back();</script>';
}
mysql_close();