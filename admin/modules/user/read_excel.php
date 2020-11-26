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
	foreach ($rowData as $key => $value) {
		$check = new db_count("SELECT count(use_id) as count FROM user WHERE use_mail = '".$value[0]."' OR use_phone = '".$value[2]."'");
		if ($check->total == 0) {
			$query = "INSERT INTO `user`(`use_mail`, `use_phone`, `use_pass`, `use_time`, `use_authentic`,`use_name`,`use_city`,`use_district`,`address`,`use_job_name`,`use_district_job`,`use_nganh_nghe`,`birthday`,`gender`,`lg_honnhan`,`school_name`,`rank`,`exp_years`,`salary`,`work_option`,`cap_bac_mong_muon`,`muc_tieu_nghe_nghiep`,`ki_nang_ban_than`,`use_create_time`,`use_update_time`,`register`) VALUES ('".$value[0]."','".$value[2]."','f1fa0a33d8fed4eb8761d6f93772962c','".$value[8]."','1','".$value[1]."','".$value[4]."','".$value[5]."','".$value[9]."','".$value[10]."','".$value[12]."','".$value[11]."','".$value[3]."','".$value[7]."','".$value[6]."','','','','".$value[14]."','".$value[18]."','".$value[17]."','".$value[15]."','".$value[16]."','".$value[8]."','".$value[8]."','3')";

			$db_ex = new db_execute_return();
			$last_id = $db_ex->db_execute($query);

			$query_nguoi_tham_chieu = new db_query("INSERT INTO `user_tham_chieu`(`id_user`) VALUES ('".$last_id."')");

			if (($value[19] != '' && $value[20] != '' && $value[21] != '' && $value[19] != NULL && $value[20] != NULL && $value[21] != NULL) || ($value[21]!='' && $value[21] != NULL)) {

				$query_kn = new db_query('INSERT INTO `use_kinhnghiem`(`use_id`,`use_chucdanh`,`use_cty_lamviec`,`tg_batdau`,`tg_ketthuc`,`them_thongtin`) VALUES ("'.$last_id.'","'.$value[20].'","'.$value[19].'","'.$value[22].'","'.$value[23].'","'.$value[21].'")');
			}

			unset($query,$db_ex,$last_id,$query_nguoi_tham_chieu,$query_kn);

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
			echo '<h2 style="color:red">Add file chi tiết ứng viên thành công !!!!!</h2><br/>';
		}

		if (isset($u) && $u > 0) {
			echo '<h3 style="color:green">Có '.$u.' ứng viên trùng bị loại bỏ !!!!!</h3><br/>';
		}	      
		?>	      
		<h3>File tải lên phải là từ timviec365.vn. Mọi định dạng file excel khác có thể gây lỗi</h3>

	</div>
</body>
<script src="/js/jquery.min.js"></script>
</html>

