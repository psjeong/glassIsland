$(function(){

    $(window).scroll(function(){
     if( $(window).scrollTop() > 0){
       $('body').addClass('scroll');
     }else{
       $('body').removeClass('scroll');
     }

   });

});

$(document).ready(function () {
  //owl
  jQuery("#sliderBn").owlCarousel({
    autoplay:true,
    autoplayTimeout:3000,// 1000 -> 1초
    autoplayHoverPause:true,
    loop:true,
    //margin:10,//이미지 사이의 간격
    nav:false,
    responsive:{
      0:{
        items:1 // 모바일
      },
      600:{
        items:1 // 브라우저 600px 이하
      },
      1000:{
        items:1 // 브라우저 100px 이하
      }
    }
  });


  //owl
  jQuery("#guide").owlCarousel({
    //autoplay:true,
    //autoplayTimeout:3000,// 1000 -> 1초
    //autoplayHoverPause:true,
    //loop:true,
    margin:10,//이미지 사이의 간격
    nav:true,
    navText: ["<img src='/glassImg/prevBtn.png'>","<img src='/glassImg/nextBtn.png'>"],
    responsive:{
      0:{
        items:1 // 모바일
      },
      600:{
        items:1 // 브라우저 600px 이하
      },
      1000:{
        items:3 // 브라우저 100px 이하
      }
    }
  });

  jQuery("#exhibitGuide").owlCarousel({
    autoplay:true,
    autoplayTimeout:4000,// 1000 -> 1초
    autoplayHoverPause:true,
    loop:true,
    margin:10,//이미지 사이의 간격
    nav:false,
    navText: ["<img src='/glassImg/prevBtn.png'>","<img src='/glassImg/nextBtn.png'>"],
    responsive:{
      0:{
        items:1 // 모바일
      },
      600:{
        items:1 // 브라우저 600px 이하
      },
      1000:{
        items:1 // 브라우저 100px 이하
      }
    }
  });

  //owl
  jQuery(".owl-carousel").owlCarousel({
    autoplay:true,
    autoplayTimeout:3000,// 1000 -> 1초
    autoplayHoverPause:true,
    loop:true,
    margin:10,//이미지 사이의 간격
    nav:false,
    responsive:{
      0:{
        items:1 // 모바일
      },
      600:{
        items:1 // 브라우저 600px 이하
      },
      1000:{
        items:1 // 브라우저 100px 이하
      }
    }
  });


  //카카오맵
  new daum.roughmap.Lander({
    "timestamp" : "1622776998666",
    "key" : "263jm",
    "mapHeight" : "360"
  }).render();

});
