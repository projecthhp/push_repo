<?
include("../home/config.php");
include("../functions/send_mail.php");


$idtin   = getValue("idtin","int","POST",0);
$idtin   = (int)$idtin;
$iduse   = getValue("iduse","int","POST",0);
$iduse   = (int)$iduse;
$iduser  = getValue("iduser","int","POST",0);
$iduser  = (int)$iduser;
$url     = getValue('url','str','POST','');
if($url!=''){
  $url = str_replace('../', $domain.'/', $url);
}
$check = new db_query("SELECT * FROM nop_ho_so WHERE nhs_use_id = ".$iduse." AND nhs_com_id = ".$iduser." AND nhs_new_id = ".$idtin." ");
if(mysql_num_rows($check->result) == 0)
{
   $db_ex = new db_execute("INSERT INTO nop_ho_so(nhs_use_id,nhs_new_id,nhs_com_id,nhs_time) VALUES ('".$iduse."','".$idtin."','".$iduser."','".time()."')");
   $update_time = new db_query("UPDATE user SET use_update_time = '".time()."' WHERE use_id = $iduse ");
   $db_qr_not = new db_query("SELECT new_user_id FROM new WHERE new_id = ".$idtin." LIMIT 1");
   $row_not = mysql_fetch_assoc($db_qr_not->result);
   $db_uvnhs = new db_execute("INSERT INTO uv_nophoso(`id_uv`,`id_com`,`id_new`,`time`) 
                              VALUES ('".$iduse."','".$iduser."','".$idtin."','".time()."')");
   $db_notifi = new db_query("INSERT INTO notify(`UserID`,`CompanyID`,`NewID`,`NotifyType`,`CreateDateNotify`) VALUES ('".$iduse."','".$iduser."',".$idtin.",1,'".time()."')");
   $db_qr = new db_query("SELECT new_city,new_cat_id,new_title,usc_email,usc_company FROM new JOIN user_company ON new.new_user_id = user_company.usc_id 
                          WHERE new_id = $idtin LIMIT 1");
   $db_qrs = new db_query("SELECT use_mail,exp_years,use_name,address 
                           FROM user
                           WHERE use_id = $iduse LIMIT 1");
   $rows = mysql_fetch_assoc($db_qrs->result);
   $row = mysql_fetch_assoc($db_qr->result);
   $dmca = '';
   $db_qr6 = new db_query("SELECT new_id,new_title,new_money,usc_company,new_city,new_han_nop,new_alias FROM new JOIN user_company ON new.new_user_id = user_company.usc_id WHERE new_cat_id = '".$row['new_cat_id']."' AND new_city = '".$row['new_city']."' ORDER BY new_id DESC LIMIT 3");


   While($row6 = mysql_fetch_assoc($db_qr6->result))
   {
      $arr = explode(',', $row6['new_city']);
      $txt_cit = '';
      foreach ($arr as $key => $value) {
         $txt_cit .= $arrcity[$arr[$key]]['cit_name'].' ';
      }
      $dmca .= '<tr style="height: 140px;padding: 0px 35px;font-size: 14.58px;line-height: 25px;border-bottom: solid 1px #b9b9b9;line-height: 25px;">
            <td style="padding: 0px 33px;">
               <table>
                  <tr>
                     <td style="color:#269b91;width: 80%;">'.$row6['new_title'].'</td>
                     <td style="color:#3a4c56;width: 20%;text-align: center;">'.$array_muc_luong[$row6['new_money']].'</td>
                  </tr>
                  <tr>
                     <td style="color: #346569;">'.name_company($row6['usc_company']).'</td>
                     <td></td>
                  </tr>
                  <tr>
                     <td style="color: #3a4c56;">Địa điểm: '.$txt_cit.'</td>
                     <td rowspan="2" align="center">
                        <a href="https://timviec365.com'.rewriteNews($row6['new_id'],$row6['new_title'],$row6['new_alias']).'" style="padding: 10px 11px ; background:#ff000a;font-size: 12px;color: white;border: none;border-radius: 5px; ">XEM CHI TIẾT</a>
                     </td>
                  </tr>
                  <tr>
                     <td style="color: #346569;">Hạn nộp hồ sơ: '.date("d-m-Y",$row6['new_han_nop']).'</td>
                  </tr>
               </table>
            </td>
         </tr>';
   }
   if($row['usc_email'] != '')
   {
      if($rows['use_name']!="")
      {
         $firstna = $rows['use_name'];
      }
      else
      {
         $firstna = 'Chưa cập nhật';
      }
      if($rows['address']!="")
      {
         $addna = $rows['address'];
      }
      else
      {
         $addna = 'Chưa cập nhật';
      }

      $company = $row['usc_company'];
      $tit = $row['new_title'];
      if($rows['exp_years'] != '') $kinh_nghiem = $array_kinh_nghiem_uv[$rows['exp_years']];
      else $kinh_nghiem = "Xem trong CV";
      $link_uri = rewriteUV($iduse,$rows['use_name']);
      $subject = $rows['use_name']." đã ứng tuyển vào vị trí ".$row['new_title'];
      Send_HS_NTD($row['usc_email'],$firstna,$addna,$tit,$company,$kinh_nghiem,$subject,$link_uri,$url);


      $name = $rows['use_name'];
      $subject_uv = "Bạn đã ứng tuyển vị trí ".$row['new_title'];
      Send_HS_UV($rows['use_mail'],$name,$tit,$company,$dmca,$subject_uv);

   }
   echo '1';
}
else{
   echo '0';
}
unset($idtin,$db_ex);
?>