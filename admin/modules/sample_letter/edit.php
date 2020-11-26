<style>
#cke_1_contents
{
   height: 100px!important;
}
select#idcate,#idnganh {
    width: 500px;
    height: 30px;
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
$menu         = new menu();
$listAll      = $menu->getAllChild("danhmuccv","id","serial","0","1","id,name,title_des","1");
//get nganh nghe
$menu2         = new menu();
$listAll2      = $menu2->getAllChild("nganhcv","id","serial","0","1","id,name,title_des","1");

$menu3         = new menu();
$listAll3      = $menu3->getAllChild("languagecv","code","id","0","1","id,name,code","1");
#+
#+ Goi class generate form
$myform = new generate_form();	//Call Class generate_form();
$myform->removeHTML(0);	//Loại bỏ chức năng không cho điền tag html trong form
#+
#+ Khai bao bang du lieu
$myform->addTable($fs_table);	// Add table
#+
#+ Khai bao thong tin cac truong
$myform->add("idcate","idcate",0, 0,"",1,"Bạn chưa nhập ID danh mục",0,"");
$myform->add("name","name",0, 0,"",1,"Bạn chưa nhập Tên mẫu thư",0,"");
$myform->add("alias","alias",0, 0,"",1,"Bạn chưa nhập tên thư (không dấu)",0,"");

$myform->add("idnganh","idnganh",0, 0,"",1,"Bạn chưa chọn ID ngành nghề",0,"");
$myform->add("htmlcss_vi","htmlcss_vi",0, 0,"",1,"Bạn chưa nhập chuỗi Json HTML ngỗn ngữ Tiếng Việt",0,"");
$myform->add("htmlcss_en","htmlcss_en",0, 0,"",1,"Bạn chưa nhập chuỗi Json HTML ngỗn ngữ Tiếng Anh",0,"");
$myform->add("htmlcss_jp","htmlcss_jp",0, 0,"",1,"Bạn chưa chọn chuỗi Json HTML ngỗn ngữ Tiếng Nhật",0,"");
$myform->add("htmlcss_cn","htmlcss_cn",0, 0,"",1,"Bạn chưa chọn chuỗi Json HTML ngỗn ngữ Tiếng Trung",0,"");
$myform->add("htmlcss_kr","htmlcss_kr",0, 0,"",1,"Bạn chưa chọn chuỗi Json HTML ngỗn ngữ Tiếng Hàn",0,"");
$myform->add("codecolor","codecolor",0, 0,"",1,"Bạn chưa chọn mã màu",0,"");
$myform->add("serial","serial",0, 0,"",0,"",0,"Bạn chưa nhập thứ tự",0,"");
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

#+ Neu nhu co submit form
if($action == "submitForm"){
  #+
  #+ Kiểm tra lỗi
   $errorMsg .= $myform->checkdata();
  $errorMsg .= $myform->strErrorField ; //Check Error!

   if($array_config["image"]==1){
    $upload_pic = new upload("image", $fs_filepath, $extension_list, $limit_size);

    if ($upload_pic->file_name != ""){
      $picture = $upload_pic->file_name;

      $myform->add("image","picture",0,1,"",0,"",0,"");
      $fs_filepath_re = '../../../upload/maucv/'.$alias . "/";  
      is_dir('../../../upload/maucv/'.$alias) || @mkdir('../../../upload/maucv/'.$alias,0777,true) || die("Can't Create folder");

      $tmp = $fs_filepath.$upload_pic->file_name; 
      if(file_exists($tmp)){                                                
              $imageThumb = new Image($tmp);                         
              $temp=explode('.',$upload_pic->file_name);                            
              $imageThumb->save($temp[0],$fs_filepath_re, $temp[1]);                                         
          }
    }
      else
      {
         $errorMsg .= "• Bạn chưa chọn ảnh đại diện";
      }

    $errorMsg .= $upload_pic->show_warning_error();
   
  if($errorMsg == ""){
      
    #+
    #+ Thuc hien query
    $db_ex      = new db_execute_return();
    $query      = $myform->generate_insert_SQL();

    $last_id    = $db_ex->db_execute($query);
    $record_id    = $last_id;
    $fs_redirect  = $after_save_data. "?record_id=".$record_id;
    redirect($fs_redirect);
    exit();

  }
}
}
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
<tr>
    <td class="form_name"><font class="form_asterisk">* </font>Chọn danh mục</td>
    <td class="form_text">
        <select name="idcate" id="idcate" class="form_control">
          <option value=""><?=tt("Chọn danh mục")?></option>
      <?
            foreach($listAll as $i=>$cat){
                ?>
                    <option value="<?=$cat["id"]?>" >
                    <?
                    for($j=0;$j<$cat["name"];$j++) echo '|--';
                    echo $cat["name"];
                    ?>
                    </option>
                <?
            }
            ?>
        </select>
    </td>
