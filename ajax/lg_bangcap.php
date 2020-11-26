<?
require_once("../functions/functions.php"); 
require_once("../classes/database.php");
$lg_bc = getValue("lg_bc","str","POST","");
$lg_bc = replaceMQ(trim($lg_bc));
$lg_truonghoc = getValue("lg_truonghoc","str","POST","");
$lg_truonghoc = replaceMQ(trim($lg_truonghoc));
$lg_chuyennganh = getValue("lg_chuyennganh","str","POST","");
$lg_chuyennganh = replaceMQ(trim($lg_chuyennganh));
$lg_xeploai = getValue("lg_xeploai","int","POST",0);
$lg_xeploai = (int)$lg_xeploai;
$lg_bosungth = getValue("lg_bosungth","str","POST","");
$lg_bosungth = replaceMQ(trim($lg_bosungth));
$lg_onetime = getValue("lg_onetime","str","POST","");
$lg_onetime = replaceMQ(trim($lg_onetime));
$lg_onetime = str_replace("/","-",$lg_onetime);
$lg_onetime = strtotime($lg_onetime);
$lg_twotime = getValue("lg_twotime","str","POST","");
$lg_twotime = replaceMQ(trim($lg_twotime));
$lg_twotime = str_replace("/","-",$lg_twotime);
$lg_twotime = strtotime($lg_twotime);
$userid = getValue("iduser","int","POST",0);
$userid = (int)$userid;
$code = getValue("code","str","POST","");
$code = replaceMQ(trim($code));
$id_truong = getValue("id_truong",'int','POST',0);
$id_truong = (int)$id_truong;
$db_qrcheck = new db_query("SELECT use_id FROM user WHERE use_id = '".$userid."' AND use_pass = '".$code."' LIMIT 1");
if(mysql_num_rows($db_qrcheck->result) > 0)
{
   if($lg_bc != '' && $lg_xeploai > 0 && $id_truong == 0)
   { 
      $db_ex = new db_execute("INSERT INTO truong_hoc(th_use_id,th_name,th_bc,th_cn,th_xl,th_bs,th_one_time,th_two_time) 
                               VALUES('".$userid."','".$lg_truonghoc."','".$lg_bc."','".$lg_chuyennganh."','".$lg_xeploai."','".$lg_bosungth."','".$lg_onetime."','".$lg_twotime."')");
      unset($db_ex);
   }
   else if($lg_bc != '' && $lg_xeploai > 0 && $id_truong > 0)
   {
      $db_ex = new db_execute("UPDATE truong_hoc SET 
                              th_name='".$lg_truonghoc."',th_bc='".$lg_bc."',th_cn='".$lg_chuyennganh."',th_xl='".$lg_xeploai."',th_bs='".$lg_bosungth."',th_one_time='".$lg_onetime."',th_two_time='".$lg_twotime."'
                              WHERE th_id = ".$id_truong." AND th_use_id = ".$userid."");
      unset($db_ex);
   }
}
unset($lg_bc,$lg_truonghoc,$lg_chuyennganh,$lg_xeploai,$lg_bosungth,$userid,$code,$db_qrcheck,$db_ex);
?>