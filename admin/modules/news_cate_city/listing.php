<?php
require_once("inc_security.php");
//gọi class DataGird
$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));
$new_category_id  = array();
$class_menu     = new menu();

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


$list->add("cat_id", "Ngành nghề tại tỉnh thành","string",0, 0,'');
$list->add("seo_tt","SEO Title","string",0, 0,'');
$list->add("seo_key","SEO Keyword","string",0, 0,'');
$list->add("seo_des","SEO Des","string",0, 0,'');
$list->add("timecreate","Thời gian tạo","string",0, 0,'');
$list->add("timeupdate","Thời gian sửa","string",0, 0,'');
$list->add("",translate_text("Sửa"),"edit");

$list->quickEdit  = false;
$list->ajaxedit($fs_table);

$cate_id = getValue('cate_id','int','GET',0);
$cit_id = getValue('cit_id','int','GET',0);
$arrayCate = array(0=>translate_text(" Ngành nghề "));
$db_cate = new db_query("SELECT *
                  FROM category
                  ORDER BY cat_id ASC");
while($row = mysql_fetch_array($db_cate->result)){
    $arrayCate[$row["cat_id"]] = $row["cat_name"];
}
$arrayCit = array(0=>translate_text('Tỉnh thành'));
$db_cit = new db_query("SELECT * FROM city ORDER BY cit_id ASC");
while($row_cit = mysql_fetch_array($db_cit->result)){
  $arrayCit[$row_cit['cit_id']] = $row_cit['cit_name'];
}
$sql = '';
if($cate_id != 0){
    $sql .= ' AND '.$fs_table.'.cat_id = '.$cate_id;
}
if($cit_id != 0){
    $sql .= ' AND '.$fs_table.'.cit_id = '.$cit_id;
}
$list->addSearch(translate_text("Ngành nghề"),"cate_id","array",$arrayCate,$cate_id);
$list->addSearch(translate_text("Tỉnh thành"),"cit_id","array",$arrayCit,$cit_id);
$total      = new db_count("SELECT count(*) AS count FROM " . $fs_table." WHERE 1 ".$sql);

$total_row = $total->total;

$db = new db_query("SELECT ".$fs_table.".*, category.cat_name,city.cit_name FROM " . $fs_table." JOIN category ON category.cat_id = ".$fs_table.".cat_id JOIN city ON city.cit_id = ".$fs_table.".cit_id WHERE 1 ".$sql." ORDER BY " . $list->sqlSort() . $fs_table.".".$field_id . " ASC ".$list->limit($total_row));

$total      = new db_count("SELECT count(*) AS count FROM " . $fs_table." JOIN category ON category.cat_id = ".$fs_table.".cat_id JOIN city ON city.cit_id = ".$fs_table.".cit_id WHERE 1 ".$sql);
                               
$total_row = $total->total;

             
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
   $i=0;

   while($rows = mysql_fetch_assoc($db->result)){
      ?>
      <?=$list->start_tr($i+1, $rows[$id_field]);?>  
                                                          
      <td align="center"><a target="_blank" href="https://timviec365.com<?= rewriteCate($rows['cit_id'],$arrayCit[$rows['cit_id']],$rows['cat_id'],$arrayCate[$rows['cat_id']]) ?>"><?=$arrayCate[$rows['cat_id']]." tại ".$arrayCit[$rows['cit_id']];?></a> </td>  
         <td align="center"><?=$rows['meta_tit']?></td>
         <td align="center"><?=$rows['meta_key']?></td>
         <td align="center"><?=$rows['meta_des']?></td>
         <td align="center"><? echo date("d/m/Y",$rows['timecreate'])?></td>
         <td align="center"><? 
          if ($rows['timeupdate'] > 0) 
          {echo date("d/m/Y",$rows['timeupdate']);}
         else{echo "";} 
          ?></td>
         <?=$list->showEdit($rows[$field_id])?>            
      <?=$list->end_tr();?>
      <?
      $i++;
   }
   ?>
   <?=$list->showFooter($total_row)?>
</div>
<script src="/js/jquery.min.js"></script>
<script src="/js/select2.min.js"></script>
<script type="text/javascript">
    $("#cate_id").select2({
    });
    $("#cit_id").select2();
</script>
</body>
</html>