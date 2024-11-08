<main class="main-content"><?php if (is_search() && have_posts()) : ?>
    <a href="<?php echo home_url(); ?>" class="btn-return-home"><i class="bi bi-arrow-left"></i>Voltar</a>    
    <div class="news-carousel slick-slider">   
        <?php get_template_part('template-parts/news-card'); ?>        
     </div>   

    <?php elseif (is_search()) : ?>
        <p>Nenhum resultado encontrado para "<?php echo get_search_query(); ?>".</p>
    <?php else : ?>
        <div class="news-carousel slick-slider">          
            <?php get_template_part('template-parts/news-card'); ?>             
        </div>
    <?php endif; ?>         
</main>
  
