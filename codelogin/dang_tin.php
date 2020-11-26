<?
session_start();
include('../home/config.php');
include('../includes/inc_tukhoann.php');
if (isset($_COOKIE['UID'])) {
	$id_ntd = $_COOKIE['UID'];
} else {
	redirect('dang-nhap-nha-tuyen-dung.html');
}
if (isset($_POST['Submit'])) {
	
	$new_title = getValue("new_title", "str", "POST", "");
	$new_title = replaceMQ($new_title);

	$new_cat_id = getValue("new_cat_id", "str", "POST", "");
	$new_tag = getValue('new_tag','str','POST','');
	
	$new_cap_bac = getValue("new_cap_bac", "int", "POST", "");
	$new_cap_bac = replaceMQ($new_cap_bac);
	
	$new_hinh_thuc = getValue("new_hinh_thuc", "int", "POST", "");
	$new_hinh_thuc = replaceMQ($new_hinh_thuc);

	$new_money = getValue("new_money", "int", "POST", "");
	$new_money = replaceMQ($new_money);

	$new_exp = getValue("new_exp", "int", "POST", "");
	$new_exp = replaceMQ($new_exp);

	$new_bang_cap = getValue("new_bang_cap", "int", "POST", "");
	$new_bang_cap = replaceMQ($new_bang_cap);

	$new_city = getValue("new_city", "str", "POST", "");
	$new_qh_id = getValue('new_qh_id','str','POST','');

	$new_so_luong = getValue("new_so_luong", "int", "POST", "");
	$new_so_luong = replaceMQ($new_so_luong);
	
	$new_gioi_tinh = getValue("new_gioi_tinh", "int", "POST", "");
	$new_gioi_tinh = replaceMQ($new_gioi_tinh);

	$new_mota = getValue("new_mota", "str", "POST", "");
	$new_mota = replaceMQ($new_mota);

	$new_yeucau = getValue("new_yeucau", "str", "POST", "");
	$new_yeucau = replaceMQ($new_yeucau);

	$new_quyenloi = getValue("new_quyenloi", "str", "POST", "");
	$new_quyenloi = replaceMQ($new_quyenloi);

	$new_ho_so = getValue("new_ho_so", "str", "POST", "");
	$new_ho_so = replaceMQ($new_ho_so);

	$new_han_nop = getValue("new_han_nop", "str", "POST", "");
	$new_han_nop = replaceMQ($new_han_nop);
	$new_han_nop = strtotime($new_han_nop);

	$new_usercontact = getValue('new_usercontact', 'str', 'POST', '');
	$new_addcontact = getValue('new_addcontact', 'str', 'POST', '');
	$new_phonecontact = getValue('new_phonecontact', 'str', 'POST', '');
	$new_emailcontact = getValue('new_emailcontact', 'str', 'POST', '');
	
	$new_thuc = getValue('new_thuc','str','POST','');
	$new_hoahong = getValue('new_hoahong','str','POST','');
	$new_thuviec = getValue('new_thuviec','str','POST','');

	$new_real_cate = [];
	foreach ($array_tukhoann as $key => $value) {
		foreach ($value['arr'] as $key => $val) {
			if((string)strpos(mb_strtolower($new_title,'UTF-8'),mb_strtolower($val,'UTF-8')) != '' || (replaceTitle(mb_strtolower($new_title,'UTF-8')) == replaceTitle(mb_strtolower($val,'UTF-8')))) {
				$arr_cate = explode(',', $new_cat_id);
				if(!in_array($value['id'], $arr_cate)){
					$new_real_cate[] = $value['id'];
				}
			}
		}
	}
	
	if(count($new_real_cate) == 0){
		$new_real_cate[] = $new_cat_id;
	}
	$new_real_cate = array_unique($new_real_cate);
	$new_real_cate = implode(',', $new_real_cate);

	if($new_mota === $new_quyenloi || $new_mota === $new_yeucau || $new_quyenloi === $new_yeucau){
		$new_thuc = 0;
	}
	$db_count = new db_query("SELECT count(*) FROM new WHERE new_user_id = ".$id_ntd);
	$row_count = mysql_fetch_assoc($db_count->result);
	$count = $row_count['count(*)'];
	if($count == 0){
		$dbUpdate = new db_query("UPDATE user_company SET usc_index = 1 WHERE usc_id = ".$id_ntd);
	}
	$data = [
		'new_title' 		=> $new_title,
		'new_alias' 		=> replaceTitle($new_title),
		'new_md5'			=> '',
		'new_cat_id'		=> $new_cat_id,
		'new_city'			=> $new_city,
		'new_qh_id'			=> $new_qh_id,
		'new_money'			=> $new_money,
		'new_cap_bac'		=> $new_cap_bac,
		'new_exp'			=> $new_exp,
		'new_bang_cap'		=> $new_bang_cap,
		'new_gioi_tinh'		=> $new_gioi_tinh,
		'new_so_luong'		=> $new_so_luong,
		'new_hinh_thuc' 	=> $new_hinh_thuc,
		'new_user_id'		=> $id_ntd,
		'new_create_time' 	=> time(),
		'new_update_time'	=> time(),
		'new_han_nop'		=> $new_han_nop,
		'new_usercontact'	=> $new_usercontact,
		'new_addcontact'	=> $new_addcontact,
		'new_phonecontact'	=> $new_phonecontact,
		'new_emailcontact'	=> $new_emailcontact,
		'new_hoahong'		=> $new_hoahong,
		'new_thuviec'		=> $new_thuviec,
		'new_real_cate'		=> $new_real_cate,
		'new_thuc'			=> $new_thuc,
		'new_index'			=> 0,
		'new_tag'			=> $new_tag
	];
	add('new',$data);
	$last_id = mysql_insert_id();
	$data2 = [
		'new_id' => $last_id,
		'new_mota'	=> $new_mota,
		'new_yeucau' => $new_yeucau,
		'new_quyenloi'	=> $new_quyenloi,
		'new_ho_so'	=> $new_ho_so
	];
	add('new_multi',$data2);
	$_SESSION['success'] = 1;
	//gen qr
	$new_id = $last_id;
	$new_title = $new_title;
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
		$file = $path . $new_id . ".png";
		curl_download('http://vieclamketoan365.com/api_qr/gen_qr/index.php', $text, $file);
	}

	$data_result = [
		'result' => true,
		'redirect' => '/dang-tin-thanh-cong.html'
	];
	echo json_encode($data_result);
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
		'site' => 'timviec365.com'
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
?>