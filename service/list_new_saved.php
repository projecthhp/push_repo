<?
include("../home/config.php");

$use_id = getValue("use_id","int","GET",0);
$use_id = (int)$use_id;
$start = getValue("start","int","GET",0);
$start = (int)$start;
$current = getValue("curent","int","GET",20);
$current = (int)$current;
$rows = array();
if($use_id != 0)
{
    $sql = "SELECT new_title,usc_company,usc_name,usc_logo,new_money,new_city,new_han_nop,new_view_count,new_create_time,new_update_time,usc_create_time,new_hot,new_id FROM tbl_luutin JOIN new ON tbl_luutin.id_tin = new.new_id JOIN user_company ON new_user_id = user_company.usc_id WHERE id_uv = '".$use_id."' LIMIT ".$start.",".$current;
    $db_qr = new db_query($sql);
    while($r = mysql_fetch_assoc($db_qr->result))
    {
        $rows[] = $r;
    }
    echo json_encode($rows);
}
?>

