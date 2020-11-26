<style>
#cke_1_contents
{
   height: 100px!important;
}
</style>
<?php
require_once("inc_security.php");
function removeTitle($string,$keyReplace){
	$string		= html_entity_decode($string, ENT_COMPAT, 'UTF-8');
	$string		= mb_strtolower($string, 'UTF-8');
	$string		= removeAccent($string);
	//neu muon de co dau
	//$string 	=  trim(preg_replace("/[^A-Za-z0-9àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸ]/i"," ",$string));

	$string 	= trim(preg_replace("/[^A-Za-z0-9]/i"," ",$string));
    // khong dau
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
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) 
        && preg_match('/@.+\./', $email);
}
#+
#+ Kiem tra quyen them sua xoa
checkAddEdit("add");

#+
#+ Khai bao bien
$add				= "add.php";
$listing			= "listing.php";
$edit				= "edit.php";
$after_save_data	= getValue("after_save_data", "str", "POST", $listing);

$errorMsg 			= "";		//Warning Error!
$action				= getValue("action", "str", "POST", "");
$fs_action			= getURL();
$record_id			= getValue("record_id");

$admin_id         = getValue("admin_id","int","SESSION");

#+
$new_title_rewrite 	= getValue("new_title_rewrite", "str", "POST", "");
if($new_title_rewrite == ''){
	$new_title_rewrite 	= removeTitle(getValue("new_title", "str", "POST", ""),'/');
	$new_title_rewrite 	= strtolower($new_title_rewrite);
} // End if($new_title_rewrite == ''){
$bg_id  = getValue("bg_id", "int", "POST", 0);

//Lay loai modul
$queryCat   = "SELECT * FROM ". $fs_table ." WHERE " .$field_id." = " . intval($bg_id);
$dbCat      = new db_query($queryCat);
$new_module_id = 1;
if($row = mysql_fetch_assoc($dbCat->result)){
      $new_module_id = $row['cat_type'];

}
#+
#+ Goi class generate form
$myform = new generate_form();	//Call Class generate_form();
$myform->removeHTML(0);	//Loại bỏ chức năng không cho điền tag html trong form
#+
#+ Khai bao bang du lieu
$myform->addTable($fs_table);	// Add table
#+
#+ Khai bao thong tin cac truong
$myform->add("name","name",0, 0,"",1,"Bạn chưa nhập Tên ngành nghề",0,"");
$myform->add("alias","alias",0, 0,"",1,"Bạn chưa nhập tên ngành nghề (không dấu)",0,"");
$myform->add("title_des","title_des",0, 0,"",1,"Bạn chưa nhập tiêu đề mô tả",0,"");
$myform->add("content_short","content_short",0, 0,"",1,"Bạn chưa nhập nội dung tóm tắt",0,"");
$myform->add("content","content",0, 0,"",1,"Bạn chưa nhập nội dung mô tả",0,"");
$myform->add("serial","serial",0, 0,"",1,"Bạn chưa nhập thứ tự",0,"");
$myform->add("status","status",0, 0,"",1,"Bạn chưa chọn trạng thái hiển thị",0,"");
$myform->add("meta_title","meta_title",0, 0,"",0,"",0,"");
$myform->add("meta_key","meta_key",0, 0,"",0,"",0,"");
$myform->add("meta_desciption","meta_desciption",0, 0,"",0,"",0,"");

#+
#+ đổi tên trường thành biến và giá trị
$myform->evaluate();

#+ Neu nhu co submit form
if($action == "submitForm"){
	#+
	#+ Kiểm tra lỗi
    $errorMsg .= $myform->checkdata();
	$errorMsg .= $myform->strErrorField ;	//Check Error!
	if($errorMsg == ""){
		#+
		#+ Thuc hien query
		$query = $myform->generate_update_SQL($field_id,$record_id);
		$db_ex = new db_execute($query);
		$fs_redirect 	= $after_save_data. "?record_id=".$record_id;
       
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


#+
#+ lay du lieu cua record can sua doi
$query = "SELECT * FROM " . $fs_table . " WHERE " . $field_id . " = " . $record_id;
$db_data  = new db_query($query);

if($row   = mysql_fetch_assoc($db_data->result))
{
  foreach($row as $key=>$value)
  {
    if($key!='lang_id' && $key!='admin_id') $$key = $value;
  }
}else
{
  exit();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<?=$load_header?>
<script type="text/javascript" src="/admin/resource/ckeditor/ckeditor.js?t=D03G5XL"></script>
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

<?=$form->text("Tên ngành nghề","name","name",$name,"Nhập Tên ngành nghề",1,500,"",255)?>
<?=$form->text("Tên ngành nghề(không dấu)","alias","alias",$alias,"Nhập tên ngành nghề(không dấu)",1,500,"",255)?>
<?=$form->text("Tiêu đề mô tả","title_des","title_des",$title_des,"Nhập Tiêu đề mô tả",1,500,"",255)?>
<?=$form->text("Nội dung tóm tắt","content_short","content_short",$content_short,"Nhập nội dung tóm tắt",1,500,"",255)?>
<?=$form->text("Nội dung mô tả","content","content",$content,"Nhập nội dung mô tả",1,500,"",255)?>
<?=$form->text("Thứ tự","serial","serial",$serial,"Nhập thứ tự",1,500,"",255)?>
<?=$form->text("Trạng thái 1:Hiển thị - 0.Ẩn","status","status",$status,"Nhập trạng thái hiển thị",1,500,"",255)?>
<?=$form->text("meta_title","meta_title","meta_title",$meta_title,"Dành cho robot đọc",1,500,"",255)?>
<?=$form->text("meta_key","meta_key","meta_key",$meta_key,"Dành cho robot đọc",1,500,"",255)?>
<?=$form->text("meta_desciption","meta_desciption","meta_desciption",$meta_desciption,"Dành cho robot đọc",1,500,"",255)?>


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
</body>
</html>