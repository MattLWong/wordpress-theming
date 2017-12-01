<?php


function get_top_ancestor_id() {
  //if there is a parent, return parent's id

  global $post;

  if ( $post->post_parent) {
    $ancestors = array_reverse(get_post_ancestors($post->ID));
    return $ancestors[0];
  }
  return $post->ID;
}

// Does page have children?
function has_children() {
  global $post;

  $pages = get_pages('child_of=' . $post->ID);
  return count($pages);
}

// Customize except word count length to 25 words
function custom_excerpt_length() {
  return 50 ;
}

add_filter('excerpt_length', "custom_excerpt_length");

function learningWordpress_resources() {
  wp_enqueue_style('style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'learningWordpress_resources');
//Navigation Menus

// Theme setup
function learningWordpress_setup() {
//   // Add featured image supprt
  add_theme_support("post-thumbnails");
  add_image_size('small-thumbnail', 180, 120, true );
  add_image_size('banner-image', 920, 210, array("left", "top"));

//   // Navigation menus
  register_nav_menus(array(
    "primaryyy" => __( "Primary Menuu"),
    'footer' => __('Footer Menu')
  ));
//
}

add_action('after_setup_theme', "learningWordpress_setup");

?>
