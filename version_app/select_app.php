<?php
/**
 * Created by PhpStorm.
 * User: hungha
 * Date: 1/28/19
 * Time: 11:20
 */
//sleep(2);
include("db.php");

$sqlSelect = "SELECT * FROM app_version";
$result = $conn->query($sqlSelect);
foreach ($result->fetch_all() as $row){
    $r = array();
    $r['id_app'] = $row[0];
    $r['name_app'] = $row[1];
    $r['version_app'] = $row[2];
    $r['note'] = $row[3];
    echo '<option value="'.$r['id_app'].'" data-tokens="'.$r['version_app'].'">'.$r['name_app'].'</option>';
}
?>