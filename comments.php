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
        <h4 class="comments-title my-2 text-center d-none">
            <?php
                $comments_number = get_comments_number();
                if ( '1' === $comments_number ) {
                    printf( _x( 'This post has 1 Comment', 'comments number', 'glassy' ) );
                } else {
                    printf(
                        /* translators: %s: number of comments */
                        _nx(
                            'This post has %1$s Comment',
                            'This post has %1$s Comments',
                            $comments_number,
                            'comments number',
                            'glassy'
                        ),
                        number_format_i18n( $comments_number )
                    );
                }
            ?>
        </h4>

    <?php endif; ?>
    <?php
        wp_list_comments();
        comment_form();
    ?>
</section>
