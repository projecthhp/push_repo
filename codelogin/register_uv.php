<?
session_start();
include("../home/config.php");
include("../functions/send_mail.php");


if(isset($_POST['Submit']))
{
   $db_get_tmp = new db_query("SELECT * FROM tmp_user WHERE tmp_id = ".$_COOKIE['xt']);
   if(mysql_num_rows($db_get_tmp->result) > 0)
   {
      $row = mysql_fetch_array($db_get_tmp->result);

      $username = $row['tmp_email'];
      $phone = $row['tmp_phone'];
      $password = $row['tmp_pass'];
      $tmp_time = $row['tmp_time'];
      $user_name = $row['tmp_name'];
      $user_city = $row['tmp_city'];
      $district = $row['tmp_distric'];
      $address = $row['tmp_address'];
      $jobname = $row['tmp_job_name'];
      $job_address = $row['tmp_job_city'];
      $nganh_nghe = $row['tmp_nganh_nghe'];
      $image = $row['tmp_image'];

      $birthday      = getValue("birthday","str","POST","");
      $birthday      = replaceMQ($birthday);
      $birthday      = strtotime($birthday);
      $gender        = getValue("gender","int","POST","");
      $gender        = replaceMQ($gender);
      $lg_honnhan    = getValue("lg_honnhan","int","POST","");
      $lg_honnhan    = replaceMQ($lg_honnhan);
      $school_name   = getValue("school_name","str","POST","");
      $school_name   = replaceMQ($school_name);
      $rank          = getValue("rank","int","POST","");
      $rank          = replaceMQ($rank);
      $exp_years     = getValue("exp_years","int","POST","");
      $exp_years     = replaceMQ($exp_years);
      $salary        = getValue("salary","int","POST","");
      $salary        = replaceMQ($salary);
      $work_option   = getValue("work_option","int","POST","");
      $work_option   = replaceMQ($work_option);
      $cap_bac_mong_muon   = getValue("cap_bac_mong_muon","int","POST","");
      $cap_bac_mong_muon   = replaceMQ($cap_bac_mong_muon);
      $muc_tieu_nghe_nghiep = getValue("muc_tieu_nghe_nghiep","arr","POST","");
      $muc_tieu_nghe_nghiep = implode('|',$muc_tieu_nghe_nghiep);
      $ki_nang_ban_than     = getValue("ki_nang_ban_than","arr","POST","");
      $ki_nang_ban_than     = implode('|', $ki_nang_ban_than);
      
      if( $username != '' && $password != '' && $phone != ''){
         $check = explode('@',$username);
         $name_domain = explode('.',end($check))[0];
         $domain_check = end(explode('.',end($check)));
         if(($domain_check=='com' or $domain_check=='vn' or $domain_check=='net' or $domain_check=='org') and $name_domain!='applynow0' and $name_domain!='thinkingus24' and $name_domain!='petrolgames' and $name_domain!='nurdea'){
            $timeaway = time();
            $path_to = '';
            $img = '';
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
                  mkdir($path);
               }
               if(!file_exists($path.$year))
               {
                  mkdir($path.$year);
               }
               if(!file_exists($path.$year.'/'.$month))
               {
                  mkdir($path.$year.'/'.$month);
               }
               if(!file_exists($path.$year.'/'.$month.'/'.$day))
               {
                  mkdir($path.$year.'/'.$month.'/'.$day);
               }
               $type = end(explode('.', $image));
               $image = replaceTitle($user_name).'-'.time();
               $path_to = $path.$year.'/'.$month.'/'.$day.'/'.$image.'.'.$type;
               $img = $image.'.'.$type;
               copy($full_path, $path_to);
               unlink($full_path);
            }

            $query = "INSERT INTO `user`(
                                 `use_mail`, 
                                 `use_phone`, 
                                 `use_pass`, 
                                 `use_time`, 
                                 `use_authentic`,
                                 `use_name`,
                                 `use_city`,
                                 `use_district`,
                                 `address`,
                                 `use_job_name`,
                                 `use_district_job`,
                                 `use_nganh_nghe`,
                                 `birthday`,
                                 `gender`,
                                 `lg_honnhan`,
                                 `school_name`,
                                 `rank`,
                                 `exp_years`,
                                 `salary`,
                                 `work_option`,
                                 `cap_bac_mong_muon`,
                                 `muc_tieu_nghe_nghiep`,
                                 `ki_nang_ban_than`,
                                 `use_create_time`,
                                 `use_update_time`,
                                 `use_config`,
                                 `use_logo`)
                     VALUES (
                        '".$username."',
                        '".$phone."',
                        '".$password."',
                        '".$timeaway."',
                        '0',
                        '".$user_name."',
                        '".$user_city."',
                        '".$district."',
                        '".$address."',
                        '".$jobname."',
                        '".$job_address."',
                        '".$nganh_nghe."',
                        '".$birthday."',
                        '".$gender."',
                        '".$lg_honnhan."',
                        '".$school_name."',
                        '".$rank."',
                        '".$exp_years."',
                        '".$salary."',
                        '".$work_option."',
                        '".$cap_bac_mong_muon."',
                        '".$muc_tieu_nghe_nghiep."',
                        '".$ki_nang_ban_than."',
                        '".time()."',
                        '".time()."',
                        1,
                        '".$img."')";
            $db_ex = new db_execute_return();
            $last_id = $db_ex->db_execute($query);

            $query_nguoi_tham_chieu = new db_query("INSERT INTO `user_tham_chieu`(`id_user`) VALUES ('".$last_id."')");

            $secu = md5($username);
            $link = $domain."/xac-thuc-tai-khoan-ung-vien-thanh-cong.html?code=".$secu."&id=".$last_id;

            setcookie('UT', 0 ,time() + 7*6000,'/');
            setcookie('UID', $last_id ,time() + 7*6000,'/');
            setcookie('PHPSESPASS', $password ,time() + 7*6000,'/');
            /** Gửi email khi đăng ký thành công **/
            SendRegisterTVC($username,$user_name,$link);

            //xoa ttuv bang tam
            $del_tmp = new db_query("DELETE FROM tmp_user WHERE tmp_id = ".$_COOKIE['xt']);
            unset($_COOKIE['xt']);
         header('Location: /xac-thuc-tai-khoan-ung-vien.html'); 
         }else{
           header('Location: /dang-ky-ung-vien.html'); 
         }
      }
      else
         {
           header('Location: /'); 
         }
   }
   else
   {
      echo "<script>alert('Mã xác thực không đúng')</script>";
   }
}
?>