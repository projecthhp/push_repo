<?php
/**
 * Created by PhpStorm.
 * User: hungha
 * Date: 1/28/19
 * Time: 11:20
 */
//sleep(2);
include("db.php");
require_once __DIR__ . '/firebase.php';

$sqlSend = "SELECT use_id,address FROM user WHERE update_latlng = 0 ORDER BY use_id DESC LIMIT 1";
$resultSend = $conn->query($sqlSend);
$total = $resultSend->num_rows;
if ($total > 0) {
// output data of each row
    $rowSend = $resultSend->fetch_assoc();

    $firebase = new Firebase();
    $ret = array();

    $address = $rowSend['address'];
    $id = $rowSend['use_id'];

    $res = $firebase->get_lat_long($address);
    $result = json_decode($res, true);
    // var_dump($result);
    if ($result['kq']) {
        $lat = $result['data']['lat'];
        $long = $result['data']['long'];
        $sqlupdate = "UPDATE user SET use_lat = '".$lat."', use_long = '".$long."', update_latlng = 1 WHERE use_id=$id";
        if ($conn->query($sqlupdate) === TRUE) {
            echo $result['kq'];
            // echo $res;
            // var_dump($res);
//                echo "Complete: " . ($complete += 1) . "/" . $total .date('d/m/Y - H:i:s'). "<br>";
//                echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        $sqlupdate = "UPDATE user SET update_latlng = 1 WHERE use_id=$id";
        $conn->query($sqlupdate);
        $query = "INSERT INTO get_map_error(id_user,type,create_date) VALUES ('" . $id . "',2,NOW())";
        $conn->query($query);
        echo $result['kq'];
    }
}
?>