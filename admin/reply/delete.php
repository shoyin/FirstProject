<?php
include '../../config.php';


$uid = intval($_GET['id']);

//删除回复
$sql = "delete from reply where id='$uid'";

$result = mysql_query($sql);

if($result && mysql_affected_rows()>0){
	echo '<script type="text/javascript">alert("删除回帖成功!");window.location="list.php";</script>';
}else{
echo '<script type="text/javascript">alert("失败");window.history.back();</script>';
}


mysql_close();
