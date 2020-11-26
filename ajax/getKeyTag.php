<?
    include('../home/config.php');

    $idType = getValue('idType','int','POST',0);
    if($idType != 0){
        $db_qr = new db_query("SELECT tag_id, tag_name FROM tbl_tags WHERE tag_parent = 3 AND tag_type = ".$idType);
        $data = [];
        if(mysql_num_rows($db_qr->result) > 0){
            While($row = mysql_fetch_assoc($db_qr->result)){
                $data[] = [
                    'tagId' => $row['tag_id'],
                    'tagName' => $row['tag_name']
                ];
            }
        }
        echo json_encode($data);
    }
?>