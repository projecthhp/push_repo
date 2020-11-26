<?
include("../home/config.php");
$id_notification         = getValue("id_notification","int","POST",0);
$id_notification         = replaceMQ($id_notification);
$update_time=date("Y-m-d H:i:s",time());
$result = array('data' => null, 'code' => 0, 'kq' => false);

if($id_notification != 0)
{
        $query1="select * from notify where NotifyID ='".$id_notification."'";
        $db_qr = new db_query($query1);
        if(mysql_num_rows($db_qr->result) > 0)
        {
            $query="UPDATE notify SET isSeen = 1 WHERE NotifyID ='".$id_notification."'";
            $rs = new db_query($query);
            $result = array('data' => null, 'code' => 1, 'kq' => true);
        }
}
echo json_encode($result);
