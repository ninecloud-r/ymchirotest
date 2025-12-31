$(function(){
  $(".btn-gnav").on("click", function(){
		// ハンバーガーメニューの位置を設定するための変数
		var rightVal = 0;
		if($(this).hasClass("open")) {
			// 「open」クラスを持つ要素はメニューを開いた状態に設定
			rightVal = -300;
			// メニューを開いたら次回クリック時は閉じた状態になるよう設定
			$(this).removeClass("open");
		} else {
			// 「open」クラスを持たない要素はメニューを閉じた状態に設定 (rightVal は0の状態 )
			// メニューを開いたら次回クリック時は閉じた状態になるよう設定
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
