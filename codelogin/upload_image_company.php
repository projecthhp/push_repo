<?
    include('../home/config.php');
    $files = $_FILES['file_images'];

    if(isset($files) && count($files) <= 6 && $_COOKIE['UT'] == 1) {
        $isUpdate = true;
        $maxSize = 2000000;
        /* Check exits folder and create files */
        $path = "../pictures/images_company";
        $userid = $_COOKIE['UID'];
        $db_qr = new db_query("SELECT user_company.usc_id,usc_create_time,image_com FROM user_company JOIN user_company_multi ON user_company.usc_id = user_company_multi.usc_id WHERE user_company.usc_id = ".$userid);
        $row = mysql_fetch_assoc($db_qr->result);
        $time = $row['usc_create_time'];
        $image_com = $row['image_com'];
        $f_year = $path."/".date('Y',$time);
        $f_month = $path."/".date('Y',$time)."/".date('m',$time);
        $f_date =  $path."/".date('Y',$time)."/".date('m',$time)."/".date('d',$time);
        $path_ins = date('Y',$time)."/".date('m',$time)."/".date('d',$time);
        if(!file_exists($path)) @mkdir($path,0777);
        if(!file_exists($f_year)) @mkdir($f_year,0777);           
        if(!file_exists($f_month)) @mkdir($f_month,0777);
        if(!file_exists($f_date)) @mkdir($f_date,0777);
        /* End check and create */
        $files_arr = array();
        $arr_ins = array();

        if($image_com != '')    $arr = explode(',',$image_com);
        else                    $arr = [];
        $j = 0;
        for($i = 0; $i<count($files['name']); $i++) {
            $size = $files['size'][$i];
            if($size < $maxSize){
                $full_path = $f_date."/".$files['name'][$i];
                if(move_uploaded_file($files['tmp_name'][$i],$full_path) && $files['name'][$i] != '') {
                    $new_name = generateRandomString();
                    $full_path_new = $f_date."/".$new_name.".png";
                    rename($full_path,$full_path_new);
                    array_push($arr,str_replace($path."/",'',$full_path_new)); /* Add item */
                    //If count of $arr > 6, remove first item in array
                    if(count($arr) > 6) {
                        unlink($path."/".$arr[0]);
                        array_shift($arr);
                    }
                }
            }else $j++;
        }
        $msg = ($j > 0)?'Bạn có '.$j.' files > 2Mb, Vui lòng kiểm tra lại ảnh trước khi tải lên':'Upload ảnh công ty thành công !!!';
        $data = [
            'result' => 'success',
            'files_arr' => $arr,
            'msg'    => $msg
        ];        
        $data_update = [
            'image_com' => implode(',',$arr)
        ];
        $where = [
            'usc_id' => $_COOKIE['UID']
        ];
        update('user_company_multi',$data_update,$where);
        update('user_company',['usc_update_time'=>time()],$where);
        echo json_encode($data);
    }else{
        die('Không có ảnh');
    }
?>