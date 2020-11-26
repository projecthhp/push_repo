<?
while($row = mysql_fetch_assoc($db_query->result))
{
?>
<div class="div_cvut">
	<p><i><a href="<?= rewriteNews($row['new_id'],$row['new_title']) ?>"><?= $row['new_title'] ?></a></i></p>
	<p><?= $row['usc_company'] ?></p>
	<ul>
		<li><span><i class="fa fa-eye"></i></span> Lượt xem: <?= $row['new_view_count']?></li>
		<li><span><i class="fa fa-clock-o" aria-hidden="true"></i></span> Ngày nộp: <?= date('d/m/Y',$row['time'])?></li>
		<li><span><i class="fa fa-stopwatch"></i></span>Ngày hết hạn: <?= date('d/m/Y',$row['new_han_nop']) ?></li>
		<li><a onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này ??');" style="color:red" href="../codelogin/xoa_cv_uv_ungtuyen.php?id=<?= $row['id'] ?>">Xóa</a></li>
	</ul>
</div>
<?
}
?>