<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="../../static/css/top.css" />
	<style>
		table{
			width:800px;
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
		#d1{
			float:right;
			text-align:center;
			
			font:12px '微软雅黑';
		}
		#td10{
		text-align:center;
		}

	</style>
</head>
<body>
<form action="search.php?" method="post">
	
	搜索版块：<input type="search" name="search" id="">
				<input type="submit" value="search" id="">
</form>

<?php
include '../../config.php';

	echo '<table>';
	echo '<tr>';
	echo '<th>ID</th>';
	echo '<th>图标</th>';
	echo '<th>版块名称</th>';
	echo '<th>所属分区</th>';
	echo '<th colspan=2>版主任命</th>';
	
	echo '</tr>';

//当前页
if(intval(@$_GET['page'])==0){
	$page=1;
}else{
	$page=$_GET['page'];
}

// 定义每页显示数据的条数
$pagesize =6;
$sqls = "select * from bbs_sclass";
$results=mysql_query($sqls);
$total=mysql_num_rows($results);

// 获取总页数
$pagecount = ceil($total/$pagesize);

// 计算limit偏移量
$offset = ($page-1)*$pagesize;

$prepage = ($page-1)<=0 ? 1:$page-1;
$nextpage = ($page+1)>=$pagecount ? $pagecount : $page+1;

//版块分区遍历
$sql = "select * from bbs_sclass order by orderno asc limit $offset,$pagesize";


$result = mysql_query($sql);

if($result && mysql_num_rows($result)>0){
	while($row = mysql_fetch_assoc($result)){
		// 获取当前版块所属的分区的id
		$pid=$row['pid'];

		// 查询所属分区信息
		$sqlb = "select id,bname from bbs_bclass where id='$pid'";
		$resultb = mysql_query($sqlb);

		if($resultb && mysql_num_rows($resultb)>0){
			$rowb= mysql_fetch_assoc($resultb);
		}


		echo '<tr>';
		echo '<td>'.$row['id'].'</td>';
		echo '<td><img src="../../static/uploads/'.$row['logo'].'" width="90" height="60"></td>';
		echo '<td>'.$row['sname'].'</td>';
		echo '<td>'.$rowb['bname'].'</td>';

		//sql查询
		$sqls="select * from bbs_user where level=1";
		$res=mysql_query($sqls);
				
	?><td>

	<form action="banadd.php?id=<?php echo $row['id'];?>" method="post">

<select name='sid' >
		<?php

		//遍历权限等级为版主用户
		if($res){
		while($rows=mysql_fetch_assoc($res)){?>

		<option value="<?php echo $rows['id'];?>"<?php if($row['banzhu']==$rows['id']){echo "selected";}?>><?php echo $rows['username'];?></option>
<?php
	}	
}
?>
	</select>
	<input type="submit" name="" id=""value="任命">
</form>
</td>
<td></td>
<?php
		echo '</tr>';
	}
}
?>		
	<tr><td id=td10 colspan=6>
		
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

mysql_free_result($result);
mysql_close();
?>
	
</body>
</html>