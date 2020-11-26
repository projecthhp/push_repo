<?php
include("db.php");
require_once __DIR__ . '/get_qr.php';

$sqlSend = "SELECT qr_id,new_id,new_user_id,url_new FROM qr_cron WHERE update_qr = 0 ORDER BY qr_id DESC LIMIT 1";
$resultSend = $conn->query($sqlSend);
$total = $resultSend->num_rows;
if ($total > 0) {
// output data of each row
    $rowSend = $resultSend->fetch_assoc();

    $qr = new GenQR();

    $qr_id = $rowSend['qr_id'];
    $new_id = $rowSend['new_id'];
    $id_ntd = $rowSend['new_user_id'];
    $url_new = $rowSend['url_new'];

    $res = $qr->gen_qr($new_id,$id_ntd,$url_new);
    $result = json_decode($res, true);
    // var_dump($result);
    if ($result['kq']) {
        $qr_img = $result['data'];
        $sqlupdate = "UPDATE qr_cron SET qr_img = '".$qr_img."', update_qr = 1 WHERE qr_id=$qr_id";
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
        $sqlupdate = "UPDATE qr_cron SET update_qr = 1 WHERE qr_id=$qr_id";
        $conn->query($sqlupdate);
        echo $result['kq'];
    }
}
?>