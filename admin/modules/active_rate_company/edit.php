<style>
#cke_new_description
{
   width: 80%;
   margin: 0 auto;
   position: relative;
   top: -15px;
}
</style>
<?php
require_once("inc_security.php");
require_once("lib_image.php");
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

$new_strdate		= getValue("new_strdate", "str", "POST", date("d/m/Y"));
$new_strtime		= getValue("new_strtime", "str", "POST", date("H:i:s"));
$new_date_last_edit    = convertDateTime($new_strdate, $new_strtime);

$new_strdateht		= getValue("new_strdateht", "str", "POST", date("d/m/Y"));
$new_strtimeht		= getValue("new_strtimeht", "str", "POST", date("H:i:s"));
$new_hantuyen		= convertDateTime($new_strdateht, $new_strtimeht);

#+
$new_title_rewrite 	= getValue("new_title_rewrite", "str", "POST", "");
if($new_title_rewrite == ''){
	$new_title_rewrite 	= removeTitle(getValue("new_title", "str", "POST", ""),'/');
	$new_title_rewrite 	= strtolower($new_title_rewrite);
} // End if($new_title_rewrite == ''){

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
$listAll = $menu->getAllChild("categories_multi","cat_id","cat_parent_id","0","1","cat_id,cat_name,cat_order,cat_type,cat_parent_id,cat_has_child","cat_type, cat_order ASC, cat_name ASC","cat_has_child");
$listAllBm = [];
$db_bm = new db_query("SELECT cate_id, cate_name FROM cate_bieumau ORDER BY cate_id DESC");
While($rbm = mysql_fetch_assoc($db_bm->result)){
	$listAllBm[$rbm['cate_id']] = $rbm['cate_name'];
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
$myform->add("new_admin_edit","new_admin_edit",1,0,$admin_id,0,"",0,"");
$myform->add("new_category_id", "new_category_id", 1, 0, 0, 1, translate_text("Bạn chưa chọn danh mục"), 0, "");
$myform->add("new_title","new_title",0, 0,"",1,"Bạn chưa nhập tiêu đề tin",0,"");
$myform->add("new_title_rewrite","new_title_rewrite",0, 1,"",0,"",0,"Tin này đã tồn tại trong CSDL");
$myform->add("new_order","new_order",1,0,0,0,"",0,"");
// $myform->add("new_url_lq","new_url_lq",0, 0,"",1,"Bạn chưa chọn bài viết liên quan",0,"");

$myform->add("new_301","new_301",0,0,"",0,"",0,"");

$myform->add("new_picture_web","new_picture_web",0,0,"",0,"",0,"");
$myform->add("new_teaser","new_teaser",0,0,"",0,"",0,"");
$myform->add("new_keyword","new_keyword",0,0,"",1,"Bạn chưa keyword",0,"");
$myform->add("new_description","new_description",0,0,"",0,"",0,"");

$myform->add("new_tt","new_tt",0,0,"",0,"",0,"");
$myform->add("new_des","new_des",0,0,"",0,"",0,"");

$myform->add("new_date_last_edit","new_date_last_edit",1,1,0,0,"",0,"");
$myform->add("new_hot","new_hot",1,0,0,0,"",0,"");
$myform->add("new_new","new_new",1,0,0,0,"",0,"");
$myform->add("new_active", "new_active", 1, 0, 1, 0, "", 0, "");

#+
#+ đổi tên trường thành biến và giá trị
$myform->evaluate();

#+
#+ Neu nhu co submit form
if($action == "submitForm"){

	if($array_config["image"]==1){
		$upload_pic = new upload("picture", $fs_filepath, $extension_list, $limit_size);		
		if ($upload_pic->file_name != ""){			
			$picture = date("Y",time())."/".date("m",time())."/".date("d",time())."/".$upload_pic->file_name;			
			//resize_image($fs_filepath_re, $upload_pic->file_name,310,100,100,"");			
			$myform->add("new_picture","picture",0,1,"",0,"",0,"");
			//////////
			$fs_filepath_re = '../../../pictures/news/resize/'.date("Y",time())."/".date("m",time())."/".date("d",time());	
			if(!is_dir('../../../pictures/news/resize/'.date("Y",time()))){
				mkdir('../../../pictures/news/resize/'.date("Y",time()), 0755, TRUE);
			}
			if(!is_dir('../../../pictures/news/resize/'.date("Y",time())."/".date("m",time()))){
				mkdir('../../../pictures/news/resize/'.date("Y",time())."/".date("m",time()), 0755, TRUE);
			}
			if(!is_dir('../../../pictures/news/resize/'.date("Y",time())."/".date("m",time())."/".date("d",time()))){
				mkdir('../../../pictures/news/resize/'.date("Y",time())."/".date("m",time())."/".date("d",time()), 0755, TRUE);
			}
			$tmp = $fs_filepath.$upload_pic->file_name;           
	        if(file_exists($tmp)){                                                
	            $imageThumb = new Image($tmp);                         
	            $temp=explode('.',$upload_pic->file_name);              	            
	            if($imageThumb->getWidth() > 310){          
	                $imageThumb->resize(310,'resize');
	            }
	            $imageThumb->save($temp[0], $fs_filepath_re, $temp[1]); 	            	           
	            //unlink($tmp);                       
	        }
		}
		//Check Error!
		$errorMsg .= $upload_pic->show_warning_error();
	}

	$sl_bv = count($_POST['new_url_lq']);

	if ($sl_bv < 3 AND $sl_bv > 0) {
		$errorMsg .= "• Vui lòng chọn đủ 3 bài viết liên quan";
	}
	#+
	#+ Kiểm tra lỗi
    $errorMsg .= $myform->checkdata();
	$errorMsg .= $myform->strErrorField ;	//Check Error!
	$new_cate_bm = getValue('new_cate_bm','int','POST',-1);
    if($new_cate_bm >= 0){
        $myform->add("new_cate_bm", "new_cate_bm", 1, 0, 0, 1, "Bạn chưa chọn thể loại biểu mẫu", 0, "");
    }

	if($errorMsg == ""){

		#+
		#+ Thuc hien query
		$query = $myform->generate_update_SQL($field_id,$record_id);

		$db_ex = new db_execute($query);
		$url_lq = implode (",",$_POST['new_url_lq']);



		$db_ex = new db_execute("UPDATE news SET new_url_lq = '".$url_lq."' WHERE new_id = ".$record_id."");
		$fs_redirect 	= $after_save_data. "?record_id=".$record_id."&category=".getValue("new_category_id","int","POST");
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
$db_data 	= new db_query($query);

if($row 	= mysql_fetch_assoc($db_data->result))
{
	foreach($row as $key=>$value)
	{
		if($key!='lang_id' && $key!='admin_id') $$key = $value;
	}
}else
{
	exit();
}
$readonly = '';
if(	$_SESSION["isAdmin"] == 0){
	$readonly = "readonly";
}else{
	$readonly = "";
}

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
<?=$form->errorMsg($errorMsg)?>
<tr>
   <td class="form_name">
    	<font class="form_asterisk">* </font>Chọn danh mục
   </td>
    <td class="form_text">
        <select name="new_category_id" id="new_category_id" class="form_control">
        	<option value=""><?=tt("Chọn danh mục")?></option>
			<?
            foreach($listAll as $i=>$cat){
                ?>
                    <option value="<?=$cat["cat_id"]?>" <?=$new_category_id == $cat["cat_id"] ? 'selected' : '' ?> >
                    <?
                    for($j=0;$j<$cat["level"];$j++) echo '|--';
                    echo $cat["cat_name"];
                    ?>
                    </option>
                <?
            }
            ?>
        </select>
    </td>
</tr>
<tr id="bieu_mau" class="<?= ($row['new_category_id']!=3)?"hidden":"" ?>">
    <td class="form_name"><font class="form_asterisk">* </font>Chọn thể loại biểu mẫu</td>
    <td class="form_text">
        <select name="<?= ($row['new_category_id']==3)?"new_cate_bm":"" ?>" id="bm_cate" class="form_control">
        	<option value="0"><?=tt("Chọn danh mục")?></option>
			<?
            foreach($listAllBm as $i=>$cat){
                ?>
                    <option <?= ($i == $row['new_cate_bm'])?"selected":""?> value="<?=$i?>" >
                    <?
                    echo $cat;
                    ?>
                    </option>
                <?
            }
            ?>
        </select>
    </td>
</tr>
<tr>
    <td class="form_name"><font class="form_asterisk">* </font>Bài viết liên quan</td>
    <td class="form_text">
         <select id="new_url_lq"  class="new_url_lq" name='new_url_lq[]' multiple="" data-select2-id="3" tabindex="-1" aria-hidden="true">
            <option value="">Chọn bài viết</option>
            <?

            $db_qr = new db_query("SELECT new_id,new_title FROM news WHERE new_active = 1 AND new_new = 0");

            $db_lq = new db_query("SELECT new_url_lq FROM news WHERE new_id = " . $record_id);

            $row_lq = mysql_fetch_assoc($db_lq->result);
            $new_lq = array();
            $new_lq = explode(',', $row_lq['new_url_lq']);	

            While($row = mysql_fetch_assoc($db_qr->result))
            {
            ?>
            <option <?= in_array($row['new_id'],$new_lq)?"selected":"" ?> value="<?= $row['new_id'] ?>"><?= $row['new_title'] ?></option>
            <?
            }
            unset($type,$item);
            ?>
         </select>
    </td>
</tr>

<?=$form->text("Tiêu đề tin","new_title","new_title",$new_title,"Tiêu đề tin",1,500,"",255)?>
<?=$form->text("URL","new_title_rewrite","new_title_rewrite",$new_title_rewrite,"URL",1,500,'','','',$readonly)?>

<? if ($_SESSION["isAdmin"] == 1) { ?>
<?=$form->text("URL_301","new_301","new_301",$new_301,"URL_301",0,500,"",255)?>
<? } ?>


<?=$form->text(translate_text("Thứ tự"),"new_order","new_order",$new_order,translate_text("Thứ tự"),0,50,"",255);?>

<?=$form->getFile("Ảnh minh họa", "picture", "picture", "Ảnh minh họa", 0, 32, "", '<br />(Dung lượng tối đa <font color="#FF0000">'.$limit_size.' Kb</font>)')?>
<?=$form->text("Title (<span id='count_title'>".mb_strlen(trim($new_tt))."</span>/65 ký tự)","new_tt","new_tt",$new_tt,"Title",0,500,"",255)?>

<?=$form->textarea("Description (<span id='count_description'>".mb_strlen(trim($new_des))."</span>/165 ký tự)", "new_des", "new_des", $new_des, "Description", 0, 500, 60, "", "", "")?>
<?=$form->textarea("Keywords", "new_keyword", "new_keyword", $new_keyword, "Keywords", 0, 600, 120, "", "", "")?>
<?=$form->close_table();?>
<?=$form->wysiwyg("Tóm tắt", "new_teaser", $new_teaser, "../../resource/ckeditor/", "80%","600")?>
<?=$form->create_table();?>

<?=$form->text("Ngày Sửa", "new_strdate" . $form->ec . "new_strtime", "new_strdate" . $form->ec . "new_strtime", $new_strdate . $form->ec . $new_strtime, "Ngày (dd/mm/yyyy)" . $form->ec . "Giờ (hh:mm:ss)", 0, 70 . $form->ec . 70, $form->ec, 10 . $form->ec . 10, " - ", $form->ec, "&nbsp; <i>(Ví dụ: dd/mm/yyyy - hh:mm:ss)</i>");?>
<?=$form->checkbox("Loại bản ghi", "new_active".$form->ec."new_new".$form->ec."new_hot", "new_active".$form->ec."new_new".$form->ec."new_hot", "1".$form->ec."1".$form->ec."1", $new_active.$form->ec.$new_new.$form->ec.$new_hot, "Kích hoạt".$form->ec."Tin mới".$form->ec."Tin hot", "0".$form->ec."0".$form->ec."0", "".$form->ec."".$form->ec."", "")?>
<?=$form->close_table();?>
<?=$form->wysiwyg("Mô tả chi tiết", "new_description", $new_description, "../../resource/ckeditor/", "99%", 300)?>
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
	$('#new_category_id').select2();
    $("#new_url_lq").select2({
      maximumSelectionLength: 3,
      placeholder: "Chọn bài viết liên quan *"
    });

	$("#new_url_lq").on("select2:select", function (evt) {
	  var element = evt.params.data.element;
	  var $element = $(element);
	  
	  $element.detach();
	  $(this).append($element);
	  $(this).trigger("change");
	});
	$('#new_tt').on('keyup',function(){
		count = $(this).val().length;
		$('#count_title').html(count);
	});
	$('#new_des').on('keyup',function(){
		count = $(this).val().length;
		$('#count_description').html(count);
	});
	$('#new_category_id').change(function(){
        e = $(this);
        val = e.val();
        if(val == 3){
            $('#bieu_mau').removeClass('hidden');
            $('#bieu_mau select').attr('name','new_cate_bm');
        }else{
            $('#bieu_mau').addClass('hidden');
            $('#bieu_mau select').attr('name','');
        }
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