<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("config.php"); 
// require_once("functions/simple_html_dom.php");
$dom = new DOMDocument('1.0', 'UTF-8');
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

$lat = $_GET['lat'];
$long = $_GET['long'];
$gettime = time();
$query = "SELECT
    DISTINCT u.usc_id, 
    n.new_id,
    n.new_title,
    n.new_money,
    n.new_exp,
    n.new_gioi_tinh,
    n.new_hinh_thuc,
    n.new_han_nop,

    u.usc_create_time,
    u.usc_logo,
    u.usc_alias,
    u.usc_address,
    u.usc_company,
    u.usc_lat,
    u.usc_long, 
      ( 3959 * acos( cos( radians('$lat') ) * cos( radians( u.usc_lat ) ) * cos( radians( u.usc_long ) - radians('$long') ) + sin( radians('$lat') ) * sin(radians(u.usc_lat)) ) )
      AS distance 
      FROM new as n left join user_company as u on n.new_user_id = u.usc_id
    WHERE
      1 AND n.new_han_nop >='".$gettime."'";
  if(isset($job) and $job!='' and $job > 0){
    $query .= " AND n.new_title like '%".$job."%'";
  }
  if(isset($cate) and $cate > 0){
    $query .= " AND FIND_IN_SET('".$cate."',n.new_cat_id)";
  }
  // if(isset($cate) and $cate>0){
  //  $query .= " AND FIND_IN_SET('$cate',n.new_city)";
  // }
  $query .= " AND n.new_title!='' 
        AND u.usc_company !='' 
        AND u.usc_address!='' 
        AND u.usc_lat !='' 
        AND u.usc_long !='' ";
  if(isset($icode) and $icode>0){
    $query .="AND FIND_IN_SET('".$icode."',n.new_city) ";
  }
  $query .="GROUP BY u.usc_lat,u.usc_long ";
  if(isset($km) and $km>0){
      $query .= " HAVING distance <= '".$km."'";
  }
  $query .= " ORDER BY distance ASC, u.usc_update_time DESC LIMIT 50";

$result = new db_query($query);



header ("Content-Type: application/xml; charset=utf-8");
/*Iterate through the rows, adding XML nodes for each*/
  if(mysql_num_rows($result->result)>0)
  {
    while ($row = mysql_fetch_assoc($result->result)){    
      $viewed = 0;
      if(isset($_COOKIE['UID']) and $_COOKIE['UT']==1){
        $chk_view = new db_query("SELECT uid FROM tbl_viewed WHERE type=1 AND uid = ".$_COOKIE['UID'].' AND view_id = '.$row['usc_id']);      
        if(mysql_num_rows($chk_view->result) > 0){
          $viewed = 1;
        }
      }
      /*ADD TO XML DOCUMENT NODE  */  
      $lat1=$row['usc_lat']; 

      $lon1=$row['usc_long'];  
  if( $row['usc_logo'] !=''){
        /* Use customIcons*/
        $image = geturlimageAvatar($row['usc_create_time']) . $row['usc_logo'];
        if(!file_exists($image)){
          $image = "https://timviec365.com.vn/images/logo-congtynb.png";
        }
        $gt = 4;
      }
      else
      {
        $image = "https://timviec365.com.vn/images/logo-congtynb.png";
        $gt = 4;
      }    
    $loaihinh = $row['new_hinh_thuc'] != 0?$array_hinh_thuc[$row['new_hinh_thuc']]:"Chưa cập nhật";
    $cv_title = str_replace('','',$row['new_title']);
    if($loaihinh==''){$loaihinh = 'Chưa cập nhật';}
    $price = $array_muc_luong[$row['new_money']];
    if($price =='Chọn mức lương' or $price==''){$price = 'Xem CV';}
    $link = rewriteNews($row['new_id'],$row['new_title']);
    $exp = $row['new_exp']==0?'Chi tiết trong CV':$array_kinh_nghiem_uv[$row['new_exp']];

    $node = $dom->createElement("marker");
    $newnode = $parnode->appendChild($node);
      $newnode->setAttribute("cv_title",replaceMQ(parseToXML($cv_title)));
      $newnode->setAttribute("name",replaceMQ(parseToXML($row['usc_company'])));
      $newnode->setAttribute("price", $price);
      $newnode->setAttribute("exp", $exp);
      $newnode->setAttribute("image", $image);
      $newnode->setAttribute("diadiem", $row['usc_address']);
      $newnode->setAttribute("loaihinh", $loaihinh);
      $newnode->setAttribute("capnhat", date('d/m/Y',$row['new_han_nop']));
      $newnode->setAttribute("link", parseToXML($link));
      $newnode->setAttribute("lat", $lat1);
      $newnode->setAttribute("lng", $lon1);
      $newnode->setAttribute("viewed", $viewed);
      $newnode->setAttribute("type", 'icon'.$gt);;
  }  
  echo $dom->saveXML();


}


function parseToXML($htmlStr)
{
  $xmlStr=str_replace('<','&lt;',$htmlStr);
  $xmlStr=str_replace('>','&gt;',$xmlStr);
  $xmlStr=str_replace('"','&quot;',$xmlStr);
  $xmlStr=str_replace("'",'&#39;',$xmlStr);
  $xmlStr=str_replace("&",'&amp;',$xmlStr);
  return $xmlStr;
}
?>
