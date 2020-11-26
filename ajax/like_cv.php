<?
	include('../home/config.php');

	$iduv = getValue('iduv','str','POST','');
	$idcv = getValue('cvid','str','POST','');
	$type = getValue('type','str','POST','');
	if($idcv != '' && $iduv != ''){
		$db_qr = new db_query("SELECT * FROM `cv_emotion` WHERE iduser = '".$iduv."' AND idcv = '".$idcv."' AND type = ".$type." ");
		if(mysql_num_rows($db_qr->result)==0){
			$data = [
				'idcv' => $idcv,
				'iduser' => $iduv,
				'type' => $type,
				'emo_create_time' => time()
			];
            add('cv_emotion',$data);
            echo '1';
		}else{
			$row = mysql_fetch_array($db_qr->result);
			$sql = "DELETE FROM `cv_emotion` WHERE emo_id = ".$row['emo_id'];
			$db_qrs = new db_query($sql);
            unset($db_qrs);
            echo '0';
		}
	}
?>