<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("config.php"); 
$dom = new DOMDocument('1.0', 'UTF-8');
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

$lat = $_GET['lat'];
$long = $_GET['long'];
$gettime = time();
$query ="SELECT
    use_id,
    use_name,
    gender,
    use_create_time,
    use_job_name,
    exp_years,
    salary,
    use_update_time,
    work_option,
    use_logo,
    use_lat,
    use_long,
    (
        3959 * ACOS(
            COS(RADIANS($lat)) * COS(RADIANS(use_lat)) * COS(
                RADIANS(use_long) - RADIANS($long)
            ) + SIN(RADIANS($lat)) * SIN(RADIANS(use_lat))
        )
    ) AS DISTANCE
FROM
    user
WHERE
    use_update_time < ".$gettime."";
if(isset($_GET['job']) and $_GET['job']!=''){
  $query .= " AND use_job_name like '%".$_GET['job']."%'";
}
if(isset($_GET['cate']) and $_GET['cate']>0){
  $query .= "AND FIND_IN_SET(".$_GET['cate'].",use_nghanh_nghe)";
}
$query .= " AND use_job_name!='' AND use_name!='' AND address!='' AND use_lat !=''  AND use_long !='' ";
if(isset($_GET['code']) and $_GET['code']>0){
  $query .="AND FIND_IN_SET('".$_GET['code']."',use_district_job) ";
}
$query .="GROUP BY user.use_lat,user.use_long ";
if(isset($_GET['km']) and $_GET['km']>0){  
  $query .= " HAVING distance <= ".$_GET['km'];
}
$query .= " ORDER BY distance ASC, use_update_time DESC LIMIT 50";
$result = new db_query($query);
function rewrite_url_candidate($id,$title)
{
    $alas = replaceTitle($title);
    $alas = substr($alas,0,55);
    if ($alas == '') {
    $alas = '/ung-vien-nuoc-ngoai';
    }
    $candidate ="/ung-vien/".$alas. "-uv" . $id.".html";
    return $candidate;
}
header ("Content-Type: application/xml; charset=utf-8");
/*Iterate through the rows, adding XML nodes for each*/
if(mysql_num_rows($result->result)>0)
{

  while ($row = mysql_fetch_assoc($result->result)){    
    $viewed = 0;
    if(isset($_COOKIE['UID']) and $_COOKIE['UT']==1){
      $chk_view = new db_query("SELECT uid FROM tbl_viewed WHERE type=1 AND uid = ".$_COOKIE['UID'].' AND view_id = '.$row['use_id']);      
      if(mysql_num_rows($chk_view->result) > 0){
        $viewed = 1;
      }
    }
    /*ADD TO XML DOCUMENT NODE  */  
    $lat1=$row['use_lat'];  
    $lon1=$row['use_long'];  

    if($row['use_logo']!=''){	      
     $image = geturlimageAvatar($row['use_create_time']).$row['use_logo'];
   }else{
    if($row['gender'] == 2)
    {
      $image = "https://timviec365.com/images/ic_female.png";
      $gt = 2;
    }else if($row['gender'] == 1){
      $image = "https://timviec365.com/images/ic_male.png";
      $gt = 1;
    }else
    {
      $image = "https://timviec365.com/images/ic_male.png";
      $gt = 3;
    }      
  }

  $loaihinh = ($row['work_option'] != 0)?$array_hinh_thuc[$row['work_option']]:"Chưa cập nhật";
      $use_job_name = str_replace('','',$row['use_job_name']);
      if($loaihinh==''){$loaihinh = 'Chưa cập nhật';}
      $salary = !empty($row['salary']) ? $row['salary'] : $row['salary'] = 0;
      $price = $array_muc_luong[$salary];
      $link = rewrite_url_candidate($row['use_id'],$row['use_name']);
      $exp = $row['exp_years']==0?'Không yêu cầu kinh nghiệm': $array_kinh_nghiem[$row['exp_years']];
      $gioitinh = $array_gioi_tinh[!empty($row['gender']) ? $row['gender'] : $row['gender'] = 0];
      $node = $dom->createElement("marker");

    $node = $dom->createElement("marker");
    $newnode = $parnode->appendChild($node);
    $newnode->setAttribute("cv_title",replaceMQ(parseToXML($use_job_name)));
    $newnode->setAttribute("name",replaceMQ(parseToXML($row['use_name'])));
    $newnode->setAttribute("price", $price);  
    $newnode->setAttribute("exp", $exp);
    $newnode->setAttribute("image", $image);    
    $newnode->setAttribute("loaihinh", $loaihinh);    
    $newnode->setAttribute("capnhat", date('d/m/Y',$row['use_update_time']));
    $newnode->setAttribute("link", parseToXML($link));
    $newnode->setAttribute("lat", $lat1);
    $newnode->setAttribute("lng", $lon1);    
    $newnode->setAttribute("viewed", $viewed);    
    $newnode->setAttribute("type", 'icon'.$gt);
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
