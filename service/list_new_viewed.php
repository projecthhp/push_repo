<?
include("../home/config.php");
$use_id = getValue("use_id","int","GET",0);
$use_id = (int)$use_id;
$start = getValue("start","int","GET",0);
$start = (int)$start;
$current = getValue("curent","int","GET",20);
$current = (int)$current;

if($use_id > 0)
{
	$r = array();
	$db_qr = new db_query("SELECT new_title,usc_company,usc_name,usc_logo,new_money,new_city,new_han_nop,new_view_count,new_create_time,new_update_time,usc_create_time,new_hot,new_id FROM new JOIN user_company ON new_user_id = user_company.usc_id JOIN view ON new.new_id = view.id_affected WHERE id_user = ".$use_id." ORDER BY create_date DESC LIMIT ".$start.",".$current);
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