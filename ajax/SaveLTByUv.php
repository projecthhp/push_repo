<?php
include("../home/config.php"); 

if (isset($_POST['ar_data'])) {
    if ($_COOKIE['UT'] != '') 
    {
        $userid = $_COOKIE['UID'];
        $link_img = json_decode($_POST['ar_data'])->avatar;
        if ($link_img != '/images/no_avatar.jpg') 
        {
            $linkfolder = "../upload/lt_uv/uv_"  . $userid . '/' ;
            is_dir($linkfolder) || @mkdir($linkfolder,0777,true) || die("Can't Create folder");
            $new    = $linkfolder . end(explode('/', $link_img)); 
            if(!file_exists($new)){
                sleep(2);
            }
            
            copy($link_img, $new);
            $files = glob('../tmp/*');
            foreach ($files as $file) {
                if (is_file($file) && $file==$link_img){
                    unlink($file); 
                }         
            }
            $_POST['ar_data'] = str_replace($link_img, $new, $_POST['ar_data']);
        }
        $check = new db_query('SELECT iduser FROM savecandi_lt WHERE iduser=' . $userid . ' AND idlt=' . $_POST['idlt']);
        $idlt = $_POST['idlt'];
        $lang = getValue('lang','int','POST',0);
        $html = json_encode($_POST['ar_data'], JSON_UNESCAPED_UNICODE );
        if ($num_rows = mysql_num_rows($check->result) == 0) {
            $addcv = new db_execute("INSERT INTO `savecandi_lt`(`iduser`, `idlt`, `lang`, `html`, `nameimg`,`createdate`) VALUES ('".$userid."','".$_POST['idlt']."','".$lang."',$html,'','".time()."')");
        } else {
            $updatecv = new db_query("UPDATE savecandi_lt SET `lang`='".$lang."',`html`=$html,`timeedit`='".time()."' WHERE `iduser` = '".$userid."' AND `idlt`='".$idlt."'");
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