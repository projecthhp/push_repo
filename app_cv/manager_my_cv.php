<?
include("../home/config.php");
header("Content-Type:application/json");
//Url mẫu https://timviec365.vn/service/detail_ungvien.php?id$id_user=123
$id_user = getValue("id_user","int","POST",0);
$id_user = (int)$id_user;
if($id_user != 0)
{
   $result = array();
   $qr_cv = new db_query('SELECT savecandicv.id,iduser,idcv,image,name,alias,name_cv,html,cv,timeedit FROM savecandicv JOIN samplecv ON savecandicv.idcv = samplecv.id WHERE iduser=' . $id_user . ' ORDER BY timeedit DESC, id DESC');
   if (mysql_num_rows($qr_cv->result) > 0) {

      $ar_cv = array();
      foreach ($qr_cv->result_array() as $ob) {
         $cv = (object)$ob;
         // var_dump($ob);
         $r = array();
         $html = json_decode($cv->html);
         $tit_cv = $html->cv_title;
         if (file_exists('../upload/cv_uv/uv_' . $cv->iduser . '/' . $cv->name_cv)) {
            $exit = 1;
            $image = 'upload/cv_uv/uv_' . $cv->iduser . '/' . $cv->name_cv;
         } else {
            $image = 'upload/cv/' . $cv->alias . '/' . $cv->image;
         }
         $r["id"] = $cv->id;
         $r["cvid"] = $cv->idcv;
         switch ($cv->lang) {
            case 1:
               $lang = 'vi';
               break;
            case 2:
               $lang = 'en';
               break;
            case 4:
               $lang = 'cn';
               break;
            case 3:
               $lang = 'jp';
               break;
            case 5:
               $lang = 'kr';
               break;
            default:
               $lang = 'vi';
               break;
         }
         $r["lang"] = $lang;
         $r["tit_cv"] = $tit_cv;
         $r["image"] = 'https://timviec365.com/' . $image;
         $r["name"] = $cv->name;
         $r["alias"] = $cv->alias;
         $r["name_cv"] = $cv->name_cv;
         $r["time_edit"] = $cv->timeedit;
         $r["cv"] = $cv->cv;
         $ar_cv[] = $r;
      }
      $result=$ar_cv;
      echo json_encode($result);
   } else {
      echo "Sai thông tin tài khoản hoặc mật khẩu";
   }
}
else
{
    echo "Ứng viên này không tồn tại trên hệ thống!";
}
