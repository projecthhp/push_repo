<?
include("../home/config.php");
$img = getValue("img64","str","POST","");
if ($img != "") {
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
} else {
   echo "Ảnh không có dữ liệu!";
}

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
?>