<?php
// Xu ly form
include('../home/config.php');
if (isset($_POST['img_val']))
{    
    $img_val = $_POST['img_val'];
    $filteredData="";
 if (preg_match('/^data:image\/(\w+);base64,/', $img_val, $type)){
    $filteredData = substr($img_val, strpos($img_val, ",")+1);
    $type = strtolower($type[1]);
 }
    $unencodedData =base64_decode($filteredData);

    if(!isset($_POST['auto']))
    {
        if(!isset($_POST['type'])){
            $result = new db_query('SELECT nameimg FROM savecandi_lt WHERE iduser='.$_COOKIE['UID'].' AND idlt='.$_POST['idlt']);
            $row = mysql_fetch_object($result->result);
            if(!is_dir('../upload/lt_uv/uv_'.$_COOKIE['UID'])){
                mkdir('../upload/lt_uv/uv_'.$_COOKIE['UID'], 0755, TRUE);
            }
            if($row->nameimg!=''){
                $url = '../upload/lt_uv/uv_'.$_COOKIE['UID'].'/'.$row->nameimg.".{$type}";
                $url_h = '../upload/lt_uv/uv_'.$_COOKIE['UID'].'/'.$row->nameimg.'_h'.".{$type}";
                if(file_exists($url)){
                    unlink($url);
                }
                if(file_exists($url_h)){
                    unlink($url_h);
                }
            }
            $new_img = 'u_lt_'.time();
            $url = '../upload/lt_uv/uv_'.$_COOKIE['UID'].'/'.$new_img.".{$type}";
            sleep(2);
            $db_qr = new db_query('UPDATE savecandi_lt SET nameimg="'.$new_img.'" WHERE iduser='.$_COOKIE['UID'].' AND idlt='.$_POST['idlt']);
        }
        
        file_put_contents($url, $unencodedData);
        header('Content-Description: File Transfer');
        header("Content-type: application/octet-stream");
        header("Content-disposition: attachment; filename= ".$new_img.".{$type}");
        readfile($url);
    }
    else{        
        $img_name = 'lt_'.time().'.png';
        $url = '../tmp/'.$img_name;
        file_put_contents($url, $unencodedData);
    }        
}
?>
