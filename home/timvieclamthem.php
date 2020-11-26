<?
include("config.php");

<<<<<<< HEAD
$page  = getValue('page','int','GET',1);
$page  = intval(@$page);

=======
$page  = getValue('page','int','GET',0);
$page  = intval(@$page);
if($page == 1)
{
   redirect('/tim-viec-lam-them.html');
}
>>>>>>> 12bb0cb9ff663446bb65b5a9c100a529c228166a
if($page == 0)
{
    $page = 1;
}
$curentPage = 24;
$pageab = abs($page - 1);
$start = $pageab * $curentPage;
$start = intval(@$start);
$start = abs($start);
$time = time();
$db_qr = new db_query("SELECT new.new_id,usc_id,new_money,new_city,new_cap_bac,new_create_time,usc_create_time,usc_logo,usc_company,new_title,new_nganh,usc_alias,new.new_han_nop,new_alias FROM new STRAIGHT_JOIN user_company ON new_user_id = user_company.usc_id WHERE 1 AND FIND_IN_SET('87' , new_cat_id) ORDER BY new_hot DESC,new.new_update_time DESC, new_id DESC LIMIT ".$start.",".$curentPage);

if($page > 1)
{
    $trang = " - trang ".$page;
    $url_query = "?page".$page;
}
else
{
<<<<<<< HEAD
    $trang = '';
=======
    $trang = $url_query = '';
>>>>>>> 12bb0cb9ff663446bb65b5a9c100a529c228166a
}

function max_count($a,$b,$c){
    $max = $a;
    if($max < $b){
        $max = $b;
    }
    if($max < $c){
        $max = $c;
    }
    return $max;
}

$db_seo = new db_query("SELECT * FROM seo_tt WHERE name_page = 'tim-viec-lam-them'");
$row_seo = mysql_fetch_array($db_seo->result);
$description = $row_seo['seo_des'];
$keyword_tt = $row_seo['seo_key'];
$seo_tt = $row_seo['seo_tt'];
$h1 = "Tìm việc làm thêm";
<<<<<<< HEAD
$canonical = "https://timviec365.com".$_SERVER['REQUEST_URI'];
$index = "index,follow";
//Page này index
=======

$canonical = "https://timviec365.com/tim-viec-lam-them.html";
$index = "index,follow";

>>>>>>> 12bb0cb9ff663446bb65b5a9c100a529c228166a
?>
<!DOCTYPE html>
<html lang="vi" prefix="og: http://ogp.me/ns#" class="no-js">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <link rel="canonical" href="<?= $canonical ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title><?=$seo_tt; ?></title>
    <meta name="description" content='<?=$description; ?>'/>
    <meta name="Keywords" content="<?=$keyword_tt; ?>"/>
    <?
    if($page == 1){
        ?>
        <meta name="robots" content="<?=$index?>"/>
        <?
    }
    else{
        ?>
        <meta name="robots" content="noodp,noindex,nofollow"/>
        <?
    }
    ?>
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?=$seo_tt; ?>" />
    <meta property="og:description" content='<?=$description; ?>' />
    <meta property="og:site_name" content="Timviec365.com" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content='<?=$description; ?>' />
    <meta name="twitter:title" content="<?=$seo_tt; ?>" />
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
    <script type="application/ld+json">
     {
       "@context": "https://schema.org/", 
       "@type": "BreadcrumbList", 
       "itemListElement": [{
         "@type": "ListItem", 
         "position": 1, 
         "name": "Trang chủ",
         "item": "https://timviec365.com/"  
       },{
         "@type": "ListItem", 
         "position": 2, 
         "name": "Tìm việc làm thêm",
         "item": "https://timviec365.com/tim-viec-lam-them.html"  
       }]
     }
     </script>
</head>
<body id="job_overtime">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<header>
    <? include('../includes/inc_header.php'); ?>
    <div id="banner">
        <? include('../includes/inc_search.php') ?>
        <p class="taingay">Tải ngay ứng dụng timviec365 và cv365+ trên điện thoại để trải nghiệm tốt nhất</p>
        <a class="downLoad_App Timviec365" rel="nofollow" href="/ung-dung-tim-viec-lam.html"><i class="icon"></i>Tải app Timviec365</a>
        <a class="downLoad_App CV365" rel="nofollow" href="/ung-dung-tao-cv.html"><i class="icon"></i>Tải app CV365</a>
    </div>
</header>
<div class="breakcrumb">
    <ul>
        <li><a href="/">Trang chủ</a></li>
        <li class="active"><a><h1 class="bre_heading"><?= $h1; ?></h1></a></li>
    </ul>
