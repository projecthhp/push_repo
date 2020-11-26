<?
include("../home/config.php");
header("Content-Type:application/json");
//Url mẫu https://timviec365.vn/service/detail_ungvien.php?useid=123
$useid = getValue("useid","int","GET",0);
$useid = (int)$useid;
$uscid = getValue("uscid", "int", "GET", 0);
$uscid = (int)$uscid;
$db_cv = [];
$db_degree = [];
$db_exp = [];
$db_nn = [];
if($useid != 0)
{
    if ($uscid > 0) {
        $CreateDate=date("Y-m-d H:i:s",time());
        $chk_view = new db_query("SELECT id_user,create_date,view_count FROM view WHERE type = 2 AND id_user = " . $uscid . ' AND id_affected = ' . $useid);
        if (mysql_num_rows($chk_view->result) == 0) {
            $db_view = new db_execute("INSERT INTO view (id_user,id_affected,type,create_date) VALUES (" . $uscid . "," . $useid . ",2,'" . $CreateDate . "')");
        } else {
            $view = mysql_fetch_object($chk_view->result);
            $view_count = $view->view_count;
            if (strtotime($view->create_date . "+10 seconds") < time()){
                $view_count++;
                $db_view = new db_execute("UPDATE view SET create_date = '".$CreateDate."', view_count = $view_count WHERE type = 2 AND id_user = " . $uscid . ' AND id_affected = ' . $useid);
            }
        }
    }
    $qr_personal = new db_query("SELECT * FROM  user WHERE use_id = ".$useid." LIMIT 1");
    if($row_personal = mysql_fetch_assoc($qr_personal->result))
    {
        $db_personal = $row_personal;
    }
    $qr_cv = new db_query("SELECT id_upload,user_cv_upload.use_id,link FROM user JOIN user_cv_upload ON user.use_id = user_cv_upload.use_id WHERE user.use_id = ".$useid);
    if($row_cv = mysql_fetch_assoc($qr_cv->result))
    {
        $db_cv[] = $row_cv;
    }
    $qr_degree = new db_query("SELECT * FROM user_hocvan WHERE use_id = ".$useid."");
    While($row = mysql_fetch_assoc($qr_degree->result))
    {
        $db_degree[] = $row;
    }
    $qr_exp = new db_query("SELECT * FROM use_kinhnghiem WHERE use_id = ".$useid."");
    While($row_exp = mysql_fetch_assoc($qr_exp->result))
    {
        $db_exp[] = $row_exp;
    }
    $qr_nn = new db_query("SELECT * FROM use_ngoaingu WHERE use_id = ".$useid."");
    While($row_nn = mysql_fetch_assoc($qr_nn->result))
    {
        $db_nn[] = $row_nn;
    }
    $qr_reference = new db_query("SELECT id_thamchieu,user_tham_chieu.id_user,ho_ten,sdt,chuc_vu,tinh_thanh FROM user JOIN user_tham_chieu ON user.use_id = user_tham_chieu.id_user  WHERE user.use_id = ".$useid);
    if($row_reference = mysql_fetch_assoc($qr_reference->result))
    {
        $db_reference = $row_reference;
    }
    $ar_uv = array(
        'db_personal'   => $db_personal,
        'db_cv'   => $db_cv,
        'db_degree'   => $db_degree,
        'db_exp' => $db_exp,
        'db_nn' => $db_nn,
        'db_reference' => $db_reference,
    );
    echo json_encode($ar_uv);
}
else
{
    echo "Ứng viên này không tồn tại trên hệ thống!";
}
?>
