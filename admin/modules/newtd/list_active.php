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
$list->add("new_id","ID","string",0,1);
$list->add($field_name, translate_text("Tiêu đề"), "string", 0, 1);
$list->add("usc_company","Tên công ty","string",0,1);
$list->add("new_create_time","Ngày đăng tin","string",0,0,1);
$list->add("","Chi tiết tin","string",0,0,1);

// $list->add("",translate_text("Làm mới"),"Làm mới");
$list->add("",translate_text("Sửa"),"edit");

$list->addSearch("Từ", "startdate", "date", $startdate, "dd/mm/yyyy");
$list->addSearch("Đến", "enddate", "date", $enddate, "dd/mm/yyyy");
$list->quickEdit 	= true;
$list->ajaxedit($fs_table);

$sql =	$list->sqlSearch();
if($startdate != "dd/mm/yyyy"){
	$intdate		=	convertDateTime($startdate, "0:0:0");
	$sql			.= " AND new_create_time >= " . $intdate;
	}
if($enddate != "dd/mm/yyyy"){
	$intdate		=	convertDateTime($enddate, "23:59:59");
	$sql			.= " AND new_create_time <= " . $intdate;
}	
$total		= new db_count("SELECT count(*) AS count 
									 FROM " . $fs_table . "
                            JOIN user_company ON new.new_user_id = user_company.usc_id
									 WHERE new_md5='' AND new_thuc = 0  " . $sql);
										 
$total_row = $total->total;							 
$db_listing = new db_query("SELECT * 
									 FROM " . $fs_table . "
                            JOIN user_company ON new.new_user_id = user_company.usc_id
									 WHERE new_md5='' " . $sql . " AND new_thuc = 0 
									 ORDER BY " . $list->sqlSort() . $field_id . " DESC " . 
									 $list->limit($total_row));
function rewrite_company($idcp,$namecp,$alias)
{
  if($alias!='') $compn = "/".$alias."-n".$idcp.".html";
  else $compn = "/".replaceTitle($namecp)."-n".$idcp.".html";
  return $compn;
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
   <?
   $i=0;
   while($row = mysql_fetch_assoc($db_listing->result)){
      $i++;
      
      ?>
      <?=$list->start_tr($i, $row[$id_field]);?>
         <td style="padding-left: 20px;"><?=$row['new_id']?></td>                                                               
         <td style="padding-left: 20px;"><?=$row['new_title']?></td>  
         <td style="padding-left: 20px;"><a target="_blank" href="<?=rewrite_company($row['usc_id'],$row['usc_company'],$row['usc_alias'])?>"><?=$row['usc_company']?></a></td> 
         <td align="center"><?=($row['new_create_time'] == $row['new_update_time'])?date("d/m/Y",$row['new_create_time']):date("d/m/Y",$row['new_update_time'])?></td>
         <td align="center"><a href="detail_new.php?record_id=<?=$row['new_id'] ?>">Chi tiết</a></td>
         
         <?=$list->showEdit($row['new_id'])?> 
                             
      <?=$list->end_tr();?>
      <?
   }
   ?>
   <?=$list->showFooter($total_row)?>
</div>
</body>
</html>