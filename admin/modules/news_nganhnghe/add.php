<style>
#cke_new_description
{
   width: 80%;
   margin: 0 auto;
   position: relative;
   top: -15px;
}
select#idnganh {
    width: 500px;
    height: 25px;
}
</style>
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

$new_category_id  = getValue("new_category_id", "int", "POST", 0);
//Lay loai modul

$queryCat   = "SELECT * FROM categories_multi WHERE cat_id = " . intval($new_category_id);
$dbCat      = new db_query($queryCat);
$new_module_id = 1;

if($row = mysql_fetch_assoc($dbCat->result)){
   $new_module_id = $row['cat_type'];
}
#+
#+ Array Category
$menu 	= new menu();
$listAll = $menu->getAllChild("nganhcv","id","serial","0","1","id,name,title_des","1");
#+
#+ Goi class generate form
$myform = new generate_form();	//Call Class generate_form();
$myform->removeHTML(0);	//Loại bỏ chức năng không cho điền tag html trong form
#+
#+ Khai bao bang du lieu
$myform->addTable($fs_table);	// Add table
#+
#+ Khai bao thong tin cac truong
$myform->add("title","title",0, 0,"",1,"Bạn chưa nhập tiêu đề tin",1,"Tiêu đề tin đã tồn tại");
$myform->add("idnganh", "idnganh", 1, 0, 0, 1, translate_text("Bạn chưa chọn ngành nghề"), 1, "Đã có bài viết cho ngành nghề này");
$myform->add("mota","mota",0,0,"",0,"",0,"Tin này đã tồn tại");
$myform->add("noidung","noidung",0,0,"",1,"Bạn chưa nhập nội dung",0,"Bạn chưa nhập nội dung");
$myform->add("seo_tt","seo_tt",0,0,"",0,"Bạn chưa nhập seo title",0,"");
$myform->add("seo_key","seo_key",0,0,"",0,"Bạn chưa keyword",0,"");
$myform->add("seo_des","seo_des",0,0,"",0,"Bạn chưa mô tả tin",0,"");
$myform->add("timecreate","timecreate",0,0,"",0,"",0,"");
#+
#+ đổi tên trường thành biến và giá trị
$myform->evaluate();

#+
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
		$fs_redirect 	= $after_save_data. "?record_id=".$record_id;
		redirect($fs_redirect);
		exit();

	}
}
$timecreate = time();
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
<tr><td class="form_text"><input class="form_control" type="text" id="timecreate" name="timecreate" value="<?=$timecreate;?>" style="display: none;"></td></tr>
<?=$form->errorMsg($errorMsg)?>
<tr>
    <td class="form_name"><font class="form_asterisk">* </font>Chọn ngành nghề</td>
    <td class="form_text">
        <select name="idnganh" id="idnganh" class="form_control">
        	<option value="">Chọn ngành nghề</option>
			<?
            foreach($listAll as $cat){         
                ?>
                    <option value="<?=$cat["id"]?>" >
                    <?
                    echo $cat["name"];
                    ?>
                    </option>
                <?
            }
            ?>
        </select>
    </td>
</tr>


<?=$form->text("Tiêu đề tin","title","title",$title,"Tiêu đề tin",1,500,25,255)?>
<?=$form->textarea("Mô tả", "mota", "mota", $mota, "Mô tả", 0, 500, 60, "", "", "")?>


<?=$form->close_table();?>
<?=$form->wysiwyg("Nội dung chi tiết", "noidung", $noidung, "../../resource/ckeditor/", "100%","600")?>
<?=$form->create_table();?>
<?=$form->text("SEO Title", "seo_tt", "seo_tt", $seo_tt, "SEO Title",1,500,25,255)?>
<?=$form->text("SEO Key", "seo_key", "seo_key", $seo_key, "SEO Key",1,500,25,255)?>
<?=$form->textarea("SEO Description", "seo_des", "seo_des", $seo_des, "SEO Description", 0, 500, 120, "", "", "")?>

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
    $("#idnganh").select2();
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