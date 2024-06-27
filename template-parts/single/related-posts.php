<?php
// Get the current post ID
$current_post_id = get_the_ID();

// Get categories of the current post
$categories = get_the_category($current_post_id);

if ($categories) {
    $category_ids = array();
    foreach ($categories as $category) {
        $category_ids[] = $category->term_id;
    }

    // Query for related posts based on categories
    $related_posts_args = array(
        'category__in' => $category_ids,
        'post__not_in' => array($current_post_id),
        'posts_per_page' => 2, // Number of related posts to display
        'ignore_sticky_posts' => 1
    );

    $related_posts_query = new WP_Query($related_posts_args);

    if ($related_posts_query->have_posts()) {
        ?>
        <div id="related-posts" class="article-section py-5">
            <div class="container">
                <h2 class="related-posts-title mb-3 text-center"><?php esc_html_e('Related Articles', 'glassy'); ?></h2>

                <div class="article-wrap">
                    <div class="article-container row col-2">
                        <?php
                        while ($related_posts_query->have_posts()) {
                            $related_posts_query->the_post();
                            ?>
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
                                    <span title="<?php esc_attr_e('Date', 'glassy'); ?>" class="post-date"><i class="fa-regular fa-clock"></i><?php echo get_the_date(); ?></span>
                                    <span title="<?php esc_attr_e('Author', 'glassy'); ?>" class="post-author"><i class="fa-regular fa-user"></i><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></span>
                                    <span title="<?php esc_attr_e('Categories', 'glassy'); ?>" class="post-category"><i class="fa-regular fa-folder-closed"></i> <?php echo get_the_category_list(', '); ?></span>
                                </div>
                                
                                <div class="post-content">
                                    <p class="post-excerpt">
                                        <?php echo wp_trim_words(get_the_excerpt(), 25); // Limiting to 25 words ?>
                                    </p>
                                </div>
                                
                                <a href="<?php the_permalink(); ?>" class="read-more btn-outline"><?php esc_html_e('Read More', 'glassy'); ?></a>
                            </article>
                            <?php
                        }
                        ?>
                    </div><!-- .article-container -->
                </div><!-- .article-wrap -->
            </div><!-- .container -->
        </div><!-- .article-section -->
        <?php
    } else {
        // If no related posts found based on categories, show most recent posts
        $fallback_posts_args = array(
            'posts_per_page' => 2, // Number of recent posts to display as fallback
            'ignore_sticky_posts' => 1
        );

        $fallback_posts_query = new WP_Query($fallback_posts_args);

        if ($fallback_posts_query->have_posts()) {
            ?>
            <div id="related-posts" class="article-section py-5">
                <div class="container">
                    <h2 class="related-posts-title mb-3 text-center"><?php esc_html_e('Related Articles', 'glassy'); ?></h2>

                    <div class="article-wrap">
                        <div class="article-container row col-2">
                            <?php
                            while ($fallback_posts_query->have_posts()) {
                                $fallback_posts_query->the_post();
                                ?>
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
                                        <span title="<?php esc_attr_e('Date', 'glassy'); ?>" class="post-date"><i class="fa-regular fa-clock"></i><?php echo get_the_date(); ?></span>
                                        <span title="<?php esc_attr_e('Author', 'glassy'); ?>" class="post-author"><i class="fa-regular fa-user"></i><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></span>
                                        <span title="<?php esc_attr_e('Categories', 'glassy'); ?>" class="post-category"><i class="fa-regular fa-folder-closed"></i> <?php echo get_the_category_list(', '); ?></span>
                                    </div>
                                    
                                    <div class="post-content">
                                        <p class="post-excerpt">
                                            <?php echo wp_trim_words(get_the_excerpt(), 25); // Limiting to 25 words ?>
                                        </p>
                                    </div>
                                    
                                    <a href="<?php the_permalink(); ?>" class="read-more btn-outline"><?php esc_html_e('Read More', 'glassy'); ?></a>
                                </article>
                                <?php
                            }
                            ?>
                        </div><!-- .article-container -->
                    </div><!-- .article-wrap -->
                </div><!-- .container -->
            </div><!-- .article-section -->
            <?php
        }

        // Reset post data
        wp_reset_postdata();
    }

    // Reset post data
    wp_reset_postdata();
}
?>
