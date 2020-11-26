<div class="main main_mota main_show">
	<div class="left">
		<?
		$db_qr = new db_query("SELECT * FROM news JOIN admin_user ON news.admin_id = admin_user.adm_id WHERE news.new_category_id = ".$catid." AND new_active = 1 ORDER BY news.new_id DESC LIMIT ".$start.",".$curentPage."");
		while($row_bl = mysql_fetch_array($db_qr->result)){
			if ($row_bl['new_title_rewrite'] != '') {
			    $title_news = $row_bl['new_title_rewrite'];
			}else{
			    $title_news = $row_bl['new_title'];
			}
		?>
		<div class="item main">
			<a href="<?=rewriteBlog($row_bl['new_id'],$title_news)?>" class="title_bl"><?=$row_bl['new_title']?></a>
			<div class="img">
				<span><?= date('d / m / Y',$row_bl['new_date']) ?></span>
				<a href="<?=rewriteBlog($row_bl['new_id'],$title_news)?>"><img src="/images/load.gif" class="lazyload" data-src="https://timviec365.com/pictures/news/<?=$row_bl['new_picture'] ?>" alt="<?=$row_bl['new_title']?>"></a>
			</div>
			<div class="blog_sapo">
				<?=$row_bl['new_des']?>
			</div>
		</div>
		<?
		}
		unset($db_qr,$row_bl);
		?>
		<div class="pagination_wrap cv text-right clr">
			<div class="clr">
		 	<?
				$db_qr = new db_query("SELECT count(*) FROM news JOIN admin_user ON news.admin_id = admin_user.adm_id WHERE news.new_category_id = ".$catid." AND new_active = 1");
				$count = mysql_fetch_assoc($db_qr->result);
				$count = $count['count(*)'];
				$domain = $_SERVER['REQUEST_URI'];
				$domain = str_replace("?page=".$page, "", $domain);
				$domain = str_replace("&page=".$page, "", $domain);
				$domain = str_replace("page=".$page, "", $domain);
				echo generatePageBar2('',$page,$curentPage,$count,$domain,'?','','jp-current','preview','<','next','>','first','Đầu','last','Cuối');
			  ?>
		  	</div>
		</div>
	</div>
	<div class="right">
		<div class="main main_chuyenmuc">
			<div class="top">
				<span class="h_ding">Chuyên mục</span>
				<p class="button pull-right">
					<i class="fa fa-angle-left" aria-hidden="true"></i>
					<i class="fa fa-angle-right" aria-hidden="true"></i>
				</p>
			</div>
			<div class="main">
				<?
<<<<<<< HEAD
				$db_qr = new db_query("SELECT `cat_id`, `cat_name`, `cat_title`,`cat_name_rewrite`,`cat_link` FROM categories_multi ORDER BY cat_id DESC LIMIT ".$start.",".$curentPage." ");
=======
				$db_qr = new db_query("SELECT `cat_id`, `cat_name`, `cat_title`,`cat_name_rewrite`,`cat_link`,`cat_count` FROM categories_multi ORDER BY cat_count DESC LIMIT ".$start.",".$curentPage." ");
>>>>>>> 12bb0cb9ff663446bb65b5a9c100a529c228166a
				While ($row = mysql_fetch_assoc($db_qr->result)) {
					$url = ($row['cat_link']!='')?$row['cat_link']:replaceTitle($row['cat_name']);
					$url = "https://timviec365.com/blog/c".$row['cat_id']."/".$url;
				?>
<<<<<<< HEAD
				<a href="<?=$url?>" class="item main"><i class="fa fa-link" aria-hidden="true"></i> <?=$row['cat_name']?> <span>234</span></a>
=======
				<a href="<?=$url?>" class="item main"><i class="fa fa-link" aria-hidden="true"></i> <?=$row['cat_name']?> <span><?=$row['cat_count']?></span></a>
>>>>>>> 12bb0cb9ff663446bb65b5a9c100a529c228166a
				<?
				}
				unset($db_qr,$row);
				?>
			</div>
		</div>
		<div class="main_tieubieu main">
			<div class="top">
				<span class="h_ding">Tiêu biểu tuần</span>
			</div>
			<div class="main">
				<?
				$db_qr = new db_query("SELECT new_id, new_title, new_title_rewrite FROM news ORDER BY new_view DESC LIMIT 10");
				While($row = mysql_fetch_assoc($db_qr->result)){
					if ($row['new_title_rewrite'] != '') {
					    $title_news = $row['new_title_rewrite'];
					}else{
					    $title_news = $row['new_title'];
					}
				?>
				<div class="main item"><a href="<?=rewriteBlog($row['new_id'],$title_news)?>"><?=$row['new_title']?></a></div>
				<?}?>
			</div>
		</div>
	</div>
</div>