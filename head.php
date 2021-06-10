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


<section id="popup" >
  <div class="popTop d-flex flex-column-reverse text-center">
    <h1>NCS | 박소정의 리뉴얼</h1>
    <p><img src="/glassImg/gnu_logo.png" alt="그누보드"></p>
  </div>
    <div class="popTxt d-block d-lg-flex justify-content-lg-around f14">
      <div class="popleft">
        <div class="making">
          <div class="makingContent">
            <h2>제작 내용</h2>
            <ul class="content">
              <li>- 최근게시를 활용해 컨텐츠<strong>80%이상 관리자 수정편집</strong>가능</li>
              <li>- 공통 클래스,레이아웃 클래스 부트스트랩 4 활용</li>
              <li>- 시멘틱 구조를 활용해 웹접근성과 검색엔진 최적화</li>
              <li>- 단독페이지 제작을 지양하여 100% 관리자 페이지로 컨텐츠 관리</li>
              <li>- SEO 최적화</li>
            </ul>
          </div>
          <ul class="work d-flex d-lg-block">
            <li class="workList"><strong>제작 목표</strong>유지보수비용 0%</li>
            <li class="workList ml-1 ml-lg-0"><strong>작업기간</strong> 14일</li>
            <li class="pl-1 pl-lg-0 ml-lg-0"><strong>참여도  100%</strong></li>
          </ul>
          <ul class="work">
            <li class="workList"><strong>DB 경로</strong>sj926thwjdk.cafe24.com/psjAdmin-4.0.10.20</li>
            <li class="workList"><strong>DB 접두어</strong>sjGlass_</li>
          </ul>
        </div>

      </div>

      <div class="center">
        <div class="file">
          <h2>PHP - 최근 게시글 경로</h2>
          <dl class="html">
            <dt>logo</dt>
            <dd>/theme/logo/latest.skin.php</dd>
            <dt>메인 슬라이드 (owl-carousel 플러그인 사용)</dt>
            <dd>/theme/main_slider/latest.skin.php</dd>
            <dt>footer 기업 정보</dt>
            <dd>/theme/company_info/latest.skin.php</dd>
          </dl>
          <h2>CUSTOMIZING</h2>
          <dl class="javaCss">
            <dt>CSS</dt>
            <dd>/glassisland/theme/ety_wide_theme/css/psj.css</dd>
            <dt>JavaScript</dt>
            <dd>/glassisland/theme/ety_wide_theme/js/psj.js</dd>
          </dl>
        </div>
        <div id="icon">
          <ul class="d-lg-inline-block d-flex">
            <li><a href="//github.com/psjeong/glassIsland.git" target="_blank"><i class="xi-github xi-3x"></i></a></li>
            <li><a href="//open.kakao.com/o/sHSbYT6c" target="_blank"><i class="xi-kakaotalk xi-3x"></i></a></li>
          </ul>
          <ul class="d-lg-inline-block d-flex">
            <li><a href="tel:010-4727-0363" target="_blank"><i class="xi-paper-o xi-3x"></i></a></li>
            <li><a href="mailto:sj926thwjdk@naver.com" target="_blank"><i class="xi-mail-o xi-3x"></i></a></li>
          </ul>
        </div>
      </div>

      <div class="popRight">
        <div class="addPortfolio">
          <div class="psjBag"><img src="/glassImg/sjBag_.gif" alt="박소정"></div>
          <div class="psjInsta"><img src="/glassImg/psj_insta2.jpg" alt="인스타 배경"></div>
          <div class="qr">
            <a href="//sj926thwjdk.cafe24.com/" target="_blank">
              <img src="/glassImg/qrcode_sj.png" alt="박소정의 자기소개 페이지">
            </a>
          </div>
        </div>
      </div>
    </div>


  <button class="closebtn"><i class="xi-close-thin xi-2x"></i></button>
</section>
<div id="pDim"></div>


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
	    <ul class="navbar-nav">
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
  							echo '</ul>'.PHP_EOL;
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
      </ul>
    </div>
    <div id="navBg"></div>
	</div>
</nav>




<!-------------------------- 게시판 상단 배경 수정하는 곳 -------------------------->
<?php
	if($bo_table){
		include_once(G5_THEME_PATH.'/top_banner.php');
	}
?>
<!-------------------------- ./게시판 상단 배경 수정하는 곳 -------------------------->
