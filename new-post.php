<?php
/* Template Name: New Post */
?>

<?php get_header(); ?>

<?php echo register_new_post(); ?>

<div class="page-newpost d-flex justify-content-between align-items-center">
 
  <form method="post">
    <?php wp_nonce_field('novo_post', 'post_nonce'); ?>

    <a href="<?php echo home_url(); ?>" class="btn-return-home"><i class="bi bi-arrow-left"></i>Voltar</a>
    <h2>Cadastrar notícia</h2>
    <div class="input-wrapper">
      <label for="post_title">Título:</label>
      <input type="text" id="post_title" name="post_title" placeholder="Título da notícia" required>
    </div>
    
    <div class="input-wrapper">
      <label for="post_content">Conteúdo:</label>
      <textarea id="post_content" name="post_content" placeholder="Digite o conteúdo" rows="5" required></textarea>
    </div>

    <div class="input-wrapper">
      <label for="post_category">Categoria:</label>
      <select id="post_category" name="post_category" required>
        <option value="">Selecione uma categoria</option>
        <?php
        $categories = get_categories(array('hide_empty' => false)); 
        foreach ($categories as $category) {
            echo '<option value="' . esc_attr($category->term_id) . '">' . esc_html($category->name) . '</option>';
        }
        ?>
      </select>
    </div>    
    <button type="submit">Enviar notícia</button>      
  </form>
</div>

<?php get_footer(); ?>