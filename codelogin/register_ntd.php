<?
   include("../home/config.php");
   include("../functions/send_mail.php");

   $username         = getValue("email_ntd","str","POST","");
   $username         = replaceMQ($username);
   $password         = getValue("password_first","str","POST","");
   $password         = replaceMQ($password);
   $password         = md5($password);
   $phone            = getValue("phone","str","POST","");
   $phone            = replaceMQ($phone);
   $skype            = getValue('skype','str','POST','');
   $timeaway         = time();
   $user_name        = getValue("user_name","str","POST","");
   $user_name        = replaceMQ($user_name);
   $user_city        = getValue("user_city","str","POST","0");
   $user_city        = replaceMQ($user_city);
   $usc_district        = getValue("usc_district","str","POST","0");
   $usc_district        = replaceMQ($usc_district);
   $address          = getValue("address_ntd","str","POST","");
   $address          = replaceMQ($address);
   $description      = getValue('descripton_txtarea','str','POST','');
   $description      = replaceMQ($description);
   $ip = client_ip();
   $files = (isset($_FILES['file_images']))?$_FILES['file_images']:"";
   $arr_ins = $arr = [];
   $DateOfIncorporation = getValue('DateOfIncorporation','str','POST','');
   $DateOfIncorporation = strtotime($DateOfIncorporation);
   $usc_mst = getValue('usc_mst','str','POST','');
   
   if($files != "" && count($files) <= 6) {
      /* Check exits folder and create files */
      $path = "../pictures/images_company";
      $f_year = $path."/".date('Y',$timeaway);
      $f_month = $path."/".date('Y',$timeaway)."/".date('m',$timeaway);
      $f_date =  $path."/".date('Y',$timeaway)."/".date('m',$timeaway)."/".date('d',$timeaway);
      $path_ins = date('Y',$timeaway)."/".date('m',$timeaway)."/".date('d',$timeaway);
      if(!file_exists($path)) @mkdir($path,0777);
      if(!file_exists($f_year)) @mkdir($f_year,0777);           
      if(!file_exists($f_month)) @mkdir($f_month,0777);
      if(!file_exists($f_date)) @mkdir($f_date,0777);
      /* End check and create */
      $maxSize = 2000000;
      for($i = 0; $i<count($files['name']); $i++) {
         $size = $files['size'][$i];
         if($size < $maxSize){
            $full_path = $f_date."/".$files['name'][$i];
            if(move_uploaded_file($files['tmp_name'][$i],$full_path) && $files['name'][$i] != '') {
               $new_name = generateRandomString();
               $full_path_new = $f_date."/".$new_name.".png";
               rename($full_path,$full_path_new);
               array_push($arr,str_replace($path."/",'',$full_path_new)); /* Add item */
            }
         }
      }
   }
   if( $username != '' && $password != '' && $phone != '')
      {
         $check = explode('@',$username);
         $name_domain = explode('.',end($check))[0];
         $domain_check = end(explode('.',end($check)));
         if(($domain_check=='com' or $domain_check=='vn' or $domain_check=='net' or $domain_check=='org') and $name_domain!='applynow0' and $name_domain!='thinkingus24' and $name_domain!='petrolgames' and $name_domain!='nurdea')
         {
            $db_check_name = new db_query("SELECT usc_id FROM user_company WHERE usc_md5 <> '' AND usc_email = '".$username."' AND usc_company = '".trim($user_name)."' AND usc_alias <> '' ");

            $alias = replaceTitle($user_name);
            $alias = substr($alias,0,55);
            if($alias == '') $alias = 'tuyen-dung-viec-lam-quoc-te';
            else $alias = replaceTitle($user_name);
            
            if(mysql_num_rows($db_check_name->result) > 0){
               $result = mysql_fetch_array($db_check_name->result);
               $usc_id = $result['usc_id'];
               
               $condition = [
                  'usc_id' => $usc_id
               ];
               $type = '1';
            }
            else $type = '2';
            $usc_logo = '';
            if(isset($_FILES['upLoadAvatar'])){
               $error = array();
               $path = "../pictures/";

               $allowTypes = array('jpg','png','jpeg','gif','jfif','PNG');
               $type = pathinfo($_FILES["upLoadAvatar"]["name"],PATHINFO_EXTENSION);

               $path_tmp = $_FILES['upLoadAvatar']['tmp_name'];

               $file_name = $_FILES['upLoadAvatar']['name'];
               $file_name = reset(explode('.', $file_name));      
               
               if(in_array($type, $allowTypes))
               {
                  $year = date('Y',$timeaway);
                  $month =  date('m',$timeaway);
                  $day = date('d',$timeaway);

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
                  $file_name = $_FILES['upLoadAvatar']['name'];
                  $file_name = reset(explode('.', $file_name));
                  $file_name = replaceTitle(urldecode($file_name));
                  
                  $pathfull = $path.$year.'/'.$month.'/'.$day.'/';
                  if(move_uploaded_file($path_tmp, $pathfull.$_FILES['upLoadAvatar']['name']))
                  {
                     $filename = $_FILES['upLoadAvatar']['name'];
                     $usc_logo = $file_name.'.'.$type;
                     rename($pathfull.$filename,$pathfull.$file_name.'.'.$type);
                     $data = [
                        'usc_email' => $username,
                        'usc_pass'  => $password,
                        'usc_phone' => $phone,
                        'usc_security' => '0',
                        'usc_authentic' => '0',
                        'usc_company' => $user_name,
                        'usc_city' => $user_city,
                        'usc_district' => $usc_district,
                        'usc_address' => $address,
                        'usc_alias' => $alias,
                        'ip_address' => $ip,
                        'usc_create_time' => time(),
                        'usc_update_time' => time(),
                        'usc_logo' => $usc_logo,
                        'usc_skype' => $skype,
                        'usc_index' => '0',
                        'DateOfIncorporation' => $DateOfIncorporation,
                        'usc_mst' => $usc_mst
                     ];
                     $data2 = [
                        'usc_company_info' => $description,
                        'image_com' => implode(',',$arr)
                     ];
                     if($type == '1'){
                        update('user_company',$data,$condition);
                        update('user_company_multi',$data2,$condition);
                        $idSentMail = $usc_id;
                     }else{
                        add('user_company',$data);
                        $last_id = mysql_insert_id();
                        $data2['usc_id'] = $idSentMail = $last_id;
                        add('user_company_multi',$data2);
                     }
                     
                     $secu = md5($username);

                     $link = $domain."/xac-thuc-tai-khoan-nha-tuyen-dung-thanh-cong.html?code=".$secu."&id=".$idSentMail;
                     
                     setcookie('UT', 1 ,time() + 7*6000,'/');
                     setcookie('UID', $idSentMail ,time() + 7*6000,'/');
                     setcookie('PHPSESPASS', $password ,time() + 7*6000,'/');

                     /** Gửi email khi đăng ký thành công **/
                     SendRegisterNTD($username,$user_name,$link);
                     $result = ['stt'=>1,'msg'=>"Đăng ký tài khoản thành công, vui lòng kiểm tra hòm thư để hoàn tất đăng ký"];
                  }
                  else
                  {
                     $_SESSION['error'] = "Có lỗi xảy ra khi upload ảnh đại diện, vui lòng thử lại";
                     $result = ['stt'=>0,'msg'=>"Có lỗi xảy ra khi upload ảnh đại diện, vui lòng thử lại"];
                  }
                  if($_FILES['upLoadAvatar']['error'] > 0)
                  {
                     $_SESSION['error'] = "Có lỗi xảy ra, vui lòng thử lại";
                     $result = ['stt'=>0,'msg'=>"Có lỗi xảy ra, vui lòng thử lại"];
                  }
               }
            }
            echo json_encode($result);
      }else{
        header('Location: /dang-ky.html'); 
      }
   }else
   {
     header('Location: /'); 
   }
?>