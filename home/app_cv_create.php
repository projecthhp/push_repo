<?
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);
require_once("../classes/database.php");
require_once("../home/config.php");
if (isset($_GET['alias'])) {
  $alias_cv = $_GET['alias'];
}

$id_use = getValue("id_use", "int", "GET", 0);
$id_use = (int) $id_use;
$id_cv = getValue("id_cv", "int", "GET", 0);
$id_cv = (int) $id_cv;
$id_lang = getValue("id_lang", "str", "GET", "");
$password         = getValue("password", "str", "GET", "");
$password         = replaceMQ($password);
$password         = md5($password);
if ($id_use != '' && $password != '') {
  $db_qr    = new db_query("SELECT use_id FROM user WHERE use_id = '" . $id_use . "' AND use_pass  = '" . $password . "'");
  if (mysql_num_rows($db_qr->result) > 0) {
    $row = mysql_fetch_assoc($db_qr->result);
    /////////////////
    setcookie('UT', 0, time() + 7 * 6000, '/');
    setcookie('UID', $row['use_id'], time() + 7 * 6000, '/');
    // setcookie('UID', $row['use_id'], time() + 7 * 6000, '/');
    setcookie('PHPSESPASS', $password, time() + 7 * 6000, '/');
    // header('Location: ' . $_SERVER['REQUEST_URI']);
    $fail = 0;
  } else {
    echo "Sai tài khoản hoặc mật khẩu";
    die;
  }
}
$db_qr = new db_query("SELECT * FROM savecandicv JOIN samplecv ON savecandicv.idcv = samplecv.id WHERE idcv = " . $id_cv);

if (mysql_num_rows($db_qr->result) > 0) {
  while ($item = mysql_fetch_assoc($db_qr->result)) {
    $namecv   = $item['alias'];
    $cv_title = $item['name'];
    $address  = $item['address'];
    $codecolor = $item['codecolor'];
    $phone    = $item['use_phone'];
    $birthday = $item['birthday'];
    $email    = $item['use_mail'];
    $langcv   = $item['lang'];
    $idcv     = $item['idcv'];
    $cv       = json_decode($item['html']);
    $fullname = $cv->name;
    $position = $cv->position;
    if ($item['idlang'] != 0) {
      $typelang = $item['idlang'];
      $_COOKIE['lang'] = $typelang;
    }
    switch ($langcv) {
      case 1:
        $langcv = 'vi';
        break;
      case 2:
        $langcv = 'en';
        break;
      case 4:
        $langcv = 'cn';
        break;
      case 3:
        $langcv = 'jp';
        break;
      case 5:
        $langcv = 'kr';
        break;
      default:
        $langcv = 'vi';
        break;
    }
    if (isset($cv) && $id_lang == $langcv) {
      $datacv = $cv;
    } else {
      if ($_COOKIE['lang'] == 2) {
        $datacv = json_decode($item['htmlcss_en']);
      } elseif ($_COOKIE['lang'] == 3) {
        $datacv = json_decode($item['htmlcss_jp']);
      } elseif ($_COOKIE['lang'] == 4) {
        $datacv = json_decode($item['htmlcss_cn']);
      } elseif ($_COOKIE['lang'] == 5) {
        $datacv = json_decode($item['htmlcss_kr']);
      } else {
        $datacv = json_decode($item['htmlcss_vi']);
      }
      // setcookie("lang",$lang,time()+3600,"/","",0);
    }
  }
} else {
  echo "Bạn chưa lưu cv";
}

// var_dump($datacv);

// if ($rowcv['idlang'] != 0) {
//   $_COOKIE['lang'] = $rowcv['idlang'];
//   if ($rowcv['idlang'] == 2) {
//     $datacv = json_decode($rowcv['htmlcss_en']);
//   } elseif ($rowcv['idlang'] == 3) {
//     $datacv = json_decode($rowcv['htmlcss_jp']);
//   } elseif ($rowcv['idlang'] == 4) {
//     $datacv = json_decode($rowcv['htmlcss_cn']);
//   } elseif ($rowcv['idlang'] == 5) {
//     $datacv = json_decode($rowcv['htmlcss_kr']);
//   } else {
//     $datacv = json_decode($rowcv['htmlcss_vi']);
//   }
//   $typelang = $rowcv['idlang'];
// }
$css = $datacv->css;
foreach ($css as $key => $value) {
  $css->color;
  $css->font;
  $css->font_size;
  $css->font_spacing;
}
$color_active = $css->color;
$font_active = $css->font;
$font_size_active = $css->font_size;
$font_spacing_active = $css->font_spacing;
if (strpos($datacv->avatar, 'no_avatar.jpg') != false) {
  $avatar = "/images/no_avatar.jpg";
} else {
  $avatar = "/" . $datacv->avatar;
}

