<?php
////////////////////////////
// THEME OPTIONS
///////////////////////////

include('theme-options/themeOptions.php');
/* get theme options */ $options = get_option('theme_settings');
global $options;

/***
 * ADDING CSS AND JS 
 * THE WP WAY
 * */

function theme_enqueue_scripts() {
    //css
    wp_register_style( 'Font_Awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' );
    wp_enqueue_style('Font_Awesome');
    
    wp_register_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' );
    wp_enqueue_style('bootstrap');
    
    wp_register_style( 'theme-style', get_template_directory_uri().'/inc/theme.css' );
    wp_enqueue_style('theme-style');

    wp_register_style( 'style-css', get_template_directory_uri().'/style.css' );
    wp_enqueue_style('style-css');
    
    //js
    wp_enqueue_script('jquery');
    // wp_register_script('bootstrap', get_template_directory_uri() . '', array('jquery'));
    wp_register_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array('jquery'));
   wp_enqueue_script( 'bootstrap' );
}
add_action( 'init', 'theme_enqueue_scripts' );
/* * *********
 * ADDING MENU
 */
include( get_template_directory() . '/inc/walker.php');
include( get_template_directory() . '/inc/walker_mobile.php');
add_theme_support('menus');

function register_theme_menus() {
    register_nav_menus(
            array('primary_menu' => _('Primary Menu'))
    );
    register_nav_menus(
            array('secondary_menu' => _('Secondary Menu'))
    );
}
add_action('init', 'register_theme_menus');

/* * *********
 * DISABLING GUTENBURG 
 */

//PAGE SLUG BODY CLASS
function add_slug_body_class($classes) {
    global $post;
    if (isset($post)) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}

add_filter('body_class', 'add_slug_body_class');

/* * *********
 * DISABLING GUTENBURG 
 */

add_filter('use_block_editor_for_post', '__return_false', 10);
add_theme_support( 'block-templates' );
// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
// Disables the block editor from managing widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );




/* * *********
 * WIDGETS
 */

function create_widget($name, $id, $description) {
    register_sidebar(array(
        'name' => __($name),
        'id' => $id,
        'description' => __($description),
        'before_widget' => '',
        'after_widget' => '',
//            'before_title' => '',
//            'after_title' => ''
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>'
    ));
}

//create_widget( 'Default Header Right', 'default_header_right', 'On the right side of the header' );

create_widget('Page Sidebar', 'page', 'Appears on the side of pages with a sidebar');
create_widget('Blog Sidebar', 'blog', 'Displays on the side of pages in the blog section');


create_widget(' Footer 1', 'footer_1', '');
create_widget(' Footer 2', 'footer_2', '');
create_widget(' Footer 3', 'footer_3', '');
create_widget(' Footer 4', 'footer_4', '');

// create_widget('Common section 1', 'common_section_1', 'Displays on common section when called on sections template.');

// create_widget('Common section 2', 'common_section_2', 'Displays on common section 2 if/when called on sections template.');

// create_widget('Common section 3', 'common_section_3', 'Displays on common section 3 if/when called on sections template.');

//create_widget( 'Footer Woo Products', 'fwp', 'Footer WooCommerce Products' );
//
//create_widget( 'Footer Right', 'footer-right', 'One the right side of the footer' );

/* Disable WordPress Admin Bar for all users but admins. */
//add_filter( 'show_admin_bar', '__return_false' );

/* * *********
 * ADDING FEATURED IMAGE THEME SUPPORT
 */
add_theme_support('post-thumbnails');

/**
 * ADDING WP COLORPICKER SUPPORT
 */
add_action('admin_enqueue_scripts', 'wplite_add_color_picker');

function wplite_add_color_picker($hook) {

    if (is_admin()) {

        // Add the color picker css file       
        wp_enqueue_style('wp-color-picker');

        // Include our custom jQuery file with WordPress Color Picker dependency
        wp_enqueue_script('custom-script-handle', get_template_directory_uri() . '/theme-options/inc/custom-script.js', array('wp-color-picker'), false, true);
    }
}

add_action('admin_footer', 'colorPicker_scripts');

function colorPicker_scripts() {
    ?>
    <script>(function ($) {

            // Add Color Picker to all inputs that have 'color-field' class
            $(function () {
                $('.color-field').wpColorPicker();
            });

        })(jQuery);</script>
    <?php

}

/* * *********
 * Removing p Tags
 * * */
//remove_filter ('the_content',  'wpautop');
remove_filter('the_excerpt', 'wpautop');

//remove_filter ('acf_the_field', 'wpautop');

/* * *********
 * NUMBERED PAGINATION
 */
function wplight_pagination() {
    echo "<style>  .pagination a, .pagination span {    position: relative;    float: left;    padding: 6px 12px;    margin-left: -1px;    line-height: 1.42857143;    color: #337ab7;    text-decoration: none;    background-color: #fff;    border: 1px solid #ddd;}</style>";
    global $wp_query;
    $big = 999999999; // need an unlikely integer
    echo '<ul class="pagination">' . paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    )) . '</ul>';
}

add_shortcode('related_posts', 'related_posts');
/* * **
 * 
 *  CUSTOM SERCH FORM
 * ** */

function custom_serach_form() {
    ?>
    <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Type Something...." value="<?php echo get_search_query() ?>" name="s">
            <div class="input-group-append">
                <button class="btn button" type="submit">Search</button>
            </div>
        </div>
    </form>
<?php
}

add_shortcode('wpl_search', 'custom_serach_form');

