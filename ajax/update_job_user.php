<?
   require_once("../functions/functions.php"); 
   require_once("../classes/database.php");
   require_once("../functions/array_front_end.php");
   $userid = $_COOKIE["UID"];
   $userid = (int)replaceMQ(trim($userid));

   $user_tencv = getValue("user_tencv","str","POST","");
   $user_tencv = replaceMQ(trim($user_tencv));
   $cap_bac = getValue("cap_bac","str","POST","");
   $cap_bac = replaceMQ(trim($cap_bac));
   $dia_diem_lam_viec = getValue("dia_diem_lam_viec","arr","POST","");
   $dia_diem_lam_viec = implode(',', $dia_diem_lam_viec);
   $sl_nganh_nghe = getValue("sl_nganh_nghe","arr","POST","");
   $sl_nganh_nghe = implode(',', $sl_nganh_nghe);
   $use_muc_luong = getValue("use_muc_luong","str","POST","");
   $use_muc_luong = replaceMQ(trim($use_muc_luong));
   $use_hinh_thuc = getValue("use_hinh_thuc","str","POST","");
   $use_hinh_thuc = replaceMQ(trim($use_hinh_thuc));
   $use_kinh_nghiem = getValue("use_kinh_nghiem","str","POST","");
   $use_kinh_nghiem = replaceMQ(trim($use_kinh_nghiem));

   $db_ex = new db_execute("UPDATE user SET use_job_name='".$user_tencv."',cap_bac_mong_muon = '".$cap_bac."',use_district_job = '".$dia_diem_lam_viec."',use_nganh_nghe = '".$sl_nganh_nghe."',salary = '".$use_muc_luong."', work_option = '".$use_hinh_thuc."', exp_years = '".$use_kinh_nghiem."', use_update_time = '".time()."' WHERE use_id = '".$userid."'");

   $db_thong_bao = new db_query("SELECT use_job_name,cap_bac_mong_muon,use_district_job,use_nganh_nghe,salary,work_option,exp_years FROM user WHERE use_id = ".$userid);
   $str_city = '';
   $exl_city = explode(',',$dia_diem_lam_viec);
   for($i = 0; $i < count($exl_city); $i++)
   {
      $db_city = new db_query("SELECT cit_name FROM city WHERE cit_id = ".$exl_city[$i]);
      if(mysql_num_rows($db_city->result) > 0){
         $row = mysql_fetch_array($db_city->result);
         $str_city .= $row['cit_name']. " ";
      }
   }
   
   $str_nganh = '';
   $epl_nganh = explode(',', $sl_nganh_nghe);
   for($i = 0; $i < count($epl_nganh); $i++)
   {
      $db_nganh = new db_query("SELECT cat_name FROM category WHERE cat_id = ".$epl_nganh[$i]);
      if(mysql_num_rows($db_nganh->result) > 0){
         $row = mysql_fetch_array($db_nganh->result);
         $str_nganh .= $row['cat_name']. " ";
      }
   }
   $row = mysql_fetch_array($db_thong_bao->result);

   $result = array(
   	'use_job_name' => $row['use_job_name'],
   	'cap_bac_mong_muon' => $array_capbac[$row['cap_bac_mong_muon']],
   	'use_district_job' => $str_city,
   	'use_nganh_nghe' => $str_nganh,
      'salary' => $array_muc_luong[$row['salary']],
      'work_option' => $array_hinh_thuc[$row['work_option']],
      'exp_years' => $array_kinh_nghiem_uv[$row['exp_years']]
   );

   echo json_encode($result);

?>