<?
require_once("inc_security.php");

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

$usc_create_time = time();
$usc_pass = md5('timviec365');
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
$myform1 = new generate_form();	//Call Class generate_form();
$myform1->removeHTML(0);	//Loại bỏ chức năng không cho điền tag html trong form

#+ Neu nhu co submit form
if($action == "submitForm"){

	#+
	#+ Kiểm tra lỗi
   $errorMsg .= $myform->checkdata();
	$errorMsg .= $myform->strErrorField ;	//Check Error!
   
	if($errorMsg == ""){
      
		#+
		#+ Thuc hien query
		$db_ex	 		= new db_execute_return();
		$query			= $myform->generate_insert_SQL();
		
		$last_id 		= $db_ex->db_execute($query);
		$record_id 		= $last_id;
		//echo $query;exit();
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
<?=$form->text("Sản Phẩm / Tuần","bg_tuan","bg_tuan",$bg_tuan,"Nhập sản phẩm",1,500,"",255)?>
<?=$form->text("Đơn Giá","bg_gia","bg_gia",$bg_gia,"Nhập số tiền",1,500,"",255)?>
<?=$form->text("Nhập chiết khấu","bg_chiet_khau","bg_chiet_khau",$bg_chiet_khau,"Nhập chiết khấu",1,500,"",255)?>
<?=$form->text("Nhập giá có VAT","bg_vat","bg_vat",$bg_vat,"Nhập giá có VAT",1,500,"",255)?>
<?=$form->text("Nhập điểm","bg_point","bg_point",$bg_point,"Nhập điểm",1,500,"",255)?>
<?=$form->text("Nhập thẻ điện thoại","bg_the","bg_the",$bg_the,"Nhập thẻ điện thoại",1,500,"",255)?>
<?=$form->text("Nhập tiết kiệm","bg_tk","bg_tk",$bg_tk,"Nhập tiết kiệm",1,500,"",255)?>

<?=$form->text("Nhập bình luận","bg_cm1","bg_cm1",$bg_cm1,"Nhập tiết kiệm",0,500,"",255)?>
<?=$form->text("Nhập bình luận","bg_cm2","bg_cm2",$bg_cm2,"Nhập tiết kiệm",0,500,"",255)?>
<?=$form->text("Nhập bình luận","bg_cm3","bg_cm3",$bg_cm3,"Nhập tiết kiệm",0,500,"",255)?>

<?=$form->close_table();?>
<?=$form->wysiwyg("Quyền lợi", "bg_quyenloi", $bg_quyenloi, "../../resource/ckeditor/", "10%;float:left;","100")?>
<?=$form->wysiwyg("Ưu đãi", "bg_uudai", $bg_uudai, "../../resource/ckeditor/", "10%;float:left;","100")?>
<?=$form->wysiwyg("Mô tả", "bg_mota", $bg_mota, "../../resource/ckeditor/", "10%;float:left;","100")?>
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