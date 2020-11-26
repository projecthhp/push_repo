<? 
include("config.php"); 
$catid = getValue("catid","int","GET",0);
$catid = (int)$catid;

$page  = getValue('page','int','GET',1,2);
$page  = intval(@$page);
$curentPage = 12;
$pageab = abs($page - 1);
$start = $pageab * $curentPage;
$start = intval(@$start);
$start = abs($start);
if($page == 0)
{
   $page = 1;
}
if($catid == 0)
{
   redirect("/blog");
} 
else
{
   $db_qrcat = new db_query("SELECT * FROM seo_tt WHERE name_page = 'cau-hoi-phong-van' LIMIT 1");
   $rowcat = mysql_fetch_assoc($db_qrcat->result);
}
$urlcano =  "https://timviec365.com/cau-hoi-phong-van";

$title = $rowcat['seo_tt'];

$keywords = $rowcat['seo_key'];

$description = $rowcat['seo_des'];

$index = "noodp,index,follow";
$h1 = $rowcat['seo_h1'];

?>
<!DOCTYPE html>
<html lang="vi">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<link rel="canonical" href="<?= $urlcano?>" />
		<meta name="p:domain_verify" content=""/>
		<link href="" rel="shortcut icon"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title><?=$title ?></title>
		<meta name="description" content="<?= $description ?>"/>
		<meta name="keywords" content="<?= $keywords ?>"/>
		
		<meta name="robots" content="<?=$index?>"/>
		
		<meta property="og:locale" content="vi_VN" />
		<meta property="og:type" content="website" />
		<meta property="og:title" content="<?=$title ?>" />
		<meta property="og:description" content="<?=$description ?>" />
		<meta property="og:site_name" content="Timviec365.com" />
		<meta property="og:image" content="https://timviec365.com/pictures/images/cau-hoi-phong-van-15.jpg"/>
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:description" content="<?=$description ?>" />
		<meta name="twitter:title" content="<?=$title ?>" />


		<link rel='dns-prefetch' href='//fonts.googleapis.com' />
		<link rel='dns-prefetch' href='//s.w.org' />
		<link rel="stylesheet" href="/css/font-awesome.min.css" onload="if(media!='all')media='all'">
		<link rel="stylesheet" href="/css/style.min.css?v=<?= $version ?>" media='all' onload="if(media!='all')media='all'">
		<meta name="google-site-verification" content="EIV7wHDvaTZkVpsLjmM4_neYDyPLTmjV9du0A8ho4TU" />
		<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PQGTCFD');</script>
