<?php
/* Template Name: New Category */
?>

<?php get_header(); ?>

<?php echo register_new_category(); ?>

<div class="page-new-category d-flex justify-content-between align-items-center">
 
  <form method="post">
    <?php wp_nonce_field('nova_categoria', 'category_nonce'); ?>

    <a href="<?php echo home_url(); ?>" class="btn-return-home"><i class="bi bi-arrow-left"></i>Voltar</a>
    <h2>Nova categoria</h2>
    <div class="input-wrapper">
      <label for="category_name">Nome da categoria:</label>
      <input type="text" id="category_name" name="category_name" placeholder="Nome da categoria" required>
    </div>

    <div class="input-wrapper">
      <label for="category_nicename">Slug da categoria:</label>
      <input type="text" id="category_nicename" name="category_nicename" placeholder="Nome da categoria" required>
    </div>
    
    <div class="input-wrapper">
      <label for="category_description">Descrição:</label>
      <textarea id="category_description" name="category_description" placeholder="Descrição da categoria" rows="5" required></textarea>
    </div>

    
    <button type="submit">Cadastrar categoria</button>      
  </form>
</div>

<?php get_footer(); ?>