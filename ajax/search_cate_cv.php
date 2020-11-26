<?
    include('../home/config.php');

    $keyword = getValue("keyword","str","POST","");
    if($keyword != ""){
        $sql = "SELECT name,alias FROM nganhcv WHERE name LIKE '".$keyword."%' AND status = 1 ORDER BY serial DESC";
        
    }else{
        $sql = "SELECT name,alias FROM nganhcv WHERE 1 AND status = 1 ORDER BY serial DESC";
    }
    $db_qr = new db_query($sql);
    $result = [];
    While($row = mysql_fetch_assoc($db_qr->result)){
        $result[] = $row;
    }
    echo json_encode($result);
?>