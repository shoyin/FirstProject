<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>帖子列表</title>
	<link rel="stylesheet" href="./static/css/top.css" type="text/css" />
	
	<link rel="stylesheet" href="./static/css/lbxq.css" type="text/css" />
	<style type="text/css">
	*,body{
		margin:0px auto;
		text-align:center;
	}
	.top{
		height:30px;
		
		background:#F2F2F2;
		font-size:12px;
		line-height:30px;
		border:1px #CECED0 solid;
	}
	ul{
		list-style-type:none;
		padding:0px;
	div{
		float:left;
		overflow:hidden;
	}
	td{
		float:left
	}

	}
	li{
		float:left;margin-left:10px;
	}
		

	#t{
		min-width:960px;
		width:960px;
		height:30px;
	}
	#top{
		height:160px;
		width:960px;
		background:url("./static/images/topb.jpg" ) repeat left top;
	
	}
	#tp1{
		float:left; 
	background:url("./static/images/log.jpg" ) no-repeat ;
	margin-top:5px;
	height:80px;
	width:145px;
	line-height:30px;
	}
	#tb1{
		
	     margin-top:7px;
           border-collapse:collapse;
		height:45px;
		width:350px;
		float:right;
	}
	a:link{
		text-decoration:none;
		color:#336699;
	}
	#lt{
		height:33px;
		width:60px;
		background:#1A51B1;
		float:left;
		font-weight:bold;
		line-height:30px;
		font-size:16px;


	}
	#kj{
		margin-top:4px;
		margin-right:4px;
		line-height:30px;
		width:115px;
		height:25px;
		background:url("./static/images/kj1.jpg" ) no-repeat;
		font-weight:bold;
		color:#336699;
		float:right;
	}
	#kj:hover{
		background:url("./static/images/kj2.jpg" ) no-repeat;
		display:block;

	}
	#kj:hover div{
		float:right;
		height:300px;
		width:600px;
		border:1px solid #ededed;
		background:white;
		display:block;
	}
	#kjy{
		height:60px;
		width:60px;
		
		display:none;
	}
	#ss{height:45px;
		
		
	}
	#ss1{
		
		margin-top:5px;
		padding-top:3px;
		margin-left:15px;
		height:30px;
		width:470px;
		background:url("./static/images/ss.jpg" ) no-repeat;
		text-align:left;
		float:left

	}
	#ss1>input{
		margin-left:3px;
		border:0px;
		height:22px;
		resize:none;
	}
	#ss11{
		height:30px;
		width:58px;
		float:right;
		text-align:left;
		line-height:30px;
		color:#939192;

	}
	#ss11:hover div{
		display:block;
	}
	#ss12{
		height:30px;
		width:58px;
	}
	#ss13>span{
		border-bottom:1px solid #DDDDDF;
	}
	#ss13{
		border:1px solid #DDDDDF;
		display:none;
	}
	#ss2{
		margin-top:5px;
		margin-left:10px;
		
		line-height:30px;
		height:30px;
		float:left;
	}

	#ss21{
		
line-height:10px;
		height:30px;
		float:left;
	}
		#ss22{
		margin-left:10px;
		
		line-height:30px;
		font-size:12px;
		font-weight:bold;
		height:30px;
		float:left;
	}
	span{
		font-size:10px;
		font-weight:normal;
	}
	#td1{
		border:1px solid #E5EDF2;
		border-right-width:0px;
		border-top-width:0px;
		border-bottom-width:0px;

	}
	main{
		margin-top:10px;
		width:960px;
		height:auto;
		clear:both;
	}

	footer{
		width:960px;
		height:auto;
		clear:both;
	}
	#f0{
		
		width:960px;
		height:25px;
		

	}
	#f1{
		float:left;
		width:500px;
		height:25px;
		
		text-align:left;

	}
	#f2{
			
		line-height:25px;
		float:right;
	}
	#f3{float:right;
		overflow:hidden;
		height:25px;
		width:25px;
		background:url("./static/images/qq.jpg" ) repeat  -5px -5px;
	}
	#d0{

		width:960px;
		height:60px;
		
	}
	#d1{
		float:left;
		width:500px;
		text-align:left;
	}
	#d2{
		float:right;
		text-align:right;
	}

	.m33{
	clear:both;
	margin-top:10px;
	width:960px;
	height:35px;
	
	background:url("./static/images/ft.jpg") no-repeat;

	
}
.m3311{

	height:30px;
	width:70px;
	
	
	background:url("./static/images/fh.jpg") no-repeat;
}
.m331{
	height:30px;
	width:68px;
	float:right;
	
	

}
.m331:hover div{
	display:block;
}
.m3312{
	height:100px;
	width:300px;
	border:1px red solid;
	float:right;
	display:none;

}
#m343{

	background:url("./static/images/m343.jpg") no-repeat  -5px ;
}
#m3111{
	width:80px;
	height:36px;
	float:left;
	margin-left:85px;
}
	</style>
