<?php
/**
 * montblanc Theme Customizer
 *
 * @package montblanc
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function montblanc_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'montblanc_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function montblanc_customize_preview_js() {
	wp_enqueue_script( 'montblanc_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'montblanc_customize_preview_js' );






// Activate custom background.
add_custom_background();


// Activate custom logo image.
function debut_theme_customizer( $wp_customize ) {
    // Logo upload
    $wp_customize->add_section( 'themeslug_logo_section' , array(
	    'title'       => __( 'ロゴ画像', 'debut' ),
	    'priority'    => 30,
	    'description' => 'Upload your logo image here.',
	) );
	$wp_customize->add_setting( 'themeslug_logo' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
		'label'        => __( 'Upload an image', 'debut' ),
		'section'    => 'themeslug_logo_section',
		'settings'   => 'themeslug_logo',
	) ) );
}
add_action('customize_register', 'debut_theme_customizer');






/* ヘッダーの特集画像バナー（画像+リンク先　x 2 ）
---------------------------------------------------------- */

function haku_headersubbanner_register( $wp_customize ) {

$wp_customize->add_section( 'haku_feature_banners', array(
  'title'     => 'ヘッダー特集バナー',
  'priority'  => 60,
));


/* 表示スイッチ */
	$wp_customize->add_setting( 'haku_feature_banner[checkbox]', array(
	  'default'   => true,
	  'type'      => 'option',
	  'transport' => 'refresh',
	));
	$wp_customize->add_control( 'haku_feature_banner_checkbox_control', array(
	  'settings'  => 'haku_feature_banner[checkbox]',
	  'label'     => '特集ミニバナーを表示する',
	  'section'   => 'haku_feature_banners',
	  'type'      => 'checkbox',
	));
	

/* 画像1 */
	$wp_customize->add_setting( 'haku_feature_banner01', array(
	  'default-image' => get_template_directory_uri() . '/css/placeholder-image.png',
	        'transport'     => 'refresh',
	        'height'        => 300,
	        'width'        => 219,
	));
	$wp_customize-> add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'haku_feature_banner01_control', array(
		'settings'  => 'haku_feature_banner01', 
		'label'     => '特集バナー１[300x219]',
		'flex_width'  => false,
		'flex_height' => false,
		'width'       => 300,
		'height'      => 219,
		'section'   => 'haku_feature_banners',
	)));
	
	
	$wp_customize->add_setting( 'haku_feature_banner01_link', array(
	  'default'   => '',
	  'type'      => 'option',
	));
	$wp_customize->add_control( 'haku_feature_banner01_link_control', array(
	  'settings'  => 'haku_feature_banner01_link', // settingのキー
	  'label'     => '→リンク先URL',
	  'section'   => 'haku_feature_banners',
	  'type'      => 'text',
	));


/* 画像2 */
	$wp_customize->add_setting( 'haku_feature_banner02', array(
	  'default-image' => get_template_directory_uri() . '/css/placeholder-image.png',
	        'transport'     => 'refresh',
	        'height'        => 300,
	        'width'        => 219,
	));
	$wp_customize-> add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'haku_feature_banner02_control', array(
		'settings'  => 'haku_feature_banner02', 
		'label'     => '特集バナー２[300x219]',
		'flex_width'  => false,
		'flex_height' => false,
		'width'       => 300,
		'height'      => 219,
		'section'   => 'haku_feature_banners',
	)));
	
	
	$wp_customize->add_setting( 'haku_feature_banner02_link', array(
	  'default'   => '',
	  'type'      => 'option',
	));
	$wp_customize->add_control( 'haku_feature_banner02_link_control', array(
	  'settings'  => 'haku_feature_banner02_link', // settingのキー
	  'label'     => '→リンク先URL',
	  'section'   => 'haku_feature_banners',
	  'type'      => 'text',
	));

}
add_action( 'customize_register', 'haku_headersubbanner_register' );




/* クロップ関数「WP_Customize_Cropped_Image_Control」を「wp_get_attachment_url」で表示 */
function echo_feature_banner01() {
    $id = get_theme_mod('haku_feature_banner01');
    if ($id != 0) {
        $url = wp_get_attachment_url($id);
        echo '<img src="' . $url . '" alt="" />';
    }
}

function echo_feature_banner02() {
    $id = get_theme_mod('haku_feature_banner02');
    if ($id != 0) {
        $url = wp_get_attachment_url($id);
        echo '<img src="' . $url . '" alt="" />';
    }
}







