<div class="box_new_news row" style="margin-top: 10px;">
  <p class="new_news_title">Tiêu biểu tuần</p>
  <?
  $db_qb = new db_query("SELECT new_id,new_title,new_title_rewrite,new_picture,new_date,cat_name,adm_name,adm_id FROM news INNER JOIN categories_multi ON news.new_category_id = categories_multi.cat_id JOIN admin_user ON news.admin_id = admin_user.adm_id WHERE new_active = 1 AND new_new = 0 ORDER BY new_hot DESC, new_id DESC LIMIT 6");
  While($rowb = mysql_fetch_assoc($db_qb->result))
    {
    if ($rowb['new_title_rewrite'] != '') {
        $title_new = $rowb['new_title_rewrite'];
    }else{
        $title_new = $rowb['new_title'];
    }

  ?>

  <div class="group-news col-md-6">
    <div class="col-xs-4 img">
      <a href="/blog/<?= replaceTitle($title_new)."-new".$rowb['new_id'] ?>.html">
        <img src="/images/load.gif" class="lazyload" data-src="https://timviec365.com/pictures/news/resize/<?=$rowb['new_picture'] ?>" alt="<?=$rowb['new_title'] ?>">
      </a>
    </div>
    <div class="col-xs-8 info">
      <h3 class="title">
          <a href="/blog/<?= replaceTitle($title_new)."-new".$rowb['new_id'] ?>.html" title="<?=$rowb['new_title'] ?>"><?=$rowb['new_title'] ?></a>
      </h3>   
      <p class="title_blog">Tác giả: <a href="<?= rewriteTacgia($rowb['adm_id'],$rowb['adm_name']) ?>"><span class="title_blog_dt"> <?= $rowb['adm_name'] ?> </span></a></p>                                       
      <span style="font-size: 12px">Ngày đăng:</span><span class="date"> <?=date("d/m/Y",$rowb['new_date'])?></span>
      
    </div>
  </div>
  <? } ?>
</div>