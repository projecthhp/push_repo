<? 
require_once("../functions/functions.php"); 
ob_start('callback');
require_once("../functions/function_rewrite.php");
require_once("../classes/html_cleanup.php");
require_once("../classes/user.php");
require_once("../classes/generate_form.php");
require_once("../classes/database.php");
require_once("../classes/config.php");
require_once("../functions/pagebreak.php");
require_once("../data/array_front_end.php");
require_once("../cache_file/top-cache.php");
date_default_timezone_set('Asia/Ho_Chi_Minh');
if($_SERVER['SERVER_NAME'] == 'localhost'){
	$domain = "http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT'];
}
else if($_SERVER['SERVER_NAME'] == 'timviec365.com'){
	$domain = "https://".$_SERVER['SERVER_NAME'];
}
else{
	$domain = "http://".$_SERVER['SERVER_NAME'];
}
$version = 172;

?>