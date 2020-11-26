
<?
require_once("inc_security.php");
function removeTitle($string,$keyReplace){
	$string		= html_entity_decode($string, ENT_COMPAT, 'UTF-8');
	$string		= mb_strtolower($string, 'UTF-8');
	$string		= removeAccent($string);
	//neu muon de co dau
	//$string 	=  trim(preg_replace("/[^A-Za-z0-9àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸ]/i"," ",$string));

	$string 	= trim(preg_replace("/[^A-Za-z0-9]/i"," ",$string)); // khong dau
	$string 	= str_replace(" ","-",$string);
	$string		= str_replace("--","-",$string);
	$string		= str_replace("--","-",$string);
	$string		= str_replace("--","-",$string);
	$string		= str_replace($keyReplace,"-",$string);
	return $string;
}

function tt($variable){
	return "" . $variable . "";
}
#+
#+ Kiem tra quyen them sua xoa
checkAddEdit("add");

#+
#+ Khai bao bien
$add              = "add.php";
$listing          = "listing.php";
$edit				   = "edit.php";
$after_save_data	= getValue("after_save_data", "str", "POST", $add);

$admin_id         = getValue("admin_id","int","SESSION");

$errorMsg 			= "";		//Warning Error!
$action				= getValue("action", "str", "POST", "");
$fs_action			= getURL();
$record_id			= getValue("record_id");

$new_strdate		= getValue("new_strdate", "str", "POST", date("d/m/Y"));
$new_strtime		= getValue("new_strtime", "str", "POST", date("H:i:s"));
$new_date			= convertDateTime($new_strdate, $new_strtime);
$new_date_last_edit = convertDateTime($new_strdate, $new_strtime);

$new_strdateht		= getValue("new_strdateht", "str", "POST", date("d/m/Y"));
$new_strtimeht		= getValue("new_strtimeht", "str", "POST", date("H:i:s"));
$new_hantuyen		= convertDateTime($new_strdateht, $new_strtimeht);

$new_city = getValue("new_city",'arr','POST','');

$new_cat_id = getValue("new_cat_id","arr","POST",'');

#+
$new_title_rewrite 	= getValue("new_title_rewrite", "str", "POST", "");
if($new_title_rewrite == ''){
	$new_title_rewrite 	= removeTitle(getValue("new_title", "str", "POST", ""),'/');
	$new_title_rewrite 	= strtolower($new_title_rewrite);
} // End if($new_title_rewrite == ''){
else
{
   $new_title_rewrite 	= removeTitle(getValue("new_title_rewrite", "str", "POST", ""),'/');
	$new_title_rewrite 	= strtolower($new_title_rewrite);
}

$new_category_id  = getValue("new_category_id", "int", "POST", 0);
//Lay loai modul


$new_module_id = 1;

