<?
include("../home/config.php");
header("Content-Type:application/json");
$useid = getValue("useid","int","GET",0);
$useid = (int)$useid;
$rows = array();
$db_tuongtu = array();
if($useid != 0){

   $db_qr = new db_query("SELECT user.use_id,use_district_job,use_nganh_nghe FROM user WHERE use_id = ".$useid."  LIMIT 1");
   $r = mysql_fetch_assoc($db_qr->result);
   $id_city = $r['use_district_job'];
   $id_cate = $r['use_nganh_nghe'];
   if (is_numeric($id_cate)) {
      $sql .= " and FIND_IN_SET(".$id_cate.",use_nganh_nghe)";
   } else {
      $cate_like = '(' . str_replace(',', '|', $id_cate) . ')';
      $sql .= " and CONCAT(" . '","' . ", `use_nganh_nghe`, " . '","' . ") REGEXP '" . $cate_like . "'";
   }

   if (is_numeric($id_city)) {
      $sql .= " and FIND_IN_SET(".$id_city.",use_district_job)";
   } else {
      $city_like = '(' . str_replace(',', '|', $id_city) . ')';
      $sql .= " and CONCAT(" . '","' . ", `use_district_job`, " . '","' . ") REGEXP '" . $city_like . "'";
   }
   $db_qrs = new db_query("SELECT user.use_id,use_name,use_job_name,use_create_time,use_update_time,use_logo,gender,use_city,use_district_job,use_view_count,salary FROM user LEFT JOIN user_cv_upload ON user.use_id = user_cv_upload.use_id WHERE NOT user.use_id = ".$useid." AND true ".$sql." ORDER BY RAND(), use_view_count DESC, use_update_time DESC, exp_years DESC LIMIT 10");
   While($rs = mysql_fetch_assoc($db_qrs->result))
   {
      $db_tuongtu[] = $rs;
   }  
   echo json_encode($db_tuongtu);
}
else
{
	echo "Ứng viên này không tồn tại trên hệ thống!";
}
?>
