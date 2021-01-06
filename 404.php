<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package montblanc
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'That page can&rsquo;t be found.', 'montblanc' ); ?></h1>
				</header><!-- .page-header -->

				<div class="error-content">
					<p><?php _e( 'It looks like nothing was found at this location.<br />Maybe try one of the links below or a search?', 'montblanc' ); ?></p>

					<?php get_search_form(); ?>

				</div><!-- .error-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>

<?php get_footer(); ?>
