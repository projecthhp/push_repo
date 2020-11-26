<?php


require_once("inc_security.php");

$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));
$new_category_id  = array();
$class_menu     = new menu();


$cate = array(45,58,29,77,21,43,66,61,75,28,100,26);

$city = array(1,45);

  						 
// $db = new db_query("SELECT * FROM " . $fs_table." WHERE cate_id IN (".$cate.") && city_id IN (".$city.")");


// //Loại bỏ dấu
function remove_accent($mystring){
  $marTViet=array(
  "à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă","ằ","ắ","ặ","ẳ","ẵ",
  "è","é","ẹ","ẻ","ẽ","ê","ề","ế","ệ","ể","ễ",
  "ì","í","ị","ỉ","ĩ",
  "ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ","ờ","ớ","ợ","ở","ỡ",
  "ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
  "ỳ","ý","ỵ","ỷ","ỹ",
  "đ",
  "À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă","Ằ","Ắ","Ặ","Ẳ","Ẵ",
  "È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
  "Ì","Í","Ị","Ỉ","Ĩ",
  "Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ","Ờ","Ớ","Ợ","Ở","Ỡ",
  "Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
  "Ỳ","Ý","Ỵ","Ỷ","Ỹ",
  "Đ",
  "'");
  
  $marKoDau=array(
  "a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a",
  "e","e","e","e","e","e","e","e","e","e","e",
  "i","i","i","i","i",
  "o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o",
  "u","u","u","u","u","u","u","u","u","u","u",
  "y","y","y","y","y",
  "d",
  "A","A","A","A","A","A","A","A","A","A","A","A","A","A","A","A","A",
  "E","E","E","E","E","E","E","E","E","E","E",
  "I","I","I","I","I",
  "O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O",
  "U","U","U","U","U","U","U","U","U","U","U",
  "Y","Y","Y","Y","Y",
  "D",
  "");
  
  return str_replace($marTViet,$marKoDau,$mystring);
}


function replaceTitle($title){
  $title  = remove_accent($title);
  $title = str_replace('/', '',$title);
  $title = preg_replace('/[^\00-\255]+/u', '', $title);

  $title = html_entity_decode($title, ENT_COMPAT, 'UTF-8');
  if (preg_match("/[\p{Han}]/simu", $title)) {
      $title = str_replace(' ', '-', $title);
  }else{
    $arr_str  = array( "&lt;","&gt;","/"," / ","\\","&apos;", "&quot;","&amp;","lt;", "gt;","apos;", "quot;","amp;","&lt", "&gt","&apos", "&quot","&amp","&#34;","&#39;","&#38;","&#60;","&#62;");

    $title  = str_replace($arr_str, " ", $title);
    $title  = preg_replace('/\p{P}|\p{S}/u', ' ', $title);
    $title = preg_replace('/[^0-9a-zA-Z\s]+/', ' ', $title);

    //Remove double space
    $array = array(
      '    ' => ' ',
      '   ' => ' ',
      '  ' => ' ',
    );
    $title = trim(strtr($title, $array));
    $title  = str_replace(" ", "-", $title);
    $title  = urlencode($title);
    // remove cac ky tu dac biet sau khi urlencode
    $array_apter = array("%0D%0A","%","&");
    $title  = str_replace($array_apter,"-",$title);
    $title  = strtolower($title);
  }
  return $title;
}

function rewriteCate($city,$cityname,$nganhnghe,$catname){
  $linkrt = "";
  if($city != 0 && $nganhnghe == 0)
  {
   $linkrt = "/viec-lam-tai-".replaceTitle($cityname)."-c".$city.".html";
 }elseif($city == 0 && $nganhnghe  != 0)
 {
   $linkrt = "/viec-lam-".replaceTitle($catname)."-l".$nganhnghe.".html";
 }elseif($city != 0 && $nganhnghe  != 0){
   $linkrt = "/viec-lam-".replaceTitle($catname)."-tai-".replaceTitle($cityname)."-c".$city."l".$nganhnghe.".html";
 }
 return  $linkrt;
}

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=url.xls");
header("Pragma: no-cache");
header("Expires: 0");

   $db_qrr = new db_query("SELECT cit_id,cit_name FROM city");
   $arrcity  = $db_qrr->result_array('cit_id');
   $db_qr = new db_query("SELECT cat_id,cat_name FROM category WHERE cat_active = 1");
   $db_result  = $db_qr->result_array('cat_id');

  echo'<table border="1px solid black">';
  echo '<tr>';
  echo '<td><strong> URL</strong></td>';

  foreach ($cate as $key => $value) {

    foreach ($city as $keys => $values) {
      $link = 'https://timviec365.com'.rewriteCate($values,$arrcity[$values]['cit_name'],$value,$db_result[$value]['cat_name']);
      echo'<table border="1px solid black">';
      echo'<tr>';
      echo'<td>'.$link.'</td>';
    }
  }

echo '</tr>';
echo '</table>';
?>
