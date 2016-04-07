<?php
include '../../config.php';
include '../../common/upload.php';
//获取用户的id
$uid = intval($_GET['id']);

//先判断用户两次输入密码是否一致
if($_POST['userpwd']!=$_POST['reuserpwd']){
	echo '<script type="text/javascript">alert("两次密码不一致");window.location="edit.php?id='.$uid.'";</script>';
	exit;
}

if($_POST['userpwd']!=''){
	$_POST['userpwd']=md5($_POST['userpwd']);
}

//判断上传文件是否为空
if(!empty($_FILES['headpic']['name'])){

	//执行上传操作，返回头像文件名称。
	 $_POST['headpic']=upfile($_FILES['headpic'],$path='../../static/uploads/')['filename'];
}

//过滤掉空的表单数据
foreach($_POST as $k=>$v){
	if($_POST[$k]==''){
		unset($_POST[$k]);
	}
}
//unset掉reuserpwd表单数据
unset($_POST['reuserpwd']);

//将$_POST 发送过来的数据转换成 字段='值' 的方式，存放在一个数组中
foreach($_POST as $k=>$v){
	$list[]=$k."='$v'";//字段='值';
}

//将$list中的数据拼接成 字段1='值1',字段2='值2'...
$list = join(',',$list);

//update bbs_user set username='jack',sex=1,userpwd='23245dsartwrg'
$sql = "update bbs_user set $list where id='$uid'";
$result = mysql_query($sql);

if($result && mysql_affected_rows()>0){
	echo '<script type="text/javascript">alert("修改用户信息成功!");window.location="../../msg.php?id='.$uid.'&userid='.$uid.'";</script>';
}else{
	echo '<script type="text/javascript">alert("你就让我看这个？");window.history.back();</script>';

}

mysql_close();
