<?php
//文件上传函数
function upfile($files,$path='./')
{
	$allowsize = 5*1024*1024;
	$types = ['jpg','jpeg','png','gif','bmp'];
	$result = array('msg'=>'','filename'=>'');
	$up = $files;
	//判断一个大小
	if($up['size']>$allowsize){
		$result['msg'].='文件大小超过5M限制<br />';
	}
	//判断一下格式
	$hz = pathinfo($up['name'],PATHINFO_EXTENSION);
	if(!in_array($hz,$types)){
		$result['msg'].="只能上传jpg,jpeg,png,gif<br />";
	}

	//判断一下上传过程中有无错误
	switch($up['error']){ 
		case 1:
			$result['msg'].="上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值。 ";
			break;
			case 2:
				$result['msg'].='上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。';
				break; 
			case 3:
				$result['msg'].='文件只有部分被上传。 ';
				break;
			case 4:
				$result['msg'].='没有文件被上传。 ';
				break;
			case 6:
				$result['msg'].='找不到临时文件夹。PHP 4.3.10 和 PHP 5.0.3 引进。'; 
				break;
			case 7:
				$result['msg'].='文件写入失败。PHP 5.1.0 引进。 ';
				break;
	}

	if(!empty($result['msg'])){
		return $result;
		exit();
	}
	//判断是否是通过form表单提交的数据
	if(is_uploaded_file($up['tmp_name'])){

		$newname = date("Ymd").uniqid().rand().'.'.$hz;

		//移动已经上传的文件到指定位置
		if(move_uploaded_file($up['tmp_name'],rtrim($path,'/').'/'.$newname)){
			$result['msg'].='文件上传成功，上传后的文件名是:'.$newname;
			$result['filename']=$newname;
		}
	}


	return $result;
}
