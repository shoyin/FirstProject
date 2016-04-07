<?php
include '../../config.php';

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="../../static/css/ft.css" />
	<link rel="stylesheet" type="text/css" href="../../static/css/top.css" />
	<style>
		table{
			width:900px;
			border:1px solid #ededed;
			text-align:center;
		}
		table th{
			border-top:1px solid #ededed;
			border-bottom:1px solid #ededed;
		}
		table td{
			border:1px solid #ededed;
			/*border-bottom:1px solid #ededed;*/
		}
		#td10{
			text-align:center;
		}

</style>
</head>
<body>
<form action="search.php?" method="post">
	
	搜索用户：<input type="search" name="search" id="">
				<input type="submit" value="search" id="">
</form>

<?php

//当前页
if(intval(@$_GET['page'])==0){
	$page=1;
}else{
	@$page=$_GET['page'];
}

// 定义每页显示数据的条数
$pagesize =6;

//查询所有用户信息
$sql = "select * from bbs_user";
$result = mysql_query($sql);

//信息总量
$total=mysql_num_rows($result);

// 获取总页数
$pagecount = ceil($total/$pagesize);

// 计算limit偏移量
$offset = ($page-1)*$pagesize;

//处理首尾
$prepage = ($page-1)<=0 ? 1:$page-1;
$nextpage = ($page+1)>=$pagecount ? $pagecount : $page+1;

//判断结果集，遍历显示用户信息到表格里

	echo '<table>';
	echo '<tr>';
	echo '<th>ID</th>';
	echo '<th>头像</th>';
	echo '<th>用户名</th>';
	echo '<th>性别</th>';
	echo '<th>email</th>';
	echo '<th>注册时间</th>';
	echo '<th>最后登录时间</th>';
	echo '<th>ip</th>';
	echo '<th>等级</th>';
	echo '<th>积分</th>';
	echo '<th>操作</th>';
	echo '</tr>';

	//遍历结果到行
	$sql = "select * from bbs_user order by regtime asc limit $offset,$pagesize";
	$result = mysql_query($sql);
	if($result && mysql_num_rows($result)>0){
		while($row = mysql_fetch_assoc($result)){
		echo '<tr>';
		echo '<td>'.$row['id'].'</td>';
		echo '<td><img src="../../static/uploads/'.$row['headpic'].'"width="75" height="60"></td>';
		echo '<td>'.$row['username'].'</td>';
		echo '<td>';
		if($row['sex']==0){echo "保密";}elseif($row['sex']==2){echo "男";}elseif($row['sex']==1){echo "女";}
		echo'</td>';
		echo '<td>'.$row['email'].'</td>';
		echo '<td>'.date('Y-m-d H:i:s',$row['regtime']).'</td>';
		echo '<td>'.date('Y-m-d H:i:s',$row['lastlogin']).'</td>';
		echo '<td>'.long2ip($row['lastip']).'</td>';
		echo '<td>';
		if($row['level']==0){echo "超级管理";}elseif($row['level']==1){echo "版主";}elseif($row['level']==2){echo "会员";}else{echo "新人";}
		echo '</td>';
		echo '<td>'.$row['money'].'</td>';
		echo '<td><a href="edit.php?id='.$row['id'].'">修改</a><br><a href="delete.php?id='.$row['id'].'">删除</a><br><a href="dall.php?id='.$row['id'].'">批量删除</a></td>';
		echo '</tr>';

		
	}
}
?>		
	<tr><td id=td10 colspan=11>
		
			<a href="?page=1">首页</a>|
			<a href="?page=<?php echo $prepage;?>">上一页</a>|
			<a href="?page=<?php echo $nextpage?>">下一页</a>|
			<a href="?page=<?php echo $pagecount;?>">尾页</a>
			当前是第<?php echo $page;?>页/共<?php echo $pagecount;?>页|
			总共<?php echo $total;?>信息
		
		</td>
	</tr>

<?php
echo '</table>';

//释放结果集，关闭数据库链接
mysql_free_result($result);
mysql_close();
?>
	
</body>
</html>