</div>
<div class="box_jobovertime">
    <div class="tit_tablist">
        <h2 class="item job_overtime active" data-id="87"></h2>
        <h2 class="item job_parttime" data-id="6"></h2>
        <h2 class="item job_at_home" data-id="44"></h2>
    </div>
    <div class="main_option2">
        <?
        While($row = mysql_fetch_assoc($db_qr->result)){
        ?>
        <div class="item">
            <div class="logo">
                <img onerror='this.onerror=null;this.src="/images/logo-new.png";' src="/images/load.gif" class="lazyload" data-src="<?= str_replace('../', $domain.'/', geturlimageAvatar($row['usc_create_time']).$row['usc_logo'])?>" alt="<?= $row['usc_company'] ?>">
            </div>
            <div class="content-right">
                <div class="left">
                    <a href="<?= rewriteNews($row['new_id'],$row['new_title'],$row['new_alias']) ?>"><h3 class="title_new"><?= $row['new_title'] ?></h3></a>
                    <a href="<?= rewrite_company($row['usc_id'],$row['usc_company'],$row['usc_alias']) ?>" class="name_company"><?= name_company($row['usc_company']) ?></a>
                </div>
                <div class="right">
                    <p class="p_dd"><i class="fa fa-map-marker" aria-hidden="true"></i> 
                    <?
                    $arr_city = explode(',', $row['new_city']);
                    $new_city = [];
                    foreach ($arr_city as $key => $val) {
                        $new_city[] = $arrcity[$val]['cit_name'];
                    }
                    $new_city = implode(', ', $new_city);
                    echo $new_city;
                    ?>
                    </p>
                    <p class="p_salary"><i class="salary"></i> <?= $array_muc_luong[$row['new_money']]?></p>
                    <p class="p_time"><i class="time"></i><?= date('d/m/Y',$row['new_han_nop']) ?></p>
                </div>
            </div>
        </div>
        <?
        }
        unset($row);
        ?>
    </div>
    <div class="pagination_wrap text-center clr">
        <div class="clr">
            <?
            $numrow = new db_query("SELECT count(1) FROM new STRAIGHT_JOIN user_company ON new_user_id = user_company.usc_id WHERE 1 AND FIND_IN_SET('87' , new_cat_id)  ");
            $count = mysql_fetch_assoc($numrow->result);
            $count = $count['count(1)'];
            $numrow1 = new db_query("SELECT count(1) FROM new STRAIGHT_JOIN user_company ON new_user_id = user_company.usc_id WHERE 1 AND FIND_IN_SET(6 , new_cat_id) ");
            $count1 = mysql_fetch_assoc($numrow1->result);
            $count1 = $count1['count(1)'];
            $numrow2 = new db_query("SELECT count(1) FROM new STRAIGHT_JOIN user_company ON new_user_id = user_company.usc_id WHERE 1 AND FIND_IN_SET(44 , new_cat_id) ");
            $count2 = mysql_fetch_assoc($numrow2->result);
            $count2 = $count2['count(1)'];
            $max = max_count($count,$count1,$count2);

            $urlcano = $_SERVER['REQUEST_URI'];
            $urlcano = str_replace("?page=".$page, "", $urlcano);
            $urlcano = str_replace("&page=".$page, "", $urlcano);
            $urlcano = str_replace("page=".$page, "", $urlcano);
            if (strlen(strstr($urlcano, '?')) > 0) {
                echo generatePageBar2('',$page,$curentPage,$max,$urlcano,'&','','jp-current','preview','<','next','>','first','Đầu','last','Cuối');
            }else{
                echo generatePageBar2('',$page,$curentPage,$max,$urlcano,'?','','jp-current','preview','<','next','>','first','Đầu','last','Cuối');
            }
            ?>
        </div>
    </div>
</div>
<div class="box_text_seo option2">
    <div class="menu">
    <? makeML($row_seo['seo_text'],'',''); ?>
    </div>
    <div class="content">
       <div class="nd"><?= makeML_content(str_replace('src=', 'class="lazyload" src="/images/load.gif" data-src=', $row_seo['seo_text']),'','') ?></div>
       <div class="read">
        Xem thêm <i class="fa fa-angle-double-down" aria-hidden="true"></i>
       </div>
    </div>
</div>
<? 
    include('../includes/inc_footer.php');
    include('../includes/inc_script_footer.php') 
?>
<script>
    $('.tit_tablist .item').click(function(){
        e = $(this);
        page = <?=$page?>;
        idCat = e.attr('data-id');
        $('.tit_tablist .item').removeClass('active');
        e.addClass('active');
        $.ajax({
            type:"POST",
            url: "../ajax/getJobOVTime.php",
            data:{
                page: page,
                idCat: idCat
            },beforeSend:function(){
                $('.main_option2').html('Vui lòng chờ ...');
            },success:function(data){
                $('.main_option2').html(data);
            }
        });
    });
</script>
</body>

</html>