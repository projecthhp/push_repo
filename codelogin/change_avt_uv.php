<?
	session_start();
	include_once('../home/config.php');
	if(isset($_POST['Submit']) && isset($_COOKIE['UID']) && isset($_FILES['avatar']))
	{
		$path = "../pictures/";
		$url = getValue('url','str','POST','/ung-vien/ho-so-online.html');
		$sl = new db_query("SELECT use_create_time,use_logo FROM user WHERE use_id = ".$_COOKIE['UID']);
		$row = mysql_fetch_assoc($sl->result);

		$allowTypes = array('jpg','png','jpeg','gif','jfif','PNG','JPG');
		$type = pathinfo($_FILES["avatar"]["name"],PATHINFO_EXTENSION);

		$path_tmp = $_FILES['avatar']['tmp_name'];

		$file_name = $_FILES['avatar']['name'];
		$file_name = reset(explode('.', $file_name));		
		
		if(in_array($type, $allowTypes))
		{
			$year = date('Y',$row['use_create_time']);
			$month =  date('m',$row['use_create_time']);
			$day = date('d',$row['use_create_time']);

			if(!file_exists($path.$year))
			{
				mkdir($path.$year);
			}
			if(!file_exists($path.$year.'/'.$month))
			{
				mkdir($path.$year.'/'.$month);
			}
			if(!file_exists($path.$year.'/'.$month.'/'.$day))
			{
				mkdir($path.$year.'/'.$month.'/'.$day);
			}
			$file_name = $_FILES['avatar']['name'];
			$file_name = reset(explode('.', $file_name));
			$file_name = replaceTitle(urldecode($file_name));
			
			$pathfull = $path.$year.'/'.$month.'/'.$day.'/';
			
			if(move_uploaded_file($path_tmp, $pathfull.$_FILES['avatar']['name']))
			{
				$filename = $_FILES['avatar']['name'];
				rename($pathfull.$filename,$pathfull.$file_name.'.'.$type);
				if(is_file(geturlimageAvatar($row['use_create_time']).$row['use_logo']))
				{
					unlink(geturlimageAvatar($row['use_create_time']).$row['use_logo']);
				}
				$db_upload = new db_query(" UPDATE user
											SET use_logo = '".$file_name.'.'.$type."', use_update_time = '".time()."'
											WHERE use_id = ".$_COOKIE['UID']);
				
				redirect($url);
			}
			else
			{
				$_SESSION['error'] = "Có lỗi xảy ra khi upload ảnh đại diện, vui lòng thử lại";
				redirect($url);
			}
			if($_FILES['avatar'] > 0)
			{
				$_SESSION['error'] = "Có lỗi xảy ra, vui lòng thử lại";
				redirect($url);
			}
		}
		else
		{
			$_SESSION['error'] =  "Ảnh đại diện của bạn không đúng định dạng";
			redirect($url);
		}
	}
	else
	{
		echo "Nghi vấn hack";die;
	}
?>