<?
date_default_timezone_set("Asia/Ho_Chi_Minh");

$time_begin = time()-86400;

$date = date('d/m/Y',time());

require_once("inc_security.php");

$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));
$new_category_id  = array();
$class_menu     = new menu();


               
$db = new db_query("SELECT user.use_id,use_mail,use_name,use_phone,birthday,use_city,use_district,lg_honnhan,gender,use_create_time,address,use_job_name,use_nganh_nghe,use_district_job,exp_years,salary,muc_tieu_nghe_nghiep,ki_nang_ban_than,cap_bac_mong_muon,work_option,use_lat,use_long,link,name_cv_hide FROM user LEFT JOIN user_cv_upload ON user.use_id = user_cv_upload.use_id LEFT JOIN savecandicv ON user.use_id = savecandicv.iduser WHERE register != 3 AND register != 4 AND use_create_time > $time_begin");

if(mysql_num_rows($db->result) == 0){
  echo 'Hiện tại chưa có ứng viên nhập mới trong 1 ngày trở lại đây. Vui lòng nhập ứng viên mới và xuất file vào cuối ngày !!!!';
  die;
}

$arr_cate = array(
    44 => 87,
    6 => 87,
    88 => 89,
    90 => 93,
    91 => 95,
    92 => 97,
    94 => 101,
    95 => 103,
    97 => 107,
    98 => 109,
    99 => 111,
    100 => 113,
    101 => 115,
    102 => 119,
    103 => 121,
    104 => 123,
    105 => 125,
    106 => 127,
    107 => 131,
    108 => 141
);

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=timviec365_com_".$date.".xls");
header("Pragma: no-cache");
header("Expires: 0");

  echo'<table border="1px solid black">';

  while($row = mysql_fetch_assoc($db->result)){

    if ($row['link'] != '') {
        $link = str_replace('../upload/', 'https://timviec365.com/upload/',$row['link']);
    }else{
        $link = '';
    }

    if ($row['name_cv_hide'] != '') {
        $nameimg_hide = 'https://timviec365.com/upload/cv_uv/uv_'.$row['use_id'].'/'.$row['name_cv_hide'];
    }else{
        $nameimg_hide = '';
    }

    $arr_check = explode(',', $row['use_nganh_nghe']);
    foreach ($arr_check as $key => $value) {
        if (array_key_exists($value, $arr_cate)) {
           $arr_check[$key]  = $arr_cate[$value];
        }
    }

    $nganh_nghe = implode(',', $arr_check);

    echo'<tr>
    <td>'.$row['use_mail'].'</td>
    <td>'.$row['use_name'].'</td>
    <td>'.$row['use_phone'].'</td>
    <td>'.$row['birthday'].'</td>
    <td>'.$row['use_city'].'</td>
    <td>'.$row['use_district'].'</td>
    <td>'.$row['lg_honnhan'].'</td>
    <td>'.$row['gender'].'</td>
    <td>'.$row['use_create_time'].'</td>
    <td>'.$row['address'].'</td>
    <td>'.$row['use_job_name'].'</td>

    <td>'.$nganh_nghe.'</td>

    <td>'.$row['use_district_job'].'</td>
    <td>'.$row['exp_years'].'</td>
    <td>'.$row['salary'].'</td>
    <td>'.$row['muc_tieu_nghe_nghiep'].'</td>
    <td>'.$row['ki_nang_ban_than'].'</td>
    <td>'.$row['cap_bac_mong_muon'].'</td>
    <td>'.$row['work_option'].'</td>
    <td>'.$row['use_lat'].'</td>
    <td>'.$row['use_long'].'</td>
    <td>'.$link.'</td>
    <td>'.$nameimg_hide.'</td>
    </tr>';
  }
echo '</table>';

?>