<?
include("../home/config.php");
$id_user = getValue("id_user","int","GET",0);
$id_user = (int)$id_user;
$type_user = getValue("type_user","int","GET",0);
$type_user = (int)$type_user;

if($id_user > 0)
{
	$r = array();
	$db_qr = new db_query("SELECT NotifyID FROM notify as n WHERE n.`UserID` = '".$id_user."' AND n.`isSeen` = 0 AND n.`UserType` = '".$type_user."'");
	$r['sl'] = mysql_num_rows($db_qr->result);
	$r['UserType'] = $type_user;
	echo json_encode($r);
}
?>