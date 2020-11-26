<?
require_once("../functions/functions.php"); 
require_once("../classes/database.php");
$lg_chungchi = getValue("lg_chungchi","str","POST","");
$lg_chungchi = replaceMQ(trim($lg_chungchi));
$lg_sodiem = getValue("lg_sodiem","str","POST","");
$lg_sodiem = replaceMQ(trim($lg_sodiem));
$lg_ngoaingu = getValue("lg_ngoaingu","int","POST",0);
$lg_ngoaingu = (int)$lg_ngoaingu;
$userid = getValue("iduser","int","POST",0);
$userid = (int)$userid;
$code = getValue("code","str","POST","");
$code = replaceMQ(trim($code));
$id_truong = getValue("id_truong",'int','POST',0);
$id_truong = (int)$id_truong;
$db_qrcheck = new db_query("SELECT use_id FROM user WHERE use_id = '".$userid."' AND use_pass = '".$code."' LIMIT 1");
if(mysql_num_rows($db_qrcheck->result) > 0)
{
   if($lg_chungchi != '' && $lg_ngoaingu != 0 && $id_truong == 0)
   { 
      $db_ex = new db_execute("INSERT INTO ngoai_ngu(nn_use_id,nn_id_pick,nn_cc,nn_sd)
                               VALUES('".$userid."','".$lg_ngoaingu."','".$lg_chungchi."','".$lg_sodiem."')");
      unset($db_ex);
   }
   else if($lg_chungchi != '' && $lg_ngoaingu != 0 && $id_truong > 0)
   {
      $db_ex = new db_execute("UPDATE ngoai_ngu SET nn_id_pick = '".$lg_ngoaingu."',nn_cc = '".$lg_chungchi."',nn_sd = '".$lg_sodiem."' WHERE nn_id = '".$id_truong."' AND nn_use_id = '".$userid."'");
      unset($db_ex);
   }
}
unset($lg_chungchi,$lg_sodiem,$lg_ngoaingu,$code,$db_qrcheck,$db_ex);
?>