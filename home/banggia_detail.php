<?
include("config.php"); 
$id = getValue('id','int','GET','0');

$db_bg = new db_query("SELECT * FROM bang_gia WHERE bg_type = ".$id);
if(mysql_num_rows($db_bg->result)==0){
    // redirect('/404.html');
}


if($id > 0 && $id < 4){
    $title_bg = "Ghim tin tuyển dụng trang chủ";
}
else{
    $title_bg = "Ghim tin tuyển dụng trang ngành";
}
if($id == 5){
    $title_bg = "Lọc hồ sơ";
}
?>

<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui"/>
        <link rel="canonical" href="<?= $domain ?>" />
        <meta name="p:domain_verify" content=""/>
        <link href="" rel="shortcut icon"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Bảng giá Timviec365.com</title>
        <meta name="description" content="<?=$row_seo['seo_des'] ?>"/>
        <meta name="Keywords" content="<?=$row_seo['seo_key'] ?>"/>
        <meta name="robots" content="noodp,noindex,nofollow"/>      
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="<?=$row_seo['seo_tt'] ?>" />
        <meta property="og:description" content="<?=$row_seo['seo_des'] ?>" />
        <meta property="og:site_name" content="tìm việc làm" />
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:description" content="<?=$row_seo['seo_des'] ?>" />
        <meta name="twitter:title" content="<?=$row_seo['seo_tt'] ?>" />
        
        <link rel='dns-prefetch' href='//fonts.googleapis.com' />
        <link rel='dns-prefetch' href='//s.w.org' />
        <link rel="stylesheet" href="/css/bootstrap.min.css" media='all' onload="if(media!='all')media='all'">
        <link rel="stylesheet" href="/css/select2.min.css" media='all' onload="if(media!='all')media='all'">
        <link rel="stylesheet" href="/css/slick-theme.css" media='all' onload="if(media!='all')media='all'">
        <link rel="stylesheet" href="/css/slick.css" media='all' onload="if(media!='all')media='all'">
        <link rel="stylesheet" href="/css/style.css?v=<?= $version ?>" media='all' onload="if(media!='all')media='all'">
        <link rel="stylesheet" href="/css/reponsive.css?v=<?= $version ?>" media='all' onload="if(media!='all')media='all'">
        <link rel="stylesheet" href="/css/font-awesome.min.css?v=<?=$version?>">
        <meta name="google-site-verification" content="EIV7wHDvaTZkVpsLjmM4_neYDyPLTmjV9du0A8ho4TU" />
        <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PQGTCFD');</script>
<!-- End Google Tag Manager -->
    </head>
    <body id="banggia">
        <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
        <header id="banggia">
            <div class="container">
                <div class="row">
                <? 
                    include('../includes/inc_header_banggia.php');
                    include('../includes/inc_endheader.php');
                ?>
                </div>
            </div>
        </header>
        <section style="background: #E5E5E5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 "><div class="title_bg"><?=$title_bg?></div></div>
                    <div class="main_detail_banggia">
                        <div class="col-md-3 col-xs-12 col-sm-12">
                            <div class="detail_left">
                                <p class="tt">Trang chủ</p>
                                <ul>
                                    <li><a href="/chi-tiet/1"><i class="fa fa-angle-right" aria-hidden="true"></i> Việc làm hấp dẫn</a></li>
                                    <li><a href="/chi-tiet/2"><i class="fa fa-angle-right" aria-hidden="true"></i> Việc làm tuyển gấp</a></li>
                                    <li><a href="/chi-tiet/3"><i class="fa fa-angle-right" aria-hidden="true"></i> Việc làm lương cao</a></li>
                                </ul>
                                <p class="tt">Trang ngành</p>
                                <ul>
                                    <li><a href="/chi-tiet/4"><i class="fa fa-angle-right" aria-hidden="true"></i> Ưu tiên trên trang ngành</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 col-sm-12 detail_center_st">
                            <div class="detail_center">
                                <?
                                if($id != 5){
                                ?>
                                <table border="1" width="100%">
                                    <tr id="first">
                                        <td>Thời gian (Tuần)</td>
                                        <td>Đơn giá (vnđ)</td>
                                        <td>Chiếu khấu(%)</td>
                                        <td>Giá có vat (VNđ)</td>
                                        <td>TẶNG điểm</td>
                                    </tr>
                                    <?
                                    $i = 0;
                                    while($row_bg = mysql_fetch_array($db_bg->result)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <input <?= ($i==0)?'checked':"" ?> name="bg_tuan" value="<?= $row_bg['bg_id']?>" type="radio"> <?= $row_bg['bg_tuan']?>
                                        </td>
                                        <td><?= $row_bg['bg_gia']?></td>
                                        <td><?= $row_bg['bg_chiet_khau']?></td>
                                        <td><?= $row_bg['bg_vat']?></td>
                                        <td><?= $row_bg['bg_point']?></td>
                                    </tr>
                                    <?
                                    $i++;
                                    }
                                    ?>
                                </table>
                                <?
                                }else{
                                ?>
                                <table border="1" width="100%">
                                    <tr id="first">
                                        <td>Hồ sơ</td>
                                        <td>Đơn giá (vnđ)</td>
                                        <td>Chiếu khấu(%)</td>
                                        <td>Giá có vat (VNđ)</td>
                                    </tr>
                                    <?
                                    $i = 0;
                                    while($row_bg = mysql_fetch_array($db_bg->result)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <input <?= ($i==0)?'checked':"" ?> name="bg_tuan" value="<?= $row_bg['bg_id']?>" type="radio"> <?= $row_bg['bg_tuan']?>
                                        </td>
                                        <td><?= $row_bg['bg_gia']?></td>
                                        <td><?= $row_bg['bg_chiet_khau']?></td>
                                        <td><?= $row_bg['bg_vat']?></td>
                                    </tr>
                                    <?
                                    $i++;
                                    }
                                    ?>
                                </table>
                                <?
                                }
                                ?>
                                <div class="detail_bottom">
                                    <a data-toggle="modal" data-target="#modalBangGia">Sử dụng dịch vụ này</a>
                                </div>
                                <div class="detail_des">
                                </div>
                            </div>
                        </div>
                         <div class="col-md-3 col-xs-12 col-sm-12">
                            <div class="main_cate_right detail">
                                <p class="title_right">Quyền lợi</p>
                                <div class="content_right quyenloi" id="detail_quyenloi"></div>
                                <p class="title_right">Ưu đãi</p>
                                <div class="content_right uudai" id="detail_uudai"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?
            include('../includes/inc_modalThanhToan.php');
        ?>
        <? include('../includes/inc_footer.php'); ?>
    </body>
    <? include('../includes/inc_script_footer.php') ?>
    <script src="../js/banggia.js?v=<?= $version?>"></script>
</html>