<?
include("../home/config.php");
$usc_id = getValue("usc_id","int","GET",0);
$usc_id = (int)$usc_id;
$start = getValue("start","int","GET",0);
$start = (int)$start;
$current = getValue("curent","int","GET",20);
$current = (int)$current;

if($usc_id > 0)
{
	$r = array();
	$db_qr = new db_query("SELECT user.use_id,use_name,use_job_name,use_create_time,use_update_time,use_logo,gender,use_city,use_district_job,use_view_count,salary FROM user JOIN view ON user.use_id = view.id_affected WHERE id_user = ".$usc_id." ORDER BY create_date DESC LIMIT ".$start.",".$current);
	if(mysql_num_rows($db_qr->result) > 0)
	{
		While($row = mysql_fetch_assoc($db_qr->result))
		{
		    $r[] = $row;
		}
	}
	echo json_encode($r);

}
?>