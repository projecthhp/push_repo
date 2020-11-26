<?
error_reporting(E_ALL ^ E_NOTICE);
require_once("../home/config.php");

$idappli = getValue('idappli','int','GET',0);
$iduser = (isset($_COOKIE['UID']) && $_COOKIE['UT']==0)?$_COOKIE['UID']:"";

if($idappli == 0 || $iduser == ""){
  redirect('/home/404.php');
}
$sql = "SELECT * FROM savecandi_appli JOIN sample_appli ON savecandi_appli.idappli = sample_appli.id JOIN user ON savecandi_appli.iduser = user.use_id WHERE sample_appli.id = '".$idappli."' AND iduser = ".$iduser;
$db_qr = new db_query($sql);
if (mysql_num_rows($db_qr->result)>0) {
    $item = mysql_fetch_assoc($db_qr->result);
    
    $idthu    = $item['id'];
    $namecv   = $item['alias'];
    $langcv   = $item['lang'];
    $codecolor= $item['codecolor'];
    $lt_title = $item['name'];
    $idcv     = $item['idlt'];
    $idCate   = $item['idnganh'];
    $lt       = json_decode($item['html']);
    
    if ($item['idlang'] != 0) {
      $typelang = $item['idlang'];
      $_COOKIE['lang']=$typelang;
    }
    $check_lang = (!isset($_COOKIE['lang']))?$langcv:$_COOKIE['lang'];
    $langcv = ($langcv == 0)?1:$langcv;
    if (isset($lt) && $langcv == $check_lang) {
      $cv = $lt;
      $lang_active = $langcv;
    }
    else{
      if ($_COOKIE['lang'] == 2) {
        $lang_active = 2;
        $cv = json_decode($item['htmlcss_en']);
      }
      elseif ($_COOKIE['lang']== 3) {
        $lang_active = 3;
        $cv = json_decode($item['htmlcss_jp']);
      }
      elseif ($_COOKIE['lang'] == 4) {
        $lang_active = 4;
        $cv = json_decode($item['htmlcss_cn']);
      }
      elseif ($_COOKIE['lang'] == 5) {
        $lang_active = 5;
        $cv = json_decode($item['htmlcss_kr']);
      }
      else{
        $lang_active = 1;
        $cv = json_decode($item['htmlcss_vi']);
      }
    }
  }
  else{
    $dbgetcv = new db_query("SELECT * FROM sample_appli WHERE id = '".$idappli."'");
    $rowcv = mysql_fetch_assoc($dbgetcv->result);
    $idthu    = $rowcv['id'];
    $namecv   = $rowcv['alias'];
    $langcv   = $rowcv['idlang'];
    $codecolor= $rowcv['codecolor'];
    $lt_title = $rowcv['name'];
    $idCate = $rowcv['idnganh'];
    if ($_COOKIE['lang'] == 2) {
      $cv = json_decode($rowcv['htmlcss_en']);
    }
    elseif ($_COOKIE['lang']== 3) {
      $cv = json_decode($rowcv['htmlcss_jp']);
    }
    elseif ($_COOKIE['lang'] == 4) {
      $cv = json_decode($rowcv['htmlcss_cn']);
    }
    elseif ($_COOKIE['lang'] == 5) {
      $cv = json_decode($rowcv['htmlcss_kr']);
    }
    else{
      $cv = json_decode($rowcv['htmlcss_vi']);
    }
  }
  $css = $cv->css;
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

    $fullname = $cv->lt_title; 
    $lto_day= $cv->lto_day;
    $user_to = $cv->user_to;
    $name   = $cv->profile->name;
    $birthday= $cv->profile->birthday;
    $fullname = $cv->lt_title; 
    $address= $cv->profile->address;
    // $phone  = $cv->profile->lto_phone;
    // $email  = $cv->profile->lto_email;
    // $lto_job= $cv->profile->lto_job;
    $lto_day= $cv->lto_day;
    $content = $cv->content;
    $local = $cv->local;
    $ngay = $cv->ngay;
    $thang = $cv->thang;
    $nam = $cv->nam;
    $user_don = $cv->user_don;

