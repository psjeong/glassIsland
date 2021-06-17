<?php
define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');
?>


<?php
?>


<main id="main">

  <!------------------------------------- 슬라이드,공지사항,심플메뉴 -------------------------------->
  <div class="mainBox">
    <div class="container p-0">
      <div class="mainSliderBox d-lg-flex d-block justify-content-lg-between">
        <div class="slider pl-3 ">
          <?php echo latest('theme/main_slider', 'glassSketch', 5, 100); ?>
        </div>
        <div class="guidanceBox ">
          <div class="notice col-11 mt-3 mt-lg-0">
            <?php echo latest('theme/basic_main_one', 'notice', 5, 29);?>
          </div>
          <div class="simpleMenu justify-content-center d-flex mt-3 p-0 text-center">
            <ul class="topside d-flex m-0 p-0">
              <li><a href="//sj926thwjdk.cafe24.com/glassisland/bbs/board.php?bo_table=groupReservation&wr_id=1"><i class="xi-group xi-2x"></i>단체예약</a></li>
              <li><a href="//sj926thwjdk.cafe24.com/glassisland/bbs/board.php?bo_table=guide"><i class="xi-map-o xi-2x"></i>시설안내</a></li>
              <li><a href="//sj926thwjdk.cafe24.com/glassisland/bbs/board.php?bo_table=experience"><i class="xi-glass xi-2x"></i>체험안내</a></li>
            </ul>
            <ul class="underside d-flex m-0 p-0">
              <li><a href="//sj926thwjdk.cafe24.com/glassisland/bbs/board.php?bo_table=artGallery&sca=%EC%A0%84%EC%8B%9C+%EC%95%88%EB%82%B4"><i class="xi-library xi-2x"></i>전시안내</a></li>
              <li><a href="//sj926thwjdk.cafe24.com/glassisland/bbs/board.php?bo_table=customOrder"><i class="xi-emoticon-happy-o xi-2x"></i>주문의뢰</a></li>
              <li><a href="//sj926thwjdk.cafe24.com/glassisland/bbs/board.php?bo_table=place&wr_id=1"><i class="xi-maker xi-2x"></i>오시는길</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!------------------------------------- 슬라이드,공지사항,심플메뉴 -------------------------------->


  <!------------------------------------- 시설안내 -------------------------------->
  <section class="facility">
    <div class="container">
      <div class="facilityInfo col-lg-12 d-lg-flex  justify-content-between">
        <div class="txt">
          <h2 class="f25">시설 안내</h2>
          <p class="f14">다양한 공간에서 볼 수 있는<br> 유리공예의 아름다움</p>
        </div>
        <div class="guideBD col-lg-8 mt-5 mt-lg-0 p-0">
          <?php echo latest('theme/guide', 'guide', 12, 100); ?>
        </div>
      </div>
    </div>
  </section>
  <!------------------------------------- /.시설안내 -------------------------------->



  <!-------------------------- 체험안내, 박물관 소개, 전시안내 -------------------------->
  <section class="container infoTxt d-block d-lg-flex align-items-lg-start">
      <div class="experience pb-0 col-12 col-lg-5 guideBox mb-5 mb-lg-0">
        <h2 class="f21">체험 안내</h2>
        <p class="f14">아이들과 함께 쌓아가는 추억,<br>다양한 유리 공예를 즐겨보세요.</p>
        <?php echo latest('theme/experience', 'experience', 6, 50); ?>
      </div>
      <div class="introduce col-12 col-lg-3 guideBox  mb-5 mb-lg-0">
        <h2 class="f21">GLASS ISLAND</h2>
        <div class="youtube mt-3 mt-lg-0 col-lg-5 pr-0 pl-0">
          <iframe src="https://www.youtube.com/embed/JlbiZuYQssA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <?php echo latest('theme/glassIsland_info', 'glassInfo', 1, 100); ?>
      </div>
      <div class="exhibitGuide col-12 pb-2 col-lg-3 guideBox  mb-5 mb-lg-0">
    		<h2 class="f21">전시 안내</h2>
        <?php echo latest('theme/exhibitGuide', 'exhibitGuide', 12, 100); ?>
      </div>
  </section>
  <!-------------------------- /.체험안내, 박물관 소개, 전시안내 -------------------------->



  <!------------------------ 지도 ------------------------->
  <section class="map">
    <div id="daumRoughmapContainer1622776998666" class="root_daum_roughmap root_daum_roughmap_landing col-12 p-0" style="width:100%"></div>
    <div class="cont col-11 my-3 my-lg-0">
      <h3><img src="/glassImg/main_logo_black.png" alt="로고"></h3>
      <div class="txt f14">
        <?php echo latest('theme/map_info', 'mapInfo', 1, 100); ?>
      </div>
    </div>
  </section>
  <!------------------------ /.지도 ------------------------->
</main>

<!------------------------ 퀙메뉴 ------------------------>
<div id="quick">
  <div class="quickBox">
    <ul>
      <li><a href="//github.com/psjeong/glassIsland.git" target="_blank"><i class="xi-github xi-2x"></i></a></li>
      <li><a href="//drive.google.com/file/d/1a9jU9ZzcZ8rUNahMyGkdS3PYommtVbDC/view?usp=sharing" target="_blank"><i class="xi-briefcase xi-2x"></i></a></li>
      <li><a href="//open.kakao.com/o/sHSbYT6c" target="_blank"><i class="xi-kakaotalk xi-2x"></i></a></li>
      <li><a href="tel:010-4727-0363" target="_blank"><i class="xi-call xi-2x"></i></a></li>
    </ul>
  </div>
</div>
<!------------------------ /.퀙메뉴 ------------------------>



<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
