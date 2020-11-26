<?php
    require_once("inc_security.php");
    require_once('../../../classes/PHPExcel.php');
    //gọi class DataGird
    $list = new fsDataGird($field_id,$field_name,translate_text("Listing"));
    $new_category_id	= array();
    $class_menu			= new menu();
    $startdate		= getValue("startdate", "str", "GET", "dd/mm/yyyy");
    $enddate			= getValue("enddate", "str", "GET", "dd/mm/yyyy");

    /*
    1: Ten truong trong bang
    2: Tieu de header
    3: kieu du lieu ( vnd 	: kiểu tiền VNĐ, usd : kiểu USD, date : kiểu ngày tháng, picture : kiểu hình ảnh,
                    array : kiểu combobox có thể edit, arraytext : kiểu combobox ko edit,
                    copy : kieu copy, checkbox : kieu check box, edit : kiểu edit, delete : kiểu delete, string : kiểu text có thể edit,
                    number : kiểu số, text : kiểu text không edit
    4: co sap xep hay khong, co thi de la 1, khong thi de la 0
    5: co tim kiem hay khong, co thi de la 1, khong thi de la 0
    */
    //$list->add("thi_picture","Image","picture",0,0);
    $list->add("usc_id","ID","string",0,1, '');
    // $list->add("usc_logo","Logo","string",0,0, '');
    $list->add($field_name, "Tên công ty", "string", 0, 1);
    $list->add("usc_phone","Số điện thoại","string",0,1);
    $list->add("usc_email","Email","string",0,1);
    $list->add("usc_skype","Skype","string",0,0,0);
    $list->add("usc_address","Địa chỉ","string",0,0,0);
    $list->add("usc_create_time","Ngày đăng ký","string",0,0,1);
    $list->add("usc_note","Ghi chú","string",0,0,0);
    $list->add("usc_active", "Active", "checkbox", 0, 0);
    $list->add("usc_show", "Show", "checkbox", 0, 0);
    $list->add("",translate_text("Sửa"),"edit");
    $list->add("",translate_text("Xóa"),"delete");
    $list->addSearch("Từ", "startdate", "date", $startdate, "dd/mm/yyyy");
    $list->addSearch("Đến", "enddate", "date", $enddate, "dd/mm/yyyy");
    $list->quickEdit 	= false;
    $list->ajaxedit($fs_table);

    $sql =	$list->sqlSearch();
    if($startdate != "dd/mm/yyyy"){
        $intdate		=	convertDateTime($startdate, "0:0:0");
        $sql			.= " AND usc_create_time >= " . $intdate;
        }
    if($enddate != "dd/mm/yyyy"){
        $intdate		=	convertDateTime($enddate, "23:59:59");
        $sql			.= " AND usc_create_time <= " . $intdate;
    }
    $total		= new db_count("SELECT count(*) AS count 
                                         FROM " . $fs_table . "
                                         WHERE usc_type = 0 " . $sql);

    $total_row = $total->total;
    $db_listing = new db_query("SELECT * 
                                         FROM " . $fs_table . "
                                         JOIN user_company_multi ON ".$fs_table.".usc_id = user_company_multi.usc_id
                                         WHERE usc_type = 0 " . $sql . "
                                         ORDER BY " . $list->sqlSort() .$fs_table.".". $field_id . " DESC " .
                                         $list->limit($total_row));
    $db_full = new db_query("SELECT * 
                                         FROM " . $fs_table . "
                                         JOIN user_company_multi ON ".$fs_table.".usc_id = user_company_multi.usc_id
                                         WHERE usc_type = 0 " . $sql . "
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
       $lists[]	=	$listsss;
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
<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<?=$load_header?>
	<?=$list->headerScript()?>
</head>
<body>
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
      <?=$list->start_tr($i, $row[$id_field]);?>
         <td align="center"><?=$row['usc_id']?></td>
                                                             
         <td style="padding-left: 20px;"><b><a href="http://timviec365.com/<?= replaceTitle($row['usc_company']) ?>-n<?= $row['usc_id'] ?>" target="_blank"><?=$row['usc_company']?></a></b></td>  
         <td style="padding-left: 20px;"><?=$row['usc_phone']?></td>    
         <td align="center"><?=$row['usc_email']?></td> 
         <td ><?= $row['usc_skype']!=''?$row['usc_skype']:''?></td>
         <td ><?= $row['usc_address']!=''?$row['usc_address']:'Chưa cập nhật'?></td>
         <td align="center"><?=date("d/m/Y",$row['usc_create_time'])?></td>
         <td align="center"><?= $row['usc_note']!=''?$row['usc_note']:''?></td> 
         <?=$list->showCheckbox("usc_authentic",$row['usc_authentic'],$row['usc_id'])?> 
         <?=$list->showCheckbox("usc_show",$row['usc_show'],$row['usc_id'])?>
         <?=$list->showEdit($row['usc_id'])?>         
         <?=$list->showDelete($row['usc_id'])?>                      
      <?=$list->end_tr();?>
      <?
   }
   ?>
   <?=$list->showFooter($total_row)?>
</div>
</body>
</html>