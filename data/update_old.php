<?
include("../home/config.php");
// text file cache 
$file = '../data/update_old.json'; 
$expire = 3600*7; // 24 hours 
$time = time();
// Nếu có cache file và còn trong thời gian chưa hết $expire 
if (file_exists($file) && filemtime($file) > (time() - $expire)) 
{
    $list = json_decode(file_get_contents($file),true);
    for($i = 0;$i< count($list);$i++){
        echo "<pre>";
        var_dump($list[$i]);
        echo "</pre>";
        
    }
} 
else // Cập nhật cache file 
{
    $sql = "SELECT tag_id,tag_name FROM `tbl_tags` WHERE tag_name != '' AND tag_parent = 3 ORDER BY `tag_id` DESC";
    $db_qr = new db_query($sql);
    $listss = [];
    While($row = mysql_fetch_assoc($db_qr->result)){
        $list = [];
        
        $sql_n = "SELECT new_id FROM new WHERE new_title LIKE '%".str_replace(' ','%',$row['tag_name'])."%'";
        $db_qrs = new db_query($sql_n);

        While($rows = mysql_fetch_assoc($db_qrs->result)){
            $list[$rows['new_id']] = $row['tag_id'];		
        }

        array_push($listss,$list); 
    }
    
    $OUTPUT = json_encode($listss);  
    $fp = fopen($file,"w"); 
    fputs($fp, $OUTPUT); 
    fclose($fp);     
} // end else 
?>