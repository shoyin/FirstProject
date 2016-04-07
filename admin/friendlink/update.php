<?php

include '../../config.php';
include '../../common/upload.php';

//格式化
$id=intval($_GET['id']);
// $bname=trim($_POST['bname']);
// $cintent=trim($_POST['content']);
// $orderni= intval($_POST['orderno']);


if(!empty($_FILES['logo']['name'])){

	//执行上传操作，返回头像文件名称。
	 $_POST['logo']=upfile($_FILES['logo'],$path='../../static/uploads')['filename'];
}

foreach($_POST as $k=>$v){
	if($_POST[$k]==''){
		unset($_POST[$k]);
	}
}

foreach($_POST as $k=>$v){
	$list[]=$k."='$v'";
}

$list=join(',',$list);

$sql = "update friendlink set $list where id='$id'";
$result = mysql_query($sql);

if($result && mysql_affected_rows()>0){
	echo '<script type="text/javascript">alert("修改链接信息成功!");window.location="list.php";</script>';
}else{
	echo '<script type="text/javascript">alert("修改链接信息失败!");window.location="edit.php?id='.$id.'";</script>';

}

mysql_close();