<?
include("../home/config.php");

$usc_id = getValue("usc_id","int","GET",0);
$usc_id = (int)$usc_id;
$start = getValue("start","int","GET",0);
$start = (int)$start;
$current = getValue("curent","int","GET",20);
$current = (int)$current;
$rows = array();
if($usc_id != 0)
{
    $sql = "SELECT user.use_id,use_name,use_job_name,use_create_time,use_update_time,use_logo,gender,use_city,use_district_job,use_view_count,salary FROM user JOIN tbl_luuhoso_uv ON user.use_id = tbl_luuhoso_uv.id_uv WHERE id_ntd = '".$usc_id."' LIMIT ".$start.",".$current;
    $db_qr = new db_query($sql);
    while($r = mysql_fetch_assoc($db_qr->result))
    {
        $rows[] = $r;
    }
    echo json_encode($rows);
}
?>

