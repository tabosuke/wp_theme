
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  <?php wp_head(); ?><!--システム・プラグイン用-->
</head>
<body <?php body_class(); ?>>
  <header class="header boxshadow">
    <div class="headerInner">
      <a class="headerInner__logo" href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
      <!--スマホ用メニューボタン-->
      <button type="button" class="headerInner__btn">
        <i class="fas fa-bars"></i>
      </button>
      <!--  -->
      <?php wp_nav_menu( array(
      'theme_location' => 'header-nav',
      'container' => 'nav',
      'container_class' => 'headerInner__nav',
      'fallback_cb' => ''
      ) ); ?>
    </div>
  </header>
