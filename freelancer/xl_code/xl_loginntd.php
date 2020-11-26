<?php
    include_once '../home/config.php';
    $false = 0;
        if (isset($_POST['button-loginntd'])) {
           
           $sdt_ntd = $_POST['sdt_ntd'];
           $password_ntd = md5($_POST['password_ntd']);
           
            $sql ="select * from flc_user_ntd where sdt_ntd = '$sdt_ntd' and mat_khau_ntd = '$password_ntd'";
            $db_qr = new db_query($sql);
            if (mysql_num_rows($db_qr ->result) > 0) {
                $row = mysql_fetch_assoc($db_qr->result);
                $UID=  $row['ma_ntd'];
                $name = $row["ten_ntd"];
                setcookie("UID", "$UID ", time() + 3600 * 5, "/");
                setcookie("UT", "1" , time() + 3600 * 5, "/");
                setcookie("name_ntd", "$name ", time() + 3600 * 5, "/");
                redirect('index.php');
            }else if(mysql_num_rows($db_qr->result) < 1){
                $sql_pw = "select ten_ntd from flc_user_ntd where sdt_ntd = '$sdt_ntd'";
                $db_qr_pw = new db_query($sql_pw);
                if(mysql_num_rows($db_qr_pw ->result) > 0){
                    $false =1;
                }else {
                    $false =2;
                }
            }
            
        }
   

