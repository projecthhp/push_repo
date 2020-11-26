<?
include("config.php");
$sql = '';
if (!isset($_GET['keyword'])) {
redirect("/blog");
}else{
$keyword = getValue("keyword","str","GET","");
$keyword = str_replace("-"," ",$keyword);
$keyword = replaceMQ(trim($keyword));
$page  = getValue('page','int','GET',1,2);
$page  = intval(@$page);
$urlcano = "https://timviec365.com".$_SERVER['REQUEST_URI'];
$uri = $_SERVER['REQUEST_URI'];
$curentPage = 12;
$pageab = abs($page - 1);
$start = $pageab * $curentPage;
$start = intval(@$start);
$start = abs($start);
}
$db_qr = new db_query("SELECT new_id,new_title,new_title_rewrite,new_picture,new_date,cat_name,adm_name,adm_id,new_view,new_des FROM news INNER JOIN categories_multi ON news.new_category_id = categories_multi.cat_id JOIN admin_user ON news.admin_id = admin_user.adm_id WHERE new_active = 1 AND new_new = 0 AND new_title LIKE '%".$keyword."%' ORDER BY new_id DESC LIMIT ".$start.",".$curentPage);
$numrow = new db_query("SELECT count(1) FROM news WHERE new_title LIKE '%".$keyword."%'");
$count = mysql_fetch_assoc($numrow->result);
$count = $count['count(1)'];
$i=0;
?>
<!doctype html>
<html lang="vi" prefix="og: http://ogp.me/ns#" class="no-js">
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <link rel="canonical" href="<?= $urlcano?>" />
    <meta name="p:domain_verify" content=""/>
    <link href="" rel="shortcut icon"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Tin tức <?= $keyword ?></title>
    <meta name="description" content="Cẩm nang định hướng nghề nghiệp, chia sẻ kinh nghiệm tư vấn lựa chọn nghề phù hợp với hàng ngàn cơ hội việc làm uy tín chất lượng"/>
    <meta name="keywords" content="cẩm nang nghề nghiệp, định hướng nghề nghiệp, hướng nghiệp, tư vấn nghề nghiệp, tư vấn chọn nghề phù hợp, lựa chọn công việc phù hợp"/>
    <link rel="canonical" href="<?= $urlcano ?>"/>
    <meta name="robots" content="noodp,noindex,nofollow"/>
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Tin tức <?= $keyword ?>" />
    <meta property="og:description" content="Cẩm nang định hướng nghề nghiệp, chia sẻ kinh nghiệm tư vấn lựa chọn nghề phù hợp với hàng ngàn cơ hội việc làm uy tín chất lượng" />
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
  <body class="blog">
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <header>
      <?include('../includes/blog/inc_header.php');?>
      <div id="banner_cv" class="result_blog main text-center category">
        <p class="text">Kết quả tìm kiếm</p>
        <p class="keyword"><?=$keyword?></p>
        <?include('../includes/blog/inc_blog_search.php');?>
      </div>
    </header>
    <div class="breakcrumb blog">
      <ul>
        <li><a href="/">Trang chủ</a></li>
        <li><a href="/blog">Blog</a></li>
        <li class="active"><a>Kết quả tìm kiếm: <?=$keyword?></a></li>
      </ul>
    </div>
    <div class="box_result_blog main">
      <?
      While($row = mysql_fetch_assoc($db_qr->result)){
        if ($row['new_title_rewrite'] != '') {
          $title_news = $row['new_title_rewrite'];
        }else{
          $title_news = $row['new_title'];
        }
      ?>
      <div class="item">
        <div class="images">
          <img src="/images/load.gif" class="lazyload" data-src="https://timviec365.com/pictures/news/<?=$row['new_picture'] ?>" alt='<?=$row['new_title'] ?>'>
          <span class="view">Lượt xem: <?=$row['new_view']?></span>
        </div>
        <div class="author_result">
          Tác giả: <?= $row['adm_name'] ?>
        </div>
        <div class="time_result">
          <i class="fa fa-clock-o" aria-hidden="true"></i> <?=date("d-m-Y",$row['new_date'])?>
        </div>
        <a href="<?=rewriteBlog($row['new_id'],$title_news)?>" class="title_result"><?=$row['new_title'] ?></a>
        <div class="sapo_result">
          <?=$row['new_des']?>
        </div>
      </div>
      <?}?>
      <div class="pagination_wrap cv text-center clr">
          <div class="clr">
            <?
            echo generatePageBar2('',$page,$curentPage,$count,$urlcano,'&','','jp-current','preview','<','next','>','first','Đầu','last','Cuối');
            ?>
          </div>
        </div>
    </div>




















   <!--  <div id="wapper">
      <section class="blog-content">
        <main role="main">
          <section class="blog_news">
            <div class="container">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-12">
                  <h1>Tìm thấy <?=$count ?> tin liên quan đến từ khóa ' <?=$keyword ?>'</h1>
                </div>
                <div class="col-md-12 col-sm-12 col-12">
                  <?
                  While($row = mysql_fetch_assoc($db_qr->result))
                  {
                  if ($row['new_title_rewrite'] != '') {
                  $title_news = $row['new_title_rewrite'];
                  }else{
                  $title_news = $row['new_title'];
                  }
                  ?>
                  <div class="col-md-4 col-sm-6 col-12 center">
                    <div class="group-item">
                      <article class="blog_hot3">
                        <div class="img-responsive">
                          <a href="/blog/<?= replaceTitle($title_news)."-new".$row['new_id'] ?>.html" class="img-warpper cover">
                            
                          </a>
                        </div>
                        <div class="info">
                          <span class="cate_blog"><?=$row['cat_name'] ?></span>
                          <span class="time"> |  - <?=date("H:i",$row['new_date'])?></span>
                          <p class="author">Tác giả: <a href="<?= rewriteTacgia($row['adm_id'],$row['adm_name']); ?>"><span class="title_blog_dt"></span></a></p>
                          <h3 class="title_blog">
                          <a href="/blog/<?= replaceTitle($title_news)."-new".$row['new_id'] ?>.html"></a>
                          </h3>
                        </div>
                      </article>
                    </div>
                  </div>
                  <? } ?>
                  
                </div>                
              </div>
            </div>
          </section>
        </main>
      </section>
      <? include("../includes/inc_footer.php") ?>
    </div> -->
    <? include("../includes/inc_footer.php") ?>
    <? include("../includes/inc_script_footer.php") ?>
  </body>
</html>