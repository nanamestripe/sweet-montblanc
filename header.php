<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="contentwrapper">
 *
 * @package montblanc
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

<script src="https://use.fontawesome.com/666b976d0a.js"></script>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
 <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/slick.css"/>
 <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/slick-theme.css"/>

<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>


</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">

		<div id="header-serch">
			<form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<label class="screen-reader-text" for="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"><?php esc_html_e( 'Search for:', 'woocommerce' ); ?></label>
				<input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="search-field" placeholder="<?php echo esc_attr__( 'Search products&hellip;', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
				<button type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'woocommerce' ); ?>"></button>
				<input type="hidden" name="post_type" value="product" />
			</form>
		</div>
		
		<div class="site-branding">
			<?php if ( get_theme_mod( 'themeslug_logo' ) ) : ?>
			 <div class="site-logo">
			 <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_theme_mod( 'themeslug_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
			 </div>
			<?php else : ?>
				<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
				<<?php echo $heading_tag; ?> class="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></<?php echo $heading_tag; ?>>
				<p class="site-description"><?php bloginfo('description'); ?></p>
			<?php endif; ?>
		</div>


		<div id="cart-navigation">

		<ul>
		<?php if ( is_user_logged_in() ) { ?>
			<li class="myaccount"><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','woothemes'); ?>"><i class="ion-person"></i></a></li>
		<?php }
		else { ?>
			<li class="login"><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','woothemes'); ?>"><?php _e('Login','woothemes'); ?></a></li>
		<?php } ?>

 		<li id="cd-cart-trigger" class="view-cart cartis<?php echo sprintf( _n( '%d', '%d', WC()->cart->get_cart_contents_count(), '' ), WC()->cart->get_cart_contents_count() );?>">
 		<a class="cd-img-replace" href="#0">
	 		<i class="ion-bag"><span class="cart-count"><?php if ( WC()->cart->get_cart_contents_count() !== 0 ) {?><span class="count"><?php echo sprintf( _n( '%d', '%d', WC()->cart->get_cart_contents_count(), '' ), WC()->cart->get_cart_contents_count() );?></span><?php } ?></span></i>
 		</a></li>

		</ul>

		</div>

	</header><!-- #masthead -->

	<div class="menu-container clear">
		<div class="menu sitewidth">
		<?php wp_nav_menu( array( 'theme_location' => 'primary','container' => false) ); ?>			
		</div>
	</div><!-- .menu-container -->

<div id="main">
	<?php if (is_front_page()) { ?>
	<div class="topbanner">
				
		<script type="text/javascript">
		    $(document).ready(function(){
		      $('.slickslider').slick({
				dots: true,
				arrows: true,
				infinite: true,
				speed: 500,
				fade: true,
				cssEase: 'linear',
				autoplay: true,
		  
		      });
		    });
		  </script>		
		<div class="slickslider slider-container">
		<?php $header_images = get_uploaded_header_images(); ?>
		<?php foreach ($header_images as $key => $value): ?>
		<?php $img_id = custom_header_get_attachment_id_by_url($value['url']); ?>
		<?php $img_meta = get_post($img_id); ?>
		<div>
		<?php if($img_meta->post_content): ?>
		<a href="<?php echo esc_html($img_meta->post_content); ?>">
		<?php endif; ?>
		<?php if($img_meta->post_title): ?>
		<div class="tagline-container">
			<p><?php echo esc_html($img_meta->post_excerpt); ?></p>
			<h2><?php echo esc_html($img_meta->post_title); ?></h2>
		</div>
		<?php endif; ?>
		<img src="<?php echo $value['url']; ?>" alt="<?php echo esc_html($img_meta->post_title); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" />
		<?php if($img_meta->post_content): ?>
		</a>
		<?php endif; ?>
		</div>
		<?php endforeach; ?>
		</div>

		<?php
		$options = get_option('haku_feature_banner'); // キーの前半部分（[]の前）を変数に格納
		if ( $options['checkbox'] ) : ?>		
				<div class="featured-container">
					<div class="featured01"><a href="<?php echo get_option( 'haku_feature_banner01_link' ); ?>"><?php echo_feature_banner01(); ?></a></div>
					<div class="featured02"><a href="<?php echo get_option( 'haku_feature_banner02_link' ); ?>"><?php echo_feature_banner02(); ?></a></div>
				</div>
		<?php endif; ?>		

	</div>
	
	<?php } if (is_product()){ ?>
	 <!---->
	<?php } elseif (! is_front_page()) { ?>
		<?php if (is_single()) { ?>
			<?php if (has_post_thumbnail() )  {?>
				<div class="entryheaderimg"><?php the_post_thumbnail('full'); ?></div>
			<?php } ?>
		<?php } elseif (! is_single()) { ?>
				
		<div class="categoryheaderimg"><?php woocommerce_category_image(); ?></div>
		<div id="titlebar"><div class="sitewidth">	
		<?php montblanc_page_title(); ?>
		<?php wc_category_description(); ?>
		</div></div>
		<?php } ?>
		
	<?php } ?>

	<div id="contentwrapper" class="site-content">
