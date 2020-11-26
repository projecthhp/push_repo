<?
include("../cron/config.php");

$usc_id         = getValue("usc_id", "int", "POST", 0);
$usc_id         = (int) $usc_id;
$namefile         = getValue("namefile", "str", "POST", 0);
$time = time();
$result = array('data' => null, 'code' => 0, 'kq' => false);

$db_qrcheck = new db_query("SELECT usc_create_time,usc_logo FROM user_company WHERE usc_id = '" . $usc_id . "' LIMIT 1");
if (mysql_num_rows($db_qrcheck->result) > 0) {
  if (isset($_FILES) and $_SERVER['REQUEST_METHOD'] == "POST") {
    $path = "../pictures/";

    $row = mysql_fetch_assoc($db_qrcheck->result);

    $allowTypes = array('jpg','png','jpeg','gif','jfif');
		$type = pathinfo($_FILES["avatar"]["name"],PATHINFO_EXTENSION);

		$path_tmp = $_FILES['avatar']['tmp_name'];

		$file_name = $_FILES['avatar']['name'];
		$file_name = reset(explode('.', $file_name));		
		
		if(in_array($type, $allowTypes))
		{
			$year = date('Y',$row['usc_create_time']);
			$month =  date('m',$row['usc_create_time']);
			$day = date('d',$row['usc_create_time']);

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
				if(is_file(geturlimageAvatar($row['usc_create_time']).$row['usc_logo']))
				{
					unlink(geturlimageAvatar($row['usc_create_time']).$row['usc_logo']);
				}
        $db_upload = new db_query("  UPDATE user_company
        SET usc_logo = '" . $file_name . '.' . $type . "' 
        WHERE usc_id = " . $usc_id);

        $result = array('data' => null, 'code' => 1, 'kq' => true);
        echo json_encode($result);
      } else {
        echo json_encode($result);
      }
    } else {
      echo json_encode($result);
    }
  }
} else {
  echo json_encode($result);
}
unset($name, $db_ex);
