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
    <h1 class="index_header_h1"><a class="headerInner__logo" href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a><h1>
    <!--スマホ用メニューボタン-->
    <button type="button" class="headerInner__btn">
      <i class="fas fa-bars"></i>
    </button>
    <?php wp_nav_menu( array(
    'theme_location' => 'header-nav',
    'container' => 'nav',
    'container_class' => 'headerInner__nav',
    'fallback_cb' => ''
    ) ); ?>
  </div>
</header>
<div class="container">
  <div class="containerInner">
    <div class="index_category_title">
    <?php if(is_category() || is_tag()): ?>
      <h2><?php single_cat_title() ?>の記事一覧</h2>
    <?php elseif(is_year()): ?>
      <h2><?php the_time("Y年") ?>の記事一覧</h2>
    <?php elseif(is_month()): ?>
      <h2><?php the_time("Y年m月") ?>の記事一覧</h2>
    <?php endif; ?>
    </div>
    <div class="index_content">
      <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <article <?php post_class( 'article_list boxshadow' ); ?>>
          <a href="<?php the_permalink(); ?>">
            <!--画像を追加-->
            <?php if( has_post_thumbnail() ): ?>
              <?php the_post_thumbnail('large'); ?>
            <?php else: ?>
              <img src="<?php echo get_template_directory_uri(); ?>/images/no-image.jpg" alt="no-img"/>
            <?php endif; ?>
            <div class="text">
              <!--タイトル-->
              <h3><?php the_title(); ?></h3>
              <!--投稿日を表示-->
              <span class="article_date">
                <i class="far fa-calendar-check"></i>
                <time datetime="<?php echo get_the_date( 'Y-m-d' ); ?>">
                  <?php echo get_the_date(); ?>
                </time>
              </span>
              <!--カテゴリ-->
              <?php if (!is_category()): ?>
                <?php if( has_category() ): ?>
                  <span class="cat-data">
                    <i class="far fa-folder-open"></i>
                    <?php $postcat=get_the_category(); echo $postcat[0]->name; ?>
                  </span>
                <?php endif; ?>
              <?php endif; ?>
              <!--抜粋-->
              <?php the_excerpt(); ?>
            </div>
          </a>
        </article>
      <?php endwhile; endif; ?><!--ループ終了-->
      <div class="pagination">
        <?php echo paginate_links( array(
          'type' => 'list',
          'mid_size' => '1',
          'prev_text' => '&laquo;',
          'next_text' => '&raquo;'
      ) ); ?>
      </div>

    </div>
    <?php get_search_form(); ?>
    <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer(); ?>
