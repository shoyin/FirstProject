<?php
include'../../config.php';

include '../../common/upload.php';

//格式化
$id=intval($_GET['id']);
$userid=$_GET['userid'];
@$posttime=$_GET['posttime'];

//判断用户
if(empty($_SESSION['user']['username'])){

	echo '<script type="text/javascript">alert("你要干嘛！");window.history.back();</script>';exit;
}
//判断是否有参
if(@$_GET['open']){
	if($_GET['open']==1){
		$_POST['isopen']=1;
	}else{
		$_POST['isopen']=0;
}

}
if(@$_GET['top']){
	if($_GET['top']==1){
	$_POST['istop']=1;
	}else{
	$_POST['istop']=0;	
	}
}
if(@$_GET['jinghua']){
	if($_GET['jinghua']==1){
	$_POST['isjinghua']=1;
	}else{
	$_POST['isjinghua']=0;	
	}
}
if(@$_GET['hot']){
	if($_GET['hot']==1){
	$_POST['ishot']=1;
	}else{
	$_POST['ishot']=0;
	}
}

if(@$_GET['lit']){
	if($_GET['lit']==1){
	$_POST['islit']=1;
	}else{
	$_POST['islit']=0;	
	}
}

// $bname=trim($_POST['bname']);
// $cintent=trim($_POST['content']);
// $orderni= intval($_POST['orderno']);
$_POST['edittime']=time();

foreach($_POST as $k=>$v){
	$list[]=$k."='$v'";
}

$list=join(',',$list);

//sql查询
$sql = "update content set $list where id='$id'";

$result = mysql_query($sql);

if($result){
	echo '<script type="text/javascript">alert("修改帖子信息成功!");window.location="../../alist.php?page=0&sid='.$id.'&posttime='.$posttime.'&userid='.$userid.'";</script>';
}else{
	echo '<script type="text/javascript">alert("修改帖子信息失败!");window.history.back();</script>';

}
mysql_free_result($result);
mysql_close();