// $fullname = $datacv->name;
// $menu_html = $datacv->menu;
$menu_html = array();
if (isset($datacv->menu)) {
  foreach ($datacv->menu as $menu) {
    $menu_html[$menu->order]['title'] = $menu->content->title;
    $menu_html[$menu->order]['id'] = $menu->id;
    $menu_html[$menu->order]['class'] = 'block cvo-block';
    if ($menu->content->content->type == 'profile') {
      $menu_html[$menu->order]['class'] .= ' box-contact';
      $menu_html[$menu->order]['type'] = 'profile';
      $menu_content = $menu->content->content->content;
      if (isset($cv_new)) {
        $menu_content->email = '';
        $menu_content->phone = '';
        $menu_content->address = '';
        if (isset($_SESSION['name'])) {
          $menu_content->phone = $user->mobile;
          $menu_content->address = $user->address;
        }
      }
      if (isset($_COOKIE['TTUV'])) {
        $menu_content->phone = $data_ur->phone;
        $menu_content->address = $data_ur->addr;
      }
      $menu_html[$menu->order]['content'] = $menu_content;
    } else if ($menu->content->content->type == 'skill') {
      $menu_html[$menu->order]['class'] .= ' box-skills';
      $menu_html[$menu->order]['type'] = 'skill';
      $menu_html[$menu->order]['content'] = $menu->content->content->skills;
    } else {
      $menu_html[$menu->order]['content'] = $menu->content->content;
    }
    $menu_html[$menu->order]['status'] = $menu->status;
  }
}

if (isset($datacv->experiences)) {
  foreach ($datacv->experiences as $block) {
    $block_html[$block->order]['id']      = $block->id;
    $block_html[$block->order]['title']   = $block->content->title;
    $block_html[$block->order]['status']  = $block->status;
    $block_html[$block->order]['content'] = $block->content->content;
  }
}
$menu_html    = $menu_html;
$block_html   = $block_html;
$cvid         = $id;
$item         = $item;
$color        = $color;
$fonts        = $fonts;
$sizes        = $sizes;
$font_spacing = $font_spacing;
$meta_title   = $item->name;
$meta_key     = $item->name;
$meta_des     = $item->name;
if ($id == 13) {
  $dataTile = 1.5;
} else {
  $dataTile = 1;
}
//phần di chuyển các block 
$controls = '<div class="blockControls">
<div title="Di chuyển khối" class="show-layout-editor"><i class="fa fa-bars"></i></div>
<div title="Chuyển mục này lên trên" class="up">▲</div>
<div title="Chuyển mục này xuống dưới" class="down">▼</div>
<div title="Ẩn mục này" class="an-muc"> <i class="fa fa-minus"></i> Ẩn</div>
</div>';
$robots    = 'noindex,nofollow';
$content   = 'taocv';

