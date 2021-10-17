(function($){
    // 배너 이미지 슬라이드
    var mySwiper = new Swiper('.swiper-container', {
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
      },
      pagination: {
        el: '.swiper-pagination',
        type: 'bulvars'
      },
      autoplay: {
        delay: 5000,
      },
    });
  
    //영화이미지 슬라이드
    var mySwiper = new Swiper('.swiper-container2', {
      slidesPerView: 4,
      spaceBetween: 24,
      // mousewheel: {
      //   invert: true,
      // },
      keyboard: {
        enabled: true,
        onlyInViewport: false,
      },
      // autoplay: {
      //   delay: 6000,
      // },
      breakpoints: {
        600: {
          slidesPerView: 1.4,
          spaceBetween: 24,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 24,
        },
        960: {
          slidesPerView: 3,
          spaceBetween: 24,
        },
      },
    });
  
    //영화차트 탭 메뉴
    var movBut = $('.movie_title > ul > li');
    var movCont = $('.movie_chart > div');
  
    movCont.hide().eq(0).show();
  
    movBut.click(function (e) {
      e.preventDefault();
      var target = $(this);
      var index = target.index();
  
      // movBut.removeClass('active');
      // target.addClass('active');
      target.addClass('active').siblings().removeClass('active');
  
      // movCont.css('display', 'none');
      // movCont.eq(index).css('display', 'block');
      movCont.css('display', 'none').eq(index).css('display', 'block');
    });
  
    //공지사항 탭 메뉴
    var tabMenu = $('.notice');
  
    //컨텐츠 내용을 숨겨주세요
    tabMenu.find("ul > li > ul").hide();
    tabMenu.find("li.active > ul").show();
  
    function tabList(e) {
      e.preventDefault();
      var target = $(this);
      target.next().show().parent("li").addClass("active").siblings().removeClass("active").find("ul").hide();
    }
    //버튼을 클릭하면 ~ul을 보여주고
    //부모의 li태그에 클래스 추가
    //형제의 li태그에 클래스 제거
    //제거한 자식의 ul 태그를 숨김
  
    tabMenu.find("ul > li > a").click(tabList).focus(tabList);
  })(jQuery);