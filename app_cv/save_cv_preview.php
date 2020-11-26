<?
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
include("../home/config.php");
$id_device = getValue("id_device","str","POST","");
$id_lang = getValue("id_lang","str","POST","");
$data_cv = getValue("data_cv","str","POST","");
$name_img = getValue("name_img","str","POST","");
$name_device = getValue("name_device","str","POST","");
if($id_device != "")
{   
   if($data_cv != "" && $id_lang != "") {
      if ($name_img != '/images/no_avatar.jpg') {
         if (!is_dir('../upload/ungvien_app/uv_' . $id_device)) {
            mkdir('../upload/ungvien_app/uv_' . $id_device, 0775, TRUE);
         }
         $new = '../upload/ungvien_app/uv_' . $id_device . '/' . end(explode('/', $name_img));
         if (!file_exists($new)) {
            sleep(2);
         }
         copy($name_img, $new);
         $files = glob('tmp/*');
         foreach ($files as $file) {
            if (is_file($file) && $file == $name_img)
               unlink($file);
         }
         $name_img = $new;
         $link_img = json_decode($data_cv)->avatar;
         $data_cv = str_replace($link_img, $new, $data_cv);
      }
      $result = array('data' => 0, 'code' => 000000, 'kq' => false);
      $query = "SELECT id from tbl_cv_preview WHERE id ='" . $id_device . "'";
      $db_qr = new db_query($query);
      $time_create = time();
      if (mysql_num_rows($db_qr->result) > 0) {
         $raw_json_string = json_encode($data_cv, JSON_UNESCAPED_UNICODE);
         $json_string = str_replace("\n","<br>",$raw_json_string);
         $qr_update = "UPDATE `tbl_cv_preview` SET `lang` = '" . $id_lang . "', `html` = " . $json_string . ", `time_update` = " . $time_create . " WHERE id = '" . $id_device . "'";
         $update = new db_query($qr_update);
         $result = ['kq' => true, 'data' => 1, 'code' => 1];
      } else {
         // var_dump(json_decode($data_cv));
         $raw_json_string = json_encode($data_cv, JSON_UNESCAPED_UNICODE);
         $json_string = str_replace("\n","<br>",$raw_json_string);
         $qr_insert = "INSERT INTO tbl_cv_preview(id,lang,html,name_img,time_update,name_device)VALUES('" . $id_device . "','" . $id_lang . "',$json_string,'" . $name_img . "',$time_create,'" . $name_device . "')";
         $insert = new db_query($qr_insert);
         $result = ['kq' => true, 'data' => 0, 'code' => 1];
      }
      echo json_encode($result);
   }
   else
   {
      echo "Vui lòng nhập đủ dữ liệu!";
   }   
}
else
{
   echo "Không thể lấy id thiết bị!";
}
?>