<?
    include('../home/config.php');

    $id = getValue('id','str','POST',0);
    $tencongty_uv = getValue("tencongty_uv","str","POST","");
    // $tencongty_uv = replaceMQ(trim($tencongty_uv));
    $chucdanh_uv = getValue("chucdanh_uv","str","POST","");
    // $chucdanh_uv = replaceMQ(trim($chucdanh_uv));
    $ngaybatdau_uv = getValue("ngaybatdau_uv","str","POST","");
    // $ngaybatdau_uv = replaceMQ(trim($ngaybatdau_uv));
    $ngayketthuc_uv = getValue("ngayketthuc_uv","str","POST","");
    // $ngayketthuc_uv = replaceMQ(trim($ngayketthuc_uv));
    $motacongviec_uv_kn = getValue("motacongviec_uv_kn","str","POST","");
    // $motacongviec_uv_kn = replaceMQ(trim($motacongviec_uv_kn));

    if($id != 0)
    {
        $db_qr = new db_execute("UPDATE vltg_kinh_nghiem SET tencongty_uv='".$tencongty_uv."',chucdanh_uv = '".$chucdanh_uv."',ngaybatdau_uv = '".$ngaybatdau_uv."',ngayketthuc_uv = '".$ngayketthuc_uv."', motacongviec_uv_kn = '".$motacongviec_uv_kn."' WHERE id_kn =" .$id);
        $row = mysql_fetch_assoc($db_qr->result);

        echo json_encode($row);
    }
    // $db_ex = new db_execute("UPDATE vltg_kinh_nghiem SET tencongty_uv='".$tencongty_uv."',chucdanh_uv = '".$chucdanh_uv."',ngaybatdau_uv = '".$ngaybatdau_uv."',ngayketthuc_uv = '".$ngayketthuc_uv."', motacongviec_uv_kn = '".$motacongviec_uv_kn."' WHERE id_kn = '".$id."'");
    // unset($db_ex);

?>