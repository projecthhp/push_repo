	<?
	include('../home/config.php');

/*
	$type: Là tìm ứng viên, việc làm hay cv
	$detail: Là tìm theo ngành nghề hay tỉnh thành
*/

	$keyword = getValue('keyword','str','POST','');
	$type = getValue('type','str','POST','');
	$detail = getValue('detail','str','POST','');
	$result = '';
	if($keyword != ''){
		if($type == 'job' && $detail == 'cate'){
			$sql = "SELECT cat_id, cat_name FROM category WHERE cat_name LIKE '".$keyword."%'";
			$db_qr = new db_query($sql);
			While($row = mysql_fetch_assoc($db_qr->result)){
				$result .= '<a class="item" href="'.rewriteCate(0,0,$row['cat_id'],$row['cat_name']).'">'.$row['cat_name'].'</a>';
			}
		}
		if($type == 'job' && $detail == 'city'){
			$sql = "SELECT cit_id, cit_name, cit_count FROM city WHERE cit_name LIKE '".$keyword."%'";
			$db_qr = new db_query($sql);
			While($row = mysql_fetch_assoc($db_qr->result)){
				$result .= '<a class="item" href="'.rewriteCate($row['cit_id'],$row['cit_name'],0,0).'">'.$row['cit_name'].'</a>';
			}
		}
		if($type == 'cv' && $detail == 'cate'){
			$sql = "SELECT name,alias FROM nganhcv WHERE name LIKE '".$keyword."%' ";
			$db_qr = new db_query($sql);
			While($row = mysql_fetch_assoc($db_qr->result)){
				$result .= '<a class="item" href="'.rewriteNNCV($row['alias']).'">CV '.trim(str_replace("CV", "", $row['name'])).'</a>';
			}
		}
		if($type == 'uv' && $detail == 'cate'){
			$sql = "SELECT cat_id, cat_name, cat_count FROM category WHERE cat_name LIKE '".$keyword."%'";
			$db_qr = new db_query($sql);
			While($row = mysql_fetch_assoc($db_qr->result)){
				$result .= '<a class="item" href="'.rewriteCateUV(0,0,$row['cat_id'],$row['cat_name']).'">Ứng viên '.$row['cat_name'].'</a>';
			}
		}
		if($type == 'uv' && $detail == 'city'){
			$sql = "SELECT cit_id, cit_name, cit_count FROM city WHERE cit_name LIKE '".$keyword."%'";
			$db_qr = new db_query($sql);
			While($row = mysql_fetch_assoc($db_qr->result)){
				$result .= '<a class="item" href="'.rewriteCateUV($row['cit_id'],$row['cit_name'],0,0).'">Ứng viên tại '.$row['cit_name'].'</a>';
			}
		}		
	}else{
		if($type == 'job' && $detail == 'cate'){
			foreach ($db_cat as $key => $value) {
				$result .= '<a href="'.rewriteCate(0,0,$value['cat_id'],$value['cat_name']).'" class="item">Việc làm '.str_replace('Việc làm', '', $value['cat_name']).'</a>';
			}
		}
		if($type == 'job' && $detail == 'city'){
			foreach ($arrcity as $key => $value) {
				$result .= '<a href="'.rewriteCate(0,0,$value['cit_id'],$value['cit_name']).'" class="item">Việc làm tại '.$value['cit_name'].'</a>';
			}
		}
		if($type == 'cv' && $detail == 'cate'){
			foreach ($db_catCV as $key => $value) {
				$result .= '<a href="'.rewriteNNCV($value['alias']).'" class="item">CV '.trim(str_replace("CV", "", $value['name'])).'</a>';
			}
		}
		if($type == 'uv' && $detail == 'cate'){
			foreach ($db_cat as $key => $value) {
				$result .= '<a href="'.rewriteCateUV(0,0,$value['cat_id'],$value['cat_name']).'" class="item">Ứng viên '.$value['cat_name'].'</a>';
			}
		}
		if($type == 'uv' && $detail == 'city'){
			foreach ($arrcity as $key => $value) {
				$result .= '<a href="'.rewriteCateUV(0,0,$value['cit_id'],$value['cit_name']).'" class="item">Ứng viên tại '.$value['cit_name'].'</a>';
			}
		}
	}
	echo $result;
?>