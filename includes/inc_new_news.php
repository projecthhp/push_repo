<h3 class="td">Tiêu biểu tuần</h3>
					
					<div class="main">
					<?
						$db_qr = new db_query("SELECT * FROM news JOIN admin_user ON news.admin_id = admin_user.adm_id WHERE new_active = 1 AND new_new = 0 ORDER BY new_hot DESC, new_id DESC LIMIT 4");
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
							<p class="title_blog"><a href="<?=rewriteBlog($row_bl['new_id'],replaceTitle($title_news))?>"><?= cut_string($row_bl['new_title'],120,'...')?></a></p>
						</div>
					<?
							}
							else{
					?>
						<div class="item">
							<div class="col-md-5 col-sm-5 thumb_img">
								<img src="/images/load.gif" class="lazyload" data-src="https://timviec365.com/pictures/news/<?=$row_bl['new_picture'] ?>" alt="<?=$row_bl['new_title'] ?>">
							</div>
							<div class="col-md-7 col-sm-7">
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