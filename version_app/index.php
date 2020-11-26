<?php
/**
 * Created by PhpStorm.
 * User: hungha
 * Date: 1/28/19
 * Time: 11:20
 */
//sleep(2);
include("db.php");
$name_app = isset($_GET['name_app']) ? $_GET['name_app'] : '';
if ($name_app != ''){
    $sqlSelect = "SELECT * FROM app_version WHERE name_app='".$name_app."' LIMIT 1";
    $result = $conn->query($sqlSelect);
    echo json_encode($result->fetch_assoc());
}
?>