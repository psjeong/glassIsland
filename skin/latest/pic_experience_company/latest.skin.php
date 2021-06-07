<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
$thumb_width = 368;
$thumb_height = 250;
?>

<div id="experience" class="row justify-content-around justify-content-lg-center">
	<?php
	for ($i=0; $i<count($list); $i++) {
	$thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

	if($thumb['src']) {
		$img = $thumb['ori'];
	} else {
		$img = G5_IMG_URL.'/no_img.png';
		$thumb['alt'] = '이미지가 없습니다.';
	}
	$img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" class="card-img-top">';

	?>

	<div class="col-6 col-md-4 col-lg-4">
		<div class="card-group">
		  <div class="card">
			<a href="<?php echo $list[$i]['href'] ?>"><?php echo $img_content; ?></a>
			<div class="card-body">
			  <h5 class="card-title f14">
					<?php
					echo "<a href=\"".$list[$i]['href']."\"> ";
					if ($list[$i]['is_notice'])
					echo $list[$i]['subject'];
					else
					echo $list[$i]['subject'];
					?>
					</a>
			  </h5>
			</div>
		  </div>
		</div><!-- /card-group -->
	</div><!-- /col -->
	<?php }?>


</div><!-- /row -->
