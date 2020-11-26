<style>
#cke_new_description
{
   width: 80%;
   margin: 0 auto;
   position: relative;
   top: -15px;
}
</style>
<?
require_once("inc_security.php");
require_once("lib_image.php");
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

$new_strdateht		= getValue("new_strdateht", "str", "POST", date("d/m/Y"));
$new_strtimeht		= getValue("new_strtimeht", "str", "POST", date("H:i:s"));
$new_hantuyen		= convertDateTime($new_strdateht, $new_strtimeht);

#+
$school_name 	        = getValue("school_name", "str", "POST", "");
$gender                 = getValue("gender","str","POST","");
$city                   = getValue("use_city","str","POST","");
$district               = getValue("district","str","POST","");
$address                = getValue("address","str","POST","");
$use_job_name           = getValue("use_job_name",'str','POST','');
$use_nganh_nghe         = getValue("use_nganh_nghe",'arr','POST','');
$use_district_job = getValue("use_district_job","arr","POST",'');
$birthday = getValue('birthday','str','POST','');
$honnhan = getValue('honnhan','str','POST','');
$rank = getValue('rank','str','POST','');
$exp_years = getValue('exp_years','exp_years','POST','');
$salary = getValue('salary','str','POST','');
$cap_bac_mong_muon = getValue('cap_bac_mong_muon','str','POST','');
$muc_tieu_nghe_nghiep = getValue('muc_tieu_nghe_nghiep','str','POST','');
$muc_tieu_nghe_nghiep = getValue('muc_tieu_nghe_nghiep','str','POST','');

$bang_cap = getValue('bang_cap','str','POST','');
$truong_hoc = getValue('truong_hoc','str','POST','');
$tg_batdau_hoc = getValue('tg_batdau_hoc','str','POST','');
$tg_ketthuc_hoc = getValue('tg_ketthuc_hoc','str','POST','');
$chuyen_nganh = getValue('chuyen_nganh','str','POST','');
$xep_loai = getValue('xep_loai','str','POST','');

$use_chucdanh = getValue('use_chucdanh','str','POST','');
$use_cty_lamviec = getValue('use_cty_lamviec','str','POST','');
$tg_batdau = getValue('tg_batdau','str','POST','');
$tg_ketthuc = getValue('tg_ketthuc','str','POST','');
$them_thongtin = getValue('them_thongtin','str','POST','');
$thongtin_bosung = getValue('thongtin_bosung','str','POST','');

$id_ngonngu = getValue('id_ngonngu','str','POST','');
$chung_chi = getValue('chung_chi','str','POST','');
$ket_qua = getValue('ket_qua','str','POST','');



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
$listAll = $menu->getAllChild("categories_multi","cat_id","cat_parent_id","0","cat_active = 1","cat_id,cat_name,cat_order,cat_type,cat_parent_id,cat_has_child","cat_type, cat_order ASC, cat_name ASC","cat_has_child");
//*/

