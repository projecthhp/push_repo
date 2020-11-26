<? include("config.php") ?>
<!DOCTYPE html>
<html lang="vi">
<head>
   <title>404</title>
   <meta charset="utf-8"/>
   <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui">
   <meta name="robots" content="noodp,noindex,nofollow"/>
   <link rel='stylesheet' id='font-awesome-css'  href='/fonts/font-awesome.min.css' media='all' />
   <link href="/css/style.min.css?v=<?=$version?>" rel="stylesheet"/>
    <!-- Google Tag Manager -->
   <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
   new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
   j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
   'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
   })(window,document,'script','dataLayer','GTM-PQGTCFD');</script>
   <!-- End Google Tag Manager -->
   <!-- Google Tag Manager (noscript) -->
   <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
   height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
   <!-- End Google Tag Manager (noscript) -->
   <style>
      
   </style>
</head>
<body id="page404">
   <div class="text-center">
      <img src="/images/404.png" alt="Image 404">
      <div class="text-center">
         <p>Whoops...Page Not Found :( </p>
         <a id="back_home" href="/">Về trang chủ</a>
      </div>
   </div>
   <img src="/images/bot_404.png" alt="bottom 404">
   <? include("../includes/inc_script_footer.php");?>
   <script>
      $(document).ready(function(){
         height = $(window).height();
         $('#page404').css('height',height);
      });
   </script>
</body>
</html>