<?
include("config.php");
if(isset($_COOKIE['UID']) && $_SERVER['REQUEST_METHOD'] == 'POST')
{
if(!isset($_SESSION['NEWID']))
{
   redirect("/");
}
$goitin = getValue("pack","int","POST",1);
$goitin = (int)$goitin;
$token  = getValue("token","str","POST","");
session_start();
$newid  = $_SESSION['NEWID'];
$db_exu = new db_execute("UPDATE new SET new_active = 1,new_type = '".$goitin."'  WHERE new_id =".$newid."");
unset($_SESSION['NEWID']); // will delete just the name data
session_destroy(); // will delete ALL data associated with that user.
}
else
{
   redirect("/");
}
?>