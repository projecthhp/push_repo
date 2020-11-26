<?php
include('config.php');
// Xu ly form
$idappli = getValue('idappli','int','POST',0);
if ($idappli != 0)
{
    $db_qr = new db_query("UPDATE user SET use_update_time = ".time()." WHERE use_id = ".$_COOKIE['UID']." ");
}
?>