// if ($id == 13) {
//   $dataTile = 1.5;
// } else {
//   $dataTile = 1;
// }

$robots    = 'noindex,nofollow';

if($_COOKIE['lang']=='4'){
    $holder_kg = '수신자 이름';
    $dxv_hvt = '我是：';
    $dxv_sn  = '出生日期：';
    $dxv_kg= '敬致：';
    $dxv_d = ' 年 ';
    $dxv_t = ' 月 ';
    $dxv_n = ' 日 ';
    $dxv_ch = '<p>越南社会主义共和国</p><p>独立 – 自由 - 幸福</p><p>......o0o......</p>';
    $dxv_name = '求职申请书';
    $holder_title_cv = 'TIMVIEC365.COM';
    $holder_name = '全名';
    $holder_phone = '电话号码';
    $holder_email = '邮箱';
    $holder_address = '地址';
    $holder_job = '想应聘的岗位';
    $holder_box_content = '内容';
}elseif($_COOKIE['lang']=='2'){
    $holder_kg = 'To';
    $dxv_hvt = 'My name is:';
    $dxv_sn  = 'Date of birth:';  
    $dxv_kg= 'To:';
    $dxv_d = ' date ';
    $dxv_t = ' month ';
    $dxv_n = ' year ';
    $dxv_ch = '<p>SOCIALIST REPUBLIC OF VIETNAM</p><p>Independence – Freedom – Happiness</p><p>......o0o......</p>';
    $dxv_name = 'COVER LETTER';
    $holder_title_cv = 'TIMVIEC365.COM';
    $holder_name = 'Full name';
    $holder_phone = 'Telephone number';
    $holder_email = 'Email';
    $holder_address = 'Address';
    $holder_job = 'Job position';
    $holder_box_content = 'Content';
}elseif($_COOKIE['lang']=='3'){
    $holder_kg = 'ホスト名';
    $dxv_hvt = '氏名：';
    $dxv_sn  = '生年月日：';
    $dxv_kg= '御中:';
    $dxv_d = ' 年 ';
    $dxv_t = ' 月 ';
    $dxv_n = ' 日 ';
    $dxv_ch = '<p>ベトナム社会主義共和国</p><p>独立―自由―幸福</p><p>......o0o......</p>';
    $dxv_name = '就職申込書';
    $holder_title_cv = 'TIMVIEC365.COM';
    $holder_name = '氏名';
    $holder_phone = '電話番号';
    $holder_email = 'Eメール';
    $holder_address = '住所';
    $holder_job = '応募仕事';
    $holder_box_content = '内容';
}elseif($_COOKIE['lang']=='5'){
    $holder_kg = '收件人的姓名';
    $dxv_hvt = '제 이름은:';
    $dxv_sn  = '년생월일:';
    $dxv_kg= '귀중:';
    $dxv_d = ' 년 ';
    $dxv_t = ' 월 ';
    $dxv_n = ' 일 ';
    $dxv_ch = '<p>베트남 사회주의 공화국</p><p>독립 - 자유 – 행복</p><p>......o0o......</p>';
    $dxv_name = '고용 신청서';
    $holder_title_cv = 'TIMVIEC365.COM';
    $holder_name = '성명';
    $holder_phone = '전화번호 ';
    $holder_email = '메일';
    $holder_address = '주소 ';
    $holder_job = '지원하고 싶은 위치';
    $holder_box_content = '내용';
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
    $holder_title_cv = 'TIMVIEC365.COM';
    $holder_name = 'Họ tên';
    $holder_phone = 'Điện thoại';
    $holder_email = 'Email';
    $holder_address = 'Địa chỉ';
    $holder_box_content = 'Nội dung';

}

