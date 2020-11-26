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
	$db_qr = new db_query("SELECT new.new_id,new_money,new_city,new_cap_bac,new_update_time,new_title,new_nganh,new_han_nop,new_view_count,new_hot,new_renew,COUNT(nop_ho_so.nhs_new_id) as count_submit FROM new LEFT JOIN nop_ho_so ON new.new_id = nop_ho_so.nhs_new_id WHERE new_user_id = $usc_id GROUP BY new.new_id LIMIT ".$start.",".$current);
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