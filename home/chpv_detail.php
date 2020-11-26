<? 
session_start();
include("config.php");

$newid = getValue("newid","int","GET",0);
$newid = (int)$newid;

if($newid == 0)
{
   redirect("https://timviec365.com/cau-hoi-phong-van");
}
else
{
   $db_qrdt = new db_query("SELECT * FROM new_chpv JOIN admin_user ON new_chpv.admin_id = admin_user.adm_id  WHERE new_id = ".$newid." LIMIT 1");
   if(mysql_num_rows($db_qrdt->result) == 0)
   {
      redirect("https://timviec365.com/cau-hoi-phong-van");
   }
   $rowdt = mysql_fetch_assoc($db_qrdt->result);
}
$urlcano = "https://timviec365.com/cau-hoi-phong-van/".replaceTitle($rowdt['new_title_rewrite'])."-pv".$rowdt['new_id'].".html";
  $breakcrumb = "/cau-hoi-phong-van";

$url_img = "https://timviec365.com/pictures/news/".$rowdt["new_picture"];

if ($rowdt['new_tt'] != '') {
  $tt = $rowdt['new_tt'];
}else{
  $tt = $rowdt['new_title'];
}


if ($rowdt['new_des'] != '') {
  $des = $rowdt['new_des'];
}else{
  $des = $rowdt['new_teaser'];
}

if ($rowdt['new_301'] != '') {
   header("HTTP/1.1 301 Moved Permanently"); 
   header("Location: ".$rowdt['new_301']);
   exit();
}

$urluri = "https://timviec365.com".$_SERVER['REQUEST_URI'];
if($urlcano != $urluri)
{
   header("HTTP/1.1 301 Moved Permanently"); 
   header("Location: $urlcano");
   exit();
}
$allow = array("171.255.69.80", "14.162.144.184", "222.255.236.80", "123.24.206.25", "118.70.126.231", "115.79.62.130", "125.212.244.247", "43.239.223.11", "43.239.223.12", "27.3.150.230", "125.212.244.247", "42.118.114.172","43.239.223.60",
"162.158.62.160","118.70.185.222","118.70.126.231","117.4.243.120");
$index = "noodp,index,follow";
?>
<!DOCTYPE html>
<html lang="vi">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<link rel="canonical" href="<?= $urlcano?>" />
		<meta name="p:domain_verify" content=""/>
		<link href="" rel="shortcut icon"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title><?= replaceMQ($tt); ?></title>
		<meta name="description" content="<?= removeHTML(replaceMQ($des)) ?>"/>
		<meta name="Keywords" content="<?=$rowdt['new_keyword'] ?>"/>
    
    <meta name="robots" content="<?=$index?>"/>

		<meta property="og:locale" content="vi_VN" />
    <meta property="og:url" content="<?= $urlcano ?>"/>
		<meta property="og:type" content="website" />
		<meta property="og:title" content="<?= replaceMQ($tt)?>" />
		<meta property="og:description" content="<?= removeHTML(replaceMQ($des)) ?>" />
		<meta property="og:site_name" content="Timviec365.com" />

		<meta property="og:image" content="<?=$url_img ?>"/>
		<meta property="og:image:width" content="476"/>
		<meta property="og:image:height" content="249"/>
		
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:description" content="<?= removeHTML(replaceMQ($des)) ?>" />
		<meta name="twitter:title" content="<?= replaceMQ($tt)?>" />
		<link rel='dns-prefetch' href='//fonts.googleapis.com' />
		<link rel='dns-prefetch' href='//s.w.org' />
		<link rel="stylesheet" href="/css/font-awesome.min.css" onload="if(media!='all')media='all'">
    <link rel="stylesheet" href="/css/style.min.css?v=<?= $version ?>" media='all' onload="if(media!='all')media='all'">
    <meta name="google-site-verification" content="EIV7wHDvaTZkVpsLjmM4_neYDyPLTmjV9du0A8ho4TU" />
          <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PQGTCFD');</script>
