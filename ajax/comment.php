<?
	session_start();
	include('../home/config.php');

	$username = getValue('username','str','POST','');

	$content = getValue('content','str','POST','');
	
	$link = getValue('link','str','POST','');

	$captcha = getValue('captcha','int','POST','');

	if($_SERVER['HTTP_HOST'] == 'localhost:8891'){
		$link = str_replace('http://localhost:8891','' , $link);
	}
	else{
		$link = str_replace('https://timviec365.com', '', $link);
	}

	if($captcha != $_SESSION['code']){
		echo '0';
	}
	else{
		$insert = new db_query("INSERT INTO tbl_comment(`cmt_username`,`cmt_url_blog`,`cmt_content`,`cmt_time`,`cmt_check`) VALUES('".$username."','".$link."','".$content."','".time()."','0')");
		$db_ex = new db_execute_return();
	 	$last_id = $db_ex->db_execute($insert);

		echo '<div class="item_show main">
				<div class="comment_parent">
				<div class="img"><img src="/images/load.gif" class="lazyload" data-src="/images/logo_user.png" alt="Logo user"></div>
				<div class="detail">
					<p class="username">
						<span class="user_name">'.$username.'</span>
						<span class="time_cm"><i class="fa fa-clock-o" aria-hidden="true"></i>'.date('H:i d-m-Y',time()).'
						</span>
					</p>
					<p class="content">'.removeHTML($content).'</p>
					<a onclick="replyComment('.$last_id.')" data-id='.$last_id.' class="reply">Phản hồi</a>
					</div>
				</div>
			</div>
			<ul class="comment_child" id="'.$last_id.'"></ul>';
	}
?>