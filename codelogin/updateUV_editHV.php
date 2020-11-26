<?
	require_once('../home/config.php');

	$id_bc = getValue("id_bc","arr","POST",0);
	$bccc = getValue("bccc",'arr','POST','');
	$school_name = getValue('school_name','arr','POST',0);
	$start_times = getValue('start_times','arr','POST',0);
	$end_times = getValue('end_times','arr','POST','');
	$majors = getValue('majors','arr','POST','');
	$ranks = getValue('ranks','arr','POST','');
	$hv_add_infor = getValue('hv_add_infor','arr','POST','');
	for ($i = 0; $i < count($bccc); $i++) {
		$data = [
			'truong_hoc'		=> $school_name[$i],
			'bang_cap' 	 		=> $bccc[$i],
			'tg_batdau'  		=> strtotime($start_times[$i]),
			'tg_ketthuc' 		=> strtotime($end_times[$i]),
			'chuyen_nganh'		=> $majors[$i],
			'xep_loai'			=> $ranks[$i],
			'thongtin_bosung' 	=> $hv_add_infor[$i]
		];
		$condition = [
			'id_hocvan' => $id_bc[$i]
		];
		update('user_hocvan',$data,$condition);
	}
	unset($data,$condition);
	$data = [
		'use_update_time' => time()
	];
	$condition = [
		'use_id' => $_COOKIE['UID']
	];
	update('user',$data,$condition);
	redirect('/ung-vien/ho-so-online.html');
?>