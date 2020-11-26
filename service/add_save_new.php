<?
include("../home/config.php");
$id_new         = getValue("id_new","int","POST",0);
$id_new         = replaceMQ($id_new);
$id_uv          = getValue("id_use","int","POST",0);
$id_uv          = replaceMQ($id_uv);
$timeaway       = time();
$result = array('data' => null, 'code' => 0, 'kq' => false);

if($id_new != 0 && $id_uv != 0)
{
    $qr_new = new db_query("SELECT new_user_id, new_title FROM new WHERE new_id = '".$id_new."' LIMIT 1");
    if (mysql_num_rows($qr_new->result) > 0){
        $row = mysql_fetch_object($qr_new->result);
        $id_usc = $row->new_user_id;
        $title = $row->new_title;
        $check = new db_query("SELECT id_tin,id_uv FROM tbl_luutin WHERE id_tin = '".$id_new."' AND id_uv = '".$id_uv."'");
        if(mysql_num_rows($check->result) == 0)
        {
            $query = "INSERT INTO tbl_luutin(id_tin,id_uv,create_time) VALUES ('".$id_new."','".$id_uv."','".$timeaway."')";
            $db_ex = new db_execute($query);
            $check_noti = new db_query("SELECT UserID,AffectedID FROM notify WHERE UserID = '" . $id_usc . "' AND AffectedID = '" . $id_uv . "' AND UserType = 2  AND NotifyType = 1");
            if (mysql_num_rows($check_noti->result) == 0) {
                $description = "đã quan tâm tới tin tuyển dụng " . $title;
                //user type là type của user nhận thông báo
                //user type = 1 là ứng viên sẽ nhận dc thông báo
                //notify type là type của thông báo
                //vd: 1 là thông báo loại 1 (bao gồm đề lưu tin, nộp hồ sơ...), 2 là thông báo hệ thống
                $user_type = 2;
                $notify_type = 1;
                $CreateDate = date("Y-m-d H:i:s", time());
                $query_notify = "INSERT INTO notify(UserID,AffectedID,DescNotify,UserType,NotifyType,CreateDateNotify,url_notification)VALUES('" . $id_usc . "','" . $id_uv . "','" . $description . "','" . $user_type . "','" . $notify_type . "','" . $CreateDate . "','')";
                $db_ex_noti = new db_execute($query_notify);
            }
            $result = array('data' => null, 'code' => 1, 'kq' => true);
            echo json_encode($result);
            unset($db_ex);
            unset($db_ex_noti);
        }else{
            $query_un_save = "DELETE FROM tbl_luutin WHERE id_tin = '".$id_new."' AND id_uv = '".$id_uv."'";
            $db_ex = new db_execute($query_un_save);
            $result = array('data' => null, 'code' => 1, 'kq' => false);
            echo json_encode($result);
        }
    }else{
        echo json_encode($result);
    }
}
?>
