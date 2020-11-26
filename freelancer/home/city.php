<?php
    
    $cit_id = $_GET['cit_id'];
    $sql ="select cit_id,cit_name from city2 where cit_parent = $cit_id";
    $db_qr = new db_query($sql);
   
    While( $row = mysql_fetch_assoc($db_qr->result)){
        echo '<option value="'.$row["cit_id"].'">'.$row["cit_name"].'</option>';
    }
?>