<?
   include('../home/config.php');

   $userid = $_COOKIE["UID"];
   $user_name = getValue("user_name","str","POST","");
   $user_name = replaceMQ(trim($user_name));
   $user_phone = getValue("user_phone","str","POST",0);
   $birthday = getValue("birthday","str","POST","");
   $birthday = replaceMQ($birthday);
   $address = getValue("address","str","POST","");
   $address = replaceMQ(trim($address));
   $gender = getValue("gender","int","POST",0);
   $gender = (int)$gender;
   $marriage = getValue("marriage","str","POST","");
   $marriage = replaceMQ(trim($marriage));
   $city = getValue("city","int","POST","");
   $city = replaceMQ($city);
   $district = getValue('district','int','POST',0);

   $data = [
      'use_name' => $user_name,
      'use_phone' => $user_phone,
      'birthday' => strtotime($birthday),
      'gender' => $gender,
      'lg_honnhan' => $marriage,
      'address' => $address,
      'use_city' => $city,
      'use_district' => $district,
      'use_update_time' => time()
   ];
   $where = [
      'use_id' => $userid
   ];
   update('user',$data,$where);
   redirect('/ung-vien/ho-so-online.html');
?>