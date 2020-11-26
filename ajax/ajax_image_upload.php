<?
require_once("../functions/functions.php"); 
require_once("../classes/database.php");
require_once("../classes/resize-class.php");
if(isset($_FILES) and $_SERVER['REQUEST_METHOD'] == "POST"){
   $urlimg='';
   $userid = $_COOKIE["UID"];
   $userid = (int)$userid;
   if($userid != 0)
   {
      $db_qr = new db_query("SELECT usc_create_time FROM user_company WHERE usc_id = ".$userid);
      $row = mysql_fetch_assoc($db_qr->result);
      $dir = geturlimageAvatar2($row['usc_create_time']);
      if($_FILES['file']['type'] == 'image/png')
      {
         $name = 'avatar'.$userid.".png";
      }
      if($_FILES['file']['type'] == 'image/jpeg')
      {
         $name = 'avatar'.$userid.".jpg";
      }
      if($_FILES['file']['type'] == 'image/gif')
      {
         $name = 'avatar'.$userid.".gif";
      }
      file_put_contents($dir.$name, file_get_contents($_FILES['file']['tmp_name']));  
      $resizeObj = new resize($dir.$name);
      $resizeObj -> resizeImage(177, 130, 'auto');
      $resizeObj -> saveImage($dir.$name, 100);
      $db_exx = new db_execute("UPDATE user_company SET usc_logo = '".$name."' WHERE usc_id = ".$userid);
   }
}
?>