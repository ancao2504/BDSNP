<?php 

function adwords_setup() {
	register_nav_menus( array(
		'primary-menu' => 'Primary Menu'
	) );

	add_theme_support( 'custom-logo' );

	add_theme_support( 'post-thumbnails' );

	add_filter( 'widget_text', 'do_shortcode' );
}
add_action( 'init', 'adwords_setup' );

function bds_widgets_init() {
	register_sidebar( array(
		'name'          => 'Office Phone Number',
		'id'            => 'bds_tel',
		'description'   => 'Add widgets here to show your telephone number.',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Footer Subscribe Area',
		'id'            => 'bds_footer_1',
		'description'   => 'Add widgets here to apppear in your footer subscribe.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'Footer Posts Area',
		'id'            => 'bds_footer_2',
		'description'   => 'Add widgets here to apppear in your footer posts.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'bds_widgets_init' );

function replace_core_jquery_version() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js", array(), '1.0.1', false);
    wp_enqueue_script('jquery');
}
add_action( 'wp_enqueue_scripts', 'replace_core_jquery_version' );

function enqueue_scripts_and_styles() {
	wp_enqueue_style( 'adwords-style', get_stylesheet_uri() );
	wp_enqueue_style( 'css_product_sans.css', get_template_directory_uri() . '/css/css_product_sans.css', array(), '1.0', false);
	wp_enqueue_style( 'css_roboto.css', get_template_directory_uri() . '/css/css_roboto.css', array(), '1.0', false);
	wp_enqueue_style( 'css_roboto_slab.css', get_template_directory_uri() . '/css/css_roboto_slab.css', array(), '1.0', false);
	wp_enqueue_style( 'css_google_sans.css', get_template_directory_uri() . '/css/css_google_sans.css', array(), '1.0', false);
	wp_enqueue_style( 'adwords.min.css', get_template_directory_uri() . '/css/adwords.min.css', array(), '1.0', false);
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1.0', false);
    wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), '1.0', false);

    // wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-3.3.1.min.js', array(), '1.0', false);
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '1.0', false);
    wp_enqueue_script( 'adwords-cus', get_template_directory_uri() . '/js/adwords-cus.js', array(), '1.0', false);
    wp_enqueue_script( 'chatbox', get_template_directory_uri() . '/js/chatbox.js', array(), '1.0', false);
}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts_and_styles' );

// add script to preview section in WP Customizer
function cus_preview_js() {
    wp_enqueue_script( 'cus_preview', get_template_directory_uri() . '/js/cus_preview.js', array(), '1.0', true);
}
add_action( 'customize_preview_init', 'cus_preview_js' );

// stop wp removing div tags
function not_rm_html_tags ( $init ) 
{
    // html elements can't be stripped
    $init['extended_valid_elements'] = 'div[*],article[*],path[*],svg[*],polygon[*]';

    // don't remove line breaks
    $init['remove_linebreaks'] = false; 

    // convert newline characters to BR
    $init['convert_newlines_to_brs'] = true; 

    // don't remove redundant BR
    $init['remove_redundant_brs'] = false;

    // pass back to wordpress
    return $init;
}
add_filter('tiny_mce_before_init', 'not_rm_html_tags');

// not used
// function create_shortcode_office_phone() {
// 	$tel_setting = get_theme_mod('tel_setting');
//     $tel_2 = str_replace(' ', '', $tel_setting);
//     $tel = '<a href="tel:' . $tel_2 . '">' . $tel_setting . '</a>';
//     return $tel;
// }
// add_shortcode('TEL', 'create_shortcode_office_phone');

// show posts about san pham hot in footer
function create_shortcode_hot_products() {
	$args = array( 'numberposts' => '3','category' => '4', 'orderby' => 'date', 'order' => 'DESC');
	$product_posts = get_posts($args);
	foreach ($product_posts as $product_post) {
		setup_postdata( $product_post );
		$show_posts .= '<dd><a href="' . get_permalink($product_post->ID) . '">' . wp_trim_words($product_post->post_title, 5, ' ...') . '</a></dd>';
	}
	wp_reset_postdata();
	$show_posts .= '</ul>';
	return $show_posts;
}
add_shortcode('SPH', 'create_shortcode_hot_products');

/* CREATE SHORTCODE HOT NEWS */
function create_shortcode_hot_news() {
    $args = array('numberposts' => '3', 'category' => '5', 'orderby' => 'date', 'order' => 'DESC');
    $product_posts = get_posts($args);
    foreach ($product_posts as $product_post) {
        setup_postdata( $product_post );
        $show_posts .= '<dd><a href="' . get_permalink($product_post->ID) . '">' . wp_trim_words($product_post->post_title, 6, ' ...') . '</a></dd>';
    }
    wp_reset_postdata();
    $show_posts .= '</ul>';
    return $show_posts;
}
add_shortcode('TT', 'create_shortcode_hot_news');

// show the number of pages in the end of category
function create_paginate() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="navigation"><ul>' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link('Trước') );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
 
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link('Sau') );
 
    echo '</ul></div>' . "\n";
 
}
//add javascript section into wp customizer
function add_theme_customize($wp_customize) {
    $wp_customize->add_section('js_header_section', array('title' => 'JS Header',));
    $wp_customize->add_setting('js_header_setting', array('default' => '', 'transport' => 'refresh',));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'js_header', array('label' => 'Javascript in Header', 'section'  => 'js_header_section', 'settings' => 'js_header_setting', 'type' => 'textarea')));
    $wp_customize->add_section('js_footer_section', array('title' => 'JS Footer',));
    $wp_customize->add_setting('js_footer_setting', array('default' => '', 'transport' => 'refresh',));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'js_footer', array('label'   => 'Javascript in Footer', 'section'  => 'js_footer_section', 'settings' => 'js_footer_setting', 'type' => 'textarea')));
    $wp_customize->add_setting('header_menu_pos_setting', array('capibility' => 'manage_options', 'default' => 'bottomleft', 'type' => 'theme_mod', 'transport' => 'postMessage', 'sanitize_callback' => 'change_header_menu_pos'));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'header_menu_pos', array('label' => 'Vị trí của header menu', 'section' => 'menu_locations', 'settings' => 'header_menu_pos_setting', 'type' => 'radio', 'choices' => array( 'bottomleft' => 'Bottom Left', 'bottomright' => 'Bottom Right', 'topleft' => 'Top Left', 'topright' => 'Top Right'), 'priority' => 50,)));
} 
add_action('customize_register', 'add_theme_customize');

function add_js_header() {
    echo get_theme_mod('js_header_setting');
}
add_action('wp_head', 'add_js_header');

function add_js_footer() {
    echo get_theme_mod('js_footer_setting');
}
add_action('wp_footer', 'add_js_footer');

function change_header_menu_pos($input/*, $setting*/) {
    // // Get list of choices from the control associated with the setting.
    $choices = array(
                        'bottomleft'    =>  'Bottom Left',
                        'bottomright'   =>  'Bottom Right',
                        'topleft'       =>  'Top Left',
                        'topright'      =>  'Top Right' 
                    );

    // If the input is a valid key, return it; otherwise, return the default.
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}


/* Clean WordPress header */
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head, 10, 0');

//* Asynchronous JS without plugin
function async_js($tag){
    $scripts_to_async = array('js/wp-embed.min.js', 'js/jquery/jquery-migrate.min.js');
    foreach($scripts_to_async as $async_script){
        if(true == strpos($tag, $async_script ) )
        return str_replace( ' src', ' async="async" src', $tag );	
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'async_js', 10 );
