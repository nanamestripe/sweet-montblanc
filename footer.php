<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package montblanc
 */
?>

	</div><!-- #content -->
</div><!-- #main -->


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
						echo '<img src="'.get_template_directory_uri().'/css/placeholder-image.png" alt="Placeholder" width="300px" height="200px" />';
						}
						?>

			
			
			</a>
			<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
			<time datetime="<?php echo get_the_date('', '', '', true); ?>"><?php echo get_the_date('', '', '', true); ?></time>
			<p><?php echo mb_substr(get_the_excerpt(), 0, 40); ?></p>
			
			</li>

			<?php endwhile;?>
			</ul>

			</div>
</section>


<?php dynamic_sidebar( 'InstaFooter' ); ?>


<div id="cd-shadow-layer"></div>
<div id="cd-cart">
   <h2>Cart</h2>
   <div class="cd-cart-items">
   <?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
   </div>
</div> <!-- cd-cart -->




	<footer class="site-footer" role="contentinfo">
		<div class="sitewidth">
		<nav class="footer-navigation clear">
		<?php wp_nav_menu( array( 'theme_location' => 'footernav','depth' =>1 ) ); ?>
		</nav>
		</div>

		<div id="colophon" class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'montblanc' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'montblanc' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'montblanc' ), 'montblanc', '<a href="http://wooseum.com" rel="designer">wooseum.com</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
