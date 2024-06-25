<?php get_header(); ?>


<?php

$has_active_main_sidebar = is_active_sidebar('main-sidebar');
$sidebar_class = $has_active_main_sidebar ? 'right-sidebar' : 'no-sidebar';

?>

<!-- Article Section  -->

<?php get_template_part('/template-parts/single/page-header') ?>

<div id="content" class="article-section py-5">
    <div class="container">
        <div class="article-wrap article-single-wrap ">
            <div class="article-container row <?php echo $sidebar_class; ?>">
                <?php while (have_posts()) {
                    the_post(); ?>
                    <article <?php post_class('post-item'); ?>>

                        <div class="post-content">

                            <?php
                            if (post_password_required()) {
                                echo get_the_password_form();
                            } else {
                                the_content();
                            }
                            ?>
                        </div>

                    </article>
                <?php } ?>


                <?php if (is_active_sidebar('main-sidebar')) : ?>
                    <aside>
                        <div id="glassy-sidebar" class="glassy-widget-area">
                            <?php dynamic_sidebar('main-sidebar'); ?>
                        </div><!-- #sidebar -->
                    </aside>
                <?php endif; ?>

            </div>

        </div>
    </div>
</div>


<!-- Article section end  -->


<?php get_footer() ?>