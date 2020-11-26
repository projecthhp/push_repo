<?
include("../home/config.php"); 
$idxt = getValue('id','int','POST',0);

if($idxt != 0){
$html = "";
$iduv = (isset($_COOKIE['UID']) && $_COOKIE['UT']==0)?$_COOKIE['UID']:"";
$active = '';

$list_cv = new db_query("SELECT * FROM samplecv WHERE id = '".$idxt."' ");
$rowxt = mysql_fetch_assoc($list_cv->result);
if($iduv != ''){
	$db_qrs = new db_query("SELECT * FROM `cv_emotion` WHERE iduser = '".$iduv."' AND idcv = '".$rowxt['id']."' ");
	if(mysql_num_rows($db_qrs->result)>0){
		$active = 'active';
	}
}
	?>
	<!-- <div class="showImage"> -->
		<div class="mainShow">
		<div class="rightShow">
			<div class="item close" onclick="close_xtcv()">x</div>
			<div class="item like <?=$active?>" onclick="like_cv(this)" data-cvid="<?=$rowxt['id']?>" data-type="1" data-iduv="<?=$iduv?>">
			<i class="fa fa-heart" aria-hidden="true"></i>
			</div>
			<?
			$i_color = 0;
				$colorcv = explode(",", $rowxt['codecolor']);
				foreach ($colorcv as $key => $value) {
				if(file_exists("../upload/maucv/".$rowxt['alias']."/".$value.".png") == true) $path = "../upload/maucv/".$rowxt['alias']."/".$value.".png";
				else $path = "../upload/maucv/".$rowxt['alias']."/".$value.".jpg";
			?>
			<div class="item" onclick="change_color(this,`<?=$path?>`)" style="background: #<?=$value;?>;">
			<? if($i_color == 0) echo '<i class="fa fa-check" aria-hidden="true"></i>'; ?>
			</div>
			<?$i_color++;}?>
		</div>
		<div class="leftShow">
			<? 
			$fisrtimg = explode(",", $rowxt['codecolor']);
			if(file_exists("../upload/maucv/".$rowxt['alias']."/".$fisrtimg[0].".png") == true) 
			$path = "../upload/maucv/".$rowxt['alias']."/".$fisrtimg[0].".png";
			else $path = "../upload/maucv/".$rowxt['alias']."/".$fisrtimg[0].".jpg";
			?>
			<div id="img_show">
				<img src="<?=$path?>" alt="<?=$rowxt['name']?>" title="<?=$rowxt['name']?>">
				<button id="zoomCv" onclick="zoomCV(this)">+</button>
			</div>
			<div id="div_use_cv" class="text-center">
				<?
				if((!isset($_COOKIE['UT']) || $_COOKIE['UT'] == 1))
					echo '<a class="use_cv login_modal" onclick="hanld_login(this)" rel="nofollow" data-href="'.rewriteCreateCV($rowxt["alias"],$rowxt["id"]).'"> Dùng mẫu này</a>';
				else echo '<a class="use_cv" rel="nofollow" href="'.rewriteCreateCV($rowxt["alias"],$rowxt["id"]).'"> Dùng mẫu này</a>';
				?>
			</div>
		</div>
		</div>
				</div>  
			</div>
		</div>
	</div>
		<div class="banner_xt hidden">	
			<div class="main_xt ">
			<div class="pull-right">
				<button class="close" onclick="close_zoom()">x</button>
			</div>
			<div class="main_img">
				<img src="<?=$path?>" alt="CV xem trước">
			</div>
		</div>
	<!-- </div> -->
		<?
	}
	?>