#+
#+ Goi class generate form
$myform = new generate_form();	//Call Class generate_form();
$myform->removeHTML(0);	//Loại bỏ chức năng không cho điền tag html trong form
#+
#+ Khai bao bang du lieu
$myform->addTable($fs_table);	// Add table
#+
#+ Khai bao thong tin cac truong
// $myform->add("new_category_id", "pro_category_id", 1, 0, 0, 1, translate_text("Bạn chưa chọn danh mục"), 0, "");
$myform->add("use_mail","use_mail",0, 0,"",1,"Bạn chưa nhập Email ứng viên",0,"");
$myform->add("use_name","use_name",0, 0,"",1,"Bạn chưa nhập tên ứng viên",0,"");
$myform->add("use_phone","use_phone",0, 0,"",1,"Bạn chưa nhập số điện thoại",0,"");
$myform->add("birthday","birthday",0, 0,"",1,"Bạn chưa chọn ngày sinh",0,"");
$myform->add("gender","gender",0, 0,"",1,"Bạn chưa chọn giới tính",0,"");
$myform->add("lg_honnhan","honnhan",0, 0,"",1,"Bạn chưa chọn tình trạng hôn nhân",0,"");
$myform->add("use_city","use_city",0, 0,"",1,"Bạn chưa chọn tỉnh thành",0,"");
$myform->add("use_district","use_district",0, 0,"",1,"Bạn chưa chọn quận/huyện",0,"");
$myform->add("address","address",0, 0,"",1,"Bạn chưa nhập địa chỉ chi tiết",0,"");
$myform->add("use_job_name","use_job_name",0, 0,"",1,"Bạn chưa nhập công việc mong muốn",0,"");
$myform->add("cap_bac_mong_muon","cap_bac_mong_muon",0, 0,"",1,"Bạn chưa chọn cấp bậc",0,"");
// $myform->add("use_district_job","use_district_job",0, 0,"",1,"Vui lòng chọn địa điểm làm việc",1,"");
// $myform->add("use_nganh_nghe","use_nganh_nghe",0, 0,"",1,"Vui lòng chọn ít nhất 1 ngành nghê",1,"");
$myform->add("work_option","work_option",1, 0,"",1,"Bạn chưa chọn hình thức làm việc",0,"");
$myform->add("exp_years","exp_years",0, 0,"",1,"Bạn chưa chọn số năm kinh nghiệm",0,"");
$myform->add("salary","salary",0, 0,"",1,"Bạn chưa chọn mức lương",0,"");
$myform->add("muc_tieu_nghe_nghiep","muc_tieu_nghe_nghiep",0, 0,"",1,"Bạn chưa nhập mục tiêu làm việc",0,"");
$myform->add("ki_nang_ban_than","ki_nang_ban_than",0, 0,"",1,"Bạn chưa nhập kỹ năng bản thân",0,"");
$myform->add("use_update_time","use_update_time",0, 0,"",0,"",0,"6");
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
    if($bang_cap != '' || $truong_hoc != ''|| $tg_batdau_hoc != '' || $tg_ketthuc_hoc != ''){
        $myform1 = new generate_form();
        $myform1->removeHTML(0);
        $myform1->addTable('user_hocvan');   // Add table
        $myform1->add("bang_cap","bang_cap",0, 0,"",1,"Bạn chưa nhập bằng cấp/chứng chỉ",0,"6");
        $myform1->add("truong_hoc","truong_hoc",0, 0,"",1,"Bạn chưa nhập tên trường học",0,"6");
        $myform1->add("tg_batdau","tg_batdau_hoc",0, 0,"",1,"Bạn chưa nhập thời gian bắt đầu",0,"6");
        $myform1->add("tg_ketthuc","tg_ketthuc_hoc",0, 0,"",1,"Bạn chưa nhập thời gian kết thúc",0,"6");
        $myform1->add("chuyen_nganh","chuyen_nganh",0, 0,"",1,"Bạn chưa nhập chuyên ngành",0,"6");
        $myform1->add("xep_loai","xep_loai",0, 0,"",1,"Bạn chưa chọn xếp loại",0,"6");
        $myform1->add("thongtin_bosung","thongtin_bosung",0, 0,"",0,"",0,"6");
        $myform1->evaluate();
        $errorMsg .= $myform1->checkdata();
        $errorMsg .= $myform1->strErrorField ;
    }
    if($use_chucdanh != '' || $use_cty_lamviec != '' || $tg_batdau != '' || $tg_ketthuc != ''){
        $myform2 = new generate_form();
        $myform2->removeHTML(0);
        $myform2->addTable('use_kinhnghiem');   // Add table
        $myform2->add("use_chucdanh","use_chucdanh",0, 0,"",1,"Bạn chưa nhập Chức danh",0,"6");
        $myform2->add("use_cty_lamviec","use_cty_lamviec",0, 0,"",1,"Bạn chưa nhập tên công ty làm việc",0,"6");
        $myform2->add("tg_batdau","tg_batdau",0, 0,"",1,"Bạn chưa nhập thời gian bắt đầu",0,"6");
        $myform2->add("tg_ketthuc","tg_ketthuc",0, 0,"",1,"Bạn chưa nhập thời gian kết thúc",0,"6");
        $myform2->add("them_thongtin","them_thongtin",0, 0,"",0,"",0,"6");
        $myform2->evaluate();
        $errorMsg .= $myform2->checkdata();
        $errorMsg .= $myform2->strErrorField ;
    }
    if($id_ngonngu != '' || $chung_chi != '' || $ket_qua != ''){
        $myform3 = new generate_form();
        $myform3->removeHTML(0);
        $myform3->addTable('use_ngoaingu');   // Add table
        $myform3->add("id_ngonngu","id_ngonngu",0, 0,"",1,"Bạn chưa chọn ngôn ngữ",0,"");
        $myform3->add("chung_chi","chung_chi",0, 0,"",1,"Bạn chưa nhập chứng chỉ",0,"0");
        $myform3->add("ket_qua","ket_qua",0, 0,"",1,"Bạn chưa nhập kết quả",0,"");
        $myform3->evaluate();
        $errorMsg .= $myform3->checkdata();
        $errorMsg .= $myform3->strErrorField;
    }


   if($array_config["image"]==1){
        $upload_pic = new upload("use_logo", $fs_filepath, $extension_list, $limit_size);
        if ($upload_pic->file_name != ""){
            $picture = date("Y",time())."/".date("m",time())."/".date("d",time())."/".$upload_pic->file_name;
            resize_image($fs_filepath,$upload_pic->file_name,177,130,100,"");
            $use_logo = $upload_pic->file_name;
            $myform->add("use_logo",'use_logo',0,1,"",1,"Bạn chưa chọn Avatar",0,"");
        }
        //Check Error!
        $errorMsg .= $upload_pic->show_warning_error();
    }
    if (empty($use_nganh_nghe)) {
        $errorMsg .= "• Vui lòng chọn ít nhất 1 ngành nghề"."<br>";
    }
    if(empty($use_district_job)){
        $errorMsg .= "• Vui lòng chọn địa điểm làm việc";
    }
	if($errorMsg == ""){
      
		#+
		#+ Thuc hien query
		$db_ex	 		= new db_execute_return();
		$query			= $myform->generate_update_SQL($field_id,$record_id);
        $birthday2 = strtotime($birthday);
        $query = str_replace($birthday,$birthday2,$query);
        $db_ex->db_execute($query);
        $use_nganh_nghe = implode(',', $use_nganh_nghe);
        $use_district_job = implode(',', $use_district_job);

        $update = new db_query("UPDATE user SET use_district_job = '".$use_district_job."', use_nganh_nghe = '".$use_nganh_nghe."' WHERE use_id = ".$record_id." ");
        if($tg_batdau_hoc != ''){
            $ngaybatdau_hoc = strtotime($tg_batdau_hoc);
            $ngayketthuc_hoc = strtotime($tg_ketthuc_hoc);
            $query1 = $myform1->generate_update_SQL($field_id,$record_id);
            $query1 = str_replace($tg_batdau_hoc, $ngaybatdau_hoc, $query1);
            $query1 = str_replace($tg_ketthuc_hoc, $ngayketthuc_hoc, $query1);
            $db_ex->db_execute($query1);
        }
        
        if($tg_batdau != ''){
            $ngaybatdau = strtotime($tg_batdau);
            $ngayketthuc = strtotime($tg_ketthuc);
            $query2 = $myform2->generate_update_SQL($field_id,$record_id);
            $query2 = str_replace($tg_batdau, $ngaybatdau, $query2);
            $query2 = str_replace($tg_ketthuc, $ngayketthuc, $query2);
            $last_id2       = $db_ex->db_execute($query2);
            $update2 = new db_query("UPDATE use_kinhnghiem SET use_id = '".$last_id."' WHERE id_kinhnghiem = ".$last_id2." ");
        }
        if($id_ngonngu != ''){
            $query3 = $myform3->generate_update_SQL($field_id,$record_id);
            $last_id3       = $db_ex->db_execute($query3);
        }
        $fs_redirect    = $after_save_data. "?record_id=".$record_id."&new_category_id=".$new_category_id;
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
$db_data    = new db_query($query);

if($row_get     = mysql_fetch_assoc($db_data->result))
{
    foreach($row_get as $key=>$value)
    {
        if($key!='lang_id' && $key!='admin_id') $$key = $value;
    }
}else
{
    exit();
}

$qr = new db_query("SELECT * FROM user_hocvan WHERE use_id = ".$record_id);
if(mysql_num_rows($qr->result)>0){
    $rhv = mysql_fetch_array($qr->result);
    $bang_cap = $rhv['bang_cap'];
    $truong_hoc = $rhv['truong_hoc'];
}else{
    $bang_cap = '';
    $truong_hoc = '';
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
<?=$form->getFile("Ảnh đại diện", "use_logo", "use_logo", "Ảnh minh họa", 0, 32, "", '<font color="red">(Kích thước chuẩn 190 x 190)</font>')?>
<?=$form->text("Email ứng viên","use_mail","use_mail",$use_mail,"Email ứng viên",1,250,"",255)?>
<?=$form->text("Tên ứng viên","use_name","use_name",$use_name,"Tên ứng viên",1,250,"",255)?>
<?=$form->text("Số điện thoại","use_phone","use_phone",$use_phone,"Số điện thoại",1,250,"",255)?>
<tr>
    <td class="form_name"><font class="form_asterisk">* </font>Ngày sinh:</td>
    <td class="form_text">
        <input type="date" id="birthday" name="birthday" value="<?= date('Y-m-d',$row_get['birthday']) ?>" style="width: 250px;" />
        <input type="hidden" id="use_update_time" name="use_update_time" value="<?= time() ?>" />
    </td>
</tr>

<tr>
    <td class="form_name"><font class="form_asterisk">* </font>Giới tính:</td>
    <td class="form_text">
        <select name="gender" id="gender" class="form_control" style="width: 250px;">
			<?
            foreach ($array_gioi_tinh_tt as $key => $val) {
            ?>
            <option <?= ($row_get['gender'] == $key)?'selected':'' ?> value="<?= $key ?>"><?= $val ?></option>
            <?
            }
            ?>
        </select>
    </td>
</tr>
<tr>
    <td class="form_name"><font class="form_asterisk">* </font>Tình trạng hôn nhân:</td>
    <td class="form_text">
        <select name="honnhan" id="honnhan" class="form_control" style="width: 250px" >
            <?
            foreach ($array_hon_nhan as $key => $val) {
            ?>
            <option <?= ($row_get['lg_honnhan'] == $key)?'selected':'' ?> value="<?=$key?>"><?= $val ?></option>
            <?
            }
            ?>
        </select>
    </td>
</tr>
<tr>
    <td class="form_name"><font class="form_asterisk">* </font>Tỉnh / thành phố:</td>
    <td class="form_text">
        <select name="use_city" id="use_city" class="form_control" style="width: 250px;">
        	<option value="">Chọn thành phố</option>
			<?
			$db_qr = new db_query("SELECT cit_id, cit_name FROM city");
            While($row = mysql_fetch_array($db_qr->result)){
            ?>
            <option <?= ($row_get['use_city'] == $row['cit_id'])?"selected":""?> value="<?=$row['cit_id']?>" >
            <?
            	echo $row['cit_name'];
            ?>
           	</option>
            <?
            }
            unset($db_qr,$row);
            ?>
        </select>
    </td>
</tr>
<tr>
    <td class="form_name"><font class="form_asterisk">* </font>Quận/ huyện:</td>
    <td class="form_text">
        <select name="use_district" id="use_district" class="form_control" style="width: 250px;">
        	<option value="">Chọn quận huyện</option>
            <?
            $db_qh = new db_query("SELECT * FROM city2 WHERE cit_parent = ".$row_get['use_city']." ");
            while($rqh = mysql_fetch_array($db_qh->result)){
            ?>
            <option <?= ($row_get['use_district'] == $rqh['cit_id'])?"selected":"" ?> value="<?= $rqh['cit_id']?>"><?= $rqh['cit_name']?></option>
            <?
            }
            ?>
        </select>
    </td>
</tr>
<?=$form->textarea("Địa chỉ chi tiết","address","address",$address,"Địa chỉ chi tiết",1,250,50,"")?>
<?=$form->text("Công việc mong muốn","use_job_name","use_job_name",$use_job_name,"Công việc mong muốn",1,250,"",255)?>
<tr>
    <td class="form_name"><font class="form_asterisk">* </font>Cấp bậc:</td>
    <td class="form_text">
        <select name="cap_bac_mong_muon" id="cap_bac_mong_muon" class="form_control" style="width: 250px;">
            <?
            foreach ($array_capbac as $key => $val) {
            ?>
            <option <?= ($row_get['cap_bac_mong_muon'] == $key)?"selected":"" ?> value="<?=$key?>"><?= $val ?></option>
            <?
            }
            ?>
        </select>
    </td>
</tr>
<tr>
    <td class="form_name"><font class="form_asterisk">* </font>Địa điểm làm việc:</td>
    <td class="form_text">
        <select name="use_district_job[]" id="use_district_job" class="form_control" multiple="">
            <?
            $db_qr = new db_query("SELECT cit_id, cit_name FROM city");
            While($row = mysql_fetch_array($db_qr->result)){
            ?>
            <option
            <?
                if(!empty($use_district_job)){
                    $arr_tt = explode(',', $row_get['use_district_job']);
                    if(in_array($row['cit_id'], $arr_tt)){
                        echo "selected";
                    }
                }

            ?>
             value="<?=$row['cit_id']?>" >
            <?
                echo $row['cit_name'];
            ?>
            </option>
            <?
            }
            unset($db_qr,$row);
            ?>
        </select>
    </td>
</tr>
<tr>
    <td class="form_name"><font class="form_asterisk">* </font>Ngành nghề:</td>
    <td class="form_text">
        <select name="use_nganh_nghe[]" id="use_nganh_nghe" class="form_control" multiple="">
			<?
			$db_qr = new db_query("SELECT cat_id, cat_name FROM category");
            While($row = mysql_fetch_array($db_qr->result)){
            ?>
            <option 
            <?
                if(!empty($use_nganh_nghe)){
                    $arr_nn = explode(',', $row_get['use_nganh_nghe']);
                    if(in_array($row['cat_id'], $arr_nn)){
                        echo "selected";
                    }
                }

            ?> value="<?=$row['cat_id']?>" >
            <?
            	echo $row['cat_name'];
            ?>
           	</option>
            <?
            }
            unset($db_qr,$row);
            ?>
        </select>
    </td>
</tr>
<tr>
    <td class="form_name"><font class="form_asterisk">* </font>Mức lương:</td>
    <td class="form_text">
        <select name="salary" id="salary" class="form_control" style="width: 250px;">
            <?
            foreach ($array_muc_luong as $key => $val) {
            ?>
            <option <?= ($salary == $key)?"selected":"" ?> value="<?=$key?>"><?= $val ?></option>
            <?
            }
            ?>
        </select>
    </td>
</tr>
<tr>
    <td class="form_name"><font class="form_asterisk">* </font>Hình thức làm việc:</td>
    <td class="form_text">
        <select name="work_option" id="work_option" class="form_control" style="width: 250px;">
            <?
            foreach ($array_hinh_thuc as $key => $val) {
            ?>
            <option <?= ($work_option == $key)?"selected":"" ?> value="<?=$key?>"><?= $val ?></option>
            <?
            }
            ?>
        </select>
    </td>
</tr>
<tr>
    <td class="form_name"><font class="form_asterisk">* </font>Số năm kinh nghiệm:</td>
    <td class="form_text">
        <select name="exp_years" id="exp_years" class="form_control" style="width: 250px;">
        	<option value="">Chọn số năm kinh nghiệm</option>
			<?
            foreach ($array_kinh_nghiem as $key => $val) {
            ?>
			<option <?= ($exp_years == $key)?"selected":"" ?> value="<?=$key?>"><?= $val ?></option>
            <?
            }
            ?>
        </select>
    </td>
</tr>





<?=$form->textarea("Mục tiêu làm việc","muc_tieu_nghe_nghiep","muc_tieu_nghe_nghiep",$muc_tieu_nghe_nghiep,"Mục tiêu làm việc",1,500,120,"")?>
<?=$form->textarea("Kỹ năng bản thân","ki_nang_ban_than","ki_nang_ban_than",$ki_nang_ban_than,"Kỹ năng bản thân",1,500,120,"")?>
<?=$form->text("Bằng cấp chứng chỉ","bang_cap","bang_cap",$bang_cap,"Bằng cấp, chứng chỉ",0,250,"",255)?>
<?=$form->text("Trường học ","truong_hoc","truong_hoc",$truong_hoc,"Trường học",0,250,"",255)?>
<tr>
    <td class="form_name">Ngày bắt đầu học:</td>
    <td class="form_text">
        <input type="date" id="tg_batdau" name="tg_batdau_hoc" value="<?= ($tg_batdau_hoc != '')?$tg_batdau_hoc:"" ?>" style="width: 250px;"/>
    </td>
</tr>
<tr>
    <td class="form_name">Ngày kết thúc học:</td>
    <td class="form_text">
        <input type="date" id="tg_ketthuc" name="tg_ketthuc_hoc" value="<?= ($tg_ketthuc_hoc != '')?$tg_ketthuc_hoc:"" ?>" style="width: 250px;"/>
    </td>
</tr>
<?=$form->text("Chuyên ngành ","chuyen_nganh","chuyen_nganh",$chuyen_nganh,"Chuyên ngành",0,250,"",255)?>
<tr>
    <td class="form_name">Xếp loại:</td>
    <td class="form_text">
        <select name="xep_loai" id="xep_loai" class="form_control" style="width: 250px;">
            <?
            foreach ($array_xl as $key => $val) {
            ?>
            <option <?= ($xep_loai == $key)?"selected":"" ?> value="<?=$key?>"><?= $val ?></option>
            <?
            }
            ?>
        </select>
    </td>
</tr>
<?=$form->textarea("Thông tin bổ sung ( Bằng cấp )","thongtin_bosung","thongtin_bosung",$thongtin_bosung,"Thông tin bổ sung",0,500,120,"")?>
<?=$form->text("Chức danh/vị trí ","use_chucdanh","use_chucdanh",$use_chucdanh,"Chức danh / Vị trí",0,250,"",255)?>
<?=$form->text("Công ty ","use_cty_lamviec","use_cty_lamviec",$use_cty_lamviec,"Công ty làm việc",0,250,"",255)?>
<tr>
    <td class="form_name">Ngày bắt đầu:</td>
    <td class="form_text">
        <input type="date" id="tg_batdau" name="tg_batdau" value="<?= ($tg_batdau != '')?$tg_batdau:"" ?>" style="width: 250px;"/>
    </td>
</tr>
<tr>
    <td class="form_name">Ngày kết thúc:</td>
    <td class="form_text">
        <input type="date" id="tg_ketthuc" name="tg_ketthuc" value="<?= ($tg_ketthuc != '')?$tg_ketthuc:"" ?>" style="width: 250px;"/>
    </td>
</tr>
<?=$form->textarea("Thêm thông tin ( Kinh nghiệm làm việc )","them_thongtin","them_thongtin",$them_thongtin,"Thêm thông tin",0,500,120,"")?>
<tr>
    <td class="form_name">Chọn ngôn ngữ:</td>
    <td class="form_text">
        <select name="id_ngonngu" id="id_ngonngu" class="form_control" style="width: 250px;">
            <?
            foreach ($array_ngon_ngu as $key => $val) {
            ?>
            <option <?= ($id_ngonngu == $key)?"selected":"" ?> value="<?=$key?>"><?= $val ?></option>
            <?
            }
            ?>
        </select>
    </td>
</tr>
<?=$form->text("Chứng chỉ ","chung_chi","chung_chi",$chung_chi,"Chứng chỉ",0,250,"",255)?>
<?=$form->text("Số điểm ","ket_qua","ket_qua",$ket_qua,"Kết quả",0,250,"",255)?>
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
    $("#use_nganh_nghe").select2({
    	width:'50%',
    	maximumSelectionLength: 3,
    	placeholder: "Chọn tối đa 3 ngành nghề*"
    });
	$("#use_district_job").select2({
		width:'50%',
		maximumSelectionLength: 3,
		placeholder: "Chọn tối đa 3 tỉnh thành*"
	});
    $('#use_city').select2({
        width:'250px'
    });

	$("#new_url_lq").on("select2:select", function (evt) {
	  var element = evt.params.data.element;
	  var $element = $(element);
	  
	  $element.detach();
	  $(this).append($element);
	  $(this).trigger("change");
	});

	$('#use_city').change(function(){
		var id = $(this).val();

		$.ajax({
			type: "POST",
			url: "../../../ajax/get_quanhuyen.php",
			data:{
				id: id
			},
			success:function(data){
				$('#use_district').html(data);
			}
		});
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