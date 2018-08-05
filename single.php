<?php get_header(); ?>
<div class="container">
  <div class="containerInner">
    <div class="content boxshadow">
      <?php if(have_posts()): the_post(); ?>
<article <?php post_class( 'article_single' ); ?>>
  <!--投稿日・著者を表示-->
  <!--タイトル-->
  <p class="article_author">
    <span>著者：</span>
    <?php the_author(); ?>
  </p>
  <h1><?php the_title(); ?></h1>
  <div class="article-info">
    <!--投稿日を取得-->
    <span class="article-date">
      <i class="far fa-calendar-check"></i>
      <time
      datetime="<?php echo get_the_date( 'Y-m-d' ); ?>">
      <?php echo get_the_date(); ?>
      </time>
    </span>
    <!--カテゴリ取得-->
    <?php if(has_category() ): ?>
    <span class="cat-data">
      <i class="far fa-folder-open"></i>
      <?php echo get_the_category_list( ' ' ); ?>
    </span>
    <?php endif; ?>
  </div>
  <!--アイキャッチ取得-->
  <?php if( has_post_thumbnail() ): ?>
  <div class="article-img">
    <?php the_post_thumbnail( 'large' ); ?>
  </div>
  <?php endif; ?>
  <!--本文取得-->
  <div class="article_main">
    <?php the_content(); ?>
  </div>
  <!--タグ-->
  <div class="article-tag">
    <?php the_tags('<ul><li>タグ： </li><li>','</li><li>','</li></ul>'
  ); ?>
  </div>
</article>
<?php endif; ?>
    </div>
    <?php get_search_form(); ?>
    <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer(); ?>
