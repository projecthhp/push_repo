<?
include("../home/config.php");
$userid = getValue("id_user","int","GET",0);
$userid = (int)$userid;
$user_type = getValue("type_user","str","GET",0);
$user_type = (int)$user_type;
$start = getValue("start","int","GET",0);
$start = (int)$start;
$current = getValue("curent","int","GET",20);
$current = (int)$current;
$sql = '';
if($userid > 0 && $user_type > 0)
{
	//notifyType = 2 là thông báo từ hệ thống
$sql = "SELECT * FROM `notify` as n WHERE n.`UserID` = '".$userid."' AND (n.`UserType` = '".$user_type."' OR n.`NotifyType` = 2)";
$sql .= " LIMIT ".$start.",".$current;
	$db_qr = new db_query($sql);
	$tg1=array();
	if(mysql_num_rows($db_qr->result) > 0)
	{
		While($row = mysql_fetch_assoc($db_qr->result))
		{
			$tg2 = array();
			$notify_item = $row;
			switch ($user_type) {
				case "1":
					//ứng viên
					$id = $row['AffectedID'];
					$query2="SELECT usc_company,usc_id,usc_logo,usc_create_time FROM user_company WHERE usc_id = '".$id."' LIMIT 1";
					$db_qr2 = new db_query($query2);
					if (mysql_num_rows($db_qr2->result) > 0){
						$company = mysql_fetch_object($db_qr2->result);
					}
					break;
				default:
					//nhà tuyển dụng
					$id = $row['AffectedID'];
					$query2="SELECT use_name,use_id,use_logo,use_job_name,use_create_time FROM user WHERE use_id = '".$id."' LIMIT 1";
					$db_qr2 = new db_query($query2);
					if (mysql_num_rows($db_qr2->result) > 0){
						$employee = mysql_fetch_object($db_qr2->result);
					}
			}
			$tg2['notify_item']=$notify_item;
			$tg2['employee']=$employee;
			$tg2['company']=$company;
			$tg1[] = $tg2;
		}
		echo json_encode($tg1);
	}
	else
	{
		echo json_encode($tg1);
	}
}
else
{
	echo json_encode($tg1);
}
?>
