<?
include("config.php");
unset($_COOKIE['UID']);
unset($_COOKIE['UT']);
unset($_COOKIE['PHPSESPASS']);
setcookie('UID', null, -1, '/');
setcookie('UT', null, -1, '/');
setcookie('PHPSESPASS', null, -1, '/');
header('Location: /dang-nhap-ung-vien.html');
?>