$db_cate = new db_query("SELECT cat_id, cat_name,cat_alias FROM category_appli ORDER BY cat_name DESC");
$arrCate = [];
while ($rowCate = mysql_fetch_assoc($db_cate->result)) {
    $arrCate[$rowCate['cat_id']] = $rowCate;
}

?>
<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="utf-8">
  <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> -->
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
  <meta name="robots" content="noindex,nofollow"/>
  <title>Tổng hợp mẫu CV xin việc chuẩn, độc đáo - Timviec365.com</title>
  <link rel="stylesheet" href="/css/css_cv.css?v=<?=$version?>">
  <link rel="stylesheet" href="/css/notification.css">
  <link rel="stylesheet" href="/css/support-ticket.css">
  <link rel="stylesheet" href="/css/slick-theme.css" media='all' onload="if(media!='all')media='all'">
  <link rel="stylesheet" href="/css/slick.css" media='all' onload="if(media!='all')media='all'">
  <link rel="stylesheet" href="/css/select2.min.css" media="all" onload="if(media!='all')media='all'">
  <link rel="stylesheet" href="/css/font-awesome.min.css">  
  <link rel="stylesheet" href="/css/style.min.css?v=<?= $version ?>" media='all' onload="if(media!='all')media='all'">
  <link rel="stylesheet" href="/css/csscv/roboto.css" type="text/css">
  <link rel="stylesheet" href="/css/csscv/create.css?v=<?=$version?>" type="text/css">
  <link rel="stylesheet" href="/css/csscv/cropper.css" type="text/css">

  

  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PQGTCFD');</script>
<!-- End Google Tag Manager -->
</head>
<body id="create_cv">
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <header>
      <?include("../includes/inc_header_cv.php");?>
      <div id="banner" class="banner_cv">
        <span id="first">Top Mẫu CV Xin Việc 365 Online</span>
        <span>Tải ngay ứng dụng timviec365 và cv365+ trên điện thoại để trải nghiệm tốt nhất</span>
        <div class="download_appCV">
          <img src="/images/qr_app_cv.png" alt="QR tải app">
          <a target="_blank" class="link_android" rel="nofollow" href="https://play.google.com/store/apps/details?id=vn.hungviet.cv365com"><i class="fa fa-android" aria-hidden="true"></i>Tải cho Android</a>
          <a target="_blank" class="link_ios" rel="nofollow" href="https://apps.apple.com/us/app/timviec365-com-cv-xin-vi%E1%BB%87c/id1513694297?l=vi#?platform=iphone"><i class="fa fa-apple" aria-hidden="true"></i>Tải cho IOS</a>
        </div>
    </div>
    </header>
    <div class="breakcrumb">
      <ul>
        <li><a href="/">Trang chủ</a></li>
        <li><a href="/don-xin-viec.html">Đơn xin việc</a></li>
        <li><a href="<?=rewriteNNAppli($arrCate[$idCate]['cat_alias'])?>"><?=$arrCate[$idCate]['cat_name']?></a></li>
        <li class="active"><span><?=$lt_title?></span></li>
      </ul>
    </div>
    <div class="main main_cvonline">
      <? //include('../includes/inc_menu_cv.php') ?>
    </div>
    <style>
      a,abbr,acronym,address,applet,big,blockquote,body,caption,cite,code,dd,del,dfn,div,dl,dt,fieldset,font,form,h1,h2,h3,h4,h5,h6,html,iframe,img,ins,kbd,label,legend,li,object,ol,p,pre,q,s,samp,small,span,strike,strong,sub,sup,table,tbody,td,tfoot,th,thead,tr,tt,ul,var{font-family:unset;line-height: unset;font-size: unset;}#create_cv .title,#cv-title.non-printable,.breakcrumb li{font-family:Roboto-Regular}.menu_cv,.breakcrumb{line-height: 24px}#page-letter{max-width: 790px;}#letter-title {padding: 5px 0;margin: 0 auto;text-align: center;width: 100%;margin-bottom: 8px;font-size: 20px;outline: 1px dashed #ccc;}
    </style>
