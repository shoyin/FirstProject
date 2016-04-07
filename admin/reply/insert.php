<?php
include '../../config.php';
include '../../common/upload.php';


@$userid=$_GET['userid'];
$title= trim($_POST['title']);
$content=trim($_POST['content']);
@$uid=$_SESSION['user']['id'];
$cid=$_POST['cid'];
$pt=$_POST['pt'];
$posttime=$edittime=time();
$ip = ip2long($_SERVER['REMOTE_ADDR']);
@$last=$_POST['last'];
@$pagelast=intval($_GET['pagecount']);
// 获取上传的文件名称
//$pic= upfile($_FILES['pic'],$path='../../static/uploads/')['filename'];

if(empty($title)){
	echo '<script type="text/javascript">alert("严禁灌水");window.history.back();</script>';exit;
}
if(empty($content)){
	echo '<script type="text/javascript">alert("你就让我看这个？");window.history.back();</script>';exit;
}

if(empty($_SESSION['user']['username'])){

	echo '<script type="text/javascript">alert("请登陆回帖！");window.location="../../user/login.php";</script>';exit;
}
// 准备SQL语句
$sql = "insert into reply(uid,cid,title,content,posttime,edittime,ip)values('$uid','$cid','$title','$content','$posttime','$edittime','$ip')";



$result = mysql_query($sql);

if($result && mysql_insert_id()>0){
	if($last==1){
		echo '<script type="text/javascript">alert("回帖成功");window.location="../../open.php?sid='.$cid.'&page='.$pagelast.'&posttime='.$pt.'&userid='.$userid.'";</script>';
	}else{
	echo '<script type="text/javascript">alert("回帖成功");window.location="../../open.php?sid='.$cid.'&page=0&posttime='.$pt.'&userid='.$userid.'";</script>';
}
}else{
	echo '<script type="text/javascript">alert("失败");window.history.back();</script>';
}
mysql_close();