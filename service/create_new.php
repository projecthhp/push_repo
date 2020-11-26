<?
include("../home/config.php");

$userid = getValue("usc_id","int","POST",0);
$userid = (int)$userid;

$result = array('data' => null, 'code' => 0, 'kq' => false);


    $lglhname = getValue("lg_namelh","str","POST","");
    $lglhname = replaceMQ(trim($lglhname));
    $lglhadd = getValue("lg_addlh","str","POST","");
    $lglhadd = replaceMQ(trim($lglhadd));
    $lglphone = getValue("lg_phonelh","str","POST","");
    $lglphone = replaceMQ(trim($lglphone));
    $lghemail = getValue("lg_emaillh","str","POST","");
    $lghemail = replaceMQ(trim($lghemail));
    $lg_title         = getValue("lg_title","str","POST","");
    $lg_title         = replaceMQ(trim($lg_title));
    $lg_mota          = getValue("lg_mota","str","POST","");
    $lg_mota          = replaceMQ(trim($lg_mota));
    $lg_yeucau        = getValue("lg_yeucau","str","POST","");
    $lg_yeucau        = replaceMQ(trim($lg_yeucau));
    $lg_quyenloi      = getValue("lg_quyenloi","str","POST","");
    $lg_quyenloi      = replaceMQ(trim($lg_quyenloi));
    $lg_hoso          = getValue("lg_hoso","str","POST","");
    $lg_hoso          = replaceMQ(trim($lg_hoso));
    $lg_capbac        = getValue("lg_capbac","int","POST",0);
    $lg_capbac        = (int)$lg_capbac;
    $lg_cate          = getValue("lg_cate","str","POST","");
    $lg_cate          = replaceMQ($lg_cate);
    $lg_hinhthuc      = getValue("lg_hinhthuc","int","POST",0);
    $lg_hinhthuc      = (int)$lg_hinhthuc;
    $lg_money         = getValue("lg_money","int","POST",0);
    $lg_money         = (int)$lg_money;
    $lg_exp           = getValue("lg_exp","int","POST",0);
    $lg_exp           = (int)$lg_exp;
    $lg_bangcap       = getValue("lg_bangcap","int","POST",0);
    $lg_bangcap       = (int)$lg_bangcap;
    $lg_city          = getValue("lg_city","str","POST","");
    $lg_city          = replaceMQ($lg_city);
    $lg_gioitinh      = getValue("lg_gioitinh","int","POST",0);
    $lg_gioitinh      = (int)$lg_gioitinh;
    if($lg_gioitinh == 1)
    {
        $lg_gioitinh = "Nam";
    }
    else if($lg_gioitinh == 2)
    {
        $lg_gioitinh = "Nữ";
    }else if($lg_gioitinh == 3){
        $lg_gioitinh = "Không yêu cầu";
    }
    $lg_soluong       = getValue("lg_soluong","int","POST",0);
    $lg_soluong       = (int)$lg_soluong;
    $lghannop      = getValue("time_submit","str","POST","");
    $lghannop      = replaceMQ($lghannop);
    $lghannop      = str_replace('/', '-', $lghannop);
    $lghannop      = strtotime($lghannop);
    $id_new       = getValue("id_new","int","POST",0);
    $id_new       = (int)$id_new;

    $db_qrcheck = new db_query("SELECT usc_id FROM user_company WHERE usc_id = '".$userid."' LIMIT 1");
    if(mysql_num_rows($db_qrcheck->result) > 0)
    {
        if ($id_new == 0){
            $sql = "SELECT max(new_create_time) as max FROM new WHERE new_user_id = $userid";
            $db_qr = new db_query($sql);
            $max = mysql_fetch_array($db_qr->result);
            $max = $max['max'];
            if(time() - $max < 3600){
                //sau 1 tieng ms dc dang tiep
                $result = array('data' => null, 'code' => 0, 'kq' => false);
                echo json_encode($result);
                die();
            }
            $db_qrs = new db_query("SELECT new_id FROM new WHERE new_title = '".$lg_title."' AND new_user_id = ".$userid." LIMIT 1");
            if(mysql_num_rows($db_qrs->result) == 0)
            {
                $query = "INSERT INTO new(new_title,new_alias,new_cat_id,new_city,new_money,new_cap_bac,new_exp,new_bang_cap,new_gioi_tinh,new_so_luong,new_hinh_thuc,new_user_id,new_create_time,new_update_time,new_type,new_han_nop,new_active,new_post)
                    VALUES('".$lg_title."','".replaceTitle($lg_title)."','".$lg_cate."','".$lg_city."','".$lg_money."','".$lg_capbac."','".$lg_exp."','".$lg_bangcap."','".$lg_gioitinh."','".$lg_soluong."','".$lg_hinhthuc."','".$userid."','".time()."','".time()."','1','".$lghannop."','1','1')";
                $db_ex = new db_execute_return();
                $last_id = $db_ex->db_execute($query);
                $db_ex2 = new db_execute("INSERT INTO new_multi(new_id,new_mota,new_yeucau,new_quyenloi,new_ho_so)
                                    VALUES('".$last_id."','".$lg_mota."','".$lg_yeucau."','".$lg_quyenloi."','".$lg_hoso."')");
                $db_ex4 = new db_execute("UPDATE user_company SET usc_name = '".$lglhname."',usc_money = usc_money - ".$price_pack.",usc_name_add = '".$lglhadd."',usc_name_phone = '".$lglphone."',usc_name_email = '".$lghemail."' WHERE usc_id = '".$userid."'");


                //gen qr
                $new_id = $last_id;
                $new_title = $lg_title;
                $new_user_id = $userid;
                if (isset($new_id) && isset($new_title) && isset($new_user_id)) {
                    $alas = replaceTitle($new_title);
                    $alas = substr($alas, 0, 55);
                    $url_new =  "https://timviec365.com/" . $alas . "-" . $new_id . ".html";
                    // $text variable has data for QR  
                    $text = $url_new;
                
                    // $path variable store the location where to  
                    // store image and $file creates directory name 
                    // of the QR code file by using 'uniqid' 
                    // uniqid creates unique id based on microtime 
                    $img_qr = "../upload/qr/new/ntd_" . $new_user_id . "/" . $new_id . ".png";
                    $path = "../upload/qr/new/ntd_" . $new_user_id . "/";
                    if (!file_exists($path)) {
                        is_dir($path) || @mkdir($path, 0777, true) || die("Can't Create folder");
                    }
                    if (file_exists($img_qr)) {
                        return json_encode($result);
                    }
                    $file = $path . $new_id . ".png";
                    curl_download('http://vieclamketoan365.com/api_qr/gen_qr/index.php', $text, $file);
                }

                $result = array('data' => null, 'code' => 0, 'kq' => true);
                echo json_encode($result);
            }
            else
            {
                //Tin tuyển dụng đã tồn tại";
                $result = array('data' => null, 'code' => 1, 'kq' => false);
                echo json_encode($result);
            }
        } else {
            $db_qrs = new db_query("SELECT new_id FROM new WHERE new_id = '".$id_new."' LIMIT 1");
            if(mysql_num_rows($db_qrs->result) > 0)
            {
                $query = "UPDATE new SET new_title='".$lg_title."',new_cat_id='".$lg_cate."',new_city='".$lg_city."',new_money='".$lg_money."',new_cap_bac='".$lg_capbac."',new_exp='".$lg_exp."',new_bang_cap='".$lg_bangcap."',new_gioi_tinh='".$lg_gioitinh."',new_so_luong='".$lg_soluong."',new_hinh_thuc='".$lg_hinhthuc."',new_user_id='".$userid."',new_update_time='".time()."',new_type='1',new_han_nop='".$lghannop."',new_active='1',new_post='1' WHERE new_id = '".$id_new."'";
                $db_ex = new db_execute($query);
                $db_ex2 = new db_execute("UPDATE new_multi SET new_mota='".$lg_mota."',new_yeucau='".$lg_yeucau."',new_quyenloi='".$lg_quyenloi."',new_ho_so='".$lg_hoso."' WHERE new_id = '".$id_new."'");
                $db_ex4 = new db_execute("UPDATE user_company SET usc_name = '".$lglhname."',usc_money = usc_money - ".$price_pack.",usc_name_add = '".$lglhadd."',usc_name_phone = '".$lglphone."',usc_name_email = '".$lghemail."' WHERE usc_id = '".$userid."'");
                $result = array('data' => null, 'code' => 1, 'kq' => true);
                echo json_encode($result);
            }
            else
            {
                //Tin tuyển dụng đã tồn tại";
                $result = array('data' => null, 'code' => 2, 'kq' => false);
                echo json_encode($result);
            }
        }
    } else {
        //NTD ko tồn tại";
        $result = array('data' => null, 'code' => 0, 'kq' => false);
        echo json_encode($result);
    }



    function curl_download($Url, $new_title, $saveTo)
{
    // Mở một file mới với đường dẫn và tên file là tham số $saveTo
    $fp = fopen ($saveTo, 'w+');
     
    // Bắt đầu CURl
    $ch = curl_init($Url);
     
    // Thiết lập giả lập trình duyệt
    // nghĩa là giả mạo đang gửi từ trình duyệt nào đó, ở đây tôi dùng Firefox
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0");

    curl_setopt($ch, CURLOPT_POST, 1);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
        'new_title' => $new_title,
        'site' => 'timviec365.com'
    )));
     
    // Thiết lập trả kết quả về chứ không print ra
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  
    // Thời gian timeout
    curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
     
    // Lưu kết quả vào file vừa mở
    curl_setopt($ch, CURLOPT_FILE, $fp);
     
    // Thực hiện download file
    $result = curl_exec($ch);
     
    // Đóng CURL
    curl_close($ch);
     
    return $result;
}
    ?>