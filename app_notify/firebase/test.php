<html>
<head>
    <title>AndroidHive | Firebase Cloud Messaging</title>
    <!--        <meta http-equiv="refresh" content="3600"/>-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="//www.gstatic.com/mobilesdk/160503_mobilesdk/logo/favicon.ico">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">

    <style type="text/css">
        body {
        }

        div.container {
            width: 1000px;
            margin: 0 auto;
            position: relative;
        }

        legend {
            font-size: 30px;
            color: #555;
        }

        .btn_send {
            background: #00bcd4;
        }

        label {
            margin: 10px 0px !important;
        }

        textarea {
            resize: none !important;
        }

        .fl_window {
            width: 400px;
            position: absolute;
            right: 0;
            top: 100px;
        }

        pre, code {
            padding: 10px 0px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            webkit-box-sizing: border-box;
            display: block;
            white-space: pre-wrap;
            white-space: -moz-pre-wrap;
            white-space: -pre-wrap;
            white-space: -o-pre-wrap;
            word-wrap: break-word;
            width: 100%;
            overflow-x: auto;
        }

    </style>
</head>
<body>
<?php
ini_set('max_execution_time', 300);
include("db.php");
// Enabling error reporting
error_reporting(-1);
ini_set('display_errors', 'On');

require_once __DIR__ . '/firebase.php';
require_once __DIR__ . '/push.php';

$firebase = new Firebase();
$push = new Push();
$ret = array();

// notification title
$title = '10 việc làm phù hợp với bạn';

// notification message
$message = isset($_GET['message']) ? $_GET['message'] : '';

// push type - single user / topic
$push_type = isset($_GET['push_type']) ? $_GET['push_type'] : '';

// whether to include to image or not
$include_image = isset($_GET['include_image']) ? TRUE : FALSE;


$push->setTitle($title);
$push->setMessage($message);
if ($include_image) {
    $push->setImage('https://api.androidhive.info/images/minion.jpg');
} else {
    $push->setImage('');
}
$push->setIsBackground(FALSE);


$sqlCity = "SELECT cit_id FROM city ORDER BY cit_count DESC";
$sqlCareer = "SELECT cat_id FROM category ORDER BY cat_count DESC";

$arrCity = array();
$arrCareer = array();

$resultCity = $conn->query($sqlCity);
// output data of each row
while ($rowCity = $resultCity->fetch_assoc()) {
    $arrCity[] = $rowCity['cit_id'];
}
$resultCareer = $conn->query($sqlCareer);
// output data of each row
while ($rowCareer = $resultCareer->fetch_assoc()) {
    $arrCareer[] = $rowCareer['cat_id'];
}

$total = 4000;
$complete = 0;

foreach ($arrCity as $cityId) {
    foreach ($arrCareer as $careerId) {
        $sql = "SELECT new_id FROM new WHERE new_city=" . $cityId . " AND new_cat_id=" . $careerId;
//                echo $sql;
//                exit();
        $result = $conn->query($sql);
        $r = array();

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                // optional payload
                $payload = array();
                $payload['start'] = $row['new_id'];
                $payload['count'] = $result->num_rows;
                $payload['type'] = 'ung_vien';
                break;
            }
        } else {
//                    echo "0 results";ư]
        }

        $push->setPayload($payload);

        $json = '';
        $response = '';

        $json = $push->getPush();
//        $json['new'] = $r;
        $res = $firebase->sendToMixTopicNew($cityId, $careerId, $json);
        if ($res != '') {
            echo "Complete: " . ($complete += 1) . "/" . $total . date('d/m/Y - H:i:s') ."<br>";
            echo $res;
        }
//        echo '<script>console.log("Your stuff here")</script>';
//        console_log($res);
//        trigger_error($res['message_id']);
//        error_log(print_r($res, TRUE));
//        echo json_encode($res);
//        sleep(10);
//        $ret['cit_' . $cityId . ' - cat_' . $careerId] = $res;
    }
}

function console_log($data)
{
    echo '<script>';
    echo 'console.log(' . json_encode($data) . ')';
    echo '</script>';
}

//for ($cityId = 1; $cityId <= $countCity; $cityId++) {
//    for ($careerId = 1; $careerId < $countCareer; $careerId++) {
////                $time = time()-3600;
//        $time = 1548386738 - 3600;
////                $sql = "SELECT new_id FROM new WHERE new_city=".$cityId." AND new_cat_id=".$careerId." AND new_update_time>=".$time;
//        $sql = "SELECT new_id FROM new WHERE new_city=" . $cityId . " AND new_cat_id=" . $careerId;
////                echo $sql;
////                exit();
//        $result = $conn->query($sql);
//        $r = array();
//
//        if ($result->num_rows > 0) {
//            // output data of each row
//            while ($row = $result->fetch_assoc()) {
//                $r[] = $row;
//            }
//        } else {
////                    echo "0 results";ư]
//        }
//
//        $json['new'] = $r;
//        $ret['cit_' . $cityId . ' - cat_' . $careerId] = $firebase->sendToMixTopicNew($cityId, $careerId, $json);
//    }
//}

echo json_encode($ret);

//        if ($push_type == 'topic') {
//            $json = $push->getPush();
//            $response = $firebase->sendToTopic('global', $json);
//        } else if ($push_type == 'individual') {
//            $json = $push->getPush();
//            $regId = isset($_GET['regId']) ? $_GET['regId'] : '';
//            $response = $firebase->send($regId, $json);
//        } else if ($push_type == 'mix_topic') {
//            $json = $push->getPush();
//            $cityId = isset($_GET['cityId']) ? $_GET['cityId'] : '';
//            $careerId = isset($_GET['careerId']) ? $_GET['careerId'] : '';
//            $response = $firebase->sendToMixTopicNew($cityId,$careerId, $json);
//        }
?>
</body>
</html>