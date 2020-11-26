<?
include("../home/config.php");
unset($_COOKIE['UID']);
unset($_COOKIE['UT']);
setcookie("UID", "", time()-3600,'/');
setcookie("UT", "", time()-3600,'/');
header('Location: ../home/index.php');  
?>