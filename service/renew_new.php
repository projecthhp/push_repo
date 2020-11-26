<?
include("../home/config.php");

$idnew = getValue("idnew","int","POST",0);
$idnew = (int)$idnew;
$idntd = getValue("idntd","int","POST",0);
$idntd = (int)$idntd;
$result = array('data' => null, 'code' => 0, 'kq' => false);

if($idnew > 0 && $idntd > 0)
{
   $db_qr = new db_query("SELECT usc_id FROM user_company WHERE usc_id = '".$idntd."' LIMIT 1");
   if(mysql_num_rows($db_qr->result) > 0 )
   {
      $db_qrs = new db_query("SELECT new_id FROM new WHERE new_id = '".$idnew."' AND new_user_id = '".$idntd."' LIMIT 1");
      if(mysql_num_rows($db_qrs->result) > 0)
      {
         $db_ex = new db_execute("UPDATE new SET new_update_time = '".time()."' WHERE new_user_id = '".$idntd."' AND new_id = '".$idnew."'");
         $db_ex = new db_execute("UPDATE new SET new_renew = new_renew+1 WHERE new_user_id = '".$idntd."' AND new_id = '".$idnew."'");
         $result = array('data' => null, 'code' => 1, 'kq' => true);
		   echo json_encode($result);
      }
      else
      {
         $result = array('data' => null, 'code' => 1, 'kq' => false);
         echo json_encode($result);
      }
   }
   else
   {
      $result = array('data' => null, 'code' => 2, 'kq' => false);
      echo json_encode($result);
   }
}
else
{
   echo json_encode($result);
}
?>