function haku_customize_catsection_register( $wp_customize ) {
	
	$wp_customize->add_setting( 'home_cat_activate[checkbox]', array(
	  'default'   => false,
	  'type'      => 'option',
	  'transport' => 'refresh',
	));
	$wp_customize->add_control( 'home_cat_activate_control', array(
	  'settings'  => 'home_cat_activate[checkbox]',
	  'label'     => '特集カテゴリーセクションを表示（トップページ中程に特定カテゴリーのイメージ画像+商品一覧を表示できます）',
	  'section'   => 'home_cat_section1',
	  'type'      => 'checkbox',
	));
	
	/* TOP 特集カテゴリー */
	$wp_customize->add_section( 'home_cat_section1', array( 
	  'title' => 'HOME 特集カテゴリーセクション', 
	  'priority' => 70, 
	  'description' => 'トップページに特定カテゴリーセクション（イメージ写真と特定カテゴリーの商品一覧）を追加',
	));

	$wp_customize->add_setting('home_cat_slug', array( 'type'  => 'option', ));
	$wp_customize->add_control( 'home_cat_slug_control', array( 
	  'settings' => 'home_cat_slug', 
	  'label' => '取り上げるカテゴリースラッグ（カテゴリー名ではなく半角英数字のスラッグ名を入力）', 
	  'section'   => 'home_cat_section1',
	  'type' => 'text'
	));



	$wp_customize->add_setting( 'home_cat_img', array(
	  'default-image' => get_template_directory_uri() . '/css/placeholder-image.png',
	        'transport'     => 'refresh',
	));
	$wp_customize-> add_control(new WP_Customize_Image_Control($wp_customize, 'home_cat_img_control', array(
		'settings'  => 'home_cat_img', 
		'label'     => 'ビジュアルイメージとなる画像',
		'flex_width'  => false,
		'flex_height' => false,
		'section'   => 'home_cat_section1',
	)));

	
	
	
	$wp_customize->add_setting('home_cat_text', array( 'type'  => 'option', ));
	$wp_customize->add_control( 'home_cat_text_control', array( 
	  'settings' => 'home_cat_text', 
	  'label' => '画像に重ねるメッセージ', 
	  'section'   => 'home_cat_section1',
	  'type' => 'text'
	));

	$wp_customize->add_setting('home_cat_desc', array( 'type'  => 'option', ));
	$wp_customize->add_control( 'home_cat_desc_control', array( 
	  'settings' => 'home_cat_desc', 
	  'label' => 'サブキャッチ', 
	  'section'   => 'home_cat_section1',
	  'type' => 'text'
	));

	$wp_customize->add_setting('home_cat_btn', array( 'type'  => 'option', ));
	$wp_customize->add_control( 'home_cat_btn_control', array( 
	  'settings' => 'home_cat_btn', 
	  'label' => 'リンクボタンテキスト',
	  'section'   => 'home_cat_section1',
	  'type' => 'text'
	));

	$wp_customize->add_setting('home_cat_url', array( 'type'  => 'option', ));
	$wp_customize->add_control( 'home_cat_url_control', array( 
	  'settings' => 'home_cat_url', 
	  'label' => 'リンク先URL（カテゴリーページや特集ページへ）',
	  'section'   => 'home_cat_section1',
	  'type' => 'text'
	));	

	$wp_customize->add_setting('home_cat_color', array( 'type'  => 'option', ));
	$wp_customize->add_control( 'home_cat_color_control', array( 
	  'settings' => 'home_cat_color', 
	  'label' => '文字色',
	  'section'   => 'home_cat_section1',
	  'type' => 'radio',
	  'choices'  => array(
		'white'  => '白（写真が暗めの場合）',
		'black' => '黒（写真が明るめの場合）',
		),
	));

}
add_action( 'customize_register', 'haku_customize_catsection_register' );










/* カスタムヘッダー
---------------------------------------------------------- */
// Aativate custom header support.
add_theme_support(
    'custom-header',
    array(
        'width' => 2340,
        'height' => 1000,
        'flex-height' => false,
        'header-text' => false,
        'random-default' => true,
        'default-image' => '%2$s/library/images/default_header.jpg',
        'admin-head-callback' => '__return_false',
    )
);



//ヘッダー画像のIDを取得
function custom_header_get_attachment_id_by_url( $url ) {
$parse_url  = explode( parse_url( WP_CONTENT_URL, PHP_URL_PATH ), $url );
$this_host = str_ireplace( 'www.', '', parse_url( home_url(), PHP_URL_HOST ) );
$file_host = str_ireplace( 'www.', '', parse_url( $url, PHP_URL_HOST ) );
if ( ! isset( $parse_url[1] ) || empty( $parse_url[1] ) || ( $this_host != $file_host ) ) {
return;
}
global $wpdb;
$attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM {$wpdb->prefix}posts WHERE guid RLIKE %s;", $parse_url[1] ) );
return $attachment[0];
}




