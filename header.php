<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tabi Illustration</title>
  <!-- フォント読み込み -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Bad+Script&family=Kaisei+HarunoUmi&family=Kiwi+Maru:wght@300&display=swap"
    rel="stylesheet">
  <!-- 基本のCSS -->
  <link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/reset.css" />
  <link rel="stylesheet" href="<?php bloginfo('template_url');?>/style.css" />
  
  <!-- モーダルのCSS -->
  <link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/modal.css" />

  <!-- ハンバーガーメニューのCSSとjs -->
  <link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/nav.css">
  <script src="https://kit.fontawesome.com/1ebdaefa73.js" crossorigin="anonymous"></script>
  <script src="<?php bloginfo('template_url');?>/js/script.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
  <script type="text/javascript"></script>
  <script src="<?php bloginfo('template_url');?>/js/nav.js"></script>

  <!--  ギャラリースライドのCSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/css/gallery-slide.css">

  <!-- ギャラリーページのCSS -->

  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/css/gallery.css">

  <!-- レスポンシブCSS -->
  <link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/responsive.css">

  <?php wp_head(); ?>
</head>