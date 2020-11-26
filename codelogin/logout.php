<?
include("config.php");
$redirect = ($_COOKIE['UT']==0)?"/dang-nhap-ung-vien.html":"/dang-nhap-nha-tuyen-dung.html";
unset($_COOKIE['UID']);
unset($_COOKIE['UT']);
unset($_COOKIE['PHPSESPASS']);
if(isset($_COOKIE['xt']))
{
	unset($_COOKIE['xt']);
	setcookie('xt', null, -1, '/');

}
if(isset($_COOKIE['close_alert'])){
	unset($_COOKIE['close_alert']);
	setcookie('close_alert', null, -1, '/');
}
setcookie('UID', null, -1, '/');
setcookie('UT', null, -1, '/');
setcookie('PHPSESPASS', null, -1, '/');
header('Location: '.$redirect);
?>