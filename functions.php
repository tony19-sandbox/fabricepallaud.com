<?php 

define('IMAGES_URL', get_bloginfo('stylesheet_directory') . '/dist/images');
define('IMAGES_PATH', get_stylesheet_directory() . '/dist/images');

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
  wp_enqueue_style('main_css', get_stylesheet_directory_uri() . '/dist/styles/main.css');
  if (get_post_type() === 'project') {
    wp_enqueue_style('prism', get_stylesheet_directory_uri() . '/dist/styles/prism.css');
  }  
}
add_action( 'wp_enqueue_scripts', 'load_styles' );

/*
MENUS
*/

function register_menus() {
  register_nav_menu('main_menu', 'Main Menu');
}
add_action('after_setup_theme', 'register_menus');

/*
FONTS
*/

function wpb_add_google_fonts() {
  wp_enqueue_style( 'wpb-google-fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:300,600', false );
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

/*
HIDE ADMIN BAR
*/

add_filter('show_admin_bar', '__return_false');

/*
CONTACT FORM ERROR MESSAGES
*/

function generate_response($type, $message) {
  $t = $type === 'success' ? 'success' : 'error';
  return "<div class='$t'>$message</div><br/>"; 
}

/*
SENDING EMAIL
*/

function send_email($form_email, $form_name, $form_message) {
  $email_to = get_option('admin_email');
  $sender = $form_email;
  $email_subject = 'Message from '. get_bloginfo('name') . ' - ' . $form_email;

  $headers = "From: '" . $form_name . "' <" . $form_email . "> \r\n";
  $headers .= "Reply-To: ". strip_tags($form_email) . "\r\n";
  $headers .= "Content-Type:text/html;charset=utf-8";

  $message_head_cell_color = "#eee";
  $email_message = '<html><body>';
  $email_message .= "<table rules='all' style='border-color: #aaa;' cellpadding='10'>";
  $email_message .= "<tr><td style='background: " . $message_head_cell_color . ";'><strong>NAME:</strong> </td><td>" . $form_name . "</td></tr>";
  $email_message .= "<tr><td style='background: " . $message_head_cell_color . ";'><strong>EMAIL:</strong> </td><td>" . $form_email . "</td></tr>";
  $email_message .= "<tr><td style='background: " . $message_head_cell_color . ";'><strong>MESSAGE:</strong> </td><td>" . $form_message . "</td></tr>";
  $email_message .= "</table>";
  $email_message .= "</body></html>";
  $email_message = nl2br($email_message);

  $result_mail_function = wp_mail($email_to, $email_subject, $email_message, $headers);

  wp_mail('fpallaud@hotmail.com', $email_subject, $email_message, $headers);
  wp_mail('fabpallaud@gmail.com', $email_subject, $email_message, $headers);

  if ($result_mail_function) {
    $message_sent = 1;
    echo '<div class="contact_success">' . $success_message . '</div>';
  }
  else {
    echo "Your message wasn't send successfully, please email me at <strong>fabpallaud@gmail.com</strong>";
  }
}

?>