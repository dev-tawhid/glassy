<div id="glassy-page-header" >
    <div class="container">
        <div class="glassy-header-wrap glassy-single-header-wrap">

            <h1 class="glass-header-title">
                <?php the_title(); ?>
            </h1>

            <div class="post-meta">
                <span class="post-date"><?php echo get_the_date(); ?></span>
                <span class="post-author">by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></span>
                <span class="post-category">Category: <?php echo get_the_category_list(', '); ?></span>
            </div>
        </div>
    </div>   
 </div>