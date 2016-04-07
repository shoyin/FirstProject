<?php
include '../../config.php';
include '../../common/upload.php';

//格式化
$userid=$_GET['userid'];
$title= trim($_POST['title']);
$content=trim($_POST['content']);
@$uid=$_SESSION['user']['id'];
$pid=$_POST['pid'];
$postime=time();
@$vcode = strtolower(trim($_POST['yz']));
$ip = ip2long($_SERVER['REMOTE_ADDR']);
// 获取上传的文件名称
//$pic= upfile($_FILES['pic'],$path='../../static/uploads/')['filename'];

if(strtolower($_SESSION['yz']) != $vcode){
	echo '<script type="text/javascript">alert("验证码错误");window.history.back();</script>';exit;
}
if(empty($title)){
	echo '<script type="text/javascript">alert("标题不能为空");window.history.back();</script>';exit;
}
if(empty($content)){
	echo '<script type="text/javascript">alert("你就让我看这个？");window.history.back();</script>';exit;
}

if(empty($_SESSION['user']['username'])){

	echo '<script type="text/javascript">alert("请登陆发帖");window.location="../../user/login.php";</script>';
}
// 准备SQL语句
$sql = "insert into content(pid,uid,title,content,postime,ip)values('$pid','$uid','$title','$content','$postime','$ip')";



$result = mysql_query($sql);

if($result && $num=mysql_insert_id()>0){
	echo '<script type="text/javascript">alert("发帖成功");window.location="../../open.php?sid='.$pid.'&page=0&posttime='.$postime.'&userid='.$userid.'";</script>';
}else{
	echo '<script type="text/javascript">alert("失败!");window.history.back();</script>';
}
mysql_close();