<?
require_once("../functions/functions.php"); 
require_once("../classes/database.php");
$idtin   = getValue("idtin","arr","POST",'');
$idtin   = replaceMQ($idtin);
$idtin  =  implode(",",$idtin);
if($idtin != '')
{
   $db_ex = new db_execute("DELETE FROM nop_ho_so WHERE nhs_id IN(".$idtin.")");
}
unset($idtin,$db_ex);
?>