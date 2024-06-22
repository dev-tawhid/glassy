<?php get_header();?>

       <!-- Article Section  -->

       <?php get_template_part('/template-parts/single/page-header')?>

       <div id="content" class="article-section py-6">
        <div class="container">
            <div class="article-wrap article-single-wrap ">
            <div class="article-container row col-7-3">
                <?php while (have_posts()) { the_post(); ?>
                    <article <?php post_class('post-item'); ?>>
                        <?php if (has_post_thumbnail()) { ?>
                            <div class="post-thumbnail">
                                    <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
                            </div>
                        <?php } ?>
                        
                        <div class="post-content">
                            <?php the_content()?>
                        </div>
                        
                    </article>
                <?php } ?>

                <aside>
                <?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
                    <div id="glassy-sidebar" class="glassy-widget-area">
                        <?php dynamic_sidebar( 'main-sidebar' ); ?>
                    </div><!-- #sidebar -->
                <?php endif; ?>
                </aside>
            </div>

            </div>
        </div>
    </div>


    <!-- Article section end  -->


   <?php get_footer()?>