#+
#+ Goi class generate form
$myform = new generate_form();	//Call Class generate_form();
$myform->removeHTML(0);	//Loại bỏ chức năng không cho điền tag html trong form
#+
#+ Khai bao bang du lieu
$myform->addTable($fs_table);	// Add table
#+
#+ Khai bao thong tin cac truong
$myform->add("new_user_id","new_user_id",0, 0,"",1,"Bạn chưa nhập ID công ty",0,"");
$myform->add("new_title","new_title",0, 0,"",1,"Bạn chưa nhập tiêu đề tin",0,"");
$myform->add("new_cap_bac","new_cap_bac",1,0,"",1,"Bạn chưa chọn cấp bậc",0,"");
$myform->add("new_cat_id","new_cat_id",0,0,"",1,"Bạn chưa chọn ngành nghề",0,"");
$myform->add("new_city","new_city",0,0,"",1,"Bạn chưa chọn địa điểm làm việc",0,"");
$myform->add("new_hinh_thuc","new_hinh_thuc",1,"",0,1,"Bạn chưa chọn hình thức làm việc",0,"");
$myform->add("new_money","new_money",1,0,0,1,"Bạn chưa chọn mức lương",0,"");
$myform->add("new_so_luong","new_so_luong",0,0,"",1,"Bạn chưa nhập số lượng",0,"");
$myform->add("new_exp","new_exp",1,0,"",1,"Bạn chưa chọn kinh nghiệm làm việc",0,"");
$myform->add("new_bang_cap","new_bang_cap",1,0,"",1,"Bạn chưa chọn bằng cấp",0,"");
$myform->add("new_gioi_tinh","new_gioi_tinh",1,0,"",1,"Bạn chưa chọn giới tính",0,"");
$myform->add("new_han_nop","new_han_nop",0,0,"",1,"Bạn chưa chọn hạn nộp",0,"");
$myform->add("meta_tit","meta_tit",0,0,"",0,"",0,"");
$myform->add("meta_key","meta_key",0,0,"",0,"",0,"");
$myform->add("meta_des","meta_des",0,0,"",0,"",0,"");
$myform->add("new_301","new_301",0,0,"",0,"",0,"");
$myform->add("new_update_time","new_update_time",1,0,"",0,"",0,"");
$myform->add("new_thuc","new_thuc",1,0,"",0,"",0,"");
#+
#+ đổi tên trường thành biến và giá trị
$myform->evaluate();
$myform1 = new generate_form();	//Call Class generate_form();
$myform1->removeHTML(0);	//Loại bỏ chức năng không cho điền tag html trong form
#+
#+ Khai bao bang du lieu
$myform1->addTable('new_multi');	// Add table
#+
#+ Khai bao thong tin cac truong
$myform1->add("new_mota","new_mota",0,0,"",0,"Bạn chưa nhập mô tả công việc",0,"");
$myform1->add("new_yeucau","new_yeucau",0,0,"",0,"Bạn chưa nhập yêu cầu",0,"");
$myform1->add("new_quyenloi","new_quyenloi",0,0,"",0,"Bạn chưa nhập quyền lợi",0,"");
$myform1->add("new_ho_so","new_ho_so",0,0,"",0,"Bạn chưa nhập hồ sơ",0,"");
#+
#+ đổi tên trường thành biến và giá trị
$myform1->evaluate();
#+
#+ Neu nhu co submit form
if($action == "submitForm"){
	#+
	#+ Kiểm tra lỗi
	$errorMsg .= $myform->checkdata();
	$errorMsg .= $myform->strErrorField ;	//Check Error!
	$errorMsg .= $myform1->checkdata();
	$errorMsg .= $myform1->strErrorField ;	//Check Error!
	if($errorMsg == ""){
		#+
		#+ Thuc hien query
		$query			= $myform->generate_update_SQL($field_id,$record_id);
        
		$new_han_nop2 = strtotime($new_han_nop);
        $query = str_replace($new_han_nop,$new_han_nop2,$query);

        $db_ex = new db_execute($query);
        $new_city = implode(',', $new_city);
        $new_cat_id = implode(',', $new_cat_id);
        
        $query1         = $myform1->generate_update_SQL($field_id,$record_id);
        $db_ex = new db_execute($query1);

		$update = new db_query("UPDATE new SET new_city = '".$new_city."', new_cat_id = '".$new_cat_id."' WHERE new_id = ".$record_id);

		$fs_redirect 	= $after_save_data. "?record_id=".$record_id."&new_category_id=".$new_category_id;
		redirect($fs_redirect);
		exit();

	}
}

#+
#+ Khai bao ten form
$myform->addFormname("submitForm"); //add  tên form để javacheck
#+
#+ Xử lý javascript
$myform->addjavasrciptcode('');
$myform->checkjavascript();

$getdb = new db_query("SELECT * FROM new JOIN new_multi ON new.new_id = new_multi.new_id  WHERE new.new_id = ".$record_id);
$rowdb = mysql_fetch_object($getdb->result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?=$load_header?>
 <link rel="stylesheet" type="text/css" href="/css/select2.min.css">
 <style type="text/css">
 	.select2-container--default .select2-selection--multiple .select2-selection__rendered{
 		padding: 0px 5px 6px;
 	}
 	#cke_new_description{
 		width: 100%;
 		top: 0px;
 	}
 </style>
</head>
<body topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
<? /*------------------------------------------------------------------------------------------------*/ ?>
<?=template_top(translate_text("Records Add"))?>
<? /*------------------------------------------------------------------------------------------------*/ ?>
<?
$form = new form();
$form->create_form("form_name",$fs_action,"post","multipart/form-data",'onsubmit="validateForm();return false;"  id="form_name" ');
$form->create_table();
?>
<?=$form->text_note('Những ô dấu sao (<font class="form_asterisk">*</font>) là bắt buộc phải nhập.')?>
<?=$form->errorMsg($errorMsg)?>
<?=$form->text("ID công ty","new_user_id","new_user_id",$rowdb->new_user_id,"Nhập ID công ty",1,500,"",255)?>
<?=$form->text("Tiêu đề tin","new_title","new_title",$rowdb->new_title,"Nhập tiêu đề tin",1,500,"",255)?>
<tr>
	<input type="hidden" name="new_update_time" value="<?=time()?>" />
    <input type="hidden" name="new_thuc" value="1" />
</tr>
<tr>
    <td class="form_name"><font class="form_asterisk">* </font>Chọn cấp bậc</td>
    <td class="form_text">
        <select name="new_cap_bac" id="new_cap_bac" class="form_control">
        	<?
        	foreach ($array_capbac as $key => $value) {
        	?>
			<option <?= ($rowdb->new_cap_bac == $key)?"selected":"" ?> value="<?=$key?>"><?=$value?></option>
        	<?
        	}
        	?>
        </select>
    </td>
