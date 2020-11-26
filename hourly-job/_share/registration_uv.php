<?php
include('../home/config.php');
if (isset($_POST['btn_luu'])) {
    $name_uv = $_POST['name_uv'];
    $sdt_uv = $_POST['sdt_uv'];
    $password_uv = sha1($_POST['password_uv']);
    $cppassword_uv =sha1($_POST['cppassword_uv']);
    $diachi_uv = $_POST['diachi_uv'];
    $thanhpho_uv = $_POST['thanhpho_uv'];
    $huyen_uv = $_POST['huyen_uv'];
    $congviec_uv = $_POST['congviec_uv'];
    $noilamviec_uv = $_POST['noilamviec_uv'];
    $noilamviec_uv = implode(',',$noilamviec_uv);
    $nganh_uv = $_POST['nganh_uv']; 
    $nganh_uv = implode(',',$nganh_uv);
    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');
    
    {
        $file_name = $_FILES['file_image']['name'];
        $file_size = $_FILES['file_image']['size'];
        $file_tmp = $_FILES['file_image']['tmp_name'];
        $file_type = $_FILES['file_image']['type'];
        $filepath="../public/images/" .$file_name;
         
        if($file_tmp == ""){
         echo"Mời bạn chọn ảnh";
        }
         
        else{
           if($file_size > 100000)
           {
               echo"Mời bạn chọn ảnh nhỏ hơn 2MB";
           }
           else
           {
            move_uploaded_file($file_tmp,$filepath);
            $query = "insert into vltg_user_uv values('','$file_name','$name_uv','$sdt_uv','$password_uv','','$diachi_uv','$thanhpho_uv','$huyen_uv','$congviec_uv','$noilamviec_uv','$nganh_uv','','','','','','','','','','','','$created_at','$updated_at')";
            $db_ex = new db_execute_return();
            $kq = $db_ex->db_execute($query);  
        }
    }
     }
    

}


?>