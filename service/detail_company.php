<?
include("../home/config.php");
header("Content-Type:application/json");
//Url mẫu https://timviec365.vn/service/detail_company.php?uscid=93464
$uscid = getValue("uscid","int","GET",0);
$uscid = (int)$uscid;
$rows = array();
if($uscid != 0)
{
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
   echo json_encode($rows); 
}
else
{
	echo "Nhà tuyển dụng này không tồn tại trên hệ thống!";
}
?>