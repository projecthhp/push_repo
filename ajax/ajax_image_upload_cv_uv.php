<?
require_once("../functions/functions.php"); 
require_once("../classes/database.php");
require_once("../classes/resize-class.php"); 


function randdomstring($length)
{
  $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  $str   = '';
  $size  = strlen($chars);
  for ($i = 0; $i < $length; $i++) {
    $str .= $chars[rand(0, $size - 1)];
  }
  return $str;
}

if(isset($_POST['img64']))
{
  $img  = $_POST['img64'];
  $type = substr($img, 5, strpos($img, ';') - 5);
  $str  = randdomstring(15);
  if ($type == 'image/png') 
  {
    $img      = str_replace('data:image/png;base64,', '', $img);
    $fileName = $str . '.png';
  } 
  else 
  {
    $img      = str_replace('data:image/jpeg;base64,', '', $img);
    $fileName = $str . '.jpg';
  }
  $img      = str_replace(' ', '+', $img);
  $fileData = base64_decode($img);
  file_put_contents('../tmp/' . $fileName, $fileData);
   echo "../tmp/" . $fileName;
}

