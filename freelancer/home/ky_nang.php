<!-- <?php 
	require_once 'config.php';
	$sql = "SELECT * FROM flc_ky_nang WHERE ma_linh_vuc  = ".$_POST["checkboxId"];

	$id = $_POST["checkboxId"];
	$db_qr = new db_query($sql);
	// While($dd = mysql_fetch_assoc($db_qr->result)){
	// // $dd = mysql_fetch_assoc($db_qr->result);
	// 	var_dump($dd['ma_ky_nang']	) ;
	// 	die();
	// }
	$characters = '0123456789';
	$random = '';
	for ($i = 0; $i < 4; $i++)
	    $random .= $characters[mt_Rand(0,9)];
	While($row = mysql_fetch_assoc($db_qr->result)){ ?>
		<div id="abc_<?php echo $id ?>" style="width: 50%; display: flex; float: left; padding-bottom: 10px;">
			<div class="G-div">
				<input value=" <?php echo $row['ma_ky_nang'] ?> " class="check1" onclick="getNameCheckBox(this,'checkbox_<?php echo $random ?>')" id="checkbox_<?php echo $random ?>" type="checkbox" name="ky_nang[]" data-name=" <?php echo $row['ten_ky_nang'] ?> ">
			</div>
			<div class="G-nd">
				<?php echo $row['ten_ky_nang'] ?>
			</div>
		</div>
	<?php } ?> -->

<?
	require_once 'config.php';

	$arr = getValue('arr','arr','POST','');
	var_dump($arr);

?>