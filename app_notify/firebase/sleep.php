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
require_once __DIR__ . '/push.php';

$sqlSend = "SELECT * FROM send_notification WHERE status = 0 LIMIT 1";

$resultSend = $conn->query($sqlSend);
$total = $resultSend->num_rows;
if ($total > 0) {
// output data of each row
    $rowSend = $resultSend->fetch_assoc();

    $firebase = new Firebase();
    $push = new Push();
    $ret = array();

// notification title
    $title = '365 Tìm việc - Công việc mới';

// notification message
    $message = isset($_GET['message']) ? $_GET['message'] : '';

    $count = $rowSend['count'];

    $message = 'Đề xuất '.$count.' công việc mới nhất phù hợp với bạn';

// push type - single user / topic
    $push_type = isset($_GET['push_type']) ? $_GET['push_type'] : '';

// whether to include to image or not
    $include_image = isset($_GET['include_image']) ? TRUE : FALSE;

    $push->setTitle(array("en" => $title,"vi" => $title));
    $push->setMessage(array("en" => $message,"vi" => $message));
    if ($include_image) {
        $push->setImage('https://api.androidhive.info/images/minion.jpg');
    } else {
        $push->setImage('');
    }
    $push->setIsBackground(FALSE);

    $payload = array();
    // $payload['start'] = 0;
    // $payload['time_start'] = $rowSend['time_start'];
    // $payload['time_end'] = $rowSend['time_end'];
    // $payload['count'] = $count;
    // $payload['type'] = 'ung_vien';
    $push->setPayload($payload);

    // $res = $firebase->sendToMixTopicMulti($rowSend['topic'], $push->getPush());
    $response = $firebase->sendMessage(json_decode($rowSend['filters']), $push->getPush());
    $return["allresponses"] = $response;
    $return = json_encode($return);
    $id = $rowSend['id'];
    $sqldelete = "DELETE FROM send_notification WHERE id=$id";
    if ($conn->query($sqldelete) === TRUE) {
        if (json_decode($response, true)['recipients'] != '') {
            echo true;
        } else {
            $data = json_decode($rowSend['filters']);
            // var_dump($data);
            echo json_encode(array($data[2]->value, $data[4]->value));
        }
    } else {
        echo "Error deleting record: " . $conn->error;
    }
	
	// print("\n\nJSON received:\n");
	// print($return);
    // print("\n");
    // var_dump(json_decode($response, true));
}
?>