<?php
require_once("inc_security.php");
$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));
$new_category_id  = array();
$class_menu     = new menu();

function replaceTitle($title){
  $title  = remove_accent($title);
  $arr_str  = array( "&lt;","&gt;","/","\\","&apos;", "&quot;","&amp;","lt;", "gt;","apos;", "quot;","amp;","&lt", "&gt","&apos", "&quot","&amp","&#34;","&#39;","&#38;","&#60;","&#62;");
  $title  = str_replace($arr_str, " ", $title);
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
  return $title;
}
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


$db = new db_query("SELECT * 
                   FROM " . $fs_table . "
                   WHERE 1 " . $sql . " AND new_new = 0
                   ORDER BY " . $list->sqlSort() . $field_id . " DESC " 
                   );



header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=blog.xls");
header("Pragma: no-cache");
header("Expires: 0");

  echo'<table border="1px solid black">';
  echo '<tr>';

  echo '<td><strong> STT  </strong></td>';
  echo '<td><strong> Title  </strong></td>';
  echo '<td><strong> URL</strong></td>';
   $i=0;
   while($row = mysql_fetch_assoc($db->result)){
      $i++;
      $link = "https://timviec365.vn/blog/".replaceTitle($row['new_title'])."-new".$row['new_id'].".html";

    echo'<table border="1px solid black">';
    echo'<tr>';
    echo'<td>'.$i.'</td>';
    echo'<td>'.$row['new_title'].'</td>';
    echo'<td>'.$link.'</td>';
   }
echo '</tr>';
echo '</table>';
?>
