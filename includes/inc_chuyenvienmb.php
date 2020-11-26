<?
	if($_COOKIE['UT']==1){
		$mail_chuyenvien = "huongmai.timviec365@gmail.com";
		$ten_chuyenvien = "Ms. Mai Hương";
		$sdt_chuyenvien = "0904646975";
		$zalo_chuyenvien = "0329 39.88.58";
	}else{
		$mail_chuyenvien = "rubyhhb17@gmail.com";
		$ten_chuyenvien = "Thu Hằng";
		$sdt_chuyenvien = "0359742858";
		$zalo_chuyenvien = "0813 519 658";
	}
?>	
<div class="chuyenvien_mb main">
	<div class="item">
	    <div class="image">
	        <img src="/images/load.gif" class="lazyload" data-src="/images/chuyenvien.jpg" alt="Chuyên viên">
	    </div>
	    <p>Chuyên viên hỗ trợ:</p>
	    <p><span class="weight-500 Roboto-Medium"></span><?=$ten_chuyenvien?> - SĐT: <span class="blue"><?=$sdt_chuyenvien?></span></p>
	    <p>Email: <span class="blue"><?=$mail_chuyenvien?></span></p>
	    <p>Zalo: <span class="orange"><?=$zalo_chuyenvien?></span></p>
	</div>   
</div>