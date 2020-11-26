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
$new_category_id  = array();
$class_menu       = new menu();
	//gọi class DataGird
	$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));
	$list->quickEdit 	= false;

	$list->add("usc_id","ID công ty","string",0,1);
	$list->add("use_id", "ID ứng viên", "string",0,1);
   $list->add("use_phone", "SĐT ứng viên", "string",0,0);
   $list->add("note","Đánh giá ứng viên","string",0,0);
	$list->add("note_com", "Đánh giá nhà tuyển dụng", "string",0,0);
   $list->add("date_result","Ngày đánh giá","string",0,0);
	$list->add("",translate_text("Xóa"),"delete");
   $list->quickEdit  = false;
	
	$list->ajaxedit($fs_table);
   $usc_id = getValue('usc_id','str','GET','');
   $use_id = getValue('use_id','str','GET','');
   $sql =   $list->sqlSearch();
   if($usc_id!=''){
      $sql .= " AND ".$fs_table.".usc_id = '".$usc_id."'";
   }
   if($use_id!=''){
      $sql .= " AND ".$fs_table.".use_id = '".$use_id."'";
   }

		
	$total			= new db_count("SELECT count(*) AS count 
											 FROM " . $fs_table . "
                                  JOIN user_company ON user_company.usc_id = ".$fs_table.".usc_id 
                                  JOIN user ON user.use_id = ".$fs_table.".use_id
											 WHERE type = 1 AND note_uv != '' " . $sql);									 
	$db_listing = new db_query("SELECT * 
										 FROM " . $fs_table . "
                               JOIN user_company ON user_company.usc_id = ".$fs_table.".usc_id 
                               JOIN user ON user.use_id = ".$fs_table.".use_id
										 WHERE type = 1 AND note_uv != '' " . $sql . "
										 ORDER BY " . $list->sqlSort() . " used_day DESC
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
      <?=$list->start_tr($i,$row['usc_id']);?>      
         <td style="padding-left: 20px;"><a target="_blank" href="https://timviec365.com/<?=replaceTitle($row['usc_company'])?>-n<?=$row['usc_id']?>.html"><?=$row['usc_company']?></a></td>  
         <td style="text-align: center;"><a target="_blank" href="https://timviec365.com/ung-vien/<?=replaceTitle($row['use_name'])?>-uv<?=$row['use_id']?>.html"><?=$row['use_name']?></a></td>    
         <td style="text-align: center;"><?= $row['use_phone']?></td>
         <td style="text-align: center;"><?= $row['note_uv']?></td>
         <td style="text-align: center;"><?=($row['used_day']>0)?"":""?></td>
         <td style="text-align: center;"><?=($row['used_day']>0)?date('d/m/Y',$row['used_day']):""?></td>     
         <?=$list->showDelete($row['usc_id'])?>                      
      <?=$list->end_tr();?>
      <?
   }
   ?>
   <?=$list->showFooter($total_row)?>

</div>
<? /*---------Body------------*/ ?>
</body>
</html>