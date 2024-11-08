<?php get_header(); ?>

<div class="single-post d-flex justify-content-between align-items-center">
    <?php
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                ?>
                <div class="post-content">
                    <h1><?php the_title(); ?></h1>
                    <p class="post-info">Publicado em <?php echo get_the_date(); ?> por <?php the_author(); ?></p>
                    <div class="post-full-content">
                        <?php the_content(); ?> <!-- Exibe o conteúdo completo -->
                    </div>
                </div>
            <?php endwhile;
        else:
            echo '<p>Nenhum conteúdo encontrado.</p>';
        endif;
    ?>
    <a href="<?php echo home_url(); ?>" class="btn-return-home"><i class="bi bi-arrow-left"></i>Voltar</a>
</div>

<?php get_footer(); ?>