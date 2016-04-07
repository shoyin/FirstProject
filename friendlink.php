<?php

//查询 网站信息
$sqlw="select * from webmsg where id=1";

$resw=mysql_query($sqlw);

$roww=mysql_fetch_assoc($resw);

?>


<div id=m4>
		
			<div id=m41>
				<div id=m411> <img src="./static/uploads/<?php echo $roww['logo'];?>" " alt=""width=107 height=60> </div>
				<div id=m412>
							<div id="m4121"><a href="index.php?userid=<?php echo @$uid;?>"><?php echo @$roww['webname'];?></a></div>
							<div id=m4122><?php echo @$roww['msg'];?></div>		
				</div>

				
			</div>
			<div id=m42>
				<ul>
				<?php 

				//遍历友情链接
				$sql="select * from friendlink order by orderno asc";

				$result=mysql_query($sql);
				
				if($result && mysql_num_rows($result)>0){
					
					while($row=mysql_fetch_assoc($result)){
							$bid=$row['id'];
							if($row['isindex']==2){
							   ?>
					<li><a href="<?php echo $row['url'];?>"><?php echo $row['linkname'];?></a></li>

					<?php
						}
					}
				}?>

					
				</ul>
			</div>
		</div>