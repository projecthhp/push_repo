<h3 class="td">Xem Nhiều Nhất</h3>
<div class="main">
<?
	$db_qr = new db_query("SELECT * FROM news JOIN admin_user ON news.admin_id = admin_user.adm_id ORDER BY news.new_view DESC LIMIT 4");
	$i = 1;
	while($row_bl = mysql_fetch_array($db_qr->result)){
	if ($row_bl['new_title_rewrite'] != '') {
	    $title_news = $row_bl['new_title_rewrite'];
	}else{
	    $title_news = $row_bl['new_title'];
	}
	if($i == 1){
?>
	<div class="item newst">
		<div class="thumb_img">
			<img src="/images/load.gif" class="lazyload" data-src="https://timviec365.com/pictures/news/<?=$row_bl['new_picture'] ?>" alt="<?=$row_bl['new_title'] ?>">
		</div>
		<p class="title_blog"><a href="/blog/<?= replaceTitle($title_news)."-new".$row_bl['new_id'] ?>.html"><?= cut_string($row_bl['new_title'],120,'...')?></a></p>
	</div>
<?
		}
		else{
?>
	<div class="item">
		<div class="col-md-5 col-sm-5 col-xs-12 thumb_img">
			<img src="/images/load.gif" class="lazyload" data-src="https://timviec365.com/pictures/news/<?=$row_bl['new_picture'] ?>" alt="<?=$row_bl['new_title'] ?>">
		</div>
		<div class="col-md-7 col-sm-7 col-xs-12">
			<p class="author">Tác giả: <a href="<?= rewriteTacgia($row_bl['adm_id'],$row_bl['adm_name']); ?>"><?= $row_bl['adm_name']?></a> </p>
			<p class="title_blog"><a href="<?=rewriteBlog($row_bl['new_id'],replaceTitle($title_news))?>"><?= cut_string($row_bl['new_title'],60,'...') ?></a></p>
			<p class="des"><?= cut_string($row_bl['new_des'],120,'...')?> </p>
		</div>
	</div>
<?
		}
		$i++;
	}
?>							
</div>