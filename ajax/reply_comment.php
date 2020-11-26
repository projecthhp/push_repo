<?
	session_start();
	include('../home/config.php');

	$repl_parent_id = getValue('repl_parent_id','int','POST','');
	$reply_user = getValue('reply_user','str','POST','');
	$reply_comment = getValue('reply_comment','str','POST','');
	$reply_capcha = getValue('reply_capcha','str','POST','');

	if($reply_capcha != $_SESSION['code']){
		echo '0';
	}
	else{
		$ip = client_ip();
		$insert = new db_query("INSERT INTO tbl_cmt_reply (`repl_parent_id`,`repl_content`,`repl_user`,`repl_time`,`rep_ip`) VALUES ('".$repl_parent_id."','".$reply_comment."','".$reply_user."','".time()."','".$ip."') ");
	    $allow = array("171.255.69.80", "14.162.144.184", "222.255.236.80", "123.24.206.25", "118.70.126.231", "115.79.62.130", "125.212.244.247", "43.239.223.11", "43.239.223.12", "27.3.150.230", "125.212.244.247", "42.118.114.172","43.239.223.60",
	"162.158.62.160","118.70.185.222","118.70.126.231");
	    if(in_array($ip, $allow)){
	    	$src = "/images/logo_adm.png";
	    }
    	else{
    		$src = "/images/logo_user.png";
    	}
		echo '<li>
		        <div class="img">
		          <img src="'.$src.'" alt="Logo user reply">
		        </div>
		        <div class="detail">
				  <p class="username">
				  <span class="user_name">'.$reply_user.'</span>
				  <span class="time_cm"><i class="fa fa-clock-o" aria-hidden="true"></i>'.date('H:i d-m-Y',time()).'<span>
				  </p>
		          <p class="content">'.removeHTML($reply_comment).'</p>
		        </div>
		      </li>';
	}
?>