<?php
// Get author ID
$author_id = get_the_author_meta('ID');
// Get author avatar
$author_avatar = get_avatar($author_id, 100); // 100 is the size of the avatar
// Get author display name
$author_name = get_the_author_meta('display_name');
// Get author bio
$author_bio = get_the_author_meta('description');
// Get author title (assuming 'title' is a custom user meta field)
$author_title = get_user_meta($author_id, 'title', true); // Change 'title' to your actual meta field key if different
?>

<div class="author-info">
    <div class="author-avatar">
        <?php echo $author_avatar; ?>
    </div>
    <div class="author-details">
        <h4><?php echo $author_name; ?></h4>
        <?php if ($author_title) : ?>
            <p class="author-title"><?php echo esc_html($author_title); ?></p>
        <?php endif; ?>
        <?php if ($author_bio) : ?>
            <p class="author-bio"><?php echo esc_html($author_bio); ?></p>
        <?php endif; ?>
    </div>
</div>
