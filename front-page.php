<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package montblanc
 */

get_header(); ?>

<div id="oneclm" class="content-area front-page woocommerce-page ">
  <main id="main" class="site-main" role="main">
    <!-- <section class="sec">
      <h2><span>トップニュース</span></h2>
      <div class="container">
        <div class="row">
          <?php
//$argsのプロパティを変えていく
/* $args = array(
    'post_type' => 'post',
    'posts_per_page' => -1,
    'no_found_rows' => true,
 ); */
 // 'no_found_rows'　ページャーを使う時はfalseに。


/* $the_query = new WP_Query($args);
if ($the_query->have_posts()) :
  while ($the_query->have_posts()) : $the_query->the_post(); */

  /* ループ内の記述 */
/* get_template_part('loop-content');

endwhile;
endif;
wp_reset_postdata(); */
?>

        </div>
      </div>
    </section> -->
    <?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>

    <?php if($post->post_content=="") : ?>
    <?php else : ?>
    <div class="welcome">
      <?php the_content() ;?>

      <section class="news">
        <div class="sitewidth">
          <h2><span>News</span></h2>
          <ul class="clear">
            <?php $the_query = new WP_Query( 'showposts=3' ); ?>
            <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
            <li>
              <a href="<?php the_permalink() ?>">
                <?php if (has_post_thumbnail() ) {
					the_post_thumbnail(' medium ');
					}
					else {
						echo '<img src="'.get_stylesheet_directory_uri().'/images/placeholder-image.png" alt="Placeholder" width="300px" height="200px" />';
						}
						?>
              </a>
              <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
              <time
                datetime="<?php echo get_the_date('', '', '', true); ?>"><?php echo get_the_date('', '', '', true); ?></time>
              <p><?php echo mb_substr(get_the_excerpt(), 0, 40); ?></p>
              <p><a href="<?php the_permalink(); ?>">詳しくはこちら</a></p>
            </li>

            <?php endwhile;?>
          </ul>

        </div>
      </section>

    </div>
    <?php endif; ?>
    <?php endwhile; ?>
    <?php montblanc_paging_nav(); ?>
    <?php endif; ?>


    <!-- <section class="featured clear">
      <h2><span>Featured Products</span></h2>
      <?php /*echo do_shortcode('[recent_products per_page="12" columns="3"]'); */?>
      <?php /*echo do_shortcode('[featured_products columns="3"]');*/ ?>
    </section> -->
    <!--/.featured-->




    <?php
		$options = get_option('home_cat_activate'); // キーの前半部分（[]の前）を変数に格納
		if ( $options['checkbox'] ) : ?>

    <script type="text/javascript">
    // Parallax
    $(function() {
      var target1 = $(".categoryphoto");
      var targetPosOT1 = target1.offset().top;
      var targetFactor = 0.1;
      var windowH = $(window).height();
      var scrollYStart1 = targetPosOT1 - windowH;
      $(window).on('scroll', function() {
        var scrollY = $(this).scrollTop();
        if (scrollY > scrollYStart1) {
          target1.css('background-position-y', (scrollY - targetPosOT1) * targetFactor + 'px');

        } else {
          target1.css('background-position', 'center top');
        }
      });
    });
    </script>

  </main><!-- #main -->
</div><!-- #oneclm -->
</div>
</div>


<div class="categoryphoto" style="background-image:url(<?php echo get_theme_mod( 'home_cat_img'); ?>); ">
  <hgroup class="tagline <?php echo get_option('home_cat_color'); ?>">
    <h1><?php if(get_option('home_cat_text')): ?><?php echo get_option('home_cat_text'); ?><?php endif; ?></h1>
    <p><?php if(get_option('home_cat_desc')): ?><?php echo get_option('home_cat_desc'); ?><?php endif; ?></p>
    <?php if(get_option('home_cat_btn')): ?><a
      href="<?php echo get_option('home_cat_url'); ?>"><?php echo get_option('home_cat_btn'); ?></a><?php endif; ?>
</div>

<div id="contentwrapper" class="site-content">
  <div id="main">
    <div id="oneclm" class="content-area front-page woocommerce-page ">
      <main id="main" class="site-main" role="main">

        <section class="clearfix featuredcat-content">
          <?php /* $cat_slug = get_option('home_cat_slug'); $reco_ob = new wp_query(array('category_name'=>$cat_slug, 'posts_per_page'=>9, 'post_status'=>'publish')); */ ?>

          <ul class="featuredcat products columns-3">
            <?php
				    /* $cat_slug = get_option('home_cat_slug');
			        $args = array( 'post_type' => 'product', 'posts_per_page' => 6, 'product_cat' => $cat_slug );
			        $loop = new WP_Query( $args );
			        while ( $loop->have_posts() ) : $loop->the_post(); global $product; */ ?>
            <li class="product type-product">
              <a href="<?php /* echo get_permalink( $loop->post->ID ) */ ?>"
                title="<?php /* echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); */ ?>">
                <?php /* woocommerce_show_product_sale_flash( $post, $product ); ?>
                <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog');; */ ?>
                <h2 class="woocommerce-loop-product__title"><?php /* the_title(); */ ?></h2>
                <span class="price"><?php /* echo $product->get_price_html(); */ ?></span>
              </a>
            </li>
            <?php /* endwhile; */ ?>
            <?php /* wp_reset_query(); */ ?>
          </ul>
          <!--/.products-->
          <!-- <?php /* if(get_option('home_cat_btn')): */ ?><div class="viewall button"><a
              href="<?php /* echo get_option('home_cat_url'); */ ?>"><?php /* echo get_option('home_cat_btn'); */ ?></a>
          </div> -->
          <?php /* endif; */ ?>
        </section>
        <?php endif; ?>


      </main><!-- #main -->

      <?php get_sidebar(); ?>

    </div><!-- #oneclm -->

    <?php get_footer(); ?>