<?php
include("../home/config.php"); 

if (isset($_POST['ar_data'])) {
    if ($_COOKIE['UT'] != '') 
    {
        $userid = $_COOKIE['UID'];
        // $link_img = json_decode($_POST['ar_data'])->avatar;
        // if ($link_img != '../images/dk_s.png') 
        // {
            $linkfolder = "../upload/appli_uv/uv_"  . $userid . '/' ;
            is_dir($linkfolder) || @mkdir($linkfolder,0777,true) || die("Can't Create folder");
            // $new    = $linkfolder . end(explode('/', $link_img)); 
            // if(!file_exists($new)){
            //             sleep(2);
            //         }
            // copy($link_img, $new);
            $files = glob('../tmp/*');
            foreach ($files as $file) {
                if (is_file($file))
                    unlink($file);    
            }

        //     $_POST['ar_data'] = str_replace($link_img, $new, $_POST['ar_data']);
        // }
        $check = new db_query('SELECT iduser FROM savecandi_appli WHERE iduser=' . $userid . ' AND idappli=' . $_POST['idappli']);
        $idappli = $_POST['idappli'];
        $lang = $_POST['lang'];
        $html = json_encode($_POST['ar_data'], JSON_UNESCAPED_UNICODE );
        if ($num_rows = mysql_num_rows($check->result) == 0) {
            $addcv = new db_execute("INSERT INTO `savecandi_appli`(`iduser`, `idappli`, `lang`, `html`,`createdate`) VALUES ('".$userid."','".$_POST['idappli']."','".$lang."',$html,'".time()."')");
        } else {
            $updatecv = new db_query("UPDATE savecandi_appli SET `lang`='".$lang."',`html`=$html,`timeedit`='".time()."' WHERE `iduser` = '".$userid."' AND `idappli`='".$idappli."'");
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