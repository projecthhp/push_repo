<?
include("../home/config.php");
$id_usc         = getValue("id_usc", "int", "POST", 0);
$id_usc         = replaceMQ($id_usc);
$id_uv          = getValue("id_use", "int", "POST", 0);
$id_uv          = replaceMQ($id_uv);
$timeaway       = time();
$result = array('data' => null, 'code' => 0, 'kq' => false);

if ($id_usc != 0 && $id_uv != 0) {
    $check = new db_query("SELECT id_ntd,id_uv FROM tbl_luuhoso_uv WHERE id_ntd = '" . $id_usc . "' AND id_uv = '" . $id_uv . "'");
    if (mysql_num_rows($check->result) == 0) {
        $query = "INSERT INTO tbl_luuhoso_uv(id_ntd,id_uv,create_time) VALUES ('" . $id_usc . "','" . $id_uv . "','" . $timeaway . "')";
        $db_ex = new db_execute($query);
        $check_noti = new db_query("SELECT UserID,AffectedID FROM notify WHERE UserID = '" . $id_uv . "' AND AffectedID = '" . $id_usc . "' AND UserType = 1  AND NotifyType = 1");
        if (mysql_num_rows($check_noti->result) == 0) {
            $description = "đã quan tâm tới hồ sơ của bạn";
            //user type là type của user nhận thông báo
            //user type = 1 là ứng viên sẽ nhận dc thông báo
            //notify type là type của thông báo
            //vd: 1 là thông báo loại 1 (bao gồm đề lưu tin, nộp hồ sơ...), 2 là thông báo hệ thống
            $user_type = 1;
            $notify_type = 1;
            $CreateDate = date("Y-m-d H:i:s", time());
            $query_notify = "INSERT INTO notify(UserID,AffectedID,DescNotify,UserType,NotifyType,CreateDateNotify,url_notification)VALUES('" . $id_uv . "','" . $id_usc . "','" . $description . "','" . $user_type . "','" . $notify_type . "','" . $CreateDate . "','')";
            $db_ex_noti = new db_execute($query_notify);
        }
        $result = array('data' => null, 'code' => 1, 'kq' => true);
        echo json_encode($result);
        unset($db_ex);
        unset($db_ex_noti);
    } else {
        $query_un_save = "DELETE FROM tbl_luuhoso_uv WHERE id_ntd = '" . $id_usc . "' AND id_uv = '" . $id_uv . "'";
        $db_ex = new db_execute($query_un_save);
        $result = array('data' => null, 'code' => 1, 'kq' => false);
        echo json_encode($result);
    }
}