if ($_COOKIE['lang'] == '4') {
  $holder_title_cv = 'CV - TIMVIEC365.COM';
  $holder_name = '全名';
  $holder_birthday = '生日';
  $holder_sex = '性别';
  $holder_phone = '电话号码';
  $holder_email = '邮箱';
  $holder_address = '地址';
  $holder_face = '网站';
  $holder_job = '想应聘的岗位';
  $holder_box_title = '标题';
  $holder_tool_add = '加';
  $holder_tool_edit = '修改';
  $holder_tool_del = '删除';
  $holder_box_content = '内容';
  $holder_block_title = '大题目';
  $holder_block_cp_name = '公司名称';
  $holder_block_time = '工作时间';
  $holder_block_job = '工作岗位';
  $holder_block_job_info = '描述具体工作, 在工作期间所得到的收获';
} elseif ($_COOKIE['lang'] == '2') {
  $holder_title_cv = 'CV - TIMVIEC365.COM';
  $holder_name = 'Full name';
  $holder_birthday = 'Birthday';
  $holder_sex = 'Gender ';
  $holder_phone = 'Telephone number';
  $holder_email = 'Email';
  $holder_address = 'Address';
  $holder_face = 'Website (FB)';
  $holder_job = 'Job position';
  $holder_box_title = 'Title';
  $holder_tool_add = 'Add';
  $holder_tool_edit = 'Edit';
  $holder_tool_del = 'Delete';
  $holder_box_content = 'Content';
  $holder_block_title = 'Heading';
  $holder_block_cp_name = 'Company name';
  $holder_block_time = 'Working time';
  $holder_block_job = 'Job position';
  $holder_block_job_info = 'Job description and task achievements.';
} elseif ($_COOKIE['lang'] == '3') {
  $holder_title_cv = 'CV - TIMVIEC365.COM';
  $holder_name = '氏名';
  $holder_birthday = '生年';
  $holder_sex = '性別';
  $holder_phone = '電話番号';
  $holder_email = 'Eメール';
  $holder_address = '住所';
  $holder_face = 'ウェブサイト（FB)';
  $holder_job = '応募仕事';
  $holder_box_title = 'タイトル';
  $holder_tool_add = '追加';
  $holder_tool_edit = '編集';
  $holder_tool_del = '削除';
  $holder_box_content = '内容';
  $holder_block_title = '大きい項目タイトル';
  $holder_block_cp_name = '会社名';
  $holder_block_time = '勤務期間';
  $holder_block_job = '職位';
  $holder_block_job_info = '職歴の詳細内容';
} elseif ($_COOKIE['lang'] == '5') {
  $holder_title_cv = 'CV - TIMVIEC365.COM';
  $holder_name = '성명';
  $holder_birthday = '년생 ';
  $holder_sex = '성별 ';
  $holder_phone = '전화번호 ';
  $holder_email = '메일';
  $holder_address = '주소 ';
  $holder_face = '홈페이지  (페이스북)';
  $holder_job = '지원하고 싶은 위치';
  $holder_box_title = '제목';
  $holder_tool_add = '추가';
  $holder_tool_edit = '수정';
  $holder_tool_del = '삭제';
  $holder_box_content = '내용';
  $holder_block_title = '큰 제목';
  $holder_block_cp_name = '회사명';
  $holder_block_time = '근무시간';
  $holder_block_job = '작업 위치';
  $holder_block_job_info = ' 업무에서 달성되는 업무 세부 사항을 설명한다.';
} else {
  $holder_title_cv = 'CV - TIMVIEC365.COM';
  $holder_name = 'Họ tên';
  $holder_birthday = 'Ngày sinh';
  $holder_sex = 'Giới tính';
  $holder_phone = 'Điện thoại';
  $holder_email = 'Email';
  $holder_address = 'Địa chỉ';
  $holder_face = 'Website';
  $holder_job = 'Vị trí công việc bạn muốn ứng tuyển';
  $holder_box_title = 'Tiêu đề';
  $holder_tool_add = 'Thêm';
  $holder_tool_edit = 'Sửa';
  $holder_tool_del = 'Xóa';
  $holder_box_content = 'Nội dung';
  $holder_block_title = 'Tiêu đề mục lớn';
  $holder_block_cp_name = 'Tên công ty';
  $holder_block_time = 'Thời gian làm việc';
  $holder_block_job = 'Vị trí công việc';
  $holder_block_job_info = 'Mô tả chi tiết công việc, những gì đạt được trong quá trình làm việc.';
}

