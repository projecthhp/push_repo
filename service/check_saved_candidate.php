<?
include("../home/config.php");
$id_usc         = getValue("id_usc", "int", "GET", 0);
$id_usc         = replaceMQ($id_usc);
$id_uv          = getValue("id_use", "int", "GET", 0);
$id_uv          = replaceMQ($id_uv);
$timeaway       = time();
$result = array('data' => null, 'code' => 0, 'kq' => false);

if($id_usc != 0 && $id_uv != 0)
{
    $check = new db_query("SELECT id_ntd,id_uv FROM tbl_luuhoso_uv WHERE id_ntd = '" . $id_usc . "' AND id_uv = '" . $id_uv . "'");
    if (mysql_num_rows($check->result) > 0) {
        $result = array('data' => null, 'code' => 1, 'kq' => true);
        echo json_encode($result);
    } else {
        echo json_encode($result);
    }
} else {
    echo json_encode($result);
}
?>
