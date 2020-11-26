<?
include("../home/config.php");
$db_seo = new db_query("SELECT * FROM seo_tt WHERE name_page = 'qdbm'");
$row_seo = mysql_fetch_assoc($db_seo->result);
echo $row_seo['seo_text'];
?>
