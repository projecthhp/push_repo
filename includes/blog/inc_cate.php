<div id="category-list-sidebar-widget-2" class="category-list-sidebar sidebar-h3">
         <h3><span>Danh mục</span></h3>

         <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
         <?
         foreach ($db_blog as $type => $item) {
         ?>            
            <div class="panel panel-default panel-wrap">
               <div class="panel-heading panel-sidebar" role="tab" id="heading-2">
                  <h4 class="panel-title">
                     <a  title="<?= $item['cat_name'] ?>" href="/blog/c<?= $item['cat_id'] ?>/<?= replaceTitle($item['cat_name']) ?>"><?= $item['cat_name'] ?></a>
                  </h4>
               </div>
            </div>
         <? } ?>
         </div>
</div>