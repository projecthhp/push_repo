<?
include("../home/config.php");
$lat = getValue("lat","str","POST","");
$lat = replaceMQ(trim($lat));
$long = getValue("long","str","POST","");
$long = replaceMQ(trim($long));
$km = getValue("km","str","POST",0);
$iduser = getValue("iduser","int","POST",0);
$iduser = (int)$iduser;
$catid = getValue("catid","str","POST",0);
$catid = (int)$catid;
$start = getValue("start","int","POST",0);
$start = (int)$start;
$current = getValue("curent","int","POST",20);
$current = (int)$current;
$r = array();
$sql = '';
if($catid > 0)
{
	$sql .= " AND new_cat_id = ".$catid;
}
if($lat != '' && $long != '' && $km > 0)
{
$sql = "SELECT new.new_id,usc_id,new_money,new_city,new_cap_bac,new_update_time,usc_create_time,usc_logo,usc_company,new_title,new_nganh,new_han_nop,new_view_count,new_hot,usc_lat,usc_long,( 3959 * acos( cos( radians($lat) ) * cos( radians( usc_lat ) ) * cos( radians( usc_long ) - radians($long) ) + sin( radians($lat) ) * sin(radians(usc_lat)) ) ) AS distance 
		FROM user_company, new
		WHERE user_company.usc_id = new.new_user_id 
		AND new_han_nop >= ".time()." $sql 
		GROUP BY new.new_id HAVING distance < $km";	
$sql .= " ORDER BY new_update_time DESC";
$sql .= " LIMIT ".$start.",".$current;
	$db_qr = new db_query($sql);
	if(mysql_num_rows($db_qr->result) > 0)
	{
		While($row = mysql_fetch_assoc($db_qr->result))
		{
			//Check viewed
			// $viewed = '0';
			// if($iduser>0){
			// 	$chk_view = new db_query("SELECT uid FROM tbl_viewed WHERE type=2 AND uid = ".$iduser.' AND view_id = '.$row['new_id']);      
		    //   	if(mysql_num_rows($chk_view->result) > 0){
		    //     	$viewed = '1';
		    //   	}
	      	// }
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
			// $ar['usc_address'] = $row['usc_address'];
			// $ar['usc_company_info'] = $row['usc_company_info'];
			// $ar['new_mota'] = $row['new_mota'];			
			// $ar['new_id'] = $row['new_id'];
			// $ar['new_title'] = $row['new_title'];
			// $ar['new_money'] = $row['new_money'];
			// //$ar['usc_lat'] = $row['usc_lat'];
			// //$ar['usc_long'] = $row['usc_long'];
			// $ar['usc_name'] = $row['usc_name'];
			// $ar['new_view_count'] = $row['new_view_count'];
			// $ar['new_han_nop'] = $row['new_han_nop'];
			// $ar['new_update_time'] = $row['new_update_time'];
			// $ar['new_so_luong'] = $row['new_so_luong'];
			// $ar['distance'] = $row['distance'];
			// if($iduser>0){
			// 	$ar['viewed'] = $viewed;
			// }
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
