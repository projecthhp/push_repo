<?
	require_once '../home/config.php';

	$arr = getValue('arr','arr','POST','');
	if(count($arr) > 1){
		$str_sql = implode(' OR `ma_linh_vuc` = ', $arr);
	}else{
		$str_sql = implode('',$arr);
	}
	$ma_user = $_COOKIE['UID'];
	$sql11 = new db_query("SELECT * FROM flc_user_freelancer where ma_user = '$ma_user' ");
    $row11 =  mysql_fetch_assoc($sql11->result);
 	$ky_nang = explode(",", $row11['ky_nang']);
	$sql = "SELECT * FROM `flc_ky_nang` WHERE ma_linh_vuc = ".$str_sql." ORDER BY ma_linh_vuc";
	$array_sql = new db_query($sql);
	While($row10 = mysql_fetch_assoc($array_sql->result)){ ?>
			<div class="G_kn" style="float: left; width: 50%; padding-bottom: 10px;">
				<div class="G-div" style="float: left;">
					<input value="<?php echo $row10['ma_ky_nang'] ?>" class="check1" onclick="getNameCheckBox(this,'checkbox_<?php echo $row10['ma_ky_nang'] ?>')" id="checkbox_<?php echo $row10['ma_ky_nang'] ?>" type="checkbox" name="skill[]" data-name="<?php echo $row10['ten_ky_nang'] ?>">
					
				</div>
				<div class="G-nd">
					<?php echo $row10['ten_ky_nang'] ?>
				</div>
			</div>
    <?php }?>
    <script>
    	$(document).ready(function () {
		    $("input[name='skill[]']").change(function () {
		        var maxAllowed = 2;
		        var cnt = $("input[name='skill[]']:checked").length;
		        if (cnt > maxAllowed) {
		            $(this).prop("checked", "");
		            alert("Bạn được chọn tối đa 10 kỹ năng!!");
		        }
		    });
		});
    </script>