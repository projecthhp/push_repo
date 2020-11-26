<?
	require_once('../home/config.php');

	$bccc = getValue("bccc",'str','POST','');
	$bccc = replaceMQ($bccc);
	$school_name = getValue('school_name','str','POST','');
	$school_name = replaceMQ($school_name);
	$start_times = getValue("start_times","str","POST","");
	$start_times = strtotime($start_times);
	$end_times = getValue("end_times","str","POST","");
	$end_times = strtotime($end_times);
	$majors = getValue("majors","str","POST","");
	$majors = replaceMQ($majors);
	$ranks = getValue("ranks","int","POST","");
	$ranks = replaceMQ($ranks);
	$hv_add_infor = getValue("hv_add_infor","str","POST","");
	$hv_add_infor = replaceMQ($hv_add_infor);
	$data = [
		'use_id' 			=> $_COOKIE["UID"],
		'truong_hoc' 		=> $school_name,
		'bang_cap' 			=> $bccc,
		'tg_batdau' 		=> $start_times,
		'tg_ketthuc' 		=> $end_times,
		'chuyen_nganh'		=> $majors,
		'xep_loai'		 	=> $ranks,
		'thongtin_bosung' 	=> $hv_add_infor
	];

	add('user_hocvan',$data);
	unset($data);

	$data = [
		'use_update_time' => time(),
	];
	$condition = [
		'use_id' => $_COOKIE["UID"]
	];
	update('user',$data,$condition);
	redirect('/ung-vien/ho-so-online.html');
?>