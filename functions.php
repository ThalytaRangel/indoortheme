<?php

function load_scripts() {
  wp_enqueue_script('jquery');

  wp_enqueue_style('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css', array(), '1.10.5', 'all');
  wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), '5.3.3', 'all');
  wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.3.3', true);
  wp_enqueue_style( 'bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css', array(), '1.8.1', 'all' );
  
  wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
  wp_enqueue_style('slick-theme-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css');
  wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), null, true); 
  
  wp_enqueue_script('menu-hamburger-js', get_template_directory_uri() . '/js/menu-hamburger.js', array('jquery'), null, false);
   
  wp_enqueue_style('indoor-theme-styles', get_template_directory_uri() . '/style.css', array(), filemtime(get_template_directory()), 'all');
  wp_enqueue_script('carousel-js', get_template_directory_uri() . '/js/carousel.js', array('jquery', 'slick-js'), null, false);
  
}

add_action('wp_enqueue_scripts', 'load_scripts');


function indoor_config() {
  register_nav_menus( 
    array (
    'my_main_menu' => 'Main Menu',
    'hamburguer_menu' => 'Hamburguer Menu',
    )
  );  
}
add_action('after_setup_theme', 'indoor_config');

function register_new_post() {
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['post_nonce']) && wp_verify_nonce($_POST['post_nonce'], 'novo_post')) {
      if (!empty($_POST['post_title']) && !empty($_POST['post_content']) && !empty($_POST['post_category'])) {
          $post_data = array(
              'post_title'   => sanitize_text_field($_POST['post_title']),
              'post_content' => sanitize_textarea_field($_POST['post_content']),
              'post_status'  => 'publish', 
              'post_author'  => get_current_user_id(),
              'post_type'    => 'post',
              'post_category' => array(intval($_POST['post_category']))
          );

          
          $post_id = wp_insert_post($post_data);

          if ($post_id) {
              return '<p>Notícia enviada</p>';
          } else {
              return '<p>Erro ao enviar notícia.</p>';
          }
      }
  }
  return '';
}

function register_new_category() {
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['category_nonce']) && wp_verify_nonce($_POST['category_nonce'], 'nova_categoria')) {
    if (!empty($_POST['category_name'])) {
      
      $category_data = array(
        'cat_name'        => sanitize_text_field($_POST['category_name']),
        'category_description' => sanitize_textarea_field($_POST['category_description']),
        'category_nicename' => sanitize_title($_POST['category_name']),
        'category_parent' => 0, 
      );

      
      $category_id = wp_insert_term($category_data['cat_name'], 'category', $category_data);

      
      if (!is_wp_error($category_id)) {
        return '<p>Categoria criada com sucesso!</p>';
      } else {
          return '<p>Erro ao criar a categoria.</p>';
      }
  }
}
}

