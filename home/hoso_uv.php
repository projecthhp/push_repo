<?
	include('config.php');
	$db_query = new db_query("SELECT use_district_job,use_name,use_logo,use_id,use_job_name,use_update_time,salary,exp_years FROM user ORDER BY use_id DESC LIMIT 10");
	
?>
<!DOCTYPE html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
   <title>Tổng hợp hồ sơ ứng viên</title>
   <meta name="descripton" content="Đăng ký ứng viên. Tìm việc làm nhanh chóng, hiệu quả nhất,  đăng tin tìm việc làm tốt 24h, tuyển dụng việc làm tất cả ngành nghề nhanh nhất, tìm kiếm việc làm tại Timviec365.vn"/>
   <meta name="Keywords" content="tim viec lam, viec lam nhanh, tìm việc làm nhanh, tuyển dụng việc làm, tuyen dung, kiem viec lam, tim viec lam, tim viec">
   <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui">
   <meta name="robots" content="noodp,noindex,nofollow"/>

   <link rel='dns-prefetch' href='//fonts.googleapis.com' />
   <link rel='dns-prefetch' href='//s.w.org' />
   <link rel='stylesheet' id='wpb-google-fonts-css'  href='https://fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C700italic%2C400%2C700%2C300&#038;ver=4.6.5' media='all' />
   <link rel='stylesheet' id='bootstrap.min-css'  href='/css/bootstrap.min.css' media='all' />
   <link rel='stylesheet' id='font-awesome-css'  href='/fonts/font-awesome.min.css' media='all' />
   <link rel='stylesheet' id='owl.themecss-css'  href='/css/owl.theme.css' media='all' />
   <link rel='stylesheet' id='owl.themecss-css'  href='/css/select2.css' media='all' />
   <link rel='stylesheet' id='style-css'  href='/css/style.min.css?v=<?= $version ?>' media='all' />
   <link href="/css/responsive.css?v=<?= $version ?>" rel="stylesheet"/>
   <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PQGTCFD');</script>
<!-- End Google Tag Manager -->
   <script type='text/javascript' src='/js/jquery.min.js'></script>
   <script type='text/javascript' src='/js/select2.min.js'></script>
   <script src="../js/validate.js?v=<?= $version ?>" type="text/javascript"></script>
</head>
<body id="regis_uv">
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
		<? include('../includes/inc_header.php') ?>
		<? include('../includes/inc_search.php') ?>
		<section>
			<div class="container">
				<div class="row">
					<div class="col-md-9 ho_so_9">
						<div class="luv-top">
							<h1>Người tìm việc mới nhất - Xem Hồ sơ, Cv ứng viên miễn phí</h1>
						</div>
						<div class="clear"></div>
					<?
						if(mysql_num_rows($db_query->result))
						{
							while ($row = mysql_fetch_assoc($db_query->result)) 
							{
					?>
						<div class="s-row-nd">
							<div class="s-ro-img">
								<img src="<?= ($row['use_logo']!='')?$row['use_logo']:'/images/dk_s.png' ?>"  data-src="/images/dk_s.png" alt="Noimage">
							</div>
							<div class="s-ro-text">
								<p><a class="u_tit" href="<?= rewriteCTUV($row['use_id'],$row['use_name']) ?>" title="<?= $row['use_job_name'] ?>" rel="nofollow"><?= $row['use_job_name'] ?></a></p>
								<p>
									<strong><a href="<?= rewriteCTUV($row['use_id'],$row['use_name']) ?>" title="<?= $row['use_job_name'] ?>" rel="nofollow"><?= $row['use_name']?></a></strong>
								</p>
								<p class="u_info">Khu vực: 
								<span class="limit_city">
								<?
									$a = explode(',',$row['use_district_job']);
									$db_city = new db_query("SELECT * FROM city");
									while($row_cit = mysql_fetch_assoc($db_city->result)){
										if(in_array($row_cit['cit_id'], $a)) echo $row_cit['cit_name'];
									}
								?>	
								</span> | Ngày cập nhật: <span><?= date('d/m/Y',$row['use_update_time']) ?></span>
								</p>
								<table class="s-ro-rig" border="0">
									<tbody>
										<tr>
											<td><img src="../images/k_d77.png" alt="mức lương"></td>
											<td><img src="../images/k_d79.png" alt="kinh nghiệm"></td>
										</tr>
										<tr>
											<td><span class="text-color2"><?= ($row['salary']!=0)?$array_muc_luong[$row['salary']]:'Xem trong CV' ?></span></td>
											<td><?= ($row['exp_years']!=0)?$array_kinh_nghiem_uv[$row['exp_years']]:'Chi tiết trong CV' ?></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					<?
							}
						}
					?>
					</div>
			</div>
        </section>
        <? include("../includes/inc_footer.php") ?>
      <? include("../includes/inc_script_footer.php") ?>
      <script src="/js/update_uv.js"></script>
   </body>
</html>