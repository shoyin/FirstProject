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

<?php
include '../../config.php';

	echo '<table>';
	echo '<tr>';
	echo '<th>ID</th>';
	echo '<th>图标</th>';
	echo '<th>版块名称</th>';
	echo '<th>所属分区</th>';
	echo '<th>排序</th>';
	echo '<th>操作</th>';
	echo '</tr>';

//当前页
if(intval(@$_GET['page'])==0){
	$page=1;
}else{
	$page=$_GET['page'];
}

//格式化
@$like=trim($_GET['search']);

if(!empty($_POST['search'])){
	$like=trim($_POST['search']);
}

// 定义每页显示数据的条数
$pagesize =5;

//查询
$sqls = "select * from bbs_sclass where sname like '%$like%'";
$results=mysql_query($sqls);
@$total=mysql_num_rows($results);

// 获取总页数
$pagecount = ceil($total/$pagesize);

// 计算limit偏移量
$offset = ($page-1)*$pagesize;

$prepage = ($page-1)<=0 ? 1:$page-1;
$nextpage = ($page+1)>=$pagecount ? $pagecount : $page+1;

$sql = "select * from bbs_sclass where sname like '%$like%' order by orderno asc limit $offset,$pagesize";


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
		echo '<td>'.$row['orderno'].'</td>';
	?>

		<td><a href="edit.php?id=<?php echo $row['id'];?>">修改</a><br><a href="delete.php?id=<?php echo $row['id'];?>" onclick="return confirm('你确定要删除吗?');">删除</a></td>
	<?php
		echo '</tr>';
	}
}
?>		
	<tr><td id=td10 colspan=6>
		
			<a href="?page=1">首页</a>|
			<a href="?page=<?php echo $prepage;?>&search=<?php echo $like;?>">上一页</a>|
			<a href="?page=<?php echo $nextpage?>&search=<?php echo $like;?>">下一页</a>|
			<a href="?page=<?php echo $pagecount;?>&search=<?php echo $like;?>">尾页</a>
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