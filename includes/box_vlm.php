      <h3 class="vlm_title">Việc Làm Mới Nhất</h3>
      <?
      $db_qrs = new db_query("SELECT new.new_id,usc_id,new_money,new_city,new_cap_bac,new_create_time,usc_create_time,usc_logo,usc_company,new_title,new_nganh,usc_alias FROM new STRAIGHT_JOIN user_company ON new_user_id = user_company.usc_id ORDER BY new.new_update_time DESC LIMIT 5");
      While($row = mysql_fetch_assoc($db_qrs->result))
      {
      ?>
      <div class="item_cate col-md-12 col-12">
         <div class="center_cate2">
            <a href="<?= rewriteNews($row['new_id'],$row['new_title']) ?>"  title="<?= $row["new_title"] ?>" class="title_cate"><?= cut_string($row["new_title"],35,'...') ?></a>

            <p><a class="company_cate" style="color:#4d4d4d" href="<?= rewrite_company($row['usc_id'],$row['usc_company'],$row['usc_alias']) ?>"  title="<?= name_company($row['usc_company']) ?>"><?= cut_string(name_company($row['usc_company']),35,'...') ?></a></p>
            <p>Địa điểm: 
               <? 
                 $duy_city = explode(',', $row['new_city']);
                 $name_city = array();
                 $i = 0;
                 foreach ($duy_city as $key) {
                     if ($i == 0) { 
                     ?>
                      <a href="<?= rewriteCate($key,$arrcity[$key]['cit_name']) ?>"  title="Việc làm <?= $key!=0?$arrcity[$key]['cit_name']:"Toàn quốc" ?>">Việc làm <?= $key!=0?$arrcity[$key]['cit_name']:"Toàn quốc" ?></a>
                     <? 
                     }else{
               ?>
                  ,<a href="<?= rewriteCate($key,$arrcity[$key]['cit_name']) ?>"  title="Việc làm <?= $key!=0?$arrcity[$key]['cit_name']:"Toàn quốc" ?>">Việc làm <?= $key!=0?$arrcity[$key]['cit_name']:"Toàn quốc" ?></a>
               <?  } 
                  $i++; 
               } ?>
            </p>

            <p>Mức lương: <?= $array_muc_luong[$row['new_money']] ?> <i style="color: #f16969;">(Cập nhật: <?= date("d/m/Y",$row['new_create_time']) ?>)</i></p>
         </div>
         <span class="chim_cate"></span>
      </div>
            <?
      }
      ?>
