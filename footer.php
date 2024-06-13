<?php

$footer_widget_1 = is_active_sidebar( 'footer-widget-1' );
$footer_widget_2 = is_active_sidebar( 'footer-widget-2' );
$footer_widget_3 = is_active_sidebar( 'footer-widget-3' );

$has_active_widget = $footer_widget_1 || $footer_widget_2 || $footer_widget_3;

if ( $has_active_widget ) : ?>
    <style>
        #glassy-footer {
            display: block;
        }
    </style>
<?php else : ?>
    <style>
        #glassy-footer{
            display: none;
        }
    </style>
<?php endif; ?>
 
 
 <!-- Footer start  -->


 <footer id="glassy-footer" class="py-5">

<div class="container row col-3">
            <?php if ( is_active_sidebar( 'footer-widget-1' ) ) : ?>
                <div class="glassy-column">
                    <?php dynamic_sidebar( 'footer-widget-1' ); ?>
                </div>
            <?php endif; ?>
            <?php if ( is_active_sidebar( 'footer-widget-2' ) ) : ?>
                <div class="glassy-column">
                    <?php dynamic_sidebar( 'footer-widget-2' ); ?>
                </div>
            <?php endif; ?>
            <?php if ( is_active_sidebar( 'footer-widget-3' ) ) : ?>
                <div class="glassy-column">
                    <?php dynamic_sidebar( 'footer-widget-3' ); ?>
                </div>
            <?php endif; ?>
</div>

</footer>


<div id="copyright" >
    <div class="container text-center">
        <p>All Right Reserve Team Glassy</p>
    </div>
</div>

<!-- Footer End  -->


<?php wp_footer()?>

</body>
</html>