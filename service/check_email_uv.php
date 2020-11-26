<?php
include("../home/config.php");

$email         = getValue("email","str","GET","");
$email         = replaceMQ($email);
$result = array('data' => null, 'code' => 0, 'kq' => false);

if ($email != '') {
   $db_qr = new db_query("SELECT use_id FROM user WHERE use_mail = '" . $email . "'");
   if (mysql_num_rows($db_qr->result) > 0) {
      //da dang ky thanh cong
      $result = array('data' => null, 'code' => 1, 'kq' => true);
   }
}
echo json_encode($result);
?>