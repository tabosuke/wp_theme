<?php get_header(); ?>
<div class="container">
  <div class="containerInner">
    <div class="index_content">

      <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <article <?php post_class( 'article_list boxshadow' ); ?>>
          <a href="<?php the_permalink(); ?>">
            <!--画像を追加-->
            <?php if( has_post_thumbnail() ): ?>
              <?php the_post_thumbnail('large'); ?>
            <?php else: ?>
              <img src="<?php echo get_template_directory_uri(); ?>/images/no-image.gif" alt="no-img"/>
            <?php endif; ?>
            <div class="text">
              <!--タイトル-->
              <h2><?php the_title(); ?></h2>
              <!--投稿日を表示-->
              <span class="article_date">
                <i class="fas fa-pencil-alt"></i>
                <time datetime="<?php echo get_the_date( 'Y-m-d' ); ?>">
                  <?php echo get_the_date(); ?>
                </time>
              </span>
              <!--カテゴリ-->
              <?php if (!is_category()): ?>
                <?php if( has_category() ): ?>
                  <span class="cat-data">
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

    </div>
    <?php get_search_form(); ?>
    <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer(); ?>
