<?php
// Check if function exists to prevent errors if accessed directly
if ( ! function_exists( 'glassy_breadcrumbs' ) ) {
   // Glassy Breadcrumbs
function glassy_breadcrumbs() {
    // Settings
    $separator          = '&gt;';
    $breadcrumbs_id     = 'breadcrumbs';
    $breadcrumbs_class  = 'breadcrumbs';
    $home_title         = __('Homepage', 'glassy');
    $custom_taxonomy    = 'product_cat'; // Update if you have custom taxonomies
    
    // Get the query & post information
    global $post;
    
    // Do not display on the homepage
    if ( !is_front_page() ) {
        echo '<ul id="' . esc_attr($breadcrumbs_id) . '" class="' . esc_attr($breadcrumbs_class) . '">';
        
        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . esc_url(home_url('/')) . '" title="' . esc_attr($home_title) . '">' . esc_html($home_title) . '</a></li>';
        echo '<li class="separator separator-home"> ' . esc_html($separator) . ' </li>';
        
        if ( is_archive() ) {
            if ( is_tax() || is_category() || is_tag() ) {
                $post_type = get_post_type();
                
                if ($post_type != 'post') {
                    $post_type_object = get_post_type_object($post_type);
                    $post_type_archive = get_post_type_archive_link($post_type);
                    
                    echo '<li class="item-cat item-custom-post-type-' . esc_attr($post_type) . '"><a class="bread-cat bread-custom-post-type-' . esc_attr($post_type) . '" href="' . esc_url($post_type_archive) . '" title="' . esc_attr($post_type_object->labels->name) . '">' . esc_html($post_type_object->labels->name) . '</a></li>';
                    echo '<li class="separator"> ' . esc_html($separator) . ' </li>';
                }
                
                $custom_tax_name = get_queried_object()->name;
                echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . esc_html($custom_tax_name) . '</strong></li>';
            } else {
                echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . esc_html(post_type_archive_title('', false)) . '</strong></li>';
            }
        } elseif ( is_single() ) {
            $post_type = get_post_type();
            
            if ($post_type != 'post') {
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
                
                echo '<li class="item-cat item-custom-post-type-' . esc_attr($post_type) . '"><a class="bread-cat bread-custom-post-type-' . esc_attr($post_type) . '" href="' . esc_url($post_type_archive) . '" title="' . esc_attr($post_type_object->labels->name) . '">' . esc_html($post_type_object->labels->name) . '</a></li>';
                echo '<li class="separator"> ' . esc_html($separator) . ' </li>';
            }
            
            $category = get_the_category();
            if (!empty($category)) {
                $last_category = end($category);
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','), ',');
                $cat_parents = explode(',', $get_cat_parents);
                
                foreach ($cat_parents as $parent) {
                    echo '<li class="item-cat">' . wp_kses_post($parent) . '</li>';
                    echo '<li class="separator"> ' . esc_html($separator) . ' </li>';
                }
            }
            
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if (empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                $taxonomy_terms = get_the_terms($post->ID, $custom_taxonomy);
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
                
                echo '<li class="item-cat item-cat-' . esc_attr($cat_id) . ' item-cat-' . esc_attr($cat_nicename) . '"><a class="bread-cat bread-cat-' . esc_attr($cat_id) . ' bread-cat-' . esc_attr($cat_nicename) . '" href="' . esc_url($cat_link) . '" title="' . esc_attr($cat_name) . '">' . esc_html($cat_name) . '</a></li>';
                echo '<li class="separator"> ' . esc_html($separator) . ' </li>';
                echo '<li class="item-current item-' . esc_attr($post->ID) . '"><strong class="bread-current bread-' . esc_attr($post->ID) . '" title="' . esc_attr(get_the_title()) . '">' . esc_html(get_the_title()) . '</strong></li>';
            } else {
                echo '<li class="item-current item-' . esc_attr($post->ID) . '"><strong class="bread-current bread-' . esc_attr($post->ID) . '" title="' . esc_attr(get_the_title()) . '">' . esc_html(get_the_title()) . '</strong></li>';
            }
        } elseif ( is_category() ) {
            echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . esc_html(single_cat_title('', false)) . '</strong></li>';
        } elseif ( is_page() ) {
            if ($post->post_parent) {
                $ancestors = get_post_ancestors($post->ID);
                $ancestors = array_reverse($ancestors);
                
                foreach ($ancestors as $ancestor) {
                    echo '<li class="item-parent item-parent-' . esc_attr($ancestor) . '"><a class="bread-parent bread-parent-' . esc_attr($ancestor) . '" href="' . esc_url(get_permalink($ancestor)) . '" title="' . esc_attr(get_the_title($ancestor)) . '">' . esc_html(get_the_title($ancestor)) . '</a></li>';
                    echo '<li class="separator separator-' . esc_attr($ancestor) . '"> ' . esc_html($separator) . ' </li>';
                }
                echo '<li class="item-current item-' . esc_attr($post->ID) . '"><strong title="' . esc_attr(get_the_title()) . '"> ' . esc_html(get_the_title()) . '</strong></li>';
            } else {
                echo '<li class="item-current item-' . esc_attr($post->ID) . '"><strong class="bread-current bread-' . esc_attr($post->ID) . '"> ' . esc_html(get_the_title()) . '</strong></li>';
            }
        } elseif ( is_tag() ) {
            $term = get_queried_object();
            echo '<li class="item-current item-tag-' . esc_attr($term->term_id) . ' item-tag-' . esc_attr($term->slug) . '"><strong class="bread-current bread-tag-' . esc_attr($term->term_id) . ' bread-tag-' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</strong></li>';
        } elseif ( is_day() ) {
            echo '<li class="item-year item-year-' . esc_attr(get_the_time('Y')) . '"><a class="bread-year bread-year-' . esc_attr(get_the_time('Y')) . '" href="' . esc_url(get_year_link(get_the_time('Y'))) . '" title="' . esc_attr(get_the_time('Y')) . '">' . esc_html(get_the_time('Y')) . ' Archives</a></li>';
            echo '<li class="separator separator-' . esc_attr(get_the_time('Y')) . '"> ' . esc_html($separator) . ' </li>';
            echo '<li class="item-month item-month-' . esc_attr(get_the_time('m')) . '"><a class="bread-month bread-month-' . esc_attr(get_the_time('m')) . '" href="' . esc_url(get_month_link(get_the_time('Y'), get_the_time('m'))) . '" title="' . esc_attr(get_the_time('M')) . '">' . esc_html(get_the_time('M')) . ' Archives</a></li>';
            echo '<li class="separator separator-' . esc_attr(get_the_time('m')) . '"> ' . esc_html($separator) . ' </li>';
            echo '<li class="item-current item-' . esc_attr(get_the_time('j')) . '"><strong class="bread-current bread-' . esc_attr(get_the_time('j')) . '"> ' . esc_html(get_the_time('jS')) . ' ' . esc_html(get_the_time('M')) . ' Archives</strong></li>';
        } elseif ( is_month() ) {
            echo '<li class="item-year item-year-' . esc_attr(get_the_time('Y')) . '"><a class="bread-year bread-year-' . esc_attr(get_the_time('Y')) . '" href="' . esc_url(get_year_link(get_the_time('Y'))) . '" title="' . esc_attr(get_the_time('Y')) . '">' . esc_html(get_the_time('Y')) . ' Archives</a></li>';
            echo '<li class="separator separator-' . esc_attr(get_the_time('Y')) . '"> ' . esc_html($separator) . ' </li>';
            echo '<li class="item-month item-month-' . esc_attr(get_the_time('m')) . '"><strong class="bread-month bread-month-' . esc_attr(get_the_time('m')) . '" title="' . esc_attr(get_the_time('M')) . '">' . esc_html(get_the_time('M')) . ' Archives</strong></li>';
        } elseif ( is_year() ) {
            echo '<li class="item-current item-current-' . esc_attr(get_the_time('Y')) . '"><strong class="bread-current bread-current-' . esc_attr(get_the_time('Y')) . '" title="' . esc_attr(get_the_time('Y')) . '">' . esc_html(get_the_time('Y')) . ' Archives</strong></li>';
        } elseif ( is_author() ) {
            $author = get_queried_object();
            echo '<li class="item-current item-current-' . esc_attr($author->user_nicename) . '"><strong class="bread-current bread-current-' . esc_attr($author->user_nicename) . '" title="' . esc_attr($author->display_name) . '">' . esc_html__('Author:', 'glassy') . ' ' . esc_html($author->display_name) . '</strong></li>';
        } elseif ( get_query_var('paged') ) {
            echo '<li class="item-current item-current-' . esc_attr(get_query_var('paged')) . '"><strong class="bread-current bread-current-' . esc_attr(get_query_var('paged')) . '" title="' . esc_attr__('Page', 'glassy') . ' ' . esc_attr(get_query_var('paged')) . '">' . esc_html__('Page', 'glassy') . ' ' . esc_html(get_query_var('paged')) . '</strong></li>';
        } elseif ( is_search() ) {
            echo '<li class="item-current item-current-' . esc_attr(get_search_query()) . '"><strong class="bread-current bread-current-' . esc_attr(get_search_query()) . '" title="' . esc_attr__('Search results for:', 'glassy') . ' ' . esc_attr(get_search_query()) . '">' . esc_html__('Search results for:', 'glassy') . ' ' . esc_html(get_search_query()) . '</strong></li>';
        } elseif ( is_404() ) {
            echo '<li>' . esc_html__('Error 404', 'glassy') . '</li>';
        }
        
        echo '</ul>';
    }
}
}

  glassy_breadcrumbs();
?>





