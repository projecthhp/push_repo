<?
include("config.php");
if(isset($_COOKIE['UID']) && $_SERVER['REQUEST_METHOD'] == 'POST')
{
   $chucdanh   = getValue("job_title","str","POST","");
   $chucdanh   = replaceMQ($chucdanh);
   $capbac     = getValue("name_cap_bac","int","POST",0);
   $capbac     = (int)$capbac;
   $nganhnghe  = getValue("name_nganh_nghe","int","POST",0);
   $nganhnghe  = (int)$nganhnghe;
   $diadiem    = getValue("name_dia_diem","int","POST",0);
   $diadiem    = (int)$diadiem;
   $mucluong   = getValue("name_muc_luong","int","POST",0);
   $mucluong   = (int)$mucluong;
   $mota       = getValue("job_description","str","POST","");
   $mota       = replaceMQ($mota);
   $yeucau     = getValue("job_requirements","str","POST","");
   $yeucau     = replaceMQ($yeucau);
   $hannop     = getValue("name_han_nop","str","POST","");
   $hannop     = replaceMQ($hannop);
   $hannop     = strtotime($hannop);
   $time       = time();
   $name_ct    = getValue("profile_name","str","POST","");
   $name_ct    = replaceMQ($name_ct);
   $quymo_ct   = getValue("name_quy_mo","int","POST",0);
   $quymo_ct   = (int)$quymo_ct;
   $address_ct = getValue("profile_address","str","POST","");
   $address_ct = replaceMQ($address_ct);
   $info_ct    = getValue("profile_profile","str","POST","");
   $info_ct    = replaceMQ($info_ct);
   if($name_ct != '' && $info_ct != '')
   {
      $db_ud  = new db_execute("UPDATE user_company SET usc_company = '".$name_ct."',usc_size = '".$quymo_ct."',usc_address = '".$address_ct."' WHERE usc_id = ".$_COOKIE['UID']);
      $db_ud1 = new db_execute("UPDATE user_company_multi SET usc_company_info = '".$info_ct."' WHERE usc_id = ".$_COOKIE['UID']);
   }
   if($chucdanh != '' && $capbac != 0 &&$nganhnghe != 0 && $diadiem != 0 && $mucluong != 0 && $mota != '' && $yeucau != '')
   {
      $query = "INSERT INTO new(new_title,new_rewrite,new_cat_id,new_city,new_money,new_cap_bac,new_user_id,new_create_time,new_active,new_type,new_han_nop) 
                VALUES('".$chucdanh."','".$chucdanh."','".$nganhnghe."','".$diadiem."','".$mucluong."','".$capbac."','".$_COOKIE['UID']."','".$time."','0','1','".$hannop."')";
      $db_ex = new db_execute_return();
      $last_id = $db_ex->db_execute($query);
      $db_exciu = new db_execute("INSERT INTO new_multi(new_id,new_mota,new_yeucau) VALUES('".$last_id."','".$mota."','".$yeucau."')");


      //gen qr
      $new_id = $last_id;
      $new_title = $chucdanh;
      $new_user_id = $_COOKIE['UID'];
      if (isset($new_id) && isset($new_title) && isset($new_user_id)) {
          $alas = replaceTitle($new_title);
          $alas = substr($alas, 0, 55);
          $url_new =  "https://timviec365.com/" . $alas . "-" . $new_id . ".html";
          // $text variable has data for QR  
          $text = $url_new;
      
          // $path variable store the location where to  
          // store image and $file creates directory name 
          // of the QR code file by using 'uniqid' 
          // uniqid creates unique id based on microtime 
          $img_qr = "../upload/qr/new/ntd_" . $new_user_id . "/" . $new_id . ".png";
          $path = "../upload/qr/new/ntd_" . $new_user_id . "/";
          if (!file_exists($path)) {
              is_dir($path) || @mkdir($path, 0777, true) || die("Can't Create folder");
          }
          if (file_exists($img_qr)) {
              return json_encode($result);
          }
          $file = $path . $new_id . ".png";
          curl_download('http://vieclamketoan365.com/api_qr/gen_qr/index.php', $text, $file);
      }

      //Start the session
      session_start();
      //Dump your POST variables
      $_SESSION['NEWID'] = $last_id;
      redirect("/nha-tuyen-dung/thanh-cong");
      
   }
}
else
{
   redirect("/dang-nhap/nha-tuyen-dung.html");
}

