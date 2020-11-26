<?
include("../home/config.php");

$use_id = getValue("use_id","int","GET",0);
$use_id = (int)$use_id;
$rows = array();
if($use_id != 0)
{
    $sql = "SELECT new_id FROM tbl_luutin JOIN new ON tbl_luutin.id_tin = new.new_id WHERE id_uv = '".$use_id."'";
    $db_qr = new db_query($sql);
    while($r = mysql_fetch_assoc($db_qr->result))
    {
        $rows[] = $r;
    }
    echo json_encode($rows);
}
?>