</tr>
<tr>
    <td class="form_name"><font class="form_asterisk">* </font>Chọn ngành nghề</td>
    <td class="form_text">
        <select name="new_cat_id[]" id="new_cat_id" class="form_control" multiple=""  style="width: 250px">
        	<!-- <option value="">Chọn ngành nghề</option> -->
        	<?
            $new_cat_id = explode(',', $rowdb->new_cat_id);
        	$db_qr = new db_query('SELECT cat_id,cat_name FROM category');
        	while($row = mysql_fetch_array($db_qr->result)){
        	?>
			<option <?= (in_array($row['cat_id'], $new_cat_id))?"selected":"" ?> value="<?=$row['cat_id']?>"><?=$row['cat_name']?></option>
        	<?
        	}
        	?>
        </select>
    </td>
</tr>
<tr>
    <td class="form_name"><font class="form_asterisk">* </font>Chọn địa điểm làm việc</td>
    <td class="form_text">
        <select name="new_city[]" id="new_city" class="form_control" multiple="" style="width: 250px">
        	<?
            $new_city = explode(',', $rowdb->new_city);
        	$db_qr = new db_query('SELECT cit_id,cit_name FROM city');
        	while($row = mysql_fetch_array($db_qr->result)){
        	?>
			<option <?= (in_array($row['cit_id'], $new_city))?"selected":"" ?> value="<?=$row['cit_id']?>"><?=$row['cit_name']?></option>
        	<?
        	}
        	?>
        </select>
    </td>
</tr>
<tr>
    <td class="form_name"><font class="form_asterisk">* </font>Chọn hình thức làm việc</td>
    <td class="form_text">
        <select name="new_hinh_thuc" id="new_hinh_thuc" class="form_control" style="width: 250px">
        	<option value="">Chọn hình thức làm việc</option>
        	<?
        	foreach($array_hinh_thuc as $key=>$value){
        	?>
			<option <?= ($rowdb->new_hinh_thuc == $key)?"selected":"" ?> value="<?=$key?>"><?=$value?></option>
        	<?
        	}
        	?>
        </select>
    </td>
</tr>
<tr>
    <td class="form_name"><font class="form_asterisk">* </font>Chọn mức lương</td>
    <td class="form_text">
        <select name="new_money" id="new_money" class="form_control" style="width: 250px">
        	<?
        	foreach($array_muc_luong as $key=>$value){
        	?>
			<option <?= ($rowdb->new_money == $key)?"selected":"" ?> value="<?=$key?>"><?=$value?></option>
        	<?
        	}
        	?>
        </select>
    </td>
</tr>
<?=$form->text("Số lượng cần tuyển","new_so_luong","new_so_luong",$rowdb->new_so_luong,"Nhập số lượng cần tuyển",1,500,"",255)?>
<tr>
    <td class="form_name"><font class="form_asterisk">* </font>Chọn kinh nghiệm làm việc</td>
    <td class="form_text">
        <select name="new_exp" id="new_exp" class="form_control" style="width: 250px">
        	<?
        	foreach($array_kinh_nghiem_uv as $key=>$value){
        	?>
			<option <?= ($rowdb->new_exp == $key)?"selected":"" ?> value="<?=$key?>"><?=$value?></option>
        	<?
        	}
        	?>
        </select>
    </td>
</tr>
<tr>
    <td class="form_name"><font class="form_asterisk">* </font>Chọn bằng cấp</td>
    <td class="form_text">
        <select name="new_bang_cap" id="new_bang_cap" class="form_control" style="width: 250px">
        	<?
        	foreach($array_hoc_van as $key=>$value){
        	?>
			<option <?= ($rowdb->new_bang_cap == $key)?"selected":"" ?> value="<?=$key?>"><?=$value?></option>
        	<?
        	}
        	?>
        </select>
    </td>
</tr>
<tr>
    <td class="form_name"><font class="form_asterisk">* </font>Chọn giới tính</td>
    <td class="form_text">
        <select name="new_gioi_tinh" id="new_gioi_tinh" class="form_control" style="width: 250px">
        	<?
        	foreach($array_gioi_tinh as $key=>$value){
        	?>
			<option <?= ($rowdb->new_gioi_tinh == $key)?"selected":"" ?> value="<?=$key?>"><?=$value?></option>
        	<?
        	}
        	?>
        </select>
    </td>
</tr>
<tr>
    <td class="form_name"><font class="form_asterisk">* </font>Hạn nộp:</td>
    <td class="form_text">
        <input type="date" name="new_han_nop" value="<?= date('Y-m-d',$rowdb->new_han_nop) ?>"  style="width: 250px" />
    </td>
