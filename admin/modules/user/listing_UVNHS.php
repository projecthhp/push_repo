<?
require_once("inc_security.php");

function replaceTitle($title){
   $title   = remove_accent($title);
   $arr_str = array( "&lt;","&gt;","/","\\","&apos;", "&quot;","&amp;","lt;", "gt;","apos;", "quot;","amp;","&lt", "&gt","&apos", "&quot","&amp","&#34;","&#39;","&#38;","&#60;","&#62;");
   $title   = str_replace($arr_str, " ", $title);
   $title = preg_replace('/[^0-9a-zA-Z\s]+/', ' ', $title);
   //Remove double space
   $array = array(
      '    ' => ' ',
      '   ' => ' ',
      '  ' => ' ',
   );
   $title = trim(strtr($title, $array));
   $title   = str_replace(" ", "-", $title);
   $title   = urlencode($title);
   // remove cac ky tu dac biet sau khi urlencode
   $array_apter = array("%0D%0A","%","&");
   $title   =  str_replace($array_apter,"-",$title);
   $title   = strtolower($title);
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
function name_company($name)
{
   $name = trim($name);
   $name = mb_convert_case($name,MB_CASE_TITLE,'UTF-8');
   $name = str_replace("tnhh","TNHH",$name);
   $name = str_replace("Tnhh","TNHH",$name);
   $name = str_replace("cp","CP",$name);
   $name = str_replace("Cp","CP",$name);
   return $name;
}
$new_category_id  = array();
$class_menu       = new menu();
$startdate     = getValue("startdate", "str", "GET", "dd/mm/yyyy");
$enddate       = getValue("enddate", "str", "GET", "dd/mm/yyyy");
    //gọi class DataGird
    $list = new fsDataGird($field_id,$field_name,translate_text("Listing"));
    $list->quickEdit    = false;
    $array_ketqua = array(
        0=>'Chưa cập nhật',
        1=>'Trúng tuyển',
        2=>'Không đạt y/c'
    );
    // $list->add("use_id","ID","string",0,0);
    $list->add("use_name",'Tên ứng viên','string',0,1);
    $list->add("usc_company", "Tên công ty", "string",0,1);
    $list->add("new_title", "Việc làm", "string",0,1);
    $list->add("", "Trạng thái", "string",0,0);
    $list->add("", "Ghi chú", "string",0,0);
    $indexNguon = getValue("result", "int", "GET", "0");
    $list->addSearch("Từ", "startdate", "date", $startdate, "dd/mm/yyyy");
    $list->addSearch("Đến", "enddate", "date", $enddate, "dd/mm/yyyy");
    $list->addSearch("Kết quả", "result", "array", $array_ketqua, $indexNguon);
    $list->quickEdit  = false;
    
    $list->ajaxedit($fs_table);
    
       $sql =   $list->sqlSearch();
   if($startdate != "dd/mm/yyyy"){
      $intdate    =  convertDateTime($startdate, "0:0:0");
      $sql        .= " AND nhs_time >= " . $intdate;
      }
   if($enddate != "dd/mm/yyyy"){
      $intdate    =  convertDateTime($enddate, "23:59:59");
      $sql        .= " AND nhs_time <= " . $intdate;
   }  
    if ($indexNguon != 0) {
        $sql .= " AND nop_ho_so.result = " . $indexNguon . "";
    }
        
    $total          = new db_count("SELECT count(*) AS count 
                                             FROM " . $fs_table . "
                                             JOIN nop_ho_so ON user.use_id = nop_ho_so.nhs_use_id
                                               JOIN new ON new.new_id = nop_ho_so.nhs_new_id
                                               JOIN user_company ON user_company.usc_id = nop_ho_so.nhs_com_id
                                             WHERE 1 " . $sql);                                  
    $db_listing = new db_query("SELECT * 
                                         FROM " . $fs_table . "
                               JOIN nop_ho_so ON user.use_id = nop_ho_so.nhs_use_id
                               JOIN new ON new.new_id = nop_ho_so.nhs_new_id
                               JOIN user_company ON user_company.usc_id = nop_ho_so.nhs_com_id
                             WHERE 1 " . $sql . "
                             ORDER BY " . $list->sqlSort() . " id DESC
                             " . $list->limit($total->total));
    $total_row = mysql_num_rows($db_listing->result);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?=$load_header?>
<?=$list->headerScript()?>
</head>
<body topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
<? /*---------Body------------*/ ?>
<div id="listing">

<?=$list->showHeader($total_row)?>
   <?
   $i=0;
   while($row = mysql_fetch_assoc($db_listing->result)){
      $i++;
      ?>
      <?=$list->start_tr($i, $row['id']);?>     
         <? $url = "/ung-vien/".replaceTitle($row['use_name'])."-uv".$row['use_id'].".html"; ?>
         <td><a target="_blank" href="<?=$url?>" style="text-transform: capitalize;"><?= $row['use_name']?></a></td>
         <td style="text-align: center;"><?=name_company($row['usc_company'])?></td>
         <td style="text-align: center;"><?=$row['new_title']?></td>
         <td style="text-align: center;"><?=$array_ketqua[$row['result']]?></td> 
         <td style="text-align: center;"><?=$row['note']?></td>                 
      <?=$list->end_tr();?>
      <?
   }
   ?>
   <?=$list->showFooter($total_row)?>
</div>
<? /*---------Body------------*/ ?>
</body>
</html>