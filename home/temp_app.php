<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);
require_once("../home/config.php");

$id_user = getValue("id_user", "str", "GET", "");
$id_cv = getValue("id_cv", "int", "GET", 0);
$id_cv = (int) $id_cv;
$is_preview = getValue("is_preview", "int", "GET", 0);
if ($id_cv != 0 && $id_user != "") {

  $dbgetcv = new db_query("SELECT * FROM samplecv WHERE id = " . $id_cv);
  $rowcv = mysql_fetch_assoc($dbgetcv->result);
  //check is_preview là cv đã lưu bằng tài khoản thành viên
  if ($is_preview == '0'){
    $sql = "SELECT * FROM tbl_cv_preview WHERE id='".$id_user."'";
  } else {
    $sql = "SELECT * FROM savecandicv WHERE iduser=".$id_user. " AND idcv=" . $id_cv;;
  }

  $db_qr = new db_query($sql);

  $row = mysql_fetch_assoc($db_qr->result);

  $namecv   = $rowcv['alias'];
  $cv_title = $rowcv['name'];
  $fullname = $row['name'];
  $position = $row['position'];
  // $codecolor= $row['codecolor'];
  $phone    = $row['use_phone'];
  $holder_birthday = date('d/m/y', $row['birthday']);
  // $email    = $row['use_mail'];
  $langcv   = $row['idlang'];
  $cv       = json_decode(html_entity_decode($row['html']));

  $datacv = $cv;

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

  $avatar   = $datacv->avatar;

  $ava = str_replace('..', '', $avatar);

  if (!@getimagesize('https://timviec365.com' . $ava)) {
    $avatar   = '/images/no_avatar.jpg';
  }

  $fullname = $datacv->name;
  $position = $datacv->position;
  $email    = $datacv->content->content->content->email;
  $address  = $datacv->content->content->content->address;
  $menu_html = array();
  if(isset($cv->menu)){     
    foreach ($datacv->menu as $menu) {
      $menu_html[$menu->order]['title'] = $menu->content->title;
      $menu_html[$menu->order]['id']=$menu->id;
      $menu_html[$menu->order]['class'] ='block cvo-block';
      if($menu->content->content->type == 'profile'){
        $menu_html[$menu->order]['class'].=' box-contact';
        $menu_html[$menu->order]['type']='profile';
        $menu_content = $menu->content->content->content;
        if(isset($cv_new)){
          $menu_content->email = ''; 
          $menu_content->phone = '';
          $menu_content->address = '';
          if(isset($_SESSION['name'])){
            $menu_content->phone = $user->mobile;
            $menu_content->address = $user->address;
          }
        }
        if(isset($_COOKIE['TTUV'])){            
          $menu_content->phone = $data_ur->phone; 
          $menu_content->address = $data_ur->addr;
        }
        $menu_html[$menu->order]['content']=$menu_content;
      }else if($menu->content->content->type=='skill'){
        $menu_html[$menu->order]['class'].=' box-skills';
        $menu_html[$menu->order]['type']='skill';
        $menu_html[$menu->order]['content']=$menu->content->content->skills;
      }else{
        $menu_html[$menu->order]['content']=$menu->content->content;
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
  // $menu_html    = $cv->menu;
  // $block_html   = $cv->experiences;

  // var_dump($menu_html);
  // die;
  $cvid         = $id;
  $item         = $row;
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
  $robots    = 'noindex,nofollow';
  $content   = 'taocv';
} else {
  echo "Lỗi";
}

?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="vi" xml:lang="vi">

<head>

  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title><?php if (isset($meta_title)) { ?><?php echo $meta_title;
                                          } ?></title>
    <meta name="description" content="<?php if (isset($meta_des)) {
                                        echo trim($meta_des);
                                      } ?>">
    <meta name="keywords" content="<?php if (isset($meta_key)) {
                                      echo $meta_key;
                                    } ?>">
    <link rel="stylesheet" href="/css/font-awesome.min.css" type="text/css">
    <style type="text/css">
      body {
        background: #525659 !important;
      }

      .fa {
        font-family: fontawesome;
      }

      #cv-viewer {
        max-width: 790px;
        margin: 0 auto;
      }

      #cv-viewer #cv-document {
        background-color: #fff;
      }

      .clr {
        clear: both;
      }

      .fieldgroup_controls,
      #cv-title {
        display: none !important
      }

      #cv-content .cvo-block {
        position: relative;
        padding: 5px 10px;
      }

      #cv-right .block {
        padding: 0 10px;
      }

      .bar-value-exp {
        display: none;
      }

      i,
      em {
        font-style: italic;
      }

      b {
        font-weight: bold;
      }

      u {
        text-decoration: underline;
      }

      strike {
        text-decoration: line-through;
      }

      .only_see {
        position: fixed;
        top: 0px;
        bottom: 0px;
        left: 0px;
        right: 0px;
        background: unset;
        z-index: 99;
      }

      @page {
        margin: 0px;
      }
    </style>
  </head>

<body>
  <!-- class không cho sửa nội dung -->
  <div class='only_see'></div>
  <div id="cv-viewer">
    <div class="cv-document">
      <?php
      include('../upload/maucv/' . $namecv . '/index.php');
      ?>
      <div class="clr"></div>
    </div>
  </div>
  </div>
</body>

</html>