<!-- End Google Tag Manager -->
		<script type="application/ld+json">
		{
		  "@context": "https://schema.org",
		  "@type": "Article",
		  "mainEntityOfPage": {
		    "@type": "WebPage",
		    "@id": "https://timviec365.com/cau-hoi-phong-van"
		  },
		  "headline": "CÁC CÂU HỎI PHỎNG VẤN THƯỜNG GẶP",
		  "image": "https://timviec365.com/pictures/images/cau-hoi-phong-van-15.jpg",  
		  "author": {
		    "@type": "Organization",
		    "name": "Timviec365.com"
		  },  
		  "publisher": {
		    "@type": "Organization",
		    "name": "Timviec365.com",
		    "logo": {
		      "@type": "ImageObject",
		      "url": "https://timviec365.com/images/logo365-mini.png"
		    }
		  },
		  "datePublished": "2020-07-24",
		  "dateModified": "2020-08-05"
		}
		</script>
	</head>
	<body class="blog">
		<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
		<header>
			<?include('../includes/blog/inc_header.php');?>
			<div id="banner_cv" class="main text-center category">
				<h1><?=$h1?></h1>
				<?include('../includes/blog/inc_blog_search.php');?>
			</div>
		</header>
		<div class="breakcrumb blog bg_mota chpv">
			<ul>
				<li><a href="/">Trang chủ</a></li>
				<li><a href="/blog">Blog</a></li>
				<li class="active"><span>Câu hỏi phỏng vấn</span></li>
			</ul>
		</div>
		<div class="chpv main">
			<div class="box_top">
				<div class="headding_ch">
					Các câu hỏi phỏng vấn thường gặp và cách trả lời hay nhất
				</div>
				<div class="sapo_ch">Tổng hợp các câu hỏi thường gặp phỏng vấn xin việc năm 2020, cách trả lời phỏng vấn thông minh ghi điểm nhà tuyển dụng, chia sẻ kinh nghiệm phỏng vấn và các bí quyết giúp bạn vượt qua buổi phỏng vấn</div>
			</div>
			<div class="box_menu">
				<?=makeMLBlog($rowcat['seo_text'],'','')?>
			</div>
			<div class="box_content">
				<?
					$seo_text = $rowcat['seo_text'];
					$seo_text = str_replace('style="font-family:arial,helvetica,sans-serif;"','',$seo_text);
					$seo_text = str_replace('src=','class="lazyload" src="/images/load.gif" data-src=',$seo_text);
				?>
				<?=makeML_content(button_file($seo_text),'','')?>
			</div>
		</div>
		<div class="banner_chpv">
			<p class="txt_top">bộ câu hỏi tuyển dụng</p>
				<p class="txt_bottom">Trong phỏng vấn, nhằm đánh giá chính xác khả năng của các ứng viên, nhà tuyển dụng thường đặt ra rất nhiều câu hỏi. Và những câu hỏi này thường được lặp qua các cuộc phỏng vấn. Những câu hỏi này là gì và làm sao để vượt qua chúng?</p>
		</div>
		<div class="chpv main box_cateCH">
			<?
			$k = 0;
			$db_qr = new db_query("SELECT * FROM tbl_chpv");
			While($row = mysql_fetch_assoc($db_qr->result)){
				$link = '/cau-hoi-phong-van/'.$row['ch_alias'].".html";
				if($k==0){
					$position = 'first';
					$limit = 5;
				}
				else if($k == 1){
					$position = 'second';
					$limit = 5;
				}
				else {
					$position = '';
					$limit = 4;
				}
			?>
			<div class="cateCH main">
				<div class="head">
					<h2 class="tag_heading"><?=$row['ch_name']?></h2>
					<a class="showAll" href="<?=$link?>">Xem tất cả<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
				</div>
				<div class="main_ch <?=$position?> main">
					<?
					$db_qrs = new db_query("SELECT new_id,new_title,new_title_rewrite,new_picture,new_des FROM new_chpv WHERE new_category_id = ".$row['ch_id']." ORDER BY new_date DESC LIMIT ".$limit);
					$i = 0;
					While ($rows = mysql_fetch_assoc($db_qrs->result)) {
						if($rows['new_title_rewrite']!=''){
							$title_new = $rows['new_title_rewrite'];
						}else{
							$title_new = replaceTitle($rows['new_title']);
						}
						$url = "/cau-hoi-phong-van/".$title_new."-pv".$rows['new_id'].".html";
					?>
					<div class="item_ch">
						<div class="images">
							<img src="/images/load.gif" class="lazyload" data-src="/pictures/news/<?=$rows['new_picture']?>" alt="<?=$rows['new_title']?>">
						</div>
						<a href="<?=$url?>" class="title_ch"><?=$rows['new_title']?></a>
						<?if(($k==0 && $i == 0) || ($k == 1 && $i == 1)){?>
						<div class="sapo_ch">
							<?=$rows['new_des']?>
						</div>
						<?}?>
					</div>
					<?
					$i++;
					}
					?>
				</div>
			</div>
			<?
			$k++;
			}
			?>
		</div>
		<? include('../includes/inc_footer.php'); ?>
		<? include('../includes/inc_script_footer.php') ?>
	</body>
</html>