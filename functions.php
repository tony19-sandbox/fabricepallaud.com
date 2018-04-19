<?php 

define('IMAGES_URL', get_bloginfo('stylesheet_directory') . '/dist/images');
define('IMAGES_PATH', get_stylesheet_directory() . '/dist/images');

/*
SUPPORTS FEATURED IMAGE AND DEFINES THUMBNAIL CUSTOM SIZES
*/

add_theme_support('post-thumbnails');
if (function_exists('add_image_size')) {
  add_image_size('blog_post', 280, 200, true);  
}

/*
JS
*/

function load_scripts() {
  wp_enqueue_script('jquery');  
  wp_enqueue_script('main_js', get_stylesheet_directory_uri() . '/dist/scripts/main.js', array('jquery'), true);
  if (get_post_type() == 'project') {
    wp_enqueue_script('prism', get_stylesheet_directory_uri() . '/dist/scripts/prism.js', array('jquery'), true);
  }
}
add_action('wp_enqueue_scripts', 'load_scripts');

/*
CSS
*/

function load_styles() {
  //wp_enqueue_style( 'css_fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' ); 
  wp_enqueue_style('main_css', get_stylesheet_directory_uri() . '/dist/styles/main.css');
  if (get_post_type() == 'project') {
    wp_enqueue_style('prism', get_stylesheet_directory_uri() . '/dist/styles/prism.css');
  }  
}
add_action( 'wp_enqueue_scripts', 'load_styles' );

/*
MENUS
*/

function register_menus() {
  register_nav_menu('main_menu', 'Main Menu');
  /*
  register_nav_menus(
    array(
    'main_menu' => __( 'Main Menu' ),
    'legal_menu' => __( 'Legal Menu' )
    )
  );
  */
}
add_action('after_setup_theme', 'register_menus');

/*
FONTS
*/

function wpb_add_google_fonts() {
  wp_enqueue_style( 'wpb-google-fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:300,600', false );
  //wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:400,700', false );
}
add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );

/*
CPT: PROJECT
*/

function my_custom_post_project() {
  $labels = array(
    'name'               => _x('Projects', 'post type general name'),
    'singular_name'      => _x('Project', 'post type singular name'),
    'add_new'            => __('Add New Project'),
    'add_new_item'       => __('Add New Project'),
    'edit_item'          => __('Edit Project'),
    'new_item'           => __('New Project'),
    'all_items'          => __('All Projects'),
    'view_item'          => __('View Project'),
    'search_items'       => __('Search Projects'),
    'not_found'          => __('No projects found'),
    'not_found_in_trash' => __('No projects found in the Trash'),
    'parent_item_colon'  => '',
    'menu_name'          => 'Projects'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our projects and project specific data',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
    'has_archive'   => true,
  );
  register_post_type('project', $args);
}
add_action('init', 'my_custom_post_project');

function my_updated_messages_project($messages) {
  global $post, $post_ID;
  $messages['project'] = array(
    0 => '',
    1 => sprintf( __('Project updated. <a href="%s">View project</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.'),
    3 => __('Custom field deleted.'),
    4 => __('Project updated.'),
    5 => isset($_GET['revision']) ? sprintf( __('Project restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Project published. <a href="%s">View project</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Project saved.'),
    8 => sprintf( __('Project submitted. <a target="_blank" href="%s">Preview project</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID)))),
    9 => sprintf( __('Project scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview project</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime($post->post_date)), esc_url(get_permalink($post_ID))),
    10 => sprintf( __('Project draft updated. <a target="_blank" href="%s">Preview project</a>'), esc_url( add_query_arg('preview', 'true', get_permalink($post_ID) ))),
  );
  return $messages;
}
add_filter('post_updated_messages', 'my_updated_messages_project');

?>