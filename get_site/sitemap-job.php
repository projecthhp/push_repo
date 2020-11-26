<?
session_start();
include("../home/config.php");
date_default_timezone_set("Asia/Bangkok");
$day = date('Y-m-d\TH:i:sP', time());
$curentPage = 49000;

$numrow = new db_query("SELECT new_id FROM new "); 
$numcount = mysql_num_rows($numrow->result);

$nb_file = $numcount/$curentPage;
$nb_file = (int)$nb_file + 1;



for ($i=0; $i < $nb_file ; $i++) { 

    $start = $i * $curentPage;
    $urls = array();


    if ($i == 0) {
        //Sitemap city
        foreach($arrcity as $type => $item)
        {
            $link = 'https://timviec365.com'.rewriteCate($item['cit_id'],$item['cit_name']);
            $urls[] = array($link , $day,  'daily', '0.7');
        }
    }


    // 49000 link tin tuyển dụng tiếp theo
    $result = new db_query("SELECT new_id, new_title, new_update_time FROM new LIMIT ".$start.",".$curentPage); 

    while($row = mysql_fetch_assoc($result->result)) {
        $day = date('Y-m-d\TH:i:sP', $row['new_update_time']);
        $link = "https://timviec365.com".rewriteNews($row['new_id'],$row['new_title']);
        $urls[] = array($link , $day,  'daily', '0.6');
    }

    //cấu trúc sitemap
    $xml = '<?xml version="1.0" encoding="UTF-8"?><?xml-stylesheet type="text/xsl" href="https://timviec365.com/css/css-sitemap.xsl"?>
    <urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd http://www.google.com/schemas/sitemap-image/1.1 http://www.google.com/schemas/sitemap-image/1.1/sitemap-image.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
    foreach ($urls as $key => $value) { 
        $xml .= '<url><loc>'.$value['0'].'</loc><lastmod>'.$value['1'].'</lastmod><changefreq>'.$value['2'].'</changefreq><priority>'.$value['3'].'</priority></url>';
    }
    $xml .= '</urlset>';
    $stt_file = ($i == 0) ? '':$i;
    $file = '../sitemap-job'.$stt_file.'.xml';

    $fp = fopen($file,"w"); 
    fputs($fp, $xml); 
    fclose($fp);
    unset($xml,$url);
}


?>

