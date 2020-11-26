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
if(isset($_GET['city'])){
    $id = getValue('city','int','GET',0);
    
    if($id > 0)
    {
        $db_qr = new db_query("SELECT * FROM city2 WHERE cit_parent = ".$id);
        if(mysql_num_rows($db_qr->result) > 0){
            echo "<option value=0>Chọn quận / huyện</option>";
            while($row = mysql_fetch_assoc($db_qr->result))
            {
                echo "<option value=".$row['cit_id'].">".$row['cit_name']."</option>";
            }
        }
    }
    else{
        echo "<option value=0>Chọn quận / huyện</option>";
    }
    exit();
}
$isAdm = $_SESSION["isAdmin"];

$db_qr = new db_query("SELECT cit_id, cit_name FROM city");
$arr_city[0] = "Chọn tỉnh thành";
while ($row = mysql_fetch_array($db_qr->result)) {
  $arr_city[$row['cit_id']] = $row['cit_name'];
}
unset($db_qr,$row);
$new_category_id  = array();
$class_menu       = new menu();
$startdate     = getValue("startdate", "str", "GET", "dd/mm/yyyy");
$enddate       = getValue("enddate", "str", "GET", "dd/mm/yyyy");
$city          = getValue("city_sl","str","GET",0);
$district      = getValue('district','str','GET',0);
$arr_disctrict[0] = "Chọn quận huyện";
if($district != 0){
  $db_qr = new db_query("SELECT cit_id, cit_name FROM city2 WHERE cit_parent = ".$city);
  $arr_disctrict[0] = "Chọn quận huyện";
  while ($row = mysql_fetch_array($db_qr->result)) {
    $arr_disctrict[$row['cit_id']] = $row['cit_name'];
  } 
  unset($db_qr,$row);
}
	//gọi class DataGird
	$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));
	$list->quickEdit 	= false;

	$list->add("user_company.usc_id","ID","string",0,1);
  $list->add("usc_company",'Tên công ty','string',0,1);
  $list->add("usc_phone", "Số điện thoại", "string",0,1);
	$list->add("usc_email","Email","string",0,1);
  $list->add("usc_skype", "Skype or Zalo", "string",0,0);
  $list->add("usc_address", "Địa chỉ", "string",0,0);
  $list->add("usc_website", "Website", "string",0,0);
  $list->add("usc_create_time", "Ngày đăng ký", "string",0,0);
  $list->add("usc_authentic", "Active", "checkbox", 0, 0);
  if($isAdm == 1) $list->add("usc_index", "index", "checkbox", 0, 0);
  $list->add("usc_note","Ghi chú","string",0,0,0);
  $list->add("",translate_text("Sửa"),"edit");
  $list->add("",translate_text("Xóa"),"delete");
  $list->addSearch("Tỉnh thành", "city_sl", "array", $arr_city, $city);
  $list->addSearch("Quận huyện", "district", "array", $arr_disctrict, $district);
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
   if($city != 0){
    $sql .= " AND usc_city = $city";
   }
   if($district != 0){
    $sql .= " AND usc_district = $district";
   }
		
	$total			= new db_count("SELECT count(*) AS count 
                                 
											 FROM " . $fs_table . " JOIN user_company_multi ON ".$fs_table.".usc_id = user_company_multi.usc_id
											 WHERE 1 " . $sql." AND (usc_alias <> '' OR register = 2) ORDER BY usc_create_time DESC");									 
	$db_listing = new db_query("SELECT * FROM " . $fs_table . " 
                              JOIN user_company_multi ON ".$fs_table.".usc_id = user_company_multi.usc_id
										 WHERE 1 " . $sql . " AND (usc_alias <> '' OR register = 2)
										 ORDER BY usc_create_time DESC
										 " . $list->limit($total->total));

	$total_row = mysql_num_rows($db_listing->result);
   $db_full = new db_query("SELECT * FROM " . $fs_table . " 
                              JOIN user_company_multi ON ".$fs_table.".usc_id = user_company_multi.usc_id
                               WHERE 1 " . $sql . " AND (usc_alias <> '' OR register = 2)
                               ORDER BY " . $list->sqlSort() .$fs_table.".". $field_id . " DESC ");
                               
$xuatex = getValue("postexcel","str","POST","");
    if($xuatex != "")
    {
    $objPHPExcel = new PHPExcel();

    $objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', 'Tên công ty')
    ->setCellValue('B1', 'Email')
    ->setCellValue('C1', 'Số điện thoại')
    ->setCellValue('D1', 'Ngày đăng ký')
    ->setCellValue('E1', 'Địa chỉ');
    while($rowx = mysql_fetch_assoc($db_full->result))
    {
       $listsss =
       array(
       'name' => $rowx['usc_company'],
       'email' => $rowx['usc_email'],
       'phone' => $rowx['usc_phone'],
       'time'  => date("d/m/Y",$rowx['usc_create_time']),
       'address' => $rowx['usc_address'],
       );
       $lists[]   =  $listsss;
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
            ->setCellValue('E'.$i, $row2['address']);
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
   while($row = mysql_fetch_assoc($db_listing->result)){
      $i++;
      ?>
      <?=$list->start_tr($i, $row['usc_id']);?>     
         <? $url = "/".replaceTitle($row['usc_company'])."-n".$row['usc_id'].".html"; ?>
         <td style="text-align: center"><?=$row['usc_id']?></td>  
         <td><a target="_blank" href="<?=$url?>" style="text-transform: capitalize;"><?= $row['usc_company']?></a></td>
         <td style="text-align: center;"><?=$row['usc_phone']?></td>
         <td style="padding-left: 20px;"><?=$row['usc_email']?></td> 
         <td style="text-align: center;"><?=$row['usc_skype']?></td>
         <td style="text-align: center;"><?=$row['usc_address']?></td>
         <td style="text-align: center;"><?=($row['usc_website']!='')?$row['usc_website']:"Chưa cập nhật"?></td>
         <td style="text-align: center;"><?=date('d/m/Y',$row['usc_create_time'])?></td>
         <?=$list->showCheckbox("usc_authentic",$row['usc_authentic'],$row['usc_id'])?>
         <?
         if($isAdm == 1) echo $list->showCheckbox("usc_index",$row['usc_index'],$row['usc_id']);
         ?>
         <td align="center"><?= $row['usc_note']!=''?$row['usc_note']:''?></td>  
         <?=$list->showEdit($row['usc_id'])?>   
         <?=$list->showDelete($row['usc_id'])?>                   
      <?=$list->end_tr();?>
      <?
   }
   ?>
   <?=$list->showFooter($total_row)?>
<script>
  $('#city_sl').change(function(){
    var id = $(this).val();

    $.ajax({
      type: "GET",
      url: "add.php?city="+id,
      data:{
        id: id
      },
      success:function(data){
        $('#district').html(data);
      }
    });
  });
</script>
</div>
<? /*---------Body------------*/ ?>
</body>
</html>