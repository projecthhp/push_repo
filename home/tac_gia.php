<? 
include("config.php");
$id = getValue('id_tacgia','int','GET',0);
  if($id!=0){
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
    $sql_get = new db_query("SELECT * FROM admin_user WHERE adm_id = ".$id." ");
    $numrow = new db_query("SELECT count(1) FROM news WHERE new_active = 1 AND new_new = 0 AND admin_id = ".$id."");
	$count = mysql_fetch_assoc($numrow->result);
	$count = $count['count(1)'];
    $row_tg = mysql_fetch_assoc($sql_get->result);
    if($row_tg['meta_tit']!=''){
    	$title = $row_tg['meta_tit'];
    }else{
    	$title = "Tác giả: ".$row_tg['adm_name']." - Blogger Timviec365.com";
    }
    
    if($row_tg['meta_des']!=''){
    	$des = $row_tg['meta_des'];
    }else{
    	$des = '';
    }

    if($row_tg['meta_key']!=''){
    	$key = $row_tg['meta_key'];
    }else{
    	$key = '';
    }

    
    $urlcano = "https://timviec365.com".rewriteTacgia($row_tg['adm_id'],$row_tg['adm_name']);
    
  }
  else{
    redirect('/');
  }
$index = "index,follow";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<link rel="canonical" href="<?= $urlcano?>" />
		<meta name="p:domain_verify" content=""/>
		<link href="" rel="shortcut icon"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title><?=$title ?></title>
		<meta name="description" content="<?=$des ?>"/>
		<meta name="Keywords" content="<?=$key ?>"/>
		<?
	      if($page == 1){

	      ?>
	      <meta name="robots" content="<?=$index?>"/>
	      <?
	      }
	      else{
	      ?>
	      <meta name="robots" content="noodp,noindex,nofollow"/>

	      <?
	      }
	      ?>
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="website" />
		<meta property="og:title" content="<?=$title ?>" />
		<meta property="og:description" content="<?=$des ?>" />
		<meta property="og:site_name" content="tìm việc làm" />
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:description" content="<?=$des?>" />
		<meta name="twitter:title" content="<?=$title ?>" />

		<link rel='dns-prefetch' href='//fonts.googleapis.com' />
		<link rel='dns-prefetch' href='//s.w.org' />
		<link rel="stylesheet" href="/css/font-awesome.min.css" media='all' onload="if(media!='all')media='all'">
		<link rel="stylesheet" href="/css/style.min.css?v=<?= $version ?>" media='all' onload="if(media!='all')media='all'">
		<meta name="google-site-verification" content="EIV7wHDvaTZkVpsLjmM4_neYDyPLTmjV9du0A8ho4TU" />
		<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PQGTCFD');</script>
