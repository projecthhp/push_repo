<? 
require_once("inc_security.php");
function removeTitle($string,$keyReplace){
  $string   = html_entity_decode($string, ENT_COMPAT, 'UTF-8');
  $string   = mb_strtolower($string, 'UTF-8');
  $string   = removeAccent($string);
  //neu muon de co dau
  //$string   =  trim(preg_replace("/[^A-Za-z0-9àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸ]/i"," ",$string));

  $string   = trim(preg_replace("/[^A-Za-z0-9]/i"," ",$string)); // khong dau
  $string   = str_replace(" ","-",$string);
  $string   = str_replace("--","-",$string);
  $string   = str_replace("--","-",$string);
  $string   = str_replace("--","-",$string);
  $string   = str_replace($keyReplace,"-",$string);
  return $string;
}
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
$record_id      = getValue("record_id");

#+
// $cat_name_rewrite   = getValue("cat_name_rewrite", "str", "POST", "");
// if($cat_name_rewrite == ''){
//   $cat_name_rewrite   = removeTitle(getValue("cat_name", "str", "POST", ""),'/');
//   $cat_name_rewrite   = strtolower($cat_name_rewrite);
// } // End if($cat_name_rewrite == ''){

#+
#+ Goi class generate form
$myform = new generate_form();  //Call Class generate_form();
$myform->removeHTML(0); //Loại bỏ chức năng không cho điền tag html trong form
#+
#+ Khai bao bang du lieu
$myform->addTable($fs_table); // Add table
#+
#+ Khai bao thong tin cac truong
// $myform->add("","bm_title",0,0,"",0,"Vui lòng title biểu mẫu",0,"");
// $myform->add("bm_description","bm_description",0,0,"",0,"Vui lòng nhập description biểu mẫu",0,"");

$myform->add("point","point",0,0,"",1,"Vui lòng nhập điểm cộng hằng ngày",0,"");
$myform->add("point_usc","point_usc",0,0,"",0,"",0,"");
$myform->add("day_reset_point","day_reset_point",0,0,"",0,"",0,"");
$myform->add("day_end","day_end",0,0,"",1,"Vui lòng chọn ngày hết hạn điểm",0,"");



// $myform->add("bm_title","bm_title",0,0,"",0,"Vui lòng title biểu mẫu",0,"");
// $myform->add("bm_description","bm_description",0,0,"",0,"Vui lòng nhập description biểu mẫu",0,"");
// $myform->add("bm_mota","bm_mota",0,0,"",0,"Vui lòng nhập mô tả danh mục",0,"");
// $myform->add("bm_keyword","bm_keyword",0,0,"",0,"Vui lòng nhập keyword",0,"");




#+
#+ đổi tên trường thành biến và giá trị
$myform->evaluate();

#+
#+ Neu nhu co submit form
if($action == "submitForm"){

  #+
  #+ Kiểm tra lỗi
    $errorMsg .= $myform->checkdata();
  $errorMsg .= $myform->strErrorField ; //Check Error!
  if($errorMsg == ""){
    #+
    #+ Thuc hien query

    $update = "SELECT point_usc  FROM " . $fs_table . "
                       WHERE usc_id = ". $record_id;
    $db_ls  = new db_query($update);
    $row_ls   = mysql_fetch_assoc($db_ls->result);
    if ($_POST['point_usc']  != $row_ls['point_usc']) {

      $chenh = $_POST['point_usc'] - $row_ls['point_usc'];

      $db_exciu = new db_execute("INSERT INTO tbl_point_used(usc_id,point,type,used_day) VALUES('".$record_id."','".$chenh."',1,'".time()."')");
    }
    if ($_POST['point_usc'] > 99) {
      $db_excius = new db_execute("UPDATE user_company SET usc_loc = 1 WHERE usc_id = ".$record_id."");
    }


    $query = $myform->generate_update_SQL($field_id,$record_id);
    $db_ex = new db_execute($query);
    $day_end = strtotime($_POST['day_end']);
    $update_end = new db_execute("UPDATE tbl_point_company SET day_end = ".$day_end." WHERE usc_id = ".$record_id."");
    # echo $query;exit();

      
    #+
    #+ Chuyen ve trang khac khi xu ly du lieu oki
    redirect($after_save_data . "?record_id=" . $record_id);
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
$query = "SELECT usc_name,usc_email,point,point_usc,day_end  FROM " . $fs_table . " INNER JOIN user_company ON " .$fs_table.".usc_id = user_company.usc_id
									 WHERE user_company.usc_id = ". $record_id;
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
<br/>

<p style="margin-left: 20px;"><span style="color: red;">Tên công ty :</span> <span style="font-weight: bold;"><?=$row['usc_name'] ?></span></p>
<p style="margin-left: 20px;"><span style="color: red;">Email công ty :</span> <span style="font-weight: bold;"><?=$row['usc_email'] ?></span></p>


<?=$form->text("Nhập điểm cộng hằng ngày","point","point",$point,"điểm",1,320,"",25,'','readonly')?>
<?=$form->text("Nhập điểm cộng thêm","point_usc	","point_usc",$point_usc,'điểm thêm',0,320,"",25)?>

<input class="form_control" type="text"  id="day_reset_point" name="day_reset_point" value="<?=time(); ?>" style="display: none;">
<tr>
  <td class="form_name">  <font class="form_asterisk">* </font> Ngày hết hạn: </td>
  <td><input type="date" id="day_end" name="day_end" value="<?=date('Y-m-d',$row['day_end'])?>" /></td>
</tr>

<!-- -->






<script src="jquery.form.js"></script>


<?=$form->close_table();?>
<?=$form->create_table();?>


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


