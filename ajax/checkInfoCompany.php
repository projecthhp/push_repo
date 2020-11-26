<?
    include('../home/config.php');

    $phone = getValue('phone','str','POST',0);
    $email = getValue('email','str','POST','');
    $name_company = getValue('name_company','str','POST','');
    $address = getValue('address','str','POST','');

    if($email != ''){
        $sql = "SELECT count(*) FROM user_company WHERE usc_email = '$email'";
        $db_qr = new db_query($sql);
        $row = mysql_fetch_assoc($db_qr->result);
        $count = $row['count(*)'];
        if($count > 0){
            $data = [
                'msg' => 'Email này đã được sử dụng, vui lòng kiểm tra lại.',
                'result' => false
            ];
        }
    }
    if($phone!=0){
        $sql = "SELECT count(*) FROM user_company WHERE usc_phone = '$phone'";
        $db_qr = new db_query($sql);
        $row = mysql_fetch_assoc($db_qr->result);
        $count = $row['count(*)'];
        if($count > 0){
            $data = [
                'msg' => 'Số điện thoại này đã được đăng ký.',
                'result' => false
            ];
        }
    }
    if($name_company != ''){
        $sql = "SELECT count(*) FROM user_company WHERE usc_alias = '".replaceTitle($name_company)."' OR usc_company = '$name_company'";
        $db_qr = new db_query($sql);
        $row = mysql_fetch_assoc($db_qr->result);
        $count = $row['count(*)'];
        if($count > 0){
            $data = [
                'msg' => 'Tên công ty đã được đăng ký, vui lòng kiểm tra lại.',
                'result' => false
            ];
        }
    }
    if($address != ''){
        $address = trim($address);
        $sql = "SELECT count(*) FROM user_company WHERE usc_address = '".$address."'";
        $db_qr = new db_query($sql);
        $row = mysql_fetch_assoc($db_qr->result);
        $count = $row['count(*)'];
        if($count > 0){
            $data = [
                'msg' => 'Địa chỉ này đã được sử dụng. Bạn vui lòng nhập địa chỉ khác.',
                'result' => false
            ];
        }
    }
    if(isset($data)){
        echo json_encode($data);
    }
?>