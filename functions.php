<?php
//テーマのセットアップ
// titleタグをhead内に生成する
add_theme_support( 'title-tag' );
// HTML5でマークアップさせる
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
// Feedのリンクを自動で生成する
add_theme_support( 'automatic-feed-links' );
//アイキャッチ画像を使用する設定
add_theme_support( 'post-thumbnails' );
//カスタムメニュー
register_nav_menu( 'header-nav',  ' ヘッダーナビゲーション ' );
register_nav_menu( 'footer-nav',  ' フッターナビゲーション ' );
// nav_btn.jsの読み込み
function nav_btn_scripts(){
  wp_enqueue_script( 'nav_btn_script', get_template_directory_uri() .'/js/nav_btn.js', array('jquery') );
}
add_action( 'wp_enqueue_scripts' , 'nav_btn_scripts' );
//サイドバーにウィジェット追加
function widgetarea_init() {
register_sidebar(array(
  'name'=>'サイドバー',
  'class' => 'sidebarInner__contents',
  'id' => 'side-widget',
  'before_widget'=>'<div id="%1$s" class="%2$s sidebar-wrapper">',
  'after_widget'=>'</div>',
  'before_title' => '<h5 class="sidebarInner__title--h5">',
  'after_title' => '</h5>'
  ));
}
add_action( 'widgets_init', 'widgetarea_init' );
//フッターにウィジェットを追加
function widgetfooter_init() {
register_sidebar(array(
  'name'=>'フッターウィジェット',
  'class' => 'footerInner__widget',
  'id' => 'footer-widget',
  'before_widget'=>'<div id="%1$s" class="%2$s footerInner__widget">',
  'after_widget'=>'</div>',
  'before_title' => '<h5 class="footerInner__widget__title--h5">',
  'after_title' => '</h5>'
  ));
}
add_action( 'widgets_init', 'widgetfooter_init' );
//タグクラウドのフォントサイズを一定に
//タグクラウドの出力変更
function wp_tag_cloud_custom_ex( $output ) {
  //style属性を取り除く
  $output = preg_replace( '/\s*?style="[^"]+?"/i', '',  $output);
  return $output;
}
add_filter( 'wp_tag_cloud', 'wp_tag_cloud_custom_ex');
//概要（抜粋）の文字数調整
function my_excerpt_length($length) {
	return 80;
}
add_filter('excerpt_length', 'my_excerpt_length');
