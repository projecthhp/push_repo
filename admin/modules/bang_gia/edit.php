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
$bg_id  = getValue("bg_id", "int", "POST", 0);

//Lay loai modul
$queryCat   = "SELECT * FROM bang_gia WHERE bg_id = " . intval($bg_id);
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
$myform->add("bg_type","bg_type",0, 0,"",1,"Bạn chưa chọn tên gói",0,"");

$myform->add("bg_tuan","bg_tuan",0, 0,"",1,"Bạn chưa nhập số tuần",0,"");
$myform->add("bg_gia","bg_gia",0, 0,"",1,"Bạn chưa nhập giá dịch vụ",0,"");
$myform->add("bg_chiet_khau","bg_chiet_khau",0, 0,"",1,"Bạn chưa nhập chiết khấu",0,"");
$myform->add("bg_vat","bg_vat",0, 0,"",1,"Bạn chưa nhập giá có VAT",0,"");
$myform->add("bg_point","bg_point",0, 0,"",1,"Bạn chưa nhập Điểm",0,"");
$myform->add("bg_quyenloi","bg_quyenloi",0, 0,"",1,"Bạn chưa nhập quyền lợi",0,"");
$myform->add("bg_uudai","bg_uudai",0, 0,"",1,"Bạn chưa nhập Ưu đãi",0,"");
$myform->add("bg_mota","bg_mota",0, 0,"",1,"Bạn chưa nhập Mô tả",0,"");
$myform->add("bg_the","bg_the",0, 0,"",1,"Bạn chưa nhập thẻ",0,"");
$myform->add("bg_tk","bg_tk",0, 0,"",1,"Bạn chưa nhập tiết kiệm",0,"");
$myform->add("bg_cm1","bg_cm1",0, 0,"",1,"Bạn chưa nhập comment",0,"");
$myform->add("bg_cm2","bg_cm2",0, 0,"",1,"Bạn chưa nhập comment",0,"");
$myform->add("bg_cm3","bg_cm3",0, 0,"",1,"Bạn chưa nhập comment",0,"");

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


#+
#+ Array Category
$menu 	= new menu();
$listAll = $menu->getAllChild("categories_multi","cat_id","cat_parent_id","0","cat_type IN(".$cat_type_select.")","cat_id,cat_name,cat_order,cat_type,cat_parent_id,cat_has_child","cat_type, cat_order ASC, cat_name ASC","cat_has_child");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<?=$load_header?>
<script type="text/javascript" src="/admin/resource/ckeditor/ckeditor.js?t=D03G5XLU"></script>
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
<tr>
    <td class="form_name"> Gói dịch vụ</td>
    <td class="form_text">
        <select name="bg_type" id="bg_type" class="form_control">
         <?
         foreach ($array_bang_gia as $key => $value) {
         ?>
         <option value="<?=$key ?>" <?=($bg_type == $key)?'selected="selected"':''?>><?=$value ?></option>
         <?
         }
         ?>
        </select>
    </td>
</tr>
<?=$form->text("Số tuần","bg_tuan","bg_tuan",$bg_tuan,"Nhập sản phẩm",1,500,"",255)?>
<?=$form->text("Giá","bg_gia","bg_gia",$bg_gia,"Nhập số tiền",1,500,"",255)?>
<?=$form->text("Nhập chiết khấu","bg_chiet_khau","bg_chiet_khau",$bg_chiet_khau,"Nhập chiết khấu",1,500,"",255)?>
<?=$form->text("Nhập giá có VAT","bg_vat","bg_vat",$bg_vat,"Nhập giá có VAT",1,500,"",255)?>
<?=$form->text("Nhập điểm","bg_point","bg_point",$bg_point,"Nhập điểm",1,500,"",255)?>
<?=$form->text("Nhập thẻ điện thoại","bg_the","bg_the",$bg_the,"Nhập thẻ điện thoại",1,500,"",255)?>
<?=$form->text("Nhập tiết kiệm","bg_tk","bg_tk",$bg_tk,"Nhập tiết kiệm",1,500,"",255)?>

<?=$form->text("Nhập bình luận 1","bg_cm1","bg_cm1",$bg_cm1,"Nhập tiết kiệm",0,500,"",255)?>
<?=$form->text("Nhập bình luận 2","bg_cm2","bg_cm2",$bg_cm2,"Nhập tiết kiệm",0,500,"",255)?>
<?=$form->text("Nhập bình luận 3","bg_cm3","bg_cm3",$bg_cm3,"Nhập tiết kiệm",0,500,"",255)?>

<?=$form->close_table();?>
<?=$form->wysiwyg("Quyền lợi", "bg_quyenloi", $bg_quyenloi, "../../resource/ckeditor/", "10%;float:left;","100")?>
<?=$form->wysiwyg("Ưu đãi", "bg_uudai", $bg_uudai, "../../resource/ckeditor/", "10%;float:left;","100")?>
<?=$form->wysiwyg("Mô tả", "bg_mota", $bg_mota, "../../resource/ckeditor/", "10%;float:left;","100")?>
<?=$form->create_table();?>
<?=$form->close_table();?>

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
<style type="text/css">
  #cke_bg_uudai,
  #cke_bg_mota,
  #cke_bg_quyenloi{
    width: 88%;
    float: left;
    margin-bottom: 15px;
  }
</style>
</body>
</html>