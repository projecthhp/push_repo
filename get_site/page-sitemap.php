<?

include("../home/config.php");
date_default_timezone_set("Asia/Bangkok");

$file = '../sitemap-page.xml'; 

$urls = array();

$day = date('Y-m-d\TH:i:sP', time());


$urls[] = array('https://timviec365.com/' , $day,  'daily', '1');
$urls[] = array('https://timviec365.com/viec-lam-theo-tinh-thanh.html' , $day,  'daily', '0.8');
$urls[] = array('https://timviec365.com/blog' , $day,  'daily', '0.8');
$urls[] = array('https://timviec365.com/lien-he' , $day,  'daily', '0.8');
$urls[] = array('https://timviec365.com/ve-chung-toi.html' , $day,  'daily', '0.8');

$xml = '<?xml version="1.0" encoding="UTF-8"?><?xml-stylesheet type="text/xsl" href="https://timviec365.com/css/css-sitemap.xsl"?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd http://www.google.com/schemas/sitemap-image/1.1 http://www.google.com/schemas/sitemap-image/1.1/sitemap-image.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

foreach ($urls as $key => $value) {	
	$xml .= '<url><loc>'.$value['0'].'</loc><lastmod>'.$value['1'].'</lastmod><changefreq>'.$value['2'].'</changefreq><priority>'.$value['3'].'</priority></url>';
}

$xml .= '</urlset>';

$fp = fopen($file,"w"); 
fputs($fp, $xml); 
fclose($fp);

echo 'done';

?>

