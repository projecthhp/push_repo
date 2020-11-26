<?
	include('../home/config.php');
	$page = getValue('page','int','POST',0);
	$idCat = getValue('idCat','int','POST',0);
	if($page != 0 && $idCat != 0){
		$curentPage = 24;
		$pageab = abs($page - 1);
		$start = $pageab * $curentPage;
		$start = intval(@$start);
		$start = abs($start);
		$db_qr = new db_query("SELECT new.new_id,usc_id,new_money,new_city,new_cap_bac,new_create_time,usc_create_time,usc_logo,usc_company,new_title,new_nganh,usc_alias,new.new_han_nop,new_alias FROM new STRAIGHT_JOIN user_company ON new_user_id = user_company.usc_id WHERE 1 AND FIND_IN_SET('".$idCat."',new_cat_id) ORDER BY new_hot DESC, new_update_time DESC LIMIT ".$start.",".$curentPage);
		While($row = mysql_fetch_array($db_qr->result)){
?>
	<div class="item">
            <div class="logo">
            <img src="/images/load.gif" class="lazyload" data-src="<?= str_replace('../', $domain.'/', geturlimageAvatar($row['usc_create_time']).$row['usc_logo'])  ?>" onerror='this.onerror=null;this.src="/images/logo-new.png";' alt="<?= $row['usc_company'] ?>">
            </div>
            <div class="content-right">
                <div class="left">
                    <a href="<?= rewriteNews($row['new_id'],$row['new_title'],$row['new_alias']) ?>"><h3 class="title_new"><?= $row['new_title'] ?></h3></a>
                    <a href="<?= rewrite_company($row['usc_id'],$row['usc_company'],$row['usc_alias']) ?>" class="name_company"><?= name_company($row['usc_company']) ?></a>
                </div>
                <div class="right">
                    <p class="p_dd"><i class="fa fa-map-marker" aria-hidden="true"></i> 
                    <?
                    $arr_city = explode(',', $row['new_city']);
                    $new_city = [];
                    foreach ($arr_city as $key => $val) {
                        $new_city[] = $arrcity[$val]['cit_name'];
                    }
                    $new_city = implode(', ', $new_city);
                    echo $new_city;
                    ?>
                    </p>
                    <div class="p_salary"><i class="salary"></i> <?= $array_muc_luong[$row['new_money']]?></div>
                    <p class="p_time"><i class="time"></i><?= date('d/m/Y',$row['new_han_nop']) ?></p>
                </div>
            </div>
        </div>
<?
		}
	}
?>