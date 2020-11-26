<?
include("../home/config.php");

$db_qr = new db_query("SELECT cit_id FROM city");

While($row = mysql_fetch_assoc($db_qr->result))
{
	$db_qrs = new db_query("SELECT COUNT(new_id) FROM new STRAIGHT_JOIN user_company ON new_user_id = user_company.usc_id  WHERE FIND_IN_SET('".$row['cit_id']."' , new_city) AND new_active = 1");
	$rows = mysql_fetch_assoc($db_qrs->result);

	$db_qrt = new db_query("SELECT COUNT(use_id) FROM user WHERE FIND_IN_SET('".$row['cit_id']."' , use_district_job) ");
	$rowt = mysql_fetch_assoc($db_qrt->result);

	$db_ex = new db_execute("UPDATE city SET cit_count_vl = '".$rows['COUNT(new_id)']."',cit_count = '".$rowt['COUNT(use_id)']."' WHERE cit_id = '".$row['cit_id']."'");

}

unset($db_qr,$row,$db_qrs,$rows,$db_qrt,$rowt,$db_ex);


$db_qr = new db_query("SELECT cat_id FROM category");

While($row = mysql_fetch_assoc($db_qr->result))
{
	$db_qrs = new db_query("SELECT COUNT(new_id) FROM new STRAIGHT_JOIN user_company ON new_user_id = user_company.usc_id  WHERE FIND_IN_SET('".$row['cat_id']."' , new_cat_id) AND new_active = 1");
	$rows = mysql_fetch_assoc($db_qrs->result);

	$db_qrt = new db_query("SELECT COUNT(use_id) FROM user WHERE FIND_IN_SET('".$row['cat_id']."' , use_nganh_nghe) ");
	$rowt = mysql_fetch_assoc($db_qrt->result);

	$db_ex = new db_execute("UPDATE category SET cat_count_vl = '".$rows['COUNT(new_id)']."',cat_count = '".$rowt['COUNT(use_id)']."' WHERE cat_id = '".$row['cat_id']."'");

}

$db_qr = new db_query("SELECT cat_id FROM categories_multi");
While($row = mysql_fetch_assoc($db_qr->result)){
	$db_qrs = new db_query("SELECT count(*) FROM news WHERE new_category_id = ".$row['cat_id']);
	$rows = mysql_fetch_assoc($db_qrs->result);

	$db_ex = new db_execute("UPDATE categories_multi SET cat_count = ".$rows['count(*)']." WHERE cat_id = ".$row['cat_id']);
}

$time = time() - 259200;
$db_qr = new db_query("SELECT use_id FROM user WHERE use_create_time >= ".$time);
While($row = mysql_fetch_assoc($db_qr->result)){
	update('user',['use_update_time'=>time()],['use_id'=>$row['use_id']]);
}
echo 'đã hoàn thành';

?>