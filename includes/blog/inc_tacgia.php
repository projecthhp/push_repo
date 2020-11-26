<ul class="breadcrumb" >
	<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
	<a href="https://timviec365.com" itemprop="item">
	<span itemprop="name">Trang chủ</span> </a> 
	<meta itemprop="position" content="1"></li>
	<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
	<a href="https://timviec365.com/blog/" itemprop="item">
	<span itemprop="name">Blog</span></a> 
	<meta itemprop="position" content="2"></li>
	<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
	<a href="<?= rewriteTacgia($row_author['adm_id'],$row_author['adm_name']);?>" itemprop="item">
	<span itemprop="name"><?=$row_author['adm_name'] ?></span></a> 
	<meta itemprop="position" content="3"></li>
</ul>
<div class="list_news_author row">
	<?
		$numrow = new db_query("SELECT count(1) FROM news WHERE new_active = 1 AND new_new = 0 AND admin_id = ".$id."");
        $count = mysql_fetch_assoc($numrow->result);
    	$count = $count['count(1)'];
		while($row = mysql_fetch_array($sql_get->result)){
	?>
	<div class="col-md-6 item_new">
		<div class="img_thumb">
			<img src="/images/load.gif" class="lazyload" data-src="<?= "https://timviec365.com/pictures/news/".$row['new_picture'] ?>">
		</div>
		<div class="information_news">
			<p class="title">
				<a href="/blog/<?= replaceTitle($row['new_title'])."-new".$row['new_id'] ?>.html"><?= $row['new_title'] ?></a>
			</p>
			<p class="time">
				Ngày đăng: <span><?= date('d/m/Y',$row['new_date']); ?></span>
			</p>
			<!-- <p class="author">
				Tác giả: <a href=""><?= $row['adm_name'] ?></a>
			</p> -->
			<p class="description">
				<?= cut_string($row['new_des'],'120','...') ?>
			</p>
		</div>
	</div>
	<?
		}
	?>
	<div class="pagination_wrap clr">
		<div class="clr">
		<?
		echo generatePageBar2('',$page,$curentPage,$count,$urlcano,'?','','jp-current','preview','<','next','>','first','Đầu','last','Cuối');
		?>
		</div>
	</div>
</div>