<?php
error_reporting(E_ALL ^ E_NOTICE);  
require_once("../home/config.php");

if (isset($_GET['uid']) && $_GET['uid'] != '') {
  $uid = $_GET['uid'];
}else{
  $uid = $_COOKIE['UID'];
}
$idappli= $_GET['idappli'];
$db_qr = new db_query("SELECT * FROM savecandi_appli JOIN sample_appli ON savecandi_appli.idappli = sample_appli.id JOIN user ON savecandi_appli.iduser = user.use_id WHERE iduser = '".$uid."' AND idappli = '".$idappli."'");

$item = mysql_fetch_assoc($db_qr->result);

$namecv   = $item['alias'];
$langcv   = $item['lang'];
$codecolor= $item['codecolor'];
$lt_title = $item['name'];
$lt       = json_decode($item['html']);


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
    

$user_to = $datacv->user_to;
$name   = $datacv->profile->name;
$birthday= $datacv->profile->birthday;
$fullname = $datacv->lt_title; 
$address= $datacv->profile->address;
$phone  = $datacv->profile->lto_phone;
$email  = $datacv->profile->lto_email;
$lto_job= $datacv->profile->lto_job;
$lto_day= $datacv->lto_day;
$content = $datacv->content;
$local = $datacv->local;
$ngay = $datacv->ngay;
$thang = $datacv->thang;
$nam = $datacv->nam;
$user_don = $datacv->user_don;

if($langcv=='4'){
  $holder_kg = '수신자 이름';
  $dxv_hvt = '我是：';
  $dxv_sn  = '出生日期：';
  $dxv_kg= '敬致：';
  $dxv_d = ' 年 ';
  $dxv_t = ' 月 ';
  $dxv_n = ' 日 ';
  $dxv_ch = '<p>越南社会主义共和国</p><p>独立 – 自由 - 幸福</p><p>......o0o......</p>';
  $dxv_name = '求职申请书';
  }elseif($langcv=='2'){
    $holder_kg = 'To';
    $dxv_hvt = 'My name is:';
    $dxv_sn  = 'Date of birth:';  
    $dxv_kg= 'To:';
    $dxv_d = ' date ';
    $dxv_t = ' month ';
    $dxv_n = ' year ';
    $dxv_ch = '<p>SOCIALIST REPUBLIC OF VIETNAM</p><p>Independence – Freedom – Happiness</p><p>......o0o......</p>';
    $dxv_name = 'COVER LETTER';
  }elseif($langcv=='3'){
    $holder_kg = 'ホスト名';
    $dxv_hvt = '氏名：';
    $dxv_sn  = '生年月日：';
    $dxv_kg= '御中:';
    $dxv_d = ' 年 ';
    $dxv_t = ' 月 ';
    $dxv_n = ' 日 ';
    $dxv_ch = '<p>ベトナム社会主義共和国</p><p>独立―自由―幸福</p><p>......o0o......</p>';
    $dxv_name = '就職申込書';
  }elseif($langcv=='5'){
    $holder_kg = '收件人的姓名';
    $dxv_hvt = '제 이름은:';
    $dxv_sn  = '년생월일:';
    $dxv_kg= '귀중:';
    $dxv_d = ' 년 ';
    $dxv_t = ' 월 ';
    $dxv_n = ' 일 ';
    $dxv_ch = '<p>베트남 사회주의 공화국</p><p>독립 - 자유 – 행복</p><p>......o0o......</p>';
    $dxv_name = '고용 신청서';
  }else{
    $holder_kg = 'Tên người nhận';
    $dxv_hvt = 'Tên tôi là:';
    $dxv_sn  = 'Sinh năm:';
    $dxv_kg= 'Kính gửi:';
    $dxv_d = ' ngày ';
    $dxv_t = ' tháng ';
    $dxv_n = ' năm ';
    $dxv_ch = '<p>Cộng Hoà Xã Hội Chủ Nghĩa Việt Nam</p><p>Độc lập - Tự do - Hạnh phúc</p><p>......o0o......</p>';
    $dxv_name = 'Đơn ứng tuyển';
  }
if ($id == 13) {
  $dataTile = 1.5;
} else {
  $dataTile = 1;
}  
$robots    = 'noindex,nofollow';

$a = "SELECT * FROM savecandi_appli JOIN sample_appli ON savecandi_appli.idappli = sample_appli.id JOIN user ON savecandi_appli.iduser = user.use_id WHERE iduser = '".$_COOKIE['UID']."'";


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
        include ('../upload/appli/'.$namecv.'/index.php');
        ?>      
        <div class="clr"></div>
      </div>
    </div>	
  </body>
  </html>