?>
<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="utf-8">
  <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> -->
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
  <meta name="robots" content="noindex,nofollow" />
  <title>Tổng hợp mẫu CV xin việc chuẩn, độc đáo - Timviec365.com</title>
  <link rel='stylesheet' id='bootstrap.min-css' href='/css/bootstrap.min.css' media='all' onload="if(media!='all')media='all'" />
  <link rel='stylesheet' id='owl.themecss-css' href='/css/select2.css' media='all' onload="if(media!='all')media='all'" />
  <link rel="stylesheet" href="/css/css_cv.css?v=<?= $version ?>">
  <link rel="stylesheet" href="/css/style.css?v=<?= $version ?>" media='all' onload="if(media!='all')media='all'">
  <link rel="stylesheet" href="/css/notification.css">
  <link rel="stylesheet" href="/css/support-ticket.css">
  <link rel="stylesheet" href="/css/choose-template.css">
  <link rel="stylesheet" href="/css/font-awesome.min.css">
  <link rel="stylesheet" href="/css/reponsive.css?v=<?= $version ?>" media='all' onload="if(media!='all')media='all'">

  <style>
    body {
      -webkit-tap-highlight-color: blue;
    }

    .box-content,
    .exp-content {
      float: left;
    }

    .box-text {
      padding: 20px;
      border: 1px dashed #ccc;
      background-color: #eaeaea;
      line-height: 1.6em;
      margin-bottom: 30px;
    }

    .box-text h2 {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .box-text ul {
      margin-left: 20px;
    }

    .box-text li {
      margin-bottom: 10px;
    }

    .form_uv {
      margin: 10px 0px;
    }

    label.error {
      color: #ED5565;
      font-size: 14px;
      margin-top: 5px;
      width: 100%;
    }

    button#submitButtondn {
      color: #307df1;
      border: none;
      background: transparent;
      font-weight: 600;
    }

    .text-center.btn-login-wraper .btn {
      background: orange;
      color: #fff !important;
      margin-bottom: 10px;
    }

    .form_uv select {
      float: left;
      width: 100%;
      height: 37px;
      border: 1px solid #afeade;
      border-radius: 2px;
      padding-left: 20px;
      line-height: 37px;
      font-size: 14px;
      color: #788993
    }

    .form_uv textarea {
      float: left;
      width: 100%;
      height: 100px;
      border: 1px solid #afeade;
      border-radius: 2px;
      padding-left: 20px;
      line-height: 37px;
      font-size: 14px;
      color: #788993;
      font-family: Roboto-Regular
    }

    .select2-container--default .select2-search--inline .select2-search__field {
      padding-left: 15px;
      width: 100% !important;
      margin-top: 0;
      font-size: 14px
    }

    .select2-container--default .select2-selection--multiple {
      height: 100%;
      border: 1px solid #e6e6e6;
      border-radius: 0px;
    }

    li.select2-selection__choice {
      height: 28px;
      line-height: 19px;
      margin-top: 3px !important
    }

    input#submit_b1_dki {
      width: 30%;
      height: 40px;
      background: orange;
      border: none;
      color: #fff;
      font-size: 15px;
      text-align: center;
      border-radius: 5px;
      font-weight: 600
    }

    .modal-header .close {
      margin-top: -25px;
    }

    .text-gray {
      float: right;
    }

    #cv-profile-fullname,
    #cv-profile-phone,
    #cv-profile-email,
    #cv-profile-address {
      display: inline-block;
    }

    .select2-container .select2-selection--multiple,
    .select2-container--default.select2-container--focus .select2-selection--multiple {
      height: 100%;
      border-radius: 0;
    }

    @media screen and (min-width: 999px) {
      .select2.error {
        border: 1px solid #eb1822 !important;
      }

      .select2-container .select2-selection--single:focus {
        border: #e3e3e3;
      }

      .select2-container {
        width: 100% !important;
        float: left;
        margin-bottom: 10px;
        height: 37px;
        border-radius: 2px;
        line-height: 37px;
        font-size: 14px;
        color: #788993;
      }

      .select2-container--default .select2-selection--single {
        line-height: 35px;
        height: 35px !important;
        padding: 0px;
        border: none !important;
      }

      .select2-container--default .select2-selection--single .select2-selection__rendered {
        height: 35px !important;
        line-height: 35px;
        padding-left: 15px !important;
        color: #788993;
        border: 1px solid #ccc;
        border-radius: 2px;
      }

      .select2-results__option {
        padding: 0px;
        height: 37px !important;
        padding-left: 20px;
        line-height: 37px;
      }

      .select2-container--default select2-container--open {
        width: 100%;
      }

      .select2-container--default .select2-selection--single .select2-selection__arrow b {
        margin-top: 2.5px !important;
      }

      .form-control.error {
        border: 1px solid #eb1822 !important;
      }

      #tp .select2-container,
      #qh .select2-container {
        margin-bottom: 10px;
      }
    }
  </style>
</head>

