<div id="main-id" class="col-main pull-left col-md-12">
   <div id="main-cat-post-widget-2" class="main-cat-post main-cat-h3">      
   <div class="main_cate" style="margin-bottom: 0;">
      <?
      While($row = mysql_fetch_assoc($db_qr->result))
      {
      ?>
      <div class="item_cate col-md-6 col-12">
         <div class="img_cate">
            <?
            if($row['usc_logo'] != NULL && $row['usc_logo'] != '')
            {
            ?>
            <img src="/images/load.gif" class="lazyload" data-src="<?= geturlimageAvatar($row['usc_create_time']).$row['usc_logo'] ?>" onerror='this.onerror=null;this.src="/images/no-image.png";' onerror='this.onerror=null;this.src="/images/no-image.png";' alt="<?= name_company($row['usc_company'])?>"/>
            <?
            }
            else
            {
            ?>
            <img src="/images/load.gif" class="lazyload" data-src='/images/no-image.png' alt='no image'/>
            <?
            }
            ?>
         </div>
         <div class="center_cate">
            <a href="<?= rewriteNews($row['new_id'],$row['new_title']) ?>" rel="nofollow" title="<?= $row["new_title"] ?>" class="title_cate"><?= cut_string($row["new_title"],30,'...') ?></a>

            <p><a style="color:#4d4d4d" rel="nofollow" href="<?= rewrite_company($row['usc_id'],$row['usc_company'],$row['usc_alias']) ?>"  title="<?= name_company($row['usc_company']) ?>"><?= cut_string(name_company($row['usc_company']),33,'...') ?></a></p>
            <p>Địa điểm: 
               <? 
                 $duy_city = explode(',', $row['new_city']);
                 $name_city = array();
                 $i = 0;
                 foreach ($duy_city as $key) {
                     if ($i == 0) { 
                     ?>
                      <a rel="nofollow" href="<?= rewriteCate($key,$arrcity[$key]['cit_name'], $nganhnghe = 0, $catname= 0) ?>"  title="Việc làm <?= $key!=0?$arrcity[$key]['cit_name']:"Toàn quốc" ?>">Việc làm <?= $key!=0?$arrcity[$key]['cit_name']:"Toàn quốc" ?></a>
                     <? 
                     }else{
               ?>
                  ,<a rel="nofollow" href="<?= rewriteCate($key,$arrcity[$key]['cit_name'],$nganhnghe=0,$catname=0) ?>"  title="Việc làm <?= $key!=0?$arrcity[$key]['cit_name']:"Toàn quốc" ?>">Việc làm <?= $key!=0?$arrcity[$key]['cit_name']:"Toàn quốc" ?></a>
               <?  } 
                  $i++; 
               } ?>
            </p>

            <p>Mức lương: <?= $array_muc_luong[$row['new_money']] ?> <i style="color: #f16969;">(Hạn nộp: <?= date("d/m/Y",$row['new_han_nop']) ?>)</i></p>
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
      echo generatePageBar2('',$page,$curentPage,$count,'https://timviec365.com','?','','jp-current','preview','<','next','>','first','Đầu','last','Cuối');
      ?>
      </div>
   </div>


   </div>
   
</div>