<div class="blog-hd" id="page-taocv">
  <div id="cvo-toolbar">
    <div class="toolbar-global-controls">
      <div class="ctr">
        <div class="item" id="cvo-toolbar-lang">
          <div class="title" style="width: 100% !important;">Ngôn ngữ</div>
          <div class="options">
            <?
            $ngonngu = new db_query("SELECT * FROM languagecv");
            while ($rowngonngu = mysql_fetch_assoc($ngonngu->result)) {
              if (isset($typelang)) {
               if ($rowngonngu['id'] == $typelang) {
                ?>
                <span title="<?=$rowngonngu['name']?>" class="flag btn-lang-option <?=$rowngonngu['code']?><?php if($lang_active==$rowngonngu['id']){echo ' active';} ?>" data-lang="<?=$rowngonngu['id']?>">
                  <img src="/images/<?=$rowngonngu['code']?>.png">
                  <i class="flag-selected"></i>
                </span>
                <?
              }
            }
            else{
              ?>
              <span title="<?=$rowngonngu['name']?>" class="flag btn-lang-option <?=$rowngonngu['code']?><?php if($lang_active==$rowngonngu['id']){echo ' active';} ?>" data-lang="<?=$rowngonngu['id']?>">
                <img src="/images/<?=$rowngonngu['code']?>.png">
                <i class="flag-selected"></i>
              </span>
              <?
            }}
            ?>
          </div>
        </div>

        <!-- end set cookie -->
        <div class="item" id="toolbar-color">
          <div class="title" style="width: 100% !important;">Tông màu</div>
          <div class="options">
            <?
            $list_color = explode(",", $codecolor);
            foreach ($list_color as $key => $value) {
              ?>
              <span title="Màu nền"  class="color <? if($value==$color_active){echo 'active';} ?>" style="background-color:#<?php echo $value; ?>" data-color="<?php echo $value; ?>"><i class="fa fa-check"></i></span>
              <?
            }
            ?>
          </div>
        </div>
        <div class="item" id="toolbar-font">
         <div class="title" style="width: 100% !important;">Font chữ</div>
         <select title="Chọn font chữ" name="font" id="font-selector" style="width: 115px;">
           <option value="Roboto" selected>Roboto</option>
           <option value="Tahoma" >Tahoma</option>
           <option value="Arial" >Arial</option>
         </select>
       </div>
       <div class="item">
         <div class="title" style="width: 100% !important;">Cỡ chữ</div>
         <div class="options" >
           <span title="Cỡ chữ" style="text-align: center !important; padding-top:4px;" class="fontsize " data-size="small"><i class="fa fa-font"></i></span>
           <span title="Cỡ chữ" style="text-align: center !important; padding-top:4px;" class="fontsize active" data-size="normal"><i class="fa fa-font"></i></span>
           <span title="Cỡ chữ" style="text-align: center !important; padding-top:4px;" class="fontsize " data-size="large"><i class="fa fa-font"></i></span>
         </div>
       </div>
       <div class="item">
         <div class="title" style="width: 100% !important;">Giãn dòng</div>
         <div class="options">
           <span title="Cách dòng" style="text-align: center !important; padding-top:4px;" class="line-height " data-spacing="small"><i class="fa fa-arrows-v"></i></span>
           <span title="Cách dòng" style="text-align: center !important; padding-top:4px;" class="line-height active" data-spacing="normal"><i class="fa fa-arrows-v"></i></span>
           <span title="Cách dòng" style="text-align: center !important; padding-top:4px;" class="line-height " data-spacing="large"><i class="fa fa-arrows-v"></i></span>
         </div>
       </div>
       <div class="item button" id="btn-edit-layout" title="Thêm mục hiển thị">
         <div class="title" style="width: 100% !important;">Thêm mục</div>
         <i class="fa fa-plus-circle"></i>
       </div>
       <?if(isset($_COOKIE['UID'])){?>
         <div title="Lưu CV" class="item button btn-topcv-primary" id="btn-save-lt">
          <div class="title" style="width: 100% !important;">Lưu</div>
          <i class="fa fa-floppy-o"></i>
        </div>
        <a href="" id="download_Cv" download rel="nofollow"></a>
        <?}?>
        </div>
      </div>
      <div id="cv-form-text-editor" style="display: block;">
       <div class="ctr">
        <div class="editor-controls-wraper">
         <div class="editor-controls" id="tools">
         </div>
       </div>
     </div>
   </div>
 </div>
 <div class="ctr">
  <!-- Giao dien mau thu-->

    <input type="hidden" id="idappli" name="idappli" value="<?=$idappli?>">
    <?php include ('../upload/appli/'.$namecv.'/index.php'); ?>

  <div id="editor"></div>
 <!--End giao dien mau thu -->

 <div id="hoso-scroll" style="height: auto">
   <div class="box-four">
    <div id="cv-suggestion-container" class="fixed">
      <div id="cv-suggestion-inner"  style="margin-top: 0px;">
        <div id="cv-message">
          <div class="content">
          </div>
        </div>
        <div id="cv-suggestion-content">
        </div>
        <?
      $db_qr = new db_query("SELECT alias,image,name FROM sample_appli WHERE 1 AND alias <> '".$alias_cv."' AND idnganh = ".$idCate);
        if(mysql_num_rows($db_qr->result) > 1){
        ?>
        <div id="cv-suggestion-default">
          <h4>CV cùng ngành nghề</h4>
          <div id="cv_slide_cate" class="list_cv main">
            <?
            while($row = mysql_fetch_assoc($db_qr->result)){
            ?>
            <div class="item">
              <div class="cv_top">
                <img src="/images/load.gif" class="lazyload" data-src="../upload/letter/<?=$row['alias']."/".$row['image']?>" alt="<?=$row['name']?>" title="<?=$row['name']?>" class="img-responsive">
                <div class="cv-overlay">
                    <a class="show_Cv">Xem trước</a>
                    <a class="use_cv" rel="nofollow" href="<?=rewriteCreateCV($row['alias'],$row['id'])?>"> Dùng mẫu này</a>
                </div>
              </div>
              <div class="cv-bottom main">
                <h3 class="cv-title">
                  <?=$row['name']?>
                </h3>
              </div>
            </div>
            <?
            }
            ?>
          </div>
        </div>
        <?
          }
        ?>
      </div>

    </div>
  </div>
