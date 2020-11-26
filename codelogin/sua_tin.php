<?
include('../home/config.php');
include('../includes/inc_tukhoann.php');
	if(isset($_COOKIE["UID"]) && $_COOKIE['UT'] == 1){
		$id_ntd = $_COOKIE['UID'];
	}
	else{
		redirect('/dang-nhap-nha-tuyen-dung.html');
	}
	if(isset($_POST['Submit']) && isset($_GET['new_id'])){
		$new_id = getValue('new_id','int','GET',0);
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

		$db_qrs = new db_query("SELECT max(new_update_time) as max FROM new WHERE new_user_id = ".$_COOKIE['UID']);
		$row = mysql_fetch_array($db_qrs->result);
		$max = $row['max'];

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
		
		if($max + 3600 < time()) $data['new_update_time'] = time();

		$condition = ['new_id'=>$new_id];
		$data2 = [
			'new_mota'	=> $new_mota,
			'new_yeucau' => $new_yeucau,
			'new_quyenloi'	=> $new_quyenloi,
			'new_ho_so'	=> $new_ho_so
		];
		var_dump($data);
		die;
		update('new',$data,$condition);
		update('new_multi',$data2,$condition);
		$data_result = [
			'result' => true,
			'redirect' => '/nha-tuyen-dung/tin-da-dang.html'
		];
		echo json_encode($data_result);	
	}
?>