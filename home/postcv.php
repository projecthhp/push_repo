<?php
include('../home/config.php');
$img_val = getValue('img_val','str','POST','');
$idcv = getValue('idcv','int','POST',0);
if ($img_val != '')
{
    $filteredData="";
 if (preg_match('/^data:image\/(\w+);base64,/', $img_val, $type)){
    $filteredData = substr($img_val, strpos($img_val, ",")+1);
    $type = strtolower($type[1]);
 }
    $unencodedData =base64_decode($filteredData);

    if(!isset($_POST['auto']))
    {
        if(!isset($_POST['type'])){
            $result = new db_query('SELECT nameimg FROM savecandicv WHERE iduser='.$_COOKIE['UID'].' AND idcv = '.$idcv);
            $row = mysql_fetch_object($result->result);
            if(!is_dir('../upload/cv_uv/uv_'.$_COOKIE['UID'])){
                mkdir('../upload/cv_uv/uv_'.$_COOKIE['UID'], 0755, TRUE);
            }
            if($row->nameimg!=''){
                $url = '../upload/cv_uv/uv_'.$_COOKIE['UID'].'/'.$row->nameimg.".{$type}";
                $url_h = '../upload/cv_uv/uv_'.$_COOKIE['UID'].'/'.$row->nameimg.'_h'.".{$type}";
                if(file_exists($url)){
                    unlink($url);
                }
                if(file_exists($url_h)){
                    unlink($url_h);
                }
            }
            sleep(3);
            $time_cv = time();
            if (isset($_POST['hide'])) {
                $new_img = 'u_cv_hide_'.$time_cv;
                $db_qr = new db_query('UPDATE savecandicv SET name_cv_hide ="'.$new_img.".png".'" WHERE iduser = '.$_COOKIE['UID'].' AND idcv = '.$_POST['idcv']);
            }
            else{
              $new_img = 'u_cv_'.$time_cv;  
              $db_qr = new db_query('UPDATE savecandicv SET name_cv ="'.$new_img.".png".'" WHERE iduser = '.$_COOKIE['UID'].' AND idcv = '.$_POST['idcv']);
          }
            $url = '../upload/cv_uv/uv_'.$_COOKIE['UID'].'/'.$new_img.".png";
        }

        if (isset($_POST['has_img_app'])){
            $db_qr = new db_query("SELECT COUNT(*) as count FROM user WHERE use_id = '" . $_COOKIE['UID'] . "' AND register = 4 LIMIT 1");
            $count = mysql_fetch_assoc($db_qr->result);
            $count = $count['count'];
            if ($count > 0) {
                $db_qr = new db_query("UPDATE user SET register = 5 WHERE use_id = '" . $_COOKIE['UID'] . "'");
            }
        }
        
        file_put_contents($url, $unencodedData);
        header('Content-Description: File Transfer');
        header("Content-type: application/octet-stream");
        header("Content-disposition: attachment; filename= ".$new_img.".{$type}");
        readfile($url);
    }
    else{        
        $img_name = 'cv_'.time().'.png';
        $url = '../tmp/'.$img_name;
        file_put_contents($url, $unencodedData);
    }    
}
?>
