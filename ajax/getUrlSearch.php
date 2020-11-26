<?
    include('../home/config.php');

    $idCate = getValue('idCate','int','POST',0);
    $citId = getValue('citId','int','POST',0);
    $districtId = getValue('district_id','int','POST',0);
    $data = [];
    
    //Search job category
    if($idCate != 0 && $citId == 0 && $districtId == 0 && array_key_exists($idCate, $db_cat)){
        $data['result'] = true;

        if($idCate == 87) $data['url'] = '/tim-viec-lam-them.html';
        else {
            $cateName = $db_cat[$idCate]['cat_name'];
            $data['url'] = rewriteCate(0,0,$idCate,$cateName);
        }
    }

    //End search job category

    //Search job category and province
    if($idCate != 0 && $citId != 0 && $districtId == 0 && array_key_exists($idCate, $db_cat)){
        $ar = ['1', '45', '48', '26', '2'];
        $data['result'] = true;
        if ($idCate < 71 || in_array($citId,$ar)) {
            $cateName = $db_cat[$idCate]['cat_name'];
            $citName = $arrcity[$citId]['cit_name'];
            $data['url'] = rewriteCate($citId,$citName,$idCate,$cateName);
        }
        if ($idCate == 87) $data['url'] = '/tim-viec-lam-them-tai-'. replaceTitle($citName) . '-c' . $citId . 'l87.html';
    }
    //End job category and provice

    //Search tags number 1
    if($districtId != 0 && $citId != 0 && $idCate == 0){
        $sql = "SELECT tag_id,tag_alias FROM tbl_tags WHERE tag_parent = 1 AND tag_district_id = $districtId";
        $db_qr = new db_query($sql);
        if(mysql_num_rows($db_qr->result) > 0){
            $row = mysql_fetch_assoc($db_qr->result);
            $data['result'] = true;
            $data['url'] = rewriteUrlTag($row['tag_alias'],$row['tag_id']);
        }
    }
    //End search tags number 1

    //Search tags number 2
    if($districtId != 0 && $idCate != 0 && $citId != 0 && array_key_exists($idCate,$db_cat)){
        $sql = "SELECT tag_id,tag_alias FROM tbl_tags WHERE tag_parent = 2 AND tag_district_id = $districtId AND tag_cate_id = $idCate";
        $db_qr = new db_query($sql);
        if(mysql_num_rows($db_qr->result) > 0){
            $row = mysql_fetch_assoc($db_qr->result);
            $data['result'] = true;
            $data['url'] = rewriteUrlTag($row['tag_alias'],$row['tag_id']);
        }
    }
    //End search tags number 2

    //Search tags number 3
    if($idCate != 0 && $citId == 0 && $districtId == 0 && !array_key_exists($idCate,$db_cat)){
        $data['result'] = true;
        $data['url'] = rewriteUrlTag($arrtag_key[$idCate]['tag_alias'],$idCate);
    }   
    //End search tags number 3
    echo json_encode($data);
?>