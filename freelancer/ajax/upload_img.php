<?php
if (isset($_POST) && !empty($_FILES['file'])) {
    $duoi = explode('.', $_FILES['file']['name']); // tách chuỗi khi gặp dấu .
    $duoi = $duoi[(count($duoi) - 1)]; //lấy ra đuôi file
    // Kiểm tra xem có phải file ảnh không
        $target_file   = $target_dir . basename($_FILES["anh"]["name"]);
        	        $target_dir    = "../image/img_user/img_freelancer/";
    if ($duoi === 'jpg' || $duoi === 'png' || $duoi === 'gif') {
        // tiến hành upload
        if (move_uploaded_file($_FILES['file']['tmp_name'],$target_file)) {
        	      //  move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file);
        //Vị trí file lưu tạm trong serve

            // Nếu thành công
            die('Upload thành công file: '); //in ra thông báo + tên file
           // die('Upload thành công file: ' . $_FILES['file']['name']); //in ra thông báo + tên file
        } else { // nếu không thành công
            die('Có lỗi!'); // in ra thông báo
        }
    } else { // nếu không phải file ảnh
        die('Chỉ được upload ảnh'); // in ra thông báo
    }
} else {
    die('Lock'); // nếu không phải post method
}
?>