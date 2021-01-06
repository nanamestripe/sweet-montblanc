<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );
function theme_enqueue_scripts() {
//子テーマのstyle.css
        wp_enqueue_style('style-child', get_stylesheet_directory_uri() . '/style.css', array( 'style' ));

}


function mybootstrap_enqueue_styles() {
    wp_register_style('bootstrap', get_stylesheet_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
    wp_register_style('bootstrap', get_stylesheet_directory_uri() . '/bootstrap/css/bootstrap.min.css.map' );
    $dependencies = array('bootstrap');
    wp_enqueue_style( 'mybootstrap-style', get_stylesheet_uri(), $dependencies );
}

function mybootstrap_enqueue_scripts() {
    $dependencies = array('jquery');
    wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/bootstrap/js/bootstrap.bundle.min.js', $dependencies, '3.5.1', true ); // trueとしてbodyタグのクロージングの前で読み込むように設定
}

add_action( 'wp_enqueue_scripts', 'mybootstrap_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'mybootstrap_enqueue_scripts' );

// END ENQUEUE PARENT ACTION

/*【表示カスタマイズ】アイキャッチ画像の有効化 */
add_theme_support('post-thumbnails');