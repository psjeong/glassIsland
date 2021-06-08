<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
?>

<div class="glassInfo">
    <ul>
    <?php for ($i=0; $i<count($list); $i++) {  ?>
        <li>
            <?php

            // ----------- 제목 노출시 주석 해제 START ---------
            //echo "<a href=\"".$list[$i]['href']."\"> ";
            //if ($list[$i]['is_notice'])
                //echo "<strong>".$list[$i]['subject']."</strong>";
            //else
                //echo $list[$i]['subject'];



            //echo "</a>";
            //-------- 제목 노출시 주석 해제 END ------------

            if ($list[$i]['comment_cnt'])  echo "
            <span class=\"lt_cmt\">+ ".$list[$i]['comment_cnt']."</span>";

            ?>
            <p><?php echo $list[$i]['wr_content']; ?></p>
        </li>
    <?php }  ?>
    <?php if (count($list) == 0) { //게시물이 없을 때  ?>
    <li class="empty_li">게시물이 없습니다.</li>
    <?php }  ?>
    </ul>

</div>
