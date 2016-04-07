<?php

//提示：如果分区下面有板块，不允许直接删除
include '../../config.php';

//获取要删除的用户id
$uid = intval($_GET['id']);

//准备sql语句
$sql = "delete from friendlink where id='$uid'";

//发送执行sql语句，返回执行结果
$result = mysql_query($sql);

//判断执行的结果
if($result && mysql_affected_rows()>0){
	echo '<script type="text/javascript">alert("删除链接信息成功!");window.location="list.php";</script>';
}else{
	echo '<script type="text/javascript">alert("删除链接信息失败!");window.location="list.php";</script>';

}

//关闭数据库
mysql_close();
