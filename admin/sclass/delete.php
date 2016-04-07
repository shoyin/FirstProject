<?php
include '../../config.php';

//格式化
$uid = intval($_GET['id']);

//判断版块是否存在内容
$sqls="select * from content where pid='$uid'";
$results=mysql_query($sqls);
if($results && mysql_num_rows($results)>0){

echo '<script type="text/javascript">alert("该版块下包含版块内容如需删除请删除版块全部内容");window.history.back();</script>';exit;	

}

//查询
$sql = "delete from bbs_sclass where id='$uid'";

$result = mysql_query($sql);

if($result && mysql_affected_rows()>0){
	echo '<script type="text/javascript">alert("删除版块信息成功!");window.location="list.php";</script>';
}else{
	echo '<script type="text/javascript">alert("删除版块信息失败!");window.location="list.php";</script>';

}

mysql_free_result($results);
mysql_close();