</tr>
<?=$form->text("Tên mẫu thư","name","name",$name,"Nhập tên mẫu thư",1,500,"",255)?>
<?=$form->text("Tiêu đề mô tả","alias","alias",$alias,"Nhập Tiêu đề mô tả",1,500,"",255)?>
<?=$form->getFile("Ảnh đại diện","image","image","Ảnh đại diện", 0, 32, "", '(Dung lượng tối đa <font color="#FF0000">' . $limit_size . ' Kb</font>)');?>
<tr>
    <td class="form_name"><font class="form_asterisk">* </font>Chọn ngành nghề</td>
    <td class="form_text">
        <select name="idnganh" id="idnganh" class="form_control">
          <option value=""><?=tt("Chọn ngành nghề")?></option>
          <?
          $sql_cate = "SELECT * FROM category_letter ORDER BY cat_name ASC";
          $db_cate = new db_query($sql_cate);
          While($row_cate = mysql_fetch_assoc($db_cate->result)){
          ?>
              <option value="<?=$row_cate["cat_id"]?>" >
              <?
              echo $row_cate["cat_name"];
              ?>
              </option>
          <?}?>
        </select>
    </td>
</tr>
<?$form->text("ID ngôn ngữ","idlang","idlang",$idlang,"Chọn ID ngôn ngữ",1,500,"",255)?>
<?=$form->textarea("Chuỗi Json HTML ngỗn ngữ VN","htmlcss_vi","htmlcss_vi",str_replace('\\'.'t','\\\\\t',str_replace('\\'.'n','\\\\\n',$htmlcss_vi)),"Dành cho robot đọc",1,500,300,255)?>
<?=$form->textarea("Chuỗi Json HTML ngỗn ngữ EN","htmlcss_en","htmlcss_en",str_replace('\\'.'t','\\\\\t',str_replace('\\'.'n','\\\\\n',$htmlcss_en)),"Dành cho robot đọc",1,500,300,255)?>
<?=$form->textarea("Chuỗi Json HTML ngỗn ngữ JP","htmlcss_jp","htmlcss_jp",str_replace('\\'.'t','\\\\\t',str_replace('\\'.'n','\\\\\n',$htmlcss_jp)),"Dành cho robot đọc",1,500,300,255)?>
<?=$form->textarea("Chuỗi Json HTML ngỗn ngữ CN","htmlcss_cn","htmlcss_cn",str_replace('\\'.'t','\\\\\t',str_replace('\\'.'n','\\\\\n',$htmlcss_cn)),"Dành cho robot đọc",1,500,300,255)?>
<?=$form->textarea("Chuỗi Json HTML ngỗn ngữ KR","htmlcss_kr","htmlcss_kr",str_replace('\\'.'t','\\\\\t',str_replace('\\'.'n','\\\\\n',$htmlcss_kr)),"Dành cho robot đọc",1,500,300,255)?>
<?=$form->text("Mã màu","codecolor","codecolor",$codecolor,"Chọn mã màu",1,500,"",255)?>
<?=$form->text("Thứ tự","serial","serial",$serial,"Chọn thứ tự",1,500,"",255)?>

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