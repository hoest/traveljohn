<?php

function traveljohn_register_theme_menu() {
  register_nav_menu('primary', 'Hoofdnavigatie');
}

add_action('init', 'traveljohn_register_theme_menu');

function traveljohn_widgets_init() {
}

add_action('widgets_init', 'traveljohn_widgets_init');

function traveljohn_create_post_type() {
  register_post_type('traveljohn_product',
    array(
      'labels' => array(
        'name' => __('TravelJohns'),
        'singular_name' => __('TravelJohn'),
        'add_new' => 'TravelJohn toevoegen',
        'add_new_item' => 'TravelJohn toevoegen',
        'edit_item' => 'TravelJohn aanpassen',
        'new_item' => 'TravelJohn toevoegen',
        'delete_item' => 'TravelJohn verwijderen',
        'view_item' => 'TravelJohn bekijken',
        'search_itema' => 'TravelJohn zoeken',
        'not_found' => 'Geen TravelJohn gevonden',
        'not_found_in_trash' => 'Geen TravelJohn gevonden in prullenbak'
      ),
      'rewrite' => array('slug' => 'traveljohn'),
      'menu_icon' => 'dashicons-admin-page',
      'public' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'supports' => array(
        'title', 'thumbnail'
      ),
      'map_meta_cap' => true
    )
  );
}

add_action('init', 'traveljohn_create_post_type');

add_filter('rwmb_meta_boxes', function($meta_boxes) {
  // Extra meta boxes for traveljohn_product post type
  $meta_boxes[] = array(
    'id' => 'traveljohn_product_information',
    'title' => 'Product informatie',
    'pages' => array('traveljohn_product'),
    'context'  => 'normal',
    'priority' => 'high',
    'fields' => array(
      array(
        'name' => 'Beschrijving',
        'id' => 'traveljohn_product_text',
        'type' => 'textarea'
      ),
      array(
        'name' => 'Afbeelding',
        'id' => 'traveljohn_product_image',
        'type' => 'image_advanced',
        'max_file_uploads' => 1,
        'max_status' => false,
      ),
      array(
        'name' => 'Extra afbeeldingen',
        'id' => 'traveljohn_product_extra_image',
        'type' => 'image_advanced',
        'max_file_uploads' => 5
      ),
    )
  );

  // Get all traveljohn_products
  $args = array(
    'post_type' => 'traveljohn_product',
    'showposts' => -1,
    'orderby' => 'title',
    'order' => 'ASC'
  );

  $options = array();
  $traveljohn_products = get_posts($args);
  foreach ($traveljohn_products as $traveljohn_product) {
    $options[$traveljohn_product->ID] = $traveljohn_product->post_title;
  }

  return $meta_boxes;
});

?>
