<?
include("../home/config.php"); 
$page  = getValue('page','int','POST',0);
$page  = intval(@$page);
<<<<<<< HEAD
$curentPage = 9;
=======
$curentPage = 18;
>>>>>>> 12bb0cb9ff663446bb65b5a9c100a529c228166a
$pageab = abs($page - 1);
$start = $pageab * $curentPage;
$start = intval(@$start);
$start = abs($start);
$html = "";

$list_cv = new db_query("SELECT * FROM samplecv WHERE status = 1 ORDER BY serial DESC, timecreated DESC LIMIT ".$start . ",".$curentPage);
while($row = mysql_fetch_assoc($list_cv->result)) {
	?>
	<div class="item">
      <div class="cv_top">
        <img src="/images/load.gif" class="lazyload" data-src="../upload/maucv/<?=$row['alias']."/".$row['image']?>" alt="<?=$row['name']?>" title="<?=$row['name']?>" class="img-responsive">
        <div class="cv-overlay">
            <a onclick="showCV(<?=$row['id']?>)" class="show_Cv">Xem trước</a>
            <?
            if((!isset($_COOKIE['UT']) || $_COOKIE['UT'] == 1))
              echo '<a class="use_cv login_modal" onclick="hanld_login(this)" rel="nofollow" data-href="'.rewriteCreateCV($row["alias"],$row["id"]).'"> Dùng mẫu này</a>';
            else echo '<a class="use_cv" rel="nofollow" href="'.rewriteCreateCV($row["alias"],$row["id"]).'"> Dùng mẫu này</a>';
            ?>
        </div>
      </div>
      <div class="cv-bottom main">
        <h3 class="cv-title">
          <?=$row['name']?>
        </h3>
        <span class="label label-info">Miễn phí</span>
      </div>
    </div>
		<?
}
?>