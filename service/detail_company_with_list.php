<?
include("../home/config.php");
header("Content-Type:application/json");
//Url mẫu https://timviec365.vn/service/detail_company.php?uscid=93464
$uscid = getValue("uscid","int","GET",0);
$uscid = (int)$uscid;
if($uscid != 0)
{
   $result = array();
   $rows = array();
   $db_qr = new db_query("SELECT user_company.usc_id,usc_money,usc_email,usc_name,usc_name_add,usc_name_phone,usc_name_email,usc_company,usc_type,
                          usc_address,usc_phone,usc_logo,usc_size,usc_website,usc_city,usc_create_time,usc_update_time,usc_view_count,usc_mst,
                          usc_authentic,usc_company_info
                          FROM user_company 
                          JOIN user_company_multi ON user_company.usc_id = user_company_multi.usc_id 
                          WHERE user_company.usc_id = ".$uscid." LIMIT 1");
   if($r = mysql_fetch_assoc($db_qr->result))
   {
      $rows = $r;
   }
   $db_qr_list = new db_query("SELECT new_id,new_money,new_city,new_cap_bac,new_update_time,new_title,new_cat_id,new_nganh,new_han_nop,new_view_count,new_hot FROM new WHERE new_user_id = $uscid");
   $result['detail_company'] = $rows; 
   $result['list_news'] = $db_qr_list->result_array(); 
   echo json_encode($result); 
}
else
{
	echo "Nhà tuyển dụng này không tồn tại trên hệ thống!";
}
?>