<?
include("../home/config.php");

$usc_id = getValue("usc_id","int","GET",0);
$usc_id = (int)$usc_id;
$rows = array();
if($usc_id != 0)
{
    $sql = "SELECT id_uv FROM tbl_luuhoso_uv WHERE id_ntd = '".$usc_id."'";
    $db_qr = new db_query($sql);
    while($r = mysql_fetch_assoc($db_qr->result))
    {
        $rows[] = $r;
    }
    echo json_encode($rows);
}
?>

