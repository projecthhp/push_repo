<?
	include('../home/config.php');

	$day = getValue('day','int','POST','0');
	$month = getValue('month','int','POST','0');
	$year = getValue('year','int','POST','0');
	$time = $month.'/'.$day.'/'.$year;
	$time_interview = strtotime($time);
	$id = getValue('id','int','POST','0');
	$note = getValue('note','str','POST','');
	$db_qr = new db_query("UPDATE nop_ho_so SET date_interview = '".$time_interview."',note_interview = '".$note."' WHERE id = ".$id." ");
	redirect('/nha-tuyen-dung/ho-so-ung-tuyen.html');
?>