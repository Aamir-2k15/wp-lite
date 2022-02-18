<?php   
//SETTING UP THE PAGE
$social_arr = ['facebook','twitter','linkedin','instagram','pinterest','youtube','google-plus'];
function set_page() {
    //add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );   
    add_menu_page('Theme Settings', 'Theme Settings', 'manage_options', 'theme_settings', 'the_page', 'dashicons-list-view', 40);
}
//CALLING THE FUNCTION
add_action('admin_menu', 'set_page');?>
<?php //THE PAGE
function the_page() {?>
<?php
//COLORPICKER 
 if( is_admin() ) {
        // Add the color picker css file      
        wp_enqueue_style( 'wp-color-picker' );    
        // Include our custom jQuery file with WordPress Color Picker dependency
        wp_enqueue_script( 'custom-script-handle', get_template_directory_uri() .'/theme-options/inc/custom-script.js', array( 'wp-color-picker' ), false, true );
    }
?><?php include('the_page.php');?>
<?php } ?>
<?php
//REGISTERING SETTINGS AND FIELDS
function register_settings_and_fields() {
    register_setting('theme_settings','theme_settings');
//    add_settings_section('theme_main_section', 'Main Settnigs', theme_main_section_cb, 'theme_settings');
//    add_settings_section('theme_secondary_section', 'Header Settnigs', theme_sec_section_cb, 'theme_settings');
}

add_action('admin_init', 'register_settings_and_fields');
?><?php
//Loading Scripts Correctly in the WordPress Admin
 function load_admin_things() {
     define( 'UPLOADS', 'wp-content/'.'uploads' );
     wp_enqueue_media();
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_style('thickbox');
}
add_action( 'admin_enqueue_scripts', 'load_admin_things' ); 
//if (isset($_GET['page']) && $_GET['page'] == 'my_plugin_page') {
//add_action('admin_print_scripts', 'my_admin_scripts');
//add_action('admin_print_styles', 'my_admin_styles');
//}?>