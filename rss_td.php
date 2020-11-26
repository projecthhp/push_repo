<?php 
require_once("functions/functions.php"); 
ob_start();
require_once("functions/function_rewrite.php");
require_once("functions/array_front_end.php");
require_once("classes/database.php");
require_once("functions/pagebreak.php");
require_once("classes/class.phpmailer.php");
require_once("classes/class.pop3.php");
require_once("classes/class.smtp.php");
require_once("classes/PHPMailerAutoload.php");


// Thiết lập cấu trúc fiel là xml
header('Content-Type: text/xml; charset=utf-8');

echo('<?xml version="1.0" encoding="utf-8"?>');
echo('<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">');
echo("<channel>");
echo("<title>Tìm việc miễn phí - Tin tuyển dụng update hàng ngày - Timviec365.vn</title>");
echo("<link>https://timviec365.vn</link>");
echo("<description>Tìm kiếm việc làm nhanh nhất tại timviec365. Cập nhật hàng ngày hàng ngàn tin tuyển dụng để kiếm việc làm phù hợp hay kiếm việc làm thêm trên toàn quốc.</description>");
$ar = array('Xem bài nguyên mẫu tại', 'Coi bài nguyên văn tại', 'Tham khảo bài gốc ở', 'Tham khảo bài nguyên mẫu tại đây', 'Coi thêm tại', 'Coi thêm ở', 'Đọc nguyên bài viết tại', 'Coi nguyên bài viết ở', 'Xem nguyên bài viết tại');
$day = strtotime(date('Y-m-d'));
$db_qr = new db_query("SELECT * FROM new JOIN new_multi ON new.new_id = new_multi.new_id JOIN user_company ON new.new_user_id = user_company.usc_id JOIN user_company_multi ON new.new_user_id = user_company_multi.usc_id WHERE  new_create_time>=".$day." ORDER BY new.new_update_time DESC LIMIT 20");
    $db_qrr = new db_query("SELECT cit_id,cit_name,cit_count,cit_count_vl FROM city ORDER BY cit_count DESC,cit_name ASC");
    $arrcity  = $db_qrr->result_array('cit_id');

While($row = mysql_fetch_assoc($db_qr->result))
{
$i = rand(0,8);

?>

	<item>
	<title><![CDATA[ <?php echo $row['new_title']; ?>]]></title>
	<link><![CDATA[ <?php echo 'https://timviec365.vn/'.replaceTitle($row['new_title'])."-p".$row['new_id'].".html"; ?>]]></link>
	<description><![CDATA[ 

      	<p>Mức lương: <span><?= $array_muc_luong[$row['new_money']] ?></span></p>
      	<p>Chức vụ: <span><?= $row['new_cap_bac'] != 0?$array_capbac[$row['new_cap_bac']]:'Nhân viên' ?></span></p>
      	<p>Kinh nghiệm: <span><?= $row['new_exp'] > 0 ? $array_kinh_nghiem[$row['new_exp']]:'Không yêu cầu' ?></span></p>
      	<p>Hình thức làm việc: <span><?= $row['new_hinh_thuc'] > 0?$array_hinh_thuc[$row['new_hinh_thuc']]:"Toàn thời gian cố định" ?></span></p>
      	<p>Yêu cầu bằng cấp: <span><?= $row['new_bang_cap'] != 0?$array_hoc_van[$row['new_bang_cap']]:'Không yêu cầu' ?></p>
      	<p>Yêu cầu giới tính: <span><?= $row['new_gioi_tinh']!=''?$row['new_gioi_tinh']:'Không yêu cầu' ?></span></p>
                      <? 
          if ($row['new_city']!= 0) {
            $duy_city = explode(',', $row['new_city']);
            $name_city = array();
            foreach ($duy_city as $key) {
              $name_city[] = $arrcity[$key]['cit_name'];
            }
            $name_city = implode(", ", $name_city);
          }else{  $name_city = "Toàn quốc";   }
          ?>
        <p>Địa điểm:<span><?=$name_city ?></span></p>
        <?php
            $d_mt = trim(preg_replace('#(<br */?>\s*)+#i', '<br />',nl2br($row['new_mota'])));
            $d_yc = trim(preg_replace('#(<br */?>\s*)+#i', '<br />',nl2br($row['new_yeucau'])));
             $quyen_loi = trim(preg_replace('#(<br */?>\s*)+#i', '<br />',nl2br($row['new_quyenloi'])));
        ?>

        <p>Mô tả công việc : </p>
        <p><?php echo $d_mt; ?></p>

        <p>Yêu cầu công việc : </p>
        <p><?php echo $d_yc; ?></p>

        <p>Quyền lợi được hưởng : </p>
        <p><?php echo $quyen_loi; ?></p>

		<p><?php echo $ar[$i].': '; ?><a href="<?php echo 'https://timviec365.vn/'.replaceTitle($row['new_title'])."-p".$row['new_id'].".html"; ?>"><?php echo $row['new_title']; ?></a></p>
		]]>
			
	</description>
	<guid isPermaLink="false"><![CDATA[ <?php echo 'https://timviec365.vn/'.replaceTitle($row['new_title'])."-p".$row['new_id'].".html"; ?>]]></guid>
	</item>

<?php
}
unset($db_qr,$row);
echo("</channel>");
echo('</rss>')
?>