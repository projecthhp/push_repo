<?php
require_once("inc_security.php");
$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));
$new_category_id  = array();
$class_menu     = new menu();

$cate = array(9,1,33,2,13,14);  
$city = array(1,45);
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=tag.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo'<table border="1px solid black">';
echo '<tr>';
echo '<td></td>';
echo '<td><strong>Việc làm KD</strong></td>';
echo '<td><strong>Việc làm kế toán</strong></td>';
echo '<td><strong>Việc làm KD-BĐS</strong></td>';
echo '<td><strong>Việc làm HCNS</strong></td>';
echo '<td><strong>Việc làm IT- Phần mềm</strong></td>';
echo '<td><strong>Việc làm Marketing</strong></td>';
echo'<table border="1px solid black">';
echo'<tr>';

echo '<td>Tổng NTD</td>';
//Tổng NTD
foreach($cate as $value)
{
  $db_tong_ntd = new db_query("SELECT DISTINCT new_user_id FROM new JOIN user_company ON new.new_user_id = user_company.usc_id WHERE FIND_IN_SET('".$value."',new_cat_id) AND FIND_IN_SET(45,new_city) GROUP BY new_user_id");
  $tong_ntd = mysql_num_rows($db_tong_ntd->result);
  $tong_ntd = $tong_ntd*10;
  echo '<td><strong>'.$tong_ntd.'</strong></td>';
}
echo "</tr><tr>";
echo '<td>Tổng tin đăng</td>';
//tổng tin đăng new_city
foreach($cate as $value)
{
  $db_query = new db_query("SELECT new_id FROM new WHERE FIND_IN_SET('".$value."',new_cat_id) AND FIND_IN_SET(45,new_city)");
  $tong_tin = mysql_num_rows($db_query->result);
  $tong_tin = $tong_tin*10;
  echo '<td><strong>'.$tong_tin.'</strong></td>';
}
echo "</tr><tr>";
echo '<td>Tổng uv</td>';
//tổng UV use_district_job
foreach($cate as $value)
{
  $db_query_uv = new db_query("SELECT use_id FROM user WHERE FIND_IN_SET('".$value."',use_nganh_nghe) AND FIND_IN_SET(45,use_district_job)");
  $tongUV = mysql_num_rows($db_query_uv->result);
  $tongUV = $tongUV*10;
  echo '<td><strong>'.$tongUV.'</strong></td>';
}
echo "</tr><tr>";
echo '<td>Tổng NTD từ app</td>';
//Tổng NTD từ app
foreach($cate as $value)
{
  $db_tong_ntd2 = new db_query("SELECT DISTINCT new_user_id FROM new JOIN user_company ON new.new_user_id = user_company.usc_id WHERE FIND_IN_SET('".$value."',new_cat_id) AND FIND_IN_SET(45,new_city) AND register = 2 GROUP BY new_user_id");
  $tong_ntd2 = mysql_num_rows($db_tong_ntd2->result);
  $tong_ntd2 = $tong_ntd2*10;
  echo '<td><strong>'.$tong_ntd2.'</strong></td>';
}
echo "</tr><tr>";
echo '<td>Tổng UV từ app</td>';
// UV từ APP
foreach($cate as $value)
{
  $db_uv_app = new db_query("SELECT use_id FROM user WHERE FIND_IN_SET('".$value."',use_nganh_nghe)  AND FIND_IN_SET(45,use_district_job) AND register = 2");
  $uv_app = mysql_num_rows($db_uv_app->result);
  $uv_app = $uv_app*10;
  echo '<td><strong>'.$uv_app.'</strong></td>';
}
echo "</tr><tr>";
echo '<td>Tổng uv nộp hồ sơ</td>';
//tổng uv nộp hồ sơ
foreach($cate as $value)
{
  $db_nhs = new db_query("SELECT DISTINCT nhs_use_id FROM nop_ho_so JOIN user ON nop_ho_so.nhs_use_id = user.use_id WHERE FIND_IN_SET('".$value."',use_nganh_nghe)  AND FIND_IN_SET(45,use_district_job)");
  $uv_nhs = mysql_num_rows($db_nhs->result);
  $uv_nhs = $uv_nhs*10;
  echo '<td><strong>'.$uv_nhs.'</strong></td>';
}
echo "</tr><tr>";

echo '</tr>';
echo '</table>';
?>
