<?
require_once("inc_security.php");
require_once('../../../classes/PHPExcel.php');
function replaceTitle($title)
{
    $title = remove_accent($title);
    $arr_str = array("&lt;", "&gt;", "/", "\\", "&apos;", "&quot;", "&amp;", "lt;", "gt;", "apos;", "quot;", "amp;", "&lt", "&gt", "&apos", "&quot", "&amp", "&#34;", "&#39;", "&#38;", "&#60;", "&#62;");
    $title = str_replace($arr_str, " ", $title);
    $title = preg_replace('/[^0-9a-zA-Z\s]+/', ' ', $title);
    //Remove double space
    $array = array(
        '    ' => ' ',
        '   ' => ' ',
        '  ' => ' ',
    );
    $title = trim(strtr($title, $array));
    $title = str_replace(" ", "-", $title);
    $title = urlencode($title);
    // remove cac ky tu dac biet sau khi urlencode
    $array_apter = array("%0D%0A", "%", "&");
    $title = str_replace($array_apter, "-", $title);
    $title = strtolower($title);
    return $title;
}

function remove_accent($mystring)
{
    $marTViet = array(
        "à", "á", "ạ", "ả", "ã", "â", "ầ", "ấ", "ậ", "ẩ", "ẫ", "ă", "ằ", "ắ", "ặ", "ẳ", "ẵ",
        "è", "é", "ẹ", "ẻ", "ẽ", "ê", "ề", "ế", "ệ", "ể", "ễ",
        "ì", "í", "ị", "ỉ", "ĩ",
        "ò", "ó", "ọ", "ỏ", "õ", "ô", "ồ", "ố", "ộ", "ổ", "ỗ", "ơ", "ờ", "ớ", "ợ", "ở", "ỡ",
        "ù", "ú", "ụ", "ủ", "ũ", "ư", "ừ", "ứ", "ự", "ử", "ữ",
        "ỳ", "ý", "ỵ", "ỷ", "ỹ",
        "đ",
        "À", "Á", "Ạ", "Ả", "Ã", "Â", "Ầ", "Ấ", "Ậ", "Ẩ", "Ẫ", "Ă", "Ằ", "Ắ", "Ặ", "Ẳ", "Ẵ",
        "È", "É", "Ẹ", "Ẻ", "Ẽ", "Ê", "Ề", "Ế", "Ệ", "Ể", "Ễ",
        "Ì", "Í", "Ị", "Ỉ", "Ĩ",
        "Ò", "Ó", "Ọ", "Ỏ", "Õ", "Ô", "Ồ", "Ố", "Ộ", "Ổ", "Ỗ", "Ơ", "Ờ", "Ớ", "Ợ", "Ở", "Ỡ",
        "Ù", "Ú", "Ụ", "Ủ", "Ũ", "Ư", "Ừ", "Ứ", "Ự", "Ử", "Ữ",
        "Ỳ", "Ý", "Ỵ", "Ỷ", "Ỹ",
        "Đ",
        "'");

    $marKoDau = array(
        "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a",
        "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e",
        "i", "i", "i", "i", "i",
        "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o",
        "u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "u",
        "y", "y", "y", "y", "y",
        "d",
        "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A",
        "E", "E", "E", "E", "E", "E", "E", "E", "E", "E", "E",
        "I", "I", "I", "I", "I",
        "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O",
        "U", "U", "U", "U", "U", "U", "U", "U", "U", "U", "U",
        "Y", "Y", "Y", "Y", "Y",
        "D",
        "");

    return str_replace($marTViet, $marKoDau, $mystring);

}

$new_category_id = array();
$class_menu = new menu();
$startdate = getValue("startdate", "str", "GET", "dd/mm/yyyy");
$enddate = getValue("enddate", "str", "GET", "dd/mm/yyyy");
$register = getValue("register", "int", "GET", "0");
//gọi class DataGird
$list = new fsDataGird($field_id, $field_name, translate_text("Listing"));
$list->quickEdit = false;

$list->add("use_id", "ID", "string", 0, 0);
$list->add("use_name", 'Tên ứng viên', 'string', 0, 1);
$list->add("use_mail", "Email", "string", 0, 1);
$list->add("use_phone", "Số điện thoại", "string", 0, 0);
$list->add("address", "Địa chỉ", "string", 0, 0);
$list->add("use_job_name", "Công việc", "string", 0, 0);
$list->add("", "Lượt xem", "string", 0, 0);
$list->add("use_time", "Ngày đăng ký", "string", 0, 0);
$list->add("register", "Nguồn", "string", 0, 0);
$list->add("", "Làm mới", "string",0,0);
$list->add("use_show", "Show", "checkbox", 0, 0);
$list->add("use_authentic", "Active", "checkbox", 0, 0);
$list->add("", translate_text("Sửa"), "edit");
$list->add("", translate_text("Xóa"), "delete");

$indexNguon = getValue("register", "int", "GET", "0");
$list->addSearch("Từ", "startdate", "date", $startdate, "dd/mm/yyyy");
$list->addSearch("Đến", "enddate", "date", $enddate, "dd/mm/yyyy");
$list->addSearch("Nguồn", "register", "array", $arrayNguon, $indexNguon);
$list->quickEdit = false;

$list->ajaxedit($fs_table);

