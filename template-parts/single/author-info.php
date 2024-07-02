<?php
// Get author ID
$author_id = get_the_author_meta('ID');
// Get author avatar
$author_avatar = get_avatar($author_id, 100); // 100 is the size of the avatar
// Get author display name
$author_name = get_the_author_meta('display_name');
// Get author bio
$author_bio = get_the_author_meta('description');
// Get author URL
$author_url = get_author_posts_url($author_id); // Get the author's posts URL

?>

<div class="author-info">
    <div class="author-avatar">
        <?php echo $author_avatar; ?>
    </div>
    <div class="author-details">
        <h4><a href="<?php echo esc_url($author_url); ?>"><?php echo esc_html($author_name); ?></a></h4>
        <?php if ($author_bio) : ?>
            <p class="author-bio"><?php echo esc_html($author_bio); ?></p>
        <?php endif; ?>
    </div>
</div>
