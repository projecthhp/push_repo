<?php
require_once("inc_security.php");
if(isset($_FILES['excel'])){
	include '../../../classes/PHPExcel/IOFactory.php';

	$file_tmp = $_FILES['excel']['tmp_name'];
	$inputFileName = $file_tmp;
	try {
		$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		$objPHPExcel = $objReader->load($inputFileName);
	} catch(Exception $e) {
		die('Lỗi không thể đọc file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
	}
	// lấy tổng số sheet trên site
	$sheetCount = $objPHPExcel->getSheetCount();
	// Khai báo mảng $rowData chứa dữ liệu
	$rowData = array();
	$row_cl = array();

	for ($i=0; $i < $sheetCount; $i++) { 
		// Lấy sheet hiện tại
		$sheet = $objPHPExcel->getSheet($i);
		// Lấy tổng số dòng của file
		$highestRow = $sheet->getHighestRow();
		// Lấy tổng số cột của file
		$highestColumn = $sheet->getHighestColumn();
		//  Thực hiện việc lặp qua từng dòng của file, để lấy thông tin
		for ($row = 1; $row <= $highestRow; $row++){ 
		    // Lấy dữ liệu từng dòng và đưa vào mảng $rowData
			$row_cl = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE,FALSE);
			$rowData[] = $row_cl[0];
			unset($row_cl);
		}
	}
	$u = 0;
	$db_phase = new db_query("SELECT max(tag_phase) as tag_phase FROM tbl_tags WHERE tag_parent = 3");
	$rphase = mysql_fetch_array($db_phase->result);
	$phase = ($rphase['tag_phase'] == NULL)?$rphase['tag_phase']+1:'1';
	// $phase = 1;
	$type = 1;
	
	foreach ($rowData as $key => $value) {
		$alias_tag = replaceTitle("Tìm việc làm ".$value[2]);
		$sql_check = "SELECT count(*) as count FROM tbl_tags WHERE tag_parent = 3 AND tag_alias = '".$alias_tag."' ";
		
		$check = new db_count($sql_check);
		if($value[0] != ''){
			$title = html_entity_decode($value[1], ENT_COMPAT, 'UTF-8');
			$sql_cate = "SELECT cat_id FROM category WHERE cat_name LIKE '%".$title."%' LIMIT 1";
			$db_cate = new db_query($sql_cate);
			$row_cate = mysql_fetch_array($db_cate->result);
		}
		$type = $row_cate['cat_id'];

		if ($check->total == 0) {
			$data = [
				'tag_name' => $value[2],
				'tag_alias' => $alias_tag,
				'tag_district_id' => '0',
				'tag_cate_id' => '0',
				'tag_phase' => $phase,
				'tag_type' => $type,
				'tag_create_date' => time(),
				'tag_edit_date' => time(),
				'tag_parent' => 3
			];
			add('tbl_tags',$data);
		}else{
			$u++;
		}
	}
	$a = 1;



	unset($rowData);
}
?>

<html>
<body>
	<div style="text-align: center;padding: 100px 70px;">
		<form action = "" method = "POST" enctype = "multipart/form-data">
			<input type = "file" name = "excel" />
			<input type = "submit" value="Add file" />
		</form>

		<br>
		<? 
		if (isset($a) && $a == 1) {
			echo '<h2 style="color:red">Add file key tag thành công !!!!!</h2><br/>';
		}

		if (isset($u) && $u > 0) {
			echo '<h3 style="color:green">Có '.$u.' từ khóa trùng bị loại bỏ !!!!!</h3><br/>';
		}	      
		?>
	</div>
</body>
<script src="/js/jquery.min.js"></script>
</html>

