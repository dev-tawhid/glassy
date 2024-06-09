<?php get_header();?>

       <!-- Article Section  -->

       <?php get_template_part('page-header')?>

       <div class="article-section py-5">
        <div class="container">
            <div class="article-wrap">
            <div class="article-container row col-3">
                <?php while (have_posts()) { the_post(); ?>
                    <article <?php post_class('post-item'); ?>>
                        <?php if (has_post_thumbnail()) { ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('blog-img', array('class' => 'img-responsive')); ?>
                                </a>
                            </div>
                        <?php } ?>
                        
                        <h3 class="post-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        
                        <div class="post-meta">
                            <span class="post-date"><?php echo get_the_date(); ?></span>
                            <span class="post-author">by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></span>
                            <span class="post-category">Category: <?php echo get_the_category_list(', '); ?></span>
                        </div>
                        
                        <div class="post-content">
                            <p class="post-excerpt">
                                <?php
                                    echo wp_trim_words(get_the_excerpt(), 25); // Limiting to 25 words
                                ?>
                            </p>
                        </div>
                        
                        <a href="<?php the_permalink(); ?>" class="read-more btn-outline">Read More</a>
                    </article>
                <?php } ?>
            </div>

       
            <?php the_posts_pagination( array(
                'mid_size'  => 2,
                'prev_text' => __( 'Previous', 'textdomain' ),
                'next_text' => __( 'Next', 'textdomain' ),
                'screen_reader_text' => ''
            ) ); ?>

            </div>
        </div>
    </div>


    <!-- Article section end  -->


   <?php get_footer()?>