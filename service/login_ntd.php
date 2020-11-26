<?
include("../home/config.php");
header("Content-Type:application/json");
$username         = getValue("email","str","POST","");
$username         = replaceMQ($username);
$password         = getValue("pass","str","POST","");
$password         = replaceMQ($password);
if($username != '' && $password != '')
{
   $db_qr    = new db_query("SELECT usc_id,usc_email,usc_name,usc_name_add,usc_name_phone,usc_name_email,usc_pass,usc_company,usc_md5,usc_type,usc_address,usc_phone,usc_logo,usc_size,usc_website,usc_city,usc_create_time,usc_update_time,usc_view_count,usc_mst,usc_authentic,usc_lat,usc_long FROM user_company WHERE usc_email = '".$username."' AND usc_pass  = '".md5($password)."'");
   if(mysql_num_rows($db_qr->result) > 0)
   {
      $row = mysql_fetch_assoc($db_qr->result);
      $fail = json_encode($row);
      //Kiem tra diem usc
      // $daynow = strtotime(date('d-m-Y'));
      // $usc_check = new db_query("SELECT * FROM tbl_point_company WHERE usc_id = ".$row['usc_id']);
      // if(mysql_num_rows($usc_check->result) == 0)
      // {
      //    $point = new db_query("SELECT point FROM tbl_point WHERE point_id = 1");
      //    $pointfree = mysql_fetch_assoc($point->result)['point'];
      //    $db_ex = new db_execute("INSERT INTO tbl_point_company (usc_id, point, point_usc, day_reset_point) VALUES (".$row['usc_id'].", ".$pointfree.", 0, ".$daynow.")");
      //    unset($db_ex);
      // }else{
      //    $point = mysql_fetch_assoc($usc_check->result);
      //    if($point['day_reset_point']==$daynow){
      //       $pointfree = $point['point'];
      //    }else{
      //       $point = new db_query("SELECT point FROM tbl_point WHERE point_id = 1");
      //       $pointfree = mysql_fetch_assoc($point->result)['point'];
      //       $update = new db_query("UPDATE tbl_point_company SET point = ".$pointfree.", day_reset_point=".$daynow." WHERE usc_id = ".$row['usc_id']);
      //    }
      // }
   }  
   else
   {
      $fail = 'null';
   }
}
else
{
   $fail = 'null';
}
echo $fail;
?>
