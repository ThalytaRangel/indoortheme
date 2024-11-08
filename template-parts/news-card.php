<?php if ( have_posts() ) : ?>
  <?php while ( have_posts() ) : the_post(); ?>
    <div class="news-card d-flex justify-content-between align-items-start">
      <h2><?php the_title(); ?></h2>
      <p class="post-info">Publicado em <?php echo get_the_date(); ?> por <?php the_author(); ?></p>
      <p class="categories">Categorias: <?php the_category(''); ?></p>
      <div class="news-paragraph">
        <?php  
          $content = get_the_content();
          $content = strip_shortcodes($content);
          $content = wp_strip_all_tags($content);
          echo mb_strimwidth($content, 0, 250, '...');
        ?>
      </div>
      <a href="<?php the_permalink(); ?>" class="btn-open-news">Saiba Mais</a>
    </div>
  <?php endwhile; ?>
<?php  else: ?>
  <p>Nenhum conteúdo encontrado.</p>
<?php endif; ?>
