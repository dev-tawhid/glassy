<div id="glassy-page-header" >
    <div class="container">
        <div class="glassy-header-wrap">
            <h1 class="glass-header-title">
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
        </div>
    </div>   
 </div>