<?
foreach ($db_blog as $type => $item) {
?>
    <article class="blog_news">
      <div class="header-folder">
          <h2><span><a href="/blog/c<?= $item['cat_id'] ?>/<?= replaceTitle($item['cat_name']) ?>" title="<?= $item['cat_name'] ?>"><?= $item['cat_name'] ?></a></span></h2>
          <nav>
              <a href="javascript:void(0);" class="toggle hidden-sm hidden-md hidden-lg" data-toggle="collapse" data-target="#tab<?=$item['cat_id'] ?>"><i class="fa fa-bars"></i></a>
              <ul id="tab<?=$item['cat_id'] ?>" class="collapse">
              <?
                $db_qrs = new db_query("SELECT cat_id,cat_name FROM categories_multi WHERE cat_parent_id = ".$item['cat_id']." ORDER BY cat_order ASC LIMIT 5");
                While($rows = mysql_fetch_assoc($db_qrs->result))
                {
              ?>
                  <li><h3><a href="/blog/c<?= $rows['cat_id'] ?>/<?= replaceTitle($rows['cat_name']) ?>"><?=$rows['cat_name'] ?></a></h3></li>
              <? } ?>
               </ul>
          </nav>
      </div>

      <div class="row">
          <?
            $db_qrm = new db_query("SELECT news.new_id,news.new_title,news.new_title_rewrite,news.new_picture,news.new_date,news.new_des,admin_user.adm_name, admin_user.adm_id FROM news INNER JOIN categories_multi ON news.new_category_id = categories_multi.cat_id JOIN admin_user ON news.admin_id = admin_user.adm_id WHERE news.new_active = 1 AND news.new_new = 0  AND (categories_multi.cat_id = ".$item['cat_id']." OR categories_multi.cat_parent_id = ".$item['cat_id']." ) ORDER BY news.new_order ASC, news.new_id DESC LIMIT 6");
            $row_m = mysql_fetch_assoc($db_qrm->result);

            if ($row_m['new_title_rewrite'] != '') {
                $title_news = $row_m['new_title_rewrite'];
            }else{
                $title_news = $row_m['new_title'];
            }
          ?>
          <div class="col-md-8 col-sm-7 col-12">
            <div class="group-item">
                <article class="blog_hot4">
                    <div class="img-responsive">
                        <a href="/blog/<?= replaceTitle($title_news)."-new".$row_m['new_id'] ?>.html" class="img-warpper cover">
                            <img src="/images/load.gif" class="lazyload" data-src="https://timviec365.com/pictures/news/<?=$row_m['new_picture'] ?>" alt='<?=$row_m['new_title'] ?>'>
                        </a>
                    </div>
                    <div class="info">
                        <span class="cate_blog"><?=$item['cat_name']?></span>
                        <span class="date"> | <?=date("d/m/Y",$row_m['new_date'])?> - <?=date("H:i",$row_m['new_date'])?></span>

                        <h3 class="title">
                            <a href="/blog/<?= replaceTitle($title_news)."-new".$row_m['new_id'] ?>.html"><?=$row_m['new_title'] ?></a>
                        </h3>
                        <p class="gt_news"><?=$row_m['new_des'] ?></p>
                        <p class="title_blog" style="margin-top: 10px;">Tác giả: <a href=""><span class="title_blog_dt"> <?= $row_m['adm_name'] ?></span></a></p>
                    </div>
                </article>
            </div>
          </div>

          <div class="col-md-4 col-sm-5 col-12">
            <?
            While($row_s = mysql_fetch_assoc($db_qrm->result))
            {
              if ($row_s['new_title_rewrite'] != '') {
                  $title_news = $row_s['new_title_rewrite'];
              }else{
                  $title_news = $row_s['new_title'];
              }
            ?>
            <div class="group-news row">
              <div class="col-xs-4 img">
                <a href="/blog/<?= replaceTitle($title_news)."-new".$row_s['new_id'] ?>.html" title='<?=$row_s['new_title'] ?>'>
                  <img src="/images/load.gif" class="lazyload" data-src="https://timviec365.com/pictures/news/<?=$row_s['new_picture']?>" alt="<?=$row_s['new_title'] ?>">
                </a>
              </div>
              <div class="col-xs-8 info">
                <span class="cate_blog">Tin tức</span>
                <span class="date"> | <?=date("d/m/Y",$row_s['new_date'])?></span>
                <p></p>Tác giả: <a href=""><span class="group-news_author"><?= $row_s['adm_name'] ?></span></a></p>
                <h3 class="title">
                    <a href="/blog/<?= replaceTitle($title_news)."-new".$row_s['new_id'] ?>.html" title='<?=$row_s['new_title'] ?>' ><?=$row_s['new_title'] ?></a>
                </h3>
              </div>
            </div>
            <? 
            } 
           ?>                                                             
          </div>

      </div>
    </article>
<? 
} 
?>                                    