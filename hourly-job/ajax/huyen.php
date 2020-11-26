<option value>--Chọn quận/huyện--</option>
<?php 
include("../home/config.php");
$idCity = getValue('idCity','int','POST',0);
$sql = "SELECT cit_name, cit_id FROM city2 WHERE cit_parent = ".$idCity;
$db_qr = new db_query($sql);
if($idCity != 0){
    While($row = mysql_fetch_assoc($db_qr->result)){
        echo '<option value="'.$row['cit_id'].'">'.$row['cit_name'].'</option>';
    }
}else echo '<option value>--Chọn quận/huyện--</option>';
?>