/**
 * CSS FOR ACF PAGE TEMPLATE BACKEND
 * * */
add_action('admin_head', 'pagebg_custom_css');

function pagebg_custom_css() {
    echo '<style>
    .special, .special * {background:#EEE;} 
  </style>';
}

/* * *********
 * REMOVING UNWANTED SCRIPTS
 */

remove_action('wp_head', 'wp_generator');
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'start_post_rel_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'adjacent_posts_rel_link' );
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action( 'wp_head', 'bs_shortcodes-css' );
remove_action( 'wp_head', 'bs_bootstrap-css' );
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);

/* * ***
 * * ADDING BLOG HOME TO NAVIGATION IF CREATING BLOG
 * * */

function childtheme_menu_args($args) {
    $args = array(
        'show_home' => 'Home',
        'sort_column' => 'menu_order',
        'menu_class' => 'menu',
        'echo' => true
    );
    return $args;
}

add_filter('wp_page_menu_args', 'childtheme_menu_args');


//add_filter('excerpt_more', 'new_excerpt_more');

////////////////////////////
////||UPLOAD LOGO
////////////////////////////
//function themeslug_theme_customizer( $wp_customize ) {
/* First, we'll create a new section for our logo upload. Note that the description will not be displayed when using the Theme Customizer; it is simply used for the section heading's title attribute. */
/* $wp_customize->add_section( 'themeslug_logo_section' , array(
  'title'       => __( 'Logo', 'themeslug' ),
  'priority'    => 30,
  'description' => 'Upload a logo to replace the default site name and description in the header',
  ) ); */
/* Next, we register our new setting. It doesn't get any easier than this: */
//$wp_customize->add_setting( 'themeslug_logo' );
/* Lastly, we tell the Theme Customizer to let us use an image uploader for setting our logo: */
/* $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
  'label'    => __( 'Logo', 'themeslug' ),
  'section'  => 'themeslug_logo_section',
  'settings' => 'themeslug_logo',
  ) ) ); */

//}
//CALLING THE FUNCTION
//add_action('customize_register', 'themeslug_theme_customizer');
/////////////////////////////////////////
// CATEGORY ID IN BODY AND POST CLASS
////////////////////////////////
function category_id_class($classes) {
    global $post;
    foreach ((get_the_category($post->ID)) as $category)
        $classes [] = 'cat-' . $category->cat_ID . '-id';
    return $classes;
}

add_filter('post_class', 'category_id_class');
add_filter('body_class', 'category_id_class');

////////////////////////////
// ESCAPE HTML ENTITIES IN COMMENTS
///////////////////////////
function encode_code_in_comment($source) {
    $encoded = preg_replace_callback('/<code>(.*?)<\/code>/ims', create_function('$matches', '$matches[1] = preg_replace(array("/^[\r|\n]+/i", "/[\r|\n]+$/i"), "", $matches[1]); 
	return "<code>" . htmlentities($matches[1]) . "</code>";'), $source);
    if ($encoded)
        return $encoded;
    else
        return $source;
}

add_filter('pre_comment_content', 'encode_code_in_comment');

//
function show_phone() {
    global $options;
    return $options['phone'] . '!';
}

add_shortcode('phone', 'show_phone');

function show_email() {
    global $options;
    return $options['email'];
}

add_shortcode('site_email', 'show_email');

function show_addr() {
    global $options;
    return $options['address'];
}

add_shortcode('address', 'show_addr');

function show_map() {
    global $options;
    return $options['map'];
}

add_shortcode('map', 'show_map');

/**
 * SOCIAL MEDIA LINKS SHORTCODES 
 * * */
function fb() {
    global $options;
    return $options['facebook'];
}

add_shortcode('facebook', 'fb');

function tw() {
    global $options;
    return $options['twitter'];
}

add_shortcode('twitter', 'tw');

function instagram() {
    global $options;
    return $options['instagram'];
}

add_shortcode('instagram', 'instagram');

function pinterest() {
    global $options;
    return $options['pinterest'];
}

add_shortcode('pinterest', 'pinterest');

function youtube() {
    global $options;
    return $options['youtube'];
}

add_shortcode('youtube', 'youtube');

function gp() {
    global $options;
    return $options['google-plus'];
}

add_shortcode('google-plus', 'gp');

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);

/* *
 * CSS FOR ACF PAGE TEMPLATE BACKEND
 * * *
add_action('admin_head', 'pagebg_custom_css');

function pagebg_custom_css() {
  echo '<style>
    .special, .special * {background:#EEE;} 
  </style>';
} */


/* CUSTOM EXCERPT LENGTH */

function custom_excerpt_length($length) {
    return 30;
}

//add_filter('excerpt_length', 'custom_excerpt_length');

/* * **
  REMOVE [] FROM EXCERPT:
 * * */
function new_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

//add_filter('excerpt_more', 'new_excerpt_more');
/***
 * Set post views count using post meta, NOTE: BETA VERSION NEEDS IMPROVEMENT
 * ****/ 

function the_post_views() {
	
	$postID = get_the_ID(); 
  $countKey = 'post_views_count';
  $count = get_post_meta($postID, $countKey, true);
  if ($count == '') {
      $count = 0;
      delete_post_meta($postID, $countKey);
      add_post_meta($postID, $countKey, '0');
  } else {
      $count++;
      update_post_meta($postID, $countKey, $count);
  }
     
	$views = get_post_meta($postID , $countKey, true);  
echo $views ;
	
}

