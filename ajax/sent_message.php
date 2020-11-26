<?
	include('../home/config.php');
	$title = getValue('title','str','POST','');
	$content = getValue('content','str','POST','');
	$sender = getValue('sender','int','POST',0);
	$receiver = getValue('receiver','int','POST',0);
	$id_reply = getValue('id_reply','int','POST',0);
	if($title != '' && $content != '' && $sender != 0 && $receiver != 0){
		$data = [
			'id_sender' => $sender,
			'id_receiver' => $receiver,
			'title' => $title,
			'content' => $content,
			'id_reply' => $id_reply,
			'created_date' => time()
		];
		add('tbl_message',$data);
		echo '1';
	}else{
		echo '0';
	}
?>