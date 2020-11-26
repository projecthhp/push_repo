<?
include("config.php");
if(isset($_POST['change_password']))
{
   $password         = getValue("change_password_fist","str","POST","");
   $password         = replaceMQ($password);
   $password         = md5($password);
   echo $password;
   $userid = $_COOKIE['UID'];
   if($password != '')
   {
      $db_excute = new db_execute("UPDATE user_company SET usc_pass = '".$password."' WHERE usc_id = ".$userid);
      unset($_COOKIE['UID']);
      unset($_COOKIE['UT']);
      unset($_COOKIE['PHPSESPASS']);
      setcookie('UID', null, -1, '/');
      setcookie('UT', null, -1, '/');
      setcookie('PHPSESPASS', null, -1, '/');
      header('Location: /dang-nhap/nha-tuyen-dung');
   }
   else
   {
      header('Location: / ');
   }
} 
else
{
   header('Location: / ');
}
?>