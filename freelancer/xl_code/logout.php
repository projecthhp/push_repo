<?php
    include_once '../home/config.php';
    setcookie("UID", '' ,  time() - 3600, "/");
    setcookie("UT", '' , time() - 3600, "/");
    redirect('../home/index.php');
?>