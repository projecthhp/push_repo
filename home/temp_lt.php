<?php
error_reporting(E_ALL ^ E_NOTICE);  
require_once("../home/config.php");

if (isset($_GET['uid']) && $_GET['uid'] != '') {
  $uid = $_GET['uid'];
  $idlt= $_GET['idlt'];
}else{
  $uid = $_COOKIE['UID'];
  $idlt= $_GET['idlt'];
}

$db_qr = new db_query("SELECT * FROM savecandi_lt JOIN sample_letter ON savecandi_lt.idlt = sample_letter.id JOIN user ON savecandi_lt.iduser = user.use_id WHERE iduser = '".$uid."' AND idlt = '". $idlt= $_GET['idlt']."'");

$item = mysql_fetch_assoc($db_qr->result);

$namecv   = $item['alias'];
$langcv   = $item['lang'];
$codecolor= $item['codecolor'];
$lt_title = $item['name'];
$lt       = json_decode($item['html']);


setcookie("lang", $langcv, time() + 3600, "/", "", 0);
if (isset($lt)) {
  $datacv = $lt;
}

$css = $datacv->css;
foreach($css as $key =>$value){
  $css->color;
  $css->font;
  $css->font_size;
  $css->font_spacing;

}
$color_active = $css->color;
$font_active = $css->font;
$font_size_active = $css->font_size;
$font_spacing_active = $css->font_spacing;

$avatar =$datacv->avatar;

    $fullname = $datacv->lt_title; 
    $address= $datacv->profile->lto_address;
    $phone  = $datacv->profile->lto_phone;
    $email  = $datacv->profile->lto_email;
    $name   = $datacv->profile->lto_name;
    $lto_job= $datacv->profile->lto_job;
    $lto_day= $datacv->lto_day;
    $lto_content = $datacv->content;


if ($id == 13) {
  $dataTile = 1.5;
} else {
  $dataTile = 1;
}  
$robots    = 'noindex,nofollow';
$content   = 'taocv';

$a = "SELECT * FROM savecandi_lt JOIN sample_letter ON savecandi_lt.idlt = sample_letter.id JOIN user ON savecandi_lt.iduser = user.use_id WHERE iduser = '".$_COOKIE['UID']."'";


?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="vi" xml:lang="vi">
<head>  
  <head>  
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">  
    <title><?php if(isset($meta_title)){ ?><?php echo $meta_title; }?></title>
    <meta name="description" content="<?php if(isset($meta_des)){echo trim($meta_des);} ?>">
    <meta name="keywords" content="<?php if(isset($meta_key)){echo $meta_key;} ?>">  
    <link rel="stylesheet" href="/css/font-awesome.min.css" type="text/css">  
    <style type="text/css">

      body{
        background: #525659!important;
      }      
      .fa{
        font-family: fontawesome;        
      }
      #letter-title{
        display: none;
      }        
      .clr{clear: both;}
      i,em{
        font-style: italic;
      }
      b{
        font-weight: bold;
      }
      u{
        text-decoration: underline;
      }
      strike{
        text-decoration: line-through;
      }
      @page { margin: 0px; }
    </style>
  </head>
  <body>
    <div id="cv-viewer">  
      <div class="cv-document">
        <?php
        include ('../upload/letter/'.$namecv.'/index.php');
        ?>      
        <div class="clr"></div>
      </div>
    </div>	
  </body>
  </html>