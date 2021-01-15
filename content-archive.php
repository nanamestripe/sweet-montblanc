<?php
/**
 * @package montblanc
 */
?>

<article class="columns" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php if (is_front_page()) { ?>
  <?php } else { ?>
  <div class="p-post_image column is-one-third">
    <a href="<?php the_permalink() ?>">


      <?php if (has_post_thumbnail() ) {
  					the_post_thumbnail(' medium ');
  					}
  					else {
  						echo '<img src="'.get_template_stylesheet_uri().'/images/placeholder-image.png" alt="Placeholder" width="300px" height="200px" />';
  						}
  						?>



    </a>
  </div>
  <div class="p-post_desciption column is-two-thirds">
    <header class="entry-header">
      <?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

      <?php if ( 'post' == get_post_type() ) : ?>
      <div class="entry-meta">
        <?php montblanc_posted_on(); ?>
      </div><!-- .entry-meta -->
      <?php endif; ?>
    </header><!-- .entry-header -->
    <?php } ?>
    <div class="entry-content">
      <?php
  			/* translators: %s: Name of current post */
  			the_excerpt( sprintf(
  				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'montblanc' ),
  				the_title( '<span class="screen-reader-text">"', '"</span>', false )
  			) );
  		?>

      <?php
  			wp_link_pages( array(
  				'before' => '<div class="page-links">' . __( 'Pages:', 'montblanc' ),
  				'after'  => '</div>',
  			) );
  		?>
    </div><!-- .entry-content -->
    <footer class="entry-footer permalink">
      <a href="<?php the_permalink(); ?>">詳しくはこちら</a>
    </footer><!-- .entry-footer -->
  </div>
</article><!-- #post-## -->