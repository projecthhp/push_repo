<?
	include('../home/config.php');
	$content = getValue('content','str','POST','');
	$id_company = getValue('id_company','str','POST','');
	if(isset($_COOKIE['UID']) && $_COOKIE['UT']==0 && $content != '' && $id_company != 0){
		$array = [
			'id_user' => $_COOKIE['UID'],
			'id_company' => $id_company,
			'content' => $content,
			'created_date' => time()
		];
		add('user_company_reflect',$array);
		echo '1';
	}else{
		echo '0';
	}
	unset($array);
?>