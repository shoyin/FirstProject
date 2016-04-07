<?php
include('config.php');

//网站信息提取
$sqlw="select * from webmsg where id=1";

$resw=mysql_query($sqlw);


$roww=mysql_fetch_assoc($resw);
?>

<header>
			<div>
				<div id=top>
				    <div id=tp1 >
				    		<img src="./static/uploads/<?php echo $roww['logo'];?>" " alt=""width=119 height=80 >
					</div>
					<div id=xqxz><h1>		<?php echo $roww['webname'];?></h1></div>
			<?php
					
			//判断session是否有值，以确定用户当前是否登录状态
			if(!empty($_SESSION['user'])){

			?><?php

								$uid=intval(@$_GET['userid']);
								$uid=@$_SESSION['user']['id'];

								//获取当前用户信息
								$sql="select * from bbs_user where id={$uid}";

								$res=mysql_query($sql);
								$row=@mysql_fetch_assoc($res);




?>
					<div id=tp2><div id=tp4 ><img src="./static/uploads/<?php echo $row['headpic'];
						
						?>" alt=""width=70></div>
								<div id=tp3>
								<span><a href="#"><?php echo $row['username'];?></a></span>|
						
								<span><a href="./msg.php?id=<?php echo $row['id'];?>&userid=<?php echo $uid;?>">个人中心</a></span>|
								<span><a href="mylist.php?userid=<?php echo $uid;?>">我的帖子</a></span>|

								<?php if($row['level']<=1){?>

								<span><a href="admin/index.php?qid=<?php echo $row['id'];?>">管理中心</a></span>|
								<?php
								}
								?>
								<span><a href="user/logout.php">退出</a></span><br/>
								<span><a href="#">积分</a><?php echo $row['money'];?></span>|

								<span><a href="#">用户组</a>|<?php getlevel($row['level']); ?></span>
								

								</div>
								
							</div>
<?php
			}else{

				//判断记住密码
				if(!empty($_COOKIE['username']) && !empty($_COOKIE['userpwd'])){
					
					$username=$_COOKIE['username'];

					$userpwd=$_COOKIE['userpwd'];

					//用cookie内存储的用户名和密码，去数据库中bbs_user表中查询，

					//用户名和密码同时匹配的数据如果能查到数据，就说明该用户是注册用户
					$sql ="select * from bbs_user where username='$username' and userpwd='$userpwd'";

					//发送SQL语句，执行并返回结果
					$result = mysql_query($sql);

					//判断是否查询到结果
					if($result && mysql_num_rows($result)>0){

						$_SESSION['user'] = mysql_fetch_assoc($result);

						//是否给他赋值给$_COOKIE,以便延长记住密码时间
						header("location:index.php");
						exit;
					}
				}
			?>
				<div id=tp2>
					<form action="user/checklogin.php" method='post' style="height:80">
						<table id=tb1>
							<tr>
								<td style="width:70">用户名</td>
								<td  style="width:160"><input type="text" name="username" id=""></td>
								<td style="width:90"><input type="checkbox" name="remember" id="" >自动登陆</td>
								<td  id=td1 style=" ">找回密码</td>
							</tr>
						<tr>
									<td>密码</td>
								<td><input type="password" name="userpwd" id=""></td>
								<td><input type="submit" name="" id=""value="登陆"></td>
								<td id=td1 width=70px><a href="user/register.php" style="font-weight:bold " >立即注册</a></td>
							</tr>
						</table>
					</form>
				</div>
					<?php
						}
					?>
					
					<div style="clear:left">
						
						<div id=lt ><a href="index.php?userid=<?php echo @$row['id'];?>" style="color:white"><?php echo $roww['webname'];?></a></div>
						<div id=kj><a href="post.php?userid=<?php echo @$row['id'];?>">点我发帖</a>&nbsp

								<div id=kjy></div>
						 </div>
					</div>
					<div id=ss style="clear:left">
						<div id=ss1>
							<!-- 搜索版块 -->
							<form action="search.php?userid=<?php echo @$uid;?>" method="post">

							<input type="search" name="search" id="" size=54 placeholder="请输入搜索内容" style="width:315px;">
						
							<input type="submit" value="search">
							</form>
							<div id=ss11>	
								<div id=ss12></div>
							
								
							</div>				
						</div>
						<div id=ss2>
							<div id=ss21>
							
							</div>
							<div id=ss22>热搜:
							<span><a href="#" style="color:#336699">活动</a></span>
							<span><a href="#" style="color:#336699">交友</a></span>
							<span><a href="#" style="color:#336699">小栈</a></span>
										
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>

<?php

	function getlevel($n){

		switch($n){

			case 0: 
				echo'超级管理';
				break;
			case 1:
				echo '版主';
				break;
			case 2:
				echo '会员';
				break;
			case 3:
				echo '新人';
				break;
			default:
			break;
			}
	}
?>