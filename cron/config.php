<? 
require_once("../functions/functions.php"); 
ob_start('callback');
require_once("../functions/function_rewrite.php");
require_once("../classes/html_cleanup.php");
require_once("../classes/denyconnect.php");
require_once("../classes/user.php");
require_once("../classes/generate_form.php");
require_once("../classes/database.php");
require_once("../classes/config.php");
include('../functions/cron_functions.php');
include('../functions/simple_html_dom.php');
require_once("../classes/curl.php");
require_once("../data/array_du_lieu.php");
// require_once("../cache_file/top-cache.php");
require_once("../classes/resize-class.php");
?>