<!DOCTYPE html>
<html <?php language_attributes( ); ?> >
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
</head>
<body id="glassy-body" <?php body_class()?>>

<div id="preloader">
    <div class="loader"></div>
</div>

<?php get_template_part('template-parts/header/style-one')?>