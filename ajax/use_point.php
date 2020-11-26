<?
	include('../home/config.php');

	$uid_com = getValue('uid_com','int','POST',0);
	$uid_candi = getValue('uid_candi','int','POST',0);

	$db_qr = new db_query("SELECT * FROM tbl_point_company WHERE usc_id = ".$uid_com);
	$row = mysql_fetch_array($db_qr->result);
	if($row['point'] > 0 && $row['point']<=5){
		$db_qr = new db_query("UPDATE tbl_point_used SET type = 1, used_day = ".time().", point = 1 WHERE usc_id = ".$uid_com." AND use_id = ".$uid_candi." ");
		$db_qr = new db_query("UPDATE tbl_point_company SET point = point - 1 WHERE usc_id = ".$uid_com);
		echo '1';
	}
	else{
		if($row['point_usc']>0){
			$db_qr = new db_query("UPDATE tbl_point_used SET type = 2, used_day = ".time().", point = 1 WHERE usc_id = ".$uid_com." AND use_id = ".$uid_candi." ");
			$db_qr = new db_query("UPDATE tbl_point_company SET point_usc = point_usc - 1 WHERE usc_id = ".$uid_com);
			echo '1';
		}
		else{
			echo '0';	
		}	
	}
?>