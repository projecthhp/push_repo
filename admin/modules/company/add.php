
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
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) 
        && preg_match('/@.+\./', $email);
}
function tt($variable){
	return "" . $variable . "";
}
#+
#+ Kiem tra quyen them sua xoa
checkAddEdit("add");
if(isset($_GET['city'])){
    $id = getValue('city','int','GET',0);
    
    if($id > 0)
    {
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
$usc_create_time = time();
$usc_update_time = time();
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
$myform->add("usc_email","usc_email",0, 0,"",1,"Bạn chưa nhập email",1,"Email đã được sử dụng");
$myform->add("usc_company","usc_company",0, 0,"",1,"Bạn chưa nhập tên công ty",1,"Tên công ty đã tồn tại");
$myform->add("usc_phone","usc_phone",0, 0,"",1,"Bạn chưa nhập hotline",0,"");
$myform->add("usc_pass","usc_pass",0, 1,"",1,"Bạn chưa nhập hotline",0,"");
$myform->add("usc_website","usc_website",0, 0,"",0,"Bạn chưa nhập website công ty",0,"Website đã tồn tại");
$myform->add("usc_skype","usc_skype",0, 0,"",0,"",0,"");
$myform->add("usc_address","usc_address",0, 0,"",1,"Bạn chưa nhập địa chỉ công ty",0);
$myform->add("usc_city","usc_city",0, 0,"",0,"Bạn chưa chọn tỉnh thành công ty",0);
$myform->add("usc_district","usc_district",0, 0,"",0,"Bạn chưa chọn quận huyện công ty",0);
$myform->add("usc_size","usc_size",0, 0,"",1,"Bạn chưa chọn quy mô công ty",0);
$myform->add("usc_create_time","usc_create_time",1,1,0,0,"",0,"");
$myform->add("usc_update_time","usc_update_time",1,1,0,0,"",0,"");
$myform->add("usc_type",0,1, 0,"",1,"Bạn chưa nhập kiểu cty",0);
#+
#+ đổi tên trường thành biến và giá trị
$myform->evaluate();
$myform1 = new generate_form();	//Call Class generate_form();
$myform1->removeHTML(0);	//Loại bỏ chức năng không cho điền tag html trong form
#+
#+ Khai bao bang du lieu
$myform1->addTable("user_company_multi");	// Add table
$myform1->add("usc_company_info","usc_company_info",0, 0,"",1,"Bạn chưa nhập giới thiệu công ty",0);
$myform1->evaluate();
#+
#+ Neu nhu co submit form
if($action == "submitForm"){
	//if(!isValidEmail($usc_email))
   //{
     //$errorMsg .= "• Email nhập sai định dạng<br/>";
   //}
	#+
	#+ Kiểm tra lỗi
	$errorMsg .= $myform->checkdata();
	$errorMsg .= $myform->strErrorField ;	//Check Error!
	$errorMsg .= $myform1->checkdata();
	$errorMsg .= $myform1->strErrorField ;	//Check Error!
   if($array_config["image"]==1){
		$upload_pic = new upload("usc_logo", $fs_filepath, $extension_list, $limit_size);
		if ($upload_pic->file_name != ""){
			$picture = date("Y",time())."/".date("m",time())."/".date("d",time())."/".$upload_pic->file_name;
			resize_image($fs_filepath,$upload_pic->file_name,177,130,100,"");
         $usc_logo = $upload_pic->file_name;
         $myform->add("usc_logo",'usc_logo',0,1,"",1,"Bạn chưa chọn logo",0,"");
		}
		//Check Error!
	}
   
	if($errorMsg == ""){
      
		#+
		#+ Thuc hien query
		$db_ex	 		= new db_execute_return();
		$query			= $myform->generate_insert_SQL();

		$last_id 		= $db_ex->db_execute($query);
		$record_id 		= $last_id;

      $db_ex = new db_execute("INSERT INTO user_company_multi(usc_id,usc_company_info) VALUES('".$record_id."','".$usc_company_info."')");
        $sql_alias = "UPDATE user_company SET usc_alias = '".removeTitle($usc_company)."' WHERE usc_id = ".$record_id;
        $db_alias = new db_query($sql_alias);
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
<?=$form->errorMsg($errorMsg)?>
<?=$form->text("Email công ty","usc_email","usc_email",$usc_email,"Email công ty",1,500,"",255)?>
<?=$form->text("Tên công ty","usc_company","usc_company",$usc_company,"Tên công ty",1,500,"",255)?>
<?=$form->text("Số điện thoại","usc_phone","usc_phone",$usc_phone,"Số điện thoại",1,500,"",255)?>
<?=$form->text("Website","usc_website","usc_website",$usc_website,"Website",0,500,"",255)?>
<?=$form->text("Skype or Zalo","usc_skype","usc_skype",$usc_skype,"Skype or Zalo",0,500,"",255)?>
<?=$form->textarea("Địa chỉ công ty", "usc_address", "usc_address", $usc_address, "Địa chỉ công ty", 1, 600, 60, "", "", "")?>
<tr>
    <td class="form_name">Tỉnh / Thành phố</td>
    <td class="form_text">
        <select name="usc_city" id="usc_city" class="form_control">
        	<option value="0">Chọn tỉnh thành</option>
        	<?
			$db_qr = new db_query("SELECT cit_id, cit_name FROM city");
            While($row = mysql_fetch_array($db_qr->result)){
            ?>
        	<option value="<?=$row['cit_id']?>"><?=$row['cit_name']?></option>
        	<?}?>
        </select>
    </td>
</tr>
<tr>
    <td class="form_name">Quận / Huyện</td>
    <td class="form_text">
        <select name="usc_district" id="usc_district" class="form_control">
        	<option value="0">Chọn quận huyện</option>
        </select>
    </td>
</tr>
<?=$form->getFile("Logo công ty", "usc_logo", "usc_logo", "Logo công ty",1, 32, "", '<font color="red">(Kích thước chuẩn 190 x 190)</font>')?>
<script src="jquery.form.js"></script>
<tr>
    <td class="form_name"><font class="form_asterisk">* </font>Quy mô công ty</td>
    <td class="form_text">
        <select name="usc_size" id="usc_size" class="form_control">
        	<option value="">Chọn quy mô</option>
         <option value="1" <?=($usc_size == 1)?'selected="selected"':''?>>Dưới 20 nhân viên</option>
         <option value="2" <?=($usc_size == 2)?'selected="selected"':''?>>20 - 50 nhân viên</option>
         <option value="3" <?=($usc_size == 3)?'selected="selected"':''?>>50 - 100 nhân viên</option>
         <option value="4" <?=($usc_size == 4)?'selected="selected"':''?>>100 - 300 nhân viên</option>
         <option value="5" <?=($usc_size == 5)?'selected="selected"':''?>>300 - 1000 nhân viên</option>
         <option value="6" <?=($usc_size == 6)?'selected="selected"':''?>>1000 - 3000 nhân viên</option>
         <option value="7" <?=($usc_size == 7)?'selected="súelected"':''?>>Trên 3000 nhân viên</option>
        </select>
    </td>
</tr>
<?=$form->close_table();?>
<?=$form->wysiwyg("Mô tả công ty", "usc_company_info", $usc_company_info, "../../resource/ckeditor/", "50%","600")?>
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
<script>
	// $('#use_city').select2({
 //        width:'250px'
 //    });
	$('#usc_city').change(function(){
		var id = $(this).val();

		$.ajax({
			type: "GET",
			url: "add.php?city="+id,
			data:{
				id: id
			},
			success:function(data){
				$('#usc_district').html(data);
			}
		});
	});
</script>
<script src="/js/select2.min.js"></script>
<script type="text/javascript">
      $("#usc_city,#usc_district").select2({
        width:'50%'
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