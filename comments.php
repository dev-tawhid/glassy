<?php

// Exit if the post is password protected
if ( post_password_required() ) {
    return;
}

// Add classes to the comments wrapper
$classes = 'comments-area glassy-comments';

if ( get_comments_number() ) {
    $classes .= ' has-comments';
}

if ( ! comments_open() && get_comments_number() < 1 ) {
    $classes .= ' no-comments';
    return;
}

?>

<section id="comments" class="<?php echo esc_attr( $classes ); ?>">
    <?php if ( have_comments() ) : ?>
        <h3 class="comments-title my-2">
            <?php
                $comments_number = get_comments_number();
                if ( '1' === $comments_number ) {
                    /* translators: %s: post title */
                    printf( _x( 'One Comment on &ldquo;%s&rdquo;', 'comments title', 'textdomain' ), get_the_title() );
                } else {
                    printf(
                        /* translators: 1: number of comments, 2: post title */
                        _nx(
                            '%1$s Comment on &ldquo;%2$s&rdquo;',
                            '%1$s Comments on &ldquo;%2$s&rdquo;',
                            $comments_number,
                            'comments title',
                            'textdomain'
                        ),
                        number_format_i18n( $comments_number ),
                        get_the_title()
                    );
                }
            ?>
        </h3>
    <?php endif; ?>
    <?php
        wp_list_comments();
        comment_form();
    ?>
</section>
