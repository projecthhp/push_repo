<?php
/**
 * Created by PhpStorm.
 * User: hungha
 * Date: 1/28/19
 * Time: 11:20
 */
include("db.php");

// notification count hours
$id_app = isset($_POST['id_app']) ? $_POST['id_app'] : '';
$version_app = isset($_POST['version_app']) ? $_POST['version_app'] : '';
$note = isset($_POST['note']) ? $_POST['note'] : '';

$sqlupdate = "UPDATE app_version SET note = '" . $note . "', version_app = '" . $version_app . "' WHERE id_app=$id_app";
if ($conn->query($sqlupdate) === TRUE) {
    // echo 'id:'.$id_app.', version: '.$version_app.', note:'.$note;
    echo true;
} else {
    echo false;
}
?>