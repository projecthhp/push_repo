<?
    include('../home/config.php');
    $idcv = getValue('idcv','int','POST',0);
    $iduser = (isset($_COOKIE['UT']) && $_COOKIE['UT']==0)?$_COOKIE['UID']:0;
    $type = getvalue('type','type','POST','');
    if($type == 'cv'){
        $sql = "SELECT name_cv,name_cv_hide FROM savecandicv WHERE id = $idcv";
        $db_qr = new db_query($sql);
        if($idcv != 0 && mysql_num_rows($db_qr->result) > 0 && $iduser != 0){
            $row = mysql_fetch_assoc($db_qr->result);
            $path = "../upload/cv_uv/uv_".$iduser."/";
            $name_cv = $path.$row['name_cv'];
            $name_hide_cv = $path.$row['name_cv_hide'];

            $sql = "DELETE FROM savecandicv WHERE id = ".$idcv;
            $db_qr = new db_query($sql);
            if(file_exists($name_cv)) unlink($name_cv);
            if(file_exists($name_hide_cv)) unlink($name_hide_cv);
            unset($db_qr,$row,$name_cv,$name_hide_cv);
            echo '1';
        }
    }
    if($type == 'letter'){
        $sql = "SELECT nameimg FROM savecandi_lt WHERE id = $idcv";
        $db_qr = new db_query($sql);
        if($idcv != 0 && mysql_num_rows($db_qr->result) > 0 && $iduser != 0){
            $row = mysql_fetch_assoc($db_qr->result);
            $path = "../upload/lt_uv/uv_".$iduser."/";
            $name_cv = $path.$row['nameimg'];

            $sql = "DELETE FROM savecandi_lt WHERE id = ".$idcv;
            $db_qr = new db_query($sql);
            if(file_exists($name_cv)) unlink($name_cv);

            unset($db_qr,$row,$name_cv);
            echo '1';
        }
    }
    if($type == 'appli'){
        $sql = "SELECT count(*) FROM savecandi_appli WHERE id = $idcv";
        $db_qr = new db_query($sql);
        $row = mysql_fetch_assoc($db_qr->result);
        $count = $row['count(*)'];
        if($idcv != 0 && $count > 0 && $iduser != 0){
            $sql = "DELETE FROM savecandi_appli WHERE id = ".$idcv;
            $db_qr = new db_query($sql);

            unset($db_qr,$row);
            echo '1';
        }
    }
?>