<!-- End Google Tag Manager -->
	</head>
	<body class="blog">
		<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
		<header>
			<?include('../includes/blog/inc_header.php');?>
		</header>
		<div class="breakcrumb cv blog">
			<ul>
				<li><a href="/">Trang chủ</a></li>
				<li><a href="/blog">Blog</a></li>
				<li class="active"><span><h1>Tác giả: <?= $row_tg['adm_name'] ?></h1></span></li>
			</ul>
		</div>
		<div class="box_tac_gia main">
			<div class="top main">
				<div class="images">
					<div class="parent">
						<img onerror='this.onerror=null;this.src="/images/img_author_detail.png";' src="/images/load.gif" class="lazyload" data-src="/pictures/author/<?=$row_tg['adm_picture']?>" alt="<?= $row_tg['adm_name'] ?>">
					</div>
				</div>
				<div class="right">
					<div class="top_right">
						<p class="name_author"><?= $row_tg['adm_name'] ?></p>
						<p class="new_count"><?=$count?> Bài viết</p>
					</div>
				</div>
				<div class="bottom_right">
						<?=$row_tg['adm_sapo']?>
					</div>
				<div class="bottom_infor main">
					<div class="left">
						<div class="box_tt">
							<p class="name"><?= $row_tg['adm_name'] ?></p>
							<p class="text birth_day">Ngày sinh: <?=($row_tg['adm_date']>0)?date('d/m/Y',$row_tg['adm_date']):"Chưa cập nhật"?></p>
							<p class="text city">Quê quán: <?=($row_tg['adm_city']!=0)?$arrcity[$row_tg['adm_city']]['cit_name']:"Chưa cập nhật"?></p>
							<p class="text cham_ngon">Châm ngôn yêu thích: <?=($row_tg['adm_chamngon']!='')?$row_tg['adm_chamngon']:"Chưa cập nhật"?></p>
						</div>
					</div>
					<div class="inf_right">
						<div class="content" <?=($row_tg['adm_description']=='')?'style="height:auto"':""?>>
						   <?=($row_tg['adm_description']!="")?$row_tg['adm_description']:"Chưa cập nhật"?>
						   <div class="bottom">
						   	<span>Tác giả của Timviec365.com</span>
						   </div>
						   </div>
						<?=($row_tg['adm_description']!='')?'<div class="text-center">
   							<a class="showMore">Xem thêm<i class="fa fa-angle-double-down" aria-hidden="true"></i></a>
   						</div>':""?>
   						
					</div>
				</div>
			</div>
			<div class="author_box_new main">
				<div class="head main">
					<h2 class="tag_heading">Bài viết cùng tác giả</h2>
				</div>
				<div class="main main_new">
					<div class="top_new">
						<?
						$db_qr = new db_query("SELECT news.new_id,news.new_title,news.new_title_rewrite,news.new_picture,news.new_des,news.new_date FROM news WHERE new_active = 1 AND new_new = 0 AND admin_id = '".$id."' ORDER BY new_id DESC LIMIT ".$start.",".$curentPage."");
						$i = 0;
						While($row = mysql_fetch_assoc($db_qr->result)){
							if($row['new_title_rewrite'] == ''){
								$title_new = replaceTitle($row['new_title']);
							}else{
								$title_new = $row['new_title_rewrite'];
							}
							if($i == 4) echo '</div><div class="bot_new main">';
						?>
						<div class="item">
							<div class="images"><img src="/images/load.gif" class="lazyload" data-src="https://timviec365.com/pictures/news/<?=$row['new_picture']?>" alt="<?=$row['new_title']?>"></div>
							<a href="<?=rewriteBlog($row['new_id'],$title_new)?>" class="new_bl"><?=$row['new_title']?></a>
							<p class="time_bl_author"><i class="fa fa-clock-o" aria-hidden="true"></i><?=date('d - m - Y',$row['new_date'])?></p>
							<? if($i >= 4){?>
							<div class="sapo_bl">
								<?=$row['new_des']?>
							</div>
							<?}?>
						</div>
						<?
						$i++;
							}
						?>
					</div>
					<div class="pagination_wrap cv text-right clr">
						<div class="clr">
					 	<?
							$domain = $_SERVER['REQUEST_URI'];
							$domain = str_replace("?page=".$page, "", $domain);
							$domain = str_replace("&page=".$page, "", $domain);
							$domain = str_replace("page=".$page, "", $domain);
							echo generatePageBar2('',$page,$curentPage,$count,$domain,'?','','jp-current','preview','<','next','>','first','Đầu','last','Cuối');
						  ?>
					  	</div>
					</div>
				</div>
			</div>
		</div>
		<? include('../includes/inc_footer.php'); ?>
		<? include('../includes/inc_script_footer.php') ?>
		<script>
			$( document ).ready(function() {
				$('.showMore').click(function(){
					e = $(this);
					if($('.box_tac_gia .inf_right .content').hasClass('open') == false){
						$('.box_tac_gia .inf_right .content').addClass('open');
						e.html('Rút gọn<i class="fa fa-angle-double-up" aria-hidden="true"></i>');
					}else{
						$('.box_tac_gia .inf_right .content').removeClass('open');
						e.html('Xem thêm<i class="fa fa-angle-double-down" aria-hidden="true"></i>');
					}
				});
			});
		</script>
	</body>
	
</html>