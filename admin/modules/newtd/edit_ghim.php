
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
$myform->add("new_title","new_title",0, 0,"",1,"Bạn chưa nhập tiêu đề tin",0,"");
$myform->add("new_301","new_301",0,0,"",0,"",0,"");
$myform->add("new_over_tc","new_over_tc",0,0,0,0,"",0,"");
$myform->add("new_over_cate","new_over_cate",0,0,0,0,"",0,"");
$myform->add("new_hot","new_hot",1,0,0,0,"",0,"");
$myform->add("new_gap","new_gap",1,0,0,0,"",0,"");
$myform->add("new_cao","new_cao",1,0,0,0,"",0,"");
$myform->add("new_nganh","new_nganh",1,0,0,0,"",0,"");
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
		$query			= $myform->generate_update_SQL($field_id,$record_id);
        
		$new_over_tc2 = strtotime($new_over_tc);
        $query = str_replace($new_over_tc,$new_over_tc2,$query);
        $new_over_cate2 = strtotime($new_over_cate);
        $query = str_replace($new_over_cate,$new_over_cate2,$query);
        $db_ex = new db_execute($query);
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
<?=$form->text("Tiêu đề tin","new_title","new_title",$rowdb->new_title,"Nhập tiêu đề tin",1,500,"",255)?>
<?=$form->text("Link điều hướng","new_301","new_301",$rowdb->new_301,"Nhập link điều hướng",0,500,"",255)?>
<tr>
    <td>Ghim trang chủ đến ngày:</td>
    <td><input type="date" name="new_over_tc" id="new_over_tc" value="<?=date('Y-m-d',$rowdb->new_over_tc)?>" /></td>
</tr>
<tr>
    <td>Ghim trang ngành đến ngày:</td>
    <td><input type="date" name="new_over_cate" id="new_over_cate" value="<?=date('Y-m-d',$rowdb->new_over_cate)?>" /></td>
</tr>
<tr>
    <td>Gói ghim trang chủ:</td>
    <td class="form_text">
       <input type="checkbox" name="new_hot" id="new_hot" value="1" <?=($rowdb->new_hot)?"checked":""?>/> <label for="new_hot">Box Hấp Dẫn</label>
       <input type="checkbox" name="new_gap" id="new_gap" value="1" <?=($rowdb->new_gap)?"checked":""?> /> <label for="new_gap">Box Tuyển Gấp</label>
       <input type="checkbox" name="new_cao" id="new_cao" value="1" <?=($rowdb->new_cao)?"checked":""?> /> <label for="new_cao">Box Lương Cao</label>
    </td>
</tr>
<tr>
    <td>Gói ghim trang ngành</td>
    <td><input type="checkbox" name="new_nganh" id="new_nganh" value="1" <?=($rowdb->new_nganh)?"checked":""?>/> <label for="">Box trang ngành</label></td>
</tr>
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