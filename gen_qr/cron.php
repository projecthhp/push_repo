<?php
// Enabling error reporting
error_reporting(-1);
ini_set('display_errors', 'On');

include("db.php");
$last_time = time();
// echo $time_create;
// die();
$sql_select_last_id = "SELECT new_id FROM qr_cron ORDER BY qr_id DESC LIMIT 1";
// var_dump($conn->query($sql_select_last_id));
$last_id = $conn->query($sql_select_last_id)->fetch_assoc()['new_id'];
// echo 'lastid: '.$last_id;
if ($last_id == null) {
    $last_id = 0;
}
$sql_select_time = "SELECT new_id,new_title,new_user_id FROM new WHERE new_id > " . $last_id . " AND new_han_nop > " . $last_time . " ORDER BY new_id ASC LIMIT 3000";
$result = $conn->query($sql_select_time);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $new_id = $row['new_id'];
        $new_title = $row['new_title'];
        $new_user_id = $row['new_user_id'];
        $alas = replaceTitle($new_title);
        $alas = substr($alas, 0, 55);
        $url_new =  "https://timviec365.com/" . $alas . "-" . $new_id . ".html";
        $sqlInsert = "INSERT INTO qr_cron(new_id,new_user_id,url_new,qr_create_time) VALUES ('" . $new_id . "'," . $new_user_id . ",'" . $url_new . "'," . $last_time . ")";
        // echo $sqlInsert;
        // die();
        if ($conn->query($sqlInsert) === TRUE) {
            //            echo "New record created successfully";
        } else {
            echo "Error: " . $sqlInsert . "<br>" . $conn->error;
        }
    }
    echo "Có ".$result->num_rows." tin tuyển dụng được cập nhật";
} else {
    echo "Không có tin tuyển dụng mới";
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