<?php
// notification count hours
$count_time = (int)isset($_GET['count']) ? $_GET['count'] : 10800;
if ($count_time != 10800){
    $count_time = $count_time * 3600;
}
$num_count_hourse = $count_time/3600;

echo "Set thời gian thành công: ".$num_count_hourse." giờ";
?>
<html>
<head>
    <title>Tìm việc 365 | Quản lý thông báo</title>
    <meta http-equiv="refresh" content="<?php echo $count_time;?>"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="//www.gstatic.com/mobilesdk/160503_mobilesdk/logo/favicon.ico">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

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

    <style>
        .red{
            color: red;
        }
        .blue{
            color:blue;
        }
        .pink{
            color:pink;
        }
    </style>
    <script language="javascript">
        $(document).ready(function() {
            // Hàm hiển thị danh sách hàng task
            function display_html(num) {
                var html = '';

                html += '<table border="1" cellpadding="5">';
                html += '<tr>';
                html += '<td>Num</td>';
                html += '<td>Status</td>';
                html += '</tr>';

                for (var i = 0; i < num; i++) {
                    html += '<tr>';
                    html += '<td>' + (i + 1) + '</td>';
                    html += '<td id="waitting' + i + '" class="pink">Waitting...</td>';
                    html += '</tr>';
                }
                html += '</table>'

                $('#results').html(html);
            }

            // Hàm gửi ajax
            function send_ajax(num, index) {
                // Kiểm tra xem task đã hết chưa, nếu hết thì dừng
                if (index > (num - 1)) {
                    return false;
                }

                // Chuyển trang thái từ waitting san sendding
                $('#waitting' + index).removeClass('pink').addClass('red').html('Sending...');

                // var push = $('#push-thread').val();
                // console.log(push);

                // Gửi ajax
                $.ajax({
                    url: 'queue_send_ntd.php',
                    type: 'post',
                    contentType: "application/json",
                    dataType : 'json',
                    success: function(result) {
                            // console.log(result);
                            if (result == 1) {
                                // Sau khi thành công thì chuyển trạng thái sang finished
                                $('#waitting' + index).removeClass('red').addClass('blue');
                                $('#waitting' + index).html('Finished');
                            } else {
                                var res = 'Not Finished: No Subribed(';
                                res += result;
                                res += ')'
                                $('#waitting' + index).html(res);
                            }
                        },
                        error: function(result) {
                            // console.log(result);
                            $('#waitting' + index).html('Not Finished: Unsubribed');
                        }
                })
                    .always(function () {
                        // Xử lý task tiếp theo
                        send_ajax(num, ++index);
                    });
            }

            // Khi click gửi request
            function run() {
                // Lấy số lượng task từ user nhập vào
                var num = parseInt($('#num-thread').val());

                // Ẩn textbox và button
                // $(this).remove();
                // $('#num-thread').remove();

                console.log(num);

                // Hiển thị table danh sách task
                display_html(num);

                // gửi ajax cho lần đầu tiên (task = 1)
                send_ajax(num, 0);
            }

            run();
        });
    </script>
</head>
<body>
<?php
//ini_set('max_execution_time', 300);
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

//echo json_encode($arrCity);
//echo json_encode($arrCareer);
//die();

foreach ($arrCity as $cityId) {
    foreach ($arrCareer as $careerId) {
        $time_update = time() - $count_time;
        $sql = "SELECT use_id FROM user 
							 WHERE FIND_IN_SET(" . $cityId . ",use_district_job) AND FIND_IN_SET(" . $careerId . ",use_nganh_nghe) AND use_update_time >= ".$time_update." LIMIT 30";
//                echo $sql;
//                exit();
        $result = $conn->query($sql);
        $r = array();

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                // optional payload
                $payload = array();
                $payload['start'] = 0;
                $payload['time_start'] = time() - $count_time;
                $payload['time_end'] = time();
                $payload['count'] = $result->num_rows;
                $payload['type'] = 'nha_tuyen_dung';
                break;
            }
            $push->setPayload($payload);

            $time_start = $payload['time_start'];
            $time_end = $payload['time_end'];
            $count = $payload['count'];

            $filters = array(array("field" => "tag", "key" => "usertype", "relation" => "=", "value" => "ntd"), array("operator" => "AND"), array("field" => "tag", "key" => "cit", "relation" => "=", "value" => "cit_$cityId"), array("operator" => "AND"), array("field" => "tag", "key" => "cat", "relation" => "=", "value" => "cat_$careerId"));
            $filters = json_encode($filters);
            $sqlInsert = "INSERT INTO send_notification_ntd(filters,type,status,time_start,time_end,count) VALUES ('" . $filters . "',2,0," . $time_start . "," . $time_end . "," . $count . ")";
            if ($conn->query($sqlInsert) === TRUE) {
//            echo "New record created successfully";
            } else {
                echo "Error: " . $sqlInsert . "<br>" . $conn->error;
            }
        } else {
//                    echo "0 results";ư]
        }
//        $res = $firebase->sendToMixTopicNew($cityId, $careerId, $json);
//        echo '<script>console.log("Your stuff here")</script>';
//        trigger_error($res['message_id']);
//        error_log(print_r($res, TRUE));
//        echo json_encode($res);
//        sleep(10);
//        $ret['cit_' . $cityId . ' - cat_' . $careerId] = $res;
    }
//    var_dump(json_encode($json));die();
}

$sqlSend = "SELECT * FROM send_notification_ntd";

$resultSend = $conn->query($sqlSend);
$total = $resultSend->num_rows;
?>
<input type="hidden" id="num-thread" value="<?php echo $total ?>"/>
<input type="hidden" id="push-thread" value="<?php echo json_encode($json) ?>"/>
<?php
//$complete = 0;
//if ($total > 0) {
//// output data of each row
//    while ($rowSend = $resultSend->fetch_assoc()) {
//        $res = $firebase->sendToMixTopicMulti($rowSend['topic'], $push->getPush());
//        if (json_decode($res,true)['message_id'] != '') {
//            $id = $rowSend['id'];
//            console_log($id);
//            $sqldelete = "DELETE FROM send_notification WHERE id=$id";
//
//            if ($conn->query($sqldelete) === TRUE) {
//                echo "Complete: " . ($complete += 1) . "/" . $total .date('d/m/Y - H:i:s'). "<br>";
////                echo "Record deleted successfully";
//            } else {
//                echo "Error deleting record: " . $conn->error;
//            }
//        }
//    }
//}

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
<div id="results"></div>
</body>
</html>