<?
require_once("../functions/functions.php"); 
require_once("../functions/array_front_end.php");
require_once("../classes/database.php");
$userid = $_COOKIE["UID"];
$userid = (int)replaceMQ($userid);
$name = getValue("name","str","POST","");
$name = replaceMQ(trim($name));
$quymo = getValue("quymo","int","POST",0);
$quymo = (int)$quymo;
$mst = getValue("mst","int","POST",0);
$mst = (int)$mst;
$address = getValue("name_addr","str","POST","");
$address = replaceMQ(trim($address));
$city = getValue("name_city","str","POST",0);
$district = getValue('name_district','str','POST',0);
$phone = getValue("phone","str","POST","");
$phone = replaceMQ(trim($phone));
$skype = getValue('skype','str','POST','');
$website = getValue("website","str","POST","");
$website = replaceMQ(trim($website));
$info = getValue("info","str","POST","");
$info = replaceMQ(trim($info));
$nameus = getValue('name_us','str','POST','');
$add_us = getValue('add_us','str','POST','');
$phone_us = getValue('phone_us','str','POST','');
$email_us = getValue('email_us','str','POST','');
$usc_boss = getValue('usc_boss','str','POST','');
$financial_sector = getValue('financial_sector','arr','POST','');
$financial_sector = ($financial_sector != '')?implode(',',$financial_sector):"";
$DateOfIncorporation = strtotime(getValue('DateOfIncorporation','str','POST',''));

   if($name != '' && $quymo > 0 && $address != '' && $city != 0 && $district != 0 && $phone != '')
   {
      $data1 = [
         'usc_company' => $name,
         'usc_size' => $quymo,
         'usc_address' => $address,
         'usc_city' => $city,
         'usc_district' => $district,
         'usc_phone' => $phone,
         'usc_website' => $website,
         'usc_mst' => $mst,
         'usc_update_time' => time(),
         'usc_skype' => $skype,
         'DateOfIncorporation' => $DateOfIncorporation
      ];
      $data2 = [
         'usc_company_info' => $info,
         'financial_sector' => $financial_sector,
         'usc_boss'         => $usc_boss
      ];
      $condition = [
         'usc_id' => $userid
      ];
      update('user_company',$data1,$condition);
      update('user_company_multi',$data2,$condition);
      unset($data1,$data2,$name,$quymo,$address,$city,$phone,$website,$info,$userid,$mst);
      redirect('/thong-tin-tai-khoan-nha-tuyen-dung.html');
   }
?>