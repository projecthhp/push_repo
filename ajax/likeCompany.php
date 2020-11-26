<?
    include('../home/config.php');

    $type = getValue('type','str','POST','');
    $id = getValue('id','int','POST',0);
    $idco = getValue('idco','int','POST',0);
    if($type != ''){
        if($type == 'likeCompany'){
            $sql = "UPDATE user_company_multi SET usc_like = usc_like + 1 WHERE usc_id = ".$idco;
            setcookie('like_'.$idco,1,time() + 3600,'/');
        }
            
        if($type == 'likeRateCompany'){
            $sql = "UPDATE tbl_rate_company SET rate_like = rate_like + 1 WHERE rate_id = $id";
            setcookie('likeRate_'.$idco,1,time() + 3600,'/');
        }
            
        if($type == 'likeRateInterview'){
            $sql = "UPDATE tbl_rate_interview SET rate_like = rate_like + 1 WHERE rate_id = $id";
            setcookie('likeInterview_'.$idco,1,time() + 3600,'/');
        }
            
        $db_qr = new db_query($sql);
        
        unset($db_qr);
    }
?>