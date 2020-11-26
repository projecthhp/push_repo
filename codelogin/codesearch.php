<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<?
include("config.php");
if(isset($_POST['btnsearch']))
{
   ob_start();
   $keyword   = getValue("keyword","str","POST","");
   $keyword   = replaceMQ($keyword);
   $keyword   = strip_tags($keyword);
   $keyword   = str_replace("/","",$keyword);
   $nganhnghe = getValue("name_nganh_nghe","int","POST",0);
   $nganhnghe = (int)$nganhnghe;
   $diadiem   = getValue("name_dia_diem","int","POST",0);
   $diadiem   = (int)$diadiem;
   $mucluong  = getValue("name_muc_luong","int","POST",0);
   $mucluong  = (int)$mucluong; 
   if($mucluong != 0)
   {
      setcookie("fillmoney",$mucluong, time() +3600);
   }  
   if($keyword == ''&&$nganhnghe == 0&&$diadiem == 0)
   {
      header('Location: ../viec-lam-moi.html');
   }
   else if($keyword == '' && $diadiem == 0 && $nganhnghe != 0)
   {
      header("Location: ".redirect(rewriteCate($nganhnghe,$db_cat[$nganhnghe]['cat_name'],0,""))."");
   }
   else if($keyword == '' && $diadiem != 0 && $nganhnghe == 0)
   {
      header("Location : ".redirect(rewriteCate(0,"",$diadiem,$arrcity[$diadiem]['cit_name']))."");
   }
   else if($keyword == '' && $diadiem != 0 && $nganhnghe != 0)
   {
      header("Location: ".redirect(rewriteCate($nganhnghe,$db_cat[$nganhnghe]['cat_name'],$diadiem,$arrcity[$diadiem]['cit_name']))."");
   }
   else if($keyword != '')
   {
      if($nganhnghe != 0)
      {
         $catname = $db_cat[$nganhnghe]['cat_name'];
      }
      else
      {
         $catname = '';
      }
      if($diadiem != 0)
      {
         $namediadiem = $arrcity[$diadiem]['cit_name'];
      }
      else
      {
         $namediadiem = '';
      }
      header("Location: ".redirect(rewriteSearch(trim($keyword),$nganhnghe,$catname,$diadiem,$namediadiem))."");
   }
   ob_end_flush();
}
?>