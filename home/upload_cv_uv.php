<?php
$xt = 1;
include("config.php");
include("../functions/send_mail.php");
if(isset($_COOKIE['xt'])){
   $db_get_tmp = new db_query("SELECT * FROM tmp_user WHERE tmp_id = ".$_COOKIE['xt']);
   if(mysql_num_rows($db_get_tmp->result) > 0)
   {
    $row = mysql_fetch_assoc($db_get_tmp->result);
    $email = $row['tmp_email'];
    $phone = $row['tmp_phone'];
    $password = $row['tmp_pass'];
    $timeaway = $row['tmp_time'];
    $user_name = $row['tmp_name'];
    $user_city = $row['tmp_city'];
    $district = $row['tmp_distric'];
    $address = $row['tmp_address'];
    $jobname = $row['tmp_job_name'];
    $job_address = $row['tmp_job_city'];
    $nganh_nghe = $row['tmp_nganh_nghe'];
    $image = $row['tmp_image'];
   }
}
else{
  header("Location: dang-ky-ung-vien.html");
}

if(isset($_POST["Submit"]) && isset($_FILES['file'])){

  $birthday = getValue('birthday','str','POST','');
  $birthday = strtotime($birthday);
  $knlv     = getValue('knlv','str','POST','');
  $bc       = getValue('bc','str','POST','');

  // File upload path
  $targetDir = '../upload/uv/';
  $fileType = pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION);

  $fileName = $_FILES["file"]["name"];
  
  $year = date('Y',time());
  $month = date('m',time());
  $day = date('d',time());

  if(!file_exists($targetDir.$year))
  {
    mkdir($targetDir.$year);
  }
  if(!file_exists($targetDir.$year.'/'.$month))
  {
    mkdir($targetDir.$year.'/'.$month);
  }
  if(!file_exists($targetDir.$year.'/'.$month.'/'.$day))
  {
    mkdir($targetDir.$year.'/'.$month.'/'.$day);
  }
  $targetFilePath = $targetDir.$year.'/'.$month.'/'.$day.'/'. $fileName;

  // Allow certain file formats
  $allowTypes = array('jpg','png','jpeg','gif','pdf','doc','docx');
  if(in_array($fileType, $allowTypes))
  {
    // Upload file to server
    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath))
    {
      if($image!=''){
        $tmp_year = date('Y',$tmp_time);
        $tmp_month = date('m',$tmp_time);
        $tmp_day = date('d',$tmp_time);
        $full_path = "../pictures/tmp_uv/".$tmp_year.'/'.$tmp_month.'/'.$tmp_day.'/'.$image;

        $path = "../pictures/";
        $year = date('Y',$timeaway);
        $month =  date('m',$timeaway);
        $day = date('d',$timeaway);

        if(!file_exists($path))
        {
          mkdir($path,0777);
        }
        if(!file_exists($path.$year))
        {
          mkdir($path.$year,0777);
        }
        if(!file_exists($path.$year.'/'.$month))
        {
          mkdir($path.$year.'/'.$month,0777);
        }
        if(!file_exists($path.$year.'/'.$month.'/'.$day))
        {
          mkdir($path.$year.'/'.$month.'/'.$day,0777);
        }
        $type = end(explode('.', $image));
        $image = replaceTitle($user_name).'-'.time();
        $path_to = $path.$year.'/'.$month.'/'.$day.'/'.$image.'.'.$type;
        $img = $image.'.'.$type;
        copy($full_path, $path_to);
        unlink($full_path);
      }
            // Insert image file name into database
      $insert = new db_query("INSERT INTO `user`(`use_mail`, `use_phone`, `use_pass`, `use_time`, `use_authentic`, `use_name`, `use_city`,`address`,`use_district`,`use_job_name`,`use_district_job`,`use_nganh_nghe`,`use_create_time`,`use_update_time`,`use_logo`,`birthday`,`exp_years`,`use_show`) VALUES ('".$email."','".$phone."','".$password."',".$timeaway.",'0','".$user_name."','".$user_city."','".$address."','".$district."','".$jobname."','".$job_address."','".$nganh_nghe."','".time()."','".time()."','".$img."','".$birthday."','".$knlv."',0)");
      $last_id = mysql_insert_id();
      $insert2 = new db_query("INSERT INTO user_hocvan(`use_id`,`truong_hoc`,`bang_cap`,`tg_batdau`,`tg_ketthuc`,`chuyen_nganh`,`xep_loai`,`thongtin_bosung`) VALUES ('".$last_id."','','".$bc."','','','','','')");
      $insert_upload = new db_query("INSERT INTO user_cv_upload(`use_id`,`link`) VALUES ('".$last_id."','".$targetFilePath."')");
        $query_nguoi_tham_chieu = new db_query("INSERT INTO `user_tham_chieu`(`id_user`) VALUES ('".$last_id."')");
        $secu = md5($email);
        
        $link = $domain."/xac-thuc-tai-khoan-ung-vien-thanh-cong.html?code=".$secu."&id=".$last_id;
        setcookie('UT', 0 ,time() + 7*6000,'/');
        setcookie('UID', $last_id ,time() + 7*6000,'/');
        setcookie('PHPSESPASS', $password ,time() + 7*6000,'/');

        /** Gửi email khi đăng ký thành công **/
        SendRegisterTVC($email,$user_name,$link);
        $del_tmp = new db_query("DELETE FROM tmp_user WHERE tmp_id = ".$_COOKIE['xt']);
        unset($_COOKIE['xt']);
        setcookie('xt', null, -1, '/');
        header('Location: /xac-thuc-tai-khoan-ung-vien.html'); 
      if($_FILES["file"]["error"] == 0)
      {
        $statusMsg = "CV của bạn đã tải lên thành công";
      }
      else{$statusMsg = "Lỗi tải CV xin vui lòng thử lại";} 
    }
    else{$statusMsg = "Có lỗi trong quá trình tải CV,xin vui lòng thử lại";}
  }
  else{$statusMsg = 'CV của bạn không đúng định dạng';}
}
else{
  $statusMsg = "Tải lên DOC, DOCX, PDF, PNG, JPG & JPEG.Kích thước tối đa 2000Kb";
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Bước 2: Tải CV ứng viên</title>
		<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui"/>
		<meta name="robots" content="nofollow,nofollow,noodp"/>
		<link rel="stylesheet" href="/css/font-awesome.min.css" media='all' onload="if(media!='all')media='all'">
    <link rel="stylesheet" href="/css/select2.min.css" media="all" onload="if(media!='all')media='all'">
    <link rel="stylesheet" href="/css/style.min.css?v=<?= $version ?>" media='all' onload="if(media!='all')media='all'">
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
		<div class="register main register_2">
  <div class="back"><a href="/dang-ky-chung.html"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a></div>
  <div class="main">
    <div class="left">
      <div class="main_item">
        <div class="item"></div>
        <div class="item"></div>
        <div class="item"></div>
      </div>
      <p class="text-center hotro">Hỗ trợ đăng ký</p>
      <p class="text-center holine">Hotline dành cho nhà tuyển dụng và ứng viên</p>
      <p class="text-center sdt_hotline"><span>0971.335.869</span>  hoặc  <span>024 36.36.66.99</span></p>
      <p class="text-center email"><b>Email:</b> timviec365com@gmail.com</p>
      <p class="text-center address"><b>Địa chỉ:</b> Số 206 Định Công Hạ , Phường Định Công, Quận Hoàng Mai, Hà Nội</p>
      <div class="left-bottom">
        <div class="item">
          <img src="/images/load.gif" class="lazyload" data-src="/images/qr_app_job.png" alt="Qr app timviec">
          <a class="downLoad_App Timviec365" rel="nofollow" href="/ung-dung-tim-viec-lam.html"><i class="icon"></i>Tải app Timviec365</a>
        </div>
        <div class="item">
          <img src="/images/load.gif" class="lazyload" data-src="/images/qr_app_job.png" alt="Qr app CV">
          <a class="downLoad_App CV365" rel="nofollow" href="/ung-dung-tao-cv.html"><i class="icon"></i>Tải app CV365</a>
        </div>
      </div>
    </div>
    <div class="right">
      <div class="main">
        <p class="text-center"><img src="/images/load.gif" class="lazyload" data-src="/images/logo-new.png" alt="Logo Register"></p>
        <p id="td" class="text-center">Hoàn thiện đăng ký hồ sơ ứng viên</p>
        <form action="" method="POST" enctype="multipart/form-data" onsubmit="return ValiUpLoad()">
          <div class="form-group exp_uv">
            <label class="require" for="">Năm sinh:</label>
            <div class="div-right">
              <input class="form-control" name="birthday" id="birthday" type="date" value="<?=(isset($birthday))?date('Y-m-d',$birthday):""?>">
            </div>
          </div>
          <div class="form-group mucluong">
            <label class="require" for="">Kinh nghiệm làm việc:</label>
            <div class="div-right">
              <select name="knlv" id="knlv" class="form-control">
                <option value="">Chọn kinh nghiệm làm việc</option>
                <?
                foreach ($array_kinh_nghiem as $key => $value) {
                ?>
                <option <?= (isset($knlv) && $knlv == $key )?"selected":"" ?> value="<?=$key?>"><?=$value?></option>
                <?
                }
                ?>
              </select>
              <i class="fa fa-caret-down" aria-hidden="true"></i>
            </div>
          </div>
          <div class="form-group">
            <label class="require" for="">Bằng cấp:</label>
            <div class="div-right">
              <input type="text" class="form-control" id="bc" name="bc" value="<?=(isset($bc))?$bc:""?>">
            </div>
          </div>
					<div class="form-group chooseCV text-center">
            <div class="CV">
              <img src="/images/load.gif" class="lazyload" data-src="/images/upLoadCV_2.png" alt="Images ChooseCV">
              <p><a class="choose">Chọn CV từ máy tính của bạn</a></p>
              <input type="file" name="file" id="file" class="hidden">
            </div>
          </div>
          <p class="text-center note_upLoadCV <?= $class_error ?>"><?= $statusMsg ?></p>
          <div class="form-group text-center">
            <button type="submit" name="Submit">tải lên cv xin việc</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
		<?include('../includes/inc_script_footer.php'); ?>
    <script>
        $('#knlv').select2({
          width:'100%'
        });

        function ValiUpLoad(){
          var birthday = $('#birthday');
          var knlv = $('#knlv');
          var bc = $('#bc');

        if(birthday.val() == ''){
            if(birthday.hasClass('error') == false){
              birthday.addClass('error');
              birthday.after("<label class='error' id='birthday_err'>Vui lòng chọn ngày sinh</label>");
            }
            birthday.focus();
            return false;
          }else{
            birthday.removeClass('error');
            $('#birthday_err').remove();
          }
          if(knlv.val() == ''){
            if(knlv.hasClass('error') == false){
              knlv.addClass('error');
              knlv.after("<label class='error' id='knlv_err'>Vui lòng chọn kinh nghiệm làm việc</label>");
            }
            knlv.focus();
            return false;
          }else{
            knlv.removeClass('error');
            $('#knlv_err').remove();
          }
          if(bc.val() == 0){
            if(bc.hasClass('error') == false){
              bc.addClass('error');
              bc.after("<label class='error' id='bc_err'>Vui lòng chọn bằng cấp</label>");
            }
            bc.focus();
            return false;
          }else{
            bc.removeClass('error');
            $('#bc_err').remove();
          }
        }
          $('.chooseCV .CV .choose').click(function(){
            $('#file').click();
          });
        $('#file').change(function(){
          if($('.CV').hasClass('showCv') == false){
            $('.CV').addClass('showCv');
            $('.chooseCV .CV.showCv').prepend('<span id="close" onclick="cancel_img(this)">x</span>');
            $('.chooseCV .CV img').attr('src','/images/upLoadCV_3.png');
          }
          e = $(this);
          src = e.val().split('\\');
          file = src[src.length - 1];
          $('.choose').html(file);
        });
        
        function cancel_img(e){
          $('.chooseCV .CV img').attr('src','/images/upLoadCV_2.png');
          $('.CV').removeClass('showCv');
          e.remove();
          $('.choose').html('Chọn CV từ máy tính của bạn');
        }

    </script>
	</body>
	</html>