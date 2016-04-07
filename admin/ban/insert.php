<?php
include '../../config.php';

//print_r($_POST);
//echo '<br>';

//获取参数
@$arr=$_POST['users'];
@$ip=$_POST['ip'];
//print_r($arr[0]);
echo '<br>';

//print_r($ip);
echo '<br>';

//添加选中禁用用户id,ip
for(@$i=count($_POST['users']);$i>0;$i--){
	
	@$sql = "insert into banip(id,ip)value({$arr[$i-1]},{$ip[$i-1]})";
	
	$result = mysql_query($sql);
}

if($result && mysql_affected_rows()>0){
	echo '<script type="text/javascript">alert("禁用成功!");window.location="list.php";</script>';
}else{
	echo '<script type="text/javascript">alert("失败!");window.location="list.php";</script>';

}

mysql_close();
