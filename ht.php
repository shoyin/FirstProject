<script type="text/javascript">
		window.UEDITOR_HOME_URL = "/bbs/static/js/ueditor/";
	</script>
	<script type="text/javascript" src="./static/js/ueditor/ueditor.config.js"></script>
	<script type="text/javascript" src="./static/js/ueditor/ueditor.all.js"></script>
<div class="fum-bk1 fum-bk2 clearfix"> 
		 <div class="fum-bk1-left">
         </div>
		 <div class="fum-bk1-right1">
		 <form action="./admin/reply/insert.php?pagecount=<?php echo $pagecount;?>&userid=<?php echo $uid;?>" method="post">
					<input type="hidden" name="cid" id=""value="<?php echo $row['id'];?>">
					<input type="hidden" name="pt" id=""value="<?php echo $row['postime']?>">
		   	<p>re:<input type="text" name="title" id="">
			 <textarea class="sty2" name="content" cols="" rows="" id="content"></textarea>
			 </p>
			
			<p class="pl-20 ">
			<input type="submit" value="发表回复" name="" class="sub-sty"><em><input class="chec-sty" name="last" type="checkbox" value="1">回帖后跳转到最后一页</em>
			</p>
		</form>
		 </div>
	    </div> 
</div>

<script type="text/javascript">
//初始化编辑器，设定显示的按钮
	UE.getEditor('content',{initialFrameHeight:103,initialFrameWidth:630,toolbars:[
            ['bold',  'insertimage', 'emotion',]
        ] });
</script>