<!-- End Google Tag Manager -->

	</head>
	<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
		<header>
      <?include('../includes/blog/inc_header.php');?>
    </header>
		  <?
		     ob_start();
		     if(is_numeric($newid))
		     $cookieName='article_'.$newid;
		     if(!isset($_COOKIE["$cookieName"]))
		     {
		     setcookie("$cookieName","1",time()+3600,"/");
		     $db_ex = new db_execute("UPDATE new_chpv SET new_view = new_view+1 WHERE new_id=".$newid."");
		     }
		     unset($cookieName,$db_ex);
		     ob_end_flush();
		  ?>
      <div class="breakcrumb blog bg_mota chpv">
        <ul>
          <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="/">Trang chủ</a></li>
          <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="/blog">Blog</a></li>
          <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="/cau-hoi-phong-van" class="active">Câu hỏi tuyển dụng</a></li>
          <!-- <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem" class="active"><a>Danh mục</a></li> -->
        </ul>
      </div>
      <div class="main detail_blog">
      <div class="top_detail">
        <h1 class="news-title"><?=$rowdt['new_title'] ?></h1>
        <div class="author_detail">
          <img src="/images/avt_author.png" alt=""> 
          <span class="tac_gia">Tác giả: <?= $rowdt['adm_name'] ?></span>
          <span class="time_dt"><i class="fa fa-clock-o" aria-hidden="true"></i><?= date('d-m-Y',$rowdt['new_date']) ?></span>
        </div>
        <div class="sapo_detail">
          <?=$rowdt['new_teaser'] ?>
        </div>
      </div>
      <div class="muc_luc_blog">
        <?makeML($rowdt['new_description'],'','');?>
        <a rel="nofollow" target="_blank" href="https://timviec365.vn/cv-xin-viec"><img style="margin:20px 0" src="/images/load.gif" class="lazyload" data-src="/images/bannerBlog2.gif" alt="Tạo CV Online"></a>
      </div>
      <div class="news_des">
        <?= button_file(makeML_content(str_replace('src=', 'class="lazyload" src="/images/load.gif" data-src=', $rowdt['new_description']),'','')) ?>
        </div>
        <div class="box_mxh">
          <div class="like-share" style="margin-top:30px">
                <span class="share" style="float: right;">
                    <script src="https://apis.google.com/js/plusone.js"></script>
                    <div style="height: 28px; padding: 0px 3px 0px 5px;">
                        <g:plus action="share" annotation="bubble" data-size="medium"></g:plus>
                    </div>
                </span>
                <span class="share" style="float: right;">
                    <div id="fb-root"></div>
                    <script>
                        (function (d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s);
                            js.id = id;
                            js.src =
                                'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.12&appId=226666764204714&autoLogAppEvents=1';
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));
                    </script>
                    <div class="fb-like" data-href="<?= $urlcano ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                </span>
            </div>
            <a rel="nofollow" target="_blank" href="https://timviec365.vn/"><img style="margin:20px 0" src="/images/load.gif" class="lazyload" data-src="/images/bannerBlog.gif" alt="Tìm việc làm"></a>
      </div>
      <div class="box_lq">
        <div class="main_lq">
          <div class="head">
            <span class="tag_headding">Câu hỏi phỏng vấn liên quan</span>
          </div>
          <div class="main">
            <?
            $sql_lq = "SELECT new_id, new_title, new_title_rewrite,new_picture, new_date FROM new_chpv WHERE new_id != ".$rowdt['new_id']." ORDER BY new_date DESC LIMIT 6 ";
            $db_lq = new db_query($sql_lq);
            While($rowlq = mysql_fetch_assoc($db_lq->result)){
              if($rowlq['new_title_rewrite']!=''){
                $new_title = $rowlq['new_title_rewrite'];
              }else{
                $new_title = replaceTitle($rowlq['new_title']);
              }
            ?>
            <div class="item main">
              <div class="image"><img src="https://timviec365.com/pictures/news/<?=$rowlq['new_picture']?>" alt="<?=$rowlq['new_title']?>"></div>
              <div class="right">
                <a href="<?=rewriteCHPV($rowlq['new_id'],$new_title)?>" class="title_lq"><?=$rowlq['new_title']?></a>
                <p class="time_lq"><i class="fa fa-clock-o" aria-hidden="true"></i><?=date('d-m-Y',$rowlq['new_date'])?></p>
              </div>
            </div>
            <?}unset($dblq,$rowlq)?>
          </div>
        </div>
      </div>
      <?
        $db_cm = new db_query("SELECT * FROM tbl_comment WHERE cmt_url_blog = '".$_SERVER['REQUEST_URI']."' ORDER BY cmt_id DESC");
        $count_cm = mysql_num_rows($db_cm->result);
      ?>
      <div class="comment">
          <div class="create_comment">
            <span id="join_comment">Tham gia bình luận ngay!</span>
            <p class="pull-right">
              <span class="view"><i class="fa fa-eye" aria-hidden="true"></i><?=$rowdt['new_view']?></span>
              <span class="count_cmt"><i class="fa fa-commenting-o" aria-hidden="true"></i><?=$count_cm?></span>
            </p>
          </div>
          <div class="form_comment main">
            <textarea placeholder="Nội dung bình luận" class="form-control" name="" id="comment_Content" cols="20" rows="10"></textarea>
            <input type="text" class="comment_User" class="form-control" placeholder="Họ và tên">
            <input type="text" class="comment_Capcha" class="form-control" placeholder="Nhập mã captcha">
            <img src="../classes/securitycode.php" class="reload" alt="Capcha comment" >
            <div class="clear"></div>
            <input type="button" id="submit" value="Gửi bình luận">
          </div>
        
          <div class="show_comment main">
            <?
              if(mysql_num_rows($db_cm->result)>0){
                while($row_cm = mysql_fetch_assoc($db_cm->result)){
              ?>
                <div class="item_show main">
                  <div class="comment_parent">
                    <div class="img">
                      <img src="/images/logo_user.png" alt="Logo user">
                    </div>
                    <div class="detail">
                      <p class="username">
                        <span class="user_name"><?= $row_cm['cmt_username'] ?></span> 
                        <span class="time_cm"> <i class="fa fa-clock-o" aria-hidden="true"></i><?= date('H:i d-m-Y',$row_cm['cmt_time']) ?></span>
                      </p>
                      <p class="content"><?= $row_cm['cmt_content'] ?></p>
                      <a data-id="<?= $row_cm['cmt_id']?>" class="reply">Phản hồi</a>
                    </div>
                    <ul class="comment_child" id="<?= $row_cm['cmt_id']?>">
                    <?
                      $db_reply = new db_query("SELECT * FROM tbl_cmt_reply WHERE repl_parent_id = ".$row_cm['cmt_id']." ORDER BY repl_id ASC");
                      while($row_reply = mysql_fetch_assoc($db_reply->result)){
                    ?>
                      <li>
                        <?
                          if(in_array($row_reply['rep_ip'], $allow)){
                            $src_rep = "/images/logo_adm.png";
                          }else{
                            $src_rep = "/images/logo_user.png";
                          }
                          ?>
                        <div class="img">
                          <img src="<?=$src_rep?>" alt="Logo user reply">
                        </div>
                        <div class="detail">
                          <p class="username">
                            <span class="user_name"><?= $row_reply['repl_user']?></span>
                            <span class="time_cm"><i class="fa fa-clock-o" aria-hidden="true"></i><?= date('d-m-Y',$row_reply['repl_time']) ?></span>
                          </p>
                          <p class="content"><?= $row_reply['repl_content'] ?></p>
                        </div>
                      </li>
                    <?
                      }
                    ?>
                    </ul>
                </div>
              </div>
              <?
                }
              }?>
            <div class="comment_reply hidden">
              <span id="close">x</span>
                <div class="user">
                  <input type="text" class="comment_User" placeholder="Họ và tên" class="form-control">
                </div>
                <div class="capcha">
                  <input type="text" class="comment_Capcha" placeholder="Nhập mã captcha" class="form-control">
                  <img src="../classes/securitycode.php" alt="Capcha reply" >
                  <i class="fa fa-refresh fa-2x reload" onclick="reloadSecurityCode(this)" aria-hidden="true"></i>
                  
                </div>
                <div class="content">
                  <div>
                    <textarea class="form-control" placeholder="Nhập nội dung bình luận" name="" id="comment_Content" cols="20"
                     rows="10"></textarea>
                  </div>
                </div>
                <input type="button" id="submit_reply" class="pull-right" value="Bình luận">
              </div>
          </div>
          </div>
       </div>
       <div class="box_banner_cv">
            <div class="close_banner_cv">x</div>
            <div class="box_button">
              <a class="button" id="taocv" rel="nofollow" href="/mau-cv.html">Tạo CV</a>
              <a class="button" id="timvieclam" rel="nofollow" href="/">Tìm việc làm</a>
            </div>
          </div>
		<? include('../includes/inc_footer.php'); ?>
		<? include('../includes/inc_script_footer.php') ?>
    <script>
			function reloadSecurityCode(e) {
        $(e).prev().attr("src", "/classes/securitycode.php?t=" + Date.now());
        }
        function replyComment(id){
        offset = $('.comment').offset().top;
        $('html,body').animate({
          scrollTop: offset
        },700);
        $('#comment_Content').val('');
        $('.comment_User').val('');
        $('.comment_Capcha').val('');
        $('.fa.reload').click();
        $('.form_comment #submit').addClass('reply');
        $('.form_comment #submit').attr('data-id',id);
        }
        $(document).ready(function(){
        $('.form_comment #submit').click(function(){
          e = $(this);
          commentContent = $('#comment_Content');
          commentUser = $('.comment_User');
          commentCapcha = $('.comment_Capcha');
          returnForm = true;
          if(commentContent.val() == '' || commentUser.val() == ''){
          alert('Vui lòng nhập đầy đủ thông tin bình luận');
          return false;
          }
          if(commentCapcha.val() == ''){
          alert('Bạn chưa nhập mã captcha');
          return false;
          }
          if(!e.hasClass('reply')){
          $.ajax({
            type:"POST",
            url: "../ajax/comment.php",
            data: {
            username: commentUser.val(),
            content: commentContent.val(),
            link: window.location.href,
            captcha: commentCapcha.val(),
            },
            success: function(data) {
            if (data == 0) {
              alert("Mã captcha không đúng");
            } else {
              $('.show_comment').prepend(data);
              $('.fa-refresh').click();
              commentContent.val('');
              commentUser.val('');
              commentCapcha.val('');
            }
            }
          });
          }else{
          e.removeClass('reply');
          id = e.attr('data-id');
          $.ajax({
            type:"POST",
            url: "../ajax/reply_comment.php",
            data: {
            repl_parent_id: id,
            reply_user: commentUser.val(),
            reply_comment: commentContent.val(),
            reply_capcha: commentCapcha.val(),
            },
            success: function(data) {
            if (data == 0) {
              alert("Mã captcha không đúng");
            } else {
              $('.comment_child#'+id).append(data);
              $('.fa-refresh').click();
              $('.form_comment #submit').attr('data-id','');
              $('html,body').animate({
              scrollTop: $('.comment_child#'+id).parent().offset().top - 50
              },700);
              commentContent.val('');
              commentUser.val('');
              commentCapcha.val('');
            }
            }
          });
          }
        });
        $('.news_des a[href$=".docx"]').html('Tải xuống ngay<sup>.docx</sup>').addClass('download_365');
        $('.news_des a[href$=".doc"]').html('Tải xuống ngay<sup>.doc</sup>').addClass('download_365');
        $('.news_des a[href$=".pdf"]').html('Tải xuống ngay<sup>.pdf</sup>').addClass('download_365');
        $('.news_des a[href$=".xlsx"]').html('Tải xuống ngay<sup>.xlsx</sup>').addClass('download_365');
        $('.news_des a[href$=".xls"]').html('Tải xuống ngay<sup>.xls</sup>').addClass('download_365');
        $('.news_des a[href$=".rar"]').html('Tải xuống ngay<sup>.rar</sup>').addClass('download_365').attr("download", "");
        $('.news_des a[href$=".zip"]').html('Tải xuống ngay<sup>.zip</sup>').addClass('download_365').attr("download", "");
        });
      </script>
          <?
    $ip = client_ip();
    $ip = "117.4.243.120";
    if(!in_array($ip, $allow)){
    ?>
    <style>
      .new-detail .news-title,.new-detail .news-teaser,.muc_luc_blog,.news_des{
            -webkit-touch-callout: none;
            -webkit-user-select: none; 
            -moz-user-select: none;    
            -ms-user-select: none;     
            -o-user-select: none;
            user-select: none;
          }
    </style>
    <script>
      jQuery(document).ready(function(){
  jQuery(function() {
      jQuery('.new-detail .news-title,.new-detail .news-teaser,.muc_luc_blog,.news_des').bind("contextmenu", function(event) {
          event.preventDefault();
      });
  });
  (function() {
      'use strict';
      let style = document.createElement('style');
      style.innerHTML = '*{ user-select: none !important; }';

  document.body.appendChild(style);
  })();
  window.onload = function () {
      document.addEventListener("contextmenu", function (e) {
          e.preventDefault();
          }, false);
          document.addEventListener("keydown", function (e) {
              
             if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
                 disabledEvent(e);
             }
              
             if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
                 disabledEvent(e);
             }
              
             if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
                 disabledEvent(e);
             }
              
             if (e.ctrlKey && e.keyCode == 85) {
                 disabledEvent(e);
             }
             
             if (event.keyCode == 123) {
                 disabledEvent(e);
             }
          }, false);
          function disabledEvent(e) {
             if (e.stopPropagation) {
                 e.stopPropagation();
             } else if (window.event) {
                 window.event.cancelBubble = true;
             }
             e.preventDefault();
             return false;
           
          }
           
  }
});
    </script>
    <?
    }
    ?>
	</body>
	
</html>