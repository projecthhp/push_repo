<?
include("../home/config.php");
header("Content-Type:application/json");
//Url mẫu https://timviec365.vn/service/search.php?token=123456789&keyword=abcdef&city=1&nganhnghe=1&hinhthuc=1&hocvan=1&gioitinh=1&mucluong=1&capbac=1&kinhnghiem=1&dotuoi=1&capnhat=1&start=1&curent=10
$keyword = getValue("keyword","str","GET","");
$keyword = replaceMQ(trim($keyword));
$keyword = removeHTML($keyword);
$keyword = strip_tags($keyword);
$keyword = str_replace("-"," ",$keyword);
$keyword = replaceMQ(trim($keyword));
$keysearch = str_replace(" ","%",$keyword);
$city = getValue("city","str","GET",0);
if(is_numeric($city)){
   $city = (int)$city;
}elseif($city!=''){
   $qr_city = new db_query("SELECT cit_id FROM city WHERE cit_name like '%".$city."'");
   if(mysql_num_rows($qr_city->result) > 0)
   {
      $city = mysql_fetch_assoc($qr_city->result)['cit_id'];
   }else{
      $city = null;
   }
}
if($keysearch!=''){
   $qr_keyword = new db_query("SELECT cat_id FROM category WHERE cat_name like '%".$keysearch."%'");
   if(mysql_num_rows($qr_keyword->result) > 0)
   {
       $keysearch = mysql_fetch_assoc($qr_keyword->result)['cat_id'];
   }
}
$uid = getValue("uid","int","GET",0);
$uid = (int)$uid;
$nganhnghe = getValue("nganhnghe","int","GET",0);
$nganhnghe = (int)$nganhnghe;
$hinhthuc = getValue("hinhthuc","int","GET",0);
$hinhthuc = (int)$hinhthuc;
$hocvan = getValue("hocvan","int","GET",0);
$hocvan = (int)$hocvan;
$start = getValue("start","int","GET",0);
$start = (int)$start;
$current = getValue("curent","int","GET",20);
$current = (int)$current;
$gioitinh = getValue("gioitinh","int","GET",0);
$gioitinh = (int)$gioitinh;
$mucluong = getValue("mucluong","int","GET",0);
$mucluong = (int)$mucluong;
$capbac = getValue("capbac","int","GET",0);
$capbac = (int)$capbac;
$kinhnghiem = getValue("kinhnghiem","int","GET",0);
$kinhnghiem = (int)$kinhnghiem;
$dotuoi = getValue("dotuoi","int","GET",0);
$dotuoi = (int)$dotuoi;
$capnhat = getValue("capnhat","int","GET",0);
$capnhat = (int)$capnhat;
$sort_by = getValue("sortby","int","GET",0);
$sort_by = (int)$sort_by;
$db_qrr = new db_query("SELECT cit_id,cit_name FROM city ORDER BY cit_count DESC,cit_name ASC");
$arr_all_city  = $db_qrr->result_array('cit_id');
$rows = array();
$sql = '';
if($keyword != '')
{   
   if($keysearch != null){
      if($keysearch > 0)
      {
          $sql = " OR FIND_IN_SET('".$keysearch."', new_cat_id))";
      }else
      {
          $sql = ')';
      }
   }
   if($city > 0)
   {
       $sql .= ' AND FIND_IN_SET('.$city.',new_city) ' ;
   }
   if($nganhnghe != 0)
   {
      $sql .= " AND FIND_IN_SET(".$nganhnghe.",new_cat_id)";
   }
   if($hinhthuc != 0)
   {
      $sql .= " AND new_hinh_thuc = '".$hinhthuc."'";
   }
   if($hocvan != 0)
   {
      $sql .= " AND new_bang_cap = '".$hocvan."'";
   }
   if($gioitinh != 0)
   {
      $sql .= " AND new_gioi_tinh = '".$gioitinh."'";
   }
   if($mucluong != 0)
   {
      $sql .= " AND new_money = '".$mucluong."'";
   }
   if($capbac != 0)
   {
      $sql .= " AND new_cap_bac = '".$capbac."'";
   }
   if($kinhnghiem != 0)
   {
      $sql .= " AND new_exp = '".$kinhnghiem."'";
   }
   if($dotuoi != 0)
   {
      $sql .= " AND new_do_tuoi = '".$dotuoi."'";
   }
   if($capnhat > 0)
   {
      if($capnhat == 1)
      {
         $timestart = time() - 86400;
      }
      else if($capnhat == 2)
      {
         $timestart = time() - 604800;
      }
      else if($capnhat  == 3)
      {
         $timestart = time() - 2592000;
      }
      $sql .= " AND new_create_time > ".$timestart;
   }
   $sql .= " AND new_han_nop >= ".time();
   $sql_sort_by = "";
   if ($sort_by == 2){
      $sql_sort_by .= " new_money DESC,";
   }
   $db_qr = new db_query("SELECT new_title,usc_company,usc_name,usc_logo,new_money,new_city,new_han_nop,new_view_count,new_create_time,new_update_time,usc_create_time,new_hot,new_id FROM new STRAIGHT_JOIN user_company ON new_user_id = user_company.usc_id WHERE new_active = 1  AND new_over = 0 AND (new_title LIKE '%".$keysearch."%' ".$sql." ORDER BY".$sql_sort_by." new_nganh DESC, new_update_time DESC LIMIT ".$start.",".$current);
   while($r = mysql_fetch_assoc($db_qr->result))
   {

      //set city
      $arr_city = explode(',', $r['new_city']);
      $name_city = array();
      foreach ($arr_city as $key) {
         $name_city[] = $arr_all_city[$key]['cit_name'];
      }

       //Check viewed
       $viewed = '0';
      //  if ($uid > 0) {
      //      $chk_view = new db_query("SELECT uid FROM tbl_viewed WHERE type = 2 AND uid = " . $uid . ' AND view_id = ' . $r['new_id']);
      //      if (mysql_num_rows($chk_view->result) > 0) {
      //          $viewed = '1';
      //      }
      //  }

       //Check viewed
       $isSaved = '0';
       if ($uid > 0) {
           $qr_save = new db_query("SELECT id_uv FROM tbl_luutin WHERE id_uv = " . $uid . ' AND id_tin = ' . $r['new_id']);
           if (mysql_num_rows($qr_save->result) > 0) {
               $isSaved = '1';
           }
       }

       $ar = array();
       $ar = $r;
       $ar['new_city_list'] = $name_city;
       $ar['viewed'] = $viewed;
       $ar['isSaved'] = $isSaved;
       $rows[] = $ar;
   }
   echo json_encode($rows); 
}
else
{
   if($city > 0)
   {
       $sql .= ' AND FIND_IN_SET('.$city.',new_city) ' ;
   }
   $db_qr = new db_query("SELECT new.new_id,usc_id,new_money,new_city,new_cap_bac,new_update_time,usc_create_time,usc_logo,usc_company,new_title,new_nganh,new_han_nop,new_view_count,new_hot FROM new STRAIGHT_JOIN user_company ON new_user_id = user_company.usc_id ".$sql." ORDER BY new.new_id DESC LIMIT ".$start.",".$current);
   while($r = mysql_fetch_assoc($db_qr->result))
   {
      //set city
      $arr_city = explode(',', $r['new_city']);
      $name_city = array();
      foreach ($arr_city as $key) {
         $name_city[] = $arr_all_city[$key]['cit_name'];
      }
       $ar = array();
       $ar = $r;
       $ar['new_city_list'] = $name_city;
       $ar['viewed'] = $viewed;
       $ar['isSaved'] = $isSaved;
       $rows[] = $ar;
   }
   echo json_encode($rows); 
}
?>
