<?
require_once("inc_security.php");
   if(isset($_GET['city'])){
    $id = getValue('city','int','GET',0);
    
    if($id > 0)
    {
       echo "<option value=0>Chọn quận / huyện</option>";
        $db_qr = new db_query("SELECT * FROM city2 WHERE cit_parent = ".$id);
        if(mysql_num_rows($db_qr->result) > 0){
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
   $db_qr = new db_query("SELECT cit_id, cit_name FROM city");
   $arr_city[0] = "Chọn tỉnh thành";
   while ($row = mysql_fetch_array($db_qr->result)) {
   $arr_city[$row['cit_id']] = $row['cit_name'];
   }
   $new_category_id  = array();
   $class_menu       = new menu();
   $startdate     = getValue("startdate", "str", "GET", "dd/mm/yyyy");
   $enddate       = getValue("enddate", "str", "GET", "dd/mm/yyyy");
   $city          = getValue("city_sl","str","GET",0);
   $district      = getValue('district','str','GET',0);
   $tag_parent    = getValue('tag_parent','str','GET',0);
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
   $list->add("tag_id","ID","string",0,1);
	$list->add("tag_name","Tên tag","string",0,1);
   $list->add("","Ngành nghề","string",0,0);
   $list->add("","Quận huyện","string",0,0);
   $list->add("","Tỉnh thành","string",0,0);
   $list->add("","Thể loại","string",0,0);
   $list->add("tag_index","Index","string",0,0);
   $list->add("","Sửa","string",0,0);
   $list->add("","Xóa","string",0,0);
   $list->addSearch("Tỉnh thành", "city_sl", "array", $arr_city, $city);
   $list->addSearch("Quận huyện", "district", "array", $arr_disctrict, $district);
   $list->addSearch("Thể loại", "tag_parent", "array", $array_list_tag, $tag_parent);
   $list->addSearch("Từ", "startdate", "date", $startdate, "dd/mm/yyyy");
   $list->addSearch("Đến", "enddate", "date", $enddate, "dd/mm/yyyy");
   $list->quickEdit  = false;
	
	$list->ajaxedit($fs_table);
	
	   $sql =   $list->sqlSearch();
   if($startdate != "dd/mm/yyyy"){
      $intdate    =  convertDateTime($startdate, "0:0:0");
      $sql        .= " AND tag_create_date >= " . $intdate;
      }
   if($enddate != "dd/mm/yyyy"){
      $intdate    =  convertDateTime($enddate, "23:59:59");
      $sql        .= " AND tag_create_date <= " . $intdate;
   }  

   if($district != 0){
    $sql .= " AND tag_district_id = $district";
   }
   if($tag_parent != 0){
    $sql .= " AND tag_parent = $tag_parent";
   }
	$total			= new db_count("SELECT count(*) AS count 
											 FROM " . $fs_table . "
                                  WHERE 1 " . $sql . "");
   $total_row = $total->total;									 
	$db_listing = new db_query("SELECT * 
										 FROM " . $fs_table . "
										 WHERE 1 " . $sql . "
										 ORDER BY " . $list->sqlSort() . $field_id . " DESC
										 " . $list->limit($total->total));

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
   While($row = mysql_fetch_assoc($db_listing->result)){
      $url = "/".$row['tag_alias']."-k".$row['tag_id']."".".html";
      $i++;
      ?>
      <?=$list->start_tr($i, $row['tag_id']);?>
         <td align="center" style="padding-left: 10px;"><?=$row['tag_id']?></td> 
         <td align="center" style="padding-left: 10px;"><a target="_blank" href="<?=$url?>"><?=$row['tag_name']?></a></td>
         <td align="center" style="padding-left: 10px;"><?=($row['tag_cate_id']!=0)?$arrcate[$row['tag_cate_id']]['cat_name']:""?></td>
         <td align="center" style="padding-left: 10px;"><?=($row['tag_district_id']!=0)?$arr_district[$row['tag_district_id']]['cit_name']:""?></td>
         <td align="center" style="padding-left: 10px;"><?=($row['tag_district_id']!=0)?$arrcity[$arr_district[$row['tag_district_id']]['cit_parent']]['cit_name']:""?></td>  
          <td align="center" style="padding-left: 10px;"><?=$array_list_tag[$row['tag_parent']]?></td> 
         <?=$list->showCheckbox("tag_index",$row['tag_index'],$row['tag_id'])?>
         <?=$list->showEdit($row['tag_id'])?>        
         <?=$list->showDelete($row['tag_id'])?>             
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
         url: "listing.php?city="+id,
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