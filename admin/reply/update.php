<?php
include'../../config.php';

include '../../common/upload.php';

//格式化
@$userid=$_GET['userid'];
@$id=intval($_GET['id']);
@$pt=$_GET['posttime'];
@$sid=$_GET['sid'];
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
$sql = "update reply set $list where id='$id'";

$result = mysql_query($sql);

if($result && mysql_affected_rows()>0){
	echo '<script type="text/javascript">alert("修改信息成功!");window.location="../../open.php?sid='.$sid.'&page=0&posttime='.$pt.'&userid='.$userid.'";</script>';
}else{
	echo '<script type="text/javascript">alert("失败!");window.history.back();</script>';
}

mysql_close();