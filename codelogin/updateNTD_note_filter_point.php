<?
	include('../home/config.php');
	$candi_id = getValue('candi_id','int','POST','0');
	$note = getValue('note','str','POST','');
	$company_id = getValue('company_id','int','POST','0');
	if($company_id != 0 && $candi_id != 0 && $note != '' && $company_id == $_COOKIE['UID']){
		$db_qr = new db_query("UPDATE tbl_point_used SET note_uv = '".$note."' WHERE use_id = ".$candi_id." AND usc_id = ".$company_id." ");
		echo '1';
	}else{
		echo '0';
	}
	
?>