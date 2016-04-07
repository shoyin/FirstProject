<?php
include '../../config.php';
include '../../common/upload.php';

//格式化
$bname=trim($_POST['bname']);
$content=trim($_POST['content']);
$orderno=intval($_POST['orderno']);

$logo=@upfile($_FILES['logo'],$path='../../static/uploads/')['fliename'];

if(empty($logo)){
	$logo="bclass.jpg";
}
if(empty($bname)){
	echo '<script type="text/javascript">alert("分区名不能为空");window.location="./add.php";</script>';
	exit;
}

$sql = "select bname from bbs_bclass where bname='$bname'";

//发送SQL语句，返回结果
$result = mysql_query($sql);

//判断结果集是否有数据
if($result && mysql_num_rows($result)>0){
	echo '<script type="text/javascript">alert("该分区'.$bname.'已经存在!");window.history.back();</script>';
	exit;
}
$sql = "select orderno from bbs_bclass where orderno='$orderno'";

//发送SQL语句，返回结果
$result = mysql_query($sql);

//判断结果集是否有数据
if($result && mysql_num_rows($result)>0){
	echo '<script type="text/javascript">alert("该序列'.$orderno.'已经存在!");window.history.back();</script>';
	exit;
}

$sql="insert into bbs_bclass(bname,content,orderno,logo)values('$bname','$content','$orderno','$logo')";


$result=mysql_query($sql);

if($result && mysql_insert_id()>0){

	echo '<script type="text/javascript">alert("添加分区成功");window.location="list.php";</script>';
}else{
	echo '<script type="text/javascript">alert("添加分区失败");window.history.back();</script>';
}

mysql_close();
