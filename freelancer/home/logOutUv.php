<?php
include("config.php");
unset($_COOKIE['UID']);
unset($_COOKIE['UT']);
setcookie('UID', null, -1, '/');
setcookie('UT', null, -1, '/');
header('Location:index.php');
?>