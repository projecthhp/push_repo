<?
include("../home/config.php");
header("Content-Type:application/json");
//Url mẫu https://timviec365.vn/service/detail_ungvien.php?useid=123
$useid = getValue("useid","int","GET",0);
$useid = (int)$useid;
$uscid = getValue("uscid","int","GET",0);
$uscid = (int)$uscid;
$rows = array();
$db_uv = '';
$db_uvss = '';
$db_uvsss = '';
if($useid != 0)
{
  if($uscid>0){    
    $chk_view = new db_query("SELECT uid FROM tbl_viewed WHERE type=2 AND id_user = ".$uscid.' AND id_affected = '.$useid);      
    if(mysql_num_rows($chk_view->result)==0){
       $db_not = new db_execute("INSERT INTO tbl_viewed (uid,view_id,type) VALUES (".$uscid.",".$useid.",1)");
    }
  }
    $db_qr6 = new db_query("SELECT * FROM  user WHERE use_id = ".$useid." LIMIT 1");
    if($r6 = mysql_fetch_assoc($db_qr6->result))
    {
        $db_ct123 = $r6;
    }
   $db_qr = new db_query("SELECT * FROM  cv WHERE cv_user_id = ".$useid." LIMIT 1");
   if($r = mysql_fetch_assoc($db_qr->result))
   {
      $rows = $r;
   }
   if($rows['cv_muctieu']!='' and $rows['cv_kynang']!=''){
     $db_qrs = new db_query("SELECT * FROM kinh_nghiem WHERE kn_use_id = ".$useid."");
     While($row = mysql_fetch_assoc($db_qrs->result))
     {
        $db_uv[] = $row;
     }
     $db_qrss = new db_query("SELECT * FROM truong_hoc WHERE th_use_id = ".$useid."");
     While($rowss = mysql_fetch_assoc($db_qrss->result))
     {
        $db_uvss[] = $rowss;
     }
     $db_qrsss = new db_query("SELECT * FROM ngoai_ngu WHERE nn_use_id = ".$useid."");
     While($rowsss = mysql_fetch_assoc($db_qrsss->result))
     {
        $db_uvsss[] = $rowsss;
     }
     $db_qrssss = new db_query("SELECT * FROM hoso WHERE hs_use_id = ".$useid."");
     While($rowssss = mysql_fetch_assoc($db_qrssss->result))
     {
        $db_uvssss[] = $rowssss;
     }
     if(mysql_num_rows($db_qrs->result) == 0)
     {
        $db_uv = array();
     }
     if(mysql_num_rows($db_qrss->result) == 0)
     {
        $db_uvss = array();
     }
     if(mysql_num_rows($db_qrsss->result) == 0)
     {
        $db_uvsss = array();
     }
     if(mysql_num_rows($db_qrssss->result) == 0)
     {
        $db_uvssss = array();
     }
     $html = file_get_contents('https://timviec365.vn/cv365/site/apicv/'.$useid);
     $cvonline = '';
     if($html!='false'){
     	$cvonline = 'https://timviec365.vn/cv365/'.$html;
    	if(!file_exists('../cv365/'.$html)){
    		$cvonline = '';
    	}
    }
    $ar_uv = array(
        'db_ue'   => $db_ct123,
        'db_ct'   => $rows,
        'db_uv'   => $db_uv,
        'db_truonghoc' => $db_uvss,
        'db_ngoaingu' => $db_uvsss,
        'db_hoso' => $db_uvssss,
	      'cvonline'=> $cvonline,
        'check'   => 1
		);
  }else{    
    $db_qrssss = new db_query("SELECT * FROM hoso WHERE hs_use_id = ".$useid." ORDER BY hs_create_time DESC");
    if(mysql_num_rows($db_qrssss->result) > 0){
//        echo 'co ho so';
      $row_hs = mysql_fetch_assoc($db_qrssss->result);
      if($row_hs['hs_link']!=''){
        $check = substr($row_hs['hs_link'],0,3);
	$check2 = end(explode('.',$row_hs['hs_link']));
        if($check!='cv_' or ($check=='cv_' and $check2!='png')){
            $hoso = "https://timviec365.vn".getcvuv2($row_hs['hs_create_time']).$row_hs['hs_link'];
            $ar_uv = array(
                'db_ue'   => $db_ct123,
                'db_ct'   => $rows,
                'hoso'    => $hoso,
                'check'   => 2
            );
        }else{
            $hoso = "https://timviec365.vn".getcvuv2($row_hs['hs_create_time']).$row_hs['hs_link'];
            $lcv = array();
            $cv_kq = json_decode(file_get_contents('https://timviec365.vn/cv365/site/apicv/'.$useid));
            foreach ($cv_kq as $cq) {
                $lcv[] = "https://timviec365.vn/cv365/".$cq;
            }
            $ar_uv = array(
                'db_ue'   => $db_ct123,
                'db_ct'   => $rows,
                'hoso'    => $hoso,
                'list_cv' =>  $lcv,
                'check'   => 3
            );
        }
      }
    } else {
//        echo 'ko co ho so';
        $ar_uv = array(
                       'db_ue'   => $db_ct123,
                       'db_ct'   => $rows,
//                       'db_uv'   => $db_uv,
//                       'db_truonghoc' => $db_uvss,
//                       'db_ngoaingu' => $db_uvsss,
//                       'db_hoso' => $db_uvssss,
//                       'cvonline'=> $cvonline,
                       'check'   => 2
                       );
    }
  }
  echo json_encode($ar_uv);
}
else
{
	echo "Ứng viên này không tồn tại trên hệ thống!";
}
?>
