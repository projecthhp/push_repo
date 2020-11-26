<div id="main-right-id" class="col-home-left  pull-right col-md-4">
   <aside id="site-sidebar" class="sidebar-box">
      <div id="category-list-sidebar-widget-2" class="category-list-sidebar sidebar-h3">
         <h3><span>Danh mục</span></h3>
         <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <?
            $db_qr = new db_query("SELECT cat_id,cat_name FROM category");
            While($row = mysql_fetch_assoc($db_qr->result))
            {
            ?>
            <div class="panel panel-default panel-wrap">
               <div class="panel-heading panel-sidebar" role="tab" id="heading-2">
                  <h4 class="panel-title">
                     <a rel="nofollow" title="<?= $row['cat_name'] ?>" href="<?= list_cate_par($row['cat_id'],$row['cat_name']) ?>"><?= $row['cat_name'] ?></a>
                  </h4>
               </div>
            </div>
            <?   
            }
            unset($db_qr,$row);
            ?>
         </div>
         <div class="clear"></div>
      </div>
      <div id="sidebar-post-widget-2" class="sidebar-posts sidebar-h3">
         <h3><span>Bài viết mới nhất</span></h3>
         <ul>
            <?
            $db_qr = new db_query("SELECT * FROM news ORDER BY new_id DESC LIMIT 10");
            While($row = mysql_fetch_assoc($db_qr->result))
            {
            ?>
            <li class="postf-li">
               <div class="post-sidebar-thumb pull-right">
               <a title="<?= $row['new_title'] ?>" href="<?= rewrite_news($row['new_title'],$row['new_id']) ?>"><img src="<?= "/pictures/news/".$row['new_picture'] ?>" class="attachment-latest_thumbnail size-latest_thumbnail wp-post-image" alt="<?= $row['new_title'] ?>" /></a></div>
               <h4><a title="<?= $row['new_title'] ?>" href="<?= rewrite_news($row['new_title'],$row['new_id']) ?>"><?= $row['new_title'] ?></a></h4>
            </li>
            <?
            }
            unset($db_qr,$row);
            ?>
         </ul>
         <div class="clear"></div>
      </div>
      <div id="posts-popular-widget-2" class="posts-popular sidebar-h3">
         <h3><span>Bài được quan tâm</span></h3>
         <ul>
            <?
            $db_qr = new db_query("SELECT * FROM news ORDER BY new_view_count DESC LIMIT 5");
            While($row = mysql_fetch_assoc($db_qr->result))
            {
            ?>
            <li>
               <h4><a title="<?= $row['new_title'] ?>" rel="" href="<?= rewrite_news($row['new_title'],$row['new_id']) ?>"><?= $row['new_title'] ?></a></h4>
               <span class="date-meta"><i class="fa fa-clock-o" aria-hidden="true"></i> &nbsp <?= date("Y-m-d",$row['new_date']) ?></span>
            </li>
            <?
            }
            unset($db_qr,$row);
            ?>
         </ul>
         <div class="clear"></div>
      </div>
   </aside>
</div>