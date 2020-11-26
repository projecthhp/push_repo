<?
include("../home/config.php");
$type = getValue("type","int","POST",'');
$lg_chungchi = getValue("lg_chungchi","str","POST","");
$lg_chungchi = replaceMQ(trim($lg_chungchi));
$lg_sodiem = getValue("lg_sodiem","str","POST","");
$lg_sodiem = replaceMQ(trim($lg_sodiem));
$lg_ngoaingu = getValue("lg_ngoaingu","int","POST",0);
$lg_ngoaingu = (int)$lg_ngoaingu;
$userid = getValue("iduser","int","POST",0);
$userid = (int)$userid;
$id_truong = getValue("id_truong",'int','POST',0);
$id_truong = (int)$id_truong;
$result = array('data' => null, 'code' => 0, 'kq' => false);

$db_qrcheck = new db_query("SELECT use_id FROM user WHERE use_id = '".$userid."' LIMIT 1");
if(mysql_num_rows($db_qrcheck->result) > 0)
{
	if($type == 1)
	{
	   if($lg_chungchi != '' && $lg_ngoaingu != 0 && $id_truong == 0)
	   { 
	      $db_ex = new db_execute("INSERT INTO use_ngoaingu(use_id,id_ngonngu,chung_chi,ket_qua)
                               VALUES('".$userid."','".$lg_ngoaingu."','".$lg_chungchi."','".$lg_sodiem."')");
      		$result = array('data' => null, 'code' => 1, 'kq' => true);
		  	echo json_encode($result);
	   }
	   else
		{
			echo json_encode($result);
		}
	}
	else if($type == 0)
	{
		if($lg_chungchi != '' && $lg_ngoaingu != 0 && $id_truong > 0)
		{
			$db_ex = new db_execute("UPDATE use_ngoaingu SET id_ngonngu = '".$lg_ngoaingu."',chung_chi = '".$lg_chungchi."',ket_qua = '".$lg_sodiem."' WHERE id_ngoaingu = '".$id_truong."' AND use_id = '".$userid."'");
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
	   if($id_truong > 0)
	   {
	      $db_ex = new db_execute("DELETE FROM ngoai_ngu WHERE nn_id = '".$id_truong."' AND nn_use_id = '".$userid."'");
      		unset($db_ex);
	      echo 1;
	   }
	   else
	   {
	   	echo 0;
	   }
		unset($code,$id_truong);
	}
	$db_ex = new db_execute("UPDATE user SET use_update_time=".time()." WHERE use_id = '".$userid."'");
    unset($db_ex);
}
else
{
	echo 0;
}
