<?
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
include("../home/config.php");
$query = "SELECT use_id FROM `user` WHERE register = 2 GROUP BY use_mail HAVING COUNT(*) > 1 ORDER BY use_id DESC";
$db_qr = new db_query($query);
if (mysql_num_rows($db_qr->result) > 0) {
   $num = mysql_num_rows($db_qr->result);
   echo "Tổng '" . $num . "' ứng viên bị trùng...";
   if ($num < 20){
      while ($row = mysql_fetch_assoc($db_qr->result)) {
         $id_use = $row["use_id"];
         // echo $id_use;
         $qr_del = new db_query("DELETE FROM user WHERE use_id=" . $id_use);
      }
   } else {
      echo "Quá nhiều, lớn hơn 20 ứng viên, xem lại";
   }
   // $qr_del = "DELETE FROM savecandicv WHERE id=" . $id;
   // $update = new db_query($qr_del);
   echo "Xóa thành công";
} else {
   echo "Không có ứng viên trùng";
}
?>