</div>
</div>
</div>
</div>
<div class="clr"></div>
<div class="ctr" style="margin-top: 10px">
</div>
<!-- Crop img -->
<div id="imageEditorWraper">
  <div class="container">
    <h3>Chỉnh sửa ảnh đại diện</h3>
    <div class="editor-col-left">
      <h4>Ảnh gốc</h4>
      <div class="imageEditor" style="display:none;">
        <img id="image"src="">
      </div>
      <div class="editorChooseImage">
        <label for="inputImage" class="btn-choose-image" title="Upload image file">
          <input type="file" class="sr-only"  id="inputImage" name="avatar" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
          <i class="fa fa-picture-o"></i><br>Click chọn ảnh để tải lên!
        </span>
      </label>
    </div>
    <div class="image-controls" style="display: none;">
      <div class="image-control-group">
        <button class="image-control-btn btn-zoom-in-image">
          <span class="fa fa-search-plus"></span>
        </button><button class="image-control-btn btn-zoom-out-image">
          <span class="fa fa-search-minus"></span>
        </button>
      </div>
      <div class="image-control-group">
        <button class="image-control-btn btn-rotate-left">
          <span class="fa fa-rotate-left"></span>
        </button><button class="image-control-btn btn-rotate-right">
          <span class="fa fa-rotate-right"></span>
        </button>
      </div>
    </div>
    <div id="tipCompress" >Nếu ảnh của bạn có dung lượng trên 5MB, vui lòng<a rel="nofollow" href="https://compressor.io/compress" target="_blank" style="color:#fb236a"> bấm vào đây</a> để giảm dung lượng ảnh.</div>
    <div class="loadingShow" style="display: none;">
      <i class="fa fa-spinner fa-spin"></i>
      <br><br>
      <span class="loadingMessage">Đang tải ảnh lên ...</span>
    </div>
  </div>
  <div class="editor-col-right">
    <h4>Ảnh hiển thị trên CV</h4>
    <div class="imageEditorControls">
      <div class="img-edit-preview" style="border: 1px solid #efefef;"><img src="/images/no_avatar.jpg"></div>
      <div class="edit-image-btns" style="display: none;">
        <label id="title-change" for="inputImage1" type="button" class="btn-change-image"><input type="file" class="sr-only" id="inputImage1" name="file" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">Đổi ảnh</label>
        <button type="button" class="btn-remove-image">Xóa ảnh</button><br>
      </div>
      <div>
        <button type="button" class="btn-save-image" name="upload">Xong</button>
      </div>
      <div>
        <a href="javascript:void(0)" class="btn-close-image-editor" title="Đóng trình chỉnh sửa (Không lưu thay đổi)">Đóng lại (Không lưu)</a>
      </div>
      <form action="" method="post" id="saveEditedAvatar" style="display: none;">
        <input type="text" name="cropx" id="dataX" value="0">
        <input type="text" name="cropy" id="dataY" value="0">
        <input type="text" name="cropw" id="dataWidth" value="280">
        <input type="text" name="croph" id="dataHeight" value="280">
        <input type="text" name="rotate" id="dataRotate" value="0">
        <input type="text" name="tile" id="dataTile" value="1">
        <input type="text" name="cv_alias" id="cv_alias" value="Mẫu CV Kế Toán">
      </form>
    </div>
  </div>
