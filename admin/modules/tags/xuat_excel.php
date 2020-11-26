<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<?
    require_once("inc_security.php");
   if(isset($_GET['city'])){
    $id = getValue('city','int','GET',0);
    
        if($id > 0)
        {
        echo "<option value=0>Chọn quận / huyện</option>";
            $db_qr = new db_query("SELECT * FROM city2 WHERE cit_parent = ".$id);
            if(mysql_num_rows($db_qr->result) > 0){
                while($row = mysql_fetch_assoc($db_qr->result))
                {
                    echo "<option value=".$row['cit_id'].">".$row['cit_name']."</option>";
                }
            }
        }
        else{
            echo "<option value=0>Chọn quận / huyện</option>";
        }
        exit();
    }
    $type_err = 0;
    $xuat_excel = getValue('xuat_excel','str','POST','');
    if($xuat_excel != ''){
        
        $sl_pr = getValue('sl_pr','str','POST','');
        $city = getValue('city','str','POST','');
        $district = getValue('district','str','POST','');
        if($sl_pr == 0){
            $type_err = 1;
        }
        else{
            if($sl_pr == 1 && $city == 0){
                $type_err = 2;
            }
            else if($sl_pr == 2 && $district == 0){
                $type_err = 3;
            }
            else{
                if($sl_pr == 1){
                    $sql1 = "SELECT cit_id, cit_name FROM city WHERE cit_id = ".$city;
                }else{
                    $sql1 = "SELECT cit_id, cit_name,cit_parent FROM city2 WHERE cit_id = ".$district;
                }
                $db_city = new db_query($sql1);
                $r = mysql_fetch_assoc($db_city->result);
                $cit_id = $r['cit_id'];
                $cit_name = $r['cit_name'];
               
                header("Content-type: application/octet-stream");
                header("Content-Disposition: attachment; filename=".$cit_name.".xls");
                header("Pragma: no-cache");
                header("Expires: 0");

                echo '<table border="1px solid black">';
                echo '<tr>';
                echo '<td><strong> Key </strong></td>';
                echo '<td><strong> Số tin tuyển dụng</strong></td>';
                $db_qr = new db_query("SELECT tag_id,tag_parent, tag_alias,tag_name FROM tbl_tags WHERE tag_parent = 3");
                while($key = mysql_fetch_assoc($db_qr->result)){
                    // if($key['tag_name'] != ''){
                        if($sl_pr == 1){
                            $sql = "SELECT count(*) FROM new JOIN user_company ON new.new_user_id = user_company.usc_id WHERE 1 AND (FIND_IN_SET('".$key['tag_id']."',new_tag) OR new_title LIKE '%".str_replace(' ','%',$key['tag_name'])."%') AND FIND_IN_SET('".$cit_id."',new_city) ";
                        }else{
                            $cit_parent = $r['cit_parent'];
                            $sql = "SELECT count(*) FROM new JOIN user_company ON new.new_user_id = user_company.usc_id WHERE 1 AND (FIND_IN_SET('".$key['tag_id']."',new_tag) OR new_title LIKE '%".str_replace(' ','%',$key['tag_name'])."%') AND (FIND_IN_SET('".$cit_id."',new_qh_id) OR (usc_address LIKE '%".$cit_name."%' AND usc_city = ".$cit_parent.") OR (FIND_IN_SET('".$cit_id."',usc_district))) ";
                        }
                        $db_qrs = new db_query($sql);
                        $row = mysql_fetch_assoc($db_qrs->result);
                        $count = $row['count(*)'];
                        echo'<table border="1px solid black">';
                        echo'<tr>';
                        echo'<td>'.$key['tag_name'].'</td>';
                        echo'<td>'.$count.'</td>';
                    // }
                }
                echo '</tr>';
                echo '</table>';
            }
            
        }
        echo '1';
        exit();
    }
?>
<body>
	<div style="text-align: left;padding: 100px 70px;">
		<form action = "" method = "POST" enctype = "multipart/form-data">
			<select name="sl_pr" id="sl_pr" style="margin-bottom: 10px">
                <option value="0">Chọn thể loại file tải</option>
                <option <?=(isset($sl_pr) && $sl_pr == 1)?"selected":""?> value="1">Key theo tỉnh thành</option>
                <option <?=(isset($sl_pr) && $sl_pr == 2)?"selected":""?> value="2">Key theo quận huyện</option>
            </select>
            <?= ($type_err == 1)?"<label style='color: red'>Bạn chưa chọn thể loại file tải</label>":""?>
            <br>
            <select name="city" id="city_sl" style="margin-bottom: 10px">
            <option value="0">Chọn tỉnh thành</option>
                <?
                $db_qr = new db_query("SELECT cit_id, cit_name FROM city ORDER BY cit_name ASC");
                While($row = mysql_fetch_assoc($db_qr->result)){
                    $selected = (isset($city) && $city == $row['cit_id'])?"selected":"";
                    echo '<option '.$selected.' value="'.$row['cit_id'].'">'.$row['cit_name'].'</option>';
                }
                ?>
            </select>
            <?= ($type_err == 2)?"<label style='color: red'>Bạn chưa chọn tỉnh thành</label>":""?>
            <br>
            <select name="district" id="district" style="margin-bottom: 10px">
            <option value="0">Chọn quận huyện</option>
            </select>
            <?= ($type_err == 3)?"<label style='color: red'>Bạn chưa chọn quận huyện</label>":""?>
            <br>
			<input type = "submit" name="xuat_excel" value="Tải xuống" />
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
    </div>
    <script src="/js/jquery.min.js"></script>
    <script>
   $('#city_sl').change(function(){
      var id = $(this).val();
      var id_pr = $('#sl_pr').val();
      if(id_pr == 2){
        $.ajax({
         type: "GET",
         url: "xuat_excel.php?city="+id,
         data:{
         id: id
         },
         success:function(data){
         $('#district').html(data);
         }
        });
      }
   });
   </script>
</body>
</html>