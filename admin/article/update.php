<?php
include'../../config.php';

include '../../common/upload.php';

//格式化
$id=intval($_GET['id']);
$userid=$_GET['userid'];
$posttime=intval($_GET['posttime']);

// $bname=trim($_POST['bname']);
// $cintent=trim($_POST['content']);
// $orderni= intval($_POST['orderno']);
$_POST['edittime']=time();



foreach($_POST as $k=>$v){
	if($_POST[$k]==''){
		unset($_POST[$k]);
	}
}

foreach($_POST as $k=>$v){
	$list[]=$k."='$v'";
}

$list=join(',',$list);

//sql查询
$sql = "update content set $list where id='$id'";


$result = mysql_query($sql);

if($result && mysql_affected_rows()>0){
	echo '<script type="text/javascript">alert("修改帖子信息成功!");window.location="../../open.php?page=0&sid='.$id.'&posttime='.$posttime.'&userid='.$userid.'";</script>';
}else{
	echo '<script type="text/javascript">alert("修改帖子信息失败!");window.history.back();</script>';

}

mysql_close();