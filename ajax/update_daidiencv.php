<?
    include('../home/config.php');

    $idcv = getValue('id_cv','int','POST',0);
    $iduser = (isset($_COOKIE['UT']) && $_COOKIE["UT"] == 0)?$_COOKIE['UID']:0;
    if($idcv != 0 && $iduser != 0){
        update('savecandicv',['cv_order'=>'0'],['iduser'=>$iduser]);
        update('savecandicv',['cv_order'=>'1'],['id'=>$idcv]);
        
        echo '1';
    }
?>