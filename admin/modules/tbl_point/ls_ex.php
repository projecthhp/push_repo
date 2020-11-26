<?php
require_once("inc_security_ls.php");
require_once('../../../classes/PHPExcel.php');

$record_id      = getValue("record_id");
if ($record_id == 0) {
   $record_id = getValue("search");
}

if (isset($_GET['return'])) {
   $db_category   = new db_execute("UPDATE tbl_point_used SET return_point = 1 WHERE usc_id = " . $record_id." AND use_id = ".$_GET['uid']);

   $db_category   = new db_execute("UPDATE tbl_point_used SET point = point + 1 WHERE usc_id = " . $record_id." AND use_id = 0 LIMIT 1");

   $db_category   = new db_execute("UPDATE tbl_point_company SET point_usc = point_usc + 1 WHERE usc_id = " . $record_id." LIMIT 1");

   $url = "https://timviec365.com".$_SERVER['REQUEST_URI'];
   $a = explode('&return', $url);
   redirect($a[0]);
}

$tt      = getValue("tt","str","GET","all");

//Loại bỏ dấu
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
function rewriteNewsUV($id,$title){
   $alas = replaceTitle($title);
   if ($alas == '') {
      $alas = 'ung-vien-ngoai-quoc';
   }
   return  "/ung-vien/".$alas. "-uv" . $id.".html";
}

$arr_err = array('all'=>'Tất cả','0'=>'Trạng thái','1'=>'Đã có việc','2'=>'Không nghe máy','3'=>'Sai thông tin','4'=>'Khác');


$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));
$new_category_id	= array();
$class_menu			= new menu();



$use_id      = getValue("use_id");


$list->add("use_id","ID uv","string",0,1, '');
$list->add("","Ứng viên đã xem","string",0,0, '');
$list->add("","SĐT","string",0,0, '');

$list->add("","Trạng thái","string",0,0, '');
$list->add("","Ghi chú","string",0,0, '');

$list->add("point","Số điểm trừ","string",0,0, '');
$list->add("type","Type","string",0,0, '');
$list->add("","Ngày","string",0,0, '');
$list->add("return_point", "Hoàn điểm", "checkbox", 1, 0);


$list->addSearch("Trạng thái", "tt", "array", $arr_err, $tt);

$list->quickEdit 	= false;
$list->ajaxedit($fs_table);
$sql =   $list->sqlSearch();
if ($tt != 'all') {
   $sql .= " AND type_err = '".$tt."'";
}

if ($use_id != 0) {
   $sql .= " AND user.use_id = '".$use_id."'";   
}



$total      = new db_count("SELECT count(*) AS count 
                            FROM " . $fs_table . " INNER JOIN user ON  tbl_point_used.use_id = user.use_id  WHERE usc_id = '".$record_id."'".$sql." AND tbl_point_used.use_id != '0' AND point <> 0");
                               
$total_row = $total->total;      
						 
$db = new db_query("SELECT * FROM " . $fs_table . " INNER JOIN  user ON  tbl_point_used.use_id = user.use_id  WHERE usc_id = '".$record_id."'".$sql." AND tbl_point_used.use_id != '0' AND point <> 0
                            ORDER BY " . $list->sqlSort() ." used_day DESC " );


$xuatex = getValue("postexcel","str","POST","");
if($xuatex != "")
{
$objPHPExcel = new PHPExcel();
 
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A1', 'Tên ứng viên')
->setCellValue('B1', 'Link ứng viên')
->setCellValue('C1', 'Ngày xem');
while($row = mysql_fetch_assoc($db->result))
{
   $listsss = 
   array(
   'name' => $row['use_name'],
   'link' => "https://timviec365.com".rewriteNewsUV($row['use_id'],$row['use_name']),
   'time'  => date('d/m/Y',$row['used_day']),
   );
   $lists[] =  $listsss;
}
//set gia tri cho cac cot du lieu
$i = 2;
foreach ($lists as $row2)
{
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A'.$i, $row2['name'])
->setCellValue('B'.$i, $row2['link'])
->setCellValueExplicit('C'.$i, $row2['time'],PHPExcel_Cell_DataType::TYPE_STRING);
$i++;
}
//ghi du lieu vao file,định dạng file excel 2007
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
ob_end_clean();
$full_path = 'data_uv.xlsx';//duong dan file

header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=data_uv.xlsx");
$objWriter->save('php://output');

}

$db_cpn = new db_query("SELECT usc_email FROM user_company WHERE usc_id = '".$record_id."'");
$row_cpn = mysql_fetch_assoc($db_cpn->result);

$name_cpn = $row_cpn['usc_email'];

?>
<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <?=$load_header?>
   <?=$list->headerScript()?>
</head>
<body>
<div id="listing">
   <?=$list->showHeader($total_row)?>
   <p style="font-size: 17px;position: absolute;right: 34px;top:0px;"><?=$name_cpn; ?></p>
   <form method="post" name="form_ab">
      <input type="submit" name="postexcel" class="bottom" style="float: left!important;margin-left: 13px!important;margin: 3px 13px 8px;!" value="Xuất Excel" />
   </form>   
   <?
   $i = 0;
   while($row = mysql_fetch_assoc($db->result)){
      $i++;                           
      ?>
      <?=$list->start_tr($i, $row[$id_field]);?>     
         <td align="center"><?=$row['use_id']?></td>
         <td align="center"><a target="_blank" rel="nofollow" href="<?="https://timviec365.com".rewriteNewsUV($row['use_id'],$row['use_name']);?>"><?=$row['use_name']?></a></td>
         <td align="center"><?=$row['use_phone']?></td>
         <td align="center"><?=$arr_err[$row['type_err']]?></td>
         <td align="center"><?=nl2br($row['note_uv'])?></td>  
         <td align="center"><?=$row['point']?></td> 

         <td align="center"><?= $row['type'] == 1 ? '-' : 'Mất Phí' ?></td>         
         <td align="center"><?= date('d/m/Y',$row['used_day'])?></td> 
         <td align="center">
         <? if ($row['return_point'] == 0) { ?>
            <a class="edit" onclick="update_check(this); return false" href="https://timviec365.com<?=$_SERVER['REQUEST_URI']?>&return=1&uid=<?=$row['use_id']?>"><img src="../../resource/images/grid/check_0.gif" border="0"></a>
         <? }else{ ?>
            <a class="edit" onclick="return false;"><img src="../../resource/images/grid/check_1.gif" border="0"></a>
         <? } ?>
      </td>

      <?=$list->end_tr();?>
      <? } ?>
   <?=$list->showFooter($total_row)?>

</div>

<script type="text/javascript">
   $('#search').val('<?=$record_id ?>');
   if ('<?=$tt?>' == 'all') {
      $('#tt option[value|="0"]:selected').removeAttr("selected");
   }
</script>
</body>
</html>