function curl_download($Url, $new_title, $saveTo)
{
    // Mở một file mới với đường dẫn và tên file là tham số $saveTo
    $fp = fopen ($saveTo, 'w+');
     
    // Bắt đầu CURl
    $ch = curl_init($Url);
     
    // Thiết lập giả lập trình duyệt
    // nghĩa là giả mạo đang gửi từ trình duyệt nào đó, ở đây tôi dùng Firefox
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0");

    curl_setopt($ch, CURLOPT_POST, 1);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
        'new_title' => $new_title,
    )));
     
    // Thiết lập trả kết quả về chứ không print ra
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  
    // Thời gian timeout
    curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
     
    // Lưu kết quả vào file vừa mở
    curl_setopt($ch, CURLOPT_FILE, $fp);
     
    // Thực hiện download file
    $result = curl_exec($ch);
     
    // Đóng CURL
    curl_close($ch);
     
    return $result;
}

function replaceTitle($title){
    $title  = remove_accent($title);
    $title = str_replace('/', '',$title);
    $title = preg_replace('/[^\00-\255]+/u', '', $title);
  
    $title = html_entity_decode($title, ENT_COMPAT, 'UTF-8');
    if (preg_match("/[\p{Han}]/simu", $title)) {
        $title = str_replace(' ', '-', $title);
    }else{
      $arr_str  = array( "&lt;","&gt;","/"," / ","\\","&apos;", "&quot;","&amp;","lt;", "gt;","apos;", "quot;","amp;","&lt", "&gt","&apos", "&quot","&amp","&#34;","&#39;","&#38;","&#60;","&#62;");
  
      $title  = str_replace($arr_str, " ", $title);
      $title  = preg_replace('/\p{P}|\p{S}/u', ' ', $title);
      $title = preg_replace('/[^0-9a-zA-Z\s]+/', ' ', $title);
  
      //Remove double space
      $array = array(
        '    ' => ' ',
        '   ' => ' ',
        '  ' => ' ',
      );
      $title = trim(strtr($title, $array));
      $title  = str_replace(" ", "-", $title);
      $title  = urlencode($title);
      // remove cac ky tu dac biet sau khi urlencode
      $array_apter = array("%0D%0A","%","&");
      $title  = str_replace($array_apter,"-",$title);
      $title  = strtolower($title);
    }
    return $title;
  }

  //Loại bỏ dấu
function remove_accent($mystring){
	$marTViet=array(
	"à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă","ằ","ắ","ặ","ẳ","ẵ",
	"è","é","ẹ","ẻ","ẽ","ê","ề","ế","ệ","ể","ễ",
	"ì","í","ị","ỉ","ĩ",
	"ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ","ờ","ớ","ợ","ở","ỡ",
	"ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
	"ỳ","ý","ỵ","ỷ","ỹ",
	"đ",
	"À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă","Ằ","Ắ","Ặ","Ẳ","Ẵ",
	"È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
	"Ì","Í","Ị","Ỉ","Ĩ",
	"Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ","Ờ","Ớ","Ợ","Ở","Ỡ",
	"Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
	"Ỳ","Ý","Ỵ","Ỷ","Ỹ",
	"Đ",
	"'");
	
	$marKoDau=array(
	"a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a",
	"e","e","e","e","e","e","e","e","e","e","e",
	"i","i","i","i","i",
	"o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o",
	"u","u","u","u","u","u","u","u","u","u","u",
	"y","y","y","y","y",
	"d",
	"A","A","A","A","A","A","A","A","A","A","A","A","A","A","A","A","A",
	"E","E","E","E","E","E","E","E","E","E","E",
	"I","I","I","I","I",
	"O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O",
	"U","U","U","U","U","U","U","U","U","U","U",
	"Y","Y","Y","Y","Y",
	"D",
	"");
	
	return str_replace($marTViet,$marKoDau,$mystring);
}
?>