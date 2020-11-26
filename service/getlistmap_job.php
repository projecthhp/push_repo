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
	$sql .= " AND new_cat_id = ".$catid;
}
if($lat != '' && $long != '' && $km > 0)
{
	$db_qr = new db_query("SELECT new.new_id,usc_id,new_money,new_city,new_cap_bac,new_update_time,usc_create_time,usc_logo,usc_company,new_title,new_nganh,new_han_nop,new_view_count,new_hot,usc_lat,usc_long,( 3959 * acos( cos( radians($lat) ) * cos( radians( usc_lat ) ) 
							* cos( radians( usc_long ) - radians($long) ) + sin( radians($lat) ) * sin(radians(usc_lat)) ) ) AS distance 
							FROM new STRAIGHT_JOIN user_company ON new_user_id = user_company.usc_id
							WHERE new_han_nop >= ".time()." $sql 
							HAVING distance < $km 
							ORDER BY distance
							LIMIT 50");
	if(mysql_num_rows($db_qr->result) > 0)
	{
		While($row = mysql_fetch_assoc($db_qr->result))
		{
			// $ar = array();
			// $logo = geturlimageAvatar($row['usc_create_time']).$row['usc_logo'];
			// if(file_exists($logo) and $row['usc_logo']!=''){				
			// 	$new_logo = gethumbnail($logo,$row['usc_logo'],$row['usc_create_time'],52,52,85);
			// 	if(file_exists($new_logo)){
			// 		$new_logo = str_replace('..','https://timviec365.vn', $new_logo);
			// 	}else{
			// 		$new_logo = null;
			// 	}
			// }else{
			// 	$new_logo = null;
			// }
			// $ar['usc_logo'] = $new_logo;
			// $ar['usc_company'] = $row['usc_company'];
			// $ar['new_id'] = $row['new_id'];
			// $ar['new_title'] = $row['new_title'];
			// $ar['new_money'] = $row['new_money'];
			// $ar['usc_lat'] = $row['usc_lat'];
			// $ar['usc_long'] = $row['usc_long'];
			// $ar['usc_create_time'] = $row['usc_create_time'];
			// $ar['new_view_count'] = $row['new_view_count'];
			// $ar['new_han_nop'] = $row['new_han_nop'];
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
