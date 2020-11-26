<?
require_once("inc_security.php");

$db_admin_listing = new db_query ("SELECT adm_id,adm_name,meta_tit,meta_des,meta_key
                          FROM admin_user JOIN news ON admin_user.adm_id = news.admin_id
                          WHERE adm_delete = 0 GROUP BY adm_id
                          ORDER BY adm_id ASC");
$db_admin = new db_query("SELECT adm_id,adm_name
                          FROM admin_user
                          WHERE adm_delete = 0
                          ORDER BY adm_id ASC");
while($rows = mysql_fetch_array($db_admin->result)){
	$arrayAdm[$rows["adm_id"]] = $rows["adm_name"];
}

$admcity = [];
$db_city = new db_query("SELECT cit_id, cit_name FROM city");
while($rcity = mysql_fetch_array($db_city->result)){
	$admcity[$rcity["cit_id"]] = $rcity["cit_name"];
}
function rewriteTacgia($id,$name){
  return "/blog/tac-gia/".replaceTitle($name)."/tg".$id.".html";
}

function replaceTitle($title){
	$title	= remove_accent($title);
	$arr_str	= array( "&lt;","&gt;","/","\\","&apos;", "&quot;","&amp;","lt;", "gt;","apos;", "quot;","amp;","&lt", "&gt","&apos", "&quot","&amp","&#34;","&#39;","&#38;","&#60;","&#62;");
	$title	= str_replace($arr_str, " ", $title);
	$title = preg_replace('/[^0-9a-zA-Z\s]+/', ' ', $title);
	//Remove double space
	$array = array(
		'    ' => ' ',
		'   ' => ' ',
		'  ' => ' ',
	);
	$title = trim(strtr($title, $array));
	$title	= str_replace(" ", "-", $title);
	$title	= urlencode($title);
	// remove cac ky tu dac biet sau khi urlencode
	$array_apter = array("%0D%0A","%","&");
	$title	=	str_replace($array_apter,"-",$title);
	$title	= strtolower($title);
	return $title;
}
function remove_accent($mystring){
	$marTViet=array(
	"à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă","ằ","ắ","ặ","ẳ","ẵ",
	"è","é","ẹ","ẻ","ẽ","ê","ề","ế","ệ","ể","ễ",
	"ì","í","ị","ỉ","ĩ",
	"ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ","ờ","ớ","ợ","ở","ỡ",
	"ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
	"ỳ","ý","ỵ","ỷ","ỹ",
	"đ",
	"À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă","Ằ","Ắ","Ặ","Ẳ","Ẵ",
	"È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
	"Ì","Í","Ị","Ỉ","Ĩ",
	"Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ","Ờ","Ớ","Ợ","Ở","Ỡ",
	"Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
	"Ỳ","Ý","Ỵ","Ỷ","Ỹ",
	"Đ",
	"'");
	
	$marKoDau=array(
	"a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a",
	"e","e","e","e","e","e","e","e","e","e","e",
	"i","i","i","i","i",
	"o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o",
	"u","u","u","u","u","u","u","u","u","u","u",
	"y","y","y","y","y",
	"d",
	"A","A","A","A","A","A","A","A","A","A","A","A","A","A","A","A","A",
	"E","E","E","E","E","E","E","E","E","E","E",
	"I","I","I","I","I",
	"O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O",
	"U","U","U","U","U","U","U","U","U","U","U",
	"Y","Y","Y","Y","Y",
	"D",
	"");
	
	return str_replace($marTViet,$marKoDau,$mystring);

}
$iAdm             = getValue("iAdm");
$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));
$list->add("new_picture","Ảnh","string",0,0, '');
$list->add($field_name, "Tên tác giả", "string", 0, 0);
$list->add("adm_city","Quê quán","string",1,0, 'width="60"');
$list->add("adm_date","Ngày sinh","date",0,0, 'width="100"');
$list->add("adm_chamngon","Châm ngôn yêu thích","string",0,0, 'width="100"');	

$list->add("",translate_text("Sửa"),"edit");
$list->quickEdit 	= false;
$list->ajaxedit($fs_table);
$list->addSearch("Tác giả","iAdm","array",$arrayAdm,$iAdm);


$sql =	$list->sqlSearch();

if($iAdm != 0)
{
   $sql .= " AND adm_id = ".$iAdm."";
}
	
$total		= new db_count("SELECT count(*) AS count 
									 FROM " . $fs_table . "
									 
									 WHERE 1 " . $sql ."");
										 
$total_row = $total->total;							 
$db_listing = new db_query("SELECT * 
									 FROM " . $fs_table . "
									 WHERE 1 " . $sql . "
									 ORDER BY " . $list->sqlSort() . $field_id . " DESC " . 
									 $list->limit($total_row));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<?=$load_header?>
	<?=$list->headerScript()?>
</head>
<body>
	<div id="listing">
<?=$list->showHeader($total_row)?>
<?
   $i=0;
   while($row = mysql_fetch_assoc($db_listing->result)){
      $i++;
      
      ?>
<?=$list->start_tr($i, $row[$id_field]);?>
         <td align="center" width="72">
				<?
            
				$path = $pathimage.$row["adm_picture"];
				if($row["adm_picture"] != "" && file_exists($path)){
					?>
                    <a target="_blank" onMouseOver="showtip('<img src=\'<?=$pathimage?><?=$row["adm_picture"]?>\' />')" onMouseOut="hidetip()">
                    	<img src="<?=$pathimage?><?=$row["adm_picture"]?>" height="52" width="70" />
                    </a>
               <?
				}
				?>		
			</td>
			<td align="center"><a href="https://timviec365.com<?=rewriteTacgia($row['adm_id'],$row['adm_name'])?>" target="_blank"><?=$row['adm_name']?></a></td>
			<td align="center"><?=($row['adm_city']>0)?$admcity[$row['adm_city']]:""?></td>
			<td align="center"><?=($row['adm_date']>0)?date('d/m/Y',$row['adm_date']):""?></td>
			<td align="center"><?=$row['adm_chamngon']?></td>
			<td align="center"><a href="edit.php?iAdm=<?=$row["adm_id"];?>"><img src="<?=$fs_imagepath?>edit.png" alt="EDIT" border="0"></a></td>
		<? /*---------Body------------*/ ?>
		<!-- <table width="100%" border="1" cellpadding="3" cellspacing="0" class="table" bordercolor="<?=$fs_border?>">
			<tr height="25">
			<td width="20" class="bold bg">No</td>
			<td align="center" class="bold bg" nowrap="nowrap"><?=translate_text("Họ tên")?></td>
			<td align="center" class="bold bg">Meta Title</td>
			<td align="center" class="bold bg">Meta Key</td>
			<td align="center" class="bold bg">Meta Description</td>	
			<td width="10" align="center" class="bold bg"><?=translate_text("Sửa")?></td>
			</tr>
			<?
			$countno = 0;
			while ($row = mysql_fetch_array($db_admin_listing->result))
			{
			  $countno++;
			?>
			  <tr <? if($countno%2==0) echo ' bgcolor="#FAFAFA"';?>> 
				<td align="center" class="bold"><?=$countno;?></td>
				<td class="bold" align="center">
					<a href="" target="_blank"><?=$row["adm_name"];?></a>
				</td>
				<td class="bold"><?=$row["meta_tit"];?></td>
				<td align="center" class="text"><?=$row["meta_key"];?></td>
				<td align="center"><?= $row['meta_des']?></td>
				
			  </tr>
			<? } ?>
		</table> -->
		<?}?>
<?=template_bottom() ?>
</div>
</body>
</html>
<? unset($db_admin_listing);?>