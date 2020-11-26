<? 
include("config.php"); 
redirect('/viec-lam-theo-nganh-nghe.html');
$db_seo = new db_query("SELECT * FROM seo_tt WHERE name_page = 'vlct'");
$row_seo = mysql_fetch_assoc($db_seo->result);

?>
<!doctype html>
<html lang="en-US" prefix="og: http://ogp.me/ns#" class="no-js">
<head>
   <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
   <link rel="canonical" href="https://timviec365.com/viec-lam-theo-tinh-thanh.html" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
   <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   <title><?=$row_seo['seo_tt'] ?></title>
   <meta name="description" content="<?=$row_seo['seo_des'] ?>"/>
   <meta name="Keywords" content="<?=$row_seo['seo_key'] ?>"/>
   <meta name="robots" content="noodp,index,follow"/>

   <link rel='dns-prefetch' href='//fonts.googleapis.com' />
   <link rel='dns-prefetch' href='//s.w.org' />
   <link rel='stylesheet' id='wpb-google-fonts-css'  href='https://fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C700italic%2C400%2C700%2C300&#038;ver=4.6.5' media='all' onload="if(media!='all')media='all'" />
   <link rel='stylesheet' id='bootstrap.min-css'  href='/css/bootstrap.min.css' media='all' onload="if(media!='all')media='all'" />
   <link rel='stylesheet' id='font-awesome-css'  href='/fonts/font-awesome.min.css' media='all' onload="if(media!='all')media='all'" />
   <link rel='stylesheet' id='owl.themecss-css'  href='/css/select2.css' media='all' onload="if(media!='all')media='all'" />
   <link rel='stylesheet' id='style-css'  href='/css/style.min.css?v=<?= $version ?>' media='all' onload="if(media!='all')media='all'" />
   <link href="/css/responsive.css?v=<?= $version ?>" rel="stylesheet" media='all' onload="if(media!='all')media='all'"/>
   <!-- Google Tag Manager -->
   <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
   j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
   'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PQGTCFD');</script>
<!-- End Google Tag Manager -->

<script async type='text/javascript' src='/js/jquery.min.js'></script>
<script async type='text/javascript' src='/js/select2.min.js'></script>

<meta name="google-site-verification" content="EIV7wHDvaTZkVpsLjmM4_neYDyPLTmjV9du0A8ho4TU" />

</head>
<body class="home">
   <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
   <div id="wapper">
      <? include('../includes/inc_header.php') ?>
      <? include("../includes/inc_search.php") ?>

      <div class="tab-tinhthanh">
         <section id="bgcat" style="background: #ffffff;">
            <div class="vieclam_container container">
               <h1 class="tvl-tinhthanh">
                  <?=$row_seo['seo_h1'] ?>
               </h1>
               <div class="sa-tab-contai row" id="tab_city">
                  <ul class="col-12">
                     <?
                     foreach($arrcity as $type => $item)
                     {
                        ?>
                        <li class="col-md-4 col-sm-6 col-12"><a rel="nofollow" href="<?= rewriteCate($item['cit_id'],$item['cit_name']) ?>">Tìm việc làm tại <?= $item['cit_name'] ?> <span style="color: #ff5a09">(<?= $item['cit_count_vl'] ?>)</span></a></li>
                        <?
                     }
                     unset($type,$item);
                     ?>
                  </ul>
               </div>


<!--          <div class="box_bottom_cate container">
               <div  id="mota"><br>
                  <div><?=$row_seo['seo_text'] ?></div>
               </div>
            </div> -->

         </div>
      </section>
   </div>
   <? include("../includes/inc_footer.php") ?>
</div>
<? include("../includes/inc_script_footer.php") ?>
</body>
</html>
<script>
   $(document).ready(function(){
      $("a").attr("rel","nofollow");
      $("#tab_city ul a").attr("rel","dofollow");
   });
</script>