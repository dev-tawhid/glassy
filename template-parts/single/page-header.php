<div id="hero" class="overlay page-header <?php echo $custom_class; ?>" style="<?php if (is_single() || is_page()) { if (has_post_thumbnail()) { echo 'background-image: url(' . get_the_post_thumbnail_url() . ');'; } } elseif (is_category() || is_tag() || is_archive()) { echo 'background-image: url(/path/to/default-image.jpg);'; } ?>">
    <div class="container">
        <div class="hero-wrap pb-3 text-center">
            <h1 class="glassy-hero-title text-center">
                <?php 
                    if (is_home() || is_front_page()) {
                        echo 'Home';
                    } elseif (is_single()) {
                        the_title();
                        
                    } elseif (is_page()) {
                        the_title();
                    } elseif (is_category()) {
                        single_cat_title();
                    } elseif (is_tag()) {
                        single_tag_title();
                    } elseif (is_archive()) {
                        echo get_the_archive_title();
                    } elseif (is_search()) {
                        echo 'Search Results for: ' . get_search_query();
                    } elseif (is_404()) {
                        echo 'Page Not Found';
                    }
                ?>
            </h1>


              <?php glassy_breadcrumbs(); ?>
            


            <?php 
                if (is_single()) {
                    while (have_posts()) { 
                        the_post();
            ?>
                    <div class="post-meta single-meta">
                        <span title="Date" class="post-date"><i class="fa-regular fa-clock"></i><?php echo get_the_date(); ?></span>
                        <span title="Author" class="post-author"><i class="fa-regular fa-user"></i><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></span>
                        <span title="Categories" class="post-category"><i class="fa-regular fa-folder-closed"></i> <?php echo get_the_category_list(', '); ?></span>
                    </div>
            <?php
                    }
                }
            ?>  

           
            <a id="down" class="glassy-hero-btn" href="#down"><i class="fa-solid fa-chevron-down"></i></a>
        </div>
    </div>
</div>
