<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
    return;
}

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');

if($bo_table) {
	$E_bo = sql_fetch("SELECT * FROM g5_board where bo_table ='$bo_table'");
}

// 오늘 새글
function bo_count($bo){
	$cnt = 0;
	foreach (func_get_args() as $bo) {
		$table = "g5_write_".$bo;
		$sql = "select count(*) cnt from $table where wr_datetime >= CURRENT_DATE() and wr_is_comment=0";
		$row = sql_fetch($sql);
		$cnt += $row['cnt'];
	}
	return $cnt;;
}

// 팝업추가
if(defined('_INDEX_')) {
    include G5_BBS_PATH.'/newwin.inc.php';
}

?>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



<!-------------------------- 네비게이션 -------------------------->

<nav class="navbar navbar-expand-lg navbar-white">
  <div class="navBox">
    <div class="topNav d-flex">
        <?php echo latest('theme/logo', 'logo', 1, 100); ?>
      <button class="allMenu navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <i class="xi-bars xi-2x"></i>
      </button>
    </div>
  </div>

  <div id="navarInner">
	   <div class="collapse navbar-collapse" id="navbarResponsive" data-hover="dropdown" data-animations="fadeIn fadeIn fadeInUp fadeInRight">
  	  <ul class="navbar-nav ml-auto">
    		<?php
    		$sql = " select *
    					from {$g5['menu_table']}
    					where me_use = '1'
    					  and length(me_code) = '2'
    					order by me_order, me_id ";
    		$result = sql_query($sql, false);
    		$gnb_zindex = 999; // gnb_1dli z-index 값 설정용
    		$menu_datas = array();
    		for ($i=0; $row=sql_fetch_array($result); $i++) {
    			$menu_datas[$i] = $row;

    			$sql2 = " select *
    						from {$g5['menu_table']}
    						where me_use = '1'
    						  and length(me_code) = '4'
    						  and substring(me_code, 1, 2) = '{$row['me_code']}'
    						order by me_order, me_id ";
    			$result2 = sql_query($sql2);
    			for ($k=0; $row2=sql_fetch_array($result2); $k++) {
    				$menu_datas[$i]['sub'][$k] = $row2;
    			}
    		}
    		$i = 0;
    		foreach( $menu_datas as $row ){
    			if( empty($row) ) continue;
    		?>
    			<?php if($row['sub']['0']) { ?>
    				<li class="nav-item dropdown">
    					<a class="dropdown-toggle pf_1" href="<?php echo $row['me_link']; ?>" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" target="_<?php echo $row['me_target']; ?>">
					       <?php echo $row['me_name'] ?>
    					</a>
    						<!-- 서브 -->
                <div class="d2">
    						<ul class=" dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
    							<?php
    							// 하위 분류
    							$k = 0;
    							foreach( (array) $row['sub'] as $row2 ){

    							if( empty($row2) ) continue;

    							?>
    							<a class="dropdown-item fw4" href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>"><?php echo $row2['me_name'] ?></a>

    							<?php
    							$k++;
    							}   //end foreach $row2

    							if($k > 0)
    							echo '</ul></div>'.PHP_EOL;
    							?>
            			<?php }else{?>
          				<li class="nav-item">
          				      <a class="pf_1" href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>"><?php echo $row['me_name'] ?></a>
          				</li>
            			<?php }?>
	          </li>

        		<?php
        		$i++;
        		}   //end foreach $row

        		if ($i == 0) {  ?>
        			<li class="gnb_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <br><a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하실 수 있습니다.<?php } ?></li>
        		<?php } ?>
		  </div>
		</li>
    </ul>
	</div>
  </div>
  <div id="navBg"></div>
</nav>




<!-------------------------- 게시판 상단 배경 수정하는 곳 -------------------------->
<?php
	if($bo_table){
		include_once(G5_THEME_PATH.'/top_banner.php');
	}
?>
<!-------------------------- ./게시판 상단 배경 수정하는 곳 -------------------------->
