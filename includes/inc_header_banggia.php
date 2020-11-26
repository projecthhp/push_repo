<div class="mobile hidden" onclick="btn_close(this)"></div>
<div class="mobile_show hidden" >
	<div class="main">
		<?
			if(!isset($_COOKIE["UID"])){
		?>
		<div class="item login"><a>Đăng nhập</a></div>
		<div class="sub login hidden">
			<a href="/dang-nhap-nha-tuyen-dung.html">Nhà tuyển dụng</a>
			<a href="/dang-nhap-ung-vien.html">Ứng viên</a>
		</div>
		<div class="item register"><a>Đăng ký</a></div>
		<div class="sub register hidden">
			<a href="/dang-ky-nha-tuyen-dung.html">Nhà tuyển dụng</a>
			<a href="/dang-ky-ung-vien.html">Ứng viên</a>
		</div>
		<?
			}
			else{
		?>
		<div class="sub logged">
			<?
				if($_COOKIE['UT']==1){
					$avt = 'usc_logo';
					$table = 'user_company';
					$id_table = 'usc_id';
					$cr_time = 'usc_create_time';
					$name = 'usc_company';
				}
				else{
					$avt = 'use_logo';
					$table = 'user';
					$id_table = 'use_id';
					$cr_time = 'use_create_time';
					$name = 'use_name';
				}
				$db_inf = new db_query("SELECT ".$avt.",".$cr_time.",".$name." FROM ".$table." WHERE ".$id_table." = ".$_COOKIE['UID']);
				$row_avt = mysql_fetch_array($db_inf->result);
			?>
			<p><img src="<?= ($row_avt[$avt] == '')?'/images/ico_ctuv.png':geturlimageAvatar($row_avt[$cr_time]).$row_avt[$avt] ?>"></p>
			
			<div><b><?= $row_avt[$name] ?></b></div>
			<a class="ttc" href="<?= ($_COOKIE['UT']==1)?'/nha-tuyen-dung/thong-tin-chung.html':'/thong-tin-tai-khoan-ung-vien.html' ?>">Thông tin tài khoản</a>
			<a class="logout" href="/dang-xuat">Đăng xuất</a>
			<? unset($db_inf,$row_avt,$avt,$table,$id_table,$cr_time,$name) ?>
		</div>
		<?
			}
		?>
		<div class="item home"><a href="/bang-gia">Trang chủ</a></div>
		<div class="item cv"><a href="/ghim-tin">Ghim tin</a></div>
		<div class="item blog"><a href="/chi-tiet/5">Lọc hồ sơ</a></div>
	</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
	<nav class="navbar navbar-default">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" onclick="btn_toggle()">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">
				<img class="lazyload" data-src="/images/logo365-mini.png" src="/images/load.gif" alt="Trang chủ">
			</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav center">
				<li>
					<a rel="nofollow" href="/bang-gia">Trang chủ <span class="sr-only">(current)</span></a>
				</li>
				<li><a rel="nofollow" href="/ghim-tin">Ghim tin</a></li>
				<li><a rel="nofollow" href="/chi-tiet/5">Lọc hồ sơ</a></li>
			</ul>
			<?
			if(!isset($_COOKIE['UID'])){
			?>
			<ul class="nav navbar-nav navbar-right">
				<li class="login">
					<a id="login">Đăng nhập</a>
					<ul class="submenu submenu_login">
						<li><a href="/dang-nhap-nha-tuyen-dung.html">Nhà tuyển dụng</a></li>
						<li><a href="/dang-nhap-ung-vien.html">Ứng viên</a></li>
					</ul>
				</li>
				
				<li class="register">
					<a id="hd_register">Đăng ký</a>
					<ul class="submenu submenu_register">
						<li><a href="/dang-ky-nha-tuyen-dung.html">Nhà tuyển dụng</a></li>
						<li><a href="/dang-ky-ung-vien.html">Ứng viên</a></li>
					</ul>
				</li>
			</ul>
			<?
			}
			else{
				if($_COOKIE['UT']==1){
					$db_inf = new db_query("SELECT * FROM user_company JOIN user_company_multi ON user_company.usc_id = user_company_multi.usc_id WHERE user_company.usc_id = ".$_COOKIE['UID']);
					$row_com  = mysql_fetch_array($db_inf->result);
					if($row_com['usc_authentic'] == 0){
					if(!isset($xt)){
						redirect('/xac-thuc-tai-khoan-nha-tuyen-dung.html');
					}
				}
			?>
			<ul class="nav navbar-nav navbar-right logged">
				<li class="anhdaidien">
					<p>
						<img id='avt' src="<?= ($row_com['usc_logo'] == '')?'../images/no-image.png':geturlimageAvatar($row_com['usc_create_time']).$row_com['usc_logo'] ?>">
					</p>
				</li>
				<div class="dropdown">
				  <button class="dropdown-toggle" type="button" data-toggle="dropdown"><?= name_company($row_com['usc_company'])?>
				  <span class="caret"></span></button>
				  <ul class="dropdown-menu">
				    <li><a href="<? echo '/nha-tuyen-dung/thong-tin-chung.html' ?>">Thông tin tài khoản</a></li>
				    <li><a href="/dang-xuat">Đăng xuất</a></li>
				  </ul>
				</div>
			</ul>
			<?
				}
				else if($_COOKIE['UT']==0){
				$db_inf = new db_query("SELECT * FROM user WHERE use_id = ".$_COOKIE['UID']);
				$row_use  = mysql_fetch_array($db_inf->result);
				if($row_use['use_authentic'] == 0){
					if(!isset($xt)){
						redirect('/xac-thuc-tai-khoan-ung-vien.html');
					}
				}
			?>
			<ul class="nav navbar-nav navbar-right logged">
				<li class="anhdaidien">
					<p>
						<img id='avt' src="<?= ($row_use['use_logo'] == '')?'/images/ico_ctuv.png':geturlimageAvatar($row_use['use_create_time']).$row_use['use_logo'] ?>">
					</p>
				</li>
				<div class="dropdown">
				  <button class="dropdown-toggle" type="button" data-toggle="dropdown"><?= name_company($row_use['use_name'])?>
				  <span class="caret"></span></button>
				  <ul class="dropdown-menu">
				    <li><a href="<? echo '/thong-tin-tai-khoan-ung-vien.html' ?>">Thông tin tài khoản</a></li>
				    <li><a href="/dang-xuat">Đăng xuất</a></li>
				  </ul>
				</div>
			</ul>
			<?
				}
				else if($_COOKIE['UT']==2)
				{
				  setcookie('xt',$_COOKIE['UID'],time() + 3600);
				  $db_qr_tmp = new db_query("SELECT * FROM tmp_user WHERE tmp_id = ".$_COOKIE["UID"]);
				  if(mysql_num_rows($db_qr_tmp->result) > 0)
				  {
				     $row_tmp = mysql_fetch_array($db_qr_tmp->result);
				        if (!isset($xt)) {
				           if ($row_tmp['tmp_authentic'] == 0) {}
				        }
				        $mail = $row_tmp['tmp_name'];
				  }
				}
			?>
			
			<?
			}
			?>
			</div><!-- /.navbar-collapse -->
		</nav>
<div class="main_search">
	<div class="search_tv">