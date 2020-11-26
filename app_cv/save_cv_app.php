<?
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
include("../home/config.php");
$id_user = getValue("id_user", "int", "POST", 0);
$id_user = (int) $id_user;
$id_cv = getValue("id_cv", "int", "POST", 0);
$id_cv = (int) $id_cv;
$id_lang = getValue("id_lang", "str", "POST", "");
$data_cv = getValue("data_cv", "str", "POST", "");
$name_img = getValue("name_img", "str", "POST", "");
$password = getValue("password", "str", "POST", "");
$password = replaceMQ($password);
$password = md5($password);
if($id_user != 0 && $id_cv != 0 && $password != "")
{
   switch ($id_lang) {
      case 'vi':
         $id_lang = 1;
         break;
      case 'en':
         $id_lang = 2;
         break;
      case 'jp':
         $id_lang = 3;
         break;
      case 'cn':
         $id_lang = 4;
         break;
      case 'kr':
         $id_lang = 5;
         break;
      default:
         $id_lang = 1;
         break;
   }
   $db_qr = new db_query("SELECT use_id FROM user WHERE use_id = '" . $id_user . "' AND use_pass  = '" . $password . "'");
   if (mysql_num_rows($db_qr->result) > 0) {
      if ($data_cv != "" && $id_lang != "") {
         if ($name_img != '/images/no_avatar.jpg') {
            if (!is_dir('../upload/ungvien_app/uv_' . $id_user)) {
               mkdir('../upload/ungvien_app/uv_' . $id_user, 0775, TRUE);
            }
            $new = '../upload/ungvien_app/uv_' . $id_user . '/' . end(explode('/', $name_img));
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
         $query = "SELECT id from savecandicv WHERE iduser =" . $id_user. " AND idcv=" . $id_cv;
         $db_qr = new db_query($query);
         $time_create = time();
         if (mysql_num_rows($db_qr->result) > 0) {
            $raw_json_string = json_encode($data_cv, JSON_UNESCAPED_UNICODE);
            $json_string = str_replace("\n","<br>",$raw_json_string);
            $qr_update = "UPDATE `savecandicv` SET `lang` = '" . $id_lang . "', `html` = " . $json_string . ", `timeedit` = " . $time_create . " WHERE iduser = '" . $id_user . "' AND idcv = '". $id_cv . "'";;
            $update = new db_query($qr_update);
            $result = ['kq' => true, 'data' => 1, 'code' => 1];
         } else {
            // var_dump(json_decode($data_cv));
            // $json_string = json_encode($data_cv, JSON_UNESCAPED_UNICODE);
            $raw_json_string = json_encode($data_cv, JSON_UNESCAPED_UNICODE);
            $json_string = str_replace("\n","<br>",$raw_json_string);
            $qr_insert = "INSERT INTO savecandicv(iduser,idcv,lang,html,nameimg,status,cv,timeedit,createdate)VALUES('" . $id_user . "','" . $id_cv . "','" . $id_lang . "',$json_string,'" . $name_img . "',2,0,$time_create,'" . $time_create . "')";
            $insert = new db_query($qr_insert);
            $result = ['kq' => true, 'data' => 0, 'code' => 1];
         }
         echo json_encode($result);
      } else {
         echo "Vui lòng nhập đủ dữ liệu!";
      }
   } else {
      echo "Sai tài khoản hoặc mật khẩu";
      die;
   } 
}
else
{
   echo "Thông tin chưa đầy đủ!";
}
?>