<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>立即注册</title>
	<link rel="stylesheet" href="./static/css/top.css" type="text/css" />
	<link rel="stylesheet" type="text/css" href="static/css/zhuce.css" />
	<style type="text/css">
	*,body{

		margin:0px auto;
		text-align:center;
	}
	header{
		width:960px;
		height:160px;
		


	}
	#top{
		height:160px;
		width:960px;
		background:url("./static/images/topb.jpg" ) repeat left top;}

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
	
	#kjy{
		height:60px;
		width:60px;
		
		display:none;
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
	footer{
		width:960px;
		height:auto;
		border-top:1px solid #CDCDCD;
		margin-top:10px;
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
		<main>
		<div id=maintop>立即注册</div>
		<div>
				<table>
						<tr>
							<td class=td1>用户名：</td>
							<td class=td2><input type="text" name="username" id="" size=35></td>
						</tr>	
						<tr>
							<td class=td1>密码：</td>
							<td class=td2><input type="password" name="pwd" id="" size=35></td>
						</tr>	
						<tr>
							<td class=td1>确认密码：</td>
							<td class=td2><input type="password" name="rpwd" id="" size=35></td>
						</tr>	
						<tr>
							<td class=td1>Email：</td>
							<td class=td2><input type="email" name="" id="" size=35></td>
						</tr>	
						<tr>
							<td class=td3>验证码：</td>
							<td class=td4><input type="text" name="" id="" size=17><a href="#">换一个</a>
							<br/>请输入下图中的字符<br/>
							</td>
						</tr>
						<tr>
							<td class=></td>
							<td class=td5>
								<input type="image" src="./static/images/sumbit.jpg" name="" id="" />
							
							</td>
						</tr>		

					

				</table>
		</div>
		</main>
		<footer>
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