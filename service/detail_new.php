<?
include("../home/config.php");
header("Content-Type:application/json");
//Url mẫu https://timviec365.vn/service/detail.php?newid=123
$newid = getValue("newid","int","GET",0);
$newid = (int)$newid;
$iduser = getValue("iduser","int","GET",0);
$iduser = (int)$iduser;
$rows = array();
if ($newid != 0) {
   if ($iduser > 0) {
      $CreateDate=date("Y-m-d H:i:s",time());
      $chk_view = new db_query("SELECT id_user,create_date,view_count FROM view WHERE type = 1 AND id_user = " . $iduser . ' AND id_affected = ' . $newid);
      if (mysql_num_rows($chk_view->result) == 0) {
         $db_not = new db_execute("INSERT INTO view (id_user,id_affected,type,create_date) VALUES (" . $iduser . "," . $newid . ",1,'" . $CreateDate . "')");
      } else {
         $view = mysql_fetch_object($chk_view->result);
            $view_count = $view->view_count;
            if (strtotime($view->create_date . "+10 seconds") < time()){
                $view_count++;
                $db_view = new db_execute("UPDATE view SET create_date = '".$CreateDate."', view_count = $view_count WHERE type = 1 AND id_user = " . $iduser . ' AND id_affected = ' . $newid);
            }
      }
   }

   $db_qr = new db_query("SELECT new.new_id,new_title,new_cat_id,new_city,new_money,new_cap_bac,new_exp,new_bang_cap,new_gioi_tinh,new_so_luong,new_hinh_thuc,new_update_time,new_view_count,new_han_nop,new_hot,new_mota,new_yeucau,new_quyenloi,new_ho_so,user_company.usc_id,usc_email,usc_name,usc_name_add,usc_name_phone,usc_name_email,usc_company,usc_address,usc_phone,usc_logo,usc_size,usc_website,usc_city,usc_create_time,usc_view_count FROM new JOIN new_multi ON new.new_id = new_multi.new_id JOIN user_company ON new.new_user_id = user_company.usc_id JOIN user_company_multi ON new.new_user_id = user_company_multi.usc_id WHERE new.new_id = " . $newid . " LIMIT 1");
   $r = mysql_fetch_assoc($db_qr->result);
   /*$db_qrs = new db_query("SELECT new_id,new_title,new_money,new_city,usc_logo,usc_create_time,usc_company,usc_type,new_create_time FROM new JOIN user_company ON new_user_id = user_company.usc_id  WHERE new_cat_id IN (".$r['new_cat_id'].") AND new_active = 1 AND new_over = 0 ORDER BY new_id DESC LIMIT 10");
   While($r2 = mysql_fetch_assoc($db_qrs->result))
   {
      $db_tuongtu[] = $r2;
   }*/
   $view = $r['new_view_count'];
   $view = $view + 1;
   $update = new db_query("UPDATE new SET new_view_count = ".$view." WHERE new_id = ".$newid);
   
   echo json_encode($r);
} else {
   echo "Việc làm này không tồn tại trên hệ thống!";
}
?>
