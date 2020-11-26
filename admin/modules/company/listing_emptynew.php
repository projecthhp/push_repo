<?
require_once("inc_security.php");
require_once('../../../classes/PHPExcel.php');
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
$startdate     = getValue("startdate", "str", "GET", "dd/mm/yyyy");
$enddate       = getValue("enddate", "str", "GET", "dd/mm/yyyy");
    //gọi class DataGird
    $list = new fsDataGird($field_id,$field_name,translate_text("Listing"));
    $list->quickEdit    = false;

    $list->add("usc_id","ID","string",0,0);
   $list->add("usc_company",'Tên công ty','string',0,1);
    $list->add("usc_mail","Email","string",0,1);
    $list->add("use_phone", "Số điện thoại", "string",0,0);
   $list->add("usc_skype", "Skype", "string",0,0);
   $list->add("usc_website", "Website", "string",0,0);
    $list->add("usc_create_time", "Ngày đăng ký", "string",0,0);
   $list->addSearch("Từ", "startdate", "date", $startdate, "dd/mm/yyyy");
   $list->addSearch("Đến", "enddate", "date", $enddate, "dd/mm/yyyy");
   $list->quickEdit  = false;
    
    $list->ajaxedit($fs_table);
    
       $sql =   $list->sqlSearch();
   if($startdate != "dd/mm/yyyy"){
      $intdate    =  convertDateTime($startdate, "0:0:0");
      $sql        .= " AND usc_create_time >= " . $intdate;
      }
   if($enddate != "dd/mm/yyyy"){
      $intdate    =  convertDateTime($enddate, "23:59:59");
      $sql        .= " AND usc_create_time <= " . $intdate;
   }  

    $total          = new db_count("SELECT count(*) AS count FROM " . $fs_table . " JOIN user_company_multi ON user_company.usc_id = user_company_multi.usc_id LEFT JOIN new ON " . $fs_table . ".usc_id = new.new_user_id WHERE 1 ".$sql." AND new.new_id IS NULL AND usc_alias <> ''");                                   
    $db_listing = new db_query("SELECT * FROM " . $fs_table . " JOIN user_company_multi ON user_company.usc_id = user_company_multi.usc_id LEFT JOIN new ON " . $fs_table . ".usc_id = new.new_user_id WHERE 1 ".$sql." AND new.new_id IS NULL AND usc_alias <> '' ORDER BY " . $list->sqlSort() .$fs_table.".". $field_id . " DESC
                                         " . $list->limit($total->total));
    $total_row = mysql_num_rows($db_listing->result);
   $db_full = new db_query("SELECT * FROM " . $fs_table . " JOIN user_company_multi ON user_company.usc_id = user_company_multi.usc_id LEFT JOIN new ON " . $fs_table . ".usc_id = new.new_user_id WHERE 1 ".$sql." AND new.new_id IS NULL AND usc_alias <> '' ORDER BY " . $list->sqlSort() .$fs_table.".". $field_id . " DESC ");
$xuatex = getValue("postexcel","str","POST","");
    if($xuatex != "")
    {
    $objPHPExcel = new PHPExcel();

    $objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', 'Tên công ty')
    ->setCellValue('B1', 'Email')
    ->setCellValue('C1', 'Số điện thoại')
    ->setCellValue('D1', 'Ngày đăng ký')
    ->setCellValue('E1', 'Skype');
    while($rowx = mysql_fetch_assoc($db_full->result))
    {
        $db_check = new db_query("SELECT count(*) FROM new WHERE new_user_id = ".$rowx['usc_id']);
        $num = mysql_fetch_array($db_check->result);
        $num = $num['count(*)'];
        if($num==0){
           $listsss =
           array(
           'name' => $rowx['usc_company'],
           'email' => $rowx['usc_email'],
           'phone' => $rowx['usc_phone'],
           'time'  => date("d/m/Y",$rowx['usc_create_time']),
           'skype' => $rowx['usc_skype'],
           );
           $lists[]   =  $listsss;
        }
    }
    //set gia tri cho cac cot du lieu
    $i = 2;
    foreach ($lists as $row2)
    {
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $row2['name'])
            ->setCellValue('B'.$i, $row2['email'])
            ->setCellValueExplicit('C'.$i, $row2['phone'],PHPExcel_Cell_DataType::TYPE_STRING)
            ->setCellValue('D'.$i, $row2['time'])
            ->setCellValue('E'.$i, $row2['skype']);
    $i++;
    }
//ghi du lieu vao file,định dạng file excel 2007
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    ob_end_clean();
    $full_path = 'data_company.xlsx';//duong dan file

    header('Content-type: application/vnd.ms-excel');
    header("Content-Disposition: attachment; filename=data_company.xlsx");
    $objWriter->save('php://output');

}

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
<form method="post" name="form_ab">
   <input type="submit" name="postexcel" class="bottom" style="float: left!important;margin-left: 13px!important;margin: 3px 13px 8px;!" value="Xuất Excel" />
</form>
   <?
   $i=0;
   $num_total = 0;
   while($row = mysql_fetch_assoc($db_listing->result)){
    $db_check = new db_query("SELECT count(*) FROM new WHERE new_user_id = ".$row['usc_id']);
    $num = mysql_fetch_array($db_check->result);
    $num = $num['count(*)'];
    if($num==0){
      $i++;
      ?>
      <?=$list->start_tr($i, $row['usc_id']);?>     
         <? $url = "/".replaceTitle($row['usc_company'])."-n".$row['usc_id'].".html"; ?>
         <td style="text-align: center"><?=$row['usc_id']?></td>  
         <td><a target="_blank" href="<?=$url?>" style="text-transform: capitalize;"><?= $row['usc_company']?></a></td>
         <td style="padding-left: 20px;"><?=$row['usc_email']?></td> 
         <td style="text-align: center;"><?=$row['usc_phone']?></td>
         <td style="text-align: center;"><?=$row['usc_skype']?></td>
         <td style="text-align: center;word-break: break-word"><?=($row['usc_website']!='')?$row['usc_website']:"Chưa cập nhật"?></td>
         <td style="text-align: center;"><?=date('d/m/Y',$row['usc_create_time'])?></td>                 
      <?=$list->end_tr();?>
      <?
      $num_total++;
    }
   }
   ?>
   <?=$list->showFooter($num_total)?>

</div>
<? /*---------Body------------*/ ?>
</body>
</html>