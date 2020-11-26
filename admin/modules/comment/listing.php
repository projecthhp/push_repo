<?
require_once("inc_security.php");

$new_category_id  = array();
$class_menu       = new menu();
$startdate     = getValue("startdate", "str", "GET", "dd/mm/yyyy");
$enddate       = getValue("enddate", "str", "GET", "dd/mm/yyyy");
	//gọi class DataGird
	$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));
	$list->quickEdit 	= false;

	$list->add("cmt_id","ID","string",0,0);
	$list->add("cmt_username","Tên người bình luận","string",0,1);
	$list->add("cmt_url_blog", "Link bài viết", "string",0,0);
   $list->add("cmt_content","Nội dung bình luận","string",0,0);
	$list->add("cmt_time", "Ngày bình luận", "string",0,0);
   $list->add("cmt_check", "Trả lời", "string",0,0);
	$list->add("",translate_text("Xóa"),"delete");
   // $list->addSearch("Từ", "startdate", "date", $startdate, "dd/mm/yyyy");
   // $list->addSearch("Đến", "enddate", "date", $enddate, "dd/mm/yyyy");
   $list->quickEdit  = false;
	
	$list->ajaxedit($fs_table);
	
	   $sql =   $list->sqlSearch();
   if($startdate != "dd/mm/yyyy"){
      $intdate    =  convertDateTime($startdate, "0:0:0");
      $sql        .= " AND cmt_time >= " . $intdate;
      }
   if($enddate != "dd/mm/yyyy"){
      $intdate    =  convertDateTime($enddate, "23:59:59");
      $sql        .= " AND cmt_time <= " . $intdate;
   }  

		
	$total			= new db_count("SELECT count(*) AS count 
											 FROM " . $fs_table . "
											 WHERE 1 " . $sql . " AND cmt_check = 0");									 
	$db_listing = new db_query("SELECT * 
										 FROM " . $fs_table . "
										 WHERE 1 " . $sql . " AND cmt_check = 0
										 ORDER BY " . $list->sqlSort() . $field_id . " DESC
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
      <?=$list->start_tr($i, $row['cmt_id']);?>     

         <td style="padding-left: 10px;"><?=$row['cmt_id']?></td>  
         <td style="padding-left: 20px;"><?=$row['cmt_username']?></td>  
         <td style="text-align: center;"><a target="_blank" href="https://timviec365.com<?=$row['cmt_url_blog']?>">https://timviec365.com<?=$row['cmt_url_blog']?></a></td>    
         <td style="text-align: center;"><?= $row['cmt_content']?></td>
         <td style="text-align: center;"><?=date('d/m/Y',$row['cmt_time'])?></td>
         <?=$list->showEdit($row['cmt_id'])?>      
         <?=$list->showDelete($row['cmt_id'])?>                      
      <?=$list->end_tr();?>
      <?
   }
   ?>
   <?=$list->showFooter($total_row)?>

</div>
<? /*---------Body------------*/ ?>
</body>
</html>