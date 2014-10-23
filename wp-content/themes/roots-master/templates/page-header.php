<div class="page-header">
  <h1>
    <?php echo roots_title(); ?>
  </h1>
  <?php if (is_page( array (386, 'help') )) :?>
   <?php get_template_part('templates/searchform', 'page'); ?>
            <?php endif;
            ?>
</div>
