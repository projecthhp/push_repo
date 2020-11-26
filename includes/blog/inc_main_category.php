<div class="main_show main category">
	<div class="main_top main">
		<div class="top main_slick">
	<?
		$db_qr = new db_query("SELECT * FROM news JOIN admin_user ON news.admin_id = admin_user.adm_id WHERE news.new_category_id = ".$catid." AND new_active = 1 ORDER BY news.new_id DESC LIMIT ".$start.",".$curentPage."");
		$i = 0;
		while($row_bl = mysql_fetch_array($db_qr->result)){
			if ($row_bl['new_title_rewrite'] != '') {
			    $title_news = $row_bl['new_title_rewrite'];
			}else{
			    $title_news = $row_bl['new_title'];
			}
		if($i < 4){
	?>
	<div class="item top text-center">
		<a href="<?=rewriteBlog($row_bl['new_id'],$title_news)?>" class="img"><img class="lazyload" src="/images/load.gif" data-src="https://timviec365.com/pictures/news/<?=$row_bl['new_picture'] ?>" alt="<?=$row_bl['new_title']?>"></a>
		<a class="cate_title" href="<?=rewriteBlog($row_bl['new_id'],$title_news)?>"><?=$row_bl['new_title']?></a>
		<p class="author_bl"><a href="<?= rewriteTacgia($row_bl['adm_id'],$row_bl['adm_name']) ?>"><?= $row_bl['adm_name']?></a> <?= date('d - m - Y',$row_bl['new_date']) ?></p>
	</div>
	<?
		}else{
			if($i == 4) echo '</div></div><p class="td cate">'.$rowcat['cat_name'].'</p>';
	?>
	<div class="item bottom">
		<a href="<?=rewriteBlog($row_bl['new_id'],$title_news)?>" class="cate_title"><?=$row_bl['new_title']?></a>
		<a href="<?=rewriteBlog($row_bl['new_id'],$title_news)?>" class="img"><img src="/images/load.gif" class="lazyload" data-src="https://timviec365.com/pictures/news/<?=$row_bl['new_picture'] ?>" alt=""></a>
		<p class="author_bl"><a href="<?= rewriteTacgia($row_bl['adm_id'],$row_bl['adm_name']) ?>"><?= $row_bl['adm_name']?></a> <?= date('d - m - Y',$row_bl['new_date']) ?></p>
		<div class="cate_sapo">
			<?=$row_bl['new_des']?>
		</div>
	</div>
	<?}$i++;}?>
	<div class="pagination_wrap cv text-right clr">
		<div class="clr">
	 	<?
			$numrow = new db_query("SELECT count(1) FROM news WHERE new_active = 1 AND new_new = 0 AND new_category_id = ".$catid."");
			$count = mysql_fetch_assoc($numrow->result);
			$count = $count['count(1)'];
			$domain = $_SERVER['REQUEST_URI'];
			$domain = str_replace("?page=".$page, "", $domain);
			$domain = str_replace("&page=".$page, "", $domain);
			$domain = str_replace("page=".$page, "", $domain);
			echo generatePageBar2('',$page,$curentPage,$count,$domain,'?','','jp-current','preview','<','next','>','first','Đầu','last','Cuối');
		  ?>
	  	</div>
	</div>
	<? include('../includes/blog/inc_best_view.php') ?>
	<? include('../includes/blog/inc_blog_hot.php') ?>
</div>