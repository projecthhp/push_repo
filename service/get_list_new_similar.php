<?
include("../home/config.php");
header("Content-Type:application/json");
$newid = getValue("newid","int","GET",0);
$newid = (int)$newid;
$iduser = getValue("iduser","int","GET",0);
$iduser = (int)$iduser;
$rows = array();
$db_tuongtu = array();
if($newid != 0){

   $db_qr = new db_query("SELECT new.new_id,new_title,new_cat_id,new_city,new_money,new_cap_bac,new_exp,new_bang_cap,new_gioi_tinh,new_so_luong,new_hinh_thuc,new_update_time,new_view_count,new_han_nop,new_hot,new_mota,new_yeucau,new_quyenloi,new_ho_so,user_company.usc_id,usc_email,usc_name,usc_name_add,usc_name_phone,usc_name_email,usc_company,usc_address,usc_phone,usc_logo,usc_size,usc_website,usc_city,usc_create_time,usc_view_count FROM new JOIN new_multi ON new.new_id = new_multi.new_id JOIN user_company ON new.new_user_id = user_company.usc_id JOIN user_company_multi ON new.new_user_id = user_company_multi.usc_id WHERE new.new_id = ".$newid." LIMIT 1");
   $r = mysql_fetch_assoc($db_qr->result);
   $db_qrs = new db_query("SELECT new_id,new_title,new_money,new_city,usc_logo,usc_create_time,usc_company,usc_type,new_create_time,new_update_time FROM new JOIN user_company ON new_user_id = user_company.usc_id  WHERE new_city IN (".$r['new_city'].") AND new_cat_id IN (".$r['new_cat_id'].") AND new_active = 1 AND new_over = 0 ORDER BY new_id DESC LIMIT 10");
   While($rs = mysql_fetch_assoc($db_qrs->result))
   {
      $db_tuongtu[] = $rs;
   }  
   echo json_encode($db_tuongtu);
}
else
{
	echo "Việc làm này không tồn tại trên hệ thống!";
}
?>
