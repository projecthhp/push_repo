<?
require_once("../functions/functions.php"); 
require_once("../classes/database.php");
$idtin   = getValue("idtin","int","POST",0);
$idtin   = (int)$idtin;
if($idtin > 0)
{
   $saveid = $_COOKIE['saveuv'];
   $saveid = substr($saveid,0,-1);
   $arraytwo = explode(",",$saveid);
   foreach($arraytwo as $item=>$type)
   {
      if($type == $idtin)
      {
         unset($arraytwo[$item]);
      }
   }
   $arraytwo = implode(",",$arraytwo);
   $arraytwo = $arraytwo.",";
   echo $arraytwo;
   //setcookie("saveid",$arraytwo,time() + 7*6000,'/');
}
unset($idtin);
?>