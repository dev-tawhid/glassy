<?php get_header();?>

<?php
 get_template_part('/template-parts/single/page-header');
?>

<div class="page-content">
    <div class="container">
        <?php the_content()?>
    </div>
</div>

<?php get_footer();?>