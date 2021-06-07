<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
$thumb_width = 600;
$thumb_height = 287;
?>

<div class="owl-carousel owl-theme col-12" id="guide">
    <?php
    for ($i=0; $i<count($list); $i++) {
    $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

    if($thumb['src']) {
        $img = $thumb['ori'];
    } else {
        $img = G5_IMG_URL.'/no_img.png';
        $thumb['alt'] = '이미지가 없습니다.';
    }
    $img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" >';
    ?>
		<div class="item">
      <a href="<?php echo $list[$i]['href']; ?>">
        <div  class='sliderItme  slider<?php echo $i; ?>' style="background-image:url(<?php echo $img; ?>); padding-bottom: 48%; background-size: 100%;">
           <div class="sliderTitle">
             <h3><?php echo $list[$i]['subject']; ?></h3>
             <p><span>VEIW MORE</span><i class="xi-plus-thin"></i></p>
           </div>
           <div class="guideBG"></div>
        </div>
      </a>
    </div>

	<?php } ?>
</div>
