<?php
include '../../config.php';



//print_r($_POST);
echo '<br>';
@$arr=$_POST['users'];
//print_r($arr[0]);
echo '<br>';

//循环删除选中用户
for(@$i=count($_POST['users']);$i>0;$i--){
	
	@$sql = "delete from bbs_user where id={$arr[$i-1]}";
	@$result = mysql_query($sql);

	//删除用户并删除用户禁用
	@$sqls= "delete from banip where id={$arr[$i-1]}";
	@$results = mysql_query($sqls);

}
if(@$_POST['dall']){

	//删除超级管理外的所有用户
	$sql = "delete from bbs_user where level>0";
	$result = mysql_query($sql);
}


if($result){
	echo '<script type="text/javascript">alert("删除用户信息成功!");window.location="list.php";</script>';
}else{
	echo '<script type="text/javascript">alert("删除用户信息失败!");window.location="list.php";</script>';

}

mysql_close();
