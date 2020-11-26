<?php
//use Mpdf\Mpdf;
if(isset($_GET['idlt']) and $_GET['idlt']!='' and $_GET['iduser']>0){	
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
	if($_SERVER['SERVER_NAME'] == 'localhost'){
		$domain = "http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT'];
	}
	else if($_SERVER['SERVER_NAME'] == 'timviec365.com.vn'){
		$domain = "https://".$_SERVER['SERVER_NAME'];
	}
	else{
		$domain = "http://".$_SERVER['SERVER_NAME'];
	}
	$getcv = $domain.'/home/temp_lt.php?uid='.$_GET['iduser'].'&idlt='.$_GET['idlt'];
	// $getcv = ('../home/temp.php');
	$html = file_get_contents($getcv);
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