</tr>
<?=$form->text("(SEO) Title","meta_tit","meta_tit",$rowdb->meta_tit,"Nhập meta title",0,500,"",255)?>
<?=$form->text("(SEO) Key","meta_key","meta_key",$rowdb->meta_key,"Nhập meta keyword",0,500,"",255)?>
<?=$form->textarea("(SEO) Description","meta_des","meta_des",$rowdb->meta_des,"Nhập meta des",0,500,"",255)?>
<?=$form->text("(SEO) URL 301","new_301","new_301",$rowdb->new_301,"Nhập link 301",0,500,"",255)?>
<script src="jquery.form.js"></script>

<style>
.image-label
{
	color: #6d6d6d;
	font-size: 13px;
	font-weight: bold;
	margin-left:37px;
}
.sprite_ai_camera {
  width: 57px;
  height: 47px;
  background: url("../../../images/camera.png");
  margin: 20px 41px 12px auto;
}
.titleimage
{
width: 134px!important;
margin-left: 5px!important;
margin-top: 8px!important;
font-size: 11px!important;
}
.imgadd
{
	width: 138px!important;
	height: 108px!important;
	float:left;
	position: relative;
	border: 1px solid #ddd;
	background-color: #fff;
	border-radius: 4px;
	margin-left: 5px;
	cursor: pointer;
}
.imgdiv
{
	float:left;
	position: relative;
	width:160px;
}
.sprite_ai_remove {
	cursor: pointer;
  width: 16px;
  height: 16px;
  background: url("../../../images/ai.png");
  position: absolute;
  top: -3px;
  left: 3px;
}
</style>
<?=$form->close_table();?>
<?=$form->wysiwyg("Mô tả công việc", "new_mota", trim(preg_replace('#(<br */?>\s*)+#i', '<br />',nl2br($rowdb->new_mota))), "../../resource/ckeditor/", "50%","600")?>
<?=$form->wysiwyg("Yêu cầu công việc", "new_yeucau", trim(preg_replace('#(<br */?>\s*)+#i', '<br />',nl2br($rowdb->new_yeucau))), "../../resource/ckeditor/", "80%","600")?>
<?=$form->wysiwyg("Quyền lợi", "new_quyenloi", trim(preg_replace('#(<br */?>\s*)+#i', '<br />',nl2br($rowdb->new_quyenloi))), "../../resource/ckeditor/", "80%","600")?>
<?=$form->wysiwyg("Hồ sơ", "new_ho_so", trim(preg_replace('#(<br */?>\s*)+#i', '<br />',nl2br($rowdb->new_ho_so))), "../../resource/ckeditor/", "80%","600")?>


<?=$form->create_table();?>

<?=$form->radio("Sau khi lưu dữ liệu", "add_new" . $form->ec . "return_listing" . $form->ec . "return_edit", "after_save_data", $add . $form->ec . $listing . $form->ec . $edit, $after_save_data, "Thêm mới" . $form->ec . "Quay về danh sách" . $form->ec . "Sửa bản ghi", 0, "" . $form->ec . "" . $form->ec . "");?>
<?=$form->button("submit" . $form->ec . "reset", "submit" . $form->ec . "reset", "submit" . $form->ec . "reset", "Cập nhật" . $form->ec . "Làm lại", "Cập nhật" . $form->ec . "Làm lại", 'style="background:url(' . $fs_imagepath . 'button_1.gif) no-repeat; border:none;"' . $form->ec . 'style="background:url(' . $fs_imagepath . 'button_2.gif) no-repeat; border:none;"', "");?><br />
<?=$form->hidden("action", "action", "submitForm", "");?>
<?
$form->close_table();
$form->close_form();
unset($form);
?>
<? /*------------------------------------------------------------------------------------------------*/ ?>
<?=template_bottom() ?>
<? /*------------------------------------------------------------------------------------------------*/ ?>

<script src="/js/jquery.min.js"></script>
<script src="/js/select2.min.js"></script>
<script type="text/javascript">
      $("#new_cat_id").select2({
	      maximumSelectionLength: 3,
	      placeholder: "Chọn ngành nghề*"
	    });
 		$("#new_city").select2({
	      maximumSelectionLength: 3,
	      placeholder: "Chọn địa điểm làm việc*"
	    });

	$("#new_url_lq").on("select2:select", function (evt) {
	  var element = evt.params.data.element;
	  var $element = $(element);
	  
	  $element.detach();
	  $(this).append($element);
	  $(this).trigger("change");
	});


</script>

<style type="text/css">
	#cke_new_teaser .cke_contents{
		height: 155px;
	}
	#cke_new_description .cke_contents{
		height: 350px;
	}
</style>
</body>
</html>