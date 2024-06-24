<?php
// Check if the post has a featured image
if (has_post_thumbnail()) {
    $post_id = get_the_ID();
    $featured_image_url = get_the_post_thumbnail_url($post_id, 'full');
    // Create a custom class based on the post ID
    $custom_class = 'page-header-' . $post_id;

    // Add custom CSS to set the background image
    echo "<style>
    .$custom_class {
        background-image: url('$featured_image_url')!important;
        background-size: cover!important;
        background-repeat: no-repeat!important;
        background-position: center top!important;
    }
    </style>";
} else {
    // Fallback class (optional)
    $custom_class = 'page-header-fallback';
}
?>

<div id="hero" class="overlay page-header <?php echo $custom_class; ?>">
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


            <?php 
            
            if(is_single()){
                while (have_posts()) { the_post();
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