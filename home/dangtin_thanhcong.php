<?
    include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="robots" content="noodp,noindex,nofollow"/>
	<title>Đăng tin thành công | Timviec365.com</title>
	<link rel="stylesheet" href="/css/font-awesome.min.css" media="all">
	<link rel="stylesheet" href="/css/style.min.css?v=<?=$version?>" media="all">
	<link rel="stylesheet" href="/css/style_company_manager.css?v=<?=$version?>" media='all' onload="if(media!='all')media='all'">
</head>
<body class="manager">
<? include('../includes/inc_left_ntdmanager.php') ?>
<div class="right_manager">
<?include('../includes/inc_header_ntd_manager.php');?>
    <div class="main">
    <?
        $db_qr = new db_query("SELECT new_cat_id, new_city FROM new WHERE new_user_id = ".$_COOKIE['UID']." ORDER BY new_id DESC LIMIT 1");
        $row = mysql_fetch_assoc($db_qr->result);
        $ar_cat = explode(',', $row['new_cat_id']);
        $ar_cit = explode(',', $row['new_city']);
        $cateid = $ar_cat[0];
        $catename = $db_cat[$cateid]['cat_name'];
        $cityid = $ar_cit[0];
        $cit_name = $arrcity[$cityid]['cit_name'];
        ?>
        <div class="center createnew_success">
           <div class="text-center">
               <img src="/images/load.gif" class="lazyload" data-src="/images/icon365_manager/img_createnew_success.png" alt="Đăng tin thành công">
           	<p class="noti_success">Chúc mừng bạn đã đăng tin tuyển dụng thành công</p>
           </div>
            <div class="body text-center">
            	<p>Tin tuyển dụng của bạn đã được duyệt và được hiển thị trong danh sách việc làm của Timviec365.com</p>
            	<p>Tin tuyển dụng của bạn có thể chưa tối ưu về nội dung để tiếp cận nhiều ứng viên và thu hút ứng viên nộp hồ sơ, hãy liên hệ với chuyên viên để chúng tôi có thể hướng dẫn bạn đăng tin hiệu quả nhất</p>
            	<p>Tăng tốc tuyển dụng ! Chúng tôi sẽ tối ưu nội dung đăng tin giúp bạn, cùng đó đưa ra giải pháp hiệu quả và chiến lược tuyển dụng trên facebook, google,... giúp tìm được ứng viên chất lượng nhanh chóng</p>
            </div>
            <div class="text-center bottom">
            	<a id="tangtoc" href="/bang-gia">Tăng tốc tuyển dụng</a>
            	<a id="uv_tiemnang" href="<?=rewriteCateUV($cityid,$cit_name,$cateid,$catename)?>">Ứng viên tiềm năng</a>
            </div>
        </div>
    </div>
</div>
<? if($detect->isMobile() || $detect->isTablet()) include('../includes/inc_chuyenvienmb.php') ?>
    <?
    include('../includes/inc_footer.php');
    include('../includes/inc_script_footer.php');
    ?>
    <script src="/js/update_ntd.js?v=<?=$version?>"></script>
</body>
</html>