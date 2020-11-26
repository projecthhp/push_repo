<?
require_once("../functions/functions.php"); 
require_once("../classes/database.php");
require_once("../classes/resize-class.php");
if(isset($_FILES) and $_SERVER['REQUEST_METHOD'] == "POST"){
   $cvname = getValue("cvName","str","POST","");
   $userid = $_COOKIE["UID"];
   $userid = (int)$userid;
   $userpass = $_COOKIE['PHPSESPASS'];
   $db_qrcheck = new db_query("SELECT use_id FROM user WHERE use_id = '".$userid."' AND use_pass = '".$userpass."' LIMIT 1");
   if(mysql_num_rows($db_qrcheck->result) > 0)
   {
      $time = time();
      $dir = getcvuv($time);
      if($_FILES['file']['type'] == 'image/png')
      {
         $name = 'cv_'.$time.".png";
      }
      if($_FILES['file']['type'] == 'application/pdf')
      {
         $name = 'cv_'.$time.".pdf";
      }
      if($_FILES['file']['type'] == 'application/msword')
      {
         $name = 'cv_'.$time.".docx";
      }
      if($_FILES['file']['type'] == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document')
      {
         $name = 'cv_'.$time.".docx";
      }
      file_put_contents($dir.$name, file_get_contents($_FILES['file']['tmp_name']));  
      $db_ex5 = new db_execute("UPDATE hoso SET hs_active = 0 WHERE hs_use_id = '".$userid."'");
      $query = "INSERT INTO hoso(hs_use_id,hs_name,hs_link,hs_create_time,hs_active) 
                               VALUES('".$userid."','".$cvname."','".$name."','".$time."','1')";
      $db_ex = new db_execute_return();
      $last_id = $db_ex->db_execute($query);
   }
   unset($userid,$userpass,$db_qrcheck,$dir,$name,$cvname,$db_ex,$db_ex5,$time);
}
?>