<div id="main-id" class="col-main pull-left col-md-12">
   <div id="main-cat-post-widget-2" class="main-cat-post main-cat-h3">      
   <div class="main_cate" style="margin-bottom: 0;">
      <?
      While($row = mysql_fetch_assoc($db_qr->result))
      {
      ?>
      <div class="item_cate col-md-6">
         <div class="img_cate">
            <?
            if($row['use_logo'] != NULL && $row['use_logo'] != '')
            {
            ?>
            <img src="<?= geturlimageAvatar($row['use_create_time']).$row['use_logo'] ?>" onerror='this.onerror=null;this.src="/images/no-image.png";' alt="<?= name_company($row['usc_company'])?>"/>
            <?
            }
            else
            {
            ?>
            <img src='/images/dk_s.png' alt='no image'/>
            <?
            }
            ?>
         </div>
         <div class="center_cate">
            <a href="<?= rewriteUV($row['use_id'],$row['use_name']) ?>"  title="<?= $row["use_job_name"] ?>" class="title_cate"><?= cut_string($row["use_job_name"],30,'...') ?></a>

            <p><a style="color:#4d4d4d" href="<?= rewriteUV($row['use_id'],$row['use_name']) ?>"  title="<?=$row['use_name']; ?>"><?=$row['use_name']; ?></a></p>

            <p>Mức lương: <?= ($row['salary'] != '')?$array_muc_luong[$row['salary']]:'Xem trong CV' ?> <i style="color: #f16969;">(Cập nhật: <?= date("d/m/Y",$row['use_update_time']) ?>)</i></p>
            <p>Địa điểm: 
               <?
                  $arr = explode(',', $row['use_district_job']);
                  $db_cit = new db_query("SELECT * FROM city");
                  while ($row_cit = mysql_fetch_array($db_cit->result)) {
                     if(in_array($row_cit['cit_id'], $arr))
                     {
               ?>
                     <a href="<?= rewriteCateUV($row_cit['cit_id'],$row_cit['cit_name'], $nganhnghe = 0, $catname= 0)?>"><?= $row_cit['cit_name'] ?></a>
               <?
                     }
                  }
               ?>
            </p>
         </div>
         <span class="chim_cate"></span>
      </div>
      <?
      }
      ?>
   </div>
   <div class="pagination_wrap clr">
      <div class="clr">

      <?
      $urlcano = $_SERVER['REQUEST_URI'];
      $urlcano = str_replace("?page=".$page, "", $urlcano);
      $urlcano = str_replace("&page=".$page, "", $urlcano);
      $urlcano = str_replace("page=".$page, "", $urlcano);
      if (strlen(strstr($urlcano, '?')) > 0) {
        echo generatePageBar2('',$page,$curentPage,$count,$urlcano,'&','','jp-current','preview','<','next','>','first','Đầu','last','Cuối');
      }else{
        echo generatePageBar2('',$page,$curentPage,$count,$urlcano,'?','','jp-current','preview','<','next','>','first','Đầu','last','Cuối');
      }
      ?>
      </div>
   </div>
   </div>
   
</div>