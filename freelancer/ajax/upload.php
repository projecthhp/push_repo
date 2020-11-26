<?php 
    require_once '../home/config.php';
?>
<?php 
if (count($_FILES["files"]["name"])){
    for($count=0;$count<count($_FILES["file"]["name"]);$count++){
        $file_name = $_FILES["file"]["name"][$count];
        $tmp_name = $_FILES["file"]["tmp_name"][$count];
        $file_array = explode('.',$file_name);
        $file_extension = end($file_array);
        if(file_already_uploaded($file_name)){ 
            $file_name = $file_array[0].'-'.rand().'.'.$file_extension;
        }
        $location = '../uploads/'.$file_name;
        if (move_uploaded_file($tmp_name,$location)) {
            $query = new db_query("INSERT INTO flc_file_anh_hs(ten_anh,ma_user) VALUES ('".$file_name."','')");
        }
    }
}
    function file_already_uploaded($file_name){
        $query2 = new db_query("SELECT * FROM flc_file_anh_hs WHERE image_name = '".$file_name."'");
        $number_of_rows = mysql_num_rows($query2->result);
        if ($number_of_rows > 0){
            return true;
        }else{
            return false;
        }
    }
?>