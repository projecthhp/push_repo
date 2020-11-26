<?php
include("../home/config.php"); 

if (isset($_POST['ar_data'])) {
    if ($_COOKIE['UT'] != '') 
    {
        $userid = $_COOKIE['UID'];
        $link_img = json_decode($_POST['ar_data'])->avatar;
        if ($link_img != '/images/no_avatar.jpg') 
        {
            $linkfolder = "../upload/cv_uv/uv_"  . $userid . '/' ;
            is_dir($linkfolder) || @mkdir($linkfolder,0777,true) || die("Can't Create folder");
            $new    = $linkfolder . end(explode('/', $link_img)); 
            if(!file_exists($new)){
                        sleep(2);
                    }
            copy($link_img, $new);
            $files = glob('../tmp/*');
            foreach ($files as $file) {
                if (is_file($file))
                    unlink($file);    
            }
            $_POST['ar_data'] = str_replace($link_img, $new, $_POST['ar_data']);
        }
        $check = new db_query('SELECT iduser,samplecv.alias FROM savecandicv LEFT JOIN samplecv ON savecandicv.idcv = samplecv.id WHERE iduser=' . $userid . ' AND idcv =' . $_POST['idcv']);
        $idcv = $_POST['idcv'];
        $lang = getValue('lang','int','POST',0);
        $html = json_encode($_POST['ar_data'], JSON_UNESCAPED_UNICODE );
        if ($num_rows = mysql_num_rows($check->result) == 0) {
            $addcv = new db_execute("INSERT INTO `savecandicv`(`iduser`, `idcv`, `lang`, `html`, `nameimg`, `status`, `cv`, `createdate`) VALUES ('".$userid."','".$_POST['idcv']."','".$lang."',$html,'".$new."',2,0,'".time()."')");
        } else {
            $row = mysql_fetch_assoc($check->result);
            $updatecv = new db_query("UPDATE savecandicv SET `lang`='".$lang."',`html`=$html,`timeedit`='".time()."' WHERE `iduser` = '".$userid."' AND `idcv`='".$idcv."'");
            $data = [
                'result' => 'true',
                'href' => "../download-cvpdf/cv.php?idcv=".$idcv."&iduser=".$userid."&cvname=".$row['alias'].""
            ];
            echo json_encode($data);
        }
    } else {
        if (isset($_SESSION['time_do'])) {
            unset($_SESSION['time_do']);
        }
        $_SESSION['time_do'] = $time;
    }
} else {
    echo 'false';
}

unset($_COOKIE['lang']);
setcookie('lang', null, -1, '/');
?>