</head>
<body>
	<div class="top ul li ">
		<div id=t>
			<ul >
				<li >设为首页</li>
				<li >收藏本站</li>
			</ul>
		</div>
		<header>
			<div>
				<div id=top>
				    <div id=tp1 >
				    		<img src="./static/images/log.jpg" alt="">
					</div>
					<div id=tp2>
						<table id=tb1>
							<tr>
								<td style="width:70">用户名</td>
								<td  style="width:160"><input type="text" name="" id=""></td>
								<td><input type="checkbox" name="" id="" >自动登陆</td>
								<td  id=td1 style=" ">找回密码</td>
							</tr>
							<tr>
								<td>密码</td>
								<td><input type="password" name="" id=""></td>
								<td><input type="image" name="" id="" src="./static/images/dl.jpg" style="margin-top:8px"></td>
								<td id=td1><a href="#" style="font-weight:bold ">立即注册</a></td>
							</tr>
						</table>
					</div>
					<div style="clear:left">
						
						<div id=lt><a href="#" style="color:white">论坛</a></div>
						<div id=kj>快捷导航&nbsp

								<div id=kjy></div>
						 </div>
					</div>
					<div id=ss style="clear:left">
						<div id=ss1>
							
							<input type="seach" name="" id="" size=53>
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
							<input type="image" src="./static/images/rs.jpg" alt="">
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
<!--topend-->
        <main>
			
			<div class=m33>
							<div id=m3111><a href="#"><img src="./static/images/hf.jpg" alt=""></a></div>
							<div class=m331>
									
									<div class=m3311></div>
									<div class=m3312></div>
							</div>
			</div>

			<div class=m4>
					
					<span><a href="#">删除主题</a></span>
					<span><a href="#">升降</a></span>
					<span><a href="#">置顶</a></span>
					<span><a href="#">直播</a></span>
					<span><a href="#">高亮</a></span>
					<span><a href="#">精华</a></span>
					<span><a href="#">图章</a></span>
					<span><a href="#">图标</a></span>
					<span><a href="#">关闭</a></span>
					<span><a href="#">移动</a></span>
					<span><a href="#">分类</a></span>
					<span><a href="#">复制</a></span>
					<span><a href="#">合并</a></span>
					<span><a href="#">分割</a></span>
					<span><a href="#">修复</a></span>
					<span><a href="#">警告</a></span>
					<span><a href="#">屏蔽</a></span>
					<span><a href="#">标签</a></span>
					


			</div>
			<div id=m5>
				<div id=m51>
					<table id=t1>
						<tr >  <td class=t2><span>查看：1</span>|<span>回复：1</span></td><td class=t3><div style="float:left">我是个很nb的帖子<a href="#">[复制连接]</a></div></td></tr>
						<tr >  <td id=t4>admin</td><td class=t3><img src="./static/images/fb.jpg" alt=""></td></tr>
						<tr >  <td id=t4 rowspan=3><img src="./static/images/tx.jpg" alt=""></td><td class=t3  rowspan=9></td></tr>
						<tr >  </tr>
						<tr >  </tr>
						<tr  style="height:50">  <td class=t2><table><tr><td>1</td><td>1</td><td>1</td><tr/>
						<tr><td>主题</td><td>帖子</td><td>积分</td><tr/>
						</table></td></tr>

						<tr >  <td class=t2>管理员</td></tr>
						<tr >  <td class=t2><img src="./static/images/ty.jpg" alt=""></td></tr>
						<tr >  <td class=t2>积分     15</td></tr>
						<tr >  <td class=t2><span><a href="#">IP</a></span>
											<span><a href="#">编辑</a></span>
											<span><a href="#">禁止</a></span>
											<span><a href="#">帖子</a></span>
											<span><a href="#">清理</a></span>


								</td>
						</tr>
						<tr >  <td class=t2></td></tr>
						

						







					</table>



				</div>

			</div>


			<div class=m4>
					
					<span><a href="#">删除主题</a></span>
					<span><a href="#">升降</a></span>
					<span><a href="#">置顶</a></span>
					<span><a href="#">直播</a></span>
					<span><a href="#">高亮</a></span>
					<span><a href="#">精华</a></span>
					<span><a href="#">图章</a></span>
					<span><a href="#">图标</a></span>
					<span><a href="#">关闭</a></span>
					<span><a href="#">移动</a></span>
					<span><a href="#">分类</a></span>
					<span><a href="#">复制</a></span>
					<span><a href="#">合并</a></span>
					<span><a href="#">分割</a></span>
					<span><a href="#">修复</a></span>
					<span><a href="#">警告</a></span>
					<span><a href="#">屏蔽</a></span>
					<span><a href="#">标签</a></span>
					


			</div>
			<div class=m33>
							<div id=m3111><a href="#"><img src="./static/images/hf.jpg" alt=""></a></div>
							<div class=m331>
									
									<div class=m3311></div>
									<div class=m3312></div>
							</div>
			</div>

			<div id=m55>
				          <div id=m555><img src="./static/images/tx.jpg" alt=""></div>
							<div id=m352>

									<form action="" >
										
										<input type="text" name="" id="" size=50>你还可以输入80个字符
										<textarea name="" id="" cols="60" rows="8"></textarea><br/>

										验证码<input type="text" name="" id="" size=15><a href="#">换一个</a><br/>
										<input type="image" src="./static/images/fbtz.jpg" name="" id="">
										
									</form>

							</div>
					</div>


			</div>


			</div>

             
 </main>
 

<footer><div id=h1></div>
	<div id=f0>
		<div id=f1>Powered by <a href="#">Discuz! </a>X3.1</div>
		 <div id=f3 ></div>
		<div id=f2 >

			<span><a href="#">Archiver</a></span>|
			<span><a href="#">手机版</a></span>|
			<span><a href="#">小黑屋</a></span>|

			<span><a href="#">Comsenz Inc. </a></span>
			
		 </div>
		
	</div>
      <div id=d0>
		<div id=d1>&copy 2001-2013 <a href="#">Comsenz Inc.</a></div>
		<div id=d2>GMT+8, 2014-3-19 23:00 , Processed in 0.133008 second(s), 22 queries .</div>
      </div>

</footer>
</body>
</html>