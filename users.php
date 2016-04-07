

<div id=m3>
			<div id=m31>
				<a href="">小栈资讯</a>&nbsp&nbsp&nbsp当前用户
			
				<?php 
						//查询所有用户遍历输出
						$sqluser3="select * from bbs_user";
						$resuser3=mysql_query($sqluser3);

						if($resuser3&&mysql_num_rows($resuser3)){
							$count=0;
							while($rowuser3=mysql_fetch_assoc($resuser3)){
									
							$count++;
							}
						}
						echo $count;
					?>
			</div>
			<div id=m32>
					<div id=m321></div>
					<div id=m322> 

					<!-- 超级管理 -->
					<div  class=m323>
					<?php 

						$sqluser="select * from bbs_user where level=0";
						$resuser=mysql_query($sqluser);

						if($resuser&&mysql_num_rows($resuser)){
							while($rowuser=mysql_fetch_assoc($resuser)){
									
							echo $rowuser['username'].'&nbsp';
							}
						}

					?>
						</div>

					<!-- 版主 -->
					<div class=m323>
						<?php 

						//版主权限
						$sqluser1="select * from bbs_user where level=1";
						$resuser1=mysql_query($sqluser1);

						if($resuser1&&mysql_num_rows($resuser1)){
							while($rowuser1=mysql_fetch_assoc($resuser1)){
									
							echo $rowuser1['username'].'&nbsp';
							}
						}
					?>

					</div>	

					<!-- 会员 -->
					<div  class=m323>
						
						<?php 

						//会员
						$sqluser2="select * from bbs_user where level=2";
						$resuser2=mysql_query($sqluser2);

						if($resuser2&&mysql_num_rows($resuser2)){
							$count=0;
							while($rowuser2=mysql_fetch_assoc($resuser2)){
									
							 $count++;
							}
						}
						echo $count;
					?>
					</div>

					<!-- 新人 -->
					<div  class=m323>
						
						<?php 

						//普通用户
						$sqluser3="select * from bbs_user where level=3";
						$resuser3=mysql_query($sqluser3);

						if($resuser3&&mysql_num_rows($resuser3)){
							$count=0;
							while($rowuser3=mysql_fetch_assoc($resuser3)){
									
							$count++;
							}
						}
						echo $count;
					?>
					</div>
					</div>
			</div>
		</div>