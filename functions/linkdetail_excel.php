<?
	include('../home/config.php');

	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=URL_Blog.xls");
	header("Pragma: no-cache");
	header("Expires: 0");

	echo '<table border="1px solid black">';
	echo '<tr>';

	echo '<td><strong> STT </strong></td>';
	echo '<td><strong> Từ khóa </strong></td>';
	echo '<td><strong> Số lượng</strong></td>';
	$i=0;
	$db_qr = new db_query("SELECT cit_name,cit_id FROM city2 WHERE cit_parent != 0");
	While ($row = mysql_fetch_array($db_qr->result)) {
		$i++;
		$district_name = $db_district[$row['cit_id']]['cit_name'];

		echo'<table border="1px solid black">';
		echo'<tr>';
		echo'<td>'.$i.'</td>';
		echo'<td>'.$row['new_title'].'</td>';
		echo'<td>'.$link.'</td>';
	}
	echo '</tr>';
	echo '</table>';
?>