<body id="create_cv">
  </div>
  </div>
  </div>


  <style type="text/css">
    #hoso-scroll {
      height: 4497px;
      width: 330px;
      float: right;
      position: relative;
      background: #fff;
    }

    .fixed {
      position: fixed;
      z-index: 999;
      box-shadow: 2px 2px 4px rgba(0, 0, 0, .2);
    }

    div#cv-suggestion-default {
      padding-left: 25px;
    }

    div#cv-suggestion-default ul li {
      list-style-type: none;
    }

    div#cv-suggestion-container {
      background: #fff;
      padding-right: 10px;
      margin-top: 10px;
    }

    /*popup modal*/
    .v-modal {
      position: fixed;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      opacity: .5;
      background: #000;
    }

    .el-message-box__wrapper {
      position: fixed;
      top: 50%;
      -webkit-transform: translateY(-50%);
      transform: translateY(-50%);
      bottom: 0;
      left: 0;
      right: 0;
      text-align: center;
    }

    .el-message-box {
      text-align: left;
      display: inline-block;
      vertical-align: middle;
      background-color: #fff;
      width: 420px;
      border-radius: 3px;
      font-size: 16px;
      overflow: hidden;
      -webkit-backface-visibility: hidden;
      backface-visibility: hidden
    }

    .el-message-box__header {
      position: relative;
      padding: 20px 20px 0;
    }

    .el-message-box__content {
      padding: 30px 20px;
      color: #48576a;
      font-size: 14px;
      position: relative
    }

    .el-message-box__status.el-icon-warning {
      color: #f7ba2a;
      width: 36px;
      height: 36px;
      display: inline-block
    }

    .el-message-box__status {
      position: absolute;
      top: 50%;
      -webkit-transform: translateY(-50%);
      transform: translateY(-50%);
      font-size: 36px !important
    }

    .el-message-box__btns {
      padding: 10px 20px 15px;
      text-align: right;
    }

    .el-button {
      display: inline-block;
      line-height: 1;
      white-space: nowrap;
      cursor: pointer;
      background: #fff;
      border: 1px solid #c4c4c4;
      color: #1f2d3d;
      margin: 0;
      padding: 10px 15px;
      border-radius: 4px;
      font-size: 14px
    }

    body {
      position: relative;
    }

    .load_png {
      position: fixed;
      top: 0;
      right: 0;
      left: 0;
      bottom: 0;
      background-color: rgba(0, 0, 0, .6);
      text-align: center;
      display: block;
    }

    .lds-hourglass {
      display: inline-block;
      position: fixed;
      text-align: center;
      top: 50%;
      width: 80px;
      height: 80px;
      -webkit-transform: translateY(-50%);
      transform: translateY(-50%);
    }

    .lds-hourglass:after {
      content: " ";
      display: block;
      border-radius: 50%;
      width: 0;
      height: 0;
      margin: 8px;
      box-sizing: border-box;
      border: 32px solid #fff;
      border-color: #fff transparent #fff transparent;
      animation: lds-hourglass 1.2s infinite;
    }

    @keyframes lds-hourglass {
      0% {
        transform: rotate(0);
        animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
      }

      50% {
        transform: rotate(900deg);
        animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
      }

      100% {
        transform: rotate(1800deg);
      }
    }
  </style>
  <!-- <link rel="stylesheet" media="all" type="text/css" href="/css/csscv/styletaocv.css" />         -->
  <link rel="stylesheet" href="/css/csscv/roboto.css" type="text/css">
  <link rel="stylesheet" href="/css/csscv/create.css?v=<?= $version ?>" type="text/css">
  <link rel="stylesheet" href="/css/csscv/cropper.css" type="text/css">

  <div class="clr"></div>
  <div class="blog-hd" id="page-taocv">
    <div id="cvo-toolbar" style="display:none">
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
                    <span title="<?= $rowngonngu['name'] ?>" class="flag btn-lang-option <?= $rowngonngu['code'] ?><?php if ($_COOKIE['lang'] == $rowngonngu['id']) {
                                                                                                                      echo ' active';
                                                                                                                    } ?>" data-lang="<?= $rowngonngu['id'] ?>">
                      <img src="/images/<?= $rowngonngu['code'] ?>.png">
                      <i class="flag-selected"></i>
                    </span>
                  <?
                  }
                } else {
                  ?>
                  <span title="<?= $rowngonngu['name'] ?>" class="flag btn-lang-option <?= $rowngonngu['code'] ?><?php if ($_COOKIE['lang'] == $rowngonngu['id']) {
                                                                                                                    echo ' active';
                                                                                                                  } ?>" data-lang="<?= $rowngonngu['id'] ?>">
                    <img src="/images/<?= $rowngonngu['code'] ?>.png">
                    <i class="flag-selected"></i>
                  </span>
              <?
                }
              }
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
                <span title="Màu nền" class="color <? if ($value == $color_active) {
                                                      echo 'active';
                                                    } ?>" style="background-color:#<?php echo $value; ?>" data-color="<?php echo $value; ?>"><i class="fa fa-check"></i></span>
              <?
              }
              ?>
            </div>
          </div>
          <div class="item" id="toolbar-font">
            <div class="title" style="width: 100% !important;">Font chữ</div>
            <select title="Chọn font chữ" name="font" id="font-selector" style="width: 115px;">
              <option value="Roboto" selected>Roboto</option>
              <option value="Tahoma">Tahoma</option>
              <option value="Arial">Arial</option>
            </select>
          </div>
          <div class="item">
            <div class="title" style="width: 100% !important;">Cỡ chữ</div>
            <div class="options">
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
          <? if (isset($_COOKIE['UID']) && $_COOKIE['UT'] != 1) { ?>
            <div title="Lưu CV" class="item button btn-topcv-primary" id="btn-save-cv">
              <div class="title" style="width: 100% !important;">Lưu CV</div>
              <i class="fa fa-floppy-o"></i>
            </div>
          <? } else { ?>
            <div title="Lưu CV" class="item button btn-topcv-primary" id="btn-save-cv-reg">
              <button class="title" style="width: 100% !important;border: none;background: transparent;" data-toggle="modal" data-target="#exampleModal">Lưu CV <br><i class="fa fa-floppy-o"></i></button>
            </div>
          <? } ?>
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

      <input type="hidden" id="idcv" name="idcv" value="<?= $idcv ?>">
      <?php include('../upload/maucv/' . $namecv . '/index.php'); ?>

      <div id="editor"></div>
      <form method="POST" enctype="multipart/form-data" action="create" id="myForm">
        <input type="hidden" name="img_val" id="img_val" value="" />
        <input type="hidden" id="uid_cv" name="iduser" value="<?php echo $id_use; ?>" />
        <input type="hidden" id="ckcook" name="ckcook" value="0" />
        <input type="hidden" name="name_img" value="Mẫu CV Kỹ Sư Phần Mềm">
      </form>
      <!--End giao dien mau thu -->
    </div>
  </div>
  </div>
  </div>
  <div class="clr"></div>
  <div class="ctr" style="margin-top: 10px">
  </div>
  <div id="layout-editor-container">
    <div id="layout-editor">

      <div class="group">
        <?php foreach ($menu_html as $ml) {
          if ($ml['type'] != 'profile') {
            $ti = $ml['title'];
          } else {
            $ti = $ml['title'];
          }
        ?>
          <div class="block <?php if ($ml['status'] != 'hide') {
                              echo 'active';
                            } ?>" blockmain="menu" blockkey="<?php echo $ml['id']; ?>">
            <div class="selector"><i class="fa fa-check"></i></div>
            <span><?php echo $ti; ?></span>
            <i class="fa fa-bars icon-order"></i>
          </div>
        <?php } ?>
      </div>
      <div class="group">
        <?php foreach ($block_html as $ml) {
        ?>
          <div class="block <?php if ($ml['status'] != 'hide') {
                              echo 'active';
                            } ?>" blockmain="experiences" blockkey="<?php echo $ml['id']; ?>">
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
  <div id="box_down" class="modal">
    <div class="mr">
      <span class="close">x</span>
      <div class="ir">
        <center><strong>Bạn chọn</strong></center>
        <p style="margin-bottom: 10px"><a href="javascript:btnDownCV(1)">PNG</a> hoặc <a class="last" href="javascript:btnDownCV(2)">PDF</a></p>
        <p>Định dạng PNG dùng trong việc in CV, PDF dùng trong việc đính kèm file gửi mail tới nhà tuyển dụng:</p>
      </div>
    </div>
  </div>

  <? $none_ui = 1; ?>
  <? include('../includes/inc_script_footer.php'); ?>
  <script src="/js/jscv/jquery-ui/jquery-ui.min.js"></script>
  <script src="/js/jscv/html2canvas.min.js"></script>
  <script src="/js/jscv/cropper.js" type="text/javascript"></script>
  <script src="/js/jscv/main.js"></script>
  <!-- <script src="/js/jscv/create.js?v=<?= $version ?>" async></script> -->
  <script>
    console.log("success2");
    //Initial json data
    var data = {
      css: [],
      cv_title: '',
      avatar: '',
      name: '',
      position: '',
      introduction: '',
      menu: [],
      experiences: []
    };

    // //Create order data for first time
    // $.createOrder = function(area, id, order) {
    //   var sub = {
    //     id: id,
    //     order: order,
    //     content: ''
    //   };
    //   data[area].push(sub);
    // };

    // //Remove item from data
    // $.removeItem = function(area, id) {
    //   data[area].forEach(function(arrayItem, index) {
    //     if (data[area][index].id === id) {
    //       data[area].splice(index, 1);
    //     }
    //   });
    // };

    // //Hide block from data
    // $.hideBlock = function(area, id) {
    //   data[area].forEach(function(arrayItem, index) {
    //     if (data[area][index].id === id) {
    //       //data[area][index].status = 'hide';
    //       $('#layout-editor').find("[blockkey='" + id + "']").removeClass('active');
    //     }
    //   });
    // };

    // $.showBlock = function(area, id) {
    //   data[area].forEach(function(arrayItem, index) {
    //     if (data[area][index].id === id) {
    //       //data[area][index].status = null;
    //     }
    //   });
    // };
    // //Update order by id
    // $.updateOrder = function(area, id, order) {
    //   for (var i = 0; i < data[area].length; i++) {
    //     if (data[area][i].id === id) {
    //       data[area][i].order = order;

    //       return false;
    //     }
    //   }
    // };

    // $.initSortable = function(sortable, updown) {
    //   var item = $(sortable.el + ' ' + sortable.item);
    //   //Handle sortable
    //   $(sortable.el).sortable({
    //     cancel: 'input, [contenteditable]',

    //     create: function(event, ui) {
    //       item.each(function(e) {
    //         $.createOrder(sortable.area, $(this).attr('id'), ($(this).index() + 1));
    //       });
    //     },

    //     update: function(event, ui) {
    //       item.each(function(e) {
    //         $.updateOrder(sortable.area, $(this).attr('id'), ($(this).index() + 1));
    //       });

    //       //console.log(data);
    //     }
    //   });

    //   if (updown) {
    //     $.upAndDown(item, sortable.el);
    //   }

    // };

    // $.upAndDown = function(items, sortableEl) {
    //   items.each(function() {
    //     var self = $(this);
    //     //console.log(self)
    //     $(this).find('.up').on('click', function() {
    //       if (!self.is(':first-child')) {
    //         var prev = self.prev();
    //         self.insertBefore(prev).hide().fadeIn();
    //         $(sortableEl).sortable('option', 'update')();
    //       }
    //     });

    //     $(this).find('.down').on('click', function() {
    //       if (!self.is(':last-child')) {
    //         var next = self.next();
    //         self.insertAfter(next).hide().fadeIn();
    //         $(sortableEl).sortable('option', 'update')();
    //       }
    //     })
    //   });
    // };

    // //Start create data
    // for (var l = 0; l < sortAbleArea.length; l++) {
    //   $.initSortable(sortAbleArea[l], true);
    // }

    //Get content and export to json data
    $.exportData = function() {
    //   data['css'] = {
    //     color: $('#toolbar-color .color.active').attr('data-color'),
    //     font: $('#font-selector').find("option:selected").val(),
    //     font_size: $('#cvo-toolbar .fontsize.active').attr('data-size'),
    //     font_spacing: $('#cvo-toolbar .line-height.active').attr('data-spacing')
    //   }

    //   var cv_title = $('#page-cv #cv-title').text();
    //   if (cv_title == '') {
    //     cv_title = $('#cv_alias').val();
    //   }
    //   data['cv_title'] = cv_title;
    //   data['avatar'] = $('#page-cv #cvo-profile-avatar').attr('src');
    //   data['name'] = $('#cv-profile-fullname').text();
    //   data['position'] = $('#cv-profile-job').text();
    //   data['introduction'] = $('#cv-profile-about').html();
    //   //export data for box menu
    //   for (var k = 0; k < data['menu'].length; k++) {
    //     var tmpItem = $('#' + data['menu'][k].id);
    //     var content = '';

    //     if (tmpItem.hasClass('box-contact')) {
    //       var phone = $('#cv-profile-phone').text();
    //       var email = $('#cv-profile-email').text();
    //       if (typeof($('#cv-profile-cmnd').text()) !== 'undefined') {
    //         content = {
    //           type: 'profile',
    //           content: {
    //             birthday: $('#cv-profile-birthday').text(),
    //             sex: $('#cv-profile-sex').text(),
    //             phone: phone,
    //             email: email,
    //             address: $('#cv-profile-address').text(),
    //             face: $('#cv-profile-face').text(),
    //             cmnd: $('#cv-profile-cmnd').text(),
    //             ngaycap: $('#cv-profile-ngaycap').text(),
    //             noicap: $('#cv-profile-noicap').text()
    //           }
    //         }
    //       } else {
    //         content = {
    //           type: 'profile',
    //           content: {
    //             birthday: $('#cv-profile-birthday').text(),
    //             sex: $('#cv-profile-sex').text(),
    //             phone: phone,
    //             email: email,
    //             address: $('#cv-profile-address').text(),
    //             face: $('#cv-profile-face').text()
    //           }
    //         }
    //       }
    //     } else if (tmpItem.hasClass('box-skills')) {
    //       content = {
    //         type: 'skill',
    //         skills: []
    //       };

    //       $('.box-skills .ctbx').each(function() {
    //         content.skills.push({
    //           name: $(this).find('.skill-name').text(),
    //           exp: $(this).find('.bar-value-exp input').val()
    //         });
    //       });
    //     } else {
    //       content = tmpItem.find('.box-content').html();
    //       //content = content.replace(/<(?!br\s*\/?)[^>]+>/g, '');  
    //     }
    //     var status = '';
    //     if (tmpItem.is(":hidden") == true) {
    //       status = 'hide';
    //     }
    //     data['menu'][k].content = {
    //       title: tmpItem.find('.box-title').text(),
    //       content: content
    //     }
    //     data['menu'][k].status = status;
    //   }
    //   for (var k = 0; k < data['experiences'].length; k++) {
    //     var tmpItem = $('#' + data['experiences'][k].id);
    //     var content = [];
    //     //export data for box experience              
    //     for (var m = 0; m < tmpItem.find('.experience').length; m++) {
    //       var tmpExp = $('#' + data['experiences'][k].id + ' #' + tmpItem.find('.experience')[m].id);
    //       var content1 = tmpExp.find('.exp-content').html();
    //       //content1 = content1.replace(/<(?!br\s*\/?)[^>]+>/g, '');  

    //       content.push({
    //         title: tmpExp.find('.exp-title').html(),
    //         date: tmpExp.find('.exp-date').text(),
    //         subtitle: tmpExp.find('.exp-subtitle').text(),
    //         content: content1
    //       });
    //     }
    //     var status = '';
    //     if (tmpItem.is(":hidden") == true) {
    //       status = 'hide';
    //     }
    //     data['experiences'][k].content = {
    //       title: tmpItem.find('.block-title').text(),
    //       content: content
    //     }
    //     data['experiences'][k].status = status;
    //   }

    //   var ar_data = JSON.stringify(data);
    //   var ar_data_re = ar_data.replace(/\\n/g, '\\\\' + 'n');
    //   var ar_data_re2 = ar_data_re.replace(/\\t/g, '\\\\' + 't');
    //   console.log(ar_data_re2);
    //   var idcv = $('#idcv').val();
    //   var lang = $('#cvo-toolbar-lang .active').attr('data-lang');
    //   $.ajax({
    //     cache: false,
    //     type: "POST",
    //     url: "../ajax/SaveCVByUv.php",
    //     dataType: 'json',
    //     data: {
    //       idcv: idcv,
    //       ar_data: ar_data,
    //       lang: lang
    //     },
    //     success: function(result) {
    //       if (result != false) {
    //         //$('.lds-hourglass').remove();     
    //       }
    //     }
    //   });
    //   //console.log(JSON.stringify(data));
    };
    var is_busy = false;
    var phone = $('#cv-profile-phone');
    var email = $('#cv-profile-email');
    var address = $('#cv-profile-address');
    var fname = $('#cv-profile-fullname');
    var txt_err = "";
    console.log("success1");

    $(window).scrollTop(0);
    $(window).scrollLeft(0);

    $('#cvo-toolbar').removeClass('fx');
    $('body').append('<div class="load_png"><div class="lds-hourglass"></div></div>');
    $.exportData();

    html2canvas($('#form-cv')[0], {
      allowTaint: true,
      onrendered: function(canvas) {
        var img_val = canvas.toDataURL("image/png", 1.0);
        var idcv = $('#idcv').val();
        var iduser = $('#uid_cv').val();

        if (is_busy == true) {
          return false;
        }
        save_cv_hide(iduser);
        $.ajax({
          cache: false,
          type: "POST",
          url: "/home/postcv.php",
          data: {
            img_val: img_val,
            iduser: iduser,
            idcv: idcv,
            has_img_app: 1
          },
          beforeSend: function(response) {
            $('.load_png').remove();
            $('body').append('<div class="load_png"><div class="lds-hourglass"></div></div>');
          },
          success: function(html) {
            console.log("success");
            var msg = '<div class="v-modal" style="z-index: 2009;"></div><div tabindex="-1" class="el-message-box__wrapper" style="z-index: 2010;">';
            msg += '<div class="el-message-box"><div class="el-message-box__header"><div class="el-message-box__title">Thông báo</div></div><div class="el-message-box__content"><div class="el-message-box__status el-icon-warning"></div><div class="el-message-box__message" style="margin-left: 50px;">';
            msg += 'CV của bạn đã được lưu thành công?</div></div>';
            msg += '<div class="el-message-box__btns">';
            msg += '<button type="button" class="el-button el-button--default el-button--primary " id="nodeGoto"><span>Đóng</span></button></div></div></div>';
            $('body').append(msg);
            document.getElementById("nodeGoto").addEventListener("click", function() {
              closepopup(idcv, iduser);
            }, false);
            $('.load_png').remove();
            is_busy = false;
          }
        });
      }
    });


    $.randomStr = function() {
      return Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
    }

    function closepopup(idcv, uid) {
      $('.load_png').remove();
      $('.v-modal').hide();
      $('.el-message-box').hide();

      window.location.href = 'https://timviec365.com/home/temp_app.php?id_cv=' + idcv + '&id_user=' + uid + '&is_preview=1';
    }

    function save_cv_hide(uid) {
      if ($(window).width() < 1300) {
        $(window).scrollTop(0);
        $(window).scrollLeft(0);
      }
      $('#cvo-toolbar').removeClass('fx');
      $('body').append('<div class="load_png"><div class="lds-hourglass"></div></div>');
      $.exportData();

      var is_busy = false;
      $('#cv-profile-phone').text('Xem ở trên');
      $('#cv-profile-email').text('Xem ở trên');
      html2canvas($('#form-cv'), {
        onrendered: function(canvas) {
          var img_val = canvas.toDataURL("image/png", 1.0);
          var name = $('#cv-title').text();
          var hide = 1;
          var uid = $('#uid_cv').val();
          var cvid = $('#idcv').val();
          if (name == '') {
            name = $('#cv_alias').val();
          }
          if (is_busy == true) {
            return false;
          }
          $.ajax({
            cache: false,
            type: "POST",
            url: "/home/postcv.php",
            data: {
              img_val: img_val,
              name: name,
              idcv: cvid,
              iduser: uid,
              hide: hide,
              has_img_app: 1
            },
            beforeSend: function(response) {
              $('.load_png').remove();
              $('body').append('<div class="load_png"><div class="lds-hourglass"></div></div>');
            },
            success: function(html) {
              $('.load_png').remove();
              is_busy = false;
            }
          });
        }
      });
    }
  </script>
</body>

</html>