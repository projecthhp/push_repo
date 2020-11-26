<?php
//use Mpdf\Mpdf;
if(isset($_GET['cvid']) and $_GET['cvid']!='' and $_GET['id_preview']){	
	require_once __DIR__ . '/vendor/autoload.php';
	//$mpdf = new mPDF();	
	$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
	$fontDirs = $defaultConfig['fontDir'];

	$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
	$fontData = $defaultFontConfig['fontdata'];

	$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/custom/font/awe',
        __DIR__ . '/custom/font/roboto',
    ]),
    'fontdata' => $fontData + [
        'fontawesome' => [
            'R' => 'fontawesome-webfont.ttf',            
        ],
        'roboto' => [
            'R' => 'Roboto-Regular.ttf',
            'B' => 'Roboto-Bold.ttf',            
        ],
        'sun-exta' => [
	        'R' => 'Sun-ExtA.ttf',
	        'sip-ext' => 'sun-extb',
	    ],
	    'sun-extb' => [
	        'R' => 'Sun-ExtB.ttf',
	    ],
    ],
    //'default_font' => 'roboto'
]);
	$mpdf->AddFontDirectory();
	$mpdf->autoScriptToLang = true;
	$mpdf->autoLangToFont = true;

	// $html_client = $_POST['data_cv'];
	// $menu_html = array();

	// // Set the POST data
	// $postdata = http_build_query(
	// 	array(
	// 		'data_cv' => $html_client,
	// 	)
	// );
 
	// // Set the POST options
	// $opts = array('http' => 
	// 	array (
	// 		'method' => 'POST',
	// 		'header' => 'Content-type: application/x-www-form-urlencoded',
	// 		'content' => $postdata
	// 	)
	// );
	// // Create the POST context
	// $context  = stream_context_create($opts);
 
	// // POST the data to an api
	// $url = 'http://localhost:8896/site/xem_cv_app/'.$_GET['cvid'];
	// $html = file_get_contents($url, false, $context);
	if ($_GET['fromsave']){
		$from_save = '1';
	} else {
		$from_save = '0';
	}
	$html = file_get_contents('https://timviec365.vn/cv365/site/xem_cv_app/'.$_GET['cvid'].'/'.$_GET['id_preview'].'/'.$from_save);
	// var_dump($html);
	// die();

	// Render the HTML as PDF
	if(isset($_GET['cvname']) and $_GET['cvname']!=''){
		$name = $_GET['cvname'];
	}else{
		$name = 'cv_'.time();
	}	
	$mpdf->WriteHTML($html);
	if(!isset($_GET['view'])){
		$mpdf->Output($name.'.pdf', 'D');
	}else{
		$mpdf->Output($name.'.pdf','I');
	}		
}
?>
