<?
include("../home/config.php");
$new_pass = getValue("new_pass","str","POST","");
$new_pass = replaceMQ(trim($new_pass));
$new_pass = md5($new_pass);
$tk_email = getValue("tk_email","str","POST","");
$tk_email = replaceMQ(trim($tk_email));
$userid = getValue("iduser","int","POST",0);
$userid = (int)$userid;
$old_pass = getValue("old_pass","str","POST","");
$old_pass = replaceMQ(trim($old_pass));
$old_pass = md5($old_pass);
$result = array('data' => null, 'code' => 0, 'kq' => false);

if($new_pass != '' && $userid > 0 && $old_pass != '')
{
   $db_qrcheck = new db_query("SELECT usc_id FROM user_company WHERE usc_id = '".$userid."' AND usc_pass = '".$old_pass."' LIMIT 1");
   if(mysql_num_rows($db_qrcheck->result) > 0)
   {
      if($old_pass != '')
      {
         $db_ex1 = new db_execute("UPDATE user_company SET usc_pass = '".$new_pass."' WHERE usc_id = '".$userid."'");
         $result = array('data' => null, 'code' => 1, 'kq' => true);
		   echo json_encode($result);
      }else {
         echo json_encode($result);
      }
   }
   else
   {
      $result = array('data' => null, 'code' => 1, 'kq' => false);
      echo json_encode($result);
   }
}
else{
   echo json_encode($result);
}
?>