<?
	include('../home/config.php');

	$cate = getValue('cate','int','POST',0);
	$city = getValue('city','int','POST',0);
	$idco = getValue('idco','int','POST',0);
	$sql = "";

	if($cate != 0) $sql .= " AND FIND_IN_SET('".$cate."',new_cat_id) ";
	if($city != 0) $sql .= " AND FIND_IN_SET('".$city."',new_city) ";
	
	if($cate != 0 || $city != 0){
		$db_qr = new db_query("SELECT new_id,new_title,new_money,new_city,new_han_nop FROM new WHERE 1 ".$sql." AND new_user_id = ".$idco." ");
		if(mysql_num_rows($db_qr->result) > 0){
			While($rows = mysql_fetch_assoc($db_qr->result)){
?>
	<div class="item main">
		<div class="logo">
			<img class="lazyload" data-src="<?= geturlimageAvatar($row['usc_create_time']).$row['usc_logo'] ?>"  onerror='this.onerror=null;this.src="/images/logo-new.png";' alt="<?= name_company($row['usc_company'])?>" src="/images/load.gif">
		</div>
		<div class="center">
			<a href="<?= rewriteNews($rows['new_id'],$rows['new_title'],$rows['new_alias']) ?>" class="title_new"><?= $rows['new_title'] ?></a>
			<p class="times"><?= date('d/m/Y',$rows['new_han_nop']) ?></p>
			<p class="money"><?= $array_muc_luong[$rows['new_money']] ?></p>
			<p class="ddiem">
			<?
			if($rows['new_city'] != 0){
				$arr_city = explode(',', $rows['new_city']);
				$name_city = "";
				foreach ($arr_city as $key => $value) {
					$name_city .= $arrcity[$value]['cit_name'].'  ';
				}
				echo $name_city;
			}else{
				echo "Toàn quốc";
			}
			?>	
			</p>
		</div>
		<div class="right">
			<a class="apply"><i class="icon"></i>Ứng tuyển ngay</a>
		</div>
	</div>
<?
			}
		}
	}
?>