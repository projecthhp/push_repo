<?
include("../home/config.php");
header("Content-Type:application/json");
//Url mẫu https://timviec365.vn/service/detail_ungvien.php?id_use$id_use=123
$id_use = getValue("id_use", "int", "GET", 0);
$id_use = (int) $id_use;
$id_cv = getValue("id_cv", "int", "GET", 0);
$id_cv = (int) $id_cv;
$id_lang = getValue("id_lang", "str", "GET", "");
if ($id_cv != 0) {

   $dbgetcv = new db_query("SELECT * FROM samplecv WHERE id = " . $id_cv);
   $rowcv = mysql_fetch_object($dbgetcv->result);
   $fonts = array('Roboto', 'Tahoma', 'Arial', 'sun-exta');
   $sizes = array('small', 'normal', 'large');
   $font_spacing = array('small', 'normal', 'large');
   $color = explode(',', $rowcv->codecolor); 

   //update view count
   $db_update_view = new db_query("UPDATE samplecv SET view = ". ($rowcv->view + 1) ." WHERE id = " . $id_cv);

   $db_qr = new db_query("SELECT * FROM savecandicv WHERE iduser = '" . $id_use . "' AND idcv = " . $id_cv);

   if (mysql_num_rows($db_qr->result) > 0) {
      $item_ur = mysql_fetch_object($db_qr->result);
      switch ($item_ur->lang) {
         case 1:
            $item_ur->lang = 'vi';
            break;
         case 2:
            $item_ur->lang = 'en';
            break;
         case 4:
            $item_ur->lang = 'cn';
            break;
         case 3:
            $item_ur->lang = 'jp';
            break;
         case 5:
            $item_ur->lang = 'kr';
            break;
         default:
            $item_ur->lang = 'vi';
            break;
      }
      if ($id_lang != $item_ur->lang) {
         // echo "a5"; 	
         $lang = 'htmlcss_' . $id_lang;
         $cv = json_decode($rowcv->$lang);
         $data['lang'] = $id_lang;
      } else {
         // echo "a6"; 	
         $cv = json_decode($item_ur->html);
         $data['lang'] = $item_ur->lang;
      }				
   } else {
   
      // var_dump($rowcv);
      $idcv     = $rowcv->id;
      $namecv   = $rowcv->alias;
      $langcv   = $rowcv->idlang;
      $codecolor = $rowcv->codecolor;
      $cv_title = $rowcv->name;
      // if ($id_lang == "en") {
      //    $cv = json_decode($rowcv->htmlcss_en);
      // } elseif ($id_lang == "jp") {
      //    $cv = json_decode($rowcv->htmlcss_jp);
      // } elseif ($id_lang == "cn") {
      //    $cv = json_decode($rowcv['htmlcss_cn']);
      // } elseif ($id_lang == "kr") {
      //    $cv = json_decode($rowcv['htmlcss_kr']);
      // } else {
      //    $cv = json_decode($rowcv['htmlcss_vi']);
      // }
      $data['lang'] = $id_lang;
      $lang = 'htmlcss_'.$id_lang;
      $cv = json_decode($rowcv->$lang);

      //update download count
      $db_update_view = new db_query("UPDATE samplecv SET download = ". ($rowcv->download + 1) ." WHERE id = " . $id_cv);
   }

   $db_user_info = new db_query("SELECT * FROM user WHERE use_id = " . $id_use);
   if (mysql_num_rows($db_user_info->result) > 0) {
      //Nếu đã có tk
      $row_user_info = mysql_fetch_assoc($db_user_info->result);
      $fullname = $row_user_info["use_name"];
      $phone = $row_user_info["use_phone"];
      $email = $row_user_info["use_mail"];
      $address = $row_user_info["address"];
      $birthday = $row_user_info["birthday"];
   } else {
      $fullname = '';
      $phone = '';
      $email = '';
      $address = '';
      $birthday = '';
   }


   $data['avatar'] = $cv->avatar; 
   $data['fullname'] = $fullname;
   $data['email'] = $email;
   $data['mobile'] = $phone;
   $data['cv_title'] = $cv->cv_title;
   $data['position'] = $cv->position;
   $data['introduction'] = $cv->introduction;
   $data['color_active'] = $cv->css->color;
   $data['font_active'] = $cv->css->font;
   $data['font_size_active'] = $cv->css->font_size;
   $data['font_spacing_active'] = $cv->css->font_spacing;
   $data['cvid'] = strval($id_cv);

   if (isset($item_ur) && $item_ur->lang == $id_lang) {
      // echo "a8"; 	
      //tao cv da co trong tbl_cv_ungvien
      $data['item'] = json_decode($item_ur->html);
   } else {
      $cv_content = json_decode($rowcv->$lang);
      // var_dump($cv_content);
      $cv_content->name = $fullname;
      // var_dump($cv_content->menu);
      if (isset($cv_content->menu)) {
         foreach ($cv_content->menu as $menu) {
            // var_dump($menu->content->content);
            if ($menu->content->content->type == 'profile') {
               // echo "123";
               $menu->content->content->content->email = $email;
               $menu->content->content->content->phone = $phone;
               $menu->content->content->content->address = $address;
               // $menu->content->content->content->sex = $user->sex;
               $menu->content->content->content->birthday = date("d/m/Y", strtotime($birthday));
            }
         }
      }
      // echo "a9"; 	
      $data['item'] = $cv_content;
   }
   // $data['item_ur']=$item_ur;			
   $data['color'] = $color;
   $data['fonts'] = $fonts;
   $data['sizes'] = $sizes;
   $data['font_spacing'] = $font_spacing;
   $data['lang_id'] = $rowcv->idlang;
   $data['alias'] = $rowcv->alias;
   echo str_replace('\t', '', json_encode($data));
} else {
   echo "CV không tồn tại!";
}
