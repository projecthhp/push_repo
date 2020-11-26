<? 
require_once("inc_security.php");
require_once("lib_image.php");
#+
#+ Kiem tra quyen them sua xoa
checkAddEdit("edit");

#+
#+ Khai bao bien
$add        = "add.php";
$listing      = "listing.php";
$edit       = "edit.php";
$after_save_data  = getValue("after_save_data", "str", "POST", $listing);

$errorMsg       = "";   //Warning Error!
$action       = getValue("action", "str", "POST", "");
$fs_action      = getURL();
$record_id      = getValue("iAdm");


$query = "SELECT * FROM " . $fs_table . " WHERE adm_id = ".$record_id;
$db_data 	= new db_query($query);
$row = mysql_fetch_array($db_data->result);

#+
#+ Goi class generate form
$myform = new generate_form();  //Call Class generate_form();
$myform->removeHTML(0); //Loại bỏ chức năng không cho điền tag html trong form
#+
#+ Khai bao bang du lieu
$myform->addTable($fs_table); // Add table
#+
#+ Khai bao thong tin cac truong
$myform->add("meta_tit","meta_tit",0,0,"",0,"",0,"");
$myform->add("meta_des","meta_des",0,0,"",0,"",0,"");
$myform->add("meta_key","meta_key",0,0,"",0,"",0,"");
$myform->add("adm_city","adm_city",1,0,0,1,"Bạn chưa chọn quê quán",0,"");
$myform->add("adm_date","adm_date",0,0,0,1,"Bạn chưa chọn ngày sinh",0,"");
$myform->add("adm_chamngon","adm_chamngon",0,0,"",1,"Bạn chưa nhập châm ngôn",0,"");
$myform->add("adm_sapo","adm_sapo",0,0,"",1,"Bạn chưa nhập mô tả",0,"");
$myform->add("adm_description","adm_description",0,0,"",1,"Bạn chưa nhập giới thiệu",0,"");



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

	if($array_config["image"]==1 && $row['adm_picture']==''){
		$upload_pic = new upload("picture", $fs_filepath, $extension_list, $limit_size);
		if ($upload_pic->file_name != ""){
			$picture = date("Y",time())."/".date("m",time())."/".date("d",time())."/".$upload_pic->file_name;
			//resize_image($fs_filepath,$upload_pic->file_name,334,250,100,"");
			$myform->add("adm_picture","picture",0,1,"",0,"",0,"");
			/////////////////////////////////			
			$fs_filepath_re = '../../../pictures/author/resize/'.date("Y",time())."/".date("m",time())."/".date("d",time());	
			if(!is_dir('../../../pictures/author/resize/'.date("Y",time()))){
				mkdir('../../../pictures/author/resize/'.date("Y",time()), 0755, TRUE);
			}
			if(!is_dir('../../../pictures/author/resize/'.date("Y",time())."/".date("m",time()))){
				mkdir('../../../pictures/author/resize/'.date("Y",time())."/".date("m",time()), 0755, TRUE);
			}
			if(!is_dir('../../../pictures/author/resize/'.date("Y",time())."/".date("m",time())."/".date("d",time()))){
				mkdir('../../../pictures/author/resize/'.date("Y",time())."/".date("m",time())."/".date("d",time()), 0755, TRUE);
			}
			$tmp = $fs_filepath.$upload_pic->file_name;           
		    if(file_exists($tmp)){                                                
		        $imageThumb = new Image($tmp);                         
		        $temp=explode('.',$upload_pic->file_name);              	            
		        if($imageThumb->getWidth() > 310){          
		            $imageThumb->resize(310,'resize');
		        }
		        $imageThumb->save($temp[0], $fs_filepath_re, $temp[1]);                     
		    }
		}
	else
	{
	 $errorMsg .= "• Bạn chưa chọn ảnh đại diện";
	}
		//Check Error!
		$errorMsg .= $upload_pic->show_warning_error();
	}

	if($errorMsg == ""){
		#+
		#+ Thuc hien query
		$query = $myform->generate_update_SQL($field_id,$record_id);
		$db_ex = new db_execute($query);
		#echo $query;exit();
		$date = strtotime($_POST['adm_date']);
		$db_qr = new db_query("UPDATE admin_user SET adm_date = ".$date." WHERE adm_id = ".$record_id." ");
		#+
		#+ Chuyen ve trang khac khi xu ly du lieu oki
		redirect($after_save_data."?record_id=".$record_id);
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
#+ Khai bao ten form 
$myform->addFormname("submitForm"); //add  tên form để javacheck
#+
#+ Xử lý javascript
$myform->addjavasrciptcode('');
$myform->checkjavascript();

#+
#+ lay du lieu cua record can sua doi



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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

<?=$form->text("Meta Title","meta_tit","meta_tit",$row['meta_tit'],translate_text("link"),0,550,"",255)?>
<?=$form->text("Meta Des","meta_des","meta_des",$row['meta_des'],translate_text("link"),0,550,"",255)?>
<?=$form->text("Meta Keyword","meta_key","meta_key",$row['meta_key'],translate_text("link"),0,550,"",255)?>
<?=$form->getFile("Ảnh đại diện", "picture", "picture", "Ảnh đại diện", 1, 32, "", '<br />(Dung lượng tối đa <font color="#FF0000">'.$limit_size.' Kb</font>)')?>
<tr>
	<td class="form_name"><font class="form_asterisk">* </font>Quê quán:</td>
	<td>
		<select name="adm_city" id="adm_city">
			<option value="0">Chọn tỉnh thành</option>
			<?
			$db_city = new db_query("SELECT cit_id, cit_name FROM city");
			While($city = mysql_fetch_assoc($db_city->result)){
			?>
			<option <?=($city['cit_id'] == $row['adm_city'])?"selected":""?> value="<?=$city['cit_id']?>"><?=$city['cit_name']?></option>
			<?
			}
			?>
		</select>
	</td>
</tr>
<tr>
	<td class="form_name"><font class="form_asterisk">* </font>Ngày sinh:</td>
	<td>
		<input type="date" name="adm_date" value="<?=($row['adm_date']>0)?date('Y-m-d',$row['adm_date']):""?>" />
	</td>
</tr>
<?=$form->text("Châm ngôn ưa thích","adm_chamngon","adm_chamngon",$row['adm_chamngon'],"Châm ngôn ưa thích",1,550,"",255)?>
<?=$form->textarea("Mô tả","adm_sapo","adm_sapo",$row['adm_sapo'],"Mô tả",1,550,"200",255)?>
<?=$form->close_table();?>
<?=$form->wysiwyg("Giới thiệu", "adm_description", $row['adm_description'], "../../resource/ckeditor/", "80%","600")?>
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
</body>
</html>