<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  

  <title>Indoor News</title>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>  
    <header class="page-header d-flex justify-content-between align-items-center">
      
      <section class="logo">
        <a href="<?php echo home_url(); ?>">Indoor News</a>        
      </section> 
      
      <?php get_template_part('template-parts/btn-header'); ?>
           
      <?php get_template_part('template-parts/search-form'); ?>     
    </header>    
