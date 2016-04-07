<?php
include '../../config.php';
include '../../common/upload.php';

//判断上传文件是否为空
if(!empty($_FILES['headpic']['name'])){

	//执行上传操作，返回头像文件名称。
	 $_POST['logo']=upfile($_FILES['headpic'],$path='../../static/uploads/')['filename'];
}

//过滤掉空的表单数据
foreach($_POST as $k=>$v){
	if($_POST[$k]==''){
		unset($_POST[$k]);
	}
}


//将$_POST 发送过来的数据转换成 字段='值' 的方式，存放在一个数组中
foreach($_POST as $k=>$v){
	$list[]=$k."='$v'";//字段='值';
}

//将$list中的数据拼接成 字段1='值1',字段2='值2'...
$list = join(',',$list);

//update bbs_user set username='jack',sex=1,userpwd='23245dsartwrg'
$sql = "update webmsg set $list where id=1";
$result = mysql_query($sql);

if($result && mysql_affected_rows()>0){
	echo '<script type="text/javascript">alert("修改信息成功!");window.location="./list.php";</script>';
}else{
	echo '<script type="text/javascript">alert("你就让我看这个？");window.history.back();</script>';

}

mysql_close();