</div>
</div>
<div id="layout-editor-container">
  <div id="layout-editor">

    <div class="group">
      <?php foreach($menu_html as $ml){
        if($ml['type'] !='profile'){
          $ti = $ml['title'];
        }else{
          $ti = $ml['title'];
        }
        ?>
        <div class="block <?php if($ml['status']!='hide'){echo 'active';} ?>" blockmain="menu" blockkey="<?php echo $ml['id']; ?>">
          <div class="selector"><i class="fa fa-check"></i></div>
          <span><?php echo $ti; ?></span>
          <i class="fa fa-bars icon-order"></i>
        </div>
      <?php } ?>
    </div>
    <div class="group">
      <?php foreach($block_html as $ml){
        ?>
        <div class="block <?php if($ml['status']!='hide'){echo 'active';} ?>" blockmain="experiences" blockkey="<?php echo $ml['id']; ?>">
          <div class="selector"><i class="fa fa-check"></i></div>
          <span><?php echo $ml['title']; ?></span>
          <i class="fa fa-bars icon-order"></i>
        </div>
      <?php }  ?>
    </div>
    <div class="text-center action-bar">
      <button type="button" class="btn-cvo btn-primary btn-finish">Cập nhật</button>
    </div>
  </div>
</div>

<? $none_ui = 1; ?>
<? 
  include('../includes/inc_footer.php');
  include('../includes/inc_script_footer.php'); 
?>
<script>
  $('#cv_slide_cate').slick();
</script>
<script src="/js/jscv/jquery-ui/jquery-ui.min.js"></script>
<script src="/js/validate_cv.js"></script>
<script src="/js/jscv/jquery.validate.min.js"></script>
<script src="/js/jscv/html2canvas.min.js"></script>
<script src="/js/jscv/cropper.js" type="text/javascript"></script>
<script src="/js/jscv/main.js"></script>
<script src="/js/jscv/create_appli.js?v=<?=$version?>" async></script>
<script src="/js/jscv/general.js"></script>
<script src="/js/jscv/edit.js"></script>    
<script src="/js/jscv/app_cv.js" type="text/javascript"></script>
<script src="/js/jscv/custom_cv.js" defer></script>
</body>
</html>
