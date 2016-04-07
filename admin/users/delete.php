<?php
include '../../config.php';


$uid = intval($_GET['id']);

//删除选中id
$sql = "delete from bbs_user where id='$uid'";
$result = mysql_query($sql);

//删除关联禁用id
$sqls = "delete from banip where id='$uid'";
$results=mysql_query($sqls);


if($results){
	echo '<script type="text/javascript">alert("删除用户信息成功!");window.location="list.php";</script>';
}else{
	echo '<script type="text/javascript">alert("删除用户信息失败!");window.location="list.php";</script>';

}


mysql_close();
