<?php

// function my_theme_enqueue_styles()
// {
//     $parent_style = 'parent-style'; // This is 'montblanc-style' for the montblanc theme.

//     wp_enqueue_style($parent_style, get_template_directory_uri() . '/css/woocommerce-layout.css');
//     wp_enqueue_style(
//         'child-style',
//         get_template_directory_uri() . '/css/woocommerce-layout.css',
//         array( $parent_style ),
//         wp_get_theme()->get('Version')
//     );
// }
// add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');


add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );
function theme_enqueue_scripts() {
//親テーマのstyle.css
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css');

        //子テーマのstyle.css
        wp_enqueue_style('style-child', get_stylesheet_directory_uri() . '/style.css', array( 'style' ));

//親テーマのwoocommerce-layout.css
    wp_enqueue_style('woocommerce-layout', get_template_directory_uri() . '/css/woocommerce-layout.css');

//子テーマのwoocommerce-layout.css
wp_enqueue_style('woocommerce-layout-child', get_stylesheet_directory_uri() . '/css/woocommerce-layout.css', array( 'woocommerce-layout' ));

//親テーマのwoocommerce.css
    wp_enqueue_style('woocommerce', get_template_directory_uri() . '/css/woocommerce.css');

//子テーマのwoocommerce.css
wp_enqueue_style('woocommerce-child', get_stylesheet_directory_uri() . '/css/woocommerce.css', array( 'woocommerce' ));



}


// function mybootstrap_enqueue_styles() {
//     wp_register_style('bootstrap', get_stylesheet_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
//     wp_register_style('bootstrap', get_stylesheet_directory_uri() . '/bootstrap/css/bootstrap.min.css.map' );
//     $dependencies = array('bootstrap');
//     wp_enqueue_style( 'mybootstrap-style', get_stylesheet_uri(), $dependencies );
// }

// function mybootstrap_enqueue_scripts() {
//     $dependencies = array('jquery');
//     wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/bootstrap/js/bootstrap.min.js', $dependencies, '3.4.1', true ); // trueとしてbodyタグのクロージングの前で読み込むように設定
// }

// add_action( 'wp_enqueue_scripts', 'mybootstrap_enqueue_styles' );
// add_action( 'wp_enqueue_scripts', 'mybootstrap_enqueue_scripts' );




/*【表示カスタマイズ】アイキャッチ画像の有効化 */
add_theme_support('post-thumbnails');


/* 投稿ページ一覧ページとアーカイブページのみcustom.cssを読み込む*/
function addcustom_scripts(){
    // wp_enqueue_style('style', get_stylesheet_uri().'/style.css');
    if (is_archive() || is_home()) {
        wp_enqueue_style('custom', get_stylesheet_directory_uri().'/css/custom.css',array('montblanc-style','mybootstrap-style'));
        wp_enqueue_style('woocommerce-custom', get_stylesheet_directory_uri().'/css/woocommerce-custom.css', array('woocommerce-layout','woocommerce-layout-child'));
    }
    else{
        wp_enqueue_style('style', get_stylesheet_directory_uri().'/style.css');
 wp_enqueue_style('woocommerce-layout', get_stylesheet_directory_uri().'css/woocommerce-layout.css');
    }
}
add_action('wp_enqueue_scripts', 'addcustom_scripts');

function add_bulmafiles()
{
    // bulma CSSの読み込み
    wp_enqueue_style('bulma', '//cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.css', array(), '0.8.0',false);
}
add_action('wp_enqueue_scripts', 'add_bulmafiles');

?>