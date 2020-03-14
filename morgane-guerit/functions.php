<?php

wp_register_style('applicationCSS', get_template_directory_uri() . '/assets/stylesheets/application.css', array(), '1.0', 'all');
wp_register_script('applicationJS', get_template_directory_uri() . '/assets/javascripts/application.js', array(), '1.0', 'all');
if(!is_admin()) {
  wp_enqueue_style('applicationCSS'); // Enqueue it!
  wp_enqueue_script('applicationJS'); // Enqueue it!
}


// Our custom post type function
function create_custom_posts() {

    register_post_type(
      'portfolio',
      array(
          'labels' => array(
              'name' => __( 'Portfolio' ),
              'singular_name' => __( 'Project' )
          ),
          'public' => true,
          'has_archive' => true,
          'rewrite' => array('slug' => 'portfolio', 'with_front' => false ),
          'show_in_rest' => true,
          'menu_icon' => 'dashicons-images-alt',
      )
    );

    register_post_type(
      'temoignages',
      array(
          'labels' => array(
              'name' => __( 'Témoignages' ),
              'singular_name' => __( 'Témoignage' )
          ),
          'has_archive' => false,
          'rewrite' => array('slug' => 'temoignages' ),
          'show_in_rest' => true,
          'public' => true,
          'exclude_from_search' => true,
          'show_in_admin_bar' => true,
          'show_in_nav_menus' => false,
          'publicly_queryable'=> false,
          'query_var' => false,
          'menu_icon' => 'dashicons-groups',
      )
    );

    register_post_type(
      'services',
      array(
          'labels' => array(
              'name' => __( 'Services' ),
              'singular_name' => __( 'Service' )
          ),
          'has_archive' => false,
          'rewrite' => array('slug' => 'services'),
          'show_in_rest' => true,
          'public' => true,
          'exclude_from_search' => true,
          'show_in_admin_bar' => true,
          'show_in_nav_menus' => false,
          'publicly_queryable'=> false,
          'query_var' => false,
          'menu_icon' => 'dashicons-id-alt',
      )
    );
    register_post_type(
      'confiance',
      array(
          'labels' => array(
              'name' => __( 'Confiance' ),
              'singular_name' => __( 'Confiance' )
          ),
          'has_archive' => false,
          'rewrite' => array('slug' => 'confiance'),
          'show_in_rest' => true,
          'public' => true,
          'exclude_from_search' => true,
          'show_in_admin_bar' => true,
          'show_in_nav_menus' => false,
          'publicly_queryable'=> false,
          'query_var' => false,
          'menu_icon' => 'dashicons-format-quote',
      )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_custom_posts' );

function set_page ($slug) {
  $query = new WP_Query( array( 'pagename' => $slug ) );
  $query->the_post();
}

function get_posts_years_array() {
  global $wpdb;
  $result = array();
  $years = $wpdb->get_results(
    $wpdb->prepare(
      "SELECT YEAR(post_date) FROM {$wpdb->posts} WHERE post_status = 'publish' GROUP BY YEAR(post_date) DESC"
    ),
    ARRAY_N
  );
  if ( is_array( $years ) && count( $years ) > 0 ) {
    foreach ( $years as $year ) {
      $result[] = $year[0];
    }
  }
  return $result;
}

add_action('template_redirect', 'my_custom_disable_author_page');

function my_custom_disable_author_page() {
  global $wp_query;

  if ( is_author() ) {
    // Redirect to homepage, set status to 301 permenant redirect.
    // Function defaults to 302 temporary redirect.
    wp_redirect(get_option('home'), 301);
    exit;
  }
}

function wpdocs_custom_excerpt_length( $length ) {
  return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

add_filter('next_posts_link_attributes', 'next_link_attributes');
add_filter('previous_posts_link_attributes', 'previous_link_attributes');

function next_link_attributes() {
  return 'class="button button__arrow button__arrow--left"';
}

function previous_link_attributes() {
  return 'class="button button__arrow button__arrow--right"';
}

function wpdocs_after_setup_theme() {
  add_theme_support( 'html5', array( 'search-form' ) );
}
add_action( 'after_setup_theme', 'wpdocs_after_setup_theme' );


function wpb_change_search_url() {
    if ( is_search() && ! empty( $_GET['s'] ) ) {
        wp_redirect( home_url( "/search/" ) . urlencode( get_query_var( 's' ) ) );
        exit();
    }
}
add_action( 'template_redirect', 'wpb_change_search_url' );
