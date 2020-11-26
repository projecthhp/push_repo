<?
require_once("../functions/functions.php"); 
require_once("../classes/database.php");
$lg_chucdanh = getValue("lg_chucdanh","str","POST","");
$lg_chucdanh = replaceMQ(trim($lg_chucdanh));
$lg_congty = getValue("lg_congty","str","POST","");
$lg_congty = replaceMQ(trim($lg_congty));
$lg_motaexp = getValue("lg_motaexp","str","POST","");
$lg_motaexp = replaceMQ(trim($lg_motaexp));
$lg_onemoretime = getValue("lg_onemoretime","str","POST","");
$lg_onemoretime = replaceMQ(trim($lg_onemoretime));
$lg_onemoretime = str_replace("/","-",$lg_onemoretime);
$lg_onemoretime = strtotime($lg_onemoretime);
$lg_twomoretime = getValue("lg_twomoretime","str","POST","");
$lg_twomoretime = replaceMQ(trim($lg_twomoretime));
$lg_twomoretime = str_replace("/","-",$lg_twomoretime);
$lg_twomoretime = strtotime($lg_twomoretime);
$userid = getValue("iduser","int","POST",0);
$userid = (int)$userid;
$code = getValue("code","str","POST","");
$code = replaceMQ(trim($code));
$id_truong = getValue("id_truong",'int','POST',0);
$id_truong = (int)$id_truong;
$db_qrcheck = new db_query("SELECT use_id FROM user WHERE use_id = '".$userid."' AND use_pass = '".$code."' LIMIT 1");
if(mysql_num_rows($db_qrcheck->result) > 0)
{
   if($lg_chucdanh != '' && $id_truong == 0)
   { 
      $db_ex = new db_execute("INSERT INTO kinh_nghiem(kn_use_id,kn_name,kn_cv,kn_mota,kn_one_time,kn_two_time) 
                               VALUES('".$userid."','".$lg_congty."','".$lg_chucdanh."','".$lg_motaexp."','".$lg_onemoretime."','".$lg_twomoretime."')");
      unset($db_ex);
   }
   else if($lg_chucdanh != '' && $id_truong > 0)
   {
      $db_ex = new db_execute("UPDATE kinh_nghiem SET 
                              kn_name='".$lg_congty."',kn_cv='".$lg_chucdanh."',kn_mota='".$lg_motaexp."',kn_one_time='".$lg_onemoretime."',kn_two_time='".$lg_twomoretime."'
                              WHERE kn_id = ".$id_truong." AND kn_use_id = ".$userid."");
      unset($db_ex);
   }
}
unset($lg_chucdanh,$lg_congty,$lg_motaexp,$lg_onemoretime,$lg_twomoretime,$userid,$code,$db_qrcheck,$db_ex);
?>