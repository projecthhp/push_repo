<?
	include('../home/config.php');
	$title_new = getValue('title_new','str','POST','');
	$cate = getValue('cate','str','POST','');
	$id = getValue('id','str','POST',0);
	$time = mktime(0,0,0,5,10,2020);
	if($title_new != '' && isset($_COOKIE['UID']) && $cate != ''){
		$title_new = trim($title_new);
		$title_new = str_replace(' ', '%', $title_new);
		if($cate == 'create_new'){
			$sql = "SELECT count(*) FROM new WHERE new_han_nop > ".time()." AND new_create_time > ".$time." AND new_title LIKE '%".$title_new."%' AND new_user_id = ".$_COOKIE['UID'];
		}else{
			$sql = "SELECT count(*) FROM new WHERE new_han_nop > ".time()." AND new_create_time > ".$time." AND new_title LIKE '%".$title_new."%' AND new_user_id = ".$_COOKIE['UID']." AND new_id <> ".$id." ";
		}

		$db_qr = new db_query($sql);
		$row = mysql_fetch_array($db_qr->result);
		$count = $row['count(*)'];
		echo $count;
	}else{
		echo 'nhánh else';
	}
?>