<?
require_once("../functions/functions.php"); 
require_once("../classes/database.php");
$idtin   = getValue("idtin","arr","POST",'');
$idtin   = replaceMQ($idtin);
$idtin  =  implode(",",$idtin);
if($idtin != '')
{
   $db_ex = new db_execute("UPDATE nop_ho_so SET nhs_active = 0 WHERE nhs_id IN(".$idtin.")");
}
unset($idtin,$db_ex);
?>