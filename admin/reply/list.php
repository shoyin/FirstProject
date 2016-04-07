<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="../../static/css/ft.css" />
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
		#td10{
			text-align:center;
		}

</style>
</head>
<body>
<form action="search.php?" method="post">
	
	搜索回帖：<input type="search" name="search" id="">
				<input type="submit" value="search" id="">
</form>
<?php
include '../../config.php';
	echo '<table>';
	echo '<tr>';
	echo '<th>ID</th>';
	echo '<th>回复标题</th>';
	echo '<th>回复内容</th>';
	echo '<th>回帖用户</th>';
	echo '<th>原帖</th>';
	echo '<th>回帖时间<br>修改时间</th>';
	echo '<th>公开</th>';
	echo '<th>IP</th>';
	echo '<th>操作</th>';
	echo '</tr>';

//当前页
if(intval(@$_GET['page'])==0){
	$page=1;
}else{
	@$page=$_GET['page'];
}

//sql查询
$sql = "select * from reply ";
$result = mysql_query($sql);

// 定义每页显示数据的条数
$pagesize =6;
$total=mysql_num_rows($result);

// 获取总页数
$pagecount = ceil($total/$pagesize);

// 计算limit偏移量
$offset = ($page-1)*$pagesize;

//处理首尾
$prepage = ($page-1)<=0 ? 1:$page-1;
$nextpage = ($page+1)>=$pagecount ? $pagecount : $page+1;
	
	$sql = "select * from reply order by cid desc  limit $offset,$pagesize";
	$result = mysql_query($sql);
	if($result && mysql_num_rows($result)>0){
		while($row = mysql_fetch_assoc($result)){
		
		echo '<tr>';
		echo '<td>'.$row['id'].'</td>';
		echo '<td>'.$row['title'].'</td>';
		echo '<td>'.$row['content'].'</td>';
		echo '<td>'.$row['uid'].'</td>';
		echo '<td>'.$row['cid'].'</td>';
		echo '<td>'.date("Y-m-d H:m:s ",$row['posttime']).'<br>'.date("Y-m-d H:m:s ",$row['edittime']).'</td>';
		echo '<td>'.$row['isopen'].'</td>';
		echo '<td>'.long2ip($row['ip']).'</td>';

		$sqlt="select * from content where id={$row['cid']}";
		$rest=mysql_query($sqlt);
		$rowt=mysql_fetch_assoc($rest);
		
	?>

		<td>
			
			<a href="delete.php?id=<?php echo $row['id'];?>" onclick="return confirm('你确定要删除吗?');">删除</a>
		</td>
	<?php
		echo '</tr>';
	}
}
?>			
	<tr><td id=td10 colspan=8>
		
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