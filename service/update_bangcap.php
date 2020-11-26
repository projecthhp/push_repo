<?
include("../home/config.php");
$type = getValue("type","int","POST",'');
$lg_bc = getValue("lg_bc","str","POST","");
$lg_bc = replaceMQ(trim($lg_bc));
$lg_truonghoc = getValue("lg_truonghoc","str","POST","");
$lg_truonghoc = replaceMQ(trim($lg_truonghoc));
$lg_chuyennganh = getValue("lg_chuyennganh","str","POST","");
$lg_chuyennganh = replaceMQ(trim($lg_chuyennganh));
$lg_xeploai = getValue("lg_xeploai","int","POST",0);
$lg_xeploai = (int)$lg_xeploai;
$lg_bosungth = getValue("lg_bosungth","str","POST","");
$lg_bosungth = replaceMQ(trim($lg_bosungth));
$lg_onetime = getValue("lg_onetime","str","POST","");
$lg_onetime = replaceMQ(trim($lg_onetime));
$lg_onetime = str_replace("/","-",$lg_onetime);
$lg_onetime = strtotime($lg_onetime);
$lg_twotime = getValue("lg_twotime","str","POST","");
$lg_twotime = replaceMQ(trim($lg_twotime));
$lg_twotime = str_replace("/","-",$lg_twotime);
$lg_twotime = strtotime($lg_twotime);
$userid = getValue("iduser","int","POST",0);
$userid = (int)$userid;
$result = array('data' => null, 'code' => 0, 'kq' => false);


$db_qrcheck = new db_query("SELECT use_id FROM user WHERE use_id = '".$userid."' LIMIT 1");
if(mysql_num_rows($db_qrcheck->result) > 0)
{
	if($type == 1)
	{
	   if($lg_bc != '' && $lg_xeploai > 0)
	   { 
	      $db_ex = new db_execute("INSERT INTO user_hocvan(use_id,truong_hoc,bang_cap,chuyen_nganh,xep_loai,thongtin_bosung,tg_batdau,tg_ketthuc) 
	                               VALUES('".$userid."','".$lg_truonghoc."','".$lg_bc."','".$lg_chuyennganh."','".$lg_xeploai."','".$lg_bosungth."','".$lg_onetime."','".$lg_twotime."')");
	      $result = array('data' => null, 'code' => 1, 'kq' => true);
		  echo json_encode($result);
	   }
	   else
		{
			echo json_encode($result);
		}
	}
	else if($type == 0)
	{	$idtin   = getValue("idtin","int","POST",0);
		$idtin   = (int)$idtin;
		if($lg_bc != '' && $lg_xeploai > 0 && $idtin > 0)
		{
		$db_ex = new db_execute("UPDATE user_hocvan SET 
		                      truong_hoc='".$lg_truonghoc."',bang_cap='".$lg_bc."',chuyen_nganh='".$lg_chuyennganh."',xep_loai='".$lg_xeploai."',thongtin_bosung='".$lg_bosungth."',tg_batdau='".$lg_onetime."',tg_ketthuc='".$lg_twotime."'
							  WHERE id_hocvan = ".$idtin." AND use_id = ".$userid."");
							  $result = array('data' => null, 'code' => 1, 'kq' => true);
							  echo json_encode($result);
		}
		else
		{
			echo json_encode($result);
		}
	}
	else if($type == -1)
	{
		$idtin   = getValue("idtin","int","POST",0);
		$idtin   = (int)$idtin;
		$db_qrcheck = new db_query("SELECT use_id FROM user WHERE use_id = '".$userid."' AND use_pass = '".$code."' LIMIT 1");
		if(mysql_num_rows($db_qrcheck->result) > 0)
		{
		   if($idtin > 0)
		   {
		      $db_ex = new db_execute("DELETE FROM truong_hoc WHERE th_id = '".$idtin."' AND th_use_id = '".$userid."'");
		      unset($db_ex);
		      echo 1;
		   }
		}
		else
		{
			echo 0;
		}
		unset($code,$idtin);
	}
	$db_ex = new db_execute("UPDATE user SET use_update_time=".time()." WHERE use_id = '".$userid."'");
    unset($db_ex);
}
else
{
	echo json_encode($result);
}
?>