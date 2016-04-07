<?php
include '../../config.php';


@$uid = intval($_GET['id']);
@$id=intval($_GET['id']);
@$userid=$_GET['userid'];

//删除过滤
$sql = "delete from keyword where id='$id'";

$result = mysql_query($sql);


if($result && mysql_affected_rows()>0){
	echo '<script type="text/javascript">alert("删除成功!");window.location="klist.php";</script>';
}else{
	echo '<script type="text/javascript">alert("删除失败!");window.history.back();</script>';

}


mysql_close();
