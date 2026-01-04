$(function(){
  $(".btn-gnav").on("click", function(){
    var rightVal = 0;
    if($(this).hasClass("open")) {
      rightVal = -300;
      $(this).removeClass("open");
    } else {
      $(this).addClass("open");
    }

    $(".gnav-box").stop().animate({
      right: rightVal
    }, 200);
  });
});

$(window).on('load resize', function(){
 
  var w = $(window).width();
  var x = 670; //画像を差し替えを実行するウィンドウサイズ
 
  if (w <= x) {
 
    var before = 'pc_',
        after = 'sp_';
 
    replaceImg();
 
  } else {
 
    var before = 'sp_',
        after = 'pc_';
 
    replaceImg();
 
  }
 
  function replaceImg(){
    $('img[src*=pc_],img[src*=sp_]').each(function(){
      var img = $(this).attr('src').replace(before, after);
      if( $(this).attr('src').match(before) ) {
        $(this).attr('src', img);
      }
    });
  }
 
})

$(function() {
    var topBtn = $('.cta-btn-box');    
    topBtn.removeClass('fadein');
    //スクロールが100に達したらボタン表示
    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            topBtn.addClass('fadein');
        } else {
            topBtn.removeClass('fadein');
        }
    });
    //スクロールしてトップ
    /*topBtn.click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
        return false;
    });*/
});

$(function(){
    $("p:has(iframe)").addClass("iframe-wrap");
});

jQuery(function($) {
    // ページ読み込み時と、念のため少し遅らせて実行
    function removeImageAttributes() {
        $('.archive-column .img-box img').removeAttr('width height sizes data-eio-rwidth data-eio-rheight');
    }

    removeImageAttributes();
    
    // Lazy Load完了後に再付与されるのを防ぐため、少し遅延させて実行
    setTimeout(removeImageAttributes, 500);
});

const swiper = new Swiper('.voice-slider', {
    loop: true,               // 無限ループ
    slidesPerView: 1,         // スマホは1枚
    spaceBetween: 20,         // 間の余白
    centeredSlides: true,     // 中央配置
    autoplay: {
        delay: 3000,          // 3秒ごとに自動再生
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    // PCサイズの時の設定
    breakpoints: {
        768: {
            slidesPerView: 3, // 3枚表示
            spaceBetween: 30,
            centeredSlides: false,
        }
    }
});
