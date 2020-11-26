<option disabled selected value="">---Chọn Quận/Huyện---</option>
<?php 

	require_once 'config.php';
	$sql = "SELECT * FROM city2 WHERE cit_parent = ".$_POST["thanh_phoId"];
	$db_qr = new db_query($sql);
	While($row = mysql_fetch_assoc($db_qr->result)){
	    echo '<option value="'.$row["cit_id"].'">'.$row["cit_name"].'</option>';
	}
?>
