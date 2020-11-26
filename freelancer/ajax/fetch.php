<?php 
    require_once '../home/config.php';
?>

<?php 
	//Lấy dữ liệu
	$query = new db_query("SELECT * FROM flc_file_anh_hs ORDER BY ma_anh_hs DESC");
	$number_of_rows = mysql_num_rows($query->result);
	$output = '';
	$output .= '<table class="table table-bordered table-tried">
		<tr>
			<th>Thứ tự</th>
			<th>Hình ảnh</th>
			<th>Tên</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	';

	if ($number_of_rows > 0) {
		$count = 0;
		while ($row = mysql_fetch_array($query->result)){
			$count++;
			$output.= '<tr>
							<td>'.$count.'</td>
							<td><img src="../uploads/'.$row['ten_anh'].'" class="img img-thumbnail" width="100" height="100"></td>
							<td>'.$row['ten_anh'].'</td>
							<td><button type="button" class="btn btn-warning btn-xs edit" id="'.$row['ma_anh_hs'].'">Sửa</button></td>
							<td><button type="button" class="btn btn-danger btn-xs delete" id="'.$row['ma_anh_hs'].'">Xóa</button></td>
						</tr>';
		}
	}else{
		$output.= '<tr>
						<td colspan="5" align="center">Chưa có dữ liệu</td>
					</tr>';
		}
	$output.='</table>';
	echo $output;
?>