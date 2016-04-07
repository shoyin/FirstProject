<?php
include '../../config.php';
include '../../common/upload.php';


$linkname=trim($_POST['linkname']);
$url=trim($_POST['url']);
$isindex=intval($_POST['isindex']);
$orderno=intval($_POST['orderno']);
$uid=trim($_POST['uid']);
$type=intval($_POST['type']);
$logo=@upfile($_FILES['logo'],$path='../../static/uploads/')['fliename'];

if(empty($logo)){
	$logo="linklogo.jpg";
}
if(empty($linkname)){
	echo '<script type="text/javascript">alert("链接名不能为空");window.location="./add.php";</script>';
	exit;
}

$sql = "select linkname from friendlink where linkname='$linkname'";

//发送SQL语句，返回结果
$result = mysql_query($sql);

//判断结果集是否有数据
if($result && mysql_num_rows($result)>0){
	echo '<script type="text/javascript">alert("该链接'.$linkname.'已经存在!");window.location="./add.php";</script>';
	exit;
}
$sql = "select orderno from friendlink where orderno='$orderno'";

//发送SQL语句，返回结果
$result = mysql_query($sql);

//判断结果集是否有数据
if($result && mysql_num_rows($result)>0){
	echo '<script type="text/javascript">alert("该序列'.$orderno.'已经存在!");window.location="./add.php";</script>';
	exit;
}

$sql="insert into friendlink (linkname,url,logo,isindex,type,uid,orderno)values('$linkname','$url','$logo','$isindex','$type','$uid','$orderno')";


$result=mysql_query($sql);

if($result && mysql_insert_id()>0){

	echo '<script type="text/javascript">alert("添加链接成功");window.location="list.php";</script>';
}else{
	echo '<script type="text/javascript">alert("添加链接失败");window.location="add.php";</script>';
}

mysql_close();
