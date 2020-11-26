<?
	include("../home/config.php");
	$id = getValue("id","int","POST","0");
	$array = array();
	if($id > 0){
		$db_qr = new db_query("SELECT * FROM city2 WHERE cit_parent = ".$id);
		if(mysql_num_rows($db_qr->result) > 0)
		{
			echo "<option value='0'".">"."Quận/huyện</option>";
			while($row = mysql_fetch_array($db_qr->result))
			{
				echo "<option value=".$row['cit_id'].">".$row['cit_name']."</option>";
			}
		}
	}
	else
	{
		echo "<option value='0'".">"."Quận/huyện</option>";
	}
	?>