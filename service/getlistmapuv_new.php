<?
include("../home/config.php");
$lat = getValue("lat","str","POST","");
$lat = replaceMQ(trim($lat));
$long = getValue("long","str","POST","");
$long = replaceMQ(trim($long));
$km = getValue("km","str","POST",0);
$catid = getValue("catid","str","POST",0);
$catid = (int)$catid;
$r = array();
$sql = '';
if($catid > 0)
{
	$sql .= " AND FIND_IN_SET('".$catid."',use_nganh_nghe)";
}
if($lat != '' && $long != '' && $km > 0)
{
	$time = time() - 2592000;
	$db_qr = new db_query("SELECT user.use_id,use_name,use_job_name,use_create_time,use_update_time,use_logo,gender,use_city,use_nganh_nghe,use_district_job,use_view_count,salary,use_lat,use_long,( 3959 * acos( cos( radians($lat) ) * cos( radians( use_lat ) )
							* cos( radians( use_long ) - radians($long) ) + sin( radians($lat) ) * sin(radians(use_lat)) ) ) AS distance
							FROM user
							WHERE use_update_time>=$time $sql
							HAVING distance < $km
							ORDER BY distance
							LIMIT 50");
	if(mysql_num_rows($db_qr->result) > 0)
	{
		While($row = mysql_fetch_assoc($db_qr->result))
		{
			// $ar = array();
			// $base_logo = $row['use_logo'];
			// $use_logo = $row['use_logo'];
			// // if($row['use_logo']!=''){
			// //     $logo = '..'.getlogouv($row['use_create_time']).$row['use_logo'];
			// // 	if(file_exists($logo)){
			// // 		$base_logo = str_replace('..','https://timviec365.vn', $logo);
			// // 		$use_logo = gethumbnail($logo,$row['use_logo'],$row['use_create_time'],40,40,85);
			// // 		if(file_exists($use_logo)){
			// // 			$use_logo = str_replace('..','https://timviec365.vn', $use_logo);
			// // 		}else{
			// // 			$use_logo = null;
			// // 		}
			// // 	}
			// // }
			// $ar['use_logo_thumb'] = $use_logo;
			// $ar['use_logo'] = $base_logo;
			// $ar['use_id'] = $row['use_id'];
			// $ar['use_phone'] = $row['use_phone'];
			// $ar['use_first_name'] = $row['use_first_name'];
			// $ar['use_create_time'] = $row['use_create_time'];
			// $ar['use_gioi_tinh'] = $row['use_gioi_tinh'];
			// $ar['cv_exp'] = $row['cv_exp'];
			// $ar['cv_money_id'] = $row['cv_money_id'];
			// $ar['use_lat'] = $row['use_lat'];
			// $ar['use_long'] = $row['use_long'];
			// $ar['cv_title'] = $row['cv_title'];
			// $ar['use_view'] = $row['use_view'];
			// $ar['distance'] = $row['distance'];
		    $r[] = $row;
		}
		echo json_encode($r);
	}
	else
	{
		echo json_encode($r);
	}
}
else
{
	echo 2;
}
?>
