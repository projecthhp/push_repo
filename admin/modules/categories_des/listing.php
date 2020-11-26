<?php
require_once("inc_security.php");

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

function rewriteCate($city,$cityname){
$linkrt = "";

if($city != 0)
{
   $linkrt = "/viec-lam-tai-".replaceTitle($cityname)."-c".$city;
}

return  $linkrt;
}


//gọi class DataGird
$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));
$new_category_id  = array();
$class_menu       = new menu();

$arrayCit = array(0=>translate_text("City"));

// $list->add("cate_id","Ngành nghề","string",0,0, '');
// $list->add("cit_id","Tỉnh thành","string",0,0, '');
// $list->add("","Link dẫn","string",0,0, '');
// $list->add("key_teaser","Mô tả","string",0,0, '');
// $list->add("cate_type", "Ghim", "checkbox", 0, 0);
// $list->add("",translate_text("Sửa"),"edit");

$list->add("city_id","Tỉnh thành","string",0,0, '');
$list->add("","Link dẫn","string",0,0, '');
// $list->add("cate_des","Mô tả","string",0,0, '');
$list->add("cit_title","Title SEO","string",0,0, '');
$list->add("cit_description","Description","string",0,0, '');
$list->add("cit_keyword","Keywords","string",0,0, '');
$list->add("",translate_text("Sửa"),"edit");


$list->quickEdit  = false;
$list->ajaxedit($fs_table);

  
$city_id      = getValue("city_id","str","GET","");
if($city_id=="") $city_id=getValue("city_id","str","POST","");                  

// $cate_id      = getValue("cate_id","str","GET","");
// if($cate_id=="") $cate_id=getValue("cate_id","str","POST","");  


// if($city_id=="" && $cate_id=="") {
//   $cate_id=getValue("cate_id","str","POST","");
//   $city_id=getValue("city_id","str","POST","");
$sql="";
// }


// if($cate_id !="" && $cate_id != 0)  $sql .= " AND cate_id = '" . $cate_id . "'";

if($city_id !="" && $city_id != 0)  $sql .= " AND city_id = '" . $city_id . "'";



$total      = new db_count("SELECT count(*) AS count 
                            FROM " . $fs_table ." WHERE 1 ". $sql);
                               
$total_row = $total->total; 

$db = new db_query("SELECT * 
                   FROM " . $fs_table . "
                   WHERE 1 ". $sql ."
                   ORDER BY " . $list->sqlSort() . $field_id . " ASC " . 
                   $list->limit($total_row));


 
// $arrayCat = array(0=>translate_text(" Ngành nghề "));
// $db_cateogry = new db_query("SELECT cat_name,cat_id
//                   FROM category
//                   WHERE cat_active = 1 
//                   ORDER BY cat_name ASC");
// while($row = mysql_fetch_array($db_cateogry->result)){
//   $arrayCat[$row["cat_id"]] = $row["cat_name"];
// }

$arrayCit = array(0=>translate_text(" Tỉnh thành "));
$db_city = new db_query("SELECT cit_name,cit_id
                  FROM city
                  ORDER BY cit_name ASC");
while($row = mysql_fetch_array($db_city->result)){
  $arrayCit[$row["cit_id"]] = $row["cit_name"];
}



// $list->addSearch(translate_text("Ngành nghề"),"cate_id","array",$arrayCat,$cate_id);
$list->addSearch(translate_text("Tỉnh thành"),"city_id","array",$arrayCit,$city_id);

?>
<!DOCTYPE html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <?=$load_header?>
   <?=$list->headerScript()?>
   <link rel="stylesheet" type="text/css" href="/css/select2.min.css">
</head>
<body>
<div id="listing">
   <?=$list->showHeader($total_row)?>
   <?
 $db_qrr = new db_query("SELECT cit_id,cit_name FROM city ORDER BY cit_count DESC,cit_name ASC");
 $arrcity  = $db_qrr->result_array('cit_id');
   $i=0;
   while($row = mysql_fetch_assoc($db->result)){
      $i++;
      $city = $row['city_id'] != 0?$arrcity[$row['city_id']]['cit_name']:"";
      $link = "https://timviec365.com".rewriteCate($row['city_id'],$city).".html";
      ?>
      <?=$list->start_tr($i, $row[$field_id]);?>                                                          
         <td align="center"><?= $row['city_id'] != 0?$arrcity[$row['city_id']]['cit_name']:""?></td>
         <td align="center"><a href="<?=$link ?>" target="_blank"><?=$link ?></a></td>
         <!-- <td><?= cut_string($row['cate_des'],'150','...') ?></td> -->
          <td><?= $row['cit_title'] ?></td>
          <td><?= $row['cit_description'] ?></td>
          <td><?= $row['cit_keyword'] ?></td>

         <?=$list->showEdit($row['id'])?>                        
      <?=$list->end_tr();?>
      <?
   }
   ?>
   <?=$list->showFooter($total_row)?>
</div>


</body>

<script src="/js/jquery.min.js"></script>
<script src="/js/select2.min.js"></script>
<script type="text/javascript">
  $("#city_id").select2();
</script>

</html>