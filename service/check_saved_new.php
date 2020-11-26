<?
include("../home/config.php");
$id_new         = getValue("id_new","int","POST",0);
$id_new         = replaceMQ($id_new);
$id_uv          = getValue("id_use","int","POST",0);
$id_uv          = replaceMQ($id_uv);
$timeaway       = time();
$result = array('data' => null, 'code' => 0, 'kq' => false);

if($id_new != 0 && $id_uv != 0)
{
    $check = new db_query("SELECT id_tin,id_uv FROM tbl_luutin WHERE id_tin = '" . $id_new . "' AND id_uv = '" . $id_uv . "'");
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
