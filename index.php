<?php get_header(); ?>

<!-- Article Section -->

<?php
if (is_home() || is_front_page()) {
    get_template_part('/template-parts/hero/hero');
} else {
    get_template_part('/template-parts/single/page-header');
}
?>
<div class="article-section py-5">
    <div class="container">
        <div class="article-wrap">
  
                <?php if (have_posts()) { ?>
                       <div class="article-container row col-2">
                        <?php
                    while (have_posts()) {
                        the_post(); ?>
                   
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
                                <span title="Date" class="post-date"><i class="fa-regular fa-clock"></i><?php echo get_the_date(); ?></span>
                                <span title="Author" class="post-author"><i class="fa-regular fa-user"></i><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></span>
                                <span title="Categories" class="post-category"><i class="fa-regular fa-folder-closed"></i> <?php echo get_the_category_list(', '); ?></span>
                            </div>
                            
                            <div class="post-content">
                                <p class="post-excerpt">
                                    <?php echo wp_trim_words(get_the_excerpt(), 25); // Limiting to 25 words ?>
                                </p>
                            </div>
                            
                            <a href="<?php the_permalink(); ?>" class="read-more btn-outline">Read More</a>
                        </article>
                       
                    <?php } 
                  
                } ?>

                 <?php if (!have_posts()) { ?>
                <div class="info">There are no posts available at this time.</div>
                <?php } ?>

            </div>
           
        
            <?php the_posts_pagination(array(
                'mid_size' => 2,
                'prev_text' => __('<i class="fa-solid fa-angle-left"></i>', 'textdomain'),
                'next_text' => __('<i class="fa-solid fa-angle-right"></i>', 'textdomain'),
                'screen_reader_text' => ''
            )); ?>
        </div>
    </div>
</div>

<!-- Article Section End -->

<?php get_footer(); ?>
