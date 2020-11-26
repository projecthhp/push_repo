<div class="box_view_blog tieubieu">
    <h3 class="td">Tiêu biểu tuần</h3>
    <div class="main">
    <?
        $db_qr = new db_query("SELECT * FROM news JOIN admin_user ON news.admin_id = admin_user.adm_id WHERE new_active = 1 AND new_new = 0 ORDER BY new_hot DESC, new_id DESC LIMIT 5");
        $i = 1;
        while($row_bl = mysql_fetch_array($db_qr->result)){
        if ($row_bl['new_title_rewrite'] != '') {
            $title_news = $row_bl['new_title_rewrite'];
        }else{
            $title_news = $row_bl['new_title'];
        }
        if($i == 1){
    ?>
        <div class="item_newst main">
            <div class="thumb_img">
                <img src="/images/load.gif" class="lazyload" data-src="https://timviec365.com/pictures/news/<?=$row_bl['new_picture'] ?>" alt="<?=$row_bl['new_title'] ?>">
            </div>
            <div class="thub_content">
                <a class="title_view" href="<?=rewriteBlog($row_bl['new_id'],$title_news)?>"><?= $row_bl['new_title']?></a>
                <p class="author_bl"><a href="<?=rewriteTacgia($row_bl['adm_id'],$row_bl['adm_name'])?>"><?=$row_bl['adm_name'] ?></a><?=date('d/m/Y',$row_bl['new_date'])?></p>
            </div>
            <div class="cate_sapo">
                <?=$row_bl['new_des']?>
            </div>
        </div>
    <?
            }
            else{
    ?>
        <div class="item">
            <a class="title_view" href="<?=rewriteBlog($row_bl['new_id'],$title_news)?>"><i class="icon_blog"></i><?= $row_bl['new_title'] ?></a>
        </div>
    <?
            }
            $i++;
        }
    ?>
    </div>
</div>