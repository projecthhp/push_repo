<?php
include("../home/config.php");
require_once("../classes/resize-class.php");
$id_use         = getValue("id_use","int","POST",0);
$id_use         = (int)$id_use;
$namefile         = getValue("namefile","str","POST",0);
$time = time();
$result = array('data' => null, 'code' => 0, 'kq' => false);

if(isset($_FILES) and $_SERVER['REQUEST_METHOD'] == "POST"){

$type = end(explode('.', $namefile));    
$name = 'app_'.$time.".".$type;
$namefile = 'app'.$time."_".$namefile;

$targetDir = '../upload/uv/';
$year = date('Y',time());
  $month = date('m',time());
  $day = date('d',time());

  if(!file_exists($targetDir.$year))
  {
    mkdir($targetDir.$year);
  }
  if(!file_exists($targetDir.$year.'/'.$month))
  {
    mkdir($targetDir.$year.'/'.$month);
  }
  if(!file_exists($targetDir.$year.'/'.$month.'/'.$day))
  {
    mkdir($targetDir.$year.'/'.$month.'/'.$day);
  }

  $targetFilePath = $targetDir.$year.'/'.$month.'/'.$day.'/'. $namefile;

file_put_contents($targetFilePath, file_get_contents($_FILES['file']['tmp_name']));  

move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath);
    if ($id_use != 0) {
        $insert_upload = new db_query("UPDATE user_cv_upload SET `link` = '".$targetFilePath."' WHERE `use_id` = '".$id_use."'");
        $result = array('data' => null, 'code' => 1, 'kq' => true);
        echo json_encode($result);
    } else {
        echo json_encode($result);
    }
} else {
    echo json_encode($result);
}
