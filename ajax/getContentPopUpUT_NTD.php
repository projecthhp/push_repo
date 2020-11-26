<?
	include('../home/config.php');

	$id = getValue('id','int','POST',0);
	$type = getValue('type','int','POST',0);
	$db_qr = new db_query("SELECT * FROM nop_ho_so WHERE id = ".$id." AND nhs_com_id = ".$_COOKIE['UID']." ");
	$row = mysql_fetch_array($db_qr->result);
	$data = [];
	if($type == 1){
		if($row['date_interview']!=0 || $row['date_interview'] != null){
			if(date('d',$row['date_interview']) < 10){
				$day = str_replace(0, '', date('d',$row['date_interview']));
			}
			if(date('m',$row['date_interview']) < 10){
				$month = str_replace(0, '', date('m',$row['date_interview']));
			}
			$data = array(
				'type'=>1,
				'day' => $day,
				'month' => $month,
				'year' => date('Y',$row['date_interview']),
				'note' => $row['note_interview'],
			);
		}
		
	}
	else{
		$data = array(
			'type'=>2,
			'note' => $row['note'],
		);
	}
	echo json_encode($data);
?>