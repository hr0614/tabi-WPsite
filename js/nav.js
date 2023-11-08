window.addEventListener('DOMContentLoaded', function () {
  $('#nav-toggle').click(function () {
    $('body').toggleClass('open');
  });

  const nav = $('body');
  $('.layout-wrapper').click(function () {
    if (nav.hasClass('open')) {
      nav.removeClass('open');
    }
  });
});


function PageTopAnime() {

  var scroll = $(window).scrollTop(); //スクロール値を取得
  if (scroll >= 200) {//200pxスクロールしたら
    $('#to-top-button').removeClass('DownMove');		// DownMoveというクラス名を除去して
    $('#to-top-button').addClass('UpMove');			// UpMoveというクラス名を追加して出現
  } else {//それ以外は
    if ($('#to-top-button').hasClass('UpMove')) {//UpMoveというクラス名が既に付与されていたら
      $('#to-top-button').removeClass('UpMove');	//  UpMoveというクラス名を除去し
      $('#to-top-button').addClass('DownMove');	// DownMoveというクラス名を追加して非表示
    }
  }

  var wH = window.innerHeight; //画面の高さを取得
  var footerPos = $('#footer').offset().top; //footerの位置を取得
  if (scroll + wH >= (footerPos + 10)) {
    var pos = (scroll + wH) - footerPos + 10 //スクロールの値＋画面の高さからfooterの位置＋10pxを引いた場所を取得し
    $('#to-top-button').css('bottom', pos);	//#to-top-buttonに上記の値をCSSのbottomに直接指定してフッター手前で止まるようにする
  } else {//それ以外は
    if ($('#to-top-button').hasClass('UpMove')) {//UpMoveというクラス名がついていたら
      $('#to-top-button').css('bottom', '20px');// 下から10pxの位置にページリンクを指定
    }
  }
}

// 画面をスクロールをしたら動かしたい場合の記述
$(window).scroll(function () {
  PageTopAnime();/* スクロールした際の動きの関数を呼ぶ*/
});

// ページが読み込まれたらすぐに動かしたい場合の記述
$(window).on('load', function () {
  PageTopAnime();/* スクロールした際の動きの関数を呼ぶ*/
});

// #to-top-buttonをクリックした際の設定
$('#to-top-button').click(function () {
  $('body,html').animate({
    scrollTop: 0//ページトップまでスクロール
  }, 500);//ページトップスクロールの速さ。数字が大きいほど遅くなる
  return false;//リンク自体の無効化
});