<style type="text/css">
  select#pro_category_id {
    width: 61%;
    height: 30px;
}
select#idcate,#idnganh {
    width: 600px;
    height: 30px;
}
</style>
<?
require_once("inc_security.php");
require_once("lib_image.php");
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

#+
#+ Khai bao bien
$add              = "add.php";
$listing          = "listing.php";
$edit          = "edit.php";
$after_save_data  = getValue("after_save_data", "str", "POST", $add);

$admin_id         = getValue("admin_id","int","SESSION");

$errorMsg       = "";   //Warning Error!
$action       = getValue("action", "str", "POST", "");
$name_folder    = getValue("alias" ,"str" , "POST","");
// $name_img      = getValue("image" ,"str", "POST",""); 
$fs_action      = getURL();
$record_id      = getValue("record_id");



$menu         = new menu();
$listAll      = $menu->getAllChild("danhmuccv","id","serial","0","1","id,name,title_des","1");
//get nganh nghe
$db_list = new db_query("SELECT cat_id,cat_name FROM `category_appli` ORDER BY cat_name ASC ");

$menu3         = new menu();
$listAll3      = $menu3->getAllChild("languagecv","code","id","0","1","id,name,code","1");
//Lay loai modul
$new_module_id = 1;



#+
#+ Goi class generate form
$myform = new generate_form();  //Call Class generate_form();
$myform->removeHTML(0); //Loại bỏ chức năng không cho điền tag html trong form
#+
#+ Khai bao bang du lieu
$myform->addTable($fs_table); // Add table
$timecreated = time();
#+
#+ Khai bao thong tin cac truong
$myform->add("idcate","idcate",0, 0,"",1,"Bạn chưa nhập ID danh mục",0,"");
$myform->add("name","name",0, 0,"",1,"Bạn chưa nhập Tên mẫu đơn",0,"");
$myform->add("alias","alias",0, 0,"",1,"Bạn chưa nhập tên đơn (không dấu)",0,"");

$myform->add("idnganh","idnganh",0, 0,"",1,"Bạn chưa chọn ID ngành nghề",0,"");
$myform->add("htmlcss_vi","htmlcss_vi",0, 0,"",1,"Bạn chưa nhập chuỗi Json HTML ngỗn ngữ Tiếng Việt",0,"");
$myform->add("htmlcss_en","htmlcss_en",0, 0,"",1,"Bạn chưa nhập chuỗi Json HTML ngỗn ngữ Tiếng Anh",0,"");
$myform->add("htmlcss_jp","htmlcss_jp",0, 0,"",1,"Bạn chưa chọn chuỗi Json HTML ngỗn ngữ Tiếng Nhật",0,"");
$myform->add("htmlcss_cn","htmlcss_cn",0, 0,"",1,"Bạn chưa chọn chuỗi Json HTML ngỗn ngữ Tiếng Trung",0,"");
$myform->add("htmlcss_kr","htmlcss_kr",0, 0,"",1,"Bạn chưa chọn chuỗi Json HTML ngỗn ngữ Tiếng Hàn",0,"");
$myform->add("codecolor","codecolor",0, 0,"",1,"Bạn chưa chọn mã màu",0,"");
$myform->add("timecreated","timecreated",1,0,$timecreated,0,"",0,"");
#+
#+ đổi tên trường thành biến và giá trị
$myform->evaluate();
$myform1 = new generate_form(); //Call Class generate_form();
$myform1->removeHTML(0);  //Loại bỏ chức năng không cho điền tag html trong form

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
      $fs_filepath_re = '../../../upload/appli/'.$alias . "/";  
      is_dir('../../../upload/appli/'.$alias) || @mkdir('../../../upload/appli/'.$alias,0777,true) || die("Can't Create folder");

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
<tr><td class="form_text"><input id="timecreated" name="timecreated" value="<?=$timecreated; ?>" style="display: none;"></td></tr>
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
<?=$form->text("Tên đơn xin việc","name","name",$name,"Nhập tên mẫu đơn",1,600,30,255)?>
<?=$form->text("Tên đơn xin việc(không dấu)","alias","alias",$alias,"Nhập tên mẫu đơn không dấu",1,600,30,255)?>
<?=$form->getFile("Ảnh đại diện","image","image","Ảnh đại diện", 0, 32, "", '(Dung lượng tối đa <font color="#FF0000">' . $limit_size . ' Kb</font>)');?>
<tr>
    <td class="form_name"><font class="form_asterisk">* </font>Chọn ngành nghề</td>
    <td class="form_text">
        <select name="idnganh" id="idnganh" class="form_control">
          <option value=""><?=tt("Chọn ngành nghề")?></option>
      <?
            While($row = mysql_fetch_assoc($db_list->result)){
                ?>
                    <option value="<?=$row["cat_id"]?>" >
                    <?
                    echo $row["cat_name"];
                    ?>
                    </option>
                <?
            }
            ?>
        </select>
    </td>
</tr>

<?=$form->textarea("Chuỗi Json HTML ngỗn ngữ VN","htmlcss_vi","htmlcss_vi","","",1,600,300,255)?>
<?=$form->textarea("Chuỗi Json HTML ngỗn ngữ EN","htmlcss_en","htmlcss_en","","",1,600,300,255)?>
<?=$form->textarea("Chuỗi Json HTML ngỗn ngữ JP","htmlcss_jp","htmlcss_jp","","",1,600,300,255)?>
<?=$form->textarea("Chuỗi Json HTML ngỗn ngữ CN","htmlcss_cn","htmlcss_cn","","",1,600,300,255)?>
<?=$form->textarea("Chuỗi Json HTML ngỗn ngữ KR","htmlcss_kr","htmlcss_kr","","",1,600,300,255)?>
<?=$form->text("Mã màu","codecolor","codecolor",$codecolor,"Chọn mã màu",1,600,30,255)?>
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