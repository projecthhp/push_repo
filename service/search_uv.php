<?
include("../home/config.php");
header("Content-Type:application/json");
//Url mẫu https://timviec365.vn/service/search_uv.php?token=123456789&keyword=abcdef&city=1&start=1&curent=10

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
        $cat_id = mysql_fetch_assoc($qr_keyword->result)['cat_id'];
    }
}
$start = getValue("start","int","GET",0);
$start = (int)$start;
$current = getValue("curent","int","GET",20);
$current = (int)$current;
$nganhnghe = getValue("nganhnghe", "int", "GET", 0);
$nganhnghe = (int)$nganhnghe;
$hinhthuc = getValue("hinhthuc", "int", "GET", 0);
$hinhthuc = (int)$hinhthuc;
$hocvan = getValue("hocvan", "int", "GET", 0);
$hocvan = (int)$hocvan;
$start = getValue("start", "int", "GET", 0);
$start = (int)$start;
$current = getValue("curent", "int", "GET", 20);
$current = (int)$current;
$gioitinh = getValue("gioitinh", "int", "GET", 0);
$gioitinh = (int)$gioitinh;
$mucluong = getValue("mucluong", "int", "GET", 0);
$mucluong = (int)$mucluong;
$capbac = getValue("capbac", "int", "GET", 0);
$capbac = (int)$capbac;
$kinhnghiem = getValue("kinhnghiem", "int", "GET", 0);
$kinhnghiem = (int)$kinhnghiem;
//$dotuoi = getValue("dotuoi", "int", "GET", 0);
//$dotuoi = (int)$dotuoi;
$capnhat = getValue("capnhat","int","GET",0);
$capnhat = (int)$capnhat;
$sort_by = getValue("sortby","int","GET",0);
$sort_by = (int)$sort_by;
$rows = array();
if($keyword != '')
{
    if($cat_id != null){
        if($cat_id > 0)
        {
            $sql = " OR FIND_IN_SET('".$cat_id."', use_nganh_nghe))";
        }else
        {
            $sql = ')';
        }
    }
    if($city > 0)
    {
        $sql .= " AND FIND_IN_SET('".$city."', use_district_job)";
    }
    if ($nganhnghe != 0) {
        $sql .= " AND FIND_IN_SET(" . $nganhnghe . ",use_nganh_nghe)";
    }
    if ($hinhthuc != 0) {
        $sql .= " AND work_option = '" . $hinhthuc . "'";
    }
    if ($hocvan != 0) {
        $sql .= " AND rank = '" . $hocvan . "'";
    }
    if ($gioitinh != 0) {
        $sql .= " AND gender = '" . $gioitinh . "'";
    }
    if ($mucluong != 0) {
        $sql .= " AND salary = '" . $mucluong . "'";
    }
    if ($capbac != 0) {
        $sql .= " AND cap_bac_mong_muon = '" . $capbac . "'";
    }
    if ($kinhnghiem != 0) {
        $sql .= " AND exp_years = '" . $kinhnghiem . "'";
    }
//        if ($dotuoi != 0) {
//            $sql .= " AND new_do_tuoi = '" . $dotuoi . "'";
//        }
    $sql_sort_by = "";
    if ($sort_by == 2){
        $sql_sort_by .= " salary DESC,";
    }
    //$time = time() - 864000;
    $db_qr = new db_query("SELECT user.use_id,use_name,use_job_name,use_create_time,use_update_time,use_logo,gender,use_city,use_nganh_nghe,use_district_job,use_view_count,salary FROM user LEFT JOIN user_cv_upload ON user.use_id = user_cv_upload.use_id WHERE (use_job_name LIKE '%".$keysearch."%' ".$sql." ORDER BY".$sql_sort_by." use_update_time DESC LIMIT ".$start.",".$current);
    while($r = mysql_fetch_assoc($db_qr->result))
    {
        $rows[] = $r;
    }
    echo json_encode($rows);
}
else
{
    if ($city > 0) {
        $sql .= ' AND FIND_IN_SET(' . $city . ',use_district_job) ';
    }
    if ($nganhnghe != 0) {
        $sql .= " AND FIND_IN_SET(" . $nganhnghe . ",use_nganh_nghe)";
    }
    if ($hinhthuc != 0) {
        $sql .= " AND work_option = '" . $hinhthuc . "'";
    }
    if ($hocvan != 0) {
        $sql .= " AND rank = '" . $hocvan . "'";
    }
    if ($gioitinh != 0) {
        $sql .= " AND gender = '" . $gioitinh . "'";
    }
    if ($mucluong != 0) {
        $sql .= " AND salary = '" . $mucluong . "'";
    }
    if ($capbac != 0) {
        $sql .= " AND cap_bac_mong_muon = '" . $capbac . "'";
    }
    if ($kinhnghiem != 0) {
        $sql .= " AND exp_years = '" . $kinhnghiem . "'";
    }
    //        if ($dotuoi != 0) {
    //            $sql .= " AND new_do_tuoi = '" . $dotuoi . "'";
    //        }
    //$time = time() - 864000;
    $db_qr = new db_query("SELECT user.use_id,use_name,use_job_name,use_create_time,use_update_time,use_logo,gender,use_city,use_district_job,use_view_count,salary FROM user LEFT JOIN user_cv_upload ON user.use_id = user_cv_upload.use_id WHERE true " . $sql . " ORDER BY use_update_time DESC LIMIT " . $start . "," . $current);
    while ($r = mysql_fetch_assoc($db_qr->result)) {
        $rows[] = $r;
    }
    echo json_encode($rows);
}
?>
