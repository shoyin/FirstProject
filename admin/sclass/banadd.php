<?php

include '../../config.php';
include '../../common/upload.php';

//格式化
// $bname=trim($_POST['bname']);
// $cintent=trim($_POST['content']);
// $orderni= intval($_POST['orderno']);
$id=$_GET['id'];
$banzhu=$_POST['sid'];

//sql查询
$sql = "update bbs_sclass set banzhu='$banzhu' where id='$id'";

$result = mysql_query($sql);

if($result){
	echo '<script type="text/javascript">alert("任命成功!");window.location="list.php";</script>';
}else{
	echo '<script type="text/javascript">alert("修改版块信息失败!");window.location="edit.php?id='.$id.'";</script>';

}

mysql_close();