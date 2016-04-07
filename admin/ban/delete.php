<?php
include '../../config.php';


$uid = intval($_GET['id']);

//移除禁用id，ip
$sql = "delete from banip where id='$uid'";


$result = mysql_query($sql);


if($result && mysql_affected_rows()>0){
	echo '<script type="text/javascript">alert("删除信息成功!");window.location="list.php";</script>';
}else{
	echo '<script type="text/javascript">alert("删除信息失败!");window.location="list.php";</script>';

}


mysql_close();
