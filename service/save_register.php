<?
include("../home/config.php");

$email = getValue("email","str","POST","");
$email = replaceMQ(trim($email));
$password         = getValue("password","str","POST","");
$password         = replaceMQ($password);
$lgname = getValue("first_name","str","POST","");
$lgname = replaceMQ(trim($lgname));
$phone            = getValue("phone","str","POST","");
$phone            = replaceMQ($phone);
$use_city     = getValue("city","int","POST","0");
$use_city     = replaceMQ($use_city);
$lgaddress = getValue("address","str","POST","");
$lgaddress = replaceMQ(trim($lgaddress));
$cv_title = getValue("cv_title","str","POST","");
$cv_title = replaceMQ(trim($cv_title));
$lg_thanhpho = getValue("city_work","str","POST","");
$lg_thanhpho = replaceMQ(trim($lg_thanhpho));
$lg_nganhnghe = getValue("career","str","POST","");
$lg_nganhnghe = replaceMQ(trim($lg_nganhnghe));

$timeaway = time();
$result = array('data' => null, 'code' => 0, 'kq' => false);
//echo 'email '.$email;
//echo 'pass '.$password;
//echo 'name '.$lgname;
//echo 'phone '.$phone;
//echo 'city '.$use_city;
//echo 'add '.$lgaddress;
//echo 'title '.$cv_title;
//echo 'tp '.$lg_thanhpho;
//echo 'nn '.$lg_nganhnghe;

if ($email!='' && $password!='' && $lgname != '' && $phone != '' && $use_city != 0 && $lgaddress != '' && $cv_title != '') {
    
    $db_qr = new db_query("SELECT use_id FROM user WHERE use_mail = '".$email."'");
    if(mysql_num_rows($db_qr->result)>0)
    {
        $result = array('data' => null, 'code' => 1, 'kq' => false);
        echo json_encode($result);
    }
    else
    {
        $db_qrs = new db_query("SELECT tmp_id FROM tmp_user WHERE tmp_email = '".$email."'");
    
        if(mysql_num_rows($db_qrs->result) == 0)
        {
            $query = "INSERT INTO tmp_user(`tmp_email`, `tmp_name`,`tmp_pass`, `tmp_phone`, `tmp_city`, `tmp_address`, `tmp_job_name`, `tmp_job_city`, `tmp_nganh_nghe`, `tmp_authentic`, `tmp_time`, `tmp_register`)
            VALUES('".$email."','".$lgname."','".md5($password)."','".$phone."','".$use_city."','".$lgaddress."','".$cv_title."','".$lg_thanhpho."','".$lg_nganhnghe."','0','".$timeaway."','2')";
    
            $db_ex = new db_execute_return();
            $last_id = $db_ex->db_execute($query);
            $result = array('data' => null, 'code' => (int)$last_id, 'kq' => true);
            echo json_encode($result);
        }else{
            $db_ex = new db_execute("UPDATE tmp_user SET `tmp_name` = '".$lgname."',`tmp_pass`= '".md5($password)."', `tmp_phone` = '".$phone."', `tmp_city` = '".$use_city."', `tmp_address`= '".$lgaddress."', `tmp_job_name`= '".$cv_title."', `tmp_job_city`= '".$lg_thanhpho."', `tmp_nganh_nghe`= '".$lg_nganhnghe."', `tmp_time` = '".$timeaway."' , `tmp_register` = '2' WHERE tmp_email = '".$email."'");
            $result = array('data' => null, 'code' => 0, 'kq' => true);
            echo json_encode($result);
        }
    }

} else {
    echo json_encode($result);
}

?>
