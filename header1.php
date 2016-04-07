

<header>
			<div>
				<div id=top>
				    <div id=tp1 >
				    		<img src="./static/images/log.jpg" alt="">
					</div>
					<?php
					include('config.php');
			//判断session是否有值，以确定用户当前是否登录状态
			if(!empty($_SESSION['user'])){
			?>
					<div id=tp2><div id=tp4></div>
								<div id=tp3>
								<span><a href="#"><?php echo $_SESSION['user']['username'];?></a></span>|
								<span><a href="#">我的消息</a></span>|
								<span><a href="#">模块管理</a></span>|
								<span><a href="admin/index.php">管理中心</a></span>|
								<span><a href="user/logout.php">退出</a></span><br/>
								<span><a href="#">积分</a></span>|
								<span><a href="#">用户组</a></span>|
								

								</div>
								
							</div>
				<?php
			}else{
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
								<td><input type="checkbox" name="remember" id="" >自动登陆</td>
								<td  id=td1 style=" ">找回密码</td>
							</tr>
						<tr>
									<td>密码</td>
								<td><input type="password" name="userpwd" id=""></td>
								<td><input type="image" name="" id="" src="./static/images/dl.jpg" style="margin-top:8px"></td>
								<td id=td1 width=70px><a href="user/register.php" style="font-weight:bold " >立即注册</a></td>
							</tr>
						</table>
					</form>
				</div>
					<?php
						}
					?>
					
					<div style="clear:left">
						
						<div id=lt ><a href="index.php" style="color:white">论坛</a></div>
						<div id=kj>快捷导航&nbsp

								<div id=kjy></div>
						 </div>
					</div>
					<div id=ss style="clear:left">
						<div id=ss1>
							
							<input type="seach" name="" id="" size=50>
							<div id=ss11>	
								<div id=ss12></div>
								<div id=ss13>
									<span><a href="#">帖子</a><br/></span>
									<span><a href="#">用户</a><br/></span>
								</div>
								
							</div>				
						</div>
						<div id=ss2>
							<div id=ss21>
							<input type="image" src="static/images/rs.jpg" alt="">
							</div>
							<div id=ss22>热搜:
							<span><a href="#" style="color:#336699">活动</a></span>
							<span><a href="#" style="color:#336699">交友</a></span>
							<span><a href="#" style="color:#336699">discuz</a></span>
										
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>