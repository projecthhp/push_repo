<? 
include("config.php"); 

$db_seo = new db_query("SELECT * FROM seo_tt WHERE name_page = 'ttsd'");
$row_seo = mysql_fetch_assoc($db_seo->result);
$index = "index,follow";
?>
<!doctype html>
<html lang="en-US" prefix="og: http://ogp.me/ns#" class="no-js">
   <head>
      <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
      <link rel="canonical" href="https://timviec365.com/thoa-thuan-su-dung.html" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title><?=$row_seo['seo_tt'] ?></title>
      <meta name="description" content="<?=$row_seo['seo_des'] ?>"/>
      <meta name="Keywords" content="<?=$row_seo['seo_key'] ?>"/>
      <meta name="robots" content="<?=$index?>"/>

      <link rel="stylesheet" href="/css/font-awesome.min.css" media='all' onload="if(media!='all')media='all'">
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
   <body class="lienhe link_chantrang">
      <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
      <header>
      <? include('../includes/inc_header.php') ?>
         <div id="banner">
            <h1 class="banner_heading"><?=($row_seo['seo_h1']!='')?$row_seo['seo_h1']:$row_seo['real_name_page'] ?></h1>
         </div>
      </header>
      
      <div class="box_nd">
         <div class="main">
            <?=  makeML_content($row_seo['seo_text'],'','') ?>
         </div>
      </div>
      <? 
         include("../includes/inc_footer.php");
         include("../includes/inc_script_footer.php");
      ?>
   </body>
</html>