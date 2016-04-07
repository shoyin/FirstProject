<?php
include '../../config.php';


$uid = intval($_GET['id']);
@$id=intval($_GET['id']);
@$userid=$_GET['userid'];

//删除
$sql = "delete from content where id='$uid'";

$result = mysql_query($sql);

if($result && mysql_affected_rows()>0){
	echo '<script type="text/javascript">alert("删除帖子成功!");window.location="../../alist.php?page=0&sid='.$id.'&userid='.$userid.'";</script>';
}else{
	echo '<script type="text/javascript">alert("删除帖子失败!");window.history.back();</script>';

}


mysql_close();
