<?php
echo '<div class="glassy-post-navigation my-3">';

// Get the previous post
$prev_post = get_previous_post();
if ($prev_post) {
    $prev_title = esc_attr($prev_post->post_title);
    $prev_link = get_permalink($prev_post->ID);
    echo "<div class='glassy-nav-previous'><span>" . esc_html__('Previous Post:', 'glassy') . "</span><a href='$prev_link'><h4>$prev_title</h4></a></div>";
}

// Get the next post
$next_post = get_next_post();
if ($next_post) {
    $next_title = esc_attr($next_post->post_title);
    $next_link = get_permalink($next_post->ID);
    echo "<div class='glassy-nav-next'><span>" . esc_html__('Next Post:', 'glassy') . "</span><a href='$next_link'><h4>$next_title</h4></a></div>";
}

echo '</div>';
?>