$sql = $list->sqlSearch();
if ($startdate != "dd/mm/yyyy") {
    $intdate = convertDateTime($startdate, "0:0:0");
    $sql .= " AND use_create_time >= " . $intdate;
}
if ($enddate != "dd/mm/yyyy") {
    $intdate = convertDateTime($enddate, "23:59:59");
    $sql .= " AND use_create_time <= " . $intdate;
}
$group_by = $join = '';
if ($indexNguon != 0) {
  $sql .= " AND register = " . $register . "";
}

$total = new db_query("SELECT count(*) AS count 
                                             FROM " . $fs_table ."
                                             WHERE 1 AND register != 4 " . $sql ."");
if($register == 4){
  $total_row = mysql_num_rows($total->result);
}else{
  $total_row = mysql_fetch_assoc($total->result);
  $total_row = $total_row['count'];
}
$db_listing = new db_query("SELECT * 
                                         FROM " . $fs_table ."
                                         WHERE 1 " . $sql . " AND register != 4
                                         ORDER BY " . $list->sqlSort() . $field_id . " DESC
                                         " . $list->limit($total_row));
$db_full = new db_query("SELECT * 
                         FROM " . $fs_table ."
                         WHERE 1  " . $sql . " AND register != 4
                         ORDER BY " . $list->sqlSort() . $field_id . " DESC ");

$xuatex = getValue("postexcel","str","POST","");
    if($xuatex != "")
    {
    $objPHPExcel = new PHPExcel();

    $objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', 'Tên ứng viên')
    ->setCellValue('B1', 'Email')
    ->setCellValue('C1', 'Số điện thoại')
    ->setCellValue('D1', 'Địa chỉ')
    ->setCellValue('E1', 'Công việc')
    ->setCellValue('F1', 'Ngày đăng ký')
    ->setCellValue('G1', 'Nguồn');
    while($rowx = mysql_fetch_assoc($db_full->result))
    {
       $listsss =
       array(
       'name' => $rowx['use_name'],
       'email' => $rowx['use_mail'],
       'phone' => $rowx['use_phone'],
       'address' => $rowx['address'],
       'cv' => $rowx['use_job_name'],
       'time'  => date("d/m/Y",$rowx['use_create_time']),
       'register'  => $arrayNguon[$rowx['register']],
       );
       $lists[] =   $listsss;
    }
    //set gia tri cho cac cot du lieu
    $i = 2;
    foreach ($lists as $row2)
    {
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $row2['name'])
            ->setCellValue('B'.$i, $row2['email'])
            ->setCellValueExplicit('C'.$i, $row2['phone'],PHPExcel_Cell_DataType::TYPE_STRING)
            ->setCellValue('D'.$i, $row2['address'])
            ->setCellValue('E'.$i, $row2['cv'])
            ->setCellValue('F'.$i, $row2['time'])
            ->setCellValue('G'.$i, $row2['register']);
    $i++;
    }
//ghi du lieu vao file,định dạng file excel 2007
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        ob_end_clean();
        $full_path = 'data_User.xlsx';//duong dan file

        header('Content-type: application/vnd.ms-excel');
        header("Content-Disposition: attachment; filename=data_User.xlsx");
        $objWriter->save('php://output');

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <?= $load_header ?>
    <?= $list->headerScript() ?>
</head>
<body topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
<? /*---------Body------------*/ ?>
<div id="listing">

    <?= $list->showHeader($total_row) ?>
    <form method="post" name="form_ab">
      <input type="submit" name="postexcel" class="bottom" style="float: left!important;margin-left: 13px!important;margin: 3px 13px 8px;!" value="Xuất Excel" />
   </form>
    <?
    $i = 0;
    while ($row = mysql_fetch_assoc($db_listing->result)) {
        $i++;
        ?>
        <?= $list->start_tr($i, $row['use_id']); ?>
        <? $url = "/ung-vien/" . replaceTitle($row['use_name']) . "-uv" . $row['use_id'] . ".html"; ?>
        <td style="text-align: center"><?= $row['use_id'] ?></td>
        <td><a target="_blank" href="<?= $url ?>" style="text-transform: capitalize;"><?= $row['use_name'] ?></a></td>
        <td style="padding-left: 20px;"><?= $row['use_mail'] ?></td>
        <td style="text-align: center;"><?= $row['use_phone'] ?></td>
        <td style="text-align: center;"><?= $row['address'] ?></td>
        <td style="text-align: center;"><?= $row['use_job_name'] ?></td>
        <td style="text-align: center;"><?= $row['use_view_count'] ?></td>
        <td style="text-align: center;"><?= date('d/m/Y', $row['use_create_time']) ?></td>
        <td style="text-align: center;"><?= $arrayNguon[$row['register']] ?></td>
        <?=$list->showRenew($row['use_id'])?>
        <?= $list->showCheckbox("use_show", $row['use_show'], $row['use_id']) ?>
        <?= $list->showCheckbox("use_authentic", $row['use_authentic'], $row['use_id']) ?>
        <?= $list->showEdit($row['use_id']) ?>
        <?= $list->showDelete($row['use_id']) ?>
        <?= $list->end_tr(); ?>
        <?
    }
    ?>
    <?= $list->showFooter($total_row) ?>

</div>
<? /*---------Body------------*/ ?>
</body>
</html>