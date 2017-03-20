<?php

function traveljohn_register_theme_menu() {
  register_nav_menu('primary', 'Hoofdnavigatie');
}

add_action('init', 'traveljohn_register_theme_menu');

function traveljohn_post_remove() {
  remove_menu_page('edit.php');
  remove_menu_page('edit-comments.php');
}

add_action('admin_menu', 'traveljohn_post_remove');

function traveljohn_widgets_init() {
}

add_action('widgets_init', 'traveljohn_widgets_init');

function traveljohn_create_post_type() {
  register_post_type('traveljohn_product',
    array(
      'labels' => array(
        'name' => __('Producten'),
        'singular_name' => __('Product'),
        'add_new' => 'Product toevoegen',
        'add_new_item' => 'Product toevoegen',
        'edit_item' => 'Product aanpassen',
        'new_item' => 'Nieuw product',
        'delete_item' => 'Product verwijderen',
        'view_item' => 'Product bekijken',
        'search_itema' => 'Product zoeken',
        'not_found' => 'Geen producten gevonden',
        'not_found_in_trash' => 'Geen producten gevonden in prullenbak'
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
    'post_types' => array('traveljohn_product'),
    'context'  => 'normal',
    'priority' => 'high',
    'fields' => array(
      array(
        'name' => 'Beschrijving',
        'desc' => 'Tekst toont onder de naam van het product',
        'id' => 'traveljohn_product_text',
        'type' => 'wysiwyg'
      ),
      array(
        'name' => 'Afbeelding',
        'id' => 'traveljohn_product_image',
        'desc' => 'Hoofdafbeelding van het product',
        'type' => 'image_advanced',
        'max_file_uploads' => 1,
        'max_status' => false,
      ),
      array(
        'name' => 'Extra afbeeldingen',
        'desc' => 'Eventuele extra afbeeldingen van dit product',
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

  // Extra meta boxes for page post type
  $meta_boxes[] = array(
    'id' => 'traveljohn_page',
    'title' => 'Pagina eigenschappen',
    'post_types' => array('page'),
    'context'  => 'normal',
    'priority' => 'high',
    'fields' => array(
      array(
        'name' => 'Banner afbeelding',
        'id' => 'banner_image',
        'desc' => 'Dit is voor de banner op normale pagina\s',
        'type' => 'image_advanced',
        'max_file_uploads' => 1,
        'max_status' => false,
      ),
      array(
        'name' => 'Toon producten op deze pagina',
        'id' => 'traveljohn_show_products',
        'type' => 'checkbox'
      ),
    )
  );

  // Extra meta boxes for page post type
  $meta_boxes[] = array(
    'id' => 'traveljohn_homepage',
    'title' => 'Homepage eigenschappen',
    'post_types' => array('page'),
    'context'  => 'normal',
    'priority' => 'high',
    'fields' => array(
      array(
        'name' => 'Homepage banner',
        'desc' => 'Dit is de grote slider voor op de homepage',
        'id' => 'homepage_banner',
        'type' => 'image_advanced',
        'max_file_uploads' => 10
      ),
      array(
        'name' => 'Homepage payoff',
        'id' => 'homepage_payoff',
        'desc' => 'Dit is de tekst die toont onder de grote slider voor op de homepage',
        'type' => 'wysiwyg',
      ),
      array(
        'name' => 'Homepage slider',
        'id' => 'homepage_slider',
        'desc' => 'Dit is de kleine slider voor op de homepage',
        'type' => 'image_advanced',
        'max_file_uploads' => 10
      ),
    )
  );

  return $meta_boxes;
});

?>
